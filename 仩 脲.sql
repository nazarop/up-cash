-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- http://www.phpmyadmin.net
--
-- Хост: 10.0.0.103:3306
-- Время создания: Май 24 2018 г., 16:17
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Структура таблицы `svuti_email`
--

CREATE TABLE IF NOT EXISTS `svuti_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` text NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `svuti_games`
--

CREATE TABLE IF NOT EXISTS `svuti_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `login` text NOT NULL,
  `chislo` text NOT NULL,
  `cel` text NOT NULL,
  `suma` text NOT NULL,
  `shans` text NOT NULL,
  `win_summa` text NOT NULL,
  `type` text NOT NULL,
  `data` text NOT NULL,
  `hash` text NOT NULL,
  `salt1` text NOT NULL,
  `salt2` text NOT NULL,
  `saltall` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `svuti_payments`
--

CREATE TABLE IF NOT EXISTS `svuti_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `suma` text NOT NULL,
  `data` text NOT NULL,
  `qiwi` text NOT NULL,
  `transaction` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `svuti_payout`
--

CREATE TABLE IF NOT EXISTS `svuti_payout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `suma` text NOT NULL,
  `qiwi` text NOT NULL,
  `status` text NOT NULL,
  `data` text NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `svuti_promo`
--

CREATE TABLE IF NOT EXISTS `svuti_promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promo` text NOT NULL,
  `active` text NOT NULL,
  `activelimit` text NOT NULL,
  `idactive` text NOT NULL,
  `data` text NOT NULL,
  `summa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `svuti_users`
--

CREATE TABLE IF NOT EXISTS `svuti_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `hash` text NOT NULL,
  `prava` int(11) NOT NULL,
  `ban` int(11) NOT NULL,
  `ban_mess` text NOT NULL,
  `chat_ban` int(11) NOT NULL,
  `ip_reg` text NOT NULL,
  `iprox` text NOT NULL,
  `ip` text NOT NULL,
  `referer` text NOT NULL,
  `data_reg` text NOT NULL,
  `online` int(11) NOT NULL,
  `online_time` int(11) NOT NULL,
  `balance` text NOT NULL,
  `bonus` int(11) NOT NULL,
  `bonus_url` text NOT NULL,
  `sliv` int(11) NOT NULL,
  `youtube` int(11) NOT NULL,
  `fake` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `svuti_win`
--

CREATE TABLE IF NOT EXISTS `svuti_win` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `win` text NOT NULL,
  `lose` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `svuti_win`
--

INSERT INTO `svuti_win` (`id`, `win`, `lose`) VALUES
(1, '1', '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
