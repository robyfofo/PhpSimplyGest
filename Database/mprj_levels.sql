-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mar 16, 2019 alle 11:24
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
-- Struttura della tabella `mprj_levels`
--

CREATE TABLE `mprj_levels` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `modules` text NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `mprj_levels`
--

INSERT INTO `mprj_levels` (`id`, `title`, `modules`, `active`) VALUES
(1, 'User', 'home,projects,todo,timecard,thirdparty', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `mprj_levels`
--
ALTER TABLE `mprj_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `mprj_levels`
--
ALTER TABLE `mprj_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
