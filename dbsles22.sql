-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sles
CREATE DATABASE IF NOT EXISTS `sles` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sles`;

-- Dumping structure for table sles.from_psx_list
CREATE TABLE IF NOT EXISTS `from_psx_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `proccess` enum('SUPPLIER','INTERNAL') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'SUPPLIER',
  `sles_no` int DEFAULT NULL,
  `palet` int DEFAULT NULL,
  `box` int DEFAULT NULL,
  `rak` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status_from` enum('IN','OUT') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'IN',
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'ACTIVE',
  `create_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `delete_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table sles.from_psx_list: ~3 rows (approximately)
INSERT INTO `from_psx_list` (`id`, `proccess`, `sles_no`, `palet`, `box`, `rak`, `date`, `time`, `status_from`, `status`, `create_by`, `create_date`, `delete_by`, `delete_date`, `update_by`, `update_date`) VALUES
	(62, 'SUPPLIER', 250514001, 1, 1, 1, '2025-05-14', '08:12:00', 'IN', 'ACTIVE', 'ADMIN', '2025-05-14 08:12:00', NULL, NULL, NULL, NULL),
	(63, 'SUPPLIER', 250514001, 1, 1, 1, '2025-05-14', '08:12:44', 'OUT', 'ACTIVE', 'ADMIN', '2025-05-14 08:12:44', NULL, NULL, NULL, NULL),
	(64, 'SUPPLIER', 250609002, 545, 55, 55, '2025-06-09', '08:08:17', 'IN', 'ACTIVE', 'ADMIN', '2025-06-09 08:08:17', NULL, NULL, NULL, NULL);

-- Dumping structure for table sles.jadwal_to_cus_tbl
CREATE TABLE IF NOT EXISTS `jadwal_to_cus_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_delivery` int DEFAULT NULL,
  `do_no` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_cus` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `to_cus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_do` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `do_addr1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `jenis_vehicle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_by` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3413 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sles.jadwal_to_cus_tbl: ~4 rows (approximately)
INSERT INTO `jadwal_to_cus_tbl` (`id`, `kd_delivery`, `do_no`, `date`, `time`, `id_cus`, `to_cus`, `id_do`, `do_addr1`, `jenis_vehicle`, `keterangan`, `status`, `created_by`, `created_date`) VALUES
	(1, 25060519, '8101268186', '2025-06-09', '05:00', 'T05', 'PT. TS TECH INDONESIA', 'TST', 'KAWASAN INDUSTRI KOTA BUKIT INDAH', 'WING BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:04:33'),
	(2, 25060520, '8101268204', '2025-06-09', '06:00', 'I01', 'PT. SUZUKI INDOMOBIL MOTOR ( SIM R2 )', 'SIM1', 'Jl. Diponegoro Km 38.2 Jati Mulya', 'TRUCK BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:07:33'),
	(3, 25060521, '8101268196', '2025-06-09', '06:00', 'I01', 'PT. SUZUKI INDOMOBIL MOTOR ( SIM R2 )', 'EXP', 'Jl. P. Diponegoro Km 38.2 Tambun ( Toyogiri )', 'TRUCK BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:07:53'),
	(4, 25060522, NULL, '2025-06-09', '07:00', 'P04', 'PKMI', 'KIC', 'JL. HARAPAN RAYA LOT JJ-2B', 'WING BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:08:11'),
	(5, 25060523, NULL, '2025-06-09', '07:00', 'I02', 'PT. SUZUKI INDOMOBIL MOTOR (SIM R4)', 'CKR', 'Green Land International Industrial Center ( GIIC)', 'TRUCK BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:08:32'),
	(6, 25060524, NULL, '2025-06-09', '07:00', 'I02', 'PT. SUZUKI INDOMOBIL MOTOR (SIM R4)', 'CKR', 'Green Land International Industrial Center ( GIIC)', 'TRUCK BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:08:50'),
	(7, 25060525, '8101268147', '2025-06-09', '07:00', '01', 'PT. DUNEX', '01', 'Kawasan Industri Mitra Karawang Jl. Mitra Raya Timur I Blok D10-17, D40-47', 'TRUCK BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:09:08'),
	(8, 25060526, '8101268133', '2025-06-09', '07:00', '01', 'PT. ALLOS', 'KRW', 'Kerawang', 'TRUCK BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:09:26'),
	(9, 25060527, NULL, '2025-06-09', '07:00', 'H10', 'PT. HONDA PROSPECT MOTOR', 'HPM2', 'JL.MITRA UTARA II', 'TRUCK BOX', 'KB', 'ACTIVE', 'PPC', '2025-06-05 15:09:43');

-- Dumping structure for table sles.master_delivery_tbl
CREATE TABLE IF NOT EXISTS `master_delivery_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_delivery` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_start_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `do_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_start_loading` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `time_start_loading` datetime DEFAULT NULL,
  `status_finish_loading` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `time_finish_loading` datetime DEFAULT NULL,
  `status_ready` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `time_ready` datetime DEFAULT NULL,
  `status_delivery` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `time_delivery` datetime DEFAULT NULL,
  `status_finish` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `time_finish` datetime DEFAULT NULL,
  `status_unloading` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `time_unloading` datetime DEFAULT NULL,
  `total_loading` decimal(5,2) unsigned DEFAULT NULL,
  `total_ready` decimal(5,2) DEFAULT NULL,
  `total_start_delivery` decimal(5,2) DEFAULT NULL,
  `total_delivery` decimal(5,2) DEFAULT NULL,
  `total_unloading` decimal(5,2) DEFAULT NULL,
  `total_all` decimal(5,2) DEFAULT NULL,
  `status_list_all` enum('START','START_LOADING','FINISH_LOADING','READY','DELIVERY','FINISH','FINISH_UNLOADING') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_by` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3407 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

-- Dumping data for table sles.master_delivery_tbl: ~9 rows (approximately)
INSERT INTO `master_delivery_tbl` (`id`, `kd_delivery`, `id_start_number`, `do_no`, `status_start_loading`, `time_start_loading`, `status_finish_loading`, `time_finish_loading`, `status_ready`, `time_ready`, `status_delivery`, `time_delivery`, `status_finish`, `time_finish`, `status_unloading`, `time_unloading`, `total_loading`, `total_ready`, `total_start_delivery`, `total_delivery`, `total_unloading`, `total_all`, `status_list_all`, `status`, `created_by`, `created_date`) VALUES
	(3397, '25060519', '202506058', '8101268186', '1', '2025-06-09 04:59:23', '1', '2025-06-09 04:59:28', '1', '2025-06-09 04:59:48', '1', '2025-06-09 05:00:45', '0', NULL, '0', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, 'DELIVERY', 'ACTIVE', 'PPC', '2025-06-05 15:04:33'),
	(3398, '25060520', '202506059', '8101268204', '1', '2025-06-09 05:01:36', '1', '2025-06-09 05:01:43', '1', '2025-06-09 05:02:11', '1', '2025-06-09 05:03:23', '0', NULL, '0', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, 'DELIVERY', 'ACTIVE', 'PPC', '2025-06-05 15:07:33'),
	(3399, '25060521', '202506060', '8101268196', '1', '2025-06-09 05:44:31', '1', '2025-06-09 05:44:38', '1', '2025-06-09 05:45:10', '1', '2025-06-09 05:46:18', '0', NULL, '0', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, 'DELIVERY', 'ACTIVE', 'PPC', '2025-06-05 15:07:53'),
	(3400, '25060522', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'START', 'ACTIVE', 'PPC', '2025-06-05 15:08:11'),
	(3401, '25060523', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'START', 'ACTIVE', 'PPC', '2025-06-05 15:08:32'),
	(3402, '25060524', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'START', 'ACTIVE', 'PPC', '2025-06-05 15:08:50'),
	(3403, '25060525', '202506061', '8101268147', '1', '2025-06-09 08:37:10', '1', '2025-06-09 08:37:17', '1', '2025-06-09 05:46:14', '1', '2025-06-09 08:40:04', '0', NULL, '0', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, 'READY', 'ACTIVE', 'PPC', '2025-06-05 15:09:08'),
	(3404, '25060526', '202506061', '8101268133', '1', '2025-06-09 08:36:36', '1', '2025-06-09 08:37:22', '0', '2025-06-09 08:38:03', '1', '2025-06-09 08:40:04', '0', NULL, '0', NULL, 0.01, NULL, NULL, NULL, NULL, NULL, 'FINISH_LOADING', 'ACTIVE', 'PPC', '2025-06-05 15:09:26'),
	(3405, '25060527', NULL, NULL, '0', NULL, '0', NULL, '1', '2025-06-09 05:46:47', '0', NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'READY', 'ACTIVE', 'PPC', '2025-06-05 15:09:43');

-- Dumping structure for table sles.master_supplier
CREATE TABLE IF NOT EXISTS `master_supplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor` int DEFAULT NULL,
  `supplier_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `street` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postal_code` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `city` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `account_group` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `search_item` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'ACTIVE',
  `category` enum('MILKRUN','CUSTOMER','MATERIAL') DEFAULT NULL,
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table sles.master_supplier: ~11 rows (approximately)
INSERT INTO `master_supplier` (`id`, `vendor`, `supplier_name`, `street`, `country`, `postal_code`, `city`, `account_group`, `search_item`, `status`, `category`, `created_by`, `created_date`) VALUES
	(1, 102213, 'PT ABTA KARYA PERKASA', 'JL.AMD RT.017 RW.006 CILEDUG SETU', 'ID', '', 'KAB. BEKASI', 'Z100', 'ABTA', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(2, 300835, 'PT ACE HARDWARE INDONESIA TBK', 'JL PURI KENCANA NO 1 RT 005', 'ID', '', 'JAKARTA BARAT', 'Z300', 'ACE', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(3, 300783, 'PT ACITEK DIGITAL INDONESIA', 'JL. KESEHATAN NO. 60 O-P GAMBIR, JA', 'ID', '10160', 'KOTA JAKARTA PUSAT', 'Z300', 'ADI', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(4, 300741, 'PT ACM TECHNOLOGY', 'RUKO MUTIARA KARAWACI BLOK F NO.06', 'ID', '15810', 'KAB. TANGERANG', 'Z300', 'ACM', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(5, 103191, 'PT ACME INTERNATIONAL', 'JL. JABABEKA VI BL J5 E KAWASAN IND', 'ID', '17530', 'KAB. BEKASI', 'Z100', 'AMI', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(6, 100031, 'PT ACROE INDONESIA', 'JL KH HASYIM ASHARI', 'ID', '10000', 'JAKARTA', 'Z100', 'ACROJK', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(7, 103189, 'CV ADIANA MULTI PRIMA MAKMUR', 'JL. PAMENGKANG RAYA, TAMAN MUTIARA', 'ID', '45173', 'KAB. CIREBON', 'Z100', 'AMP', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(8, 300742, 'CV ADRIAN PRATAMA METAL', 'JL. RAYA SERANG-CIBARUSAH NO.149', 'ID', '17530', 'KAB. BEKASI', 'Z300', 'APM', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(9, 102600, 'PT AFTECH RAND PERKASA', 'JL. INDUSTRI SELATAN 1 A BLOK NN3 G', 'ID', '17854', 'BEKASI', 'Z100', 'AFTECH', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(10, 102724, 'PT AFTECH RUBBERINDO PERKASA', 'JL. SWADAYA RT002/RW001', 'ID', '17510', 'KAB.  BEKASI', 'Z100', 'AFTECH', 'ACTIVE', NULL, 'Admin', '2024-07-18 09:16:52'),
	(424, 130212, 'PT.TEST', 'JL.TEST', 'ID', '33221', 'MARS', 'X212', 'BOOK', 'ACTIVE', 'MILKRUN', 'Admin', '2025-06-10 09:56:40');

-- Dumping structure for table sles.milkrun
CREATE TABLE IF NOT EXISTS `milkrun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_pol` varchar(50) DEFAULT NULL,
  `driver` varchar(50) DEFAULT NULL,
  `vendor_name` varchar(50) DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `dn_number` varchar(50) DEFAULT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_sj` datetime DEFAULT NULL,
  `status` enum('BAWA_BARANG','KOSONG') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sles.milkrun: ~1 rows (approximately)
INSERT INTO `milkrun` (`id`, `no_pol`, `driver`, `vendor_name`, `vendor_id`, `dn_number`, `no_sj`, `date_sj`, `status`, `date`, `created_at`, `updated_at`) VALUES
	(22, 'dger', 'rgerg', 'PT.TEST', 130212, NULL, '2g2fwe', '2025-06-11 00:00:00', 'KOSONG', '2025-06-11 00:00:00', '2025-06-11 02:31:46', '2025-06-11 02:31:46');

-- Dumping structure for table sles.psx_entry
CREATE TABLE IF NOT EXISTS `psx_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sles_no` int DEFAULT NULL,
  `no_po` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_po` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `kd_sup` int DEFAULT NULL,
  `name_sup` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `in` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_out` date DEFAULT NULL,
  `out` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `docking_time` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `docking_location` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `docking_stat` enum('FINISHED','INPROCESS','UNFINISHED') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'UNFINISHED',
  `total_time` decimal(5,2) DEFAULT NULL,
  `no_sj` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_sj` date DEFAULT NULL,
  `no_pol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `driver` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `info_in` enum('1','2','3','4','5','6','7') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '1',
  `info_out` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_out` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `delete_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17678 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- Dumping data for table sles.psx_entry: ~3 rows (approximately)
INSERT INTO `psx_entry` (`id`, `sles_no`, `no_po`, `status_po`, `kd_sup`, `name_sup`, `in`, `ket`, `date_out`, `out`, `docking_time`, `docking_location`, `docking_stat`, `total_time`, `no_sj`, `date_sj`, `no_pol`, `driver`, `info_in`, `info_out`, `status_out`, `status`, `create_by`, `create_date`, `delete_by`, `delete_date`, `update_by`, `update_date`) VALUES
	(17675, 250609002, '53344334', '0', 100031, 'PT ACROE INDONESIA', '08:08:17', NULL, '2025-06-09', '08:11:27', '08:08:52', '2', 'FINISHED', 0.05, '5080212121', '2025-06-09', 'JE 5938 CE', 'BUDI', '1', '3', '1', 'ACTIVE', 'ADMIN', '2025-06-09', NULL, NULL, NULL, NULL),
	(17676, 250609003, NULL, '0', 100031, 'PT ACROE INDONESIA', '08:09:27', NULL, NULL, NULL, '08:11:08', '1', 'INPROCESS', NULL, NULL, NULL, 'LO 1212 CE', 'PPEP', '3', NULL, '0', 'ACTIVE', 'ADMIN', '2025-06-09', NULL, NULL, NULL, NULL),
	(17677, 250609004, NULL, '0', 100031, 'PT ACROE INDONESIA', '10:06:25', NULL, NULL, NULL, NULL, NULL, 'UNFINISHED', NULL, NULL, NULL, 'ERTG', 'T35G', '3', NULL, '0', 'ACTIVE', 'ADMIN', '2025-06-09', NULL, NULL, NULL, NULL);

-- Dumping structure for table sles.psx_out_entry
CREATE TABLE IF NOT EXISTS `psx_out_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `process` enum('SUPPLIER','INTERNAL') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'SUPPLIER',
  `sles_no` int DEFAULT NULL,
  `info_out` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1',
  `no_sj` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_sj` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `out` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'ACTIVE',
  `create_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `delete_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table sles.psx_out_entry: ~0 rows (approximately)
INSERT INTO `psx_out_entry` (`id`, `process`, `sles_no`, `info_out`, `no_sj`, `date_sj`, `date_out`, `out`, `status`, `create_by`, `create_date`, `update_by`, `update_date`, `delete_by`, `delete_date`) VALUES
	(35, 'SUPPLIER', 250514001, '1', 'AKAKAK', '2025-05-14', '2025-05-14', '08:12:44', 'ACTIVE', 'ADMIN', '2025-05-14', NULL, NULL, NULL, NULL),
	(36, 'SUPPLIER', 250609002, '3', NULL, NULL, '2025-06-09', '08:11:27', 'ACTIVE', 'ADMIN', '2025-06-09', NULL, NULL, NULL, NULL);

-- Dumping structure for table sles.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `pass_list` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table sles.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`, `pass_list`, `nik`) VALUES
	(1, 'Admin', 'admin', 'admin@gmail.com', NULL, 1, '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2023-10-29', '2023-11-03', '1234', '1234'),
	(10, 'Danru01', 'user', 'danru01gmail.com', NULL, 0, '25bbdcd06c32d477f7fa1c3e4a91b032', NULL, '2023-10-29', '2023-11-03', '0001', '0001');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
