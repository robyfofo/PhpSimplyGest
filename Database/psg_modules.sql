-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Apr 09, 2018 alle 10:37
-- Versione del server: 5.7.21-0ubuntu0.16.04.1
-- Versione PHP: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

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
-- Struttura della tabella `psg_modules`
--

CREATE TABLE `psg_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `code_menu` text NOT NULL,
  `ordering` int(4) NOT NULL DEFAULT '0',
  `section` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `help_small` varchar(255) NOT NULL,
  `help` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `psg_modules`
--

INSERT INTO `psg_modules` (`id`, `name`, `label`, `alias`, `comment`, `code_menu`, `ordering`, `section`, `active`, `help_small`, `help`) VALUES
(1, 'home', 'Home', 'home', 'La pagina home di ogni utente', '<li class="%LICLASS%"><a href="%URLSITE%%NAME%"><i class="fa fa-home fa-fw"></i> %LABEL%</a></li>', 1, 1, 1, '', ''),
(2, 'third-party', 'Soggetti Terzi', 'third-party', '', '<li class="%LICLASS%">\r\n	<a href="#"><i class="fa fa-users fa-fw"></i> %LABEL%<span class="fa arrow"></span></a>\r\n	<ul class="nav nav-second-level">\r\n		<li><a href="%URLSITE%%NAME%/listScat"><i class="fa fa-folder-open fa-fw"></i> Categorie</a></li>\r\n		<li><a href="%URLSITE%%NAME%/listItem"><i class="fa fa-users fa-fw"></i> Soggetti Terzi</a></li>\r\n	</ul>\r\n</li>', 3, 1, 1, '', ''),
(3, 'invoices', 'Fatture', 'invoices', 'Il modulo che gestisce le fatture', '<li class="%LICLASS%">\r\n	<a href="#"><i class="fa fa-wpforms fa-fw"></i> %LABEL%<span class="fa arrow"></span></a>\r\n	<ul class="nav nav-second-level">\r\n		<li><a href="%URLSITE%%NAME%/listInvSal"><i class="fa fa-wpforms fa-fw"></i> Fatture Vendite</a></li>\r\n		<li><a href="%URLSITE%%NAME%/listInvPur"><i class="fa fa-wpforms fa-fw"></i> Fatture Acquisti</a></li>\r\n	</ul>\r\n</li>', 4, 1, 1, '', ''),
(4, 'company', 'Company', 'company', 'La configurazione aziendale', '<li class="%LICLASS%"><a href="%URLSITE%%NAME%"><i class="fa fa-industry fa-fw"></i> %LABEL%</a></li>', 2, 0, 1, '', '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `psg_modules`
--
ALTER TABLE `psg_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `psg_modules`
--
ALTER TABLE `psg_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
