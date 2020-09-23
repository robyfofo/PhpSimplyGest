-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Set 23, 2020 alle 10:38
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
-- Struttura della tabella `psg130_company`
--

CREATE TABLE `psg130_company` (
  `id` int(8) NOT NULL,
  `ragione_sociale` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `provincia` varchar(150) DEFAULT NULL,
  `nation` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `partita_iva` varchar(50) DEFAULT NULL,
  `codice_fiscale` varchar(50) DEFAULT NULL,
  `gestione_iva` int(1) NOT NULL DEFAULT '0',
  `iva` int(2) NOT NULL DEFAULT '0',
  `text_noiva` varchar(255) DEFAULT NULL,
  `gestione_rivalsa` int(1) NOT NULL DEFAULT '1',
  `rivalsa` int(2) NOT NULL,
  `text_rivalsa` varchar(255) DEFAULT NULL,
  `banca` varchar(100) DEFAULT NULL,
  `intestatario` varchar(100) DEFAULT NULL,
  `iban` varchar(40) DEFAULT NULL,
  `bic_swift` varchar(20) DEFAULT NULL,
  `location_province_id` int(10) NOT NULL DEFAULT '0',
  `location_nations_id` int(10) NOT NULL DEFAULT '0',
  `location_comuni_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `psg130_company`
--

INSERT INTO `psg130_company` (`id`, `ragione_sociale`, `name`, `surname`, `street`, `city`, `zip_code`, `provincia`, `nation`, `email`, `telephone`, `mobile`, `fax`, `partita_iva`, `codice_fiscale`, `gestione_iva`, `iva`, `text_noiva`, `gestione_rivalsa`, `rivalsa`, `text_rivalsa`, `banca`, `intestatario`, `iban`, `bic_swift`, `location_province_id`, `location_nations_id`, `location_comuni_id`) VALUES
(1, 'Roberto Mantovani', 'Roberto', 'Mantovani', 'Via Garofoli, 302', 'San Giovanni Lupatoto', '37057', 'Verona', 'Italia', 'me@robertomantovani.vr.it', '045548841', '3291566132', '0452589600', 'IT03781XXXXXX', 'MNTRRT66P0XXXXXX', 0, 22, 'Operazione effettuata ai sensi dell’art. 1, commi da 54 a 89 della Legge n. 190/2014 – Regime forfettario', 1, 4, 'RIVALSA INPS 4%', 'Banco Posta', 'Roberto Mantovani', 'IT45D076011170000XXXXXXXXXX', 'BPXXXXXXXX', 23, 116, 6242);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `psg130_company`
--
ALTER TABLE `psg130_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`(191)),
  ADD KEY `nome` (`name`),
  ADD KEY `cognome` (`surname`),
  ADD KEY `location_province_id` (`location_province_id`),
  ADD KEY `location_nations_id` (`location_nations_id`),
  ADD KEY `location_comuni_id` (`location_comuni_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `psg130_company`
--
ALTER TABLE `psg130_company`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
