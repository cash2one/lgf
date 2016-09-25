-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-25 17:01:52
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
  `chufuzhen` varchar(20) DEFAULT NULL,
  `liushi` varchar(20) DEFAULT NULL,
  `keshi` varchar(20) DEFAULT NULL,
  `zhenshi` varchar(20) DEFAULT NULL,
  `bingzhong` varchar(20) NOT NULL,
  `laiyuanqudao` varchar(20) DEFAULT NULL,
  `nianling` int(11) DEFAULT NULL,
  `xingbie` tinyint(1) DEFAULT NULL,
  `quyu` varchar(30) DEFAULT NULL,
  `shouzhuyuan` tinyint(1) DEFAULT NULL,
  `zhiliao` tinyint(1) DEFAULT NULL,
  `zhiliaofei` double DEFAULT NULL,
  `shoushu` tinyint(1) DEFAULT NULL,
  `shoushufei` double DEFAULT NULL,
  `menzhenxiaofei` double DEFAULT NULL,
  `beizhu` varchar(100) DEFAULT NULL,
  `riqi` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `patients`
--

INSERT INTO `patients` (`id`, `yiyuan`, `chufuzhen`, `liushi`, `keshi`, `zhenshi`, `bingzhong`, `laiyuanqudao`, `nianling`, `xingbie`, `quyu`, `shouzhuyuan`, `zhiliao`, `zhiliaofei`, `shoushu`, `shoushufei`, `menzhenxiaofei`, `beizhu`, `riqi`, `time`) VALUES
(1, '重庆荣昌仁爱医院', '1', '0', '1', '100', '0', '网络', 21, 0, '县城', 0, 0, NULL, 0, 0, 2016, NULL, NULL, '2016-09-23 15:47:46'),
(2, '重庆荣昌仁爱医院', '1', '0', '1', '100', '0', '网络', 21, 0, '县城', 0, 0, NULL, 0, 0, 2016, NULL, NULL, '2016-09-23 15:48:24'),
(3, '重庆荣昌仁爱医院', '0', '', '内科', '', '糖尿病', '网络', 25, 0, '县城', 0, 0, 0, 0, 0, 2016, NULL, NULL, '2016-09-23 16:18:01'),
(4, '重庆荣昌仁爱医院', '0', '', '妇科', '一诊室', '0', '网络', 21, 0, '县城', 0, 0, 0, 0, 0, 2016, NULL, NULL, '2016-09-23 16:18:43'),
(5, '重庆荣昌仁爱医院', '0', '', '产科', '', '晚孕', '网络', 27, 0, '县城', 0, 0, 0, 0, 0, 2016, NULL, NULL, '2016-09-23 16:32:01'),
(6, '重庆荣昌仁爱医院', '初诊', '', '产科', '', '晚孕', '网络', 27, 0, '县城', 0, 0, 0, 0, 0, 2016, NULL, NULL, '2016-09-23 16:33:48'),
(7, '重庆荣昌仁爱医院', '初诊', '', '产科', '', '晚孕', '网络', 27, 0, '县城', 0, 0, 0, 0, 0, 0, NULL, '2016-09-24', '2016-09-23 16:35:10');

-- --------------------------------------------------------

--
-- 表的结构 `patients_ic`
--

CREATE TABLE IF NOT EXISTS `patients_ic` (
`id` int(11) NOT NULL COMMENT 'id',
  `yiyuan` varchar(20) DEFAULT NULL,
  `chufuzhen` varchar(20) DEFAULT NULL,
  `liushi` varchar(20) DEFAULT NULL,
  `keshi` varchar(20) DEFAULT NULL,
  `zhenshi` varchar(20) DEFAULT NULL,
  `bingzhong` varchar(20) NOT NULL,
  `laiyuanqudao` varchar(20) DEFAULT NULL,
  `nianling` int(11) DEFAULT NULL,
  `xingbie` tinyint(1) DEFAULT NULL,
  `quyu` varchar(30) DEFAULT NULL,
  `shouzhuyuan` tinyint(1) DEFAULT NULL,
  `zhiliao` tinyint(1) DEFAULT NULL,
  `zhiliaofei` double DEFAULT NULL,
  `shoushu` tinyint(1) DEFAULT NULL,
  `shoushufei` double DEFAULT NULL,
  `menzhenxiaofei` double DEFAULT NULL,
  `beizhu` varchar(100) DEFAULT NULL,
  `riqi` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `patients_ic`
--

INSERT INTO `patients_ic` (`id`, `yiyuan`, `chufuzhen`, `liushi`, `keshi`, `zhenshi`, `bingzhong`, `laiyuanqudao`, `nianling`, `xingbie`, `quyu`, `shouzhuyuan`, `zhiliao`, `zhiliaofei`, `shoushu`, `shoushufei`, `menzhenxiaofei`, `beizhu`, `riqi`, `time`) VALUES
(26, '荣昌仁爱医院', '复诊', '', '', '', '请选择科室', '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, NULL, '0000-00-00', '2016-09-24 18:46:58'),
(27, '荣昌仁爱医院', '复诊', '', '', '', '请选择科室', '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, NULL, '0000-00-00', '2016-09-24 18:48:45'),
(28, '荣昌仁爱医院', '复诊', '', '', '', '请选择科室', '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, NULL, '0000-00-00', '2016-09-24 18:50:51'),
(29, '', '复诊', '', '', '', '请选择科室', '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, NULL, '0000-00-00', '2016-09-24 18:55:18'),
(30, '荣昌仁爱医院', '初诊', '', '内科', '', '胃炎', '0', 0, 1, '0', 0, 0, 0, 0, 0, 0, NULL, '0000-00-00', '2016-09-25 10:01:05'),
(31, '荣昌仁爱医院', '初诊', '', '内科', '', '胃炎', '0', 0, 1, '0', 0, 0, 0, 0, 0, 0, NULL, '0000-00-00', '2016-09-25 10:01:38'),
(32, '荣昌仁爱医院', '初诊', '', '内科', '', '胃炎', '0', 0, 1, '0', 0, 0, 0, 0, 0, 0, NULL, '0000-00-00', '2016-09-25 10:01:43');

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
-- Indexes for table `patients_ic`
--
ALTER TABLE `patients_ic`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `patients_ic`
--
ALTER TABLE `patients_ic`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
