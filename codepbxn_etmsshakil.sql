-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2021 at 12:39 AM
-- Server version: 10.3.31-MariaDB-log-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codepbxn_etmsshakil`
--

-- --------------------------------------------------------

--
-- Table structure for table `em_admin`
--

CREATE TABLE `em_admin` (
  `ad_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `em_admin`
--

INSERT INTO `em_admin` (`ad_id`, `username`, `password`, `name`, `designation`) VALUES
(1, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin', 'Administator');

-- --------------------------------------------------------

--
-- Table structure for table `em_attendance`
--

CREATE TABLE `em_attendance` (
  `at_id` int(11) NOT NULL,
  `em_id` varchar(100) NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT 0,
  `user_time` datetime NOT NULL,
  `sys_time` datetime NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `device_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `em_attendance`
--

INSERT INTO `em_attendance` (`at_id`, `em_id`, `attendance`, `user_time`, `sys_time`, `latitude`, `longitude`, `ip_address`, `device_details`) VALUES
(1, '1', 1, '2020-12-22 12:20:00', '2020-12-22 07:22:14', '25.496774199999997', '88.94868459999999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(2, '2', 1, '2020-12-22 12:30:00', '2020-12-22 07:31:59', '25.496766200000003', '88.9486373', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(3, '3', 1, '2020-12-22 19:20:00', '2020-12-22 14:20:34', '25.4967765', '88.94868609999999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(4, '1', 1, '2020-12-23 22:40:00', '2020-12-23 17:40:58', '25.4967509', '88.9486866', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(5, '1', 1, '2020-12-24 10:50:00', '2020-12-24 17:52:37', '25.4962932', '88.9533563', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36'),
(6, '3', 1, '2020-12-24 22:10:00', '2020-12-24 17:58:48', '25.4962932', '88.9533563', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36'),
(7, '2', 1, '2020-12-24 21:40:00', '2020-12-24 18:04:11', '25.4962932', '88.9533563', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36'),
(8, '1', 1, '2020-12-25 00:20:00', '2020-12-25 00:20:18', '25.4962932', '88.9533563', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36'),
(9, '3', 1, '2020-12-25 22:40:00', '2020-12-25 22:51:44', '25.4967677', '88.94870859999999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(18, '1', 1, '2020-12-26 19:30:00', '2020-12-26 19:32:35', '25.4967087', '88.94870870000001', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(19, '3', 1, '2020-12-26 20:20:00', '2020-12-26 20:22:56', '25.496746', '88.9487079', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(20, '2', 1, '2020-12-26 20:30:00', '2020-12-26 20:29:01', '25.4967412', '88.9487079', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(21, '4', 1, '2020-12-26 21:10:00', '2020-12-26 21:03:36', '25.496751999999997', '88.94870750000001', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(22, '2', 1, '2021-01-07 00:00:00', '2021-01-07 12:45:57', '25.4967528', '88.9487341', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(23, '3', 1, '2021-01-20 00:10:00', '2021-01-20 21:03:05', '25.496747199999998', '88.94871119999999', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(24, '3', 1, '2021-01-21 08:10:00', '2021-01-21 00:02:16', '25.496764', '88.9487139', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0'),
(25, '3', 1, '2021-02-21 08:10:00', '2021-02-21 00:02:16', '25.496764', '88.9487139', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0');

-- --------------------------------------------------------

--
-- Table structure for table `em_class`
--

CREATE TABLE `em_class` (
  `c_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_details` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `em_class`
--

INSERT INTO `em_class` (`c_id`, `user_id`, `class_name`, `class_details`, `date_time`) VALUES
(1, '1', 'Class 1', 'Html Css', '2020-12-22 07:40:23'),
(2, '1', 'Class 2', 'Php Js', '2020-12-22 07:41:55'),
(3, '3', 'Class 1', 'Php Project', '2020-12-22 14:21:00'),
(4, '1', 'Class 3', 'Design work', '2020-12-23 17:41:29'),
(5, '1', 'Class 4', 'Php', '2020-12-24 17:53:05'),
(6, '2', 'Class 1', 'Php', '2020-12-24 18:04:31'),
(7, '3', 'Class 2', 'html css', '2020-12-25 22:52:16'),
(8, '4', 'Class 1', 'Html Css link', '2020-12-26 21:04:16'),
(9, '4', 'class 2 ', 'js jquery plugins ', '2020-12-26 22:32:13'),
(10, '3', 'Practice Class 1', 'Practice Class 2 ', '2021-01-21 00:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `em_task`
--

CREATE TABLE `em_task` (
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_details` text NOT NULL,
  `submit_date_time` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `work_details` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `review` text DEFAULT NULL,
  `review_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `em_task`
--

INSERT INTO `em_task` (`t_id`, `user_id`, `task_name`, `task_details`, `submit_date_time`, `status`, `date_time`, `work_details`, `updated_at`, `review`, `review_date`) VALUES
(2, 1, 'tamplete design', 'html css tamplete design ', '2020-12-29', 'completed', '2020-12-28 14:34:23', 'kam hoice ', '2020-12-28 23:09:09', NULL, NULL),
(3, 3, 'html', 'html', '2020-12-30', 'completed', '2020-12-28 15:04:36', 'kam hoice ', '2020-12-28 23:09:09', NULL, NULL),
(4, 2, 'javascript', 'javascript new task', '2020-12-31', 'completed', '2020-12-28 15:24:20', 'kam hoice ', '2020-12-28 23:09:09', '', '2021-01-12 23:16:05'),
(5, 4, 'jquery plugins ', 'jquery plugins use ', '2021-01-01', 'completed', '2020-12-28 15:39:55', 'kam hoice ', '2020-12-28 23:09:09', '<p>great work!<br></p>', '2021-01-13 00:33:10'),
(7, 3, 'html', 'html tooo', '2021-01-01', 'completed', '2020-12-28 22:56:46', 'success\r\n', '2020-12-28 22:57:12', NULL, NULL),
(9, 3, 'XD to html', 'tamplete ', '2021-01-02', 'completed', '2020-12-28 23:10:27', 'kaj hoye gece', '2020-12-28 23:12:02', NULL, NULL),
(10, 3, 'javascript', 'asss', '2020-12-17', 'completed', '2020-12-28 23:12:30', 'kaj hoice ga \r\n', '2020-12-28 23:14:43', 'hoice', NULL),
(11, 3, 'jquery plugins ', 'sss', '2020-12-11', 'completed', '2020-12-28 23:19:37', 'hoice', '2020-12-28 23:19:47', NULL, NULL),
(12, 3, 'Wordpress to html ', 'kore nia asio ', '2021-01-08', 'completed', '2020-12-28 23:36:22', 'kaj kore felci vai ', '2020-12-28 23:36:41', 'ki', NULL),
(13, 3, 'today new task', 'new task name and domain : <a href=\"http://google.com\" target=\"_blank\">click here</a> <br>', '2021-01-06', 'completed', '2021-01-03 19:44:58', NULL, NULL, 'All ok<br>', '2021-01-14 00:49:47'),
(14, 3, 'jquery', '<p>kaj kore nia asio<br></p>', '2021-01-20', 'completed', '2021-01-14 00:19:46', '<p>kaj hoice dakhen <br></p>', '2021-01-14 00:46:52', NULL, NULL),
(15, 3, 'jquery', '<p>kaj kore nia asio<br></p>', '2021-01-20', 'completed', '2021-01-14 00:25:28', NULL, NULL, '<p>kaj hoice<br></p>', '2021-01-14 00:52:22'),
(16, 3, 'Create a new theme dashboard ', '<p>Create a new theme dashboard <br></p>', '2021-01-22', 'pending', '2021-01-21 00:50:19', NULL, NULL, NULL, NULL),
(17, 3, 'New Task', '<p>New Task<br></p>', '2021-01-23', 'pending', '2021-01-21 00:51:30', NULL, NULL, NULL, NULL),
(18, 3, 'today new task', 'new task name and domain : <a href=\"http://google.com\" target=\"_blank\">click here</a> <br>', '2021-01-06', 'completed', '2021-02-03 19:44:58', NULL, NULL, 'All ok<br>', '2021-01-14 00:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `em_user`
--

CREATE TABLE `em_user` (
  `u_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `parents_number` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL,
  `email_verify` varchar(100) NOT NULL,
  `email_verify_code` varchar(255) NOT NULL,
  `mobile_verify` varchar(100) NOT NULL DEFAULT '0',
  `mobile_verify_code` int(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `reset_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `em_user`
--

INSERT INTO `em_user` (`u_id`, `first_name`, `last_name`, `email`, `mobile`, `birthday`, `blood_group`, `father_name`, `mother_name`, `parents_number`, `education`, `address`, `password`, `register_time`, `email_verify`, `email_verify_code`, `mobile_verify`, `mobile_verify_code`, `photo`, `reset_code`) VALUES
(1, 'Sohag', 'Ahamed', 'sohagahamed1998@gmail.com', '01717139936', '1997-12-16', 'B+', 'Bulbul Ahamed', 'Sufia Begum', '01781304679', 'Cse Engineer', 'Thakurgoan', '5c67c52cb94ff2829312efe6db1997b8eba77b82', '2020-12-21 16:18:57', '', '', '0', 0, '1.jpeg', 711914),
(2, 'Alifur', 'Rahman', 'alifurcoder@gamil.com', '01733061986', '2000-03-11', 'A+', 'Saidur Rahman', 'Lavly Begum', '01722357081', 'Deploma', 'Jharbari', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-12-22 07:27:44', '', '', '0', 0, '2.jpg', NULL),
(3, 'Sadbin', 'Shakil', 'shakilcoding@gmail.com', '01797948798', '1999-10-10', 'O+', 'Jannatur Rahman', 'Samsun Nahar', '01722853129', 'Cse Engineer', 'Khansama', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-12-22 14:19:06', '', '', '0', 0, '3.jpg', 909201),
(4, 'Almin', 'Islam', 'alamin@gmail.com', '01725486785', '2020-12-16', 'B-', 'Amin Vai', 'Amena baki ', '01754875487', 'Computer Engr', 'Joypurhat', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-12-26 21:02:52', '', '', '0', 0, '4.jpeg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `em_admin`
--
ALTER TABLE `em_admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `em_attendance`
--
ALTER TABLE `em_attendance`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `em_class`
--
ALTER TABLE `em_class`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `em_task`
--
ALTER TABLE `em_task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `em_user`
--
ALTER TABLE `em_user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `em_admin`
--
ALTER TABLE `em_admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `em_attendance`
--
ALTER TABLE `em_attendance`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `em_class`
--
ALTER TABLE `em_class`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `em_task`
--
ALTER TABLE `em_task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `em_user`
--
ALTER TABLE `em_user`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
