-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Feb 29, 2024 at 03:14 PM
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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionID` int NOT NULL,
  `value` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `questionID`, `value`) VALUES
(27, 'PHP: Hypertext Preprocessor', 1, 1),
(28, 'Private Home Page', 1, 0),
(29, 'Personal Hypertext Processor', 1, 0),
(30, '<?php...?>', 2, 1),
(31, '<script>...</script>', 2, 0),
(32, '<?php>...</?>', 2, 0),
(33, '<&>...</&>', 2, 0),
(34, 'echo \"Hello World\"; ', 3, 1),
(35, '\"Hello World\";', 3, 0),
(36, 'Document.Write(\"Hello World\");', 3, 0),
(37, '$', 4, 1),
(38, '&', 4, 0),
(39, '!', 4, 0),
(40, ';', 5, 1),
(41, '</php>', 5, 0),
(42, '.', 5, 0),
(43, 'New line', 5, 0),
(44, 'JavaScript', 6, 0),
(45, 'VBScript', 6, 0),
(46, 'Perl and C ', 6, 1),
(47, '$_GET[];', 7, 1),
(48, 'Request.QueryString;', 7, 0),
(49, 'Request.Form;', 7, 0),
(50, 'False', 8, 1),
(51, 'True', 8, 0),
(52, 'True', 9, 1),
(53, 'False', 9, 0),
(54, 'False', 10, 1),
(55, 'True', 10, 0),
(60, '\"<?php include \"time.inc\"; ?>\"', 11, 1),
(61, '<?php include file=\"time.inc\"; ?>', 11, 0),
(62, '<?php include:\"time.inc\"; ?>', 11, 0),
(63, '<!-- include file=\"time.inc\" -->', 11, 0),
(64, 'function myFunction()', 12, 1),
(65, 'create myFunction()', 12, 0),
(66, 'new_function myFunction()', 12, 0),
(67, 'fopen(\"time.txt\",\"r\"); ', 13, 1),
(68, 'fopen(\"time.txt\",\"r+\");', 13, 0),
(69, 'open(\"time.txt\",\"read\");', 13, 0),
(70, 'open(\"time.txt\");', 13, 0),
(71, 'True', 14, 1),
(72, 'False', 14, 0),
(73, '$_SERVER ', 15, 1),
(74, '$_SESSION', 15, 0),
(75, '$_GET', 15, 0),
(76, '$GLOBALS', 15, 0),
(77, '$count++;', 16, 1),
(78, '$count =+1', 16, 0),
(79, 'count++;', 16, 0),
(80, '++count', 16, 0),
(81, '/*...*/', 17, 1),
(82, '<!--...-->', 17, 0),
(83, '<comment>...</comment>', 17, 0),
(84, '*\\...\\*', 17, 0),
(85, 'True', 18, 1),
(86, 'False', 18, 0),
(87, 'False', 19, 0),
(88, 'True', 19, 1),
(89, '$my-Var ', 20, 1),
(90, '$myVar', 20, 0),
(91, '$my_Var', 20, 0),
(92, 'setcookie()', 21, 1),
(93, 'makecookie()', 21, 0),
(94, 'createcookie', 21, 0),
(95, 'False', 22, 1),
(96, 'True', 22, 0),
(97, '$cars = array(\"Volvo\", \"BMW\", \"Toyota\");', 23, 1),
(98, '$cars = \"Volvo\", \"BMW\", \"Toyota\";', 23, 0),
(99, '$cars = array[\"Volvo\", \"BMW\", \"Toyota\"];', 23, 0),
(100, 'True', 24, 1),
(101, 'False', 24, 0),
(102, '===', 25, 1),
(103, '!=', 25, 0),
(104, '=', 25, 0),
(105, '==', 25, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionAnswerrelation` (`questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `questionAnswerrelation` FOREIGN KEY (`questionID`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
