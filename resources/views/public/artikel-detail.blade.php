<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $artikel->judul }} - {{ config('app.name', 'SIMDESA') }}</title>
    <meta name="description" content="{{ strip_tags(substr($artikel->isi, 0, 160)) }}">
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

        /* WYSIWYG content styles */
        .wysiwyg-content {
            font-size: 1.125rem;
            line-height: 1.8;
        }

        .wysiwyg-content h1 {
            font-size: 2.25em;
            font-weight: 800;
            margin: 1.5em 0 0.75em 0;
            background: linear-gradient(135deg, #059669, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .wysiwyg-content h2 {
            font-size: 1.75em;
            font-weight: 700;
            margin: 1.25em 0 0.6em 0;
            color: #111827;
        }

        .dark .wysiwyg-content h2 {
            color: #f9fafb;
        }

        .wysiwyg-content h3 {
            font-size: 1.35em;
            font-weight: 600;
            margin: 1em 0 0.5em 0;
            color: #1f2937;
        }

        .dark .wysiwyg-content h3 {
            color: #e5e7eb;
        }

        .wysiwyg-content p {
            margin: 0.75em 0;
            color: #374151;
        }

        .dark .wysiwyg-content p {
            color: #d1d5db;
        }

        .wysiwyg-content ul, .wysiwyg-content ol {
            margin: 1em 0;
            padding-left: 1.75em;
        }

        .wysiwyg-content li {
            margin: 0.5em 0;
            color: #374151;
        }

        .dark .wysiwyg-content li {
            color: #d1d5db;
        }

        .wysiwyg-content li::marker {
            color: #059669;
        }

        .wysiwyg-content img {
            max-width: 100%;
            height: auto;
            border-radius: 1rem;
            margin: 2rem 0;
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.15);
        }

        .dark .wysiwyg-content img {
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5);
        }

        .wysiwyg-content blockquote {
            border-left: 4px solid #059669;
            padding: 1.25rem 1.5rem;
            margin: 1.5rem 0;
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: #065f46;
            font-style: italic;
            border-radius: 0 0.75rem 0.75rem 0;
            font-size: 1.05em;
        }

        .dark .wysiwyg-content blockquote {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(52, 211, 153, 0.05));
            color: #a7f3d0;
        }

        .wysiwyg-content pre {
            background: linear-gradient(135deg, #1f2937, #111827);
            color: #f9fafb;
            padding: 1.5rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            margin: 1.5rem 0;
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .wysiwyg-content code {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
            padding: 0.2em 0.5em;
            border-radius: 0.375rem;
            font-size: 0.9em;
            font-weight: 500;
        }

        .dark .wysiwyg-content code {
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.2), rgba(245, 158, 11, 0.1));
            color: #fcd34d;
        }

        .wysiwyg-content pre code {
            background: transparent;
            color: inherit;
            padding: 0;
        }

        .wysiwyg-content table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 2rem 0;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.1);
        }

        .wysiwyg-content table th,
        .wysiwyg-content table td {
            padding: 1rem 1.25rem;
            text-align: left;
        }

        .wysiwyg-content table th {
            background: linear-gradient(135deg, #059669, #0891b2);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875em;
            letter-spacing: 0.05em;
        }

        .wysiwyg-content table td {
            border-top: 1px solid #e5e7eb;
            color: #374151;
        }

        .dark .wysiwyg-content table td {
            border-top-color: #374151;
            color: #d1d5db;
        }

        .wysiwyg-content table tr:last-child td {
            border-bottom: none;
        }

        .wysiwyg-content a {
            color: #059669;
            text-decoration: none;
            font-weight: 500;
            border-bottom: 2px solid transparent;
            transition: border-color 0.2s;
        }

        .wysiwyg-content a:hover {
            border-bottom-color: #059669;
        }

        .dark .wysiwyg-content a {
            color: #10b981;
        }

        .dark .wysiwyg-content a:hover {
            border-bottom-color: #10b981;
        }

        /* Reading progress bar */
        #progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #059669, #0891b2);
            width: 0%;
            z-index: 9999;
            transition: width 0.1s;
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
    <!-- Reading Progress Bar -->
    <div id="progress-bar"></div>

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-neutral-900/80 backdrop-blur-lg border-b border-neutral-200/50 dark:border-neutral-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Back Button -->
                <a href="{{ route('public.portfolio') }}"
                   class="inline-flex items-center text-neutral-600 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center mr-3 group-hover:bg-emerald-100 dark:group-hover:bg-emerald-900/30 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Kembali</span>
                </a>

                <!-- Logo & Theme -->
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <span class="font-bold bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">
                            {{ config('app.name', 'SIMDESA') }}
                        </span>
                    </div>

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
        </div>
    </header>

    <!-- Breadcrumb -->
    <div class="bg-white/50 dark:bg-neutral-900/50 border-b border-neutral-200/50 dark:border-neutral-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex text-sm text-neutral-600 dark:text-neutral-400">
                <a href="{{ route('public.portfolio') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Beranda
                </a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-neutral-900 dark:text-white font-medium truncate max-w-xs">{{ $artikel->judul }}</span>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Article Header -->
        <article class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl overflow-hidden border border-neutral-200/50 dark:border-neutral-700/50">
            <!-- Featured Image -->
            @if($artikel->gambar)
                <div class="relative w-full h-64 md:h-96 lg:h-[450px] overflow-hidden bg-neutral-200 dark:bg-neutral-700">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}"
                         alt="{{ $artikel->judul }}"
                         class="w-full h-full object-cover">
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                </div>
            @endif

            <!-- Article Content -->
            <div class="p-6 md:p-10 lg:p-12">
                <!-- Category Badge -->
                <div class="mb-6">
                    <span class="inline-flex items-center px-4 py-1.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-sm font-semibold rounded-full shadow-md">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Artikel
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-neutral-900 dark:text-white mb-6 leading-tight">
                    {{ $artikel->judul }}
                </h1>

                <!-- Author Card -->
                <div class="flex flex-wrap items-center gap-4 p-4 bg-gradient-to-br from-neutral-50 to-neutral-100 dark:from-neutral-800/50 dark:to-neutral-900/50 rounded-xl mb-8 border border-neutral-200 dark:border-neutral-700">
                    <!-- Author -->
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full flex items-center justify-center shadow-lg flex-shrink-0">
                            <span class="text-white font-bold text-lg">{{ strtoupper(substr($artikel->penulis, 0, 1)) }}</span>
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Penulis</p>
                            <p class="font-semibold text-neutral-900 dark:text-white truncate">{{ $artikel->penulis }}</p>
                        </div>
                    </div>

                    <!-- Divider (hidden on mobile) -->
                    <div class="hidden sm:block w-px h-10 bg-neutral-300 dark:bg-neutral-600"></div>

                    <!-- Date -->
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-full flex items-center justify-center shadow-lg flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Tanggal</p>
                            <p class="font-semibold text-neutral-900 dark:text-white truncate">{{ \Carbon\Carbon::parse($artikel->tanggal)->locale('id')->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>

                    <!-- Divider (hidden on mobile) -->
                    <div class="hidden sm:block w-px h-10 bg-neutral-300 dark:bg-neutral-600"></div>

                    <!-- Publish Time -->
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center shadow-lg flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Dipublikasikan</p>
                            <p class="font-semibold text-neutral-900 dark:text-white truncate">{{ \Carbon\Carbon::parse($artikel->created_at)->locale('id')->translatedFormat('H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="h-px bg-gradient-to-r from-transparent via-neutral-300 dark:via-neutral-600 to-transparent mb-8"></div>

                <!-- Article Body -->
                <div class="wysiwyg-content">
                    {!! $artikel->isi !!}
                </div>

                <!-- Share Section -->
                <div class="mt-12 pt-8 border-t border-neutral-200 dark:border-neutral-700">
                    <p class="text-sm font-semibold text-neutral-700 dark:text-neutral-300 mb-4">Bagikan artikel ini:</p>
                    <div class="flex flex-wrap gap-3">
                        <button onclick="navigator.share({title: '{{ $artikel->judul }}', url: window.location.href})" class="inline-flex items-center px-4 py-2 bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 text-neutral-700 dark:text-neutral-300 rounded-lg transition-all text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                            </svg>
                            Share
                        </button>
                        <button onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank')" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </button>
                        <button onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent('{{ $artikel->judul }}') + '&url=' + encodeURIComponent(window.location.href), '_blank')" class="inline-flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-all text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Twitter
                        </button>
                        <button onclick="navigator.clipboard.writeText(window.location.href); this.textContent='Copied!'; setTimeout(() => this.textContent='Copy Link', 2000);" class="inline-flex items-center px-4 py-2 bg-neutral-100 dark:bg-neutral-800 hover:bg-neutral-200 dark:hover:bg-neutral-700 text-neutral-700 dark:text-neutral-300 rounded-lg transition-all text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                            </svg>
                            Copy Link
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        @if($relatedArtikels->count() > 0)
            <section class="mt-16">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-neutral-900 dark:text-white">
                        Artikel Terkait
                    </h2>
                    <a href="{{ route('public.portfolio') }}" class="hidden sm:inline-flex items-center text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 font-medium transition-colors">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedArtikels as $related)
                        <article class="bg-white dark:bg-neutral-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                            @if($related->gambar)
                                <div class="aspect-video overflow-hidden bg-neutral-200 dark:bg-neutral-700">
                                    <img src="{{ asset('storage/' . $related->gambar) }}"
                                         alt="{{ $related->judul }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                         onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gradient-to-br from-emerald-400 to-teal-500\'><svg class=\'w-12 h-12 text-white\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z\'></path></svg></div>'">
                                </div>
                            @else
                                <div class="aspect-video overflow-hidden bg-gradient-to-br from-emerald-400 via-teal-500 to-cyan-600 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                            @endif

                            <div class="p-5">
                                <h3 class="font-bold text-neutral-900 dark:text-white mb-2 line-clamp-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                    <a href="{{ route('public.artikel.show', $related->id) }}">
                                        {{ $related->judul }}
                                    </a>
                                </h3>
                                <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-4 line-clamp-2">
                                    {{ strip_tags(substr($related->isi, 0, 80)) }}...
                                </p>
                                <a href="{{ route('public.artikel.show', $related->id) }}"
                                   class="inline-flex items-center text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 transition-colors">
                                    Baca Artikel
                                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-neutral-800 border-t border-neutral-200 dark:border-neutral-700 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row justify-between items-center text-neutral-600 dark:text-neutral-400">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-neutral-900 dark:text-white">{{ config('app.name', 'SIMDESA') }}</p>
                        <p class="text-sm">Sistem Informasi Desa</p>
                    </div>
                </div>
                <p class="text-sm">&copy; {{ date('Y') }} {{ config('app.name', 'SIMDESA') }}. Dibuat dengan ❤️ untuk kemajuan desa</p>
            </div>
        </div>
    </footer>

    @livewireScripts

    <!-- Theme Toggle & Progress Bar Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Theme Toggle
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

            // Reading Progress Bar
            const progressBar = document.getElementById('progress-bar');

            function updateProgress() {
                const scrollTop = window.scrollY;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const progress = (scrollTop / docHeight) * 100;
                progressBar.style.width = progress + '%';
            }

            window.addEventListener('scroll', updateProgress);
            updateProgress();
        });
    </script>
</body>
</html>
