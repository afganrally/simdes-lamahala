<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bansos;
use App\Models\User;
use App\Models\Penduduk;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user from database
        $user = User::first();

        if (!$user) {
            $this->command->warn('No users found in database. Please create a user first.');
            return;
        }

        // Get some penduduk for recipients
        $penduduks = Penduduk::take(20)->get();

        if ($penduduks->isEmpty()) {
            $this->command->warn('No penduduk found in database. Please create penduduk data first.');
            return;
        }

        $bansosData = [
            // PKH (Program Keluarga Harapan)
            [
                'jenis' => 'PKH',
                'kategori' => 'Uang Tunai',
                'jumlah' => 600000,
                'tanggal_penyaluran' => '2024-01-15',
                'sumber_dana' => 'APBN',
                'periode' => 'Januari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial bersyarat untuk keluarga sangat miskin',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[0]->id ?? null,
            ],
            [
                'jenis' => 'PKH',
                'kategori' => 'Uang Tunai',
                'jumlah' => 600000,
                'tanggal_penyaluran' => '2024-01-15',
                'sumber_dana' => 'APBN',
                'periode' => 'Januari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial bersyarat untuk keluarga sangat miskin',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[1]->id ?? null,
            ],
            [
                'jenis' => 'PKH',
                'kategori' => 'Uang Tunai',
                'jumlah' => 600000,
                'tanggal_penyaluran' => '2024-02-15',
                'sumber_dana' => 'APBN',
                'periode' => 'Februari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial bersyarat untuk keluarga sangat miskin',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[2]->id ?? null,
            ],
            [
                'jenis' => 'PKH',
                'kategori' => 'Uang Tunai',
                'jumlah' => 600000,
                'tanggal_penyaluran' => '2024-03-15',
                'sumber_dana' => 'APBN',
                'periode' => 'Maret 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial bersyarat untuk keluarga sangat miskin',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[3]->id ?? null,
            ],

            // BPNT (Bantuan Pangan Non Tunai)
            [
                'jenis' => 'BPNT',
                'kategori' => 'Sembako',
                'jumlah' => 200000,
                'tanggal_penyaluran' => '2024-01-10',
                'sumber_dana' => 'APBN',
                'periode' => 'Januari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[4]->id ?? null,
            ],
            [
                'jenis' => 'BPNT',
                'kategori' => 'Sembako',
                'jumlah' => 200000,
                'tanggal_penyaluran' => '2024-02-10',
                'sumber_dana' => 'APBN',
                'periode' => 'Februari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[5]->id ?? null,
            ],
            [
                'jenis' => 'BPNT',
                'kategori' => 'Sembako',
                'jumlah' => 200000,
                'tanggal_penyaluran' => '2024-03-10',
                'sumber_dana' => 'APBN',
                'periode' => 'Maret 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[6]->id ?? null,
            ],

            // BLT Dana Desa
            [
                'jenis' => 'BLT Dana Desa',
                'kategori' => 'Uang Tunai',
                'jumlah' => 300000,
                'tanggal_penyaluran' => '2024-01-20',
                'sumber_dana' => 'DD',
                'periode' => 'Tahap I - 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan langsung tunai dari dana desa',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[7]->id ?? null,
            ],
            [
                'jenis' => 'BLT Dana Desa',
                'kategori' => 'Uang Tunai',
                'jumlah' => 300000,
                'tanggal_penyaluran' => '2024-01-20',
                'sumber_dana' => 'DD',
                'periode' => 'Tahap I - 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan langsung tunai dari dana desa',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[8]->id ?? null,
            ],
            [
                'jenis' => 'BLT Dana Desa',
                'kategori' => 'Uang Tunai',
                'jumlah' => 300000,
                'tanggal_penyaluran' => '2024-07-20',
                'sumber_dana' => 'DD',
                'periode' => 'Tahap II - 2024',
                'status' => 'Pending',
                'keterangan' => 'Pindah ke luar daerah',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[9]->id ?? null,
            ],

            // BST (Bantuan Sosial Tunai)
            [
                'jenis' => 'BST',
                'kategori' => 'Uang Tunai',
                'jumlah' => 200000,
                'tanggal_penyaluran' => '2024-01-05',
                'sumber_dana' => 'APBN',
                'periode' => 'Januari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial tunai untuk keluarga penerima manfaat',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[10]->id ?? null,
            ],
            [
                'jenis' => 'BST',
                'kategori' => 'Uang Tunai',
                'jumlah' => 200000,
                'tanggal_penyaluran' => '2024-02-05',
                'sumber_dana' => 'APBN',
                'periode' => 'Februari 2024',
                'status' => 'Proses',
                'keterangan' => 'Pindah domisili ke kecamatan lain',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[11]->id ?? null,
            ],

            // Bansos Lokal
            [
                'jenis' => 'Bansos Lokal',
                'kategori' => 'Sembako',
                'jumlah' => 150000,
                'tanggal_penyaluran' => '2024-02-01',
                'sumber_dana' => 'APBD Desa',
                'periode' => 'Februari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial dari dana desa untuk warga terdampak',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[12]->id ?? null,
            ],
            [
                'jenis' => 'Bansos Lokal',
                'kategori' => 'Sembako',
                'jumlah' => 150000,
                'tanggal_penyaluran' => '2024-02-01',
                'sumber_dana' => 'APBD Desa',
                'periode' => 'Februari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial dari dana desa untuk warga terdampak',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[13]->id ?? null,
            ],
            [
                'jenis' => 'Bansos Lokal',
                'kategori' => 'Uang Tunai',
                'jumlah' => 100000,
                'tanggal_penyaluran' => '2024-03-01',
                'sumber_dana' => 'APBD Kabupaten',
                'periode' => 'Maret 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sosial dari dana kabupaten untuk lansia duafa',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[14]->id ?? null,
            ],

            // Program Sembako
            [
                'jenis' => 'Program Sembako',
                'kategori' => 'Sembako',
                'jumlah' => 110000,
                'tanggal_penyaluran' => '2024-01-12',
                'sumber_dana' => 'APBN',
                'periode' => 'Januari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Program pengganti Rastra dengan bantuan beras 10kg',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[15]->id ?? null,
            ],
            [
                'jenis' => 'Program Sembako',
                'kategori' => 'Sembako',
                'jumlah' => 110000,
                'tanggal_penyaluran' => '2024-02-12',
                'sumber_dana' => 'APBN',
                'periode' => 'Februari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Program pengganti Rastra dengan bantuan beras 10kg',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[16]->id ?? null,
            ],

            // KIP (Kartu Indonesia Pintar)
            [
                'jenis' => 'KIP',
                'kategori' => 'Pendidikan',
                'jumlah' => 450000,
                'tanggal_penyaluran' => '2024-02-01',
                'sumber_dana' => 'APBN',
                'periode' => 'Semester Genap 2023/2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan pendidikan untuk anak sekolah',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[17]->id ?? null,
            ],
            [
                'jenis' => 'KIP',
                'kategori' => 'Pendidikan',
                'jumlah' => 450000,
                'tanggal_penyaluran' => '2024-02-01',
                'sumber_dana' => 'APBN',
                'periode' => 'Semester Genap 2023/2024',
                'status' => 'Pending',
                'keterangan' => 'Anak sudah lulus sekolah',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[18]->id ?? null,
            ],

            // BPJS Kesehatan (PBI Jaminan Kesehatan)
            [
                'jenis' => 'PBI BPJS',
                'kategori' => 'Kesehatan',
                'jumlah' => 42000,
                'tanggal_penyaluran' => '2024-01-01',
                'sumber_dana' => 'APBN',
                'periode' => 'Januari 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Iuran BPJS Kesehatan kategori PBI',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[19]->id ?? null,
            ],

            // Bantuan Kendaraan
            [
                'jenis' => 'Bantuan Kendaraan',
                'kategori' => 'Barang',
                'jumlah' => 2500000,
                'tanggal_penyaluran' => '2024-03-15',
                'sumber_dana' => 'APBD Provinsi',
                'periode' => 'Tahun 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Bantuan sepeda motor untuk UMKM',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[0]->id ?? null,
            ],

            // Bantuan UMKM
            [
                'jenis' => 'Bantuan UMKM',
                'kategori' => 'Modal Usaha',
                'jumlah' => 5000000,
                'tanggal_penyaluran' => '2024-04-01',
                'sumber_dana' => 'APBD Desa',
                'periode' => 'Tahun 2024',
                'status' => 'Disalurkan',
                'keterangan' => 'Modal usaha untuk warung kelontong',
                'foto_dokumen' => null,
                'id_user' => $user->id,
                'id_penduduk' => $penduduks[1]->id ?? null,
            ],
        ];

        // Insert data
        foreach ($bansosData as $data) {
            Bansos::create($data);
        }

        $this->command->info('Successfully seeded ' . count($bansosData) . ' bansos records.');
    }
}
