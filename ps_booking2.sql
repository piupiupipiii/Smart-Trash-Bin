-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ps_booking2
CREATE DATABASE IF NOT EXISTS `ps_booking2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ps_booking2`;

-- Dumping structure for table ps_booking2.destination
CREATE TABLE IF NOT EXISTS `destination` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `deskripsi` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ps_booking2.destination: ~2 rows (approximately)
INSERT INTO `destination` (`id`, `nama`, `lokasi`, `deskripsi`) VALUES
	(1, 'Labuan Bajo', 'NTT', NULL),
	(2, 'Pantai Kuta', 'Bali', NULL);

-- Dumping structure for table ps_booking2.hotels
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` tinyint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.hotels: ~2 rows (approximately)
INSERT INTO `hotels` (`id`, `name`, `address`, `stars`, `created_at`, `updated_at`) VALUES
	(1, 'Hotel Santika', 'Jl. Sumatera No. 52-54', 3, '2024-01-04 16:41:56', NULL),
	(2, 'Loccal Collection Hotel', 'Labuan Bajo, Kec. Komodo, Kabupaten Manggarai Barat, Nusa Tenggara Timur', 4, '2024-01-04 16:41:56', NULL);

-- Dumping structure for table ps_booking2.hotel_facilities
CREATE TABLE IF NOT EXISTS `hotel_facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_facilities_hotel_id_foreign` (`hotel_id`),
  CONSTRAINT `hotel_facilities_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.hotel_facilities: ~8 rows (approximately)
INSERT INTO `hotel_facilities` (`id`, `hotel_id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Wi-Fi', 'bi bi-wifi', '2024-01-04 16:48:08', NULL),
	(2, 1, 'Parkir', 'bi bi-p-circle-fill', '2024-01-04 16:48:08', NULL),
	(3, 1, '24 Hours Service', 'assets/images/24-hours-phone-service.png', '2024-01-04 16:48:08', NULL),
	(4, 1, 'Restaurant', 'assets/images/restaurant.png', '2024-01-04 16:48:08', NULL),
	(5, 1, 'AC', 'assets/images/air-conditioner.png', '2024-01-04 16:48:08', NULL),
	(6, 1, 'Elevator', 'assets/images/elevator.png', '2024-01-04 16:48:08', NULL),
	(7, 1, 'Shower', 'assets/images/shower.png', NULL, NULL),
	(8, 2, 'Wi-Fi', 'bi bi-wifi', NULL, NULL);

-- Dumping structure for table ps_booking2.hotel_images
CREATE TABLE IF NOT EXISTS `hotel_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` bigint unsigned NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_images_hotel_id_foreign` (`hotel_id`),
  CONSTRAINT `hotel_images_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.hotel_images: ~2 rows (approximately)
INSERT INTO `hotel_images` (`id`, `hotel_id`, `path`, `alt`, `created_at`, `updated_at`) VALUES
	(1, 1, 'assets/images/santika/Hotel Santika Bandung.jpeg', 'Gambar Hotel', '2024-01-04 16:45:23', NULL),
	(2, 2, 'assets/images/bajo/bajo.jpg', 'Gambar Hotel', '2024-01-04 16:45:23', NULL);

-- Dumping structure for table ps_booking2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2024_01_04_223744_create_hotels_table', 1),
	(4, '2024_01_04_224330_create_hotel_facilities_table', 1),
	(5, '2024_01_04_224850_create_hotel_images_table', 1),
	(6, '2024_01_04_225759_create_rooms_table', 1),
	(7, '2024_01_04_230508_create_room_images_table', 1),
	(8, '2024_01_04_230930_create_order_table', 1),
	(9, '2024_01_07_062707_create_payments_table', 1);

-- Dumping structure for table ps_booking2.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `room_id` bigint unsigned NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_prices` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_user_id_foreign` (`user_id`),
  KEY `order_room_id_foreign` (`room_id`),
  CONSTRAINT `order_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.order: ~0 rows (approximately)

-- Dumping structure for table ps_booking2.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `room_id` bigint unsigned NOT NULL,
  `for_themself` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_adults` int unsigned NOT NULL,
  `total_children` int unsigned NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_room_id_foreign` (`room_id`),
  CONSTRAINT `orders_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.orders: ~5 rows (approximately)
INSERT INTO `orders` (`id`, `user_id`, `room_id`, `for_themself`, `name`, `email`, `phone`, `total_adults`, `total_children`, `check_in`, `check_out`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 1, NULL, NULL, NULL, 2, 0, '2024-01-07', '2024-01-08', '', '2024-01-07 05:51:56', '2024-01-07 05:51:56', NULL),
	(2, 1, 1, 1, NULL, NULL, NULL, 2, 0, '2024-01-07', '2024-01-08', '', '2024-01-07 09:52:06', '2024-01-07 09:52:06', NULL),
	(3, 3, 3, 1, NULL, NULL, NULL, 2, 0, '2024-01-08', '2024-01-09', '', '2024-01-07 17:44:09', '2024-01-07 17:44:09', NULL),
	(4, 3, 4, 1, NULL, NULL, NULL, 2, 0, '2024-01-08', '2024-01-09', '', '2024-01-07 17:45:24', '2024-01-07 17:45:24', NULL),
	(5, 3, 1, 1, NULL, NULL, NULL, 2, 0, '2024-01-08', '2024-01-09', 'ga ada', '2024-01-07 18:14:00', '2024-01-07 18:14:00', NULL);

-- Dumping structure for table ps_booking2.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `price` int unsigned NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`),
  CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.payments: ~5 rows (approximately)
INSERT INTO `payments` (`id`, `order_id`, `price`, `token`, `created_at`, `updated_at`) VALUES
	(1, 1, 650000, 'MjAyNDAxMDctMS0xLTEyNTE1Ni0xOnNpbHZ5bnVyYXpraWE2OTBAZ21haWwuY29tLUhKV05aTUhUWTdaV003RVc=', '2024-01-07 05:51:56', '2024-01-07 05:51:56'),
	(2, 2, 650000, 'MjAyNDAxMDctMS0xLTE2NTIwNi0xOnNpbHZ5bnVyYXpraWE2OTBAZ21haWwuY29tLTBYWVpGQUhSOFNXUzVDNk4=', '2024-01-07 09:52:06', '2024-01-07 09:52:06'),
	(3, 3, 800000, 'MjAyNDAxMDgtMS0zLTAwNDQwOS0zOmdpbmFAZ21haWwuY29tLTVHN0RKVE9QS0RVQVZZOVQ=', '2024-01-07 17:44:09', '2024-01-07 17:44:09'),
	(4, 4, 1625000, 'MjAyNDAxMDgtMi00LTAwNDUyNS0zOmdpbmFAZ21haWwuY29tLUdJVkYxQ1ZPU01HRlhZRVg=', '2024-01-07 17:45:25', '2024-01-07 17:45:25'),
	(5, 5, 650000, 'MjAyNDAxMDgtMS0xLTAxMTQwMC0zOmdpbmFAZ21haWwuY29tLVpZVlhIQUtXRE9aM0dBWFI=', '2024-01-07 18:14:00', '2024-01-07 18:14:00');

-- Dumping structure for table ps_booking2.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table ps_booking2.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int unsigned NOT NULL,
  `total` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_hotel_id_foreign` (`hotel_id`),
  CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.rooms: ~4 rows (approximately)
INSERT INTO `rooms` (`id`, `hotel_id`, `name`, `description`, `price`, `total`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Superior Room', 'free cancelation', 650000, 10, NULL, NULL),
	(2, 1, 'Deluxe Room', 'free cancellation', 750000, 10, NULL, NULL),
	(3, 1, 'Executive', 'free cancelation, free breakfast', 800000, 10, NULL, NULL),
	(4, 2, 'Standard', 'free breakfast', 1625000, 10, NULL, NULL);

-- Dumping structure for table ps_booking2.room_images
CREATE TABLE IF NOT EXISTS `room_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `room_id` bigint unsigned NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_images_room_id_foreign` (`room_id`),
  CONSTRAINT `room_images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.room_images: ~4 rows (approximately)
INSERT INTO `room_images` (`id`, `room_id`, `path`, `alt`, `created_at`, `updated_at`) VALUES
	(1, 1, 'assets/images/santika/rooms/superior_santika.jpeg', 'Gambar Kamar', NULL, NULL),
	(2, 2, 'assets/images/santika/rooms/deluxe_santika.jpeg', 'Gambar Kamar', NULL, NULL),
	(3, 3, 'assets/images/santika/rooms/executive_santika.jpeg', 'Gambar Kamar', NULL, NULL),
	(4, 4, 'assets/images/bajo/room/standard.jpg', 'Gambar Kamar', NULL, NULL);

-- Dumping structure for table ps_booking2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ps_booking2.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Silvy', 'silvynurazkia690@gmail.com', '085526293485', '$2y$12$uH3Z21UwYfQ1JfHL7A3ckuDlDEmDR.ZHKjvSnZdd4xvO80K/E67Tq', '2024-01-07 05:45:40', '2024-01-07 05:45:40'),
	(3, 'gina', 'gina@gmail.com', '097654323434', '$2y$12$0q5zqis5GFsgJk8yw5zMdu0rsGb7p/oK182O6TBC.EpF5MpAYiaJ6', '2024-01-07 17:43:32', '2024-01-07 17:43:32');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
