-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 18.27
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id` int(11) NOT NULL,
  `nilai` double NOT NULL DEFAULT 0,
  `attribut` varchar(255) NOT NULL,
  `is_benefit` int(11) DEFAULT NULL,
  `kategori` set('wisata','hotel') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id`, `nilai`, `attribut`, `is_benefit`, `kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0.1, 'Fasilitas', 1, 'wisata', '2023-06-11 15:22:55', NULL, NULL),
(2, 0.2, 'Aksesibilitas', 1, 'wisata', '2023-06-11 15:22:55', NULL, NULL),
(3, 0.4, 'Biaya', 0, 'wisata', '2023-06-11 15:22:55', NULL, NULL),
(4, 0.1, 'Aktifitas', 1, 'wisata', '2023-06-11 15:22:55', NULL, NULL),
(5, 0.2, 'Kunjungan', 1, 'wisata', '2023-06-11 15:22:55', NULL, NULL),
(6, 0.3, 'Harga', 0, 'hotel', '2023-06-11 15:22:55', NULL, NULL),
(7, 0.2, 'Fasilitas', 1, 'hotel', '2023-06-11 15:22:55', NULL, NULL),
(8, 0.2, 'Kelas', 1, 'hotel', '2023-06-11 15:22:55', NULL, NULL),
(9, 0.3, 'Jarak', 1, 'hotel', '2023-06-11 15:22:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id`, `id_wisata`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'The Royal Surakarta Heritage - MGallery Collection', '2023-06-12 04:27:16', NULL, NULL),
(2, 1, 'Horison Aziza Solo', '2023-06-12 04:27:16', NULL, NULL),
(3, 1, 'RedDoorz', '2023-06-12 04:27:16', NULL, NULL),
(4, 1, 'Hotel Keprabon Solo', '2023-06-12 04:27:16', NULL, NULL),
(5, 1, 'Amarelo Hotel Solo', '2023-06-12 04:27:16', NULL, NULL),
(6, 2, 'Omah Sinten Heritage Hotel', '2023-06-12 04:27:16', NULL, NULL),
(7, 2, 'Riyadi Palace Hotel', '2023-06-12 04:27:16', NULL, NULL),
(8, 2, 'Istana Griya 2 Hotel', '2023-06-12 04:27:16', NULL, NULL),
(9, 2, 'Hotel Griyadi Kusuma Sahid', '2023-06-12 04:27:16', NULL, NULL),
(10, 2, 'Kusuma Sahid Prince Solo Hotel', '2023-06-12 04:27:16', NULL, NULL),
(11, 3, 'Hotel Dana Solo', '2023-06-12 04:27:16', NULL, NULL),
(12, 3, 'Amaris Hotel Sriwedari Solo', '2023-06-12 04:27:16', NULL, NULL),
(13, 3, 'Hotel Solo Tiara', '2023-06-12 04:27:16', NULL, NULL),
(14, 3, 'Front One Boutique Brani Solo', '2023-06-12 04:27:16', NULL, NULL),
(15, 3, 'The Margangsa Hotel', '2023-06-12 04:27:16', NULL, NULL),
(16, 4, 'Laksana Stay & Dine', '2023-06-12 04:27:16', NULL, NULL),
(17, 4, 'Hotel at The Garden Suites', '2023-06-12 04:27:16', NULL, NULL),
(18, 4, 'Novotel Solo Hotel', '2023-06-12 04:27:16', NULL, NULL),
(19, 4, 'Grand Orchid Hotel', '2023-06-12 04:27:16', NULL, NULL),
(20, 4, 'Amaris Hotel Sriwedari Solo', '2023-06-12 04:27:16', NULL, NULL),
(21, 5, 'Hotel Dana Solo', '2023-06-12 04:27:16', NULL, NULL),
(22, 5, 'Hotel Solo Tiara', '2023-06-12 04:27:16', NULL, NULL),
(23, 5, 'Hotel at The Garden Suites', '2023-06-12 04:27:16', NULL, NULL),
(24, 5, 'The Margangsa Hotel', '2023-06-12 04:27:16', NULL, NULL),
(25, 5, 'Laksana Stay & Dine', '2023-06-12 04:27:16', NULL, NULL),
(26, 6, 'Ibis Styles Solo', '2023-06-12 04:27:16', NULL, NULL),
(27, 6, 'Lampion Hotel Solo', '2023-06-12 04:27:16', NULL, NULL),
(28, 6, 'Sahid Jaya Solo Hotel', '2023-06-12 04:27:16', NULL, NULL),
(29, 6, 'Novotel Solo Hotel', '2023-06-12 04:27:16', NULL, NULL),
(30, 6, 'Hotel Dana Solo', '2023-06-12 04:27:16', NULL, NULL),
(31, 7, 'Hotel Asia', '2023-06-12 04:27:16', NULL, NULL),
(32, 7, 'Twin Star Hotel', '2023-06-12 04:27:16', NULL, NULL),
(33, 7, 'Grand Amira Hotel', '2023-06-12 04:27:16', NULL, NULL),
(34, 7, 'Horison Aziza Solo', '2023-06-12 04:27:16', NULL, NULL),
(35, 7, 'Kusuma Sahid Prince Solo Hotel', '2023-06-12 04:27:16', NULL, NULL),
(36, 8, 'Dinasty Smart Hotel', '2023-06-12 04:27:16', NULL, NULL),
(37, 8, 'D Paragon Sumber', '2023-06-12 04:27:16', NULL, NULL),
(38, 8, 'Grand Setiakawan Hotel', '2023-06-12 04:27:16', NULL, NULL),
(39, 8, 'Red Planet Solo', '2023-06-12 04:27:16', NULL, NULL),
(40, 8, 'Victoria Guest House', '2023-06-12 04:27:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel_data`
--

CREATE TABLE `hotel_data` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `harga` double DEFAULT NULL,
  `fasilitas` text DEFAULT NULL,
  `kelas` double DEFAULT NULL,
  `jarak` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel_data`
--

INSERT INTO `hotel_data` (`id`, `id_hotel`, `harga`, `fasilitas`, `kelas`, `jarak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 609090, 'televisi layar datar, cermin, sofa, handuk, ruang keluarga terpisah,  pusat kebugaran, sauna, kolam renang dalam ruangan, spa, pijat', 5, 0.52, '2023-06-13 09:49:10', NULL, NULL),
(2, 2, 390442, 'televisi layar datar, akses internet - WiFi, akses internet WiFi (gratis), kamar bebas asap rokok, AC,  kolam renang anak', 3, 0.52, '2023-06-13 09:49:10', NULL, NULL),
(3, 3, 156177, 'televisi layar datar', 3, 0.61, '2023-06-13 09:49:10', NULL, NULL),
(4, 4, 140559, 'WiFi gratis di semua kamar, Wi-fi di tempat umum, tempat parkir mobil', 1, 0.76, '2023-06-13 09:49:10', NULL, NULL),
(5, 5, 281118, 'televisi layar datar, linen, cermin, handuk, akses internet - WiFi. Nikmatilah papan panah (dart), bilyar, taman, karaoke', 3, 0.85, '2023-06-13 09:49:10', NULL, NULL),
(6, 6, 515383, 'Resepsionis 24 jam, penyimpanan barang, Wi-fi di tempat umum, tempat parkir mobil, layanan kamar hanyalah beberapa dari berbagai fasilitas yang ditawarkan, televisi layar datar, akses internet - WiFi, akses internet WiFi (gratis), AC, layanan bangun pagi', 3, 0.1, '2023-06-13 09:49:10', NULL, NULL),
(7, 7, 234265, 'Wi-fi di tempat umum, tempat parkir mobil, layanan kamar, antar-jemput bandara, kamar untuk keluarga tersedia untuk Anda nikmati. AC, meja tulis, bar mini, TV satelit/kabel, brankas ', 3, 0.38, '2023-06-13 09:49:10', NULL, NULL),
(8, 8, 359207, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, penyimpanan barang, Wi-fi di tempat umum, akses internet - WiFi, AC, layanan bangun pagi, meja tulis, televisi', 1, 0.43, '2023-06-13 09:49:10', NULL, NULL),
(9, 9, 281118, 'Layanan kamar 24 jam, penyimpanan barang, tempat parkir mobil, layanan kamar, fasilitas rapat, Televisi layar datar, AC, meja tulis, telepon, televisi dapat ditemukan di beberapa kamar', 2, 0.45, '2023-06-13 09:49:10', NULL, NULL),
(10, 10, 390442, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, perapian ada dalam, kolam renang luar ruangan, spa, pijat, kolam renang anak, bilyar', 5, 0.45, '2023-06-13 09:49:10', NULL, NULL),
(11, 11, 343589, 'Layanan kamar 24 jam, resepsionis 24 jam, Wi-fi di tempat umum, tempat parkir mobil, layanan kamar ,Ruang penyimpanan pakaian, handuk, rak pakaian, sandal, toilet, pijat, taman', 3, 0.11, '2023-06-13 09:49:10', NULL, NULL),
(12, 12, 296736, 'layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, layanan taksi,AC, meja tulis, pengedap suara, telepon, televisi ', 2, 0.16, '2023-06-13 09:49:10', NULL, NULL),
(13, 13, 10292051, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, Wi-fi di tempat umum, tempat parkir mobil, AC', 1, 0.18, '2023-06-13 09:49:10', NULL, NULL),
(14, 14, 218648, 'televisi layar datar, Meja Kursi', 2, 0.23, '2023-06-13 09:49:10', NULL, NULL),
(15, 15, 437295, ' layanan kamar 24 jam, WiFi gratis di semua kamar, Wi-fi di tempat umum, parkir valet, tempat parkir mobil,  televisi layar datar, akses internet WiFi (gratis), AC, meja tulis, bar mini', 2, 0.31, '2023-06-13 09:49:10', NULL, NULL),
(16, 16, 234265, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, resepsionis 24 jam, check-in/check-out cepat, Wi-fi di tempat umum, televisi layar datar, AC, layanan bangun pagi, meja tulis, telepon untuk memastikan kenyamanan', 3, 0.37, '2023-06-13 09:49:10', NULL, NULL),
(17, 17, 203030, 'televisi layar datar, Meja Kursi', 4, 0.47, '2023-06-13 09:49:10', NULL, NULL),
(18, 18, 546619, 'kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, toko oleh-oleh/cinderamata,  hot tub, pusat kebugaran, sauna, kolam renang luar ruangan, spa', 4, 0.51, '2023-06-13 09:49:10', NULL, NULL),
(19, 19, 327971, ' Layanan kamar 24 jam, WiFi gratis di semua kamar, resepsionis 24 jam, penyimpanan barang, Wi-fi di tempat umum', 3, 0.55, '2023-06-13 09:49:10', NULL, NULL),
(20, 20, 296736, 'layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, layanan taksi,AC, meja tulis, pengedap suara, telepon, televisi ', 2, 0.25, '2023-06-13 09:49:10', NULL, NULL),
(21, 21, 343589, 'Layanan kamar 24 jam, resepsionis 24 jam, Wi-fi di tempat umum, tempat parkir mobil, layanan kamar ,Ruang penyimpanan pakaian, handuk, rak pakaian, sandal, toilet, pijat, taman', 3, 0.2, '2023-06-13 09:49:10', NULL, NULL),
(22, 22, 10292051, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, Wi-fi di tempat umum, tempat parkir mobil, AC', 1, 0.24, '2023-06-13 09:49:10', NULL, NULL),
(23, 23, 203030, 'televisi layar datar, Meja Kursi', 4, 0.41, '2023-06-13 09:49:10', NULL, NULL),
(24, 24, 437295, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, resepsionis 24 jam, check-in/check-out cepat, Wi-fi di tempat umum, televisi layar datar, AC, layanan bangun pagi, meja tulis, telepon untuk memastikan kenyamanan', 2, 0.44, '2023-06-13 09:49:10', NULL, NULL),
(25, 25, 234265, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, resepsionis 24 jam, check-in/check-out cepat, Wi-fi di tempat umum, televisi layar datar, AC, layanan bangun pagi, meja tulis, telepon untuk memastikan kenyamanan', 3, 0.44, '2023-06-13 09:49:10', NULL, NULL),
(26, 26, 406060, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, toko oleh-oleh/cinderamata, televisi layar datar, kamar mandi tambahan, toilet tambahan, kamar bebas asap rokok, AC. Nikmatilah hot tub, pusat kebugaran, sauna, kolam renang luar ruangan, spa', 3, 0.3, '2023-06-13 09:49:11', NULL, NULL),
(27, 27, 296736, 'WiFi gratis di semua kamar, mesin fax, resepsionis 24 jam, penyimpanan barang, Wi-fi di tempat umum , televisi layar datar, kamar bebas asap rokok, AC, layanan bangun pagi, meja tulis', 3, 0.45, '2023-06-13 09:49:11', NULL, NULL),
(28, 28, 374824, ' Layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, toko oleh-oleh/cinderamata, Televisi layar datar, telepon di kamar mandi, lantai karpet, minuman selamat datang gratis, linen, pusat kebugaran, sauna, kolam renang luar ruangan, spa, pijat', 5, 0.62, '2023-06-13 09:49:11', NULL, NULL),
(29, 29, 546619, 'kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, toko oleh-oleh/cinderamata,  hot tub, pusat kebugaran, sauna, kolam renang luar ruangan, spa', 4, 0.18, '2023-06-13 09:49:11', NULL, NULL),
(30, 30, 343589, ' Layanan kamar 24 jam, resepsionis 24 jam, Wi-fi di tempat umum, tempat parkir mobil, layanan kamar ,Ruang penyimpanan pakaian, handuk, rak pakaian, sandal, toilet, pijat, taman', 3, 0.22, '2023-06-13 09:49:11', NULL, NULL),
(31, 31, 374824, ' layanan kamar 24 jam, satpam 24 jam, toko serbaguna, layanan kebersihan harian, resepsionis 24 jam,  rak pakaian, kopi instan gratis, teh gratis, linen, cermin ,  kolam renang luar ruangan, kolam renang anak', 3, 2.45, '2023-06-13 09:49:11', NULL, NULL),
(32, 32, 249883, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, tempat pengisian listrik untuk mobil, layanan kebersihan , televisi layar datar, cermin, handuk, ruang penyimpanan pakaian, akses internet - WiFi', 2, 3.91, '2023-06-13 09:49:11', NULL, NULL),
(33, 33, 281118, 'Satpam 24 jam, layanan kebersihan harian, layanan pos, layanan taksi, resepsionis 24 jam, televisi layar datar, rak pakaian, teh gratis, minuman selamat datang gratis, cermin', 2, 3.99, '2023-06-13 09:49:11', NULL, NULL),
(34, 34, 390442, ' televisi layar datar, akses internet - WiFi, akses internet WiFi (gratis), kamar bebas asap rokok, AC,  kolam renang anak', 3, 3.05, '2023-06-13 09:49:11', NULL, NULL),
(35, 35, 390442, ' Layanan kamar 24 jam, WiFi gratis di semua kamar, satpam 24 jam, layanan kebersihan harian, perapian ada dalam, kolam renang luar ruangan, spa, pijat, kolam renang anak, bilyar', 5, 3.51, '2023-06-13 09:49:11', NULL, NULL),
(36, 36, 281118, 'Layanan kamar 24 jam, WiFi gratis di semua kamar, resepsionis 24 jam, Wi-fi di tempat umum, tempat parkir mobil, Akses ke pusat kebugaran, kolam renang luar ruangan,', 2, 0.7, '2023-06-13 09:49:11', NULL, NULL),
(37, 37, 249883, ' televisi layar datar, layanan handal dan staf profesional', 0, 0.73, '2023-06-13 09:49:11', NULL, NULL),
(38, 38, 265501, 'layanan kamar 24 jam, satpam 24 jam, Wi-fi di tempat umum, tempat parkir mobil, layanan kamar,rak pakaian, kamar bebas asap rokok, AC, layanan bangun pagi, meja tulis ', 3, 0.9, '2023-06-13 09:49:11', NULL, NULL),
(39, 39, 312354, 'WiFi gratis di semua kamar, satpam 24 jam, resepsionis 24 jam, fasilitas untuk tamu dengan kebutuhan khusus, check-in/check-out cepat , televisi layar datar, akses internet WiFi (gratis), kamar bebas asap rokok, AC, meja tulis', 3, 1.01, '2023-06-13 09:49:11', NULL, NULL),
(40, 40, 203030, 'Televisi layar datar, AC, meja tulis, akses internet WiFi (dikenakan biaya), shower ', 2, 1.12, '2023-06-13 09:49:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel_kandidat`
--

CREATE TABLE `hotel_kandidat` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `harga` double NOT NULL DEFAULT 0,
  `fasilitas` double NOT NULL DEFAULT 0,
  `kelas` double NOT NULL DEFAULT 0,
  `jarak` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel_kandidat`
--

INSERT INTO `hotel_kandidat` (`id`, `id_hotel`, `harga`, `fasilitas`, `kelas`, `jarak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 609090, 0.7, 5, 0.52, '2023-06-12 05:47:18', NULL, NULL),
(2, 2, 390442, 0.8, 3, 0.52, '2023-06-12 05:47:18', NULL, NULL),
(3, 3, 156177, 0.4, 3, 0.61, '2023-06-12 05:47:18', NULL, NULL),
(4, 4, 140559, 0.3, 1, 0.76, '2023-06-12 05:47:18', NULL, NULL),
(5, 5, 281118, 0.8, 3, 0.85, '2023-06-12 05:47:18', NULL, NULL),
(6, 6, 515383, 0.7, 3, 0.1, '2023-06-12 05:47:18', NULL, NULL),
(7, 7, 234265, 0.5, 3, 0.38, '2023-06-12 05:47:18', NULL, NULL),
(8, 8, 359207, 0.3, 1, 0.43, '2023-06-12 05:47:18', NULL, NULL),
(9, 9, 281118, 0.5, 2, 0.45, '2023-06-12 05:47:18', NULL, NULL),
(10, 10, 390442, 0.8, 5, 0.45, '2023-06-12 05:47:18', NULL, NULL),
(11, 11, 343589, 0.7, 3, 0.11, '2023-06-12 05:47:18', NULL, NULL),
(12, 12, 296736, 0.6, 2, 0.16, '2023-06-12 05:47:18', NULL, NULL),
(13, 13, 10292051, 0.7, 1, 0.18, '2023-06-12 05:47:18', NULL, NULL),
(14, 14, 218648, 0.5, 2, 0.23, '2023-06-12 05:47:18', NULL, NULL),
(15, 15, 437295, 0.9, 2, 0.31, '2023-06-12 05:47:18', NULL, NULL),
(16, 16, 234265, 0.7, 3, 0.37, '2023-06-12 05:47:18', NULL, NULL),
(17, 17, 203030, 0.5, 4, 0.47, '2023-06-12 05:47:18', NULL, NULL),
(18, 18, 546619, 0.9, 4, 0.51, '2023-06-12 05:47:18', NULL, NULL),
(19, 19, 327971, 0.4, 3, 0.55, '2023-06-12 05:47:18', NULL, NULL),
(20, 20, 296736, 0.6, 2, 0.25, '2023-06-12 05:47:18', NULL, NULL),
(21, 21, 343589, 0.7, 3, 0.2, '2023-06-12 05:47:18', NULL, NULL),
(22, 22, 10292051, 0.7, 1, 0.24, '2023-06-12 05:47:18', NULL, NULL),
(23, 23, 203030, 0.5, 4, 0.41, '2023-06-12 05:47:18', NULL, NULL),
(24, 24, 437295, 0.9, 2, 0.44, '2023-06-12 05:47:18', NULL, NULL),
(25, 25, 234265, 0.7, 3, 0.44, '2023-06-12 05:47:18', NULL, NULL),
(26, 26, 406060, 0.8, 3, 0.3, '2023-06-12 05:47:18', NULL, NULL),
(27, 27, 296736, 0.7, 3, 0.45, '2023-06-12 05:47:18', NULL, NULL),
(28, 28, 374824, 0.7, 5, 0.62, '2023-06-12 05:47:18', NULL, NULL),
(29, 29, 546619, 0.9, 4, 0.18, '2023-06-12 05:47:18', NULL, NULL),
(30, 30, 343589, 0.7, 3, 0.22, '2023-06-12 05:47:18', NULL, NULL),
(31, 31, 374824, 0.5, 3, 2.45, '2023-06-12 05:47:18', NULL, NULL),
(32, 32, 249883, 0.3, 2, 3.91, '2023-06-12 05:47:18', NULL, NULL),
(33, 33, 281118, 0.8, 2, 3.99, '2023-06-12 05:47:18', NULL, NULL),
(34, 34, 390442, 0.5, 3, 3.05, '2023-06-12 05:47:18', NULL, NULL),
(35, 35, 390442, 0.7, 5, 3.51, '2023-06-12 05:47:19', NULL, NULL),
(36, 36, 281118, 0.4, 2, 0.7, '2023-06-12 05:47:19', NULL, NULL),
(37, 37, 249883, 0.5, 0, 0.73, '2023-06-12 05:47:19', NULL, NULL),
(38, 38, 265501, 0.6, 3, 0.9, '2023-06-12 05:47:19', NULL, NULL),
(39, 39, 312354, 0.5, 3, 1.01, '2023-06-12 05:47:19', NULL, NULL),
(40, 40, 203030, 0.7, 2, 1.12, '2023-06-12 05:47:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ipul', 'ipul@gmail.com', NULL, '$2y$10$bbdzu/a9rh7CvRHxzzpVpe6aZOMlD3W/QyLQWa0.EDP4uIKmTzrVK', NULL, '2023-06-13 07:59:11', '2023-06-13 07:59:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kraton Kasunanan', '2023-06-11 16:27:42', NULL, NULL),
(2, 'Kraton Mangkunegaran', '2023-06-11 16:27:42', NULL, NULL),
(3, 'Museum Radya Pustaka', '2023-06-11 16:27:42', NULL, NULL),
(4, 'THR Sriwedari', '2023-06-11 16:27:42', NULL, NULL),
(5, 'Wayang Orang Sriwedari', '2023-06-11 16:27:42', NULL, NULL),
(6, 'Museum Batik', '2023-06-11 16:27:42', NULL, NULL),
(7, 'Taman Satwataru Jurug', '2023-06-11 16:27:42', NULL, NULL),
(8, 'Taman Balekambang', '2023-06-11 16:27:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata_data`
--

CREATE TABLE `wisata_data` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `aksesibilitas` text DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  `aktifitas` text DEFAULT NULL,
  `kunjungan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata_data`
--

INSERT INTO `wisata_data` (`id`, `id_wisata`, `fasilitas`, `aksesibilitas`, `biaya`, `aktifitas`, `kunjungan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Toilet,Area Parkir,Tempat Sampah, Mushola', 'Rute mudah ditempuh,Jalan beraspal,Bisa naik mobil,Bisa naik motor, Bisa Naik Kendaraan Umum', 4000, 'Sejarah, Keluarga', '79741', '2023-06-13 08:30:14', NULL, NULL),
(2, 2, 'Area Parkir,Tempat Sampah', 'Rute mudah ditempuh,Jalan beraspal,Bisa naik motor ', 3500, 'Sejarah, Keluarga', '12036', '2023-06-13 08:30:14', NULL, NULL),
(3, 3, 'Toilet,Area Parkir,Tempat Sampah', 'Rute mudah ditempuh,Jalan beraspal,Bisa naik mobil,Bisa naik motor', 3000, 'Sejarah, Keluarga', '19400', '2023-06-13 08:30:14', NULL, NULL),
(4, 4, 'Area Parkir,Toilet,Tempat Sampah,Rumah Makan,Wahana Permainan, Mushola', 'Rute mudah ditempuh,Jalan beraspal,Bisa naik motor,Bisa naik mobil,Lewat kendaraan umum', 15000, 'Rekreasi, Keluarga', '2173767', '2023-06-13 08:30:14', NULL, NULL),
(5, 5, 'Toilet,Area Parkir', 'Rute mudah ditempuh,Jalan beraspal,Bisa naik motor , Bisa Naik Mobil', 2000, 'Sejarah, Keluarga, Hiburan', '32085', '2023-06-13 08:30:14', NULL, NULL),
(6, 6, 'Toilet,Area Parkir,Rumah Makan,Tempat Sampah,Toko Oleh-oleh', 'Rute mudah ditempuh,Jalan beraspal,Bisa naik motor,Bisa naik mobil,Lewat kendaraan umum', 10000, 'Sejarah,Keluarga', '279976', '2023-06-13 08:30:14', NULL, NULL),
(7, 7, 'Area Parkir,Toilet,Tempat Sampah,Wahana Permainan', 'Rute mudah ditempuh,Bisa naik motor,Bisa naik mobil', 2000, 'Alam,Keluarga,Relaksasi', '32085', '2023-06-13 08:30:14', NULL, NULL),
(8, 8, 'Area Parkir,Toilet,Tempat Sampah,Rumah Makan,Wahana Permainan', 'Rute mudah ditempuh,Jalan beraspal,Bisa naik motor,Bisa naik mobil', 3000, 'Alam,Keluarga,Relaksasi', '12597', '2023-06-13 08:30:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata_kandidat`
--

CREATE TABLE `wisata_kandidat` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `fasilitas` double NOT NULL DEFAULT 0,
  `aksesibilitas` double NOT NULL DEFAULT 0,
  `biaya` double NOT NULL DEFAULT 0,
  `aktifitas` double NOT NULL DEFAULT 0,
  `kunjungan` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata_kandidat`
--

INSERT INTO `wisata_kandidat` (`id`, `id_wisata`, `fasilitas`, `aksesibilitas`, `biaya`, `aktifitas`, `kunjungan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3.4, 4.5, 20000, 5.8, 2.5, '2023-06-11 16:38:22', NULL, NULL),
(2, 2, 6.5, 4.3, 5000, 3.5, 4.6, '2023-06-11 16:38:22', NULL, NULL),
(3, 3, 1.4, 3.6, 10000, 3, 6.4, '2023-06-11 16:38:22', NULL, NULL),
(4, 4, 5.4, 4.3, 5500, 6, 7.8, '2023-06-11 16:38:22', NULL, NULL),
(5, 5, 7.9, 8.5, 20000, 2.8, 4, '2023-06-11 16:38:22', NULL, NULL),
(6, 6, 4.9, 6, 15000, 5.6, 7.4, '2023-06-11 16:38:22', NULL, NULL),
(7, 7, 3.5, 3.4, 30000, 7, 9, '2023-06-11 16:38:22', NULL, NULL),
(8, 8, 7.6, 5.4, 10000, 4.8, 6, '2023-06-11 16:38:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_hotel_wisata` (`id_wisata`);

--
-- Indeks untuk tabel `hotel_data`
--
ALTER TABLE `hotel_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_hotel_data_hotel` (`id_hotel`);

--
-- Indeks untuk tabel `hotel_kandidat`
--
ALTER TABLE `hotel_kandidat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_hotel_kandidat_hotel` (`id_hotel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata_data`
--
ALTER TABLE `wisata_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_wisata_data_wilayah` (`id_wisata`);

--
-- Indeks untuk tabel `wisata_kandidat`
--
ALTER TABLE `wisata_kandidat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_wisata_kandidat_wilayah` (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `hotel_data`
--
ALTER TABLE `hotel_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `hotel_kandidat`
--
ALTER TABLE `hotel_kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `wisata_data`
--
ALTER TABLE `wisata_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `wisata_kandidat`
--
ALTER TABLE `wisata_kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `FK_hotel_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hotel_data`
--
ALTER TABLE `hotel_data`
  ADD CONSTRAINT `FK_hotel_data_hotel` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hotel_kandidat`
--
ALTER TABLE `hotel_kandidat`
  ADD CONSTRAINT `FK_hotel_kandidat_hotel` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisata_data`
--
ALTER TABLE `wisata_data`
  ADD CONSTRAINT `FK_wisata_data_wilayah` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisata_kandidat`
--
ALTER TABLE `wisata_kandidat`
  ADD CONSTRAINT `FK_wisata_kandidat_wilayah` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
