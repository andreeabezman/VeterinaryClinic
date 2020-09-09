-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3307
-- Timp de generare: iul. 20, 2020 la 01:00 AM
-- Versiune server: 10.3.16-MariaDB
-- Versiune PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `vets`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `animal`
--

CREATE TABLE `animal` (
  `idanimal` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `ownerid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `diagnosispet`
--

CREATE TABLE `diagnosispet` (
  `iddiagnosispet` int(20) NOT NULL,
  `idpet` int(20) NOT NULL,
  `diagnosisname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `diagnosispet`
--

INSERT INTO `diagnosispet` (`iddiagnosispet`, `idpet`, `diagnosisname`) VALUES
(14, 8, 'igpehgpephge'),
(15, 10, 'iph'),
(16, 8, 'iihphpphhp'),
(33, 27, 'ihhn;');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `drug`
--

CREATE TABLE `drug` (
  `drugid` int(25) NOT NULL,
  `drugname` varchar(25) NOT NULL,
  `drugclass` varchar(25) NOT NULL,
  `drugprice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `drug`
--

INSERT INTO `drug` (`drugid`, `drugname`, `drugclass`, `drugprice`) VALUES
(1, 'paracetamol', 'pillsss', 200),
(2, 'vitamine', 'pill', 300),
(3, 'bandaj', 'altele', 500),
(4, 'paraa', 'jbbog', 2442),
(5, 'para', 'fhiosihi', 2000);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `owner`
--

CREATE TABLE `owner` (
  `ownerid` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `owner`
--

INSERT INTO `owner` (`ownerid`, `username`, `password`, `mail`) VALUES
(1, 'andre97andre', 'andre97andre', 'andre97andre@gmail.com'),
(2, 'a1', 'a1', 'a1@g.c'),
(3, 'a3', '$2y$10$FO4vuCyMbkH.m/Ee94dXi.MeTqL7kmzCPEVJMMZIYhVLBaMBGHcl6', 'a3@g.com'),
(4, 'andre', '$2y$10$R2H0qdDLy/mGztNKLKJD..go09j05xPH8kDSlTKZEZN4GBkNOptSa', 'andre@gmail.com'),
(5, 'ana', '$2y$10$p1GgQ6lJM14L83zsiOzSX.1JRV7Jk59erU2QoniHSsH0mV8ZUQtqi', 'ana@g.com'),
(6, 'a7', '$2y$10$nHeeDldJfVoc5kiiPDo2..0K3iPKf8pqe0UyYMrK2neOmSivPKuLa', 'a7@gmi.c'),
(7, 'an2', '$2y$10$IWWoC.AiKAUHUrjRBcc8IOXQ9.hcdk8kzBIAd7StXYfTBAclc51t.', 'anjf@g.o'),
(8, 'aa', '$2y$10$K0ZftpE/wCGgWHBpGHn.R.fpGA0tpRKbHIvhzmFeOLhvJjVOOi4.G', 'ada@gmail.com'),
(10, 'a6', '$2y$10$LsWakexe1ZNr9Tx3d4qtqewStqjPyrMwlJthF5od17uXIjW/fFA/m', 'adiho@h.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pet`
--

CREATE TABLE `pet` (
  `idpet` int(100) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ownerid` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `pet`
--

INSERT INTO `pet` (`idpet`, `petname`, `breed`, `type`, `ownerid`) VALUES
(8, 'epheg', 'pj', 'opjopjfppjojop', 8),
(9, ';pjo', 'jpjp', 'kpi', 6),
(10, 'aan', 'oshf', 'egjkooho', 3),
(27, 'sara', 'ipjpj', 'jpijjpp', 3),
(28, 'edi', 'jopjp', 'pjp', 3),
(31, 'aaaaiihio', 'ioh', 'oho', 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `treatment`
--

CREATE TABLE `treatment` (
  `treatmentid` int(10) NOT NULL,
  `drugid` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `idpet` int(100) NOT NULL,
  `idvet` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `vet`
--

CREATE TABLE `vet` (
  `idvet` int(10) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `doctorsurname` varchar(255) NOT NULL,
  `doctormail` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `vet`
--

INSERT INTO `vet` (`idvet`, `doctorname`, `doctorsurname`, `doctormail`, `specialization`) VALUES
(2, 'LOVaaaa', 'HAPPY', 'ioanamarinescuyeya7d8atdaf.com', 'dadada'),
(4, 'hana', 'hana', 'sdhaui', 'isadksfhspiaosg'),
(7, 'ejogojoge', 'ewpghe', 'kphph', 'eowgpoe'),
(10, 'LOVe', 'ohhoiih', 'hdui2@a.com', 'fqww');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexuri pentru tabele `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`idanimal`),
  ADD KEY `ownerid` (`ownerid`);

--
-- Indexuri pentru tabele `diagnosispet`
--
ALTER TABLE `diagnosispet`
  ADD PRIMARY KEY (`iddiagnosispet`),
  ADD KEY `idpet` (`idpet`);

--
-- Indexuri pentru tabele `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drugid`);

--
-- Indexuri pentru tabele `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerid`);

--
-- Indexuri pentru tabele `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`idpet`),
  ADD KEY `ownerid` (`ownerid`);

--
-- Indexuri pentru tabele `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatmentid`),
  ADD KEY `idvet` (`idvet`),
  ADD KEY `idpet` (`idpet`) USING BTREE;

--
-- Indexuri pentru tabele `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`idvet`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `animal`
--
ALTER TABLE `animal`
  MODIFY `idanimal` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `diagnosispet`
--
ALTER TABLE `diagnosispet`
  MODIFY `iddiagnosispet` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pentru tabele `drug`
--
ALTER TABLE `drug`
  MODIFY `drugid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `owner`
--
ALTER TABLE `owner`
  MODIFY `ownerid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `pet`
--
ALTER TABLE `pet`
  MODIFY `idpet` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pentru tabele `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatmentid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `vet`
--
ALTER TABLE `vet`
  MODIFY `idvet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `owner` (`ownerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `diagnosispet`
--
ALTER TABLE `diagnosispet`
  ADD CONSTRAINT `idpet` FOREIGN KEY (`idpet`) REFERENCES `pet` (`idpet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `ownerid` FOREIGN KEY (`ownerid`) REFERENCES `owner` (`ownerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `idvet` FOREIGN KEY (`idvet`) REFERENCES `vet` (`idvet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iped` FOREIGN KEY (`idpet`) REFERENCES `pet` (`idpet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
