-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 10:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liquor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_balance` double DEFAULT NULL,
  `total_balance` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_no`, `name`, `initial_balance`, `total_balance`, `note`, `is_default`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '11111', 'Sales Account', 1000, 1000, 'this is first account', 0, 0, '2018-12-18 14:58:02', '2022-07-16 07:53:55'),
(3, '21211', 'Sa', 0, 0, '', 0, 0, '2018-12-18 14:58:56', '2022-07-16 07:54:06'),
(5, '67665677', 'Ventas', 1000, 1000, NULL, 1, 1, '2022-07-16 07:53:28', '2022-07-16 07:53:44'),
(6, '76344547', 'Compras', 1000, 1000, NULL, NULL, 1, '2022-07-16 07:54:36', '2022-07-16 07:54:36'),
(7, '696577665', 'Gastos', 1000, 1000, NULL, NULL, 1, '2022-07-16 07:54:55', '2022-07-16 07:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` double NOT NULL,
  `item` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adjustments`
--

INSERT INTO `adjustments` (`id`, `reference_no`, `warehouse_id`, `document`, `total_qty`, `item`, `note`, `created_at`, `updated_at`) VALUES
(1, 'adr-20220731-101908', 1, NULL, 1, 1, NULL, '2022-07-31 15:19:08', '2022-07-31 15:19:08'),
(2, 'adr-20221111-015939', 2, NULL, 1, 1, NULL, '2022-11-11 11:59:39', '2022-11-11 11:59:39'),
(3, 'adr-20221111-020613', 2, NULL, 1, 1, NULL, '2022-11-11 12:06:13', '2022-11-11 12:06:13'),
(4, 'adr-20221111-021835', 2, NULL, 19, 1, NULL, '2022-11-11 12:18:35', '2022-11-11 12:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checkin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE `billers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billers`
--

INSERT INTO `billers` (`id`, `name`, `image`, `company_name`, `vat_number`, `email`, `phone_number`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Đức Toàn', NULL, 'AnToanHome', 'Toàn', 'hero70411@gmail.com', '0904422959', '58 Tố Hữu', 'Quận Nam Từ Liêm', 'Hà Nội', '12015', 'Vietnam', 0, '2022-07-31 12:39:20', '2022-10-29 11:42:23'),
(2, 'Duncan', NULL, 'Main Bar', NULL, 'duncan@duncan.com', '12345678', 'Area 23', 'Lilongwe', NULL, NULL, 'Malawi', 1, '2022-10-29 11:42:14', '2022-12-03 11:51:39'),
(3, 'Matilda', NULL, 'Front Bar', NULL, 'matilda@zamowa.com', '0994455443', 'LL Kawale', 'Lilongwe', NULL, NULL, 'Malawi', 1, '2022-12-03 12:01:09', '2022-12-03 12:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '20220731114103.jpg', 0, '2022-07-31 12:14:43', '2022-10-29 11:18:32'),
(2, 'Carlsberg', NULL, 1, '2022-10-29 11:18:25', '2022-10-29 11:18:25'),
(3, 'Castel', NULL, 1, '2022-10-29 11:18:43', '2022-10-29 11:18:43'),
(4, 'Heiniken', NULL, 1, '2022-10-29 11:18:52', '2022-10-29 11:18:52'),
(5, 'Castle', NULL, 1, '2022-10-29 11:19:13', '2022-10-29 11:19:13'),
(6, 'Jameson', NULL, 1, '2022-12-03 10:55:44', '2022-12-03 10:55:44'),
(7, 'Four Cousins', NULL, 1, '2022-12-03 10:55:55', '2022-12-03 10:55:55'),
(8, 'Hunters', NULL, 1, '2022-12-03 11:06:19', '2022-12-03 11:06:19'),
(9, 'Budweiser', NULL, 1, '2022-12-03 11:13:40', '2022-12-03 11:13:40'),
(10, 'Mller', NULL, 1, '2022-12-03 11:13:47', '2022-12-03 11:13:47'),
(11, 'Windhoek', NULL, 1, '2022-12-03 11:14:14', '2022-12-03 11:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `cash_registers`
--

CREATE TABLE `cash_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cash_in_hand` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_registers`
--

INSERT INTO `cash_registers` (`id`, `cash_in_hand`, `user_id`, `warehouse_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 2, 0, '2022-10-29 11:27:41', '2022-11-08 21:52:19'),
(2, 0, 1, 2, 0, '2022-10-29 11:27:51', '2022-11-10 11:47:55'),
(3, 1000, 1, 2, 0, '2022-10-29 11:28:07', '2022-11-10 11:47:47'),
(4, 4000, 1, 2, 0, '2022-11-10 11:48:12', '2022-11-10 11:48:24'),
(5, 4000, 1, 2, 0, '2022-11-10 13:44:56', '2022-11-17 10:51:02'),
(6, 0, 1, 2, 0, '2022-11-17 10:51:24', '2022-11-21 11:15:57'),
(7, 14000, 1, 2, 1, '2022-11-21 11:16:42', '2022-11-21 11:16:42'),
(8, 0, 37, 2, 0, '2022-12-03 12:01:39', '2022-12-05 07:57:25'),
(9, 6000, 37, 2, 0, '2022-12-05 07:58:06', '2022-12-05 08:02:37'),
(10, 3000, 37, 2, 0, '2022-12-05 08:03:23', '2022-12-05 08:07:37'),
(11, 8000, 37, 2, 0, '2022-12-05 08:07:57', '2022-12-05 08:11:41'),
(12, 4200, 37, 2, 1, '2022-12-05 08:11:57', '2022-12-05 08:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Whiskey', '20220731114240.jpg', NULL, 1, '2022-07-31 12:15:28', '2022-11-08 22:28:20'),
(2, 'Beer', NULL, NULL, 1, '2022-10-29 14:58:37', '2022-10-29 14:58:37'),
(3, 'Brandy', NULL, NULL, 1, '2022-11-08 22:26:26', '2022-11-08 22:26:26'),
(4, 'Gin', NULL, NULL, 1, '2022-11-08 22:26:37', '2022-11-08 22:26:37'),
(5, 'Whiskey', NULL, NULL, 0, '2022-11-08 22:27:05', '2022-11-08 22:28:07'),
(6, 'Cider', NULL, NULL, 1, '2022-12-03 10:53:01', '2022-12-03 10:53:01'),
(7, 'Vodka', NULL, NULL, 1, '2022-12-03 10:53:33', '2022-12-03 10:53:33'),
(8, 'Soft Drink', NULL, NULL, 1, '2022-12-03 10:53:53', '2022-12-03 10:53:53'),
(9, 'Energy Drink', NULL, NULL, 1, '2022-12-03 10:54:05', '2022-12-03 10:54:05'),
(10, 'Wine', NULL, NULL, 1, '2022-12-03 13:00:01', '2022-12-03 13:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `minimum_amount` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `exchange_rate`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', 1, '2020-11-01 12:22:58', '2020-11-01 12:34:55'),
(3, 'Euro', 'Euro', 0.85, '2022-07-16 07:12:27', '2022-07-31 09:18:25'),
(4, 'Kwacha', 'MWK', 1, '2022-10-29 15:14:37', '2022-10-29 15:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double DEFAULT NULL,
  `deposit` double DEFAULT NULL,
  `expense` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_group_id`, `user_id`, `name`, `company_name`, `email`, `phone_number`, `tax_no`, `address`, `city`, `state`, `postal_code`, `country`, `points`, `deposit`, `expense`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Bùi Đức Toàn', 'AnToanHome', 'hero70411@gmail.com', '0904422959', NULL, '58 Tố Hữu', 'Quận Nam Từ Liêm', 'Hà Nội', '12015', 'Vietnam', 30, NULL, NULL, 0, '2022-07-31 12:17:35', '2022-10-29 11:31:24'),
(2, 2, NULL, 'Regular', 'Roka Creative', 'ronkajawo@hotmail.com', '0994171710', NULL, 'Area 5', 'Lilongwe', 'Central Region', '265', 'Malawi', NULL, NULL, NULL, 1, '2022-10-29 11:36:37', '2022-10-29 11:36:37'),
(3, 2, NULL, 'John Doe', NULL, 'johndoe@inde.com', '9971827726', NULL, 'Area 5', 'Lilongwe', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-10-29 12:58:34', '2022-10-29 12:58:34'),
(4, 3, NULL, 'Walk In', NULL, 'walkin@zamowa.com', '12345678', NULL, 'Lilongwe', 'Lilongwe', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-11-08 16:52:07', '2022-11-08 16:52:07'),
(5, 2, NULL, 'Ron Kajawo', NULL, 'ronkajawo@hotmail.com', '09941717198', NULL, 'Area 5', 'Lilongwe', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-11-10 20:14:07', '2022-11-10 20:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `name`, `percentage`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Vip', '-10', 0, '2022-07-31 12:16:54', '2022-10-29 11:33:04'),
(2, 'Regular', '0', 1, '2022-10-29 11:32:35', '2022-11-10 19:59:46'),
(3, 'Walk In', '0', 1, '2022-10-29 11:32:49', '2022-11-10 19:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recieved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicable_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_list` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` date NOT NULL,
  `valid_till` date NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `minimum_qty` double NOT NULL,
  `maximum_qty` double NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `applicable_for`, `product_list`, `valid_from`, `valid_till`, `type`, `value`, `minimum_qty`, `maximum_qty`, `days`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'FlashSale1', 'All', NULL, '2022-08-01', '2022-08-03', 'percentage', 1, 1, 10, 'Mon,Tue,Wed,Thu,Fri,Sat,Sun', 1, '2022-07-31 16:11:21', '2022-07-31 16:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `discount_plans`
--

CREATE TABLE `discount_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_plans`
--

INSERT INTO `discount_plans` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'FlashSale', 1, '2022-07-31 16:08:54', '2022-07-31 16:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `discount_plan_customers`
--

CREATE TABLE `discount_plan_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_plan_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_plan_customers`
--

INSERT INTO `discount_plan_customers` (`id`, `discount_plan_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-07-31 16:08:54', '2022-07-31 16:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `discount_plan_discounts`
--

CREATE TABLE `discount_plan_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` int(11) NOT NULL,
  `discount_plan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_plan_discounts`
--

INSERT INTO `discount_plan_discounts` (`id`, `discount_id`, `discount_plan_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-07-31 16:11:21', '2022-07-31 16:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `dso_alerts`
--

CREATE TABLE `dso_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `reference_no`, `expense_category_id`, `warehouse_id`, `account_id`, `user_id`, `cash_register_id`, `amount`, `note`, `created_at`, `updated_at`) VALUES
(1, 'er-20220731-075050', 1, 1, 5, 1, NULL, 100, NULL, '2022-07-31 12:50:50', '2022-07-31 12:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `code`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '23020428', 'Lắp đặt', 1, '2022-07-31 12:50:34', '2022-07-31 12:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_rtl` tinyint(1) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_access` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `developed_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_format` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `site_logo`, `is_rtl`, `currency`, `staff_access`, `date_format`, `developed_by`, `invoice_format`, `state`, `theme`, `created_at`, `updated_at`, `currency_position`) VALUES
(1, 'Zamowa', '20220716010951.png', 0, '4', 'own', 'd-m-Y', 'Roka Creative', 'standard', 1, 'default.css', '2018-07-06 18:13:11', '2022-11-11 12:29:21', 'prefix');

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `expense` double NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gift_cards`
--

INSERT INTO `gift_cards` (`id`, `card_no`, `amount`, `expense`, `customer_id`, `user_id`, `expired_date`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '0721283464761931', 1000, 0, 1, NULL, '2022-09-10', 1, 0, '2022-07-31 16:45:13', '2022-10-29 11:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `gift_card_recharges`
--

CREATE TABLE `gift_card_recharges` (
  `id` int(10) UNSIGNED NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrm_settings`
--

CREATE TABLE `hrm_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `checkin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hrm_settings`
--

INSERT INTO `hrm_settings` (`id`, `checkin`, `checkout`, `created_at`, `updated_at`) VALUES
(1, '9:00am', '6:00pm', '2019-01-02 14:20:08', '2022-07-16 07:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'en', '2018-07-08 10:59:17', '2019-12-25 05:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_17_060412_create_categories_table', 1),
(4, '2018_02_20_035727_create_brands_table', 1),
(5, '2018_02_25_100635_create_suppliers_table', 1),
(6, '2018_02_27_101619_create_warehouse_table', 1),
(7, '2018_03_03_040448_create_units_table', 1),
(8, '2018_03_04_041317_create_taxes_table', 1),
(9, '2018_03_10_061915_create_customer_groups_table', 1),
(10, '2018_03_10_090534_create_customers_table', 1),
(11, '2018_03_11_095547_create_billers_table', 1),
(12, '2018_04_05_054401_create_products_table', 1),
(13, '2018_04_06_133606_create_purchases_table', 1),
(14, '2018_04_06_154600_create_product_purchases_table', 1),
(15, '2018_04_06_154915_create_product_warhouse_table', 1),
(16, '2018_04_10_085927_create_sales_table', 1),
(17, '2018_04_10_090133_create_product_sales_table', 1),
(18, '2018_04_10_090254_create_payments_table', 1),
(19, '2018_04_10_090341_create_payment_with_cheque_table', 1),
(20, '2018_04_10_090509_create_payment_with_credit_card_table', 1),
(21, '2018_04_13_121436_create_quotation_table', 1),
(22, '2018_04_13_122324_create_product_quotation_table', 1),
(23, '2018_04_14_121802_create_transfers_table', 1),
(24, '2018_04_14_121913_create_product_transfer_table', 1),
(25, '2018_05_13_082847_add_payment_id_and_change_sale_id_to_payments_table', 2),
(26, '2018_05_13_090906_change_customer_id_to_payment_with_credit_card_table', 3),
(27, '2018_05_20_054532_create_adjustments_table', 4),
(28, '2018_05_20_054859_create_product_adjustments_table', 4),
(29, '2018_05_21_163419_create_returns_table', 5),
(30, '2018_05_21_163443_create_product_returns_table', 5),
(31, '2018_06_02_050905_create_roles_table', 6),
(32, '2018_06_02_073430_add_columns_to_users_table', 7),
(33, '2018_06_03_053738_create_permission_tables', 8),
(36, '2018_06_21_063736_create_pos_setting_table', 9),
(37, '2018_06_21_094155_add_user_id_to_sales_table', 10),
(38, '2018_06_21_101529_add_user_id_to_purchases_table', 11),
(39, '2018_06_21_103512_add_user_id_to_transfers_table', 12),
(40, '2018_06_23_061058_add_user_id_to_quotations_table', 13),
(41, '2018_06_23_082427_add_is_deleted_to_users_table', 14),
(42, '2018_06_25_043308_change_email_to_users_table', 15),
(43, '2018_07_06_115449_create_general_settings_table', 16),
(44, '2018_07_08_043944_create_languages_table', 17),
(45, '2018_07_11_102144_add_user_id_to_returns_table', 18),
(46, '2018_07_11_102334_add_user_id_to_payments_table', 18),
(47, '2018_07_22_130541_add_digital_to_products_table', 19),
(49, '2018_07_24_154250_create_deliveries_table', 20),
(50, '2018_08_16_053336_create_expense_categories_table', 21),
(51, '2018_08_17_115415_create_expenses_table', 22),
(55, '2018_08_18_050418_create_gift_cards_table', 23),
(56, '2018_08_19_063119_create_payment_with_gift_card_table', 24),
(57, '2018_08_25_042333_create_gift_card_recharges_table', 25),
(58, '2018_08_25_101354_add_deposit_expense_to_customers_table', 26),
(59, '2018_08_26_043801_create_deposits_table', 27),
(60, '2018_09_02_044042_add_keybord_active_to_pos_setting_table', 28),
(61, '2018_09_09_092713_create_payment_with_paypal_table', 29),
(62, '2018_09_10_051254_add_currency_to_general_settings_table', 30),
(63, '2018_10_22_084118_add_biller_and_store_id_to_users_table', 31),
(65, '2018_10_26_034927_create_coupons_table', 32),
(66, '2018_10_27_090857_add_coupon_to_sales_table', 33),
(67, '2018_11_07_070155_add_currency_position_to_general_settings_table', 34),
(68, '2018_11_19_094650_add_combo_to_products_table', 35),
(69, '2018_12_09_043712_create_accounts_table', 36),
(70, '2018_12_17_112253_add_is_default_to_accounts_table', 37),
(71, '2018_12_19_103941_add_account_id_to_payments_table', 38),
(72, '2018_12_20_065900_add_account_id_to_expenses_table', 39),
(73, '2018_12_20_082753_add_account_id_to_returns_table', 40),
(74, '2018_12_26_064330_create_return_purchases_table', 41),
(75, '2018_12_26_144210_create_purchase_product_return_table', 42),
(76, '2018_12_26_144708_create_purchase_product_return_table', 43),
(77, '2018_12_27_110018_create_departments_table', 44),
(78, '2018_12_30_054844_create_employees_table', 45),
(79, '2018_12_31_125210_create_payrolls_table', 46),
(80, '2018_12_31_150446_add_department_id_to_employees_table', 47),
(81, '2019_01_01_062708_add_user_id_to_expenses_table', 48),
(82, '2019_01_02_075644_create_hrm_settings_table', 49),
(83, '2019_01_02_090334_create_attendances_table', 50),
(84, '2019_01_27_160956_add_three_columns_to_general_settings_table', 51),
(85, '2019_02_15_183303_create_stock_counts_table', 52),
(86, '2019_02_17_101604_add_is_adjusted_to_stock_counts_table', 53),
(87, '2019_04_13_101707_add_tax_no_to_customers_table', 54),
(89, '2019_10_14_111455_create_holidays_table', 55),
(90, '2019_11_13_145619_add_is_variant_to_products_table', 56),
(91, '2019_11_13_150206_create_product_variants_table', 57),
(92, '2019_11_13_153828_create_variants_table', 57),
(93, '2019_11_25_134041_add_qty_to_product_variants_table', 58),
(94, '2019_11_25_134922_add_variant_id_to_product_purchases_table', 58),
(95, '2019_11_25_145341_add_variant_id_to_product_warehouse_table', 58),
(96, '2019_11_29_182201_add_variant_id_to_product_sales_table', 59),
(97, '2019_12_04_121311_add_variant_id_to_product_quotation_table', 60),
(98, '2019_12_05_123802_add_variant_id_to_product_transfer_table', 61),
(100, '2019_12_08_114954_add_variant_id_to_product_returns_table', 62),
(101, '2019_12_08_203146_add_variant_id_to_purchase_product_return_table', 63),
(102, '2020_02_28_103340_create_money_transfers_table', 64),
(103, '2020_07_01_193151_add_image_to_categories_table', 65),
(105, '2020_09_26_130426_add_user_id_to_deliveries_table', 66),
(107, '2020_10_11_125457_create_cash_registers_table', 67),
(108, '2020_10_13_155019_add_cash_register_id_to_sales_table', 68),
(109, '2020_10_13_172624_add_cash_register_id_to_returns_table', 69),
(110, '2020_10_17_212338_add_cash_register_id_to_payments_table', 70),
(111, '2020_10_18_124200_add_cash_register_id_to_expenses_table', 71),
(112, '2020_10_21_121632_add_developed_by_to_general_settings_table', 72),
(113, '2019_08_19_000000_create_failed_jobs_table', 73),
(114, '2020_10_30_135557_create_notifications_table', 73),
(115, '2020_11_01_044954_create_currencies_table', 74),
(116, '2020_11_01_140736_add_price_to_product_warehouse_table', 75),
(117, '2020_11_02_050633_add_is_diff_price_to_products_table', 76),
(118, '2020_11_09_055222_add_user_id_to_customers_table', 77),
(119, '2020_11_17_054806_add_invoice_format_to_general_settings_table', 78),
(120, '2021_02_10_074859_add_variant_id_to_product_adjustments_table', 79),
(121, '2021_03_07_093606_create_product_batches_table', 80),
(122, '2021_03_07_093759_add_product_batch_id_to_product_warehouse_table', 80),
(123, '2021_03_07_093900_add_product_batch_id_to_product_purchases_table', 80),
(124, '2021_03_11_132603_add_product_batch_id_to_product_sales_table', 81),
(127, '2021_03_25_125421_add_is_batch_to_products_table', 82),
(128, '2021_05_19_120127_add_product_batch_id_to_product_returns_table', 82),
(130, '2021_05_22_105611_add_product_batch_id_to_purchase_product_return_table', 83),
(131, '2021_05_23_124848_add_product_batch_id_to_product_transfer_table', 84),
(132, '2021_05_26_153106_add_product_batch_id_to_product_quotation_table', 85),
(133, '2021_06_08_213007_create_reward_point_settings_table', 86),
(134, '2021_06_16_104155_add_points_to_customers_table', 87),
(135, '2021_06_17_101057_add_used_points_to_payments_table', 88),
(136, '2021_07_06_132716_add_variant_list_to_products_table', 89),
(137, '2021_09_27_161141_add_is_imei_to_products_table', 90),
(138, '2021_09_28_170052_add_imei_number_to_product_warehouse_table', 91),
(139, '2021_09_28_170126_add_imei_number_to_product_purchases_table', 91),
(140, '2021_10_03_170652_add_imei_number_to_product_sales_table', 92),
(141, '2021_10_10_145214_add_imei_number_to_product_returns_table', 93),
(142, '2021_10_11_104504_add_imei_number_to_product_transfer_table', 94),
(143, '2021_10_12_160107_add_imei_number_to_purchase_product_return_table', 95),
(144, '2021_10_12_205146_add_is_rtl_to_general_settings_table', 96),
(145, '2021_10_23_142451_add_is_approve_to_payments_table', 97),
(146, '2022_01_13_191242_create_discount_plans_table', 97),
(147, '2022_01_14_174318_create_discount_plan_customers_table', 97),
(148, '2022_01_14_202439_create_discounts_table', 98),
(149, '2022_01_16_153506_create_discount_plan_discounts_table', 98),
(150, '2022_02_05_174210_add_order_discount_type_and_value_to_sales_table', 99),
(154, '2022_05_26_195506_add_daily_sale_objective_to_products_table', 100),
(155, '2022_05_28_104209_create_dso_alerts_table', 101),
(156, '2022_06_01_112100_add_is_embeded_to_products_table', 102);

-- --------------------------------------------------------

--
-- Table structure for table `money_transfers`
--

CREATE TABLE `money_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `used_points` double DEFAULT NULL,
  `change` double NOT NULL,
  `paying_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_reference`, `user_id`, `purchase_id`, `sale_id`, `cash_register_id`, `account_id`, `amount`, `used_points`, `change`, `paying_method`, `payment_note`, `created_at`, `updated_at`) VALUES
(1, 'ppr-20220731-073645', 1, 1, NULL, NULL, 5, 8300, NULL, 0, 'Cash', NULL, '2022-07-31 12:36:45', '2022-07-31 12:36:45'),
(3, 'spr-20220731-103409', 1, NULL, 2, NULL, 5, 1800, NULL, 0, 'Gift Card', NULL, '2022-07-31 15:34:09', '2022-07-31 15:34:09'),
(4, 'spr-20220731-103413', 1, NULL, 3, NULL, 5, 1800, NULL, 0, 'Gift Card', NULL, '2022-07-31 15:34:13', '2022-07-31 15:34:13'),
(6, 'spr-20221029-015205', 1, NULL, 6, 1, 5, 3600, NULL, 0, 'Cash', NULL, '2022-10-29 11:52:05', '2022-10-29 11:52:05'),
(7, 'spr-20221029-022806', 1, NULL, 7, 1, 5, 12600, NULL, 0, 'Cash', NULL, '2022-10-29 12:28:06', '2022-10-29 12:28:06'),
(8, 'spr-20221029-022847', 1, NULL, 8, 1, 5, 12600, NULL, 0, 'Paypal', NULL, '2022-10-29 12:28:47', '2022-10-29 12:28:47'),
(9, 'spr-20221029-022911', 1, NULL, 9, 1, 5, 12600, NULL, 0, 'Cash', NULL, '2022-10-29 12:29:11', '2022-10-29 12:29:11'),
(10, 'spr-20221029-023129', 1, NULL, 10, 1, 5, 9000, NULL, 0, 'Credit Card', NULL, '2022-10-29 12:31:29', '2022-10-29 12:31:29'),
(11, 'spr-20221029-025332', 1, NULL, 11, 1, 5, 3600, NULL, 1400, 'Cash', NULL, '2022-10-29 12:53:32', '2022-10-29 12:53:32'),
(13, 'spr-20221030-081534', 1, NULL, 18, 1, 5, 12600, NULL, 0, 'Paypal', NULL, '2022-10-30 06:15:34', '2022-10-30 06:15:34'),
(14, 'spr-20221108-072541', 1, NULL, 22, 1, 5, 1800, NULL, 0, 'Cash', NULL, '2022-11-08 17:25:41', '2022-11-08 17:25:41'),
(15, 'spr-20221108-072725', 1, NULL, 23, 1, 5, 1800, NULL, 0, 'Cash', NULL, '2022-11-08 17:27:25', '2022-11-08 17:27:25'),
(16, 'spr-20221108-082527', 1, NULL, 24, 1, 5, 7200, NULL, 0, 'Cash', NULL, '2022-11-08 18:25:27', '2022-11-08 18:25:27'),
(17, 'spr-20221108-090143', 1, NULL, 25, 1, 5, 23600, NULL, 0, 'Cash', NULL, '2022-11-08 19:01:43', '2022-11-08 19:01:43'),
(18, 'spr-20221108-092139', 1, NULL, 26, 1, 5, 21200, NULL, 0, 'Cash', NULL, '2022-11-08 19:21:39', '2022-11-08 19:21:39'),
(20, 'spr-20221110-010023', 1, NULL, 31, 2, 5, 2600, NULL, 0, 'Paypal', NULL, '2022-11-10 11:00:23', '2022-11-10 11:00:23'),
(21, 'spr-20221111-030635', 1, NULL, 35, 5, 5, 13800, NULL, 0, 'Cash', NULL, '2022-11-11 13:06:35', '2022-11-11 13:06:35'),
(22, 'spr-20221113-121621', 1, NULL, 39, 5, 5, 10400, NULL, 0, 'Cash', NULL, '2022-11-13 10:16:21', '2022-11-13 10:16:21'),
(23, 'spr-20221118-090924', 1, NULL, 40, 6, 5, 10400, NULL, 0, 'Cash', NULL, '2022-11-18 19:09:24', '2022-11-18 19:09:24'),
(24, 'spr-20221118-092201', 1, NULL, 41, 6, 5, 5800, NULL, 0, 'Cash', NULL, '2022-11-18 19:22:01', '2022-11-18 19:22:01'),
(25, 'spr-20221119-035737', 1, NULL, 42, 6, 5, 5100, NULL, 0, 'Cash', NULL, '2022-11-19 13:57:37', '2022-11-19 13:57:37'),
(26, 'spr-20221119-040559', 1, NULL, 43, 6, 5, 2200, NULL, 0, 'Cash', NULL, '2022-11-19 14:05:59', '2022-11-19 14:05:59'),
(27, 'spr-20221119-042406', 1, NULL, 44, 6, 5, 2000, NULL, 0, 'Cash', NULL, '2022-11-19 14:24:06', '2022-11-19 14:24:06'),
(28, 'spr-20221119-043113', 1, NULL, 45, 6, 5, 700, NULL, 0, 'Cash', NULL, '2022-11-19 14:31:13', '2022-11-19 14:31:13'),
(29, 'spr-20221119-043438', 1, NULL, 46, 6, 5, 2400, NULL, 0, 'Cash', NULL, '2022-11-19 14:34:38', '2022-11-19 14:34:38'),
(30, 'spr-20221119-045411', 1, NULL, 47, 6, 5, 1600, NULL, 0, 'Cash', NULL, '2022-11-19 14:54:11', '2022-11-19 14:54:11'),
(31, 'spr-20221119-045846', 1, NULL, 48, 6, 5, 2400, NULL, 0, 'Cash', NULL, '2022-11-19 14:58:46', '2022-11-19 14:58:46'),
(32, 'spr-20221119-050203', 1, NULL, 49, 6, 5, 3300, NULL, 0, 'Cash', NULL, '2022-11-19 15:02:03', '2022-11-19 15:02:03'),
(33, 'spr-20221119-051027', 1, NULL, 50, 6, 5, 4100, NULL, 0, 'Cash', NULL, '2022-11-19 15:10:27', '2022-11-19 15:10:27'),
(34, 'spr-20221120-104214', 1, NULL, 51, 6, 5, 4300, NULL, 0, 'Cash', NULL, '2022-11-20 08:42:14', '2022-11-20 08:42:14'),
(35, 'spr-20221120-105804', 1, NULL, 52, 6, 5, 8500, NULL, 0, 'Cash', NULL, '2022-11-20 08:58:04', '2022-11-20 08:58:04'),
(36, 'spr-20221120-120918', 1, NULL, 53, 6, 5, 4100, NULL, 0, 'Cash', NULL, '2022-11-20 10:09:18', '2022-11-20 10:09:18'),
(37, 'spr-20221120-015454', 1, NULL, 54, 6, 5, 3000, NULL, 0, 'Cash', NULL, '2022-11-20 11:54:54', '2022-11-20 11:54:54'),
(38, 'spr-20221120-044936', 1, NULL, 55, 6, 5, 1700, NULL, 0, 'Cash', NULL, '2022-11-20 14:49:36', '2022-11-20 14:49:36'),
(40, 'spr-20221203-011921', 1, NULL, 59, 7, 5, 5000, NULL, 0, 'Cheque', NULL, '2022-12-03 11:19:21', '2022-12-03 11:19:21'),
(41, 'spr-20221203-011953', 1, NULL, 60, 7, 5, 5000, NULL, 0, 'Cash', NULL, '2022-12-03 11:19:53', '2022-12-03 11:19:53'),
(42, 'spr-20221203-021139', 37, NULL, 61, 8, 5, 4700, NULL, 0, 'Cash', NULL, '2022-12-03 12:11:39', '2022-12-03 12:11:39'),
(43, 'spr-20221203-044459', 37, NULL, 62, 8, 5, 3300, NULL, 0, 'Cash', NULL, '2022-12-03 14:44:59', '2022-12-03 14:44:59'),
(44, 'spr-20221204-095701', 37, NULL, 63, 8, 5, 3400, NULL, 0, 'Cash', NULL, '2022-12-04 07:57:01', '2022-12-04 07:57:01'),
(45, 'spr-20221205-094726', 37, NULL, 64, 8, 5, 9400, NULL, 0, 'Cash', NULL, '2022-12-05 07:47:26', '2022-12-05 07:47:26'),
(46, 'spr-20221205-094728', 37, NULL, 65, 8, 5, 9400, NULL, 0, 'Cash', NULL, '2022-12-05 07:47:28', '2022-12-05 07:47:28'),
(47, 'spr-20221205-100438', 37, NULL, 70, 10, 5, 14200, NULL, 0, 'Cash', NULL, '2022-12-05 08:04:38', '2022-12-05 08:04:38'),
(48, 'spr-20221205-101258', 37, NULL, 71, 12, 5, 10900, NULL, 0, 'Cash', NULL, '2022-12-05 08:12:58', '2022-12-05 08:12:58'),
(49, 'spr-20221205-101536', 37, NULL, 72, 12, 5, 5300, NULL, 0, 'Cash', NULL, '2022-12-05 08:15:36', '2022-12-05 08:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_cheque`
--

CREATE TABLE `payment_with_cheque` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `cheque_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_credit_card`
--

CREATE TABLE `payment_with_credit_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_gift_card`
--

CREATE TABLE `payment_with_gift_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_with_paypal`
--

CREATE TABLE `payment_with_paypal` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paying_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'products-edit', 'web', '2018-06-03 13:00:09', '2018-06-03 13:00:09'),
(5, 'products-delete', 'web', '2018-06-04 10:54:22', '2018-06-04 10:54:22'),
(6, 'products-add', 'web', '2018-06-04 12:34:14', '2018-06-04 12:34:14'),
(7, 'products-index', 'web', '2018-06-04 15:34:27', '2018-06-04 15:34:27'),
(8, 'purchases-index', 'web', '2018-06-04 20:03:19', '2018-06-04 20:03:19'),
(9, 'purchases-add', 'web', '2018-06-04 20:12:25', '2018-06-04 20:12:25'),
(10, 'purchases-edit', 'web', '2018-06-04 21:47:36', '2018-06-04 21:47:36'),
(11, 'purchases-delete', 'web', '2018-06-04 21:47:36', '2018-06-04 21:47:36'),
(12, 'sales-index', 'web', '2018-06-04 22:49:08', '2018-06-04 22:49:08'),
(13, 'sales-add', 'web', '2018-06-04 22:49:52', '2018-06-04 22:49:52'),
(14, 'sales-edit', 'web', '2018-06-04 22:49:52', '2018-06-04 22:49:52'),
(15, 'sales-delete', 'web', '2018-06-04 22:49:53', '2018-06-04 22:49:53'),
(16, 'quotes-index', 'web', '2018-06-05 10:05:10', '2018-06-05 10:05:10'),
(17, 'quotes-add', 'web', '2018-06-05 10:05:10', '2018-06-05 10:05:10'),
(18, 'quotes-edit', 'web', '2018-06-05 10:05:10', '2018-06-05 10:05:10'),
(19, 'quotes-delete', 'web', '2018-06-05 10:05:10', '2018-06-05 10:05:10'),
(20, 'transfers-index', 'web', '2018-06-05 10:30:03', '2018-06-05 10:30:03'),
(21, 'transfers-add', 'web', '2018-06-05 10:30:03', '2018-06-05 10:30:03'),
(22, 'transfers-edit', 'web', '2018-06-05 10:30:03', '2018-06-05 10:30:03'),
(23, 'transfers-delete', 'web', '2018-06-05 10:30:03', '2018-06-05 10:30:03'),
(24, 'returns-index', 'web', '2018-06-05 10:50:24', '2018-06-05 10:50:24'),
(25, 'returns-add', 'web', '2018-06-05 10:50:24', '2018-06-05 10:50:24'),
(26, 'returns-edit', 'web', '2018-06-05 10:50:25', '2018-06-05 10:50:25'),
(27, 'returns-delete', 'web', '2018-06-05 10:50:25', '2018-06-05 10:50:25'),
(28, 'customers-index', 'web', '2018-06-05 11:15:54', '2018-06-05 11:15:54'),
(29, 'customers-add', 'web', '2018-06-05 11:15:55', '2018-06-05 11:15:55'),
(30, 'customers-edit', 'web', '2018-06-05 11:15:55', '2018-06-05 11:15:55'),
(31, 'customers-delete', 'web', '2018-06-05 11:15:55', '2018-06-05 11:15:55'),
(32, 'suppliers-index', 'web', '2018-06-05 11:40:12', '2018-06-05 11:40:12'),
(33, 'suppliers-add', 'web', '2018-06-05 11:40:12', '2018-06-05 11:40:12'),
(34, 'suppliers-edit', 'web', '2018-06-05 11:40:12', '2018-06-05 11:40:12'),
(35, 'suppliers-delete', 'web', '2018-06-05 11:40:12', '2018-06-05 11:40:12'),
(36, 'product-report', 'web', '2018-06-25 11:05:33', '2018-06-25 11:05:33'),
(37, 'purchase-report', 'web', '2018-06-25 11:24:56', '2018-06-25 11:24:56'),
(38, 'sale-report', 'web', '2018-06-25 11:33:13', '2018-06-25 11:33:13'),
(39, 'customer-report', 'web', '2018-06-25 11:36:51', '2018-06-25 11:36:51'),
(40, 'due-report', 'web', '2018-06-25 11:39:52', '2018-06-25 11:39:52'),
(41, 'users-index', 'web', '2018-06-25 12:00:10', '2018-06-25 12:00:10'),
(42, 'users-add', 'web', '2018-06-25 12:00:10', '2018-06-25 12:00:10'),
(43, 'users-edit', 'web', '2018-06-25 12:01:30', '2018-06-25 12:01:30'),
(44, 'users-delete', 'web', '2018-06-25 12:01:30', '2018-06-25 12:01:30'),
(45, 'profit-loss', 'web', '2018-07-15 09:50:05', '2018-07-15 09:50:05'),
(46, 'best-seller', 'web', '2018-07-15 10:01:38', '2018-07-15 10:01:38'),
(47, 'daily-sale', 'web', '2018-07-15 10:24:21', '2018-07-15 10:24:21'),
(48, 'monthly-sale', 'web', '2018-07-15 10:30:41', '2018-07-15 10:30:41'),
(49, 'daily-purchase', 'web', '2018-07-15 10:36:46', '2018-07-15 10:36:46'),
(50, 'monthly-purchase', 'web', '2018-07-15 10:48:17', '2018-07-15 10:48:17'),
(51, 'payment-report', 'web', '2018-07-15 11:10:41', '2018-07-15 11:10:41'),
(52, 'warehouse-stock-report', 'web', '2018-07-15 11:16:55', '2018-07-15 11:16:55'),
(53, 'product-qty-alert', 'web', '2018-07-15 11:33:21', '2018-07-15 11:33:21'),
(54, 'supplier-report', 'web', '2018-07-30 15:00:01', '2018-07-30 15:00:01'),
(55, 'expenses-index', 'web', '2018-09-05 13:07:10', '2018-09-05 13:07:10'),
(56, 'expenses-add', 'web', '2018-09-05 13:07:10', '2018-09-05 13:07:10'),
(57, 'expenses-edit', 'web', '2018-09-05 13:07:10', '2018-09-05 13:07:10'),
(58, 'expenses-delete', 'web', '2018-09-05 13:07:11', '2018-09-05 13:07:11'),
(59, 'general_setting', 'web', '2018-10-20 11:10:04', '2018-10-20 11:10:04'),
(60, 'mail_setting', 'web', '2018-10-20 11:10:04', '2018-10-20 11:10:04'),
(61, 'pos_setting', 'web', '2018-10-20 11:10:04', '2018-10-20 11:10:04'),
(62, 'hrm_setting', 'web', '2019-01-02 22:30:23', '2019-01-02 22:30:23'),
(63, 'purchase-return-index', 'web', '2019-01-03 09:45:14', '2019-01-03 09:45:14'),
(64, 'purchase-return-add', 'web', '2019-01-03 09:45:14', '2019-01-03 09:45:14'),
(65, 'purchase-return-edit', 'web', '2019-01-03 09:45:14', '2019-01-03 09:45:14'),
(66, 'purchase-return-delete', 'web', '2019-01-03 09:45:14', '2019-01-03 09:45:14'),
(67, 'account-index', 'web', '2019-01-03 10:06:13', '2019-01-03 10:06:13'),
(68, 'balance-sheet', 'web', '2019-01-03 10:06:14', '2019-01-03 10:06:14'),
(69, 'account-statement', 'web', '2019-01-03 10:06:14', '2019-01-03 10:06:14'),
(70, 'department', 'web', '2019-01-03 10:30:01', '2019-01-03 10:30:01'),
(71, 'attendance', 'web', '2019-01-03 10:30:01', '2019-01-03 10:30:01'),
(72, 'payroll', 'web', '2019-01-03 10:30:01', '2019-01-03 10:30:01'),
(73, 'employees-index', 'web', '2019-01-03 10:52:19', '2019-01-03 10:52:19'),
(74, 'employees-add', 'web', '2019-01-03 10:52:19', '2019-01-03 10:52:19'),
(75, 'employees-edit', 'web', '2019-01-03 10:52:19', '2019-01-03 10:52:19'),
(76, 'employees-delete', 'web', '2019-01-03 10:52:19', '2019-01-03 10:52:19'),
(77, 'user-report', 'web', '2019-01-16 18:48:18', '2019-01-16 18:48:18'),
(78, 'stock_count', 'web', '2019-02-17 22:32:01', '2019-02-17 22:32:01'),
(79, 'adjustment', 'web', '2019-02-17 22:32:02', '2019-02-17 22:32:02'),
(80, 'sms_setting', 'web', '2019-02-22 17:18:03', '2019-02-22 17:18:03'),
(81, 'create_sms', 'web', '2019-02-22 17:18:03', '2019-02-22 17:18:03'),
(82, 'print_barcode', 'web', '2019-03-07 17:02:19', '2019-03-07 17:02:19'),
(83, 'empty_database', 'web', '2019-03-07 17:02:19', '2019-03-07 17:02:19'),
(84, 'customer_group', 'web', '2019-03-07 17:37:15', '2019-03-07 17:37:15'),
(85, 'unit', 'web', '2019-03-07 17:37:15', '2019-03-07 17:37:15'),
(86, 'tax', 'web', '2019-03-07 17:37:15', '2019-03-07 17:37:15'),
(87, 'gift_card', 'web', '2019-03-07 18:29:38', '2019-03-07 18:29:38'),
(88, 'coupon', 'web', '2019-03-07 18:29:38', '2019-03-07 18:29:38'),
(89, 'holiday', 'web', '2019-10-19 20:57:15', '2019-10-19 20:57:15'),
(90, 'warehouse-report', 'web', '2019-10-22 18:00:23', '2019-10-22 18:00:23'),
(91, 'warehouse', 'web', '2020-02-26 18:47:32', '2020-02-26 18:47:32'),
(92, 'brand', 'web', '2020-02-26 18:59:59', '2020-02-26 18:59:59'),
(93, 'billers-index', 'web', '2020-02-26 19:11:15', '2020-02-26 19:11:15'),
(94, 'billers-add', 'web', '2020-02-26 19:11:15', '2020-02-26 19:11:15'),
(95, 'billers-edit', 'web', '2020-02-26 19:11:15', '2020-02-26 19:11:15'),
(96, 'billers-delete', 'web', '2020-02-26 19:11:15', '2020-02-26 19:11:15'),
(97, 'money-transfer', 'web', '2020-03-02 17:41:48', '2020-03-02 17:41:48'),
(98, 'category', 'web', '2020-07-14 00:13:16', '2020-07-14 00:13:16'),
(99, 'delivery', 'web', '2020-07-14 00:13:16', '2020-07-14 00:13:16'),
(100, 'send_notification', 'web', '2020-10-31 18:21:31', '2020-10-31 18:21:31'),
(101, 'today_sale', 'web', '2020-10-31 18:57:04', '2020-10-31 18:57:04'),
(102, 'today_profit', 'web', '2020-10-31 18:57:04', '2020-10-31 18:57:04'),
(103, 'currency', 'web', '2020-11-09 12:23:11', '2020-11-09 12:23:11'),
(104, 'backup_database', 'web', '2020-11-15 12:16:55', '2020-11-15 12:16:55'),
(105, 'reward_point_setting', 'web', '2021-06-27 16:34:42', '2021-06-27 16:34:42'),
(106, 'revenue_profit_summary', 'web', '2022-02-09 01:57:21', '2022-02-09 01:57:21'),
(107, 'cash_flow', 'web', '2022-02-09 01:57:22', '2022-02-09 01:57:22'),
(108, 'monthly_summary', 'web', '2022-02-09 01:57:22', '2022-02-09 01:57:22'),
(109, 'yearly_report', 'web', '2022-02-09 01:57:22', '2022-02-09 01:57:22'),
(110, 'discount_plan', 'web', '2022-02-16 21:12:26', '2022-02-16 21:12:26'),
(111, 'discount', 'web', '2022-02-16 21:12:38', '2022-02-16 21:12:38'),
(112, 'product-expiry-report', 'web', '2022-03-30 17:39:20', '2022-03-30 17:39:20'),
(113, 'purchase-payment-index', 'web', '2022-06-06 02:12:27', '2022-06-06 02:12:27'),
(114, 'purchase-payment-add', 'web', '2022-06-06 02:12:28', '2022-06-06 02:12:28'),
(115, 'purchase-payment-edit', 'web', '2022-06-06 02:12:28', '2022-06-06 02:12:28'),
(116, 'purchase-payment-delete', 'web', '2022-06-06 02:12:28', '2022-06-06 02:12:28'),
(117, 'sale-payment-index', 'web', '2022-06-06 02:12:28', '2022-06-06 02:12:28'),
(118, 'sale-payment-add', 'web', '2022-06-06 02:12:28', '2022-06-06 02:12:28'),
(119, 'sale-payment-edit', 'web', '2022-06-06 02:12:28', '2022-06-06 02:12:28'),
(120, 'sale-payment-delete', 'web', '2022-06-06 02:12:28', '2022-06-06 02:12:28'),
(121, 'all_notification', 'web', '2022-06-06 02:12:29', '2022-06-06 02:12:29'),
(122, 'sale-report-chart', 'web', '2022-06-06 02:12:29', '2022-06-06 02:12:29'),
(123, 'dso-report', 'web', '2022-06-06 02:12:29', '2022-06-06 02:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `pos_setting`
--

CREATE TABLE `pos_setting` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `product_number` int(11) NOT NULL,
  `keybord_active` tinyint(1) NOT NULL,
  `stripe_public_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_setting`
--

INSERT INTO `pos_setting` (`id`, `customer_id`, `warehouse_id`, `biller_id`, `product_number`, `keybord_active`, `stripe_public_key`, `stripe_secret_key`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 2, 6, 0, 'pk_test_ITN7KOYiIsHSCQ0UMRcgaYUB', 'sk_test_TtQQaawhEYRwa3mU9CzttrEy', '2018-09-02 15:17:04', '2022-12-03 10:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode_symbology` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `qty` double DEFAULT NULL,
  `alert_quantity` double DEFAULT NULL,
  `daily_sale_objective` double DEFAULT NULL,
  `promotion` tinyint(4) DEFAULT NULL,
  `promotion_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax_method` int(11) DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_embeded` tinyint(1) DEFAULT NULL,
  `is_variant` tinyint(1) DEFAULT NULL,
  `is_batch` tinyint(1) DEFAULT NULL,
  `is_diffPrice` tinyint(1) DEFAULT NULL,
  `is_imei` tinyint(1) DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `product_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_option` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `type`, `barcode_symbology`, `brand_id`, `category_id`, `unit_id`, `purchase_unit_id`, `sale_unit_id`, `cost`, `price`, `qty`, `alert_quantity`, `daily_sale_objective`, `promotion`, `promotion_price`, `starting_date`, `last_date`, `tax_id`, `tax_method`, `image`, `file`, `is_embeded`, `is_variant`, `is_batch`, `is_diffPrice`, `is_imei`, `featured`, `product_list`, `variant_list`, `qty_list`, `price_list`, `product_details`, `variant_option`, `variant_value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'iPhoneX', '99265514', 'standard', 'C128', 1, 1, 1, 1, 1, 800, 1000, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '202207311136192.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, '2022-07-31 12:18:28', '2022-11-08 22:28:33'),
(2, 'iPhone11', '05928605', 'standard', 'C128', 1, 1, 1, 1, 1, 400, 600, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zummXD2dvAtI.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, '2022-07-31 16:38:57', '2022-11-08 22:28:33'),
(3, 'Green', 'grn', 'standard', 'C128', 2, 2, 1, 1, 1, 700, 900, 6, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202211090730462.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-10-29 11:23:19', '2022-12-05 08:12:58'),
(4, 'kuche kuche', 'kuche-kuche', 'standard', 'C128', 3, 2, 1, 1, 1, 900, 700, 48, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202211090748342.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-10-29 11:24:10', '2022-12-05 08:15:36'),
(5, 'Special', '82292096', 'standard', 'C128', 2, 2, 1, 1, 1, 700, 1000, 0, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202211090749032.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-08 14:51:51', '2022-11-09 17:49:03'),
(6, 'Chill', '80652037', 'standard', 'C128', 2, 2, 1, 1, 1, 900, 1300, 28, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202211090749492.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-08 14:52:39', '2022-12-04 07:57:00'),
(7, 'Castel', '31995864', 'standard', 'C128', 3, 2, 1, 1, 1, 700, 900, 15, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202211090747312.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-08 14:53:31', '2022-12-05 08:15:36'),
(8, 'Castle Stout', '97186015', 'standard', 'C128', 5, 2, 1, 1, 1, 1200, 1700, 38, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202212031250282.jpg', NULL, 0, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-08 14:54:52', '2022-12-05 07:47:28'),
(9, 'Heiniken', '67901536', 'standard', 'C128', 4, 2, 1, 1, 1, 1200, 1700, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202211090745362.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-08 14:56:22', '2022-12-05 08:15:36'),
(10, 'Castle Light', '37254190', 'standard', 'C128', 5, 2, 1, 1, 1, 1200, 1700, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202212031249532.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-08 14:57:19', '2022-12-05 08:12:58'),
(11, 'Premier Brandy', '36391892', 'standard', 'C128', 3, 3, 1, 1, 1, 9000, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202212031249262.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-11 11:30:50', '2022-12-03 10:49:26'),
(12, 'Heiniken 6 Pack', '96644952', 'standard', 'C128', 4, 2, 1, 3, 3, 1200, 1700, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202212031251022.jpg', NULL, 0, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-11-11 11:44:27', '2022-12-03 10:51:02'),
(13, 'Jameson Whiskey', 'JME-00', 'standard', 'C128', 6, 1, 2, 2, 2, 1600, 2000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1670065527090whiskey.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-12-03 11:05:29', '2022-12-03 11:05:29'),
(14, 'Hunters Gold', 'hun-gold', 'standard', 'C128', 8, 6, 1, 1, 1, 1200, 1800, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1670065674536green bottle.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-12-03 11:07:57', '2022-12-03 11:07:57'),
(15, 'Hunters Dry', 'hun-dry', 'standard', 'C128', 8, 6, 1, 1, 1, 1200, 1800, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '202212030109302.jpg', NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-12-03 11:09:02', '2022-12-03 11:09:30'),
(16, 'Miller', 'Mill-00', 'standard', 'C128', 10, 6, 1, 1, 1, 1200, 2000, 17, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1670066124754brown bottle.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-12-03 11:15:26', '2022-12-05 08:15:36'),
(17, 'Budweiser', 'Bud-00', 'standard', 'C128', 9, 2, 1, 1, 1, 1400, 2400, 20, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1670066188815brown bottle.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-12-03 11:16:30', '2022-12-03 14:17:51'),
(18, 'Malawi Gin', 'Gin-00', 'standard', 'C128', 3, 4, 2, 2, 2, 1000, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1670072339304brandy.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-12-03 12:59:06', '2022-12-03 12:59:06'),
(19, 'Four Cousins Red', 'Fcousins-red', 'standard', 'C128', 7, 10, 4, 5, 5, 1000, 1500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1670072810141whiskey.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, NULL, 1, '2022-12-03 13:06:52', '2022-12-03 13:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_adjustments`
--

CREATE TABLE `product_adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_adjustments`
--

INSERT INTO `product_adjustments` (`id`, `adjustment_id`, `product_id`, `variant_id`, `qty`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, '+', '2022-07-31 15:19:08', '2022-07-31 15:19:08'),
(2, 2, 12, NULL, 1, '-', '2022-11-11 11:59:39', '2022-11-11 11:59:39'),
(3, 3, 11, NULL, 1, '-', '2022-11-11 12:06:13', '2022-11-11 12:06:13'),
(4, 4, 12, NULL, 19, '+', '2022-11-11 12:18:35', '2022-11-11 12:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_batches`
--

CREATE TABLE `product_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `batch_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_date` date NOT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double NOT NULL,
  `recieved` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `purchase_id`, `product_id`, `product_batch_id`, `variant_id`, `imei_number`, `qty`, `recieved`, `purchase_unit_id`, `net_unit_cost`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, 10, 10, 1, 800, 0, 0, 0, 8000, '2022-07-31 12:21:45', '2022-07-31 12:21:45'),
(2, 2, 3, NULL, NULL, NULL, 50, 50, 1, 700, 0, 0, 0, 35000, '2022-10-29 11:26:45', '2022-10-29 11:26:45'),
(3, 2, 4, NULL, NULL, NULL, 100, 100, 1, 700, 0, 0, 0, 70000, '2022-10-29 11:26:45', '2022-10-29 11:26:45'),
(4, 3, 9, NULL, NULL, NULL, 1, 1, 1, 1200, 0, 0, 0, 1200, '2022-11-08 15:05:14', '2022-11-08 15:05:14'),
(5, 3, 8, NULL, NULL, NULL, 1, 1, 1, 1200, 0, 0, 0, 1200, '2022-11-08 15:05:15', '2022-11-08 15:05:15'),
(6, 4, 8, NULL, NULL, NULL, 40, 40, 1, 1200, 0, 0, 0, 48000, '2022-11-08 15:06:36', '2022-11-08 15:06:36'),
(7, 4, 10, NULL, NULL, NULL, 40, 40, 1, 1200, 0, 0, 0, 48000, '2022-11-08 15:06:36', '2022-11-08 15:06:36'),
(8, 4, 9, NULL, NULL, NULL, 40, 40, 1, 1200, 0, 0, 0, 48000, '2022-11-08 15:06:36', '2022-11-08 15:06:36'),
(9, 4, 6, NULL, NULL, NULL, 40, 40, 1, 900, 0, 0, 0, 36000, '2022-11-08 15:06:36', '2022-11-08 15:06:36'),
(10, 5, 11, NULL, NULL, NULL, 1, 1, 1, 9000, 0, 0, 0, 9000, '2022-11-11 11:32:34', '2022-11-11 11:32:34'),
(11, 6, 12, NULL, NULL, NULL, 1, 1, 3, 36000, 0, 0, 0, 36000, '2022-11-11 11:46:35', '2022-11-11 11:46:35'),
(12, 7, 7, NULL, NULL, NULL, 20, 20, 1, 700, 0, 0, 0, 14000, '2022-12-03 14:17:51', '2022-12-03 14:17:51'),
(13, 7, 17, NULL, NULL, NULL, 20, 20, 1, 1400, 0, 0, 0, 28000, '2022-12-03 14:17:51', '2022-12-03 14:17:51'),
(14, 7, 16, NULL, NULL, NULL, 20, 20, 1, 1200, 0, 0, 0, 24000, '2022-12-03 14:17:51', '2022-12-03 14:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation`
--

CREATE TABLE `product_quotation` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_returns`
--

CREATE TABLE `product_returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_returns`
--

INSERT INTO `product_returns` (`id`, `return_id`, `product_id`, `product_batch_id`, `variant_id`, `imei_number`, `qty`, `sale_unit_id`, `net_unit_price`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-07-31 12:48:30', '2022-07-31 12:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double NOT NULL,
  `sale_unit_id` int(11) NOT NULL,
  `net_unit_price` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `sale_id`, `product_id`, `product_batch_id`, `variant_id`, `imei_number`, `qty`, `sale_unit_id`, `net_unit_price`, `discount`, `tax_rate`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(6, 6, 3, NULL, NULL, NULL, 2, 1, 1800, 0, 0, 0, 3600, '2022-10-29 11:52:05', '2022-10-29 11:52:05'),
(9, 8, 4, NULL, NULL, NULL, 5, 1, 1800, 0, 0, 0, 9000, '2022-10-29 12:28:47', '2022-10-29 12:28:47'),
(10, 8, 3, NULL, NULL, NULL, 2, 1, 1800, 0, 0, 0, 3600, '2022-10-29 12:28:47', '2022-10-29 12:28:47'),
(11, 9, 4, NULL, NULL, NULL, 5, 1, 1800, 0, 0, 0, 9000, '2022-10-29 12:29:11', '2022-10-29 12:29:11'),
(12, 9, 3, NULL, NULL, NULL, 2, 1, 1800, 0, 0, 0, 3600, '2022-10-29 12:29:11', '2022-10-29 12:29:11'),
(13, 10, 4, NULL, NULL, NULL, 2, 1, 1800, 0, 0, 0, 3600, '2022-10-29 12:31:29', '2022-10-29 12:31:29'),
(14, 10, 3, NULL, NULL, NULL, 3, 1, 1800, 0, 0, 0, 5400, '2022-10-29 12:31:29', '2022-10-29 12:31:29'),
(15, 11, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 12:53:32', '2022-10-29 12:53:32'),
(16, 11, 4, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 12:53:32', '2022-10-29 12:53:32'),
(17, 12, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 12:59:04', '2022-10-29 12:59:04'),
(18, 12, 4, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 12:59:04', '2022-10-29 12:59:04'),
(19, 13, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 12:59:16', '2022-10-29 12:59:16'),
(20, 13, 4, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 12:59:16', '2022-10-29 12:59:16'),
(21, 14, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 13:07:46', '2022-10-29 13:07:46'),
(22, 14, 4, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 13:07:46', '2022-10-29 13:07:46'),
(23, 15, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 13:09:19', '2022-10-29 13:09:19'),
(24, 15, 4, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-10-29 13:09:19', '2022-10-29 13:09:19'),
(29, 18, 4, NULL, NULL, NULL, 5, 1, 1800, 0, 0, 0, 9000, '2022-10-30 06:15:31', '2022-10-30 06:15:31'),
(30, 18, 3, NULL, NULL, NULL, 2, 1, 1800, 0, 0, 0, 3600, '2022-10-30 06:15:31', '2022-10-30 06:15:31'),
(31, 22, 4, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-11-08 17:25:41', '2022-11-08 17:25:41'),
(32, 23, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-11-08 17:27:25', '2022-11-08 17:27:25'),
(33, 24, 3, NULL, NULL, NULL, 4, 1, 1800, 0, 0, 0, 7200, '2022-11-08 18:25:27', '2022-11-08 18:25:27'),
(34, 25, 9, NULL, NULL, NULL, 3, 1, 3400, 0, 0, 0, 10200, '2022-11-08 19:01:43', '2022-11-08 19:01:43'),
(35, 25, 10, NULL, NULL, NULL, 1, 1, 3400, 0, 0, 0, 3400, '2022-11-08 19:01:43', '2022-11-08 19:01:43'),
(36, 25, 6, NULL, NULL, NULL, 1, 1, 2600, 0, 0, 0, 2600, '2022-11-08 19:01:43', '2022-11-08 19:01:43'),
(37, 25, 4, NULL, NULL, NULL, 4, 1, 1400, 0, 0, 0, 5600, '2022-11-08 19:01:43', '2022-11-08 19:01:43'),
(38, 25, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-11-08 19:01:43', '2022-11-08 19:01:43'),
(40, 26, 9, NULL, NULL, NULL, 2, 1, 3400, 0, 0, 0, 6800, '2022-11-08 19:21:38', '2022-11-08 19:24:08'),
(41, 26, 4, NULL, NULL, NULL, 1, 1, 1400, 0, 0, 0, 1400, '2022-11-08 19:21:38', '2022-11-08 19:24:08'),
(42, 26, 6, NULL, NULL, NULL, 1, 1, 2600, 0, 0, 0, 2600, '2022-11-08 19:21:38', '2022-11-08 19:24:08'),
(43, 26, 3, NULL, NULL, NULL, 2, 1, 1800, 0, 0, 0, 3600, '2022-11-08 19:21:39', '2022-11-08 19:24:08'),
(48, 28, 3, NULL, NULL, NULL, 1, 1, 1800, 0, 0, 0, 1800, '2022-11-09 21:33:11', '2022-11-09 21:33:11'),
(49, 28, 4, NULL, NULL, NULL, 2, 1, 1400, 0, 0, 0, 2800, '2022-11-09 21:33:11', '2022-11-09 21:33:11'),
(50, 28, 6, NULL, NULL, NULL, 2, 1, 2600, 0, 0, 0, 5200, '2022-11-09 21:33:11', '2022-11-09 21:33:11'),
(55, 31, 6, NULL, NULL, NULL, 1, 1, 2600, 0, 0, 0, 2600, '2022-11-10 11:00:21', '2022-11-10 11:00:21'),
(64, 34, 9, NULL, NULL, NULL, 3, 1, 1700, 0, 0, 0, 5100, '2022-11-11 12:23:03', '2022-11-11 12:23:03'),
(65, 35, 10, NULL, NULL, NULL, 1, 1, 3400, 0, 0, 0, 3400, '2022-11-11 13:06:35', '2022-11-11 13:06:35'),
(66, 35, 9, NULL, NULL, NULL, 2, 1, 3400, 0, 0, 0, 6800, '2022-11-11 13:06:35', '2022-11-11 13:06:35'),
(67, 35, 3, NULL, NULL, NULL, 2, 1, 1800, 0, 0, 0, 3600, '2022-11-11 13:06:35', '2022-11-11 13:06:35'),
(68, 36, 4, NULL, NULL, NULL, 2, 1, 700, 0, 0, 0, 1400, '2022-11-11 14:54:12', '2022-11-11 14:54:12'),
(69, 36, 6, NULL, NULL, NULL, 4, 1, 1300, 0, 0, 0, 5200, '2022-11-11 14:54:12', '2022-11-11 14:54:12'),
(76, 39, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-13 10:16:20', '2022-11-13 10:16:20'),
(77, 39, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 4200, '2022-11-13 10:16:20', '2022-11-13 10:16:20'),
(78, 39, 3, NULL, NULL, NULL, 6, 1, 900, 0, 0, 0, 4500, '2022-11-13 10:16:20', '2022-11-13 10:16:20'),
(79, 40, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-18 19:09:22', '2022-11-18 19:09:22'),
(80, 40, 4, NULL, NULL, NULL, 6, 1, 700, 0, 0, 0, 4200, '2022-11-18 19:09:22', '2022-11-18 19:09:22'),
(81, 40, 3, NULL, NULL, NULL, 5, 1, 900, 0, 0, 0, 4500, '2022-11-18 19:09:22', '2022-11-18 19:09:22'),
(82, 41, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-18 19:22:01', '2022-11-18 19:22:01'),
(83, 41, 10, NULL, NULL, NULL, 3, 1, 1700, 0, 0, 0, 5100, '2022-11-18 19:22:01', '2022-11-18 19:22:01'),
(84, 42, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-19 13:57:37', '2022-11-19 13:57:37'),
(85, 42, 10, NULL, NULL, NULL, 2, 1, 1700, 0, 0, 0, 3400, '2022-11-19 13:57:37', '2022-11-19 13:57:37'),
(86, 43, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-11-19 14:05:59', '2022-11-19 14:05:59'),
(87, 43, 6, NULL, NULL, NULL, 1, 1, 1300, 0, 0, 0, 1300, '2022-11-19 14:05:59', '2022-11-19 14:05:59'),
(88, 44, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-19 14:24:06', '2022-11-19 14:24:06'),
(89, 44, 6, NULL, NULL, NULL, 1, 1, 1300, 0, 0, 0, 1300, '2022-11-19 14:24:06', '2022-11-19 14:24:06'),
(90, 45, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-19 14:31:13', '2022-11-19 14:31:13'),
(91, 46, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-19 14:34:38', '2022-11-19 14:34:38'),
(92, 46, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-19 14:34:38', '2022-11-19 14:34:38'),
(93, 47, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-19 14:54:11', '2022-11-19 14:54:11'),
(94, 47, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-11-19 14:54:11', '2022-11-19 14:54:11'),
(95, 48, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-19 14:58:46', '2022-11-19 14:58:46'),
(96, 48, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-19 14:58:46', '2022-11-19 14:58:46'),
(97, 49, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-19 15:02:03', '2022-11-19 15:02:03'),
(98, 49, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-11-19 15:02:03', '2022-11-19 15:02:03'),
(99, 49, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-19 15:02:03', '2022-11-19 15:02:03'),
(100, 50, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-19 15:10:27', '2022-11-19 15:10:27'),
(101, 50, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-19 15:10:27', '2022-11-19 15:10:27'),
(102, 50, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-19 15:10:27', '2022-11-19 15:10:27'),
(103, 51, 10, NULL, NULL, NULL, 2, 1, 1700, 0, 0, 0, 3400, '2022-11-20 08:42:13', '2022-11-20 08:42:13'),
(104, 51, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-11-20 08:42:13', '2022-11-20 08:42:13'),
(105, 52, 9, NULL, NULL, NULL, 4, 1, 1700, 0, 0, 0, 6800, '2022-11-20 08:58:04', '2022-11-20 08:58:04'),
(106, 52, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-20 08:58:04', '2022-11-20 08:58:04'),
(107, 53, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-20 10:09:18', '2022-11-20 10:09:18'),
(108, 53, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-20 10:09:18', '2022-11-20 10:09:18'),
(109, 53, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-20 10:09:18', '2022-11-20 10:09:18'),
(110, 54, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-20 11:54:54', '2022-11-20 11:54:54'),
(111, 54, 6, NULL, NULL, NULL, 1, 1, 1300, 0, 0, 0, 1300, '2022-11-20 11:54:54', '2022-11-20 11:54:54'),
(112, 55, 8, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-11-20 14:49:36', '2022-11-20 14:49:36'),
(113, 56, 6, NULL, NULL, NULL, 1, 1, 1300, 0, 0, 0, 1300, '2022-11-20 15:12:51', '2022-11-20 15:12:51'),
(114, 56, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-11-20 15:12:51', '2022-11-20 15:12:51'),
(122, 59, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-03 11:19:19', '2022-12-03 11:19:19'),
(123, 59, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-03 11:19:19', '2022-12-03 11:19:19'),
(124, 59, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-03 11:19:19', '2022-12-03 11:19:19'),
(125, 59, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-03 11:19:19', '2022-12-03 11:19:19'),
(126, 60, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-03 11:19:53', '2022-12-03 11:19:53'),
(127, 60, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-03 11:19:53', '2022-12-03 11:19:53'),
(128, 60, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-03 11:19:53', '2022-12-03 11:19:53'),
(129, 60, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-03 11:19:53', '2022-12-03 11:19:53'),
(130, 61, 6, NULL, NULL, NULL, 1, 1, 1300, 0, 0, 0, 1300, '2022-12-03 12:11:39', '2022-12-03 12:11:39'),
(131, 61, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-03 12:11:39', '2022-12-03 12:11:39'),
(132, 61, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-03 12:11:39', '2022-12-03 12:11:39'),
(133, 62, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-03 14:44:59', '2022-12-03 14:44:59'),
(134, 62, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-03 14:44:59', '2022-12-03 14:44:59'),
(135, 62, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-03 14:44:59', '2022-12-03 14:44:59'),
(136, 63, 6, NULL, NULL, NULL, 1, 1, 1300, 0, 0, 0, 1300, '2022-12-04 07:57:00', '2022-12-04 07:57:00'),
(137, 63, 4, NULL, NULL, NULL, 3, 1, 700, 0, 0, 0, 2100, '2022-12-04 07:57:00', '2022-12-04 07:57:00'),
(138, 64, 9, NULL, NULL, NULL, 4, 1, 1700, 0, 0, 0, 6800, '2022-12-05 07:47:21', '2022-12-05 07:47:21'),
(139, 64, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-05 07:47:21', '2022-12-05 07:47:21'),
(140, 64, 8, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:47:21', '2022-12-05 07:47:21'),
(141, 65, 9, NULL, NULL, NULL, 4, 1, 1700, 0, 0, 0, 6800, '2022-12-05 07:47:28', '2022-12-05 07:47:28'),
(142, 65, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-05 07:47:28', '2022-12-05 07:47:28'),
(143, 65, 8, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:47:28', '2022-12-05 07:47:28'),
(144, 66, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-05 07:54:09', '2022-12-05 07:54:09'),
(145, 66, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-05 07:54:09', '2022-12-05 07:54:09'),
(146, 66, 17, NULL, NULL, NULL, 3, 1, 2400, 0, 0, 0, 7200, '2022-12-05 07:54:09', '2022-12-05 07:54:09'),
(147, 66, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:54:09', '2022-12-05 07:54:09'),
(148, 66, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:54:09', '2022-12-05 07:54:09'),
(149, 67, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-05 07:54:46', '2022-12-05 07:54:46'),
(150, 67, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:54:46', '2022-12-05 07:54:46'),
(151, 67, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:54:46', '2022-12-05 07:54:46'),
(152, 68, 16, NULL, NULL, NULL, 1, 1, 2000, 0, 0, 0, 2000, '2022-12-05 07:55:22', '2022-12-05 07:55:22'),
(153, 68, 17, NULL, NULL, NULL, 1, 1, 2400, 0, 0, 0, 2400, '2022-12-05 07:55:22', '2022-12-05 07:55:22'),
(154, 68, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-05 07:55:22', '2022-12-05 07:55:22'),
(155, 68, 10, NULL, NULL, NULL, 2, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:55:22', '2022-12-05 07:55:22'),
(156, 68, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:55:22', '2022-12-05 07:55:22'),
(157, 69, 16, NULL, NULL, NULL, 1, 1, 2000, 0, 0, 0, 2000, '2022-12-05 07:55:44', '2022-12-05 07:55:44'),
(158, 69, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-05 07:55:44', '2022-12-05 07:55:44'),
(159, 69, 10, NULL, NULL, NULL, 2, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:55:44', '2022-12-05 07:55:44'),
(160, 69, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 07:55:44', '2022-12-05 07:55:44'),
(161, 70, 10, NULL, NULL, NULL, 2, 1, 1700, 0, 0, 0, 3400, '2022-12-05 08:04:36', '2022-12-05 08:04:36'),
(162, 70, 4, NULL, NULL, NULL, 2, 1, 700, 0, 0, 0, 1400, '2022-12-05 08:04:36', '2022-12-05 08:04:36'),
(163, 70, 9, NULL, NULL, NULL, 5, 1, 1700, 0, 0, 0, 8500, '2022-12-05 08:04:36', '2022-12-05 08:04:36'),
(164, 70, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-05 08:04:36', '2022-12-05 08:04:36'),
(165, 71, 7, NULL, NULL, NULL, 4, 1, 900, 0, 0, 0, 3600, '2022-12-05 08:12:58', '2022-12-05 08:12:58'),
(166, 71, 10, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 08:12:58', '2022-12-05 08:12:58'),
(167, 71, 16, NULL, NULL, NULL, 2, 1, 2000, 0, 0, 0, 4000, '2022-12-05 08:12:58', '2022-12-05 08:12:58'),
(168, 71, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-05 08:12:58', '2022-12-05 08:12:58'),
(169, 71, 3, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-05 08:12:58', '2022-12-05 08:12:58'),
(170, 72, 7, NULL, NULL, NULL, 1, 1, 900, 0, 0, 0, 900, '2022-12-05 08:15:36', '2022-12-05 08:15:36'),
(171, 72, 9, NULL, NULL, NULL, 1, 1, 1700, 0, 0, 0, 1700, '2022-12-05 08:15:36', '2022-12-05 08:15:36'),
(172, 72, 16, NULL, NULL, NULL, 1, 1, 2000, 0, 0, 0, 2000, '2022-12-05 08:15:36', '2022-12-05 08:15:36'),
(173, 72, 4, NULL, NULL, NULL, 1, 1, 700, 0, 0, 0, 700, '2022-12-05 08:15:36', '2022-12-05 08:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_transfer`
--

CREATE TABLE `product_transfer` (
  `id` int(10) UNSIGNED NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `item_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_cost` double DEFAULT NULL,
  `additional_price` double DEFAULT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_warehouse`
--

CREATE TABLE `product_warehouse` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_warehouse`
--

INSERT INTO `product_warehouse` (`id`, `product_id`, `product_batch_id`, `variant_id`, `imei_number`, `warehouse_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL, NULL, 1, 12, NULL, '2022-07-31 12:21:45', '2022-10-29 11:49:21'),
(2, '3', NULL, NULL, NULL, 2, 6, NULL, '2022-10-29 11:26:45', '2022-12-05 08:12:58'),
(3, '4', NULL, NULL, NULL, 2, 48, NULL, '2022-10-29 11:26:45', '2022-12-05 08:15:36'),
(4, '9', NULL, NULL, NULL, 2, 1, NULL, '2022-11-08 15:05:14', '2022-12-05 08:15:36'),
(5, '8', NULL, NULL, NULL, 2, 38, NULL, '2022-11-08 15:05:15', '2022-12-05 07:47:28'),
(6, '10', NULL, NULL, NULL, 2, 21, NULL, '2022-11-08 15:06:36', '2022-12-05 08:12:58'),
(7, '6', NULL, NULL, NULL, 2, 28, NULL, '2022-11-08 15:06:36', '2022-12-04 07:57:00'),
(8, '11', NULL, NULL, NULL, 2, 0, NULL, '2022-11-11 11:32:34', '2022-11-11 12:06:13'),
(9, '12', NULL, NULL, NULL, 2, 24, NULL, '2022-11-11 11:46:35', '2022-11-21 11:30:54'),
(10, '7', NULL, NULL, NULL, 2, 15, NULL, '2022-12-03 14:17:51', '2022-12-05 08:15:36'),
(11, '17', NULL, NULL, NULL, 2, 20, NULL, '2022-12-03 14:17:51', '2022-12-03 14:17:51'),
(12, '16', NULL, NULL, NULL, 2, 17, NULL, '2022-12-03 14:17:51', '2022-12-05 08:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `user_id`, `warehouse_id`, `supplier_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_cost`, `order_tax_rate`, `order_tax`, `order_discount`, `shipping_cost`, `grand_total`, `paid_amount`, `status`, `payment_status`, `document`, `note`, `created_at`, `updated_at`) VALUES
(2, 'pr-20221029-012645', 1, 2, 1, 2, 150, 0, 0, 105000, 0, 0, NULL, NULL, 105000, 0, 1, 1, NULL, NULL, '2022-10-28 22:00:00', '2022-10-29 11:26:45'),
(3, 'pr-20221108-050514', 1, 2, 2, 2, 2, 0, 0, 2400, 0, 0, NULL, NULL, 2400, 0, 1, 1, NULL, NULL, '2022-11-07 22:00:00', '2022-11-08 15:05:14'),
(4, 'pr-20221108-050636', 1, 2, 2, 4, 160, 0, 0, 180000, 0, 0, NULL, NULL, 180000, 0, 1, 1, NULL, NULL, '2022-11-07 22:00:00', '2022-11-08 15:06:36'),
(5, 'pr-20221111-013234', 1, 2, 2, 1, 1, 0, 0, 9000, 0, 0, NULL, NULL, 9000, 0, 1, 1, NULL, NULL, '2022-11-10 22:00:00', '2022-11-11 11:32:34'),
(6, 'pr-20221111-014635', 1, 2, 2, 1, 1, 0, 0, 36000, 0, 0, NULL, NULL, 36000, 0, 1, 1, NULL, NULL, '2022-11-10 22:00:00', '2022-11-11 11:46:35'),
(7, 'pr-20221203-041751', 37, 2, 2, 3, 60, 0, 0, 66000, 0, 0, NULL, NULL, 66000, 0, 1, 1, NULL, NULL, '2022-12-02 22:00:00', '2022-12-03 14:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_return`
--

CREATE TABLE `purchase_product_return` (
  `id` int(10) UNSIGNED NOT NULL,
  `return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_batch_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `imei_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double NOT NULL,
  `purchase_unit_id` int(11) NOT NULL,
  `net_unit_cost` double NOT NULL,
  `discount` double NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `quotation_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `reference_no`, `user_id`, `sale_id`, `cash_register_id`, `customer_id`, `warehouse_id`, `biller_id`, `account_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_price`, `order_tax_rate`, `order_tax`, `grand_total`, `document`, `return_note`, `staff_note`, `created_at`, `updated_at`) VALUES
(1, 'rr-20220731-074830', 1, 1, NULL, 1, 1, 1, 5, 1, 1, 0, 0, 900, 0, 0, 900, NULL, NULL, NULL, '2022-07-31 12:48:30', '2022-07-31 12:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `return_purchases`
--

CREATE TABLE `return_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reward_point_settings`
--

CREATE TABLE `reward_point_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `per_point_amount` double NOT NULL,
  `minimum_amount` double NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_point_settings`
--

INSERT INTO `reward_point_settings` (`id`, `per_point_amount`, `minimum_amount`, `duration`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 300, 1000, 1, 'Year', 0, '2021-06-09 03:40:15', '2022-10-29 11:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin can access all data...', 'web', 1, '2018-06-02 11:46:44', '2022-07-31 09:19:24'),
(2, 'Owner', 'Staff of shop', 'web', 1, '2018-10-22 14:38:13', '2022-07-31 09:19:37'),
(4, 'staff', 'staff has specific acess...', 'web', 1, '2018-06-02 12:05:27', '2022-07-31 09:20:13'),
(5, 'Customer', NULL, 'web', 1, '2020-11-05 18:43:16', '2022-07-31 09:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(12, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(20, 4),
(21, 1),
(21, 2),
(21, 4),
(22, 1),
(22, 2),
(22, 4),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(24, 4),
(25, 1),
(25, 2),
(25, 4),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(28, 4),
(29, 1),
(29, 2),
(29, 4),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(55, 4),
(56, 1),
(56, 2),
(56, 4),
(57, 1),
(57, 2),
(57, 4),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(63, 4),
(64, 1),
(64, 2),
(64, 4),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(86, 2),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(105, 2),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_register_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `grand_total` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_discount_value` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `sale_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `sale_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `reference_no`, `user_id`, `cash_register_id`, `customer_id`, `warehouse_id`, `biller_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_price`, `grand_total`, `order_tax_rate`, `order_tax`, `order_discount_type`, `order_discount_value`, `order_discount`, `coupon_id`, `coupon_discount`, `shipping_cost`, `sale_status`, `payment_status`, `document`, `paid_amount`, `sale_note`, `staff_note`, `created_at`, `updated_at`) VALUES
(6, 'posr-20221029-015205', 1, 1, 2, 2, 2, 1, 2, 0, 0, 3600, 3600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 3600, NULL, NULL, '2022-10-29 11:52:05', '2022-10-29 11:52:05'),
(8, 'posr-20221029-022847', 1, 1, 2, 2, 2, 2, 7, 0, 0, 12600, 12600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 12600, NULL, NULL, '2022-10-29 12:28:47', '2022-10-29 12:28:47'),
(9, 'posr-20221029-022910', 1, 1, 2, 2, 2, 2, 7, 0, 0, 12600, 12600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 12600, NULL, NULL, '2022-10-29 12:29:10', '2022-10-29 12:29:10'),
(10, 'posr-20221029-023129', 1, 1, 2, 2, 2, 2, 5, 0, 0, 9000, 9000, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 9000, NULL, NULL, '2022-10-29 12:31:29', '2022-10-29 12:31:29'),
(11, 'posr-20221029-025332', 1, 1, 2, 2, 2, 2, 2, 0, 0, 3600, 3600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 3600, NULL, NULL, '2022-10-28 22:00:00', '2022-10-29 12:53:32'),
(12, 'posr-20221029-025904', 1, 1, 2, 2, 2, 2, 2, 0, 0, 3600, 3600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-10-28 22:00:00', '2022-10-29 12:59:04'),
(13, 'posr-20221029-025916', 1, 1, 3, 2, 2, 2, 2, 0, 0, 3600, 3600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-10-29 12:59:16', '2022-10-29 12:59:16'),
(14, 'posr-20221029-030746', 1, 1, 2, 2, 2, 2, 2, 0, 0, 3600, 3600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-10-29 13:07:46', '2022-10-29 13:07:46'),
(15, 'posr-20221029-030919', 1, 1, 2, 2, 2, 2, 2, 0, 0, 3600, 3600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-10-29 13:09:19', '2022-10-29 13:09:19'),
(18, 'posr-20221030-081531', 1, 1, 2, 2, 2, 2, 7, 0, 0, 12600, 12600, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 12600, NULL, NULL, '2022-10-30 06:15:31', '2022-10-30 06:15:31'),
(19, 'posr-20221108-072334', 1, 1, 2, 2, 2, 1, 1, 0, 0, 1800, 1800, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 1800, NULL, NULL, '2022-11-08 17:23:34', '2022-11-08 17:23:34'),
(20, 'posr-20221108-072337', 1, 1, 2, 2, 2, 1, 1, 0, 0, 1800, 1800, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 1800, NULL, NULL, '2022-11-08 17:23:37', '2022-11-08 17:23:37'),
(21, 'posr-20221108-072447', 1, 1, 2, 2, 2, 1, 1, 0, 0, 1800, 1800, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 1800, NULL, NULL, '2022-11-08 17:24:47', '2022-11-08 17:24:47'),
(22, 'posr-20221108-072541', 1, 1, 2, 2, 2, 1, 1, 0, 0, 1800, 1800, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 1800, NULL, NULL, '2022-11-08 17:25:41', '2022-11-08 17:25:41'),
(23, 'posr-20221108-072725', 1, 1, 2, 2, 2, 1, 1, 0, 0, 1800, 1800, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 1800, NULL, NULL, '2022-11-08 17:27:25', '2022-11-08 17:27:25'),
(24, 'posr-20221108-082527', 1, 1, 2, 2, 2, 1, 8, 0, 0, 7200, 7200, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 7200, NULL, NULL, '2022-11-08 18:25:27', '2022-11-08 18:25:27'),
(25, 'posr-20221108-090143', 1, 1, 2, 2, 2, 5, 10, 0, 0, 23600, 23600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 23600, NULL, NULL, '2022-11-08 19:01:43', '2022-11-08 19:01:43'),
(26, 'posr-20221108-092138', 1, 1, 2, 2, 2, 4, 6, 0, 0, 14400, 14400, 0, 0, 'Flat', 0, 0, NULL, NULL, 0, 1, 2, NULL, 21200, NULL, NULL, '2022-11-07 22:00:00', '2022-11-08 19:24:08'),
(28, 'posr-20221109-113311', 1, 2, 3, 2, 2, 3, 5, 0, 0, 9800, 9800, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-11-09 21:33:11', '2022-11-09 21:33:11'),
(31, 'posr-20221110-010021', 1, 2, 4, 2, 2, 1, 1, 0, 0, 2600, 2600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 2600, NULL, NULL, '2022-11-10 11:00:21', '2022-11-10 11:00:21'),
(34, 'posr-20221111-022303', 1, 5, 4, 2, 2, 1, 3, 0, 0, 5100, 5100, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, '2022-11-03 22:00:00', '2022-11-11 12:23:03'),
(35, 'posr-20221111-030635', 1, 5, 4, 2, 2, 3, 5, 0, 0, 13800, 13800, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 13800, NULL, NULL, '2022-11-11 13:06:35', '2022-11-11 13:06:35'),
(36, 'posr-20221111-045412', 1, 5, 4, 2, 2, 2, 6, 0, 0, 6600, 6600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, '2022-11-11 14:54:12', '2022-11-11 14:54:12'),
(39, 'posr-20221113-121619', 1, 5, 4, 2, 2, 3, 12, 0, 0, 10400, 10400, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 10400, NULL, NULL, '2022-11-13 10:16:19', '2022-11-13 10:16:20'),
(40, 'posr-20221118-090921', 1, 6, 5, 2, 2, 3, 12, 0, 0, 10400, 10400, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 10400, NULL, NULL, '2022-11-18 19:09:21', '2022-11-18 19:09:22'),
(41, 'posr-20221118-092201', 1, 6, 4, 2, 2, 2, 4, 0, 0, 5800, 5800, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 5800, NULL, NULL, '2022-11-18 19:22:01', '2022-11-18 19:22:01'),
(42, 'posr-20221119-035736', 1, 6, 4, 2, 2, 2, 3, 0, 0, 5100, 5100, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 5100, NULL, NULL, '2022-11-19 13:57:36', '2022-11-19 13:57:36'),
(43, 'posr-20221119-040559', 1, 6, 4, 2, 2, 2, 2, 0, 0, 2200, 2200, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 2200, NULL, NULL, '2022-11-19 14:05:59', '2022-11-19 14:05:59'),
(44, 'posr-20221119-042406', 1, 6, 4, 2, 2, 2, 2, 0, 0, 2000, 2000, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 2000, NULL, NULL, '2022-11-19 14:24:06', '2022-11-19 14:24:06'),
(45, 'posr-20221119-043113', 1, 6, 4, 2, 2, 1, 1, 0, 0, 700, 700, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 700, NULL, NULL, '2022-11-19 14:31:13', '2022-11-19 14:31:13'),
(46, 'posr-20221119-043438', 1, 6, 5, 2, 2, 2, 2, 0, 0, 2400, 2400, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 2400, NULL, NULL, '2022-11-19 14:34:38', '2022-11-19 14:34:38'),
(47, 'posr-20221119-045411', 1, 6, 5, 2, 2, 2, 2, 0, 0, 1600, 1600, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 1600, NULL, NULL, '2022-11-19 14:54:11', '2022-11-19 14:54:11'),
(48, 'posr-20221119-045846', 1, 6, 4, 2, 2, 2, 2, 0, 0, 2400, 2400, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 2400, NULL, NULL, '2022-11-19 14:58:46', '2022-11-19 14:58:46'),
(49, 'posr-20221119-050202', 1, 6, 4, 2, 2, 3, 3, 0, 0, 3300, 3300, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 3300, NULL, NULL, '2022-11-19 15:02:02', '2022-11-19 15:02:03'),
(50, 'posr-20221119-051027', 1, 6, 5, 2, 2, 3, 3, 0, 0, 4100, 4100, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 4100, NULL, NULL, '2022-11-19 15:10:27', '2022-11-19 15:10:27'),
(51, 'posr-20221120-104213', 1, 6, 5, 2, 2, 2, 3, 0, 0, 4300, 4300, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 4300, NULL, NULL, '2022-11-20 08:42:13', '2022-11-20 08:42:13'),
(52, 'posr-20221120-105804', 1, 6, 4, 2, 2, 2, 5, 0, 0, 8500, 8500, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 8500, NULL, NULL, '2022-11-20 08:58:04', '2022-11-20 08:58:04'),
(53, 'posr-20221120-120918', 1, 6, 4, 2, 2, 3, 3, 0, 0, 4100, 4100, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 4100, NULL, NULL, '2022-11-20 10:09:18', '2022-11-20 10:09:18'),
(54, 'posr-20221120-015454', 1, 6, 5, 2, 2, 2, 2, 0, 0, 3000, 3000, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 3000, NULL, NULL, '2022-11-20 11:54:54', '2022-11-20 11:54:54'),
(55, 'posr-20221120-044936', 1, 6, 4, 2, 2, 1, 1, 0, 0, 1700, 1700, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 1700, NULL, NULL, '2022-11-20 14:49:36', '2022-11-20 14:49:36'),
(56, 'posr-20221120-051251', 1, 6, 4, 2, 2, 2, 2, 0, 0, 2000, 2000, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-11-20 15:12:51', '2022-11-20 15:12:51'),
(59, 'posr-20221203-011919', 1, 7, 5, 2, 2, 4, 4, 0, 0, 5000, 5000, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 5000, NULL, NULL, '2022-12-03 11:19:19', '2022-12-03 11:19:19'),
(60, 'posr-20221203-011953', 1, 7, 5, 2, 2, 4, 4, 0, 0, 5000, 5000, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 5000, NULL, NULL, '2022-12-03 11:19:53', '2022-12-03 11:19:53'),
(61, 'posr-20221203-021139', 37, 8, 5, 2, 3, 3, 3, 0, 0, 4700, 4700, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 4700, NULL, NULL, '2022-12-03 12:11:39', '2022-12-03 12:11:39'),
(62, 'posr-20221203-044458', 37, 8, 5, 2, 2, 3, 3, 0, 0, 3300, 3300, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 3300, NULL, NULL, '2022-12-03 14:44:58', '2022-12-03 14:44:58'),
(63, 'posr-20221204-095700', 37, 8, 4, 2, 2, 2, 4, 0, 0, 3400, 3400, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, 1, 4, NULL, 3400, NULL, NULL, '2022-12-04 07:57:00', '2022-12-04 07:57:00'),
(64, 'posr-20221205-094721', 37, 8, 5, 2, 2, 3, 6, 0, 0, 9400, 9400, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 9400, NULL, NULL, '2022-12-05 07:47:21', '2022-12-05 07:47:21'),
(65, 'posr-20221205-094728', 37, 8, 5, 2, 2, 3, 6, 0, 0, 9400, 9400, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 9400, NULL, NULL, '2022-12-05 07:47:28', '2022-12-05 07:47:28'),
(66, 'posr-20221205-095409', 37, 8, 5, 2, 2, 5, 7, 0, 0, 12200, 12200, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-12-05 07:54:09', '2022-12-05 07:54:09'),
(67, 'posr-20221205-095445', 37, 8, 2, 2, 2, 3, 3, 0, 0, 4100, 4100, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-12-05 07:54:45', '2022-12-05 07:54:45'),
(68, 'posr-20221205-095522', 37, 8, 3, 2, 2, 5, 6, 0, 0, 8500, 8500, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-12-05 07:55:22', '2022-12-05 07:55:22'),
(69, 'posr-20221205-095544', 37, 8, 5, 2, 2, 4, 5, 0, 0, 6100, 6100, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, '2022-12-05 07:55:44', '2022-12-05 07:55:44'),
(70, 'posr-20221205-100435', 37, 10, 5, 2, 2, 4, 10, 0, 0, 14200, 14200, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 14200, NULL, NULL, '2022-12-05 08:04:35', '2022-12-05 08:04:35'),
(71, 'posr-20221205-101258', 37, 12, 5, 2, 2, 5, 9, 0, 0, 10900, 10900, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 10900, NULL, NULL, '2022-12-05 08:12:58', '2022-12-05 08:12:58'),
(72, 'posr-20221205-101536', 37, 12, 5, 2, 2, 4, 4, 0, 0, 5300, 5300, 0, 0, 'Flat', NULL, 0, NULL, NULL, NULL, 1, 4, NULL, 5300, NULL, NULL, '2022-12-05 08:15:36', '2022-12-05 08:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `stock_counts`
--

CREATE TABLE `stock_counts` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_adjusted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_counts`
--

INSERT INTO `stock_counts` (`id`, `reference_no`, `warehouse_id`, `category_id`, `brand_id`, `user_id`, `type`, `initial_file`, `final_file`, `note`, `is_adjusted`, `created_at`, `updated_at`) VALUES
(1, 'scr-20221108-075259', 2, NULL, NULL, 1, 'full', '20221108-075259.csv', NULL, NULL, 0, '2022-11-08 17:52:59', '2022-11-08 17:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `image`, `company_name`, `vat_number`, `email`, `phone_number`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Đức Toàn', NULL, 'AnToanHome', NULL, 'hero70411@gmail.com', '0904422959', '58 Tố Hữu', 'Quận Nam Từ Liêm', 'Hà Nội', '12015', 'Vietnam', 1, '2022-07-31 12:17:34', '2022-07-31 12:17:34'),
(2, 'Kawale Chipiku', NULL, 'Chipiku', NULL, 'supplier@chipiku.com', '12345678', 'Kawale Lilongwe', 'Lilongwe', NULL, NULL, NULL, 1, '2022-11-08 15:01:34', '2022-11-08 15:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_cost` double NOT NULL,
  `shipping_cost` double DEFAULT NULL,
  `grand_total` double NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_unit` int(11) DEFAULT NULL,
  `operator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_value` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `base_unit`, `operator`, `operation_value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'bottle', 'Bottle', NULL, '*', 1, 1, '2022-07-31 12:15:05', '2022-10-29 11:21:11'),
(2, 'shot', 'Shot', NULL, '*', 1, 1, '2022-11-10 09:32:01', '2022-11-11 12:09:29'),
(3, '6-pack', '6 Pack', 1, '*', 6, 1, '2022-11-11 11:42:20', '2022-11-11 11:42:20'),
(4, 'Mls', 'Milliliters', NULL, '*', 1, 1, '2022-12-03 11:01:02', '2022-12-03 11:01:20'),
(5, '350mls', '350 Mls', 4, NULL, NULL, 1, '2022-12-03 13:03:03', '2022-12-03 13:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `phone`, `company_name`, `role_id`, `biller_id`, `warehouse_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$DWAHTfjcvwCpOCXaJg11MOhsqns03uvlwiSUOQwkHL2YYrtrXPcL6', 'w8UVyT7CJoh5RfqYPOUon75YORQousg8mTr07MVBZhKwJXagXMSJcd1VJtrD', '5364377', 'nulled', 1, NULL, NULL, 1, 0, '2018-06-02 15:24:15', '2022-07-16 08:38:25'),
(3, 'dhiman da', 'dhiman@gmail.com', '$2y$10$Fef6vu5E67nm11hX7V5a2u1ThNCQ6n9DRCvRF9TD7stk.Pmt2R6O.', '5ehQM6JIfiQfROgTbB5let0Z93vjLHS7rd9QD5RPNgOxli3xdo7fykU7vtTt', '212', 'lioncoders', 1, 0, 0, 0, 1, '2018-06-14 10:00:31', '2020-11-05 19:06:51'),
(6, 'test', 'test@gmail.com', '$2y$10$TDAeHcVqHyCmurki0wjLZeIl1SngKX3WLOhyTiCoZG3souQfqv.LS', 'KpW1gYYlOFacumklO2IcRfSsbC3KcWUZzOI37gqoqM388Xie6KdhaOHIFEYm', '1234', '212312', 4, 0, 0, 0, 1, '2018-06-23 15:05:33', '2018-06-23 15:13:45'),
(8, 'test', 'test@yahoo.com', '$2y$10$hlMigidZV0j2/IPkgE/xsOSb8WM2IRlsMv.1hg1NM7kfyd6bGX3hC', '', '31231', '', 4, 0, 0, 0, 1, '2018-06-25 10:35:49', '2018-07-02 13:07:39'),
(9, 'staff', 'anda@gmail.com', '$2y$10$kxDbnynB6mB1e1w3pmtbSOlSxy/WwbLPY5TJpMi0Opao5ezfuQjQm', 'HUYdFDsg2g1SEUNKVp70hF9RhpiPGEcglq3uk02sjG92M04QacNeV2oWneEZ', '3123', '', 4, 5, 1, 0, 1, '2018-07-02 13:08:08', '2022-07-16 08:37:08'),
(10, 'abul', 'abul@alpha.com', '$2y$10$5zgB2OOMyNBNVAd.QOQIju5a9fhNnTqPx5H6s4oFlXhNiF6kXEsPq', 'x7HlttI5bM0vSKViqATaowHFJkLS3PHwfvl7iJdFl5Z1SsyUgWCVbLSgAoi0', '1234', 'anda', 1, 0, 0, 0, 1, '2018-09-08 11:44:48', '2022-07-16 08:35:32'),
(11, 'teststaff', 'a@a.com', '$2y$10$5KNBIIhZzvvZEQEhkHaZGu.Q8bbQNfqYvYgL5N55B8Pb4P5P/b/Li', 'DkHDEcCA0QLfsKPkUK0ckL0CPM6dPiJytNa0k952gyTbeAyMthW3vi7IRitp', '111', 'aa', 4, 5, 1, 0, 1, '2018-10-22 14:47:56', '2018-10-23 14:10:56'),
(12, 'john', 'john@gmail.com', '$2y$10$P/pN2J/uyTYNzQy2kRqWwuSv7P2f6GE/ykBwtHdda7yci3XsfOKWe', 'O0f1WJBVjT5eKYl3Js5l1ixMMtoU6kqrH7hbHDx9I1UCcD9CmiSmCBzHbQZg', '10001', '', 4, 2, 2, 0, 1, '2018-12-30 12:48:37', '2019-03-06 16:59:49'),
(13, 'jjj', 'test@test.com', '$2y$10$/Qx3gHWYWUhlF1aPfzXaCeZA7fRzfSEyCIOnk/dcC4ejO8PsoaalG', '', '1213', '', 1, 0, 0, 0, 1, '2019-01-03 12:08:31', '2019-03-03 16:02:29'),
(19, 'shakalaka', 'shakalaka@gmail.com', '$2y$10$ketLWT0Ib/JXpo00eJlxoeSw.7leS8V1CUGInfbyOWT4F5.Xuo7S2', '', '1212', 'Digital image', 5, 0, 0, 0, 1, '2020-11-09 12:07:16', '2022-07-16 08:35:32'),
(21, 'modon', 'modon@gmail.com', '$2y$10$7VpoeGMkP8QCvL5zLwFW..6MYJ5MRumDLDoX.TTQtClS561rpFHY.', '', '2222', 'modon company', 5, 0, 0, 0, 1, '2020-11-13 19:12:08', '2022-07-16 08:35:32'),
(22, 'dhiman', 'dhiman@gmail.com', '$2y$10$3mPygsC6wwnDtw/Sg85IpuExtUhgaHx52Lwp7Rz0.FNfuFdfKVpRq', '', '+8801111111101', 'lioncoders', 5, 0, 0, 0, 1, '2020-11-15 18:14:58', '2022-07-16 08:35:32'),
(31, 'mbs', 'mbs@gmail.com', '$2y$10$6Ldm1rWEVSrlTmpjIXkeQO9KwWJz/j0FB4U.fY1oCFeax47rvttEK', '', '2121', '', 4, 1, 2, 0, 1, '2021-12-29 18:40:22', '2022-07-16 08:35:32'),
(36, 'Manuel S', 'msolis@mango.com.gt', '$2y$10$YfM/LdEtAN08hoVXiaRRZO.0Wf.fBn0wRnaCSczc50s3bR.7xFliu', NULL, '53664377', NULL, 1, NULL, NULL, 0, 1, '2022-07-16 07:48:37', '2022-10-30 06:13:06'),
(37, 'Manager', 'manager@zamowa.com', '$2y$10$dvgB3yqzMHegVGsnTh2MsuzuESPLVnbzANB3yviS2SrQjgbXbMM/i', NULL, '88866554433', 'Main Bar', 2, NULL, NULL, 1, 0, '2022-12-03 11:56:12', '2022-12-03 11:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `phone`, `email`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Kho Ecolife', '0904422959', 'hero70411@gmail.com', '58 Tố Hữu', 0, '2022-07-31 12:14:05', '2022-10-29 13:22:34'),
(2, 'Main Shop', '0994171710', 'ronkajawo@hotmail.com', 'Chilinde', 1, '2022-10-29 11:16:54', '2022-10-29 11:16:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billers`
--
ALTER TABLE `billers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_registers`
--
ALTER TABLE `cash_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_plans`
--
ALTER TABLE `discount_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_plan_customers`
--
ALTER TABLE `discount_plan_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_plan_discounts`
--
ALTER TABLE `discount_plan_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dso_alerts`
--
ALTER TABLE `dso_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_card_recharges`
--
ALTER TABLE `gift_card_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrm_settings`
--
ALTER TABLE `hrm_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_transfers`
--
ALTER TABLE `money_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_cheque`
--
ALTER TABLE `payment_with_cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_credit_card`
--
ALTER TABLE `payment_with_credit_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_gift_card`
--
ALTER TABLE `payment_with_gift_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_with_paypal`
--
ALTER TABLE `payment_with_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_setting`
--
ALTER TABLE `pos_setting`
  ADD UNIQUE KEY `pos_setting_id_unique` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_adjustments`
--
ALTER TABLE `product_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_batches`
--
ALTER TABLE `product_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_quotation`
--
ALTER TABLE `product_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_transfer`
--
ALTER TABLE `product_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product_return`
--
ALTER TABLE `purchase_product_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_purchases`
--
ALTER TABLE `return_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_point_settings`
--
ALTER TABLE `reward_point_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_counts`
--
ALTER TABLE `stock_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billers`
--
ALTER TABLE `billers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cash_registers`
--
ALTER TABLE `cash_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_plans`
--
ALTER TABLE `discount_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_plan_customers`
--
ALTER TABLE `discount_plan_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_plan_discounts`
--
ALTER TABLE `discount_plan_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dso_alerts`
--
ALTER TABLE `dso_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_card_recharges`
--
ALTER TABLE `gift_card_recharges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hrm_settings`
--
ALTER TABLE `hrm_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `money_transfers`
--
ALTER TABLE `money_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `payment_with_cheque`
--
ALTER TABLE `payment_with_cheque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_with_credit_card`
--
ALTER TABLE `payment_with_credit_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_with_gift_card`
--
ALTER TABLE `payment_with_gift_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_with_paypal`
--
ALTER TABLE `payment_with_paypal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_adjustments`
--
ALTER TABLE `product_adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_batches`
--
ALTER TABLE `product_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_quotation`
--
ALTER TABLE `product_quotation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_returns`
--
ALTER TABLE `product_returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `product_transfer`
--
ALTER TABLE `product_transfer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_warehouse`
--
ALTER TABLE `product_warehouse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_product_return`
--
ALTER TABLE `purchase_product_return`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `return_purchases`
--
ALTER TABLE `return_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reward_point_settings`
--
ALTER TABLE `reward_point_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `stock_counts`
--
ALTER TABLE `stock_counts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
