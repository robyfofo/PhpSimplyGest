-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mar 12, 2019 alle 09:12
-- Versione del server: 5.7.25-0ubuntu0.18.04.2
-- Versione PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phprojekt.altervista`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `psg_thirdparty`
--

CREATE TABLE `psg_thirdparty` (
  `id` int(8) NOT NULL,
  `id_cat` int(8) NOT NULL DEFAULT '0',
  `id_owner` int(8) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `province` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `id_type` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `ragione_sociale` varchar(255) DEFAULT NULL,
  `partita_iva` varchar(50) DEFAULT NULL,
  `codice_fiscale` varchar(50) DEFAULT NULL,
  `pec` varchar(255) DEFAULT NULL,
  `sid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `psg_thirdparty`
--
ALTER TABLE `psg_thirdparty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`(191)),
  ADD KEY `nome` (`name`),
  ADD KEY `cognome` (`surname`),
  ADD KEY `active` (`active`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_owner` (`id_owner`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `psg_thirdparty`
--
ALTER TABLE `psg_thirdparty`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
