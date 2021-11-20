-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 01:41 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbabsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `mahasiswa` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `id_mk`, `mahasiswa`, `time`) VALUES
(34, 7, 'Mario Cahyo Wibowo19621001', 'Tuesday, 26-Oct-2021 05:33:15 pm'),
(35, 8, 'Akbar Maulana19621032', 'Tuesday, 26-Oct-2021 17:34:10 pm'),
(36, 8, 'Mario Cahyo Wibowo19621001', 'Tuesday, 26-Oct-2021 18:05:18 pm'),
(37, 9, 'Mario Cahyo Wibowo19621001', 'Tuesday, 26-Oct-2021 18:05:46 pm'),
(38, 8, 'S2008001', 'Tuesday, 26-Oct-2021 18:07:34 pm'),
(39, 7, 'TIK0808011395', 'Tuesday, 26-Oct-2021 18:10:24 pm'),
(40, 8, 'Akbar Maulana19621032', 'Tuesday, 26-Oct-2021 18:17:39 pm');

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE `data_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`id_dosen`, `nama_dosen`, `no_hp`, `jenkel`, `tgl_lahir`) VALUES
(8, 'Mursalim, S.Kom, E.ng', 838385843, 'Laki-Laki', '2021-10-04'),
(9, 'Andrian S,Kom, M.Kom', 838385843, 'Laki-Laki', '2021-10-06'),
(10, 'Siti Nurhayati', 2147483647, 'Laki-Laki', '2021-09-27'),
(11, 'Riandi.S,Kom M.Kom', 2147483647, 'Laki-Laki', '2021-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_khd` int(11) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_khd`, `ket`) VALUES
(1, 'Hadir'),
(2, 'Sakit'),
(3, 'Ijin'),
(4, 'Alpha');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `npm` int(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id_mhs`, `npm`, `nama_mhs`, `no_telp`, `prodi`) VALUES
(3, 19621001, 'Mario Cahyo Wibowo', 987644213, 'Sistem Informasi'),
(4, 19621032, 'Akbar Maulana', 987644213, 'Hukum'),
(5, 19621028, 'Andika Sikoway', 987668387, 'Teknik Sipil'),
(6, 19621069, 'Hosea Kanggunum', 2147483647, 'Teknik Sipil'),
(7, 19621045, 'Julio Stiven', 2147483647, 'Sistem Informasi'),
(8, 19621008, 'Dimas Anggar', 987644213, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `data_matakuliah`
--

CREATE TABLE `data_matakuliah` (
  `id_mk` int(11) NOT NULL,
  `nama_mk` varchar(30) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `sks` int(10) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_matakuliah`
--

INSERT INTO `data_matakuliah` (`id_mk`, `nama_mk`, `dosen`, `sks`, `jenis`, `semester`) VALUES
(7, 'Pemograman Web I', 'Andrian S,Kom, M.Kom', 3, 'Materi', '1'),
(8, 'Rekayasa Perangkat Lunak', 'Siti Nurhayati', 3, 'Materi', '5'),
(9, 'Pemograman Web II', 'Andrian S,Kom, M.Kom', 1, 'Materi', '2');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `posisi` enum('dosen','mahasiswa','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `username`, `password`, `no_telp`, `posisi`) VALUES
(1, 'mahasiswa', 'mahasiswa@mahasiswa.com', '$2y$10$N1f5xkB5pU8A2.JHQwQRQeDynwpiUXSOh8aIALmnLPWLVNALc3C7G', 987644213, 'mahasiswa'),
(2, 'Dosen', 'dosen@dosen.com', '$2y$10$KAoh05HmAOw9R52qpxGsw.CLQzV5UFhW8PHjmYyDPECEL3rOj6frS', 987644213, 'dosen'),
(3, 'Mario', 'admin@admin.com', '$2y$10$L0.6Gt7cqb3xePSvVUJkvuO6ZH087REgkXmNUU1QmKTTQgy3CCoW.', 987644213, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mk` (`id_mk`);

--
-- Indexes for table `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_mk` (`id_mk`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_khd`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `data_matakuliah`
--
ALTER TABLE `data_matakuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `data_dosen`
--
ALTER TABLE `data_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_khd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_matakuliah`
--
ALTER TABLE `data_matakuliah`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `data_matakuliah` (`id_mk`);

--
-- Constraints for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD CONSTRAINT `data_jadwal_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `data_matakuliah` (`id_mk`),
  ADD CONSTRAINT `data_jadwal_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `data_dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
