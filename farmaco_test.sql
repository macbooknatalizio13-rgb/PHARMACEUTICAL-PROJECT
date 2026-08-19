-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmaco_test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `farmaco`
--

CREATE TABLE `farmaco` (
  `ID_FARMACO` int(11) NOT NULL,
  `NOME_FARMACO` varchar(100) NOT NULL,
  `CATEGORIA_TERAPEUTICA` varchar(100) DEFAULT NULL,
  `DESCRIZIONE` text DEFAULT NULL,
  `TOTALE_FARMACI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `farmaco`
--

INSERT INTO `farmaco` (`ID_FARMACO`, `NOME_FARMACO`, `CATEGORIA_TERAPEUTICA`, `DESCRIZIONE`, `TOTALE_FARMACI`) VALUES
(1, 'Aspirina', 'Antinfiammatorio', 'Farmaco utilizzato per dolore e infiammazione', NULL),
(6, 'Aspirina', 'Antinfiammatorio', 'Farmaco utilizzato per dolore e infiammazione', NULL),
(7, 'Aspirina', 'Antinfiammatorio', 'Farmaco utilizzato per dolore e infiammazione', NULL),
(8, 'Aspirina', 'Antinfiammatorio', 'Farmaco utilizzato per dolore e infiammazione', NULL),
(9, 'Aspirina', 'antinfiammatorio', 'farmaco utilizzato per dolore e infiammazione', 1),
(10, 'aspirina II', 'test', 'test', 1),
(11, 'TESTFARMACO', 'TEST CATEGORIA', 'TEST DESCRZIONE', 59),
(12, 'Aspirina', 'TEST CATEGORIA', 'TEST DESCRZIONE', 113),
(13, 'AXAX', 'AXAX', 'AXAX', 1),
(14, 'rereer', 'ererererer', 'ererere', 47);

-- --------------------------------------------------------

--
-- Struttura della tabella `interazione`
--

CREATE TABLE `interazione` (
  `ID_INTERAZIONE` int(11) NOT NULL,
  `ID_FARMACO_A` int(11) DEFAULT NULL,
  `ID_FARMACO_B` int(11) DEFAULT NULL,
  `DESCRIZIONE_INTERAZIONE` text DEFAULT NULL,
  `LIVELLO_GRAVITA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `interazione`
--

INSERT INTO `interazione` (`ID_INTERAZIONE`, `ID_FARMACO_A`, `ID_FARMACO_B`, `DESCRIZIONE_INTERAZIONE`, `LIVELLO_GRAVITA`) VALUES
(10, 1, 10, 'aumento del rischio di sanguinamento', 'Grave'),
(11, 1, 10, 'TEST', 'Bassa'),
(12, 1, 10, 'TEST', 'Media'),
(13, 10, 11, 'TEST BASSO', 'Bassa'),
(14, 1, 11, 'TEST MEDIO', 'Media'),
(15, 1, 11, 'TEST GRAVE', 'Bassa'),
(16, 1, 11, 'TEST GRAVE', 'Grave'),
(17, 1, 14, 'bnbnbnb', 'Bassa'),
(18, 1, 14, 'bnbnbnbn', 'Media'),
(19, 1, 14, 'bnbnbnb', 'Grave');

-- --------------------------------------------------------

--
-- Struttura della tabella `principio_attivo`
--

CREATE TABLE `principio_attivo` (
  `ID_PRINCIPIO_ATTIVO` int(11) NOT NULL,
  `NOME_PRINCIPIO` varchar(100) NOT NULL,
  `DESCRIZIONE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `principio_attivo`
--

INSERT INTO `principio_attivo` (`ID_PRINCIPIO_ATTIVO`, `NOME_PRINCIPIO`, `DESCRIZIONE`) VALUES
(1, 'Acido Acetilsalicilico', 'Principio attivo con effetto analgesico e antinfiammatorio'),
(12, 'Acido Acetilsalicilico', 'Principio attivo con effetto analgesico e antinfiammatorio'),
(13, 'acido acetilsalicilio', 'principio attivo con effetto analgesico e antinfiammatorio'),
(14, 'test', ''),
(15, 'TEST PRINCIPIO', 'TEST DESCRZIONE'),
(16, 'fgfgfgfg', 'fgfgfgfgfg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `farmaco`
--
ALTER TABLE `farmaco`
  ADD PRIMARY KEY (`ID_FARMACO`);

--
-- Indici per le tabelle `interazione`
--
ALTER TABLE `interazione`
  ADD PRIMARY KEY (`ID_INTERAZIONE`),
  ADD KEY `ID_FARMACO_A` (`ID_FARMACO_A`),
  ADD KEY `ID_FARMACO_B` (`ID_FARMACO_B`);

--
-- Indici per le tabelle `principio_attivo`
--
ALTER TABLE `principio_attivo`
  ADD PRIMARY KEY (`ID_PRINCIPIO_ATTIVO`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `farmaco`
--
ALTER TABLE `farmaco`
  MODIFY `ID_FARMACO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `interazione`
--
ALTER TABLE `interazione`
  MODIFY `ID_INTERAZIONE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `principio_attivo`
--
ALTER TABLE `principio_attivo`
  MODIFY `ID_PRINCIPIO_ATTIVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `interazione`
--
ALTER TABLE `interazione`
  ADD CONSTRAINT `interazione_ibfk_1` FOREIGN KEY (`ID_FARMACO_A`) REFERENCES `farmaco` (`ID_FARMACO`) ON DELETE CASCADE,
  ADD CONSTRAINT `interazione_ibfk_2` FOREIGN KEY (`ID_FARMACO_B`) REFERENCES `farmaco` (`ID_FARMACO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
