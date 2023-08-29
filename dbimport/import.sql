SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE retail_system;
USE retail_system;

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `barcode` int(13) NOT NULL,
  `inventory` int(10) NOT NULL,
  `retail_price` decimal(2,2) NOT NULL,
  `default_cost` decimal(2,2) DEFAULT NULL,
  `tax_rate` decimal(5,2) DEFAULT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `vendor` varchar(100) DEFAULT NULL
);

ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `items`
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
  `country` varchar(30) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `notes` varchar(1500) DEFAULT NULL
);

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_amount` decimal(2,2) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `sale_date` datetime DEFAULT '2055-01-01 12:00:00'
);

ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/* Table to connect item IDs with sale IDs */
CREATE TABLE `sales_items` (
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`, `item_id`),
  FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`),
  FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
);

COMMIT;