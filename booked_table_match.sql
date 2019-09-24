/*
 Navicat Premium Data Transfer

 Source Server         : kys
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : japanfoodscomau_dev

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 25/09/2019 02:12:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for booked_table_match
-- ----------------------------
DROP TABLE IF EXISTS `booked_table_match`;
CREATE TABLE `booked_table_match`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NULL DEFAULT NULL,
  `table_id` int(11) NULL DEFAULT NULL,
  `calling_time` datetime(0) NULL DEFAULT NULL,
  `attend_time` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
