-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Mei 2018 pada 13.03
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s4_ci_tubes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(120) CHARACTER SET utf8 NOT NULL,
  `brand_description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gadget_table`
--

CREATE TABLE `gadget_table` (
  `post_id` int(11) NOT NULL,
  `post_date` datetime DEFAULT '0000-00-00 00:00:00',
  `fk_brand_id` int(11) NOT NULL,
  `post_name` varchar(120) CHARACTER SET utf8 NOT NULL,
  `post_slug` varchar(120) CHARACTER SET utf8 NOT NULL,
  `post_keccpu` varchar(120) NOT NULL,
  `post_ram` int(11) NOT NULL,
  `post_battery` varchar(120) NOT NULL,
  `post_frontcam` varchar(120) NOT NULL,
  `post_backcam` varchar(120) NOT NULL,
  `post_int` int(11) NOT NULL,
  `post_thumbnail` varchar(120) CHARACTER SET utf8 NOT NULL,
  `post_status` tinyint(4) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `gadget_table`
--
ALTER TABLE `gadget_table`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_slug` (`post_slug`),
  ADD KEY `gadget_ibfk_1` (`fk_brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gadget_table`
--
ALTER TABLE `gadget_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gadget_table`
--
ALTER TABLE `gadget_table`
  ADD CONSTRAINT `gadget_ibfk_1` FOREIGN KEY (`fk_brand_id`) REFERENCES `brand` (`brand_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
