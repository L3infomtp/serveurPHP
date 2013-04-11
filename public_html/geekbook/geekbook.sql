-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2013 at 10:08 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `geekbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `creation_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `content`, `image`, `creation_time`) VALUES
(1, 'aaaaaa', '', '0000-00-00 00:00:00'),
(2, 'adadadad', '', '0000-00-00 00:00:00'),
(3, 'eeeee', '', '0000-00-00 00:00:00'),
(4, 'dddd', '', '0000-00-00 00:00:00'),
(5, 'dddd', '', '0000-00-00 00:00:00'),
(6, 'ddddaaaa', '', '0000-00-00 00:00:00'),
(7, 'zz', '', '2013-03-26 15:47:55'),
(8, 'rr', '', '2013-03-26 15:49:09'),
(9, 'tt', '', '2013-03-26 16:49:40'),
(10, 'gg', '', '2013-03-26 16:57:21'),
(11, 'yy', '', '2013-03-26 17:08:05'),
(12, 'yy', '', '2013-03-26 17:14:25'),
(13, 'yy', '', '2013-03-26 17:14:28'),
(14, 'yy', '', '2013-03-26 17:14:57'),
(15, 'ee', '', '2013-03-26 17:17:57'),
(16, 'fefef', '', '2013-03-26 17:18:03'),
(17, 'zzzz', '', '2013-03-26 17:25:40'),
(18, 'cscscsc', '', '2013-03-26 17:26:14'),
(19, 'svvdvdv', '', '2013-03-26 17:28:01'),
(20, 'egegeg', '', '2013-03-26 17:28:36'),
(21, 'zfzfzfzf', '', '2013-03-26 17:29:35'),
(22, 'egzergzrg', '', '2013-03-26 17:31:49'),
(23, 'trehrth', '', '2013-03-26 17:37:47'),
(24, 'tergehe', '', '2013-03-26 17:38:44'),
(25, 'rergerg', '', '2013-03-26 17:40:20'),
(26, 'gzgzegzevzev', '', '2013-03-26 17:41:07'),
(27, 'everv', '', '2013-03-26 17:41:54'),
(28, 'zevzevezevzev', '', '2013-03-26 17:42:22'),
(29, 'tbtbtb', '', '2013-03-26 17:42:31'),
(30, 'evevev', '', '2013-03-26 17:43:48'),
(31, 'rrbrb', '', '2013-03-26 17:44:01'),
(32, 'errbrb', '', '2013-03-26 17:44:24'),
(33, 'rgrgrg', '', '2013-03-26 17:45:49'),
(34, 'fefef', '', '2013-03-26 17:45:56'),
(35, 'rrrb', '', '2013-03-26 17:46:15'),
(36, 'rbrbrb', '', '2013-03-26 17:46:59'),
(37, 'fbfb', '', '2013-03-26 17:47:08'),
(38, 'egeg', '', '2013-03-26 17:47:40'),
(39, 'egeg', '', '2013-03-26 17:48:02'),
(40, 'Salut', '', '2013-03-26 17:48:16'),
(41, 'zdzdzd', '', '2013-03-26 17:50:57'),
(42, 'ffbfb', '', '2013-03-27 01:34:31'),
(43, 'zzfzf', '', '2013-03-27 01:56:18'),
(44, '\n\nzzzz\n', '', '2013-03-27 06:43:07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
