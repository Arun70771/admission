-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 12:57 PM
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
-- Database: `admission_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `is_complate` int(11) NOT NULL,
  `saarc` varchar(100) DEFAULT NULL,
  `otp` varchar(4) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `programme` varchar(20) DEFAULT NULL,
  `master_programmes` varchar(25) DEFAULT NULL,
  `Phd_programmes` varchar(100) DEFAULT NULL,
  `Phd_programmes_saarc` varchar(50) DEFAULT NULL,
  `nationality` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pin_code` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `permanent` varchar(100) DEFAULT NULL,
  `p_address` varchar(100) DEFAULT NULL,
  `p_city` varchar(100) DEFAULT NULL,
  `p_state` varchar(100) DEFAULT NULL,
  `s_passing` varchar(255) DEFAULT NULL,
  `p_country` varchar(100) DEFAULT NULL,
  `p_pin_code` varchar(20) DEFAULT NULL,
  `s_cgpa` varchar(255) DEFAULT NULL,
  `s_college_name` varchar(255) DEFAULT NULL,
  `s_board_name` varchar(255) DEFAULT NULL,
  `s_subject` varchar(255) DEFAULT NULL,
  `b_title` varchar(50) DEFAULT NULL,
  `b_degree_duration` varchar(255) DEFAULT NULL,
  `b_examination` varchar(255) DEFAULT NULL,
  `b_gpa` varchar(255) DEFAULT NULL,
  `b_passing` varchar(255) DEFAULT NULL,
  `b_cgpa` varchar(255) DEFAULT NULL,
  `b_college` varchar(255) DEFAULT NULL,
  `b_board` varchar(255) DEFAULT NULL,
  `b_studied` varchar(255) DEFAULT NULL,
  `b_evaluation` varchar(10) DEFAULT NULL,
  `m_title` varchar(100) DEFAULT NULL,
  `m_passing` varchar(255) DEFAULT NULL,
  `m_cgpa` varchar(255) DEFAULT NULL,
  `m_college` varchar(255) DEFAULT NULL,
  `m_board` varchar(255) DEFAULT NULL,
  `m_studied` varchar(255) DEFAULT NULL,
  `m_degree_duration` varchar(255) DEFAULT NULL,
  `m_evaluation` varchar(10) DEFAULT NULL,
  `master_degree` varchar(255) DEFAULT NULL,
  `m_examination` varchar(255) DEFAULT NULL,
  `m_gpa` varchar(255) DEFAULT NULL,
  `fellowship` varchar(4) DEFAULT NULL,
  `bachelor_degree` varchar(50) DEFAULT NULL,
  `A_fellowship_name` varchar(255) DEFAULT NULL,
  `A_fellowship_country` varchar(255) DEFAULT NULL,
  `A_fellowship_entrance` varchar(255) DEFAULT NULL,
  `B_funding_agency` varchar(255) DEFAULT NULL,
  `B_funding_agency_name` varchar(255) DEFAULT NULL,
  `B_funding_years_duration` varchar(255) DEFAULT NULL,
  `C_employment_country` varchar(255) DEFAULT NULL,
  `C_organization_name` varchar(255) DEFAULT NULL,
  `C_organization_nature` varchar(255) DEFAULT NULL,
  `C_current_organization_years` varchar(255) DEFAULT NULL,
  `C_current_organization_month` varchar(255) DEFAULT NULL,
  `organization_leave` varchar(255) DEFAULT NULL,
  `hostel_facility` varchar(255) DEFAULT NULL,
  `know_about` varchar(255) DEFAULT NULL,
  `educational_degrees` varchar(255) DEFAULT NULL,
  `national_fellowship_offer_letter` varchar(255) DEFAULT NULL,
  `government_funding_offer_letter` varchar(255) DEFAULT NULL,
  `noc` varchar(255) DEFAULT NULL,
  `photo_identity_card` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `issuing_authority` varchar(50) DEFAULT NULL,
  `poi` varchar(50) DEFAULT NULL,
  `doe` varchar(50) DEFAULT NULL,
  `doi` varchar(50) DEFAULT NULL,
  `passport_no` varchar(50) DEFAULT NULL,
  `candidate_signatures` varchar(255) DEFAULT NULL,
  `short_cv` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `step`, `is_complate`, `saarc`, `otp`, `hash`, `programme`, `master_programmes`, `Phd_programmes`, `Phd_programmes_saarc`, `nationality`, `name`, `email`, `mobile`, `dob`, `father_name`, `gender`, `address`, `city`, `pin_code`, `state`, `country`, `permanent`, `p_address`, `p_city`, `p_state`, `s_passing`, `p_country`, `p_pin_code`, `s_cgpa`, `s_college_name`, `s_board_name`, `s_subject`, `b_title`, `b_degree_duration`, `b_examination`, `b_gpa`, `b_passing`, `b_cgpa`, `b_college`, `b_board`, `b_studied`, `b_evaluation`, `m_title`, `m_passing`, `m_cgpa`, `m_college`, `m_board`, `m_studied`, `m_degree_duration`, `m_evaluation`, `master_degree`, `m_examination`, `m_gpa`, `fellowship`, `bachelor_degree`, `A_fellowship_name`, `A_fellowship_country`, `A_fellowship_entrance`, `B_funding_agency`, `B_funding_agency_name`, `B_funding_years_duration`, `C_employment_country`, `C_organization_name`, `C_organization_nature`, `C_current_organization_years`, `C_current_organization_month`, `organization_leave`, `hostel_facility`, `know_about`, `educational_degrees`, `national_fellowship_offer_letter`, `government_funding_offer_letter`, `noc`, `photo_identity_card`, `passport`, `issuing_authority`, `poi`, `doe`, `doi`, `passport_no`, `candidate_signatures`, `short_cv`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'f', 's', 'fdfd', 'PhD', NULL, NULL, 'dfdfd', '213', 'sdfsdfsdfdsf', 'testimn@gmai.com', '+213 899656666', '2024-02-06', 'fff', 'Male', 'fdcasdasdsa', 'f', 'f', 'fState', '44', 'f', 'sdfsdfsdfdsf', 'sdfsdfsdfdsf', 'sdfsdfsdfdsf', '2021', '44', 'sdfsdfsdfdsf', 'f', 'f', 'z', 'zz', 'zz', '3 Years', 'Semester', 'zz', '2021', 'zz', 'zz', 'zz', 'zz', 'GPA', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'Yes', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'No', 'SAUPoster,SocialMedia,Facebook,Educational,Relative,Other', 'educational_degrees_1707213106.jpg', 'national_fellowship_1707213106.jpg', 'government_funding_1707213106.jpg', 'noc_1707213106.jpg', 'photo_1707213106.jpg', 'passport_1707213106.jpg', 'zz', 'zz', NULL, '2024-02-06', 'zz', 'candidate_signatures_1707213106.jpg', 'short_cv_1707213106.jpg', '2024-02-06 01:04:51', '2024-02-07 01:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `registions`
--

CREATE TABLE `registions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registions`
--

INSERT INTO `registions` (`id`, `name`, `email`, `mobile`, `password`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'dsds', 'kaushlendras1@gmail.com', '85962314', 'admin@123', NULL, '2024-02-06 01:04:51', '2024-02-06 01:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `temp_userdatas`
--

CREATE TABLE `temp_userdatas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `profile_status` varchar(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_userdatas`
--

INSERT INTO `temp_userdatas` (`id`, `name`, `email`, `mobile`, `password`, `pass`, `otp`, `profile_status`, `created_at`, `updated_at`) VALUES
(1, 'dsds', 'dsdsds@test.com', '85962314', '$2y$12$IBYmngZkA2ObAuGwNqpRluT67DVNKs2I7F0/eW/UKUq1SPw26w6CW', 'SiPKt', '9476', '0', '2024-02-06 00:54:36', '2024-02-06 00:54:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registions`
--
ALTER TABLE `registions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_userdatas`
--
ALTER TABLE `temp_userdatas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registions`
--
ALTER TABLE `registions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_userdatas`
--
ALTER TABLE `temp_userdatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
