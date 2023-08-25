SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE retail_system;
USE retail_system;

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `barcode` int(13) DEFAULT NULL,
  `inventory` int(10) NOT NULL,
  `retail_price` decimal(2,2) DEFAULT NULL,
  `default_cost` decimal(2,2) DEFAULT NULL,
  `tax_rate` decimal(5,2) DEFAULT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `vendor` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `notes` varchar(1500) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;



COMMIT;