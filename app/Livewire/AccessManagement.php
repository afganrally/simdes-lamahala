<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class AccessManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $selectedUserId = null;
    public $isOpen = false;

    // User's selected menus
    public $selectedMenus = [];

    // Pre-defined menu permissions
    public $availableMenus = [
        ['code' => 'view_dashboard', 'name' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['code' => 'view_users', 'name' => 'Pengguna', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
        ['code' => 'view_access', 'name' => 'Hak Akses', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
        ['code' => 'view_penduduks', 'name' => 'Penduduk', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
        ['code' => 'view_fasilitas', 'name' => 'Fasilitas', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
        ['code' => 'view_bansos', 'name' => 'Bantuan Sosial', 'icon' => 'M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4'],
        ['code' => 'view_artikels', 'name' => 'Artikel', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
    ];

    protected $listeners = ['closeModal' => 'closeModal'];

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('username', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        // Statistics
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', '!=', 'admin')->count();

        return view('livewire.access-management', [
            'users' => $users,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalRegularUsers' => $totalRegularUsers,
        ]);
    }

    /**
     * Buka modal untuk set menu akses user
     */
    public function openUserMenus($userId)
    {
        $this->selectedUserId = $userId;
        $user = User::find($userId);

        if ($user) {
            // Ambil permission codes yang dimiliki user
            $this->selectedMenus = $user->permissions->pluck('name')->toArray();
        }

        $this->isOpen = true;
    }

    /**
     * Simpan menu akses untuk user
     */
    public function saveUserMenus()
    {
        $user = User::find($this->selectedUserId);

        if (!$user) {
            return;
        }

        // Delete all existing permissions for this user
        DB::table('user_permissions')->where('user_id', $user->id)->delete();

        // Create/attach new permissions
        foreach ($this->selectedMenus as $menuCode) {
            // Find or create permission
            $permission = Permission::firstOrCreate(
                ['name' => $menuCode],
                [
                    'display_name' => $this->getMenuDisplayName($menuCode),
                    'category' => 'Menu',
                    'is_active' => true,
                ]
            );

            // Attach to user
            DB::table('user_permissions')->insert([
                'user_id' => $user->id,
                'permission_id' => $permission->id,
                'can_access' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->dispatch('success', 'Hak akses menu berhasil diperbarui.');
        $this->closeModal();
    }

    /**
     * Get display name from menu code
     */
    private function getMenuDisplayName($code)
    {
        foreach ($this->availableMenus as $menu) {
            if ($menu['code'] === $code) {
                return 'Menu ' . $menu['name'];
            }
        }
        return $code;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->selectedUserId = null;
        $this->selectedMenus = [];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
