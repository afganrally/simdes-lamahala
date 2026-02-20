<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilitas;
use App\Models\User;

class FasilitasSeeder extends Seeder
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

        $fasilitasData = [
            // Gedung
            [
                'nama' => 'Balai Desa',
                'jenis' => 'gedung',
                'detail' => 'Gedung utama balai desa dengan 2 lantai, digunakan untuk pertemuan dan kegiatan resmi desa',
                'jumlah' => 1,
                'lokasi' => 'Jl. Raya Desa No. 1, Lamahala',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk rapat desa, musyawarah, dan acara resmi',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Pos Kamling Utama',
                'jenis' => 'gedung',
                'detail' => 'Pos keamanan lingkungan utama desa',
                'jumlah' => 2,
                'lokasi' => 'Perbatasan Desa - RT 01',
                'kondisi' => 'rusak_ringan',
                'keterangan' => 'Perlu renovasi atap',
                'gambar' => null,
                'id_user' => $user->id,
            ],

            // Ruangan
            [
                'nama' => 'Aula Serbaguna',
                'jenis' => 'ruangan',
                'detail' => 'Aula kapasitas 200 orang dengan fasilitas sound system',
                'jumlah' => 1,
                'lokasi' => 'Balai Desa - Lantai 2',
                'kondisi' => 'baik',
                'keterangan' => 'Dapat digunakan untuk hajatan, seminar, dan pertemuan',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Ruang Pelayanan',
                'jenis' => 'ruangan',
                'detail' => 'Ruang pelayanan administrasi desa',
                'jumlah' => 3,
                'lokasi' => 'Balai Desa - Lantai 1',
                'kondisi' => 'baik',
                'keterangan' => 'Dilengkapi dengan meja dan kursi untuk pelayanan',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Ruang Arsip',
                'jenis' => 'ruangan',
                'detail' => 'Ruan penyimpanan dokumen dan arsip desa',
                'jumlah' => 1,
                'lokasi' => 'Balai Desa - Lantai 1',
                'kondisi' => 'maintenance',
                'keterangan' => 'Sedang dalam perbaikan sistem rak penyimpanan',
                'gambar' => null,
                'id_user' => $user->id,
            ],

            // Kendaraan
            [
                'nama' => 'Mobil Dinas',
                'jenis' => 'kendaraan',
                'detail' => 'Toyota Avanza tahun 2020, plat merah',
                'jumlah' => 1,
                'lokasi' => 'Garasi Balai Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk perjalanan dinas kepala desa dan perangkat',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Motor Dinas',
                'jenis' => 'kendaraan',
                'detail' => 'Honda Revo tahun 2022, plat merah',
                'jumlah' => 3,
                'lokasi' => 'Garasi Balai Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk operasional lapangan',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Ambulans Desa',
                'jenis' => 'kendaraan',
                'detail' => 'Mitsubishi XPander ambulans',
                'jumlah' => 1,
                'lokasi' => 'Garasi Balai Desa',
                'kondisi' => 'rusak_ringan',
                'keterangan' => 'AC tidak berfungsi, perlu servis',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Truk Pengangkut Sampah',
                'jenis' => 'kendaraan',
                'detail' => 'Truk pickup pengangkut sampah',
                'jumlah' => 1,
                'lokasi' => 'Gudang Desa',
                'kondisi' => 'rusak_berat',
                'keterangan' => 'Mesin rusak, perlu overhaul',
                'gambar' => null,
                'id_user' => $user->id,
            ],

            // Elektronik
            [
                'nama' => 'Sound System',
                'jenis' => 'elektronik',
                'detail' => 'Set sound system lengkap dengan speaker, mixer, dan microphone',
                'jumlah' => 2,
                'lokasi' => 'Aula Serbaguna',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk acara desa',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Proyektor',
                'jenis' => 'elektronik',
                'detail' => 'Proyektor Epson dengan layar 3x4 meter',
                'jumlah' => 2,
                'lokasi' => 'Aula Serbaguna',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk presentasi dan pertemuan',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Komputer Admin',
                'jenis' => 'elektronik',
                'detail' => 'PC Desktop dengan monitor 21 inch',
                'jumlah' => 5,
                'lokasi' => 'Ruang Pelayanan',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk pelayanan administrasi',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Printer',
                'jenis' => 'elektronik',
                'detail' => 'Printer Epson L3110',
                'jumlah' => 3,
                'lokasi' => 'Ruang Pelayanan',
                'kondisi' => 'maintenance',
                'keterangan' => 'Printer 2 unit perlu servis head printer',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Mesin Fotocopy',
                'jenis' => 'elektronik',
                'detail' => 'Mesin fotocopy Canon IR 5000',
                'jumlah' => 1,
                'lokasi' => 'Rang Pelayanan',
                'kondisi' => 'rusak_ringan',
                'keterangan' => 'Kertas sering macet, perlu teknisi',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Televisi',
                'jenis' => 'elektronik',
                'detail' => 'TV LED 42 inch',
                'jumlah' => 2,
                'lokasi' => 'Ruang Tunggu',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk display informasi desa',
                'gambar' => null,
                'id_user' => $user->id,
            ],

            // Olahraga
            [
                'nama' => 'Lapangan Bola Voli',
                'jenis' => 'olahraga',
                'detail' => 'Lapangan bola voli ukuran standar dengan lampu',
                'jumlah' => 1,
                'lokasi' => 'Halaman Balai Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk kegiatan olahraga warga',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Lapangan Badminton',
                'jenis' => 'olahraga',
                'detail' => 'Lapangan badminton indoor',
                'jumlah' => 2,
                'lokasi' => 'Gedung Serbaguna',
                'kondisi' => 'baik',
                'keterangan' => 'Dilengkapi dengan net dan lapangan',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Tenis Meja',
                'jenis' => 'olahraga',
                'detail' => 'Meja tenis meja standar dengan bet dan bola',
                'jumlah' => 2,
                'lokasi' => 'Gedung Serbaguna',
                'kondisi' => 'rusak_ringan',
                'keterangan' => 'Net perlu diganti',
                'gambar' => null,
                'id_user' => $user->id,
            ],

            // Lainnya
            [
                'nama' => 'Mesin Giling Padi',
                'jenis' => 'lainnya',
                'detail' => 'Mesin giling padi kapasitas 2 ton per jam',
                'jumlah' => 1,
                'lokasi' => 'Gudang Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk membantu petani giling padi',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Tenda Hajatan',
                'jenis' => 'lainnya',
                'detail' => 'Tenda ukuran 10x20 meter',
                'jumlah' => 3,
                'lokasi' => 'Gudang Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Dapat dipinjam untuk hajatan warga',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Kursi Hajatan',
                'jenis' => 'lainnya',
                'detail' => 'Kursi plastik dengan model lipat',
                'jumlah' => 200,
                'lokasi' => 'Gudang Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Dapat dipinjam untuk acara warga',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Meja Hajatan',
                'jenis' => 'lainnya',
                'detail' => 'Meja bulat ukuran 120cm',
                'jumlah' => 30,
                'lokasi' => 'Gudang Desa',
                'kondisi' => 'rusak_ringan',
                'keterangan' => '5 meja perlu perbaikan kaki',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Sound System Portable',
                'jenis' => 'lainnya',
                'detail' => 'Sound system portable dengan battery',
                'jumlah' => 2,
                'lokasi' => 'Gudang Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan untuk acara outdoor',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Alat Pemadam Kebakaran',
                'jenis' => 'lainnya',
                'detail' => 'APAB ukuran 5kg',
                'jumlah' => 10,
                'lokasi' => 'Gedung Balai Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Ditempatkan di setiap ruangan',
                'gambar' => null,
                'id_user' => $user->id,
            ],
            [
                'nama' => 'Lonceng Desa',
                'jenis' => 'lainnya',
                'detail' => 'Lonceng tradisional desa',
                'jumlah' => 1,
                'lokasi' => 'Menara Balai Desa',
                'kondisi' => 'baik',
                'keterangan' => 'Digunakan sebagai tanda bahaya atau pertemuan',
                'gambar' => null,
                'id_user' => $user->id,
            ],
        ];

        // Insert data
        foreach ($fasilitasData as $data) {
            Fasilitas::create($data);
        }

        $this->command->info('Successfully seeded ' . count($fasilitasData) . ' fasilitas records.');
    }
}
