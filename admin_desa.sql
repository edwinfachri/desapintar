-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2017 at 11:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_rencana_anggaran_biaya`
--

CREATE TABLE `buku_rencana_anggaran_biaya` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `induk_penduduk`
--

CREATE TABLE `induk_penduduk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stat_kawin` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_lahir` date NOT NULL,
  `pendidikan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baca_huruf` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ked_keluarga` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ket_tidak_mampu`
--

CREATE TABLE `ket_tidak_mampu` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelamin` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_berlaku_start` date NOT NULL,
  `masa_berlaku_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(218, '2017_05_28_090356_create_induk_penduduk_table', 1),
(219, '2017_05_28_091559_create_tanda_penduduk_table', 1),
(220, '2017_05_28_092226_create_mutasi_penduduk_table', 1),
(221, '2017_05_28_092612_create_penduduk_sementara_table', 1),
(222, '2017_05_28_093428_create_rekapitulasi_penduduk_table', 1),
(223, '2017_06_21_121554_create_rencana_anggaran_biaya_table', 1),
(224, '2017_06_21_155832_create_profil_desa_table', 1),
(225, '2017_07_25_100732_create_ket_tidak_mampu_table', 1),
(226, '2017_08_03_080633_create_ref_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_penduduk`
--

CREATE TABLE `mutasi_penduduk` (
  `id` int(10) UNSIGNED NOT NULL,
  `induk_penduduk_id` int(10) UNSIGNED NOT NULL,
  `datang_dari` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_datang` date NOT NULL,
  `pindah_ke` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_pindah` date NOT NULL,
  `meninggal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_meninggal` date NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_sementara`
--

CREATE TABLE `penduduk_sementara` (
  `id` int(10) UNSIGNED NOT NULL,
  `induk_penduduk_id` int(10) UNSIGNED NOT NULL,
  `tanda_pengenal` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebangsaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keturunan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datang_dari` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_datang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_datang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_datang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_datang` date NOT NULL,
  `tg_pergi` date NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik_kepala_desa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_sekretaris_desa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekretaris_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE `ref` (
  `id` int(10) UNSIGNED NOT NULL,
  `refid` int(11) NOT NULL,
  `refno` int(11) NOT NULL,
  `reftext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref`
--

INSERT INTO `ref` (`id`, `refid`, `refno`, `reftext`) VALUES
(1, 1, 1, 'Laki-laki'),
(2, 1, 2, 'Perempuan'),
(3, 2, 1, 'Islam'),
(4, 2, 2, 'Katolik'),
(5, 2, 3, 'Protestan'),
(6, 2, 4, 'Hindu'),
(7, 2, 5, 'Budha'),
(8, 2, 6, 'Konghucu'),
(9, 2, 7, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `rekapitulasi_penduduk`
--

CREATE TABLE `rekapitulasi_penduduk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_dusun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_awal_wna_l` int(11) NOT NULL,
  `jml_awal_wna_p` int(11) NOT NULL,
  `jml_awal_wni_l` int(11) NOT NULL,
  `jml_awal_wni_p` int(11) NOT NULL,
  `jml_awal_penduduk` int(11) NOT NULL,
  `jml_awal_keluarga` int(11) NOT NULL,
  `jml_awal_jiwa` int(11) NOT NULL,
  `tambah_lhr_wna_l` int(11) NOT NULL,
  `tambah_lhr_wna_p` int(11) NOT NULL,
  `tambah_lhr_wni_l` int(11) NOT NULL,
  `tambah_lhr_wni_p` int(11) NOT NULL,
  `tambah_dtg_wna_l` int(11) NOT NULL,
  `tambah_dtg_wna_p` int(11) NOT NULL,
  `tambah_dtg_wni_l` int(11) NOT NULL,
  `tambah_dtg_wni_p` int(11) NOT NULL,
  `kurang_mati_wna_l` int(11) NOT NULL,
  `kurang_mati_wna_p` int(11) NOT NULL,
  `kurang_mati_wni_l` int(11) NOT NULL,
  `kurang_mati_wni_p` int(11) NOT NULL,
  `kurang_pergi_wna_l` int(11) NOT NULL,
  `kurang_pergi_wna_p` int(11) NOT NULL,
  `kurang_pergi_wni_l` int(11) NOT NULL,
  `kurang_pergi_wni_p` int(11) NOT NULL,
  `jml_akhir_wna_l` int(11) NOT NULL,
  `jml_akhir_wna_p` int(11) NOT NULL,
  `jml_akhir_wni_l` int(11) NOT NULL,
  `jml_akhir_wni_p` int(11) NOT NULL,
  `jml_akhir_kk` int(11) NOT NULL,
  `jml_akhir_keluarga` int(11) NOT NULL,
  `jml_akhir_jiwa` int(11) NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_anggaran_biaya`
--

CREATE TABLE `rencana_anggaran_biaya` (
  `id` int(10) UNSIGNED NOT NULL,
  `buku_rencana_anggaran_biaya_id` int(10) UNSIGNED NOT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanda_penduduk`
--

CREATE TABLE `tanda_penduduk` (
  `id` int(10) UNSIGNED NOT NULL,
  `induk_penduduk_id` int(10) UNSIGNED NOT NULL,
  `gol_darah` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_dikeluarkan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_dikeluarkan` date NOT NULL,
  `ortu_ayah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ortu_ibu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tg_tinggal_desa` date NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `secret_question`, `secret_answer`, `created_at`, `updated_at`) VALUES
(1, 'edwin', 'fachrifachrifachri@gmail.com', '$2y$10$0Kv.E8AtC4eyQYxqbIXSXuyA4XZe3rZk0yv5UwnvaAof8ruJRhhDG', 't6ZAm9X4lA2orTAy02bUlkkTs2pTrS37ATQWOqc4hUh2gNEnGRsnZBAIo3Hi', NULL, NULL, '2017-06-20 21:58:17', '2017-06-20 21:58:17'),
(2, 'faldi', 'faldi@decidea.com', '$2y$10$qBJZ.N.TakXvNX.Aljymcu0tAILvK8TNHV5h3S2ayoAYmEKmGOjCy', 'tB1i8lULKBH6IvoHCyAwPwT9Qb95uGHDDk7fJfo1YE9j8HcF479CNJOW8q51', NULL, NULL, '2017-07-02 08:24:39', '2017-07-02 08:24:39'),
(3, '1234', '1234@admin.com', '$2y$10$tqjGUUzgyPSChhvTJuWIbutH19rJEpAPyAFYQLVqb7JuiuB3ksMXW', NULL, NULL, NULL, '2017-07-02 09:00:12', '2017-07-02 09:00:12'),
(4, 'copoe2010', 'copoe2010', '$2y$10$TuEL7skJ5CYpX8iRhWkRf.MYLqRK0MqXx8YXCCBwAqT0feRYwLn86', 'DQ3MsC95xczq9FhdNA4RSv4rXXOLIPAko7na9GxY6eTRY5wIJoqoa5tdMhCy', NULL, NULL, '2017-07-28 06:23:49', '2017-07-28 06:23:49'),
(5, 'coba', 'coba', '$2y$10$trOr8b7lxZbzvWkVBaATf.gK6AuOlgv0N8Uve5jnZET/e68zJ0bBu', '1OQptM8KBUmKLxjYR6YU1KeqftHVJtxlcf4Pc4xNtePCey3EYzeSO51nWNEz', NULL, NULL, '2017-07-28 06:24:50', '2017-07-28 06:24:50'),
(6, '123456', '123456', '$2y$10$hFn4rszwC8IWvw.xLypF0.84hnVVrEo4WQiOYJtEdUzAmxWkmfdz6', 'D6FWeNxBxpRQ15TMbxyZaUPkVZZN96MA1hfKCKAbs8tFw3pnUzGBy7ScydA3', '$2y$10$3lZ/YKra5R/rB1/9rfFVpO1qkA6wcYWCJIZLPj.CHXmyBlF4Rpeie', '$2y$10$SFt6JJ231vTB4WluMlv8FueGlJawouXSb8Qw7ZYBn69zZsRUVv/5.', '2017-07-28 06:26:17', '2017-07-28 06:26:17'),
(7, 'edwin', 'edwin', '$2y$10$cprGcRSmV6kn1FPRGu/1lumBxKTkjN4/B18Fuc2xvwCa8H5i2YSXS', 'EP1fpMl9PXBwXyZeuWFOLfWm7NAzAVFZNPJI2sXa2Otq3kTisrozASRRRSzS', 'nama orang tua', '$2y$10$Y4Yd7GOY8FMlFL6FU6owq.l8WQAB0qOpuY1D3jVWMf0HfI9rrChey', '2017-07-28 22:21:08', '2017-07-28 22:21:08'),
(8, 'zxcvbn', 'zxcvbn', '$2y$10$B0uzxuqodok6cbYS7kbqEeYRm3IDIxY2c5W4bc9lmTwM4aLskBWsO', 'o0n0EfFmslL8ihbPcYVMjt6BnTE6s8aCrfL4EEc0w1IUmoznc3xRzPYkJcgL', 'zxcvbn', '$2y$10$.a/g5yjhgpaojhkwb0gi3ozdyyqswinvejqswyyqejgzhsd7o9lxg', '2017-07-29 00:13:09', '2017-07-29 00:13:09'),
(9, '111111', '111111', '$2y$10$OmReccEF.70iVET9LTMqv.kHp/DtE648hq/PwhjlYpI1JHU7NYP/q', 'j841iclqNbVYeHCmbIJqEo2BB0PQlrHc06M9rIStfemo7GyvlkhLQM5ADHx4', '111111', '$2y$10$zi81z/uizuv3288byve2f.nnj2l8rjkauk9/e4dnwnudwio3cyjdk', '2017-07-29 00:42:35', '2017-07-29 00:42:35'),
(10, '222222', '222222', '$2y$10$QfxZxvC.W3y.AebBBcV8oegGSVkHXbioIy/GpDyGuh0289qir9V/O', 'IQHDIRxZdD44oPBZgKaB2MDdQP7dH5cmJytbz3iGel1etHBtyGboOq3ZoDnc', '222222', '$2y$10$zusom4Cf1L.FVL1186g5zeYH09a03AYs5VInj0mzGCbuKJwcZ.AqC', '2017-07-29 00:57:51', '2017-07-29 01:33:32'),
(11, 'coba', 'cobaed', '$2y$10$bVIteKrX5CUsTD3pKsPMl..W8N.lTYY8tne95cV3uUu1w1/ObdLF.', NULL, 'nama', '$2y$10$X7KRztjXJlWzhy/SDfFGoetF1z20eTcqeHTCo4vk3u32MYhmz8K0a', '2017-08-02 01:34:15', '2017-08-02 01:34:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_rencana_anggaran_biaya`
--
ALTER TABLE `buku_rencana_anggaran_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `induk_penduduk`
--
ALTER TABLE `induk_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ket_tidak_mampu`
--
ALTER TABLE `ket_tidak_mampu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_penduduk`
--
ALTER TABLE `mutasi_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutasi_penduduk_induk_penduduk_id_foreign` (`induk_penduduk_id`);

--
-- Indexes for table `penduduk_sementara`
--
ALTER TABLE `penduduk_sementara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penduduk_sementara_induk_penduduk_id_foreign` (`induk_penduduk_id`);

--
-- Indexes for table `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapitulasi_penduduk`
--
ALTER TABLE `rekapitulasi_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana_anggaran_biaya`
--
ALTER TABLE `rencana_anggaran_biaya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rencana_anggaran_biaya_buku_rencana_anggaran_biaya_id_foreign` (`buku_rencana_anggaran_biaya_id`);

--
-- Indexes for table `tanda_penduduk`
--
ALTER TABLE `tanda_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanda_penduduk_induk_penduduk_id_foreign` (`induk_penduduk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_rencana_anggaran_biaya`
--
ALTER TABLE `buku_rencana_anggaran_biaya`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `induk_penduduk`
--
ALTER TABLE `induk_penduduk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ket_tidak_mampu`
--
ALTER TABLE `ket_tidak_mampu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
--
-- AUTO_INCREMENT for table `mutasi_penduduk`
--
ALTER TABLE `mutasi_penduduk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penduduk_sementara`
--
ALTER TABLE `penduduk_sementara`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rekapitulasi_penduduk`
--
ALTER TABLE `rekapitulasi_penduduk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rencana_anggaran_biaya`
--
ALTER TABLE `rencana_anggaran_biaya`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tanda_penduduk`
--
ALTER TABLE `tanda_penduduk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mutasi_penduduk`
--
ALTER TABLE `mutasi_penduduk`
  ADD CONSTRAINT `mutasi_penduduk_induk_penduduk_id_foreign` FOREIGN KEY (`induk_penduduk_id`) REFERENCES `induk_penduduk` (`id`);

--
-- Constraints for table `penduduk_sementara`
--
ALTER TABLE `penduduk_sementara`
  ADD CONSTRAINT `penduduk_sementara_induk_penduduk_id_foreign` FOREIGN KEY (`induk_penduduk_id`) REFERENCES `induk_penduduk` (`id`);

--
-- Constraints for table `rencana_anggaran_biaya`
--
ALTER TABLE `rencana_anggaran_biaya`
  ADD CONSTRAINT `rencana_anggaran_biaya_buku_rencana_anggaran_biaya_id_foreign` FOREIGN KEY (`buku_rencana_anggaran_biaya_id`) REFERENCES `buku_rencana_anggaran_biaya` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tanda_penduduk`
--
ALTER TABLE `tanda_penduduk`
  ADD CONSTRAINT `tanda_penduduk_induk_penduduk_id_foreign` FOREIGN KEY (`induk_penduduk_id`) REFERENCES `induk_penduduk` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
