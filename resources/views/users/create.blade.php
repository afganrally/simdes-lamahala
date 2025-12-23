@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center">
        <a href="{{ route('users.index') }}" class="mr-4 text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Tambah Pengguna Baru</h1>
    </div>
</div>

<!-- Form Card -->
<div class="card">
    <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
        <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Informasi Pengguna</h2>
    </div>
    <div class="p-6">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-900 border border-red-200 dark:border-red-700 text-red-800 dark:text-red-200 rounded-lg">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <strong>Terjadi kesalahan:</strong>
                    </div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Username <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Minimal 8 karakter</p>
                </div>

                <!-- Password Confirmation Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Role Field -->
                <div>
                    <label for="role" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Role <span class="text-red-500">*</span>
                    </label>
                    <select name="role" id="role" required
                            class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                        <option value="">Pilih Role</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('users.index') }}"
                   class="px-4 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg text-neutral-700 dark:text-neutral-300 hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors duration-200">
                    Simpan Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
