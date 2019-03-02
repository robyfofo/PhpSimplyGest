-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: 62.149.150.181
-- Generato il: Mar 01, 2019 alle 17:07
-- Versione del server: 5.5.61
-- Versione PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Sql631676_3`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `psg_invoices_sales`
--

CREATE TABLE IF NOT EXISTS `psg_invoices_sales` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_user` int(8) NOT NULL DEFAULT '0',
  `id_customer` int(8) NOT NULL DEFAULT '0',
  `dateins` date NOT NULL,
  `datesca` date NOT NULL,
  `number` varchar(20) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `tax` int(2) NOT NULL DEFAULT '0',
  `rivalsa` int(2) NOT NULL DEFAULT '0',
  `pagata` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`),
  KEY `id_user` (`id_user`),
  KEY `active` (`active`),
  KEY `pagata` (`pagata`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=20 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
