-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 08:45 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `medsinsert`
--

CREATE TABLE `medsinsert` (
  `id` int(11) NOT NULL,
  `denumire` varchar(120) NOT NULL,
  `producator` varchar(120) NOT NULL,
  `substantaActiva` varchar(120) NOT NULL,
  `formaFarmaceutica` varchar(120) NOT NULL,
  `cantitate` int(11) NOT NULL,
  `pret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medsinsert`
--

INSERT INTO `medsinsert` (`id`, `denumire`, `producator`, `substantaActiva`, `formaFarmaceutica`, `cantitate`, `pret`) VALUES
(1, 'Aspirina', 'Bayer', 'Sintetic', 'Comprimate', 25, 12),
(2, 'Paracetamol', 'RoPharma', 'Paracetilaminofenol', 'Comprimate', 28, 8),
(4, 'AspirinCardio', 'Bayer', 'Sintetic', 'Comprimate', 254, 20),
(5, 'Panagin', 'Bayer', 'Sintetic', 'Comprimate', 212, 49),
(7, 'Distonocalm', 'Biofarm', 'Sintetic', 'Comprimate', 65, 29),
(8, 'Parasinus', 'Sandoz', 'Sintetic', 'Comprimate', 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nume` varchar(120) NOT NULL,
  `prenume` varchar(120) NOT NULL,
  `varsta` int(11) NOT NULL,
  `sex` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nume`, `prenume`, `varsta`, `sex`) VALUES
(1, 'Costea', 'Alin', 21, 'Masculin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medsinsert`
--
ALTER TABLE `medsinsert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medsinsert`
--
ALTER TABLE `medsinsert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
