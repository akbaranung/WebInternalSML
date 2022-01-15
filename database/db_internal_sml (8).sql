-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 04:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_internal_sml`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(555) NOT NULL,
  `tgl_berita_terbit` date NOT NULL,
  `gambar` varchar(555) DEFAULT 'berita.jpg',
  `deskripsi` text NOT NULL,
  `file` varchar(150) DEFAULT NULL,
  `katagori_berita` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tgl_berita_terbit`, `gambar`, `deskripsi`, `file`, `katagori_berita`) VALUES
(52, 'Tunjangan Hari Raya Cair Lebih Cepat !', '2021-02-02', 'unnamed.jpg', '<p><strong>Kaabar Baik Untuk Semua Karyawan !</strong></p>\r\n\r\n<p>Bahwa THR pada bulan ramadhan kali ini akan cair lebih cepat dari biasanya</p>\r\n', NULL, 5),
(59, 'Karyawan baru untuk divisi Finance', '2021-05-05', 'Orientasi-karyawan-baru1.jpg', '<p><strong>Karyawan Pada Divisi Finance&nbsp;</strong></p>\r\n\r\n<p>Akan hadir karyawan baru pada divisi finance yang bernama ....</p>\r\n', 'Dataedo_Data_Dictionary.pdf', 4),
(60, 'Hadirnya karyawan baru untuk divisi IT', '2021-06-11', 'Orientasi-karyawan-baru.jpg', '<p>Karyawan baru yang akan datang akan berada pada divisi IT</p>\r\n', 'Screenshot_(124).png', 4),
(61, 'Berita Duka dari karyawan divisi kebersihan', '2021-04-27', 'e31e1f9ea2322decd31dfbb8874ee551.jpg', '<p>Telah berpulang kepada pihak yang maha kuasa salah satu karyawan dari divisi kebersihan</p>\r\n', NULL, 2),
(62, 'Lomba Olahraga Untuk Para Karyawan', '2021-06-12', '83logo_triathlon.jpg', '<p><em>Sebelum libur idul adha terjadi </em>maka dari pihak perusahaan akan mengadakan lomba olahraga terlebih dahulu untuk para karyawan agar tetap memiliki rasa antusias terhadapa keseharan jasmani</p>\r\n', 'KP-TI_273.pdf', 1),
(64, 'Libur Akhir Tahun Ditiadakan ! ', '2021-06-07', 'download_(3).jpg', '<p><strong>Liburan Tahun Ini Tidak ada !&nbsp;</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; Dikarenakan memang tahun ini banyak sekali kendala tentang liburan, salah satu faktornya yaitu adalaha Pandemi Covid 10.</p>\r\n', NULL, 1),
(65, 'Kenaikan Gaji Karyawan', '2021-06-08', '11119-naik-gaji.jpg', '<p><strong>Naik gaji karyawan</strong></p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong> <em>Proses Kenaikan gaji</em> ini akan dilaksanakan dalam beberapa bulan kedepan dikarenakan kinerja dari tiap karyawan tergolong baik dan juga</p>\r\n\r\n<p>mengalami peningkatan yang signifikan sehingga rating perusahaan semakin membaik</p>\r\n', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(10) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_kegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama_kegiatan`, `gambar`, `tgl_kegiatan`) VALUES
(7, 'Pelepasan karyawan ', 'clark-street-mercantile-P3pI6xzovu0-unsplash1.jpg', '2021-06-24'),
(8, 'Ulang Tahun CEO', 'Screenshot_(44).png', '2021-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_perusahaan`
--

CREATE TABLE `dokumen_perusahaan` (
  `id` int(10) NOT NULL,
  `judul_dokumen` varchar(100) NOT NULL,
  `file` varchar(150) NOT NULL,
  `nama_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_perusahaan`
--

INSERT INTO `dokumen_perusahaan` (`id`, `judul_dokumen`, `file`, `nama_kategori`) VALUES
(2, 'Dokumen Finance', '1375-2250-1-SM1.pdf', 3),
(3, 'Dokumen HRD', 'Dataedo_Data_Dictionary.pdf', 1),
(4, 'Data Backup untuk bagian HSE', 'PitchDeck_KWH.pptx', 4);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `foto_karyawan` varchar(123) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`, `jenis_kelamin`, `email`, `no_telpon`, `foto_karyawan`, `divisi`, `password`, `status`, `level`) VALUES
(5, 'Admin', 'Tangerang', 'Laki-laki', 'admin@gmail.com', '5688769798', '2530724628583517261.jpg', 'IT', 'admin', 3, 2),
(7, 'User', 'Tangerang', 'Laki-laki', 'user@gmail.com', '082216100238', '', 'Acara', 'user', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(10) NOT NULL,
  `nama_katagori_berita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama_katagori_berita`) VALUES
(1, 'Event Perusahaan'),
(2, 'Berita Duka'),
(4, 'Penambahan Karyawan Baru'),
(5, 'Suka Cita');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_dokumen_perusahaan`
--

CREATE TABLE `kategori_dokumen_perusahaan` (
  `id` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_dokumen_perusahaan`
--

INSERT INTO `kategori_dokumen_perusahaan` (`id`, `nama_kategori`) VALUES
(1, 'HRD'),
(3, 'Finance'),
(4, 'HSE');

-- --------------------------------------------------------

--
-- Table structure for table `status_karyawan`
--

CREATE TABLE `status_karyawan` (
  `id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_karyawan`
--

INSERT INTO `status_karyawan` (`id`, `status`) VALUES
(1, 'Tetap'),
(3, 'Magang'),
(4, 'Kontrak'),
(5, 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_berita_kategori_berita` (`katagori_berita`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen_perusahaan`
--
ALTER TABLE `dokumen_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_karyawan` (`level`),
  ADD KEY `fk_status_karyawan` (`status`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_dokumen_perusahaan`
--
ALTER TABLE `kategori_dokumen_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_karyawan`
--
ALTER TABLE `status_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dokumen_perusahaan`
--
ALTER TABLE `dokumen_perusahaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_dokumen_perusahaan`
--
ALTER TABLE `kategori_dokumen_perusahaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_karyawan`
--
ALTER TABLE `status_karyawan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_berita_kategori_berita` FOREIGN KEY (`katagori_berita`) REFERENCES `kategori_berita` (`id`);

--
-- Constraints for table `dokumen_perusahaan`
--
ALTER TABLE `dokumen_perusahaan`
  ADD CONSTRAINT `dokumen_perusahaan_ibfk_1` FOREIGN KEY (`nama_kategori`) REFERENCES `kategori_dokumen_perusahaan` (`id`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_status_karyawan` FOREIGN KEY (`status`) REFERENCES `status_karyawan` (`id`),
  ADD CONSTRAINT `fk_user_karyawan` FOREIGN KEY (`level`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
