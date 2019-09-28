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

 Date: 27/09/2019 22:31:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@admin.com', '2018-12-03 18:50:25', '$2y$10$UGHU9IXQdsMuEIi0x808gOOl/AUTwLMeI.ysqwE27FM7D1Dm92Gda', NULL, '2018-12-03 18:50:25', '2019-03-31 16:16:48');
INSERT INTO `users` VALUES ('2', 'reception', 'reception@admin.com', '2019-04-18 00:33:08', '$2y$10$yEug65NHAAuaBihfMHXymug/nW4e2DcM7ufL4Uwi/OppxZQAsNR1S', NULL, '2019-04-18 00:33:08', '2019-04-17 16:33:08');
INSERT INTO `users` VALUES ('3', 'kitchen', 'kitchen@admin.com', '2018-12-03 18:50:25', '$2y$10$UGHU9IXQdsMuEIi0x808gOOl/AUTwLMeI.ysqwE27FM7D1Dm92Gda', NULL, '2018-12-03 18:50:25', '2019-03-31 15:47:05');
INSERT INTO `users` VALUES ('4', 'menu', 'menu@user.com', '2019-09-27 20:52:27', '$2y$10$DfbgUYNQyBgR9zFRoMqL5OcWnjArwyEgQ6.M3bXHgY44h5NWgsM3S', NULL, '2019-09-27 20:52:27', '2019-09-27 22:52:27');
INSERT INTO `users` VALUES ('5', 'master', 'master@master.com', '2019-04-18 00:30:09', '$2y$10$D1xyrV5UXvV7Hzmw1ElUyO.Mv/g4LWGLMFuO3LVeLavx83v/U1Al.', NULL, '2019-04-18 00:30:28', '2019-04-18 00:30:31');
INSERT INTO `users` VALUES ('6', 'takeawaymenu', 'takeawaymenu@user.com', '2019-09-27 22:28:43', '$2y$10$i05UAusaPPmNqV/CaE0Zwu7sUZRGh5O7LhQaYjZcP.Dj89yyh.1l.', NULL, '2019-09-27 22:28:43', '2019-09-28 00:28:43');

SET FOREIGN_KEY_CHECKS = 1;
