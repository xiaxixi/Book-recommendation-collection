-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-06-14 16:41:39
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `login`;

-- --------------------------------------------------------

--
-- 表的结构 `booktable`
--

DROP TABLE IF EXISTS `booktable`;
CREATE TABLE IF NOT EXISTS `booktable` (
  `book_id` int(10) NOT NULL COMMENT '图书编号',
  `title` varchar(100) NOT NULL COMMENT '书名',
  `author` varchar(50) NOT NULL COMMENT '作者',
  `cover_addr` varchar(200) NOT NULL COMMENT '封面地址',
  `type` varchar(200) NOT NULL,
  `grade` int(1) NOT NULL DEFAULT '0' COMMENT '星级',
  `intro` varchar(500) DEFAULT NULL COMMENT '图书简介'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图书数据表';

--
-- 插入之前先把表清空（truncate） `booktable`
--

TRUNCATE TABLE `booktable`;
-- --------------------------------------------------------

--
-- 表的结构 `usercollecttable`
--

DROP TABLE IF EXISTS `usercollecttable`;
CREATE TABLE IF NOT EXISTS `usercollecttable` (
  `user_id` int(10) NOT NULL COMMENT '用户编号',
  `book_id` int(10) NOT NULL COMMENT '图书编号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收藏数据表';

--
-- 插入之前先把表清空（truncate） `usercollecttable`
--

TRUNCATE TABLE `usercollecttable`;
-- --------------------------------------------------------

--
-- 表的结构 `usertable`
--
-- 创建时间： 2018-06-14 14:40:31
--

DROP TABLE IF EXISTS `usertable`;
CREATE TABLE IF NOT EXISTS `usertable` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `user_name` varchar(24) CHARACTER SET utf8mb4 NOT NULL COMMENT '用户名',
  `password` varchar(24) NOT NULL COMMENT '密码',
  `favourite_type` varchar(50) DEFAULT NULL COMMENT '书籍喜好',
  `image_addr` varchar(200) NOT NULL DEFAULT 'http://47.100.172.51/shared/images/user.gif' COMMENT '用户头像存储地址',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 插入之前先把表清空（truncate） `usertable`
--

TRUNCATE TABLE `usertable`;
--
-- 转存表中的数据 `usertable`
--

INSERT INTO `usertable` (`user_id`, `user_name`, `password`, `favourite_type`, `image_addr`) VALUES
(1, 'admin', '123456', NULL, 'http://47.100.172.51/shared/images/user.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;