<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    public $name, $username, $email, $password, $password_confirmation;
    public $isOpen = false;
    public $user;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function openEditModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function update()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'username' => $this->username,
        ]);

        if ($this->password) {
            $this->user->update([
                'password' => Hash::make($this->password),
            ]);
        }

        $this->closeModal();
        $this->dispatch('success', 'Profil berhasil diperbarui.');
    }
}
