-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Maj 2018, 22:29
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pogoda`
--
CREATE DATABASE IF NOT EXISTS `pogoda` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `pogoda`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pogodynka`
--

CREATE TABLE `pogodynka` (
  `ID` int(11) NOT NULL,
  `IP` text COLLATE utf8_polish_ci NOT NULL,
  `Location` text COLLATE utf8_polish_ci NOT NULL,
  `Data` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pogodynka`
--

INSERT INTO `pogodynka` (`ID`, `IP`, `Location`, `Data`) VALUES
(58, '::1', 'Warsaw', '2018-05-24 21:00:00-2018-05-28 18:00:00'),
(59, '::1', 'KÅ‚osowo', '2018-05-24 21:00:00-2018-05-28 18:00:00'),
(60, '::1', 'GdaÅ„sk', '2018-05-24 21:00:00-2018-05-28 18:00:00'),
(61, '::1', 'Prokowo', '2018-05-24 21:00:00-2018-05-28 18:00:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pogodynka`
--
ALTER TABLE `pogodynka`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `pogodynka`
--
ALTER TABLE `pogodynka`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
