-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2013 年 06 月 26 日 09:51
-- 伺服器版本: 5.5.31
-- PHP 版本: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `nfc`
--
CREATE DATABASE `nfc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nfc`;

-- --------------------------------------------------------

--
-- 表的結構 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `google_account_id` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 轉存資料表中的資料 `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `google_account_id`) VALUES
(1, 'mgr', '1bf6523ff2534dc8296cd2177242096f', '', ''),
(2, 'denny', '1bf6523ff2534dc8296cd2177242096f', 'denny0223@gmail.com', ''),
(3, 'brian', 'bea9887b195ed2850609a91d1b4ec429', 'as', ''),
(4, 'sunny', '59a0fb7e3671b5a8eec29a0c3d20d255', '', '');

-- --------------------------------------------------------

--
-- 表的結構 `checkin_info`
--

CREATE TABLE IF NOT EXISTS `checkin_info` (
  `fb_id` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `checkin_info`
--

INSERT INTO `checkin_info` (`fb_id`, `date`, `store_id`) VALUES
('100000028617930', '2013-05-08 11:05:14', 3),
('100000028617930', '2013-05-08 11:24:26', 2),
('100000028617930', '2013-05-08 11:24:48', 1),
('denny0223', '2013-05-08 11:29:16', 1),
('1380596689', '2013-05-09 04:21:46', 1),
('1380596689', '2013-05-09 04:21:47', 1),
('1380596689', '2013-05-09 04:22:44', 1),
('1380596689', '2013-05-09 04:24:29', 1),
('100000028617930', '2013-05-09 09:34:30', 2),
('100000028617930', '2013-05-09 12:46:00', 2),
('1380596689', '2013-05-09 12:48:58', 1),
('1380596689', '2013-05-09 12:55:09', 1),
('100000028617930', '2013-05-09 13:00:01', 2),
('1380596689', '2013-05-09 13:38:22', 1),
('1380596689', '2013-05-09 13:44:25', 1),
('1380596689', '2013-05-09 13:46:32', 1),
('1380596689', '2013-05-09 13:50:00', 1),
('1380596689', '2013-05-09 14:05:25', 1),
('1380596689', '2013-05-10 03:54:33', 1),
('1380596689', '2013-05-10 03:55:43', 1),
('1380596689', '2013-05-10 03:57:25', 1),
('1380596689', '2013-05-12 01:47:31', 1),
('1380596689', '2013-05-12 01:47:48', 1),
('1380596689', '2013-05-12 01:52:42', 1),
('1380596689', '2013-05-12 01:58:15', 1),
('1380596689', '2013-05-12 02:00:31', 1),
('denny0223', '2013-05-12 11:30:59', 2),
('denny0223', '2013-05-12 11:32:31', 2),
('denny0223', '2013-05-12 11:33:44', 2),
('denny0223', '2013-05-14 02:38:53', 0),
('100000028617930', '2013-05-14 02:46:11', 1),
('denny0223', '2013-05-14 03:00:19', 3),
('denny0223', '2013-05-14 12:56:59', 2),
('denny0223', '2013-05-14 12:56:59', 2),
('denny0223', '2013-05-14 12:57:01', 2),
('denny0223', '2013-05-14 12:57:06', 2),
('denny0223', '2013-05-14 12:58:33', 2),
('denny0223', '2013-05-14 13:03:30', 2),
('denny0223', '2013-05-14 13:04:43', 2),
('denny0223', '2013-05-14 13:06:57', 2),
('denny0223', '2013-05-31 07:23:00', 2),
('denny0223', '2013-05-31 07:31:13', 2);

-- --------------------------------------------------------

--
-- 表的結構 `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('03a699b34bc69a9e05d22d489f238af6', '140.129.25.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', 1371109305, 'a:5:{s:9:"user_data";s:0:"";s:6:"userId";s:1:"1";s:8:"username";s:3:"mgr";s:5:"email";s:0:"";s:16:"flash:old:resmsg";s:31:"Update e-mail successfully!<br>";}'),
('1100495fd5cfd3ef3cc867c2ced10ba8', '140.129.25.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', 1370853960, 'a:4:{s:9:"user_data";s:0:"";s:6:"userId";s:1:"1";s:8:"username";s:3:"mgr";s:5:"email";s:19:"denny0223@gmail.com";}'),
('56c102de533207d7a6a2e3e6539d0535', '140.129.25.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.45 Safari/537.36', 1371886233, 'a:4:{s:9:"user_data";s:0:"";s:6:"userId";s:1:"1";s:8:"username";s:3:"mgr";s:5:"email";s:0:"";}'),
('7ec76d40d068e74fb74c10b70a6bb73c', '140.129.25.121', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370780331, 'a:4:{s:9:"user_data";s:0:"";s:6:"userId";s:1:"4";s:8:"username";s:5:"sunny";s:5:"email";s:26:"denny02232001@yahoo.com.tw";}'),
('d42e0b3318b787c7cfb0b9cad57b2134', '140.129.25.121', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1372143772, ''),
('e0bf563a23a10523195cba74cdcd3719', '140.129.25.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.45 Safari/537.36', 1371814146, 'a:4:{s:9:"user_data";s:0:"";s:6:"userId";s:1:"1";s:8:"username";s:3:"mgr";s:5:"email";s:0:"";}');

-- --------------------------------------------------------

--
-- 表的結構 `store_info`
--

CREATE TABLE IF NOT EXISTS `store_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `tag_id` varchar(32) NOT NULL,
  `page_id` varchar(32) NOT NULL,
  `store_name` varchar(64) NOT NULL,
  `coupon_msg` varchar(1024) NOT NULL,
  `feedback_url` varchar(128) NOT NULL,
  `feedback_result_url` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 轉存資料表中的資料 `store_info`
--

INSERT INTO `store_info` (`id`, `owner_id`, `tag_id`, `page_id`, `store_name`, `coupon_msg`, `feedback_url`, `feedback_result_url`) VALUES
(1, 3, 'AAAA', '117447945023563', '漢堡王(中山北店)', '<script>alert(''Hello'');</script>', 'https://docs.google.com/forms/d/18Ck35UQPAWVW8HxuhNKAI61qKLCAjkZHU6QAd_xUE6k/viewform', 'https://docs.google.com/forms/d/18Ck35UQPAWVW8HxuhNKAI61qKLCAjkZHU6QAd_xUE6k/viewanalytics'),
(2, 2, 'BBBB', '203708476305884', '三媽臭臭鍋 晴光店', '新產品 南瓜鍋 130元！ 聽說不太好吃XD', 'https://docs.google.com/forms/d/1vwzBz57JspT5klhyvyb56v2LtSokOglzQhtyyzmKhMc/viewform', 'https://docs.google.com/forms/d/1vwzBz57JspT5klhyvyb56v2LtSokOglzQhtyyzmKhMc/viewanalytics'),
(3, 2, 'CCCC', '183594375006859', 'All Pasta', 'All Pasta 要搬家囉~\n', 'https://docs.google.com/forms/d/1QS5p9tCweZN33XdV0rQb6D50a88nIdhaOq9DD0PFXmg/viewform', 'https://docs.google.com/forms/d/1QS5p9tCweZN33XdV0rQb6D50a88nIdhaOq9DD0PFXmg/viewanalytics'),
(4, 4, 'DDDD', '202394516578470', '帥帥Sunny 羽球專賣店', '來店消費 打卡就送羽球喔~', 'https://docs.google.com/forms/d/1V3rB8CYTF_ln2gNpdlwrf4AJ5TWhb2CueV7DCJusZdA/viewform', 'https://docs.google.com/forms/d/1V3rB8CYTF_ln2gNpdlwrf4AJ5TWhb2CueV7DCJusZdA/viewanalytics');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
