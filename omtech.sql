-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2026 at 06:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL DEFAULT 1,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image1`, `image2`, `image3`) VALUES
(1, 'uploads/about/about_1_1771604661.jpg', 'uploads/about/about_2_1771604661.jpg', 'uploads/about/about_3_1771604668.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT 'Admin',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_description`, `description`, `image1`, `image2`, `image3`, `image4`, `author`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABCD', 'ABCD', '<p>ABCDABCD</p>', 'uploads/blogs/blog_1771610269_1.png', 'uploads/blogs/blog_1771610269_2.png', '', '', 'Admin', 'active', '2026-02-20 17:57:49', '2026-02-20 17:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart_added`
--

CREATE TABLE `cart_added` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_added`
--

INSERT INTO `cart_added` (`id`, `first_name`, `last_name`, `email`, `phone`, `product_id`, `created_at`) VALUES
(1, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 1, '2026-02-20 17:24:55'),
(2, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 1, '2026-02-20 17:51:39'),
(3, 'kishan', 'patel', 'kishan7112@gmail.com', '+919375924997', 1, '2026-02-20 17:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `status`, `created_at`) VALUES
(1, 'Dulex', 'uploads/categories/cat_1771605002.png', 'active', '2026-02-20 16:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('pending','responded','closed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'KISHAN', 'fedipel984@bitonc.com', 'a', 'a', 'pending', '2026-02-20 17:27:29'),
(2, 'a', 'kishan7112@gmail.com', 'a', 'a', 'pending', '2026-02-20 17:28:41'),
(3, 'a', 'kishan7112@gmail.com', 'a', 'a', 'pending', '2026-02-20 17:28:50'),
(4, 'Test User', 'test@example.com', 'Test Subject', 'Test Message', 'pending', '2026-02-20 17:34:12'),
(5, 'a', 'punitt@gmail.com', 'a', 'a', 'pending', '2026-02-20 17:34:50'),
(6, 'a', 'punitt@gmail.com', 'a', 'a', 'pending', '2026-02-20 17:36:14'),
(7, 'a', 'punitt@gmail.com', 'a', 'a', 'pending', '2026-02-20 17:37:01'),
(8, 'aa', 'info@creativewebcrafters.inn', 'aa', 'aa', 'pending', '2026-02-20 17:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `tertiary_category_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `short_technical_specifications` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `long_specifications` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `tertiary_category_id`, `product_name`, `sku`, `price`, `brand_name`, `short_description`, `short_technical_specifications`, `description`, `long_specifications`, `image1`, `image2`, `image3`, `image4`, `status`, `created_at`) VALUES
(1, 1, 1, 1, 'ABCD', 'ABC-10', 150.00, 'abcd', '<ul>\r\n	<li>A</li>\r\n	<li>B</li>\r\n</ul>\r\n', '<ul>\r\n	<li>A</li>\r\n	<li>B</li>\r\n</ul>\r\n', '<ol>\r\n	<li>a</li>\r\n	<li>a</li>\r\n	<li>a</li>\r\n	<li>a</li>\r\n</ol>\r\n', '<ul>\r\n	<li>A</li>\r\n	<li>A</li>\r\n	<li>A</li>\r\n	<li>A</li>\r\n</ul>\r\n', 'uploads/products/prod_1_1771605938_3492.png', 'uploads/products/prod_2_1771605938_2773.png', 'uploads/products/prod_3_1771605938_7864.png', 'uploads/products/prod_4_1771605938_4299.png', 'active', '2026-02-20 16:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL CHECK (`stars` >= 1 and `stars` <= 5),
  `description` text NOT NULL,
  `review_date` date NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `customer_name`, `stars`, `description`, `review_date`, `status`, `created_at`) VALUES
(1, 1, 'KISHAN PATEL', 4, 'aa', '2026-02-20', 'active', '2026-02-20 17:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `status`, `created_at`) VALUES
(1, 1, 'sub cat 1', 'active', '2026-02-20 16:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `tag_line`
--

CREATE TABLE `tag_line` (
  `id` int(11) NOT NULL DEFAULT 1,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_line`
--

INSERT INTO `tag_line` (`id`, `content`) VALUES
(1, 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ');

-- --------------------------------------------------------

--
-- Table structure for table `tertiary_categories`
--

CREATE TABLE `tertiary_categories` (
  `id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `tertiary_category_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tertiary_categories`
--

INSERT INTO `tertiary_categories` (`id`, `sub_category_id`, `tertiary_category_name`, `status`, `created_at`) VALUES
(1, 1, 'third cat 1', 'active', '2026-02-20 16:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `welcome_popup`
--

CREATE TABLE `welcome_popup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `welcome_popup`
--

INSERT INTO `welcome_popup` (`id`, `title`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Omtech!ssssssssssss', 'Explore our industrial automation solutions.ssssssssssssss', 1, '2026-02-20 17:48:32', '2026-02-20 17:50:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_added`
--
ALTER TABLE `cart_added`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tag_line`
--
ALTER TABLE `tag_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tertiary_categories`
--
ALTER TABLE `tertiary_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `welcome_popup`
--
ALTER TABLE `welcome_popup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_added`
--
ALTER TABLE `cart_added`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tertiary_categories`
--
ALTER TABLE `tertiary_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `welcome_popup`
--
ALTER TABLE `welcome_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_added`
--
ALTER TABLE `cart_added`
  ADD CONSTRAINT `cart_added_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tertiary_categories`
--
ALTER TABLE `tertiary_categories`
  ADD CONSTRAINT `tertiary_categories_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
