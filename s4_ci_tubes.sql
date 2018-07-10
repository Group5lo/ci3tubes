-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jul 2018 pada 08.51
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

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_description`, `date_created`) VALUES
(1, 'Oppo', 'oppo', '2018-05-07 00:34:22'),
(3, 'Samsung', 'wqelkwqmewqm', '2018-05-08 07:04:28'),
(5, 'Sony', 'ini sony', '2018-05-08 07:41:53'),
(6, 'HTC', 'htc', '2018-05-08 07:42:08'),
(7, 'Mito', 'mito', '2018-05-08 07:42:21'),
(8, 'Xiomi', 'xioma', '2018-05-08 07:42:30'),
(9, 'asus', 'asus', '2018-05-08 07:42:38'),
(10, 'Lenovo', 'wqe', '2018-05-08 07:43:47'),
(11, 'Blackbery', 'qwe', '2018-05-08 07:43:53');

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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stock` int(11) NOT NULL,
  `price` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gadget_table`
--

INSERT INTO `gadget_table` (`post_id`, `post_date`, `fk_brand_id`, `post_name`, `post_slug`, `post_keccpu`, `post_ram`, `post_battery`, `post_frontcam`, `post_backcam`, `post_int`, `post_thumbnail`, `post_status`, `date_created`, `stock`, `price`) VALUES
(14, '2018-05-08 09:47:37', 3, 'Galaxy A1', 'galaxy-a1', '1.2', 3, 'Typical Capacity: 2630 mAh (Non-removable)', '12', '24', 4, '1.jpg', 1, '2018-05-08 09:47:37', 200, 4500000),
(15, '2018-05-08 09:52:20', 1, 'A37', 'a37', '1.2', 2, 'Typical Capacity: 2630 mAh (Non-removable)', '8', '5', 2, 'oppo.PNG', 1, '2018-05-08 09:52:20', 900, 3500000),
(16, '2018-05-15 05:17:40', 10, 'H12', 'h12', '12', 2, 'batterry lion', '21', '23', 256, '11.jpg', 1, '2018-05-15 05:17:40', 100, 3000000),
(17, '2018-05-15 08:08:02', 7, 'K822', 'k822', '1.2', 2, 'kjqwheiwqh', '12', '32', 122, '13.jpg', 1, '2018-05-15 08:08:02', 300, 1500000);

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `gadget_table`
--
ALTER TABLE `gadget_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
