<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $name, $username, $password, $password_confirmation, $role;
    public $user_id;
    public $isOpen = false;
    public $isEdit = false;
    public $confirmDelete = false;
    public $userToDelete = null;

    protected $listeners = ['closeModal' => 'closeModal'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,operator',
    ];

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('username', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        // Statistics
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();
        $activeThisMonth = User::where('updated_at', '>=', now()->subMonth())->count();

        // Get current user permissions
        $currentUser = auth()->user();
        $canCreate = $currentUser->hasPermission('create_users');
        $canEdit = $currentUser->hasPermission('edit_users');
        $canDelete = $currentUser->hasPermission('delete_users');

        return view('livewire.user-management', [
            'users' => $users,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalRegularUsers' => $totalRegularUsers,
            'activeThisMonth' => $activeThisMonth,
            'canCreate' => $canCreate,
            'canEdit' => $canEdit,
            'canDelete' => $canDelete,
        ]);
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('create_users')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menambah pengguna.'
            ]);
            return;
        }

        $this->resetInputFields();
        $this->isEdit = false;
        $this->isOpen = true;
    }

    public function store()
    {
        if (!auth()->user()->hasPermission('create_users')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menambah pengguna.'
            ]);
            return;
        }

        $this->validate();

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        $this->dispatch('closeModal');
        $this->dispatch('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if (!auth()->user()->hasPermission('edit_users')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk mengedit pengguna.'
            ]);
            return;
        }

        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->role = $user->role;
        $this->password = '';
        $this->password_confirmation = '';
        $this->isEdit = true;
        $this->isOpen = true;
    }

    public function update()
    {
        if (!auth()->user()->hasPermission('edit_users')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk mengedit pengguna.'
            ]);
            return;
        }

        $rules = [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($this->user_id),
            ],
            'role' => 'required|in:admin,operator',
        ];

        if ($this->password) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $this->validate($rules);

        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'role' => $this->role,
        ]);

        if ($this->password) {
            $user->update([
                'password' => Hash::make($this->password),
            ]);
        }

        $this->dispatch('closeModal');
        $this->dispatch('success', 'Pengguna berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (!auth()->user()->hasPermission('delete_users')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menghapus pengguna.'
            ]);
            return;
        }

        if (auth()->user()->id === $id) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Anda tidak dapat menghapus akun Anda sendiri.'
            ]);
            return;
        }

        $user = User::findOrFail($id);
        $user->delete();

        // Dispatch SweetAlert success
        $this->dispatch('sweetAlert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'text' => 'Pengguna berhasil dihapus'
        ]);
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->confirmDelete = false;
        $this->userToDelete = null;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->username = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->role = '';
        $this->user_id = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
