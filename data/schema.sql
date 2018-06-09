SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- -----------------------------
-- Table structure for userTable
-- -----------------------------
DROP TABLE IF EXISTS `userTable`;
CREATE TABLE `userTable`  (
  `user_id` int(15) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户名',
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户密码',
  `favourite_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户最喜爱的书籍类型',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of userTable
-- ----------------------------
INSERT INTO `userTable` VALUES (1, 'abc', '123','math');
INSERT INTO `userTable` VALUES (2, 'def', '456','computer');

-- -----------------------------
-- Table structure for bookTable
-- -----------------------------
DROP TABLE IF EXISTS `bookTable`;
CREATE TABLE `bookTable`  (
  `book_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '书籍编号',
  `title` varchar(100) varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '书籍名称',
  `author` varchar(100) varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '书籍作者',
  `cover_addr` varchar(255) varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '书籍图片存放地址',
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '书籍类型',
  `star_level` int(50) NOT NULL AUTO_INCREMENT COMMENT '推荐星级',
  `intro` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '书籍简介',
  `collect_num` int(50) NOT NULL AUTO_INCREMENT COMMENT '标记是否收藏',
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- --------------------
-- Records of bookTable
-- --------------------
INSERT INTO `bookTable` VALUES (1, 'HTml5与css3基础教程', 'Elizabeth Castro', 'images/book_1_cover.png', 'computer', 4, '讲解html和css入门知识的经典畅销书，全面系统的讲解html5和css的基础知识以及实际运用技术', 0);

-- ------------------------------------
-- Table structure for userCollectTable
-- ------------------------------------
DROP TABLE IF EXISTS `userCollectTable`;
CREATE TABLE `userCollectTable`  (
  `user_id` int(1) NOT NULL COMMENT '用户编号',
  `book_id` int(1) NOT NULL COMMENT '图书编号',
  `read_state` int(1) NOT NULL COMMENT '标记是否已读',
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ---------------------------
-- Records of userCollectTable
-- ---------------------------
INSERT INTO `userCollectTable` VALUES (1, 1, 1);
INSERT INTO `userCollectTable` VALUES (1, 2, 0);

SET FOREIGN_KEY_CHECKS = 1;
