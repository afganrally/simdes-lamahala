<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use Carbon\Carbon;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namaLaki = [
            'Ahmad', 'Budi', 'Caesar', 'Dedi', 'Eko', 'Feri', 'Gunawan', 'Hendra', 'Irfan', 'Joko',
            'Krisna', 'Lukman', 'Made', 'Nando', 'Oscar', 'Panji', 'Rafi', 'Sandi', 'Toni', 'Umar', 'Vino',
            'Wahyu', 'Yusuf', 'Zainal', 'Agus', 'Bayu', 'Chandra', 'Dony', 'Eka', 'Fajar', 'Gilang',
            'Hadi', 'Indra', 'Jefri', 'Kevin', 'Luis', 'Muhammad', 'Nando', 'Rizky', 'Satria', 'Teguh',
            'Utomo', 'Vicky', 'Wahyu', 'Yoga', 'Zaki'
        ];

        $namaPerempuan = [
            'Ayu', 'Bunga', 'Citra', 'Dewi', 'Eka', 'Fitri', 'Gita', 'Hana', 'Indah', 'Jihan',
            'Kartika', 'Lina', 'Maya', 'Nadia', 'Oliv', 'Putri', 'Qori', 'Ratna', 'Sari', 'Tari', 'Umi', 'Vivi',
            'Wulan', 'Yuni', 'Zahra', 'Amalia', 'Belinda', 'Cinta', 'Diana', 'Elsa', 'Fiona', 'Gita', 'Hesti',
            'Ina', 'Jasmin', 'Kania', 'Lestari', 'Melati', 'Nisa', 'Olif', 'Puput', 'Rina', 'Sari', 'Tari',
            'Umi', 'Vivi', 'Wulan', 'Yeni', 'Zulaikha'
        ];

        $tempatLahir = [
            'Larantuka', 'Lamahala Jaya', 'Adonara', 'Maumere', 'Lewoleba', 'Larantuka', 'Bali', 'Kupang',
            'Ende', 'Ruteng', 'Bajawa', 'Labuan Bajo', 'Waingapu', 'Waiblama', 'Wolowaru'
        ];

        $agamaList = ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha'];
        $pendidikanList = ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3', 'Tidak Sekolah'];
        $pekerjaanList = ['Petani', 'Nelayan', 'Wiraswasta', 'PNS', 'TNI', 'Polri', 'Guru', 'Buruh', 'Pedagang', 'Wiraswasta'];
        $statusPerkawinan = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
        $statusKeluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Famili Lain'];
        $statusTinggal = ['Tetap', 'Pindah', 'Meninggal'];
        $dusunList = ['Dusun I', 'Dusun II', 'Dusun III', 'Dusun IV', 'Dusun V', 'Dusun VI'];

        $penduduks = [];
        $currentYear = now()->year;

        // Generate 100 male
        for ($i = 1; $i <= 100; $i++) {
            $nama = $namaLaki[array_rand($namaLaki)] . ' ' . $this->getRandomSurname();

            // Calculate age for random birth year
            $birthYear = rand(1950, 2010);
            $age = $currentYear - $birthYear;

            // Determine age group
            if ($age < 5) {
                $ageGroup = 'balita';
            } elseif ($age < 12) {
                $ageGroup = 'anak';
            } elseif ($age < 18) {
                $ageGroup = 'remaja';
            } elseif ($age < 60) {
                $ageGroup = 'dewasa';
            } else {
                $ageGroup = 'lansia';
            }

            $penduduks[] = $this->generatePenduduk($i, $nama, 'L', $birthYear, $tempatLahir, $agamaList, $pendidikanList, $pekerjaanList, $statusPerkawinan, $statusKeluarga, $statusTinggal, $dusunList, $ageGroup);
        }

        // Generate 100 female
        for ($i = 101; $i <= 200; $i++) {
            $nama = $namaPerempuan[array_rand($namaPerempuan)] . ' ' . $this->getRandomSurname();

            // Calculate age for random birth year
            $birthYear = rand(1950, 2010);
            $age = $currentYear - $birthYear;

            // Determine age group
            if ($age < 5) {
                $ageGroup = 'balita';
            } elseif ($age < 12) {
                $ageGroup = 'anak';
            } elseif ($age < 18) {
                $ageGroup = 'remaja';
            } elseif ($age < 60) {
                $ageGroup = 'dewasa';
            } else {
                $ageGroup = 'lansia';
            }

            $penduduks[] = $this->generatePenduduk($i, $nama, 'P', $birthYear, $tempatLahir, $agamaList, $pendidikanList, $pekerjaanList, $statusPerkawinan, $statusKeluarga, $statusTinggal, $dusunList, $ageGroup);
        }

        foreach ($penduduks as $penduduk) {
            Penduduk::create($penduduk);
        }
    }

    private function getRandomSurname()
    {
        $surname = ['Bataona', 'Hadjar', 'Abu', 'Beboki', 'Nur', 'Karan', 'Minggu', 'Pono', 'Raka', 'Sari', 'Wati',
            'Klau', 'Muri', 'Laga', 'Hena', 'Meo', 'Ndi', 'Ria', 'Taka', 'Luka', 'Bani'];
        return $surname[array_rand($surname)];
    }

    private function generatePenduduk($index, $nama, $jenisKelamin, $birthYear, $tempatLahir, $agamaList, $pendidikanList, $pekerjaanList, $statusPerkawinan, $statusKeluarga, $statusTinggal, $dusunList, $ageGroup)
    {
        $month = rand(1, 12);
        $day = rand(1, 28);
        $tanggalLahir = sprintf('%04d-%02d-%02d', $birthYear, $month, $day);

        $nik = '53' . sprintf('%02d', rand(1, 99)) . sprintf('%02d', rand(1, 12)) . sprintf('%02d', rand(1, 30)) . sprintf('%04d', $index);
        $noKK = '53' . sprintf('%02d', rand(1, 99)) . sprintf('%06d', rand(1, 999999));

        $rt = (string) rand(1, 17);
        $rw = (string) rand(1, 6);
        $dusun = $dusunList[array_rand($dusunList)];

        return [
            'nik' => $nik,
            'nama' => $nama,
            'jenis_kelamin' => $jenisKelamin,
            'tempat_lahir' => $tempatLahir[array_rand($tempatLahir)],
            'tanggal_lahir' => $tanggalLahir,
            'agama' => $agamaList[array_rand($agamaList)],
            'pendidikan' => $pendidikanList[array_rand($pendidikanList)],
            'pekerjaan' => $pekerjaanList[array_rand($pekerjaanList)],
            'status_perkawinan' => $statusPerkawinan[array_rand($statusPerkawinan)],
            'alamat' => 'Jl. Kenari No. ' . rand(1, 100) . ', RT ' . $rt . ' RW ' . $rw,
            'dusun' => $dusun,
            'rt' => $rt,
            'rw' => $rw,
            'status_keluarga' => $statusKeluarga[array_rand($statusKeluarga)],
            'no_kk' => $noKK,
            'status_tinggal' => $statusTinggal[array_rand($statusTinggal)],
            'tanggal_masuk' => sprintf('%04d-%02d-%02d', rand(2015, 2024), rand(1, 12), rand(1, 28)),
            'tanggal_keluar' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
