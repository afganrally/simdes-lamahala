<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(session('success'))
        <meta name="flash-success" content="{{ session('success') }}">
    @endif
    @if(session('error'))
        <meta name="flash-error" content="{{ session('error') }}">
    @endif
    @if(session('warning'))
        <meta name="flash-warning" content="{{ session('warning') }}">
    @endif
    @if(session('info'))
        <meta name="flash-info" content="{{ session('info') }}">
    @endif
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
    <div class="flex h-screen bg-neutral-50 dark:bg-neutral-900">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 bg-white dark:bg-neutral-900 border-r border-neutral-200 dark:border-neutral-700">
            <!-- Sidebar Header -->
            <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto">
                <!-- Logo -->
                <div class="flex flex-col items-center flex-shrink-0 px-4 mb-8">
                    <h1 class="text-xl font-bold text-neutral-900 dark:text-white mb-3">
                        SIMDES {{  config('app.name', 'Laravel') }}
                    </h1>
                    <div class="h-16 w-16 rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="h-full w-full object-cover">
                    </div>
                </div>


                <!-- Navigation Menu -->
                <nav class="flex-1 px-2 space-y-1">
                    <a wire:navigate href="{{ route('dashboard') }}" class="sidebar-item {{ request()->is('dashboard') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>

                    @if(Auth::user()->role === 'admin')
                    <a wire:navigate href="{{ route('users.index') }}" class="sidebar-item {{ request()->is('users*') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Pengguna
                    </a>

                    <a wire:navigate href="{{ route('penduduks.index') }}" class="sidebar-item {{ request()->is('penduduks*') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Penduduk
                    </a>

                    <a wire:navigate href="{{ route('fasilitas.index') }}" class="sidebar-item {{ request()->is('fasilitas*') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Fasilitas
                    </a>

                    <a wire:navigate href="{{ route('bansos.index') }}" class="sidebar-item {{ request()->is('bansos*') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        Bantuan Sosial
                    </a>

                    <a wire:navigate href="{{ route('artikels.index') }}" class="sidebar-item {{ request()->is('artikels*') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Artikel
                    </a>
                    @endif

                    <a wire:navigate href="{{ route('profile') }}" class="sidebar-item {{ request()->is('profile') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profil
                    </a>

                    <a wire:navigate href="{{ route('settings') }}" class="sidebar-item {{ request()->is('settings') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c-.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426-1.756-2.924-1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        </svg>
                        Pengaturan
                    </a>

                    <a wire:navigate href="{{ route('activity') }}" class="sidebar-item {{ request()->is('activity') ? 'bg-primary-500 text-white' : 'text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-primary-500 dark:hover:text-primary-400' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4v2m0 2a2 2 0 100 4m-6 8a2 2 0 100-4m0 4v2m0-2a2 2 0 100-4m0-4v2m0 2a2 2 0 100 4m0-4v2m0 2a2 2 0 100 4"></path>
                        </svg>
                        Aktivitas
                    </a>
                </nav>


            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="lg:pl-64 flex flex-col flex-1">
            <!-- Top Bar -->
            <header class="bg-white dark:bg-neutral-800 shadow-sm border-b border-neutral-200 dark:border-neutral-700">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <!-- Mobile Menu Button -->
                        <button class="lg:hidden p-2 rounded-md text-neutral-400 hover:text-neutral-500 hover:bg-neutral-100 dark:hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>

                        <!-- Page Title & Breadcrumb -->
                        <div class="flex-1 min-w-0">
                            <h2 class="text-lg font-semibold text-neutral-900 dark:text-neutral-100 truncate">
                                Dashboard
                            </h2>
                        </div>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg cursor-pointer bg-red-600 hover:bg-red-700 text-white transition-all duration-200">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto">
                <div class="py-6 px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white dark:bg-neutral-800 border-t border-neutral-200 dark:border-neutral-700">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-neutral-500 dark:text-neutral-400">
                © 2025 {{ config('app.name', 'Laravel') }}.
            </p>
        </div>
    </footer>

    <!-- Livewire Event Listeners -->
    <script>
        document.addEventListener('livewire:init', () => {
            // Listen for success events
            Livewire.on('success', (message) => {
                // Create success notification
                showNotification(message, 'success');
            });

            // Listen for error events
            Livewire.on('error', (message) => {
                // Create error notification
                showNotification(message, 'error');
            });
        });

        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 translate-x-full`;

            // Set color based on type
            if (type === 'success') {
                notification.classList.add('bg-green-500', 'text-white');
            } else if (type === 'error') {
                notification.classList.add('bg-red-500', 'text-white');
            } else {
                notification.classList.add('bg-blue-500', 'text-white');
            }

            notification.textContent = message;
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Remove after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>

    <!-- Theme Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('theme-toggle');
            const themeToggleMobile = document.getElementById('theme-toggle-mobile');
            const html = document.documentElement;

            function toggleTheme() {
                console.log('Theme toggle clicked'); // Debug log
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }

            // Debug: Check if elements exist
            console.log('Theme toggle element:', themeToggle);
            console.log('Theme toggle mobile element:', themeToggleMobile);

            if (themeToggle) {
                themeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Sidebar theme toggle clicked');
                    toggleTheme();
                });
            }

            if (themeToggleMobile) {
                themeToggleMobile.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Mobile theme toggle clicked');
                    toggleTheme();
                });
            }
        });
    </script>
    @livewireScripts

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</body>
</html>
