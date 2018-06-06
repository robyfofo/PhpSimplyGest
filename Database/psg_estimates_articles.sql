-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Giu 05, 2018 alle 15:51
-- Versione del server: 5.7.22-0ubuntu18.04.1
-- Versione PHP: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpsimplygest`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `psg_estimates_articles`
--

CREATE TABLE `psg_estimates_articles` (
  `id` int(8) NOT NULL,
  `id_owner` int(8) NOT NULL DEFAULT '0',
  `id_estimate` int(8) NOT NULL,
  `content` text NOT NULL,
  `price_unity` varchar(10) NOT NULL,
  `tax` varchar(5) NOT NULL,
  `price_tax` float(10,2) NOT NULL,
  `price_total` float(10,2) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `psg_estimates_articles`
--
ALTER TABLE `psg_estimates_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_estimate`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `psg_estimates_articles`
--
ALTER TABLE `psg_estimates_articles`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
