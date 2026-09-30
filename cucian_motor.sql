-- ============================================
-- Ezyy CarWash - Database Setup (Fixed)
-- Jalankan file ini di phpMyAdmin
-- ============================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- --------------------------------------------------------
-- Tabel: tabel_layanan
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tabel_layanan` (
  `id_layanan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `tabel_layanan` (`id_layanan`, `nama_layanan`, `harga`) VALUES
(1, 'cuci motor biasa', 15000),
(2, 'cuci motor premium', 25000),
(3, 'cuci motor + wax', 35000);

-- --------------------------------------------------------
-- Tabel: tabel_pelanggan (nama kolom BENAR: id_pelanggan)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tabel_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemilik` varchar(100) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `jenis_motor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `tabel_pelanggan` (`id_pelanggan`, `nama_pemilik`, `no_plat`, `jenis_motor`) VALUES
(1, 'Gigih', 'BG 8736 AB', 'VARIO');

-- --------------------------------------------------------
-- Tabel: tabel_transaksi
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tabel_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `status_bayar` enum('lunas','belum bayar') NOT NULL DEFAULT 'belum bayar',
  PRIMARY KEY (`id_transaksi`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_layanan` (`id_layanan`),
  CONSTRAINT `tabel_transaksi_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `tabel_layanan` (`id_layanan`),
  CONSTRAINT `tabel_transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tabel_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `tabel_transaksi` (`id_transaksi`, `id_pelanggan`, `id_layanan`, `status_bayar`) VALUES
(1, 1, 3, 'belum bayar');

COMMIT;
