-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 09:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_projects`
--

CREATE TABLE `assign_projects` (
  `assign_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `p_title` varchar(200) NOT NULL,
  `p_budget` varchar(200) NOT NULL,
  `p_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_projects`
--

INSERT INTO `assign_projects` (`assign_id`, `project_id`, `user_id`, `admin_id`, `date`, `p_title`, `p_budget`, `p_description`) VALUES
(7, 6, 2, 1, '2021-06-13', 'php developer', '300', 'please do this project carefully.');

-- --------------------------------------------------------

--
-- Table structure for table `general_communication`
--

CREATE TABLE `general_communication` (
  `gc_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `project_detail` text NOT NULL,
  `date` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `project_description` text NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `accountno` varchar(200) NOT NULL,
  `branchcode` varchar(200) NOT NULL,
  `bic` varchar(200) NOT NULL,
  `iban` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `work_category` text NOT NULL,
  `project_about` text NOT NULL,
  `project_description` text NOT NULL,
  `budget` text NOT NULL,
  `userrole` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_file` text NOT NULL,
  `date` date NOT NULL,
  `freelancer` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `work_category`, `project_about`, `project_description`, `budget`, `userrole`, `user_id`, `project_file`, `date`, `freelancer`, `status`, `payment_id`) VALUES
(6, '1', 'website', 'testing', '400', 'user', 8, 'project1623585295.xlsx', '2021-06-13', 0, 1, 'ch_1J1rtyIcU2oWsQiGIf7NsHWr');

-- --------------------------------------------------------

--
-- Table structure for table `project_communication`
--

CREATE TABLE `project_communication` (
  `pc_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message` text NOT NULL,
  `receiver` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `chat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_communication`
--

INSERT INTO `project_communication` (`pc_id`, `sender`, `message`, `receiver`, `project_id`, `date`, `chat_id`) VALUES
(12, 1, 'hi', 8, 6, '2021-06-13 01:57:57', 12),
(13, 8, 'yes', 1, 6, '2021-06-13 01:58:09', 12),
(14, 1, 'i am assigning your project to freelancer', 8, 6, '2021-06-13 01:58:38', 12),
(15, 8, 'ok\n', 1, 6, '2021-06-13 01:58:53', 12),
(16, 2, 'hi', 1, 6, '2021-06-13 02:03:49', 13),
(17, 1, 'hello\n', 2, 6, '2021-06-13 02:08:59', 13);

-- --------------------------------------------------------

--
-- Table structure for table `p_chat`
--

CREATE TABLE `p_chat` (
  `chat_id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_chat`
--

INSERT INTO `p_chat` (`chat_id`, `user1`, `user2`, `project_id`) VALUES
(12, 8, 1, 6),
(13, 2, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `county` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `introduction` text NOT NULL,
  `image` text NOT NULL,
  `position` text NOT NULL,
  `category` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `accountno` varchar(200) NOT NULL,
  `branchcode` varchar(200) NOT NULL,
  `bic` varchar(200) NOT NULL,
  `iban` varchar(200) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `usertype`, `phone`, `skills`, `gender`, `county`, `address`, `introduction`, `image`, `position`, `category`, `bank_name`, `account_title`, `accountno`, `branchcode`, `bic`, `iban`, `isActive`) VALUES
(1, 'shoaib', 'Ahmed', 'shoaibahmed.hr@gmail.com', '12345', 'admin', '03475541412', 'html,css', 'female', 'first', 'toba tek singh', 'Lorem Khaled Ipsum is a major key to success. Celebrate success right, the only way, apple. Give thanks to the most high. Fan luv. The key to success is to keep your head above the water, never they in there, after you overcome they, you will make it to paradise. Learning is cool, but knowing is better, and I know the key to success. You do know, you do know that they don’t want you to have lunch. I’m keeping it real with you, so what you going do is have lunch. The key is to drink coconut, fresh coconut, trust me. To succeed you must believe. When you believe, you will succeed. They never said winning was easy. Some people can’t handle success, I can. Another one. We the best. You smart, you loyal, you a genius. They don’t want us to win.', 'neHIPu1o27clothing-banner.jpg', '', 0, '', '', '', '', '', '', 1),
(2, 'ali', 'sardar', 'ali@gmail.com', '12345', 'user', '03475541412', 'html,css,js', 'male', 'first', 'toba tek singh', 'Lorem Khaled Ipsum is a major key to success. Celebrate success right, the only way, apple. Give thanks to the most high. Fan luv. The key to success is to keep your head above the water, never they in there, after you overcome they, you will make it to paradise. Learning is cool, but knowing is better, and I know the key to success. You do know, you do know that they donâ€™t want you to have lunch. Iâ€™m keeping it real with you, so what you going do is have lunch. The key is to drink coconut, fresh coconut, trust me. To succeed you must believe. When you believe, you will succeed. They never said winning was easy. Some people canâ€™t handle success, I can. Another one. We the best. You smart, you loyal, you a genius. They donâ€™t want us to win.', 'oRFZipyrYda-1.jpg', 'Php Developer', 2, 'Mezan bank', 'Muhammad shoaib Ahmed', '365598234456', '059', '3453535', '324234234324324234', 1),
(4, 'arslan', 'ahmed', 'arslan@gmail.com', '12345', 'user', '03475541412', 'html,css,photoshop', 'male', 'first', 'i am testing.', 'Lorem Khaled Ipsum is a major key to success. Celebrate success right, the only way, apple. Give thanks to the most high. Fan luv. The key to success is to keep your head above the water, never they in there, after you overcome they, you will make it to paradise. Learning is cool, but knowing is better, and I know the key to success. You do know, you do know that they donï¿½t want you to have lunch. Iï¿½m keeping it real with you, so what you going do is have lunch. The key is to drink coconut,', '9iaJ8hMQtDa-1.jpg', 'Graphic Designer', 1, '', '', '', '', '', '', 1),
(8, 'test', 'testoooo', 'test@gmail.com', '12345', 'client', '03475541412', '', 'male', 'first', 'i am testing.', 'Lorem Khaled Ipsum is a major key to success. Celebrate success right, the only way, apple. Give thanks to the most high. Fan luv. The key to success is to keep your head above the water, never they in there, after you overcome they, you will make it to paradise. Learning is cool, but knowing is better, and I know the key to success. You do know, you do know that they don’t want you to have lunch. I’m keeping it real with you, so what you going do is have lunch. The key is to drink coconut, fresh coconut, trust me. To succeed you must believe. When you believe, you will succeed. They never said winning was easy. Some people can’t handle success, I can. Another one. We the best. You smart, you loyal, you a genius. They don’t want us to win.', 'JgikSRT8u3a-1.jpg', '', 0, '', '', '', '', '', '', 1),
(9, 'test2', 'test2', 'test2@gmail.com', '12345', 'client', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1),
(10, 'salman', 'aslam', 'salman@gmail.com', '12345', 'user', '03475541412', 'php,wordpress', 'male', 'first', 'i am testing.', 'i am  testing.', '6XU1mRHek4Happy-Kid.jpg', 'web', 0, '', '', '', '', '', '', 1),
(11, 'sohaib', 'irshad', 'sohaibsobe@yahoo.com', '12345', 'user', '03475541412', 'html,css,bootstrap,php', 'male', 'Donegal', 'i am testing.', 'i am testing.', 'FAv3umKWObPlus-Size-S-XXL-mens-t-shirts-fashion-2015-new-casual-short-sleeve-V-neck-cotton.jpg', 'Junior Developer', 0, '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_experience`
--

CREATE TABLE `user_experience` (
  `experience_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `e_started` date NOT NULL,
  `e_end` date NOT NULL,
  `responsibility` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_experience`
--

INSERT INTO `user_experience` (`experience_id`, `user_id`, `company_name`, `post_title`, `e_started`, `e_end`, `responsibility`) VALUES
(2, 1, 'suave solutions', 'php developer', '2017-12-14', '2017-12-22', 'i am testing.'),
(9, 4, 'intimat Tec', 'desginer', '2017-07-19', '2017-12-29', 'Front End Development'),
(10, 2, 'intimat Tec', 'php developer', '2017-12-15', '2017-12-16', 'i am testing.'),
(11, 10, 'suave solutions', 'php developer', '2018-02-01', '2018-02-21', 'testing.'),
(15, 11, 'suave solutions', 'php developer', '2018-02-06', '2018-02-15', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `user_qualifications`
--

CREATE TABLE `user_qualifications` (
  `qualification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `q_title` varchar(200) NOT NULL,
  `q_started` varchar(100) NOT NULL,
  `q_end` varchar(100) NOT NULL,
  `q_grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_qualifications`
--

INSERT INTO `user_qualifications` (`qualification_id`, `user_id`, `q_title`, `q_started`, `q_end`, `q_grade`) VALUES
(3, 1, 'matric', '2005', '2007', 'A+'),
(10, 4, 'matric', '2005', '2007', 'A+'),
(11, 2, 'matric', '2005', '2007', 'A+'),
(12, 10, 'matric', '2005', '2007', 'A+'),
(16, 11, 'matric', '2005', '2007', 'A+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_projects`
--
ALTER TABLE `assign_projects`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `general_communication`
--
ALTER TABLE `general_communication`
  ADD PRIMARY KEY (`gc_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_communication`
--
ALTER TABLE `project_communication`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `p_chat`
--
ALTER TABLE `p_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_experience`
--
ALTER TABLE `user_experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indexes for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD PRIMARY KEY (`qualification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_projects`
--
ALTER TABLE `assign_projects`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `general_communication`
--
ALTER TABLE `general_communication`
  MODIFY `gc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_communication`
--
ALTER TABLE `project_communication`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `p_chat`
--
ALTER TABLE `p_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
