-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Feb 2026 pada 15.54
-- Versi server: 10.11.14-MariaDB-0ubuntu0.24.04.1
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simdes_lamahala`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `isi`, `penulis`, `tanggal`, `gambar`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'tst', '<img src=\"http://127.0.0.1:8000/storage/wysiwyg-images/wysiwyg-1770398028-6986214c04740.png\" alt=\"Gambar\" width=\"432\" height=\"313\" style=\"font-size: 0.9375rem; float: left; margin-top: 0px; margin-right: 1rem; margin-bottom: 1rem;\"><br><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><b>test</b></div><h1><b>test</b></h1><div>fgfggfg</div>', 'Afgan Rally', '2026-02-06', NULL, 1, '2026-02-06 09:15:41', '2026-02-06 09:15:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bansos`
--

CREATE TABLE `bansos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `tanggal_penyaluran` date NOT NULL,
  `sumber_dana` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `status` enum('Pending','Disalurkan','Proses','Batal') DEFAULT 'Pending',
  `keterangan` text DEFAULT NULL,
  `foto_dokumen` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_penduduk` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bansos`
--

INSERT INTO `bansos` (`id`, `jenis`, `kategori`, `jumlah`, `tanggal_penyaluran`, `sumber_dana`, `periode`, `status`, `keterangan`, `foto_dokumen`, `id_user`, `id_penduduk`, `created_at`, `updated_at`) VALUES
(1, 'PKH', 'Uang Tunai', 600000.00, '2024-01-15', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 1, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(2, 'PKH', 'Uang Tunai', 600000.00, '2024-01-15', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 2, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(3, 'PKH', 'Uang Tunai', 600000.00, '2024-02-15', 'APBN', 'Februari 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 3, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(4, 'PKH', 'Uang Tunai', 600000.00, '2024-03-15', 'APBN', 'Maret 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 4, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(5, 'BPNT', 'Sembako', 200000.00, '2024-01-10', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)', NULL, 1, 5, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(6, 'BPNT', 'Sembako', 200000.00, '2024-02-10', 'APBN', 'Februari 2024', 'Disalurkan', 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)', NULL, 1, 6, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(7, 'BPNT', 'Sembako', 200000.00, '2024-03-10', 'APBN', 'Maret 2024', 'Disalurkan', 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)', NULL, 1, 7, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(8, 'BLT Dana Desa', 'Uang Tunai', 300000.00, '2024-01-20', 'DD', 'Tahap I - 2024', 'Disalurkan', 'Bantuan langsung tunai dari dana desa', NULL, 1, 8, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(9, 'BLT Dana Desa', 'Uang Tunai', 300000.00, '2024-01-20', 'DD', 'Tahap I - 2024', 'Disalurkan', 'Bantuan langsung tunai dari dana desa', NULL, 1, 9, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(10, 'BLT Dana Desa', 'Uang Tunai', 300000.00, '2024-07-20', 'DD', 'Tahap II - 2024', 'Disalurkan', 'Pindah ke luar daerah', NULL, 1, 10, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(11, 'BST', 'Uang Tunai', 200000.00, '2024-01-05', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan sosial tunai untuk keluarga penerima manfaat', NULL, 1, 11, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(12, 'BST', 'Uang Tunai', 200000.00, '2024-02-05', 'APBN', 'Februari 2024', 'Disalurkan', 'Pindah domisili ke kecamatan lain', NULL, 1, 12, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(13, 'Bansos Lokal', 'Sembako', 150000.00, '2024-02-01', 'APBD Desa', 'Februari 2024', 'Disalurkan', 'Bantuan sosial dari dana desa untuk warga terdampak', NULL, 1, 13, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(14, 'Bansos Lokal', 'Sembako', 150000.00, '2024-02-01', 'APBD Desa', 'Februari 2024', 'Disalurkan', 'Bantuan sosial dari dana desa untuk warga terdampak', NULL, 1, 14, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(15, 'Bansos Lokal', 'Uang Tunai', 100000.00, '2024-03-01', 'APBD Kabupaten', 'Maret 2024', 'Disalurkan', 'Bantuan sosial dari dana kabupaten untuk lansia duafa', NULL, 1, 15, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(16, 'Program Sembako', 'Sembako', 110000.00, '2024-01-12', 'APBN', 'Januari 2024', 'Disalurkan', 'Program pengganti Rastra dengan bantuan beras 10kg', NULL, 1, 16, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(17, 'Program Sembako', 'Sembako', 110000.00, '2024-02-12', 'APBN', 'Februari 2024', 'Disalurkan', 'Program pengganti Rastra dengan bantuan beras 10kg', NULL, 1, 17, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(18, 'KIP', 'Pendidikan', 450000.00, '2024-02-01', 'APBN', 'Semester Genap 2023/2024', 'Disalurkan', 'Bantuan pendidikan untuk anak sekolah', NULL, 1, 18, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(19, 'KIP', 'Pendidikan', 450000.00, '2024-02-01', 'APBN', 'Semester Genap 2023/2024', 'Disalurkan', 'Anak sudah lulus sekolah', NULL, 1, 19, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(20, 'PBI BPJS', 'Kesehatan', 42000.00, '2024-01-01', 'APBN', 'Januari 2024', 'Disalurkan', 'Iuran BPJS Kesehatan kategori PBI', NULL, 1, 20, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(21, 'Bantuan Kendaraan', 'Barang', 2500000.00, '2024-03-15', 'APBD Provinsi', 'Tahun 2024', 'Disalurkan', 'Bantuan sepeda motor untuk UMKM', NULL, 1, 1, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(22, 'Bantuan UMKM', 'Modal Usaha', 5000000.00, '2024-04-01', 'APBD Desa', 'Tahun 2024', 'Disalurkan', 'Modal usaha untuk warung kelontong', NULL, 1, 2, '2026-02-15 14:37:32', '2026-02-15 14:37:32'),
(23, 'Quidem quis aliquid ', 'Ipsum voluptatem in ', 45.00, '1984-08-12', 'Iusto qui amet exer', 'Sit proident itaqu', 'Disalurkan', 'Eum aut doloribus et', NULL, 1, 81, '2026-02-15 14:44:37', '2026-02-15 14:44:37'),
(24, 'PKH', 'Uang Tunai', 600000.00, '2024-01-15', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 1, '2026-02-15 17:36:13', '2026-02-15 17:36:13'),
(25, 'PKH', 'Uang Tunai', 600000.00, '2024-01-15', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 2, '2026-02-15 17:36:13', '2026-02-15 17:36:13'),
(26, 'PKH', 'Uang Tunai', 600000.00, '2024-02-15', 'APBN', 'Februari 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 3, '2026-02-15 17:36:13', '2026-02-15 17:36:13'),
(27, 'PKH', 'Uang Tunai', 600000.00, '2024-03-15', 'APBN', 'Maret 2024', 'Disalurkan', 'Bantuan sosial bersyarat untuk keluarga sangat miskin', NULL, 1, 4, '2026-02-15 17:36:13', '2026-02-15 17:36:13'),
(28, 'BPNT', 'Sembako', 200000.00, '2024-01-10', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)', NULL, 1, 5, '2026-02-15 17:36:13', '2026-02-15 17:36:13'),
(29, 'BPNT', 'Sembako', 200000.00, '2024-02-10', 'APBN', 'Februari 2024', 'Disalurkan', 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)', NULL, 1, 6, '2026-02-15 17:36:13', '2026-02-15 17:36:13'),
(30, 'BPNT', 'Sembako', 200000.00, '2024-03-10', 'APBN', 'Maret 2024', 'Disalurkan', 'Bantuan pangan berupa sembako (beras, telur, minyak, gula)', NULL, 1, 7, '2026-02-15 17:36:13', '2026-02-15 17:36:13'),
(31, 'BLT Dana Desa', 'Uang Tunai', 300000.00, '2024-01-20', 'DD', 'Tahap I - 2024', 'Disalurkan', 'Bantuan langsung tunai dari dana desa', NULL, 1, 8, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(32, 'BLT Dana Desa', 'Uang Tunai', 300000.00, '2024-01-20', 'DD', 'Tahap I - 2024', 'Disalurkan', 'Bantuan langsung tunai dari dana desa', NULL, 1, 9, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(33, 'BLT Dana Desa', 'Uang Tunai', 300000.00, '2024-07-20', 'DD', 'Tahap II - 2024', 'Pending', 'Pindah ke luar daerah', NULL, 1, 10, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(34, 'BST', 'Uang Tunai', 200000.00, '2024-01-05', 'APBN', 'Januari 2024', 'Disalurkan', 'Bantuan sosial tunai untuk keluarga penerima manfaat', NULL, 1, 11, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(35, 'BST', 'Uang Tunai', 200000.00, '2024-02-05', 'APBN', 'Februari 2024', 'Proses', 'Pindah domisili ke kecamatan lain', NULL, 1, 12, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(36, 'Bansos Lokal', 'Sembako', 150000.00, '2024-02-01', 'APBD Desa', 'Februari 2024', 'Disalurkan', 'Bantuan sosial dari dana desa untuk warga terdampak', NULL, 1, 13, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(37, 'Bansos Lokal', 'Sembako', 150000.00, '2024-02-01', 'APBD Desa', 'Februari 2024', 'Disalurkan', 'Bantuan sosial dari dana desa untuk warga terdampak', NULL, 1, 14, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(38, 'Bansos Lokal', 'Uang Tunai', 100000.00, '2024-03-01', 'APBD Kabupaten', 'Maret 2024', 'Disalurkan', 'Bantuan sosial dari dana kabupaten untuk lansia duafa', NULL, 1, 15, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(39, 'Program Sembako', 'Sembako', 110000.00, '2024-01-12', 'APBN', 'Januari 2024', 'Disalurkan', 'Program pengganti Rastra dengan bantuan beras 10kg', NULL, 1, 16, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(40, 'Program Sembako', 'Sembako', 110000.00, '2024-02-12', 'APBN', 'Februari 2024', 'Disalurkan', 'Program pengganti Rastra dengan bantuan beras 10kg', NULL, 1, 17, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(41, 'KIP', 'Pendidikan', 450000.00, '2024-02-01', 'APBN', 'Semester Genap 2023/2024', 'Disalurkan', 'Bantuan pendidikan untuk anak sekolah', NULL, 1, 18, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(42, 'KIP', 'Pendidikan', 450000.00, '2024-02-01', 'APBN', 'Semester Genap 2023/2024', 'Pending', 'Anak sudah lulus sekolah', NULL, 1, 19, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(43, 'PBI BPJS', 'Kesehatan', 42000.00, '2024-01-01', 'APBN', 'Januari 2024', 'Disalurkan', 'Iuran BPJS Kesehatan kategori PBI', NULL, 1, 20, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(44, 'Bantuan Kendaraan', 'Barang', 2500000.00, '2024-03-15', 'APBD Provinsi', 'Tahun 2024', 'Disalurkan', 'Bantuan sepeda motor untuk UMKM', NULL, 1, 1, '2026-02-15 17:36:14', '2026-02-15 17:36:14'),
(45, 'Bantuan UMKM', 'Modal Usaha', 5000000.00, '2024-04-01', 'APBD Desa', 'Tahun 2024', 'Disalurkan', 'Modal usaha untuk warung kelontong', NULL, 1, 2, '2026-02-15 17:36:14', '2026-02-15 17:36:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('gedung','ruangan','kendaraan','elektronik','olahraga','lainnya') NOT NULL DEFAULT 'lainnya',
  `detail` text DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `lokasi` varchar(255) NOT NULL,
  `kondisi` enum('baik','rusak_ringan','rusak_berat','maintenance') NOT NULL DEFAULT 'baik',
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `jenis`, `detail`, `jumlah`, `lokasi`, `kondisi`, `keterangan`, `gambar`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Balai Desa', 'gedung', 'Gedung utama balai desa dengan 2 lantai, digunakan untuk pertemuan dan kegiatan resmi desa', 1, 'Jl. Raya Desa No. 1, Lamahala', 'baik', 'Digunakan untuk rapat desa, musyawarah, dan acara resmi', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(2, 'Pos Kamling Utama', 'gedung', 'Pos keamanan lingkungan utama desa', 2, 'Perbatasan Desa - RT 01', 'rusak_ringan', 'Perlu renovasi atap', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(3, 'Aula Serbaguna', 'ruangan', 'Aula kapasitas 200 orang dengan fasilitas sound system', 1, 'Balai Desa - Lantai 2', 'baik', 'Dapat digunakan untuk hajatan, seminar, dan pertemuan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(4, 'Ruang Pelayanan', 'ruangan', 'Ruang pelayanan administrasi desa', 3, 'Balai Desa - Lantai 1', 'baik', 'Dilengkapi dengan meja dan kursi untuk pelayanan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(5, 'Ruang Arsip', 'ruangan', 'Ruan penyimpanan dokumen dan arsip desa', 1, 'Balai Desa - Lantai 1', 'maintenance', 'Sedang dalam perbaikan sistem rak penyimpanan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(6, 'Mobil Dinas', 'kendaraan', 'Toyota Avanza tahun 2020, plat merah', 1, 'Garasi Balai Desa', 'baik', 'Digunakan untuk perjalanan dinas kepala desa dan perangkat', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(7, 'Motor Dinas', 'kendaraan', 'Honda Revo tahun 2022, plat merah', 3, 'Garasi Balai Desa', 'baik', 'Digunakan untuk operasional lapangan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(8, 'Ambulans Desa', 'kendaraan', 'Mitsubishi XPander ambulans', 1, 'Garasi Balai Desa', 'rusak_ringan', 'AC tidak berfungsi, perlu servis', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(9, 'Truk Pengangkut Sampah', 'kendaraan', 'Truk pickup pengangkut sampah', 1, 'Gudang Desa', 'rusak_berat', 'Mesin rusak, perlu overhaul', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(10, 'Sound System', 'elektronik', 'Set sound system lengkap dengan speaker, mixer, dan microphone', 2, 'Aula Serbaguna', 'baik', 'Digunakan untuk acara desa', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(11, 'Proyektor', 'elektronik', 'Proyektor Epson dengan layar 3x4 meter', 2, 'Aula Serbaguna', 'baik', 'Digunakan untuk presentasi dan pertemuan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(12, 'Komputer Admin', 'elektronik', 'PC Desktop dengan monitor 21 inch', 5, 'Ruang Pelayanan', 'baik', 'Digunakan untuk pelayanan administrasi', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(13, 'Printer', 'elektronik', 'Printer Epson L3110', 3, 'Ruang Pelayanan', 'maintenance', 'Printer 2 unit perlu servis head printer', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(14, 'Mesin Fotocopy', 'elektronik', 'Mesin fotocopy Canon IR 5000', 1, 'Rang Pelayanan', 'rusak_ringan', 'Kertas sering macet, perlu teknisi', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(15, 'Televisi', 'elektronik', 'TV LED 42 inch', 2, 'Ruang Tunggu', 'baik', 'Digunakan untuk display informasi desa', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(16, 'Lapangan Bola Voli', 'olahraga', 'Lapangan bola voli ukuran standar dengan lampu', 1, 'Halaman Balai Desa', 'baik', 'Digunakan untuk kegiatan olahraga warga', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(17, 'Lapangan Badminton', 'olahraga', 'Lapangan badminton indoor', 2, 'Gedung Serbaguna', 'baik', 'Dilengkapi dengan net dan lapangan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(18, 'Tenis Meja', 'olahraga', 'Meja tenis meja standar dengan bet dan bola', 2, 'Gedung Serbaguna', 'rusak_ringan', 'Net perlu diganti', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(19, 'Mesin Giling Padi', 'lainnya', 'Mesin giling padi kapasitas 2 ton per jam', 1, 'Gudang Desa', 'baik', 'Digunakan untuk membantu petani giling padi', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(20, 'Tenda Hajatan', 'lainnya', 'Tenda ukuran 10x20 meter', 3, 'Gudang Desa', 'baik', 'Dapat dipinjam untuk hajatan warga', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(21, 'Kursi Hajatan', 'lainnya', 'Kursi plastik dengan model lipat', 200, 'Gudang Desa', 'baik', 'Dapat dipinjam untuk acara warga', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(22, 'Meja Hajatan', 'lainnya', 'Meja bulat ukuran 120cm', 30, 'Gudang Desa', 'rusak_ringan', '5 meja perlu perbaikan kaki', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(23, 'Sound System Portable', 'lainnya', 'Sound system portable dengan battery', 2, 'Gudang Desa', 'baik', 'Digunakan untuk acara outdoor', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(24, 'Alat Pemadam Kebakaran', 'lainnya', 'APAB ukuran 5kg', 10, 'Gedung Balai Desa', 'baik', 'Ditempatkan di setiap ruangan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46'),
(25, 'Lonceng Desa', 'lainnya', 'Lonceng tradisional desa', 1, 'Menara Balai Desa', 'baik', 'Digunakan sebagai tanda bahaya atau pertemuan', NULL, 1, '2026-02-13 08:32:46', '2026-02-13 08:32:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_19_231158_create_penduduks_table', 1),
(5, '2025_12_20_192737_create_fasilitas_table', 1),
(6, '2025_12_21_102427_make_tanggal_fields_nullable_in_penduduks_table', 1),
(7, '2025_12_22_030755_create_bansos_table', 1),
(8, '2025_12_22_071840_create_artikels_table', 1),
(10, '2025_12_26_010706_create_permissions_table', 2),
(11, '2026_02_15_224712_rename_status_penerima_to_status_in_bansos_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `username` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `dusun` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `status_tinggal` varchar(255) NOT NULL,
  `status_keluarga` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduks`
--

INSERT INTO `penduduks` (`id`, `nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `status_perkawinan`, `alamat`, `dusun`, `rt`, `rw`, `status_tinggal`, `status_keluarga`, `no_kk`, `tanggal_masuk`, `tanggal_keluar`, `created_at`, `updated_at`) VALUES
(1, 'Corrupti cillum', 'Pariatur Voluptate ', 'P', 'Unde ea atque quia d', '2021-02-24', 'Hindu', 'Tidak Sekolah', 'Ipsam aliquip volupt', 'Belum Kawin', 'Magni tempore iste ', 'Tempor nulla volupta', 'Animi voluptatem U', 'At animi similique ', 'Tetap', 'Kepala Keluarga', 'Atque magni eu eos u', '2014-11-17', '2010-12-15', '2025-12-30 08:10:47', '2025-12-30 08:10:47'),
(2, 'Amet dolor illo', 'Laboriosam id tempo', 'P', 'Sunt necessitatibus ', '1978-02-28', 'Buddha', 'SD', 'Ex sint soluta quia ', 'Kawin', 'Mollitia commodo vol', 'Assumenda nostrum te', 'Qui rerum voluptas n', 'Esse blanditiis sed', 'Kost', 'Kepala Keluarga', 'Dolorum nostrud exer', '2001-03-21', '1986-07-21', '2025-12-30 08:10:56', '2025-12-30 08:10:56'),
(3, '532607240001', 'Wahyu Muri', 'L', 'Kupang', '1953-09-01', 'Katolik', 'Tidak Sekolah', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 48, RT 16 RW 1', 'Dusun III', '16', '1', 'Tetap', 'Famili Lain', '5395350394', '2019-12-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(4, '531808210002', 'Irfan Hena', 'L', 'Kupang', '2002-04-15', 'Protestan', 'SMA', 'Nelayan', 'Kawin', 'Jl. Kenari No. 86, RT 17 RW 1', 'Dusun V', '17', '1', 'Meninggal', 'Famili Lain', '5358063564', '2015-03-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(5, '535611090003', 'Vino Taka', 'L', 'Waiblama', '1980-09-08', 'Islam', 'S3', 'Nelayan', 'Kawin', 'Jl. Kenari No. 5, RT 7 RW 2', 'Dusun V', '7', '2', 'Meninggal', 'Istri', '5302387139', '2020-06-03', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(6, '532910170004', 'Oscar Minggu', 'L', 'Waingapu', '1995-03-24', 'Islam', 'SMP', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 51, RT 2 RW 3', 'Dusun IV', '2', '3', 'Meninggal', 'Istri', '5371920998', '2020-01-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(7, '536104260005', 'Budi Hadjar', 'L', 'Lewoleba', '1993-08-25', 'Protestan', 'S1', 'PNS', 'Kawin', 'Jl. Kenari No. 1, RT 10 RW 4', 'Dusun IV', '10', '4', 'Meninggal', 'Anak', '5326657372', '2022-02-03', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(8, '533208300006', 'Ahmad Hena', 'L', 'Waingapu', '1957-06-10', 'Katolik', 'S3', 'PNS', 'Cerai Mati', 'Jl. Kenari No. 72, RT 10 RW 4', 'Dusun III', '10', '4', 'Meninggal', 'Famili Lain', '5335171845', '2017-03-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(9, '530802280007', 'Umar Laga', 'L', 'Bali', '2009-03-28', 'Buddha', 'SMP', 'Buruh', 'Cerai Hidup', 'Jl. Kenari No. 83, RT 6 RW 6', 'Dusun I', '6', '6', 'Meninggal', 'Istri', '5384607817', '2016-08-25', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(10, '533701100008', 'Budi Ndi', 'L', 'Kupang', '1957-08-10', 'Islam', 'S1', 'Petani', 'Cerai Mati', 'Jl. Kenari No. 92, RT 3 RW 2', 'Dusun III', '3', '2', 'Meninggal', 'Kepala Keluarga', '5345131056', '2021-01-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(11, '530612140009', 'Krisna Luka', 'L', 'Bali', '1956-08-11', 'Katolik', 'SD', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 85, RT 8 RW 5', 'Dusun V', '8', '5', 'Meninggal', 'Kepala Keluarga', '5379577277', '2022-10-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(12, '539402240010', 'Dedi Sari', 'L', 'Bali', '2002-05-05', 'Protestan', 'SMA', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 35, RT 15 RW 6', 'Dusun V', '15', '6', 'Tetap', 'Kepala Keluarga', '5311381068', '2020-03-05', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(13, '535307010011', 'Caesar Pono', 'L', 'Wolowaru', '1990-06-24', 'Islam', 'S2', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 11, RT 2 RW 3', 'Dusun IV', '2', '3', 'Tetap', 'Famili Lain', '5324870349', '2021-03-05', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(14, '531702250012', 'Utomo Taka', 'L', 'Larantuka', '2002-11-03', 'Islam', 'D3', 'TNI', 'Cerai Mati', 'Jl. Kenari No. 57, RT 4 RW 2', 'Dusun VI', '4', '2', 'Meninggal', 'Kepala Keluarga', '5374285789', '2017-01-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(15, '538803070013', 'Caesar Pono', 'L', 'Labuan Bajo', '1999-11-09', 'Protestan', 'S1', 'Pedagang', 'Kawin', 'Jl. Kenari No. 39, RT 16 RW 5', 'Dusun IV', '16', '5', 'Meninggal', 'Anak', '5341288365', '2019-11-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(16, '534312010014', 'Vino Bani', 'L', 'Lamahala Jaya', '1957-02-04', 'Protestan', 'Tidak Sekolah', 'Pedagang', 'Kawin', 'Jl. Kenari No. 42, RT 13 RW 4', 'Dusun I', '13', '4', 'Meninggal', 'Anak', '5313218351', '2019-07-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(17, '537904010015', 'Satria Luka', 'L', 'Maumere', '1950-10-02', 'Buddha', 'S3', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 11, RT 9 RW 2', 'Dusun III', '9', '2', 'Meninggal', 'Anak', '5302048716', '2017-07-28', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(18, '535808010016', 'Lukman Ria', 'L', 'Larantuka', '1993-12-08', 'Hindu', 'SD', 'Polri', 'Kawin', 'Jl. Kenari No. 26, RT 15 RW 6', 'Dusun IV', '15', '6', 'Tetap', 'Anak', '5324394527', '2023-10-27', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(19, '533201280017', 'Teguh Karan', 'L', 'Adonara', '1951-01-26', 'Katolik', 'SMA', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 37, RT 16 RW 5', 'Dusun V', '16', '5', 'Pindah', 'Kepala Keluarga', '5397442728', '2021-06-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(20, '538410100018', 'Feri Raka', 'L', 'Larantuka', '1989-03-10', 'Buddha', 'S1', 'Guru', 'Belum Kawin', 'Jl. Kenari No. 71, RT 17 RW 6', 'Dusun IV', '17', '6', 'Meninggal', 'Kepala Keluarga', '5357127057', '2015-07-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(21, '536803260019', 'Zainal Muri', 'L', 'Bajawa', '1998-01-05', 'Hindu', 'S1', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 16, RT 3 RW 1', 'Dusun VI', '3', '1', 'Tetap', 'Istri', '5369710797', '2017-01-25', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(22, '535309210020', 'Indra Sari', 'L', 'Ende', '1969-06-21', 'Protestan', 'Tidak Sekolah', 'PNS', 'Kawin', 'Jl. Kenari No. 75, RT 1 RW 5', 'Dusun V', '1', '5', 'Meninggal', 'Kepala Keluarga', '5355011279', '2019-12-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(23, '531605120021', 'Teguh Minggu', 'L', 'Bali', '2007-06-05', 'Protestan', 'SD', 'Petani', 'Cerai Mati', 'Jl. Kenari No. 97, RT 12 RW 3', 'Dusun III', '12', '3', 'Tetap', 'Famili Lain', '5330091358', '2022-02-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(24, '537411100022', 'Rafi Minggu', 'L', 'Ende', '1962-11-05', 'Buddha', 'S3', 'TNI', 'Kawin', 'Jl. Kenari No. 30, RT 6 RW 3', 'Dusun I', '6', '3', 'Tetap', 'Kepala Keluarga', '5349978928', '2015-03-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(25, '531108060023', 'Irfan Hadjar', 'L', 'Bali', '1997-01-14', 'Protestan', 'D3', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 19, RT 10 RW 4', 'Dusun VI', '10', '4', 'Tetap', 'Kepala Keluarga', '5338317561', '2018-11-05', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(26, '538701170024', 'Panji Ria', 'L', 'Labuan Bajo', '1981-02-10', 'Islam', 'SMP', 'Nelayan', 'Cerai Mati', 'Jl. Kenari No. 25, RT 11 RW 6', 'Dusun VI', '11', '6', 'Pindah', 'Anak', '5301579965', '2017-05-28', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(27, '539408120025', 'Eka Ndi', 'L', 'Lamahala Jaya', '1970-03-13', 'Islam', 'S1', 'Guru', 'Cerai Hidup', 'Jl. Kenari No. 33, RT 4 RW 3', 'Dusun III', '4', '3', 'Pindah', 'Istri', '5308258706', '2022-06-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(28, '530609160026', 'Gilang Bataona', 'L', 'Ruteng', '1951-10-18', 'Protestan', 'S2', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 72, RT 1 RW 1', 'Dusun I', '1', '1', 'Meninggal', 'Anak', '5345854490', '2020-07-04', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(29, '533507040027', 'Wahyu Raka', 'L', 'Ruteng', '1977-01-25', 'Protestan', 'S2', 'TNI', 'Belum Kawin', 'Jl. Kenari No. 72, RT 10 RW 5', 'Dusun IV', '10', '5', 'Meninggal', 'Famili Lain', '5399977821', '2018-11-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(30, '530904030028', 'Fajar Nur', 'L', 'Adonara', '1977-05-24', 'Islam', 'S1', 'Pedagang', 'Kawin', 'Jl. Kenari No. 49, RT 8 RW 6', 'Dusun V', '8', '6', 'Meninggal', 'Istri', '5339243073', '2017-04-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(31, '532610030029', 'Panji Abu', 'L', 'Larantuka', '1968-07-01', 'Hindu', 'D3', 'Guru', 'Belum Kawin', 'Jl. Kenari No. 22, RT 12 RW 2', 'Dusun II', '12', '2', 'Tetap', 'Anak', '5368281235', '2015-12-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(32, '531807100030', 'Indra Ndi', 'L', 'Lamahala Jaya', '1953-07-26', 'Hindu', 'SMA', 'TNI', 'Cerai Mati', 'Jl. Kenari No. 81, RT 17 RW 4', 'Dusun I', '17', '4', 'Meninggal', 'Istri', '5317637336', '2017-10-11', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(33, '538502130031', 'Nando Bataona', 'L', 'Waiblama', '1972-04-17', 'Islam', 'S2', 'Petani', 'Cerai Hidup', 'Jl. Kenari No. 40, RT 6 RW 3', 'Dusun III', '6', '3', 'Meninggal', 'Istri', '5350230151', '2020-05-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(34, '537308010032', 'Oscar Meo', 'L', 'Lamahala Jaya', '2010-01-06', 'Islam', 'S3', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 20, RT 7 RW 6', 'Dusun V', '7', '6', 'Tetap', 'Famili Lain', '5315423707', '2019-07-13', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(35, '532603040033', 'Wahyu Taka', 'L', 'Bajawa', '1969-09-13', 'Hindu', 'SMP', 'PNS', 'Belum Kawin', 'Jl. Kenari No. 56, RT 10 RW 3', 'Dusun IV', '10', '3', 'Pindah', 'Anak', '5304993668', '2024-04-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(36, '536910090034', 'Sandi Luka', 'L', 'Ende', '1979-08-21', 'Hindu', 'Tidak Sekolah', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 87, RT 2 RW 3', 'Dusun V', '2', '3', 'Pindah', 'Kepala Keluarga', '5332549989', '2020-02-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(37, '538402140035', 'Yoga Hadjar', 'L', 'Larantuka', '1966-02-19', 'Katolik', 'SMP', 'Nelayan', 'Cerai Hidup', 'Jl. Kenari No. 7, RT 16 RW 5', 'Dusun VI', '16', '5', 'Meninggal', 'Famili Lain', '5307175305', '2024-06-23', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(38, '535403290036', 'Chandra Hena', 'L', 'Waingapu', '2003-12-04', 'Islam', 'D3', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 70, RT 3 RW 1', 'Dusun V', '3', '1', 'Tetap', 'Famili Lain', '5395735918', '2015-01-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(39, '539609060037', 'Hendra Ndi', 'L', 'Bali', '2001-04-06', 'Buddha', 'SMP', 'Buruh', 'Cerai Hidup', 'Jl. Kenari No. 77, RT 16 RW 1', 'Dusun III', '16', '1', 'Tetap', 'Anak', '5318664241', '2024-10-20', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(40, '535110060038', 'Dony Nur', 'L', 'Lamahala Jaya', '1979-12-03', 'Katolik', 'S3', 'Nelayan', 'Cerai Hidup', 'Jl. Kenari No. 75, RT 10 RW 5', 'Dusun II', '10', '5', 'Meninggal', 'Famili Lain', '5319706089', '2022-08-11', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(41, '535612220039', 'Irfan Klau', 'L', 'Ende', '1992-07-27', 'Katolik', 'S1', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 63, RT 13 RW 3', 'Dusun V', '13', '3', 'Pindah', 'Anak', '5304590515', '2017-07-20', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(42, '536811280040', 'Sandi Bataona', 'L', 'Adonara', '1957-03-13', 'Islam', 'Tidak Sekolah', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 66, RT 12 RW 3', 'Dusun II', '12', '3', 'Pindah', 'Istri', '5399708563', '2020-05-15', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(43, '533604300041', 'Toni Abu', 'L', 'Larantuka', '1962-05-21', 'Protestan', 'S3', 'Buruh', 'Kawin', 'Jl. Kenari No. 12, RT 10 RW 1', 'Dusun I', '10', '1', 'Meninggal', 'Istri', '5331429545', '2023-02-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(44, '537312260042', 'Indra Minggu', 'L', 'Wolowaru', '1989-06-07', 'Protestan', 'S1', 'Polri', 'Cerai Hidup', 'Jl. Kenari No. 82, RT 11 RW 3', 'Dusun V', '11', '3', 'Tetap', 'Famili Lain', '5325161004', '2022-05-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(45, '536407160043', 'Lukman Klau', 'L', 'Bajawa', '1986-09-19', 'Buddha', 'Tidak Sekolah', 'TNI', 'Belum Kawin', 'Jl. Kenari No. 100, RT 12 RW 2', 'Dusun V', '12', '2', 'Meninggal', 'Istri', '5346305705', '2022-08-20', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(46, '535009180044', 'Oscar Minggu', 'L', 'Waiblama', '1982-06-09', 'Hindu', 'D3', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 18, RT 14 RW 1', 'Dusun VI', '14', '1', 'Meninggal', 'Anak', '5342437764', '2016-05-28', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(47, '535809040045', 'Agus Abu', 'L', 'Larantuka', '1956-11-18', 'Buddha', 'Tidak Sekolah', 'TNI', 'Kawin', 'Jl. Kenari No. 1, RT 2 RW 6', 'Dusun IV', '2', '6', 'Tetap', 'Anak', '5377703883', '2024-08-22', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(48, '532201240046', 'Wahyu Bataona', 'L', 'Wolowaru', '1950-06-16', 'Buddha', 'S1', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 86, RT 14 RW 3', 'Dusun IV', '14', '3', 'Meninggal', 'Anak', '5371622097', '2020-05-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(49, '534710170047', 'Joko Wati', 'L', 'Larantuka', '2006-08-18', 'Katolik', 'S2', 'PNS', 'Belum Kawin', 'Jl. Kenari No. 45, RT 5 RW 5', 'Dusun I', '5', '5', 'Pindah', 'Kepala Keluarga', '5307756591', '2020-02-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(50, '536002300048', 'Caesar Ria', 'L', 'Bajawa', '1966-04-15', 'Islam', 'SMA', 'TNI', 'Belum Kawin', 'Jl. Kenari No. 3, RT 15 RW 6', 'Dusun V', '15', '6', 'Meninggal', 'Istri', '5386542043', '2016-09-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(51, '537609020049', 'Zainal Raka', 'L', 'Adonara', '1983-11-27', 'Buddha', 'SMP', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 40, RT 4 RW 1', 'Dusun III', '4', '1', 'Tetap', 'Anak', '5330491504', '2018-01-03', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(52, '538901260050', 'Made Bani', 'L', 'Larantuka', '1981-09-26', 'Buddha', 'S2', 'Polri', 'Kawin', 'Jl. Kenari No. 13, RT 3 RW 5', 'Dusun IV', '3', '5', 'Pindah', 'Famili Lain', '5347730327', '2017-07-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(53, '532910170051', 'Rizky Nur', 'L', 'Adonara', '2000-11-27', 'Buddha', 'SMP', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 73, RT 6 RW 1', 'Dusun IV', '6', '1', 'Pindah', 'Kepala Keluarga', '5397000517', '2017-01-22', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(54, '536412280052', 'Rafi Nur', 'L', 'Bajawa', '1968-11-20', 'Katolik', 'D3', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 100, RT 1 RW 2', 'Dusun IV', '1', '2', 'Tetap', 'Anak', '5365847075', '2017-12-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(55, '530209090053', 'Hendra Bani', 'L', 'Larantuka', '1985-09-15', 'Buddha', 'Tidak Sekolah', 'PNS', 'Cerai Mati', 'Jl. Kenari No. 42, RT 13 RW 4', 'Dusun IV', '13', '4', 'Tetap', 'Istri', '5328971510', '2017-03-28', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(56, '534008230054', 'Irfan Luka', 'L', 'Bali', '1957-04-20', 'Hindu', 'SMA', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 29, RT 1 RW 6', 'Dusun VI', '1', '6', 'Tetap', 'Istri', '5347175267', '2023-04-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(57, '539811280055', 'Made Ndi', 'L', 'Ruteng', '1968-06-02', 'Islam', 'D3', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 1, RT 13 RW 4', 'Dusun V', '13', '4', 'Pindah', 'Istri', '5306019060', '2023-04-05', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(58, '535506070056', 'Yoga Pono', 'L', 'Adonara', '1975-03-01', 'Islam', 'S3', 'Pedagang', 'Cerai Mati', 'Jl. Kenari No. 19, RT 17 RW 4', 'Dusun I', '17', '4', 'Pindah', 'Famili Lain', '5319537249', '2024-01-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(59, '533405090057', 'Umar Raka', 'L', 'Larantuka', '1992-08-14', 'Buddha', 'S3', 'Petani', 'Cerai Mati', 'Jl. Kenari No. 73, RT 14 RW 4', 'Dusun IV', '14', '4', 'Pindah', 'Anak', '5375789584', '2018-10-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(60, '537506050058', 'Gilang Wati', 'L', 'Waingapu', '1991-02-07', 'Buddha', 'S1', 'Petani', 'Cerai Hidup', 'Jl. Kenari No. 61, RT 14 RW 6', 'Dusun IV', '14', '6', 'Tetap', 'Istri', '5389431843', '2017-11-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(61, '530907040059', 'Rafi Minggu', 'L', 'Maumere', '1990-01-06', 'Hindu', 'S1', 'Polri', 'Kawin', 'Jl. Kenari No. 9, RT 6 RW 4', 'Dusun III', '6', '4', 'Meninggal', 'Istri', '5368160601', '2020-05-15', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(62, '539904180060', 'Jefri Nur', 'L', 'Lewoleba', '1952-05-11', 'Protestan', 'S1', 'Petani', 'Cerai Mati', 'Jl. Kenari No. 81, RT 13 RW 5', 'Dusun I', '13', '5', 'Pindah', 'Istri', '5398031477', '2015-09-10', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(63, '537004270061', 'Zaki Nur', 'L', 'Lewoleba', '1987-05-08', 'Buddha', 'S3', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 71, RT 17 RW 3', 'Dusun III', '17', '3', 'Tetap', 'Istri', '5341326600', '2017-02-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(64, '531309280062', 'Indra Sari', 'L', 'Bali', '1966-11-14', 'Hindu', 'S3', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 56, RT 12 RW 2', 'Dusun VI', '12', '2', 'Pindah', 'Anak', '5348303977', '2015-09-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(65, '537606190063', 'Dony Hena', 'L', 'Maumere', '1959-12-04', 'Islam', 'D3', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 41, RT 12 RW 6', 'Dusun V', '12', '6', 'Meninggal', 'Anak', '5322335894', '2020-11-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(66, '535008050064', 'Wahyu Pono', 'L', 'Wolowaru', '1963-08-24', 'Hindu', 'S1', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 7, RT 17 RW 4', 'Dusun VI', '17', '4', 'Pindah', 'Istri', '5356417061', '2018-12-10', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(67, '536005110065', 'Bayu Luka', 'L', 'Lamahala Jaya', '1976-11-09', 'Islam', 'SMP', 'Buruh', 'Kawin', 'Jl. Kenari No. 14, RT 3 RW 1', 'Dusun III', '3', '1', 'Tetap', 'Istri', '5331377962', '2015-11-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(68, '534608170066', 'Eka Bani', 'L', 'Bali', '2006-08-22', 'Hindu', 'SD', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 98, RT 2 RW 4', 'Dusun II', '2', '4', 'Meninggal', 'Kepala Keluarga', '5348486505', '2016-07-27', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(69, '535301220067', 'Wahyu Laga', 'L', 'Ende', '1966-07-14', 'Islam', 'D3', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 3, RT 5 RW 4', 'Dusun I', '5', '4', 'Pindah', 'Kepala Keluarga', '5387415762', '2022-08-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(70, '533604080068', 'Caesar Sari', 'L', 'Labuan Bajo', '1971-05-13', 'Islam', 'S2', 'Petani', 'Cerai Mati', 'Jl. Kenari No. 85, RT 9 RW 1', 'Dusun II', '9', '1', 'Tetap', 'Kepala Keluarga', '5335379257', '2018-11-04', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(71, '535309180069', 'Sandi Muri', 'L', 'Maumere', '1969-07-08', 'Hindu', 'Tidak Sekolah', 'Pedagang', 'Belum Kawin', 'Jl. Kenari No. 75, RT 15 RW 3', 'Dusun III', '15', '3', 'Meninggal', 'Istri', '5355015228', '2022-02-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(72, '533804110070', 'Gunawan Beboki', 'L', 'Lamahala Jaya', '1995-09-01', 'Hindu', 'Tidak Sekolah', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 92, RT 10 RW 4', 'Dusun VI', '10', '4', 'Meninggal', 'Famili Lain', '5364340390', '2016-08-13', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(73, '533205160071', 'Vicky Hadjar', 'L', 'Wolowaru', '1990-04-14', 'Islam', 'SMA', 'PNS', 'Belum Kawin', 'Jl. Kenari No. 80, RT 11 RW 4', 'Dusun IV', '11', '4', 'Meninggal', 'Famili Lain', '5364899601', '2022-06-04', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(74, '531607260072', 'Kevin Ndi', 'L', 'Ruteng', '1977-03-07', 'Hindu', 'S2', 'TNI', 'Kawin', 'Jl. Kenari No. 33, RT 1 RW 6', 'Dusun II', '1', '6', 'Meninggal', 'Istri', '5349283222', '2017-01-22', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(75, '536803040073', 'Fajar Beboki', 'L', 'Kupang', '1958-10-06', 'Islam', 'S2', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 97, RT 10 RW 1', 'Dusun II', '10', '1', 'Pindah', 'Anak', '5340167802', '2018-12-15', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(76, '535012230074', 'Krisna Wati', 'L', 'Larantuka', '1975-06-02', 'Buddha', 'D3', 'Guru', 'Belum Kawin', 'Jl. Kenari No. 11, RT 9 RW 2', 'Dusun IV', '9', '2', 'Meninggal', 'Kepala Keluarga', '5357760932', '2019-01-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(77, '530502110075', 'Lukman Ria', 'L', 'Wolowaru', '1974-11-12', 'Protestan', 'Tidak Sekolah', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 16, RT 1 RW 6', 'Dusun IV', '1', '6', 'Tetap', 'Anak', '5394064706', '2015-02-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(78, '532812150076', 'Dony Meo', 'L', 'Lamahala Jaya', '1972-03-22', 'Katolik', 'SMP', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 6, RT 3 RW 3', 'Dusun IV', '3', '3', 'Pindah', 'Anak', '5303506583', '2015-11-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(79, '538604180077', 'Hendra Nur', 'L', 'Kupang', '1971-05-25', 'Protestan', 'SMP', 'Polri', 'Cerai Hidup', 'Jl. Kenari No. 22, RT 2 RW 5', 'Dusun III', '2', '5', 'Pindah', 'Kepala Keluarga', '5354428429', '2015-12-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(80, '538001270078', 'Feri Klau', 'L', 'Bajawa', '1989-10-04', 'Katolik', 'S2', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 66, RT 12 RW 6', 'Dusun II', '12', '6', 'Pindah', 'Famili Lain', '5321084735', '2019-08-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(81, '535110010079', 'Budi Abu', 'L', 'Larantuka', '1997-07-03', 'Buddha', 'S3', 'Petani', 'Cerai Mati', 'Jl. Kenari No. 66, RT 4 RW 2', 'Dusun I', '4', '2', 'Pindah', 'Famili Lain', '5383886332', '2021-04-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(82, '535103280080', 'Feri Hena', 'L', 'Wolowaru', '1952-06-26', 'Buddha', 'SMP', 'Petani', 'Belum Kawin', 'Jl. Kenari No. 44, RT 8 RW 2', 'Dusun IV', '8', '2', 'Meninggal', 'Anak', '5366630741', '2018-12-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(83, '533010180081', 'Wahyu Laga', 'L', 'Bajawa', '1986-05-04', 'Protestan', 'D3', 'Polri', 'Kawin', 'Jl. Kenari No. 61, RT 17 RW 5', 'Dusun IV', '17', '5', 'Tetap', 'Kepala Keluarga', '5309514823', '2019-06-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(84, '530403050082', 'Kevin Bani', 'L', 'Larantuka', '1998-07-25', 'Protestan', 'D3', 'Polri', 'Belum Kawin', 'Jl. Kenari No. 76, RT 17 RW 4', 'Dusun III', '17', '4', 'Meninggal', 'Kepala Keluarga', '5331109303', '2019-04-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(85, '530710270083', 'Zainal Nur', 'L', 'Wolowaru', '1999-11-04', 'Hindu', 'SMA', 'PNS', 'Cerai Mati', 'Jl. Kenari No. 83, RT 7 RW 1', 'Dusun IV', '7', '1', 'Pindah', 'Famili Lain', '5301842270', '2018-07-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(86, '531208130084', 'Krisna Minggu', 'L', 'Adonara', '2003-08-05', 'Buddha', 'Tidak Sekolah', 'TNI', 'Cerai Mati', 'Jl. Kenari No. 93, RT 4 RW 1', 'Dusun V', '4', '1', 'Pindah', 'Kepala Keluarga', '5305451551', '2023-04-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(87, '539610240085', 'Satria Beboki', 'L', 'Wolowaru', '1961-02-09', 'Hindu', 'S2', 'Guru', 'Belum Kawin', 'Jl. Kenari No. 65, RT 15 RW 1', 'Dusun II', '15', '1', 'Pindah', 'Istri', '5368623455', '2016-09-02', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(88, '538803080086', 'Joko Bani', 'L', 'Waingapu', '1984-07-09', 'Buddha', 'Tidak Sekolah', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 88, RT 12 RW 4', 'Dusun III', '12', '4', 'Tetap', 'Istri', '5367691421', '2023-07-12', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(89, '535102050087', 'Fajar Meo', 'L', 'Labuan Bajo', '1994-06-21', 'Katolik', 'Tidak Sekolah', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 4, RT 13 RW 6', 'Dusun II', '13', '6', 'Meninggal', 'Famili Lain', '5366942424', '2021-12-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(90, '532203090088', 'Made Wati', 'L', 'Wolowaru', '1971-06-14', 'Buddha', 'SMP', 'Guru', 'Cerai Hidup', 'Jl. Kenari No. 40, RT 17 RW 2', 'Dusun V', '17', '2', 'Pindah', 'Famili Lain', '5382027971', '2017-08-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(91, '536403170089', 'Sandi Karan', 'L', 'Bajawa', '1977-12-24', 'Buddha', 'D3', 'Pedagang', 'Kawin', 'Jl. Kenari No. 16, RT 5 RW 5', 'Dusun I', '5', '5', 'Tetap', 'Anak', '5303221239', '2020-01-24', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(92, '536712170090', 'Teguh Wati', 'L', 'Ruteng', '1974-05-26', 'Katolik', 'SMA', 'Buruh', 'Kawin', 'Jl. Kenari No. 3, RT 7 RW 4', 'Dusun III', '7', '4', 'Meninggal', 'Istri', '5320599553', '2022-11-13', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(93, '532002110091', 'Lukman Klau', 'L', 'Ende', '1952-04-04', 'Protestan', 'SMP', 'Nelayan', 'Kawin', 'Jl. Kenari No. 76, RT 16 RW 1', 'Dusun I', '16', '1', 'Meninggal', 'Anak', '5375508274', '2021-04-02', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(94, '537004260092', 'Muhammad Minggu', 'L', 'Maumere', '1987-02-26', 'Buddha', 'SMP', 'Pedagang', 'Cerai Hidup', 'Jl. Kenari No. 13, RT 6 RW 6', 'Dusun V', '6', '6', 'Meninggal', 'Famili Lain', '5398903828', '2019-08-23', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(95, '534610270093', 'Budi Wati', 'L', 'Ruteng', '1960-07-21', 'Buddha', 'S2', 'Guru', 'Belum Kawin', 'Jl. Kenari No. 57, RT 15 RW 2', 'Dusun IV', '15', '2', 'Meninggal', 'Famili Lain', '5308666445', '2019-03-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(96, '538304210094', 'Jefri Abu', 'L', 'Bali', '2007-09-24', 'Katolik', 'SMA', 'Pedagang', 'Kawin', 'Jl. Kenari No. 66, RT 11 RW 5', 'Dusun V', '11', '5', 'Tetap', 'Kepala Keluarga', '5386865408', '2023-02-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(97, '539006140095', 'Krisna Bataona', 'L', 'Ruteng', '1986-09-02', 'Buddha', 'SD', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 26, RT 1 RW 2', 'Dusun III', '1', '2', 'Pindah', 'Famili Lain', '5324940312', '2016-11-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(98, '532405280096', 'Utomo Sari', 'L', 'Wolowaru', '1962-02-04', 'Katolik', 'SMA', 'Nelayan', 'Cerai Hidup', 'Jl. Kenari No. 92, RT 7 RW 6', 'Dusun IV', '7', '6', 'Tetap', 'Kepala Keluarga', '5335596118', '2018-12-03', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(99, '534312070097', 'Fajar Abu', 'L', 'Waingapu', '1966-11-02', 'Hindu', 'SMA', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 67, RT 17 RW 4', 'Dusun IV', '17', '4', 'Meninggal', 'Istri', '5338289164', '2015-12-24', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(100, '533709250098', 'Panji Muri', 'L', 'Maumere', '1964-09-04', 'Islam', 'S3', 'TNI', 'Belum Kawin', 'Jl. Kenari No. 7, RT 9 RW 5', 'Dusun IV', '9', '5', 'Tetap', 'Istri', '5372926686', '2023-07-24', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(101, '532011180099', 'Nando Minggu', 'L', 'Ende', '1995-06-28', 'Katolik', 'SMP', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 23, RT 5 RW 3', 'Dusun II', '5', '3', 'Pindah', 'Kepala Keluarga', '5319589749', '2022-06-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(102, '533307080100', 'Indra Hadjar', 'L', 'Adonara', '1968-09-15', 'Katolik', 'Tidak Sekolah', 'PNS', 'Cerai Hidup', 'Jl. Kenari No. 11, RT 7 RW 5', 'Dusun II', '7', '5', 'Meninggal', 'Istri', '5310197589', '2022-05-28', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(103, '537902150101', 'Umi Raka', 'P', 'Bali', '1976-09-09', 'Protestan', 'S1', 'Nelayan', 'Kawin', 'Jl. Kenari No. 1, RT 8 RW 3', 'Dusun II', '8', '3', 'Tetap', 'Istri', '5304246360', '2015-10-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(104, '536809290102', 'Belinda Abu', 'P', 'Bali', '2003-08-02', 'Katolik', 'S3', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 28, RT 11 RW 2', 'Dusun V', '11', '2', 'Tetap', 'Famili Lain', '5352934408', '2018-01-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(105, '536212280103', 'Olif Hena', 'P', 'Larantuka', '1971-11-21', 'Katolik', 'S2', 'Pedagang', 'Belum Kawin', 'Jl. Kenari No. 46, RT 2 RW 4', 'Dusun V', '2', '4', 'Pindah', 'Istri', '5386447445', '2022-06-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(106, '530806040104', 'Gita Wati', 'P', 'Wolowaru', '1989-01-16', 'Katolik', 'S2', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 74, RT 12 RW 2', 'Dusun VI', '12', '2', 'Tetap', 'Kepala Keluarga', '5386044486', '2020-02-10', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(107, '538509170105', 'Lestari Beboki', 'P', 'Bajawa', '1972-11-03', 'Protestan', 'SMP', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 72, RT 7 RW 1', 'Dusun III', '7', '1', 'Tetap', 'Famili Lain', '5308789797', '2024-11-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(108, '538702150106', 'Puput Pono', 'P', 'Adonara', '2001-04-08', 'Katolik', 'Tidak Sekolah', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 26, RT 4 RW 1', 'Dusun I', '4', '1', 'Pindah', 'Kepala Keluarga', '5397614815', '2023-04-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(109, '533209090107', 'Nadia Karan', 'P', 'Adonara', '1985-01-01', 'Buddha', 'S3', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 92, RT 8 RW 6', 'Dusun V', '8', '6', 'Pindah', 'Anak', '5383391839', '2020-06-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(110, '530902220108', 'Yeni Laga', 'P', 'Ende', '1993-12-26', 'Protestan', 'S2', 'TNI', 'Kawin', 'Jl. Kenari No. 23, RT 3 RW 5', 'Dusun II', '3', '5', 'Tetap', 'Kepala Keluarga', '5381754115', '2018-04-15', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(111, '538802220109', 'Jasmin Pono', 'P', 'Ende', '1999-05-24', 'Islam', 'S2', 'Petani', 'Cerai Hidup', 'Jl. Kenari No. 86, RT 4 RW 5', 'Dusun V', '4', '5', 'Meninggal', 'Famili Lain', '5370865733', '2016-12-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(112, '538606190110', 'Kartika Hena', 'P', 'Kupang', '1989-09-11', 'Buddha', 'S1', 'PNS', 'Kawin', 'Jl. Kenari No. 47, RT 4 RW 4', 'Dusun IV', '4', '4', 'Tetap', 'Anak', '5365358726', '2021-09-22', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(113, '538111300111', 'Hana Ndi', 'P', 'Bali', '1981-03-16', 'Protestan', 'SMP', 'PNS', 'Kawin', 'Jl. Kenari No. 12, RT 17 RW 1', 'Dusun III', '17', '1', 'Pindah', 'Famili Lain', '5334465792', '2016-07-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(114, '536203020112', 'Tari Beboki', 'P', 'Larantuka', '1958-01-20', 'Islam', 'SD', 'Polri', 'Belum Kawin', 'Jl. Kenari No. 36, RT 6 RW 1', 'Dusun I', '6', '1', 'Meninggal', 'Kepala Keluarga', '5369501621', '2019-02-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(115, '535104210113', 'Umi Abu', 'P', 'Waiblama', '1960-02-18', 'Islam', 'S3', 'Nelayan', 'Cerai Hidup', 'Jl. Kenari No. 59, RT 6 RW 2', 'Dusun VI', '6', '2', 'Pindah', 'Kepala Keluarga', '5310567592', '2017-01-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(116, '531912270114', 'Jasmin Pono', 'P', 'Maumere', '1970-03-23', 'Islam', 'Tidak Sekolah', 'Polri', 'Belum Kawin', 'Jl. Kenari No. 39, RT 2 RW 4', 'Dusun IV', '2', '4', 'Tetap', 'Kepala Keluarga', '5374366411', '2016-12-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(117, '537704290115', 'Lestari Raka', 'P', 'Labuan Bajo', '1961-08-18', 'Katolik', 'Tidak Sekolah', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 83, RT 16 RW 1', 'Dusun I', '16', '1', 'Pindah', 'Kepala Keluarga', '5314808424', '2017-11-02', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(118, '532408300116', 'Putri Meo', 'P', 'Kupang', '1982-07-22', 'Hindu', 'S2', 'Nelayan', 'Cerai Hidup', 'Jl. Kenari No. 92, RT 12 RW 4', 'Dusun V', '12', '4', 'Meninggal', 'Kepala Keluarga', '5368997333', '2015-06-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(119, '539110110117', 'Yuni Luka', 'P', 'Adonara', '1972-02-08', 'Islam', 'SMA', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 96, RT 9 RW 5', 'Dusun II', '9', '5', 'Meninggal', 'Kepala Keluarga', '5369064127', '2016-01-15', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(120, '536810070118', 'Wulan Luka', 'P', 'Larantuka', '2001-01-21', 'Katolik', 'Tidak Sekolah', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 49, RT 12 RW 1', 'Dusun II', '12', '1', 'Pindah', 'Famili Lain', '5330892068', '2017-08-24', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(121, '537102150119', 'Maya Klau', 'P', 'Larantuka', '1983-01-11', 'Katolik', 'SD', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 44, RT 1 RW 3', 'Dusun IV', '1', '3', 'Meninggal', 'Anak', '5366490487', '2023-10-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(122, '538711010120', 'Fitri Sari', 'P', 'Waiblama', '1952-06-12', 'Islam', 'S1', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 35, RT 9 RW 2', 'Dusun IV', '9', '2', 'Meninggal', 'Famili Lain', '5379009896', '2016-09-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(123, '537912140121', 'Olif Hadjar', 'P', 'Labuan Bajo', '1959-11-26', 'Katolik', 'S3', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 32, RT 15 RW 1', 'Dusun V', '15', '1', 'Tetap', 'Istri', '5347347006', '2015-07-05', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(124, '533411300122', 'Tari Laga', 'P', 'Adonara', '1977-07-26', 'Buddha', 'S2', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 71, RT 16 RW 5', 'Dusun II', '16', '5', 'Meninggal', 'Famili Lain', '5386372653', '2018-09-25', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(125, '532812050123', 'Tari Ndi', 'P', 'Wolowaru', '1968-04-18', 'Hindu', 'S3', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 53, RT 3 RW 4', 'Dusun III', '3', '4', 'Tetap', 'Istri', '5304489420', '2022-12-05', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(126, '532605130124', 'Jihan Hena', 'P', 'Wolowaru', '1986-04-11', 'Islam', 'SMA', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 47, RT 10 RW 6', 'Dusun III', '10', '6', 'Meninggal', 'Anak', '5353388725', '2016-11-04', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(127, '535207090125', 'Amalia Meo', 'P', 'Labuan Bajo', '1965-02-08', 'Islam', 'S3', 'Pedagang', 'Cerai Mati', 'Jl. Kenari No. 93, RT 1 RW 2', 'Dusun II', '1', '2', 'Meninggal', 'Anak', '5301754061', '2016-12-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(128, '532910140126', 'Puput Raka', 'P', 'Maumere', '1967-07-06', 'Hindu', 'D3', 'Pedagang', 'Kawin', 'Jl. Kenari No. 2, RT 16 RW 5', 'Dusun IV', '16', '5', 'Pindah', 'Istri', '5302590120', '2023-12-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(129, '531912020127', 'Vivi Abu', 'P', 'Larantuka', '1950-05-07', 'Katolik', 'S3', 'Pedagang', 'Cerai Mati', 'Jl. Kenari No. 19, RT 14 RW 4', 'Dusun VI', '14', '4', 'Tetap', 'Famili Lain', '5326994787', '2020-03-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(130, '539408090128', 'Oliv Hena', 'P', 'Ruteng', '2000-03-22', 'Islam', 'SD', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 29, RT 3 RW 2', 'Dusun VI', '3', '2', 'Tetap', 'Istri', '5366665069', '2019-12-12', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(131, '538508150129', 'Tari Sari', 'P', 'Adonara', '1984-07-03', 'Buddha', 'S1', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 21, RT 12 RW 3', 'Dusun II', '12', '3', 'Tetap', 'Kepala Keluarga', '5335991976', '2023-07-02', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(132, '539303010130', 'Rina Hadjar', 'P', 'Kupang', '1977-10-03', 'Protestan', 'SD', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 16, RT 2 RW 6', 'Dusun I', '2', '6', 'Meninggal', 'Anak', '5366935737', '2022-04-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(133, '535405200131', 'Rina Hena', 'P', 'Bali', '1997-09-15', 'Katolik', 'S3', 'PNS', 'Cerai Hidup', 'Jl. Kenari No. 75, RT 12 RW 1', 'Dusun IV', '12', '1', 'Pindah', 'Anak', '5337480939', '2021-08-23', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(134, '530203090132', 'Amalia Wati', 'P', 'Ruteng', '1974-11-14', 'Islam', 'Tidak Sekolah', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 87, RT 17 RW 5', 'Dusun III', '17', '5', 'Tetap', 'Istri', '5314245880', '2018-11-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(135, '530705280133', 'Amalia Karan', 'P', 'Bali', '1968-04-19', 'Buddha', 'Tidak Sekolah', 'Pedagang', 'Cerai Mati', 'Jl. Kenari No. 83, RT 16 RW 3', 'Dusun I', '16', '3', 'Meninggal', 'Kepala Keluarga', '5330190996', '2023-10-23', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(136, '538602200134', 'Ratna Taka', 'P', 'Lewoleba', '1960-03-23', 'Hindu', 'S3', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 98, RT 17 RW 5', 'Dusun II', '17', '5', 'Meninggal', 'Istri', '5376274128', '2022-08-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(137, '531505130135', 'Putri Hena', 'P', 'Labuan Bajo', '1992-07-03', 'Islam', 'Tidak Sekolah', 'Petani', 'Belum Kawin', 'Jl. Kenari No. 67, RT 3 RW 1', 'Dusun I', '3', '1', 'Meninggal', 'Famili Lain', '5398192186', '2024-02-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(138, '532009090136', 'Citra Taka', 'P', 'Bali', '1981-08-04', 'Protestan', 'D3', 'Polri', 'Kawin', 'Jl. Kenari No. 90, RT 15 RW 5', 'Dusun II', '15', '5', 'Meninggal', 'Anak', '5320721794', '2019-03-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(139, '536011280137', 'Fitri Sari', 'P', 'Labuan Bajo', '1957-10-20', 'Protestan', 'S3', 'PNS', 'Cerai Hidup', 'Jl. Kenari No. 85, RT 8 RW 5', 'Dusun VI', '8', '5', 'Pindah', 'Istri', '5397360914', '2021-04-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(140, '535002240138', 'Amalia Laga', 'P', 'Lamahala Jaya', '1985-03-13', 'Katolik', 'Tidak Sekolah', 'TNI', 'Belum Kawin', 'Jl. Kenari No. 46, RT 1 RW 6', 'Dusun III', '1', '6', 'Tetap', 'Kepala Keluarga', '5324482076', '2015-08-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(141, '531011090139', 'Oliv Klau', 'P', 'Kupang', '1973-07-16', 'Hindu', 'S2', 'Pedagang', 'Kawin', 'Jl. Kenari No. 6, RT 7 RW 2', 'Dusun IV', '7', '2', 'Tetap', 'Istri', '5328035216', '2016-06-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(142, '531203030140', 'Lestari Beboki', 'P', 'Larantuka', '1972-08-20', 'Islam', 'S1', 'Polri', 'Kawin', 'Jl. Kenari No. 63, RT 6 RW 3', 'Dusun II', '6', '3', 'Tetap', 'Kepala Keluarga', '5390474086', '2019-09-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(143, '531901190141', 'Zulaikha Sari', 'P', 'Larantuka', '1967-01-07', 'Katolik', 'SMA', 'Wiraswasta', 'Cerai Hidup', 'Jl. Kenari No. 86, RT 10 RW 4', 'Dusun I', '10', '4', 'Meninggal', 'Kepala Keluarga', '5373072819', '2021-03-23', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(144, '533907120142', 'Kartika Taka', 'P', 'Adonara', '1965-07-06', 'Katolik', 'D3', 'PNS', 'Belum Kawin', 'Jl. Kenari No. 58, RT 4 RW 2', 'Dusun II', '4', '2', 'Meninggal', 'Anak', '5348761629', '2022-12-15', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(145, '534209010143', 'Putri Muri', 'P', 'Larantuka', '2002-06-28', 'Islam', 'SMA', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 53, RT 12 RW 2', 'Dusun IV', '12', '2', 'Meninggal', 'Istri', '5362840923', '2024-08-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(146, '539808120144', 'Wulan Bani', 'P', 'Lewoleba', '2004-05-13', 'Katolik', 'S1', 'TNI', 'Cerai Mati', 'Jl. Kenari No. 48, RT 15 RW 2', 'Dusun V', '15', '2', 'Tetap', 'Anak', '5383561207', '2015-12-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(147, '535707290145', 'Eka Minggu', 'P', 'Bajawa', '1966-05-15', 'Protestan', 'S1', 'PNS', 'Cerai Hidup', 'Jl. Kenari No. 85, RT 2 RW 3', 'Dusun IV', '2', '3', 'Meninggal', 'Famili Lain', '5355264623', '2015-04-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(148, '538901130146', 'Dewi Laga', 'P', 'Ende', '1977-06-23', 'Protestan', 'S1', 'Guru', 'Kawin', 'Jl. Kenari No. 5, RT 17 RW 1', 'Dusun V', '17', '1', 'Tetap', 'Famili Lain', '5303499849', '2023-05-12', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(149, '536603050147', 'Sari Bataona', 'P', 'Larantuka', '1968-09-03', 'Hindu', 'SD', 'Pedagang', 'Belum Kawin', 'Jl. Kenari No. 29, RT 16 RW 5', 'Dusun IV', '16', '5', 'Pindah', 'Famili Lain', '5308380423', '2024-01-22', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(150, '534409010148', 'Yuni Klau', 'P', 'Ende', '1985-07-17', 'Buddha', 'SD', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 81, RT 16 RW 2', 'Dusun II', '16', '2', 'Tetap', 'Anak', '5336008630', '2016-09-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(151, '538901120149', 'Jihan Meo', 'P', 'Adonara', '1951-01-15', 'Buddha', 'S1', 'PNS', 'Cerai Mati', 'Jl. Kenari No. 6, RT 16 RW 2', 'Dusun VI', '16', '2', 'Meninggal', 'Kepala Keluarga', '5326298481', '2020-03-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(152, '535010030150', 'Dewi Muri', 'P', 'Lewoleba', '2003-03-02', 'Islam', 'SMA', 'Guru', 'Cerai Mati', 'Jl. Kenari No. 27, RT 8 RW 6', 'Dusun V', '8', '6', 'Pindah', 'Kepala Keluarga', '5346622718', '2017-03-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(153, '535103080151', 'Tari Hena', 'P', 'Kupang', '1991-09-13', 'Hindu', 'S1', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 40, RT 15 RW 3', 'Dusun VI', '15', '3', 'Meninggal', 'Famili Lain', '5325023834', '2022-12-23', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(154, '534911060152', 'Yeni Bani', 'P', 'Adonara', '1959-05-07', 'Katolik', 'S1', 'Petani', 'Kawin', 'Jl. Kenari No. 93, RT 14 RW 1', 'Dusun II', '14', '1', 'Pindah', 'Famili Lain', '5320573304', '2022-09-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(155, '537312120153', 'Wulan Abu', 'P', 'Larantuka', '1986-12-07', 'Hindu', 'S2', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 86, RT 7 RW 3', 'Dusun V', '7', '3', 'Pindah', 'Famili Lain', '5373867729', '2015-07-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(156, '536809030154', 'Yuni Beboki', 'P', 'Larantuka', '1986-03-23', 'Protestan', 'SD', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 52, RT 14 RW 5', 'Dusun II', '14', '5', 'Meninggal', 'Istri', '5392240758', '2023-05-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(157, '530610250155', 'Sari Laga', 'P', 'Larantuka', '2009-08-20', 'Hindu', 'Tidak Sekolah', 'Polri', 'Belum Kawin', 'Jl. Kenari No. 37, RT 9 RW 6', 'Dusun III', '9', '6', 'Meninggal', 'Anak', '5349507197', '2022-08-24', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(158, '532202010156', 'Indah Ria', 'P', 'Maumere', '1971-10-18', 'Protestan', 'S2', 'Nelayan', 'Cerai Hidup', 'Jl. Kenari No. 62, RT 15 RW 4', 'Dusun II', '15', '4', 'Meninggal', 'Istri', '5398015951', '2016-06-28', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(159, '532003260157', 'Nadia Sari', 'P', 'Waiblama', '1990-12-19', 'Katolik', 'Tidak Sekolah', 'PNS', 'Cerai Mati', 'Jl. Kenari No. 73, RT 1 RW 6', 'Dusun III', '1', '6', 'Tetap', 'Istri', '5365706253', '2023-06-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(160, '534507050158', 'Bunga Klau', 'P', 'Larantuka', '1986-02-03', 'Katolik', 'SMP', 'Pedagang', 'Kawin', 'Jl. Kenari No. 7, RT 1 RW 5', 'Dusun V', '1', '5', 'Meninggal', 'Istri', '5335781088', '2021-10-19', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(161, '536606230159', 'Qori Ria', 'P', 'Adonara', '1998-01-26', 'Hindu', 'S2', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 28, RT 10 RW 6', 'Dusun VI', '10', '6', 'Meninggal', 'Kepala Keluarga', '5371426964', '2021-06-04', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(162, '535311270160', 'Fiona Klau', 'P', 'Wolowaru', '1959-03-23', 'Katolik', 'SMP', 'Pedagang', 'Cerai Hidup', 'Jl. Kenari No. 64, RT 7 RW 4', 'Dusun I', '7', '4', 'Tetap', 'Famili Lain', '5333433192', '2018-11-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(163, '533004110161', 'Putri Nur', 'P', 'Wolowaru', '1994-10-16', 'Protestan', 'S3', 'Polri', 'Kawin', 'Jl. Kenari No. 42, RT 1 RW 3', 'Dusun V', '1', '3', 'Pindah', 'Anak', '5308007683', '2018-05-15', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(164, '532909110162', 'Tari Sari', 'P', 'Waingapu', '1951-02-05', 'Islam', 'S2', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 32, RT 6 RW 6', 'Dusun I', '6', '6', 'Tetap', 'Famili Lain', '5351249054', '2019-11-13', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(165, '533603200163', 'Lina Beboki', 'P', 'Lewoleba', '1987-07-18', 'Islam', 'D3', 'Petani', 'Belum Kawin', 'Jl. Kenari No. 43, RT 1 RW 3', 'Dusun VI', '1', '3', 'Pindah', 'Famili Lain', '5362154429', '2018-06-04', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(166, '539410240164', 'Sari Hena', 'P', 'Waingapu', '1983-06-24', 'Islam', 'SMP', 'Nelayan', 'Cerai Mati', 'Jl. Kenari No. 95, RT 2 RW 2', 'Dusun VI', '2', '2', 'Tetap', 'Anak', '5357839089', '2024-03-26', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(167, '535703030165', 'Kartika Hadjar', 'P', 'Larantuka', '1999-02-02', 'Hindu', 'D3', 'PNS', 'Belum Kawin', 'Jl. Kenari No. 74, RT 14 RW 4', 'Dusun II', '14', '4', 'Pindah', 'Kepala Keluarga', '5362660786', '2017-01-22', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(168, '531708170166', 'Wulan Raka', 'P', 'Maumere', '1983-10-12', 'Protestan', 'SMA', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 63, RT 9 RW 4', 'Dusun II', '9', '4', 'Meninggal', 'Famili Lain', '5382147885', '2018-06-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(169, '539606240167', 'Rina Karan', 'P', 'Labuan Bajo', '1968-02-17', 'Katolik', 'SMA', 'Pedagang', 'Cerai Hidup', 'Jl. Kenari No. 2, RT 6 RW 3', 'Dusun II', '6', '3', 'Pindah', 'Anak', '5321080419', '2024-02-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(170, '535205080168', 'Kartika Ndi', 'P', 'Ruteng', '1978-09-14', 'Katolik', 'Tidak Sekolah', 'Guru', 'Kawin', 'Jl. Kenari No. 69, RT 13 RW 4', 'Dusun IV', '13', '4', 'Meninggal', 'Famili Lain', '5319952732', '2019-08-23', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(171, '535609030169', 'Ayu Abu', 'P', 'Bajawa', '1950-05-23', 'Buddha', 'SMP', 'Pedagang', 'Belum Kawin', 'Jl. Kenari No. 69, RT 6 RW 1', 'Dusun VI', '6', '1', 'Tetap', 'Anak', '5304905444', '2015-06-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(172, '534901020170', 'Bunga Abu', 'P', 'Adonara', '1979-09-25', 'Hindu', 'SD', 'Buruh', 'Cerai Mati', 'Jl. Kenari No. 60, RT 9 RW 4', 'Dusun IV', '9', '4', 'Tetap', 'Anak', '5369849894', '2024-10-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(173, '533304280171', 'Hesti Hena', 'P', 'Bali', '2009-10-19', 'Buddha', 'S3', 'Nelayan', 'Cerai Mati', 'Jl. Kenari No. 81, RT 4 RW 6', 'Dusun VI', '4', '6', 'Tetap', 'Famili Lain', '5309171791', '2023-03-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(174, '531901270172', 'Qori Hadjar', 'P', 'Ruteng', '1994-06-27', 'Protestan', 'S3', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 13, RT 1 RW 2', 'Dusun I', '1', '2', 'Tetap', 'Famili Lain', '5344760643', '2018-11-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(175, '535905050173', 'Yeni Hadjar', 'P', 'Kupang', '1951-02-24', 'Hindu', 'Tidak Sekolah', 'Polri', 'Cerai Hidup', 'Jl. Kenari No. 18, RT 8 RW 6', 'Dusun III', '8', '6', 'Meninggal', 'Kepala Keluarga', '5333552996', '2020-04-06', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(176, '533708130174', 'Bunga Muri', 'P', 'Waingapu', '1998-05-04', 'Islam', 'D3', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 95, RT 4 RW 4', 'Dusun V', '4', '4', 'Meninggal', 'Kepala Keluarga', '5324695125', '2020-09-16', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(177, '539609170175', 'Lestari Klau', 'P', 'Lewoleba', '1961-06-12', 'Katolik', 'SMA', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 35, RT 3 RW 5', 'Dusun I', '3', '5', 'Tetap', 'Istri', '5378080697', '2016-09-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(178, '539105060176', 'Yeni Beboki', 'P', 'Bajawa', '1985-04-21', 'Buddha', 'S3', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 56, RT 8 RW 1', 'Dusun I', '8', '1', 'Meninggal', 'Famili Lain', '5330495822', '2020-02-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(179, '531603040177', 'Umi Beboki', 'P', 'Bajawa', '1990-06-11', 'Islam', 'S2', 'Wiraswasta', 'Cerai Mati', 'Jl. Kenari No. 88, RT 9 RW 1', 'Dusun I', '9', '1', 'Pindah', 'Istri', '5392613173', '2015-08-08', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(180, '535703250178', 'Umi Minggu', 'P', 'Lamahala Jaya', '1960-09-20', 'Hindu', 'S1', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 61, RT 11 RW 4', 'Dusun II', '11', '4', 'Pindah', 'Anak', '5330591735', '2019-10-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(181, '538504090179', 'Elsa Raka', 'P', 'Lewoleba', '2005-09-18', 'Hindu', 'SD', 'PNS', 'Cerai Mati', 'Jl. Kenari No. 43, RT 12 RW 3', 'Dusun V', '12', '3', 'Tetap', 'Istri', '5373151335', '2020-04-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(182, '530902300180', 'Gita Abu', 'P', 'Waiblama', '1958-09-02', 'Buddha', 'S2', 'Buruh', 'Kawin', 'Jl. Kenari No. 6, RT 16 RW 1', 'Dusun V', '16', '1', 'Tetap', 'Istri', '5376877452', '2019-01-11', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(183, '536602200181', 'Umi Bataona', 'P', 'Ende', '1985-01-15', 'Hindu', 'S1', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 7, RT 15 RW 4', 'Dusun VI', '15', '4', 'Pindah', 'Famili Lain', '5304464113', '2017-02-07', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(184, '536806280182', 'Puput Nur', 'P', 'Wolowaru', '1960-11-10', 'Hindu', 'SMP', 'Nelayan', 'Kawin', 'Jl. Kenari No. 2, RT 14 RW 4', 'Dusun V', '14', '4', 'Pindah', 'Istri', '5306933972', '2016-11-21', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(185, '539106140183', 'Ayu Meo', 'P', 'Larantuka', '1982-09-18', 'Protestan', 'D3', 'Pedagang', 'Kawin', 'Jl. Kenari No. 8, RT 5 RW 4', 'Dusun III', '5', '4', 'Meninggal', 'Kepala Keluarga', '5327529390', '2015-12-01', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(186, '532411280184', 'Qori Bataona', 'P', 'Larantuka', '1950-02-22', 'Katolik', 'S3', 'Buruh', 'Belum Kawin', 'Jl. Kenari No. 96, RT 16 RW 5', 'Dusun III', '16', '5', 'Pindah', 'Anak', '5321986569', '2016-03-11', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44');
INSERT INTO `penduduks` (`id`, `nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `status_perkawinan`, `alamat`, `dusun`, `rt`, `rw`, `status_tinggal`, `status_keluarga`, `no_kk`, `tanggal_masuk`, `tanggal_keluar`, `created_at`, `updated_at`) VALUES
(187, '539301010185', 'Ratna Laga', 'P', 'Wolowaru', '1972-04-14', 'Protestan', 'SMA', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 41, RT 8 RW 4', 'Dusun I', '8', '4', 'Tetap', 'Anak', '5326268841', '2017-06-03', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(188, '535401010186', 'Maya Bataona', 'P', 'Lamahala Jaya', '1989-05-04', 'Katolik', 'S1', 'Petani', 'Belum Kawin', 'Jl. Kenari No. 10, RT 17 RW 1', 'Dusun I', '17', '1', 'Meninggal', 'Kepala Keluarga', '5348571086', '2019-12-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(189, '533201100187', 'Jihan Pono', 'P', 'Waiblama', '1975-12-23', 'Islam', 'S2', 'Pedagang', 'Cerai Mati', 'Jl. Kenari No. 24, RT 7 RW 2', 'Dusun V', '7', '2', 'Tetap', 'Anak', '5308977017', '2016-01-28', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(190, '537907290188', 'Oliv Raka', 'P', 'Ruteng', '1969-08-16', 'Islam', 'D3', 'Wiraswasta', 'Kawin', 'Jl. Kenari No. 55, RT 16 RW 3', 'Dusun V', '16', '3', 'Meninggal', 'Istri', '5301043248', '2019-04-11', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(191, '538009170189', 'Wulan Meo', 'P', 'Waingapu', '1956-02-03', 'Buddha', 'S2', 'Guru', 'Kawin', 'Jl. Kenari No. 99, RT 10 RW 1', 'Dusun I', '10', '1', 'Meninggal', 'Anak', '5389107090', '2023-08-04', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(192, '538106230190', 'Hesti Bataona', 'P', 'Maumere', '2007-01-14', 'Islam', 'S2', 'Polri', 'Belum Kawin', 'Jl. Kenari No. 28, RT 6 RW 2', 'Dusun VI', '6', '2', 'Meninggal', 'Anak', '5368415096', '2017-05-17', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(193, '531609160191', 'Oliv Sari', 'P', 'Larantuka', '1964-04-08', 'Katolik', 'SMA', 'Petani', 'Cerai Mati', 'Jl. Kenari No. 72, RT 2 RW 3', 'Dusun III', '2', '3', 'Meninggal', 'Anak', '5308566945', '2024-09-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(194, '531603270192', 'Kartika Minggu', 'P', 'Waiblama', '1987-08-27', 'Protestan', 'SD', 'TNI', 'Kawin', 'Jl. Kenari No. 8, RT 9 RW 1', 'Dusun I', '9', '1', 'Pindah', 'Istri', '5345614351', '2024-08-05', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(195, '535407090193', 'Diana Hena', 'P', 'Waingapu', '1995-03-17', 'Katolik', 'SD', 'Wiraswasta', 'Belum Kawin', 'Jl. Kenari No. 6, RT 9 RW 3', 'Dusun III', '9', '3', 'Meninggal', 'Kepala Keluarga', '5304213019', '2018-02-11', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(196, '532305030194', 'Wulan Laga', 'P', 'Larantuka', '2003-07-12', 'Protestan', 'S1', 'Petani', 'Cerai Hidup', 'Jl. Kenari No. 45, RT 13 RW 4', 'Dusun V', '13', '4', 'Meninggal', 'Kepala Keluarga', '5372304366', '2021-05-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(197, '533306190195', 'Gita Bataona', 'P', 'Larantuka', '2002-07-03', 'Protestan', 'SMP', 'Guru', 'Belum Kawin', 'Jl. Kenari No. 94, RT 11 RW 6', 'Dusun II', '11', '6', 'Pindah', 'Famili Lain', '5382122994', '2023-12-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(198, '532104200196', 'Hana Raka', 'P', 'Waingapu', '1993-04-22', 'Katolik', 'S1', 'Polri', 'Cerai Mati', 'Jl. Kenari No. 12, RT 14 RW 1', 'Dusun II', '14', '1', 'Tetap', 'Istri', '5346506612', '2023-05-18', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(199, '539101120197', 'Lina Meo', 'P', 'Lewoleba', '1955-10-18', 'Hindu', 'Tidak Sekolah', 'Polri', 'Kawin', 'Jl. Kenari No. 33, RT 15 RW 2', 'Dusun I', '15', '2', 'Tetap', 'Famili Lain', '5393211502', '2021-04-09', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(200, '533005130198', 'Maya Beboki', 'P', 'Waiblama', '1950-12-15', 'Buddha', 'S1', 'Guru', 'Belum Kawin', 'Jl. Kenari No. 97, RT 15 RW 4', 'Dusun IV', '15', '4', 'Pindah', 'Anak', '5314744997', '2020-03-03', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(201, '532204110199', 'Kania Klau', 'P', 'Waingapu', '1994-07-08', 'Islam', 'SD', 'Nelayan', 'Belum Kawin', 'Jl. Kenari No. 79, RT 3 RW 2', 'Dusun III', '3', '2', 'Meninggal', 'Anak', '5366726167', '2017-03-11', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44'),
(202, '531904140200', 'Rina Karan', 'P', 'Adonara', '1977-04-19', 'Buddha', 'SD', 'Nelayan', 'Cerai Hidup', 'Jl. Kenari No. 31, RT 13 RW 5', 'Dusun V', '13', '5', 'Pindah', 'Famili Lain', '5393230680', '2017-01-14', NULL, '2026-02-13 08:06:44', '2026-02-13 08:06:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qgyr0F7yeuxNElhTssKlx8rhfxG6asnIjnCbLX7M', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVXlWZVZnZVhNVnJmRkJwZVY5S3FUM2lBQ3NNR1VtZ3pZRFQ5YzhlbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY3Rpdml0eSI7czo1OiJyb3V0ZSI7czo4OiJhY3Rpdml0eSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1771256728);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Afgan Rally', 'admin', '$2y$12$xHrPJutQbdnSeKW8GhZhaew3lURL3mxQ9RA3/IW8991biX/AEIMUq', 'admin', NULL, '2025-12-30 07:41:20', '2025-12-30 08:10:16'),
(2, 'Test User', 'user', '$2y$12$IMROD8Z3TblOFBpR1cuFlOLw5smYBCZYrcd0wUPlxkU1NGonfPDjW', 'operator', NULL, '2025-12-30 07:41:20', '2025-12-31 23:05:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `can_access` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `bansos`
--
ALTER TABLE `bansos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bansos_id_user_foreign` (`id_user`),
  ADD KEY `bansos_id_penduduk_foreign` (`id_penduduk`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penduduks_nik_unique` (`nik`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_permissions_user_id_permission_id_unique` (`user_id`,`permission_id`),
  ADD KEY `user_permissions_permission_id_foreign` (`permission_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bansos`
--
ALTER TABLE `bansos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bansos`
--
ALTER TABLE `bansos`
  ADD CONSTRAINT `bansos_id_penduduk_foreign` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bansos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
