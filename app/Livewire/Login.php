<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $username;
    public $password;
    public $remember = false;

    protected $rules = [
        'username' => 'required|string',
        'password' => 'required|string',
    ];

    protected $messages = [
        'username.required' => 'Username wajib diisi',
        'password.required' => 'Password wajib diisi',
    ];

    public function login()
    {
        $this->validate();

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        throw ValidationException::withMessages([
            'username' => 'Username atau password salah',
        ]);
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.guest');
    }
}
