@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Manajemen Penduduk</h1>
        <a href="{{ route('penduduks.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors duration-200">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Penduduk
        </a>
    </div>
</div>


<!-- Penduduks Table -->
<div class="card overflow-hidden">
    <div class="px-6 py-4 border-b border-neutral-200 bg-gradient-to-r from-primary-300 to-primary-500 dark:border-neutral-700">
        <h2 class="text-lg font-semibold text-neutral-900 text-white">Daftar Penduduk</h2>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                <thead class="bg-neutral-50 dark:bg-neutral-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Dusun</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">RT/RW</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Status Tinggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700">
                    @foreach($penduduks as $index => $penduduk)
                    <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduks->firstItem() + $index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-neutral-900 dark:text-neutral-100">{{ $penduduk->nik }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-neutral-900 dark:text-neutral-100">{{ $penduduk->nama }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $penduduk->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200' }}">
                                {{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->dusun }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->rt }}/{{ $penduduk->rw }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $penduduk->status_tinggal == 'Tetap' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                {{ $penduduk->status_tinggal }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('penduduks.show', $penduduk) }}" class="text-info-600 hover:text-info-900 dark:text-info-400 dark:hover:text-info-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('penduduks.edit', $penduduk) }}" class="text-warning-600 hover:text-warning-900 dark:text-warning-400 dark:hover:text-warning-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button type="button" onclick="confirmDelete('{{ route('penduduks.destroy', $penduduk) }}', 'data penduduk {{ $penduduk->nama }}')" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $penduduks->links() }}
        </div>
    </div>
</div>
@endsection
