/*
 Navicat Premium Data Transfer

 Source Server         : local-mysql
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : talentcourse

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 19/10/2020 23:48:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_diskon
-- ----------------------------
DROP TABLE IF EXISTS `m_diskon`;
CREATE TABLE `m_diskon`  (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `besaran` int(20) NULL DEFAULT NULL COMMENT 'dalam persen',
  `kode_ref_diskon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_diskon
-- ----------------------------
INSERT INTO `m_diskon` VALUES (1, 'Diskon Akhir Tahun', 25, 'NewYear2020', '2020-10-17 21:58:14', NULL, NULL);

-- ----------------------------
-- Table structure for m_menu
-- ----------------------------
DROP TABLE IF EXISTS `m_menu`;
CREATE TABLE `m_menu`  (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` int(1) NULL DEFAULT NULL,
  `tingkat` int(11) NULL DEFAULT NULL,
  `urutan` int(11) NULL DEFAULT NULL,
  `add_button` int(1) NULL DEFAULT NULL,
  `edit_button` int(1) NULL DEFAULT NULL,
  `delete_button` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_menu
-- ----------------------------
INSERT INTO `m_menu` VALUES (1, 0, 'Dashboard', 'Dashboard', 'home', 'flaticon2-architecture-and-city', 1, 1, 1, 0, 0, 0);
INSERT INTO `m_menu` VALUES (2, 0, 'Setting (Administrator)', 'Setting', NULL, 'flaticon2-gear', 1, 1, 5, 0, 0, 0);
INSERT INTO `m_menu` VALUES (3, 2, 'Setting Menu', 'Setting Menu', 'set_menu', 'flaticon-grid-menu', 1, 2, 2, 1, 1, 1);
INSERT INTO `m_menu` VALUES (4, 2, 'Setting Role', 'Setting Role', 'set_role', 'flaticon-network', 1, 2, 1, 1, 1, 1);
INSERT INTO `m_menu` VALUES (6, 0, 'Master', 'Master', '', 'flaticon-folder-1', 1, 1, 2, 0, 0, 0);
INSERT INTO `m_menu` VALUES (7, 6, 'Data User', 'Data User', 'master_user', 'flaticon-users', 1, 3, 1, 1, 1, 1);
INSERT INTO `m_menu` VALUES (8, 6, 'Data Diskon', 'Master Data Diskon', 'master_diskon', 'flaticon-price-tag', 1, 2, 2, 1, 1, 1);
INSERT INTO `m_menu` VALUES (9, 0, 'Manajemen Konten', 'Manajemen Konten', '', 'flaticon-profile', 1, 1, 3, 0, 0, 0);
INSERT INTO `m_menu` VALUES (10, 9, 'Setting Harga', 'Setting Harga', 'set_harga', 'flaticon2-shopping-cart', 1, 2, 1, 1, 1, 1);
INSERT INTO `m_menu` VALUES (11, 6, 'Data Talent', 'Master Data Talent', 'master_talent', 'flaticon-customer', 1, 2, 3, 1, 1, 1);

-- ----------------------------
-- Table structure for m_role
-- ----------------------------
DROP TABLE IF EXISTS `m_role`;
CREATE TABLE `m_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `aktif` int(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_role
-- ----------------------------
INSERT INTO `m_role` VALUES (1, 'Administrator', 'Level Administrator Role', 1);
INSERT INTO `m_role` VALUES (2, 'Staff Admin', 'Role Untuk Staff Admin', 1);

-- ----------------------------
-- Table structure for m_talent
-- ----------------------------
DROP TABLE IF EXISTS `m_talent`;
CREATE TABLE `m_talent`  (
  `id` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `akun_ig` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `akun_fb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `akun_tw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto_thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_talent
-- ----------------------------
INSERT INTO `m_talent` VALUES (1, 'via vallen', '<p>asahkshaksjhakshakshaksaksha</p>', '2020-10-19 22:08:44', '2020-10-19 23:07:34', NULL, '', '', '', 'files/img/talent_img/1/via-vallen-1603120124.jpg', 'files/img/talent_img/1/thumbs/via-vallen-1603120124_thumb.jpg');
INSERT INTO `m_talent` VALUES (2, 'anton', '<p>askjdkasjdkasjd kasdjkas jdkasjd kasjdkajs kajsd</p>\n\n<p>anmsmansm</p>', '2020-10-19 22:14:23', '2020-10-19 22:22:19', NULL, 'asa', 'asasaaaaa', 'as', 'files/img/talent_img/2/anton-1603120939.jpg', 'files/img/talent_img/2/thumbs/anton-1603120939_thumb.jpg');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `id_role` int(64) NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `kode_user` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 1, 'admin', 'SnIvSVV6c2UwdWhKS1ZKMDluUlp4dz09', 1, '2020-10-19 20:09:22', 'USR-00001', NULL, NULL, NULL, NULL);
INSERT INTO `m_user` VALUES (2, 1, 'coba', 'Tzg1eTllUlU2a2xNQk5yYktIM1pwUT09', NULL, NULL, 'USR-00002', 'coba-1602775328.jpg', '2020-10-15 22:22:08', '2020-10-15 22:43:54', '2020-10-15 22:58:50');

-- ----------------------------
-- Table structure for t_file_talent
-- ----------------------------
DROP TABLE IF EXISTS `t_file_talent`;
CREATE TABLE `t_file_talent`  (
  `id` int(64) NOT NULL,
  `id_talent` int(64) NULL DEFAULT NULL,
  `path_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `path_file_thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_file_talent
-- ----------------------------
INSERT INTO `t_file_talent` VALUES (1, 1, 'files/img/talent_img/1/1-via-vallen-1603125855.jpg', 'files/img/talent_img/1/thumbs/1-via-vallen-1603125855_thumb.jpg', '2020-10-19 23:44:15', NULL, NULL);
INSERT INTO `t_file_talent` VALUES (2, 1, 'files/img/talent_img/2/2-via-vallen-1603126013.jpg', 'files/img/talent_img/2/thumbs/2-via-vallen-1603126013_thumb.jpg', '2020-10-19 23:46:53', NULL, NULL);

-- ----------------------------
-- Table structure for t_harga
-- ----------------------------
DROP TABLE IF EXISTS `t_harga`;
CREATE TABLE `t_harga`  (
  `id` int(64) NOT NULL,
  `is_reguler` int(1) NULL DEFAULT NULL COMMENT 'reguler / ekslusif',
  `is_diskon` int(1) NULL DEFAULT NULL,
  `id_m_diskon` int(64) NULL DEFAULT NULL,
  `id_talent` int(64) NULL DEFAULT NULL,
  `nilai_harga` float(20, 2) NULL DEFAULT NULL,
  `masa_berlaku_diskon` int(6) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_harga
-- ----------------------------

-- ----------------------------
-- Table structure for t_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `t_role_menu`;
CREATE TABLE `t_role_menu`  (
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `add_button` int(1) NULL DEFAULT 0,
  `edit_button` int(1) NULL DEFAULT 0,
  `delete_button` int(1) NULL DEFAULT 0,
  INDEX `f_level_user`(`id_role`) USING BTREE,
  INDEX `id_menu`(`id_menu`) USING BTREE,
  CONSTRAINT `t_role_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `m_role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `t_role_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `m_menu` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of t_role_menu
-- ----------------------------
INSERT INTO `t_role_menu` VALUES (1, 1, 0, 0, 0);
INSERT INTO `t_role_menu` VALUES (6, 1, 0, 0, 0);
INSERT INTO `t_role_menu` VALUES (7, 1, 1, 1, 1);
INSERT INTO `t_role_menu` VALUES (8, 1, 1, 1, 1);
INSERT INTO `t_role_menu` VALUES (11, 1, 1, 1, 1);
INSERT INTO `t_role_menu` VALUES (9, 1, 0, 0, 0);
INSERT INTO `t_role_menu` VALUES (10, 1, 1, 1, 1);
INSERT INTO `t_role_menu` VALUES (2, 1, 0, 0, 0);
INSERT INTO `t_role_menu` VALUES (4, 1, 1, 1, 1);
INSERT INTO `t_role_menu` VALUES (3, 1, 1, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
