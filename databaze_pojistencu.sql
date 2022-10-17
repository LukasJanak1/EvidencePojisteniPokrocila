-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 17. říj 2022, 23:44
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `databaze_pojistencu`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistenci`
--

CREATE TABLE `pojistenci` (
  `pojistenecId` int(11) NOT NULL,
  `jmeno` varchar(60) NOT NULL,
  `prijmeni` varchar(60) NOT NULL,
  `ulice` varchar(60) NOT NULL,
  `mesto` varchar(60) NOT NULL,
  `psc` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `pojistenci`
--

INSERT INTO `pojistenci` (`pojistenecId`, `jmeno`, `prijmeni`, `ulice`, `mesto`, `psc`, `email`, `telefon`) VALUES
(8, 'Jan', 'Novák', 'Havrov', 'MdfgSDGF', 51245, 'lukyn.janak@seznam.cz', 46512),
(9, 'Dominik ', 'Resl', 'Krysí díra 213', 'gejov and metují', 23415, 'heoragarcz@gmail.com', 46512);

-- --------------------------------------------------------

--
-- Struktura tabulky `pojisteni`
--

CREATE TABLE `pojisteni` (
  `pojisteniId` int(11) NOT NULL,
  `pojistenecId` int(11) NOT NULL,
  `nazev` varchar(60) NOT NULL,
  `castka` int(11) NOT NULL,
  `predmetPojisteni` varchar(60) NOT NULL,
  `od` date NOT NULL,
  `do` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `pojisteni`
--

INSERT INTO `pojisteni` (`pojisteniId`, `pojistenecId`, `nazev`, `castka`, `predmetPojisteni`, `od`, `do`) VALUES
(1, 2, 'Pojištění majetku', 2500, 'Auto', '1954-01-20', '1964-03-21'),
(3, 2, 'Cestovní pojištění', 56, 'Cesta do Afriky', '1954-01-21', '1961-03-21'),
(4, 6, 'Pojištění úrazu', 2123, 'Cesta do Afriky', '2000-12-01', '2005-04-02'),
(5, 8, 'Cestovní pojištění', 2123, 'Auto', '2000-12-01', '1964-03-21'),
(6, 9, 'asdf', 10, 'vcv', '2022-10-09', '2022-10-27');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  ADD PRIMARY KEY (`pojistenecId`);

--
-- Indexy pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  ADD PRIMARY KEY (`pojisteniId`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pojistenci`
--
ALTER TABLE `pojistenci`
  MODIFY `pojistenecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  MODIFY `pojisteniId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
