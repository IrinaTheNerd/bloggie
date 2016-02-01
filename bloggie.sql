-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2016 at 10:27 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloggie`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE IF NOT EXISTS `blogposts` (
  `blogID` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `preview` text NOT NULL,
  `main_text` text NOT NULL,
  PRIMARY KEY (`blogID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`blogID`, `title`, `subtitle`, `preview`, `main_text`) VALUES
(1, 'c', 'bo', 'bo', '\r\n						<h2>This is your main text :)</h2>\r\n						<p>Make sure that most important information is on top of the page, it''s valuable and consice</p>\r\n				'),
(2, 'ff', 'dsda', 'ssdasd', '<strike><i><b>fsfdhdhdf vvv</b></i></strike><br>'),
(3, 'Testing', 'Hello', 'BLablah ba', 'There is nothing better than bitchiing<br>');

-- --------------------------------------------------------

--
-- Table structure for table `userblog`
--

CREATE TABLE IF NOT EXISTS `userblog` (
  `userID` smallint(3) unsigned NOT NULL,
  `blogID` smallint(3) unsigned NOT NULL,
  UNIQUE KEY `userID` (`userID`,`blogID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`) VALUES
(9, 'bro@bro.com', '$2y$10$hYWRprhjLXVM3IxRzbjNouUXAIxrqmqh3FlysPcnWyAJbvZ29BuRS'),
(10, 'irina.petrova@gmx.com', '$2y$10$/2fsOmaaw7V6RXvOmkVeOu4FboeOcYAkR40ZxOIIw3r8W3xru6XM6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
