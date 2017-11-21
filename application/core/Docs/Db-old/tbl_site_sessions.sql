-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 04, 2016 alle 16:04
-- Versione del server: 5.7.16-0ubuntu0.16.04.1
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_sessions`
--

CREATE TABLE `tbl_site_sessions` (
  `sessid` varchar(32) NOT NULL,
  `session_vars` text NOT NULL,
  `session_date` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_sessions`
--
ALTER TABLE `tbl_site_sessions`
  ADD UNIQUE KEY `sessid` (`sessid`);

