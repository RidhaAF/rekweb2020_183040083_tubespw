-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 06:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_183040083`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `cc` varchar(10) NOT NULL,
  `topspeed` varchar(10) NOT NULL,
  `tahunproduksi` year(4) NOT NULL,
  `negarapembuat` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `foto`, `merk`, `model`, `cc`, `topspeed`, `tahunproduksi`, `negarapembuat`, `harga`) VALUES
(1, '1.jpg', 'Koenigsegg', 'CCXR Trevita', '4800 cc', '410 Km/h', 2006, 'Swedia', 'Rp. 67,2 Miliar'),
(2, '2.jpg', 'Lamborghini', 'Veneno', '6500 cc', '356 Km/h', 2013, 'Italia', 'Rp. 63 Miliar'),
(3, '3.jpg', 'W Motors', 'Lykan HyperSport', '3700 cc', '386 Km/h', 2013, 'Lebanon', 'Rp. 47,6 Miliar'),
(4, '4.jpg', 'Bugatti', 'Veyron Mansory Vivere', '7993 cc', '408 Km/h', 2013, 'Perancis', 'Rp. 47,6 Miliar'),
(5, '5.jpg', 'Ferrari', 'F60 America', '6262 cc', '335 Km/h', 2015, 'Italia', 'Rp. 35,6 Miliar'),
(6, '6.jpg', 'Koenigsegg', 'One:1', '5000 cc', '435 Km/h', 2014, 'Swedia', 'Rp. 28 Miliar'),
(7, '7.jpg', 'Aston Martin', 'One-77', '7312 cc', '350 Km/h', 2009, 'Inggris', 'Rp. 19,6 Miliar'),
(8, '8.jpg', 'Pagani', 'Huayra', '5890 cc', '372 Km/h', 2012, 'Italia', 'Rp. 19,6 Miliar'),
(9, '9.jpg', 'Ferrari', 'LaFerrari', '6262 cc', '350 Km/h', 2013, 'Italia', 'Rp. 19,6 Miliar'),
(10, '10.jpg', 'Zenvo', 'ST1', '7000 cc', '375 Km/h', 2009, 'Denmark', 'Rp. 16,6 Miliar'),
(11, '11.jpg', 'Toyota', 'Kijang', '9999 cc', '999 Km/h', 1999, 'Jepang', 'Rp. 999 Juta'),
(13, '5cc83f034c8a9.jpg', 'Toyota', 'Kijang Jadul', '9999 cc', '999 Km/h', 1999, 'Indonesia', 'Rp. 999 Triliun'),
(14, '5cc83f469aad5.jpg', 'Toyota', 'Kijang Jadul Banget', '10000 cc', '1000 Km/h', 1995, 'Indonesia', 'Rp. 1000 Triliun');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'user', '$2y$10$HiLrhXXksaOLushFt23pzO3c40p9EjCMzH66mN5Z9p2.pkEpi1t9.'),
(2, 'admin', '$2y$10$xkMno67kfCxjbKV2x/OEJ.y/EQhmtZf7siZEn0ixCrtjCbXvn8UWy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
