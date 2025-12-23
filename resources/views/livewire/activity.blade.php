<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Aktivitas</h1>
        <p class="text-neutral-600 dark:text-neutral-400 mt-2">Lihat semua aktivitas terbaru dalam sistem</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card bg-gradient-to-r from-blue-500 to-blue-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-100 text-sm">Total Pengguna</p>
                        <p class="text-2xl font-bold text-white">{{ $stats['total_users'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-green-500 to-green-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-green-100 text-sm">Total Penduduk</p>
                        <p class="text-2xl font-bold text-white">{{ $stats['total_penduduks'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-purple-500 to-purple-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-purple-100 text-sm">Aktivitas Terbaru</p>
                        <p class="text-2xl font-bold text-white">{{ $stats['recent_activities'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-6">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Cari aktivitas..."
                        class="w-full px-4 py-2 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                    >
                </div>
                <div class="flex gap-2">
                    <button wire:click="setFilter('all')" class="px-4 py-2 {{ $filter === 'all' ? 'bg-primary-600 text-white' : 'bg-neutral-200 dark:bg-neutral-700 text-neutral-700 dark:text-neutral-300' }} rounded-lg transition-colors duration-200">
                        Semua
                    </button>
                    <button wire:click="setFilter('users')" class="px-4 py-2 {{ $filter === 'users' ? 'bg-primary-600 text-white' : 'bg-neutral-200 dark:bg-neutral-700 text-neutral-700 dark:text-neutral-300' }} rounded-lg transition-colors duration-200">
                        Pengguna
                    </button>
                    <button wire:click="setFilter('penduduks')" class="px-4 py-2 {{ $filter === 'penduduks' ? 'bg-primary-600 text-white' : 'bg-neutral-200 dark:bg-neutral-700 text-neutral-700 dark:text-neutral-300' }} rounded-lg transition-colors duration-200">
                        Penduduk
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Activities List -->
    <div class="card">
        <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
            <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Daftar Aktivitas</h2>
        </div>
        <div class="divide-y divide-neutral-200 dark:divide-neutral-700">
            @forelse($activities as $activity)
                <div class="p-6 hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors duration-200">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            @if($activity['icon'] === 'user')
                                <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg">
                                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg">
                                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-neutral-900 dark:text-white">{{ $activity['action'] }}</p>
                                    <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">{{ $activity['description'] }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ $activity['time'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-neutral-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <p class="text-neutral-500 dark:text-neutral-400">Belum ada aktivitas</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
