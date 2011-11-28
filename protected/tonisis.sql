-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2011 at 03:25 PM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tonisis`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`),
  KEY `fk_inventaris_produk1` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `nama`) VALUES
(4, 'AC 1pk'),
(5, 'AC 2pk'),
(10, 'BlueRay Player'),
(9, 'DVD Player'),
(11, 'Home Theater'),
(6, 'Kamera Digital'),
(3, 'Kulkas'),
(7, 'Mesin Cuci Top Loading'),
(8, 'Mesin Cuci Top Loading'),
(1, 'TV LCD'),
(2, 'TV LED');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `nama`) VALUES
(4, 'LG'),
(3, 'Samsung'),
(6, 'Sanken'),
(8, 'Sansu'),
(7, 'Sanyo'),
(1, 'Sharp'),
(2, 'Sony'),
(5, 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `alamat1` varchar(80) DEFAULT NULL,
  `alamat2` varchar(80) DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `kodepos` varchar(5) DEFAULT NULL,
  `tgl_buat` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE IF NOT EXISTS `pemasok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `perusahaan` varchar(80) DEFAULT NULL,
  `no_telepon` varchar(45) DEFAULT NULL,
  `alamat1` varchar(45) DEFAULT NULL,
  `alamat2` varchar(45) DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`,`perusahaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama`, `perusahaan`, `no_telepon`, `alamat1`, `alamat2`, `kota`, `provinsi`) VALUES
(1, 'PT. Angin Segar', NULL, '', '', '', '', ''),
(2, 'CV Agung Mendayu', NULL, '', '', '', '', ''),
(3, 'UD Laris Habis', NULL, '', '', '', '', ''),
(4, 'Toko Acong', NULL, '', '', '', '', ''),
(5, 'Toko Makmur Sejati', NULL, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `penjualan_id` int(11) NOT NULL,
  `cara` varchar(45) DEFAULT NULL,
  `jumlah` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`penjualan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasok` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `no_po` varchar(30) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Purchase_Supplier1` (`id_pemasok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE IF NOT EXISTS `pembelian_produk` (
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `biaya` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`,`id_produk`),
  KEY `fk_Purchase_has_Product_Product1` (`id_produk`),
  KEY `fk_Purchase_has_Product_Purchase1` (`id_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_CustomerOrder_Customer1` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_produk`
--

CREATE TABLE IF NOT EXISTS `penjualan_produk` (
  `id_pemesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`,`id_barang`),
  KEY `fk_CustomerOrder_has_Product_Product1` (`id_barang`),
  KEY `fk_CustomerOrder_has_Product_CustomerOrder1` (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_barang` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `deskripsi` text,
  `tgl_buat` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `biaya` decimal(12,2) DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Product_Category` (`id_jenis_barang`),
  KEY `fk_Product_Brand1` (`id_merk`),
  KEY `fk_Product_Supplier1` (`id_pemasok`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_jenis_barang`, `id_merk`, `id_pemasok`, `nama`, `deskripsi`, `tgl_buat`, `tgl_update`, `jumlah`, `biaya`, `harga`) VALUES
(1, 4, 4, 1, 'LG Washing WF S1100CR', 'Key Feature\r\n           >    Modern Stylish Design\r\n         >    Smart Clean i-sensor\r\n         >    Auto Restart\r\n         >    8 Programs\r\n               (Fuzzy, Delicate, Economy, Jean, Wool, Silent,   Favorite, Tub Clean)\r\n         >    1 : 88 LED \r\n \r\n \r\nModern Stylish Design\r\nUser Friendly Contrl Panel Modern & Stylish Shape Compact Design :\r\nEasy to use (Contrl Panel)\r\nHouse Decoration (Stylish)\r\nSame size, bigger capacity (Compact size with high tech)\r\n\r\nSmart Clean i-sensor\r\ni-sensor gathers information regarding washing conditions i.e water hardness, temperature and detergent amount to determine the optimized wash and rinse actio ns\r\n', NULL, NULL, 3, '2750000.00', '2950000.00');

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE IF NOT EXISTS `surat_jalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('pending','return','sent') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Shipment_CustomerOrder1` (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `fk_inventaris_produk1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_penjualan1` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_Purchase_Supplier1` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `fk_Purchase_has_Product_Purchase1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Purchase_has_Product_Product1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_CustomerOrder_Customer1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD CONSTRAINT `fk_CustomerOrder_has_Product_CustomerOrder1` FOREIGN KEY (`id_pemesanan`) REFERENCES `penjualan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CustomerOrder_has_Product_Product1` FOREIGN KEY (`id_barang`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_Product_Category` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Brand1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Supplier1` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD CONSTRAINT `fk_Shipment_CustomerOrder1` FOREIGN KEY (`id_pemesanan`) REFERENCES `penjualan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
