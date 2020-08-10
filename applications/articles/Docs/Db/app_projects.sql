-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Lug 05, 2018 alle 14:14
-- Versione del server: 5.7.22-0ubuntu18.04.1
-- Versione PHP: 7.2.5-0ubuntu0.18.04.1

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
-- Struttura della tabella `app_projects`
--

CREATE TABLE `app_projects` (
  `id` int(8) NOT NULL,
  `id_user` int(8) NOT NULL DEFAULT '0',
  `id_contact` int(8) NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `status` int(2) DEFAULT NULL,
  `costo_orario` float(10,2) DEFAULT '0.00',
  `completato` int(1) NOT NULL DEFAULT '0',
  `timecard` int(1) NOT NULL DEFAULT '0',
  `current` int(1) NOT NULL DEFAULT '0',
  `access_read` text,
  `access_write` text,
  `created` datetime NOT NULL,
  `active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `app_projects`
--
ALTER TABLE `app_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_contact` (`id_contact`),
  ADD KEY `active` (`active`),
  ADD KEY `current` (`current`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `app_projects`
--
ALTER TABLE `app_projects`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
