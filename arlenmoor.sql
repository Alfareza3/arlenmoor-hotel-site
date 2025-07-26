-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: arlenmoor
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','525a862ea17dac8f07fc4841318c142d');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kamar` (
  `id_kamar` int NOT NULL AUTO_INCREMENT,
  `nama_kamar` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `harga_per_malam` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fasilitas` text,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar`
--

LOCK TABLES `kamar` WRITE;
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` VALUES (1,'Arlenmoor Classic Room','Kamar standar berdesain klasik dengan nuansa hangat, dilengkapi perabot kayu tua dan jendela besar menghadap taman dalam. Cocok untuk tamu yang mencari ketenangan dan kenyamanan.',950000.00,NULL,'classic-room.jpeg','Wi-Fi, AC, TV, Kamar Mandi Dalam, Air Panas, Sarapan Gratis'),(2,'The Heritage Suite','Suite luas bergaya kolonial dengan ruang tamu terpisah, lantai marmer, dan bathtub klasik. Dihiasi lukisan-lukisan antik dan chandelier, cocok untuk tamu kelas atas atau pasangan bulan madu.',1850000.00,NULL,'heritage-suite.jpeg','Wi-Fi, AC, Smart TV, Bath Tub, Mini Bar, Layanan Kamar 24 Jam, Balkon'),(3,'Vintage Twin Chamber','Kamar twin bernuansa retro klasik dengan wallpaper floral Eropa dan dua tempat tidur single. Ideal untuk sahabat, rekan kerja, atau keluarga kecil.',1050000.00,NULL,'vintage-twin.jpeg','Wi-Fi, AC, TV, Meja Belajar, Cermin Besar, Sarapan'),(4,'Lord’s Executive Room','Kamar eksekutif dengan sentuhan aristokratik meja kerja kayu jati, kursi kulit tua, dan suasana tenang. Favorit para pebisnis dan profesional.',1350000.00,NULL,'executive-room.jpg','Wi-Fi Cepat, AC, Smart TV, Meja Kerja, Layanan Antar Kopi Pagi'),(5,'Royal Loft Room','Terletak di puncak bangunan dengan pemandangan kota dari balkon pribadi. Interior tinggi dengan chandelier kristal dan tempat tidur king size. Suasana megah yang mewah.',2200000.00,NULL,'royal-loft.jpg','Wi-Fi, AC, King Bed, Balkon, Bath Tub, Smart TV, Room Service, Amenities Eksklusif');
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` text,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (1,'Muhammad Irwansyah','admin1@gmail.com','Al-andalus','2025-07-26 05:47:53'),(2,'Muhammad Irwansyah','admin1@gmail.com','Al-andalus','2025-07-26 05:48:51');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_reservasi` int DEFAULT NULL,
  `metode_pembayaran` enum('transfer_bank','qris','bayar_di_tempat') DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status` enum('menunggu_verifikasi','diterima','ditolak') DEFAULT 'menunggu_verifikasi',
  `tanggal_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_reservasi` (`id_reservasi`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (1,2,NULL,'classic-room.jpeg','diterima','2025-07-25 21:39:25');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservasi`
--

DROP TABLE IF EXISTS `reservasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservasi` (
  `id_reservasi` int NOT NULL AUTO_INCREMENT,
  `id_tamu` int DEFAULT NULL,
  `id_kamar` int DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `jumlah_kamar` int DEFAULT NULL,
  `status` enum('pending','dibayar','dibatalkan','selesai') DEFAULT 'pending',
  `tanggal_reservasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reservasi`),
  KEY `id_tamu` (`id_tamu`),
  KEY `id_kamar` (`id_kamar`),
  CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id_tamu`),
  CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservasi`
--

LOCK TABLES `reservasi` WRITE;
/*!40000 ALTER TABLE `reservasi` DISABLE KEYS */;
INSERT INTO `reservasi` VALUES (1,1,5,'2025-07-30','2025-07-31',1,'dibayar','2025-07-25 16:00:00'),(2,2,1,'2025-07-02','2025-08-02',1,'dibayar','2025-07-25 16:00:00');
/*!40000 ALTER TABLE `reservasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamu`
--

DROP TABLE IF EXISTS `tamu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tamu` (
  `id_tamu` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_tamu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamu`
--

LOCK TABLES `tamu` WRITE;
/*!40000 ALTER TABLE `tamu` DISABLE KEYS */;
INSERT INTO `tamu` VALUES (1,'Muhammad Irwansyah','betulan@gmail.com','081234567890','Jalan P. Diponegoro'),(2,'Muhammad Baru','carifred@hotmail.fr','081234567899','Mugirejo');
/*!40000 ALTER TABLE `tamu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-26 14:01:23
