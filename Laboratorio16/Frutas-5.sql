-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 02:01 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Frutas`
--

-- --------------------------------------------------------

--
-- Table structure for table `Frutas`
--

CREATE TABLE IF NOT EXISTS `Frutas` (
  `name` varchar(25) NOT NULL,
  `units` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `country` varchar(25) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Frutas`
--

INSERT INTO `Frutas` (`name`, `units`, `quantity`, `price`, `country`) VALUES
('cereza', 5, 10, 5, 'Mexico'),
('durazno', 5, 72, 34, 'Chile'),
('fresas', 10, 64, 42, 'México'),
('kiwi', 2, 3, 30, 'China'),
('limon', 5, 30, 3, 'Mexico'),
('mango', 2, 57, 19, 'Brasil'),
('mango camboya', 5, 59, 20, 'Camboya'),
('mango manila', 6, 20, 10, 'Mexico'),
('manzana amarilla', 5, 30, 10, 'EU'),
('manzana roja', 4, 50, 10, 'México'),
('manzana verde', 5, 23, 15, 'EU'),
('melón', 1, 20, 40, 'Argentina'),
('naranja', 13, 83, 65, 'EU'),
('peras', 4, 23, 15, 'Italia'),
('r', 3, 3, 3, ''),
('toronja', 3, 46, 20, 'Perú'),
('uvas', 12, 80, 30, 'Francia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
