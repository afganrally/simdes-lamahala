<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manajemen Fasilitas</h1>
        <p class="text-neutral-600 dark:text-neutral-400 mt-2">Kelola data fasilitas desa</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="card bg-gradient-to-r from-blue-500 to-blue-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-blue-100 text-sm">Total Fasilitas</p>
                        <p class="text-2xl font-bold text-white">{{ $totalFasilitas }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-green-500 to-green-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-green-100 text-sm">Kondisi Baik</p>
                        <p class="text-2xl font-bold text-white">{{ $kondisiBaik }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-yellow-500 to-yellow-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 dark:bg-yellow-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-yellow-100 text-sm">Perlu Maintenance</p>
                        <p class="text-2xl font-bold text-white">{{ $perluMaintenance }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-gradient-to-r from-red-500 to-red-600">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-red-100 dark:bg-red-900 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-red-100 text-sm">Rusak</p>
                        <p class="text-2xl font-bold text-white">{{ $rusak }}</p>
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
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari fasilitas..."
                            class="input pl-10 pr-4 py-2 w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <button wire:click="openModal" class="btn btn-primary flex items-center justify-between cursor-pointer">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Fasilitas
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
                            Gambar</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Nama</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Jenis</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Lokasi</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Kondisi</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Ditambahkan</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                    {{-- Debug: {{ isset($fasilitasList) ? 'Fasilitas exists' : 'Fasilitas null' }}, Count: {{ $fasilitasList->count() ?? 'N/A' }} --}}
                    @forelse($fasilitasList as $item)
                        <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800"
                            wire:key="fasilitas-{{ $item->id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($item->gambar)
                                    <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama }}"
                                        class="h-12 w-12 rounded-lg object-cover">
                                @else
                                    <div
                                        class="h-12 w-12 bg-neutral-200 dark:bg-neutral-700 rounded-lg flex items-center justify-center">
                                        <svg class="h-6 w-6 text-neutral-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-neutral-900 dark:text-white">{{ $item->nama }}
                                </div>
                                <div class="text-sm text-neutral-500 dark:text-neutral-400">{{ $item->jumlah }} unit
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {!! $item->jenis_label !!}
                            </td>
                            <td class="px-6 py-4 text-sm text-neutral-900 dark:text-white">
                                {{ $item->lokasi }}
                            </td>
                            <td class="px-6 py-4">
                                {!! $item->kondisi_label !!}
                            </td>
                            <td class="px-6 py-4 text-sm text-neutral-500 dark:text-neutral-400">
                                {{ $item->user->name ?? 'Tidak diketahui' }}
                                <div class="text-xs">{{ $item->created_at->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button wire:click="edit({{ $item->id }})"
                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button onclick="deleteFasilitas({{ $item->id }})"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white">Tidak ada data
                                    fasilitas</h3>
                                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Tambahkan fasilitas
                                    pertama untuk memulai.</p>
                                <div class="mt-6">
                                    <button wire:click="openModal" class="btn btn-primary">Tambah Fasilitas</button>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    @if (method_exists($fasilitasList, 'links'))
                        <tr>
                            <td colspan="7" class="px-6 py-4">
                                {{ $fasilitasList->links() }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    @if ($isOpen)
        <!-- Backdrop -->
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

                <!-- Modal panel -->
                <div
                    class="relative bg-white dark:bg-neutral-800 rounded-xl shadow-2xl w-full max-w-2xl transform transition-all">
                    <!-- Header with gradient -->
                    <div
                        class="bg-gradient-to-r {{ $isEdit ? 'from-blue-500 to-blue-600' : 'from-green-500 to-green-600' }} px-6 py-4 rounded-t-xl">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if ($isEdit)
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    @endif
                                </svg>
                                {{ $isEdit ? 'Edit Fasilitas' : 'Tambah Fasilitas Baru' }}
                            </h3>
                            <button wire:click="closeModal"
                                class="text-white hover:text-gray-200 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Body -->
                    <form wire:submit="{{ $isEdit ? 'update' : 'store' }}" class="p-6">
                        <div class="space-y-5">
                            <!-- Form Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        Nama Fasilitas
                                    </label>
                                    <input type="text" wire:model="nama"
                                        class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                        placeholder="Masukkan nama fasilitas" required>
                                    @error('nama')
                                        <div class="mt-1 flex items-center text-red-500 text-sm">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                            </path>
                                        </svg>
                                        Jenis
                                    </label>
                                    <select wire:model="jenis"
                                        class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                        <option value="gedung">Gedung</option>
                                        <option value="ruangan">Ruangan</option>
                                        <option value="kendaraan">Kendaraan</option>
                                        <option value="elektronik">Elektronik</option>
                                        <option value="olahraga">Olahraga</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    @error('jenis')
                                        <div class="mt-1 flex items-center text-red-500 text-sm">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Detail
                                </label>
                                <textarea wire:model="detail" rows="3"
                                    class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                    placeholder="Deskripsi detail fasilitas..."></textarea>
                                @error('detail')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                        Jumlah
                                    </label>
                                    <input type="number" wire:model="jumlah" min="1"
                                        class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                        placeholder="1" required>
                                    @error('jumlah')
                                        <div class="mt-1 flex items-center text-red-500 text-sm">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Lokasi
                                    </label>
                                    <input type="text" wire:model="lokasi"
                                        class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                        placeholder="Masukkan lokasi fasilitas" required>
                                    @error('lokasi')
                                        <div class="mt-1 flex items-center text-red-500 text-sm">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Kondisi
                                </label>
                                <select wire:model="kondisi"
                                    class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                    <option value="baik">Baik</option>
                                    <option value="rusak_ringan">Rusak Ringan</option>
                                    <option value="rusak_berat">Rusak Berat</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                                @error('kondisi')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Keterangan
                                </label>
                                <textarea wire:model="keterangan" rows="2"
                                    class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200"
                                    placeholder="Keterangan tambahan..."></textarea>
                                @error('keterangan')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Gambar
                                </label>
                                <input type="file" wire:model="gambar" accept="image/*"
                                    class="w-full px-4 py-3 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:text-white transition-colors duration-200">
                                @error('gambar')
                                    <div class="mt-1 flex items-center text-red-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                                @if ($isEdit && $oldGambar)
                                    <div class="mt-3">
                                        <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-2">Gambar saat ini:
                                        </p>
                                        <img src="{{ Storage::url($oldGambar) }}" alt="Current image"
                                            class="h-20 w-20 rounded-lg object-cover">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="mt-8 flex gap-3">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 px-4 py-3 bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 text-neutral-700 dark:text-neutral-300 font-medium rounded-lg transition-all duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 px-4 py-3 bg-gradient-to-r {{ $isEdit ? 'from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800' : 'from-green-600 to-green-700 hover:from-green-700 hover:to-green-800' }} text-white font-medium rounded-lg transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $isEdit ? 'Perbarui' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

