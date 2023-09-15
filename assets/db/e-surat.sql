-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 07:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `jenjang` enum('XII','XI','X') NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jmlh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `jenjang`, `jurusan`, `jmlh`) VALUES
(1, 'XI', 'RPL', 30),
(2, 'XI', 'MM', 28),
(3, 'XII', 'AKL', 31),
(4, 'X', 'OTKP', 28),
(5, 'X', 'BDP', 27),
(6, 'XII', 'PKM', 26),
(8, 'XII', 'RPL', 33),
(12, 'XII', 'PKM', 26),
(13, 'X', 'BDP', 20),
(28, 'XI', 'OTKP', 20),
(35, 'XII', 'MM', 33),
(36, 'XII', 'MM', 33),
(37, 'XII', 'MM', 33),
(38, 'XI', 'OTKP', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` decimal(10,0) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamt` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamt`, `id_kelas`) VALUES
(1, '1111', 'ahmad', 'L', 'Jakarta', '2016-02-29', 'jl. Mawar', 8),
(2, '222', 'Sely P', 'P', 'Bekasi', '2017-05-30', 'jl. Melati', 3),
(4, '333', 'Gempi', 'P', 'Kediri', '2014-01-29', 'jln Anggrek', 4),
(5, '3222', 'Gatot ', 'L', 'Bantul', '2011-12-27', 'jl. Gatot Subroto', 1),
(6, '34334', 'Bagong', 'P', 'Bandung', '2014-01-29', 'jl. Pasoepati', 13),
(7, '22211', 'Sembrut P', 'P', 'Bekasi', '2015-01-28', 'jln. kranji raya', 6),
(9, '7896', 'Amel', 'P', 'Jember', '2020-12-28', 'jln. Angkara Raya', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suratmasuk`
--

CREATE TABLE `tbl_suratmasuk` (
  `id_suratMasuk` int(11) NOT NULL,
  `nomor` varchar(80) NOT NULL,
  `lampiran` varchar(10) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `gambar` varchar(80) NOT NULL,
  `petugas` varchar(80) NOT NULL,
  `tgl_srtMasuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suratmasuk`
--

INSERT INTO `tbl_suratmasuk` (`id_suratMasuk`, `nomor`, `lampiran`, `perihal`, `asal_surat`, `id_siswa`, `id_kelas`, `gambar`, `petugas`, `tgl_srtMasuk`) VALUES
(7, 'sm/88/1100', '-', 'balasan pkl', 'pemkot', 6, 4, 'cek.PNG', 'hubin', '2021-03-03'),
(8, 'VI/122/899', '-', 'surat pengajuan', 'instana', 7, 6, 'kartu.PNG', 'hubin', '2021-03-01'),
(9, 'SK-10-2020', '-', 'Surat Jalan', 'Dinas Sosial', 5, 2, 'etbpkp.png', 'hubin', '2021-03-02'),
(10, 'ss/20/99', '-', 'surat izin', 'disdik', 2, 6, '', 'hubin', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_cetak`
--

CREATE TABLE `tbl_surat_cetak` (
  `idCetak` int(11) NOT NULL,
  `nomor` varchar(80) NOT NULL,
  `lampiran` varchar(10) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_surat` varchar(30) NOT NULL,
  `perusahaan` varchar(200) NOT NULL,
  `almt_perusahaan` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_cetak`
--

INSERT INTO `tbl_surat_cetak` (`idCetak`, `nomor`, `lampiran`, `perihal`, `tgl_surat`, `perusahaan`, `almt_perusahaan`, `id_user`) VALUES
(12, 'SM-I-20', '-', 'Surat Pengajuan', 'Bekasi, 22 Mei 2020', 'PT Karya Guna', 'jln. Surya', 5),
(13, '4747', '-', 'Surat PKL', '7 November', 'PT. Terus Mundur', 'jln. Bingung', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_cetakdetail`
--

CREATE TABLE `tbl_surat_cetakdetail` (
  `id` int(11) NOT NULL,
  `idCetak` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat_cetakdetail`
--

INSERT INTO `tbl_surat_cetakdetail` (`id`, `idCetak`, `id_siswa`) VALUES
(13, 12, 5),
(14, 13, 4),
(15, 13, 6),
(16, 13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `akses`, `email`) VALUES
(5, 'admin', '$2y$10$szx..cGnDsgSu3Wr50rAFuFGlSYJL3cyJtXlE85a4Gu4nOD1wGH8q', 'Ahmad Amin', 'admin', 'ahmadaminiswanto@gmail.com'),
(10, 'coba', '$2y$10$GfAaEEfK0l5YrRiKzsZV0OAN1KRSy6BkaO1hDIirRUq4M6ukkjvhq', 'Gatot ', 'user', 'GatotK@gami.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE,
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  ADD PRIMARY KEY (`id_suratMasuk`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  ADD PRIMARY KEY (`idCetak`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCetak` (`idCetak`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  MODIFY `id_suratMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  MODIFY `idCetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`);

--
-- Constraints for table `tbl_suratmasuk`
--
ALTER TABLE `tbl_suratmasuk`
  ADD CONSTRAINT `tbl_suratmasuk_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`),
  ADD CONSTRAINT `tbl_suratmasuk_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`);

--
-- Constraints for table `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  ADD CONSTRAINT `tbl_surat_cetak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  ADD CONSTRAINT `tbl_surat_cetakdetail_ibfk_1` FOREIGN KEY (`idCetak`) REFERENCES `tbl_surat_cetak` (`idCetak`),
  ADD CONSTRAINT `tbl_surat_cetakdetail_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
