-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3333
-- Generation Time: Apr 09, 2025 at 12:41 AM
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
-- Database: `gestionetudiant`
--

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `designation`, `description`) VALUES
(1, 'GL', 'Génie Logiciel'),
(2, 'RT', 'Réseau et Télécommunication'),
(3, 'IMI', 'Instrumentation et Maintenance Industriel'),
(4, 'IIA', 'Informatique Industriel et Automatique'),
(5, 'CH', 'Chimie Industriel'),
(6, 'BIO', 'Biologie Industriel');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(500) NOT NULL,
  `section` enum('RT','GL','IMI','IIA','CH','BIO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `birthday`, `image`, `section`) VALUES
(24, 'Zahra', '0000-00-00', 'https://i.pinimg.com/736x/c0/b3/87/c0b3876a4e9b14e20bd4ed19298e4fb3.jpg', 'IIA'),
(25, 'Joseph', '2003-10-05', 'https://i.pinimg.com/736x/60/a1/71/60a1719d559469dbb6bfa1b6d0890e5e.jpg', 'BIO'),
(26, 'Mariem', '2006-04-17', 'https://i.pinimg.com/736x/20/f4/61/20f461e1f2c04fcd5cc45e7f5b0543ef.jpg', 'BIO'),
(27, 'Ali', '2005-07-25', 'https://i.pinimg.com/736x/07/aa/40/07aa408d0baa7174fc37fb17d737d7cd.jpg', 'GL'),
(28, 'Salma', '2006-01-08', 'https://i.pinimg.com/736x/cb/00/c2/cb00c2cba4abea261789c53eca0badfc.jpg', 'RT'),
(29, 'Houssem', '2005-09-12', 'https://i.pinimg.com/736x/62/bf/e3/62bfe37475a41cded8afdb920be78544.jpg', 'IMI'),
(30, 'Rania', '2006-03-05', 'https://i.pinimg.com/736x/ec/e4/e4/ece4e4e77b6a2bebee2478bdcab86e8f.jpg', 'IIA'),
(32, 'Nour', '2006-06-21', 'https://i.pinimg.com/736x/89/18/c5/8918c541e3c5f5eef68909016a9cac2b.jpg', 'BIO'),
(33, 'Omar', '2005-12-07', 'https://i.pinimg.com/736x/1e/04/2e/1e042eedb1f2037a8e4a418fd5fa286d.jpg', 'GL'),
(34, 'Ines', '2006-07-30', 'https://i.pinimg.com/736x/37/dc/dc/37dcdc327c8317658eb58ceccdf16a84.jpg', 'RT'),
(35, 'Wassim', '2005-04-11', 'https://i.pinimg.com/736x/a8/58/bb/a858bb5b587fd5ab8348587a043530d7.jpg', 'IMI'),
(36, 'Siwar', '2006-08-19', 'https://i.pinimg.com/736x/a5/5e/7f/a55e7fef001ef400c534863aab223500.jpg', 'IIA'),
(37, 'Aziz', '2005-02-28', 'https://i.pinimg.com/736x/25/33/8f/25338f488af2c45912c15ebab325e363.jpg', 'CH'),
(38, 'Hana', '2006-09-14', 'https://i.pinimg.com/736x/65/37/5c/65375c9c4a88506199c93cbad075e10a.jpg', 'BIO'),
(39, 'Malek', '2005-01-25', 'https://i.pinimg.com/736x/2e/f4/85/2ef485b91354483bd0bd6b11142bc8b7.jpg', 'GL'),
(40, 'Sarra', '2006-10-31', 'https://i.pinimg.com/736x/3f/6f/e5/3f6fe5d278ae4ab103ec57e87d1ec0ff.jpg', 'RT'),
(41, 'Raghd', '2007-08-08', 'https://i.pinimg.com/736x/33/6f/87/336f87ada5a01f2e7adeb3100092dfa0.jpg', 'RT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Aymen22', 'aymen.sellaouti@insat.ucar.tn', 'aymen123', 'admin'),
(2, 'Sonia02', 'sonia.mejri@insat.ucar.tn', 'sonia123', 'user'),
(3, 'Houssem99', 'houssem.hanafi@gmail.com', 'houssem123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
