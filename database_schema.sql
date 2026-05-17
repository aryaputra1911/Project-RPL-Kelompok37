-- =====================================================
-- Database Schema for PeakRent (db_penyewaan)
-- Import ini di phpMyAdmin InfinityFree
-- =====================================================

SET FOREIGN_KEY_CHECKS=0;

-- Tabel Users
CREATE TABLE IF NOT EXISTS `user` (
    `id_user` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nama` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `no_telp` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel Admin
CREATE TABLE IF NOT EXISTS `admin` (
    `id_admin` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nama` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel Alat
CREATE TABLE IF NOT EXISTS `alat` (
    `id_alat` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nama_alat` VARCHAR(255) NOT NULL,
    `harga_per_hari` INT NOT NULL DEFAULT 0,
    `stok` INT NOT NULL DEFAULT 0,
    `foto` VARCHAR(255) NULL,
    `deskripsi` TEXT NULL,
    `Admin_id_admin` BIGINT UNSIGNED NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`Admin_id_admin`) REFERENCES `admin`(`id_admin`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel Pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
    `id_pesanan` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `Users_id_user` BIGINT UNSIGNED NOT NULL,
    `Admin_id_admin` BIGINT UNSIGNED NULL,
    `tgl_sewa` DATE NOT NULL,
    `tgl_kembali` DATE NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`Users_id_user`) REFERENCES `user`(`id_user`) ON DELETE CASCADE,
    FOREIGN KEY (`Admin_id_admin`) REFERENCES `admin`(`id_admin`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel Detail Pemesanan
CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
    `id_detail` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `jumlah` INT NOT NULL,
    `subtotal` DECIMAL(15,2) NOT NULL,
    `Pemesanan_id_pesanan` BIGINT UNSIGNED NOT NULL,
    `Pemesanan_Users_id_user` BIGINT UNSIGNED NOT NULL,
    `Alat_id_alat` BIGINT UNSIGNED NOT NULL,
    `id_admin` BIGINT UNSIGNED NULL,
    FOREIGN KEY (`Pemesanan_id_pesanan`) REFERENCES `pemesanan`(`id_pesanan`) ON DELETE CASCADE,
    FOREIGN KEY (`Pemesanan_Users_id_user`) REFERENCES `user`(`id_user`) ON DELETE CASCADE,
    FOREIGN KEY (`Alat_id_alat`) REFERENCES `alat`(`id_alat`) ON DELETE CASCADE,
    FOREIGN KEY (`id_admin`) REFERENCES `admin`(`id_admin`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel Transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
    `id_transaksi` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `id_pesanan` BIGINT UNSIGNED NOT NULL,
    `total_biaya` INT NOT NULL,
    `status_bayar` VARCHAR(255) NOT NULL,
    `metode_bayar` VARCHAR(255) NULL,
    `tgl_transaksi` TIMESTAMP NULL DEFAULT NULL,
    `Pemesanan_Users_id_user` BIGINT UNSIGNED NULL,
    `id_admin` BIGINT UNSIGNED NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`id_pesanan`) REFERENCES `pemesanan`(`id_pesanan`) ON DELETE CASCADE,
    FOREIGN KEY (`Pemesanan_Users_id_user`) REFERENCES `user`(`id_user`) ON DELETE SET NULL,
    FOREIGN KEY (`id_admin`) REFERENCES `admin`(`id_admin`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel Personal Access Tokens (Sanctum)
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `tokenable_type` VARCHAR(255) NOT NULL,
    `tokenable_id` BIGINT UNSIGNED NOT NULL,
    `name` TEXT NOT NULL,
    `token` VARCHAR(64) NOT NULL UNIQUE,
    `abilities` TEXT NULL,
    `last_used_at` TIMESTAMP NULL DEFAULT NULL,
    `expires_at` TIMESTAMP NULL DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel Migrations (Laravel internal)
CREATE TABLE IF NOT EXISTS `migrations` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `migration` VARCHAR(255) NOT NULL,
    `batch` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2026_04_22_010124_create_user_table', 1),
('2026_04_22_010136_create_alat_table', 1),
('2026_04_22_010143_create_pemesanan_table', 1),
('2026_04_22_010151_create_transaksi_table', 1),
('2026_04_22_012309_create_personal_access_tokens_table', 1),
('2026_05_01_000001_update_alat_table_add_fields', 1),
('2026_05_17_000001_create_admin_table', 1),
('2026_05_17_000002_adjust_alat_table', 1),
('2026_05_17_000003_adjust_pemesanan_table', 1),
('2026_05_17_000004_create_detail_pemesanan_table', 1),
('2026_05_17_000005_adjust_transaksi_table', 1);

SET FOREIGN_KEY_CHECKS=1;
