-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2018 pada 05.27
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(120) NOT NULL,
  `category_description` varchar(120) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `category_description`, `datecreated`) VALUES
(1, 'Game', 'game huuu', '2018-05-07 14:26:26'),
(2, 'FIlm', 'film oiii', '2018-05-07 14:26:26');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `level_id` tinyint(4) NOT NULL,
  `nama_level` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`level_id`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Premium'),
(3, 'Silver');

-- --------------------------------------------------------

--
-- Struktur dari tabel `magazine`
--

CREATE TABLE `magazine` (
  `id_magazine` int(11) NOT NULL,
  `judul_magazine` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `fk_id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `magazine`
--

INSERT INTO `magazine` (`id_magazine`, `judul_magazine`, `tanggal`, `content`, `image`, `sumber`, `fk_id_category`) VALUES
(2, 'Handphone, Alat Komunikasi Masa Kiniii', '2018-05-06', 'Telepon genggam atau oleh sebagian besar orang menyebutnya sebagai handphone adalah alat komunikasi yang paling digemari saat ini. Handphone merupakan perangkat telekomunikasi elektronik yang mempunyai kemampuan dasar yang sama dengan telepon konvensional saluran tetap, namun dapat dibawa ke mana-mana (portabel, mobile) dan tidak perlu disambungkan dengan jaringan telepon menggunakan kabel (nirkabel; wireless). Alat komunikasi ini memudahkan kita dalam berkomunikasi secara langsung tanpa harus bertatap muka. Teknologi ini telah menggeser fungsi surat dan telegram sebagai alat komunikasi bagi mereka yang bertempat tinggal saling berjauhan. Yang membedakan handphone dengan telepon kabel adalah handphone telah dilengkapi fasilitas SMS (Sort Messages Service) yaitu sebuah pelayanan yang diberikan untuk berkirim pesan teks secara elektronik dan dapat dibawa kemana saja dengan mudahkarena tidak membutuhkan kabel listrik. Sekarang ini handphone berkembang dengan dilengkapi internet, kamera digital, video digital, pemutar musik digital dan fasilitas canggih lain.Perkembangan teknologi komunikasi ini tidak lepas dari pengaruh yang ditimbulkan oleh arus globalisasi dunia yang makin gencar masuk ke dalam kehidupan kita. Sekarang ini, sangat mudah bagi kita untuk mengakses berbagai macam informasi baik dari dalam negeri maupun luar negeri. Pada awalnya alat komunikasi handphone ini hanya digunakan oleh kalangan tertentu yang mampu membelinya, karena harganya yang mahal. Namun kini, dapat kita jumpai dengan mudah orang-orang yang mempunyai handphone, bahkan saat ini telah tersedia handphone yang dilengkapi internet dengan berbagai bentuk dan merek dari yang paling murah sampai yang paling mahal di toko-toko gadget. Tidak hanya di kalangan orang dewasa, anak-anak --dewasa ini-- telah dipegangi handphone yang tidak kalah canggih oleh orangtua mereka.Orang dahulu menggunakan surat atau telegram untuk berkomunikasi dengan orang lain yang berada jauh darinya dan kemungkinan surat itu akan sampai ke tangan penerima beberapa hari kemudian. Namun, dengan adanya telepon genggam cukup mengetik SMS dan menekan tombol “send’ maka tanpa menunggu lama pesan akan sampai pada penerima beberapa detik kemudian. Inilah alasan mengapa handphone telah menggeser fungsi surat dan telegram sebagai alat komunikasi jarak jauh. Selain mudah dan cepat, menggunakan handphone untuk berkirim pesan relatif lebih murah.Dampak yang ditimbulkan tidak selalu positif, banyak juga dampak negatif yang dtimbulkan oleh alat komunikasi modern ini salah satunya mengurangi kemampuan interaksi sosial masyarakat. Dengan adanya handphone, masyarakat tidak perlu saling bertatap muka satu sama lain secara langsung untuk membicarakan sesuatu karena hanya dengan menelepon atau mengirim sms mereka sudah dapat bercakap-cakap sehingga menimbulkan rasa malas untuk bersosialisasi dengan orang lain dan lingkungan sekitar. Dampak negatif lain dengan semakin canggihnya aplikasi dalam handphone memudahkan orang untuk mengakses berbagai bentuk informasi baik positif maupun negatif sehingga mengurangi nilai-nilai dalam masyarakat.', 'hp12.jpg', 'googlealifia', 2),
(12, 'Cobacobaaja', '2019-10-01', 'hm apa ya isinya lupa', '1.jpg', 'cobacobaja', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockprice`
--

CREATE TABLE `stockprice` (
  `id_sh` int(11) NOT NULL,
  `fk_tipe` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stockprice`
--

INSERT INTO `stockprice` (`id_sh`, `fk_tipe`, `stock`, `price`) VALUES
(1, 14, 200, 4000000),
(6, 15, 1000, 2700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_pembeli` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `harga_satuan` int(30) NOT NULL,
  `total_bayar` int(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `data_created`, `nama_pembeli`, `alamat`, `no_hp`, `email`, `nama_barang`, `jumlah`, `harga_satuan`, `total_bayar`, `status`) VALUES
(16, '2018-05-15 06:37:56', 'ade', 'jalan ade', '0912312731', 'ade.ndeman@gmail.com', 'A37', 2, 3500000, 7000000, 'lunas'),
(17, '2018-05-15 06:58:51', 'wqe', 'kljqkle', '123123', 'ewqewq@we.wqe', 'H12', 2, 3000000, 6000000, 'lunas'),
(18, '2018-05-15 07:04:27', 'ade', 'jlan sakues', '12345678', 'ade.ndeman@gmail.com', 'H12', 12, 3000000, 36000000, 'lunas'),
(19, '2018-07-10 07:07:44', 'ade', 'jalan apa', '0081231232', 'ade.ndeman@gmail.com', 'H12', 2, 3000000, 6000000, 'lunas'),
(20, '2018-07-24 15:23:34', 'muchsin', 'blitar', '00', '', 'H12', 88, 3000000, 264000000, 'baru'),
(21, '2018-07-24 15:27:20', 'muchsin', 'b', '9', '', 'H12', 1, 3000000, 3000000, 'baru'),
(22, '2018-07-24 15:40:14', 'muchsin', 'kk', '9', '', 'H12', 9, 3000000, 27000000, 'baru'),
(23, '2018-07-25 03:22:41', 'muchsin', 'blitar', '087777', '', 'H12', 2, 3000000, 6000000, 'baru'),
(24, '2018-07-25 03:24:34', 'muchsin', 'blitar', '087777', 'muchsinalkatiri36@yahoo.com', 'K822', 1, 1500000, 1500000, 'lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fk_level_id` tinyint(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `fk_level_id`, `nama`, `email`, `username`, `password`, `kodepos`, `register_date`, `alamat`, `nohp`, `avatar`) VALUES
(1, 1, 'Ade', 'ade@ade.com', 'ade', 'a562cfa07c2b1213b3a5c99b756fc206', 12312321, '2018-07-09 18:14:59', '', '', ''),
(2, 2, 'monita', 'mon@mon.om', 'mon', '197639b278057c519189add5413712e3', 32123, '2018-07-09 18:16:43', '', '', ''),
(3, 3, 'rosita', 'ros@ros.ros', 'ros', 'd36b548c4c7a2369249fb4cc0e2eba46', 823713, '2018-07-09 18:16:29', '', '', ''),
(4, 3, 'qwe', 'qwe@qwe.wqe', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 123, '2018-07-09 19:04:10', '', '', ''),
(5, 2, 'muchsin', 'muchsinalkatiri36@yahoo.com', 'muchsin', '4b73caa49187576af3c1dc9b97ed4047', 123, '2018-07-25 03:21:17', 'blitar', '087777', 'default.jpg'),
(6, 2, 'windhu', 'mmm@mm', 'windu', 'bedba54c1833902a41b1d3f747da2234', 0, '2018-07-25 00:58:33', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `gadget_table`
--
ALTER TABLE `gadget_table`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_slug` (`post_slug`),
  ADD KEY `gadget_ibfk_1` (`fk_brand_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`id_magazine`);

--
-- Indexes for table `stockprice`
--
ALTER TABLE `stockprice`
  ADD PRIMARY KEY (`id_sh`),
  ADD UNIQUE KEY `fk_tipe` (`fk_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gadget_table`
--
ALTER TABLE `gadget_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `id_magazine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stockprice`
--
ALTER TABLE `stockprice`
  MODIFY `id_sh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gadget_table`
--
ALTER TABLE `gadget_table`
  ADD CONSTRAINT `gadget_ibfk_1` FOREIGN KEY (`fk_brand_id`) REFERENCES `brand` (`brand_id`);

--
-- Ketidakleluasaan untuk tabel `stockprice`
--
ALTER TABLE `stockprice`
  ADD CONSTRAINT `fk_tipe_gadget` FOREIGN KEY (`fk_tipe`) REFERENCES `gadget_table` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
