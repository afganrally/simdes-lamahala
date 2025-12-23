<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manajemen Artikel</h1>
        <p class="text-neutral-600 dark:text-neutral-400 mt-2">Kelola konten artikel untuk website desa</p>
    </div>

    <!-- Search and Actions -->
    <div class="card mb-6">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex-1 max-w-md w-full">
                    <div class="relative">
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari artikel..."
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
                <button wire:click="create" class="btn btn-primary flex items-center justify-between cursor-pointer">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Artikel
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
                            Judul</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Penulis</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Tanggal</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Gambar</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                    @forelse($artikels as $item)
                        <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800"
                            wire:key="artikel-{{ $item->id }}">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-neutral-900 dark:text-white line-clamp-2">
                                    {{ $item->judul }}</div>
                                <div class="text-xs text-neutral-500 line-clamp-2 mt-1">
                                    {{ Str::limit(strip_tags($item->isi), 100) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900 dark:text-white">{{ $item->penulis }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900 dark:text-white">
                                    {{ $item->tanggal->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="h-12 w-12 object-cover rounded-lg">
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button wire:click="edit({{ $item->id }})"
                                        class="text-warning-600 hover:text-warning-900 dark:text-warning-400 dark:hover:text-warning-300"
                                        title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button onclick="deleteArtikel({{ $item->id }})"
                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                        title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            <td colspan="5" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white">Tidak ada data
                                    artikel</h3>
                                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Tambahkan artikel pertama
                                    untuk memulai.</p>
                                <div class="mt-6">
                                    <button wire:click="create" class="btn btn-primary">Tambah Artikel</button>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    @if (method_exists($artikels, 'links'))
                        <tr>
                            <td colspan="5" class="px-6 py-4">
                                {{ $artikels->links() }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create/Edit Modal -->
    @if ($isOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

                <!-- Modal panel -->
                <div
                    class="relative bg-white dark:bg-neutral-800 rounded-xl shadow-2xl w-full max-w-2xl transform transition-all">
                    <!-- Header with gradient -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 rounded-t-xl">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                @if ($artikel_id)
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    Edit Artikel
                                @else
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah Artikel
                                @endif
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
                    <form wire:submit="store" class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Judul -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                    Judul Artikel <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="judul" class="input w-full"
                                    placeholder="Masukkan judul artikel">
                                @error('judul')
                                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Penulis -->
                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                    Penulis <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="penulis" class="input w-full"
                                    placeholder="Nama penulis">
                                @error('penulis')
                                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal -->
                            <div>
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                    Tanggal <span class="text-red-500">*</span>
                                </label>
                                <input type="date" wire:model="tanggal" class="input w-full">
                                @error('tanggal')
                                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Gambar -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                    Gambar Artikel
                                </label>
                                <input type="file" wire:model="gambar" class="input w-full" accept="image/*">
                                @error('gambar')
                                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                                @if ($gambar)
                                    <div class="mt-2">
                                        <img src="{{ $gambar->temporaryUrl() }}" alt="Preview"
                                            class="h-32 w-32 object-cover rounded-lg">
                                    </div>
                                @endif
                            </div>

                            <!-- Isi -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                    Isi Artikel <span class="text-red-500">*</span>
                                </label>
                                <textarea wire:model="isi" rows="10" class="input w-full" placeholder="Tulis konten artikel di sini..."></textarea>
                                @error('isi')
                                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="mt-6 flex gap-3">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 px-4 py-2 bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 text-neutral-700 dark:text-neutral-300 font-medium rounded-lg transition-colors">
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-lg transition-all">
                                {{ $artikel_id ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    <script>
        function deleteArtikel(id) {
            if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
                @this.delete(id);
            }
        }
    </script>
</div>
