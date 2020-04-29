-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Mar 2019, 12:36
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `drukarki`
--
CREATE DATABASE IF NOT EXISTS `drukarki` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `drukarki`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drukarka`
--

CREATE TABLE `drukarka` (
  `drukarkaID` int(11) NOT NULL,
  `model` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `szybkoscDrukuKolor` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `szybkoscDrukuCzarny` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `wifi` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `duplex` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `gwarancja` int(4) NOT NULL,
  `cena` float(10,0) NOT NULL,
  `ocenaEksperta` float NOT NULL,
  `ocenaSpolecznosci` float NOT NULL,
  `ilosc_ocen` int(10) NOT NULL,
  `lokalizacja_zdjecia` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `producent_ID` int(4) NOT NULL,
  `typ_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `drukarka`
--

INSERT INTO `drukarka` (`drukarkaID`, `model`, `szybkoscDrukuKolor`, `szybkoscDrukuCzarny`, `wifi`, `duplex`, `gwarancja`, `cena`, `ocenaEksperta`, `ocenaSpolecznosci`, `ilosc_ocen`, `lokalizacja_zdjecia`, `producent_ID`, `typ_ID`) VALUES
(15, '1', '1', '1', 'Nie', 'Nie', 1, 1, 1, 0, 0, '../gfx/php6087.jpg', 4, 4),
(16, '2', '2', '2', 'Nie', 'Nie', 2, 2, 2, 0, 0, '../gfx/phpB521.jpg', 4, 7),
(17, '3', '3', '3', 'Nie', 'Nie', 3, 3, 3, 0, 0, '../gfx/phpFB33.jpg', 8, 8),
(18, '4', '4', '4', 'Nie', 'Nie', 4, 4, 4, 0, 0, '../gfx/php3FA0.jpg', 9, 9),
(19, '5', '5', '5', 'Nie', 'Nie', 5, 5, 5, 0, 0, '../gfx/php845A.jpg', 5, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producent`
--

CREATE TABLE `producent` (
  `producentID` int(11) NOT NULL,
  `producent` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `producent`
--

INSERT INTO `producent` (`producentID`, `producent`) VALUES
(1, '423'),
(2, '111'),
(3, 'hp1'),
(4, '1'),
(5, '5'),
(6, '6'),
(7, '2'),
(8, '3'),
(9, '4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typdrukarki`
--

CREATE TABLE `typdrukarki` (
  `typID` int(11) NOT NULL,
  `typDrukarki` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `typdrukarki`
--

INSERT INTO `typdrukarki` (`typID`, `typDrukarki`) VALUES
(1, '423'),
(2, '111'),
(3, 'TYP1'),
(4, '1'),
(5, '5'),
(6, '6'),
(7, '2'),
(8, '3'),
(9, '4');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `drukarka`
--
ALTER TABLE `drukarka`
  ADD PRIMARY KEY (`drukarkaID`),
  ADD KEY `producent_ID` (`producent_ID`),
  ADD KEY `typ_ID` (`typ_ID`);

--
-- Indeksy dla tabeli `producent`
--
ALTER TABLE `producent`
  ADD PRIMARY KEY (`producentID`);

--
-- Indeksy dla tabeli `typdrukarki`
--
ALTER TABLE `typdrukarki`
  ADD PRIMARY KEY (`typID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `drukarka`
--
ALTER TABLE `drukarka`
  MODIFY `drukarkaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `producent`
--
ALTER TABLE `producent`
  MODIFY `producentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `typdrukarki`
--
ALTER TABLE `typdrukarki`
  MODIFY `typID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
