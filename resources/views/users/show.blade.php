@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <a href="{{ route('users.index') }}" class="mr-4 text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Detail Pengguna</h1>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('users.edit', $user) }}"
               class="inline-flex items-center px-4 py-2 bg-warning-600 hover:bg-warning-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </a>
            @if(auth()->user()->id !== $user->id)
                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Hapus
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>

<!-- User Details Card -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Card -->
    <div class="lg:col-span-1">
        <div class="card">
            <div class="p-6 text-center">
                <div class="h-24 w-24 bg-primary-100 dark:bg-primary-800 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-12 w-12 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-neutral-900 dark:text-white mb-2">{{ $user->name }}</h3>
                <p class="text-neutral-600 dark:text-neutral-400 mb-4">{{ $user->username }}</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $user->role == 'admin' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                    {{ ucfirst($user->role) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Information Card -->
    <div class="lg:col-span-2">
        <div class="card">
            <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Informasi Pengguna</h2>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Nama Lengkap</dt>
                        <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $user->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Username</dt>
                        <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $user->username }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Role</dt>
                        <dd class="mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->role == 'admin' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-400">ID Pengguna</dt>
                        <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $user->id }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Tanggal Dibuat</dt>
                        <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $user->created_at->format('d F Y, H:i') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Terakhir Diperbarui</dt>
                        <dd class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $user->updated_at->format('d F Y, H:i') }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Activity Card -->
        <div class="card mt-6">
            <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Aktivitas Terkait</h2>
            </div>
            <div class="p-6">
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                        Belum ada aktivitas yang tercatat untuk pengguna ini.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
