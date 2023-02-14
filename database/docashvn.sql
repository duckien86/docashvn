/*
 Navicat Premium Data Transfer

 Source Server         : localhost-ubuntu-1804
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : docashvn

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 14/02/2023 18:56:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_authassignment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_authassignment`;
CREATE TABLE `tbl_authassignment`  (
  `itemname` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bizrule` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`itemname`, `userid`) USING BTREE,
  CONSTRAINT `tbl_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tbl_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_authassignment
-- ----------------------------
INSERT INTO `tbl_authassignment` VALUES ('Admin', '1', NULL, 'N;');

-- ----------------------------
-- Table structure for tbl_authitem
-- ----------------------------
DROP TABLE IF EXISTS `tbl_authitem`;
CREATE TABLE `tbl_authitem`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `bizrule` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_authitem
-- ----------------------------
INSERT INTO `tbl_authitem` VALUES ('Admin', 2, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('ASite.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('ASite.Error', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('ASite.Index', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Activation.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Activation.Activation', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Admin', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Create', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Delete', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Update', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.View', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Default.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Default.Index', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Login.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Login.Login', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Logout.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Logout.Logout', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Profile.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Profile.Changepassword', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Profile.Edit', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Profile.Profile', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Admin', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Create', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Delete', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Update', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.View', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Recovery.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Recovery.Recovery', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Registration.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Registration.Registration', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.User.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.User.Index', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.User.View', 0, NULL, NULL, 'N;');

-- ----------------------------
-- Table structure for tbl_authitemchild
-- ----------------------------
DROP TABLE IF EXISTS `tbl_authitemchild`;
CREATE TABLE `tbl_authitemchild`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `tbl_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tbl_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_installment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_installment`;
CREATE TABLE `tbl_installment`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'mã hợp đồng',
  `shop_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'shop sở hữu hợp đồng',
  `create_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'người tạo hợp đồng',
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `personal_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'cmnd/cccd....',
  `total_money` float(50, 0) NOT NULL COMMENT 'Tổng số tiền khách phải trả (bát họ)',
  `receive_money` float(50, 0) NOT NULL COMMENT 'Số tiền khách nhận về',
  `loan_date` int(3) NOT NULL COMMENT 'Số ngày vay',
  `frequency` int(3) NOT NULL COMMENT 'Tần suất trả tiền',
  `is_before` tinyint(1) NULL DEFAULT NULL COMMENT 'Thu họ trước',
  `start_date` datetime(0) NOT NULL COMMENT 'ngày bốc họ',
  `create_date` datetime(0) NOT NULL COMMENT 'Ngày tạo hợp đồng',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `manage_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nhân viên thu tiền',
  `status` tinyint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_installment
-- ----------------------------
INSERT INTO `tbl_installment` VALUES (5, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:21:24', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (6, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:22:01', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (7, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:22:02', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (8, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:22:02', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (9, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:22:02', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (10, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:23:54', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (11, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:24:20', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (12, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:26:27', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (13, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:26:44', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (14, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:30:20', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (15, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:32:18', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (16, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:34:09', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (17, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:35:08', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (18, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:38:29', 'Trả tiền nhanh nhé', '123', NULL);
INSERT INTO `tbl_installment` VALUES (19, '12', '1', 'hoàng trung', '009213213', 'hà nội', '123134', 10000000, 8000000, 40, 5, 0, '2023-02-14 00:00:00', '2023-02-14 18:42:31', 'Trả tiền nhanh nhé', '123', NULL);

-- ----------------------------
-- Table structure for tbl_installment_items
-- ----------------------------
DROP TABLE IF EXISTS `tbl_installment_items`;
CREATE TABLE `tbl_installment_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `installment_id` int(11) NULL DEFAULT NULL COMMENT 'mã hợp đồng tham chiếu',
  `payment_date` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày phải đóng tiền theo kế hoạch (ngày họ)',
  `amount` float(20, 0) NULL DEFAULT NULL COMMENT 'Số tiền phải đóng theo kế hoạch (tiền họ)',
  `transaction_id` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã giao dịch tham chiếu',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bảng chi tiết số tiền phải trả theo kế hoạch' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_installment_items
-- ----------------------------
INSERT INTO `tbl_installment_items` VALUES (1, 18, '2023-02-14 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (2, 18, '2023-02-15 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (3, 18, '2023-02-16 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (4, 18, '2023-02-17 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (5, 18, '2023-02-18 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (6, 18, '2023-02-19 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (7, 18, '2023-02-20 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (8, 18, '2023-02-21 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (9, 18, '2023-02-22 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (10, 18, '2023-02-23 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (11, 18, '2023-02-24 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (12, 18, '2023-02-25 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (13, 18, '2023-02-26 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (14, 18, '2023-02-27 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (15, 18, '2023-02-28 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (16, 18, '2023-03-01 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (17, 18, '2023-03-02 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (18, 18, '2023-03-03 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (19, 18, '2023-03-04 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (20, 18, '2023-03-05 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (21, 18, '2023-03-06 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (22, 18, '2023-03-07 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (23, 18, '2023-03-08 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (24, 18, '2023-03-09 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (25, 18, '2023-03-10 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (26, 18, '2023-03-11 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (27, 18, '2023-03-12 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (28, 18, '2023-03-13 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (29, 18, '2023-03-14 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (30, 18, '2023-03-15 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (31, 18, '2023-03-16 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (32, 18, '2023-03-17 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (33, 18, '2023-03-18 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (34, 18, '2023-03-19 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (35, 18, '2023-03-20 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (36, 18, '2023-03-21 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (37, 18, '2023-03-22 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (38, 18, '2023-03-23 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (39, 18, '2023-03-24 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (40, 18, '2023-03-25 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (41, 19, '2023-02-14 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (42, 19, '2023-02-15 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (43, 19, '2023-02-16 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (44, 19, '2023-02-17 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (45, 19, '2023-02-18 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (46, 19, '2023-02-19 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (47, 19, '2023-02-20 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (48, 19, '2023-02-21 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (49, 19, '2023-02-22 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (50, 19, '2023-02-23 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (51, 19, '2023-02-24 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (52, 19, '2023-02-25 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (53, 19, '2023-02-26 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (54, 19, '2023-02-27 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (55, 19, '2023-02-28 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (56, 19, '2023-03-01 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (57, 19, '2023-03-02 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (58, 19, '2023-03-03 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (59, 19, '2023-03-04 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (60, 19, '2023-03-05 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (61, 19, '2023-03-06 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (62, 19, '2023-03-07 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (63, 19, '2023-03-08 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (64, 19, '2023-03-09 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (65, 19, '2023-03-10 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (66, 19, '2023-03-11 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (67, 19, '2023-03-12 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (68, 19, '2023-03-13 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (69, 19, '2023-03-14 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (70, 19, '2023-03-15 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (71, 19, '2023-03-16 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (72, 19, '2023-03-17 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (73, 19, '2023-03-18 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (74, 19, '2023-03-19 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (75, 19, '2023-03-20 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (76, 19, '2023-03-21 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (77, 19, '2023-03-22 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (78, 19, '2023-03-23 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (79, 19, '2023-03-24 00:00:00', 250000, NULL);
INSERT INTO `tbl_installment_items` VALUES (80, 19, '2023-03-25 00:00:00', 250000, NULL);

-- ----------------------------
-- Table structure for tbl_profiles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profiles`;
CREATE TABLE `tbl_profiles`  (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `birthday` date NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_profiles
-- ----------------------------
INSERT INTO `tbl_profiles` VALUES (1, 'Admin', 'Administrator', '2021-03-04');

-- ----------------------------
-- Table structure for tbl_profiles_fields
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profiles_fields`;
CREATE TABLE `tbl_profiles_fields`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `field_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT 0,
  `field_size_min` int(3) NOT NULL DEFAULT 0,
  `required` int(1) NOT NULL DEFAULT 0,
  `match` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `range` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `error_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `other_validator` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `default` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `widget` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `varname`(`varname`, `widget`, `visible`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_profiles_fields
-- ----------------------------
INSERT INTO `tbl_profiles_fields` VALUES (1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3);
INSERT INTO `tbl_profiles_fields` VALUES (2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);
INSERT INTO `tbl_profiles_fields` VALUES (3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '1986-01-01', 'UWjuidate', '{\"ui-theme\":\"redmond\"}', 3, 2);

-- ----------------------------
-- Table structure for tbl_rights
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rights`;
CREATE TABLE `tbl_rights`  (
  `itemname` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`) USING BTREE,
  CONSTRAINT `tbl_rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tbl_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_shops
-- ----------------------------
DROP TABLE IF EXISTS `tbl_shops`;
CREATE TABLE `tbl_shops`  (
  `id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Mã cửa hàng (timestamp)',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `note` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `create_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã người tạo',
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã người sở hữu',
  `status` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_transaction_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaction_category`;
CREATE TABLE `tbl_transaction_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `in_out` tinyint(1) NULL DEFAULT NULL COMMENT '1= IN , 2 = OUT',
  `sort_index` tinyint(2) NULL DEFAULT NULL,
  `status` tinyint(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_transactions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transactions`;
CREATE TABLE `tbl_transactions`  (
  `id` int(50) NOT NULL COMMENT 'Mã giao dịch thu chi (timestamp)',
  `user_id` int(11) NOT NULL COMMENT 'Người thực hiện (tbl_users)',
  `customer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Khách hàng',
  `amount` float NOT NULL COMMENT 'số tiền',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ghi chú',
  `type` tinyint(4) NOT NULL COMMENT '1= Thu , 2 = Chi',
  `group_id` tinyint(4) NOT NULL COMMENT 'ref (tbl_transaction_group)',
  `create_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thời gian tạo',
  `ref_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã tham chiếu tới 1 chứng từ mà liên quan đến giao dich',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '0: hủy phiếu , 10: đang hoạt động',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ind_cua_hang_loai_giao_dic`(`type`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bảng lưu số liệu thu chi' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transactions
-- ----------------------------
INSERT INTO `tbl_transactions` VALUES (1213213, 21312321, 'kiên nguyễn', 1000000, 'ghi chú hoạt động', 1, 1, '2023-02-07 17:47:33', NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (35345435, 21312321, 'kiên nguyễn', 1000000, 'ghi chú hoạt động', 1, 1, '2023-02-09 17:47:33', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activkey` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT 0,
  `lastvisit` int(10) NOT NULL DEFAULT 0,
  `superuser` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `parent_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `status`(`status`) USING BTREE,
  INDEX `superuser`(`superuser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '619c1789d8bf136aec0e04541c8d5f32', 1261146094, 1676272112, 1, 1, NULL);

SET FOREIGN_KEY_CHECKS = 1;
