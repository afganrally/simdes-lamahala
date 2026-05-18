<div>
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-primary-300 to-primary-500 rounded-2xl p-8 mb-8 text-white shadow-xl animate-in">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
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
                        Anda login sebagai <span class="font-semibold">{{ ucfirst(str_replace('_', ' ', Auth::user()->role ?? 'user')) }}</span> • {{ Auth::user()->username }}
                    </p>
                </div>
            </div>

            @if (Auth::user()->role === 'kepala_desa')
                <div class="flex-shrink-0">
                    <div class="h-40 w-40 bg-white p-2 rounded-2xl shadow-inner overflow-hidden">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="h-full w-full object-cover rounded-xl">
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if (Auth::user()->role === 'kepala_desa')
        <!-- KEPALA DESA DASHBOARD (CHARTS) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card p-6 slide-up">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200">Total Penduduk</h3>
                    <span class="p-2 bg-blue-100 text-blue-600 rounded-lg dark:bg-blue-900/30 dark:text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </span>
                </div>
                <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ number_format($totalPenduduk) }}</p>
            </div>
            
            <div class="card p-6 slide-up" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200">Total Fasilitas</h3>
                    <span class="p-2 bg-green-100 text-green-600 rounded-lg dark:bg-green-900/30 dark:text-green-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </span>
                </div>
                <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ number_format($totalFasilitas) }}</p>
            </div>
            
            <div class="card p-6 slide-up" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200">Data Bansos</h3>
                    <span class="p-2 bg-amber-100 text-amber-600 rounded-lg dark:bg-amber-900/30 dark:text-amber-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </span>
                </div>
                <p class="text-3xl font-bold text-neutral-900 dark:text-white">{{ number_format($totalBansos) }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="card p-6 slide-up" style="animation-delay: 0.3s">
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200 mb-4">Penduduk Berdasarkan Agama</h3>
                <div id="chart-agama" class="w-full min-h-[300px]"></div>
            </div>
            
            <div class="card p-6 slide-up" style="animation-delay: 0.4s">
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200 mb-4">Penduduk Berdasarkan Gender</h3>
                <div id="chart-gender" class="w-full min-h-[300px]"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="card p-6 slide-up" style="animation-delay: 0.5s">
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200 mb-4">Status Bantuan Sosial</h3>
                <div id="chart-bansos" class="w-full min-h-[300px]"></div>
            </div>
            
            <div class="card p-6 slide-up" style="animation-delay: 0.6s">
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200 mb-4">Kondisi Fasilitas Desa</h3>
                <div id="chart-fasilitas" class="w-full min-h-[300px]"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="card p-6 slide-up" style="animation-delay: 0.7s">
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200 mb-4">Penduduk Berdasarkan Dusun</h3>
                <div id="chart-dusun" class="w-full min-h-[300px]"></div>
            </div>
            
            <div class="card p-6 slide-up" style="animation-delay: 0.8s">
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200 mb-4">Status Tinggal Penduduk</h3>
                <div id="chart-status-tinggal" class="w-full min-h-[300px]"></div>
            </div>
        </div>

        <script>
            // Jalankan saat view sudah dirender penuh (Livewire)
            document.addEventListener('livewire:navigated', initCharts);
            document.addEventListener('DOMContentLoaded', initCharts);

            function initCharts() {
                // Tunggu sebentar sampai Alpine/Vite me-load library
                setTimeout(() => {
                    if(typeof window.ApexCharts === 'undefined') return;

                    const isDark = document.documentElement.classList.contains('dark');
                    const textColor = isDark ? '#f3f4f6' : '#1f2937';

                    // Chart Agama (Pie)
                    const agamaData = @json($pendudukByAgama ?? []);
                    const optionsAgama = {
                        series: Object.values(agamaData),
                        labels: Object.keys(agamaData),
                        chart: { type: 'pie', height: 320, background: 'transparent' },
                        theme: { mode: isDark ? 'dark' : 'light' },
                        legend: { position: 'bottom' }
                    };
                    const chartAgamaEl = document.querySelector("#chart-agama");
                    if(chartAgamaEl) {
                        chartAgamaEl.innerHTML = "";
                        new window.ApexCharts(chartAgamaEl, optionsAgama).render();
                    }

                    // Chart Gender (Donut)
                    const genderData = @json($pendudukByGender ?? []);
                    const genderLabels = Object.keys(genderData).map(k => k === 'L' ? 'Laki-Laki' : (k === 'P' ? 'Perempuan' : k));
                    const optionsGender = {
                        series: Object.values(genderData),
                        labels: genderLabels,
                        chart: { type: 'donut', height: 320, background: 'transparent' },
                        theme: { mode: isDark ? 'dark' : 'light', palette: 'palette2' },
                        legend: { position: 'bottom' }
                    };
                    const chartGenderEl = document.querySelector("#chart-gender");
                    if(chartGenderEl) {
                        chartGenderEl.innerHTML = "";
                        new window.ApexCharts(chartGenderEl, optionsGender).render();
                    }

                    // Chart Bansos (Bar)
                    const bansosData = @json($bansosByStatus ?? []);
                    const optionsBansos = {
                        series: [{ name: 'Jumlah', data: Object.values(bansosData) }],
                        chart: { type: 'bar', height: 320, toolbar: { show: false }, background: 'transparent' },
                        theme: { mode: isDark ? 'dark' : 'light' },
                        xaxis: { categories: Object.keys(bansosData) },
                        colors: ['#0ea5e9']
                    };
                    const chartBansosEl = document.querySelector("#chart-bansos");
                    if(chartBansosEl) {
                        chartBansosEl.innerHTML = "";
                        new window.ApexCharts(chartBansosEl, optionsBansos).render();
                    }

                    // Chart Fasilitas (Bar)
                    const fasilitasData = @json($fasilitasByKondisi ?? []);
                    const fasLabels = Object.keys(fasilitasData).map(k => k.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase()));
                    const optionsFasilitas = {
                        series: [{ name: 'Jumlah', data: Object.values(fasilitasData) }],
                        chart: { type: 'bar', height: 320, toolbar: { show: false }, background: 'transparent' },
                        theme: { mode: isDark ? 'dark' : 'light' },
                        xaxis: { categories: fasLabels },
                        plotOptions: { bar: { borderRadius: 4, horizontal: true } },
                        colors: ['#10b981']
                    };
                    const chartFasilitasEl = document.querySelector("#chart-fasilitas");
                    if(chartFasilitasEl) {
                        chartFasilitasEl.innerHTML = "";
                        new window.ApexCharts(chartFasilitasEl, optionsFasilitas).render();
                    }

                    // Chart Dusun (Bar)
                    const dusunData = @json($pendudukByDusun ?? []);
                    const optionsDusun = {
                        series: [{ name: 'Jumlah', data: Object.values(dusunData) }],
                        chart: { type: 'bar', height: 320, toolbar: { show: false }, background: 'transparent' },
                        theme: { mode: isDark ? 'dark' : 'light' },
                        xaxis: { categories: Object.keys(dusunData) },
                        colors: ['#8b5cf6']
                    };
                    const chartDusunEl = document.querySelector("#chart-dusun");
                    if(chartDusunEl) {
                        chartDusunEl.innerHTML = "";
                        new window.ApexCharts(chartDusunEl, optionsDusun).render();
                    }

                    // Chart Status Tinggal (Donut)
                    const statusTinggalData = @json($pendudukByStatusTinggal ?? []);
                    const optionsStatusTinggal = {
                        series: Object.values(statusTinggalData),
                        labels: Object.keys(statusTinggalData),
                        chart: { type: 'donut', height: 320, background: 'transparent' },
                        theme: { mode: isDark ? 'dark' : 'light', palette: 'palette3' },
                        legend: { position: 'bottom' }
                    };
                    const chartStatusTinggalEl = document.querySelector("#chart-status-tinggal");
                    if(chartStatusTinggalEl) {
                        chartStatusTinggalEl.innerHTML = "";
                        new window.ApexCharts(chartStatusTinggalEl, optionsStatusTinggal).render();
                    }
                }, 100);
            }
        </script>
    @else
        <!-- STANDARD USER / ADMIN DASHBOARD -->
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
                                    {{ ucfirst(str_replace('_', ' ', Auth::user()->role ?? 'user')) }}
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4v2m0 2a2 2 0 100 4m-6 8a2 2 0 100-4m0 4v2m0-2a2 2 0 100-4m0-4v2m0 2a2 2 0 100 4"></path>
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
                    window.location.href = '/profile';
                });

                Livewire.on('openSettings', () => {
                    window.location.href = '/settings';
                });

                Livewire.on('openActivity', () => {
                    window.location.href = '/activity';
                });
            });
        </script>
    @endif
</div>
