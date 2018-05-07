-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 11:53 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(120) CHARACTER SET utf8 NOT NULL,
  `brand_description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_description`, `date_created`) VALUES
(1, 'oppo', 'oppo', '2018-05-07 00:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `gadget_table`
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

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `id_magazine` int(11) NOT NULL,
  `judul_magazine` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `sumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`id_magazine`, `judul_magazine`, `tanggal`, `content`, `image`, `sumber`) VALUES
(2, 'Handphone, Alat Komunikasi Masa Kini', '2018-05-06', 'Telepon genggam atau oleh sebagian besar orang menyebutnya sebagai handphone adalah alat komunikasi yang paling digemari saat ini. Handphone merupakan perangkat telekomunikasi elektronik yang mempunyai kemampuan dasar yang sama dengan telepon konvensional saluran tetap, namun dapat dibawa ke mana-mana (portabel, mobile) dan tidak perlu disambungkan dengan jaringan telepon menggunakan kabel (nirkabel; wireless). Alat komunikasi ini memudahkan kita dalam berkomunikasi secara langsung tanpa harus bertatap muka. Teknologi ini telah menggeser fungsi surat dan telegram sebagai alat komunikasi bagi mereka yang bertempat tinggal saling berjauhan. Yang membedakan handphone dengan telepon kabel adalah handphone telah dilengkapi fasilitas SMS (Sort Messages Service) yaitu sebuah pelayanan yang diberikan untuk berkirim pesan teks secara elektronik dan dapat dibawa kemana saja dengan mudahkarena tidak membutuhkan kabel listrik. Sekarang ini handphone berkembang dengan dilengkapi internet, kamera digital, video digital, pemutar musik digital dan fasilitas canggih lain.\r\n\r\n\r\n\r\nPerkembangan teknologi komunikasi ini tidak lepas dari pengaruh yang ditimbulkan oleh arus globalisasi dunia yang makin gencar masuk ke dalam kehidupan kita. Sekarang ini, sangat mudah bagi kita untuk mengakses berbagai macam informasi baik dari dalam negeri maupun luar negeri. Pada awalnya alat komunikasi handphone ini hanya digunakan oleh kalangan tertentu yang mampu membelinya, karena harganya yang mahal. Namun kini, dapat kita jumpai dengan mudah orang-orang yang mempunyai handphone, bahkan saat ini telah tersedia handphone yang dilengkapi internet dengan berbagai bentuk dan merek dari yang paling murah sampai yang paling mahal di toko-toko gadget. Tidak hanya di kalangan orang dewasa, anak-anak --dewasa ini-- telah dipegangi handphone yang tidak kalah canggih oleh orangtua mereka.\r\n\r\n\r\n\r\nOrang dahulu menggunakan surat atau telegram untuk berkomunikasi dengan orang lain yang berada jauh darinya dan kemungkinan surat itu akan sampai ke tangan penerima beberapa hari kemudian. Namun, dengan adanya telepon genggam cukup mengetik SMS dan menekan tombol “send’ maka tanpa menunggu lama pesan akan sampai pada penerima beberapa detik kemudian. Inilah alasan mengapa handphone telah menggeser fungsi surat dan telegram sebagai alat komunikasi jarak jauh. Selain mudah dan cepat, menggunakan handphone untuk berkirim pesan relatif lebih murah.\r\n\r\n\r\n\r\nDampak yang ditimbulkan tidak selalu positif, banyak juga dampak negatif yang dtimbulkan oleh alat komunikasi modern ini salah satunya mengurangi kemampuan interaksi sosial masyarakat. Dengan adanya handphone, masyarakat tidak perlu saling bertatap muka satu sama lain secara langsung untuk membicarakan sesuatu karena hanya dengan menelepon atau mengirim sms mereka sudah dapat bercakap-cakap sehingga menimbulkan rasa malas untuk bersosialisasi dengan orang lain dan lingkungan sekitar. Dampak negatif lain dengan semakin canggihnya aplikasi dalam handphone memudahkan orang untuk mengakses berbagai bentuk informasi baik positif maupun negatif sehingga mengurangi nilai-nilai dalam masyarakat.\r\n\r\n', 'hp2.jpg', 'google'),
(3, 'Oppo Disalip Xiaomi', '2018-05-06', 'Posisi Apple dan Samsung di data pengapalan ponsel memang menjadi dua besar di jumlah pengapalan ponsel secara global. Namun dari data yang dirilis oleh Strategy Analytics, pergantian posisi justru terjadi pada posisi di bawahnya.\r\n\r\nPergantian yang dimaksud adalah antara Oppo dan Xiaomi pada posisi empat dan lima, di mana Xiaomi menyalip Oppo pada daftar tersebut. Jumlah pengapalan ponsel Xiaomi memang meroket lebih dari dua kali lipat secara year on year, dari 12,6 juta unit menjadi 28,3 juta unit di Q1 2018.\r\n\r\nSementara Oppo malah mengalami penurunan dari 27,6 juta unit ke 24,1 juta unit. Hal ini juga terjadi pada daftar market share ponsel global, di mana Xiaomi ada di posisi 4, tumbuh dari 3,6% di Q1 2017 menjadi 8,2% di Q1 2018, sementara Oppo mengalami penurunan market share sebesar 0,8%.\r\n\r\nMelonjaknya pengapalan ponsel Xiaomi ini selain sukses menggeser Oppo dari posisi 4 juga membuat Vivo tertendang dari posisi lima besar di daftar tersebut. Xiaomi sendiri mematok target pengapalan 100 juta ponsel pada akhir 2018 ini.\r\n\r\nSecara total, pasar ponsel global sendiri mengalami penurunan yang angkanya mencapai 2,4%. Di mana Samsung masih berada di posisi satu market share dan pengapalan, diikuti oleh Apple dan Huawei di bawahnya, demikian dikutip detikINET dari GSM Arena, Senin (7/5/2018).', 'hp1.jpg', 'google.com');

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
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`id_magazine`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gadget_table`
--
ALTER TABLE `gadget_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `id_magazine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gadget_table`
--
ALTER TABLE `gadget_table`
  ADD CONSTRAINT `gadget_ibfk_1` FOREIGN KEY (`fk_brand_id`) REFERENCES `brand` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
