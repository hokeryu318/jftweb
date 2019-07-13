/*
Navicat MySQL Data Transfer

Source Server         : MyDb
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : homestead

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2019-07-12 01:49:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for order_pay
-- ----------------------------
DROP TABLE IF EXISTS `order_pay`;
CREATE TABLE `order_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `tip` double(50,2) DEFAULT NULL,
  `sub_total` double(50,2) DEFAULT NULL,
  `discount` double(50,2) DEFAULT NULL,
  `total` double(50,2) DEFAULT NULL,
  `without_gst` double(50,2) DEFAULT NULL,
  `gst` double(50,2) DEFAULT NULL,
  `pay_method` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` double(50,2) DEFAULT NULL,
  `amount` double(50,2) DEFAULT NULL,
  `change` double(50,2) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of order_pay
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
