@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center">
        <a href="{{ route('penduduks.index') }}" class="mr-4 text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Tambah Penduduk Baru</h1>
    </div>
</div>

<!-- Form Card -->
<div class="card">
    <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
        <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Informasi Penduduk</h2>
    </div>
    <div class="p-6">
        <form action="{{ route('penduduks.store') }}" method="POST">
            @csrf

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-900 border border-red-200 dark:border-red-700 text-red-800 dark:text-red-200 rounded-lg">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <strong>Terjadi kesalahan:</strong>
                    </div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NIK Field -->
                <div>
                    <label for="nik" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        NIK <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required maxlength="16"
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Nama Field -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Jenis Kelamin Field -->
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Jenis Kelamin <span class="text-red-500">*</span>
                    </label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required
                            class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Tempat Lahir Field -->
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Tempat Lahir <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Tanggal Lahir Field -->
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Tanggal Lahir <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Agama Field -->
                <div>
                    <label for="agama" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Agama <span class="text-red-500">*</span>
                    </label>
                    <select name="agama" id="agama" required
                            class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                        <option value="">Pilih Agama</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>

                <!-- Pendidikan Field -->
                <div>
                    <label for="pendidikan" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Pendidikan <span class="text-red-500">*</span>
                    </label>
                    <select name="pendidikan" id="pendidikan" required
                            class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                        <option value="">Pilih Pendidikan</option>
                        <option value="Tidak Sekolah" {{ old('pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                        <option value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA" {{ old('pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="D1" {{ old('pendidikan') == 'D1' ? 'selected' : '' }}>D1</option>
                        <option value="D2" {{ old('pendidikan') == 'D2' ? 'selected' : '' }}>D2</option>
                        <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
                        <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
                        <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
                        <option value="S3" {{ old('pendidikan') == 'S3' ? 'selected' : '' }}>S3</option>
                    </select>
                </div>

                <!-- Pekerjaan Field -->
                <div>
                    <label for="pekerjaan" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Pekerjaan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Status Perkawinan Field -->
                <div>
                    <label for="status_perkawinan" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Status Perkawinan <span class="text-red-500">*</span>
                    </label>
                    <select name="status_perkawinan" id="status_perkawinan" required
                            class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                        <option value="">Pilih Status Perkawinan</option>
                        <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                        <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                    </select>
                </div>

                <!-- Alamat Field -->
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Alamat <span class="text-red-500">*</span>
                    </label>
                    <textarea name="alamat" id="alamat" rows="3" required
                              class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">{{ old('alamat') }}</textarea>
                </div>

                <!-- Dusun Field -->
                <div>
                    <label for="dusun" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Dusun <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="dusun" id="dusun" value="{{ old('dusun') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- RT Field -->
                <div>
                    <label for="rt" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        RT <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="rt" id="rt" value="{{ old('rt') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- RW Field -->
                <div>
                    <label for="rw" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        RW <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="rw" id="rw" value="{{ old('rw') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Status Keluarga Field -->
                <div>
                    <label for="status_keluarga" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Status Keluarga <span class="text-red-500">*</span>
                    </label>
                    <select name="status_keluarga" id="status_keluarga" required
                            class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                        <option value="">Pilih Status Keluarga</option>
                        <option value="Kepala Keluarga" {{ old('status_keluarga') == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                        <option value="Istri" {{ old('status_keluarga') == 'Istri' ? 'selected' : '' }}>Istri</option>
                        <option value="Anak" {{ old('status_keluarga') == 'Anak' ? 'selected' : '' }}>Anak</option>
                        <option value="Lainnya" {{ old('status_keluarga') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- No KK Field -->
                <div>
                    <label for="no_kk" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        No. KK <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk') }}" required
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Status Tinggal Field -->
                <div>
                    <label for="status_tinggal" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Status Tinggal <span class="text-red-500">*</span>
                    </label>
                    <select name="status_tinggal" id="status_tinggal" required
                            class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                        <option value="">Pilih Status Tinggal</option>
                        <option value="Tetap" {{ old('status_tinggal') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                        <option value="Kontrak" {{ old('status_tinggal') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        <option value="Kost" {{ old('status_tinggal') == 'Kost' ? 'selected' : '' }}>Kost</option>
                        <option value="Lainnya" {{ old('status_tinggal') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Tanggal Masuk Field -->
                <div>
                    <label for="tanggal_masuk" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Tanggal Masuk
                    </label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>

                <!-- Tanggal Keluar Field -->
                <div>
                    <label for="tanggal_keluar" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Tanggal Keluar
                    </label>
                    <input type="date" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar') }}"
                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-neutral-800 dark:text-neutral-100">
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('penduduks.index') }}"
                   class="px-4 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg text-neutral-700 dark:text-neutral-300 hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors duration-200">
                    Simpan Penduduk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
