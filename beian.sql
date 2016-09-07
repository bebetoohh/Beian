-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-07 11:04:26
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beian`
--

-- --------------------------------------------------------

--
-- 表的结构 `b_group`
--

CREATE TABLE IF NOT EXISTS `b_group` (
`gid` int(6) NOT NULL,
  `pid` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `b_user`
--

CREATE TABLE IF NOT EXISTS `b_user` (
`id` int(11) NOT NULL,
  `ecard` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(10) NOT NULL,
  `department` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `b_user_group`
--

CREATE TABLE IF NOT EXISTS `b_user_group` (
  `uid` int(11) NOT NULL,
  `gid` int(6) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_group`
--
ALTER TABLE `b_group`
 ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `b_user`
--
ALTER TABLE `b_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_group`
--
ALTER TABLE `b_group`
MODIFY `gid` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `b_user`
--
ALTER TABLE `b_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
