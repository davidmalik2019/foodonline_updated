-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2026 at 07:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie_delight`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'John Paul', 'egbunumalikdavid@gmail.com', '07056425525', '$2y$10$1sZKFUu0C.PYctbuOJ2w3e4uiDhSDjU9yeUwUIMaEMt4NN6YNyxiy', '2026-07-15 04:17:52'),
(2, 'Elizabeth', 'admin@gmail.com', '07038664555', '$2y$10$Hp3Md4ERUl800ul56sBSaur6ABe4eptcX6U9UUggBri./42aHJgny', '2026-07-15 04:38:19'),
(3, 'David', 'fountainbusiness@gmail.com', '08164770129', '$2y$10$WDyqot3rYrWkshZxeGxuuuVAa5pRdeNbq.9B8co9Uj4Y4c08UF/S2', '2026-07-15 04:49:31'),
(4, 'Richard', 'richard@gmail.com', '07036545998', '$2y$10$hYhF864a10m1wby6OQGdz.PzW1IeLBhg8QAY1RwmuNrqJbxL2LAGi', '2026-07-15 05:09:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
