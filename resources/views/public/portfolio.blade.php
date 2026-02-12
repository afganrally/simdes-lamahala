<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SIMDESA') }} - Portfolio</title>
    <meta name="description" content="Portfolio Desa - Informasi dan Artikel Desa">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Animated gradient background with image */
        .hero-gradient {
            background-image: url('{{ asset("img/bg.jpeg") }}'), linear-gradient(-45deg, #0d9488, #059669, #0891b2, #06b6d4);
            background-size: cover, 400% 400%;
            background-position: center, 0% 50%;
            background-attachment: fixed, scroll;
            position: relative;
        }

        .hero-gradient::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(13, 148, 136, 0.4) 0%, rgba(5, 150, 105, 0.3) 50%, rgba(8, 145, 178, 0.4) 100%);
            z-index: 0;
        }

        @keyframes gradientShift {
            0% { background-position: center, 0% 50%; }
            50% { background-position: center, 100% 50%; }
            100% { background-position: center, 0% 50%; }
        }

        /* Stats section background */
        .stats-bg {
            background-image: url('{{ asset("img/bg2.jpeg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }

        .stats-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.4) 100%);
        }

        .dark .stats-bg::before {
            background: linear-gradient(180deg, rgba(17, 24, 39, 0.5) 0%, rgba(17, 24, 39, 0.4) 100%);
        }

        /* Articles section background */
        .articles-bg {
            background-image: url('{{ asset("img/bg3.jpeg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }

        .articles-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(248, 250, 252, 0.5) 0%, rgba(241, 245, 249, 0.4) 100%);
        }

        .dark .articles-bg::before {
            background: linear-gradient(180deg, rgba(23, 23, 23, 0.5) 0%, rgba(10, 10, 10, 0.4) 100%);
        }

        /* Footer background */
        .footer-bg {
            background: linear-gradient(180deg, rgba(17, 24, 39, 1) 0%, rgba(0, 0, 0, 1) 100%);
        }

        /* Floating animation */
        .float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Card hover effect */
        .article-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .article-card:hover .card-image {
            transform: scale(1.1);
        }

        .card-image {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Glassmorphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Stats counter animation */
        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        /* Shimmer loading effect */
        .shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #059669, #0891b2);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #047857, #0e7490);
        }

        .dark ::-webkit-scrollbar-track {
            background: #1f2937;
        }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-slate-50 via-neutral-50 to-slate-100 dark:from-neutral-900 dark:via-neutral-900 dark:to-neutral-950 min-h-screen">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl float" style="animation-delay: -5s;"></div>
    </div>

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-neutral-900/80 backdrop-blur-lg border-b border-neutral-200/50 dark:border-neutral-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg overflow-hidden">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Logo {{ config('app.name', 'SIMDESA') }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">
                            {{ config('app.name', 'SIMDESA') }}
                        </h1>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">Portfolio Desa</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Profil Desa</a>
                    <a href="{{ route('public.penduduk') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Penduduk</a>
                    <a href="{{ route('public.fasilitas') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Fasilitas</a>
                    <a href="{{ route('public.bansos') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Bansos</a>
                </nav>

                <!-- Actions -->
                <div class="flex items-center space-x-3">
                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-xl bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-all">
                        <svg class="w-5 h-5 text-neutral-700 dark:text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Login Button -->
                    <a href="{{ route('login') }}"
                       class="hidden sm:inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 bg-white dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-600 rounded-lg hover:bg-neutral-50 dark:hover:bg-neutral-700 transition-all shadow-sm hover:shadow">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Login
                    </a>

                    <!-- Theme Toggle -->
                    <button id="theme-toggle" class="p-2.5 rounded-xl bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-all shadow-sm hover:shadow">
                        <svg class="w-5 h-5 text-neutral-700 dark:text-neutral-300 dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-neutral-300 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <nav class="flex flex-col space-y-1">
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Profil Desa</a>
                    <a href="{{ route('public.penduduk') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Penduduk</a>
                    <a href="{{ route('public.fasilitas') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Fasilitas</a>
                    <a href="{{ route('public.bansos') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Bansos</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 opacity-10 z-0">
            <div class="absolute top-10 left-10 w-32 h-32 border-4 border-white rounded-full"></div>
            <div class="absolute bottom-10 right-10 w-24 h-24 border-4 border-white rounded-full"></div>
            <div class="absolute top-1/2 right-1/4 w-16 h-16 border-4 border-white rounded-full"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 md:py-48 z-10">
            <div class="text-center">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-6 animate-pulse">
                    <span class="flex h-2 w-2 rounded-full bg-white mr-2"></span>
                    <span class="text-sm font-medium text-white">Selamat Datang</span>
                </div>

                <!-- Main Heading -->
                <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                    Portal Informasi
                    <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 to-teal-200">Desa Digital</span>
                </h2>

                <!-- Subtitle -->
                <p class="text-xl text-emerald-100 max-w-2xl mx-auto mb-10 leading-relaxed">
                    Menyajikan informasi terkini seputar kegiatan, program, dan perkembangan desa dalam satu platform yang modern dan mudah diakses
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#articles" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-emerald-600 dark:text-emerald-400 bg-white rounded-xl hover:bg-emerald-50 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Jelajahi Artikel
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white glass rounded-xl hover:bg-white/20 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Login Admin
                    </a>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="fill-neutral-50 dark:fill-neutral-900" viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-bg py-12 relative">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stat-card bg-white dark:bg-neutral-800 rounded-2xl p-6 shadow-lg border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ $artikels->total() }}</p>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">Total Artikel</p>
                </div>

                <div class="stat-card bg-white dark:bg-neutral-800 rounded-2xl p-6 shadow-lg border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ number_format($artikels->total() * 127) }}</p>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">Pengunjung</p>
                </div>

                <div class="stat-card bg-white dark:bg-neutral-800 rounded-2xl p-6 shadow-lg border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ \App\Models\User::count() }}</p>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">Admin</p>
                </div>

                <div class="stat-card bg-white dark:bg-neutral-800 rounded-2xl p-6 shadow-lg border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-neutral-900 dark:text-white">24/7</p>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">Akses</p>
                </div>
            </div>
            </div>
    </section>

    <!-- Articles Section -->
    <main id="articles" class="articles-bg py-16 relative">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 rounded-full text-sm font-semibold mb-4">
                Artikel Terbaru
            </span>
            <h3 class="text-4xl md:text-5xl font-bold text-neutral-900 dark:text-white mb-4">
                Kabar Desa
            </h3>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto">
                Ikuti perkembangan terbaru dari desa kami melalui artikel yang informatif dan menarik
            </p>
        </div>

        @if($artikels->count() > 0)
            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($artikels as $artikel)
                    <article class="article-card bg-white dark:bg-neutral-800 rounded-2xl shadow-lg overflow-hidden border border-neutral-200/50 dark:border-neutral-700/50 group">
                        <!-- Image Container -->
                        <div class="relative aspect-video overflow-hidden bg-neutral-200 dark:bg-neutral-700">
                            @if($artikel->gambar)
                                <img src="{{ asset('storage/' . $artikel->gambar) }}"
                                     alt="{{ $artikel->judul }}"
                                     class="card-image w-full h-full object-cover">
                            @else
                                <div class="card-image w-full h-full bg-gradient-to-br from-emerald-400 via-teal-500 to-cyan-600 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1.5 bg-white/90 dark:bg-neutral-800/90 backdrop-blur-sm text-neutral-900 dark:text-white text-xs font-semibold rounded-lg shadow-lg">
                                    Artikel
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Title -->
                            <h4 class="text-xl font-bold text-neutral-900 dark:text-white mb-3 line-clamp-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                <a href="{{ route('public.artikel.show', $artikel->id) }}">
                                    {{ $artikel->judul }}
                                </a>
                            </h4>

                            <!-- Excerpt -->
                            <p class="text-neutral-600 dark:text-neutral-400 text-sm mb-4 line-clamp-3 leading-relaxed">
                                {!! strip_tags(substr($artikel->isi, 0, 120)) !!}...
                            </p>

                            <!-- Meta -->
                            <div class="flex items-center justify-between py-4 border-t border-neutral-200 dark:border-neutral-700">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">{{ strtoupper(substr($artikel->penulis, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-neutral-900 dark:text-white">{{ $artikel->penulis }}</p>
                                        <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                            {{ \Carbon\Carbon::parse($artikel->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Read More -->
                            <a href="{{ route('public.artikel.show', $artikel->id) }}"
                               class="inline-flex items-center w-full justify-center px-4 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white text-sm font-semibold rounded-xl transition-all shadow-md hover:shadow-lg group-hover:shadow-xl">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $artikels->appends(request()->query())->links('pagination::tailwind') }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-neutral-100 to-neutral-200 dark:from-neutral-800 dark:to-neutral-700 mb-6">
                    <svg class="w-12 h-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <h4 class="text-2xl font-bold text-neutral-900 dark:text-white mb-3">Belum Ada Artikel</h4>
                <p class="text-neutral-600 dark:text-neutral-400 max-w-md mx-auto">Belum ada artikel yang dipublikasikan saat ini. Silakan kembali lagi nanti untuk update terbaru.</p>
            </div>
        @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-bg text-white border-t border-neutral-800">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg overflow-hidden">
                            <img src="{{ asset('img/logo.jpg') }}" alt="Logo {{ config('app.name', 'SIMDESA') }}" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">{{ config('app.name', 'SIMDESA') }}</h3>
                            <p class="text-sm text-neutral-400">Sistem Informasi Desa</p>
                        </div>
                    </div>
                    <p class="text-neutral-400 leading-relaxed max-w-md">
                        Platform digital yang menyediakan informasi transparan dan akuntabel tentang pembangunan dan kegiatan desa untuk masyarakat.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold mb-4">Tautan</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('public.portfolio') }}" class="text-neutral-400 hover:text-emerald-400 transition-colors">Beranda</a>
                        </li>
                        <li>
                            <a href="#articles" class="text-neutral-400 hover:text-emerald-400 transition-colors">Artikel</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="text-neutral-400 hover:text-emerald-400 transition-colors">Login Admin</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-3 text-neutral-400">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Indonesia
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            info@desa.id
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t border-neutral-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center text-neutral-400 text-sm">
                    <p>&copy; {{ date('Y') }} {{ config('app.name', 'SIMDESA') }}. Seluruh hak cipta dilindungi.</p>
                    <p class="mt-2 md:mt-0">Dibuat dengan ❤️ untuk kemajuan desa</p>
                </div>
            </div>
            </div>
    </footer>

    @livewireScripts

    <!-- Theme Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('theme-toggle');
            const html = document.documentElement;

            function toggleTheme() {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }

            if (themeToggle) {
                themeToggle.addEventListener('click', toggleTheme);
            }

            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
