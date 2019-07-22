/*
Navicat MySQL Data Transfer

Source Server         : MyDb
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : homestead

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2019-07-22 17:30:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for order_dish_match
-- ----------------------------
DROP TABLE IF EXISTS `order_dish_match`;
CREATE TABLE `order_dish_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `dish_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `dish_price` double(10,2) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `ready_flag` int(1) NOT NULL,
  `ready_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;
SET FOREIGN_KEY_CHECKS=1;
