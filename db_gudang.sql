-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 08:42 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(11) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `stokb` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `nm_barang`, `satuan`, `keterangan`, `stokb`) VALUES
('B0001', 'Pouch Risleting', 'Buah', 'Baru', 973),
('B0002', 'Tumbler Kaleng', 'Buah', 'Baru', 49),
('B0003', 'Bag Tag', 'Buah', 'Baru', 173),
('B0004', 'Tas Serut Kanvas', 'Buah', 'Baru', 136),
('B0005', 'Totebag Kanvas', 'Buah', 'Baru', 87),
('B0006', 'Pouch Serut Kecil', 'Buah', 'Baru', 138),
('B0007', 'Mug', 'Buah', 'Baru', 406),
('B0008', 'Tas Lipat Parasit', 'Buah', 'Baru', 79),
('B0009', 'Sedotan Bambu', 'Buah', 'Baru', 95),
('B0010', 'Carholder & Pena', 'Buah', 'Baru', 69),
('B0011', 'Payung', 'Buah', 'Baru', 80);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kd_transaksi` varchar(11) NOT NULL,
  `tgl_transaksi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok` int(50) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `kepentingan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kd_transaksi`, `tgl_transaksi`, `keterangan`, `jumlah`, `nama`, `stok`, `id_user`, `kd_barang`, `kepentingan`) VALUES
('T00000001', '23 12 2020', 'masuk', 80, 'Aditya Mahavira', 80, 'U002', 'B0011', 'Penambahan Stok'),
('T00000002', '25 12 2020', 'keluar', 10, 'Aditya Mahavira', 986, 'U002', 'B0001', 'Pameran Internasional'),
('T00000003', '26 12 2020', 'keluar', 20, 'Aditya Mahavira', 29, 'U002', 'B0010', 'Pameran Internasional'),
('T00000004', '26 12 2020', 'masuk', 20, 'Aditya Mahavira', 49, 'U002', 'B0010', ' Penambahan Stok'),
('T00000005', '26 12 2020', 'masuk', 20, 'Aditya Mahavira', 69, 'U002', 'B0010', 'Penambahan Stok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(11) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `username`, `password`, `pass`, `alamat`, `no_telp`, `email`, `hak_akses`, `aktif`) VALUES
('U001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admincity', '085765324098', 'admin@gmail.com', 'admin', 1),
('U002', 'Aditya Mahavira', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'usercity', '085098675345', 'user@user.com', 'user', 1),
('U003', 'Aditya Steven', 'steven', '6ed61d4b80bb0f81937b32418e98adca', 'steven', 'Wonosobo', '081234234567', 'amahavira@gmail.com', 'user', 0),
('U004', 'Aditya Steven Mahavira', 'amahavira', 'ae0bfdcc172714349a9e5c5926bacc14', 'amahavira', 'Wonosobo', '081234234567', 'amahavira@gmail.com', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tb_barang` (`kd_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
