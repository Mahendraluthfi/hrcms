-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2019 at 10:26 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 5.6.40-5+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(11) NOT NULL,
  `id_allowance` varchar(12) NOT NULL,
  `allowance_name` varchar(25) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`id`, `id_allowance`, `allowance_name`, `nominal`) VALUES
(1, 'ID-DB0P95L', 'BPJS', 68000),
(6, 'ID-5TU2AV3', 'BPJS', 25500),
(7, 'ID-5TU2AV3', 'Fuel', 20000),
(8, 'ID-5TU2AV3', 'Communication', 24500),
(9, 'ID-5TU2AV3', 'Family', 90000),
(10, 'ID-OF0FJBO', 'BPJS', 25500),
(11, 'ID-OF0FJBO', 'Fuel', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `allowances_master`
--

CREATE TABLE `allowances_master` (
  `id` int(11) NOT NULL,
  `allowance_name` varchar(50) NOT NULL,
  `allowance_nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowances_master`
--

INSERT INTO `allowances_master` (`id`, `allowance_name`, `allowance_nominal`) VALUES
(1, 'BPJS', 25500),
(2, 'Fuel', 20000),
(3, 'Communication', 24500),
(4, 'Family', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `allowance_allocated`
--

CREATE TABLE `allowance_allocated` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `allowance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowance_allocated`
--

INSERT INTO `allowance_allocated` (`id`, `position_id`, `allowance_id`) VALUES
(5, 3, 1),
(6, 3, 2),
(11, 7, 1),
(12, 7, 2),
(13, 7, 3),
(14, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `attendance_employee` int(11) NOT NULL,
  `attendance_in` varchar(50) NOT NULL,
  `attendance_out` varchar(50) DEFAULT '00/00/00 00:00:00',
  `attendance_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `late_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `attendance_employee`, `attendance_in`, `attendance_out`, `attendance_timestamp`, `late_charge`) VALUES
(1, 1, '11/14/2018 10:39 AM', '11/14/2018 10:39 AM', '2018-11-14 03:39:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendances_setting`
--

CREATE TABLE `attendances_setting` (
  `attendance_id` int(11) NOT NULL,
  `attendance_name` varchar(30) NOT NULL,
  `start_hours` time NOT NULL,
  `end_hours` time NOT NULL,
  `tolerance` int(11) NOT NULL,
  `calculation` int(11) NOT NULL,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances_setting`
--

INSERT INTO `attendances_setting` (`attendance_id`, `attendance_name`, `start_hours`, `end_hours`, `tolerance`, `calculation`, `charge`) VALUES
(1, 'Full Time', '08:00:00', '17:00:00', 5, 5, 2000),
(2, 'Part Time', '09:00:00', '18:00:00', 10, 5, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `bonus_id` int(11) NOT NULL,
  `bonus_date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `bonus_amount` int(11) NOT NULL,
  `bonus_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`bonus_id`, `bonus_date`, `employee_id`, `bonus_amount`, `bonus_text`) VALUES
(2, '2019-03-12', 12, 25000, 'Dummy');

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
(1, 'Andik2', 'andik', 'af0b3b52ec598673aeb96627ff8d024e670496da', 'files/employee_pictures/31dfea34977d9450906152c7eb357d00.jpg', 3, 2700000, 'ungaran2', 'files/employee_pictures/00acc4f9183db8d130dbc0149f7b897f.jpg', 'files/employee_pictures/09e61a66c66ad7890f83be8aae6c4889.jpg', '05/09/1990', 'Man', '11/13/2018', 5456560, 'Full Time', 1, '2019-02-27 10:02:52', '0001-11-30', '0001-11-30', '0001-11-30', '0001-11-30', '0001-11-30', '0001-11-30', 8, 0, 0, 8, 0, 0, 0),
(12, 'Naka', 'naka', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 7, 2500000, 'Semarang', NULL, NULL, '08/26/1994', 'Man', '01/04/2019', 0, 'Full Time', 1, '2019-02-22 08:00:20', '2019-01-07', '2019-02-28', '2019-01-07', '2019-05-25', '2019-01-07', '2019-04-30', 7, 3, 4, -2, 1, 4, 0),
(16, 'Joni', 'joni123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 5, 120000, 'Semarang', NULL, NULL, '02/10/2009', 'Man', '01/04/2019', 851212, 'Part Time', 1, '2019-02-04 04:35:41', '2019-01-23', '2019-02-23', '2019-01-23', '2019-02-23', '2019-01-23', '2019-02-28', 1, 2, 3, 1, 2, 3, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `date`, `information`) VALUES
(2, '2019-02-05', 'Chinese New Year');

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
  `action_timestamp` datetime NOT NULL,
  `leave_deducted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `leave_employee`, `leave_category`, `leave_message`, `leave_reply_message`, `leave_date_start`, `leave_date_end`, `leave_days`, `leave_status`, `leave_attachment`, `leave_timestamp`, `action_timestamp`, `leave_deducted`) VALUES
(4, 12, '1', '', '', '2019-02-25', '2019-02-28', 4, 'APPROVED', '', '2019-02-22 15:00:06', '2019-02-22 15:00:20', 2),
(5, 16, '2', 'Family Interest', '', '2019-02-27', '2019-02-27', 1, 'PENDING', '', '2019-02-27 16:59:30', '0000-00-00 00:00:00', 0),
(6, 16, '3', 'Headache', '', '2019-03-01', '2019-03-01', 1, 'PENDING', '', '2019-02-27 17:00:52', '0000-00-00 00:00:00', 0);

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
(12, 'Administrator', 3, 1),
(14, 'Admin', 0, 0);

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
(34, 12, 34),
(36, 16, 26),
(37, 16, 27),
(38, 16, 28),
(39, 16, 29),
(40, 16, 30),
(41, 16, 31),
(42, 16, 32),
(43, 16, 33),
(44, 16, 34);

-- --------------------------------------------------------

--
-- Table structure for table `reimbursment`
--

CREATE TABLE `reimbursment` (
  `id_reimbursment` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `foto` text NOT NULL,
  `id_category` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `reject_reason` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reimbursment`
--

INSERT INTO `reimbursment` (`id_reimbursment`, `employee_id`, `date`, `description`, `foto`, `id_category`, `cost`, `reject_reason`, `status`) VALUES
(4, 12, '2019-02-26', 'Transport', 'IMG-27151409.png', 1, 150000, 'Ok', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reimbursment_category`
--

CREATE TABLE `reimbursment_category` (
  `id` int(11) NOT NULL,
  `category` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reimbursment_category`
--

INSERT INTO `reimbursment_category` (`id`, `category`, `status`) VALUES
(1, 'Transportation', 1),
(2, 'Foods', 1),
(3, 'Medic', 1),
(4, 'News', 0),
(5, 'Hostelry', 1);

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
-- Table structure for table `salary_detail`
--

CREATE TABLE `salary_detail` (
  `id_salary` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `id_allowance` varchar(12) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `month` int(2) NOT NULL,
  `date_release` date DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `deduct_attendance` int(11) DEFAULT NULL,
  `deduct_leave` int(11) DEFAULT NULL,
  `total_allowance` int(11) DEFAULT NULL,
  `total_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_detail`
--

INSERT INTO `salary_detail` (`id_salary`, `employee_id`, `id_allowance`, `year`, `month`, `date_release`, `salary`, `deduct_attendance`, `deduct_leave`, `total_allowance`, `total_salary`) VALUES
(1, 16, 'ID-DB0P95L', 2019, 1, '2019-02-27', 120000, 0, 0, 68000, 188000);

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
(12, 'naka', 'Naka', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1),
(16, 'joni123', 'Joni', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1),
(9998, 'employer', 'Employer', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 1),
(9999, 'admin123', 'admin', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_day`
--

CREATE TABLE `work_day` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_day`
--

INSERT INTO `work_day` (`id`, `day`, `status`) VALUES
(1, 'Monday', 1),
(2, 'Tuesday', 1),
(3, 'Wednesday', 1),
(7, 'Thursday', 1),
(8, 'Friday', 1),
(9, 'Saturday', 0),
(10, 'Sunday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_day_part`
--

CREATE TABLE `work_day_part` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_day_part`
--

INSERT INTO `work_day_part` (`id`, `day`, `status`) VALUES
(1, 'Monday', 1),
(2, 'Tuesday', 1),
(3, 'Wednesday', 1),
(4, 'Thursday', 1),
(5, 'Friday', 1),
(6, 'Saturday', 0),
(7, 'Sunday', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowances_master`
--
ALTER TABLE `allowances_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowance_allocated`
--
ALTER TABLE `allowance_allocated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attendances_setting`
--
ALTER TABLE `attendances_setting`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
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
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reimbursment`
--
ALTER TABLE `reimbursment`
  ADD PRIMARY KEY (`id_reimbursment`);

--
-- Indexes for table `reimbursment_category`
--
ALTER TABLE `reimbursment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `salary_detail`
--
ALTER TABLE `salary_detail`
  ADD PRIMARY KEY (`id_salary`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_day`
--
ALTER TABLE `work_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_day_part`
--
ALTER TABLE `work_day_part`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `allowances_master`
--
ALTER TABLE `allowances_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `allowance_allocated`
--
ALTER TABLE `allowance_allocated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendances_setting`
--
ALTER TABLE `attendances_setting`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `bonus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `privilage`
--
ALTER TABLE `privilage`
  MODIFY `privilage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `reimbursment`
--
ALTER TABLE `reimbursment`
  MODIFY `id_reimbursment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reimbursment_category`
--
ALTER TABLE `reimbursment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salary_detail`
--
ALTER TABLE `salary_detail`
  MODIFY `id_salary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
--
-- AUTO_INCREMENT for table `work_day`
--
ALTER TABLE `work_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `work_day_part`
--
ALTER TABLE `work_day_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
