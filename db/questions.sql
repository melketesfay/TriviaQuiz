-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Feb 29, 2024 at 03:16 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PHP',
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `field`, `status`) VALUES
(1, 'What does PHP stand for?', 'PHP', 1),
(2, 'PHP server scripts are surrounded by delimiters, which?', 'PHP', 1),
(3, 'How do you write \"Hello World\" in PHP', 'PHP', 1),
(4, 'All variables in PHP start with which symbol?', 'PHP', 1),
(5, 'What is the correct way to end a PHP statement?', 'PHP', 1),
(6, 'The PHP syntax is most similar to:', 'PHP', 1),
(7, 'How do you get information from a form that is submitted using the \"get\" method?', 'PHP', 1),
(8, 'When using the POST method, variables are displayed in the URL:', 'PHP', 1),
(9, 'In PHP you can use both single quotes ( \' \' ) and double quotes ( \" \" ) for strings:', 'PHP', 1),
(10, 'Include files must have the file extension \".inc\"', 'PHP', 1),
(11, 'What is the correct way to include the file \"time.inc\" ?', 'PHP', 1),
(12, 'What is the correct way to create a function in PHP?', 'PHP', 1),
(13, 'What is the correct way to open the file \"time.txt\" as readable?', 'PHP', 1),
(14, 'PHP allows you to send emails directly from a script', 'PHP', 1),
(15, 'Which superglobal variable holds information about headers, paths, and script locations?', 'PHP', 1),
(16, 'What is the correct way to add 1 to the $count variable?', 'PHP', 1),
(17, 'What is a correct way to add a comment in PHP?', 'PHP', 1),
(18, 'PHP can be run on Microsoft Windows IIS(Internet Information Server):', 'PHP', 1),
(19, 'The die() and exit() functions do the exact same thing.', 'PHP', 1),
(20, 'Which one of these variables has an illegal name?', 'PHP', 1),
(21, 'How do you create a cookie in PHP?', 'PHP', 1),
(22, 'In PHP, the only way to output text is with echo.', 'PHP', 1),
(23, 'How do you create an array in PHP?', 'PHP', 1),
(24, 'The if statement is used to execute some code only if a specified condition is true', 'PHP', 1),
(25, 'Which operator is used to check if two values are equal and of same data type?', 'PHP', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
