/*
 Navicat MySQL Data Transfer

 Source Server         : db
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : homestead

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 27/09/2019 22:31:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for receipt
-- ----------------------------
DROP TABLE IF EXISTS `receipt`;
CREATE TABLE `receipt`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `abn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gst` double(10, 2) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `lang_jp` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '1',
  `lang_kr` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `lang_cn` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '1',
  `password_menu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_takeawaymenu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_kitchen` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reception` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_duration` int(11) DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of receipt
-- ----------------------------
INSERT INTO `receipt` VALUES ('1', 'KUROMATSU', '21619810203', '294-296 Blackburn Rd, Doncaster East VIC 3109', '03 9841 8080', 'logo.png', '10.00', '5', '1', '0', '1', '$2y$10$CP4BarzhoZrbjL/Hy/yJreVu40.zwpF27xCQR2NU1uAzAtGcx0oia', '$2y$10$CP4BarzhoZrbjL/Hy/yJreVu40.zwpF27xCQR2NU1uAzAtGcx0oia', '$2y$10$JlB7vIFLOfQWFiGpunIiPuIDuCyliudRFrXFaBZl6F0FJ1i9hnRh2', '$2y$10$CgI6sEC3i43UnPnMolPBZut/3sYvXLBUAP2VrkWJB2491QyyjePba', '$2y$10$pS2NLdcJtNWfPkBF.SH/duwygTuxPGQ/sN/l9PbTxhbDhZFacaRB.', NULL, '192.168.192.100', '192.168.192.150', 'manager@kuromatsu.com.au', '2019-09-27 20:42:19', '2019-09-27 20:42:19');

SET FOREIGN_KEY_CHECKS = 1;
