-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2025 at 02:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arlenmoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '525a862ea17dac8f07fc4841318c142d');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int NOT NULL,
  `nama_kamar` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `harga_per_malam` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fasilitas` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `deskripsi`, `harga_per_malam`, `stok`, `foto`, `fasilitas`) VALUES
(1, 'Arlenmoor Classic Room', 'Kamar standar berdesain klasik dengan nuansa hangat, dilengkapi perabot kayu tua dan jendela besar menghadap taman dalam. Cocok untuk tamu yang mencari ketenangan dan kenyamanan.', '950000.00', NULL, 'classic-room.jpeg', 'Wi-Fi Stabil, AC Sentral, TV Vintage, Kamar Mandi Dalam, Air Panas, Jendela Taman Dalam, Sarapan Pagi di Lounge, Akses Perpustakaan Tua'),
(2, 'The Heritage Suite', 'Suite luas bergaya kolonial dengan ruang tamu terpisah, lantai marmer, dan bathtub klasik. Dihiasi lukisan-lukisan antik dan chandelier, cocok untuk tamu kelas atas atau pasangan bulan madu.', '1850000.00', NULL, 'heritage-suite.jpeg', 'Wi-Fi Cepat, Smart TV, Mini Bar, Ruang Tamu Terpisah, Bathtub Gaya Eropa, Balkon Pribadi, Layanan Kamar 24 Jam, Butler Pribadi, Amenities Eksklusif'),
(3, 'Vintage Twin Chamber', 'Kamar twin bernuansa retro klasik dengan wallpaper floral Eropa dan dua tempat tidur single. Ideal untuk sahabat, rekan kerja, atau keluarga kecil.', '1050000.00', NULL, 'vintage-twin.jpeg', 'Wi-Fi, AC, Twin Bed Retro, Cermin Besar, Meja Belajar, TV Antik, Jendela Floral Eropa, Sarapan Gratis, Akses Lounge Sore'),
(4, 'Lord’s Executive Room', 'Kamar eksekutif dengan sentuhan aristokratik meja kerja kayu jati, kursi kulit tua, dan suasana tenang. Favorit para pebisnis dan profesional.', '1350000.00', NULL, 'executive-room.jpg', 'Wi-Fi Premium, Smart TV, Meja Kerja Jati, Sofa Kulit, Layanan Kopi Pagi, Akses Perpustakaan Eksekutif, Peredam Suara, Lampu Tulis Klasik'),
(5, 'Royal Loft Room', 'Terletak di puncak bangunan dengan pemandangan kota dari balkon pribadi. Interior tinggi dengan chandelier kristal dan tempat tidur king size. Suasana megah yang mewah.', '2200000.00', NULL, 'royal-loft.jpg', 'Wi-Fi VIP, King Bed Premium, Balkon Kota, Chandelier Kristal, Bath Tub Eropa, Shower Air Panas, Room Service Full, Butler Khusus, Ballroom & Lounge Eksklusif');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` text,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `pesan`, `waktu`) VALUES
(1, 'Muhammad Irwansyah', 'admin1@gmail.com', 'Al-andalus', '2025-07-26 05:47:53'),
(2, 'Muhammad Irwansyah', 'admin1@gmail.com', 'Al-andalus', '2025-07-26 05:48:51'),
(3, 'Dimas', 'betulan@gmail.com', 'waw', '2025-07-30 02:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_reservasi` int DEFAULT NULL,
  `metode_pembayaran` enum('transfer_bank','qris','bayar_di_tempat') DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status` enum('menunggu_verifikasi','diterima','ditolak') DEFAULT 'menunggu_verifikasi',
  `tanggal_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_reservasi`, `metode_pembayaran`, `bukti_bayar`, `status`, `tanggal_bayar`) VALUES
(1, 2, NULL, 'classic-room.jpeg', 'diterima', '2025-07-25 21:39:25'),
(2, 3, NULL, '1753841900-hero-bg.jpg', 'diterima', '2025-07-29 18:18:20'),
(3, 4, NULL, '1753855061-hero2-bg.jpg', 'diterima', '2025-07-29 21:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int NOT NULL,
  `id_tamu` int DEFAULT NULL,
  `id_kamar` int DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `jumlah_kamar` int DEFAULT NULL,
  `status` enum('pending','dibayar','dibatalkan','selesai') DEFAULT 'pending',
  `tanggal_reservasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_tamu`, `id_kamar`, `check_in`, `check_out`, `jumlah_kamar`, `status`, `tanggal_reservasi`) VALUES
(1, 1, 5, '2025-07-30', '2025-07-31', 1, 'dibayar', '2025-07-25 16:00:00'),
(2, 2, 1, '2025-07-02', '2025-08-02', 1, 'dibayar', '2025-07-25 16:00:00'),
(3, 3, 5, '2025-07-31', '2025-07-31', 1, 'dibayar', '2025-07-29 16:00:00'),
(4, 4, 1, '2025-07-31', '2025-08-15', 1, 'dibayar', '2025-07-29 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama_lengkap`, `email`, `no_hp`, `alamat`) VALUES
(1, 'Muhammad Irwansyah', 'betulan@gmail.com', '081234567890', 'Jalan P. Diponegoro'),
(2, 'Muhammad Baru', 'carifred@hotmail.fr', '081234567899', 'Mugirejo'),
(3, 'Ahmad Noor', 'carifred@hotmail.fr', '081234567899', 'Mugirejo'),
(4, 'Abu Waqas', 'betulan@gmail.com', '081234567899', 'Mugirejo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_tamu` (`id_tamu`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id_tamu`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
