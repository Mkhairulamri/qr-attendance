-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 05:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_tk`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `no_anggota` varchar(50) DEFAULT NULL,
  `no_simpanan` varchar(50) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `jam` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `no_anggota`, `no_simpanan`, `nama`, `nik`, `kelamin`, `no_hp`, `alamat`, `ktp`, `status`, `jam`, `tanggal`) VALUES
(1, NULL, NULL, 'Firdaus', '4354654654', 'Laki-laki', '098776765543', 'Jl. Lembaga, Senggoro', 'RG.png', 'tarik', '16:35:55', '2022-12-04'),
(3, NULL, NULL, 'Syukron', '453464534', 'Laki-laki', '098776765543', 'Jl. Pramuka', 'SMK1.jpg', 'tarik', '17:18:10', '2022-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `mst_absensi`
--

CREATE TABLE `mst_absensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_absensi` date NOT NULL,
  `absen_masuk` time NOT NULL,
  `absen_keluar` time NOT NULL,
  `insert_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `foto_penjemputan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_absensi`
--

INSERT INTO `mst_absensi` (`id`, `id_siswa`, `tanggal_absensi`, `absen_masuk`, `absen_keluar`, `insert_by`, `updated_by`, `foto_penjemputan`) VALUES
(17, 6, '2023-12-16', '03:42:26', '03:42:26', 42, 42, '2023-12-16-202312168162342.png'),
(18, 6, '2023-12-21', '01:59:59', '01:59:59', 42, 42, '2023-12-21-202312218162342.png');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kelas`
--

CREATE TABLE `mst_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `wali_kelas` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_kelas`
--

INSERT INTO `mst_kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`) VALUES
(3, 'anggrek', 'Budi'),
(4, 'melati', 'putri'),
(5, 'Anggrek1', 'Tatang'),
(6, 'mawar', 'andre');

-- --------------------------------------------------------

--
-- Table structure for table `mst_siswa`
--

CREATE TABLE `mst_siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` int(11) NOT NULL,
  `orang_tua` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto_ortu` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_siswa`
--

INSERT INTO `mst_siswa` (`id`, `nama_siswa`, `nis`, `jenis_kelamin`, `tanggal_lahir`, `kelas`, `orang_tua`, `alamat`, `foto_ortu`, `qr_code`, `status`, `updated_date`) VALUES
(2, 'Ratna Sari', '6961245', 'Perempuan', '2023-11-01', 4, 'Ande', ' Jljl', '4Z_2101_w026_n002_72B_p1_721.jpg', '', 1, '2023-12-15'),
(4, 'Junaidi', '0791237681', 'Laki-Laki', '2023-10-12', 4, 'Lkhasdf', '      Jl hasanudin', 'khalid_(2)1.png', '', 1, '2023-12-15'),
(5, 'Suryani', '097123', 'Perempuan', '2023-07-06', 4, 'Lkhasdf', '     Asdfadsf', 'photo_6274071441720849302_y1.jpg', '', 1, '2023-12-15'),
(6, 'Ahmad Albab', '8162342', 'Laki-Laki', '2023-11-09', 3, 'Lkhasdf', 'Jl. Jendral', '0', '202312218162342.png', 1, '2023-12-21'),
(7, 'Rio Ferdinan', '07612974', 'Laki-Laki', '2023-07-12', 3, 'Lkhasdf', 'Jl hhoasdjife', '0', '', 1, '2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `no_simpan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `nama`, `tipe`, `tgl`, `jam`, `no_simpan`, `jumlah`, `status`) VALUES
(1, 'Firdaus', 'Pokok', '2022-12-04', '04:35:53', '1', '50000', ''),
(3, 'Syukron', 'Pokok', '2022-12-04', '05:18:08', '2', '50000', 'tarik');

-- --------------------------------------------------------

--
-- Table structure for table `simpan`
--

CREATE TABLE `simpan` (
  `id_simpanan` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `no_simpanan` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpan`
--

INSERT INTO `simpan` (`id_simpanan`, `status`, `no_simpanan`, `nama`, `jumlah`, `tanggal`, `jam`, `jenis`) VALUES
(1, 'tarik', '1', 'Firdaus', '50000', '2022-12-04', '16:35:55', 'Pokok'),
(3, 'tarik', '2', 'Syukron', '50000', '2022-12-04', '17:18:10', 'Pokok');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `ktp` varchar(50) DEFAULT NULL,
  `level` enum('Admin','Pegawai','Wali') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `foto`, `password`, `email`, `no_hp`, `nik`, `ktp`, `level`, `blokir`, `id_session`) VALUES
(39, 'Admin', 'Amri', NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '081273973', '12345567678', 'pngwing_com1.png', 'Admin', 'N', ''),
(40, 'ahmad', 'ahmad', NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'umum@gmail.com', '0887', NULL, NULL, 'Admin', 'N', ''),
(41, 'wali1', 'wali1', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'wali1@gmail.com', '0891725123', NULL, NULL, 'Wali', 'N', ''),
(42, 'pegawai', 'pegawai', NULL, '21232f297a57a5a743894a0e4a801fc3', 'pegawai@gmail.com', '08612343', NULL, NULL, 'Pegawai', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `mst_absensi`
--
ALTER TABLE `mst_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mst_siswa`
--
ALTER TABLE `mst_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_absensi`
--
ALTER TABLE `mst_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_siswa`
--
ALTER TABLE `mst_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `simpan`
--
ALTER TABLE `simpan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
