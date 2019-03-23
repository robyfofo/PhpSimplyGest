-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mar 16, 2019 alle 11:27
-- Versione del server: 5.7.25-0ubuntu0.18.04.2
-- Versione PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phprojekt.altervista_phpsimplygest`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `mprj_thirdparty_types`
--

CREATE TABLE `mprj_thirdparty_types` (
  `id` int(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `mprj_thirdparty_types`
--
ALTER TABLE `mprj_thirdparty_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `mprj_thirdparty_types`
--
ALTER TABLE `mprj_thirdparty_types`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
