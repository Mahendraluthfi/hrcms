-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 04:57 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biometric_payroll_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `allowance_id` int(11) NOT NULL,
  `allowance_name` varchar(75) NOT NULL,
  `allowance_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`allowance_id`, `allowance_name`, `allowance_status`) VALUES
(3, 'Holiday Allowances', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `attendance_employee` int(11) NOT NULL,
  `attendance_in` varchar(50) NOT NULL,
  `attendance_out` varchar(50) DEFAULT '00/00/00 00:00:00',
  `attendance_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `attendance_employee`, `attendance_in`, `attendance_out`, `attendance_timestamp`) VALUES
(1, 1, '11/14/2018 10:39 AM', '11/14/2018 10:39 AM', '2018-11-14 03:39:54'),
(2, 2, '11/14/2018 10:39 AM', '11/14/2018 10:40 AM', '2018-11-14 03:40:11'),
(3, 3, '11/14/2018 10:38 AM', '11/14/2018 10:39 AM', '2018-11-14 03:39:46'),
(4, 4, '11/14/2018 10:41 AM', '11/14/2018 10:42 AM', '2018-11-14 03:42:11'),
(5, 5, '11/26/2018 11:13 AM', '11/26/2018 2:48 PM', '2018-11-27 02:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `attendances_full`
--

CREATE TABLE `attendances_full` (
  `attendance_id` int(11) NOT NULL,
  `attendance_employee` varchar(20) NOT NULL,
  `attendance_in` varchar(50) NOT NULL,
  `attendance_out` varchar(50) NOT NULL,
  `attendance_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances_full`
--

INSERT INTO `attendances_full` (`attendance_id`, `attendance_employee`, `attendance_in`, `attendance_out`, `attendance_timestamp`) VALUES
(5, '1', '12/17/2018 2:49 PM', '', '2018-12-17 07:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `attendances_part`
--

CREATE TABLE `attendances_part` (
  `attendance_id` int(11) NOT NULL,
  `attendance_employee` varchar(20) NOT NULL,
  `attendance_in` varchar(50) NOT NULL,
  `attendance_out` varchar(50) NOT NULL,
  `attendance_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances_part`
--

INSERT INTO `attendances_part` (`attendance_id`, `attendance_employee`, `attendance_in`, `attendance_out`, `attendance_timestamp`) VALUES
(3, 'A3', '12/17/2018 11:02 AM', '12/17/2018 11:05 AM', '2018-12-17 04:05:20'),
(4, '5', '12/17/2018 2:49 PM', '', '2018-12-17 07:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `bonus_id` int(20) NOT NULL,
  `bonus_employee` int(20) NOT NULL,
  `bonus_type` varchar(100) NOT NULL,
  `bonus_amount` varchar(15) NOT NULL,
  `bonus_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonuses`
--

INSERT INTO `bonuses` (`bonus_id`, `bonus_employee`, `bonus_type`, `bonus_amount`, `bonus_timestamp`) VALUES
(2, 5, 'haha', '500000', '2018-12-20 04:22:27'),
(5, 3, 'jj', '89', '2018-12-20 06:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claim_id` int(11) NOT NULL,
  `claim_title` varchar(55) NOT NULL,
  `claim_description` varchar(150) DEFAULT NULL,
  `claim_picture` varchar(95) NOT NULL,
  `claim_user` int(55) NOT NULL,
  `claim_status` int(20) NOT NULL,
  `claim_date` varchar(15) NOT NULL,
  `claim_reply_message` varchar(100) NOT NULL,
  `claim_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claim_id`, `claim_title`, `claim_description`, `claim_picture`, `claim_user`, `claim_status`, `claim_date`, `claim_reply_message`, `claim_timestamp`) VALUES
(8, 'whatss', 'hey!', './files/claim_pictures/avatar-kartun-muslim-4.jpg', 5, 2, '12/20/2018', '', '2018-12-20 09:46:31'),
(9, 'tt', 'ttt', './files/claim_pictures/gambar-kartun-muslimah-7.jpg', 5, 2, '12/20/2018', '', '2018-12-20 09:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(20) NOT NULL,
  `employee_name` varchar(51) NOT NULL,
  `employee_username` varchar(75) DEFAULT NULL,
  `employee_password` varchar(50) DEFAULT NULL,
  `employee_picture` varchar(95) DEFAULT NULL,
  `employee_position` int(11) NOT NULL,
  `employee_salary` int(11) NOT NULL,
  `employee_address` varchar(90) DEFAULT NULL,
  `employee_idcard` varchar(75) DEFAULT NULL,
  `employee_certificate` varchar(75) DEFAULT NULL,
  `employee_birth` varchar(15) DEFAULT NULL,
  `employee_gender` varchar(15) NOT NULL,
  `employee_start` varchar(15) NOT NULL,
  `employee_phone` int(11) DEFAULT NULL,
  `employee_duration` varchar(20) NOT NULL,
  `employee_status` int(1) NOT NULL,
  `employee_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `employee_start_leave` date NOT NULL,
  `employee_end_leave` date NOT NULL,
  `employee_start_off` date NOT NULL,
  `employee_end_off` date NOT NULL,
  `employee_start_sick` date NOT NULL,
  `employee_end_sick` date NOT NULL,
  `employee_leave` int(11) NOT NULL,
  `employee_off` int(11) NOT NULL,
  `employee_sick` int(11) NOT NULL,
  `employee_leave_rem` int(11) NOT NULL,
  `employee_off_rem` int(11) NOT NULL,
  `employee_sick_rem` int(11) NOT NULL,
  `employee_overtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `employee_username`, `employee_password`, `employee_picture`, `employee_position`, `employee_salary`, `employee_address`, `employee_idcard`, `employee_certificate`, `employee_birth`, `employee_gender`, `employee_start`, `employee_phone`, `employee_duration`, `employee_status`, `employee_timestamp`, `employee_start_leave`, `employee_end_leave`, `employee_start_off`, `employee_end_off`, `employee_start_sick`, `employee_end_sick`, `employee_leave`, `employee_off`, `employee_sick`, `employee_leave_rem`, `employee_off_rem`, `employee_sick_rem`, `employee_overtime`) VALUES
(1, 'Andik2', 'andik', 'af0b3b52ec598673aeb96627ff8d024e670496da', 'files/employee_pictures/31dfea34977d9450906152c7eb357d00.jpg', 3, 8889, 'ungaran2', 'files/employee_pictures/00acc4f9183db8d130dbc0149f7b897f.jpg', 'files/employee_pictures/09e61a66c66ad7890f83be8aae6c4889.jpg', '05/09/1990', 'Man', '11/13/2018', 5456560, 'Full Time', 1, '2019-01-08 04:36:07', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 8, 0, 0, 0, 0, 0, 0),
(2, 'aaa', 'a', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'files/employee_pictures/3c104bb7209a8b3464d59b5908b427bc.jpg', 4, 213123213, 'bekonang', 'files/employee_pictures/1b33af94073491883434d76a812b654a.jpg', NULL, '2018-08-09', 'Women', '10/31/2018', 888, 'Full Time', 0, '2019-01-11 10:10:06', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0),
(3, 'Jhony andrean', 'joni', '91010ab2791f95fcd50d52d8b32f5c756438c411', 'files/employee_pictures/3f71408ffccb266281320a62d2ef1d82.jpg', 6, 2312312, 'bubakan', 'files/employee_pictures/c84beca33b06c7938aff3a754de059ed.jpg', 'files/employee_pictures/8ba747c0f614518b9fd9400e2a84d4ad.jpg', '06/18/1990', 'Man', '09/11/2018', 990890, 'Part Time', 1, '2018-12-17 06:36:15', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0),
(12, 'Naka', 'naka', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 7, 123, 'Semarang', NULL, NULL, '08/26/1994', 'Man', '01/04/2019', 0, 'Full Time', 1, '2019-01-15 06:19:50', '2019-01-07', '2019-02-28', '2019-01-07', '2019-05-25', '2019-01-07', '2019-04-30', 12, 3, 4, -2, 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `leave_employee` int(11) DEFAULT NULL,
  `leave_category` varchar(1) NOT NULL,
  `leave_message` tinytext,
  `leave_reply_message` tinytext NOT NULL,
  `leave_date_start` date DEFAULT NULL,
  `leave_date_end` date DEFAULT NULL,
  `leave_days` int(11) NOT NULL,
  `leave_status` enum('PENDING','CANCELED','EXPIRED','REJECTED','APPROVED') NOT NULL,
  `leave_attachment` text,
  `leave_timestamp` datetime NOT NULL,
  `action_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `leave_employee`, `leave_category`, `leave_message`, `leave_reply_message`, `leave_date_start`, `leave_date_end`, `leave_days`, `leave_status`, `leave_attachment`, `leave_timestamp`, `action_timestamp`) VALUES
(6, 12, '3', 'Sick', 'OKE', '2019-01-08', '2019-01-09', 2, 'REJECTED', 'IMG-10163557.png', '2019-01-10 16:35:57', '2019-01-11 17:54:55'),
(7, 12, '1', 'Okey', '', '2019-01-14', '2019-01-16', 3, 'APPROVED', '', '2019-01-11 11:12:24', '2019-01-11 17:52:36'),
(9, 12, '1', 'A', '', '2019-01-15', '2019-01-17', 3, 'APPROVED', '', '2019-01-14 16:21:24', '2019-01-14 17:17:49'),
(10, 12, '1', 'Oke', '', '2019-01-15', '2019-01-25', 11, 'APPROVED', '', '2019-01-15 13:19:27', '2019-01-15 13:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `modul_id` int(11) NOT NULL,
  `modul_span` varchar(25) NOT NULL,
  `modul_icon` varchar(100) NOT NULL,
  `modul_url` varchar(100) NOT NULL,
  `modul_parent` int(11) NOT NULL,
  `modul_level` int(11) DEFAULT NULL,
  `modul_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`modul_id`, `modul_span`, `modul_icon`, `modul_url`, `modul_parent`, `modul_level`, `modul_role`) VALUES
(1, 'Payment', 'ni ni-money-coins text-red', 'payment', 0, 1, 1),
(2, 'Leave Management', 'ni ni-user-run text-orange', 'leaves', 0, 0, 1),
(3, 'Leaves', 'ni ni-calendar-grid-58', 'leave', 2, 2, 1),
(4, 'Off', 'ni ni-calendar-grid-58', 'off', 2, 2, 1),
(5, 'Sick', 'ni ni-calendar-grid-58', 'sick', 2, 2, 1),
(6, 'Reimbursment', 'ni ni-tag text-yellow', 'reimbursment', 0, 1, 1),
(7, 'Employees', 'fa fa-user-circle text-info', 'employees', 0, 1, 1),
(9, 'Attendance', 'fas fa-hand-holding-usd text-red', 'attendance', 0, 0, 1),
(10, 'Attendance Setting', 'ni ni-planet text-blue', 'att_setting', 9, 2, 1),
(11, 'Attendance List', 'ni ni-planet text-blue', 'att_list', 9, 2, 1),
(12, 'Salary', 'fas fa-donate text-orange', 'salary', 0, 0, 1),
(13, 'Full Time', 'ni ni-planet text-blue', 'salary_full', 12, 2, 1),
(14, 'Part Time', 'ni ni-planet text-blue', 'salary_part', 12, 2, 1),
(15, 'Bonus', 'ni ni-fat-add text-primary', 'bonus', 0, 1, 1),
(16, 'Report', 'ni ni-time-alarm text-info', 'report', 0, 1, 1),
(17, 'Data Manage', 'fa fa-database text-orange', 'data', 0, 0, 1),
(18, 'Job Positions', 'ni ni-planet text-blue', 'position', 17, 2, 1),
(19, 'Allowances', 'ni ni-planet text-blue', 'allowances', 17, 2, 1),
(20, 'User Admin', 'ni ni-planet text-blue', 'useradmin', 17, 2, 1),
(21, 'News', 'fas fa-newspaper text-pink', 'news', 0, 1, 1),
(22, 'Welfare', 'fa fa-handshake text-gray-dark', 'welfare', 0, 0, 1),
(23, 'Polls', 'ni ni-chart-bar-32 text-blue', 'polls', 22, 2, 1),
(24, 'Survey', 'fa fa-list-alt text-blue', 'survey', 22, 2, 1),
(25, 'Feedback and Comments', 'fa fa-comments text-blue', 'comment', 22, 2, 1),
(26, 'Leave Management', 'ni ni-user-run text-orange', 'leaves', 0, 0, 2),
(27, 'Leaves', 'ni ni-calendar-grid-58', 'leave_emp', 26, 2, 2),
(28, 'Off', 'ni ni-calendar-grid-58', 'off_emp', 26, 2, 2),
(29, 'Sick', 'ni ni-calendar-grid-58', 'sick_emp', 26, 2, 2),
(30, 'Reimbursment', 'ni ni-tag text-yellow', 'reimbursment_emp', 0, 1, 2),
(31, 'Attendance', 'fas fa-hand-holding-usd text-red', 'attendance_emp', 0, 1, 2),
(32, 'Payroll', 'ni ni-planet text-blue', 'payroll', 0, 0, 2),
(33, 'Bonus', 'ni ni-planet text-blue', 'bonus_emp', 32, 2, 2),
(34, 'Salary', 'fas fa-donate text-orange', 'salary_emp', 32, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `datetime` datetime NOT NULL,
  `news_content` text NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(20) NOT NULL,
  `payment_name` int(20) NOT NULL,
  `payment_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_name`, `payment_type`) VALUES
(1, 0, 'Cash'),
(2, 0, 'Paycheck'),
(3, 0, 'Direct Deposit'),
(5, 0, ' 	Payroll Cards'),
(6, 0, 'Cash'),
(7, 5, 'Cash'),
(8, 3, 'Payroll Cards');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(55) NOT NULL,
  `position_priority` tinyint(1) NOT NULL,
  `position_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position_name`, `position_priority`, `position_status`) VALUES
(3, 'CEO', 1, 1),
(4, 'HR Manager', 3, 1),
(5, 'Security', 4, 1),
(6, 'Developer', 4, 1),
(7, 'Branch Manager', 2, 1),
(10, 'Sales', 4, 1),
(11, 'Secretary', 3, 1),
(12, 'Administrator', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `privilage`
--

CREATE TABLE `privilage` (
  `privilage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilage`
--

INSERT INTO `privilage` (`privilage_id`, `user_id`, `modul_id`) VALUES
(1, 9999, 1),
(2, 9999, 2),
(3, 9999, 3),
(4, 9999, 4),
(5, 9999, 5),
(6, 9999, 6),
(7, 9999, 7),
(8, 9999, 8),
(9, 9999, 9),
(10, 9999, 10),
(11, 9999, 11),
(12, 9999, 12),
(13, 9999, 13),
(14, 9999, 14),
(15, 9999, 15),
(16, 9999, 16),
(17, 9999, 17),
(18, 9999, 18),
(19, 9999, 19),
(20, 9999, 20),
(21, 9999, 21),
(22, 9999, 22),
(23, 9999, 23),
(24, 9999, 24),
(25, 9999, 25),
(26, 12, 26),
(27, 12, 27),
(28, 12, 28),
(29, 12, 29),
(30, 12, 30),
(31, 12, 31),
(32, 12, 32),
(33, 12, 33),
(34, 12, 34);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(35) NOT NULL,
  `report_employee` int(100) NOT NULL,
  `report_start` int(30) NOT NULL,
  `report_salary` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_employee`, `report_start`, `report_salary`) VALUES
(3, 3, 3, 3),
(4, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int(20) NOT NULL,
  `salary_name` int(60) NOT NULL,
  `salary_amount` int(50) NOT NULL,
  `salary_duration` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `salary_name`, `salary_amount`, `salary_duration`) VALUES
(24, 1, 0, 'Full Time'),
(25, 2, 0, 'Full Time'),
(26, 3, 0, 'Full Time'),
(27, 4, 0, 'Full Time'),
(28, 5, 0, 'Part Time'),
(29, 6, 0, 'Part Time');

-- --------------------------------------------------------

--
-- Table structure for table `salaries_full`
--

CREATE TABLE `salaries_full` (
  `salary_id` int(20) NOT NULL,
  `salary_name` varchar(60) NOT NULL,
  `salary_amount` int(50) NOT NULL,
  `salary_duration` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries_full`
--

INSERT INTO `salaries_full` (`salary_id`, `salary_name`, `salary_amount`, `salary_duration`) VALUES
(3, '1', 0, 'Full Time'),
(8, '4', 0, ''),
(9, '2', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `salaries_part`
--

CREATE TABLE `salaries_part` (
  `salary_id` int(20) NOT NULL,
  `salary_name` varchar(60) NOT NULL,
  `salary_amount` int(50) NOT NULL,
  `salary_duration` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries_part`
--

INSERT INTO `salaries_part` (`salary_id`, `salary_name`, `salary_amount`, `salary_duration`) VALUES
(2, '5', 0, 'Part Time'),
(4, '3', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `password`, `role`, `status`) VALUES
(3, 'joni', 'Jhony Andrean', '', '91010ab2791f95fcd50d52d8b32f5c756438c411', 2, 1),
(12, 'naka', 'Naka', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1),
(9998, 'employer', 'Employer', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 1),
(9999, 'admin123', 'admin', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`allowance_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attendances_full`
--
ALTER TABLE `attendances_full`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attendances_part`
--
ALTER TABLE `attendances_part`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`bonus_id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`modul_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `privilage`
--
ALTER TABLE `privilage`
  ADD PRIMARY KEY (`privilage_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `salaries_full`
--
ALTER TABLE `salaries_full`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `salaries_part`
--
ALTER TABLE `salaries_part`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `allowance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendances_full`
--
ALTER TABLE `attendances_full`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendances_part`
--
ALTER TABLE `attendances_part`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `bonus_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `modul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `privilage`
--
ALTER TABLE `privilage`
  MODIFY `privilage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `salaries_full`
--
ALTER TABLE `salaries_full`
  MODIFY `salary_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `salaries_part`
--
ALTER TABLE `salaries_part`
  MODIFY `salary_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
