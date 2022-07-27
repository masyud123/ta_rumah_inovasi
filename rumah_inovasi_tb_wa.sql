-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 08:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_inovasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pemenang`
--

CREATE TABLE `berita_acara_pemenang` (
  `id_berita_acara_pemenang` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `pemenang` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `id_subevent`, `bidang`, `status`) VALUES
(1, 1, 'Pendidikan', 1),
(2, 1, 'Lingkungan', 1),
(3, 1, 'Kesehatan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event`) VALUES
(1, 'Lomba Inovasi');

-- --------------------------------------------------------

--
-- Table structure for table `formulasi_nilai`
--

CREATE TABLE `formulasi_nilai` (
  `id_formulasi_nilai` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `nilai_makalah` int(11) NOT NULL,
  `nilai_substansi_inovasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formulasi_nilai`
--

INSERT INTO `formulasi_nilai` (`id_formulasi_nilai`, `id_subevent`, `nilai_makalah`, `nilai_substansi_inovasi`) VALUES
(1, 1, 20, 80);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_penilaian`
--

CREATE TABLE `indikator_penilaian` (
  `id_indikator_penilaian` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `indikator` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indikator_penilaian`
--

INSERT INTO `indikator_penilaian` (`id_indikator_penilaian`, `id_subevent`, `indikator`) VALUES
(1, 1, 'Kemudahan Dideseminasikan dan Diadopsi'),
(2, 1, 'Lingkup Inovasi Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `indikator_penilaian_pemenang`
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
-- Dumping data for table `indikator_penilaian_pemenang`
--

INSERT INTO `indikator_penilaian_pemenang` (`id`, `id_subevent`, `komponen`, `nilai_komponen_min`, `nilai_komponen_max`, `note`) VALUES
(1, 1, 'Tingkat Kesiapterapan', 0, 20, 'Alat dapat dimanfaatkan'),
(2, 1, 'Kebaruan/Inovasi/Kreativitas', 0, 10, 'Kriteria ini terkait dengan kebaruan ide'),
(3, 1, 'Potensi keberlanjutan/ Komersialisasi', 0, 25, 'Terkait potensi dapat dikembangkan lebih lanjut'),
(4, 1, 'Keunikan daya jual', 0, 15, 'Kriteria berkaitan dengan keunikan'),
(5, 1, 'Tingkat Kemanfaatan', 0, 30, 'Terkait dengan daya ungkit potensi kemanfaatan');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_indikator`
--

CREATE TABLE `keterangan_indikator` (
  `id_keterangan_indikator` int(11) NOT NULL,
  `id_indikator_penilaian` int(11) NOT NULL,
  `keterangan` char(255) NOT NULL,
  `nilai_minimal_keterangan` int(3) NOT NULL,
  `nilai_maksimal_keterangan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterangan_indikator`
--

INSERT INTO `keterangan_indikator` (`id_keterangan_indikator`, `id_indikator_penilaian`, `keterangan`, `nilai_minimal_keterangan`, `nilai_maksimal_keterangan`) VALUES
(1, 2, 'Lingkup berskala lokal', 0, 10),
(2, 2, 'Lingkup berskala provinsi', 11, 20),
(3, 2, 'Lingkup berskala nasional', 21, 30),
(4, 1, 'Sangat sulit', 0, 10),
(5, 1, 'Agak sulit', 11, 20),
(6, 1, 'Agak mudah', 21, 30),
(7, 1, 'Mudah', 31, 40);

-- --------------------------------------------------------

--
-- Table structure for table `nominator`
--

CREATE TABLE `nominator` (
  `id_nominator` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
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

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_pemenang`
--

CREATE TABLE `penilaian_pemenang` (
  `id` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `id_penilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_proposal`
--

CREATE TABLE `penilaian_proposal` (
  `id` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `nilai_proposal` varchar(10) NOT NULL,
  `id_penilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_usulan`
--

CREATE TABLE `penilaian_usulan` (
  `id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `id_penilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `kategori_peserta` varchar(10) NOT NULL,
  `interaksi` varchar(10) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nama_ketua` char(50) NOT NULL,
  `email_ketua` char(50) NOT NULL,
  `alamat_ketua` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `asal_sekolah` char(50) NOT NULL,
  `nama_tim` char(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_penilai`
--

CREATE TABLE `setting_penilai` (
  `id` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subevent`
--

CREATE TABLE `subevent` (
  `id` int(11) NOT NULL,
  `tahun` int(10) NOT NULL,
  `id_event` int(150) NOT NULL,
  `subevent` varchar(50) NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `status_pendaftaran` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subevent`
--

INSERT INTO `subevent` (`id`, `tahun`, `id_event`, `subevent`, `mulai`, `akhir`, `status_pendaftaran`) VALUES
(1, 2022, 1, 'Inovasi Teknologi', '2022-05-20', '2022-06-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `total_nilai`
--

CREATE TABLE `total_nilai` (
  `id` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `nilai_verifikasi` varchar(10) NOT NULL,
  `id_penilai` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `total_nilai_pemenang`
--

CREATE TABLE `total_nilai_pemenang` (
  `id_total_nilai_pemenang` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `nilai_nominator` varchar(11) NOT NULL,
  `id_penilai` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_usulan`
--

CREATE TABLE `ulasan_usulan` (
  `id_ulasan` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_penilai` int(11) NOT NULL,
  `ulasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_usr` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `hak_akses` varchar(13) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_usr`, `nama`, `email`, `password`, `no_wa`, `hak_akses`, `status`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', '081553572412', 'Admin_Bappeda', 1, '2022-05-10'),
(2, 'Agung Arisanto', 'agung@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-11'),
(3, 'Nur Habib', 'nur@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-11'),
(4, 'Mamad', 'mamad@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-11'),
(5, 'Dimas Purnama', 'dimas@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(6, 'Susanto', 'susanto@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(7, 'Budiono', 'budiono@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(8, 'Rahmat', 'rahmat@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(9, 'Joko Prawito', 'joko@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(10, 'Kuswanto', 'kuswanto@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(11, 'Suwarni', 'suwarni@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(12, 'Dodik Prayoga', 'dodik@gmail.com', 'f782cdbaf4f3b7880b52a2f19e192260', '081553572412', 'Penilai', 1, '2022-06-29'),
(13, 'Rizki', 'rizki@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(14, 'Alfian', 'alfian@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(15, 'Ridwan', 'ridwan@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(16, 'Ilham', 'ilham@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(17, 'Ikhwan', 'ikhwan@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(18, 'Imam Mundzir', 'imam@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(19, 'Avif Syaifullah', 'avif@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(20, 'Aham Prasetyo', 'aham@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30'),
(21, 'Asep Yulianto', 'asep@gmail.com', 'ceb7769d1cd542c95c7037db55f8b75b', '081553572412', 'Peserta', 1, '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE `usulan` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
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
  `proposal` varchar(50) NOT NULL,
  `jurnal` varchar(50) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `link_video` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp`
--

CREATE TABLE `whatsapp` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `whatsapp`
--

INSERT INTO `whatsapp` (`id`, `username`, `token`) VALUES
(1, 'ahmad', 'qZ4zzXHtM8WwlyDYhpj7lFWtRF9PQggq3hTK4PhjDZifOw5IUQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `berita_acara_pemenang`
--
ALTER TABLE `berita_acara_pemenang`
  ADD PRIMARY KEY (`id_berita_acara_pemenang`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `id_subevent` (`id_subevent`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subevent` (`id_subevent`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulasi_nilai`
--
ALTER TABLE `formulasi_nilai`
  ADD PRIMARY KEY (`id_formulasi_nilai`),
  ADD KEY `id_subevent` (`id_subevent`);

--
-- Indexes for table `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  ADD PRIMARY KEY (`id_indikator_penilaian`),
  ADD KEY `id_subevent` (`id_subevent`);

--
-- Indexes for table `indikator_penilaian_pemenang`
--
ALTER TABLE `indikator_penilaian_pemenang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subevent` (`id_subevent`);

--
-- Indexes for table `keterangan_indikator`
--
ALTER TABLE `keterangan_indikator`
  ADD PRIMARY KEY (`id_keterangan_indikator`),
  ADD KEY `id_indikator_penilaian` (`id_indikator_penilaian`);

--
-- Indexes for table `nominator`
--
ALTER TABLE `nominator`
  ADD PRIMARY KEY (`id_nominator`),
  ADD KEY `id_usulan` (`id_usulan`),
  ADD KEY `id_subevent` (`id_subevent`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `penilaian_pemenang`
--
ALTER TABLE `penilaian_pemenang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_penilai` (`id_penilai`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indexes for table `penilaian_proposal`
--
ALTER TABLE `penilaian_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usulan` (`id_usulan`),
  ADD KEY `id_penilai` (`id_penilai`);

--
-- Indexes for table `penilaian_usulan`
--
ALTER TABLE `penilaian_usulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_penilai` (`id_penilai`),
  ADD KEY `usulan_id` (`usulan_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_usulan` (`id_usulan`),
  ADD KEY `id_usr` (`id_usr`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `setting_penilai`
--
ALTER TABLE `setting_penilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subevent` (`id_subevent`),
  ADD KEY `id_usr` (`id_usr`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `subevent`
--
ALTER TABLE `subevent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `total_nilai`
--
ALTER TABLE `total_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penilai` (`id_penilai`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indexes for table `total_nilai_pemenang`
--
ALTER TABLE `total_nilai_pemenang`
  ADD PRIMARY KEY (`id_total_nilai_pemenang`),
  ADD KEY `id_penilai` (`id_penilai`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indexes for table `ulasan_usulan`
--
ALTER TABLE `ulasan_usulan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_usulan` (`id_usulan`),
  ADD KEY `id_penilai` (`id_penilai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subevent` (`id_subevent`);

--
-- Indexes for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `berita_acara_pemenang`
--
ALTER TABLE `berita_acara_pemenang`
  MODIFY `id_berita_acara_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formulasi_nilai`
--
ALTER TABLE `formulasi_nilai`
  MODIFY `id_formulasi_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  MODIFY `id_indikator_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `indikator_penilaian_pemenang`
--
ALTER TABLE `indikator_penilaian_pemenang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keterangan_indikator`
--
ALTER TABLE `keterangan_indikator`
  MODIFY `id_keterangan_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nominator`
--
ALTER TABLE `nominator`
  MODIFY `id_nominator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_pemenang`
--
ALTER TABLE `penilaian_pemenang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penilaian_proposal`
--
ALTER TABLE `penilaian_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilaian_usulan`
--
ALTER TABLE `penilaian_usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_penilai`
--
ALTER TABLE `setting_penilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subevent`
--
ALTER TABLE `subevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total_nilai`
--
ALTER TABLE `total_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `total_nilai_pemenang`
--
ALTER TABLE `total_nilai_pemenang`
  MODIFY `id_total_nilai_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulasan_usulan`
--
ALTER TABLE `ulasan_usulan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD CONSTRAINT `anggota_tim_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`);

--
-- Constraints for table `berita_acara_pemenang`
--
ALTER TABLE `berita_acara_pemenang`
  ADD CONSTRAINT `berita_acara_pemenang_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_usr`),
  ADD CONSTRAINT `berita_acara_pemenang_ibfk_2` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`),
  ADD CONSTRAINT `berita_acara_pemenang_ibfk_3` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`);

--
-- Constraints for table `bidang`
--
ALTER TABLE `bidang`
  ADD CONSTRAINT `bidang_ibfk_1` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`);

--
-- Constraints for table `formulasi_nilai`
--
ALTER TABLE `formulasi_nilai`
  ADD CONSTRAINT `formulasi_nilai_ibfk_1` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`);

--
-- Constraints for table `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  ADD CONSTRAINT `indikator_penilaian_ibfk_1` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`);

--
-- Constraints for table `indikator_penilaian_pemenang`
--
ALTER TABLE `indikator_penilaian_pemenang`
  ADD CONSTRAINT `indikator_penilaian_pemenang_ibfk_1` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`);

--
-- Constraints for table `keterangan_indikator`
--
ALTER TABLE `keterangan_indikator`
  ADD CONSTRAINT `keterangan_indikator_ibfk_1` FOREIGN KEY (`id_indikator_penilaian`) REFERENCES `indikator_penilaian` (`id_indikator_penilaian`);

--
-- Constraints for table `nominator`
--
ALTER TABLE `nominator`
  ADD CONSTRAINT `nominator_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`),
  ADD CONSTRAINT `nominator_ibfk_2` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`),
  ADD CONSTRAINT `nominator_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_usr`);

--
-- Constraints for table `penilaian_pemenang`
--
ALTER TABLE `penilaian_pemenang`
  ADD CONSTRAINT `penilaian_pemenang_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator_penilaian_pemenang` (`id`),
  ADD CONSTRAINT `penilaian_pemenang_ibfk_2` FOREIGN KEY (`id_penilai`) REFERENCES `user` (`id_usr`),
  ADD CONSTRAINT `penilaian_pemenang_ibfk_3` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`);

--
-- Constraints for table `penilaian_proposal`
--
ALTER TABLE `penilaian_proposal`
  ADD CONSTRAINT `penilaian_proposal_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`),
  ADD CONSTRAINT `penilaian_proposal_ibfk_2` FOREIGN KEY (`id_penilai`) REFERENCES `user` (`id_usr`);

--
-- Constraints for table `penilaian_usulan`
--
ALTER TABLE `penilaian_usulan`
  ADD CONSTRAINT `penilaian_usulan_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator_penilaian` (`id_indikator_penilaian`),
  ADD CONSTRAINT `penilaian_usulan_ibfk_2` FOREIGN KEY (`id_penilai`) REFERENCES `user` (`id_usr`),
  ADD CONSTRAINT `penilaian_usulan_ibfk_3` FOREIGN KEY (`usulan_id`) REFERENCES `usulan` (`id`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`),
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`id_usr`) REFERENCES `user` (`id_usr`),
  ADD CONSTRAINT `peserta_ibfk_3` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id`);

--
-- Constraints for table `setting_penilai`
--
ALTER TABLE `setting_penilai`
  ADD CONSTRAINT `setting_penilai_ibfk_1` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`),
  ADD CONSTRAINT `setting_penilai_ibfk_2` FOREIGN KEY (`id_usr`) REFERENCES `user` (`id_usr`),
  ADD CONSTRAINT `setting_penilai_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_usr`);

--
-- Constraints for table `subevent`
--
ALTER TABLE `subevent`
  ADD CONSTRAINT `subevent_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`);

--
-- Constraints for table `total_nilai`
--
ALTER TABLE `total_nilai`
  ADD CONSTRAINT `total_nilai_ibfk_1` FOREIGN KEY (`id_penilai`) REFERENCES `user` (`id_usr`),
  ADD CONSTRAINT `total_nilai_ibfk_2` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`);

--
-- Constraints for table `total_nilai_pemenang`
--
ALTER TABLE `total_nilai_pemenang`
  ADD CONSTRAINT `total_nilai_pemenang_ibfk_1` FOREIGN KEY (`id_penilai`) REFERENCES `user` (`id_usr`),
  ADD CONSTRAINT `total_nilai_pemenang_ibfk_2` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`);

--
-- Constraints for table `ulasan_usulan`
--
ALTER TABLE `ulasan_usulan`
  ADD CONSTRAINT `ulasan_usulan_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id`),
  ADD CONSTRAINT `ulasan_usulan_ibfk_2` FOREIGN KEY (`id_penilai`) REFERENCES `user` (`id_usr`);

--
-- Constraints for table `usulan`
--
ALTER TABLE `usulan`
  ADD CONSTRAINT `usulan_ibfk_1` FOREIGN KEY (`id_subevent`) REFERENCES `subevent` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
