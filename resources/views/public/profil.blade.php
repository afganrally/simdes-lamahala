<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil Desa - {{ config('app.name', 'SIMDESA') }}</title>
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

        .hero-gradient {
            background: linear-gradient(-45deg, #0d9488, #059669, #0891b2, #06b6d4);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-slate-50 via-neutral-50 to-slate-100 dark:from-neutral-900 dark:via-neutral-900 dark:to-neutral-950 min-h-screen">
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
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Profil Desa</a>
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
                    <a href="{{ route('public.portfolio') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg">Profil Desa</a>
                    <a href="{{ route('public.penduduk') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Penduduk</a>
                    <a href="{{ route('public.fasilitas') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Fasilitas</a>
                    <a href="{{ route('public.bansos') }}" class="px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 hover:text-emerald-600 dark:hover:text-emerald-400 hover:bg-neutral-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">Bansos</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient relative overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Profil Desa</h2>
                <p class="text-xl text-emerald-100 max-w-2xl mx-auto">Mengenal lebih dekat desa kami, sejarah, visi, misi, dan struktur organisasi</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Sejarah Desa -->
        <section class="mb-16">
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 md:p-12 border border-neutral-200/50 dark:border-neutral-700/50">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 dark:text-white">Sejarah Desa</h3>
                </div>
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-xl p-6 mb-6 border-l-4 border-emerald-500">
                        <p class="text-neutral-800 dark:text-neutral-200 font-semibold text-lg leading-relaxed mb-0">
                            Sejarah terbentuknya Desa Lamahala Jaya tidak terpisahkan dari sejarah terbentuknya Kecamatan Adonara Timur yakni berdasarkan Surat Keputusan Gubernur Kepala Daerah Tingkat I Nusa Tenggara Timur Tanggal 28 Februari 1982.
                        </p>
                    </div>

                    <h4 class="text-xl font-bold text-neutral-900 dark:text-white mt-8 mb-4">Asal Usul Desa</h4>
                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Alkisah pada Zaman dahulu terdapat Suku Lewaha dari Sumatera dengan peradaban masih sangat sederhana mendiami wilayah yang ketika itu bernama Watan Girek. Konon dalam perjalanan waktu, berbagai sukupun berdatangan. Mereka diantaranya dari Cina, Jawa, Sulawesi, Buton, Daratan Flores, Lembata, Alor, bahkan Kepulauan Maluku dan lain-lainnya termasuk Ata Ile Jadi.
                    </p>

                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed mt-4">
                        Melihat keadaan tersebut, maka oleh sesepuh Adat Suku Lewaha, yakni <strong>Raja Pati Pelang</strong> menghimpun suku-suku yang ada demi terbentuknya sebuah desa. Rombongan suku-suku tersebutpun menyetujuinya. Setelah itu merekapun sepakat mencari sebuah nama untuk desanya dan terjawab dengan nama <em>"Lewo Salam Lamahala Tanah Girek Watan Sare"</em>, dengan sebutan <strong>Lewo Tanah Lamahala</strong>.
                    </p>

                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed mt-4">
                        Setelah menemui nama tersebut, oleh Raja Pati Pelang menawarkan lagi untuk mencari seorang pemimpinnya, dengan mengajukan nama-nama calon dari masing-masing suku. Namun utusan calon dari semua suku menolak jadi pemimpinnya dengan alasan bahwa mereka sudah memiliki keahlian lain dan pada bidangnya masing-masing. Merekapun menawarkan kepada Raja Pati Pelang namun Beliaupun menolak dengan alasan Beliau adalah orang pendatang dari negeri yang sangat jauh.
                    </p>

                    <div class="bg-amber-50 dark:bg-amber-900/20 rounded-xl p-6 my-6 border-l-4 border-amber-500">
                        <p class="text-neutral-800 dark:text-neutral-200 italic leading-relaxed mb-0">
                            Akhirnya kepada Rombongan <strong>Ata Ile Jadi – Woka Sura Kamolu Wato Pukan</strong>, ditunjuk dan harus menerima dengan alasan bahwa, <em>"Mio Ata Ile Jadi Woka Sura, maka Mio amut buno doro doan, Mio lolon tawa bage lela, miolah yang pantas ma'an pehen Lewo Tanah"</em>.
                        </p>
                    </div>

                    <h4 class="text-xl font-bold text-neutral-900 dark:text-white mt-8 mb-4">Struktur Pemerintahan Adat</h4>
                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Dalam perjalanan selanjutnya tata keperintahan Desa Lamahala Jaya berdasarkan Pemerintahan Adat yang terdiri dari <strong>Bela Suku Tello – Kapitan Pulo dan Pegawe Lema</strong>. Adapun Bela Suku Tello, merupakan pimpinan utama dengan membidangi urusan masing-masing namun tetap dalam bingkai Kesatuan Bela (Tobo sama lere – Dei sama belolo).
                    </p>

                    <div class="grid md:grid-cols-3 gap-4 my-6">
                        <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-xl p-4 border border-emerald-200 dark:border-emerald-800">
                            <h5 class="font-bold text-emerald-800 dark:text-emerald-300 mb-2">1. Suku Atapukan</h5>
                            <p class="text-neutral-600 dark:text-neutral-400 text-sm">Bela Urusan Adat Lewo Tanah</p>
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-4 border border-blue-200 dark:border-blue-800">
                            <h5 class="font-bold text-blue-800 dark:text-blue-300 mb-2">2. Suku Malakalu</h5>
                            <p class="text-neutral-600 dark:text-neutral-400 text-sm">Bela Kuat Kemuha (Panglima Perang)</p>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-xl p-4 border border-purple-200 dark:border-purple-800">
                            <h5 class="font-bold text-purple-800 dark:text-purple-300 mb-2">3. Suku Selolong</h5>
                            <p class="text-neutral-600 dark:text-neutral-400 text-sm">Bela Raja</p>
                        </div>
                    </div>

                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Sedangkan Kapitan Pulo membantu urusan Belanya masing-masing dalam kehidupan sosial masyarakat dan Pegawe Lema melayani urusan Agama Islam. Struktur inilah sampai dengan saat ini menjadi tata kepemerintahan Adat Lamahala Jaya.
                    </p>

                    <h4 class="text-xl font-bold text-neutral-900 dark:text-white mt-8 mb-4">Perkembangan Desa</h4>
                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Masa berganti masa, Kerajaan Lamahala terus berkembang dan menjadi Hamente Lamahala yang berkedudukan di Waiwerang Kota sampai Tahun 1925. Namun karena Politik Penjajah Belanda maka dileburkan kedalam Swapraja Adonara maka Lamahala pun kehilangan hak.
                    </p>

                    <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed mt-4">
                        Sampai dengan tahun 1962, Gubernur Kepala Daerah Tingkat I Nusa Tenggara Timur mengeluarkan Surat Keputusan Nomor Pem.66/1/33 Tanggal 28 Februari 1962 dan Instruksi Gubernur Nusa Tenggara Timur No. Und.2/I/27 Tanggal 04 November 1964 tentang Pembentukan Desa Gaya Baru. Desa Lamahala Jaya saat itu terbentuk dari beberapa perkampungan yakni Kampung Selolong, Gorang, Atamua, Bunga Lolong dan Lamuda yang dipimpin oleh Bapak Muhidin Boli Malakalu sebagai Kepala Desa.
                    </p>

                    <h4 class="text-xl font-bold text-neutral-900 dark:text-white mt-8 mb-4">Daftar Kepala Desa</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-neutral-100 dark:bg-neutral-700">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-900 dark:text-white border-b-2 border-emerald-500">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-900 dark:text-white border-b-2 border-emerald-500">Nama Kepala Desa</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-900 dark:text-white border-b-2 border-emerald-500">Periode</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">1</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Muhidin Boli Malakalu</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">1971 - 1976</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">2</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Usman Samsudin</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">1977 - 1982</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">3</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Saleh H. Kasim</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">1983 - 1993</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">4</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Abdurahim Jafar</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">1994 - 1999</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">5</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Bukhari Umar</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">2001 - 2002</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50 bg-amber-50 dark:bg-amber-900/20">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">6</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Muhammad Abduh <span class="text-xs bg-amber-200 dark:bg-amber-800 text-amber-800 dark:text-amber-200 px-2 py-0.5 rounded-full ml-2">Penjabat</span></td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">2002 – 2004</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">7</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Muhammad Abduh</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">2005 – 2010</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">8</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Ahmad Daud</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">2010 – 2016</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50 bg-amber-50 dark:bg-amber-900/20">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">9</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Abubakar Sidik Bethan <span class="text-xs bg-amber-200 dark:bg-amber-800 text-amber-800 dark:text-amber-200 px-2 py-0.5 rounded-full ml-2">Penjabat</span></td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">2016</td>
                                </tr>
                                <tr class="border-b border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">10</td>
                                    <td class="px-4 py-3 text-neutral-900 dark:text-white font-medium">Muhammad Abduh</td>
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400">2017 - 2023</td>
                                </tr>
                                <tr class="bg-emerald-50 dark:bg-emerald-900/30 border-l-4 border-emerald-500">
                                    <td class="px-4 py-3 text-neutral-600 dark:text-neutral-400 font-bold">11</td>
                                    <td class="px-4 py-3 text-emerald-800 dark:text-emerald-300 font-bold">Abubakar Hasan <span class="text-xs bg-emerald-200 dark:bg-emerald-800 text-emerald-800 dark:text-emerald-200 px-2 py-0.5 rounded-full ml-2">Penjabat</span></td>
                                    <td class="px-4 py-3 text-emerald-700 dark:text-emerald-400 font-bold">2024 - 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi & Misi -->
        <section class="mb-16 grid md:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-xl p-8 text-white">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">Visi</h3>
                </div>
                <p class="text-lg leading-relaxed text-emerald-50">
                    "Merajut potret hidup dan kehidupan masyarakat Lamahala yang bermartabat dan berdaya saing sebagai spirit membangun dengan mengedepankan nilai-nilai gotong royong, rasa saling percaya diri, kerja sama, persaudaraan, kekeluargaan, toleransi, kesetiakawanan, serta memiliki rasa cinta kasih di bawah naungan payung adat dan budaya lewotanah yakni <em>'puin taan uin tou..gahan taan kahan eha'</em>."
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 border border-neutral-200/50 dark:border-neutral-700/50">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral-900 dark:text-white">Misi</h3>
                </div>
                <p class="text-neutral-600 dark:text-neutral-400 mb-4 italic">
                    Untuk merealisasikan visi tersebut, Desa Lamahala Jaya menetapkan 4 pilar misi utama:
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start bg-gradient-to-r from-emerald-50 to-transparent dark:from-emerald-900/20 dark:to-transparent p-4 rounded-xl border-l-4 border-emerald-500">
                        <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center mr-4 mt-0.5 flex-shrink-0">
                            <span class="text-white font-bold text-sm">1</span>
                        </div>
                        <span class="text-neutral-700 dark:text-neutral-300 font-medium">Meningkatkan kualitas sumber daya manusia dalam bidang ekonomi dan sosial.</span>
                    </li>
                    <li class="flex items-start bg-gradient-to-r from-blue-50 to-transparent dark:from-blue-900/20 dark:to-transparent p-4 rounded-xl border-l-4 border-blue-500">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mr-4 mt-0.5 flex-shrink-0">
                            <span class="text-white font-bold text-sm">2</span>
                        </div>
                        <span class="text-neutral-700 dark:text-neutral-300 font-medium">Mengimplementasikan pola pembangunan partisipatif, dengan melibatkan masyarakat secara aktif dalam proses pelaksanaan pembangunan desa.</span>
                    </li>
                    <li class="flex items-start bg-gradient-to-r from-purple-50 to-transparent dark:from-purple-900/20 dark:to-transparent p-4 rounded-xl border-l-4 border-purple-500">
                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mr-4 mt-0.5 flex-shrink-0">
                            <span class="text-white font-bold text-sm">3</span>
                        </div>
                        <span class="text-neutral-700 dark:text-neutral-300 font-medium">Mewujudkan tata pemerintahan yang baik, berbasis prinsip transparansi, partisipatif, akuntabilitas publik, dan membangun sinergi antara pemerintah desa dan lembaga adat.</span>
                    </li>
                    <li class="flex items-start bg-gradient-to-r from-amber-50 to-transparent dark:from-amber-900/20 dark:to-transparent p-4 rounded-xl border-l-4 border-amber-500">
                        <div class="w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center mr-4 mt-0.5 flex-shrink-0">
                            <span class="text-white font-bold text-sm">4</span>
                        </div>
                        <span class="text-neutral-700 dark:text-neutral-300 font-medium">Memperkuat dan menata kembali nilai-nilai budaya, adat istiadat, dan kearifan lokal, serta memperkuat kelembagaan masyarakat sebagai mitra dalam pembangunan desa.</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Wilayah & Demografi -->
        <section class="mb-16">
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-lg p-6 border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">150 Ha</h4>
                    <p class="text-neutral-600 dark:text-neutral-400">Luas Wilayah</p>
                </div>

                <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-lg p-6 border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">{{ \App\Models\Penduduk::count() }}</h4>
                    <p class="text-neutral-600 dark:text-neutral-400">Total Penduduk</p>
                </div>

                <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-lg p-6 border border-neutral-200/50 dark:border-neutral-700/50 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h4 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">6</h4>
                    <p class="text-neutral-600 dark:text-neutral-400">Dusun</p>
                </div>
            </div>
        </section>

        <!-- Sumber Daya Alam -->
        <section class="mb-16">
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 md:p-12 border border-neutral-200/50 dark:border-neutral-700/50">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.432a2 2 0 001.928-1.464l2.036-5.612a2 2 0 00-.586-2.056l-1.51-1.51a2 2 0 00-2.828 0l-1.414 1.414a2 2 0 01-2.828 0l-1.414-1.414a2 2 0 010-2.828l1.414-1.414a2 2 0 012.828 0l1.414 1.414a2 2 0 002.828 0zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 dark:text-white">Sumber Daya Alam</h3>
                </div>

                <!-- Informasi Umum -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6 mb-8 border-l-4 border-green-500">
                    <p class="text-neutral-800 dark:text-neutral-200 leading-relaxed mb-0">
                        Desa Lamahala Jaya merupakan salah satu desa di Kecamatan Adonara Timur Kabupaten Flores Timur, Provinsi Nusa Tenggara Timur, memiliki luas wilayah <strong>± 444.24 Ha/m²</strong>.
                    </p>
                </div>

                <!-- Batas Wilayah -->
                <h4 class="text-xl font-bold text-neutral-900 dark:text-white mb-4">Batas Wilayah</h4>
                <div class="grid md:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-start bg-neutral-50 dark:bg-neutral-700/30 rounded-xl p-4 border border-neutral-200 dark:border-neutral-700">
                        <div class="w-10 h-10 bg-rose-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Utara</p>
                            <p class="font-semibold text-neutral-900 dark:text-white">Desa Ipiebang</p>
                        </div>
                    </div>
                    <div class="flex items-start bg-neutral-50 dark:bg-neutral-700/30 rounded-xl p-4 border border-neutral-200 dark:border-neutral-700">
                        <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Timur</p>
                            <p class="font-semibold text-neutral-900 dark:text-white">Kelurahan Waiwerang</p>
                        </div>
                    </div>
                    <div class="flex items-start bg-neutral-50 dark:bg-neutral-700/30 rounded-xl p-4 border border-neutral-200 dark:border-neutral-700">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Selatan</p>
                            <p class="font-semibold text-neutral-900 dark:text-white">Pantai</p>
                        </div>
                    </div>
                    <div class="flex items-start bg-neutral-50 dark:bg-neutral-700/30 rounded-xl p-4 border border-neutral-200 dark:border-neutral-700">
                        <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Barat</p>
                            <p class="font-semibold text-neutral-900 dark:text-white">Desa Terong</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Administratif -->
                <div class="grid md:grid-cols-3 gap-4 mb-8">
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl p-5 text-white text-center">
                        <h5 class="text-3xl font-bold mb-1">6</h5>
                        <p class="text-green-50 text-sm">Dusun</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl p-5 text-white text-center">
                        <h5 class="text-3xl font-bold mb-1">6</h5>
                        <p class="text-blue-50 text-sm">Rukun Warga (RW)</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl p-5 text-white text-center">
                        <h5 class="text-3xl font-bold mb-1">17</h5>
                        <p class="text-purple-50 text-sm">Rukun Tetangga (RT)</p>
                    </div>
                </div>

                <!-- Tipologi & Topografi -->
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-neutral-50 dark:bg-neutral-700/30 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <h5 class="font-bold text-neutral-900 dark:text-white mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            Tipologi Desa
                        </h5>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-sm">Perladangan</span>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-sm">Perkebunan</span>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-sm">Peternakan</span>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-sm">Pertanian</span>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-sm">Perikanan</span>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-sm">Perdagangan</span>
                        </div>
                    </div>
                    <div class="bg-neutral-50 dark:bg-neutral-700/30 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <h5 class="font-bold text-neutral-900 dark:text-white mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            Topografi
                        </h5>
                        <p class="text-neutral-600 dark:text-neutral-400 text-sm">Dataran rendah, bergelombang. Ketinggian wilayah: <strong>0 – 100 m dpl</strong> (dataran rendah)</p>
                    </div>
                </div>

                <!-- Tabel 1: Penggunaan Lahan -->
                <h4 class="text-xl font-bold text-neutral-900 dark:text-white mb-4">Penggunaan Lahan</h4>
                <div class="overflow-x-auto mb-8">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-green-100 dark:bg-green-900/30">
                                <th class="px-3 py-2 text-left font-semibold text-neutral-900 dark:text-white border-b-2 border-green-500">No</th>
                                <th class="px-3 py-2 text-left font-semibold text-neutral-900 dark:text-white border-b-2 border-green-500">Penggunaan Lahan</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-green-500">n-5</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-green-500">n-4</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-green-500">n-3</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-green-500">n-2</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-green-500">n-1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-neutral-50 dark:bg-neutral-700/30 font-bold">
                                <td colspan="7" class="px-3 py-2 text-neutral-900 dark:text-white">Lahan Sawah</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">1</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Irigasi Teknis</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">2</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Irigasi Setengah Teknis</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Irigasi Sederhana Milik PU</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">4</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Irigasi Non PU</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">5</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Tadah Hujan</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="bg-neutral-50 dark:bg-neutral-700/30 font-bold">
                                <td colspan="7" class="px-3 py-2 text-neutral-900 dark:text-white">Lahan Bukan Sawah</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">1</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Pekarangan/Pemukiman</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">14,24</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">14,24</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">14,24</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">14,24</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400 font-semibold">14.24</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-emerald-50 dark:bg-emerald-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">2</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Tegal/Ladang</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">408</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">408</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">408</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">408</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">408</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Fasilitas Umum</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">5</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">5</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">5</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">5</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400 font-semibold">2</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">4</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Pengembalaan/Padang Rumput</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">40</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">40</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">40</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">40</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">40</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">5</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Sementara Tidak Diusahakan</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">6</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Ditanami Pohon/Hutan Rakyat</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">7</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Hutan Negara</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-blue-50 dark:bg-blue-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">8</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Perkebunan</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">150</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">150</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">150</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">150</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">150</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">9</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Rawa-Rawa</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">10</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Tambak</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">11</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Kolam/Empang</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tabel 2: Potensi Pertanian, Perkebunan, Peternakan, Perikanan -->
                <h4 class="text-xl font-bold text-neutral-900 dark:text-white mb-4">Potensi Produksi Per Tahun</h4>
                <div class="overflow-x-auto mb-8">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-blue-100 dark:bg-blue-900/30">
                                <th class="px-3 py-2 text-left font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">No</th>
                                <th class="px-3 py-2 text-left font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">Komoditas</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">Sat</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">Thn n-5</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">Thn n-4</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">Thn n-3</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">Thn n-2</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-blue-500">Thn n-1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-neutral-50 dark:bg-neutral-700/30 font-bold">
                                <td colspan="8" class="px-3 py-2 text-neutral-900 dark:text-white">1. Tanaman Pangan (ton/thn)</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Padi</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Jagung</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ton/thn</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">38</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">27</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">25,9</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">25,7</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400 font-semibold">21.7</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Ubi Kayu</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ton/thn</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">32,8</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">32,8</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">32,2</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">30</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400 font-semibold">29.8</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Ubi Jalar</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="bg-neutral-50 dark:bg-neutral-700/30 font-bold">
                                <td colspan="8" class="px-3 py-2 text-neutral-900 dark:text-white">2. Buah-Buahan (ton/thn)</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Mangga</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ton/thn</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">2</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400 font-semibold">1</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Jeruk</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Pepaya</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ton/thn</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400 font-semibold">2</td>
                            </tr>
                            <tr class="bg-neutral-50 dark:bg-neutral-700/30 font-bold">
                                <td colspan="8" class="px-3 py-2 text-neutral-900 dark:text-white">3. Perkebunan (ton/thn)</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Kelapa</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ton/thn</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400 font-semibold">900</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Kopi</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="bg-neutral-50 dark:bg-neutral-700/30 font-bold">
                                <td colspan="8" class="px-3 py-2 text-neutral-900 dark:text-white">4. Peternakan (ekor/thn)</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Sapi</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Kerbau</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-emerald-50 dark:bg-emerald-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Kambing</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ekor</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">830</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">850</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">811</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">825</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">800</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-blue-50 dark:bg-blue-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Ayam</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ekor</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">1211</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">1230</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">1217</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">1214</td>
                                <td class="px-3 py-2 text-center text-blue-700 dark:text-blue-300 font-semibold">1200</td>
                            </tr>
                            <tr class="bg-neutral-50 dark:bg-neutral-700/30 font-bold">
                                <td colspan="8" class="px-3 py-2 text-neutral-900 dark:text-white">5. Perikanan (ton/thn)</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-cyan-50 dark:bg-cyan-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Laut</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ton/thn</td>
                                <td class="px-3 py-2 text-center text-cyan-700 dark:text-cyan-300 font-semibold">65</td>
                                <td class="px-3 py-2 text-center text-cyan-700 dark:text-cyan-300 font-semibold">60</td>
                                <td class="px-3 py-2 text-center text-cyan-700 dark:text-cyan-300 font-semibold">58</td>
                                <td class="px-3 py-2 text-center text-cyan-700 dark:text-cyan-300 font-semibold">52</td>
                                <td class="px-3 py-2 text-center text-cyan-700 dark:text-cyan-300 font-semibold">50</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Keramba</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400"></td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Tambak</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tabel 3: Sumber Daya Alam -->
                <h4 class="text-xl font-bold text-neutral-900 dark:text-white mb-4">Identifikasi Sumber Daya Alam</h4>
                <p class="text-neutral-600 dark:text-neutral-400 mb-4 text-sm italic">Dari kondisi alam Desa Lamahala Jaya diatas, dapat diidentifikasi Sumber Daya Alam yang dimiliki Desa Lamahala Jaya dan merupakan salah satu potensi pembangunan di Desa Lamahala Jaya.</p>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-purple-100 dark:bg-purple-900/30">
                                <th class="px-3 py-2 text-left font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">No</th>
                                <th class="px-3 py-2 text-left font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">Uraian Sumber Daya Alam</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">Sat</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">Thn n-5</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">Thn n-4</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">Thn n-3</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">Thn n-2</th>
                                <th class="px-3 py-2 text-center font-semibold text-neutral-900 dark:text-white border-b-2 border-purple-500">Thn n-1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">1</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Material Batu Kali dan Kerikil</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">M³</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">2</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Pasir Urug</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">M³</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-emerald-50 dark:bg-emerald-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">3</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Lahan Tegalan</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ha</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">410</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">410</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">410</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">410</td>
                                <td class="px-3 py-2 text-center text-emerald-700 dark:text-emerald-300 font-semibold">408</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-green-50 dark:bg-green-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">4</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Lahan Hutan</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ha</td>
                                <td class="px-3 py-2 text-center text-green-700 dark:text-green-300 font-semibold">10</td>
                                <td class="px-3 py-2 text-center text-green-700 dark:text-green-300 font-semibold">10</td>
                                <td class="px-3 py-2 text-center text-green-700 dark:text-green-300 font-semibold">10</td>
                                <td class="px-3 py-2 text-center text-green-700 dark:text-green-300 font-semibold">10</td>
                                <td class="px-3 py-2 text-center text-green-700 dark:text-green-300 font-semibold">10</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">5</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Sungai</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ha</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr class="border-b border-neutral-200 dark:border-neutral-700 bg-amber-50 dark:bg-amber-900/20">
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">6</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white font-semibold">Tanaman Perkebunan: Kelapa, Jambu Mente dll</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">Buah</td>
                                <td class="px-3 py-2 text-center text-amber-700 dark:text-amber-300 font-semibold">1020</td>
                                <td class="px-3 py-2 text-center text-amber-700 dark:text-amber-300 font-semibold">1000</td>
                                <td class="px-3 py-2 text-center text-amber-700 dark:text-amber-300 font-semibold">950</td>
                                <td class="px-3 py-2 text-center text-amber-700 dark:text-amber-300 font-semibold">923</td>
                                <td class="px-3 py-2 text-center text-amber-700 dark:text-amber-300 font-semibold">945</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">7</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Air Terjun</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">ha</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2 text-neutral-600 dark:text-neutral-400">8</td>
                                <td class="px-3 py-2 text-neutral-900 dark:text-white">Dll.</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                                <td class="px-3 py-2 text-center text-neutral-600 dark:text-neutral-400">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Struktur Organisasi -->
        <section>
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-xl p-8 md:p-12 border border-neutral-200/50 dark:border-neutral-700/50">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 dark:text-white">Struktur Organisasi</h3>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Penjabat Kepala Desa -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-xl p-5 border border-emerald-200 dark:border-emerald-800">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Penjabat Kepala Desa</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Abubakar Hasan</p>
                        </div>
                    </div>

                    <!-- Sekretaris Desa -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Sekretaris Desa</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Taufik Ibrahim</p>
                        </div>
                    </div>

                    <!-- Kaur Administrasi -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kaur Administrasi</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Muh. Arsyad</p>
                        </div>
                    </div>

                    <!-- Kaur Keuangan -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kaur Keuangan</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Gita Lestari Prenta</p>
                        </div>
                    </div>

                    <!-- Kaur Umum -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-rose-500 to-red-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kaur Umum</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Nur Cahyat</p>
                        </div>
                    </div>

                    <!-- Kasie Pemerintahan -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie Pemerintahan</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Hasan Raden</p>
                        </div>
                    </div>

                    <!-- Kasie Pembangunan -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-teal-500 to-green-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie Pembangunan</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Muhmmad Keri</p>
                        </div>
                    </div>

                    <!-- Kasie Kesejahteraan -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie Kesejahteraan</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">M. Ali Bethan</p>
                        </div>
                    </div>

                    <!-- Kasie I -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-lime-500 to-green-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie I</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Hasan Al-Banna S.</p>
                        </div>
                    </div>

                    <!-- Kasie II -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-indigo-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie II</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Abubakar Bethan</p>
                        </div>
                    </div>

                    <!-- Kasie III -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-fuchsia-500 to-purple-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie III</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Syamsul Ratuloly</p>
                        </div>
                    </div>

                    <!-- Kasie IV -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie IV</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Kapten Belae</p>
                        </div>
                    </div>

                    <!-- Kasie V -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie V</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Lukman Umar</p>
                        </div>
                    </div>

                    <!-- Kasie VI -->
                    <div class="bg-neutral-50 dark:bg-neutral-800/50 rounded-xl p-5 border border-neutral-200 dark:border-neutral-700">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-600 rounded-full flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-neutral-900 dark:text-white text-sm">Kasie VI</h4>
                            <p class="text-xs text-neutral-600 dark:text-neutral-400 mt-1">Hasan Raden</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-neutral-800 border-t border-neutral-200 dark:border-neutral-700 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row justify-between items-center text-neutral-600 dark:text-neutral-400">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg overflow-hidden">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Logo {{ config('app.name', 'SIMDESA') }}" class="w-full h-full object-cover">
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
        });
    </script>
</body>
</html>
