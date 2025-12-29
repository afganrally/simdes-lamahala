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
    public $selectedPermissions = [];
    public $selectAll = false;

    public $name, $description, $category, $route_name, $is_active = true;
    public $permission_id;
    public $isPermissionEdit = false;
    public $isPermissionModalOpen = false;

    protected $listeners = ['closeModal' => 'closeModal'];

    protected $rules = [
        'name' => 'required|string|max:255|unique:permissions',
        'display_name' => 'required|string|max:255',
        'category' => 'nullable|string|max:255',
        'route_name' => 'nullable|string|max:255',
    ];

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('username', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $permissions = Permission::orderBy('category')->orderBy('display_name')->get();
        $permissionsByCategory = $permissions->groupBy('category');

        // Statistics
        $totalUsers = User::count();
        $totalPermissions = Permission::count();
        $activePermissions = Permission::where('is_active', true)->count();

        return view('livewire.access-management', [
            'users' => $users,
            'permissions' => $permissions,
            'permissionsByCategory' => $permissionsByCategory,
            'totalUsers' => $totalUsers,
            'totalPermissions' => $totalPermissions,
            'activePermissions' => $activePermissions,
        ]);
    }

    public function openUserPermissions($userId)
    {
        $this->selectedUserId = $userId;
        $user = User::find($userId);

        if ($user) {
            $this->selectedPermissions = $user->permissions->pluck('id')->toArray();
        }

        $this->isOpen = true;
    }

    public function saveUserPermissions()
    {
        $user = User::find($this->selectedUserId);

        if ($user) {
            $user->syncPermissions($this->selectedPermissions);

            $this->dispatch('success', 'Hak akses berhasil diperbarui.');
        }

        $this->closeModal();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedPermissions = Permission::pluck('id')->toArray();
        } else {
            $this->selectedPermissions = [];
        }
    }

    public function updatedSelectedPermissions()
    {
        $this->selectAll = count($this->selectedPermissions) === Permission::count();
    }

    // Permission Management
    public function createPermission()
    {
        $this->resetInputFields();
        $this->isPermissionEdit = false;
        $this->isPermissionModalOpen = true;
    }

    public function storePermission()
    {
        $this->validate();

        Permission::create([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
            'category' => $this->category ?? 'Umum',
            'route_name' => $this->route_name,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('success', 'Hak akses baru berhasil ditambahkan.');
        $this->closeModal();
    }

    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permission_id = $id;
        $this->name = $permission->name;
        $this->display_name = $permission->display_name;
        $this->description = $permission->description;
        $this->category = $permission->category;
        $this->route_name = $permission->route_name;
        $this->is_active = $permission->is_active;
        $this->isPermissionEdit = true;
        $this->isPermissionModalOpen = true;
    }

    public function updatePermission()
    {
        $rules = [
            'name' => 'required|string|max:255|unique:permissions,name,' . $this->permission_id,
            'display_name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'route_name' => 'nullable|string|max:255',
        ];

        $this->validate($rules);

        $permission = Permission::find($this->permission_id);
        $permission->update([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
            'category' => $this->category,
            'route_name' => $this->route_name,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('success', 'Hak akses berhasil diperbarui.');
        $this->closeModal();
    }

    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);

        // Detach dari semua user
        DB::table('user_permissions')->where('permission_id', $id)->delete();

        $permission->delete();

        $this->dispatch('success', 'Hak akses berhasil dihapus.');
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isPermissionModalOpen = false;
        $this->selectedUserId = null;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->display_name = '';
        $this->description = '';
        $this->category = '';
        $this->route_name = '';
        $this->is_active = true;
        $this->permission_id = null;
        $this->selectedPermissions = [];
        $this->selectAll = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getUserPermissions($userId)
    {
        return User::find($userId)?->permissions->pluck('id')->toArray() ?? [];
    }
}
