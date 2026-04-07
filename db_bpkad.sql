/*
 Navicat Premium Data Transfer

 Source Server         : Database Saya
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_bpkad

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 06/04/2026 23:56:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_highline` tinyint(1) NOT NULL,
  `type_article` tinyint NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `date` date NULL DEFAULT NULL,
  `author_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `articles_author_id_foreign`(`author_id` ASC) USING BTREE,
  CONSTRAINT `articles_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for aspirations
-- ----------------------------
DROP TABLE IF EXISTS `aspirations`;
CREATE TABLE `aspirations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_send` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aspirations
-- ----------------------------

-- ----------------------------
-- Table structure for asset_sectors
-- ----------------------------
DROP TABLE IF EXISTS `asset_sectors`;
CREATE TABLE `asset_sectors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asset_sectors
-- ----------------------------

-- ----------------------------
-- Table structure for budget_sectors
-- ----------------------------
DROP TABLE IF EXISTS `budget_sectors`;
CREATE TABLE `budget_sectors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of budget_sectors
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` smallint NOT NULL DEFAULT 0 COMMENT '0: informasi berkala, 1: serta merta, 2: setiap saat: 3: dikecualikan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Informasi Tentang Profil Badan Publik', 'informasi-tentang-profil-badan-publik', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');
INSERT INTO `categories` VALUES (2, 'Ringkasan Program dan Kegiatan yang sedang dijalankan', 'ringkasan-program-dan-kegiatan-yang-sedang-dijalankan', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');
INSERT INTO `categories` VALUES (3, 'Ringkasan Laporan Keuangan', 'ringkasan-laporan-keuangan', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');
INSERT INTO `categories` VALUES (4, 'Informasi Pengadaan Barang dan Jasa', 'informasi-pengadaan-barang-dan-jasa', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');
INSERT INTO `categories` VALUES (5, 'Informasi tentang Peraturan, Keputusan, atau Kebijakan yang Mengikat', 'informasi-tentang-peraturan-keputusan-atau-kebijakan-yang-mengikat', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');
INSERT INTO `categories` VALUES (6, 'Informasi tentang Prosedur Peringatan Dini dan Prosedur Evakuasi Keadaan Darurat', 'informasi-tentang-prosedur-peringatan-dini-dan-prosedur-evakuasi-keadaan-darurat', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');
INSERT INTO `categories` VALUES (7, 'Ringkasan Informasi tentang Kinerja', 'ringkasan-informasi-tentang-kinerja', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');
INSERT INTO `categories` VALUES (8, 'Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau Pelanggaran', 'informasi-tentang-tata-cara-pengaduan-penyalahgunaan-wewenang-atau-pelanggaran', 0, '2026-02-24 11:34:18', '2026-02-24 11:34:18');

-- ----------------------------
-- Table structure for complaint_calculations
-- ----------------------------
DROP TABLE IF EXISTS `complaint_calculations`;
CREATE TABLE `complaint_calculations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `total` int NOT NULL DEFAULT 0,
  `process` int NOT NULL DEFAULT 0,
  `finish` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `complaint_calculations_year_unique`(`year` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of complaint_calculations
-- ----------------------------

-- ----------------------------
-- Table structure for complaints
-- ----------------------------
DROP TABLE IF EXISTS `complaints`;
CREATE TABLE `complaints`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `quarter_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quarter_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quarter_3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quarter_4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of complaints
-- ----------------------------

-- ----------------------------
-- Table structure for contact_profiles
-- ----------------------------
DROP TABLE IF EXISTS `contact_profiles`;
CREATE TABLE `contact_profiles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_hours` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact_profiles
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for faqs
-- ----------------------------
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faqs
-- ----------------------------

-- ----------------------------
-- Table structure for financial_sectors
-- ----------------------------
DROP TABLE IF EXISTS `financial_sectors`;
CREATE TABLE `financial_sectors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of financial_sectors
-- ----------------------------

-- ----------------------------
-- Table structure for home_settings
-- ----------------------------
DROP TABLE IF EXISTS `home_settings`;
CREATE TABLE `home_settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of home_settings
-- ----------------------------

-- ----------------------------
-- Table structure for information_categories
-- ----------------------------
DROP TABLE IF EXISTS `information_categories`;
CREATE TABLE `information_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `information_categories_category_id_foreign`(`category_id` ASC) USING BTREE,
  CONSTRAINT `information_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of information_categories
-- ----------------------------

-- ----------------------------
-- Table structure for information_details
-- ----------------------------
DROP TABLE IF EXISTS `information_details`;
CREATE TABLE `information_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `information_category_id` bigint UNSIGNED NOT NULL,
  `year` year NOT NULL,
  `type` smallint NOT NULL COMMENT '0: link, 1: download',
  `target` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `information_details_information_category_id_foreign`(`information_category_id` ASC) USING BTREE,
  CONSTRAINT `information_details_information_category_id_foreign` FOREIGN KEY (`information_category_id`) REFERENCES `information_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of information_details
-- ----------------------------

-- ----------------------------
-- Table structure for mayor_law_products
-- ----------------------------
DROP TABLE IF EXISTS `mayor_law_products`;
CREATE TABLE `mayor_law_products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mayor_law_products
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_11_09_072944_create_aspirations', 1);
INSERT INTO `migrations` VALUES (6, '2022_11_10_075440_create_home_setting', 1);
INSERT INTO `migrations` VALUES (7, '2022_11_12_070824_create_vision_settings', 1);
INSERT INTO `migrations` VALUES (8, '2022_11_23_062708_create_agency_public_information', 1);
INSERT INTO `migrations` VALUES (9, '2022_11_25_062027_create_articles_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_11_25_064708_create_information_categories', 1);
INSERT INTO `migrations` VALUES (11, '2022_11_25_064754_create_information_details', 1);
INSERT INTO `migrations` VALUES (12, '2022_11_25_071647_create_categories', 1);
INSERT INTO `migrations` VALUES (13, '2022_11_25_071757_add_category_id_to_information', 1);
INSERT INTO `migrations` VALUES (14, '2022_11_26_121807_slug_article', 1);
INSERT INTO `migrations` VALUES (15, '2022_11_28_145955_create_secretarial_sectors', 1);
INSERT INTO `migrations` VALUES (16, '2022_11_28_153641_create_budget_sectors', 1);
INSERT INTO `migrations` VALUES (17, '2022_11_28_154152_create_financial_sectors', 1);
INSERT INTO `migrations` VALUES (18, '2022_11_28_154904_create_assets_sector', 1);
INSERT INTO `migrations` VALUES (19, '2022_12_08_132503_create_sectors_table', 1);
INSERT INTO `migrations` VALUES (20, '2022_12_08_132739_create_sector_images_table', 1);
INSERT INTO `migrations` VALUES (21, '2022_12_15_212434_null_image_home_setting', 1);
INSERT INTO `migrations` VALUES (22, '2022_12_15_212615_date_article', 1);
INSERT INTO `migrations` VALUES (23, '2022_12_15_231418_change_article_description', 1);
INSERT INTO `migrations` VALUES (24, '2022_12_15_235627_update_user', 1);
INSERT INTO `migrations` VALUES (25, '2022_12_16_130537_create_online_applications_table', 1);
INSERT INTO `migrations` VALUES (26, '2022_12_16_144841_update_online_application', 1);
INSERT INTO `migrations` VALUES (27, '2022_12_17_120016_create_contact_profiles_table', 1);
INSERT INTO `migrations` VALUES (28, '2022_12_17_135244_add_type_categories', 1);
INSERT INTO `migrations` VALUES (29, '2022_12_17_160024_create_youtube_videos_table', 1);
INSERT INTO `migrations` VALUES (30, '2022_12_22_145122_create_sliders_table', 1);
INSERT INTO `migrations` VALUES (31, '2023_04_13_233616_create_services_table', 1);
INSERT INTO `migrations` VALUES (32, '2023_12_07_135418_create_public_services_table', 1);
INSERT INTO `migrations` VALUES (33, '2024_05_11_133706_uopdate_table_vision', 1);
INSERT INTO `migrations` VALUES (34, '2024_05_11_140024_create_faqs_table', 1);
INSERT INTO `migrations` VALUES (35, '2024_05_17_134057_create_complaints', 1);
INSERT INTO `migrations` VALUES (36, '2024_05_18_135739_create_complaint_calculations', 1);
INSERT INTO `migrations` VALUES (37, '2024_06_07_131437_create_region_law_products', 1);
INSERT INTO `migrations` VALUES (38, '2024_06_07_131551_create_mayor_law_products', 1);
INSERT INTO `migrations` VALUES (39, '2025_08_07_154845_create_visits_table', 1);
INSERT INTO `migrations` VALUES (40, '2025_08_24_160024_create_uptd_sectors_table', 1);
INSERT INTO `migrations` VALUES (41, '2026_03_14_231443_create_notifications_table', 2);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pengumuman',
  `category_label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cat_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gold',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '?',
  `icon_bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rgba(200,168,75,0.12)',
  `nomor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES (2, 'Peraturan Bupati No. 12 Tahun 2025 tentang Pengelolaan APBD', 'Telah ditetapkan Perbup terbaru terkait tata cara pengelolaan dan pertanggungjawaban APBD. Berlaku efektif mulai 1 April 2025. Seluruh OPD wajib menyesuaikan prosedur internal.', 'regulasi', 'Regulasi', 'info', '📋', '#EBF8FF', 'Perbup No. 12/2025', '2025-03-10', NULL, 1, 1, '2026-03-14 23:18:36', '2026-03-14 23:20:07');
INSERT INTO `notifications` VALUES (3, 'BPKAD Raih WTP Ke-7 dari BPK RI Perwakilan Sumut', 'Kabupaten Serdang Bedagai kembali meraih opini Wajar Tanpa Pengecualian (WTP) dari Badan Pemeriksa Keuangan atas LKPD Tahun Anggaran 2024.', 'kegiatan', 'Kegiatan', 'success', '🏆', '#F0FFF4', 'LHP BPK No. 05/LHP/XVIII.MDN/2025', '2025-03-13', NULL, 1, 1, '2026-03-14 23:18:36', '2026-03-14 23:19:12');
INSERT INTO `notifications` VALUES (4, 'Bimtek Sistem Informasi Keuangan Daerah (SIKD) Batch 2', 'Bimbingan teknis penggunaan aplikasi SIKD terbaru akan diselenggarakan pada 25 Maret 2025 di Aula Kantor Bupati. Peserta adalah operator keuangan dari masing-masing OPD.', 'kegiatan', 'Kegiatan', 'warning', '📅', '#FFFBEB', 'Undangan No. 005/BPKAD/2025', '2025-03-11', NULL, 1, 1, '2026-03-14 23:18:36', '2026-03-14 23:18:36');

-- ----------------------------
-- Table structure for online_applications
-- ----------------------------
DROP TABLE IF EXISTS `online_applications`;
CREATE TABLE `online_applications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of online_applications
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for public_agency_information
-- ----------------------------
DROP TABLE IF EXISTS `public_agency_information`;
CREATE TABLE `public_agency_information`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` smallint NOT NULL DEFAULT 0 COMMENT '0: link, 1: file download',
  `target` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of public_agency_information
-- ----------------------------

-- ----------------------------
-- Table structure for public_services
-- ----------------------------
DROP TABLE IF EXISTS `public_services`;
CREATE TABLE `public_services`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `quarter_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quarter_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quarter_3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quarter_4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of public_services
-- ----------------------------

-- ----------------------------
-- Table structure for region_law_products
-- ----------------------------
DROP TABLE IF EXISTS `region_law_products`;
CREATE TABLE `region_law_products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of region_law_products
-- ----------------------------

-- ----------------------------
-- Table structure for secretarial_sectors
-- ----------------------------
DROP TABLE IF EXISTS `secretarial_sectors`;
CREATE TABLE `secretarial_sectors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of secretarial_sectors
-- ----------------------------

-- ----------------------------
-- Table structure for sector_images
-- ----------------------------
DROP TABLE IF EXISTS `sector_images`;
CREATE TABLE `sector_images`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sector_id` bigint UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sector_images_sector_id_foreign`(`sector_id` ASC) USING BTREE,
  CONSTRAINT `sector_images_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sector_images
-- ----------------------------

-- ----------------------------
-- Table structure for sectors
-- ----------------------------
DROP TABLE IF EXISTS `sectors`;
CREATE TABLE `sectors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sectors
-- ----------------------------

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_file` tinyint NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------

-- ----------------------------
-- Table structure for uptd_sectors
-- ----------------------------
DROP TABLE IF EXISTS `uptd_sectors`;
CREATE TABLE `uptd_sectors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sector_job` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uptd_sectors
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', NULL, '$2y$10$ESPLx.wz.1OthFnASarIROuBB2pmlC3mpmAJnuma3jtL3emq.8fNm', 'admin', '2026-02-24 11:34:18', '2026-02-24 11:34:18');

-- ----------------------------
-- Table structure for vision_settings
-- ----------------------------
DROP TABLE IF EXISTS `vision_settings`;
CREATE TABLE `vision_settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vision` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `motto` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vision_settings
-- ----------------------------

-- ----------------------------
-- Table structure for visits
-- ----------------------------
DROP TABLE IF EXISTS `visits`;
CREATE TABLE `visits`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of visits
-- ----------------------------
INSERT INTO `visits` VALUES (1, NULL, '127.0.0.1', '2026-02-24 11:33:14', '2026-02-24 11:33:14');
INSERT INTO `visits` VALUES (2, NULL, '127.0.0.1', '2026-02-24 20:59:28', '2026-02-24 20:59:28');
INSERT INTO `visits` VALUES (3, NULL, '127.0.0.1', '2026-02-25 13:03:28', '2026-02-25 13:03:28');
INSERT INTO `visits` VALUES (4, NULL, '127.0.0.1', '2026-02-25 22:41:26', '2026-02-25 22:41:26');
INSERT INTO `visits` VALUES (5, NULL, '127.0.0.1', '2026-03-08 22:09:34', '2026-03-08 22:09:34');
INSERT INTO `visits` VALUES (6, NULL, '127.0.0.1', '2026-03-09 22:24:53', '2026-03-09 22:24:53');
INSERT INTO `visits` VALUES (7, NULL, '127.0.0.1', '2026-03-12 20:40:30', '2026-03-12 20:40:30');
INSERT INTO `visits` VALUES (8, NULL, '127.0.0.1', '2026-03-14 23:18:53', '2026-03-14 23:18:53');
INSERT INTO `visits` VALUES (9, NULL, '127.0.0.1', '2026-03-15 12:16:30', '2026-03-15 12:16:30');

-- ----------------------------
-- Table structure for youtube_videos
-- ----------------------------
DROP TABLE IF EXISTS `youtube_videos`;
CREATE TABLE `youtube_videos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of youtube_videos
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
