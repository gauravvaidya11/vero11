-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2016 at 06:58 AM
-- Server version: 5.6.34
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtcisinl_vero11`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_us_history`
--

CREATE TABLE `tbl_about_us_history` (
  `id` int(11) NOT NULL,
  `image_video_type` int(3) NOT NULL DEFAULT '1' COMMENT '1: Iamge type, 2: Video Url',
  `about_us_heading` varchar(155) DEFAULT NULL,
  `club_name` varchar(155) DEFAULT NULL,
  `about_us_content` text,
  `play_date` datetime DEFAULT NULL,
  `player_image` varchar(255) DEFAULT NULL,
  `player_video_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `google_url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: In-Active, 1: Active',
  `created_at` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Not Deleted, 1: Deleted',
  `video_type` varchar(155) DEFAULT NULL,
  `thumbnail_image` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about_us_history`
--

INSERT INTO `tbl_about_us_history` (`id`, `image_video_type`, `about_us_heading`, `club_name`, `about_us_content`, `play_date`, `player_image`, `player_video_url`, `facebook_url`, `twitter_url`, `google_url`, `status`, `created_at`, `modified_at`, `delete_status`, `video_type`, `thumbnail_image`) VALUES
(1, 2, 'FIFA 2010, UEFA CHAMPIONS LEAGUE', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum?</p>\n', '2011-10-07 04:17:21', '', 'https://www.youtube.com/embed/ECX9ca6VspA', 'www.facebook.com', 'www.twitter.com', 'www.googleplus.com', 1, '2016-10-07 00:00:00', '2016-10-14 04:06:19', 0, 'youtube', 'https://img.youtube.com/vi/ECX9ca6VspA/0.jpg'),
(2, 2, 'FIFA 2010, UEFA CHAMPIONS LEAGUE', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum?</p>\n', '2012-10-04 07:20:21', '', 'https://www.youtube.com/embed/ECX9ca6VspA', 'www.facebook.com', 'www.twitter.com', 'www.googleplus.com', 1, '2016-10-07 09:16:00', '2016-10-14 04:06:01', 0, 'youtube', 'https://img.youtube.com/vi/ECX9ca6VspA/0.jpg'),
(3, 2, 'FIFA 2010, UEFA CHAMPIONS LEAGUE', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum?</p>\n', '2013-10-04 07:20:21', '', 'https://www.youtube.com/embed/ECX9ca6VspA', 'www.facebook.com', 'www.twitter.com', 'www.googleplus.com', 1, '2016-10-07 09:16:00', '2016-10-14 04:06:33', 0, 'youtube', 'https://img.youtube.com/vi/ECX9ca6VspA/0.jpg'),
(4, 2, 'FIFA 2010, UEFA CHAMPIONS LEAGUE', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum?</p>\n', '2014-10-04 07:20:21', '', 'https://www.youtube.com/embed/ECX9ca6VspA', 'www.facebook.com', 'www.twitter.com', 'www.googleplus.com', 1, '2016-10-07 09:16:00', '2016-10-14 04:05:46', 0, 'youtube', 'https://img.youtube.com/vi/ECX9ca6VspA/0.jpg'),
(5, 2, 'FIFA 2010, UEFA CHAMPIONS LEAGUE', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum? ', '2015-10-04 07:20:21', NULL, 'https://www.youtube.com/embed/ECX9ca6VspA', 'www.facebook.com', 'www.twitter.com', 'www.googleplus.com', 1, '2016-10-07 09:16:00', '2016-10-14 03:55:35', 0, 'youtube', NULL),
(6, 2, 'FIFA 2010, UEFA CHAMPIONS LEAGUE', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam non voluptatibus error a esse maiores, ducimus sit unde alias aspernatur perspiciatis itaque corporis? Accusamus pariatur dolorum repellendus consectetur tempore harum? ', '2016-10-04 07:20:21', NULL, 'https://www.youtube.com/embed/ECX9ca6VspA', 'www.facebook.com', 'www.twitter.com', 'www.googleplus.com', 1, '2016-10-07 09:16:00', '2016-10-14 03:55:33', 0, 'youtube', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(30) NOT NULL,
  `username` varchar(155) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(155) CHARACTER SET utf8 NOT NULL,
  `access` varchar(50) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(155) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(155) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`, `access`, `firstname`, `lastname`, `avatar`, `status`, `created_at`, `modified_at`) VALUES
(1, 'admin@vero11.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin@vero11.com', '1', 'Super', 'Admin', '86cd0cb2e71c1ffc8530c1dc6cc37df0.png', 1, '0000-00-00 00:00:00', '2016-10-18 06:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_email_templates`
--

CREATE TABLE `tbl_admin_email_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: disable, 1: enable',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_email_templates`
--

INSERT INTO `tbl_admin_email_templates` (`id`, `name`, `type`, `content`, `status`, `delete_status`, `created_at`, `modified_at`) VALUES
(1, 'Common Email Template', 'common', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html>\r\n<head>\r\n	<title>{{siteName}}</title>\r\n</head>\r\n<body leftmargin="0" marginheight="0" marginwidth="0" offset="0" topmargin="0">\r\n<p>&nbsp;</p>\r\n\r\n<table align="center" border="0" cellpadding="0" cellspacing="0" valign="top" width="600">\r\n	<tbody>\r\n		<tr>\r\n			<td style="border-top:#1D2531 solid 7px; padding:25px 0; text-align:center;">Vero11</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background:#1D2531; text-align:center; padding:10px 0;">\r\n			<p style="margin:0;font-family: \'Lato\', sans-serif, Arial, Helvetica, sans-serif; padding:0 0 0 0; font-weight:bold; color:#fff; font-size:20px;">{{emailBannerTitle}}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>{{contents}}</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">{{end_message}}</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="background:#1D2531; color:#fff;font-family: \'Lato\', sans-serif, Arial, Helvetica, sans-serif; font-size:14px; text-align:center; padding:15px 0;">{{footer_message}}</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</body>\r\n</html>\r\n', 1, 0, '2016-02-20 14:28:29', '2016-10-18 07:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biography`
--

CREATE TABLE `tbl_biography` (
  `id` int(255) NOT NULL,
  `player_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biography`
--

INSERT INTO `tbl_biography` (`id`, `player_id`, `title`, `content`) VALUES
(1, 1, 'title name', 'hello dear this is test'),
(2, 2, 'My Profile', '<p>Tenho interesse em ter experiencia profissional no exterior e estou aberto para discutir propostas de trabalho</p>\n'),
(3, 3, 'hello', 'sdsadfdsaf sdfsad sd'),
(4, 4, 'Test', 'Sou atleta profissional de futebol desde 2008 quando iniciei minha carreira assinando meu primeiro contrato como profissional no Olaria Futebol Clube que disputava à época o campeonato da segunda divisão do Rio de Janeiro. Após este contrato eu fui jogar no interior do São Paulo por dois anos. Mais experiente fui contratado pelo Necaxa do Mexico e por la joguei por tres anos.Agora gostaria de ter mais uma experiencia num time do exterior.Estou aberto para negociar com clubes interessados que desejam um projeto comprometido com atletas com bom nivel de envolvimento.Fui campeão algumas vezes e quero sentir esta sensação novamente. Tenho várias referencias que posso enviar para os interessados ou mesmo postar neste espaço.'),
(5, 5, 'test', '<p><br />\ntest</p>\n'),
(6, 6, '', ''),
(7, 7, '', ''),
(8, 8, '', ''),
(9, 9, '', ''),
(10, 10, '', ''),
(11, 11, '', ''),
(12, 12, '', ''),
(13, 13, '', ''),
(14, 14, '', ''),
(15, 15, '', ''),
(16, 16, '', ''),
(17, 17, '', ''),
(18, 18, '', ''),
(19, 19, '', ''),
(20, 20, '', ''),
(21, 21, '', ''),
(22, 22, '', ''),
(23, 23, '', ''),
(24, 24, '', ''),
(25, 25, '', ''),
(26, 26, '', ''),
(27, 27, '', ''),
(28, 28, NULL, NULL),
(29, 29, NULL, NULL),
(30, 30, NULL, NULL),
(31, 31, NULL, NULL),
(32, 32, NULL, NULL),
(33, 33, NULL, NULL),
(34, 34, NULL, NULL),
(35, 45, NULL, NULL),
(36, 46, NULL, NULL),
(37, 47, NULL, NULL),
(38, 48, NULL, NULL),
(39, 49, NULL, NULL),
(40, 50, NULL, NULL),
(41, 51, NULL, NULL),
(42, 52, NULL, NULL),
(43, 53, NULL, NULL),
(44, 54, NULL, NULL),
(45, 55, NULL, NULL),
(46, 56, NULL, NULL),
(47, 57, NULL, NULL),
(48, 58, 'Hello Bio', 'hello this is biography'),
(49, 59, NULL, NULL),
(50, 60, NULL, NULL),
(51, 61, NULL, NULL),
(52, 62, NULL, NULL),
(53, 63, NULL, NULL),
(54, 64, 'Test', 'Hi this is test.........'),
(55, 65, NULL, NULL),
(56, 66, NULL, NULL),
(57, 67, 'sd', 'dsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsddsd'),
(58, 68, NULL, NULL),
(59, 69, NULL, NULL),
(60, 70, NULL, NULL),
(61, 71, NULL, NULL),
(62, 72, NULL, NULL),
(63, 73, NULL, NULL),
(64, 74, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ci_sessions`
--

CREATE TABLE `tbl_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ci_sessions`
--

INSERT INTO `tbl_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0b5057c1b1dc3cb18bd1cb5f195b586e', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475843216, 'a:7:{s:9:"user_data";s:0:"";s:13:"total_players";i:3;s:9:"player_id";s:1:"1";s:12:"display_name";s:16:"rohit chaturvedi";s:5:"email";s:21:"rohit.c@cisinlabs.com";s:13:"profile_image";s:1:"0";s:14:"session_tab_id";s:1:"1";}'),
('20b94b1c18a43c20514954bab3fa488a', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475836744, 'a:7:{s:9:"user_data";s:0:"";s:13:"total_players";i:3;s:9:"player_id";s:1:"1";s:12:"display_name";s:16:"rohit chaturvedi";s:5:"email";s:21:"rohit.c@cisinlabs.com";s:13:"profile_image";s:36:"7e0e376b2dad48e88aec751b1c9614c3.jpg";s:14:"session_tab_id";s:1:"1";}'),
('50d2d2bd9efceb7d2252c18b613328eb', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475839596, ''),
('68e9a699d09aabdeb88bfb28179ca7c8', '192.168.0.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Safari/602.1.50', 1475840863, 'a:2:{s:9:"user_data";s:0:"";s:23:"flash:old:error_message";s:69:"<div class="alert alert-danger">Invalid email please try again!</div>";}'),
('8fbcd80328732d098ba3f7bab3f93415', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475836946, ''),
('8ff227c1d7d37750f2a9d50326cee226', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475840348, 'a:8:{s:9:"user_data";s:0:"";s:13:"total_players";i:3;s:9:"player_id";s:1:"1";s:12:"display_name";s:16:"rohit chaturvedi";s:5:"email";s:21:"rohit.c@cisinlabs.com";s:13:"profile_image";s:1:"0";s:14:"session_tab_id";s:1:"1";s:13:"site_language";s:7:"english";}'),
('90a7c6371545fa08933aa586ab2e70d9', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475836955, 'a:7:{s:9:"user_data";s:0:"";s:13:"total_players";i:3;s:9:"player_id";s:1:"1";s:12:"display_name";s:16:"rohit chaturvedi";s:5:"email";s:21:"rohit.c@cisinlabs.com";s:13:"profile_image";s:36:"7e0e376b2dad48e88aec751b1c9614c3.jpg";s:14:"session_tab_id";s:1:"1";}'),
('a1852f7e0086eab8a7a660ddd9a4ab7d', '192.168.2.76', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.12', 1475837179, 'a:7:{s:9:"user_data";s:0:"";s:13:"total_players";i:3;s:14:"session_tab_id";s:1:"4";s:9:"player_id";s:1:"3";s:12:"display_name";s:13:"gaurav vaidya";s:5:"email";s:27:"gaurav.vaidya@cisinlabs.com";s:13:"profile_image";s:0:"";}'),
('ac3d1ec6a8de65608938658679f0b6c3', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475840032, 'a:8:{s:9:"user_data";s:0:"";s:13:"total_players";i:3;s:9:"player_id";s:1:"1";s:12:"display_name";s:16:"rohit chaturvedi";s:5:"email";s:21:"rohit.c@cisinlabs.com";s:13:"profile_image";s:36:"7e0e376b2dad48e88aec751b1c9614c3.jpg";s:14:"session_tab_id";s:1:"1";s:13:"site_language";s:7:"english";}'),
('d350056385a7dbd55bb5f0a640a902b1', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475842102, 'a:7:{s:13:"site_language";s:7:"english";s:13:"total_players";i:3;s:9:"player_id";s:1:"1";s:12:"display_name";s:16:"rohit chaturvedi";s:5:"email";s:21:"rohit.c@cisinlabs.com";s:13:"profile_image";s:1:"0";s:14:"session_tab_id";s:1:"1";}'),
('f64fd88268a1e98ff8ce554b964cebaa', '192.168.2.235', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:48.0) Gecko/20100101 Firefox/48.0', 1475836947, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_admin`
--

CREATE TABLE `tbl_contact_admin` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: In-Active, 1 Active user',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Not deleted, 1 deleted',
  `reply_id` int(11) DEFAULT NULL COMMENT 'if reply id= ''0'', then no any reply in this contact',
  `sender_id` int(11) DEFAULT NULL,
  `reply_message` text,
  `contact_by` varchar(10) DEFAULT NULL COMMENT 'this fields is use only specify message for display in admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_admin`
--

INSERT INTO `tbl_contact_admin` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `modified_at`, `status`, `delete_status`, `reply_id`, `sender_id`, `reply_message`, `contact_by`) VALUES
(1, 'shifali', 'shifali.s@cisinlabs.com', '2147483647', 'Hello Admin', '2016-10-01 15:46:07', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(2, 'shifali', 'shifali.s@cisinlabs.com', '2147483647', 'dfdfdf', '2016-10-03 13:47:02', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(3, 'sadfadsf sadfas', 'rohit.c1@outlook.com', '2147483647', 'hello this is test', '2016-10-10 11:46:34', '2016-10-12 10:05:23', 1, 1, NULL, NULL, NULL, 'front'),
(4, 'sadfadsf sadfas', 'rohit.c1@outlook.com', '02147483647', 'dsfsaf', '2016-10-10 11:47:36', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(5, 'sadfadsf sadfas', 'rohit.c1@outlook.com', '2147483647', 'dsfsaf', '2016-10-10 11:47:47', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(6, 'sadfadsf sadfas', 'rohit.c1@outlook.com', '2147483647', 'dsfsaf', '2016-10-10 11:48:00', '2016-10-12 10:05:23', 1, 1, NULL, NULL, NULL, 'front'),
(7, 'sadfadsf sadfas', 'rohit.c1@outlook.com', '2147483647', 'dsfsaf', '2016-10-10 11:49:29', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(8, 'sadfadsf sadfas', 'rohit.c1@outlook.com', '2147483647', 'dsfsaf', '2016-10-10 11:51:57', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(9, 'Rohit', 'rohit.c1@outlook.com', '78878778877', 'hello this is function', '2016-10-10 12:48:57', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(10, 'Rohit', 'rohit.c1@outlook.com', '78878778877', 'hello this is function', '2016-10-10 12:49:55', '2016-10-12 10:05:23', 1, 0, NULL, NULL, NULL, 'front'),
(11, 'sadfadsf sadfas', 'rohit.c1@outlook.com', '2147483647', 'hello this is function', '2016-10-10 14:56:52', '2016-10-12 12:37:45', 1, 0, NULL, NULL, NULL, 'front'),
(12, 'rohit chaturvedi', 'rohit.c@cisinlabs.com', '2147483647', 'hello this is function', '2016-10-11 06:05:02', '2016-10-12 12:37:49', 1, 0, NULL, NULL, NULL, 'front'),
(13, 'rohit chaturvedi', 'rohit.c@cisinlabs.com', '', 'hello this is function', '2016-10-12 09:28:33', '2016-10-12 12:37:51', 1, 0, 12, 1, 'Hi This is test message for contact', NULL),
(14, 'rohit chaturvedi', 'rohit.c@cisinlabs.com', '', '', '2016-10-12 13:55:05', '2016-10-12 13:55:05', 1, 0, 12, 1, 'Hello this is test ', NULL),
(15, 'Gaurav Vaidya', 'gaurav@mailinator.com', '89854445854', 'Hi,\n\nThis is test message so please ignore this message.\n\nThanks,', '2016-10-13 03:50:41', '2016-10-18 06:40:31', 1, 0, 0, NULL, NULL, 'front');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` smallint(1) UNSIGNED NOT NULL,
  `worldzone_id` tinyint(11) NOT NULL DEFAULT '1',
  `country_name` char(64) DEFAULT NULL,
  `country_3_code` char(3) DEFAULT NULL,
  `country_2_code` char(2) DEFAULT NULL,
  `ordering` int(2) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Country records';

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `worldzone_id`, `country_name`, `country_3_code`, `country_2_code`, `ordering`, `published`, `created_on`, `created_by`, `modified_on`, `modified_by`, `locked_on`, `locked_by`) VALUES
(1, 1, 'Afghanistan', 'AFG', 'AF', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 1, 'Albania', 'ALB', 'AL', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 1, 'Algeria', 'DZA', 'DZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 1, 'American Samoa', 'ASM', 'AS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 1, 'Andorra', 'AND', 'AD', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 1, 'Angola', 'AGO', 'AO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 1, 'Anguilla', 'AIA', 'AI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 1, 'Antarctica', 'ATA', 'AQ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 1, 'Antigua and Barbuda', 'ATG', 'AG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 1, 'Argentina', 'ARG', 'AR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 1, 'Armenia', 'ARM', 'AM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 1, 'Aruba', 'ABW', 'AW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 1, 'Australia', 'AUS', 'AU', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 1, 'Austria', 'AUT', 'AT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 1, 'Azerbaijan', 'AZE', 'AZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 1, 'Bahamas', 'BHS', 'BS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 1, 'Bahrain', 'BHR', 'BH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 1, 'Bangladesh', 'BGD', 'BD', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 1, 'Barbados', 'BRB', 'BB', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 1, 'Belarus', 'BLR', 'BY', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 1, 'Belgium', 'BEL', 'BE', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 1, 'Belize', 'BLZ', 'BZ', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 1, 'Benin', 'BEN', 'BJ', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 1, 'Bermuda', 'BMU', 'BM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 1, 'Bhutan', 'BTN', 'BT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 1, 'Bolivia', 'BOL', 'BO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 1, 'Bosnia and Herzegowina', 'BIH', 'BA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 1, 'Botswana', 'BWA', 'BW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 1, 'Bouvet Island', 'BVT', 'BV', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 1, 'Brazil', 'BRA', 'BR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 1, 'British Indian Ocean Territory', 'IOT', 'IO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 1, 'Brunei Darussalam', 'BRN', 'BN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 1, 'Bulgaria', 'BGR', 'BG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 1, 'Burkina Faso', 'BFA', 'BF', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 1, 'Burundi', 'BDI', 'BI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 1, 'Cambodia', 'KHM', 'KH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 1, 'Cameroon', 'CMR', 'CM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 1, 'Canada', 'CAN', 'CA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 1, 'Cape Verde', 'CPV', 'CV', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 1, 'Cayman Islands', 'CYM', 'KY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 1, 'Central African Republic', 'CAF', 'CF', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 1, 'Chad', 'TCD', 'TD', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 1, 'Chile', 'CHL', 'CL', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 1, 'China', 'CHN', 'CN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 1, 'Christmas Island', 'CXR', 'CX', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 1, 'Cocos (Keeling) Islands', 'CCK', 'CC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 1, 'Colombia', 'COL', 'CO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 1, 'Comoros', 'COM', 'KM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 1, 'Congo', 'COG', 'CG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 1, 'Cook Islands', 'COK', 'CK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 1, 'Costa Rica', 'CRI', 'CR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 1, 'Cote D\'Ivoire', 'CIV', 'CI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 1, 'Croatia', 'HRV', 'HR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 1, 'Cuba', 'CUB', 'CU', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 1, 'Cyprus', 'CYP', 'CY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 1, 'Czech Republic', 'CZE', 'CZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 1, 'Denmark', 'DNK', 'DK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 1, 'Djibouti', 'DJI', 'DJ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 1, 'Dominica', 'DMA', 'DM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 1, 'Dominican Republic', 'DOM', 'DO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 1, 'East Timor', 'TMP', 'TP', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 1, 'Ecuador', 'ECU', 'EC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 1, 'Egypt', 'EGY', 'EG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 1, 'El Salvador', 'SLV', 'SV', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 1, 'Equatorial Guinea', 'GNQ', 'GQ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 1, 'Eritrea', 'ERI', 'ER', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 1, 'Estonia', 'EST', 'EE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 1, 'Ethiopia', 'ETH', 'ET', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 1, 'Falkland Islands (Malvinas)', 'FLK', 'FK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 1, 'Faroe Islands', 'FRO', 'FO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 1, 'Fiji', 'FJI', 'FJ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 1, 'Finland', 'FIN', 'FI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 1, 'France', 'FRA', 'FR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 1, 'French Guiana', 'GUF', 'GF', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 1, 'French Polynesia', 'PYF', 'PF', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 1, 'French Southern Territories', 'ATF', 'TF', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 1, 'Gabon', 'GAB', 'GA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 1, 'Gambia', 'GMB', 'GM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 1, 'Georgia', 'GEO', 'GE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 1, 'Germany', 'DEU', 'DE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 1, 'Ghana', 'GHA', 'GH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 1, 'Gibraltar', 'GIB', 'GI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 1, 'Greece', 'GRC', 'GR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 1, 'Greenland', 'GRL', 'GL', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 1, 'Grenada', 'GRD', 'GD', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 1, 'Guadeloupe', 'GLP', 'GP', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 1, 'Guam', 'GUM', 'GU', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 1, 'Guatemala', 'GTM', 'GT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 1, 'Guinea', 'GIN', 'GN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 1, 'Guinea-bissau', 'GNB', 'GW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 1, 'Guyana', 'GUY', 'GY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 1, 'Haiti', 'HTI', 'HT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 1, 'Heard and Mc Donald Islands', 'HMD', 'HM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 1, 'Honduras', 'HND', 'HN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 1, 'Hong Kong', 'HKG', 'HK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 1, 'Hungary', 'HUN', 'HU', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 1, 'Iceland', 'ISL', 'IS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 0, 'India', 'IND', 'IN', 0, 1, '0000-00-00 00:00:00', 0, '2015-02-10 13:54:41', 553, '0000-00-00 00:00:00', 0),
(100, 1, 'Indonesia', 'IDN', 'ID', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 1, 'Iran (Islamic Republic of)', 'IRN', 'IR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 1, 'Iraq', 'IRQ', 'IQ', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 1, 'Ireland', 'IRL', 'IE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 1, 'Israel', 'ISR', 'IL', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 1, 'Italy', 'ITA', 'IT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 1, 'Jamaica', 'JAM', 'JM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 1, 'Japan', 'JPN', 'JP', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, 1, 'Jordan', 'JOR', 'JO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 1, 'Kazakhstan', 'KAZ', 'KZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 1, 'Kenya', 'KEN', 'KE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 1, 'Kiribati', 'KIR', 'KI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 1, 'Korea, Democratic People\'s Republic of', 'PRK', 'KP', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 1, 'Korea, Republic of', 'KOR', 'KR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 1, 'Kuwait', 'KWT', 'KW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 1, 'Kyrgyzstan', 'KGZ', 'KG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 1, 'Lao People\'s Democratic Republic', 'LAO', 'LA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 1, 'Latvia', 'LVA', 'LV', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 1, 'Lebanon', 'LBN', 'LB', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 1, 'Lesotho', 'LSO', 'LS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 1, 'Liberia', 'LBR', 'LR', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 1, 'Libyan Arab Jamahiriya', 'LBY', 'LY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 1, 'Liechtenstein', 'LIE', 'LI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 1, 'Lithuania', 'LTU', 'LT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 1, 'Luxembourg', 'LUX', 'LU', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 1, 'Macau', 'MAC', 'MO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 1, 'Macedonia, The Former Yugoslav Republic of', 'MKD', 'MK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 1, 'Madagascar', 'MDG', 'MG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 1, 'Malawi', 'MWI', 'MW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 1, 'Malaysia', 'MYS', 'MY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 1, 'Maldives', 'MDV', 'MV', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 1, 'Mali', 'MLI', 'ML', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 1, 'Malta', 'MLT', 'MT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 1, 'Marshall Islands', 'MHL', 'MH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 1, 'Martinique', 'MTQ', 'MQ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 1, 'Mauritania', 'MRT', 'MR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 1, 'Mauritius', 'MUS', 'MU', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 1, 'Mayotte', 'MYT', 'YT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 1, 'Mexico', 'MEX', 'MX', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 1, 'Micronesia, Federated States of', 'FSM', 'FM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 1, 'Moldova, Republic of', 'MDA', 'MD', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 1, 'Monaco', 'MCO', 'MC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 1, 'Mongolia', 'MNG', 'MN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 1, 'Montserrat', 'MSR', 'MS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 1, 'Morocco', 'MAR', 'MA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 1, 'Mozambique', 'MOZ', 'MZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 1, 'Myanmar', 'MMR', 'MM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 1, 'Namibia', 'NAM', 'NA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 1, 'Nauru', 'NRU', 'NR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 1, 'Nepal', 'NPL', 'NP', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 1, 'Netherlands', 'NLD', 'NL', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 1, 'Netherlands Antilles', 'ANT', 'AN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 1, 'New Caledonia', 'NCL', 'NC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 1, 'New Zealand', 'NZL', 'NZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 1, 'Nicaragua', 'NIC', 'NI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 1, 'Niger', 'NER', 'NE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 1, 'Nigeria', 'NGA', 'NG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 1, 'Niue', 'NIU', 'NU', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 1, 'Norfolk Island', 'NFK', 'NF', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 1, 'Northern Mariana Islands', 'MNP', 'MP', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 1, 'Norway', 'NOR', 'NO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 1, 'Oman', 'OMN', 'OM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 1, 'Pakistan', 'PAK', 'PK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 1, 'Palau', 'PLW', 'PW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 1, 'Panama', 'PAN', 'PA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 1, 'Papua New Guinea', 'PNG', 'PG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 1, 'Paraguay', 'PRY', 'PY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 1, 'Peru', 'PER', 'PE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 1, 'Philippines', 'PHL', 'PH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 1, 'Pitcairn', 'PCN', 'PN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 1, 'Poland', 'POL', 'PL', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 1, 'Portugal', 'PRT', 'PT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 1, 'Puerto Rico', 'PRI', 'PR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 1, 'Qatar', 'QAT', 'QA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 1, 'Reunion', 'REU', 'RE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 1, 'Romania', 'ROM', 'RO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 1, 'Russian Federation', 'RUS', 'RU', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 1, 'Rwanda', 'RWA', 'RW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 1, 'Saint Kitts and Nevis', 'KNA', 'KN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 1, 'Saint Lucia', 'LCA', 'LC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 1, 'Saint Vincent and the Grenadines', 'VCT', 'VC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 1, 'Samoa', 'WSM', 'WS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 1, 'San Marino', 'SMR', 'SM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 1, 'Sao Tome and Principe', 'STP', 'ST', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 1, 'Saudi Arabia', 'SAU', 'SA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 1, 'Senegal', 'SEN', 'SN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 1, 'Seychelles', 'SYC', 'SC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 1, 'Sierra Leone', 'SLE', 'SL', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 1, 'Singapore', 'SGP', 'SG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 1, 'Slovakia', 'SVK', 'SK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 1, 'Slovenia', 'SVN', 'SI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 1, 'Solomon Islands', 'SLB', 'SB', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 1, 'Somalia', 'SOM', 'SO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 1, 'South Africa', 'ZAF', 'ZA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 1, 'South Georgia and the South Sandwich Islands', 'SGS', 'GS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 1, 'Spain', 'ESP', 'ES', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 1, 'Sri Lanka', 'LKA', 'LK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 1, 'St. Helena', 'SHN', 'SH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 1, 'St. Pierre and Miquelon', 'SPM', 'PM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 1, 'Sudan', 'SDN', 'SD', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 1, 'Suriname', 'SUR', 'SR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 1, 'Svalbard and Jan Mayen Islands', 'SJM', 'SJ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 1, 'Swaziland', 'SWZ', 'SZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 1, 'Sweden', 'SWE', 'SE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 1, 'Switzerland', 'CHE', 'CH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 1, 'Syrian Arab Republic', 'SYR', 'SY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 1, 'Taiwan', 'TWN', 'TW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 1, 'Tajikistan', 'TJK', 'TJ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 1, 'Tanzania, United Republic of', 'TZA', 'TZ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 1, 'Thailand', 'THA', 'TH', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 1, 'Togo', 'TGO', 'TG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 1, 'Tokelau', 'TKL', 'TK', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 1, 'Tonga', 'TON', 'TO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 1, 'Trinidad and Tobago', 'TTO', 'TT', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 1, 'Tunisia', 'TUN', 'TN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 1, 'Turkey', 'TUR', 'TR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 1, 'Turkmenistan', 'TKM', 'TM', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 1, 'Turks and Caicos Islands', 'TCA', 'TC', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 1, 'Tuvalu', 'TUV', 'TV', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 1, 'Uganda', 'UGA', 'UG', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 1, 'Ukraine', 'UKR', 'UA', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 1, 'United Arab Emirates', 'ARE', 'AE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 1, 'United Kingdom', 'GBR', 'GB', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 1, 'United States', 'USA', 'US', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 1, 'United States Minor Outlying Islands', 'UMI', 'UM', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 1, 'Uruguay', 'URY', 'UY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 1, 'Uzbekistan', 'UZB', 'UZ', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 1, 'Vanuatu', 'VUT', 'VU', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 1, 'Vatican City State (Holy See)', 'VAT', 'VA', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 1, 'Venezuela', 'VEN', 'VE', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 1, 'Viet Nam', 'VNM', 'VN', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 1, 'Virgin Islands (British)', 'VGB', 'VG', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 1, 'Virgin Islands (U.S.)', 'VIR', 'VI', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 1, 'Wallis and Futuna Islands', 'WLF', 'WF', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 1, 'Western Sahara', 'ESH', 'EH', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 1, 'Yemen', 'YEM', 'YE', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 1, 'The Democratic Republic of Congo', 'DRC', 'DC', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 1, 'Zambia', 'ZMB', 'ZM', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 1, 'East Timor', 'XET', 'XE', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 1, 'Jersey', 'JEY', 'JE', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 1, 'St. Barthelemy', 'XSB', 'XB', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 1, 'St. Eustatius', 'XSE', 'XU', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 1, 'Canary Islands', 'XCA', 'XC', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(245, 1, 'Serbia', 'SRB', 'RS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(246, 1, 'Sint Maarten (French Antilles)', 'MAF', 'MF', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(247, 1, 'Sint Maarten (Netherlands Antilles)', 'SXM', 'SX', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(248, 1, 'Palestinian Territory, occupied', 'PSE', 'PS', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(253, 1, 'Venezuela, Bolivarian Republic of', NULL, 'VE', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(254, 1, 'Bosnia and Herzegovina', NULL, 'BA', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(255, 1, 'Palestine, State of', NULL, 'PS', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(256, 1, 'Bolivia, Plurinational State of', NULL, 'BO', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(257, 1, 'Curacao', NULL, 'CW', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(258, 1, 'Taiwan, Province of China', NULL, 'TW', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(259, 1, 'Cabo Verde', NULL, 'CV', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(260, 1, 'Virgin Islands, U.S.', NULL, 'VI', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(261, 1, 'Libya', NULL, 'LY', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(262, 1, 'Iran, Islamic Republic of', NULL, 'IR', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(263, 1, 'Bonaire, Sint Eustatius and Saba', NULL, 'BQ', 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorities_player`
--

CREATE TABLE `tbl_favorities_player` (
  `id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `favorite_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: Dislike, 1: Like',
  `created_at` datetime DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0' COMMENT '0: Not Deleted, 1: Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_favorities_player`
--

INSERT INTO `tbl_favorities_player` (`id`, `player_id`, `club_id`, `favorite_status`, `created_at`, `delete_status`) VALUES
(84, 43, 1, 1, '2016-11-18 12:49:47', 0),
(85, 32, 1, 1, '2016-11-18 12:49:48', 0),
(86, 36, 1, 1, '2016-11-18 12:49:50', 0),
(87, 3, 53, 1, '2016-11-18 21:30:21', 0),
(88, 7, 53, 1, '2016-11-18 22:10:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(255) NOT NULL,
  `player_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `player_id`, `title`, `filename`, `created_date`, `modify_date`) VALUES
(3, 2, 'hiii', '', '0000-00-00 00:00:00', '2016-10-18 08:28:24'),
(6, 2, 'My Performace', '', '2016-10-06 00:00:00', '2016-10-18 08:28:29'),
(48, 5, 'hello', '', '2016-10-10 00:00:00', '2016-10-18 08:28:32'),
(54, 6, 'cachoeira', '', '2016-10-10 00:00:00', '2016-10-18 08:28:36'),
(55, 6, 'cachoeira', '', '2016-10-10 00:00:00', '2016-10-18 08:28:41'),
(59, 7, 'Me', '', '2016-10-11 00:00:00', '2016-10-18 08:28:45'),
(79, 4, 'test', '7d3b5079069152b0be29d1099f762dfc.jpg', '2016-10-20 00:00:00', '0000-00-00 00:00:00'),
(82, 4, 'Monkey&Tiger', '85b6dec1d5980a93fd7cff071e2007f1.png', '2016-10-20 00:00:00', '0000-00-00 00:00:00'),
(84, 53, 'teste', 'e400940f8e76a3a9dc255c3ca470479d.jpg', '2016-11-15 00:00:00', '0000-00-00 00:00:00'),
(88, 58, 'fsdf', '74141b48adfe3416d08c3f43630809ab.jpg', '2016-11-16 00:00:00', '0000-00-00 00:00:00'),
(89, 64, 'Test', 'd168fcb162afa8b7a842cb866c4882ae.jpeg', '2016-11-16 00:00:00', '2016-11-16 10:33:52'),
(90, 64, 'Test1', '5fd643d68717674f2c543f5ddc5695fd.jpeg', '2016-11-16 00:00:00', '2016-11-16 10:33:12'),
(93, 67, '1', '6e0abb89c69244a7fa72af592b8d3e26.jpg', '2016-11-16 00:00:00', '0000-00-00 00:00:00'),
(95, 67, '455555555555555555555555', '584cfbec5abe5ee76f406ffbd392a9f8.jpg', '2016-11-16 00:00:00', '2016-11-16 11:58:53'),
(100, 67, '45', '5a0a88ec1ec751f8ba382217265ed0d2.jpg', '2016-11-16 00:00:00', '0000-00-00 00:00:00'),
(101, 67, '45', '87a23d3beeaea074da464fddb0186bb1.jpg', '2016-11-16 00:00:00', '0000-00-00 00:00:00'),
(103, 3, 'Test1', '66139533d39f9a11ed203383b06855ee.jpg', '2016-11-17 00:00:00', '0000-00-00 00:00:00'),
(105, 3, 'Test4', '1672b2440a5ebe1b4277f35ec0d1932a.jpg', '2016-11-17 00:00:00', '2016-11-18 16:06:49'),
(106, 3, 'Test3', '04de6595cd3b92d38c5b9c0c39241b2e.jpg', '2016-11-17 00:00:00', '0000-00-00 00:00:00'),
(120, 1, 'sdfghj', 'b92e4351c5ebc6d23783eab0f2b42207.jpg', '2016-11-18 00:00:00', '0000-00-00 00:00:00'),
(123, 1, 'sdfasf', 'd33bf65dcc65fec4a9227a7b9dde0705.jpg', '2016-11-19 00:00:00', '2016-11-19 12:49:55'),
(125, 1, 'sdfsdffsdaf', '6c60bc139c28d46c50b5c0aa34b5cb33.png', '2016-11-21 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE `tbl_languages` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lang_flag` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `delete_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`id`, `lang_name`, `lang_code`, `lang_flag`, `status`, `default`, `delete_status`, `created_at`, `modified_at`) VALUES
(1, 'english', 'EN', '6500188907c54e9f3bf3d214d7e44cbc.png', 1, 0, 0, '0000-00-00 00:00:00', '2016-08-05 13:09:39'),
(16, 'german', 'CHE', '3e3d30dbd83d50c66feafadc65bb8a95.jpg', 0, 0, 0, '2016-10-06 15:18:23', '2016-10-11 05:11:37'),
(20, 'portuguese', 'PT', '9a353a87fa755162ea9dbe6bef9362cb.png', 1, 1, 0, '2016-10-10 11:45:10', '2016-11-14 08:19:35'),
(21, 'spanish', 'SP', '74d372ff9a21095f9c2056a5e35aa34d.png', 1, 0, 0, '2016-10-15 06:57:54', '2016-10-15 06:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `setting_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `setting_value` text CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`id`, `setting_name`, `setting_code`, `setting_value`, `status`, `created_at`, `modified_at`) VALUES
(1, 'plan_price', 'plan_price', '15', 1, NULL, '2016-11-05 08:21:28'),
(2, 'profile_image_max_size', 'profile_image_max_size', '', 1, NULL, '2016-10-18 14:56:47'),
(3, 'profile_image_height', 'profile_image_height', '150', 1, NULL, '2016-10-18 13:36:09'),
(4, 'profile_image_width', 'profile_image_width', '150', 1, NULL, '2016-10-18 13:35:18'),
(5, 'site_name', 'site_name', 'Athlete', 1, NULL, '2016-10-19 06:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(155) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_type` tinyint(2) DEFAULT NULL COMMENT '1: For Credit Card payment, 2: Express Check Out Payment',
  `order_status` varchar(155) NOT NULL DEFAULT '1' COMMENT '0: Pending, 1: Paid',
  `payment_status` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Not Deleted, 1: Deleted',
  `amount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `user_id`, `currency`, `transaction_id`, `payment_date`, `payment_type`, `order_status`, `payment_status`, `created_at`, `modified_at`, `delete_status`, `amount`) VALUES
(1, 28, 'USD', '0DL4905736359804U', '2016-11-05 00:00:00', 1, '1', 'Success', '2016-11-05 00:00:00', '2016-11-05 12:46:51', 0, '15'),
(2, 28, 'USD', '1MF400090K269101C', '2016-11-05 00:00:00', 1, '1', 'Success', '2016-11-05 00:00:00', '2016-11-05 12:48:24', 0, '15'),
(3, 29, 'USD', '8WY85663H99111525', NULL, 2, 'pending', 'Success', '2016-11-05 13:14:33', '2016-11-05 13:14:33', 0, '15'),
(4, 29, 'USD', '8WY85663H99111525', '2016-11-05 13:18:26', 2, 'pending', 'SuccessWithWarning', '2016-11-05 13:18:26', '2016-11-05 13:18:26', 0, '15'),
(5, 29, 'USD', '8WY85663H99111525', '2016-11-05 13:21:13', 2, 'pending', 'SuccessWithWarning', '2016-11-05 13:21:13', '2016-11-05 13:21:13', 0, '15'),
(6, 29, 'USD', '1S476129005726325', '2016-11-05 13:23:03', 2, 'pending', 'Success', '2016-11-05 13:23:03', '2016-11-05 13:23:03', 0, '15'),
(7, 33, 'USD', '7TS34698062556019', '2016-11-07 00:00:00', 1, '1', 'Success', '2016-11-07 00:00:00', '2016-11-07 06:08:42', 0, '15'),
(8, 1, 'USD', '9YW47284GK809033R', '2016-11-11 00:00:00', 1, '1', 'Success', '2016-11-11 00:00:00', '2016-11-11 05:49:56', 0, '15'),
(9, 1, 'USD', '42877703RL282191F', '2016-11-11 06:01:40', 2, '1', 'Success', '2016-11-11 06:01:40', '2016-11-11 06:01:40', 0, '15'),
(10, 50, 'USD', '9VM33915R9794131H', '2016-11-14 00:00:00', 1, '1', 'Success', '2016-11-14 00:00:00', '2016-11-14 10:18:51', 0, '15'),
(11, 63, 'USD', '0HD1190184528913D', '2016-11-16 00:00:00', 1, '1', 'Success', '2016-11-16 00:00:00', '2016-11-16 10:16:09', 0, '15'),
(12, 65, 'USD', '3NJ00792LN224790W', '2016-11-16 00:00:00', 1, '1', 'Success', '2016-11-16 00:00:00', '2016-11-16 10:47:36', 0, '15'),
(13, 69, 'USD', '1M127836WR6301409', '2016-11-16 00:00:00', 1, '1', 'Success', '2016-11-16 00:00:00', '2016-11-16 12:33:29', 0, '15'),
(14, 69, 'USD', '2A9278247L9522720', '2016-11-16 00:00:00', 1, '1', 'Success', '2016-11-16 00:00:00', '2016-11-16 12:34:06', 0, '15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_account`
--

CREATE TABLE `tbl_payment_account` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(155) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_type` tinyint(2) DEFAULT NULL COMMENT '1: For Credit Card payment, 2: Express Check Out Payment',
  `order_status` varchar(155) DEFAULT NULL COMMENT '0: Pending, 1: Paid',
  `payment_status` varchar(155) DEFAULT NULL COMMENT 'Success, Failure',
  `created_at` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: Not deleted, 1: Deleted',
  `amount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_account`
--

INSERT INTO `tbl_payment_account` (`id`, `order_id`, `user_id`, `currency`, `transaction_id`, `payment_date`, `payment_type`, `order_status`, `payment_status`, `created_at`, `modified_at`, `delete_status`, `amount`) VALUES
(1, 2, 28, 'USD', '1MF400090K269101C', '2016-11-05 00:00:00', 1, '1', 'Success', '2016-11-05 00:00:00', '2016-11-05 12:48:24', 0, '15'),
(2, 6, 29, 'USD', '1S476129005726325', '2016-11-05 13:23:03', 2, 'pending', 'Success', '2016-11-05 13:23:03', '2016-11-05 13:23:03', 0, '15'),
(3, 7, 33, 'USD', '7TS34698062556019', '2016-11-07 00:00:00', 1, '1', 'Success', '2016-11-07 00:00:00', '2016-11-07 06:08:42', 0, '15'),
(4, NULL, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-11 08:38:09', 0, NULL),
(5, NULL, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-14 10:16:10', 0, NULL),
(6, 10, 50, 'USD', '9VM33915R9794131H', '2016-11-14 00:00:00', 1, '1', 'Success', '2016-11-14 00:00:00', '2016-11-14 10:18:51', 0, '15'),
(7, NULL, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-14 11:39:20', 0, NULL),
(8, NULL, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-15 05:08:59', 0, NULL),
(9, 11, 63, 'USD', '0HD1190184528913D', '2016-11-16 00:00:00', 1, '1', 'Success', '2016-11-16 00:00:00', '2016-11-16 10:16:09', 0, '15'),
(10, 12, 65, 'USD', '3NJ00792LN224790W', '2016-11-16 00:00:00', 1, '1', 'Success', '2016-11-16 00:00:00', '2016-11-16 10:47:36', 0, '15'),
(11, 14, 69, 'USD', '2A9278247L9522720', '2016-11-16 00:00:00', 1, '1', 'Success', '2016-11-16 00:00:00', '2016-11-16 12:34:06', 0, '15'),
(12, NULL, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-18 10:29:53', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT '0',
  `user_type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1: Register as a Player user, 2: Register as club user ',
  `otp` int(255) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0: In-Active, 1 Active user',
  `paid_status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1: Register as a Free user, 2: Register as a Paid user,',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Not Deleted 1: Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `password`, `is_verified`, `user_type`, `otp`, `last_login`, `status`, `paid_status`, `delete_status`) VALUES
(1, 'rohit.c@cisinlabs.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, 0, '0000-00-00 00:00:00', 1, 2, 0),
(3, 'gaurav.vaidya@cisinlabs.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0, '0000-00-00 00:00:00', 1, 1, 0),
(6, 'luisaronchi@gmail.com', '092a0a9711ddfbdcd13da576a0076488', 1, 1, 0, '0000-00-00 00:00:00', 1, 1, 0),
(7, 'paulacmronchi@gmail.com', 'e231116aa23637fd2c0d7abf3882abf4', 1, 1, 0, '0000-00-00 00:00:00', 1, 1, 0),
(19, 'test@yopmail.com', 'a9d40905fca802e88355f9a2ee80bd79', 0, 1, 0, '0000-00-00 00:00:00', 1, 1, 0),
(20, 'priyesh@yopmail.com', '0cc3e01f37cbf3d5bdb8b1c49b4a72d2', 1, 1, 0, '0000-00-00 00:00:00', 1, 1, 0),
(32, 'mack@mailinator.com', 'f0d9034dbf98762538f538dcc7afab02', 1, 1, 0, NULL, 1, 1, 0),
(35, 'jack@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0, NULL, 0, 1, 0),
(36, 'macy@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(37, 'grover@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(38, 'anand@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(39, 'kishore@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(40, 'amit@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(41, 'nitin@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(42, 'niraj@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(43, 'harish@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(44, 'kirti@mailinator.com', '77de09ab595fda0fb22407e1fb1ef2df', 1, 1, 0, NULL, 1, 1, 0),
(46, 'josealb@gmail.com', '184b7d4e982dfd524e96b1cdd4960270', 0, 2, 0, NULL, 1, 1, 0),
(49, 'rronchi@me.com', 'eb9e65e5eeb2e5ae4a119804e9576aa1', 0, 2, 0, NULL, 1, 2, 0),
(51, 'lucacm@gmail.com', 'a6b3b2abd2114da30ffed357e32ed323', 0, 1, 0, NULL, 1, 0, 0),
(52, 'serrinha@football.com', 'e38a7806992d1615a2cca019f65808b5', 0, 2, 0, NULL, 1, 1, 0),
(53, 'jhonrio@mailinator.com', 'd2e1ccc642fd90d8e91383cfc0a8f344', 1, 2, 0, NULL, 1, 2, 0),
(54, 'joaosilva@gmail.com', '9be9fa64cebfe18a249288d4346ac381', 0, 1, 0, NULL, 1, 0, 0),
(55, 'demotest@mailinator.com', 'f3c3afd33dc74167e91193dad5642585', 1, 2, 0, NULL, 1, 2, 0),
(56, 'lucacm63@gmail.com', '2d16b30023e0f798ce97a4aec723beb6', 1, 1, 0, NULL, 1, 0, 0),
(68, 'priyeshtest@hotmail.com', '6e94ea2bcfb6731d029c015fa55fe834', 1, 1, 201615, NULL, 1, 1, 0),
(69, 'priyeshtest@yopmail.com', '511ea505903422c14417810536efdd05', 1, 2, 0, NULL, 1, 2, 0),
(70, 'paidplayer@yopmail.com', '08a7deb985d1d433e660bcacb3913471', 1, 1, 0, NULL, 1, 0, 0),
(71, 'sdfsdaf@mailinator.com', '503748e51d23a0583d46cdf46d54a832', 0, 2, 0, NULL, 1, 1, 0),
(72, 'sdfsdaf@gmail.com', 'c0447620e4d3c5a7b5cbaf8f4786c529', 0, 1, 0, NULL, 1, 1, 0),
(73, 'karan@mailinator.com', 'f17c9eb0fd72d391ff85ec716fcc074c', 1, 1, 0, NULL, 1, 1, 0),
(74, 'chanddu@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, 0, NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `id` int(255) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `club_manager_name` varchar(100) DEFAULT NULL,
  `club_name` varchar(155) DEFAULT NULL,
  `hire_club_name` varchar(155) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `nick_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `languages_speak` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `laterality` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `position_1` varchar(50) DEFAULT NULL,
  `position_2` varchar(50) DEFAULT NULL,
  `position_3` varchar(50) DEFAULT NULL,
  `player_type` varchar(50) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `facebook` varchar(155) DEFAULT NULL,
  `instagram` varchar(155) DEFAULT NULL,
  `twitter` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `club_id`, `club_manager_name`, `club_name`, `hire_club_name`, `first_name`, `last_name`, `nick_name`, `email`, `hash`, `age`, `weight`, `height`, `cpf`, `birthday`, `languages_speak`, `country`, `laterality`, `gender`, `position_1`, `position_2`, `position_3`, `player_type`, `profile_image`, `user_id`, `mobile`, `facebook`, `instagram`, `twitter`) VALUES
(1, NULL, 'Rohit', 'indore club', 'Indore club hire', NULL, NULL, 'Nic', 'rohit.c@cisinlabs.com', '218a0aefd1d1a4be65601cc6ddc1520e', 18, '45-50', '2.19', '546.456.565-64', '20/10/1998', '', '99', '2', '1', '2', '2', '2', '1', 'c20e03925360ec15ffd32ac4040d94f9.png', 1, '+12 12 12121 2121', 'www.facebook.com', 'www.instragram.com', 'hellotwitter'),
(2, NULL, 'Rubens', NULL, NULL, NULL, 'Filho', '', 'abc@mailinator.com', 'd14220ee66aeec73c49038385428ec4c', 26, '85', '175', '54696062791', '02/16/1990', '', '30', '1', '1', '2', '3', '5', '2', '27fe813129941aa93ee605334861c1de.png', 2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, '', '', 'Gaurav', 'Gaurav', 'Gaurav', 'gaurav.vaidya@cisinlabs.com', '0584ce565c824b7b7f50282d9a19945b', 26, '45-50', '1.3', '123456789-12', '02/07/1990', '', '2', '2', '1', '3', '4', '5', '2', '03b752befa72fe327027788269ef37da.jpeg', 3, '+90 34 34234 2422', 'www.facebook.com', '', ''),
(6, NULL, 'Luisa', NULL, NULL, NULL, 'Carvalho', 'Lu', 'luisaronchi@gmail.com', '8065d07da4a77621450aa84fee5656d9', 23, '45-50', '1.1', '14231292701', '03/02/1993', '', '30', '3', '2', '2', '3', '4', '2', 'd29b8c592048e474cca96eed2c1bed7c.jpg', 6, NULL, NULL, NULL, NULL),
(7, NULL, '', NULL, NULL, 'Paula', 'Ronchi', '', 'paulacmronchi@gmail.com', '26337353b7962f533d78c762373b3318', 26, '64', '1', '14231291721', '10/01/1990', '', '30', '2', '2', '3', '4', '5', '2', 'd29b8c592048e474cca96eed2c1bed7c.jpg', 7, NULL, NULL, NULL, NULL),
(32, NULL, '', NULL, '', 'Mack1', 'pol', NULL, 'mack@mailinator.com', '6c9882bbac1c7093bd25041881277658', 18, NULL, NULL, '0', '06/19/1990', NULL, NULL, NULL, '1', '2', '3', '5', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 32, NULL, NULL, NULL, NULL),
(35, 1, 'Jack', NULL, '', 'jack', 'player', 'hello fdfgfg', 'jack@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, '', '2.2', '554.545.646-54', '06/17/1980', NULL, '99', '1', '1', '2', '3', '4', '2', 'd29b8c592048e474cca96eed2c1bed7c.jpg', 35, '+45 56 55646 6455', '', '', ''),
(36, 1, 'Macy', NULL, NULL, 'macy', 'player', NULL, 'macy@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, '99', NULL, '1', '2', '3', '4', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 36, NULL, NULL, NULL, NULL),
(37, 1, 'Grover', NULL, NULL, 'grover', 'player', NULL, 'grover@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', '99', NULL, NULL, '1', '2', '3', '4', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 37, NULL, NULL, NULL, NULL),
(38, 1, 'Anand', NULL, NULL, 'anand', 'player', NULL, 'anand@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, NULL, NULL, '1', '2', '3', '4', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 38, NULL, NULL, NULL, NULL),
(39, 1, 'Kishore', NULL, NULL, 'kishore', 'player', NULL, 'kishore@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, NULL, NULL, '1', '2', '3', '4', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 39, NULL, NULL, NULL, NULL),
(40, 1, 'Amit', NULL, NULL, 'amit', 'player', NULL, 'amit@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, NULL, NULL, '1', '2', '3', '4', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 40, NULL, NULL, NULL, NULL),
(41, 1, 'Nitin', NULL, NULL, 'nitin', 'player', NULL, 'nitin@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, NULL, NULL, '1', '2', '3', '4', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 41, NULL, NULL, NULL, NULL),
(42, 1, 'Niraj', NULL, NULL, 'niraj', 'player', NULL, 'niraj@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, NULL, NULL, '1', '2', '3', '4', NULL, 'd29b8c592048e474cca96eed2c1bed7c.jpg', 42, NULL, NULL, NULL, NULL),
(43, 1, 'Harish', NULL, NULL, 'harish', 'player', NULL, 'harish@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, NULL, NULL, '1', '2', '3', '4', NULL, NULL, 43, NULL, NULL, NULL, NULL),
(44, 1, 'Kirti', NULL, NULL, 'kirti', 'player', NULL, 'kirti@mailinator.com', '291597a100aadd814d197af4f4bab3a7', 18, NULL, NULL, NULL, '06/17/1980', NULL, NULL, NULL, '1', '2', '3', '4', NULL, NULL, 44, NULL, NULL, NULL, NULL),
(46, NULL, 'Jose Alberto', NULL, NULL, NULL, 'da Silva Ramos', NULL, 'josealb@gmail.com', '677e09724f0e2df9b6c000b75b5da10d', 35, NULL, NULL, '0', '11/20/1980', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 46, NULL, NULL, NULL, NULL),
(49, NULL, 'Olaria', NULL, NULL, NULL, 'Futebol Clube', NULL, 'rronchi@me.com', '13f3cf8c531952d72e5847c4183e6910', 116, NULL, NULL, '0', '02/06/1900', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 49, NULL, NULL, NULL, NULL),
(50, NULL, 'Clube de Regatas do Flamengo', NULL, NULL, NULL, 'Filho', NULL, 'alfaduet@gmail.com', 'b56a18e0eacdf51aa2a5306b0f533204', 125, NULL, NULL, '0', '11/15/1890', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, NULL),
(51, NULL, 'Gaurav', NULL, NULL, NULL, 'wfa', NULL, 'lucacm@gmail.com', '75fc093c0ee742f6dddaa13fff98f104', 21, NULL, NULL, NULL, '07/19/1995', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 51, NULL, NULL, NULL, NULL),
(52, NULL, 'Serrinha', NULL, NULL, NULL, 'Football Club', NULL, 'serrinha@football.com', '69adc1e107f7f7d035d7baf04342e1ca', 106, NULL, NULL, '0', '06/21/1910', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL),
(53, NULL, 'Jhon', 'Flamengo', NULL, NULL, 'rio', 'Zico', 'jhonrio@mailinator.com', '9dfcd5e558dfa04aaf37f137a1d9d3e5', 121, '55-60', '1.76', '0', '15/11/1895', NULL, '30', '1', '1', '2', '3', '4', '2', 'f7bc22cf963c78f302898ead242663ac.png', 53, '+55 21 98765 3442', '', '', ''),
(54, 53, 'João', NULL, '', 'Joao', 'Silva', 'Jo', 'joaosilva@gmail.com', 'c15da1f2b5e5ed6e6837a3802f0d1593', 26, '', '1.91', '123.456.789-01', '01/30/1990', NULL, '30', '3', '1', '1', '1', '1', '2', NULL, 54, '+55 31 78967 5432', '', '', ''),
(56, NULL, NULL, NULL, NULL, 'Luciana', 'Carvalho de Mendonca', NULL, 'lucacm63@gmail.com', '6c3cf77d52820cd0fe646d38bc2145ca', 53, NULL, NULL, NULL, '29/09/1963', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 56, NULL, NULL, NULL, NULL),
(65, NULL, 'Rubens', 'Rio club', NULL, NULL, NULL, '', 'rioclub@mailinator.com', '2ba596643cbbbc20318224181fa46b28', 36, NULL, NULL, NULL, '16/07/1980', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, '2e9dd7ae41e9d9810b38867bf47fa800.jpg', 65, '', '', '', ''),
(68, NULL, NULL, NULL, '', 'test', 'test', NULL, 'priyeshtest@hotmail.com', '7a53928fa4dd31e82c6ef826f341daec', 46, '90-95', '1.15', '745.555.555-55', '28/10/1970', NULL, '2', '1', '1', '1', '3', '11', '2', '27b72f775f20d4d121287bccc7be38db.gif', 68, NULL, NULL, NULL, NULL),
(69, NULL, 'paid priyesh', 'Paid Club', NULL, NULL, NULL, NULL, 'priyeshtest@yopmail.com', '44f683a84163b3523afe57c2e008bc8c', 55, NULL, NULL, NULL, '07/02/1961', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 69, NULL, NULL, NULL, NULL),
(70, 69, NULL, NULL, 'paidplayer', 'paidplayer', 'paidplayer', NULL, 'paidplayer@yopmail.com', 'd09bf41544a3365a46c9077ebb5e35c3', 46, '90-95', '1.15', '455.555.555-55', '05/01/1970', NULL, '99', '2', '1', '1', '1', '10', '1', NULL, 70, NULL, NULL, NULL, NULL),
(71, NULL, 'sdfsdaf', 'sdfsdd', NULL, NULL, NULL, NULL, 'sdfsdaf@mailinator.com', '05f971b5ec196b8c65b75d2ef8267331', 26, NULL, NULL, NULL, '12/06/1990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 71, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, '', 'dsfsa', 'sdfasf', NULL, 'sdfsdaf@gmail.com', 'a1d33d0dfec820b41b54430b50e96b5c', 26, '45-50', '1.1', '454.545.444-65', '20/06/1990', NULL, '2', '1', '1', '1', '1', '1', '2', NULL, 72, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, '', 'Karan', 'singh', NULL, 'karan@mailinator.com', 'c22abfa379f38b5b0411bc11fa9bf92f', 26, '45-50', '1.1', '545.645.645-65', '19/06/1990', NULL, '2', '2', '1', '1', '1', '1', '2', NULL, 73, NULL, NULL, NULL, NULL),
(74, NULL, 'Chanddu', 'Chanddu & club', NULL, NULL, NULL, NULL, 'chanddu@mailinator.com', '46922a0880a8f11f8f69cbb52b1396be', 36, NULL, NULL, NULL, '22/08/1980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 74, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE `tbl_videos` (
  `id` int(255) NOT NULL,
  `player_id` int(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `video_type` varchar(255) DEFAULT NULL,
  `thumbnail_image` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upload_video_type` tinyint(2) DEFAULT NULL COMMENT '1: video url, 2: uploaded video',
  `upload_video` varchar(155) DEFAULT NULL,
  `orignal_video_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_videos`
--

INSERT INTO `tbl_videos` (`id`, `player_id`, `title`, `filename`, `video_type`, `thumbnail_image`, `created_date`, `modify_date`, `upload_video_type`, `upload_video`, `orignal_video_url`) VALUES
(1, 1, 'youtube video', 'https://www.youtube.com/embed/dAS7cuD6dGQ', 'youtube', 'https://img.youtube.com/vi/dAS7cuD6dGQ/0.jpg', '2016-11-21 04:59:55', '2016-11-21 04:59:55', NULL, NULL, 'https://www.youtube.com/watch?v=dAS7cuD6dGQ'),
(2, 1, 'vimeo video', 'https://player.vimeo.com/video/191850457', 'vimeo', 'http://i.vimeocdn.com/video/603031065_640.jpg', '2016-11-21 05:02:00', '2016-11-21 05:02:00', NULL, NULL, 'https://vimeo.com/191850457'),
(3, 1, 'vine video', 'https://vine.co/v/OjOVg6Eni6v/embed/simple', 'vine', 'https://v.cdn.vine.co/r/videos/03F6A036971168067953372073984_359672a55bf.1.5.13417074545165166108.mp4.jpg?versionId=KURl1DRRguFYF9dUHGM_DI0I7lpmD6PG', '2016-11-21 05:01:50', '2016-11-21 05:01:50', NULL, NULL, 'https://vine.co/v/OjOVg6Eni6v/'),
(5, 3, 'yourtube', 'https://www.youtube.com/embed/dAS7cuD6dGQ', 'youtube', 'https://img.youtube.com/vi/dAS7cuD6dGQ/0.jpg', '2016-11-21 05:08:49', '2016-11-21 05:08:49', NULL, NULL, 'https://www.youtube.com/watch?v=dAS7cuD6dGQ'),
(6, 3, 'vine video', 'https://vine.co/v/OjOVg6Eni6v/embed/simple', 'vine', 'https://v.cdn.vine.co/r/videos/03F6A036971168067953372073984_359672a55bf.1.5.13417074545165166108.mp4.jpg?versionId=KURl1DRRguFYF9dUHGM_DI0I7lpmD6PG', '2016-11-21 05:10:38', '2016-11-21 05:10:38', NULL, NULL, 'https://vine.co/v/OjOVg6Eni6v/'),
(7, 3, 'vimeo video', 'https://player.vimeo.com/video/191850457', 'vimeo', 'http://i.vimeocdn.com/video/603031065_640.jpg', '2016-11-21 05:11:18', '2016-11-21 05:11:18', NULL, NULL, 'https://vimeo.com/191850457');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about_us_history`
--
ALTER TABLE `tbl_about_us_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_email_templates`
--
ALTER TABLE `tbl_admin_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_biography`
--
ALTER TABLE `tbl_biography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ci_sessions`
--
ALTER TABLE `tbl_ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_contact_admin`
--
ALTER TABLE `tbl_contact_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `idx_country_3_code` (`country_3_code`),
  ADD KEY `idx_country_2_code` (`country_2_code`);

--
-- Indexes for table `tbl_favorities_player`
--
ALTER TABLE `tbl_favorities_player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_account`
--
ALTER TABLE `tbl_payment_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_videos`
--
ALTER TABLE `tbl_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about_us_history`
--
ALTER TABLE `tbl_about_us_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admin_email_templates`
--
ALTER TABLE `tbl_admin_email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_biography`
--
ALTER TABLE `tbl_biography`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tbl_contact_admin`
--
ALTER TABLE `tbl_contact_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` smallint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT for table `tbl_favorities_player`
--
ALTER TABLE `tbl_favorities_player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_payment_account`
--
ALTER TABLE `tbl_payment_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tbl_videos`
--
ALTER TABLE `tbl_videos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
