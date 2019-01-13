-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 04:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testinis`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `password`, `phoneNumber`, `email`) VALUES
(1, '123456789', 12453698, 'admin@gmail.com'),
(2, 'testas', 123456789, 'admin1@gmail.com'),
(3, '$2y$13$wTXvoHyvQKFXDmEnKt0CT.BiFTZjvvx4ctsFN0UK.DEFPwT0em1kO', 123456, 'testas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_job`
--

CREATE TABLE `admin_job` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `jobsName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_job`
--

INSERT INTO `admin_job` (`id`, `admin_id`, `jobsName`, `jobs_id`) VALUES
(1, 3, 'Valymas', NULL),
(2, 3, 'Langu keitimas', NULL),
(3, 3, 'Padangu Montavimas', NULL),
(4, 3, 'Karburatoriaus Keitimas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_job_des`
--

CREATE TABLE `admin_job_des` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `jobsDes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobs_desc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `car_year` int(11) NOT NULL,
  `transmission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `engine_volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `car_body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maker_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `user_id`, `car_year`, `transmission`, `engine_volume`, `car_body`, `maker_id`, `model_id`) VALUES
('BBB999', 1, 2002, 'Sedanas', '1.5', 'Sedanas', '2', '3'),
('DDA751', 5, 2004, 'Hecbekas', '1.5', 'Hecbekas', '1', '1'),
('GFG854', 6, 2000, 'Hecbekas', '1.5', 'Hecbekas', '1', '1'),
('JDD545', 5, 2003, 'Hecbekas', '1.4', 'Hecbekas', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `car_main`
--

CREATE TABLE `car_main` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maker` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_main`
--

INSERT INTO `car_main` (`id`, `maker`) VALUES
('1', 'BMW'),
('2', 'Audi');

-- --------------------------------------------------------

--
-- Table structure for table `car_problme`
--

CREATE TABLE `car_problme` (
  `id` int(11) NOT NULL,
  `car_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jobName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_problme`
--

INSERT INTO `car_problme` (`id`, `car_id`, `jobName`, `order_id`) VALUES
(1, 'JDD545', 'Duzo stiklas', 5),
(2, 'DDA751', 'Langu keitimas', NULL),
(3, 'JDD545', 'Valymas', NULL),
(4, 'JDD545', 'Langu keitimas', NULL),
(5, 'JDD545', 'Karburatoriaus Keitimas', 6),
(6, NULL, 'Langu keitimas', NULL),
(7, 'JDD545', 'Karburatoriaus Keitimas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_second`
--

CREATE TABLE `car_second` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carMaker_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_second`
--

INSERT INTO `car_second` (`id`, `model`, `carMaker_id`) VALUES
('1', 'X5', '1'),
('2', 'X3', '1'),
('3', 'Q4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `administrator_id` int(11) DEFAULT NULL,
  `companyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `administrator_id`, `companyName`, `email`, `password`, `address`, `city`, `phoneNumber`, `is_active`) VALUES
(1, NULL, 'testas', 'testas@email.com', '$2y$13$Dyj3OttXY96n3ygZNJEeVOqQI4KyjmdgY7/9rI6YWkHZufKDVB4iO', 'Lieva g 25-2', 'Milanas', 71452368, 1),
(2, NULL, 'QA', 'qa_coadm1@mailinator.com', '$2y$13$12smNCTb0ARfmFypS7VC7euuxMWANYcmzevmXYOUf1N4qRMJCIkDm', 'Dainavos 15', 'Panevezys', 545454, 1),
(3, NULL, 'UAB Auto', 'email@test.com', '$2y$13$JfTx4qqSxpx/r1nygXVfhO80SR80tp76MNoxtmB5PdKyCiW9UpVDS', 'Dainiaus g. 25', 'Marijampole', 85858, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deny_comment`
--

CREATE TABLE `deny_comment` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deny_comment`
--

INSERT INTO `deny_comment` (`id`, `employee_id`, `company_id`, `comment`, `order_id`) VALUES
(1, NULL, NULL, 'gay', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `administrator_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstnames` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `report_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `administrator_id`, `company_id`, `email`, `firstnames`, `username`, `lastname`, `password`, `phoneNumber`, `position`, `is_active`, `report_id`) VALUES
(1, NULL, 1, 'viskis@gmail.com', 'viskis', NULL, 'viskis', '$2y$13$/5c3G462rudvRb1eETLGGuY2RTMLoBA.Ca5tXRGsh2VQI/alfhK1G', 3652145, 'Mechanikas', 1, NULL),
(2, 3, 1, 'ffsfd@gmail.com', 'sdfds', 'fsfs', 'fsd', 'vx', 2554, 'fddf', 1, NULL),
(3, NULL, 3, 'regular1@test.com', 'Jonas', NULL, 'Petraitis', '$2y$13$UJMSWQBZ3Bgb/cg4z8UpM.NQXjQWc8W86YNoh9/af2EFUVm3U2zDu', 55655, 'Mechanikas', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `jobName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `Admin_jobs` int(11) DEFAULT NULL,
  `Admin_jobsDes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `jobName`, `description`, `cost`, `jobTime`, `company_id`, `Admin_jobs`, `Admin_jobsDes`) VALUES
(1, 'Valymas', 'Sedyniu valymas', '50', '2 valandos', NULL, NULL, NULL),
(2, 'Langu keitimas', 'Keicimas', '10', '3 valandos', 1, NULL, NULL),
(3, 'Padangu Montavimas', 'Uzlopimas', '20', '2 dienos', 3, NULL, NULL),
(4, 'Karburatoriaus Keitimas', 'Techninis darbas', '20', '58 valandos', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maker` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maker`
--

INSERT INTO `maker` (`id`, `maker`) VALUES
('1', 'BMW'),
('2', 'Audi');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carMaker_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`, `carMaker_id`) VALUES
('1', 'X5', '1'),
('2', 'X3', '1'),
('3', 'M3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `car_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `problem_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `company_id`, `car_id`, `user_id`, `employee_id`, `profile_id`, `startDate`, `duration`, `status`, `cost`, `problem_id`) VALUES
(6, 3, 'DDA751', 5, 3, NULL, '2018-12-11 01:00:00', NULL, 'Approved', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostics` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `employee_id`, `description`, `comments`, `diagnostics`, `jobTime`) VALUES
(1, 1, 'good', 'veri good', 'god car', '58 days');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `car_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `administrator_id` int(11) DEFAULT NULL,
  `firstnames` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwordResetToken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `administrator_id`, `firstnames`, `username`, `lastname`, `email`, `phoneNumber`, `password`, `passwordResetToken`, `city`, `is_active`) VALUES
(1, NULL, 'Test', NULL, 'Test', 'test@email.com', 698521478, '$2y$13$/C9N0jgRV7Lu9176cKhcKeXi23TrSPlUcqoMMqEF9vdJZqh04K9tq', NULL, NULL, 1),
(5, NULL, 'QA', NULL, 'regular', 'qa_regular1@mailinator.com', 21454, '$2y$13$YySpw5bk5wkxFrrGfK7m2O.9RklQuNaLqPzIX6vkPAR1p4D26SVCG', NULL, NULL, 1),
(6, NULL, 'Osvaldas', NULL, 'osvaldas', 'osvaldas@osvaldas.lt', 123456789, '$2y$13$Tzp1OQMIgslxPR2M/POFY.vYdTlYHv1B7Zfahhu9GpF2eSLFu1Fd.', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `workStarted` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobDone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_job`
--
ALTER TABLE `admin_job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8DDFB38D48704627` (`jobs_id`),
  ADD KEY `IDX_8DDFB38D642B8210` (`admin_id`);

--
-- Indexes for table `admin_job_des`
--
ALTER TABLE `admin_job_des`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_61F01492642B8210` (`admin_id`),
  ADD KEY `IDX_61F01492C387C200` (`jobs_desc_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_773DE69DA76ED395` (`user_id`),
  ADD KEY `IDX_773DE69D68DA5EC3` (`maker_id`),
  ADD KEY `IDX_773DE69D7975B7E7` (`model_id`);

--
-- Indexes for table `car_main`
--
ALTER TABLE `car_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_problme`
--
ALTER TABLE `car_problme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_424E352E8D9F6D38` (`order_id`),
  ADD KEY `IDX_424E352EC3C6F69F` (`car_id`);

--
-- Indexes for table `car_second`
--
ALTER TABLE `car_second`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AE77FD9BB64F2634` (`carMaker_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4FBF094FE7927C74` (`email`),
  ADD KEY `IDX_4FBF094F4B09E92C` (`administrator_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A105B0D8979B1AD6` (`company_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E98F2859979B1AD6` (`company_id`),
  ADD KEY `IDX_E98F2859A76ED395` (`user_id`),
  ADD KEY `IDX_E98F2859642B8210` (`admin_id`);

--
-- Indexes for table `deny_comment`
--
ALTER TABLE `deny_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_673286578C03F15C` (`employee_id`),
  ADD KEY `IDX_67328657979B1AD6` (`company_id`),
  ADD KEY `IDX_673286578D9F6D38` (`order_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5D9F75A14BD2A4C0` (`report_id`),
  ADD KEY `IDX_5D9F75A14B09E92C` (`administrator_id`),
  ADD KEY `IDX_5D9F75A1979B1AD6` (`company_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_FBD8E0F8C7D7ECF5` (`Admin_jobs`),
  ADD UNIQUE KEY `UNIQ_FBD8E0F8270901` (`Admin_jobsDes`),
  ADD KEY `IDX_FBD8E0F8979B1AD6` (`company_id`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D79572D9B64F2634` (`carMaker_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEEBF396750` (`id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEE979B1AD6` (`company_id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEEC3C6F69F` (`car_id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEEA0DCED86` (`problem_id`),
  ADD KEY `IDX_E52FFDEEA76ED395` (`user_id`),
  ADD KEY `IDX_E52FFDEE8C03F15C` (`employee_id`),
  ADD KEY `IDX_E52FFDEECCFA12B8` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8157AA0FA76ED395` (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C42F77848C03F15C` (`employee_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E19D9AD2BF396750` (`id`),
  ADD KEY `IDX_E19D9AD2C3C6F69F` (`car_id`),
  ADD KEY `IDX_E19D9AD2642B8210` (`admin_id`),
  ADD KEY `IDX_E19D9AD2979B1AD6` (`company_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8D93D6494B09E92C` (`administrator_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_534E6880ED5CA9E6` (`service_id`),
  ADD KEY `IDX_534E68808C03F15C` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_job`
--
ALTER TABLE `admin_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_job_des`
--
ALTER TABLE `admin_job_des`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_problme`
--
ALTER TABLE `car_problme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deny_comment`
--
ALTER TABLE `deny_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_job`
--
ALTER TABLE `admin_job`
  ADD CONSTRAINT `FK_8DDFB38D48704627` FOREIGN KEY (`jobs_id`) REFERENCES `admin_job` (`id`),
  ADD CONSTRAINT `FK_8DDFB38D642B8210` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`id`);

--
-- Constraints for table `admin_job_des`
--
ALTER TABLE `admin_job_des`
  ADD CONSTRAINT `FK_61F01492642B8210` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`id`),
  ADD CONSTRAINT `FK_61F01492C387C200` FOREIGN KEY (`jobs_desc_id`) REFERENCES `admin_job` (`id`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_773DE69D68DA5EC3` FOREIGN KEY (`maker_id`) REFERENCES `maker` (`id`),
  ADD CONSTRAINT `FK_773DE69D7975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `FK_773DE69DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `car_problme`
--
ALTER TABLE `car_problme`
  ADD CONSTRAINT `FK_424E352E8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_424E352EC3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);

--
-- Constraints for table `car_second`
--
ALTER TABLE `car_second`
  ADD CONSTRAINT `FK_AE77FD9BB64F2634` FOREIGN KEY (`carMaker_id`) REFERENCES `car_main` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_4FBF094F4B09E92C` FOREIGN KEY (`administrator_id`) REFERENCES `administrator` (`id`);

--
-- Constraints for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD CONSTRAINT `FK_A105B0D8979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `FK_E98F2859642B8210` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`id`),
  ADD CONSTRAINT `FK_E98F2859979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_E98F2859A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `deny_comment`
--
ALTER TABLE `deny_comment`
  ADD CONSTRAINT `FK_673286578C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `FK_673286578D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_67328657979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_5D9F75A14B09E92C` FOREIGN KEY (`administrator_id`) REFERENCES `administrator` (`id`),
  ADD CONSTRAINT `FK_5D9F75A14BD2A4C0` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`),
  ADD CONSTRAINT `FK_5D9F75A1979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `FK_FBD8E0F8270901` FOREIGN KEY (`Admin_jobsDes`) REFERENCES `admin_job_des` (`id`),
  ADD CONSTRAINT `FK_FBD8E0F8979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_FBD8E0F8C7D7ECF5` FOREIGN KEY (`Admin_jobs`) REFERENCES `admin_job` (`id`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FK_D79572D9B64F2634` FOREIGN KEY (`carMaker_id`) REFERENCES `maker` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE8C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `FK_E52FFDEE979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_E52FFDEEA0DCED86` FOREIGN KEY (`problem_id`) REFERENCES `car_problme` (`id`),
  ADD CONSTRAINT `FK_E52FFDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_E52FFDEEC3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `FK_E52FFDEECCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_8157AA0FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FK_C42F77848C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_E19D9AD2642B8210` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`id`),
  ADD CONSTRAINT `FK_E19D9AD2979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_E19D9AD2C3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6494B09E92C` FOREIGN KEY (`administrator_id`) REFERENCES `administrator` (`id`);

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `FK_534E68808C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `FK_534E6880ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
