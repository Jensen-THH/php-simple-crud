-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 06:51 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_simple`
--

-- --------------------------------------------------------

--
-- Table  `college_student`
--

CREATE TABLE `college_student` (
  `student_id` varchar(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `majors` varchar(40) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `address` text NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_student`
--

-- INSERT INTO `college_student` (`student_id`, `name`, `majors`, `gender`, `address`) VALUES
-- ('1111', 'Jensen', 'Website programing', 'Male', 'Tây Nguyên, Việt Nam'),
-- ('2222', 'James', 'Website programing', 'Male', 'Tây Nguyên, Việt Nam'),
-- ('3333', 'Jimpel', 'Website programing', 'Male', 'Tây Nguyên, Việt Nam'),
-- ('4444', 'Joker', 'Website programing', 'Male', 'Tây Nguyên, Việt Nam'),
-- ('5555', 'Juykie', 'Website programing', 'Male', 'Tây Nguyên, Việt Nam');


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'jensen', '123456789'),
(2, 'admin', 'admin');
COMMIT;

--
-- Indexes for table `college_student`,`users`
--
ALTER TABLE `college_student`
  ADD PRIMARY KEY (`student_id`);
COMMIT;

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`);
COMMIT;
