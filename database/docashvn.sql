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

 Date: 17/02/2023 19:33:27
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
INSERT INTO `tbl_authassignment` VALUES ('Admin cửa hàng', '2', NULL, 'N;');

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
INSERT INTO `tbl_authitem` VALUES ('Admin cửa hàng', 2, 'Quyền Admin Cửa hàng', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.*', 1, 'Bát Họ', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Admin', 0, 'Bát Họ - Xem', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Create', 0, 'Bát họ - Tạo HĐ', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Delete', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Update', 0, NULL, NULL, 'N;');
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
-- Records of tbl_authitemchild
-- ----------------------------
INSERT INTO `tbl_authitemchild` VALUES ('Admin cửa hàng', 'AInstallment.*');
INSERT INTO `tbl_authitemchild` VALUES ('Admin cửa hàng', 'AInstallment.Admin');
INSERT INTO `tbl_authitemchild` VALUES ('Admin cửa hàng', 'AInstallment.Create');

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_installment
-- ----------------------------
INSERT INTO `tbl_installment` VALUES (1, 'CH-1676452628', '2', 'Hoàng Tùng', '342424', '', '1231241', 40000000, 30000000, 10, 5, 0, '2023-02-17 00:00:00', '2023-02-17 18:56:05', 'Nhớ trả đúng', '2', NULL);
INSERT INTO `tbl_installment` VALUES (2, 'CH-1676452628', '2', 'Tuấn Quang', '', '', '', 6000000, 5000000, 5, 1, 0, '2023-02-16 00:00:00', '2023-02-17 19:02:41', '', '2', NULL);
INSERT INTO `tbl_installment` VALUES (4, 'CH-1676452628', '2', 'nguyên nè', '', '', '', 1000000, 800000, 8, 4, 0, '2023-02-17 00:00:00', '2023-02-17 19:14:30', '', '2', NULL);
INSERT INTO `tbl_installment` VALUES (7, 'CH-1676452628', '2', 'Marta Schroeder', '249-541-9267', '3783 Kuvalis Parkways', '075-996-7475', 9840000, 1300000, 60, 4, 1, '2023-02-17 00:00:00', '2023-02-17 19:17:48', 'Accusamus molestiae aperiam.', '4', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 158 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bảng chi tiết số tiền phải trả theo kế hoạch' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_installment_items
-- ----------------------------
INSERT INTO `tbl_installment_items` VALUES (1, 1, '2023-02-17 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (2, 1, '2023-02-18 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (3, 1, '2023-02-19 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (4, 1, '2023-02-20 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (5, 1, '2023-02-21 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (6, 1, '2023-02-22 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (7, 1, '2023-02-23 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (8, 1, '2023-02-24 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (9, 1, '2023-02-25 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (10, 1, '2023-02-26 00:00:00', 4000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (11, 2, '2023-02-16 00:00:00', 1200000, NULL);
INSERT INTO `tbl_installment_items` VALUES (12, 2, '2023-02-17 00:00:00', 1200000, NULL);
INSERT INTO `tbl_installment_items` VALUES (13, 2, '2023-02-18 00:00:00', 1200000, NULL);
INSERT INTO `tbl_installment_items` VALUES (14, 2, '2023-02-19 00:00:00', 1200000, NULL);
INSERT INTO `tbl_installment_items` VALUES (15, 2, '2023-02-20 00:00:00', 1200000, NULL);
INSERT INTO `tbl_installment_items` VALUES (20, 4, '2023-02-17 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (21, 4, '2023-02-18 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (22, 4, '2023-02-19 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (23, 4, '2023-02-20 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (24, 4, '2023-02-21 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (25, 4, '2023-02-22 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (26, 4, '2023-02-23 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (27, 4, '2023-02-24 00:00:00', 125000, NULL);
INSERT INTO `tbl_installment_items` VALUES (98, 7, '2023-02-17 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (99, 7, '2023-02-18 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (100, 7, '2023-02-19 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (101, 7, '2023-02-20 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (102, 7, '2023-02-21 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (103, 7, '2023-02-22 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (104, 7, '2023-02-23 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (105, 7, '2023-02-24 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (106, 7, '2023-02-25 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (107, 7, '2023-02-26 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (108, 7, '2023-02-27 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (109, 7, '2023-02-28 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (110, 7, '2023-03-01 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (111, 7, '2023-03-02 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (112, 7, '2023-03-03 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (113, 7, '2023-03-04 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (114, 7, '2023-03-05 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (115, 7, '2023-03-06 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (116, 7, '2023-03-07 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (117, 7, '2023-03-08 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (118, 7, '2023-03-09 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (119, 7, '2023-03-10 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (120, 7, '2023-03-11 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (121, 7, '2023-03-12 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (122, 7, '2023-03-13 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (123, 7, '2023-03-14 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (124, 7, '2023-03-15 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (125, 7, '2023-03-16 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (126, 7, '2023-03-17 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (127, 7, '2023-03-18 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (128, 7, '2023-03-19 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (129, 7, '2023-03-20 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (130, 7, '2023-03-21 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (131, 7, '2023-03-22 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (132, 7, '2023-03-23 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (133, 7, '2023-03-24 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (134, 7, '2023-03-25 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (135, 7, '2023-03-26 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (136, 7, '2023-03-27 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (137, 7, '2023-03-28 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (138, 7, '2023-03-29 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (139, 7, '2023-03-30 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (140, 7, '2023-03-31 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (141, 7, '2023-04-01 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (142, 7, '2023-04-02 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (143, 7, '2023-04-03 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (144, 7, '2023-04-04 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (145, 7, '2023-04-05 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (146, 7, '2023-04-06 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (147, 7, '2023-04-07 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (148, 7, '2023-04-08 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (149, 7, '2023-04-09 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (150, 7, '2023-04-10 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (151, 7, '2023-04-11 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (152, 7, '2023-04-12 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (153, 7, '2023-04-13 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (154, 7, '2023-04-14 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (155, 7, '2023-04-15 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (156, 7, '2023-04-16 00:00:00', 164000, NULL);
INSERT INTO `tbl_installment_items` VALUES (157, 7, '2023-04-17 00:00:00', 164000, NULL);

-- ----------------------------
-- Table structure for tbl_profiles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profiles`;
CREATE TABLE `tbl_profiles`  (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `birthday` date NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_profiles
-- ----------------------------
INSERT INTO `tbl_profiles` VALUES (1, 'Admin', 'Administrator', '2021-03-04', '');
INSERT INTO `tbl_profiles` VALUES (2, 'Nguyễn Hoàng', ' Trung', '2023-02-01', '');
INSERT INTO `tbl_profiles` VALUES (4, 'Bình', 'Minh', '2023-02-15', '09123123213');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_profiles_fields
-- ----------------------------
INSERT INTO `tbl_profiles_fields` VALUES (1, 'lastname', 'Họ và tên đệm', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3);
INSERT INTO `tbl_profiles_fields` VALUES (2, 'firstname', 'Tên', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);
INSERT INTO `tbl_profiles_fields` VALUES (3, 'birthday', 'Ngày sinh', 'DATE', 0, 0, 2, '', '', '', '', '1986-01-01', 'UWjuidate', '{\"ui-theme\":\"redmond\"}', 3, 2);
INSERT INTO `tbl_profiles_fields` VALUES (4, 'phone_number', 'Số điện thoại', 'VARCHAR', 20, 0, 0, '', '', '', '', '', '', '', 0, 3);

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
  `balance` float(20, 0) NULL DEFAULT NULL COMMENT 'Tổng số tiền hiện có',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_shops
-- ----------------------------
INSERT INTO `tbl_shops` VALUES ('CH-1676452628', 'Cửa hàng 1', 'Cửa hàng 1', '2023-02-15 16:50:46', '1', '1', 1, NULL);
INSERT INTO `tbl_shops` VALUES ('CH-1676452840', 'Cửa hàng Hà nội', '', '2023-02-15 16:50:46', '1', '', 1, NULL);
INSERT INTO `tbl_shops` VALUES ('CH-1676452856', 'Đống đa', '', '2023-02-15 16:50:46', '1', '', 1, NULL);

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
  `id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'Mã giao dịch thu chi',
  `create_by` int(11) NOT NULL COMMENT 'Người thực hiện (tbl_users)',
  `shop_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Mã cửa hàng thực hiện',
  `customer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Khách hàng, người nhận tiền',
  `amount` float(20, 0) NOT NULL COMMENT 'số tiền',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ghi chú',
  `type` tinyint(4) NOT NULL COMMENT '1= Thu , 2 = Chi',
  `group_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ref (tbl_transaction_group)',
  `create_date` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thời gian tạo',
  `ref_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã tham chiếu tới 1 chứng từ mà liên quan đến giao dich.\r\nVí dụ mã hợp đồng vay ...',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '0: hủy phiếu , 10: đang hoạt động',
  `extra_param_1` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `extra_param_2` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `extra_param_3` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ind_cua_hang_loai_giao_dic`(`type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bảng lưu số liệu thu chi' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transactions
-- ----------------------------
INSERT INTO `tbl_transactions` VALUES (1, 2, 'CH-1676452628', 'kiên nguyễn', 100000000, 'Nhập quỹ ', 1, 'init_payment', '2023-02-17 19:18:44', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (2, 2, 'CH-1676452628', 'Hoàng Tùng', -30000000, 'Khách vay bát họ', 2, 'installment_create', '2023-02-17 19:10:42', '1', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (3, 2, 'CH-1676452628', 'Tuấn Quang', -5000000, 'Khách vay bát họ', 2, 'installment_create', '2023-02-17 19:02:41', '2', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (4, 2, 'CH-1676452628', 'nguyên nè', -800000, 'Khách vay bát họ', 2, 'installment_create', '2023-02-17 19:14:30', '4', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (5, 2, 'CH-1676452628', 'Marta Schroeder', -1300000, 'Khách vay bát họ', 2, 'installment_create', '2023-02-17 19:17:48', '7', NULL, NULL, NULL, NULL);

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
  `shop_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `status`(`status`) USING BTREE,
  INDEX `superuser`(`superuser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '619c1789d8bf136aec0e04541c8d5f32', 1261146094, 1676272112, 1, 1, NULL, NULL);
INSERT INTO `tbl_users` VALUES (2, 'user1', 'e10adc3949ba59abbe56e057f20f883e', '', '8ce320e6bcb14c57ffddf919fdf6976c', 1676454817, 1676454817, 0, 1, 1, 'CH-1676452628');
INSERT INTO `tbl_users` VALUES (4, 'user_2', 'e10adc3949ba59abbe56e057f20f883e', '1676458446@empty.com', '813ef840163cab1731ad915fa8be9e36', 1676458446, 1676458535, 0, 1, 1, 'CH-1676452628');

SET FOREIGN_KEY_CHECKS = 1;
