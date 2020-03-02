-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-03-03 00:12:59
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
-- 数据库： `Dota2Blog`
--
CREATE DATABASE IF NOT EXISTS `Dota2Blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Dota2Blog`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `imgSrc` varchar(200) NOT NULL,
  `manage` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `nickname`, `imgSrc`, `manage`) VALUES
(1, 'manager', '1d0258c2440a8d19e716292b231e3190', 'shangzehao1998@gmail.com', 'Dota Team', 'img/profilePicture/manager.png', 'manage'),
(2, 'consumer', '1005b14bd29466723ace30d26f602f5b', '2896145340@qq.com', 'Consumer', 'img/profilePicture/截屏2020-03-0301.17.10.png', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `blog`
--

CREATE TABLE `blog` (
  `blogID` int(4) NOT NULL,
  `src` varchar(100) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `textContent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog`
--

INSERT INTO `blog` (`blogID`, `src`, `title`, `date`, `textContent`) VALUES
(1, 'img/blog1.png', 'New Bloom Treasure', '2020-01-23', 'Just in time for Lunar New Year and the Rat\'s time in the cyclical place of honor, the Treasure of Unbound Majesty is now available.\r\n\r\nPacked full of sets for Drow Ranger, Visage, Undying, Storm Spirit, Dazzle, Kunkka, Arc Warden, Dark Willow, and Rubick, this treasure also includes the chance to unbox a rare Puck set, very rare Legion Commander set, or an extremely rare Templar Assassin set.'),
(2, 'img/blog2.jpg', 'True Sight - The International 2019', '2020-01-03', 'Join the pros who battled in The International Grand Finals - World Champions OG and runners-up Team Liquid (now the newly-dubbed Nigma) - alongside a live theater audience in Berlin, Germany on January 28th for the world premiere of True Sight: The International 2019.\r\n\r\nOG made history in Shanghai last August by successfully defending their hold on the Aegis of Champions, becoming not only the first team to win The International in back-to-back years, but the first ever to carve their names into the Aegis for a second time.'),
(3, 'img/blog3.jpg', 'Ogre Magi Arcana & Frostivus Reward Line', '2019-12-18', 'In today\'s update, two heads are better than one, and three heads are better than that, as the all-new Flockheart\'s Gamble Arcana item for Ogre Magi makes its grand debut.\r\n\r\nFeaturing all-new custom animations and effects-including a new Firelark mount, Multicast streak counter, enhanced ability effects, and more-the Flockheart\'s Gamble Arcana ushers in a new era of Ogre supremacy and bestows even more blessings from the Goddess of Luck. With three heads available to plan cunning new battle tactics, Ogre Magi might just be the most advanced hero Dota has ever seen.'),
(4, 'img/blog4.png', 'The Outlanders Update', '2019-11-26', 'Today\'s update unleashes two new heroes - Snapfire and Void Spirit - and unveils the 7.23 Gameplay Update, featuring a host of changes, all-new features, and multiple reworked items and abilities.'),
(5, 'img/blog5.png', 'Continuing Matchmaking Updates', '2019-10-10', 'Today\'s update is once again centered on improving our Matchmaking system, focusing primarily on fixing issues that arose from our previous update.\r\n\r\nWe understand that some players, especially at the high end, have experienced a significant drop in matchmaking quality as a result of our recent iterations. We appreciate all of the feedback and match IDs that we\'ve been receiving-your input has been very helpful and we hope you\'ll continue to give us feedback after this update as well. We are committed to making matchmaking as good as it can be.'),
(6, 'img/blog6.png', 'Dota Plus Autumn Update', '2019-09-26', 'Today\'s patch brings a few features to Dota Plus in the wake of the Battle Pass season, as well as the addition of all-new item sets for Lion, Slardar, and Crystal Maiden to the Dota Plus Rewards section.\r\n\r\nPlus subscribers can now use the Avoid Player feature to exclude unwanted players from their matchmaking pool, get precise stacking info with the Creep Pull Timers, ward more effectively with the Ward Suggestions, and see your total incoming damage breakdown by type.');

-- --------------------------------------------------------

--
-- 表的结构 `carouselMedia`
--

CREATE TABLE `carouselMedia` (
  `mediaID` int(4) NOT NULL,
  `type` varchar(20) NOT NULL,
  `src` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `carouselMedia`
--

INSERT INTO `carouselMedia` (`mediaID`, `type`, `src`) VALUES
(1, 'video', 'video/slide1.mp4'),
(2, 'image', 'img/slide2.png'),
(3, 'image', 'img/slide3.png'),
(4, 'image', 'img/slide4.png');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`);

--
-- 表的索引 `carouselMedia`
--
ALTER TABLE `carouselMedia`
  ADD PRIMARY KEY (`mediaID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `carouselMedia`
--
ALTER TABLE `carouselMedia`
  MODIFY `mediaID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
