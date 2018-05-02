-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2018 at 05:53 PM
-- Server version: 5.6.19-log
-- PHP Version: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acsess` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `acsess`) VALUES
(1, 'admin'),
(2, 'project'),
(3, 'user'),
(4, 'office_manager'),
(5, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `all_office`
--

CREATE TABLE IF NOT EXISTS `all_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `all_office`
--

INSERT INTO `all_office` (`id`, `office_name`) VALUES
(1, 'Лондон'),
(2, 'Женева'),
(3, 'Пекин'),
(4, 'Осло'),
(5, 'Тель-Авив'),
(6, 'Кельн'),
(7, 'Магадан'),
(8, 'Рим'),
(9, 'Дублин');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_task` int(11) NOT NULL,
  `data_reg` date NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `crashplan`
--

CREATE TABLE IF NOT EXISTS `crashplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rar_pass` varchar(255) NOT NULL,
  `max_lic` int(11) NOT NULL,
  `list_users` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `crashplan`
--

INSERT INTO `crashplan` (`id`, `name`, `pass`, `rar_pass`, `max_lic`, `list_users`) VALUES
(1, 'saturnasm@gmail.com', 'SB83iSvIpPsf2PzNCBx5', '', 10, '17,22,56,089,47,7,dell-bs,194,горкуша ноутбук'),
(2, 'itresearchllc@gmail.com', 'yFuXjvPjek', '', 10, '036,044,038,196,080,195,165,033,035,027,103'),
(3, 'homedomen@gmail.com', 'sj9vadXqMX', '', 10, '196,165,44,80,33,038,035,027,036,103'),
(4, 'hearts.seems@gmail.com', 'hearts.seems@gmail.com', '', 10, '029,041,045,081,082,102,152,156,193,195,196'),
(5, 'hanniees@gmail.com', 'c[m,h40x59dgkjd,k', '', 10, '002,009,067,074,079,085,119,153,198,199\r\n\r\n'),
(6, '1970goverla@gmail.com', 'MZG:$#$HMX$FD*CJ:X$(@#RJZ:<JG$F', 'Q#R(xcu,jf9xkr30r', 10, '155,115,064,026,075,039,092,99,05,087'),
(7, 'mnpsservices@gmail.com', 'bd67cdce517a816562131e8d01a314cd', '', 10, '034,054,078,091,097,101,168,193,200,201\r\n'),
(8, 'infosocialbakers@gmail.com', 'L5zfDmTThouHJL4a6O4F', '', 10, '052,049,051,048,053,084,055,050,090,054'),
(9, 'laraunlimitedco@gmail.com', '69YVLel373unwnYdjkIZ', '', 20, '133,010,012,013,016,019,028,086,088,093,122,127,128,129,130,131,135,137,190,191\r\n'),
(10, 'infofollowerwonk@gmail.com', 'lxsYCQQE8ILlKzt1DS7k', '', 10, '140,136,132,138,141,142,151,146,147,184'),
(11, 'appstotopinfo@gmail.com', 'yyL7XaUH1smJbe0mbo36', '', 10, '123,159,116,139,158,143,118,157,162,154'),
(12, 'rentkiev.com@gmail.com', '4V7Abxnq4PqQBmtt64PQ', '', 10, '180,181,182,183,175,176,185,173,188,189'),
(13, 'checkfollowers@gmail.com', 'JjqnoNZC7qAx26Kffqho', '', 10, '203,204,163,207');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_office` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE IF NOT EXISTS `pc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_pc` int(11) NOT NULL,
  `pass_pc` varchar(255) NOT NULL,
  `pass_first` varchar(255) NOT NULL,
  `pass_second` varchar(255) NOT NULL,
  `pass_third` varchar(255) NOT NULL,
  `pc_note` text NOT NULL,
  `pc_data_last_edit` date NOT NULL,
  `user_id_edit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`id`, `id_type_pc`, `pass_pc`, `pass_first`, `pass_second`, `pass_third`, `pc_note`, `pc_data_last_edit`, `user_id_edit`) VALUES
(1, 1, 'se00k!', 'скрытая2906папка', 'windows1502new', 'Безпароля', 'sdf', '2017-12-01', 1),
(2, 1, 'das', 'sadas', 'asd', 'asd5', '', '2017-12-04', 1),
(3, 1, 'fsdf', 'sfd', 'sdf', 'sdfв4', '', '2017-12-10', 1),
(4, 2, 'fsd', 'sdf', 'sdf', 'dfh', '', '2017-12-14', 1),
(5, 2, 'апра', 'апр', 'апр', 'апр', '', '2017-12-18', 1),
(6, 1, 'asda', 'asda', 'asdas', 'asdas', '', '2017-12-22', 1),
(7, 2, 'moy note', '33', '44', '55', '=)', '2017-12-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `data_reg` date NOT NULL,
  `deadline` date NOT NULL,
  `data_clouse` date NOT NULL,
  `important` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `type_pc`
--

CREATE TABLE IF NOT EXISTS `type_pc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_pc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type_pc`
--

INSERT INTO `type_pc` (`id`, `type_pc`) VALUES
(1, 'PC'),
(2, 'Notebook'),
(3, 'MacBook'),
(4, 'Mac mini');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `id_office` int(11) NOT NULL,
  `id_pc` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `dataReg` date NOT NULL,
  `id_user_last_edit` int(11) NOT NULL,
  `data_last_edit` date NOT NULL,
  `id_access` int(11) NOT NULL DEFAULT '2',
  `img_url` varchar(255) NOT NULL,
  `url_kee_pass_bd` text NOT NULL,
  `url_kee_pass_key` text NOT NULL,
  `key_time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `id_office`, `id_pc`, `id_project`, `phone`, `birthday`, `dataReg`, `id_user_last_edit`, `data_last_edit`, `id_access`, `img_url`, `url_kee_pass_bd`, `url_kee_pass_key`, `key_time`) VALUES
(1, 'Dauzer', 'cd4f343a7ed37f56d106513c6fe97ee4', 4, 1, 1, '0993628823', '1992-02-15', '2018-01-06', 1, '2018-01-06', 2, '', '', '', 'c275822e66819bc59d0cf0d9debd3e9a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
