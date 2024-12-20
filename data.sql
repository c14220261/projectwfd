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


-- Dumping database structure for wfd_laravel
CREATE DATABASE IF NOT EXISTS `wfd_laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `wfd_laravel`;

-- Dumping structure for table wfd_laravel.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.cache: ~0 rows (approximately)

-- Dumping structure for table wfd_laravel.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.cache_locks: ~0 rows (approximately)

-- Dumping structure for table wfd_laravel.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curriculum_year` year NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_unit_id` (`unit_id`),
  CONSTRAINT `course_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.courses: ~5 rows (approximately)
INSERT INTO `courses` (`id`, `course_code`, `curriculum_year`, `course_name`, `course_name_en`, `unit_id`, `is_active`, `created_at`, `updated_at`, `ip_address`) VALUES
	(1, 'TF4432', '2024', 'Teknologi Web', 'Web Technologies', 1, 1, '2024-09-16 11:17:23', '2024-09-29 07:26:04', NULL),
	(2, 'TF4421', '2024', 'Data Science', 'Data Science', 2, 1, '2024-09-16 11:17:57', '2024-09-16 11:17:57', NULL),
	(3, 'FT3431', '2024', 'Technopreneurship', 'Technopreneurship', 3, 1, '2024-09-16 11:18:33', '2024-09-16 11:18:33', NULL),
	(4, 'TF3312', '2024', 'Pemrograman Berbasis Obyek', 'Object Oriented Programming', 1, 1, '2024-09-28 02:01:12', '2024-09-28 02:01:12', NULL),
	(5, 'TI2341', '2024', 'Manajemen Rantai Pasok', 'Supply Chain Management', 7, 1, '2024-09-28 02:22:20', '2024-09-28 02:22:20', NULL);

-- Dumping structure for table wfd_laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table wfd_laravel.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.jobs: ~0 rows (approximately)

-- Dumping structure for table wfd_laravel.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.job_batches: ~0 rows (approximately)

-- Dumping structure for table wfd_laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_09_09_121229_create_units_table', 1),
	(5, '2024_09_09_121424_create_courses_table', 1),
	(6, '2024_09_12_140446_create_students_table', 1),
	(7, '2024_09_12_140744_create_study_plans_table', 1),
	(8, '2024_09_16_112216_create_study_plans_table', 2);

-- Dumping structure for table wfd_laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table wfd_laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('NLlHDAZz9dvoJcw0aQdSiJ6P2PPt5ggnf6NpHKj9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia3V1ZTQ1Q01vN0xDTU1sRHQ4dThkWm16TXk3bFBuSTVZSlBCck1xTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly93ZmQyLnRlc3QvY291cnNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727629682);

-- Dumping structure for table wfd_laravel.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nrp` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `unit_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_nrp_unique` (`nrp`),
  UNIQUE KEY `students_nik_unique` (`nik`),
  KEY `student_unit_id` (`unit_id`),
  CONSTRAINT `student_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.students: ~2 rows (approximately)
INSERT INTO `students` (`id`, `nrp`, `name`, `date_of_birth`, `place_of_birth`, `address`, `phone_number`, `nik`, `is_active`, `unit_id`, `created_at`, `updated_at`) VALUES
	(1, 'C14180257', 'Satria Adi Nugraha', '2024-09-16', 'MAGELANG', NULL, '08123634032', '3333333333333333', 1, 2, '2024-09-16 11:14:20', '2024-09-16 11:14:21'),
	(2, 'C14190225', 'Jevelyn', '2024-09-16', 'SURABAYA', 'Citraland', '08123455313', '1111111111111111', 1, 1, '2024-09-16 11:15:03', '2024-09-16 11:15:04'),
	(3, 'C14220193', 'Nathan', '2000-09-16', 'SURABAYA', NULL, '08223133312', '3331113332222234', 1, 1, '2024-09-16 11:15:46', '2024-09-16 11:15:46');

-- Dumping structure for table wfd_laravel.study_plans
CREATE TABLE IF NOT EXISTS `study_plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned NOT NULL,
  `period` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cancel` tinyint(1) NOT NULL DEFAULT '0',
  `grade` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `study_plan_student_id` (`student_id`),
  KEY `study_plan_course_id` (`course_id`),
  CONSTRAINT `study_plan_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `study_plan_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.study_plans: ~6 rows (approximately)
INSERT INTO `study_plans` (`id`, `student_id`, `course_id`, `period`, `is_cancel`, `grade`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, '2024S1', 0, 0, '2024-09-16 11:24:19', '2024-09-16 11:24:22'),
	(2, 2, 3, '2024S1', 0, 0, '2024-09-16 11:24:19', '2024-09-16 11:24:22'),
	(3, 3, 3, '2024S1', 0, 0, '2024-09-16 11:24:20', '2024-09-16 11:24:23'),
	(4, 2, 2, '2024S1', 0, 0, '2024-09-16 11:24:20', '2024-09-16 11:24:23'),
	(5, 3, 2, '2024S1', 0, 0, '2024-09-16 11:24:21', '2024-09-16 11:24:23'),
	(6, 1, 1, '2024S1', 0, 0, '2024-09-16 11:24:21', '2024-09-16 11:24:24');

-- Dumping structure for table wfd_laravel.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_level` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.units: ~5 rows (approximately)
INSERT INTO `units` (`id`, `unit_name`, `unit_level`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Informatics', 2, 1, '2024-09-16 11:11:14', '2024-09-16 11:11:15'),
	(2, 'Business Information System', 3, 1, '2024-09-16 11:11:31', '2024-09-16 11:11:32'),
	(3, 'Industrial Technology', 1, 1, '2024-09-16 11:11:54', '2024-09-16 11:11:55'),
	(6, 'Mechanical Engineering', 2, 1, '2024-09-27 23:53:50', NULL),
	(7, 'Industrial Engineering', 2, 1, '2024-09-27 23:53:50', NULL);

-- Dumping structure for table wfd_laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wfd_laravel.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
