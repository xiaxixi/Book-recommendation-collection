-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 06 月 18 日 11:34
-- 服务器版本: 5.1.36
-- PHP 版本: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `brc`
--

-- --------------------------------------------------------

--
-- 表的结构 `usercollect`
--

CREATE TABLE IF NOT EXISTS `usercollect` (
  `name` varchar(20) NOT NULL,
  `book_id` int(10) NOT NULL,
  `Alt` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `usercollect`
--

INSERT INTO `usercollect` (`name`, `book_id`, `Alt`) VALUES
('admin', 1, 'https://book.douban.com/subject/1148282/'),
('admin', 2, 'https://book.douban.com/subject/1022318/'),
('admin', 3, 'https://book.douban.com/subject/23008813/');
