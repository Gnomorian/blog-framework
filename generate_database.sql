-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 12:34 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `num_comments` int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/image/post/default.jpg' COMMENT 'string to the image on the post',
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `num_comments`, `date`, `project_id`, `icon`, `subtitle`) VALUES
(8, 'First Post', 'this is a big step, it has come far from just a template and an idea, now i can upload "posts" to this beta blog/portfolio and upload an image to go along with it.', 0, 1480578805, 5, '/image/post/Boston City Flow.jpg', 'got post_add working'),
(11, '3D Printer', 'I recieved the prints from the guy in Iilam on Wednesday, there where bits of plastic stuck in holes where it shouldn''t be which i managed to remove, but otherwise they look great so i gave <a href=''https://www.3dhubs.com/christchurch/hubs/printsdirect2u''>him</a> a shining review.\r\n<br>\r\nI ordered the Raspberry PI A+ on the same day, Element14 is out of stock, they are getting more in on 26th December, so i have a while to wait for that, so this project isn''t in a rush due to that delay which means i will order the rest of the parts next week from Atafruit as to save my bank account due to it being the most expensive part at $200.', 0, 1480640252, 1, '/image/post/IMG_20161130_202819.jpg', 'recieved parts'),
(31, 'i only exist to make up the numbers', '', 0, 1480678710, 1, '/image/post/default.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=working, 1=paused, 2=done, 3=dead',
  `last_updated` int(11) NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/project/default.jpg' COMMENT 'string to the icon.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `status`, `last_updated`, `icon`) VALUES
(1, 'GameBoy Emulator', 'A handheld GameBoy emulator powered by a Raspberry PI', 0, 1480506245, '/image/project/gameboy.jpg'),
(2, 'Bazxus-Github Clone', 'An alternative to github that uses Bazaar instead of Git', 1, 1480506245, '/image/project/github.png'),
(3, 'Roster Manager', 'Program for tracking your staffs breaks so you don''t call them when they are not available', 1, 1480506245, '/image/project/roster.jpg'),
(4, 'Wil''s IDE', 'An IDE to fit my needs.', 3, 1480506245, '/image/project/ide.jpg'),
(5, 'Portfolio Design', 'making the back end for this site', 0, 1480506245, '/image/project/default.jpg'),
(6, 'Miscellaneous', 'Anything that isn''t directly related to a main project', 0, 1480512598, '/image/project/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `person` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `text`, `person`) VALUES
(1, 'Great things are done by a series of small things brought together.', 'Vincent Van Gogh'),
(2, 'People will kill you over time and how they’ll kill you is with tiny, harmless phrases like “be realistic.', 'Dylan Moran'),
(3, 'Imperfection is beauty, madness is genius and it’s better to be absolutely ridiculous than absolutely boring.', 'Marilyn Monroe'),
(4, 'Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.', 'Martin Golding');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'login username',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'email address',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'william', 'gnomorian@gmail.com', '15D927215EFF4373BE63C5FD04F26BB0'),
(2, 'bluey261', 'bluey261@idiot.com', '3e990fe5d62db2e04ce1e70e34fc845e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
