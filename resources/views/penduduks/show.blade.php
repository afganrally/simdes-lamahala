@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <a href="{{ route('penduduks.index') }}" class="mr-4 text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Detail Data Penduduk</h1>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('penduduks.edit', $penduduk) }}" class="inline-flex items-center px-4 py-2 bg-warning-600 hover:bg-warning-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </a>
        </div>
    </div>
</div>

<!-- Penduduk Details Card -->
<div class="card">
    <div class="px-6 py-4 border-b border-neutral-200 bg-gradient-to-r from-primary-300 to-primary-500 dark:border-neutral-700">
        <h2 class="text-lg font-semibold text-neutral-900 text-white">Informasi Pribadi</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- NIK -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">NIK</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->nik }}</p>
            </div>

            <!-- Nama Lengkap -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Nama Lengkap</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->nama }}</p>
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Jenis Kelamin</h3>
                <p class="mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $penduduk->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200' }}">
                        {{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </span>
                </p>
            </div>

            <!-- Tempat Lahir -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Tempat Lahir</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->tempat_lahir }}</p>
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Tanggal Lahir</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->tanggal_lahir->format('d F Y') }}</p>
            </div>

            <!-- Agama -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Agama</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->agama }}</p>
            </div>

            <!-- Pendidikan -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Pendidikan</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->pendidikan }}</p>
            </div>

            <!-- Pekerjaan -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Pekerjaan</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->pekerjaan }}</p>
            </div>

            <!-- Status Perkawinan -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Status Perkawinan</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->status_perkawinan }}</p>
            </div>

            <!-- Status Keluarga -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Status Keluarga</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->status_keluarga }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Address Information Card -->
<div class="card mt-6">
    <div class="px-6 py-4 border-b border-neutral-200 bg-gradient-to-r from-primary-300 to-primary-500 dark:border-neutral-700">
        <h2 class="text-lg font-semibold text-neutral-900 text-white">Informasi Alamat</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Alamat -->
            <div class="md:col-span-2">
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Alamat</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->alamat }}</p>
            </div>

            <!-- Dusun -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Dusun</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->dusun }}</p>
            </div>

            <!-- RT/RW -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">RT/RW</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->rt }}/{{ $penduduk->rw }}</p>
            </div>

            <!-- No KK -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">No. KK</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->no_kk }}</p>
            </div>

            <!-- Status Tinggal -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Status Tinggal</h3>
                <p class="mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $penduduk->status_tinggal == 'Tetap' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                        {{ $penduduk->status_tinggal }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Additional Information Card -->
<div class="card mt-6">
    <div class="px-6 py-4 border-b border-neutral-200 bg-gradient-to-r from-primary-300 to-primary-500 dark:border-neutral-700">
        <h2 class="text-lg font-semibold text-neutral-900 text-white">Informasi Tambahan</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Tanggal Masuk -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Tanggal Masuk</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">
                    {{ $penduduk->tanggal_masuk ? $penduduk->tanggal_masuk->format('d F Y') : '-' }}
                </p>
            </div>

            <!-- Tanggal Keluar -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Tanggal Keluar</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">
                    {{ $penduduk->tanggal_keluar ? $penduduk->tanggal_keluar->format('d F Y') : '-' }}
                </p>
            </div>

            <!-- Dibuat -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Dibuat</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->created_at->format('d F Y H:i') }}</p>
            </div>

            <!-- Diperbarui -->
            <div>
                <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Diperbarui</h3>
                <p class="mt-1 text-sm text-neutral-900 dark:text-neutral-100">{{ $penduduk->updated_at->format('d F Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="mt-6 flex justify-end space-x-3">
    <a href="{{ route('penduduks.index') }}"
       class="px-4 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg text-neutral-700 dark:text-neutral-300 hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors duration-200">
        Kembali
    </a>
    <a href="{{ route('penduduks.edit', $penduduk) }}"
       class="px-4 py-2 bg-warning-600 hover:bg-warning-700 text-white font-medium rounded-lg transition-colors duration-200">
        Edit Data
    </a>
</div>
@endsection
