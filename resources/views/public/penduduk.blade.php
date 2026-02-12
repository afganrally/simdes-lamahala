<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Penduduk - {{ config('app.name', 'SIMDESA') }}</title>
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
        * { font-family: 'Inter', sans-serif; }

        .stat-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25rem 1rem rgba(0, 0, 0, 0.15);
        }

        .progress-bar {
            transition: width 1.5s ease-out;
        }
        .progress-bar:hover {
            filter: brightness(1.1);
        }

        .icon-container {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .counter {
            font-variant-numeric: tabular-nums;
            font-feature-settings: 'tnum';
            letter-spacing: -0.025em;
        }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-slate-50 via-neutral-50 to-slate-100 dark:from-neutral-900 dark:via-neutral-900 dark:to-neutral-950 min-h-screen">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-neutral-900/80 backdrop-blur-lg border-b border-neutral-200/50 dark:border-neutral-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011-1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">
                            {{ config('app.name', 'SIMDESA') }}
                        </h1>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">Portfolio Desa</p>
                    </div>
                </div>
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Profil Desa</a>
                    <a href="{{ route('public.penduduk') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Penduduk</a>
                    <a href="{{ route('public.fasilitas') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Fasilitas</a>
                    <a href="{{ route('public.bansos') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Bansos</a>
                </nav>
                <div class="flex items-center space-x-3">
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-xl bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-all">
                        <svg class="w-5 h-5 text-neutral-700 dark:text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 bg-white dark:bg-neutral-800 border border-neutral-300 dark:border-neutral-600 rounded-lg hover:bg-neutral-50 dark:hover:bg-neutral-700 transition-all shadow-sm hover:shadow">Login</a>
                    <button id="theme-toggle" class="p-2.5 rounded-xl bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-all shadow-sm hover:shadow">
                        <svg class="w-5 h-5 text-neutral-700 dark:text-neutral-300 dark:hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg class="w-5 h-5 text-neutral-300 hidden dark:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414l.707-.707a1 1 0 011.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 01-2 2 2.828 2 0 00-2 2zm0 0a2 2 0 012 2h2a2 2 0 012 2 6-2 6-2 0 00-2 2V7a2 2 0 01-2 2 4.318 2 0 00-2 2zm0 0a2 2 0 012 2h2a2 2 0 012 2 6-2 0 00-2 2z"></path></svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <nav class="flex flex-col space-y-1">
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Profil Desa</a>
                    <a href="{{ route('public.penduduk') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Penduduk</a>
                    <a href="{{ route('public.fasilitas') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Fasilitas</a>
                    <a href="{{ route('public.bansos') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Bansos</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 py-20">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute top-40 left-40 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-white/10 rounded-full blur-xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/20 backdrop-blur-sm mb-6">
                <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v6a2 2 0 00-2 2h3a2 2 0 00-2 2v14l-2 2h2a2 2 0 012 2v1m2 13a2 2 0 01-2 2V7m2 13a2 2 0 002-2V9a2 2 0 00-2 2zm-2 0a2 2 0 012 2h2a2 2 0 012 2 6-2 6-2 0 00-2 2v14a2 2 0 012 2 6-2 6-2 0 00-2zm0 0a2 2 0 012 2h2a2 2 0 01-2 2V7m2 13a2 2 0 01-2 2.828 2 0 00-2 2z"></path>
                </svg>
                <span class="ml-3 text-lg font-semibold text-indigo-900">Data Penduduk</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Statistik Demografi Desa</h2>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">Informasi kependudukan dan data statistik penduduk secara real-time</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
        @php
            $totalPenduduk = \App\Models\Penduduk::count();
            $totalLaki = \App\Models\Penduduk::where('jenis_kelamin', 'L')->count();
            $totalPerempuan = \App\Models\Penduduk::where('jenis_kelamin', 'P')->count();

            $currentYear = now()->year;

            // Calculate age groups
            $balita = \App\Models\Penduduk::whereRaw('YEAR(CURDATE()) - YEAR(tanggal_lahir) < 5')->count();
            $anakAnak = \App\Models\Penduduk::whereRaw('YEAR(CURDATE()) - YEAR(tanggal_lahir) >= 5 AND YEAR(CURDATE()) - YEAR(tanggal_lahir) < 12')->count();
            $remaja = \App\Models\Penduduk::whereRaw('YEAR(CURDATE()) - YEAR(tanggal_lahir) >= 12 AND YEAR(CURDATE()) - YEAR(tanggal_lahir) < 18')->count();
            $dewasa = \App\Models\Penduduk::whereRaw('YEAR(CURDATE()) - YEAR(tanggal_lahir) >= 18 AND YEAR(CURDATE()) - YEAR(tanggal_lahir) < 60')->count();
            $lansia = \App\Models\Penduduk::whereRaw('YEAR(CURDATE()) - YEAR(tanggal_lahir) >= 60')->count();

            // Education
            $tidakSekolah = \App\Models\Penduduk::where('pendidikan', 'Tidak Sekolah')->count();
            $sd = \App\Models\Penduduk::where('pendidikan', 'SD')->count();
            $smp = \App\Models\Penduduk::where('pendidikan', 'SMP')->count();
            $sma = \App\Models\Penduduk::where('pendidikan', 'SMA')->count();
            $d3 = \App\Models\Penduduk::where('pendidikan', 'D3')->count();
            $s1 = \App\Models\Penduduk::where('pendidikan', 'S1')->count();
            $s2 = \App\Models\Penduduk::where('pendidikan', 'S2')->count();
            $s3 = \App\Models\Penduduk::where('pendidikan', 'S3')->count();

            // Jobs
            $petani = \App\Models\Penduduk::where('pekerjaan', 'Petani')->count();
            $nelayan = \App\Models\Penduduk::where('pekerjaan', 'Nelayan')->count();
            $wiraswasta = \App\Models\Penduduk::where('pekerjaan', 'Wiraswasta')->count();
            $pns = \App\Models\Penduduk::where('pekerjaan', 'PNS')->count();

            // Religion
            $islam = \App\Models\Penduduk::where('agama', 'Islam')->count();
            $katolik = \App\Models\Penduduk::where('agama', 'Katolik')->count();
            $protestan = \App\Models\Penduduk::where('agama', 'Protestan')->count();

            $dusunList = \App\Models\Penduduk::distinct('dusun')->pluck('dusun');
        @endphp

        <!-- Summary Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Penduduk -->
            <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 shadow-2xl text-white relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 opacity-20">
                    <svg class="w-16 h-16 text-blue-200" fill="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2h3a3 3 0 00-2-2V7a2 2 0 01-2 2h2a2 2 0 002-2V9a2 2 0 00-2 2h2a2 2 0 012 2 6-2 0 00-2 2zm-2 0a2 2 0 012 2h2a2 2 0 01-2 2V7m2 13a2 2 0 002-2V9a2 2 0 00-2 2zm-2 0a2 2 0 012 2h2a2 2 0 002-2V9a2 2 0 00-2 2z"></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-1">Total Penduduk</p>
                        <p class="text-5xl font-bold">{{ number_format($totalPenduduk, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-14 h-14 bg-white/30 rounded-2xl flex items-center justify-center icon-container">
                        <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 11-2.83 0 11-2.83 0 2.231 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7 7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Laki-laki -->
            <div class="stat-card bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl p-6 shadow-2xl text-white relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 opacity-20">
                    <svg class="w-16 h-16 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 11-2.83 0 11-2.83 0 2.231 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7 7z"></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-emerald-100 text-sm font-medium mb-1">Laki-laki</p>
                        <p class="text-5xl font-bold">{{ number_format($totalLaki, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-14 h-14 bg-white/30 rounded-2xl flex items-center justify-center icon-container">
                        <svg class="w-8 h-8 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 11-2.83 0 11-2.83 0 2.231 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7 7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Perempuan -->
            <div class="stat-card bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-6 shadow-2xl text-white relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 opacity-20">
                    <svg class="w-16 h-16 text-pink-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 11-2.83 0 11-2.83 0 2.231 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7 7z"></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-pink-100 text-sm font-medium mb-1">Perempuan</p>
                        <p class="text-5xl font-bold">{{ number_format($totalPerempuan, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-14 h-14 bg-white/30 rounded-2xl flex items-center justify-center icon-container">
                        <svg class="w-8 h-8 text-pink-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 11-2.83 0 11-2.83 0 2.231 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7 7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Jumlah Dusun -->
            <div class="stat-card bg-gradient-to-br from-violet-500 to-purple-600 rounded-2xl p-6 shadow-2xl text-white relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 opacity-20">
                    <svg class="w-16 h-16 text-violet-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h2M3 6h2M3 18h2v2H4v12a2 2 0 01-2 2v1m2 13a2 2 0 01-2 2V7m2 13a2 2 0 002-2V9a2 2 0 00-2 2h2a2 2 0 012 2 6-2 0 00-2 2z"></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-violet-100 text-sm font-medium mb-1">Jumlah Dusun</p>
                        <p class="text-5xl font-bold">{{ $dusunList->count() }}</p>
                    </div>
                    <div class="w-14 h-14 bg-white/30 rounded-2xl flex items-center justify-center icon-container">
                        <svg class="w-8 h-8 text-violet-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h2M3 6h2M3 18h2v2H4v12a2 2 0 01-2 2v1m2 13a2 2 0 01-2 2V7m2 13a2 2 0 002-2V9a2 2 0 00-2 2h2a2 2 0 012 2 6-2 0 00-2 2zm0 0a2 2 0 012 2h2a2 2 0 01-2 2V7m2 13a2 2 0 01-2 2.828 2 0 00-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Age Distribution - Visual -->
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 mb-10">
            <div class="flex items-center mb-6">
                <svg class="w-8 h-8 text-amber-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-neutral-900 dark:text-white">Distribusi Berdasarkan Usia</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @php
                    $balitaCount = $balita;
                    $balitaPercent = $totalPenduduk > 0 ? ($balitaCount / $totalPenduduk * 100) : 0;
                    $anakCount = $anakAnak;
                    $anakPercent = $totalPenduduk > 0 ? ($anakCount / $totalPenduduk * 100) : 0;
                    $remajaCount = $remaja;
                    $remajaPercent = $totalPenduduk > 0 ? ($remajaCount / $totalPenduduk * 100) : 0;
                    $dewasaCount = $dewasa;
                    $dewasaPercent = $totalPenduduk > 0 ? ($dewasaCount / $totalPenduduk * 100) : 0;
                    $lansiaCount = $lansia;
                    $lansiaPercent = $totalPenduduk > 0 ? ($lansiaCount / $totalPenduduk * 100) : 0;
                @endphp

                <!-- Balita -->
                <div class="bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-2xl p-6 shadow-lg relative overflow-hidden">
                    <div class="flex flex-col items-center text-center">
                        <span class="text-5xl font-bold text-white counter mb-2">{{ number_format($balitaCount, 0, ',', '.') }}</span>
                        <p class="text-cyan-100 text-sm font-medium mb-3">Balita (0-4 tahun)</p>
                        <div class="w-full bg-white/30 rounded-full h-3 overflow-hidden">
                            <div class="bg-cyan-500 h-3 progress-bar" style="width: {{ $balitaPercent }}%"></div>
                        </div>
                        <p class="text-cyan-100 text-xs mt-2">{{ number_format($balitaPercent, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Anak-anak -->
                <div class="bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl p-6 shadow-lg relative overflow-hidden">
                    <div class="flex flex-col items-center text-center">
                        <span class="text-5xl font-bold text-white counter mb-2">{{ number_format($anakCount, 0, ',', '.') }}</span>
                        <p class="text-green-100 text-sm font-medium mb-3">Anak-anak (5-11 tahun)</p>
                        <div class="w-full bg-white/30 rounded-full h-3 overflow-hidden">
                            <div class="bg-emerald-500 h-3 progress-bar" style="width: {{ $anakPercent }}%"></div>
                        </div>
                        <p class="text-green-100 text-xs mt-2">{{ number_format($anakPercent, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Remaja -->
                <div class="bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl p-6 shadow-lg relative overflow-hidden">
                    <div class="flex flex-col items-center text-center">
                        <span class="text-5xl font-bold text-white counter mb-2">{{ number_format($remajaCount, 0, ',', '.') }}</span>
                        <p class="text-amber-100 text-sm font-medium mb-3">Remaja (12-17 tahun)</p>
                        <div class="w-full bg-white/30 rounded-full h-3 overflow-hidden">
                            <div class="bg-amber-500 h-3 progress-bar" style="width: {{ $remajaPercent }}%"></div>
                        </div>
                        <p class="text-amber-100 text-xs mt-2">{{ number_format($remajaPercent, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Dewasa -->
                <div class="bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl p-6 shadow-lg relative overflow-hidden">
                    <div class="flex flex-col items-center text-center">
                        <span class="text-5xl font-bold text-white counter mb-2">{{ number_format($dewasaCount, 0, ',', '.') }}</span>
                        <p class="text-orange-100 text-sm font-medium mb-3">Dewasa (18-59 tahun)</p>
                        <div class="w-full bg-white/30 rounded-full h-3 overflow-hidden">
                            <div class="bg-orange-500 h-3 progress-bar" style="width: {{ $dewasaPercent }}%"></div>
                        </div>
                        <p class="text-orange-100 text-xs mt-2">{{ number_format($dewasaPercent, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Lansia -->
                <div class="bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl p-6 shadow-lg relative overflow-hidden">
                    <div class="flex flex-col items-center text-center">
                        <span class="text-5xl font-bold text-white counter mb-2">{{ number_format($lansiaCount, 0, ',', '.') }}</span>
                        <p class="text-rose-100 text-sm font-medium mb-3">Lansia (60+ tahun)</p>
                        <div class="w-full bg-white/30 rounded-full h-3 overflow-hidden">
                            <div class="bg-rose-500 h-3 progress-bar" style="width: {{ $lansiaPercent }}%"></div>
                        </div>
                        <p class="text-rose-100 text-xs mt-2">{{ number_format($lansiaPercent, 1, ',', '.') }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Education Statistics -->
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 mb-10">
            <div class="flex items-center mb-6">
                <svg class="w-8 h-8 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l9 5-9 5-9-5 9-5zm0 9l9-5-9-5-9 5 9 5z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-neutral-900 dark:text-white">Tingkat Pendidikan</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Tidak Sekolah -->
                <div class="bg-gradient-to-br from-gray-100 to-gray-200 dark:from-neutral-700 dark:to-neutral-600 rounded-xl p-5 border border-gray-300 dark:border-neutral-500">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-gray-400 to-gray-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tidak Sekolah</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ number_format($tidakSekolah, 0, ',', '.') }}</p>
                        <div class="w-full bg-gray-300 dark:bg-neutral-500 rounded-full h-2 overflow-hidden">
                            <div class="bg-gray-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($tidakSekolah / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($tidakSekolah / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- SD -->
                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/30 dark:to-indigo-900/50 rounded-xl p-5 border border-indigo-200 dark:border-indigo-700/50">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <span class="text-white text-lg font-bold">SD</span>
                        </div>
                        <p class="text-sm font-medium text-indigo-700 dark:text-indigo-300 mb-1">SD/Sederajat</p>
                        <p class="text-2xl font-bold text-indigo-800 dark:text-indigo-100 mb-2">{{ number_format($sd, 0, ',', '.') }}</p>
                        <div class="w-full bg-indigo-200 dark:bg-indigo-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-indigo-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($sd / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-indigo-600 dark:text-indigo-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($sd / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- SMP -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-900/50 rounded-xl p-5 border border-purple-200 dark:border-purple-700/50">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <span class="text-white text-lg font-bold">SMP</span>
                        </div>
                        <p class="text-sm font-medium text-purple-700 dark:text-purple-300 mb-1">SMP/Sederajat</p>
                        <p class="text-2xl font-bold text-purple-800 dark:text-purple-100 mb-2">{{ number_format($smp, 0, ',', '.') }}</p>
                        <div class="w-full bg-purple-200 dark:bg-purple-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-purple-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($smp / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-purple-600 dark:text-purple-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($smp / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- SMA -->
                <div class="bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/30 dark:to-pink-900/50 rounded-xl p-5 border border-pink-200 dark:border-pink-700/50">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <span class="text-white text-lg font-bold">SMA</span>
                        </div>
                        <p class="text-sm font-medium text-pink-700 dark:text-pink-300 mb-1">SMA/Sederajat</p>
                        <p class="text-2xl font-bold text-pink-800 dark:text-pink-100 mb-2">{{ number_format($sma, 0, ',', '.') }}</p>
                        <div class="w-full bg-pink-200 dark:bg-pink-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-pink-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($sma / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-pink-600 dark:text-pink-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($sma / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- D3 -->
                <div class="bg-gradient-to-br from-teal-50 to-teal-100 dark:from-teal-900/30 dark:to-teal-900/50 rounded-xl p-5 border border-teal-200 dark:border-teal-700/50">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-teal-400 to-teal-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <span class="text-white text-base font-bold">D3</span>
                        </div>
                        <p class="text-sm font-medium text-teal-700 dark:text-teal-300 mb-1">Diploma III</p>
                        <p class="text-2xl font-bold text-teal-800 dark:text-teal-100 mb-2">{{ number_format($d3, 0, ',', '.') }}</p>
                        <div class="w-full bg-teal-200 dark:bg-teal-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-teal-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($d3 / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-teal-600 dark:text-teal-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($d3 / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- S1 -->
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/30 dark:to-cyan-900/50 rounded-xl p-5 border border-cyan-200 dark:border-cyan-700/50">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <span class="text-white text-lg font-bold">S1</span>
                        </div>
                        <p class="text-sm font-medium text-cyan-700 dark:text-cyan-300 mb-1">Sarjana (S1)</p>
                        <p class="text-2xl font-bold text-cyan-800 dark:text-cyan-100 mb-2">{{ number_format($s1, 0, ',', '.') }}</p>
                        <div class="w-full bg-cyan-200 dark:bg-cyan-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-cyan-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($s1 / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-cyan-600 dark:text-cyan-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($s1 / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- S2 -->
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/30 dark:to-amber-900/50 rounded-xl p-5 border border-amber-200 dark:border-amber-700/50">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <span class="text-white text-lg font-bold">S2</span>
                        </div>
                        <p class="text-sm font-medium text-amber-700 dark:text-amber-300 mb-1">Magister (S2)</p>
                        <p class="text-2xl font-bold text-amber-800 dark:text-amber-100 mb-2">{{ number_format($s2, 0, ',', '.') }}</p>
                        <div class="w-full bg-amber-200 dark:bg-amber-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-amber-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($s2 / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-amber-600 dark:text-amber-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($s2 / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- S3 -->
                <div class="bg-gradient-to-br from-rose-50 to-rose-100 dark:from-rose-900/30 dark:to-rose-900/50 rounded-xl p-5 border border-rose-200 dark:border-rose-700/50">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-rose-400 to-rose-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <span class="text-white text-lg font-bold">S3</span>
                        </div>
                        <p class="text-sm font-medium text-rose-700 dark:text-rose-300 mb-1">Doktor (S3)</p>
                        <p class="text-2xl font-bold text-rose-800 dark:text-rose-100 mb-2">{{ number_format($s3, 0, ',', '.') }}</p>
                        <div class="w-full bg-rose-200 dark:bg-rose-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-rose-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($s3 / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-rose-600 dark:text-rose-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($s3 / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Work Statistics -->
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 mb-10">
            <div class="flex items-center mb-6">
                <svg class="w-8 h-8 text-rose-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A10 10 0 011.845 10.845 8.845 11.765 8.845 1-2 2 2 0 002-2 2v14a2 2 0 01-2 2h3a2 2 0 00-2 2 2.828 2 0 00-2 2 2v14a2 2 0 012 2 6-2 6-2 0 00-2 2z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-neutral-900 dark:text-white">Mata Pencaharian</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Petani -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/50 rounded-xl p-5 border border-green-200 dark:border-green-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h3a2 2 0 00-2 2h2a2 2 0 00-2 2v14a2 2 0 01-2 2V9a2 2 0 00-2 2h2a2 2 0 012 2h2a2 2 0 00-2 2zm0 0a2 2 0 012 2h2a2 2 0 01-2 2V7m2 13a2 2 0 002-2V9a2 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-green-700 dark:text-green-300 mb-1">Petani</p>
                        <p class="text-2xl font-bold text-green-800 dark:text-green-100 mb-2">{{ number_format($petani, 0, ',', '.') }}</p>
                        <div class="w-full bg-green-200 dark:bg-green-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-green-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($petani / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-green-600 dark:text-green-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($petani / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Nelayan -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/50 rounded-xl p-5 border border-blue-200 dark:border-cyan-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10H3v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-blue-700 dark:text-blue-300 mb-1">Nelayan</p>
                        <p class="text-2xl font-bold text-blue-800 dark:text-blue-100 mb-2">{{ number_format($nelayan, 0, ',', '.') }}</p>
                        <div class="w-full bg-blue-200 dark:bg-blue-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-blue-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($nelayan / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-blue-600 dark:text-blue-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($nelayan / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Wiraswasta -->
                <div class="bg-gradient-to-br from-violet-50 to-purple-100 dark:from-violet-900/30 dark:to-purple-900/50 rounded-xl p-5 border border-violet-200 dark:border-purple-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-violet-400 to-purple-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A10 10 0 011.845 10.845 8.845 11.765 8.845 1-2 2 2 0 002-2 2v14a2 2 0 01-2 2h3a2 2 0 00-2 2 2.828 2 0 00-2 2 2v14a2 2 0 012 2 6-2 6-2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-violet-700 dark:text-violet-300 mb-1">Wiraswasta</p>
                        <p class="text-2xl font-bold text-violet-800 dark:text-violet-100 mb-2">{{ number_format($wiraswasta, 0, ',', '.') }}</p>
                        <div class="w-full bg-violet-200 dark:bg-violet-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-violet-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($wiraswasta / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-violet-600 dark:text-violet-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($wiraswasta / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- PNS -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-100 dark:from-amber-900/30 dark:to-orange-900/50 rounded-xl p-5 border border-amber-200 dark:border-orange-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A10 10 0 011.845 10.845 8.845 11.765 8.845 1-2 2 2 0 002-2 2v14a2 2 0 01-2 2h3a2 2 0 00-2 2 2.828 2 0 00-2 2 2v14a2 2 0 012 2 6-2 6-2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-amber-700 dark:text-amber-300 mb-1">PNS</p>
                        <p class="text-2xl font-bold text-amber-800 dark:text-amber-100 mb-2">{{ number_format($pns, 0, ',', '.') }}</p>
                        <div class="w-full bg-amber-200 dark:bg-amber-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-amber-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($pns / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-amber-600 dark:text-amber-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($pns / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Religion Statistics -->
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 mb-10">
            <div class="flex items-center mb-6">
                <svg class="w-8 h-8 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.632L6 9.193L1.5 13.836L1.5 9.193L4.318 1.864A2 2 0 011.845 2 2 0 01-2 2V7a2 2 0 01-2 2.4.318 2 0 00-2 2 2.2.618 2 0 12 2l4.318 1.864A2 2 0 011.845 2 2 0 01-2 2V9a2 2 0 01-2 2 4.318 2 0 00-2 2zm0 0a2 2 0 012 2h2a2 2 0 012 2 6-2 0 00-2 2z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-neutral-900 dark:text-white">Agama</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                <!-- Islam -->
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/30 dark:to-emerald-900/50 rounded-xl p-5 border border-emerald-200 dark:border-emerald-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.282 15.636L1.364 17.636l-2-2H4v8H2v8l2-2H1.364l1.5 9.193L4.318 1.864A2 2 0 011.845 2 2 0 01-2 2V9a2 2 0 00-2 2.828 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-emerald-700 dark:text-emerald-300 mb-1">Islam</p>
                        <p class="text-2xl font-bold text-emerald-800 dark:text-emerald-100 mb-2">{{ number_format($islam, 0, ',', '.') }}</p>
                        <div class="w-full bg-emerald-200 dark:bg-emerald-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-emerald-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($islam / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-emerald-600 dark:text-emerald-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($islam / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Katolik -->
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900/30 dark:to-yellow-900/50 rounded-xl p-5 border border-yellow-200 dark:border-yellow-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.632L6 9.193L1.364 17.636l-2-2H4v8H2v8l2-2H1.364l1.5 9.193L4.318 1.864A2 2 0 011.845 2 2 0 01-2 2V9a2 2 0 00-2 2 2.828 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-yellow-700 dark:text-yellow-300 mb-1">Katolik</p>
                        <p class="text-2xl font-bold text-yellow-800 dark:text-yellow-100 mb-2">{{ number_format($katolik, 0, ',', '.') }}</p>
                        <div class="w-full bg-yellow-200 dark:bg-yellow-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-yellow-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($katolik / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-yellow-600 dark:text-yellow-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($katolik / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>

                <!-- Protestan -->
                <div class="bg-gradient-to-br from-pink-50 to-rose-100 dark:from-pink-900/30 dark:to-rose-900/50 rounded-xl p-5 border border-pink-200 dark:border-pink-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-rose-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.282 15.636L1.364 17.636l-2-2H4v8H2v8l2-2H1.364l1.5 9.193L4.318 1.864A2 2 0 011.845 2 2 0 01-2 2V7a2 2 0 00-2 2.828 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-pink-700 dark:text-pink-300 mb-1">Protestan</p>
                        <p class="text-2xl font-bold text-pink-800 dark:text-pink-100 mb-2">{{ number_format($protestan, 0, ',', '.') }}</p>
                        <div class="w-full bg-pink-200 dark:bg-pink-800 rounded-full h-2 overflow-hidden">
                            <div class="bg-pink-500 h-2 progress-bar" style="width: {{ $totalPenduduk > 0 ? ($protestan / $totalPenduduk * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-pink-600 dark:text-pink-400 mt-2">{{ number_format($totalPenduduk > 0 ? ($protestan / $totalPenduduk * 100) : 0, 1, ',', '.') }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dusun Distribution -->
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 mb-10">
            <div class="flex items-center mb-6">
                <svg class="w-8 h-8 text-cyan-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L16.5 14.486l-4-1.414 1.414L16.5 14.486l-4-1.414H19a2 2 0 00-2 2v16h18v-2H4l-4 4H2v14H1.364l16.5 14.486l-4-1.414H19a2 2 0 01-2 2V9a2 2 0 00-2 2h2a2 2 0 00-2 2zm0 0a2 2 0 012 2h2a2 2 0 01-2 2V7a2 2 0 01-2 2.828 2 0 00-2 2z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-neutral-900 dark:text-white">Distribusi per Dusun</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach($dusunList as $dusun)
                @php
                    $countDusun = \App\Models\Penduduk::where('dusun', $dusun)->count();
                    $percentage = $totalPenduduk > 0 ? ($countDusun / $totalPenduduk * 100) : 0;
                    // Extract roman numeral or number from dusun name
                    $dusunLabel = $dusun;
                @endphp
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/30 dark:to-cyan-900/50 rounded-xl p-5 border border-cyan-200 dark:border-cyan-700/50 hover:shadow-lg transition-shadow">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-cyan-700 mb-1">{{ $dusunLabel }}</p>
                        <p class="text-2xl font-bold text-cyan-800 mb-2">{{ number_format($countDusun, 0, ',', '.') }}</p>
                        <div class="w-full bg-cyan-200 rounded-full h-2 overflow-hidden">
                            <div class="bg-cyan-500 h-2 progress-bar" style="width: {{ $percentage }}%"></div>
                        </div>
                        <p class="text-xs text-cyan-600 mt-2">{{ number_format($percentage, 1, ',', '.') }}%</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-2xl p-8 shadow-2xl text-white relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-white/50 via-transparent to-transparent opacity-20"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-4">
                        <svg class="w-12 h-12 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 20h5v-2a3 3 0 00-2 2V6a2 2 0 00-2 2h2a2 2 0 002-2V7a2 2 0 01-2 2.828 2 0 00-2 2 2v14a2 2 0 012 2 6-2 6-2 0 00-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Update Terakhir</h3>
                    <p class="text-indigo-200 text-sm">{{ date('d F Y') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 rounded-2xl p-8 shadow-2xl text-white">
            <div class="flex items-center">
                <svg class="w-16 h-16 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.354a4 4 0 11-2.83 0 11-2.83 0 2.231 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7 7z"></path>
                </svg>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-teal-900">Data Real-Time</h3>
                    <p class="text-teal-600 text-sm">Statistik penduduk diperbarui secara otomatis</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-neutral-800 to-neutral-900 text-white border-t border-neutral-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <p class="text-neutral-400 text-sm">&copy; {{ date('Y') }} {{ config('app.name', 'SIMDESA') }}. Seluruh hak cipta dilindungi.</p>
                </div>
                <div>
                    <p class="text-neutral-400 text-sm">Dibuat dengan untuk kemajuan desa</p>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
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
            if (themeToggle) themeToggle.addEventListener('click', toggleTheme);
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() { mobileMenu.classList.toggle('hidden'); });
            }
        });
    </script>
</body>
</html>
