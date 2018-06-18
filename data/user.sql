-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 06 月 18 日 11:32
-- 服务器版本: 5.1.36
-- PHP 版本: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `brc`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `image_addr` varchar(100) NOT NULL,
  `favourite_type` varchar(30) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_id_2` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `name`, `pwd`, `image_addr`, `favourite_type`) VALUES
(1, '未登录', '', 'http://106.14.151.175/user-image/default.jpg', '*'),
(2, '九点半', '788', 'http://106.14.151.175/user-image/default.jpg', 'education');