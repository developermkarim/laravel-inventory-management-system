-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 02:23 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Electronics', 1, 1, NULL, '2022-11-05 13:43:42', '2022-11-06 08:50:01'),
(3, 'Technology', 1, 1, NULL, '2022-11-06 08:37:20', '2022-11-18 08:57:27'),
(4, 'Groceries', 1, 1, NULL, '2022-11-08 08:37:52', NULL),
(5, 'Fruits', 1, 1, NULL, '2022-11-08 08:39:46', NULL),
(6, 'Foods', 1, 1, NULL, '2022-11-08 09:02:09', NULL),
(7, 'PRAN Foods', 1, 1, 1, '2022-11-18 08:56:34', '2022-11-18 08:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_img_uri` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `customer_image`, `customer_img_uri`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(41, 'Mahmodul Karim', 'customer-1667667638.png', 'http://127.0.0.1:8000/storage/customer//customer-1667667638.png', '01647113581', 'm.karimcu@gmail.com', 'Panthpath, Dhaka, Bangladesh', 1, 1, 1, '2022-11-05 11:00:00', '2022-11-05 11:00:38'),
(42, 'Juliya Shuhi', 'customer-1667670891.jpg', 'http://127.0.0.1:8000/storage/customer//customer-1667670891.jpg', '017854854', 'juliya@gmail.com', 'Komilla, Chittagong', 1, 1, NULL, '2022-11-05 11:54:52', NULL),
(43, 'Riad Rio', 'customer-1667670954.jpg', 'http://127.0.0.1:8000/storage/customer//customer-1667670954.jpg', '018754541454', 'riad@gmail.com', 'Bikram Puri,Dhaka', 1, 1, 1, '2022-11-05 11:55:40', '2022-11-18 04:51:47'),
(47, 'Md Mahmodul Karim', 'customer-1668266180.jpg', 'http://127.0.0.1:8000/storage/customer//customer-1668266180.jpg', '01647113581', 'm.karimcu@gmail.com', 'Panthpath, Dhaka, Bangladesh', 1, NULL, NULL, '2022-11-12 09:16:20', '2022-11-12 09:16:20'),
(48, 'Abdur Razzak', 'customer-1668280661.jpg', 'http://127.0.0.1:8000/storage/customer//customer-1668280661.jpg', '012445352', 'abdurrazzak12@gmail.com', 'Agrabad,Chittagong,Bangladesh', 1, NULL, NULL, '2022-11-12 13:17:42', '2022-11-12 13:17:42'),
(49, 'Taneem Rahman', 'customer-1668697910.jpg', 'http://127.0.0.1:8000/storage/customer//customer-1668697910.jpg', '01983432453', 'taneem@gmial.com', 'MuhammadPur, Mirpur,Dhaka', 1, NULL, NULL, '2022-11-17 09:11:50', '2022-11-17 09:11:50'),
(50, 'Shifa Akter', 'customer-1668768600.jpg', 'http://127.0.0.1:8000/storage/customer//customer-1668768600.jpg', '019834754', 'shifaakter@gmail.com', 'New Market,MirPur Road,Dhaka', 1, 1, NULL, '2022-11-18 04:50:01', NULL),
(51, 'Jahedul Islam', 'customer-1668779415.jpg', 'http://127.0.0.1:8000/storage/customer//customer-1668779415.jpg', '0179874671', 'jahedul@gmail.com', 'Habiganj,Sylhet,Bangladesh', 1, NULL, NULL, '2022-11-18 07:50:15', '2022-11-18 07:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-11-12', 'do', 1, 1, 1, '2022-11-12 07:19:17', '2022-11-13 10:00:47'),
(3, '1', '2022-11-12', 'test', 1, 1, NULL, '2022-11-12 07:30:02', '2022-11-12 07:30:02'),
(14, '4', '2022-11-12', NULL, 1, 1, NULL, '2022-11-12 13:17:41', '2022-11-12 13:17:41'),
(15, '5', '2022-11-17', NULL, 1, 1, 1, '2022-11-17 09:11:49', '2022-11-17 09:46:32'),
(16, '6', '2022-11-18', NULL, 1, 1, 1, '2022-11-18 07:50:15', '2022-11-18 07:51:42'),
(18, '7', '2022-11-18', NULL, 1, 1, 1, '2022-11-18 09:05:05', '2022-11-18 09:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `selling_qty` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-11-12', 1, 6, 11, 4, 75, 457, 0, '2022-11-12 07:19:17', '2022-11-12 07:19:17'),
(3, '2022-11-12', 3, 5, 4, 4, 45, 180, 0, '2022-11-12 07:30:02', '2022-11-12 07:30:02'),
(4, '2022-11-12', 4, 2, 6, 4, 45, 180, 0, '2022-11-12 07:32:00', '2022-11-12 07:32:00'),
(7, '2022-11-12', 7, 6, 11, 2, 451, 902, 0, '2022-11-12 08:53:55', '2022-11-12 08:53:55'),
(8, '2022-11-12', 7, 5, 4, 3, 74, 222, 0, '2022-11-12 08:53:55', '2022-11-12 08:53:55'),
(9, '2022-11-12', 8, 6, 11, 2, 451, 902, 0, '2022-11-12 08:55:42', '2022-11-12 08:55:42'),
(10, '2022-11-12', 8, 5, 4, 3, 74, 222, 0, '2022-11-12 08:55:42', '2022-11-12 08:55:42'),
(13, '2022-11-12', 11, 5, 4, 4, 45, 180, 0, '2022-11-12 09:16:20', '2022-11-12 09:16:20'),
(15, '2022-11-12', 14, 6, 11, 2, 47, 94, 0, '2022-11-12 13:17:41', '2022-11-12 13:17:41'),
(16, '2022-11-17', 15, 6, 11, 2, 45, 90, 0, '2022-11-17 09:11:50', '2022-11-17 09:11:50'),
(17, '2022-11-18', 16, 4, 12, 1, 75, 75, 1, '2022-11-18 07:50:15', '2022-11-18 07:51:42'),
(18, '2022-11-18', 16, 6, 9, 5, 75, 375, 1, '2022-11-18 07:50:15', '2022-11-18 07:51:42'),
(20, '2022-11-18', 18, 7, 13, 2, 105, 210, 1, '2022-11-18 09:05:05', '2022-11-18 09:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_11_03_181050_create_suppliers_table', 2),
(10, '2022_11_04_070506_create_customers_table', 3),
(11, '2022_11_05_175842_create_units_table', 4),
(12, '2022_11_05_181818_create_categories_table', 5),
(13, '2022_11_06_013153_create_products_table', 6),
(14, '2022_11_08_105121_create_purchases_table', 7),
(15, '2022_11_11_020957_create_invoices_table', 8),
(16, '2022_11_11_021559_create_invoice_details_table', 8),
(17, '2022_11_11_021634_create_payments_table', 8),
(18, '2022_11_11_021755_create_payment_details_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 42, 'partial_paid', 784, 150, 926, 56, '2022-11-12 07:19:17', '2022-11-12 07:19:17'),
(4, 4, 42, 'partial_paid', 145, 5, 150, 30, '2022-11-12 07:32:00', '2022-11-12 07:32:00'),
(5, 7, 44, 'partial_paid', 500, 546, 1046, 78, '2022-11-12 08:53:55', '2022-11-12 08:53:55'),
(6, 8, 45, 'partial_paid', 500, 546, 1046, 78, '2022-11-12 08:55:42', '2022-11-12 08:55:42'),
(8, 11, 47, 'full_paid', 180, 0, 180, 0, '2022-11-12 09:16:20', '2022-11-12 09:16:20'),
(10, 14, 48, 'partial_paid', 45, 47, 92, 2, '2022-11-12 13:17:42', '2022-11-12 13:17:42'),
(11, 15, 49, 'full_paid', 80, 0, 80, 10, '2022-11-17 09:11:50', '2022-11-17 09:11:50'),
(12, 16, 51, 'partial_paid', NULL, 430, 430, 20, '2022-11-18 07:50:15', '2022-11-18 07:50:15'),
(14, 18, 50, 'full_paid', 200, 0, 200, 10, '2022-11-18 09:05:05', '2022-11-18 09:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2022-11-12', NULL, '2022-11-12 07:19:18', '2022-11-12 07:19:18'),
(4, 4, 145, '2022-11-12', NULL, '2022-11-12 07:32:00', '2022-11-12 07:32:00'),
(5, 7, 500, '2022-11-12', NULL, '2022-11-12 08:53:55', '2022-11-12 08:53:55'),
(6, 8, 500, '2022-11-12', NULL, '2022-11-12 08:55:42', '2022-11-12 08:55:42'),
(8, 11, 180, '2022-11-12', NULL, '2022-11-12 09:16:20', '2022-11-12 09:16:20'),
(10, 14, 45, '2022-11-12', NULL, '2022-11-12 13:17:42', '2022-11-12 13:17:42'),
(11, 15, 80, '2022-11-17', NULL, '2022-11-17 09:11:50', '2022-11-17 09:11:50'),
(12, 16, NULL, '2022-11-18', NULL, '2022-11-18 07:50:15', '2022-11-18 07:50:15'),
(14, 18, 200, '2022-11-18', NULL, '2022-11-18 09:05:06', '2022-11-18 09:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `category_id`, `unit_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 1, 'wire', 10, 1, 1, NULL, '2022-11-06 09:50:38', '2022-11-08 08:48:34'),
(4, 9, 5, 1, 'Mango', 10, 1, 1, NULL, '2022-11-08 08:40:18', NULL),
(5, 5, 3, 4, 'Apple 8', 1, 1, 1, NULL, '2022-11-08 08:41:01', '2022-11-10 18:34:06'),
(6, 3, 2, 4, 'Ceiling Fan', 0, 1, 1, NULL, '2022-11-08 08:46:17', '2022-11-08 08:46:17'),
(7, 8, 3, 4, 'HP EliteBook G10', 2, 1, 1, NULL, '2022-11-08 08:45:57', '2022-11-10 11:24:52'),
(8, 9, 4, 3, 'Danu Milk', 0, 1, 1, NULL, '2022-11-08 08:47:27', NULL),
(9, 9, 6, 1, 'Rice', 5, 1, 1, NULL, '2022-11-08 09:06:17', '2022-11-18 07:51:42'),
(10, 9, 4, 3, 'Oil', 1, 1, 1, NULL, '2022-11-08 09:06:43', '2022-11-18 07:41:42'),
(11, 9, 6, 1, 'Onion', 3, 1, 1, NULL, '2022-11-08 09:08:02', '2022-11-18 06:45:31'),
(12, 9, 4, 2, 'Pran Chili Powder 200gram', 1, 1, 1, NULL, '2022-11-18 07:28:09', '2022-11-18 07:51:42'),
(13, 8, 7, 6, 'Mango Juice', 5, 1, 1, NULL, '2022-11-18 08:58:14', '2022-11-18 09:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 9, 6, 11, 'dsferw45', '2022-11-25', '5 product is sold out', 5, 450, 2250, 1, 1, NULL, '2022-11-10 07:58:10', '2022-11-10 11:15:33'),
(2, 5, 3, 7, '23FDJKQ4', '2022-11-29', NULL, 1, 78520, 78520, 1, 1, NULL, '2022-11-10 07:58:10', '2022-11-10 11:24:53'),
(4, 8, 3, 5, 'KS45KFQPLT', '2022-11-25', 'SOLD OUT', 1, 17900, 17900, 1, 1, NULL, '2022-11-10 11:42:08', '2022-11-10 18:34:06'),
(5, 9, 6, 9, 'FDT678QN', '2022-11-26', '10 KG RICE', 10, 85, 850, 1, 1, NULL, '2022-11-10 19:39:15', '2022-11-10 20:01:36'),
(7, 9, 4, 12, 'SFDJ69QT', '2022-11-04', '2 packet 200 gram', 3, 78, 156, 1, 1, NULL, '2022-11-18 07:41:00', '2022-11-18 07:41:47'),
(8, 9, 4, 10, 'SFDJ69QT', '2022-11-04', '1 kilo oil', 5, 190, 190, 1, 1, NULL, '2022-11-18 07:41:01', '2022-11-18 07:41:42'),
(9, 8, 7, 13, 'TR234KTQ', '2022-11-10', '7L Juice Purchased', 7, 85, 595, 1, 1, NULL, '2022-11-18 09:01:28', '2022-11-18 09:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'dulal sheikh', '01647113581', 'developer.mkarim@gmail.com', 'Panthpath, Dhaka, Bangladesh', 1, 1, NULL, '2022-11-03 21:24:18', '2022-11-08 08:31:37'),
(5, 'Md Mahmodul Karim', '01647113581', 'm.karimcu@gmail.com', 'Panthpath, Dhaka, Bangladesh', 1, 1, NULL, '2022-11-04 04:39:54', '2022-11-04 04:39:54'),
(8, 'Riad Rio', '3453523', 'riad@gmail.com', 'Panthpath, Dhaka, Bangladesh', 1, 1, NULL, '2022-11-08 08:34:06', NULL),
(9, 'Rashedul Haq', '645634234', 'rashed@gmail.com', 'Komilla, Chittagong', 1, 1, NULL, '2022-11-08 08:34:43', '2022-11-08 12:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'KG', 1, 1, NULL, '2022-11-05 13:19:47', '2022-11-06 08:59:36'),
(2, 'Gram', 1, 1, NULL, '2022-11-05 13:20:10', NULL),
(3, 'KL', 1, 1, NULL, '2022-11-05 13:21:18', '2022-11-08 08:37:11'),
(4, 'Piece', 1, 1, NULL, '2022-11-08 08:37:01', NULL),
(5, 'ml', 1, 1, NULL, '2022-11-18 07:30:36', NULL),
(6, 'Liter', 1, 1, NULL, '2022-11-18 07:35:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mahmodul Karim', 'm.karimcu@gmail.com', 'admin', 'profile-2022-11-19-0040.png', '2022-11-03 12:05:44', '$2y$10$vjjdgVnSrk8EL0WG9jc1IOGMqwQmBYZzB3G/WByiZh2KT98g29wdu', NULL, '2022-11-03 12:04:24', '2022-11-18 18:40:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
