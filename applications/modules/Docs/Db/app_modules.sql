-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Lug 05, 2018 alle 09:44
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
-- Struttura della tabella `app_modules`
--

CREATE TABLE `app_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `comment` text,
  `code_menu` text,
  `ordering` int(4) NOT NULL DEFAULT '0',
  `section` int(1) NOT NULL DEFAULT '1',
  `help_small` varchar(255) DEFAULT NULL,
  `help` text,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `app_modules`
--

INSERT INTO `app_modules` (`id`, `name`, `label`, `alias`, `comment`, `code_menu`, `ordering`, `section`, `help_small`, `help`, `active`) VALUES
(1, 'users', 'Utenti', 'user', 'Il modulo che gestisce gli utenti', '<li class=\"%LICLASS%\"><a href=\"%URLSITE%%NAME%\"><i class=\"fa fa-users fa-fw\"></i> %LABEL%</a></li>', 2, 0, 'Aiuto breve del modulo users', '<p>Aiuto del modulo users</p>', 1),
(2, 'levels', 'Livelli Utente', 'levels', 'Il modulo che gestisce i livelli utente', '<li class=\"%LICLASS%\"><a href=\"%URLSITE%%NAME%\"><i class=\"fa fa-users fa-fw\"></i> %LABEL%</a></li>', 3, 0, 'aiuto breve livelli', '<p>aiuto livelli</p>', 1),
(3, 'home', 'Home', 'home', 'La pagina home di ogni utente', '<li class=\"%LICLASS%\"><a href=\"%URLSITE%%NAME%\"><i class=\"fa fa-home fa-fw\"></i> %LABEL%</a></li>', 1, 0, 'Aiuto breve modulo Home', '<p>Aiuto modulo Home</p>', 1),
(4, 'modules', 'Moduli', 'modules', 'Il modulo per installare e configurare i moduli del sito', '<li class=\"%LICLASS%\"><a href=\"%URLSITE%%NAME%\"><i class=\"fa fa-cog fa-fw\"></i> %LABEL%</a></li>', 1, 2, 'Aiuto breve del modulo Moduli', '<p>Aiuto completo del modulo Moduli</p>', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `app_modules`
--
ALTER TABLE `app_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `alias` (`alias`(250));

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `app_modules`
--
ALTER TABLE `app_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
