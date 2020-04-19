-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 05:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `message_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ime_prezime` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `email`, `password`, `ime_prezime`, `telefon`, `slika`) VALUES
(1, 'nikola@asd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Nikola Markovic', '064/555-888', 'slika1.jpg'),
(2, 'andjus@asd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Dejan Andjus', '065/200-5252', 'andjus.jpg'),
(3, 'baja@asd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Baja Koreli', '062/1009-470', 't335630207-b1401987270_s400.jpg'),
(4, 'bard@asd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Milan Zivadinovic', '063/777-359', 'zivadinovic-milan.jpg'),
(5, 'djibril@asd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Djibril Cisse', '+4369911628747', 'djibril.jpg'),
(6, 'vule@asd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Vule Vule', '065/8123-109', '123.jpg'),
(7, 'jp@asd', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Jovan Perisic', '066/847-958', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `id` int(10) NOT NULL,
  `posiljalac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `primalac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tekst_poruke` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_id` int(10) UNSIGNED DEFAULT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `poslata` tinyint(1) NOT NULL,
  `procitana` tinyint(1) NOT NULL DEFAULT '0',
  `hitno` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`id`, `posiljalac`, `primalac`, `naslov`, `tekst_poruke`, `korisnik_id`, `vreme`, `poslata`, `procitana`, `hitno`) VALUES
(24, 'Nikola Markovic', 'Djibril Cisse', 'zdravo', 'kako si?', 1, '2019-12-20 19:35:45', 1, 1, 0),
(25, 'Djibril Cisse', 'Nikola Markovic', 'zdravo', 'sjajno sam, kako si ti?', 5, '2019-12-20 19:37:07', 1, 1, 1),
(26, 'Nikola Markovic', 'Baja Koreli', 'pozdrav!', 'sta ima novo kod tebe?', 1, '2019-12-20 19:39:08', 1, 1, 0),
(27, 'Nikola Markovic', 'Dejan Andjus', 'hej', 'hitno mi posalji broj telefona', 1, '2019-12-20 19:39:28', 1, 1, 1),
(28, 'Baja Koreli', 'Nikola Markovic', 'poz', 'kupio sam nove patike', 3, '2019-12-20 19:41:05', 1, 1, 0),
(29, 'Dejan Andjus', 'Nikola Markovic', 'broj telefona', '+4369911628747', 2, '2019-12-20 19:41:54', 1, 1, 1),
(30, 'Dejan Andjus', 'Milan Zivadinovic', 'kcn sport', 'zdravo Milane, jel se vidimo veceras?', 2, '2019-12-20 19:44:50', 1, 1, 0),
(31, 'Milan Zivadinovic', 'Dejan Andjus', 'kcn sport', 'vidimo se', 4, '2019-12-20 19:45:22', 1, 1, 0),
(32, 'Baja Koreli', 'Vule Vule', 'hej', 'javi se na telefon', 3, '2019-12-20 20:11:37', 1, 1, 1),
(33, 'Vule Vule', 'Baja Koreli', 'hej', 'ok', 6, '2019-12-20 20:12:08', 1, 1, 0),
(34, 'Jovan Perisic', 'Nikola Markovic', 'zurka', 'vidimo li se veceras u Tarapani?', 7, '2019-12-20 20:16:17', 1, 1, 0),
(36, 'Nikola Markovic', 'Jovan Perisic', 'tarapana', 'normalno', 1, '2019-12-20 21:21:05', 1, 1, 0),
(39, 'Nikola Markovic', 'Jovan Perisic', 'poz', 'desi bratic moj', 1, '2019-12-20 21:27:27', 1, 1, 0),
(46, 'Nikola Markovic', 'Milan Zivadinovic', 'nova poruka', 'desi brt moj, kakav si mi?', 1, '2020-04-15 12:54:18', 1, 0, 0),
(48, 'Nikola Markovic', 'Jovan Perisic', 'poz', 'desi jovane perisicu', 1, '2020-04-16 17:46:38', 1, 1, 0),
(49, 'Nikola Markovic', 'Dejan Andjus', 'sveza poruka', 'sve je to tako, nije lako', 1, '2020-04-18 21:03:32', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poruke`
--
ALTER TABLE `poruke`
  ADD CONSTRAINT `poruke_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
