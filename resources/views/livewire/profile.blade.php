<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Profil Saya</h1>
        <p class="text-neutral-600 dark:text-neutral-400 mt-2">Kelola informasi profil dan pengaturan akun Anda</p>
    </div>

    <!-- Profile Card -->
    <div class="card overflow-hidden">
        <div class="px-6 py-4 border-b border-neutral-200 bg-gradient-to-r from-primary-300 to-primary-500 dark:border-neutral-700">
            <h2 class="text-lg font-semibold text-white">Informasi Profil</h2>
        </div>
        <div class="p-6">
            <div class="flex items-center space-x-4 mb-6">
                <div class="h-20 w-20 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center">
                    <svg class="h-10 w-10 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-neutral-900 dark:text-white">{{ $user->name }}</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">{{ $user->email }}</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200 mt-2">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
                <div class="flex-1"></div>
                <button wire:click="openEditModal" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Profil
                </button>
            </div>

            <!-- Profile Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-neutral-500 dark:text-neutral-400 mb-2">Username</h4>
                    <p class="text-lg text-neutral-900 dark:text-white">{{ $user->username }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-neutral-500 dark:text-neutral-400 mb-2">Email</h4>
                    <p class="text-lg text-neutral-900 dark:text-white">{{ $user->email }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-neutral-500 dark:text-neutral-400 mb-2">Role</h4>
                    <p class="text-lg text-neutral-900 dark:text-white">{{ ucfirst($user->role) }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-neutral-500 dark:text-neutral-400 mb-2">Bergabung Sejak</h4>
                    <p class="text-lg text-neutral-900 dark:text-white">{{ $user->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    @if($isOpen)
    <!-- Backdrop -->
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

            <!-- Modal panel -->
            <div class="relative bg-white dark:bg-neutral-800 rounded-xl shadow-2xl w-full max-w-md transform transition-all">
                <!-- Header with gradient -->
                <div class="bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-4 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Profil
                        </h3>
                        <button wire:click="closeModal" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <form wire:submit="update" class="p-6">
                    <div class="space-y-5">
                        <!-- Avatar Section -->
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="h-24 w-24 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center">
                                    <span class="text-3xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div class="absolute -bottom-2 -right-2 bg-green-500 h-8 w-8 rounded-full flex items-center justify-center border-4 border-white dark:border-neutral-800">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Nama Lengkap
                                </label>
                                <input type="text" wire:model="name"
                                    class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                    placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                    </svg>
                                    Username
                                </label>
                                <input type="text" wire:model="username"
                                    class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                    placeholder="Masukkan username">
                                @error('username')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    Password Baru
                                </label>
                                <div class="relative">
                                    <input type="password" wire:model="password"
                                        class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                        placeholder="Kosongkan jika tidak ingin mengubah">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-neutral-400 hover:text-neutral-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @if($password)
                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Konfirmasi Password
                                </label>
                                <div class="relative">
                                    <input type="password" wire:model="password_confirmation"
                                        class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                        placeholder="Konfirmasi password baru">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-neutral-400 hover:text-neutral-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="mt-8 flex gap-3">
                        <button type="button" wire:click="closeModal"
                            class="flex-1 px-4 py-3 bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 text-neutral-700 dark:text-neutral-300 font-medium rounded-lg transition-all duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-medium rounded-lg transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>