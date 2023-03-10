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

 Date: 10/03/2023 18:51:05
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
INSERT INTO `tbl_authassignment` VALUES ('admin_shop', '2', NULL, 'N;');
INSERT INTO `tbl_authassignment` VALUES ('staff', '4', NULL, 'N;');

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
INSERT INTO `tbl_authitem` VALUES ('admin_shop', 2, 'Cửa hàng trưởng', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.*', 1, 'Bát Họ', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Admin', 0, 'Bát Họ - Xem', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Create', 0, 'Bát họ - Tạo HĐ', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Delete', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('AInstallment.Update', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('ASite.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('ASite.Error', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('ASite.Index', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('staff', 2, 'Nhân viên', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Activation.Activation', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.*', 1, 'Quản lý nhân viên', NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Admin', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Create', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Delete', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.Update', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Admin.View', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Default.Index', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Login.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Login.Login', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Logout.*', 1, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Logout.Logout', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Profile.Changepassword', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Profile.Edit', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Profile.Profile', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Admin', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Create', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Delete', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.Update', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.ProfileField.View', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Recovery.Recovery', 0, NULL, NULL, 'N;');
INSERT INTO `tbl_authitem` VALUES ('User.Registration.Registration', 0, NULL, NULL, 'N;');
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
INSERT INTO `tbl_authitemchild` VALUES ('staff', 'AInstallment.*');
INSERT INTO `tbl_authitemchild` VALUES ('admin_shop', 'staff');
INSERT INTO `tbl_authitemchild` VALUES ('admin_shop', 'User.Admin.*');

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
  `start_date` date NOT NULL COMMENT 'ngày bốc họ',
  `create_date` datetime(0) NOT NULL COMMENT 'Ngày tạo hợp đồng',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `manage_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nhân viên thu tiền',
  `status` tinyint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_installment
-- ----------------------------
INSERT INTO `tbl_installment` VALUES (2, 'CH-1676452628', '2', 'hiếu toàn', '', '', '', 20000000, 17000000, 20, 2, 0, '2023-03-10', '2023-03-10 18:16:40', '', '2', 1);

-- ----------------------------
-- Table structure for tbl_installment_items
-- ----------------------------
DROP TABLE IF EXISTS `tbl_installment_items`;
CREATE TABLE `tbl_installment_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `installment_id` int(11) NULL DEFAULT NULL COMMENT 'mã hợp đồng tham chiếu',
  `payment_date` date NULL DEFAULT NULL COMMENT 'Ngày phải đóng tiền theo kế hoạch (ngày họ)',
  `amount` float(20, 0) NULL DEFAULT NULL COMMENT 'Số tiền phải đóng theo kế hoạch (tiền họ)',
  `transaction_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã giao dịch tham chiếu',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bảng chi tiết số tiền phải trả theo kế hoạch' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_installment_items
-- ----------------------------
INSERT INTO `tbl_installment_items` VALUES (1, 1, '2023-03-10', 600000, '419');
INSERT INTO `tbl_installment_items` VALUES (2, 1, '2023-03-11', 600000, '428');
INSERT INTO `tbl_installment_items` VALUES (3, 1, '2023-03-12', 600000, '429');
INSERT INTO `tbl_installment_items` VALUES (4, 1, '2023-03-13', 600000, '430');
INSERT INTO `tbl_installment_items` VALUES (5, 1, '2023-03-14', 600000, '431');
INSERT INTO `tbl_installment_items` VALUES (6, 1, '2023-03-15', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (7, 1, '2023-03-16', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (8, 1, '2023-03-17', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (9, 1, '2023-03-18', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (10, 1, '2023-03-19', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (11, 1, '2023-03-20', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (12, 1, '2023-03-21', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (13, 1, '2023-03-22', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (14, 1, '2023-03-23', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (15, 1, '2023-03-24', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (16, 1, '2023-03-25', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (17, 1, '2023-03-26', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (18, 1, '2023-03-27', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (19, 1, '2023-03-28', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (20, 1, '2023-03-29', 600000, NULL);
INSERT INTO `tbl_installment_items` VALUES (21, 2, '2023-03-10', 2000000, '421');
INSERT INTO `tbl_installment_items` VALUES (22, 2, '2023-03-12', 2000000, '432');
INSERT INTO `tbl_installment_items` VALUES (23, 2, '2023-03-14', 2000000, '');
INSERT INTO `tbl_installment_items` VALUES (24, 2, '2023-03-16', 2000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (25, 2, '2023-03-18', 2000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (26, 2, '2023-03-20', 2000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (27, 2, '2023-03-22', 2000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (28, 2, '2023-03-24', 2000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (29, 2, '2023-03-26', 2000000, NULL);
INSERT INTO `tbl_installment_items` VALUES (30, 2, '2023-03-28', 2000000, NULL);

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
INSERT INTO `tbl_profiles` VALUES (4, 'Bình', 'Minh', '2023-02-01', '09123123213');

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
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `in_out` tinyint(1) NULL DEFAULT NULL COMMENT '1= IN , 2 = OUT',
  `sort_index` tinyint(2) NULL DEFAULT NULL,
  `status` tinyint(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaction_category
-- ----------------------------
INSERT INTO `tbl_transaction_category` VALUES (1, 'Đóng tiền họ', 1, NULL, NULL);

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
  `group_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ref (tbl_transaction_group)',
  `create_date` datetime(0) NOT NULL COMMENT 'Thời gian tạo',
  `ref_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã tham chiếu tới 1 chứng từ mà liên quan đến giao dich.\r\nVí dụ mã hợp đồng vay ...',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '0: hủy phiếu , 10: đang hoạt động',
  `extra_param_1` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `extra_param_2` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `extra_param_3` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_update` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ind_cua_hang_loai_giao_dic`(`type`) USING BTREE,
  INDEX `i_ref_id`(`ref_id`) USING BTREE,
  INDEX `i_shop_id`(`shop_id`) USING BTREE,
  INDEX `i_group_id`(`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 433 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Bảng lưu số liệu thu chi' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transactions
-- ----------------------------
INSERT INTO `tbl_transactions` VALUES (1, 2, 'CH-1676452628', 'kiên nguyễn', 100000000, 'Nhập quỹ ', 1, 'init_payment', '2023-02-17 19:18:44', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (416, 2, 'CH-1676452628', 'tùng toán', -10000000, 'Tạo hợp đồng', 2, 'bh_create', '2023-03-10 18:12:21', '1', NULL, NULL, NULL, NULL, '2023-03-10 18:18:35');
INSERT INTO `tbl_transactions` VALUES (417, 2, 'CH-1676452628', 'tùng toán', 600000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:12:36', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (418, 2, 'CH-1676452628', 'tùng toán', -600000, 'Hủy đóng tiền họ', 2, 'bh_paid_cancel', '2023-03-10 18:13:19', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (419, 2, 'CH-1676452628', 'tùng toán', 600000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:13:31', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (420, 2, 'CH-1676452628', 'hiếu toàn', -17000000, 'Tạo mới hợp đồng', 2, 'bh_create', '2023-03-10 18:16:40', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (421, 2, 'CH-1676452628', 'hiếu toàn', 2000000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:22:12', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (422, 2, 'CH-1676452628', 'hiếu toàn', 2000000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:22:13', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (423, 2, 'CH-1676452628', 'hiếu toàn', 2000000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:22:13', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (424, 2, 'CH-1676452628', 'hiếu toàn', -2000000, 'Hủy đóng tiền họ', 2, 'bh_paid_cancel', '2023-03-10 18:22:19', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (425, 2, 'CH-1676452628', 'hiếu toàn', -2000000, 'Hủy đóng tiền họ', 2, 'bh_paid_cancel', '2023-03-10 18:22:19', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (426, 2, 'CH-1676452628', 'hiếu toàn', -500000, 'Nợ lãi họ', 2, 'bh_increase_debt', '2023-03-10 18:22:29', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (427, 2, 'CH-1676452628', 'tùng toán', 500000, 'Trả nợ lãi họ', 1, 'bh_decrease_debt', '2023-03-10 18:23:04', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (428, 2, 'CH-1676452628', 'tùng toán', 600000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:29:09', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (429, 2, 'CH-1676452628', 'tùng toán', 600000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:29:26', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (430, 2, 'CH-1676452628', 'tùng toán', 600000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:29:26', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (431, 2, 'CH-1676452628', 'tùng toán', 600000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:29:26', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tbl_transactions` VALUES (432, 2, 'CH-1676452628', 'hiếu toàn', 2000000, 'Đóng tiền họ', 1, 'bh_paid', '2023-03-10 18:37:06', '2', NULL, NULL, NULL, NULL, NULL);

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
INSERT INTO `tbl_users` VALUES (2, 'admin_shop_1', 'e10adc3949ba59abbe56e057f20f883e', '', '7a71eb19bf97e30e832bf5ea94ae36ec', 1676454817, 1676454817, 0, 1, 1, 'CH-1676452628');
INSERT INTO `tbl_users` VALUES (4, 'nv_shop_1', 'e10adc3949ba59abbe56e057f20f883e', '1676458446@empty.com', '39ce1fd61141a86fa594506f1de10098', 1676458446, 1676861604, 0, 1, 1, 'CH-1676452628');

SET FOREIGN_KEY_CHECKS = 1;
