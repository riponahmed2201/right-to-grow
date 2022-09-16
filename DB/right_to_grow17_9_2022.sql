/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - right_to_grow
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`right_to_grow` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `right_to_grow`;

/*Table structure for table `category_titles` */

DROP TABLE IF EXISTS `category_titles`;

CREATE TABLE `category_titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_type_id` int(11) DEFAULT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category_titles` */

insert  into `category_titles`(`id`,`category_type_id`,`category_title`,`slug`,`description`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,1,'Own Source','own-source',NULL,NULL,NULL,'2022-08-26 12:58:27','2022-08-26'),
(2,1,'Salary/Allowance of officer and employee','salaryallowance-of-officer-and-employee',NULL,NULL,NULL,'2022-08-26 12:58:41','2022-08-26'),
(3,2,'1. General establishment/Institutional','1-general-establishmentinstitutional',NULL,NULL,NULL,'2022-08-26 12:59:45','2022-08-26'),
(4,2,'Kha. Salary/Allowance of officer and employee','kha-salaryallowance-of-officer-and-employee',NULL,NULL,NULL,'2022-08-26 12:59:58','2022-08-26'),
(5,3,'Grants (Development)','grants-development',NULL,NULL,NULL,'2022-08-26 13:00:35','2022-08-26'),
(6,3,'Income from other Government projects','income-from-other-government-projects',NULL,NULL,NULL,'2022-08-26 13:00:50','2022-08-26'),
(7,3,'Income from NGOs project','income-from-ngos-project',NULL,NULL,NULL,'2022-08-26 13:01:04','2022-08-26'),
(8,3,'Social Safety net program','social-safety-net-program',NULL,NULL,NULL,'2022-08-26 13:01:21','2022-08-26'),
(9,4,'1. Agriculture and Small Irrigation:','1-agriculture-and-small-irrigation',NULL,NULL,NULL,'2022-08-26 13:01:44','2022-08-26'),
(10,4,'2. Physical Infrastructure:','2-physical-infrastructure',NULL,NULL,NULL,'2022-08-26 13:02:01','2022-08-26'),
(11,4,'3. Socio Economic infrstructure:','3-socio-economic-infrstructure',NULL,NULL,NULL,'2022-08-26 13:02:17','2022-08-26'),
(12,4,'4. Service','4-service',NULL,NULL,NULL,'2022-08-26 13:02:30','2022-08-26'),
(13,4,'6. Poverty reduction : Social safetynet and institutional support','6-poverty-reduction-social-safetynet-and-institutional-support',NULL,NULL,NULL,'2022-08-26 13:02:47','2022-08-26');

/*Table structure for table `category_types` */

DROP TABLE IF EXISTS `category_types`;

CREATE TABLE `category_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category_types` */

insert  into `category_types`(`id`,`name`,`slug`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Part-1: revenue income account:','part-1-revenue-income-account',NULL,NULL,'2022-08-26 12:46:22','2022-08-26'),
(2,'Part-1: revenue Expenditure','part-1-revenue-expenditure',NULL,NULL,'2022-08-26 12:46:39','2022-08-26'),
(3,'Part-2: Development income account','part-2-development-income-account',NULL,NULL,'2022-08-26 12:46:53','2022-08-26'),
(4,'Part-2: Development Expenditure account','part-2-development-expenditure-account',NULL,NULL,'2022-08-26 12:47:12','2022-08-26');

/*Table structure for table `child_categories` */

DROP TABLE IF EXISTS `child_categories`;

CREATE TABLE `child_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `child_category_name` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `child_categories` */

insert  into `child_categories`(`id`,`parent_category_id`,`child_category_name`,`slug`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,19,'1. Installation of safe water facilities for distress and vulnerable communities.','1-installation-of-safe-water-facilities-for-distress-and-vulnerable-communities',NULL,NULL,'2022-08-26 19:35:25','2022-08-26 13:35:25'),
(2,19,'2. Establish handwashing facilities and menstrual hygiene management at Schools.','2-establish-handwashing-facilities-and-menstrual-hygiene-management-at-schools',NULL,NULL,'2022-08-26 13:17:29','2022-08-26 13:17:29');

/*Table structure for table `districts` */

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `districts` */

insert  into `districts`(`id`,`division_id`,`name`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,1,'Dhaka',NULL,NULL,'2022-08-29 19:53:22','2022-08-29 19:53:22');

/*Table structure for table `divisions` */

DROP TABLE IF EXISTS `divisions`;

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `divisions` */

insert  into `divisions`(`id`,`name`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Dhaka',NULL,NULL,'2022-08-29 19:53:07','2022-08-29 19:53:07');

/*Table structure for table `failed_jobs` */

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

/*Data for the table `failed_jobs` */

/*Table structure for table `financial_years` */

DROP TABLE IF EXISTS `financial_years`;

CREATE TABLE `financial_years` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `year_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `financial_years` */

insert  into `financial_years`(`id`,`year_name`,`slug`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'2021-2022','2021-2022',NULL,NULL,'2022-08-26 19:46:08','2022-08-26 19:46:08');

/*Table structure for table `form_kha_data_users_info` */

DROP TABLE IF EXISTS `form_kha_data_users_info`;

CREATE TABLE `form_kha_data_users_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `is_part_one_revenue_income_store` tinyint(4) DEFAULT 0,
  `is_part_one_revenue_expenditure_store` tinyint(4) DEFAULT 0,
  `is_part_two_development_income_store` tinyint(4) DEFAULT 0,
  `is_part_two_development_expenditure_store` tinyint(4) DEFAULT 0,
  `financial_year` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `form_kha_data_users_info` */

insert  into `form_kha_data_users_info`(`id`,`user_id`,`is_part_one_revenue_income_store`,`is_part_one_revenue_expenditure_store`,`is_part_two_development_income_store`,`is_part_two_development_expenditure_store`,`financial_year`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,1,1,1,1,1,'2021-2022',NULL,NULL,'2022-08-30 01:10:32',NULL),
(4,6,1,1,1,1,'2021-2022',NULL,NULL,'2022-08-30 03:48:43',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `parent_categories` */

DROP TABLE IF EXISTS `parent_categories`;

CREATE TABLE `parent_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title_id` int(11) DEFAULT NULL,
  `parent_category_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `parent_categories` */

insert  into `parent_categories`(`id`,`category_title_id`,`parent_category_name`,`slug`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,1,'Balance (in hand(<tk 500)','balance-in-handtk-500',NULL,NULL,'2022-08-26 13:04:36','2022-08-26'),
(2,1,'Balance (Bank)','balance-bank',NULL,NULL,'2022-08-26 13:04:51','2022-08-26'),
(3,1,'Building and Land (Household) tax','building-and-land-household-tax',NULL,NULL,'2022-08-26 13:05:10','2022-08-26'),
(4,1,'Building and Land (Household)pending tax','building-and-land-householdpending-tax',NULL,NULL,'2022-08-26 13:05:23','2022-08-26'),
(5,1,'Tax on Building construction and reconstruction','tax-on-building-construction-and-reconstruction',NULL,NULL,'2022-08-26 13:08:17','2022-08-26'),
(6,1,'Tax on Household land','tax-on-household-land',NULL,NULL,'2022-08-26 13:08:54','2022-08-26'),
(7,2,'Salary of UP Secretary','salary-of-up-secretary',NULL,NULL,'2022-08-26 13:09:12','2022-08-26'),
(8,2,'Salary of Assistant Accountant cum coputer operator','salary-of-assistant-accountant-cum-coputer-operator',NULL,NULL,'2022-08-26 13:09:27','2022-08-26'),
(9,2,'Salary of Village police','salary-of-village-police',NULL,NULL,'2022-08-26 13:09:38','2022-08-26'),
(10,3,'Ka. Allowance of Chairmen (Government part)','ka-allowance-of-chairmen-government-part',NULL,NULL,'2022-08-26 13:09:59','2022-08-26'),
(11,3,'Ka. Allowance of Chairmen (UP part)','ka-allowance-of-chairmen-up-part',NULL,NULL,'2022-08-26 13:10:11','2022-08-26'),
(12,3,'Ka. Allowance of Members (Government part)','ka-allowance-of-members-government-part',NULL,NULL,'2022-08-26 13:10:28','2022-08-26'),
(13,3,'Ka. Allowance of Members (UP part)','ka-allowance-of-members-up-part',NULL,NULL,'2022-08-26 13:10:50','2022-08-26'),
(14,4,'Kha. Salary of UP Secretary','kha-salary-of-up-secretary',NULL,NULL,'2022-08-26 13:11:10','2022-08-26'),
(15,4,'Kha. Salary of Assistant Accountant cum coputer operator','kha-salary-of-assistant-accountant-cum-coputer-operator',NULL,NULL,'2022-08-26 13:11:21','2022-08-26'),
(16,4,'Kha. Salary of Village police','kha-salary-of-village-police',NULL,NULL,'2022-08-26 13:11:33','2022-08-26'),
(17,4,'Kha.Other recurrent expenditure','khaother-recurrent-expenditure',NULL,NULL,'2022-08-26 13:11:46','2022-08-26'),
(18,4,'Ga. Other institutional expenditure','ga-other-institutional-expenditure',NULL,NULL,'2022-08-26 13:12:04','2022-08-26'),
(19,10,'Ga. Public Health:  (Rural Water supply system, Low cost Toilet installation, etc.)','ga-public-health-rural-water-supply-system-low-cost-toilet-installation-etc',NULL,NULL,'2022-08-26 13:16:51','2022-08-26'),
(20,5,'Upazila Parishad','upazila-parishad',NULL,NULL,'2022-08-29 18:03:01','2022-08-29'),
(21,5,'Hatbazar Lease','hatbazar-lease',NULL,NULL,'2022-08-29 18:03:32','2022-08-29'),
(22,5,'Revenue/ADP (General)','revenueadp-general',NULL,NULL,'2022-08-29 18:03:55','2022-08-29'),
(23,6,'UZGP','uzgp',NULL,NULL,'2022-08-29 18:04:23','2022-08-29'),
(24,6,'UPGP','upgp',NULL,NULL,'2022-08-29 18:04:41','2022-08-29'),
(25,8,'VGD','vgd',NULL,NULL,'2022-08-29 18:05:01','2022-08-29'),
(26,8,'VGF','vgf',NULL,NULL,'2022-08-29 18:05:19','2022-08-29');

/*Table structure for table `part_one_revenue_expenditure_accounts` */

DROP TABLE IF EXISTS `part_one_revenue_expenditure_accounts`;

CREATE TABLE `part_one_revenue_expenditure_accounts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `union_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_title_id` bigint(20) DEFAULT NULL,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `category_type_id` bigint(20) DEFAULT NULL,
  `financial_year` date DEFAULT NULL,
  `last_year_budget` double DEFAULT NULL,
  `current_year_budget` double DEFAULT NULL,
  `next_year_budget` double DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `part_one_revenue_expenditure_accounts` */

insert  into `part_one_revenue_expenditure_accounts`(`id`,`union_id`,`user_id`,`category_title_id`,`parent_category_id`,`category_type_id`,`financial_year`,`last_year_budget`,`current_year_budget`,`next_year_budget`,`submit_date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,NULL,6,3,10,2,NULL,352,36,46,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(2,NULL,6,3,11,2,NULL,35,436,46,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(3,NULL,6,3,12,2,NULL,346,436,4,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(4,NULL,6,3,13,2,NULL,47,47,47,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(5,NULL,6,4,14,2,NULL,4,45,437,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(6,NULL,6,4,15,2,NULL,436,34,34,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(7,NULL,6,4,16,2,NULL,346,34,437,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(8,NULL,6,4,17,2,NULL,46,437,47,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30'),
(9,NULL,6,4,18,2,NULL,437,347,437,'2022-08-29 21:40:30',NULL,NULL,'2022-08-29 21:40:30','2022-08-29 21:40:30');

/*Table structure for table `part_one_revenue_income_accounts` */

DROP TABLE IF EXISTS `part_one_revenue_income_accounts`;

CREATE TABLE `part_one_revenue_income_accounts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `union_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_title_id` bigint(20) DEFAULT NULL,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `category_type_id` bigint(20) DEFAULT NULL,
  `financial_year` date DEFAULT NULL,
  `last_year_budget` double DEFAULT NULL,
  `current_year_budget` double DEFAULT NULL,
  `next_year_budget` double DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

/*Data for the table `part_one_revenue_income_accounts` */

insert  into `part_one_revenue_income_accounts`(`id`,`union_id`,`user_id`,`category_title_id`,`parent_category_id`,`category_type_id`,`financial_year`,`last_year_budget`,`current_year_budget`,`next_year_budget`,`submit_date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,NULL,1,1,1,1,NULL,3534,36436,3633,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(2,NULL,1,1,2,1,NULL,4,457,347,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(3,NULL,1,1,3,1,NULL,373,347,347,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(4,NULL,1,1,4,1,NULL,437,347,347,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(5,NULL,1,1,5,1,NULL,347,347,347,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(6,NULL,1,1,6,1,NULL,47,47,437,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(7,NULL,1,2,7,1,NULL,4734,437,346346,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(8,NULL,1,2,8,1,NULL,3643,436,346,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(9,NULL,1,2,9,1,NULL,346,347,347,'2022-08-28 19:18:47',NULL,NULL,'2022-08-28 19:18:47','2022-08-28 19:18:47'),
(28,NULL,6,1,1,1,NULL,36436,36347,4747,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(29,NULL,6,1,2,1,NULL,36347,47547,47474,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(30,NULL,6,1,3,1,NULL,36347,47478,4747,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(31,NULL,6,1,4,1,NULL,3347,347,4747,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(32,NULL,6,1,5,1,NULL,3347,343743,37347,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(33,NULL,6,1,6,1,NULL,36437,36347,37347,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(34,NULL,6,2,7,1,NULL,34347,3347,347347,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(35,NULL,6,2,8,1,NULL,3634,437347,4737,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22'),
(36,NULL,6,2,9,1,NULL,3734,473,4373,'2022-08-29 19:58:22',NULL,NULL,'2022-08-29 19:58:22','2022-08-29 19:58:22');

/*Table structure for table `part_two_development_expenditure_accounts` */

DROP TABLE IF EXISTS `part_two_development_expenditure_accounts`;

CREATE TABLE `part_two_development_expenditure_accounts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `union_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_title_id` bigint(20) DEFAULT NULL,
  `child_category_id` bigint(20) DEFAULT NULL,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `category_type_id` bigint(20) DEFAULT NULL,
  `financial_year` date DEFAULT NULL,
  `last_year_budget` double DEFAULT NULL,
  `current_year_budget` double DEFAULT NULL,
  `next_year_budget` double DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `part_two_development_expenditure_accounts` */

insert  into `part_two_development_expenditure_accounts`(`id`,`union_id`,`user_id`,`category_title_id`,`child_category_id`,`parent_category_id`,`category_type_id`,`financial_year`,`last_year_budget`,`current_year_budget`,`next_year_budget`,`submit_date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(10,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:10:32',NULL,NULL,'2022-08-29 19:10:32','2022-08-29 19:10:32'),
(11,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:10:58',NULL,NULL,'2022-08-29 19:10:58','2022-08-29 19:10:58'),
(12,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:11:38',NULL,NULL,'2022-08-29 19:11:38','2022-08-29 19:11:38'),
(13,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:13:32',NULL,NULL,'2022-08-29 19:13:32','2022-08-29 19:13:32'),
(14,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:14:22',NULL,NULL,'2022-08-29 19:14:22','2022-08-29 19:14:22'),
(15,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:15:03',NULL,NULL,'2022-08-29 19:15:03','2022-08-29 19:15:03'),
(16,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:15:23',NULL,NULL,'2022-08-29 19:15:23','2022-08-29 19:15:23'),
(17,NULL,1,10,NULL,19,4,NULL,NULL,NULL,NULL,'2022-08-29 19:15:45',NULL,NULL,'2022-08-29 19:15:45','2022-08-29 19:15:45'),
(18,NULL,1,10,1,19,4,NULL,23523,326326,32632,'2022-08-29 19:18:36',NULL,NULL,'2022-08-29 19:18:36','2022-08-29 19:18:36'),
(19,NULL,1,10,2,19,4,NULL,326,362,362,'2022-08-29 19:18:36',NULL,NULL,'2022-08-29 19:18:36','2022-08-29 19:18:36'),
(20,NULL,6,10,1,19,4,NULL,363,437,47,'2022-08-29 21:48:43',NULL,NULL,'2022-08-29 21:48:43','2022-08-29 21:48:43'),
(21,NULL,6,10,2,19,4,NULL,437,47,47,'2022-08-29 21:48:43',NULL,NULL,'2022-08-29 21:48:43','2022-08-29 21:48:43');

/*Table structure for table `part_two_development_expenditure_child_category_accounts` */

DROP TABLE IF EXISTS `part_two_development_expenditure_child_category_accounts`;

CREATE TABLE `part_two_development_expenditure_child_category_accounts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `union_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `child_category_id` bigint(20) DEFAULT NULL,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `category_type_id` bigint(20) DEFAULT NULL,
  `financial_year` date DEFAULT NULL,
  `last_year_budget` double DEFAULT NULL,
  `current_year_budget` double DEFAULT NULL,
  `next_year_budget` double DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `part_two_development_expenditure_child_category_accounts` */

insert  into `part_two_development_expenditure_child_category_accounts`(`id`,`union_id`,`user_id`,`child_category_id`,`parent_category_id`,`category_type_id`,`financial_year`,`last_year_budget`,`current_year_budget`,`next_year_budget`,`submit_date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(10,NULL,NULL,1,19,4,NULL,235325,35235,32623,'2022-08-29 19:11:38',NULL,NULL,'2022-08-29 19:11:38','2022-08-29 19:11:38'),
(11,NULL,NULL,1,1,4,NULL,2,3,3,'2022-08-29 19:14:22',NULL,NULL,'2022-08-29 19:14:22','2022-08-29 19:14:22'),
(12,NULL,NULL,1,19,4,NULL,235325,35235,32623,'2022-08-29 19:15:45',NULL,NULL,'2022-08-29 19:15:45','2022-08-29 19:15:45');

/*Table structure for table `part_two_development_income_accounts` */

DROP TABLE IF EXISTS `part_two_development_income_accounts`;

CREATE TABLE `part_two_development_income_accounts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `union_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_title_id` bigint(20) DEFAULT NULL,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `category_type_id` bigint(20) DEFAULT NULL,
  `financial_year` date DEFAULT NULL,
  `last_year_budget` double DEFAULT NULL,
  `current_year_budget` double DEFAULT NULL,
  `next_year_budget` double DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `part_two_development_income_accounts` */

insert  into `part_two_development_income_accounts`(`id`,`union_id`,`user_id`,`category_title_id`,`parent_category_id`,`category_type_id`,`financial_year`,`last_year_budget`,`current_year_budget`,`next_year_budget`,`submit_date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(10,NULL,1,5,20,3,NULL,46437,4747,47547,'2022-08-29 18:15:25',NULL,NULL,'2022-08-29 18:15:25','2022-08-29 18:15:25'),
(11,NULL,1,5,21,3,NULL,34347,34747,43747,'2022-08-29 18:15:25',NULL,NULL,'2022-08-29 18:15:25','2022-08-29 18:15:25'),
(12,NULL,1,5,22,3,NULL,34634,34747,47437,'2022-08-29 18:15:25',NULL,NULL,'2022-08-29 18:15:25','2022-08-29 18:15:25'),
(13,NULL,1,6,23,3,NULL,36347,437457,43747,'2022-08-29 18:15:25',NULL,NULL,'2022-08-29 18:15:25','2022-08-29 18:15:25'),
(14,NULL,1,6,24,3,NULL,346347,34747,347347,'2022-08-29 18:15:25',NULL,NULL,'2022-08-29 18:15:25','2022-08-29 18:15:25'),
(15,NULL,1,8,25,3,NULL,34743,474,347,'2022-08-29 18:15:25',NULL,NULL,'2022-08-29 18:15:25','2022-08-29 18:15:25'),
(16,NULL,1,8,26,3,NULL,343,3473,3347,'2022-08-29 18:15:25',NULL,NULL,'2022-08-29 18:15:25','2022-08-29 18:15:25'),
(17,NULL,6,5,20,3,NULL,463,34734,347,'2022-08-29 21:45:52',NULL,NULL,'2022-08-29 21:45:52','2022-08-29 21:45:52'),
(18,NULL,6,5,21,3,NULL,346,347,347,'2022-08-29 21:45:52',NULL,NULL,'2022-08-29 21:45:52','2022-08-29 21:45:52'),
(19,NULL,6,5,22,3,NULL,346,347,437,'2022-08-29 21:45:52',NULL,NULL,'2022-08-29 21:45:52','2022-08-29 21:45:52'),
(20,NULL,6,6,23,3,NULL,347,437,437,'2022-08-29 21:45:52',NULL,NULL,'2022-08-29 21:45:52','2022-08-29 21:45:52'),
(21,NULL,6,6,24,3,NULL,437,47,47,'2022-08-29 21:45:52',NULL,NULL,'2022-08-29 21:45:52','2022-08-29 21:45:52'),
(22,NULL,6,8,25,3,NULL,47,457,47,'2022-08-29 21:45:52',NULL,NULL,'2022-08-29 21:45:52','2022-08-29 21:45:52'),
(23,NULL,6,8,26,3,NULL,347,347,347,'2022-08-29 21:45:52',NULL,NULL,'2022-08-29 21:45:52','2022-08-29 21:45:52');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `unions` */

DROP TABLE IF EXISTS `unions`;

CREATE TABLE `unions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upazila_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `unions` */

insert  into `unions`(`id`,`upazila_id`,`name`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,1,'MIrpur Union',NULL,NULL,'2022-08-29 19:53:53','2022-08-29');

/*Table structure for table `upazilas` */

DROP TABLE IF EXISTS `upazilas`;

CREATE TABLE `upazilas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `upazilas` */

insert  into `upazilas`(`id`,`district_id`,`name`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,1,'Mirpur',NULL,NULL,'2022-08-29 19:53:35','2022-08-29 19:53:35');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `union_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`designation`,`phone`,`division_id`,`district_id`,`upazila_id`,`union_id`,`email`,`role`,`role_id`,`photo`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'MD.RIPAN MIA','Software Engineer','01746693553',1,1,1,1,'riponahmed2201@gmail.com','user',1,'d68616e5d0f699d81032bf8b17e6246b.jpeg',NULL,'$2y$10$4a4kX5aHPiNKAVxRI5ADn.O3ejK.tuyRE49K0TUK.yqnz263Gfmo6',NULL,'2022-08-24 18:54:50','2022-08-24 18:54:50'),
(2,'Admin','Software Engineer','01746693552',1,1,1,1,'admin@gmail.com','admin',2,'d68616e5d0f699d81032bf8b17e6246b.jpeg',NULL,'$2y$10$RGZKrPv73fNeWOL/Sj3AoOh9ngukYvZp8Iz5YuSW.3.442GRXLA6.',NULL,'2022-08-24 19:30:29','2022-08-24 19:30:29'),
(6,'Test Name','Software Engineer','01682118077',1,1,1,1,'test@gmail.com','user',1,'7a7c67e61d7904464ef7cdac9b64274f.png',NULL,'$2y$10$0U.Lkqxl7mbLzyJtzlxR.O1nfaVBhURmc8vGAcrbeUZ/m9obsLudq',NULL,'2022-08-29 19:55:28','2022-08-29 19:55:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
