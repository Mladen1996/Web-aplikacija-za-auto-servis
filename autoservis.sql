-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 02:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoservis`
--

-- --------------------------------------------------------

--
-- Table structure for table `klijenti`
--

CREATE TABLE `klijenti` (
  `idklijenta` int(11) NOT NULL,
  `imePrezime` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `mesto` varchar(50) NOT NULL,
  `brojtelefona` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klijenti`
--

INSERT INTO `klijenti` (`idklijenta`, `imePrezime`, `adresa`, `mesto`, `brojtelefona`, `email`, `korisnickoIme`) VALUES
(1, 'Pera Peric', 'Partizanska 25', 'Novi  Sad', '011/123-4567', 'pera@gmail.com', 'korisnik'),
(2, 'mladen', 'vojvode stepe', 'beograd', '060/1850415', 'mladenzivojinovic96@gmail.com', 'admin'),
(3, 'Petar Petrovic', 'a', 'Novi Beograd', '011/123-4567', 'ad@a.com', 'pera'),
(4, 'Mladen Zivojinovic', 'Heroja Srbe 50', 'Lugavcina', '011/123-4567', 'mladen@gmail.com', 'mladen'),
(5, 'Filip Filipovic', 'a', 'Novi Beograd', '011/123-4567', 'ad@a.com', 'ffilip');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idkorisnika` int(11) NOT NULL,
  `korisnickoIme` varchar(30) NOT NULL,
  `lozinka` varchar(30) NOT NULL,
  `tipKorisnika` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idkorisnika`, `korisnickoIme`, `lozinka`, `tipKorisnika`) VALUES
(1, 'admin', 'admin', 'serviser'),
(2, 'korisnik', 'korisnik', 'korisnik'),
(3, 'pera', 'pera', 'korisnik'),
(4, 'ppetar', 'petar1234', 'korisnik'),
(5, 'mladen', 'mladen', 'korisnik'),
(6, 'ffilip', 'filip1234', 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `idservisa` int(11) NOT NULL,
  `idvozila` int(11) NOT NULL,
  `nazivServisa` varchar(30) NOT NULL,
  `OpisServisa` varchar(250) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`idservisa`, `idvozila`, `nazivServisa`, `OpisServisa`, `datum`) VALUES
(2, 2, 'klima', 'Provera rada klima uredjaja u vozilu', '2018-10-11 12:35:21'),
(3, 1, 'elektronika', 'zamena elektronskih delova', '2018-09-24 11:56:37'),
(4, 1, 'farbanje', 'farbanje karoserije', '2018-09-24 11:57:16'),
(6, 1, 'auspuh', 'zamena celokupnog auspuha', '2018-09-24 11:57:42'),
(8, 5, 'mali servis', 'sdasdasdbbbbbbbbb', '2018-10-10 18:00:39'),
(9, 1, 'GHJ', 'FGHFG', '2018-10-03 11:27:48'),
(11, 1, 'sadasdsa', 'sadsadsadsa', '2018-10-10 14:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `idvozila` int(11) NOT NULL,
  `idklijenta` int(11) NOT NULL,
  `marka` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `godinaProizvodnje` int(4) NOT NULL,
  `gorivo` text NOT NULL,
  `ZapreminaMotora` int(6) NOT NULL,
  `SnagaMotora` int(4) NOT NULL,
  `RegistarskaOznaka` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`idvozila`, `idklijenta`, `marka`, `model`, `godinaProizvodnje`, `gorivo`, `ZapreminaMotora`, `SnagaMotora`, `RegistarskaOznaka`) VALUES
(1, 1, 'FIAT', 'Stilo 1.9 tdi', 2003, 'benzin', 1600, 78, 'SD008FR'),
(2, 3, 'Audi', 'A8', 2010, 'benzin', 1600, 86, 'BG006AS'),
(5, 5, 'Mercedes', 'A 170', 2003, 'benzin', 70, 1689, 'BG007AD'),
(6, 2, 'BMW', 'X6', 2005, 'benzin', 94, 2300, 'BG007AD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klijenti`
--
ALTER TABLE `klijenti`
  ADD PRIMARY KEY (`idklijenta`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idkorisnika`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`idservisa`,`idvozila`),
  ADD KEY `voziloServis` (`idvozila`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`idvozila`,`idklijenta`),
  ADD KEY `klijentVozilo` (`idklijenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klijenti`
--
ALTER TABLE `klijenti`
  MODIFY `idklijenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idkorisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `idservisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vozilo`
--
ALTER TABLE `vozilo`
  MODIFY `idvozila` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `klijenti`
--
ALTER TABLE `klijenti`
  ADD CONSTRAINT `korisnikKlijenti` FOREIGN KEY (`korisnickoIme`) REFERENCES `korisnici` (`korisnickoIme`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servis`
--
ALTER TABLE `servis`
  ADD CONSTRAINT `voziloServis` FOREIGN KEY (`idvozila`) REFERENCES `vozilo` (`idvozila`);

--
-- Constraints for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD CONSTRAINT `klijentVozilo` FOREIGN KEY (`idklijenta`) REFERENCES `klijenti` (`idklijenta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
