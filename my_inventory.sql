-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 02:46 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(3) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `kategori`, `created_at`, `updated_at`) VALUES
(10, 'beras', '2018-12-12 08:57:38', '2018-12-12 08:57:38'),
(11, 'minyak goreng', '2018-12-12 08:57:53', '2018-12-12 08:57:53'),
(12, 'gula', '2018-12-12 08:58:57', '2018-12-12 08:58:57'),
(13, 'kopi', '2018-12-12 08:59:06', '2018-12-12 08:59:06'),
(17, 'teh', '2018-12-13 20:34:44', '2018-12-13 20:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id_customer` int(3) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `nama_konsumen`, `created_at`, `updated_at`) VALUES
(1, 'Konsumen A', '2018-11-27 06:11:23', '2018-12-06 21:18:48'),
(3, 'Konsumen B', '2018-11-30 16:28:15', '2018-12-06 21:18:58'),
(5, 'konsumen C', '2018-12-07 23:39:36', '2018-12-07 23:39:36'),
(6, 'Konsumen D', '2018-12-12 09:01:57', '2018-12-12 09:01:57'),
(7, 'Konsumen E', '2018-12-12 09:02:11', '2018-12-12 09:02:11'),
(8, 'Konsumen F', '2018-12-16 00:32:08', '2018-12-16 00:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_category` int(3) NOT NULL,
  `harga_beli` int(10) DEFAULT NULL,
  `harga_jual` int(10) DEFAULT NULL,
  `stok` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `nama_barang`, `id_category`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(201801001, 'Beras A', 10, 140000, 150000, 80, '2018-12-12 09:10:15', '2018-12-12 09:10:15'),
(201801002, 'Beras B', 10, 130000, 140000, 66, '2018-12-12 09:11:39', '2018-12-12 09:11:39'),
(201801003, 'Beras C', 10, 120000, 130000, 68, '2018-12-12 09:14:36', '2018-12-12 09:14:36'),
(201801004, 'Beras D', 10, 110000, 120000, 61, '2018-12-12 09:15:20', '2018-12-12 09:15:20'),
(201801005, 'Beras E', 10, 100000, 110000, 70, '2018-12-12 09:17:57', '2018-12-12 09:17:57'),
(201802001, 'Minyak Goreng A', 11, 29000, 30000, 80, '2018-12-12 09:18:50', '2018-12-12 09:18:50'),
(201802002, 'Minyak Goreng B', 11, 28000, 29000, 72, '2018-12-12 09:21:00', '2018-12-12 09:21:00'),
(201802003, 'Minyak Goreng C', 11, 27000, 28000, 50, '2018-12-12 09:22:05', '2018-12-12 09:22:05'),
(201802004, 'Minyak Goreng Curah', 11, 26000, 27000, 50, '2018-12-12 09:23:16', '2018-12-14 01:03:21'),
(201803001, 'Gula A', 12, 18000, 19000, 70, '2018-12-12 09:33:49', '2018-12-12 09:33:49'),
(201803002, 'Gula B', 12, 17000, 18000, 50, '2018-12-12 09:35:33', '2018-12-12 09:35:33'),
(201804001, 'Kopi A', 13, 30000, 32000, 70, '2018-12-12 09:37:43', '2018-12-12 09:37:43'),
(201804002, 'Kopi B', 13, 29000, 31000, 100, '2018-12-12 09:39:31', '2018-12-12 09:39:31'),
(201804003, 'Kopi C', 13, 28000, 30000, 50, '2018-12-12 19:53:46', '2018-12-12 19:53:46'),
(201805001, 'Teh Kotak', 10, 4500, 5000, 10, '2018-12-14 10:10:02', '2018-12-16 00:34:55'),
(201901008, 'Teh A', 17, 7500, 9000, 30, '2019-01-07 01:01:57', '2019-01-07 01:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_supplier` int(3) NOT NULL,
  `qty` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id_purchase`, `id_product`, `id_supplier`, `qty`, `status`, `date`, `updated_at`) VALUES
(13, 201804001, 5, 20, 1, '2018-12-13 06:08:24', '2018-12-13 09:34:46'),
(14, 201804002, 5, 20, 1, '2018-12-13 06:08:39', '2018-12-13 09:34:46'),
(15, 201803001, 3, 20, 1, '2018-12-14 02:32:47', '2018-12-16 01:01:19'),
(16, 201804002, 3, 30, 1, '2018-12-14 02:32:58', '2018-12-16 01:01:19'),
(17, 201801001, 3, 20, 0, '2018-12-16 08:01:33', '2018-12-16 01:01:33'),
(18, 201802001, 3, 30, 0, '2018-12-16 08:01:41', '2018-12-16 01:01:41'),
(19, 201801001, 3, 10, 0, '2019-01-04 21:56:53', NULL),
(20, 201802002, 3, 5, 0, '2019-01-04 21:57:06', NULL);

--
-- Triggers `purchases`
--
DELIMITER $$
CREATE TRIGGER `cancel_purchase` AFTER DELETE ON `purchases`
 FOR EACH ROW BEGIN
	UPDATE products SET stok = products.stok - OLD.qty
	WHERE id_product = OLD.id_product;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `purchases_product` AFTER INSERT ON `purchases`
 FOR EACH ROW BEGIN 
	UPDATE products SET stok=stok+NEW.qty
	WHERE id_product=NEW.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE IF NOT EXISTS `sells` (
  `id_sell` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(3) NOT NULL,
  `qty` int(4) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id_sell`, `id_product`, `id_customer`, `qty`, `status`, `date`, `updated_at`) VALUES
(49, 201801003, 5, 2, 1, '2018-12-23 00:00:00', '2018-12-23 13:17:40'),
(50, 201802002, 5, 3, 1, '2018-12-23 00:00:00', '2018-12-23 13:17:40'),
(51, 201801004, 1, 5, 1, '2018-12-23 00:00:00', '2018-12-23 13:17:40'),
(52, 201801004, 3, 4, 1, '2018-12-23 00:00:00', '2018-12-23 06:18:01'),
(53, 201801002, 1, 4, 1, '2018-12-23 21:13:46', '2018-12-23 14:13:58');

--
-- Triggers `sells`
--
DELIMITER $$
CREATE TRIGGER `cancel_sell` AFTER DELETE ON `sells`
 FOR EACH ROW BEGIN
	UPDATE products SET stok = products.stok + OLD.qty
	WHERE id_product = OLD.id_product;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sells_product` AFTER INSERT ON `sells`
 FOR EACH ROW BEGIN 
	UPDATE products SET stok=stok-NEW.qty
	WHERE id_product=NEW.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id_supplier` int(3) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `nama_supplier`, `created_at`, `updated_at`) VALUES
(3, 'Supplier 1', '2018-11-27 02:01:36', '2018-12-06 21:18:13'),
(5, 'Supplier 2', '2018-11-30 16:27:49', '2018-12-06 21:18:23'),
(6, 'Supplier 3', '2018-12-06 21:18:35', '2018-12-06 21:18:35'),
(8, 'Supplier 4', '2018-12-12 09:01:18', '2018-12-12 09:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Arif', 'arif@contoh.com', '$2y$10$p2ih9YHRlyrQxbM2gG/ytO4f/2hdKEFNhSjJLBK0MJjQ.BziMoYgC', 'ADMIN', 'sCNjjCYVCHfUX2pi6Awv0CdNwvFU4jSTTd2fPRAJQSG70LtcDSUtq6NPsCcR', '2018-11-22 18:04:05', '2018-11-22 18:04:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`), ADD KEY `nama` (`nama_barang`), ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`), ADD KEY `id_product` (`id_product`), ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id_sell`), ADD KEY `id_product` (`id_product`), ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id_sell` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`),
ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sells`
--
ALTER TABLE `sells`
ADD CONSTRAINT `sells_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sells_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
