-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 09:31 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` text NOT NULL,
  `dept_image` varchar(100) NOT NULL,
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_image`, `is_active`, `added_on`) VALUES
(1, 'dsfasadsfzx', '', 'no', '2017-02-11 16:56:31'),
(2, 'zdxf', 'sdfr', '', '2017-02-11 15:12:25'),
(3, 'dsfds', 'abc.jpg', 'yes', '2017-02-11 15:13:21'),
(4, 'subbu dept', 'abc.jpg', 'no', '2017-02-11 17:02:33'),
(5, 'what', 'abc.jpg', 'no', '2017-02-11 17:02:57'),
(6, 'zscXCV', 'abc.jpg', 'yes', '2017-02-11 15:32:54'),
(7, 'safd', 'abc.jpg', 'yes', '2017-02-11 15:33:30'),
(8, 'dddd', 'abc.jpg', 'no', '2017-02-11 21:27:37'),
(9, 'bla', 'abc.jpg', 'yes', '2017-02-11 16:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `dept_info`
--

CREATE TABLE `dept_info` (
  `dept_info_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `dept_hod_name` text NOT NULL,
  `dept_hod_no` varchar(20) NOT NULL,
  `dept_hod_email` varchar(200) NOT NULL,
  `dept_strength` varchar(10) NOT NULL,
  `dept_staff` text NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_info`
--

INSERT INTO `dept_info` (`dept_info_id`, `dept_id`, `dept_hod_name`, `dept_hod_no`, `dept_hod_email`, `dept_strength`, `dept_staff`, `is_active`, `added_on`) VALUES
(1, 21, 'sdf', '9901027651', 'cnsubb', 'see', 'dsfa,adf,asfdaasdf,sadf', 'yes', '0000-00-00 00:00:00'),
(2, 4, 'dfsasubbu', 'aa', 'scnsubbuk143@gmail.com', '22', 'sddsd,subbu,vinu, abc, sdf', 'yes', '2017-02-11 16:47:08'),
(3, 5, 'ru', 'saf', 'asdf', 'sdf', 'dsf', 'yes', '0000-00-00 00:00:00'),
(4, 6, 'SDF', 'SDF', 'DSF', 'SDF', 'SDF', 'yes', '0000-00-00 00:00:00'),
(5, 7, 'sdf', 'dsaf', 'dsa', 'dsf', 'saf', 'yes', '0000-00-00 00:00:00'),
(6, 8, '', '', '', '', '', 'yes', '0000-00-00 00:00:00'),
(7, 9, 'bla ba', 'bla ', 'bla', 'bla', 'bla', 'yes', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `feedback_title` varchar(300) NOT NULL,
  `feedback_desc` varchar(3000) NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `dept_id`, `student_id`, `feedback_title`, `feedback_desc`, `is_active`, `added_on`) VALUES
(1, 1, 1, 'title', 'desc', 'yes', '0000-00-00 00:00:00'),
(2, 1, 1, 'sad', 'asdf', 'yes', '2017-02-12 14:04:07'),
(3, 9, 1, 'ads', 'adsf', 'yes', '2017-02-12 14:25:46'),
(4, 9, 1, 'what sup', 'what sup buddy', 'yes', '2017-02-12 14:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `source_type` enum('news','issue') NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `source_id`, `source_type`, `image_path`, `is_active`, `added_on`) VALUES
(1, 1, 'news', 'asdf', 'yes', '2017-02-13 18:08:07'),
(2, 2, 'news', 'sad', 'yes', '2017-02-13 18:08:07'),
(17, 1, 'issue', '1487014079WhatsApp Image 2017-02-07 at 6.10.12 PM.jpeg', 'yes', '2017-02-13 19:27:59'),
(18, 1, 'issue', '1487014185WhatsApp Image 2017-02-07 at 6.10.12 PM.jpeg', 'yes', '2017-02-13 19:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `issue_title` varchar(300) NOT NULL,
  `issue_desc` varchar(3000) NOT NULL,
  `issue_status` enum('resolved','unresolved','in_progress') NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `student_id`, `dept_id`, `issue_title`, `issue_desc`, `issue_status`, `is_active`, `added_on`) VALUES
(1, 1, 2, 'issue title', 'issue description', 'in_progress', 'yes', '0000-00-00 00:00:00'),
(2, 1, 2, 'title', 'description', 'in_progress', 'yes', '0000-00-00 00:00:00'),
(3, 1, 2, 'title', 'despc', 'in_progress', 'yes', '0000-00-00 00:00:00'),
(4, 1, 1, 'title', 'desc', 'in_progress', 'yes', '2017-02-12 13:41:28'),
(5, 9, 0, 'dsafASDF', 'DSAF', 'in_progress', 'yes', '2017-02-12 13:43:59'),
(6, 9, 0, 'dsafASDF', 'DSAF', 'in_progress', 'yes', '2017-02-12 13:44:28'),
(7, 1, 9, 'titel', 'desct', 'in_progress', 'yes', '2017-02-12 13:45:04'),
(8, 1, 9, 'wht sup', 'adsfasdf', 'in_progress', 'yes', '2017-02-12 13:51:33'),
(9, 1, 9, 'i have a big issue', 'i have to walk 3 stories ', 'in_progress', 'yes', '2017-02-13 10:17:52'),
(10, 1, 9, 'title', 'description', 'in_progress', 'yes', '2017-02-13 19:23:57'),
(11, 1, 9, 'sadf', 'dsf', 'in_progress', 'yes', '2017-02-13 19:25:55'),
(12, 1, 9, 'sadf', 'dsf', 'in_progress', 'yes', '2017-02-13 19:26:39'),
(13, 1, 9, 'sadf', 'dsf', 'in_progress', 'yes', '2017-02-13 19:27:18'),
(14, 1, 9, 'ds', 'f', 'in_progress', 'yes', '2017-02-13 19:27:59'),
(15, 1, 9, 'ds', 'f', 'in_progress', 'yes', '2017-02-13 19:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `news_title` varchar(300) NOT NULL,
  `news_desc` varchar(5000) NOT NULL,
  `video` varchar(300) NOT NULL,
  `creater_id` varchar(100) NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `dept_id`, `news_title`, `news_desc`, `video`, `creater_id`, `is_active`, `added_on`) VALUES
(1, 7, 'news title', 'whats p', 'dsagfasdf', '11', 'yes', '2017-02-13 18:35:28'),
(2, 9, 'safd', 'dsaf', '1', '11', 'yes', '2017-02-13 18:36:41'),
(3, 7, 'sdf', 'dsf', 'dsf', '11', 'yes', '2017-02-13 18:37:49'),
(4, 7, 'asd', 'fdsasdsad', 'werewq', '11', 'yes', '2017-02-13 18:38:28'),
(5, 7, 'asd', 'fdsasdsad', 'werewq', '11', 'yes', '2017-02-13 18:40:25'),
(6, 7, 'saf', 'dsf', 'dsaf', '11', 'yes', '2017-02-13 18:40:34'),
(7, 6, 'dsf', 'dsfdsfas', 'dsafa', '1', 'yes', '2017-02-13 18:42:45'),
(8, 9, 'dddd', 'qdff', 'dfs', '1', 'yes', '2017-02-13 18:50:08'),
(9, 7, 'title', 'description', 'url', '1', 'yes', '2017-02-13 18:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `verification_no` varchar(5) NOT NULL,
  `dept_id` varchar(5) NOT NULL,
  `device_id` varchar(20) NOT NULL,
  `gcm_id` varchar(20) NOT NULL,
  `device_type` varchar(20) NOT NULL,
  `device_version` varchar(10) NOT NULL,
  `app_version` varchar(10) NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `roll_no`, `mobile`, `email`, `verification_no`, `dept_id`, `device_id`, `gcm_id`, `device_type`, `device_version`, `app_version`, `is_active`, `added_on`) VALUES
(1, 'subramanya', '1111', '9901027651', 'cnsubbuk143@gmail.com', '', '9', '', '', '', '', '', 'yes', '2017-02-12 10:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_type` enum('admin','content_manager','student') NOT NULL,
  `is_active` enum('yes','no') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `student_id`, `user_name`, `user_pass`, `user_type`, `is_active`, `added_on`) VALUES
(1, 0, 'admin', 'E10ADC3949BA59ABBE56E057F20F883E', 'admin', 'yes', '2017-02-10 18:30:00'),
(2, 0, 'subbu', 'adsf', 'content_manager', 'yes', '2017-02-11 20:13:47'),
(10, 1, '1111', 'c4ca4238a0b923820dcc509a6f75849b', 'student', 'yes', '2017-02-12 10:01:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `dept_info`
--
ALTER TABLE `dept_info`
  ADD PRIMARY KEY (`dept_info_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dept_info`
--
ALTER TABLE `dept_info`
  MODIFY `dept_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
