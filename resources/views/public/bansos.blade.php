<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bantuan Sosial - {{ config('app.name', 'SIMDESA') }}</title>
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

        /* Hero Slideshow */
        .hero-slideshow {
            position: relative;
            height: 420px;
            overflow: hidden;
        }
        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.04);
            transition: opacity 1.2s ease-in-out, transform 6s ease-in-out;
        }
        .hero-slide.active { opacity: 1; transform: scale(1); }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,20,20,0.6) 60%, rgba(0,40,30,0.8) 100%);
        }
        .hero-content {
            position: relative;
            z-index: 10;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 1.5rem;
        }
        .hero-dot { width:8px;height:8px;border-radius:50%;background:rgba(255,255,255,0.45);border:2px solid rgba(255,255,255,0.6);cursor:pointer;transition:all 0.3s; }
        .hero-dot.active { background:#fff;width:24px;border-radius:6px; }
        .hero-badge { display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.3);color:#fff;font-size:12px;font-weight:600;padding:6px 16px;border-radius:999px;letter-spacing:0.05em;text-transform:uppercase;margin-bottom:16px; }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-slate-50 via-neutral-50 to-slate-100 dark:from-neutral-900 dark:via-neutral-900 dark:to-neutral-950 min-h-screen">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-neutral-900/80 backdrop-blur-lg border-b border-neutral-200/50 dark:border-neutral-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
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
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Profil Desa</a>
                    <a href="{{ route('public.penduduk') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Penduduk</a>
                    <a href="{{ route('public.fasilitas') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Fasilitas</a>
                    <a href="{{ route('public.bansos') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Bansos</a>
                </nav>
                <div class="flex items-center space-x-3">
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-xl bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-all">
                        <svg class="w-5 h-5 text-neutral-700 dark:text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <button id="theme-toggle" class="p-2.5 rounded-xl bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-all shadow-sm hover:shadow">
                        <svg class="w-5 h-5 text-neutral-700 dark:text-neutral-300 dark:hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg class="w-5 h-5 text-neutral-300 hidden dark:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <nav class="flex flex-col space-y-1">
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Profil Desa</a>
                    <a href="{{ route('public.penduduk') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Penduduk</a>
                    <a href="{{ route('public.fasilitas') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Fasilitas</a>
                    <a href="{{ route('public.bansos') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Bansos</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section - Slideshow -->
    <section class="hero-slideshow">
        <div class="hero-slide active" style="background-image:url('{{ asset('img/hero1.jpeg') }}')"></div>
        <div class="hero-slide"        style="background-image:url('{{ asset('img/hero2.jpeg') }}')"></div>
        <div class="hero-slide"        style="background-image:url('{{ asset('img/hero3.jpeg') }}')"></div>
        <div class="hero-slide"        style="background-image:url('{{ asset('img/hero4.jpeg') }}')"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 7H4a2 2 0 00-2 2v6a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg> Bantuan Sosial</div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 drop-shadow-lg" style="text-shadow:0 2px 20px rgba(0,0,0,0.4)">Bantuan Sosial</h2>
            <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto mb-8 drop-shadow" style="text-shadow:0 1px 10px rgba(0,0,0,0.4)">Informasi penyaluran bantuan sosial bagi warga Desa Lamahala Jaya</p>
            <div class="flex items-center gap-2">
                <button class="hero-dot active" onclick="goToSlide(0)" aria-label="Slide 1"></button>
                <button class="hero-dot"        onclick="goToSlide(1)" aria-label="Slide 2"></button>
                <button class="hero-dot"        onclick="goToSlide(2)" aria-label="Slide 3"></button>
                <button class="hero-dot"        onclick="goToSlide(3)" aria-label="Slide 4"></button>
            </div>
        </div>
        <button onclick="changeSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 backdrop-blur-sm border border-white/30 flex items-center justify-center transition-all" aria-label="Previous">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button onclick="changeSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 backdrop-blur-sm border border-white/30 flex items-center justify-center transition-all" aria-label="Next">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </button>
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>
    </section>

    <!-- Stats -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white dark:bg-neutral-800 rounded-2xl p-6 shadow-lg border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                <div class="text-4xl font-bold text-emerald-600 mb-2">{{ \App\Models\Bansos::count() }}</div>
                <div class="text-neutral-600 dark:text-neutral-400">Total Penerima</div>
            </div>
            <div class="bg-white dark:bg-neutral-800 rounded-2xl p-6 shadow-lg border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                <div class="text-4xl font-bold text-emerald-600 mb-2">{{ \App\Models\Bansos::where('status', 'Disalurkan')->count() }}</div>
                <div class="text-neutral-600 dark:text-neutral-400">Sudah Disalurkan</div>
            </div>
            <div class="bg-white dark:bg-neutral-800 rounded-2xl p-6 shadow-lg border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">{{ \App\Models\Bansos::distinct('jenis')->count('jenis') }}</div>
                <div class="text-neutral-600 dark:text-neutral-400">Jenis Bansos</div>
            </div>
        </div>

        <!-- Table -->
        @php
            $search = request()->get('search');
            $query = \App\Models\Bansos::with('penduduk')->orderBy('created_at', 'desc');

            if ($search) {
                $query->whereHas('penduduk', function($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
            }

            $bansosList = $query->paginate(10);
        @endphp
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 border border-neutral-200/50 dark:border-neutral-700/50">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <h3 class="text-2xl font-bold text-neutral-900 dark:text-white">Daftar Penerima Bansos</h3>

                <!-- Search Form -->
                <form method="GET" action="{{ route('public.bansos') }}" class="flex-1 md:max-w-md">
                    <div class="relative">
                        <input type="text"
                               name="search"
                               placeholder="Cari nama penerima..."
                               value="{{ request()->get('search') }}"
                               class="w-full px-4 py-2.5 pl-10 pr-12 rounded-xl border border-neutral-300 dark:border-neutral-600 bg-white dark:bg-neutral-700 text-neutral-900 dark:text-white placeholder-neutral-400 dark:placeholder-neutral-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        @if(request()->get('search'))
                        <a href="{{ route('public.bansos') }}" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600 dark:hover:text-neutral-300 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-neutral-200 dark:border-neutral-700">
                            <th class="text-left py-3 px-4 font-semibold text-neutral-900 dark:text-white">No</th>
                            <th class="text-left py-3 px-4 font-semibold text-neutral-900 dark:text-white">Nama</th>
                            <th class="text-left py-3 px-4 font-semibold text-neutral-900 dark:text-white">Jenis Bansos</th>
                            <th class="text-left py-3 px-4 font-semibold text-neutral-900 dark:text-white">Tanggal</th>
                            <th class="text-left py-3 px-4 font-semibold text-neutral-900 dark:text-white">Jumlah</th>
                            <th class="text-left py-3 px-4 font-semibold text-neutral-900 dark:text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bansosList as $bansos)
                        <tr class="border-b border-neutral-100 dark:border-neutral-800 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                            <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">{{ $loop->index + $bansosList->firstItem() }}</td>
                            <td class="py-3 px-4 text-neutral-900 dark:text-white font-medium">{{ $bansos->penduduk->nama ?? '-' }}</td>
                            <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">{{ $bansos->jenis }}</td>
                            <td class="py-3 px-4 text-neutral-600 dark:text-neutral-400">{{ \Carbon\Carbon::parse($bansos->tanggal_penyaluran)->isoFormat('D MMMM Y') }}</td>
                            <td class="py-3 px-4 text-neutral-900 dark:text-white font-medium">Rp {{ number_format($bansos->jumlah, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($bansos->status == 'Disalurkan') bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400
                                    @elseif($bansos->status == 'Pending') bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @elseif($bansos->status == 'Proses') bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400
                                    @else bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 @endif">
                                    {{ $bansos->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($bansosList->hasPages())
            <div class="mt-6">
                {{ $bansosList->links('pagination::tailwind') }}
            </div>
            @endif

            <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-4">* Menampilkan {{ $bansosList->firstItem() ?? 0 }} - {{ $bansosList->lastItem() ?? 0 }} dari total {{ $bansosList->total() }} penerima bansos</p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-neutral-800 border-t border-neutral-200 dark:border-neutral-700 mt-16 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-neutral-600 dark:text-neutral-400">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'SIMDESA') }}. Dibuat dengan â¤ï¸ untuk kemajuan desa</p>
        </div>
    </footer>

    
    <!-- Hero Slideshow Script -->
    <script>
        var heroCurrentSlide = 0, heroTotal = 4, heroTimer = null;
        function goToSlide(i) {
            document.querySelectorAll(".hero-slide")[heroCurrentSlide].classList.remove("active");
            document.querySelectorAll(".hero-dot")[heroCurrentSlide].classList.remove("active");
            heroCurrentSlide = (i + heroTotal) % heroTotal;
            document.querySelectorAll(".hero-slide")[heroCurrentSlide].classList.add("active");
            document.querySelectorAll(".hero-dot")[heroCurrentSlide].classList.add("active");
        }
        function changeSlide(d) { goToSlide(heroCurrentSlide + d); resetTimer(); }
        function resetTimer() { clearInterval(heroTimer); heroTimer = setInterval(function(){ goToSlide(heroCurrentSlide+1); }, 5000); }
        document.addEventListener("DOMContentLoaded", function(){ resetTimer(); });
    </script>
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
