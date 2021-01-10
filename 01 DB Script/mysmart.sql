/*
Navicat MySQL Data Transfer

Source Server         : MyLocal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mysmart

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-01-11 00:47:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `language_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_language_id_foreign` (`language_id`),
  CONSTRAINT `customers_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Ortneil', 'Kutama', '841006345183', '0734967682', 'pynesoft@gmail.com', '1984-10-08', '8', '2021-01-10 22:30:21', '2021-01-10 22:43:22');
INSERT INTO `customers` VALUES ('4', 'Lorrie', 'Kutama', '8301016245180', '0815558454', 'ortneil@pynesoft.co.za', '1983-01-01', '2', '2021-01-10 22:37:37', '2021-01-10 22:42:58');

-- ----------------------------
-- Table structure for `customer_interest`
-- ----------------------------
DROP TABLE IF EXISTS `customer_interest`;
CREATE TABLE `customer_interest` (
  `customer_id` bigint(20) unsigned NOT NULL,
  `interest_id` bigint(20) unsigned NOT NULL,
  KEY `customer_interest_customer_id_foreign` (`customer_id`),
  KEY `customer_interest_interest_id_foreign` (`interest_id`),
  CONSTRAINT `customer_interest_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_interest_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of customer_interest
-- ----------------------------
INSERT INTO `customer_interest` VALUES ('1', '1');
INSERT INTO `customer_interest` VALUES ('1', '3');
INSERT INTO `customer_interest` VALUES ('4', '2');
INSERT INTO `customer_interest` VALUES ('4', '4');

-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `interests`
-- ----------------------------
DROP TABLE IF EXISTS `interests`;
CREATE TABLE `interests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of interests
-- ----------------------------
INSERT INTO `interests` VALUES ('1', 'Music', null, null);
INSERT INTO `interests` VALUES ('2', 'Travelling', null, null);
INSERT INTO `interests` VALUES ('3', 'Shopping', null, null);
INSERT INTO `interests` VALUES ('4', 'Bike Ridding', null, null);

-- ----------------------------
-- Table structure for `languages`
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', 'English', null, null);
INSERT INTO `languages` VALUES ('2', 'Afrikaans', null, null);
INSERT INTO `languages` VALUES ('3', 'Sepedi', null, null);
INSERT INTO `languages` VALUES ('4', 'Southern Ndebele', null, null);
INSERT INTO `languages` VALUES ('5', 'Swazi', null, null);
INSERT INTO `languages` VALUES ('6', 'Tsonga', null, null);
INSERT INTO `languages` VALUES ('7', 'Tswana', null, null);
INSERT INTO `languages` VALUES ('8', 'Venda', null, null);
INSERT INTO `languages` VALUES ('9', 'Xhosa', null, null);
INSERT INTO `languages` VALUES ('10', 'Zulu', null, null);

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2021_01_10_133619_create_languages_table', '1');
INSERT INTO `migrations` VALUES ('5', '2021_01_10_133740_create_interests_table', '1');
INSERT INTO `migrations` VALUES ('6', '2021_01_10_134443_create_customers_table', '1');
INSERT INTO `migrations` VALUES ('7', '2021_01_10_141959_create_customer_interest_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'ortneil@gmail.com', null, '$2y$10$PUwCmVXB501mW5xAH.2FnOMS8wmaziAzcIi3yxh38TpITcocaL78y', 'ab6lg3i7ALJG96JFIMVE5gfWP02TL66jQKB609mP1ncEtWvCOchDLxeAd1yy', '2021-01-10 22:21:51', '2021-01-10 22:21:51');
