-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lar11-ga-penjadwalan
CREATE DATABASE IF NOT EXISTS `lar11-ga-penjadwalan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lar11-ga-penjadwalan`;

-- Dumping structure for table lar11-ga-penjadwalan.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.cache: ~0 rows (approximately)

-- Dumping structure for table lar11-ga-penjadwalan.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.cache_locks: ~0 rows (approximately)

-- Dumping structure for table lar11-ga-penjadwalan.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.dosen: ~24 rows (approximately)
INSERT INTO `dosen` (`id`, `nip`, `nama`, `created_at`, `updated_at`) VALUES
	(1, '197806212006041002', 'Cokorda Rai Adi Pramatha, S.T., M.M., Ph.D', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(2, '197404071998022001', 'Dr. Anak Agung Istri Ngurah Eka Karyawati, S.Si., M.Eng.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(3, '198212202008011008', 'I Made Widiartha, S.Si., M. Kom', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(4, '196401141994022001', 'Dr. Dra. Luh Gede Astuti, M.Kom.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(5, '196704141992031002', 'Dr. Drs. I Wayan Santiyasa,M.Si.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(6, '197511052005011004', 'I Made Widhi Wirawan, S.Si., M.Si., M.Cs.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(7, '1984082920181113001', 'I Wayan Supriana, S.Si., M.Cs.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(8, '1985091920181113001', 'Dr. Made Agung Raharja, S.Si., M.Cs.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(9, '197511052005011004', 'I Gusti Ngurah Anom Cahyadi Putra, ST., M.Cs', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(10, '197803212005011001', 'Dr. Ir. Ngurah Agus Sanjaya ER, S.Kom., M.Kom.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(11, '198012062006041003', 'I Gede Santi Astawa, S.T., M.Cs.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(12, '198209182008122002', 'Luh Arida Ayu Rahning Putri, S.Kom., M.Cs.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(13, '198310222008121001', 'I Gede Arta Wibawa, S.T., M.Kom.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(14, '197201102008121001', 'Dr. Ir. I Ketut Gede Suhartana, S.Kom., M.Kom., IPM., ASEAN.Eng', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(15, '198901272012121001', 'I Dewa Made Bayu Atmaja Darmawan,S.Kom.,M.Cs.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(16, '198812282014041001', 'I Putu Gede Hendra Suputra, S.Kom.,M.Kom.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(17, '198501302015041003', 'Ir. I Gusti Agung Gede Arya Kadyanan, S.Kom, M.Kom', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(18, '198703172022031001', 'I Gede Surya Rahayuda, M.Kom.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(19, '199006062022032009', 'Gst. Ayu Vida Mastrika Giri, S.Kom., M.Cs.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(20, '198912262022032008', 'Ida Ayu Gde Suwiprabayanti Putra, S.Kom., M.T.', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(21, '000000000000000000', 'DSN29', NULL, NULL),
	(22, '000000000000000000', 'DSN27', NULL, NULL),
	(23, '000000000000000000', 'DSN28', NULL, NULL),
	(24, '000000000000000000', 'PUTU PRABA SANTIKA, S.KOM., M.KOM', NULL, NULL),
	(25, '000000000000000000', 'I PUTU SATWIKA, S.KOM., M.KOM', NULL, NULL);

-- Dumping structure for table lar11-ga-penjadwalan.hari
CREATE TABLE IF NOT EXISTS `hari` (
  `kode` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.hari: ~5 rows (approximately)
INSERT INTO `hari` (`kode`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'Senin', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(2, 'Selasa', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(3, 'Rabu', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(4, 'Kamis', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(5, 'Jumat', '2024-09-10 06:45:30', '2024-09-10 06:45:30');

-- Dumping structure for table lar11-ga-penjadwalan.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pengajar` bigint unsigned NOT NULL,
  `id_hari` bigint unsigned NOT NULL,
  `id_jam` bigint unsigned NOT NULL,
  `ruang_kelas` bigint unsigned NOT NULL,
  `tipe` int DEFAULT NULL,
  `value` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_id_hari_foreign` (`id_hari`),
  KEY `jadwal_id_jam_foreign` (`id_jam`),
  KEY `jadwal_ruang_kelas_foreign` (`ruang_kelas`),
  KEY `jadwal_id_pengajar_foreign` (`id_pengajar`),
  CONSTRAINT `jadwal_id_hari_foreign` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`kode`),
  CONSTRAINT `jadwal_id_jam_foreign` FOREIGN KEY (`id_jam`) REFERENCES `jam` (`id`),
  CONSTRAINT `jadwal_ruang_kelas_foreign` FOREIGN KEY (`ruang_kelas`) REFERENCES `ruangan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1329 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.jadwal: ~128 rows (approximately)
INSERT INTO `jadwal` (`id`, `id_pengajar`, `id_hari`, `id_jam`, `ruang_kelas`, `tipe`, `value`, `created_at`, `updated_at`) VALUES
	(1, 350, 1, 2, 11, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(2, 351, 2, 1, 11, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(3, 352, 3, 1, 9, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(4, 353, 4, 3, 7, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(5, 354, 2, 1, 3, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(6, 355, 3, 3, 9, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(7, 356, 1, 3, 3, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(8, 357, 2, 3, 5, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(9, 358, 3, 3, 10, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(10, 359, 1, 1, 9, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(11, 360, 4, 2, 12, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(12, 361, 3, 2, 10, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(13, 362, 3, 2, 11, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(14, 363, 3, 1, 4, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(15, 364, 2, 2, 1, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(16, 365, 2, 3, 4, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(17, 366, 3, 2, 7, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(18, 367, 4, 2, 9, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(19, 368, 4, 1, 9, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(20, 369, 2, 2, 5, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(21, 370, 4, 3, 5, 1, 1, '2024-11-13 09:15:49', '2024-11-13 09:17:05'),
	(22, 371, 4, 2, 1, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(23, 372, 3, 1, 2, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(24, 373, 2, 3, 13, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(25, 374, 4, 3, 6, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(26, 375, 4, 1, 5, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:10'),
	(27, 376, 3, 2, 4, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(28, 377, 2, 1, 10, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(29, 378, 1, 3, 12, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(30, 379, 1, 1, 6, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(31, 380, 2, 3, 1, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(32, 381, 3, 2, 13, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(33, 382, 1, 1, 10, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(34, 383, 4, 1, 3, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(35, 384, 2, 3, 8, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(36, 385, 2, 2, 8, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:10'),
	(37, 386, 1, 3, 10, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(38, 387, 1, 1, 11, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(39, 388, 1, 2, 8, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(40, 389, 3, 1, 8, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(41, 390, 4, 2, 8, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(42, 391, 3, 1, 13, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(43, 392, 3, 2, 3, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(44, 393, 2, 2, 10, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(45, 394, 4, 3, 1, 1, 1, '2024-11-13 09:15:50', '2024-11-13 09:17:05'),
	(46, 395, 4, 1, 6, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(47, 396, 3, 2, 8, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(48, 397, 4, 3, 2, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(49, 398, 3, 3, 8, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(50, 399, 1, 2, 9, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(51, 400, 1, 3, 9, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(52, 401, 4, 2, 6, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(53, 402, 1, 1, 3, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(54, 403, 4, 1, 10, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(55, 404, 1, 2, 12, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(56, 405, 4, 1, 7, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(57, 406, 4, 2, 7, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(58, 407, 1, 3, 13, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(59, 408, 4, 1, 13, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(60, 409, 1, 3, 1, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(61, 410, 4, 3, 9, 1, 1, '2024-11-13 09:15:51', '2024-11-13 09:17:05'),
	(62, 411, 3, 3, 12, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(63, 412, 1, 1, 7, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(64, 413, 1, 2, 6, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(65, 414, 2, 3, 10, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(66, 415, 2, 1, 4, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(67, 416, 4, 2, 5, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(68, 417, 3, 1, 7, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(69, 418, 2, 2, 4, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(70, 419, 2, 3, 9, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(71, 420, 4, 3, 10, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(72, 421, 1, 2, 4, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(73, 422, 4, 1, 2, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(74, 423, 2, 1, 7, 1, 1, '2024-11-13 09:15:52', '2024-11-13 09:17:05'),
	(75, 424, 3, 3, 13, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(76, 425, 4, 3, 12, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(77, 426, 3, 3, 2, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(78, 427, 2, 2, 12, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(79, 428, 1, 3, 11, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(80, 429, 3, 1, 5, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(81, 430, 2, 1, 8, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(82, 431, 4, 3, 11, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(83, 432, 2, 3, 3, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(84, 433, 1, 1, 2, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(85, 434, 1, 2, 13, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(86, 435, 2, 2, 3, 1, 1, '2024-11-13 09:15:53', '2024-11-13 09:17:05'),
	(87, 436, 4, 2, 13, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(88, 437, 4, 1, 1, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(89, 438, 2, 2, 6, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(90, 439, 1, 3, 2, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(91, 440, 1, 2, 3, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(92, 441, 3, 1, 10, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(93, 442, 3, 2, 6, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(94, 443, 3, 3, 7, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(95, 444, 1, 3, 7, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(96, 445, 3, 3, 4, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(97, 446, 3, 1, 12, 1, 1, '2024-11-13 09:15:54', '2024-11-13 09:17:05'),
	(98, 447, 4, 3, 4, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(99, 448, 1, 3, 8, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(100, 449, 2, 3, 7, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(101, 450, 3, 2, 1, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(102, 451, 3, 3, 1, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(103, 452, 2, 3, 11, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(104, 453, 2, 2, 7, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(105, 454, 4, 3, 8, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(106, 455, 1, 3, 6, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(107, 456, 3, 1, 11, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(108, 457, 2, 1, 13, 1, 1, '2024-11-13 09:15:55', '2024-11-13 09:17:05'),
	(109, 458, 4, 2, 2, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(110, 459, 1, 1, 12, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(111, 460, 2, 1, 2, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(112, 461, 4, 1, 12, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(113, 462, 2, 2, 9, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:10'),
	(114, 463, 1, 2, 7, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(115, 464, 4, 1, 8, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(116, 465, 4, 2, 4, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(117, 466, 1, 3, 5, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(118, 467, 1, 1, 1, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(119, 468, 1, 1, 13, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(120, 469, 3, 1, 6, 1, 1, '2024-11-13 09:15:56', '2024-11-13 09:17:05'),
	(121, 470, 4, 3, 3, 1, 1, '2024-11-13 09:15:57', '2024-11-13 09:17:05'),
	(122, 471, 1, 2, 2, 1, 1, '2024-11-13 09:15:57', '2024-11-13 09:17:05'),
	(123, 332, 5, 3, 12, 1, 1, '2024-11-13 09:15:57', '2024-11-13 09:17:05'),
	(125, 338, 5, 1, 1, 1, 1, '2024-11-13 09:15:57', '2024-11-13 09:17:05'),
	(127, 344, 5, 2, 2, 1, 1, '2024-11-13 09:15:57', '2024-11-13 09:17:05'),
	(252, 333, 5, 1, 12, 2, 1, '2024-11-13 09:16:04', '2024-11-13 09:17:05'),
	(254, 339, 5, 2, 12, 2, 1, '2024-11-13 09:16:04', '2024-11-13 09:17:05'),
	(256, 345, 5, 3, 4, 2, 1, '2024-11-13 09:16:04', '2024-11-13 09:17:05');

-- Dumping structure for table lar11-ga-penjadwalan.jam
CREATE TABLE IF NOT EXISTS `jam` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.jam: ~3 rows (approximately)
INSERT INTO `jam` (`id`, `sesi`, `created_at`, `updated_at`) VALUES
	(1, '08.00-10.30', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(2, '10.30-13.00', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(3, '13.30-16.00', '2024-09-10 06:45:30', '2024-09-10 06:45:30');

-- Dumping structure for table lar11-ga-penjadwalan.matakuliah
CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int NOT NULL,
  `semester` int NOT NULL,
  `jenis_semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.matakuliah: ~134 rows (approximately)
INSERT INTO `matakuliah` (`id`, `kode_matkul`, `nama_matkul`, `sks`, `semester`, `jenis_semester`, `tipe`, `created_at`, `updated_at`) VALUES
	(1, '24FMPH10Z002', 'Bahasa Indonesia A', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(2, '24FMPH10Z002', 'Bahasa Indonesia B', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(3, '24FMPH10Z002', 'Bahasa Indonesia C', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(4, '24FMPH10Z002', 'Bahasa Indonesia D', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(5, '24FMPH10Z002', 'Bahasa Indonesia E', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(6, '24FMPH10Z002\r\n', 'Bahasa Indonesia F', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(7, '24FMPH10Z004\r\n', 'Kewarganegaraan A', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(8, '24FMPH10Z004\r\n', 'Kewarganegaraan B', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(9, '24FMPH10Z004\r\n', 'Kewarganegaraan C', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(10, '24FMPH10Z004\r\n', 'Kewarganegaraan D', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(11, '24FMPH10Z004', 'Kewarganegaraan E', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(12, '24FMPH10Z004\r\n', 'Kewarganegaraan F', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(13, '24FMPH10Z005\r\n', 'Ilmu Sosial Dasar A', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(14, '24FMPH10Z005\r\n', 'Ilmu Sosial Dasar B', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(15, '24FMPH10Z005', 'Ilmu Sosial Dasar C', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(16, '24FMPH10Z005\r\n', 'Ilmu Sosial Dasar D', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(17, '24FMPH10Z005\r\n', 'Ilmu Sosial Dasar E', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(18, '24FMPH10Z005\r\n', 'Ilmu Sosial Dasar F', 2, 1, 'Ganjil', 'Umum', NULL, NULL),
	(19, '24SIFH16X001\r\n', 'Etika Profesi A', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(20, '24SIFH16X001', 'Etika Profesi B', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(21, '24SIFH16X001', 'Etika Profesi C', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(22, '24SIFH16X001\r\n', 'Etika Profesi D', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(23, '24SIFH16X001', 'Etika Profesi E', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(24, '24SIFH16X001', 'Etika Profesi F', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(25, '24SIFH16X002\r\n', 'Matematika Diskrit I A', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(26, '24SIFH16X002\r\n', 'Matematika Diskrit I B', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(27, '24SIFH16X002', 'Matematika Diskrit I C', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(28, '24SIFH16X002', 'Matematika Diskrit I D', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(29, '24SIFH16X002', 'Matematika Diskrit I E', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(30, '24SIFH16X002', 'Matematika Diskrit I F', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(31, '24SIFH16X003', 'Matematika Informatika A', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(32, '24SIFH16X003', 'Matematika Informatika B', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(33, '24SIFH16X003', 'Matematika Informatika C', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(34, '24SIFH16X003', 'Matematika Informatika D', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(35, '24SIFH16X003', 'Matematika Informatika E', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(36, '24SIFH16X003', 'Matematika Informatika F', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(37, '24SIFH16X004', 'Algoritma & Pemrograman A', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(38, '24SIFH16X004', 'Algoritma & Pemrograman B', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(39, '24SIFH16X004\r\n', 'Algoritma & Pemrograman C', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(40, '24SIFH16X004', 'Algoritma & Pemrograman D', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(41, '24SIFH16X004', 'Algoritma & Pemrograman E', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(42, '24SIFH16X004', 'Algoritma & Pemrograman F', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(43, '24SIFH16X005', 'Statistika Dasar A', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(44, '24SIFH16X005', 'Statistika Dasar B', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(45, '24SIFH16X005', 'Statistika Dasar C', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(46, '24SIFH16X005', 'Statistika Dasar D', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(47, '24SIFH16X005', 'Statistika Dasar E', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(48, '24SIFH16X005', 'Statistika Dasar F', 2, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(49, '24SIFH16X006', 'Sistem Digital A', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(50, '24SIFH16X006', 'Sistem Digital B', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(51, '24SIFH16X006', 'Sistem Digital C', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(52, '24SIFH16X006', 'Sistem Digital D', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(53, '24SIFH16X006\r\n', 'Sistem Digital E', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(54, '24SIFH16X006', 'Sistem Digital F', 3, 1, 'Ganjil', 'Wajib', NULL, NULL),
	(55, '24SIFH16X014', 'Interaksi Manusia dan Komputer A', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(56, '24SIFH16X014', 'Interaksi Manusia dan Komputer B', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(57, '24SIFH16X014', 'Interaksi Manusia dan Komputer C', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(58, '24SIFH16X014', 'Interaksi Manusia dan Komputer D', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(59, '24SIFH16X014\r\n', 'Interaksi Manusia dan Komputer E', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(60, '24SIFH16X014', 'Interaksi Manusia dan Komputer F', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(61, '24SIFH16X015', 'Basis Data A', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(62, '24SIFH16X015', 'Basis Data B', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(63, '24SIFH16X015', 'Basis Data C', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(64, '24SIFH16X015', 'Basis Data D', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(65, '24SIFH16X015', 'Basis Data E', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(66, '24SIFH16X015', 'Basis Data F', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(67, '24SIFH16X016\r\n', 'Desain dan Analisis Algoritma A', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(68, '24SIFH16X016', 'Desain dan Analisis Algoritma B', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(69, '24SIFH16X016', 'Desain dan Analisis Algoritma C', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(70, '24SIFH16X016', 'Desain dan Analisis Algoritma D', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(71, '24SIFH16X016', 'Desain dan Analisis Algoritma E', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(72, '24SIFH16X016', 'Desain dan Analisis Algoritma F', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(73, '24SIFH16X017', 'Rekayasa Perangkat Lunak A', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(74, '24SIFH16X017', 'Rekayasa Perangkat Lunak B', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(75, '24SIFH16X017', 'Rekayasa Perangkat Lunak C', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(76, '24SIFH16X017', 'Rekayasa Perangkat Lunak D', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(77, '24SIFH16X017\r\n', 'Rekayasa Perangkat Lunak E', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(78, '24SIFH16X017', 'Rekayasa Perangkat Lunak F', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(79, '24SIFH16X018\r\n', 'Pemrograman Berorientasi Obyek A', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(80, '24SIFH16X018', 'Pemrograman Berorientasi Obyek B', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(81, '24SIFH16X018\r\n', 'Pemrograman Berorientasi Obyek C', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(82, '24SIFH16X018', 'Pemrograman Berorientasi Obyek D', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(83, '24SIFH16X018\r\n', 'Pemrograman Berorientasi Obyek E', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(84, '24SIFH16X018', 'Pemrograman Berorientasi Obyek F', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(85, '24SIFH16X018', 'Komunikasi Data dan Jaringan Komputer A', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(86, '24SIFH16X019', 'Komunikasi Data dan Jaringan Komputer B', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(87, '24SIFH16X019', 'Komunikasi Data dan Jaringan Komputer C', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(88, '24SIFH16X019', 'Komunikasi Data dan Jaringan Komputer D', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(89, '24SIFH16X019', 'Komunikasi Data dan Jaringan Komputer E', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(90, '24SIFH16X019', 'Komunikasi Data dan Jaringan Komputer F', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(91, '24SIFH16X020', 'Teori Bahasa dan Otomata A', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(92, '24SIFH16X020\r\n', 'Teori Bahasa dan Otomata B', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(93, '24SIFH16X020', 'Teori Bahasa dan Otomata C', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(94, '24SIFH16X020', 'Teori Bahasa dan Otomata D', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(95, '24SIFH16X020', 'Teori Bahasa dan Otomata E', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(96, '24SIFH16X020\r\n', 'Teori Bahasa dan Otomata F', 3, 3, 'Ganjil', 'Wajib', NULL, NULL),
	(97, '24SIFH16X030', 'Komputer dan Masyarakat (Computers and Society) A', 2, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(98, '24SIFH16X031', 'Pemodelan dan Simulasi (Modeling and Simulation) A', 3, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(99, '24SIFH16X032', 'Grafika Komputer (Computer Graphics) A', 3, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(100, '24SIFH16X033', 'Sains Data (Data Science) A', 3, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(101, '24SIFH16X034', 'Basis Data Lanjut  (Advanced Database) A', 3, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(102, '24SIFH16X035\r\n', 'Desain dan Pengujian Berpusat pada Pengguna (Computer Graphics) A', 2, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(103, '24SIFH16X036', 'Teknologi Logika Fuzzy (Fuzzy Logic Technology) A', 2, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(104, '24SIFH16X037\r\n', 'Teknologi IOT (IOT Technology) A', 2, 5, 'Ganjil', 'Wajib', NULL, NULL),
	(105, '24SIFH16X058', 'Penambangan Data Tekstual (Text Mining) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(106, '24SIFH16X059', 'Temu Kembali Informasi Tekstual (Text Retrieval) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(107, '24SIFH16X060', 'Pembelajaran Mesin untuk Data Tekstual (Machine Learning for Text) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(108, '24SIFH16X061', 'Pemrosesan Bahasan Alami (Natural Language Processing) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(109, '24SIFH16X062', 'Manajemen Pengetahuan Semantik (Semantic Knowledge Management) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(110, '24SIFH16X063', 'Sistem Manajemen Pengetahuan (Knowledge Management Systems) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(111, '24SIFH16X064', 'Warisan Budaya Digital (Digital Heritage) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(112, '24SIFH16X065', 'Evaluasi Teknologi Informasi (Information Technology Evaluation) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(113, '24SIFH16X066', 'Pemrosesan Sinyal Digital (Digital Signal Processing) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(114, '24SIFH16X067\r\n', 'Pengenalan Pola (Pattern Recognition) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(115, '24SIFH16X068\r\n', 'Pengantar Pembelajaran Mesin (Introduction to Machine Learning) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(116, '24SIFH16X069', 'Pengantar Komputasi Lunak (Introduction to Soft Computing) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(117, '24SIFH16X070', 'Pengolahan Bunyi Digital (Digital Sound Processing) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(118, '24SIFH16X071', 'Pengolahan Citra Digital (Digital Image Processing) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(119, '24SIFH16X072', 'Pengolahan Video Digital (Digital Video Processing) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(120, '24SIFH16X073\r\n', 'Sistem Multimedia (Multimedia Sistem) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(121, '24SIFH16X074', 'Kriptografi (Cryptography) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(122, '24SIFH16X075\r\n', 'Keamanan Sistem Mobile (Mobile System Security) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(123, '24SIFH16X076', 'Steganografi (Steganography) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(124, '24SIFH16X077\r\n', 'Keamanan Sistem Informasi (Information System Security) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(125, '24SIFH16X078', 'Teknologi Nirkabel (Wireless Technology) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(126, '24SIFH16X079\r\n', 'Jaringan Sensor Terdistribusi (Distributed Sensor Networks) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(127, '24SIFH16X080', 'Integrasi Data dan Sensor (Data Integration and Sensors) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(128, '24SIFH16X081\r\n', 'Pemrograman Ubikuitas (Ubiquitous Programming) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(129, '24SIFH16X082', 'Metode Kecerdasan Buatan Lanjut (Advanced Artificial Intelligence Methods) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(130, '24SIFH16X083', 'Sistem Pakar (Expert System) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(131, '24SIFH16X084', 'Sistem Optimasi (Optimization System) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(132, '24SIFH16X085', 'Kecerdasan Kolektif (Swarm Intelligence) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(133, '24SIFH16X086', 'Sistem Informasi Geografis dan Analisis Data Spasial (Geographic Information System and Spatial Data Analytics) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(134, '24SIFH16X087\r\n', 'Penambangan Data dan Analisis (Data Mining and Analytics) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(135, '24SIFH16X088', 'Perdagangan Elektronik dan Intelijen Bisnis (e-Commerce and Business Intelligence) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(136, '24SIFH16X089', 'Manajemen Proyek Teknologi Informasi (Information Technology Project Management) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(137, '24SIFH16X090', 'Realitas Campuran, Tertambah dan Virtual (Mixed, Augmented and Virtual Reality) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(138, '24SIFH16X091\r\n', 'Metode Statistika untuk Interaksi Manusia Komputer (Statistical Methods for Human-Computer Interaction) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(139, '24SIFH16X092', 'Interaksi Manusia Komputer Berorientasi Desain (Design-Oriented Human-Computer Interaction) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL),
	(140, '24SIFH16X093\r\n', 'Uji Kebergunaan (Usability Testing) A', 3, 7, 'Ganjil', 'Pilihan', NULL, NULL);

-- Dumping structure for table lar11-ga-penjadwalan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '2024_08_28_161709_db_hari', 1),
	(4, '2024_08_28_180724_db_jam', 1),
	(5, '2024_08_28_185116_db_matakuliah', 1),
	(6, '2024_08_28_200519_db_dosen', 1),
	(7, '2024_08_29_021634_db_kelas', 1),
	(8, '2024_08_29_024725_db_ruangan', 1),
	(9, '2024_08_29_034525_db_pengajar', 1),
	(10, '2024_08_29_041749_db_pengampu', 1),
	(11, '2024_08_31_064653_db_jadwal', 1),
	(12, '2024_09_04_125053_db_setting', 1),
	(13, '2024_09_04_133049_db_harijam', 1);

-- Dumping structure for table lar11-ga-penjadwalan.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table lar11-ga-penjadwalan.pengajar
CREATE TABLE IF NOT EXISTS `pengajar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_ajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dosen` bigint unsigned NOT NULL,
  `kode_matkul` bigint unsigned NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pengajar_kode_ajaran_unique` (`kode_ajaran`),
  KEY `pengajar_kode_matkul_foreign` (`kode_matkul`),
  KEY `pengajar_id_dosen_foreign` (`id_dosen`),
  CONSTRAINT `pengajar_id_dosen_foreign` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`),
  CONSTRAINT `pengajar_kode_matkul_foreign` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=472 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.pengajar: ~140 rows (approximately)
INSERT INTO `pengajar` (`id`, `kode_ajaran`, `id_dosen`, `kode_matkul`, `kelas`, `created_at`, `updated_at`) VALUES
	(332, '1', 21, 1, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(333, '2', 21, 2, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(338, '7', 22, 7, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(339, '8', 22, 8, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(344, '13', 23, 13, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(345, '14', 23, 14, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(350, '19', 20, 19, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(351, '20', 20, 20, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(352, '21', 9, 21, '1C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(353, '22', 9, 22, '1D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(354, '23', 6, 23, '1E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(355, '24', 6, 24, '1F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(356, '25', 11, 25, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(357, '26', 11, 26, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(358, '27', 11, 27, '1C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(359, '28', 11, 28, '1D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(360, '29', 11, 29, '1E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(361, '30', 11, 30, '1F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(362, '31', 12, 31, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(363, '32', 12, 32, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(364, '33', 12, 33, '1C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(365, '34', 12, 34, '1D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(366, '35', 18, 35, '1E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(367, '36', 18, 36, '1F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(368, '37', 3, 37, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(369, '38', 3, 38, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(370, '39', 3, 39, '1C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(371, '40', 3, 40, '1D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(372, '41', 3, 41, '1E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(373, '42', 3, 42, '1F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(374, '43', 5, 43, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(375, '44', 5, 44, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(376, '45', 5, 45, '1C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(377, '46', 5, 46, '1D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(378, '47', 5, 47, '1E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(379, '48', 5, 48, '1F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(380, '49', 7, 49, '1A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(381, '50', 7, 50, '1B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(382, '51', 6, 51, '1C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(383, '52', 6, 52, '1D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(384, '53', 6, 53, '1E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(385, '54', 6, 54, '1F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(386, '55', 14, 55, '3A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(387, '56', 14, 56, '3B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(388, '57', 8, 57, '3C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(389, '58', 8, 58, '3D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(390, '59', 6, 59, '3E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(391, '60', 6, 60, '3F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(392, '61', 19, 61, '3A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(393, '62', 19, 62, '3B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(394, '63', 19, 63, '3C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(395, '64', 19, 64, '3D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(396, '65', 24, 65, '3E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(397, '66', 24, 66, '3F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(398, '67', 4, 67, '3A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(399, '68', 4, 68, '3B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(400, '69', 4, 69, '3C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(401, '70', 4, 70, '3D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(402, '71', 4, 71, '3E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(403, '72', 4, 72, '3F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(404, '73', 9, 73, '3A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(405, '74', 9, 74, '3B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(406, '75', 9, 75, '3C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(407, '76', 9, 76, '3D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(408, '77', 17, 77, '3E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(409, '78', 17, 78, '3F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(410, '79', 16, 79, '3A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(411, '80', 16, 80, '3B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(412, '81', 16, 81, '3C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(413, '82', 16, 82, '3D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(414, '83', 16, 83, '3E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(415, '84', 16, 84, '3F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(416, '85', 15, 85, '3A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(417, '86', 15, 86, '3B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(418, '87', 15, 87, '3C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(419, '88', 15, 88, '3D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(420, '89', 15, 89, '3E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(421, '90', 15, 90, '3F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(422, '91', 2, 91, '3A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(423, '92', 2, 92, '3B', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(424, '93', 2, 93, '3C', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(425, '94', 2, 94, '3D', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(426, '95', 25, 95, '3E', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(427, '96', 25, 96, '3F', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(428, '97', 1, 97, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(429, '98', 18, 98, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(430, '99', 13, 99, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(431, '100', 10, 100, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(432, '101', 18, 101, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(433, '102', 17, 102, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(434, '103', 7, 103, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(435, '104', 7, 104, '5A', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(436, '105', 10, 105, '7A1', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(437, '106', 10, 106, '7A1', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(438, '107', 2, 107, '7A1', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(439, '108', 2, 108, '7A1', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(440, '109', 1, 109, '7A2', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(441, '110', 1, 110, '7A2', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(442, '111', 17, 111, '7A2', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(443, '112', 1, 112, '7A2', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(444, '113', 13, 113, '7A3', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(445, '114', 17, 114, '7A3', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(446, '115', 19, 115, '7A3', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(447, '116', 7, 116, '7A3', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(448, '117', 19, 117, '7A4', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(449, '118', 13, 118, '7A4', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(450, '119', 8, 119, '7A4', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(451, '120', 15, 120, '7A4', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(452, '121', 20, 121, '7A5', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(453, '122', 18, 122, '7A5', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(454, '123', 20, 123, '7A5', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(455, '124', 20, 124, '7A5', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(456, '125', 13, 125, '7A6', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(457, '126', 24, 126, '7A6', '2024-10-31 20:09:39', '2024-10-31 20:09:39'),
	(458, '127', 24, 127, '7A6', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(459, '128', 18, 128, '7A6', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(460, '129', 7, 129, '7A7', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(461, '130', 11, 130, '7A7', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(462, '131', 11, 131, '7A7', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(463, '132', 3, 132, '7A7', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(464, '133', 8, 133, '7A8', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(465, '134', 12, 134, '7A8', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(466, '135', 8, 135, '7A8', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(467, '136', 20, 136, '7A8', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(468, '137', 9, 137, '7A9', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(469, '138', 5, 138, '7A9', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(470, '139', 14, 139, '7A9', '2024-10-31 20:09:40', '2024-10-31 20:09:40'),
	(471, '140', 14, 140, '7A9', '2024-10-31 20:09:40', '2024-10-31 20:09:40');

-- Dumping structure for table lar11-ga-penjadwalan.ruangan
CREATE TABLE IF NOT EXISTS `ruangan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ruangan_kode_ruangan_unique` (`kode_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.ruangan: ~13 rows (approximately)
INSERT INTO `ruangan` (`id`, `kode_ruangan`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
	(1, 'R01', 'FMIPA 1.1', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(2, 'R02', 'FMIPA 1.2', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(3, 'R03', 'FMIPA 1.3', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(4, 'R04', 'FMIPA 1.4', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(5, 'R05', 'FMIPA 2.1', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(6, 'R06', 'FMIPA 2.2', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(7, 'R07', 'FMIPA 2.3', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(8, 'R08', 'FMIPA 2.4', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(9, 'R09', 'FMIPA 2.5', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(10, 'R10', 'FMIPA 3.1', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(11, 'R11', 'FMIPA 3.2', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(12, 'R12', 'FMIPA 3.3', '2024-09-10 06:45:30', '2024-09-10 06:45:30'),
	(13, 'R13', 'FMIPA 3.4', '2024-09-10 06:45:30', '2024-09-10 06:45:30');

-- Dumping structure for table lar11-ga-penjadwalan.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.sessions: ~0 rows (approximately)

-- Dumping structure for table lar11-ga-penjadwalan.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.setting: ~0 rows (approximately)

-- Dumping structure for table lar11-ga-penjadwalan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lar11-ga-penjadwalan.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
