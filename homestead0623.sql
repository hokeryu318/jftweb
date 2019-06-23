/*
Navicat MySQL Data Transfer

Source Server         : myLocalDB
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : homestead

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2019-06-23 15:27:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for attend_kitchen_history
-- ----------------------------
DROP TABLE IF EXISTS `attend_kitchen_history`;
CREATE TABLE `attend_kitchen_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `calling_time` datetime DEFAULT NULL,
  `attend_time` datetime DEFAULT NULL,
  `attended_time` int(5) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of attend_kitchen_history
-- ----------------------------
INSERT INTO `attend_kitchen_history` VALUES ('1', '1', '1', null, null, null, '2019-05-19 11:44:55', '2019-05-19 09:22:44');
INSERT INTO `attend_kitchen_history` VALUES ('2', '1', '4', null, null, null, '2019-05-20 02:36:44', '2019-05-19 09:22:44');
INSERT INTO `attend_kitchen_history` VALUES ('3', '2', '2', null, null, null, '2019-05-19 14:40:15', '2019-05-19 11:15:57');
INSERT INTO `attend_kitchen_history` VALUES ('4', '3', '3', null, null, null, '2019-05-20 02:36:48', '2019-05-19 14:41:21');

-- ----------------------------
-- Table structure for attend_recept_history
-- ----------------------------
DROP TABLE IF EXISTS `attend_recept_history`;
CREATE TABLE `attend_recept_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `calling_time` datetime DEFAULT NULL,
  `attend_time` datetime DEFAULT NULL,
  `attended_time` int(5) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of attend_recept_history
-- ----------------------------
INSERT INTO `attend_recept_history` VALUES ('1', '1', '1', null, null, null, '2019-05-19 11:44:55', '2019-05-19 09:22:44');
INSERT INTO `attend_recept_history` VALUES ('2', '1', '4', null, null, null, '2019-05-20 02:36:44', '2019-05-19 09:22:44');
INSERT INTO `attend_recept_history` VALUES ('3', '2', '2', null, null, null, '2019-05-19 14:40:15', '2019-05-19 11:15:57');
INSERT INTO `attend_recept_history` VALUES ('4', '3', '3', null, null, null, '2019-05-20 02:36:48', '2019-05-19 14:41:21');

-- ----------------------------
-- Table structure for badges
-- ----------------------------
DROP TABLE IF EXISTS `badges`;
CREATE TABLE `badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of badges
-- ----------------------------
INSERT INTO `badges` VALUES ('16', 'Special', 'Special.png', '1', '2019-06-16 14:22:01', '2019-06-16 06:22:01');
INSERT INTO `badges` VALUES ('17', 'hhh', 'infantino-teether-toy.jpg', '1', '2019-06-16 14:22:01', '2019-06-16 06:22:01');
INSERT INTO `badges` VALUES ('18', 'durpul', 'druplicon_2.png', '1', '2019-06-16 14:22:01', '2019-06-16 06:22:01');
INSERT INTO `badges` VALUES ('19', 'generic', 'generic-avatar.jpg', '1', '2019-06-16 14:22:01', '2019-06-16 06:22:01');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_kr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `has_subs` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('8', 'SPECIALS', 'SPECIALS1', 'SPECIALS2', null, null, '1', '2019-06-18 16:44:15', '2019-06-18 08:44:15');
INSERT INTO `categories` VALUES ('9', 'Summer Specials', 'Summer Specials', 'Summer Specials', null, null, '1', '2019-04-13 01:45:53', '2019-04-12 17:45:53');
INSERT INTO `categories` VALUES ('10', 'Nibbles / Salad', 'Nibbles / Salad', 'Nibbles / Salad', null, null, null, '2019-03-12 20:16:49', '2019-03-12 20:16:49');
INSERT INTO `categories` VALUES ('11', 'Main Dish', 'Main Dish', 'Main Dish', null, null, '1', '2019-03-13 04:17:54', '2019-03-12 20:17:54');
INSERT INTO `categories` VALUES ('12', 'Grilled', 'Grilled', 'Grilled', null, '11', null, '2019-03-12 20:17:54', '2019-03-12 20:17:54');
INSERT INTO `categories` VALUES ('13', 'Deep-fried', 'Deep-fried', 'Deep-fried', null, '11', null, '2019-03-12 20:18:11', '2019-03-12 20:18:11');
INSERT INTO `categories` VALUES ('14', 'Seefood', 'Seefood', 'Seefood', null, '11', null, '2019-03-12 20:18:25', '2019-03-12 20:18:25');
INSERT INTO `categories` VALUES ('15', 'Tempura', 'Tempura', 'Tempura', null, '11', null, '2019-03-12 20:18:37', '2019-03-12 20:18:37');
INSERT INTO `categories` VALUES ('18', 'Hot Pot', 'Hot Pot', 'Hot Pot', null, null, '1', '2019-06-17 20:09:35', '2019-06-17 12:09:35');
INSERT INTO `categories` VALUES ('19', 'Rice Dish', 'Rice Dish', 'Rice Dish', null, null, null, '2019-03-12 20:21:00', '2019-03-12 20:21:00');
INSERT INTO `categories` VALUES ('20', 'Desserts', 'Desserts', 'Desserts', null, null, null, '2019-03-12 20:21:18', '2019-03-12 20:21:18');
INSERT INTO `categories` VALUES ('103', 'Child summer', 'Child summer1', 'Child summer2', null, '9', null, '2019-05-19 07:18:20', '2019-05-19 07:18:20');
INSERT INTO `categories` VALUES ('105', 'a1', null, null, null, '18', null, '2019-06-17 12:09:35', '2019-06-17 12:09:35');
INSERT INTO `categories` VALUES ('106', 'a2', null, null, null, '18', null, '2019-06-17 12:09:44', '2019-06-17 12:09:44');
INSERT INTO `categories` VALUES ('107', 'a3', null, null, null, '18', null, '2019-06-17 12:09:49', '2019-06-17 12:09:49');
INSERT INTO `categories` VALUES ('108', 'a4', null, null, null, '18', null, '2019-06-17 12:09:55', '2019-06-17 12:09:55');
INSERT INTO `categories` VALUES ('109', 'a5', null, null, null, '18', null, '2019-06-17 12:10:00', '2019-06-17 12:10:00');
INSERT INTO `categories` VALUES ('110', 'a6', null, null, null, '18', null, '2019-06-17 12:10:05', '2019-06-17 12:10:05');
INSERT INTO `categories` VALUES ('111', 'a7', null, null, null, '18', null, '2019-06-17 12:10:13', '2019-06-17 12:10:13');
INSERT INTO `categories` VALUES ('112', 'a8', null, null, null, '18', null, '2019-06-17 12:10:19', '2019-06-17 12:10:19');
INSERT INTO `categories` VALUES ('115', '111', null, null, null, '8', null, '2019-06-18 08:44:15', '2019-06-18 08:44:15');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of customers
-- ----------------------------

-- ----------------------------
-- Table structure for discounts
-- ----------------------------
DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_id` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `end` datetime DEFAULT NULL,
  `end_type` smallint(6) DEFAULT NULL COMMENT '0:In progress, 1: Ended, 2:From Now, 3: Unlimited',
  `discount` double(10,2) DEFAULT NULL,
  `timeslot_breakfast` smallint(6) DEFAULT NULL,
  `timeslot_lunch` smallint(6) DEFAULT NULL,
  `timeslot_tea` smallint(6) DEFAULT NULL,
  `timeslot_dinner` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of discounts
-- ----------------------------
INSERT INTO `discounts` VALUES ('2', '2', '2019-04-13 23:25:44', '2030-01-01 00:00:00', '0', '22.00', '0', '1', '1', '0', '2019-03-10 18:15:43', '2019-04-13 15:25:44');
INSERT INTO `discounts` VALUES ('3', '4', '2019-04-12 12:48:45', '2019-04-12 12:48:45', '4', '130.00', '0', '0', '0', '0', '2019-03-18 09:47:13', '2019-04-12 12:48:45');
INSERT INTO `discounts` VALUES ('8', '3', '2019-04-13 00:00:00', '2019-04-21 00:00:00', '0', '195.00', '0', '0', '0', '0', '2019-04-12 17:42:41', '2019-04-12 17:44:14');
INSERT INTO `discounts` VALUES ('9', '5', '2019-04-13 18:29:43', '2019-04-12 18:58:00', '3', '15.00', '0', '0', '0', '0', '2019-04-12 18:58:15', '2019-04-13 10:15:33');
INSERT INTO `discounts` VALUES ('10', '6', '2019-04-13 18:30:10', '2030-01-01 00:00:00', '2', '18.00', '1', '1', '1', '1', '2019-04-13 14:30:53', '2019-04-13 10:15:43');
INSERT INTO `discounts` VALUES ('11', '8', '2019-06-17 16:10:36', '2019-06-17 16:10:36', '0', '13.00', '0', '0', '0', '0', '2019-06-17 16:11:05', '2019-06-17 16:11:05');
INSERT INTO `discounts` VALUES ('12', '9', '2019-06-17 16:11:10', '2019-06-17 16:11:10', '0', '14.00', '0', '0', '0', '0', '2019-06-17 16:11:19', '2019-06-17 16:11:19');
INSERT INTO `discounts` VALUES ('14', '1', '2019-06-18 05:14:05', '2019-06-18 05:00:00', '2', '114.00', '0', '0', '0', '0', '2019-06-18 05:14:05', '2019-06-18 05:14:05');

-- ----------------------------
-- Table structure for dishes
-- ----------------------------
DROP TABLE IF EXISTS `dishes`;
CREATE TABLE `dishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_kr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc_kr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `badge_id` int(11) DEFAULT NULL,
  `eatin_breakfast` smallint(1) DEFAULT NULL,
  `eatin_lunch` smallint(1) DEFAULT NULL,
  `eatin_tea` smallint(1) DEFAULT NULL,
  `eatin_dinner` smallint(1) DEFAULT NULL,
  `takeaway_breakfast` smallint(1) DEFAULT NULL,
  `takeaway_lunch` smallint(1) DEFAULT NULL,
  `takeaway_tea` smallint(1) DEFAULT NULL,
  `takeaway_dinner` smallint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_out` smallint(1) DEFAULT NULL,
  `active` smallint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `category` (`category_id`) USING BTREE,
  KEY `scategory` (`sub_category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dishes
-- ----------------------------
INSERT INTO `dishes` VALUES ('1', 'Chicken Katsu (Schnitzel) + Japanese BBQ sauce', 'dish1_1', 'dish1_2', null, 'this is dish1', 'this is dish1_1', 'this is dish1_2', null, '121.00', null, null, '7', '16', '1', '0', '1', '0', '0', '0', '0', '0', 'food4.jpg', '0', '0', '2019-06-17 16:13:29', '2019-06-17 08:13:29');
INSERT INTO `dishes` VALUES ('2', 'dish2', 'dish2_1', 'dish2_2', null, 'dish2', 'dish2', 'dish2', null, '25.00', null, null, '7', '16', '1', '1', '1', '1', '1', '1', '1', '1', 'food7.jpg', '1', '1', '2019-05-19 07:37:40', '2019-05-19 07:37:40');
INSERT INTO `dishes` VALUES ('3', 'dish3', 'dish3_1', 'dish3_2', null, 'dish3', 'dish3', 'dish3', null, '200.00', null, null, '7', '16', '1', '1', '1', '1', '0', '0', '0', '0', 'food2.jpg', '0', '1', '2019-05-19 07:37:38', '2019-05-19 07:37:38');
INSERT INTO `dishes` VALUES ('4', 'Bento Lunch Box A', 'Bento Lunch Box A_1', 'Bento Lunch Box A_2', null, 'This is description of Bento Lunch Box A.', 'This is description of Bento Lunch Box A._1', 'This is description of Bento Lunch Box A._2', null, '150.00', null, null, '7', '16', '0', '1', '1', '0', '0', '0', '1', '1', 'food8.jpg', '0', '1', '2019-05-19 07:59:46', '2019-05-19 07:59:46');
INSERT INTO `dishes` VALUES ('5', 'dish5', 'dish5_1', 'dish5_2', null, 'dish5', 'dish5', 'dish5', null, '300.00', null, null, '7', '16', '0', '1', '1', '0', '0', '0', '1', '1', 'food3.jpg', '1', '1', '2019-05-19 07:37:35', '2019-05-19 07:37:35');
INSERT INTO `dishes` VALUES ('6', 'dish6', 'dish6_1', 'dish6_2', null, 'dish6', 'dish6_1', 'dish6', null, '40.00', null, null, '7', '16', '0', '1', '1', '0', '1', '0', '0', '0', 'food9.jpg', '0', '1', '2019-05-19 08:03:21', '2019-05-19 08:03:21');
INSERT INTO `dishes` VALUES ('7', 'second group dish', 'second group dish_1', 'second group dish_2', null, 'second group dish', 'second group dish', 'second group dish', null, '100.00', null, null, '8', '16', '0', '0', '0', '0', '0', '0', '0', '0', 'food9.jpg', '0', '1', '2019-05-19 07:37:29', '2019-05-19 07:37:29');
INSERT INTO `dishes` VALUES ('8', 'second group dish1', 'second group dish1_1', 'second group dish1_2', null, 'second group dish1', 'second group dish1', 'second group dish1', null, '20.00', null, null, '8', '18', '0', '0', '0', '0', '0', '0', '0', '0', 'food10.jpg', '1', '1', '2019-05-19 07:37:28', '2019-05-19 07:37:28');
INSERT INTO `dishes` VALUES ('9', 'omakase 7', 'Nigiri 7pc set', 'おまかせ', null, 'A set of 7pc popular Nigiri Sushi (1 serve).', '握寿司七貫盛。是人気。一人前。', '人気の握り七巻盛りです。', null, '15.40', null, null, '9', '16', '0', '1', '0', '1', '0', '0', '0', '0', 'food2.jpg', '0', '1', '2019-04-26 18:31:54', '2019-04-26 10:31:54');

-- ----------------------------
-- Table structure for dish_category_match
-- ----------------------------
DROP TABLE IF EXISTS `dish_category_match`;
CREATE TABLE `dish_category_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `dish_id` int(11) NOT NULL COMMENT 'Dish Primary Key',
  `categories_id` int(11) NOT NULL COMMENT 'Category Primary Key',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dish_category_match
-- ----------------------------
INSERT INTO `dish_category_match` VALUES ('186', '4', '13', '2019-03-28 17:48:02', '2019-03-28 17:48:02');
INSERT INTO `dish_category_match` VALUES ('188', '4', '8', '2019-03-28 17:48:02', '2019-03-28 17:48:02');
INSERT INTO `dish_category_match` VALUES ('189', '4', '12', '2019-03-28 17:48:02', '2019-03-28 17:48:02');
INSERT INTO `dish_category_match` VALUES ('191', '5', '13', '2019-03-28 17:48:16', '2019-03-28 17:48:16');
INSERT INTO `dish_category_match` VALUES ('192', '5', '12', '2019-03-28 17:48:16', '2019-03-28 17:48:16');
INSERT INTO `dish_category_match` VALUES ('194', '6', '13', '2019-03-28 17:48:27', '2019-03-28 17:48:27');
INSERT INTO `dish_category_match` VALUES ('196', '6', '8', '2019-03-28 17:48:27', '2019-03-28 17:48:27');
INSERT INTO `dish_category_match` VALUES ('197', '6', '12', '2019-03-28 17:48:27', '2019-03-28 17:48:27');
INSERT INTO `dish_category_match` VALUES ('198', '2', '12', '2019-03-28 18:31:19', '2019-03-28 18:31:19');
INSERT INTO `dish_category_match` VALUES ('210', '16', '12', '2019-04-11 09:17:49', '2019-04-11 09:17:49');
INSERT INTO `dish_category_match` VALUES ('222', '4', '14', '2019-04-11 10:13:15', '2019-04-11 10:13:15');
INSERT INTO `dish_category_match` VALUES ('223', '6', '14', '2019-04-11 10:13:15', '2019-04-11 10:13:15');
INSERT INTO `dish_category_match` VALUES ('252', '9', '8', '2019-04-26 10:31:54', '2019-04-26 10:31:54');
INSERT INTO `dish_category_match` VALUES ('255', '6', '103', '2019-05-10 11:01:41', '2019-05-10 11:01:41');
INSERT INTO `dish_category_match` VALUES ('256', '7', '103', '2019-05-10 11:01:41', '2019-05-10 11:01:41');
INSERT INTO `dish_category_match` VALUES ('259', '1', '12', '2019-05-14 10:27:44', '2019-05-14 10:27:44');
INSERT INTO `dish_category_match` VALUES ('262', '3', '12', '2019-06-17 10:54:23', '2019-06-17 10:54:23');
INSERT INTO `dish_category_match` VALUES ('263', '2', '9', '2019-06-17 11:11:47', '2019-06-17 11:11:47');
INSERT INTO `dish_category_match` VALUES ('264', '1', '9', '2019-06-17 11:11:47', '2019-06-17 11:11:47');
INSERT INTO `dish_category_match` VALUES ('265', '3', '9', '2019-06-17 11:11:47', '2019-06-17 11:11:47');
INSERT INTO `dish_category_match` VALUES ('275', '1', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('276', '2', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('277', '3', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('278', '4', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('279', '5', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('280', '6', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('281', '7', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('282', '8', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('283', '9', '105', '2019-06-17 14:11:29', '2019-06-17 14:11:29');
INSERT INTO `dish_category_match` VALUES ('284', '1', '115', '2019-06-18 08:44:33', '2019-06-18 08:44:33');

-- ----------------------------
-- Table structure for dish_option_match
-- ----------------------------
DROP TABLE IF EXISTS `dish_option_match`;
CREATE TABLE `dish_option_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dish_option_match
-- ----------------------------
INSERT INTO `dish_option_match` VALUES ('243', '4', '3', '2019-03-28 17:48:02', '2019-03-28 17:48:02');
INSERT INTO `dish_option_match` VALUES ('244', '4', '4', '2019-03-28 17:48:02', '2019-03-28 17:48:02');
INSERT INTO `dish_option_match` VALUES ('245', '5', '3', '2019-03-28 17:48:16', '2019-03-28 17:48:16');
INSERT INTO `dish_option_match` VALUES ('246', '5', '4', '2019-03-28 17:48:16', '2019-03-28 17:48:16');
INSERT INTO `dish_option_match` VALUES ('247', '6', '3', '2019-03-28 17:48:27', '2019-03-28 17:48:27');
INSERT INTO `dish_option_match` VALUES ('248', '6', '4', '2019-03-28 17:48:28', '2019-03-28 17:48:28');
INSERT INTO `dish_option_match` VALUES ('249', '2', '1', '2019-03-28 18:31:19', '2019-03-28 18:31:19');
INSERT INTO `dish_option_match` VALUES ('250', '2', '2', '2019-03-28 18:31:19', '2019-03-28 18:31:19');
INSERT INTO `dish_option_match` VALUES ('265', '7', '1', '2019-03-29 13:05:31', '2019-03-29 13:05:31');
INSERT INTO `dish_option_match` VALUES ('266', '7', '2', '2019-03-29 13:05:31', '2019-03-29 13:05:31');
INSERT INTO `dish_option_match` VALUES ('268', '8', '1', '2019-04-11 09:49:21', '2019-04-11 09:49:21');
INSERT INTO `dish_option_match` VALUES ('269', '8', '2', '2019-04-11 09:49:21', '2019-04-11 09:49:21');
INSERT INTO `dish_option_match` VALUES ('286', '9', '2', '2019-04-26 10:31:54', '2019-04-26 10:31:54');
INSERT INTO `dish_option_match` VALUES ('289', '1', '1', '2019-05-14 10:27:44', '2019-05-14 10:27:44');
INSERT INTO `dish_option_match` VALUES ('290', '1', '2', '2019-05-14 10:27:44', '2019-05-14 10:27:44');
INSERT INTO `dish_option_match` VALUES ('293', '3', '1', '2019-06-17 10:54:23', '2019-06-17 10:54:23');
INSERT INTO `dish_option_match` VALUES ('294', '3', '2', '2019-06-17 10:54:23', '2019-06-17 10:54:23');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('7', 'Kitchen', '2019-01-09 20:19:58', '2019-01-09 20:19:58');
INSERT INTO `groups` VALUES ('8', 'Grill', '2019-01-09 20:19:58', '2019-01-09 20:19:58');
INSERT INTO `groups` VALUES ('9', 'Sushi 1', '2019-01-09 20:19:59', '2019-01-09 20:19:59');
INSERT INTO `groups` VALUES ('10', 'Sushi 2', '2019-01-09 20:20:11', '2019-01-09 20:20:11');
INSERT INTO `groups` VALUES ('11', 'Fry', '2019-01-09 20:20:22', '2019-01-09 20:20:22');
INSERT INTO `groups` VALUES ('12', 'Drink & Dessert', '2019-01-09 20:20:22', '2019-01-09 20:20:22');

-- ----------------------------
-- Table structure for holidays
-- ----------------------------
DROP TABLE IF EXISTS `holidays`;
CREATE TABLE `holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of holidays
-- ----------------------------
INSERT INTO `holidays` VALUES ('2', '01 Jan 2018', '2018-12-29 14:06:11', '2018-12-29 14:06:11');
INSERT INTO `holidays` VALUES ('3', '16 Feb 2018', '2018-12-29 14:06:11', '2018-12-29 14:06:11');
INSERT INTO `holidays` VALUES ('4', '15 Apr 2018', '2018-12-29 14:06:11', '2018-12-29 14:06:11');
INSERT INTO `holidays` VALUES ('5', '01 May 2018', '2018-12-29 14:06:11', '2018-12-29 14:06:11');

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `option` (`option_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('31', '1', 'Soy Sauce', null, null, '0', '2019-03-15 16:32:17', '2019-03-15 16:32:17');
INSERT INTO `items` VALUES ('32', '1', 'Tamari', null, null, '0', '2019-03-15 16:32:17', '2019-03-15 16:32:17');
INSERT INTO `items` VALUES ('33', '1', 'Gomadare', '0.50', null, '0', '2019-03-16 02:48:57', '2019-03-15 18:48:57');
INSERT INTO `items` VALUES ('34', '1', 'Spicy Teriyaki', '0.50', null, '0', '2019-03-16 00:33:00', '2019-03-15 16:33:00');
INSERT INTO `items` VALUES ('35', '1', 'Ponzu', '1.00', null, '0', '2019-03-16 00:33:29', '2019-03-15 16:33:29');
INSERT INTO `items` VALUES ('36', '2', 'Yes', null, null, '0', '2019-03-15 16:42:19', '2019-03-15 16:42:19');
INSERT INTO `items` VALUES ('37', '2', 'No', '-0.10', null, '0', '2019-03-15 16:42:19', '2019-03-15 16:42:19');
INSERT INTO `items` VALUES ('38', '3', 'Japanese Vegetable Soup', '-0.50', 'vegetable2_soup.jpg', '0', '2019-03-19 05:46:20', '2019-03-18 21:46:20');
INSERT INTO `items` VALUES ('39', '3', 'American Vegetable Soup', '2.00', 'vegetable1_soup.jpg', '0', '2019-03-17 19:06:28', '2019-03-17 11:06:28');
INSERT INTO `items` VALUES ('40', '3', 'Italian Vegetable Soup', '1.50', 'vegetable3_soup.jpg', '0', '2019-03-17 19:06:28', '2019-03-17 11:06:28');
INSERT INTO `items` VALUES ('41', '3', 'Japanese Meat Soup', '1.00', 'chicken soup.jpg', '0', '2019-03-17 19:06:28', '2019-03-17 11:06:28');
INSERT INTO `items` VALUES ('42', '3', 'American Meat Soup', '0.70', 'beef_soup.jpg', '0', '2019-03-17 19:06:28', '2019-03-17 11:06:28');
INSERT INTO `items` VALUES ('43', '3', 'Italian Meat Soup', null, 'pork soup.jpg', '0', '2019-03-19 22:52:51', '2019-03-19 14:52:51');
INSERT INTO `items` VALUES ('44', '4', 'Japanese Kimchi', '0.20', 'kimchi1.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('45', '4', 'American Kimchi', null, 'kimchi2.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('46', '4', 'Italian Kimchi', '0.10', 'kimchi3.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('47', '4', 'Japanese Potato Dish', null, 'potato_food1.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('48', '4', 'American Potato Dish', null, 'potato_food2.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('49', '4', 'Italian Potato Dish', null, 'potato_food3.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('50', '4', 'Japanese Tomato Dish', '0.10', 'tomato_food1.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('51', '4', 'American Tomato Dish', '0.20', 'tomato_food2.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('52', '4', 'Italian Tomato Dish', '0.30', 'tomato_food3.jpg', '0', '2019-03-17 11:09:50', '2019-03-17 11:09:50');
INSERT INTO `items` VALUES ('53', '5', 'Apple', '0.10', 'apple.jpg', '0', '2019-03-22 05:07:42', '2019-03-22 05:07:42');
INSERT INTO `items` VALUES ('54', '5', 'Graph', '0.20', 'graph.jpg', '0', '2019-03-22 05:07:42', '2019-03-22 05:07:42');
INSERT INTO `items` VALUES ('55', '5', 'Strawberry', '0.40', 'Strawberry.jpg', '0', '2019-03-22 05:07:42', '2019-03-22 05:07:42');
INSERT INTO `items` VALUES ('56', '5', 'Orange', '0.05', 'orange.jpg', '0', '2019-03-22 05:07:43', '2019-03-22 05:07:43');
INSERT INTO `items` VALUES ('57', '5', 'Comprehensive fruit', '1.00', 'comprehensive fruit.jpg', '0', '2019-03-22 05:07:43', '2019-03-22 05:07:43');
INSERT INTO `items` VALUES ('78', '6', 'www', '232.00', null, '0', '2019-04-18 09:50:54', '2019-04-18 09:50:54');
INSERT INTO `items` VALUES ('79', '7', 'ww', '12.00', null, '0', '2019-04-18 10:10:43', '2019-04-18 10:10:43');

-- ----------------------------
-- Table structure for mail
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mail
-- ----------------------------
INSERT INTO `mail` VALUES ('1', 'first mail', '2019-06-16 23:44:18', '2019-06-16 23:44:18');
INSERT INTO `mail` VALUES ('2', 'Hello, this is second mail.', '2019-06-16 23:44:56', '2019-06-16 23:44:56');
INSERT INTO `mail` VALUES ('3', 'Ahh , this third mail.', '2019-06-16 23:44:56', '2019-06-16 23:44:56');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_05_28_100743_create_websockets_statistics_entries_table', '2');

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name_kr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name_jp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multi_select` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_selection` int(11) DEFAULT NULL,
  `photo_visible` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('1', 'Sauce', 'Sauce', 'Sauce_1', null, 'Sauce_2', '0', null, '0', '2019-05-19 07:47:40', '2019-05-19 07:47:40');
INSERT INTO `options` VALUES ('2', 'Wasabi', 'Wasabi', 'Wasabi_1', null, 'Wasabi_2', '0', null, '0', '2019-05-19 07:47:41', '2019-05-19 07:47:41');
INSERT INTO `options` VALUES ('3', 'Main Dish', 'Main Dish', 'Main Dish_1', null, 'Main Dish_2', '1', '1', '1', '2019-05-19 07:47:42', '2019-05-19 07:47:42');
INSERT INTO `options` VALUES ('4', 'Side Dish', 'Side Dish', 'Side Dish_1', null, 'Side Dish_2', '1', '2', '1', '2019-05-19 07:47:42', '2019-05-19 07:47:42');
INSERT INTO `options` VALUES ('5', 'Fruit', 'Fruit', 'Fruit_1', null, 'Fruit_2', '1', '3', '1', '2019-05-19 07:47:43', '2019-05-19 07:47:43');
INSERT INTO `options` VALUES ('6', 'test', 'test', 'test_1', null, 'test_2', '0', null, '0', '2019-05-19 07:47:46', '2019-05-19 07:47:46');
INSERT INTO `options` VALUES ('7', 'ss', 'ss', 'ss_1', null, 'ss_2', '0', null, '0', '2019-05-19 07:47:58', '2019-05-19 07:47:58');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `guest` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `review_type` int(11) DEFAULT NULL,
  `review` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_flag` int(1) NOT NULL DEFAULT '0',
  `table_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='pay_flag : 0 - ready to pay\r\n                  1 - pay finish\r\n                  2 - move seat ';

-- ----------------------------
-- Records of orders
-- ----------------------------

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
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of order_dish_match
-- ----------------------------

-- ----------------------------
-- Table structure for order_option_match
-- ----------------------------
DROP TABLE IF EXISTS `order_option_match`;
CREATE TABLE `order_option_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_dish_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of order_option_match
-- ----------------------------

-- ----------------------------
-- Table structure for order_pay
-- ----------------------------
DROP TABLE IF EXISTS `order_pay`;
CREATE TABLE `order_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
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

-- ----------------------------
-- Table structure for order_table_match
-- ----------------------------
DROP TABLE IF EXISTS `order_table_match`;
CREATE TABLE `order_table_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `calling_time` datetime DEFAULT NULL,
  `attend_time` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of order_table_match
-- ----------------------------

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES ('1', 'DEBIT', '1', '2019-01-03 05:57:30', '2019-01-03 05:57:30');
INSERT INTO `payments` VALUES ('3', 'AMEX', '3', '2019-01-03 16:27:05', '2019-01-03 08:27:05');
INSERT INTO `payments` VALUES ('4', 'UNION PAY', '4', '2019-01-03 16:27:05', '2019-01-03 08:27:05');
INSERT INTO `payments` VALUES ('13', 'VISA / MASTER', '2', '2019-01-03 16:27:05', '2019-01-03 08:27:05');
INSERT INTO `payments` VALUES ('19', 'OTHERS', '5', '2019-06-16 12:56:59', '2019-06-16 04:56:59');

-- ----------------------------
-- Table structure for receipt
-- ----------------------------
DROP TABLE IF EXISTS `receipt`;
CREATE TABLE `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gst` double(10,2) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `lang_jp` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `lang_kr` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '0',
  `lang_cn` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `password_menu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_kitchen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reception` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_duration` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of receipt
-- ----------------------------
INSERT INTO `receipt` VALUES ('1', 'NISHIKIAN', 'Japanese Izakaya Dining', 'Tokyo', '(+81) 335 - 235 -1234', 'logo.png', '10.00', '1', '1', '0', '1', '$2y$10$CP4BarzhoZrbjL/Hy/yJreVu40.zwpF27xCQR2NU1uAzAtGcx0oia', '$2y$10$JlB7vIFLOfQWFiGpunIiPuIDuCyliudRFrXFaBZl6F0FJ1i9hnRh2', '$2y$10$CgI6sEC3i43UnPnMolPBZut/3sYvXLBUAP2VrkWJB2491QyyjePba', '$2y$10$pS2NLdcJtNWfPkBF.SH/duwygTuxPGQ/sN/l9PbTxhbDhZFacaRB.', null, '192.168.1.4', '2019-06-17 08:09:48', '2019-06-17 00:09:48');

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `width` float(255,0) DEFAULT NULL,
  `height` float(255,0) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('1', '2000', '1000', '2019-06-15 19:19:48', '2019-06-15 11:19:48');

-- ----------------------------
-- Table structure for tables
-- ----------------------------
DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` int(5) NOT NULL COMMENT 'x-coordinate',
  `y` int(5) NOT NULL COMMENT 'y-coordinate',
  `type` tinyint(1) DEFAULT NULL COMMENT '1: Table   2: Line',
  `index` tinyint(1) DEFAULT NULL COMMENT 'Line Index',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tables
-- ----------------------------
INSERT INTO `tables` VALUES ('1', '1', '1', '0', '0', 'A-1', '2019-06-15 05:05:47', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('2', '15', '1', '1', '0', 'small table1', '2019-05-05 09:28:19', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('3', '22', '0', '2', '0', 'small table2', '2019-05-05 09:28:19', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('4', '8', '1', '0', '0', 'small table0-2', '2019-05-05 09:28:19', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('5', '1', '8', '3', '0', 'mid table3-1', '2019-05-05 09:28:19', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('6', '8', '8', '3', '0', 'mid table3-2', '2019-05-05 09:28:19', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('7', '15', '8', '4', '0', 'mid table4-1', '2019-05-05 09:28:19', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('8', '22', '8', '4', '0', 'mid table4-2', '2019-06-15 10:40:39', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('9', '1', '17', '9', '1', 'Line', '2019-05-05 09:39:25', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('10', '11', '17', '9', '1', 'Line', '2019-05-05 09:39:25', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('11', '13', '17', '9', '2', 'Line', '2019-05-05 09:39:25', '2019-05-05 09:28:19');
INSERT INTO `tables` VALUES ('13', '1', '39', '9', '1', 'Line', '2019-05-05 09:44:14', '2019-05-05 09:29:39');
INSERT INTO `tables` VALUES ('14', '11', '39', '9', '1', 'Line', '2019-05-05 09:44:14', '2019-05-05 09:29:39');
INSERT INTO `tables` VALUES ('15', '2', '18', '5', '0', 'big table 5', '2019-05-05 09:40:20', '2019-05-05 09:32:38');
INSERT INTO `tables` VALUES ('16', '16', '18', '6', '0', 'big table 6', '2019-05-05 09:44:14', '2019-05-05 09:32:38');
INSERT INTO `tables` VALUES ('17', '2', '30', '7', '0', 'big table7', '2019-05-05 09:44:38', '2019-05-05 09:34:57');
INSERT INTO `tables` VALUES ('20', '16', '30', '8', '0', 'big table 8', '2019-05-05 09:44:38', '2019-05-05 09:34:57');
INSERT INTO `tables` VALUES ('21', '2', '28', '9', '1', 'Line', '2019-05-05 10:13:18', '2019-05-05 09:39:26');
INSERT INTO `tables` VALUES ('22', '13', '29', '9', '2', 'Line', '2019-05-05 09:44:14', '2019-05-05 09:44:14');
INSERT INTO `tables` VALUES ('23', '14', '28', '9', '1', 'Line', '2019-05-05 10:13:18', '2019-05-05 09:44:14');
INSERT INTO `tables` VALUES ('24', '17', '17', '9', '1', 'Line', '2019-05-05 09:44:14', '2019-05-05 09:44:14');
INSERT INTO `tables` VALUES ('25', '27', '17', '9', '2', 'Line', '2019-05-05 10:15:05', '2019-05-05 09:44:14');
INSERT INTO `tables` VALUES ('26', '27', '29', '9', '2', 'Line', '2019-05-05 09:44:14', '2019-05-05 09:44:14');
INSERT INTO `tables` VALUES ('27', '17', '39', '9', '1', 'Line', '2019-05-05 09:44:14', '2019-05-05 09:44:14');

-- ----------------------------
-- Table structure for timeslots
-- ----------------------------
DROP TABLE IF EXISTS `timeslots`;
CREATE TABLE `timeslots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `morning_starts` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `morning_ends` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lunch_starts` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lunch_ends` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tea_starts` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tea_ends` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dinner_starts` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dinner_ends` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latenight_starts` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latenight_ends` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `morning_on` tinyint(4) DEFAULT NULL,
  `lunch_on` tinyint(4) DEFAULT NULL,
  `tea_on` tinyint(4) DEFAULT NULL,
  `dinner_on` tinyint(4) DEFAULT NULL,
  `latenight_on` tinyint(4) DEFAULT NULL,
  `day_on` tinyint(2) DEFAULT NULL,
  `non_business` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of timeslots
-- ----------------------------
INSERT INTO `timeslots` VALUES ('1', '1', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '1', '1', '1', '1', '1', null, '0', '2019-06-14 19:22:39', '2019-06-14 11:22:39');
INSERT INTO `timeslots` VALUES ('2', '2', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '0', '0', '0', '0', '0', '0', '0', '2019-06-16 08:54:27', '2019-06-16 00:54:27');
INSERT INTO `timeslots` VALUES ('3', '3', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '0', '0', '0', '0', '0', '0', '0', '2018-12-29 06:10:02', '2018-12-29 06:10:02');
INSERT INTO `timeslots` VALUES ('4', '4', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '0', '0', '0', '0', '0', '0', '0', '2018-12-29 06:10:03', '2018-12-29 06:10:03');
INSERT INTO `timeslots` VALUES ('5', '5', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '0', '0', '0', '0', '0', '0', '0', '2019-01-03 17:26:35', '2019-01-03 09:26:35');
INSERT INTO `timeslots` VALUES ('6', '6', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '0', '0', '0', '0', '0', '0', '0', '2018-12-29 06:10:03', '2018-12-29 06:10:03');
INSERT INTO `timeslots` VALUES ('7', '7', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '0', '0', '0', '0', '0', '0', '0', '2019-06-16 09:18:52', '2019-06-16 01:18:52');
INSERT INTO `timeslots` VALUES ('8', '8', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '0', '0', '0', '0', '0', '0', '0', '2019-06-16 09:44:47', '2019-06-16 01:44:47');
INSERT INTO `timeslots` VALUES ('9', '9', '08:00 AM', '12:00 AM', '12:00 AM', '02:00 PM', '02:00 PM', '05:30 PM', '05:30 PM', '10:00 PM', '10:00 PM', '02:00 AM', '1', '1', '1', '1', '1', '1', '0', '2018-12-29 22:14:04', '2018-12-29 14:14:04');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@admin.com', '2018-12-03 18:50:25', '$2y$10$UGHU9IXQdsMuEIi0x808gOOl/AUTwLMeI.ysqwE27FM7D1Dm92Gda', null, '2018-12-03 18:50:25', '2019-03-31 16:16:48');
INSERT INTO `users` VALUES ('2', 'reception', 'reception@admin.com', '2019-04-18 00:33:08', '$2y$10$yEug65NHAAuaBihfMHXymug/nW4e2DcM7ufL4Uwi/OppxZQAsNR1S', null, '2019-04-18 00:33:08', '2019-04-17 16:33:08');
INSERT INTO `users` VALUES ('3', 'kitchen', 'kitchen@admin.com', '2018-12-03 18:50:25', '$2y$10$UGHU9IXQdsMuEIi0x808gOOl/AUTwLMeI.ysqwE27FM7D1Dm92Gda', null, '2018-12-03 18:50:25', '2019-03-31 15:47:05');
INSERT INTO `users` VALUES ('4', 'menu', 'menu@user.com', '2019-04-18 00:32:01', '$2y$10$RN87CHHarrQQlMoZmiGmq.LdfYFuUxdPqBeEorXlNr4rdfUwU33pa', null, '2019-04-18 00:32:01', '2019-04-17 16:32:01');
INSERT INTO `users` VALUES ('5', 'master', 'master@master.com', '2019-04-18 00:30:09', '$2y$10$D1xyrV5UXvV7Hzmw1ElUyO.Mv/g4LWGLMFuO3LVeLavx83v/U1Al.', null, '2019-04-18 00:30:28', '2019-04-18 00:30:31');

-- ----------------------------
-- Table structure for websockets_statistics_entries
-- ----------------------------
DROP TABLE IF EXISTS `websockets_statistics_entries`;
CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of websockets_statistics_entries
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
