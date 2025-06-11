/*
 Navicat MySQL Data Transfer

 Source Server         : Develop
 Source Server Type    : MySQL
 Source Server Version : 100129 (10.1.29-MariaDB)
 Source Host           : 172.16.37.240:3306
 Source Schema         : db_psx

 Target Server Type    : MySQL
 Target Server Version : 100129 (10.1.29-MariaDB)
 File Encoding         : 65001

 Date: 14/05/2025 08:18:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for from_psx_list
-- ----------------------------
DROP TABLE IF EXISTS `from_psx_list`;
CREATE TABLE `from_psx_list`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `proccess` enum('SUPPLIER','INTERNAL') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'SUPPLIER',
  `sles_no` int NULL DEFAULT NULL,
  `palet` int NULL DEFAULT NULL,
  `box` int NULL DEFAULT NULL,
  `rak` int NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `time` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_from` enum('IN','OUT') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'IN',
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'ACTIVE',
  `create_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_date` datetime NULL DEFAULT NULL,
  `delete_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `delete_date` datetime NULL DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `update_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of from_psx_list
-- ----------------------------
INSERT INTO `from_psx_list` VALUES (62, 'SUPPLIER', 250514001, 1, 1, 1, '2025-05-14', '08:12:00', 'IN', 'ACTIVE', 'ADMIN', '2025-05-14 08:12:00', NULL, NULL, NULL, NULL);
INSERT INTO `from_psx_list` VALUES (63, 'SUPPLIER', 250514001, 1, 1, 1, '2025-05-14', '08:12:44', 'OUT', 'ACTIVE', 'ADMIN', '2025-05-14 08:12:44', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for master_supplier
-- ----------------------------
DROP TABLE IF EXISTS `master_supplier`;
CREATE TABLE `master_supplier`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor` int NULL DEFAULT NULL,
  `supplier_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `street` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `country` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `postal_code` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `account_group` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `search_item` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'ACTIVE',
  `created_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 424 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of master_supplier
-- ----------------------------
INSERT INTO `master_supplier` VALUES (1, 102213, 'PT ABTA KARYA PERKASA', 'JL.AMD RT.017 RW.006 CILEDUG SETU', 'ID', '', 'KAB. BEKASI', 'Z100', 'ABTA', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (2, 300835, 'PT ACE HARDWARE INDONESIA TBK', 'JL PURI KENCANA NO 1 RT 005', 'ID', '', 'JAKARTA BARAT', 'Z300', 'ACE', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (3, 300783, 'PT ACITEK DIGITAL INDONESIA', 'JL. KESEHATAN NO. 60 O-P GAMBIR, JA', 'ID', '10160', 'KOTA JAKARTA PUSAT', 'Z300', 'ADI', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (4, 300741, 'PT ACM TECHNOLOGY', 'RUKO MUTIARA KARAWACI BLOK F NO.06', 'ID', '15810', 'KAB. TANGERANG', 'Z300', 'ACM', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (5, 103191, 'PT ACME INTERNATIONAL', 'JL. JABABEKA VI BL J5 E KAWASAN IND', 'ID', '17530', 'KAB. BEKASI', 'Z100', 'AMI', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (6, 100031, 'PT ACROE INDONESIA', 'JL KH HASYIM ASHARI', 'ID', '10000', 'JAKARTA', 'Z100', 'ACROJK', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (7, 103189, 'CV ADIANA MULTI PRIMA MAKMUR', 'JL. PAMENGKANG RAYA, TAMAN MUTIARA', 'ID', '45173', 'KAB. CIREBON', 'Z100', 'AMP', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (8, 300742, 'CV ADRIAN PRATAMA METAL', 'JL. RAYA SERANG-CIBARUSAH NO.149', 'ID', '17530', 'KAB. BEKASI', 'Z300', 'APM', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (9, 102600, 'PT AFTECH RAND PERKASA', 'JL. INDUSTRI SELATAN 1 A BLOK NN3 G', 'ID', '17854', 'BEKASI', 'Z100', 'AFTECH', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');
INSERT INTO `master_supplier` VALUES (10, 102724, 'PT AFTECH RUBBERINDO PERKASA', 'JL. SWADAYA RT002/RW001', 'ID', '17510', 'KAB.  BEKASI', 'Z100', 'AFTECH', 'ACTIVE', 'Admin', '2024-07-18 09:16:52');

-- ----------------------------
-- Table structure for psx_entry
-- ----------------------------
DROP TABLE IF EXISTS `psx_entry`;
CREATE TABLE `psx_entry`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sles_no` int NULL DEFAULT NULL,
  `no_po` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_po` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `kd_sup` int NULL DEFAULT NULL,
  `name_sup` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `in` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date_out` date NULL DEFAULT NULL,
  `out` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_time` decimal(5, 2) NULL DEFAULT NULL,
  `no_sj` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date_sj` date NULL DEFAULT NULL,
  `no_pol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `driver` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `info_in` enum('1','2','3','4','5','6','7') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  `info_out` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_out` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_date` date NULL DEFAULT NULL,
  `delete_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delete_date` datetime NULL DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17674 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of psx_entry
-- ----------------------------
INSERT INTO `psx_entry` VALUES (17673, 250514001, '571118585', '0', 100025, 'PT STEEL PIPE INDUSTRY OF INDONESIA', '08:12:00', NULL, '2025-05-14', '08:12:44', 0.01, '258456JKL001', '2025-05-14', 'B 5555 KS', 'ANTON', '1', '1', '1', 'ACTIVE', 'ADMIN', '2025-05-14', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for psx_out_entry
-- ----------------------------
DROP TABLE IF EXISTS `psx_out_entry`;
CREATE TABLE `psx_out_entry`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `process` enum('SUPPLIER','INTERNAL') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'SUPPLIER',
  `sles_no` int NULL DEFAULT NULL,
  `info_out` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `no_sj` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_sj` date NULL DEFAULT NULL,
  `date_out` date NULL DEFAULT NULL,
  `out` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'ACTIVE',
  `create_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_date` date NULL DEFAULT NULL,
  `update_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `update_date` datetime NULL DEFAULT NULL,
  `delete_by` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `delete_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of psx_out_entry
-- ----------------------------
INSERT INTO `psx_out_entry` VALUES (35, 'SUPPLIER', 250514001, '1', 'AKAKAK', '2025-05-14', '2025-05-14', '08:12:44', 'ACTIVE', 'ADMIN', '2025-05-14', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `pass_list` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin', 'admin@gmail.com', NULL, 1, '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2023-10-29', '2023-11-03', '1234', '1234');
INSERT INTO `users` VALUES (10, 'Danru01', 'user', 'danru01gmail.com', NULL, 0, '25bbdcd06c32d477f7fa1c3e4a91b032', NULL, '2023-10-29', '2023-11-03', '0001', '0001');

SET FOREIGN_KEY_CHECKS = 1;
