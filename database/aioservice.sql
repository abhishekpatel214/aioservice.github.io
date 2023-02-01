-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 06:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aioservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(5) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `about_name` varchar(25) NOT NULL,
  `about_tittle` varchar(25) NOT NULL,
  `about_desc` varchar(255) NOT NULL,
  `about_email` varchar(25) NOT NULL,
  `about_insta` varchar(255) NOT NULL,
  `about_fb` varchar(255) NOT NULL,
  `crated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_image`, `about_name`, `about_tittle`, `about_desc`, `about_email`, `about_insta`, `about_fb`, `crated_at`) VALUES
(12, 'img-20211218-130520-354-600x577.jpg', 'Abhishek Patel', 'CEO  & DEVELOPER', 'धैर्य रखना, कभी निराश मत होना;\nजिसने तुमको बनाया है वो इस ब्रम्हांड का सबसे बड़ा लेखक है!', 'abhishek.ap7359@outlook.c', 'https://www.instagram.com/abhishek_prasad214/', 'https://www.facebook.com/mr.abhi.patel007/', '2022-02-03 00:00:00'),
(13, 'picsart-11-18-07.50.53-1-600x571.jpg', 'Rohit Singh', 'CEO & DEVELOPER', 'अगर जीवन में सफलता प्राप्त करनी है तो मेहनत पर विश्वास करें! किस्मत की आजमाईश तो जुए में होती हैं..', 'bpccsrohitsingh@gmail.com', 'https://www.instagram.com/rohit_singhrajput07/', 'https://www.facebook.com/profile.php?id=100022487921040', '2022-02-03 00:00:00'),
(14, 'whatsapp-image-2021-12-21-at-9.30.05-pm-774x920.jpg', 'Aman Singh', 'CEO  & MARKETING EXECUTIV', 'अपने लक्ष्य के लिए जोशीले और जुनूनी बनिए..विश्वास रखिए, परिश्रम का फल सफलता हि है…!', 'as7000234@gmail.com', 'https://www.instagram.com/am_singh07/', 'https://www.facebook.com/profile.php?id=100051212557053', '2022-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `booked_service`
--

CREATE TABLE `booked_service` (
  `book_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_location` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_time` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `item_cate` varchar(50) NOT NULL,
  `paymode` varchar(50) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `vender_id` int(5) NOT NULL,
  `vender_name` varchar(50) NOT NULL,
  `vender_email` varchar(50) NOT NULL,
  `vender_mobile` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `trash` varchar(20) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_service`
--

INSERT INTO `booked_service` (`book_id`, `order_id`, `user_id`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_location`, `order_date`, `order_time`, `item_name`, `item_image`, `item_cate`, `paymode`, `item_price`, `vender_id`, `vender_name`, `vender_email`, `vender_mobile`, `status`, `trash`, `created_at`) VALUES
(14, 12, 108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'vavol', 'Ahmedabad', '2022-03-10', '12:00 PM To 02:00 PM', 'Air Conditioner', '7-Things-to-Remember-When-Choosing-an-Air-Conditio', 'AC/Appliance Repair', 'COD', '599', 108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'Done at 03/01/2022 03:49:55', '1', '2022-03-01 20:19:44'),
(15, 13, 108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'vavol', 'Ahmedabad', '2022-03-09', '12:00 PM To 02:00 PM', ' Microwave', 'ifb-microwave-oven-repair-services-500x500.jpg', 'AC/Appliance Repair', 'COD', '299', 108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'Done at 03/01/2022 03:52:56', '1', '2022-03-01 20:22:46'),
(16, 14, 110, 'Abhishek Patel', 'ychouhan336@gmail.com', '0123456789', 'G-103, pramukh nagar ,sargasan, gandhinagar', 'Surat', '2022-03-14', '12:00 PM To 02:00 PM', 'Massage', 'man-relaxing-on-massage-table-260nw-579889267.jpg', 'Salon For Man', 'COD', '299', 108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'Done at 03/13/2022 06:06:01', '1', '2022-03-13 22:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(5) NOT NULL,
  `categorie_tittle` varchar(50) NOT NULL,
  `cate_subtittle` varchar(255) NOT NULL,
  `cate_image` varchar(255) NOT NULL,
  `crated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorie_id`, `categorie_tittle`, `cate_subtittle`, `cate_image`, `crated_at`) VALUES
(55, 'Electrician', 'Installs, Repairs and Wiring', 'electrician-600x337.jpg', '2022-01-29 00:00:00'),
(56, 'AC/Appliance Repair', 'Air Conditioner, Microwave, Refrigerator, Washing Machine, Water Purifier, TV Repair', 'aio-1-1024x683.jpg', '2022-01-29 00:00:00'),
(57, 'Plumber', 'Installation, Repairing, Pipe/Tap Fitting', 'plumber-600x400.jpg', '2022-01-29 00:00:00'),
(58, 'Carpenter', 'New Woodwork, New Furniture Making, Repairs & Fixes', 'carpenter-509x339.jpg', '2022-01-29 00:00:00'),
(59, 'Cleaning & Pest Control', 'Pest Control, Bathroom Cleaning, Kitchen Cleaning, Sofa & Carpet Cleaning, Full Home Cleaning', 'pest-control-600x400.jpg', '2022-01-29 00:00:00'),
(60, 'Computer ', 'Repairing, Formatting, Installation, Cleaning, Service', 'computer-600x400.jpg', '2022-01-29 00:00:00'),
(61, 'Salon For Man', 'Haircut, Massage, Shave, Face care, Hair Colour .etc', 'salon-for-man-600x400.jpg', '2022-01-29 00:00:00'),
(62, 'Salon For Woman', 'Haircut & Styling, Massage, Face care, Hair Colour .etc', 'salone-for-woman-600x400.jpg', '2022-01-29 00:00:00'),
(63, 'Printer ', 'Repairing, Installation, Service .etc', 'printer-repair-600x408.jpg', '2022-01-29 00:00:00'),
(64, 'Smartphone', 'Repairing, Display Change, Battery Change', 'mobile-500x334.jpg', '2022-01-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `categorie_id` int(5) NOT NULL,
  `categorie_tittle` varchar(25) NOT NULL,
  `feed_rating` varchar(10) NOT NULL,
  `feed_message` varchar(255) NOT NULL,
  `feed_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `user_id`, `user_name`, `user_email`, `user_mobile`, `categorie_id`, `categorie_tittle`, `feed_rating`, `feed_message`, `feed_image`, `created_at`) VALUES
(2, 26, 'abhishek', 'abhi.ar.patel143@gmail.com', '8758704414', 0, '', '2', 'Good', 'img-20211218-130520-354-600x577.jpg', '2022-02-04 00:00:00'),
(3, 26, 'abhishek kumar', 'abhi.ar.patel143@gmail.com', '8758704414', 0, '', '2', 'not have any suggetion', 'IMG_20220201_185757_Burst02.jpg', '2022-02-04 00:00:00'),
(4, 26, 'abhishek kumar', 'abhi@gmail.com', '8758704414', 0, '', '2', 'work done very fast', 'machanic-509x339.jpg', '2022-02-04 00:00:00'),
(5, 110, 'Abhishek Patel', 'abhishekpatel@gmail.com', '0123456789', 0, '', '5', 'Very Good Service', 'IMG_20220201_185757_Burst02.jpg', '2022-03-13 22:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locat_id` int(5) NOT NULL,
  `locat_name` varchar(50) NOT NULL,
  `crated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locat_id`, `locat_name`, `crated_at`) VALUES
(8, 'Ahmedabad', '2022-02-20 16:56:15'),
(9, 'Gandhinagar', '2022-02-20 16:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `oderdetail`
--

CREATE TABLE `oderdetail` (
  `order_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_location` varchar(11) NOT NULL,
  `paymode` varchar(50) NOT NULL,
  `order_date` varchar(55) NOT NULL,
  `alert` int(5) NOT NULL,
  `trash` varchar(10) NOT NULL DEFAULT '1',
  `order_time` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oderdetail`
--

INSERT INTO `oderdetail` (`order_id`, `user_id`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_location`, `paymode`, `order_date`, `alert`, `trash`, `order_time`) VALUES
(12, 108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'vavol', 'Ahmedabad', 'COD', '2022-03-10', 2, '1', '12:00 PM To 02:00 PM'),
(13, 108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'vavol', 'Ahmedabad', 'COD', '2022-03-09', 2, '1', '12:00 PM To 02:00 PM'),
(14, 110, 'Abhishek Patel', 'abhishekpatel@gmail.com', '0123456789', 'G-103, pramukh nagar ,sargasan, gandhinagar', 'Surat', 'COD', '2022-03-14', 2, '1', '12:00 PM To 02:00 PM'),
(15, 110, 'Abhishek Patel', 'abhishekpatel@gmail.com', '0123456789', 'G-103, pramukh nagar ,sargasan, gandhinagar', 'Mumbai', 'COD', '2022-04-08', 1, '1', '12:00 PM To 02:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `servicecart`
--

CREATE TABLE `servicecart` (
  `scart_id` int(5) NOT NULL,
  `Categorie_tittle` varchar(50) NOT NULL,
  `scart_name` varchar(50) NOT NULL,
  `scart_image` varchar(255) NOT NULL,
  `scart_price` varchar(10) NOT NULL,
  `scart_discount` varchar(10) NOT NULL,
  `crated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicecart`
--

INSERT INTO `servicecart` (`scart_id`, `Categorie_tittle`, `scart_name`, `scart_image`, `scart_price`, `scart_discount`, `crated_at`) VALUES
(18, 'Salon For Woman', 'Haircut & Styling', '1140-haircut-tangled-hair.imgcache.rev.web.900.518.jpg', '200', '250', '2022-02-03 00:00:00'),
(19, 'Salon For Woman', 'Massage', 'woman-lying-on-side-receiving-thai-massage.jpg', '500', '550', '2022-02-03 00:00:00'),
(20, 'Salon For Woman', 'Face care', 'face-of-women-getting-a-spa-treatment.jpg', '199', '250', '2022-02-03 00:00:00'),
(21, 'Salon For Woman', 'Hair Colour ', 'foils-1024x1024.jpg', '199', '250', '2022-02-03 00:00:00'),
(22, 'Salon For Man', 'Haircut', 'shutterstock_626287178-e1569518060862.jpg', '199', '399', '2022-02-03 00:00:00'),
(23, 'Salon For Man', 'Massage', 'man-relaxing-on-massage-table-260nw-579889267.jpg', '299', '399', '2022-02-03 00:00:00'),
(24, 'Salon For Man', 'Shave', 'trimming-beard-with-shaving-machine-advertising-barbershop-men-s-beauty-salon_255847-1422.jpg', '199', '299', '2022-02-03 00:00:00'),
(25, 'Salon For Man', 'Face care', 'istockphoto-1098349892-612x612.jpg', '299', '399', '2022-02-03 00:00:00'),
(26, 'Electrician', 'Wire Installation', 'Learn-the-Basics-of-Home-Electrical-Wiring-CoyneCollege-scaled.jpeg', '499', '599', '2022-02-03 00:00:00'),
(27, 'Electrician', 'Repairs and Wiring', 'istockphoto-937114374-612x612.jpg', '399', '499', '2022-02-03 00:00:00'),
(28, 'AC/Appliance Repair', 'Air Conditioner', '7-Things-to-Remember-When-Choosing-an-Air-Conditioner-Repair-Company-_-Air-Conditioning-Service-in-Fort-Worth-TX.jpg', '599', '799', '2022-02-03 00:00:00'),
(29, 'AC/Appliance Repair', ' Microwave', 'ifb-microwave-oven-repair-services-500x500.jpg', '299', '399', '2022-02-03 00:00:00'),
(30, 'AC/Appliance Repair', 'Refrigerator', 'Refrigerator-Repair-1200x675.jpeg', '599', '699', '2022-02-03 00:00:00'),
(31, 'AC/Appliance Repair', 'TV Repair', 'plasma-tv-repairing-500x500.jpg', '499', '699', '2022-02-03 00:00:00'),
(36, 'Plumber', 'Pipe cleaning anf fiting  For (7/4 f. Area)', 'istockphoto-1169433559-612x612.jpg', '900', '1100', '2022-03-31 21:39:11'),
(37, 'Carpenter', 'Furniture Making( Price Per Market Rate)', 'carpentry-and-loose-work-500x500.jpg', 'Min 500', '.', '2022-03-31 21:42:07'),
(38, 'Computer', 'PC Formate', 'computer-formatting-services-500x500.jpg', '500', '600', '2022-03-31 21:43:38'),
(39, 'Computer', 'Laptop Cleaning and Service', 'download (1).jfif', '800', '1000', '2022-03-31 21:45:51'),
(40, 'Computer', 'PC Cleaning and Service', 'desktops-repairing-services-500x500.jpg', '700', '900', '2022-03-31 21:47:11'),
(41, 'Printer', 'Cartridge Refilling (Lajer Printer Only) 250g.', 'laser-cartridge-refilling-laser-printer-cartridge-screwdriver-bottles-toner-table-office-equipment-maintenance-132578396.jpg', '250', '300', '2022-03-31 21:51:01'),
(42, 'Smartphone', 'Display Repair(As Per Market Rate)', 'technician-repairing-broken.jpg', '2000', '', '2022-03-31 21:54:07'),
(43, 'Cleaning & Pest Control', 'Full Home Cleaning (2 and 3 BHK Flat Only)', 'broomberg-home-cleaning-service.jpg', '2500', '3500', '2022-03-31 21:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `user_address` varchar(45) NOT NULL,
  `user_cate` varchar(50) NOT NULL,
  `user_locat` varchar(25) NOT NULL,
  `user_adhar` varchar(255) NOT NULL,
  `user_pan` varchar(255) NOT NULL,
  `user_certi` varchar(255) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_role` varchar(15) NOT NULL,
  `user_config` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_mobile`, `user_address`, `user_cate`, `user_locat`, `user_adhar`, `user_pan`, `user_certi`, `user_password`, `user_role`, `user_config`, `created_at`) VALUES
(26, 'abhishek kumar', 'abhi.ar.patel143@gmail.com', '8758704414', 'G-103273645', '', '', '', '', '', 'admin@123A', 'admin', 'valid', '2022-01-05 00:00:00'),
(108, 'Aman Singh', 'bpccsaman19@gmail.com', '7621841039', 'vavol', 'Electrician', 'Gandhinagar', '1.jfif', 'pan.jfif', 'up-shops-commarcial-establishmentt-act-500x500.jpg', 'admin@123A', 'vender', 'valid', '2022-02-20 20:14:53'),
(109, 'ashutosh', 'ashu@gmail.com', '9016300441', 'sargasan', '', '', '', '', '', 'admin@123A', 'customer', 'valid', '2022-02-26 20:26:51'),
(110, 'Abhishek Patel', 'abhishekpatel@gmail.com', '0123456789', 'G-103, pramukh nagar ,sargasan, gandhinagar', '', '', '', '', '', 'admin@123A', 'customer', 'valid', '2022-03-13 21:11:10'),
(111, 'Rohit Singh', 'anythingbhau@gmail.com', '2589631470', 'pethapur', 'Electrician', 'Gandhinagar', '1.jfif', 'pan.jfif', 'up-shops-commarcial-establishmentt-act-500x500.jpg', 'admin@123A', 'vender', 'valid', '2022-03-13 23:15:42'),
(112, 'ashutosh kumar', 'ashutosh@gmail.com', '6355224477', 'g-103', 'Electrician', 'Gandhinagar', 'download.jfif', 'downlosxsxsxsad (1).jfif', 'dowsdsdwqnload (1).jfif', 'admin@123A', 'vender', 'not', '2022-03-31 20:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_cate` varchar(55) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `trash` varchar(20) NOT NULL DEFAULT '1',
  `order_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `item_name`, `item_image`, `item_cate`, `item_price`, `trash`, `order_at`) VALUES
(12, 'Air Conditioner', '7-Things-to-Remember-When-Choosing-an-Air-Conditioner-Repair-Company-_-Air-Conditioning-Service-in-Fort-Worth-TX.jpg', 'AC/Appliance Repair', '599', '1', '2022-03-01 20:19:22'),
(13, ' Microwave', 'ifb-microwave-oven-repair-services-500x500.jpg', 'AC/Appliance Repair', '299', '1', '2022-03-01 20:22:25'),
(14, 'Massage', 'man-relaxing-on-massage-table-260nw-579889267.jpg', 'Salon For Man', '299', '1', '2022-03-13 21:26:04'),
(15, 'Repairs and Wiring', 'istockphoto-937114374-612x612.jpg', 'Electrician', '399', '1', '2022-03-31 20:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);
ALTER TABLE `about` ADD FULLTEXT KEY `about_image` (`about_image`,`about_name`,`about_tittle`,`about_desc`,`about_email`,`about_insta`,`about_fb`);

--
-- Indexes for table `booked_service`
--
ALTER TABLE `booked_service`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);
ALTER TABLE `categories` ADD FULLTEXT KEY `categorie_tittle` (`categorie_tittle`,`cate_subtittle`,`cate_image`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);
ALTER TABLE `feedback` ADD FULLTEXT KEY `user_name` (`user_name`,`user_email`,`user_mobile`,`categorie_tittle`,`feed_rating`,`feed_message`,`feed_image`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locat_id`);

--
-- Indexes for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `servicecart`
--
ALTER TABLE `servicecart`
  ADD PRIMARY KEY (`scart_id`);
ALTER TABLE `servicecart` ADD FULLTEXT KEY `Categorie_tittle` (`Categorie_tittle`,`scart_name`,`scart_image`,`scart_price`,`scart_discount`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
ALTER TABLE `users` ADD FULLTEXT KEY `user_name` (`user_name`,`user_email`,`user_mobile`,`user_address`,`user_cate`,`user_locat`,`user_adhar`,`user_pan`,`user_certi`,`user_password`,`user_role`,`user_config`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booked_service`
--
ALTER TABLE `booked_service`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oderdetail`
--
ALTER TABLE `oderdetail`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `servicecart`
--
ALTER TABLE `servicecart`
  MODIFY `scart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
