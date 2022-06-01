-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2022 pada 05.59
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahinovasi2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama_ketua` char(150) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_tim`
--

INSERT INTO `anggota_tim` (`id`, `id_peserta`, `nama_ketua`, `nama_anggota`, `created_date`, `updated_date`) VALUES
(127, 6775529, 'Deo', '', '2021-11-28 20:46:44', '0000-00-00 00:00:00'),
(128, 6775530, 'Aham', '', '2021-11-28 20:59:48', '0000-00-00 00:00:00'),
(129, 6775531, 'Avif', '', '2021-11-28 21:08:58', '0000-00-00 00:00:00'),
(130, 6775532, 'Imam', '', '2021-11-28 21:16:06', '0000-00-00 00:00:00'),
(131, 6775533, 'Ikhwan', '', '2021-11-28 23:11:29', '0000-00-00 00:00:00'),
(132, 6775534, 'Ilham', '', '2021-11-28 23:17:39', '0000-00-00 00:00:00'),
(133, 6775535, 'Ridwan', '', '2021-11-28 23:24:11', '0000-00-00 00:00:00'),
(135, 6775537, 'Yusuf', '', '2021-11-28 23:40:30', '0000-00-00 00:00:00'),
(137, 6775539, 'Deo', '', '2022-01-01 11:41:28', '0000-00-00 00:00:00'),
(138, 6775540, 'Aham', '', '2022-01-01 11:43:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara_pemenang`
--

CREATE TABLE `berita_acara_pemenang` (
  `id_berita_acara_pemenang` int(11) NOT NULL,
  `id_usulan` varchar(10) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `pemenang` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `bidang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id`, `bidang`) VALUES
(1, 'Pendidikan'),
(2, 'Kesehatan'),
(3, 'Lingkungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `event`) VALUES
(45, 'Lomba Inovasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator_penilaian`
--

CREATE TABLE `indikator_penilaian` (
  `id_indikator_penilaian` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `indikator` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `indikator_penilaian`
--

INSERT INTO `indikator_penilaian` (`id_indikator_penilaian`, `id_subevent`, `indikator`) VALUES
(44, 51, 'Lingkup Inovasi Teknologi yang Dihasilkan'),
(45, 51, 'Kemudahan Dideseminasikan dan Diadopsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator_penilaian_pemenang`
--

CREATE TABLE `indikator_penilaian_pemenang` (
  `id` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `komponen` char(150) NOT NULL,
  `nilai_komponen_min` int(11) NOT NULL,
  `nilai_komponen_max` int(11) NOT NULL,
  `note` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `indikator_penilaian_pemenang`
--

INSERT INTO `indikator_penilaian_pemenang` (`id`, `id_subevent`, `komponen`, `nilai_komponen_min`, `nilai_komponen_max`, `note`) VALUES
(41, 51, 'Tingkat Ketersiapterapan', 0, 20, 'Alat dapat dimanfaatkan'),
(42, 51, 'Kebaruan/Inovasi/Kreativitas', 0, 10, 'Kriteria ini terkait dengan kebaruan ide'),
(43, 51, 'Potensi keberlanjutan/ Komersialisasi', 0, 20, 'Terkait potensi dapat dikembangkan lebih lanjut'),
(44, 51, 'Keunikan daya jual', 0, 15, 'Kriteria berkaitan dengan keunikan'),
(45, 51, 'Tingkat Kemanfaatan', 0, 35, 'Terkait dengan daya ungkit potensi kemanfaatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_indikator`
--

CREATE TABLE `keterangan_indikator` (
  `id_keterangan_indikator` int(11) NOT NULL,
  `id_indikator_penilaian` int(11) NOT NULL,
  `keterangan` char(255) NOT NULL,
  `nilai_minimal_keterangan` char(3) NOT NULL,
  `nilai_maksimal_keterangan` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterangan_indikator`
--

INSERT INTO `keterangan_indikator` (`id_keterangan_indikator`, `id_indikator_penilaian`, `keterangan`, `nilai_minimal_keterangan`, `nilai_maksimal_keterangan`) VALUES
(60, 44, 'Inovasi berskala lokal kecamatan/desa', '0', '11'),
(61, 44, 'Inovasi berskala lokal kabupaten/kota', '11', '20'),
(62, 44, 'Inovasi berskala provinsi', '31', '40'),
(64, 45, 'Sangat Sulit', '0', '10'),
(65, 45, 'Agak sulit', '11', '20'),
(66, 45, 'Agak Mudah', '31', '40'),
(67, 45, 'Mudah', '41', '50'),
(68, 44, 'Inovasi berskala nasional', '41', '50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nominator`
--

CREATE TABLE `nominator` (
  `id_nominator` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `judul_pengumuman` varchar(150) NOT NULL,
  `deskripsi_pengumuman` text NOT NULL,
  `file_pengumuman` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `status`, `judul_pengumuman`, `deskripsi_pengumuman`, `file_pengumuman`, `created_by`, `created_date`) VALUES
(5, '1', 'Pengumuman 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac elementum justo. Mauris nec libero et sem efficitur tristique. Praesent vulputate dui facilisis placerat volutpat. Maecenas gravida luctus ligula eu malesuada. Sed laoreet et est vitae vestibulum. Phasellus erat metus, tempor et risus vel, ullamcorper porttitor ligula. Suspendisse mattis purus sem. Donec ac velit in nisl pellentesque vestibulum vel ac nunc.', 'FASILITASI_MAGANG_20212.pdf', 'admin@gmail.com', '2021-12-08'),
(6, '1', 'Pengumuman 2', 'Tes 2', 'FASILITASI_MAGANG_2021.pdf', 'admin@gmail.com', '2021-12-08'),
(7, '1', 'Pengumuman 3', 'Tes Data 3', 'file.pdf', 'admin@gmail.com', '2021-12-09'),
(8, '1', 'Pengumuman 4', 'Berikut ini adalah daftar pemenang INOTEK 2021', 'ktp.png', 'admin@gmail.com', '2021-12-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_pemenang`
--

CREATE TABLE `penilaian_pemenang` (
  `id` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_indikator` char(150) NOT NULL,
  `id_penilai` char(150) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_proposal`
--

CREATE TABLE `penilaian_proposal` (
  `id` int(11) NOT NULL,
  `id_usulan` char(150) NOT NULL,
  `nilai_proposal` int(11) NOT NULL,
  `id_penilai` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian_proposal`
--

INSERT INTO `penilaian_proposal` (`id`, `id_usulan`, `nilai_proposal`, `id_penilai`) VALUES
(222, '9651263', 83, '148'),
(223, '9651264', 79, '148'),
(224, '9651265', 82, '148'),
(225, '9651266', 81, '148'),
(226, '9651267', 84, '148'),
(227, '9651268', 65, '148'),
(228, '9651272', 85, '148'),
(229, '9651270', 77, '148'),
(230, '9651269', 85, '148'),
(231, '9651271', 86, '148'),
(232, '9651266', 67, '151'),
(233, '9651265', 76, '151'),
(234, '9651268', 78, '151'),
(235, '9651270', 84, '151'),
(236, '9651272', 79, '151'),
(237, '9651271', 70, '151'),
(238, '9651269', 78, '151'),
(239, '9651267', 88, '151'),
(240, '9651263', 83, '151'),
(241, '9651264', 69, '151'),
(242, '9651272', 66, '149'),
(243, '9651270', 87, '149'),
(244, '9651268', 90, '149'),
(245, '9651266', 79, '149'),
(246, '9651264', 81, '149'),
(247, '9651271', 84, '149'),
(248, '9651269', 92, '149'),
(249, '9651267', 78, '149'),
(250, '9651263', 85, '149'),
(251, '9651265', 92, '149'),
(252, '9651273', 85, '148'),
(253, '9651274', 84, '148'),
(254, '9651277', 79, '148'),
(255, '9651276', 87, '148'),
(256, '9651275', 80, '148'),
(257, '9651275', 73, '151'),
(258, '9651277', 88, '151'),
(259, '9651274', 77, '151'),
(260, '9651273', 89, '151'),
(261, '9651276', 83, '151'),
(262, '9651275', 65, '149'),
(263, '9651273', 78, '149'),
(264, '9651274', 82, '149'),
(265, '9651277', 90, '149'),
(266, '9651276', 86, '149');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_usulan`
--

CREATE TABLE `penilaian_usulan` (
  `id` int(11) NOT NULL,
  `usulan_id` char(150) NOT NULL,
  `id_indikator` char(150) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_penilai` char(150) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian_usulan`
--

INSERT INTO `penilaian_usulan` (`id`, `usulan_id`, `id_indikator`, `nilai`, `id_penilai`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(491, '9651263', '44', 37, '148', '2021-12-29 13:43:22', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(492, '9651263', '45', 33, '148', '2021-12-29 13:43:22', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(493, '9651264', '44', 42, '148', '2021-12-29 13:43:38', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(494, '9651264', '45', 33, '148', '2021-12-29 13:43:38', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(495, '9651265', '44', 43, '148', '2021-12-29 13:43:52', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(496, '9651265', '45', 40, '148', '2021-12-29 13:43:52', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(497, '9651266', '44', 32, '148', '2021-12-29 13:44:07', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(498, '9651266', '45', 36, '148', '2021-12-29 13:44:07', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(499, '9651267', '44', 45, '148', '2021-12-29 13:44:26', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(500, '9651267', '45', 39, '148', '2021-12-29 13:44:26', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(501, '9651268', '44', 45, '148', '2021-12-29 13:44:39', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(502, '9651268', '45', 47, '148', '2021-12-29 13:44:39', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(503, '9651272', '44', 42, '148', '2021-12-29 13:44:56', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(504, '9651272', '45', 44, '148', '2021-12-29 13:44:56', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(505, '9651270', '44', 38, '148', '2021-12-29 13:45:10', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(506, '9651270', '45', 39, '148', '2021-12-29 13:45:10', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(507, '9651269', '44', 28, '148', '2021-12-29 13:45:23', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(508, '9651269', '45', 43, '148', '2021-12-29 13:45:23', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(509, '9651271', '44', 43, '148', '2021-12-29 13:45:36', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(510, '9651271', '45', 35, '148', '2021-12-29 13:45:36', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(511, '9651266', '44', 36, '151', '2021-12-29 13:46:49', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(512, '9651266', '45', 40, '151', '2021-12-29 13:46:49', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(513, '9651265', '44', 43, '151', '2021-12-29 13:47:05', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(514, '9651265', '45', 44, '151', '2021-12-29 13:47:05', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(515, '9651268', '44', 34, '151', '2021-12-29 13:47:15', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(516, '9651268', '45', 33, '151', '2021-12-29 13:47:15', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(517, '9651270', '44', 44, '151', '2021-12-29 13:47:29', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(518, '9651270', '45', 40, '151', '2021-12-29 13:47:29', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(519, '9651272', '44', 35, '151', '2021-12-29 13:47:43', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(520, '9651272', '45', 35, '151', '2021-12-29 13:47:43', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(521, '9651271', '44', 30, '151', '2021-12-29 13:48:04', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(522, '9651271', '45', 43, '151', '2021-12-29 13:48:04', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(523, '9651269', '44', 35, '151', '2021-12-29 13:48:16', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(524, '9651269', '45', 38, '151', '2021-12-29 13:48:16', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(525, '9651267', '44', 45, '151', '2021-12-29 13:48:26', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(526, '9651267', '45', 46, '151', '2021-12-29 13:48:26', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(527, '9651263', '44', 38, '151', '2021-12-29 13:48:39', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(528, '9651263', '45', 41, '151', '2021-12-29 13:48:39', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(529, '9651264', '44', 41, '151', '2021-12-29 13:48:54', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(530, '9651264', '45', 33, '151', '2021-12-29 13:48:54', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(531, '9651272', '44', 42, '149', '2021-12-29 13:49:34', 'Susanto', '0000-00-00 00:00:00', ''),
(532, '9651272', '45', 34, '149', '2021-12-29 13:49:34', 'Susanto', '0000-00-00 00:00:00', ''),
(533, '9651270', '44', 40, '149', '2021-12-29 13:49:48', 'Susanto', '0000-00-00 00:00:00', ''),
(534, '9651270', '45', 35, '149', '2021-12-29 13:49:48', 'Susanto', '0000-00-00 00:00:00', ''),
(535, '9651268', '44', 37, '149', '2021-12-29 13:50:03', 'Susanto', '0000-00-00 00:00:00', ''),
(536, '9651268', '45', 35, '149', '2021-12-29 13:50:03', 'Susanto', '0000-00-00 00:00:00', ''),
(537, '9651266', '44', 45, '149', '2021-12-29 13:50:13', 'Susanto', '0000-00-00 00:00:00', ''),
(538, '9651266', '45', 42, '149', '2021-12-29 13:50:13', 'Susanto', '0000-00-00 00:00:00', ''),
(539, '9651264', '44', 36, '149', '2021-12-29 13:50:28', 'Susanto', '0000-00-00 00:00:00', ''),
(540, '9651264', '45', 46, '149', '2021-12-29 13:50:28', 'Susanto', '0000-00-00 00:00:00', ''),
(541, '9651271', '44', 29, '149', '2021-12-29 13:50:43', 'Susanto', '0000-00-00 00:00:00', ''),
(542, '9651271', '45', 34, '149', '2021-12-29 13:50:43', 'Susanto', '0000-00-00 00:00:00', ''),
(543, '9651269', '44', 42, '149', '2021-12-29 13:50:54', 'Susanto', '0000-00-00 00:00:00', ''),
(544, '9651269', '45', 44, '149', '2021-12-29 13:50:54', 'Susanto', '0000-00-00 00:00:00', ''),
(545, '9651267', '44', 33, '149', '2021-12-29 13:51:03', 'Susanto', '0000-00-00 00:00:00', ''),
(546, '9651267', '45', 44, '149', '2021-12-29 13:51:03', 'Susanto', '0000-00-00 00:00:00', ''),
(547, '9651263', '44', 44, '149', '2021-12-29 13:51:12', 'Susanto', '0000-00-00 00:00:00', ''),
(548, '9651263', '45', 33, '149', '2021-12-29 13:51:12', 'Susanto', '0000-00-00 00:00:00', ''),
(549, '9651265', '44', 45, '149', '2021-12-29 13:51:25', 'Susanto', '0000-00-00 00:00:00', ''),
(550, '9651265', '45', 43, '149', '2021-12-29 13:51:25', 'Susanto', '0000-00-00 00:00:00', ''),
(551, '9651273', '44', 36, '148', '2022-01-01 05:36:37', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(552, '9651273', '45', 35, '148', '2022-01-01 05:36:37', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(553, '9651274', '44', 44, '148', '2022-01-01 05:50:40', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(554, '9651274', '45', 35, '148', '2022-01-01 05:50:40', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(555, '9651277', '44', 42, '148', '2022-01-01 05:50:52', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(556, '9651277', '45', 35, '148', '2022-01-01 05:50:52', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(557, '9651276', '44', 44, '148', '2022-01-01 05:51:04', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(558, '9651276', '45', 43, '148', '2022-01-01 05:51:04', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(559, '9651275', '44', 40, '148', '2022-01-01 05:51:17', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(560, '9651275', '45', 37, '148', '2022-01-01 05:51:17', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(561, '9651275', '44', 45, '151', '2022-01-01 05:52:08', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(562, '9651275', '45', 47, '151', '2022-01-01 05:52:08', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(563, '9651277', '44', 35, '151', '2022-01-01 05:52:22', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(564, '9651277', '45', 32, '151', '2022-01-01 05:52:22', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(565, '9651274', '44', 34, '151', '2022-01-01 05:52:35', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(566, '9651274', '45', 31, '151', '2022-01-01 05:52:35', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(567, '9651273', '44', 32, '151', '2022-01-01 05:52:49', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(568, '9651273', '45', 33, '151', '2022-01-01 05:52:49', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(569, '9651276', '44', 38, '151', '2022-01-01 05:53:00', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(570, '9651276', '45', 44, '151', '2022-01-01 05:53:00', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(571, '9651275', '44', 46, '149', '2022-01-01 05:57:28', 'Susanto', '0000-00-00 00:00:00', ''),
(572, '9651275', '45', 48, '149', '2022-01-01 05:57:28', 'Susanto', '0000-00-00 00:00:00', ''),
(573, '9651273', '44', 43, '149', '2022-01-01 05:57:39', 'Susanto', '0000-00-00 00:00:00', ''),
(574, '9651273', '45', 34, '149', '2022-01-01 05:57:39', 'Susanto', '0000-00-00 00:00:00', ''),
(575, '9651274', '44', 36, '149', '2022-01-01 05:57:52', 'Susanto', '0000-00-00 00:00:00', ''),
(576, '9651274', '45', 36, '149', '2022-01-01 05:57:52', 'Susanto', '0000-00-00 00:00:00', ''),
(577, '9651277', '44', 41, '149', '2022-01-01 05:58:13', 'Susanto', '0000-00-00 00:00:00', ''),
(578, '9651277', '45', 36, '149', '2022-01-01 05:58:13', 'Susanto', '0000-00-00 00:00:00', ''),
(579, '9651276', '44', 44, '149', '2022-01-01 05:58:27', 'Susanto', '0000-00-00 00:00:00', ''),
(580, '9651276', '45', 37, '149', '2022-01-01 05:58:27', 'Susanto', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_usulan` char(150) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `interaksi` varchar(100) NOT NULL,
  `nama_ketua` char(255) NOT NULL,
  `email_ketua` char(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat_ketua` varchar(255) NOT NULL,
  `ktp` varchar(150) NOT NULL,
  `asal_sekolah` char(255) NOT NULL,
  `kategori_peserta` varchar(100) NOT NULL,
  `nama_tim` char(255) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_usulan`, `id_usr`, `id_bidang`, `interaksi`, `nama_ketua`, `email_ketua`, `no_hp`, `alamat_ketua`, `ktp`, `asal_sekolah`, `kategori_peserta`, `nama_tim`, `tahun`, `created_date`, `updated_date`) VALUES
(6775528, '9651263', 158, 2, 'Individu', 'Asep', 'asep@gmail.com', '089634523498', 'Parang Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Loegaire', '2021', '2021-11-28 20:42:12', '0000-00-00 00:00:00'),
(6775529, '9651264', 159, 3, 'Individu', 'Deo', 'deo@gmail.com', '085845253852', 'Sarangan Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Blathnat', '2021', '2021-11-28 20:46:44', '0000-00-00 00:00:00'),
(6775530, '9651265', 160, 1, 'Individu', 'Aham', 'aham@gmail.com', '081546723087', 'Sukomoro Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Fortuna', '2021', '2021-11-28 20:59:48', '0000-00-00 00:00:00'),
(6775531, '9651266', 161, 3, 'Individu', 'Avif', 'avif@gmail.com', '081546723087', 'Nguntoronadi Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Nemesis', '2021', '2021-11-28 21:08:58', '0000-00-00 00:00:00'),
(6775532, '9651267', 162, 1, 'Individu', 'Imam', 'imam@gmail.com', '085368924345', 'Barat Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Chakra', '2021', '2021-11-28 21:16:06', '0000-00-00 00:00:00'),
(6775533, '9651268', 163, 2, 'Individu', 'Ikhwan', 'ikhwan@gmail.com', '085845253852', 'Karangrejo Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Ivaylo', '2021', '2021-11-28 23:11:29', '0000-00-00 00:00:00'),
(6775534, '9651269', 164, 1, 'Individu', 'Ilham', 'ilham@gmail.com', '083845253852', 'Bendo Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Aphrodite', '2021', '2021-11-28 23:17:39', '0000-00-00 00:00:00'),
(6775535, '9651270', 165, 1, 'Individu', 'Ridwan', 'ridwan@gmail.com', '085368924345', 'Ngariboyo Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Delta', '2021', '2021-11-28 23:24:11', '0000-00-00 00:00:00'),
(6775536, '9651271', 166, 3, 'Individu', 'Alfian', 'alfian@gmail.com', '081445764296', 'Takeran Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Dexter', '2021', '2021-11-28 23:34:17', '2021-11-28 23:34:30'),
(6775537, '9651272', 167, 3, 'Individu', 'Yusuf', 'yusuf@gmail.com', '085845253852', 'Kawedanan Magetan', '0277b844c19dcf32d140038a10d11ff0.png', '', 'umum', 'Harvy', '2021', '2021-11-28 23:40:30', '0000-00-00 00:00:00'),
(6775538, '9651273', 158, 1, 'Individu', 'Asep', 'asep@gmail.com', '087634216432', 'Magetan', 'ae7c872fd99120d05e48d6dd55b99cea.png', 'SMA 1 Barat', 'pelajar', 'Tim A', '2022', '2022-01-01 11:31:30', '0000-00-00 00:00:00'),
(6775539, '9651274', 159, 1, 'Individu', 'Deo', 'deo@gmail.com', '089745236573', 'Bendo Magetan', 'd978634d536a8a9bc2f69c3637adcfdb.png', 'SMA 1 Bendo', 'pelajar', 'Tim B', '2022', '2022-01-01 11:41:28', '0000-00-00 00:00:00'),
(6775540, '9651275', 160, 1, 'Individu', 'Aham', 'aham@gmail.com', '089634217563', 'Maospati Magetan', 'c6f11bf7eb45cd5448f05fdf44d3d97c.png', 'SMK 1 Magetan', 'pelajar', 'Tim C', '2022', '2022-01-01 11:43:46', '0000-00-00 00:00:00'),
(6775541, '9651276', 161, 1, 'Individu', 'Avif S', 'avif@gmail.com', '083412634590', 'Takeran Magetan', 'f0c373f3caea01a9452438437441a877.png', 'SMA 2 Magetan', 'pelajar', 'Tim D', '2022', '2022-01-01 11:46:10', '0000-00-00 00:00:00'),
(6775542, '9651277', 162, 1, 'Individu', 'Imam M', 'imam@gmail.com', '083174530942', 'Parang Magetan', 'f950f786378f2f638ecf58d3c58ca745.png', 'SMA 1 Parang', 'pelajar', 'Tim E', '2022', '2022-01-01 11:48:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_penilai`
--

CREATE TABLE `setting_penilai` (
  `id` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `id_usr` char(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_penilai`
--

INSERT INTO `setting_penilai` (`id`, `id_subevent`, `id_usr`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(145, 51, '148', '2021-11-28 19:23:40', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(146, 51, '151', '2021-11-28 19:23:45', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(147, 51, '149', '2021-11-28 19:23:49', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(148, 51, '150', '2021-11-28 19:23:52', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(149, 51, '155', '2021-11-28 19:24:07', 'admin@gmail.com', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subevent`
--

CREATE TABLE `subevent` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_event` char(150) NOT NULL,
  `subevent` char(150) NOT NULL,
  `bidang` varchar(150) NOT NULL,
  `mulai` char(150) NOT NULL,
  `akhir` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subevent`
--

INSERT INTO `subevent` (`id`, `tahun`, `id_event`, `subevent`, `bidang`, `mulai`, `akhir`) VALUES
(51, '2021', '45', 'Inovasi Teknologi', 'Pendidikan', '2021-11-10', '2022-01-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_nilai`
--

CREATE TABLE `total_nilai` (
  `id` int(11) NOT NULL,
  `id_usulan` char(150) NOT NULL,
  `nilai_verifikasi` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `total_nilai`
--

INSERT INTO `total_nilai` (`id`, `id_usulan`, `nilai_verifikasi`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(209, '9651263', '72.60', '2021-12-29 13:43:22', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(210, '9651264', '75.80', '2021-12-29 13:43:38', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(211, '9651265', '82.80', '2021-12-29 13:43:52', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(212, '9651266', '70.60', '2021-12-29 13:44:07', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(213, '9651267', '84.00', '2021-12-29 13:44:25', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(214, '9651268', '86.60', '2021-12-29 13:44:39', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(215, '9651272', '85.80', '2021-12-29 13:44:55', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(216, '9651270', '77.00', '2021-12-29 13:45:10', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(217, '9651269', '73.80', '2021-12-29 13:45:23', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(218, '9651271', '79.60', '2021-12-29 13:45:36', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(219, '9651266', '74.20', '2021-12-29 13:46:49', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(220, '9651265', '84.80', '2021-12-29 13:47:05', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(221, '9651268', '69.20', '2021-12-29 13:47:15', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(222, '9651270', '84.00', '2021-12-29 13:47:29', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(223, '9651272', '71.80', '2021-12-29 13:47:43', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(224, '9651271', '72.40', '2021-12-29 13:48:04', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(225, '9651269', '74.00', '2021-12-29 13:48:16', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(226, '9651267', '90.40', '2021-12-29 13:48:26', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(227, '9651263', '79.80', '2021-12-29 13:48:39', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(228, '9651264', '73.00', '2021-12-29 13:48:54', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(229, '9651272', '74.00', '2021-12-29 13:49:34', 'Susanto', '0000-00-00 00:00:00', ''),
(230, '9651270', '77.40', '2021-12-29 13:49:48', 'Susanto', '0000-00-00 00:00:00', ''),
(231, '9651268', '75.60', '2021-12-29 13:50:03', 'Susanto', '0000-00-00 00:00:00', ''),
(232, '9651266', '85.40', '2021-12-29 13:50:13', 'Susanto', '0000-00-00 00:00:00', ''),
(233, '9651264', '81.80', '2021-12-29 13:50:28', 'Susanto', '0000-00-00 00:00:00', ''),
(234, '9651271', '67.20', '2021-12-29 13:50:43', 'Susanto', '0000-00-00 00:00:00', ''),
(235, '9651269', '87.20', '2021-12-29 13:50:54', 'Susanto', '0000-00-00 00:00:00', ''),
(236, '9651267', '77.20', '2021-12-29 13:51:03', 'Susanto', '0000-00-00 00:00:00', ''),
(237, '9651263', '78.60', '2021-12-29 13:51:12', 'Susanto', '0000-00-00 00:00:00', ''),
(238, '9651265', '88.80', '2021-12-29 13:51:25', 'Susanto', '0000-00-00 00:00:00', ''),
(239, '9651273', '73.80', '2022-01-01 05:36:37', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(240, '9651274', '80.00', '2022-01-01 05:50:40', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(241, '9651277', '77.40', '2022-01-01 05:50:52', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(242, '9651276', '87.00', '2022-01-01 05:51:04', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(243, '9651275', '77.60', '2022-01-01 05:51:17', 'Dimas Purnama', '0000-00-00 00:00:00', ''),
(244, '9651275', '88.20', '2022-01-01 05:52:08', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(245, '9651277', '71.20', '2022-01-01 05:52:22', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(246, '9651274', '67.40', '2022-01-01 05:52:35', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(247, '9651273', '69.80', '2022-01-01 05:52:49', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(248, '9651276', '82.20', '2022-01-01 05:53:00', 'Rahmat Irianto', '0000-00-00 00:00:00', ''),
(249, '9651275', '88.20', '2022-01-01 05:57:28', 'Susanto', '0000-00-00 00:00:00', ''),
(250, '9651273', '77.20', '2022-01-01 05:57:39', 'Susanto', '0000-00-00 00:00:00', ''),
(251, '9651274', '74.00', '2022-01-01 05:57:52', 'Susanto', '0000-00-00 00:00:00', ''),
(252, '9651277', '79.60', '2022-01-01 05:58:13', 'Susanto', '0000-00-00 00:00:00', ''),
(253, '9651276', '82.00', '2022-01-01 05:58:27', 'Susanto', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_nilai_pemenang`
--

CREATE TABLE `total_nilai_pemenang` (
  `id_total_nilai_pemenang` int(11) NOT NULL,
  `id_usulan` int(15) NOT NULL,
  `nilai_nominator` varchar(100) NOT NULL,
  `id_penilai` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_usr` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `satuan_kerja` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_usr`, `nama`, `email`, `password`, `satuan_kerja`, `kecamatan`, `hak_akses`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, 'Admin_Bappeda', 'Aktif'),
(148, 'Dimas Purnama', 'dimas@gmail.com', 'bc3e806c4f220f431fd5759102276ea6', NULL, NULL, 'Penilai', 'Aktif'),
(149, 'Susanto', 'susanto@gmail.com', 'c69a3befe078c6c462495f43ebbcf7b3', NULL, NULL, 'Penilai', 'Aktif'),
(150, 'Budiono', 'budiono@gmail.com', '86e97558eff765a7e5b45244a6ab948b', NULL, NULL, 'Penilai', 'Aktif'),
(151, 'Rahmat Irianto', 'rahmat@gmail.com', '8db408665797d49deeda222686763864', NULL, NULL, 'Penilai', 'Aktif'),
(152, 'Joko Santoso', 'joko@gmail.com', '5fde7c05f98e7f4e03ba2bb380ad5783', NULL, NULL, 'Penilai', 'Aktif'),
(153, 'Fajar Rianto', 'fajar@gmail.com', 'b272bec8656a5db3890e803c2baf7cc8', NULL, NULL, 'Penilai', 'Aktif'),
(154, 'Arif Rahman', 'arif@gmail.com', '9c7c0c3dc4de5d3837c61afe457477bb', NULL, NULL, 'Penilai', 'Aktif'),
(155, 'Nizar Futaqi', 'nizar@gmail.com', '6d7c9da89a146216f4f745a3a643c994', NULL, NULL, 'Penilai', 'Aktif'),
(156, 'Hendrik Kuswanto', 'hendrik@gmail.com', '9cd65b048cb0c9a38e7a88b4b85b05c2', NULL, NULL, 'Penilai', 'Aktif'),
(157, 'Dody Eka', 'dody@gmail.com', 'cd28d9ebb483f28832bef49f5f023400', NULL, NULL, 'Peserta', 'Aktif'),
(158, 'Asep Yulianto', 'asep@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(159, 'Deo Adzar', 'deo@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(160, 'Aham Prasetyo', 'aham@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(161, 'Avif Syaifullah', 'avif@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(162, 'Imam Mundzir', 'imam@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(163, 'Ikhwan Rusdiansyah', 'ikhwan@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(164, 'Fathul Ilham', 'ilham@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(165, 'Ridwan Prasetyo', 'ridwan@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Admin_Bappeda', 'Aktif'),
(166, 'Alfian Rizki', 'alfian@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif'),
(167, 'Yusuf Tarmuji', 'yusuf@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', NULL, NULL, 'Peserta', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id` int(11) NOT NULL,
  `user` char(150) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `subevent` char(150) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `judul` char(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `latar_belakang` text NOT NULL,
  `kondisi_sebelumnya` text NOT NULL,
  `sasaran_n_tujuan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `bahan_baku` text NOT NULL,
  `cara_kerja` text NOT NULL,
  `keunggulan` text NOT NULL,
  `hasil_yg_diharapkan` text NOT NULL,
  `manfaat` text NOT NULL,
  `rencana` text NOT NULL,
  `proposal` text NOT NULL,
  `link_video` char(255) NOT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `jurnal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id`, `user`, `id_usr`, `tahun`, `subevent`, `id_subevent`, `judul`, `status`, `latar_belakang`, `kondisi_sebelumnya`, `sasaran_n_tujuan`, `deskripsi`, `bahan_baku`, `cara_kerja`, `keunggulan`, `hasil_yg_diharapkan`, `manfaat`, `rencana`, `proposal`, `link_video`, `gambar`, `jurnal`) VALUES
(9651263, 'Asep Yulianto', 158, '2021', 'Inovasi Teknologi', 51, 'Pakan Ternak dari Limbah', '2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651264, 'Deo Adzar', 159, '2021', 'Inovasi Teknologi', 51, 'Aplikasi Penataan Property Rumah Tangga', '2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651265, 'Aham Prasetyo', 160, '2021', 'Inovasi Teknologi', 51, 'Kopi Biji Rambutan Manis (KOJIRAMA)', '2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651266, 'Avif Syaifullah', 161, '2021', 'Inovasi Teknologi', 51, 'Aplikasi Pemetaan Tempat Parkir', '2', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651267, 'Imam Mundzir', 162, '2021', 'Inovasi Teknologi', 51, 'Absen Online dengan QR Code', '2', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651268, 'Ikhwan Rusdiansyah', 163, '2021', 'Inovasi Teknologi', 51, 'Sistem Pakar Pendeteksi Penyakit Kulit Berbasis Web', '2', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651269, 'Fathul Ilham', 164, '2021', 'Inovasi Teknologi', 51, 'Bahan Bioaktif Obat dari Modifikasi Ramah Lingkungan Bahan Limbah  Kulit Melinjo', '2', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651270, 'Ridwan Prasetyo', 165, '2021', 'Inovasi Teknologi', 51, 'Sistem Monitoring Penggunaan Energi Listrik Secara Real-Time Berbasis Internet', '2', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. ', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf');
INSERT INTO `usulan` (`id`, `user`, `id_usr`, `tahun`, `subevent`, `id_subevent`, `judul`, `status`, `latar_belakang`, `kondisi_sebelumnya`, `sasaran_n_tujuan`, `deskripsi`, `bahan_baku`, `cara_kerja`, `keunggulan`, `hasil_yg_diharapkan`, `manfaat`, `rencana`, `proposal`, `link_video`, `gambar`, `jurnal`) VALUES
(9651271, 'Alfian Rizki', 166, '2021', 'Inovasi Teknologi', 51, 'Deterjen Ramah Lingkungan Berbasis Titania dan Surfaktan Alami', '2', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651272, 'Yusuf Tarmuji', 167, '2021', 'Inovasi Teknologi', 51, 'Biopestisida Organik dari Daun Tembakau', '2', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '0bb49353e36e9422e120a0700ff458aa1.pdf', 'https://youtu.be/MSDz2p_BVjo', '9c21e328806fe945b2364d1486488ce0.png', '0bb49353e36e9422e120a0700ff458aa1.pdf'),
(9651273, 'Asep Yulianto', 158, '2022', 'Inovasi Teknologi', 51, 'Inovasi Test 1', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', '0b6a0cde95402716d2a78efe2f5fabe4.pdf', 'https://youtu.be/ptWgufbjURA', 'ae7c872fd99120d05e48d6dd55b99cea1.png', 'ae7c872fd99120d05e48d6dd55b99cea1.pdf'),
(9651274, 'Deo Adzar', 159, '2022', 'Inovasi Teknologi', 51, 'Inovasi Tes 2', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'd978634d536a8a9bc2f69c3637adcfdb.pdf', 'https://youtu.be/4g_4RDyLmAY', 'd978634d536a8a9bc2f69c3637adcfdb1.png', 'd978634d536a8a9bc2f69c3637adcfdb1.pdf'),
(9651275, 'Aham Prasetyo', 160, '2022', 'Inovasi Teknologi', 51, 'Inovasi Test 3', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'c6f11bf7eb45cd5448f05fdf44d3d97c.pdf', 'https://youtu.be/MHEAKvJSiSk', 'c6f11bf7eb45cd5448f05fdf44d3d97c1.png', 'c6f11bf7eb45cd5448f05fdf44d3d97c1.pdf'),
(9651276, 'Avif Syaifullah', 161, '2022', 'Inovasi Teknologi', 51, 'Inovasi Test 4', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'f0c373f3caea01a9452438437441a877.pdf', 'https://youtu.be/9jrD0wcfq1g', 'f0c373f3caea01a9452438437441a8771.png', 'f0c373f3caea01a9452438437441a8771.pdf'),
(9651277, 'Imam Mundzir', 162, '2022', 'Inovasi Teknologi', 51, 'Inovasi Test 5', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit amet consectetur. Nunc sed augue lacus viverra vitae congue eu. Nunc aliquet bibendum enim facilisis gravida. Elit scelerisque mauris pellentesque pulvinar. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada.', 'f950f786378f2f638ecf58d3c58ca745.pdf', 'https://youtu.be/ptWgufbjURA', 'f950f786378f2f638ecf58d3c58ca7451.png', 'f950f786378f2f638ecf58d3c58ca7451.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita_acara_pemenang`
--
ALTER TABLE `berita_acara_pemenang`
  ADD PRIMARY KEY (`id_berita_acara_pemenang`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  ADD PRIMARY KEY (`id_indikator_penilaian`);

--
-- Indeks untuk tabel `indikator_penilaian_pemenang`
--
ALTER TABLE `indikator_penilaian_pemenang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keterangan_indikator`
--
ALTER TABLE `keterangan_indikator`
  ADD PRIMARY KEY (`id_keterangan_indikator`);

--
-- Indeks untuk tabel `nominator`
--
ALTER TABLE `nominator`
  ADD PRIMARY KEY (`id_nominator`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `penilaian_pemenang`
--
ALTER TABLE `penilaian_pemenang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_proposal`
--
ALTER TABLE `penilaian_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_usulan`
--
ALTER TABLE `penilaian_usulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `setting_penilai`
--
ALTER TABLE `setting_penilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subevent`
--
ALTER TABLE `subevent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `total_nilai`
--
ALTER TABLE `total_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `total_nilai_pemenang`
--
ALTER TABLE `total_nilai_pemenang`
  ADD PRIMARY KEY (`id_total_nilai_pemenang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indeks untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_tim`
--
ALTER TABLE `anggota_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT untuk tabel `berita_acara_pemenang`
--
ALTER TABLE `berita_acara_pemenang`
  MODIFY `id_berita_acara_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  MODIFY `id_indikator_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `indikator_penilaian_pemenang`
--
ALTER TABLE `indikator_penilaian_pemenang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `keterangan_indikator`
--
ALTER TABLE `keterangan_indikator`
  MODIFY `id_keterangan_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `nominator`
--
ALTER TABLE `nominator`
  MODIFY `id_nominator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penilaian_pemenang`
--
ALTER TABLE `penilaian_pemenang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=705;

--
-- AUTO_INCREMENT untuk tabel `penilaian_proposal`
--
ALTER TABLE `penilaian_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT untuk tabel `penilaian_usulan`
--
ALTER TABLE `penilaian_usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=581;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6775543;

--
-- AUTO_INCREMENT untuk tabel `setting_penilai`
--
ALTER TABLE `setting_penilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT untuk tabel `subevent`
--
ALTER TABLE `subevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `total_nilai`
--
ALTER TABLE `total_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT untuk tabel `total_nilai_pemenang`
--
ALTER TABLE `total_nilai_pemenang`
  MODIFY `id_total_nilai_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT untuk tabel `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9651278;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
