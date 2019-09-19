/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : db_mikrotik

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 19/09/2019 10:07:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mikrotik
-- ----------------------------
DROP TABLE IF EXISTS `mikrotik`;
CREATE TABLE `mikrotik`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_mikrotik` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_mikrotik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_mikrotik` enum('mati','hidup') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mikrotik
-- ----------------------------
INSERT INTO `mikrotik` VALUES (1, '103.18.33.30', 'Mikrotik 1', 'hidup');
INSERT INTO `mikrotik` VALUES (2, '103.18.33.31', 'Mikrotik 2', 'mati');
INSERT INTO `mikrotik` VALUES (3, '103.18.33.32', 'Mikrotik 3', 'mati');
INSERT INTO `mikrotik` VALUES (4, '103.18.33.33', 'Mikrotik 4', 'mati');
INSERT INTO `mikrotik` VALUES (6, '103.18.33.34', 'Mikrotik 5', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `groups_id` int(11) NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'Administrator', '$2y$10$lZ.DqIp/otWyDUlTtJ.M8.j/JB5LfGG/FZ1pWZo1mKb5p9r8lVnxS', 1, '2019-09-17 10:01:05');

SET FOREIGN_KEY_CHECKS = 1;
