-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 09:01 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `penjual` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `nama`, `harga`, `terjual`, `penjual`, `deskripsi`, `gambar`, `kategori`) VALUES
(1, 'White Stylish Dress', 123, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-1.jpg', 2),
(2, 'Blue Jeans Jacket', 123, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-2.jpg', 3),
(3, 'Black Leather Jacket', 200, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-3.jpg', 1),
(4, 'Black Night Gown', 150, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-4.jpg', 2),
(5, 'Colorful Stylish Shirt', 120, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-5.jpg', 3),
(6, 'Black Formal Suit', 350, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-6.jpg', 1),
(7, 'Black Long Blazer', 220, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-7.jpg', 2),
(8, 'Soft Blue Shirt', 125, 10, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-8.jpg', 3),
(9, 'Simple Black Dress', 130, 9, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-9.jpg', 2),
(10, 'Elegant Long Sleeve Party Dress', 250, 5, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-10.jpg', 2),
(11, 'Pink Blazer', 120, 7, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-11.jpg', 1),
(12, 'Plaid Blazer', 180, 11, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-12.jpg', 1),
(13, 'Flower Design Shirt', 80, 20, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-13.jpg', 3),
(14, 'Tie Dye Shirt', 100, 9, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-14.jpg', 3),
(15, 'Men Black Cotton Shirt', 190, 7, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'img/product-15.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barangpic`
--

CREATE TABLE `barangpic` (
  `idbarang` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangpic`
--

INSERT INTO `barangpic` (`idbarang`, `gambar`) VALUES
(1, 'img/product-1.jpg'),
(1, 'img/product-1-2.jpg'),
(1, 'img/product-1-3.jpg'),
(2, 'img/product-2.jpg'),
(3, 'img/product-3.jpg'),
(4, 'img/product-4.jpg'),
(5, 'img/product-5.jpg'),
(6, 'img/product-6.jpg'),
(7, 'img/product-7.jpg'),
(8, 'img/product-8.jpg'),
(9, 'img/product-9.jpg'),
(10, 'img/product-10.jpg'),
(11, 'img/product-11.jpg'),
(12, 'img/product-12.jpg'),
(13, 'img/product-13.jpg'),
(14, 'img/product-14.jpg'),
(15, 'img/product-15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `nama`) VALUES
(1, 'Pakaian Pria'),
(2, 'Pakaian Wanita'),
(3, 'Pakaian Anak'),
(4, 'Aksesoris'),
(5, 'Sepatu'),
(6, 'Tas');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idUser` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`idUser`, `idBarang`, `quantity`) VALUES
(5, 2, 3),
(5, 3, 1),
(6, 2, 1),
(6, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `idpenjual` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`idpenjual`, `nama`, `gambar`) VALUES
(1, 'StoreKing', 'img/vendor-5.jpg'),
(2, 'TheunahinCom', 'img/vendor-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `idUser` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `interest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`idUser`, `kategori`, `interest`) VALUES
(5, 1, 17),
(5, 3, 30),
(5, 2, 7),
(6, 3, 4),
(6, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idreview` int(11) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `bintang` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`idreview`, `isi`, `bintang`, `iduser`, `idbarang`, `tempat`) VALUES
(1, 'Barangnya bagus dan sesuai dengan yang ada di tampilan foto, cuma ternyata tidak terlalu besar seperti ekspetasi saya', 4, 3, 1, 'Indonesia'),
(2, 'Saya suka sekali, ini sangat berguna dan lucuu sekali, saya akan beli disni lagi terimkasih banyak seller', 5, 4, 1, 'Indonesia'),
(3, 'Murah, menarik mungkin kurang besar saja ya ukurannya', 4, 5, 1, 'Indonesia'),
(4, 'Oke banget, teman saya suka terimakasih kak', 5, 4, 2, 'Indonesia'),
(5, 'Mantul banget okee deh', 4, 3, 3, 'Indonesia'),
(6, 'Kurang besarr barangnya kak tapi worth it untuk hrga segitu', 3, 5, 4, 'Indonesia'),
(7, 'Kekecilan :(', 2, 5, 5, 'Indonesia'),
(8, 'No komen oke barangnya', 5, 3, 6, 'Indonesia'),
(9, 'Mama saya suka tapi papa bilang ga bagus tapi saya seneng terimakasih hehe', 5, 4, 7, 'Indonesia'),
(10, 'Akhirnya kebeli sudah nabung dari kemarin yey', 5, 4, 8, 'Indonesia'),
(11, 'Kerennn', 5, 4, 9, 'Indonesia'),
(12, 'Kurang memuaskan tapi oke lah untuk harga segitu', 3, 3, 10, 'Indonesia'),
(13, 'Besok beli lagi disini!!!', 5, 5, 11, 'Indonesia'),
(14, 'Okelah worth it', 4, 4, 12, 'Indonesia'),
(15, 'Pacar saya suka unchie keren banget dah kak sukses selalu', 5, 4, 13, 'Indonesia'),
(16, 'No komen berguna banget', 5, 3, 14, 'Indonesia'),
(17, 'Langsung CO lagi karena sebagus ituu hehe', 5, 5, 15, 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'img/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `notelp`, `username`, `password`, `gambar`) VALUES
(2, '089518068400', 'Caroline', 'lalala', 'img/user.png'),
(3, '081259056111', 'Caroline Angelia', 'hahaha', 'img/kucinggg.png'),
(4, '081256172771', 'Fellen Wennesa', 'lololo', 'img/kartun kelincii.jpg'),
(5, '123', 'Reynaldo Halim', '1111', 'img/cuterabbit.jpg'),
(6, '000', 'nyoba doang', '1111', 'img/user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`idpenjual`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idreview`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `idpenjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idreview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
