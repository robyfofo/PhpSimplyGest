-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Set 23, 2020 alle 10:40
-- Versione del server: 5.7.31-0ubuntu0.18.04.1
-- Versione PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phprojekt.altervista_phpsimplygest130`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `psg130_projects`
--

CREATE TABLE `psg130_projects` (
  `id` int(8) NOT NULL,
  `users_id` int(8) NOT NULL DEFAULT '0',
  `id_contact` int(8) NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `costo_orario` float(10,2) DEFAULT NULL,
  `completato` int(1) NOT NULL DEFAULT '0',
  `timecard` int(1) NOT NULL DEFAULT '0',
  `current` int(1) NOT NULL DEFAULT '0',
  `access_type` int(1) NOT NULL DEFAULT '0',
  `access_read` text,
  `access_write` text,
  `created` datetime NOT NULL,
  `active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `psg130_projects`
--
ALTER TABLE `psg130_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`),
  ADD KEY `current` (`current`),
  ADD KEY `access_type` (`access_type`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `psg130_projects`
--
ALTER TABLE `psg130_projects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
