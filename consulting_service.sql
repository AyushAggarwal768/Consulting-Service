-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2019 at 01:20 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.19-1+ubuntu17.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consulting_service`
--
CREATE DATABASE IF NOT EXISTS `consulting_service` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `consulting_service`;

-- --------------------------------------------------------

--
-- Table structure for table `a_category`
--

CREATE TABLE `a_category` (
  `cat_id` bigint(20) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `isIcon` smallint(6) NOT NULL DEFAULT '1',
  `is_deleted` smallint(6) NOT NULL DEFAULT '0',
  `deleted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_category`
--

INSERT INTO `a_category` (`cat_id`, `cat_name`, `img_path`, `isIcon`, `is_deleted`, `deleted_by`) VALUES
(1, 'Business and Corporate', 'uploads/f2017075302.jpg', 1, 0, '1'),
(3, 'Health and Fitness', 'uploads/bigimage/260117045737.JPG', 1, 0, NULL),
(4, 'Education and Learning', 'uploads/bigimage/260117050552.jpg', 1, 0, 'admin'),
(5, 'Shopping and Retail', 'uploads/bigimage/260117050805.jpg', 1, 0, NULL),
(6, 'Business and Corporate', 'uploads/bigimage/260117050855.jpg', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `a_category_products`
--

CREATE TABLE `a_category_products` (
  `cat_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_category_products`
--

INSERT INTO `a_category_products` (`cat_id`, `product_id`) VALUES
(1, 1),
(1, 8),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 7),
(3, 6),
(3, 9),
(3, 11),
(4, 4),
(4, 10),
(4, 11),
(4, 12),
(5, 5),
(5, 10),
(5, 12),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `b_product`
--

CREATE TABLE `b_product` (
  `pro_id` bigint(20) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `add_date` datetime DEFAULT NULL,
  `price` float DEFAULT '0',
  `discount` float(20,2) DEFAULT '0.00',
  `warranty` varchar(800) DEFAULT NULL,
  `description` text,
  `img_path` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `is_deleted` smallint(6) NOT NULL DEFAULT '0',
  `deleted_by` varchar(100) DEFAULT NULL,
  `vender_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_product`
--

INSERT INTO `b_product` (`pro_id`, `pro_name`, `add_date`, `price`, `discount`, `warranty`, `description`, `img_path`, `status`, `is_deleted`, `deleted_by`, `vender_id`) VALUES
(3, 'Bollywood Wallpaper', '2017-01-26 21:25:14', 855, 5.00, 'Dimentions 1000 X 400', 'image details', 'uploads/bigimage/260117045514.JPG', 1, 0, NULL, 1),
(4, 'Banner Images', '2017-01-26 21:27:37', 1500, 10.00, '1200 X 200', 'Banner Images', 'uploads/bigimage/260117045737.JPG', 1, 0, NULL, 1),
(5, 'Ganesha Wallpaper', '2017-01-26 21:35:52', 1500, 5.00, '1200 X 2000', 'Ganesha wallpaper', 'uploads/bigimage/260117050552.jpg', 1, 0, NULL, 1),
(7, 'Nature Wallpaper', '2017-01-26 21:38:55', 855, 10.00, '1200 X 1200', 'Nature Wallpaper', 'uploads/bigimage/260117050855.jpg', 1, 0, NULL, 1),
(8, 'Sunshne Wallpaper', '2017-01-26 21:39:46', 700, 5.00, '1500 X 1200', 'Sunshine Wallpaper', 'uploads/bigimage/260117050946.jpg', 1, 0, NULL, 1),
(9, '3D Wallpaper', '2017-01-26 21:40:32', 700, 10.00, '2000 X 1500', '3D Wallpaper', 'uploads/bigimage/260117051031.jpg', 1, 0, NULL, 1),
(10, 'ghfgh', '2017-02-04 12:50:09', 34, 1.00, 'hfghdgf', 'ghfhfhgh', 'uploads/bigimage/040217082009.jpg', 1, 0, NULL, 1),
(11, 'Testing 123', '2019-03-13 01:13:34', 300, 10.00, 'tetingindia', 'wertyuiqwertyuio', 'uploads/bigimage/130319011334.jpg', 1, 0, NULL, 18),
(12, 'Testing', '2019-04-18 01:29:35', 20000, 20.00, 'fhjkl; tyhjkl', 'wertyui 3rtyuiol', 'uploads/bigimage/180419012935.jpg', 1, 0, NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `i_order`
--

CREATE TABLE `i_order` (
  `od_id` int(10) UNSIGNED NOT NULL,
  `od_invoice` varchar(100) NOT NULL,
  `od_billing_amount` float(10,2) DEFAULT '0.00',
  `od_date` datetime DEFAULT NULL,
  `od_last_update` datetime DEFAULT NULL,
  `od_status` enum('Uncomplete','Paid','Completed','Cancelled') NOT NULL DEFAULT 'Completed',
  `od_billing_name` varchar(50) NOT NULL,
  `od_billing_address` varchar(100) NOT NULL,
  `od_billing_city` varchar(100) NOT NULL,
  `od_billing_state` varchar(100) DEFAULT NULL,
  `od_billing_postal_code` varchar(10) NOT NULL,
  `od_billing_email` varchar(255) NOT NULL,
  `od_billing_phone` varchar(16) NOT NULL,
  `od_shipping_name` varchar(50) NOT NULL,
  `od_shipping_address` varchar(100) NOT NULL,
  `od_shipping_city` varchar(100) NOT NULL,
  `od_shipping_state` varchar(100) DEFAULT NULL,
  `od_shipping_postal_code` varchar(10) NOT NULL,
  `od_shipping_phone` varchar(16) NOT NULL,
  `od_shipping_cost` decimal(10,2) DEFAULT '0.00',
  `payment_type` varchar(50) DEFAULT NULL,
  `card_no` varchar(20) DEFAULT NULL,
  `expiry` varchar(10) DEFAULT NULL,
  `cvv` int(10) DEFAULT NULL,
  `name_on_card` varchar(200) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `is_delete` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i_order`
--

INSERT INTO `i_order` (`od_id`, `od_invoice`, `od_billing_amount`, `od_date`, `od_last_update`, `od_status`, `od_billing_name`, `od_billing_address`, `od_billing_city`, `od_billing_state`, `od_billing_postal_code`, `od_billing_email`, `od_billing_phone`, `od_shipping_name`, `od_shipping_address`, `od_shipping_city`, `od_shipping_state`, `od_shipping_postal_code`, `od_shipping_phone`, `od_shipping_cost`, `payment_type`, `card_no`, `expiry`, `cvv`, `name_on_card`, `user_id`, `is_delete`) VALUES
(2, '100002', 200.00, '2017-02-02 00:46:31', '2017-02-02 00:46:31', 'Completed', 'Kamal Kant', 'Central Market Bodella, C Block Vikashpuri', 'New Delhi', 'Delhi', '110018', 'admin@gmail.com', '8588025044', '', 'Central Market Bodella, C Block Vikashpuri', 'New Delhi', 'Delhi', '110018', '8588025044', '0.00', 'Online', '1234567898989898', '10/2019', 123, 'Testing India', 1, 0),
(11, '100003', 700.00, '2019-03-14 01:15:34', '2019-03-14 01:15:34', 'Completed', 'Kamal Kant', 'Central Market Bodella, C Block Vikashpuri', 'New Delhi', 'Delhi', '110018', 'admin@gmail.com', '8588025044', '', 'Central Market Bodella, C Block Vikashpuri', 'New Delhi', 'Delhi', '110018', '8588025044', '0.00', 'Online', '234578', '234567', 23457890, '2345678', 1, 0),
(12, '100012', 700.00, '2019-03-14 01:15:56', '2019-03-14 01:15:56', 'Completed', 'Kamal Kant', 'Central Market Bodella, C Block Vikashpuri', 'New Delhi', 'Delhi', '110018', 'admin@gmail.com', '8588025044', '', 'Central Market Bodella, C Block Vikashpuri', 'New Delhi', 'Delhi', '110018', '8588025044', '0.00', 'Online', '234578', '234567', 23457890, '2345678', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `i_order_item`
--

CREATE TABLE `i_order_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `ostatus` int(10) DEFAULT '1' COMMENT '1=>Activate,2=>Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `i_order_item`
--

INSERT INTO `i_order_item` (`id`, `order_id`, `product_id`, `product_image`, `product_name`, `product_price`, `quantity`, `created`, `ostatus`) VALUES
(4, 2, 1, 'uploads/bigimage/260117044753.jpg', 'Zebra Wallpapeer', '200.00', 1, '2017-02-01 20:16:31', 1),
(5, 3, 5, 'uploads/bigimage/260117050552.jpg', 'Ganesha Wallpaper', '1500.00', 1, '2017-02-04 08:09:23', 1),
(6, 3, 3, 'uploads/bigimage/260117045514.JPG', 'Bollywood Wallpaper', '855.00', 1, '2017-02-04 08:09:23', 1),
(7, 4, 10, 'uploads/bigimage/040217082009.jpg', 'ghfgh', '34.00', 1, '2017-02-04 08:30:25', 1),
(8, 12, 8, 'uploads/bigimage/260117050946.jpg', 'Sunshne Wallpaper', '700.00', 1, '2019-03-14 01:15:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_payment`
--

CREATE TABLE `subscription_payment` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `name_on_card` varchar(100) DEFAULT NULL,
  `card_no` varchar(20) DEFAULT NULL,
  `expiry_date` varchar(50) DEFAULT NULL,
  `cvv` varchar(5) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_payment`
--

INSERT INTO `subscription_payment` (`id`, `user_id`, `name_on_card`, `card_no`, `expiry_date`, `cvv`, `payment_date`) VALUES
(1, 18, 'Kamal Kant', '89898989888989', '12/2019', '123', '2019-04-18 01:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `time_sheet`
--

CREATE TABLE `time_sheet` (
  `id` int(10) NOT NULL,
  `task` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `billable_hour` varchar(50) DEFAULT NULL,
  `work_hour` varchar(50) DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_sheet`
--

INSERT INTO `time_sheet` (`id`, `task`, `description`, `priority`, `type`, `billable_hour`, `work_hour`, `task_date`, `username`) VALUES
(1, 'Complete Projects', 'testing india', 'Medium', '', 'No', '30 Min', '2019-04-20', 'Ghanshyam Kumar'),
(3, 'ertyuio', 'ertyui', 'Low', 'Regular Time', 'Yes', '7 Hour', '2019-04-20', 'Ghanshyam Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `news_letter` varchar(50) DEFAULT 'yes',
  `password` varchar(25) NOT NULL,
  `utype` varchar(50) DEFAULT NULL,
  `ustatus` char(1) DEFAULT '1' COMMENT '1=>Active, 0=> Inactive',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `subscription_plan` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin_id`, `name`, `gender`, `email`, `mobile`, `address`, `city`, `state`, `pincode`, `news_letter`, `password`, `utype`, `ustatus`, `created`, `updated`, `subscription_plan`, `start_date`, `end_date`) VALUES
(1, NULL, 'Kamal Kant', NULL, 'admin@gmail.com', '8588025044', 'Central Market Bodella, C Block Vikashpuri', 'New Delhi', 'Delhi', '110018', 'yes', 'admin', 'admin', '1', '2016-11-19 21:58:52', '2016-11-19 21:58:52', NULL, NULL, NULL),
(2, NULL, 'Kamal Kant', NULL, 'kamal@gmail.com', '9898989898', NULL, NULL, NULL, NULL, 'yes', 'testing', 'user', '1', '2016-11-19 23:41:06', NULL, NULL, NULL, NULL),
(8, NULL, 'Ksma', NULL, 'info@kkretail.com', '80980', NULL, NULL, NULL, NULL, 'yes', 'kj;lk', 'user', '1', '2016-11-19 23:45:09', NULL, NULL, NULL, NULL),
(10, NULL, 'Ghanshyam Kumar', 'Female', 'ghanshyam@gmail.com', '9898989898', 'Testing india', 'New Delhi', 'Delhi', '110018', '', 'admin', 'user', '1', '2016-11-19 23:47:11', '2016-12-04 10:51:59', NULL, NULL, NULL),
(11, NULL, 'Hemant Kumar', NULL, 'hemant@gmail.com', '9898989898', NULL, NULL, NULL, NULL, 'yes', 'hemant', 'user', '1', '2016-11-19 23:48:23', NULL, NULL, NULL, NULL),
(16, NULL, 'Testing', NULL, 'india@gmail.com', '2222222222', NULL, NULL, NULL, NULL, 'yes', '12345', 'user', '1', '2017-02-04 12:46:03', NULL, NULL, NULL, NULL),
(17, NULL, 'Kamal Kant', NULL, 'kamal@yopmail.com', '9898989898', NULL, NULL, NULL, NULL, 'yes', 'admin', 'user', '1', '2019-03-10 17:21:33', NULL, NULL, NULL, NULL),
(18, NULL, 'KK Retail', NULL, 'kkretail@outlook.com', '989888787', 'Vikashpuri', 'New Delhi', 'Delhi', '110018', 'yes', 'admin', 'vender', '1', '2019-04-18 01:20:06', NULL, '1 Month Plan Rs. 199/-', '2019-04-18', '2019-05-18'),
(19, 18, 'Ghanshyam Kumar', NULL, 'ghk@gmail.com', '9898989898', NULL, NULL, NULL, NULL, 'yes', 'admin', 'employee', '1', '2019-04-20 00:33:21', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_state`
--

CREATE TABLE `z_state` (
  `StateID` bigint(20) NOT NULL,
  `State` varchar(100) NOT NULL DEFAULT '',
  `country_id` int(20) DEFAULT '1',
  `is_deleted` smallint(6) NOT NULL DEFAULT '0',
  `deleted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_state`
--

INSERT INTO `z_state` (`StateID`, `State`, `country_id`, `is_deleted`, `deleted_by`) VALUES
(1, 'Andhra Pradesh', 1, 0, NULL),
(2, 'Assam', 1, 0, NULL),
(3, 'Bihar', 1, 0, NULL),
(4, 'Chattisgarh', 1, 0, NULL),
(5, 'Chandigarh', 1, 0, NULL),
(6, 'Delhi', 1, 0, NULL),
(7, 'Goa', 1, 0, ''),
(8, 'Gujarat', 1, 0, NULL),
(9, 'Himachal Pradesh', 1, 0, NULL),
(10, 'Haryana', 1, 0, NULL),
(11, 'Jharkhand', 1, 0, NULL),
(12, 'Jammu &amp; Kashmir', 1, 0, NULL),
(13, 'Karnataka', 1, 0, NULL),
(14, 'Kerala', 1, 0, NULL),
(15, 'Maharastra', 1, 0, NULL),
(16, 'Madhya Pradesh', 1, 0, NULL),
(17, 'Orissa', 1, 0, NULL),
(18, 'Punjab', 1, 0, NULL),
(19, 'Pondicherry', 1, 0, NULL),
(20, 'Rajasthan', 1, 0, NULL),
(21, 'Tamilnadu', 1, 0, NULL),
(22, 'Uttarakand', 1, 0, NULL),
(23, 'Uttar Pradesh', 1, 0, 'admin'),
(24, 'West Bengal', 1, 0, 'admin'),
(25, 'testing', 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_category`
--
ALTER TABLE `a_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `a_category_products`
--
ALTER TABLE `a_category_products`
  ADD PRIMARY KEY (`cat_id`,`product_id`);

--
-- Indexes for table `b_product`
--
ALTER TABLE `b_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `i_order`
--
ALTER TABLE `i_order`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `i_order_item`
--
ALTER TABLE `i_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_payment`
--
ALTER TABLE `subscription_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_sheet`
--
ALTER TABLE `time_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email`);

--
-- Indexes for table `z_state`
--
ALTER TABLE `z_state`
  ADD PRIMARY KEY (`StateID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_category`
--
ALTER TABLE `a_category`
  MODIFY `cat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `b_product`
--
ALTER TABLE `b_product`
  MODIFY `pro_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `i_order`
--
ALTER TABLE `i_order`
  MODIFY `od_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `i_order_item`
--
ALTER TABLE `i_order_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subscription_payment`
--
ALTER TABLE `subscription_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `time_sheet`
--
ALTER TABLE `time_sheet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `z_state`
--
ALTER TABLE `z_state`
  MODIFY `StateID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
