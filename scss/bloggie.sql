-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 01 2016 г., 12:09
-- Версия сервера: 5.6.15-log
-- Версия PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `bloggie`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blogposts`
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
-- Дамп данных таблицы `blogposts`
--

INSERT INTO `blogposts` (`blogID`, `title`, `subtitle`, `preview`, `main_text`) VALUES
(1, 'c', 'bo', 'bo', '\r\n						<h2>This is your main text :)</h2>\r\n						<p>Make sure that most important information is on top of the page, it''s valuable and consice</p>\r\n				'),
(2, 'ff', 'dsda', 'ssdasd', '<strike><i><b>fsfdhdhdf vvv</b></i></strike><br>'),
(3, 'Testing', 'Hello', 'BLablah ba', 'There is nothing better than bitchiing<br>');

-- --------------------------------------------------------

--
-- Структура таблицы `userblog`
--

CREATE TABLE IF NOT EXISTS `userblog` (
  `userID` smallint(3) unsigned NOT NULL,
  `blogID` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`blogID`),
  UNIQUE KEY `userID` (`userID`,`blogID`),
  KEY `userID_2` (`userID`,`blogID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `email`, `password`) VALUES
(9, 'bro@bro.com', '$2y$10$hYWRprhjLXVM3IxRzbjNouUXAIxrqmqh3FlysPcnWyAJbvZ29BuRS'),
(10, 'irina.petrova@gmx.com', '$2y$10$/2fsOmaaw7V6RXvOmkVeOu4FboeOcYAkR40ZxOIIw3r8W3xru6XM6'),
(11, 'evance@mail.ru', '$2y$10$fKKi16jNfY9tr/XV5KaQxePZK.Us.KbPg0kyMSVamIR/ojlB..wTW'),
(12, 'jakebunn@hotmail.com', '$2y$10$FpHqvSHeHb.f5vSD1/KFa.7miOWIR1G050kVQzm.OxqHsEF6s7DUK'),
(13, 'b@b.com', '$2y$10$AFA0/14j7s5e31SxAO9ASeqdoI4S11z4grcFKP3P8Ja7xI32AkGiS'),
(14, 'boo@boo.com', '$2y$10$KGdrIfIzuTAELZxu9o/r8OMXLLMPES20TzwN1Iv7M/MYimOU8egtu'),
(15, 'irsen@irsen.com', '$2y$10$c5LbpRf/X6YE6gXL7J9af.ZRXMF0v/9z735QHgLl5bYOF9Pmcb4u.'),
(16, 'testik@testik.co', '$2y$10$VDg1oF3/pWKdSV5ciDMFJep4ZDQ0ZbNoZ/eNDdfPDCwCNhLnZ7v.K');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
