-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 03:33 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku`
--
CREATE DATABASE IF NOT EXISTS `buku` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `buku`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `review` text,
  `cover` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `harga`, `review`, `cover`) VALUES
(001, 'Simply C++', 120000, 'Buku tentang pemrograman C++ untuk kalangan pemula dan menengah', '001.jpg'),
(002, 'Simply C#', 100000, 'Buku tentang pemrograman C# untuk kalangan pemula dan menengah', '002.jpg'),
(003, 'Simply Java Programming', 130000, 'Buku tentang pemrograman Java untuk kalangan pemula dan menengah', '003.jpg'),
(004, 'Simply Visual Basic .Net 2003', 100000, 'Buku tentang pemrograman Visual Basic .Net 2003 untuk kalangan pemula dan menengah', '004.jpg'),
(005, 'C how to program', 200000, 'Buku tentang pemrograman bahasa C untuk kalangan menengah keatas', '005.jpg'),
(006, 'C++ how to program', 220000, 'Buku tentang pemrograman C++ untuk kalangan menengah keatas', '006.jpg'),
(007, 'Visual C how to program', 120000, 'Buku tentang pemrograman C++  secara visual untuk kalangan pemula dan menengah', '007.jpg'),
(008, 'Internet & World Wide Web', 90000, 'Buku tentang pengenalan internet kepada orang awam', '008.jpg'),
(009, 'Wireless internet & mobile bussiness How To Program', 120000, 'Buku tentang pengenalan internet nirkabel serta mobile bussiness', '009.jpg'),
(010, 'E-bussiness & E-commerce How To Program', 110000, 'Buku tentang pengenalan e-commerce dan bagaimana cara penggunaan nya', '010.jpg'),
(011, 'Java How To Program', 100000, 'Buku tentang pemrograman java untuk menengah', '011.jpg'),
(012, 'Java Web Service', 140000, 'Buku tentang pemrograman Java sebagai web service', '012.jpg'),
(013, 'Advanced Java Platform How To Program', 160000, 'Buku tentang pemrograman tingkat lanjut Java', '013.jpg'),
(014, 'Visual Basic .net', 110000, 'Buku tentang pemrograman visual .net untuk semua kalangan (wholesome)', '014.jpg'),
(015, 'How To Program XML Advanced Series', 240000, 'Buku tentang pemrograman XML tingkat lanjut', '015.jpg'),
(016, 'C# for experienced programmers', 210000, 'Buku tentang pemrograman C# tingkat atas', '016.jpg'),
(017, 'How To Program with PERL advanced CGI and Python', 250000, 'Buku tentang pemrograman PERL & PYTHON dalam CGI untuk lanjut', '017.jpg'),
(018, 'How To Program : Python & XML', 220000, 'Buku tentang pemrograman PYTHON & XML tingkat lanjut', '018.jpg'),
(019, 'Deifel Programming series : Web Services', 320000, 'Buku tentang pemrograman web development untuk tingkat lanjut', '019.jpg'),
(020, 'E-business & E-commerce for Managers', 420000, 'Buku tentang management E-business & E-commerce untuk tingkat atas', '020.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_history`
--

CREATE TABLE `detail_history` (
  `invoiceID` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `id` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `uid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `harga` int(11) NOT NULL,
  `image` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_history`
--

INSERT INTO `detail_history` (`invoiceID`, `id`, `title`, `tgl_pesan`, `expiry`, `uid`, `harga`, `image`) VALUES
(001, 003, 'Simply Java Programming', '2018-02-02', '2019-02-02', 001, 130000, '003.jpg'),
(002, 006, 'C++ how to program', '2018-02-02', '2019-02-02', 002, 220000, '006.jpg'),
(002, 001, 'Simply C++', '2018-02-02', '2019-02-02', 002, 120000, '001.jpg'),
(002, 011, 'Java How To Program', '2018-02-02', '2019-02-02', 002, 100000, '011.jpg'),
(003, 018, 'How To Program : Python & XML', '2018-02-02', '2019-02-02', 002, 220000, '018.jpg'),
(004, 008, 'Internet & World Wide Web', '2018-02-02', '2019-02-02', 001, 90000, '008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `invoiceID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `uid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`invoiceID`, `tgl_pesan`, `uid`, `total`) VALUES
(001, '2018-02-02', 001, 130000),
(002, '2018-02-02', 002, 440000),
(003, '2018-02-02', 002, 220000),
(004, '2018-02-02', 001, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjangID` int(11) NOT NULL,
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `uid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `cid` int(11) NOT NULL,
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `komentar` varchar(500) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`cid`, `id`, `komentar`, `username`, `avatar`) VALUES
(1, 001, 'bang', 'dadangkonpeki', 'default.png'),
(2, 001, 'a', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(3, 001, 'b', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(4, 001, 'c', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(5, 001, 'd', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(6, 001, 'e', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(7, 001, 'f', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(8, 006, 'yes', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(9, 004, 'Ya', 'Jagdpanda69', '12974415_587852448033720_5760593637207961818_n.png'),
(10, 006, 'ok', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(11, 006, '', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(12, 003, 'ya', 'Hawxseven17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(13, 002, 'ya', 'Jagdpanda69', '12974415_587852448033720_5760593637207961818_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pid` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kelamin` enum('pria','wanita') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pid`, `nama`, `email`, `kelamin`, `tgl_lahir`, `pesan`) VALUES
(1, 'Dimas', 'hawxseven@gmail.com', 'pria', '1996-12-17', 'Tes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kelamin` enum('pria','wanita') DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `pass`, `email`, `kelamin`, `tgl_lahir`, `avatar`) VALUES
(001, 'Hawxseven17', 'bc3e806c4f220f431fd5759102276ea6', 'hawxseven@gmail.com', 'pria', '1996-12-17', '10268679_769861589704346_6455510714666698883_n.jpg'),
(002, 'Jagdpanda69', '2eb058f9f43286a71a4479bdc2295497', 'jagdpanda@gmail.com', 'wanita', '1996-01-02', '12974415_587852448033720_5760593637207961818_n.png'),
(003, 'dadangkonpeki', 'de5e381657fd614e856600eafb0d1067', 'dadang_konpeki@gmail.com', 'pria', '1933-05-03', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjangID`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `invoiceID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
