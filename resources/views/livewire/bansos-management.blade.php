<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manajemen Bantuan Sosial</h1>
        <p class="text-neutral-600 dark:text-neutral-400 mt-2">Kelola data bantuan sosial untuk masyarakat</p>
    </div>


    <!-- Search and Actions -->
    <div class="card mb-6">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex-1 max-w-md w-full">
                    <div class="relative">
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari bantuan sosial..."
                            class="input pl-10 pr-4 py-2 w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                @if ($canCreate)
                <button wire:click="create" class="btn btn-primary flex items-center justify-between cursor-pointer">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Bansos
                </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                <thead class="bg-neutral-50 dark:bg-neutral-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Penerima</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                    @forelse($bansos as $item)
                    <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800" wire:key="bansos-{{ $item->id }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-neutral-900 dark:text-white">{{ $item->jenis }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-neutral-900 dark:text-white">{{ $item->kategori }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-neutral-900 dark:text-white">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-neutral-900 dark:text-white">{{ $item->tanggal_penyaluran->format('d/m/Y') }}</div>
                            <div class="text-xs text-neutral-500">{{ $item->periode }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-neutral-900 dark:text-white">{{ $item->penduduk->nama ?? '-' }}</div>
                            <div class="text-xs text-neutral-500">{{ $item->sumber_dana }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($item->status == 'Disalurkan') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                @elseif($item->status == 'Pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                @elseif($item->status == 'Proses') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                @if($item->foto_dokumen)
                                <a href="{{ asset('storage/'.$item->foto_dokumen) }}" target="_blank" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" title="Lihat Dokumen">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                @endif
                                @if ($canEdit)
                                <button wire:click="edit({{ $item->id }})" class="text-warning-600 hover:text-warning-900 dark:text-warning-400 dark:hover:text-warning-300" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                @endif
                                @if ($canDelete)
                                <button onclick="deleteBansos({{ $item->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-neutral-900 dark:text-white">Tidak ada data bansos</h3>
                            <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Tambahkan data bansos pertama untuk memulai.</p>
                            @if ($canCreate)
                                <div class="mt-6">
                                    <button wire:click="create" class="btn btn-primary">Tambah Bansos</button>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforelse

                    @if (method_exists($bansos, 'links'))
                        <tr>
                            <td colspan="7" class="px-6 py-4">
                                {{ $bansos->links() }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create/Edit Modal -->
    @if($isOpen)
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

            <!-- Modal panel -->
            <div class="relative bg-white dark:bg-neutral-800 rounded-xl shadow-2xl w-full max-w-2xl transform transition-all">
                <!-- Header with gradient -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            @if($bansos_id)
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Data Bansos
                            @else
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Data Bansos
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
                <form wire:submit="store" class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Jenis -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Jenis Bantuan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="jenis"
                                class="input w-full" placeholder="Contoh: Sembako, Uang, dll">
                            @error('jenis')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="kategori"
                                class="input w-full" placeholder="Contoh: Rutin, Insidental">
                            @error('kategori')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jumlah -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Jumlah (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" wire:model="jumlah" step="0.01"
                                class="input w-full" placeholder="0">
                            @error('jumlah')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Penyaluran -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Tanggal Penyaluran <span class="text-red-500">*</span>
                            </label>
                            <input type="date" wire:model="tanggal_penyaluran"
                                class="input w-full">
                            @error('tanggal_penyaluran')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sumber Dana -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                Sumber Dana <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="sumber_dana"
                                class="input w-full" placeholder="Contoh: APBD, APBN, Swadaya">
                            @error('sumber_dana')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Periode -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Periode <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="periode"
                                class="input w-full" placeholder="Contoh: Januari 2025, Triwulan I">
                            @error('periode')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Penyaluran -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status Penyaluran <span class="text-red-500">*</span>
                            </label>
                            <select wire:model="status" class="input w-full">
                                <option value="">Pilih Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Disalurkan">Disalurkan</option>
                                <option value="Proses">Proses</option>
                                <option value="Batal">Batal</option>
                            </select>
                            @error('status')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Penerima -->
                        <div>
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Penerima <span class="text-red-500">*</span>
                            </label>
                            <select wire:model="id_penduduk" class="input w-full">
                                <option value="">Pilih Penduduk</option>
                                @foreach($penduduks as $penduduk)
                                    <option value="{{ $penduduk->id }}">{{ $penduduk->nama }} - {{ $penduduk->nik }}</option>
                                @endforeach
                            </select>
                            @error('id_penduduk')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Foto Dokumen -->
                        <div class="md:col-span-2">
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Foto Dokumen
                            </label>
                            <input type="file" wire:model="foto_dokumen"
                                class="input w-full" accept="image/*">
                            @error('foto_dokumen')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="md:col-span-2">
                            <label class="inline-flex items-center text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                <svg class="w-4 h-4 mr-1.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Keterangan
                            </label>
                            <textarea wire:model="keterangan" rows="3"
                                class="input w-full" placeholder="Tambahkan keterangan jika diperlukan..."></textarea>
                            @error('keterangan')
                                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="mt-6 flex gap-3">
                        <button type="button" wire:click="closeModal"
                            class="flex-1 px-4 py-2 bg-neutral-100 hover:bg-neutral-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 text-neutral-700 dark:text-neutral-300 font-medium rounded-lg transition-colors cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-lg transition-all cursor-pointer">
                            {{ $bansos_id ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Delete Confirmation Modal -->
    <script>
        function deleteBansos(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data bansos ini?')) {
                @this.delete(id);
            }
        }
    </script>
</div>
