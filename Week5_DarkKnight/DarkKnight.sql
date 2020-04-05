-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-04-05 20:18:37
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `DarkKnight`
--
CREATE DATABASE IF NOT EXISTS `DarkKnight` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `DarkKnight`;

-- --------------------------------------------------------

--
-- 表的结构 `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `filmName` varchar(100) NOT NULL,
  `imdbID` varchar(9) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `trailer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `films`
--

INSERT INTO `films` (`id`, `filmName`, `imdbID`, `poster`, `trailer`) VALUES
(1, 'Trilogy I —— Batman: Begins', 'tt0372784', 'img/Bigins.webp', 'video/Begins.mp4'),
(2, 'Trilogy II —— The Dark Knight', 'tt0468569', 'img/DarkKnight.webp', 'video/DarkKnight.mp4'),
(3, 'Trilogy III —— The Dark Knight Rises', 'tt1345836', 'img/Rises.webp', 'video/Rises.mp4');

--
-- 转储表的索引
--

--
-- 表的索引 `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
