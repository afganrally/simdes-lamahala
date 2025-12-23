<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manajemen Penduduk</h1>
        <p class="text-neutral-600 dark:text-neutral-400 mt-2">Kelola data penduduk desa</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="card bg-gradient-to-r from-blue-500 to-blue-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-100 text-sm">Total Penduduk</p>
                        <p class="text-2xl font-bold text-white">{{ $totalPenduduk }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-green-500 to-green-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-green-100 text-sm">Status Tetap</p>
                        <p class="text-2xl font-bold text-white">{{ $statusTetap }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-purple-500 to-purple-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-purple-100 text-sm">Laki-laki</p>
                        <p class="text-2xl font-bold text-white">{{ $totalLaki }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-pink-500 to-pink-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-pink-100 dark:bg-pink-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-pink-100 text-sm">Perempuan</p>
                        <p class="text-2xl font-bold text-white">{{ $totalPerempuan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions -->
    <div class="card mb-6">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex-1 max-w-md w-full">
                    <div class="relative">
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari penduduk berdasarkan nama, NIK, atau alamat..."
                            class="input pl-10 pr-4 py-2 w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <button wire:click="create" class="btn btn-primary flex items-center justify-between cursor-pointer">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Penduduk
                </button>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                <thead class="bg-neutral-50 dark:bg-neutral-800">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            NIK</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Nama</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Jenis Kelamin</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Dusun</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Status Tinggal</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Ditambahkan</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                    <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($penduduks as $index => $penduduk)
                            <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800"
                                wire:key="penduduk-{{ $penduduk->id }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-neutral-900 dark:text-white">
                                        {{ $penduduk->nik }}
                                    </div>
                                    <div class="text-sm text-neutral-500 dark:text-neutral-400">
                                        {{ $penduduk->no_kk }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-neutral-900 dark:text-white">{{ $penduduk->nama }}
                                    </div>
                                    <div class="text-sm text-neutral-500 dark:text-neutral-400">{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $penduduk->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200' }}">
                                        {{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-neutral-900 dark:text-white">
                                    {{ $penduduk->dusun }}
                                    <div class="text-sm text-neutral-500 dark:text-neutral-400">RT {{ $penduduk->rt }}/RW {{ $penduduk->rw }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $penduduk->status_tinggal == 'Tetap' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                        {{ $penduduk->status_tinggal }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-neutral-500 dark:text-neutral-400">
                                    <div class="text-sm">{{ $penduduk->created_at->format('d/m/Y') }}</div>
                                    <div class="text-xs">{{ $penduduk->updated_at->diffForHumans() }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button wire:click="viewDetail({{ $penduduk->id }})"
                                            class="text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-300"
                                            title="Lihat Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button wire:click="edit({{ $penduduk->id }})"
                                            class="text-warning-600 hover:text-warning-900 dark:text-warning-400 dark:hover:text-warning-300"
                                            title="Edit Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button onclick="deletePenduduk({{ $penduduk->id }})"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                            title="Hapus Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white">Tidak ada data penduduk</h3>
                                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Tambahkan penduduk pertama untuk memulai.</p>
                                    <div class="mt-6">
                                        <button wire:click="create" class="btn btn-primary">Tambah Penduduk</button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        @if (method_exists($penduduks, 'links'))
                            <tr>
                                <td colspan="7" class="px-6 py-4">
                                    {{ $penduduks->links() }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
    </div>

    <!-- Detail View Modal -->
    @if ($isDetailModalOpen)
    <!-- Backdrop -->
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeDetailModal"></div>

            <!-- Modal panel -->
            <div class="relative bg-white dark:bg-neutral-800 rounded-xl shadow-2xl w-full max-w-4xl transform transition-all my-8">
                <!-- Header with gradient -->
                <div class="bg-gradient-to-r from-primary-300 to-primary-500 px-6 py-4 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Detail Data Penduduk
                        </h3>
                        <button wire:click="closeDetailModal" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-6 max-h-[80vh] overflow-y-auto">
                    <!-- Avatar Section -->
                    <div class="flex justify-center mb-6">
                        <div class="h-20 w-20 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-white">{{ substr($selectedPenduduk->nama, 0, 1) }}</span>
                        </div>
                    </div>

                    <!-- Penduduk Details -->
                    <div class="space-y-6">
                        <!-- Informasi Pribadi Card -->
                        <div class="bg-neutral-50 dark:bg-neutral-900 rounded-lg">
                            <div class="px-4 py-3 border-b border-neutral-200 dark:border-neutral-700 bg-gradient-to-r from-primary-300 to-primary-500">
                                <h3 class="text-base font-semibold text-white">Informasi Pribadi</h3>
                            </div>
                            <div class="p-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">NIK</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->nik }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Nama Lengkap</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->nama }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Jenis Kelamin</h4>
                                        <p class="mt-1">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $selectedPenduduk->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200' }}">
                                                {{ $selectedPenduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            </span>
                                        </p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Tempat Lahir</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->tempat_lahir }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Tanggal Lahir</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->tanggal_lahir->format('d F Y') }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Agama</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->agama }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Pendidikan</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->pendidikan }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Pekerjaan</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->pekerjaan }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Status Perkawinan</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->status_perkawinan }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Status Keluarga</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->status_keluarga }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Alamat Card -->
                        <div class="bg-neutral-50 dark:bg-neutral-900 rounded-lg">
                            <div class="px-4 py-3 border-b border-neutral-200 dark:border-neutral-700 bg-gradient-to-r from-primary-300 to-primary-500">
                                <h3 class="text-base font-semibold text-white">Informasi Alamat</h3>
                            </div>
                            <div class="p-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="md:col-span-2">
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Alamat</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->alamat }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Dusun</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->dusun }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">RT/RW</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->rt }}/{{ $selectedPenduduk->rw }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">No. KK</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->no_kk }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Status Tinggal</h4>
                                        <p class="mt-1">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $selectedPenduduk->status_tinggal == 'Tetap' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                                {{ $selectedPenduduk->status_tinggal }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Tambahan Card -->
                        <div class="bg-neutral-50 dark:bg-neutral-900 rounded-lg">
                            <div class="px-4 py-3 border-b border-neutral-200 dark:border-neutral-700 bg-gradient-to-r from-primary-300 to-primary-500">
                                <h3 class="text-base font-semibold text-white">Informasi Tambahan</h3>
                            </div>
                            <div class="p-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Tanggal Masuk</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">
                                            {{ $selectedPenduduk->tanggal_masuk ? $selectedPenduduk->tanggal_masuk->format('d F Y') : '-' }}
                                        </p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Tanggal Keluar</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">
                                            {{ $selectedPenduduk->tanggal_keluar ? $selectedPenduduk->tanggal_keluar->format('d F Y') : '-' }}
                                        </p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Dibuat</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->created_at->format('d F Y H:i') }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-medium text-neutral-500 dark:text-neutral-400">Diperbarui</h4>
                                        <p class="text-sm text-neutral-900 dark:text-neutral-100">{{ $selectedPenduduk->updated_at->format('d F Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="mt-6 flex gap-3">
                        <button wire:click="edit({{ $selectedPenduduk->id }})"
                            class="flex-1 px-4 py-3 bg-warning-600 hover:bg-warning-700 text-white font-medium rounded-lg transition-all duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Data
                        </button>
                        <button wire:click="closeDetailModal"
                            class="px-4 py-3 bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 text-neutral-700 dark:text-neutral-300 font-medium rounded-lg transition-all duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Create/Edit Modal -->
    @if ($isOpen)
    <!-- Backdrop -->
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

            <!-- Modal panel -->
            <div class="relative bg-white dark:bg-neutral-800 rounded-xl shadow-2xl w-full max-w-4xl transform transition-all my-8">
                <!-- Header with gradient -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            @if($isEdit)
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Data Penduduk
                            @else
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Tambah Data Penduduk Baru
                            @endif
                        </h3>
                        <button wire:click="closeModal" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-6 max-h-[80vh] overflow-y-auto">
                    <form wire:submit="{{ $isEdit ? 'update' : 'store' }}">
                        <!-- Avatar Section -->
                        <div class="flex justify-center mb-6">
                            <div class="relative">
                                <div class="h-20 w-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                                    @if($isEdit && $penduduk)
                                        <span class="text-2xl font-bold text-white">{{ substr($penduduk->nama, 0, 1) }}</span>
                                    @else
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="absolute -bottom-2 -right-2 bg-green-500 h-8 w-8 rounded-full flex items-center justify-center border-4 border-white dark:border-neutral-800">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-4 0v8a2 2 0 104 0V6z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="space-y-6">
                            <!-- Data Diri Section -->
                            <div>
                                <h4 class="text-lg font-medium text-neutral-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Data Diri
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-4 0v8a2 2 0 104 0V6z"></path>
                                            </svg>
                                            NIK
                                        </label>
                                        <input type="text" wire:model="nik" maxlength="16"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                            placeholder="Masukkan NIK 16 digit">
                                        @error('nik')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Nama Lengkap
                                        </label>
                                        <input type="text" wire:model="nama"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                            placeholder="Masukkan nama lengkap">
                                        @error('nama')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Jenis Kelamin
                                        </label>
                                        <select wire:model="jenis_kelamin"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            Tempat Lahir
                                        </label>
                                        <input type="text" wire:model="tempat_lahir"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                            placeholder="Masukkan tempat lahir">
                                        @error('tempat_lahir')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Tanggal Lahir
                                        </label>
                                        <input type="date" wire:model="tanggal_lahir"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                        @error('tanggal_lahir')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                            Agama
                                        </label>
                                        <select wire:model="agama"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <div class="mt-1 flex items-center text-red-500 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Pendidikan dan Pekerjaan Section -->
                            <div>
                                <h4 class="text-lg font-medium text-neutral-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Pendidikan dan Pekerjaan
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                            </svg>
                                            Pendidikan
                                        </label>
                                        <select wire:model="pendidikan"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                            <option value="">Pilih Pendidikan</option>
                                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        @error('pendidikan')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            Pekerjaan
                                        </label>
                                        <input type="text" wire:model="pekerjaan"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                            placeholder="Masukkan pekerjaan">
                                        @error('pekerjaan')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            Status Perkawinan
                                        </label>
                                        <select wire:model="status_perkawinan"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                            <option value="">Pilih Status</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                        @error('status_perkawinan')
                                            <div class="mt-1 flex items-center text-red-500 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Alamat Section -->
                            <div>
                                <h4 class="text-lg font-medium text-neutral-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Alamat
                                </h4>
                                <div class="space-y-4">
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            Alamat Lengkap
                                        </label>
                                        <textarea wire:model="alamat" rows="3"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                            placeholder="Masukkan alamat lengkap"></textarea>
                                        @error('alamat')
                                            <div class="mt-1 flex items-center text-red-500 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                                </svg>
                                                Dusun
                                            </label>
                                            <input type="text" wire:model="dusun"
                                                class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                                placeholder="Masukkan dusun">
                                            @error('dusun')
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                                RT
                                            </label>
                                            <input type="text" wire:model="rt"
                                                class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                                placeholder="Masukkan RT">
                                            @error('rt')
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                                RW
                                            </label>
                                            <input type="text" wire:model="rw"
                                                class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                                placeholder="Masukkan RW">
                                            @error('rw')
                                                <div class="mt-1 flex items-center text-red-500 text-sm">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Keluarga Section -->
                            <div>
                                <h4 class="text-lg font-medium text-neutral-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Status Keluarga
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            Status Keluarga
                                        </label>
                                        <select wire:model="status_keluarga"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                            <option value="">Pilih Status</option>
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('status_keluarga')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            No. KK
                                        </label>
                                        <input type="text" wire:model="no_kk"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                            placeholder="Masukkan nomor KK">
                                        @error('no_kk')
                                            <div class="mt-1 flex items-center text-red-500 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Status Tinggal Section -->
                            <div>
                                <h4 class="text-lg font-medium text-neutral-900 dark:text-white mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Status Tinggal
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            Status Tinggal
                                        </label>
                                        <select wire:model="status_tinggal"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                            <option value="">Pilih Status</option>
                                            <option value="Tetap">Tetap</option>
                                            <option value="Kontrak">Kontrak</option>
                                            <option value="Kost">Kost</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('status_tinggal')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Tanggal Masuk
                                        </label>
                                        <input type="date" wire:model="tanggal_masuk"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                        @error('tanggal_masuk')
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Tanggal Keluar
                                        </label>
                                        <input type="date" wire:model="tanggal_keluar"
                                            class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                        @error('tanggal_keluar')
                                            <div class="mt-1 flex items-center text-red-500 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-lg transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $isEdit ? 'Update Data Penduduk' : 'Simpan Data Penduduk' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    </div>
