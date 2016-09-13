-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-13 18:23:40
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
  `yiyuan` varchar(20) DEFAULT NULL,
  `chufuzhen` tinyint(1) DEFAULT NULL,
  `liushi` varchar(20) DEFAULT NULL,
  `keshi` varchar(20) DEFAULT NULL,
  `zhenshi` varchar(20) DEFAULT NULL,
  `laiyuanqudao` varchar(20) DEFAULT NULL,
  `nianling` int(11) DEFAULT NULL,
  `xingbie` tinyint(1) DEFAULT NULL,
  `quyu` varchar(30) DEFAULT NULL,
  `shouzhuyuan` tinyint(1) DEFAULT NULL,
  `zhiliao` tinyint(1) DEFAULT NULL,
  `zhiliaofei` double DEFAULT NULL,
  `shoushu` tinyint(1) DEFAULT NULL,
  `shoushufei` double DEFAULT NULL,
  `meizhenxiaofei` double DEFAULT NULL,
  `beizhu` varchar(100) DEFAULT NULL,
  `riqi` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
