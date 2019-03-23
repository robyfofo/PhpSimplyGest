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
-- Struttura della tabella `mprj_modules`
--

CREATE TABLE `mprj_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `content` text,
  `code_menu` text,
  `ordering` int(8) NOT NULL DEFAULT '0',
  `section` int(1) NOT NULL DEFAULT '1',
  `help_small` text,
  `help` longtext,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `mprj_modules`
--

INSERT INTO `mprj_modules` (`id`, `name`, `label`, `alias`, `content`, `code_menu`, `ordering`, `section`, `help_small`, `help`, `active`) VALUES
(1, 'users', 'Utenti', 'user', 'Il modulo che gestisce gli utenti', '{\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-users fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\"}', 2, 0, 'Aiuto breve del modulo users', '<p>Aiuto del modulo users</p>', 1),
(2, 'levels', 'Livelli Utente', 'levels', 'Il modulo che gestisce i livelli utente', '{\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-users fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\"}', 3, 0, 'aiuto breve livelli', '<p>aiuto livelli</p>', 1),
(3, 'home', 'Home', 'home', 'La pagina home di ogni utente', '{\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-home fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\"}', 1, 0, 'Aiuto breve modulo Home', '<p>Aiuto modulo Home</p>', 1),
(4, 'modules', 'Moduli', 'modules', 'Il modulo per installare e configurare i moduli del sito', '{\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-cog fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\"}', 1, 2, 'Aiuto breve del modulo Moduli', '<p>Aiuto completo del modulo Moduli</p>', 1),
(5, 'projects', 'Progetti', 'projects', 'Il modulo per la gestione di progetti', '{\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-cog fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\"}', 6, 0, 'Aiuto breve modulo progetti', '<p>Aiuto completo modulo progetti</p>', 1),
(6, 'todo', 'Da Fare', 'todo', 'Il modulo che gestisce i da fare', '{\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-bookmark-o fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\"}', 7, 0, '', '', 1),
(7, 'timecard', 'Timecard', 'timecard', 'Il modulo per gestire i tempi lavorativi', '{\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-clock-o fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\"}', 8, 0, '', '', 1),
(8, 'thirdparty', 'Terze Parti', 'thirdparty', 'Il modulo per la gestione delle terze parti', '{\r\n	\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-users fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\",\"submenus\":\r\n		[\r\n			{\"action\":\"%NAME%\",\"name\":\"listScat\",\"icon\":\"<i class=\\\"fa fa-folder-open fa-fw\\\"><\\/i>\",\"label\":\"Categorie\"},\r\n			{\"action\":\"%NAME%\",\"name\":\"listItem\",\"icon\":\"<i class=\\\"fa fa-users fa-fw\\\"><\\/i>\",\"label\":\"Soggetti Terzi\"}\r\n		]\r\n}', 4, 0, '', '', 1),
(9, 'invoices', 'Fatture', 'invoices', '', '{\r\n	\"name\":\"%NAME%\",\"icon\":\"<i class=\\\"fa fa-wpforms fa-fw\\\"><\\/i>\",\"label\":\"%LABEL%\",\"submenus\":\r\n		[\r\n			{\"action\":\"%NAME%\",\"name\":\"listInvSal\",\"icon\":\"<i class=\\\"fa fa-wpforms fa-fw\\\"><\\/i>\",\"label\":\"Fatture Vendite\"},\r\n			{\"action\":\"%NAME%\",\"name\":\"listInvPur\",\"icon\":\"<i class=\\\"fa fa-wpforms fa-fw\\\"><\\/i>\",\"label\":\"Fatture Acquisti\"}\r\n		]\r\n}', 9, 0, '', '', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `mprj_modules`
--
ALTER TABLE `mprj_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `alias` (`alias`(250));

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `mprj_modules`
--
ALTER TABLE `mprj_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
