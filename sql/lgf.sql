-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-11 17:46:04
-- 服务器版本： 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lgf`
--

-- --------------------------------------------------------

--
-- 表的结构 `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
`id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `office` varchar(10) DEFAULT NULL COMMENT '科室',
  `disease` varchar(20) DEFAULT NULL COMMENT '病种',
  `registered_type` varchar(20) DEFAULT NULL COMMENT '挂号类型',
  `age` int(11) NOT NULL COMMENT '年龄',
  `source` varchar(20) NOT NULL COMMENT '渠道',
  `region` varchar(30) NOT NULL COMMENT '来源地区',
  `year` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `patients`
--

INSERT INTO `patients` (`id`, `name`, `office`, `disease`, `registered_type`, `age`, `source`, `region`, `year`) VALUES
(1, '病人1', '妇科', '早孕', '挂号', 21, '网络', '县城', '2016-01-01 00:00:00'),
(2, '病人1', '妇科', '早孕', '挂号', 21, '网络', '县城', '2016-08-10 00:00:00'),
(3, '病人2', '外科', '骨科', '挂号', 29, '电话', '广顺', '2016-07-07 00:00:00'),
(4, '病人1', '妇科', '早孕', '初诊', 21, '网络', '县城', '2015-12-17 00:00:00'),
(5, '病人1', '妇科', '早孕', '复诊', 21, '网络', '县城', '2016-05-16 00:00:00'),
(6, '病人5', '妇科', '妇检', '挂号', 21, '网络', '县城', '2016-08-04 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL COMMENT 'id',
  `userid` varchar(20) NOT NULL COMMENT '用户id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `company` varchar(20) NOT NULL COMMENT '所在单位',
  `mobilephone` varchar(12) NOT NULL COMMENT '电话',
  `logintime` datetime NOT NULL COMMENT '上次登录时间',
  `remarks` varchar(100) NOT NULL COMMENT '备注'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `password`, `company`, `mobilephone`, `logintime`, `remarks`) VALUES
(1, 'cwf', '陈文锋', '19870519', '财务公司', '023-67039220', '0000-00-00 00:00:00', ''),
(2, 'admin', 'admin', '288d0ca0a10ffecef011330af8eec4a5', '荣昌仁爱医院', '13709429844', '2016-08-07 14:16:41', ''),
(3, 'lgf', '林高峰', '288d0ca0a10ffecef011330af8eec4a5', '荣昌仁爱医院', '18696969666', '2016-08-07 14:28:07', ''),
(4, 'user1', 'user1', '288d0ca0a10ffecef011330af8eec4a5', '荣昌仁爱医院', '', '2016-08-07 14:32:00', ''),
(5, 'user2', 'user2', '288d0ca0a10ffecef011330af8eec4a5', '荣昌仁爱医院', '', '2016-08-07 14:33:30', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
