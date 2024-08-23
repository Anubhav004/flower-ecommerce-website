-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 03:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user001`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Outdore'),
(2, 'Indore'),
(3, 'Creeper');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`, `timestamp`) VALUES
(1, 'arjun', 'arjun@gmail.com', 'test', 'sahhcuish soauhcasoc hasccho dfv', '2023-05-08 13:19:35'),
(2, 'arjun', 'arjun@gmail.com', 'test', 'sahhcuish soauhcasoc hasccho dfv', '2023-05-08 13:19:39'),
(3, 'Aman Prajapat', 'prajapat@gmail.com', 'plants', 'your plants are amazing', '2023-05-09 18:05:10'),
(4, 'Aman Prajapat', 'prajapat@gmail.com', 'plants', 'your plants are amazing', '2023-05-10 13:33:52'),
(5, 'Aman Prajapat', 'prajapat@gmail.com', 'plants', 'your plants are amazing', '2023-05-10 13:36:03'),
(6, 'Aman Prajapat', 'prajapat@gmail.com', 'plants', 'your plants are amazing', '2023-05-10 13:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `sno` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(11) NOT NULL,
  `cdt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`sno`, `product_id`, `product_name`, `product_price`, `quantity`, `total_price`, `name`, `phone`, `email`, `address`, `zip`, `cdt`) VALUES
(1, 2, 'Areca Palm - Plant', '399.00', 5, '1995.00', 'prakash singh', '9856375460', 'prakash@gmail.com', 'chaurahata ,jaipur', '463482', '2023-05-09 23:18:29'),
(2, 1, 'Hibiscus, Gudhal Flower', '319.00', 2, '638.00', 'Rajesh singh', '9178344692', 'rajesh@gmail.com', 'kailash puri, sikkim', '785344', '2023-05-09 23:21:31'),
(3, 3, 'Mogra, Arabian Jasmine', '299.00', 1, '299.00', 'Prince baghel', '9856757849', 'prince@gmail.com', 'khuttahi, bichiya kolkata', '652340', '2023-05-09 23:23:29'),
(4, 5, 'Peace Lily - Plant', '349.00', 6, '2094.00', 'Rupesh Tripathi', '7845390869', 'ru123@gmaail.com', 'block - b, sector 43, udaipur', '300237', '2023-05-09 23:25:41'),
(5, 6, 'Rubber Plant', '349.00', 3, '1047.00', 'harish kushwaha', '6908352376', 'harish@gmail.com', 'dhaura sekhpur, up', '265849', '2023-05-09 23:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `quantity`, `category_id`, `image`) VALUES
(1, 'Hibiscus, Gudhal Flower', 'Hibiscus is a popular flowering shrub that produces large, showy flowers in many colors. It likes full sun and moderate watering. Hibiscus can be grown in containers or planted directly in the ground.', '319.00', 10, 1, 'admin/uploads/hibiscus.jpg'),
(2, 'Areca Palm - Plant', 'The areca palm is a beautiful tropical plant that can add a touch of elegance to any outdoor space. It has feather-like fronds that can grow up to a height of 6-8 feet.', '399.00', 10, 1, 'admin/uploads/areca plants.png'),
(3, 'Mogra, Arabian Jasmine', 'Jasmine is a fragrant flowering plant often grown for its beautiful white or yellow flowers. Jasmine can be grown in containers or trained to climb trellises or walls.', '299.00', 10, 1, 'admin/uploads/jasmine.jpg'),
(4, 'Chlorophytum, Spider Plant', 'Spider plant helps clean indoor air. Studies have shown that spider plant is quite effective in cleaning indoor air by absorbing chemicals including formaldehyde, xylene, benzene, and carbon monoxide in homes or offices.', '179.00', 10, 2, 'admin/uploads/Spider plant.jpg'),
(5, 'Peace Lily - Plant', ' Peace lily is a beautiful indoor plant with glossy, dark green leaves and striking white flowers. It prefers bright, indirect light and moderate watering. Peace lily is also known for its air-purifying qualities and is a great choice for improving indoor air quality. ', '349.00', 10, 2, 'admin/uploads/Peace lily.jpg'),
(6, 'Rubber Plant', 'Rubber plant is a popular indoor plant with large, glossy leaves that can grow up to 8 inches in length. It prefers bright, indirect light and moderate watering. Rubber plant is also known for its air-purifying qualities and is a great choice for improving indoor air quality. ', '349.00', 10, 2, 'admin/uploads/Rubber plant.jpg'),
(7, 'Money Plant, Scindapsus Green', 'Money plants are renowned for bringing abundance into your life and multiplying your wealth manifold. This plant is considered the epitome of abundance and good luck. It is said to help you in attaining great heights both in the professional and personal spheres of life.', '159.00', 10, 3, 'admin/uploads/Money plants.jpg'),
(8, 'Bougainvillea (Any Color)', 'Bougainvillea is a beautiful vine plant known for its vibrant colors and showy flowers. It prefers full sun and little water. Bougainvillea can be grown in containers or trained to climb trellises or walls.', '299.00', 10, 3, 'admin/uploads/Bougainvillea.jpg'),
(9, 'Morning Glory - Plant', 'The morning glory flower can have many meanings, but the most common include love, life, and death, or even love in vain. Its ability to rise each morning and sleep each evening resembles human life.', '149.00', 10, 3, 'admin/uploads/Morning glory.png'),
(10, 'product 2', 'fdsuhfusdhfhfligfdgdf', '599.00', 10, 1, 'admin/uploads/Screenshot (121).png'),
(11, 'product 2', 'fdsuhfusdhfhfligfdgdf', '599.00', 10, 1, 'admin/uploads/Screenshot (121).png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pasword` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth` date NOT NULL,
  `cdt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `email`, `pasword`, `gender`, `birth`, `cdt`) VALUES
(1, 'arjun', 'arjun@gmail.com', '$2y$10$IjYwSlgRx1eKOZvl2cdPkeCOEVnn9BLveiLY6Fs5qHjXXUGcZ.pFW', 'male', '2023-04-14', '2023-04-26 15:07:39'),
(2, 'abb', 'ab@gmail.com', '$2y$10$cAjMG9G8qvOu/5ILGOR4tuHARFqzIWF9owZ04ByioQ8P2NeV3mzwm', 'male', '2023-04-07', '2023-04-26 15:13:38'),
(3, 'srk', 'srk@gmail.com', '$2y$10$MDO.5uXS0GoXx4uxjEvxq.wAll9led/SEcLmVu67qeeuGmYdYnDsy', 'male', '2023-04-14', '2023-04-26 16:44:19'),
(4, 'Aman Prajapat', 'prajapat@gmail.com', '$2y$10$.WmhxsnrcPxado.WTA8hz.w5HpKRrn0a9ruZ5mPuRyanr81cbEtlm', 'male', '1993-11-05', '2023-05-09 23:10:51'),
(5, 'subham sen', 'sen@gmail.com', '$2y$10$kguhPKoLrnYdqNq1HoKriO8mYopWVZ6DDe7s3QW8I.S3uWtu.ofBG', 'male', '1999-07-17', '2023-05-09 23:12:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
