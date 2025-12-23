<div>
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-primary-300 to-primary-500 rounded-2xl p-8 mb-8 text-white shadow-xl animate-in">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="h-16 w-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
            <div class="ml-6">
                <h1 class="text-3xl font-bold mb-2">
                    Selamat Datang Kembali, {{ Auth::user()->name }}! 👋
                </h1>
                <p class="text-primary-100">
                    Anda login sebagai <span class="font-semibold">{{ ucfirst(Auth::user()->role ?? 'user') }}</span> • {{ Auth::user()->username }}
                </p>
            </div>
        </div>
    </div>

    <!-- User Info Cards -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="card overflow-hidden slide-up">
            <div class="bg-gradient-to-r from-primary-300 to-primary-500 p-4">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <h3 class="ml-3 text-lg font-semibold text-white">Informasi Akun</h3>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Username</p>
                        <p class="text-lg font-semibold text-neutral-900 dark:text-neutral-100">{{ Auth::user()->username }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Role</p>
                        <div class="flex items-center mt-1">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200">
                                <svg class="-ml-0.5 mr-1.5 h-3 w-3 text-primary-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3"></circle>
                                </svg>
                                {{ ucfirst(Auth::user()->role ?? 'user') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card overflow-hidden slide-up" style="animation-delay: 0.1s">
            <div class="bg-gradient-to-r from-primary-300 to-primary-500 p-4">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="ml-3 text-lg font-semibold text-white">Status Keamanan</h3>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Status Login</p>
                        <div class="flex items-center mt-1">
                            <svg class="h-5 w-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-lg font-semibold text-primary-600 dark:text-primary-400">Aktif</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Login Terakhir</p>
                        <p class="text-lg font-semibold text-neutral-900 dark:text-neutral-100">{{ now()->format('H:i, d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card overflow-hidden slide-up" style="animation-delay: 0.2s">
            <div class="bg-gradient-to-r from-primary-300 to-primary-500 p-4">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <h3 class="ml-3 text-lg font-semibold text-white">Statistik Sistem</h3>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Total Pengguna</p>
                        <p class="text-2xl font-bold text-neutral-900 dark:text-neutral-100">{{ \App\Models\User::count() }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-neutral-500 dark:text-neutral-400">Versi Sistem</p>
                    <p class="text-lg font-semibold text-neutral-900 dark:text-neutral-100">v1.0.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card p-6 slide-up" style="animation-delay: 0.3s">
        <h2 class="text-xl font-bold text-neutral-900 dark:text-neutral-100 mb-6">Aksi Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <button wire:click="$dispatch('openProfile')" class="p-4 bg-primary-50 dark:bg-primary-900/20 rounded-lg border border-primary-200 dark:border-primary-800 hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-all duration-200 group scale-in">
                <svg class="h-8 w-8 text-primary-600 dark:text-primary-400 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <p class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Profil Saya</p>
            </button>

            <button wire:click="$dispatch('openSettings')" class="p-4 bg-primary-50 dark:bg-primary-900/20 rounded-lg border border-primary-200 dark:border-primary-800 hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-all duration-200 group scale-in" style="animation-delay: 0.1s">
                <svg class="h-8 w-8 text-primary-600 dark:text-primary-400 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c-.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426-1.756-2.924-1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                </svg>
                <p class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Pengaturan</p>
            </button>

            <button wire:click="$dispatch('openActivity')" class="p-4 bg-primary-50 dark:bg-primary-900/20 rounded-lg border border-primary-200 dark:border-primary-800 hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-all duration-200 group scale-in" style="animation-delay: 0.2s">
                <svg class="h-8 w-8 text-primary-600 dark:text-primary-400 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4v2m0 2a2 2 0 100 4m-6 8a2 2 0 100-4m0 4v2m0-2a2 2 0 100 4m0-4v2m0 2a2 2 0 100 4"></path>
                </svg>
                <p class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Aktivitas</p>
            </button>

            <a href="/logout" class="p-4 bg-primary-50 dark:bg-primary-900/20 rounded-lg border border-primary-200 dark:border-primary-800 hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-all duration-200 group scale-in" style="animation-delay: 0.3s">
                <svg class="h-8 w-8 text-primary-600 dark:text-primary-400 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <p class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Keluar</p>
            </a>
        </div>
    </div>

    <!-- Event Listeners -->
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openProfile', () => {
                // Buka modal profil atau navigasi ke halaman profil
                window.location.href = '/profile';
            });

            Livewire.on('openSettings', () => {
                // Buka modal pengaturan atau navigasi ke halaman pengaturan
                window.location.href = '/settings';
            });

            Livewire.on('openActivity', () => {
                // Buka modal aktivitas atau navigasi ke halaman aktivitas
                window.location.href = '/activity';
            });
        });
    </script>
</div>
