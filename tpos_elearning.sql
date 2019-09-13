-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 05:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpos_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 2, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC 211\",\"course_title\":\"Introduction To Programming\"}}', '2019-07-30 11:24:35', '2019-07-30 11:24:35'),
(2, 'default', 'created', 3, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC212\",\"course_title\":\"Structured Programming\"}}', '2019-07-30 11:25:22', '2019-07-30 11:25:22'),
(3, 'default', 'updated', 1, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC 101\",\"course_title\":\"Introduction To Computers\"},\"old\":{\"course_code\":\"CSC 101\",\"course_title\":\"Introduction To Computer\"}}', '2019-07-30 11:41:25', '2019-07-30 11:41:25'),
(4, 'default', 'updated', 1, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC 101\",\"course_title\":\"Introduction To Computer\"},\"old\":{\"course_code\":\"CSC 101\",\"course_title\":\"Introduction To Computers\"}}', '2019-07-30 11:42:06', '2019-07-30 11:42:06'),
(5, 'default', 'updated', 2, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC211\",\"course_title\":\"Introduction To Programming\"},\"old\":{\"course_code\":\"CSC 211\",\"course_title\":\"Introduction To Programming\"}}', '2019-07-30 11:46:34', '2019-07-30 11:46:34'),
(6, 'default', 'updated', 1, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computer\"},\"old\":{\"course_code\":\"CSC 101\",\"course_title\":\"Introduction To Computer\"}}', '2019-07-30 11:46:50', '2019-07-30 11:46:50'),
(7, 'default', 'updated', 3, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC212\",\"course_title\":\"Structured Programming\"},\"old\":{\"course_code\":\"CSC212\",\"course_title\":\"Structured Programming\"}}', '2019-07-30 11:51:00', '2019-07-30 11:51:00'),
(8, 'default', 'updated', 1, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computer\"},\"old\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computer\"}}', '2019-07-30 11:53:49', '2019-07-30 11:53:49'),
(9, 'default', 'deleted', 1, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computer\"}}', '2019-07-30 12:00:49', '2019-07-30 12:00:49'),
(10, 'default', 'restored', 1, 'App\\Courses', 1, 'App\\User', '{\"course_title\":\"Introduction To Computer\",\"course_code\":\"CSC101\"}', '2019-07-30 12:28:30', '2019-07-30 12:28:30'),
(11, 'default', 'deleted', 3, 'App\\Courses', 1, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC212\",\"course_title\":\"Structured Programming\"}}', '2019-07-30 12:30:41', '2019-07-30 12:30:41'),
(12, 'default', 'restored', 3, 'App\\Courses', 1, 'App\\User', '{\"course_title\":\"Structured Programming\",\"course_code\":\"CSC212\"}', '2019-07-30 12:30:53', '2019-07-30 12:30:53'),
(13, 'default', 'deleted', 3, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}}', '2019-07-30 12:38:44', '2019-07-30 12:38:44'),
(14, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-30 12:39:53', '2019-07-30 12:39:53'),
(15, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-30 12:42:25', '2019-07-30 12:42:25'),
(16, 'default', 'created', 5, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-07-30 13:30:04', '2019-07-30 13:30:04'),
(17, 'default', 'created', 6, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-07-30 13:31:25', '2019-07-30 13:31:25'),
(18, 'default', 'created', 7, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-07-30 13:33:12', '2019-07-30 13:33:12'),
(19, 'default', 'created', 1, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Ajibade Samson\",\"staff_email\":\"samson@gmail.com\"}}', '2019-07-30 13:33:12', '2019-07-30 13:33:12'),
(20, 'default', 'created', 8, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Akinsola Sunday\",\"email\":\"sola@gmail.com\"}}', '2019-07-30 13:58:11', '2019-07-30 13:58:11'),
(21, 'default', 'created', 2, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sola@gmail.com\"}}', '2019-07-30 13:58:11', '2019-07-30 13:58:11'),
(22, 'default', 'updated', 2, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sundays\",\"staff_email\":\"sola@gmail.com\"},\"old\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sola@gmail.com\"}}', '2019-07-30 14:09:37', '2019-07-30 14:09:37'),
(23, 'default', 'updated', 2, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"solas@gmail.com\"},\"old\":{\"staff_name\":\"Akinsola Sundays\",\"staff_email\":\"sola@gmail.com\"}}', '2019-07-30 14:20:56', '2019-07-30 14:20:56'),
(24, 'default', 'updated', 2, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sola@gmail.com\"},\"old\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"solas@gmail.com\"}}', '2019-07-30 14:21:15', '2019-07-30 14:21:15'),
(25, 'default', 'deleted', 1, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Ajibade Samson\",\"staff_email\":\"samson@gmail.com\"}}', '2019-07-30 14:29:51', '2019-07-30 14:29:51'),
(26, 'default', 'deleted', 7, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-07-30 14:29:51', '2019-07-30 14:29:51'),
(27, 'default', 'deleted', 2, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sola@gmail.com\"}}', '2019-07-30 14:30:01', '2019-07-30 14:30:01'),
(28, 'default', 'deleted', 8, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Akinsola Sunday\",\"email\":\"sola@gmail.com\"}}', '2019-07-30 14:30:01', '2019-07-30 14:30:01'),
(29, 'default', 'created', 1, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":1,\"user_id\":7,\"program\":\"Full Time\",\"level\":\"OND 2\"}}', '2019-07-30 21:18:40', '2019-07-30 21:18:40'),
(30, 'default', 'created', 2, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":3,\"user_id\":7,\"program\":\"Daily Part Time\",\"level\":\"HND 1\"}}', '2019-07-30 21:28:40', '2019-07-30 21:28:40'),
(31, 'default', 'created', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":8,\"program\":\"Daily Part Time\",\"level\":\"HND 2\"}}', '2019-07-30 21:31:12', '2019-07-30 21:31:12'),
(32, 'default', 'updated', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":8,\"program\":\"Daily Part Time\",\"level\":\"OND 1\"},\"old\":{\"course_id\":2,\"user_id\":8,\"program\":\"Daily Part Time\",\"level\":\"HND 2\"}}', '2019-07-31 08:00:16', '2019-07-31 08:00:16'),
(33, 'default', 'updated', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":7,\"program\":\"Full Time\",\"level\":\"OND 2\"},\"old\":{\"course_id\":2,\"user_id\":8,\"program\":\"Daily Part Time\",\"level\":\"OND 1\"}}', '2019-07-31 08:00:47', '2019-07-31 08:00:47'),
(34, 'default', 'updated', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":1,\"user_id\":8,\"program\":\"Full Time\",\"level\":\"OND 2\"},\"old\":{\"course_id\":2,\"user_id\":7,\"program\":\"Full Time\",\"level\":\"OND 2\"}}', '2019-07-31 08:01:10', '2019-07-31 08:01:10'),
(35, 'default', 'updated', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":8,\"program\":\"Full Time\",\"level\":\"OND 2\"},\"old\":{\"course_id\":1,\"user_id\":8,\"program\":\"Full Time\",\"level\":\"OND 2\"}}', '2019-07-31 08:01:36', '2019-07-31 08:01:36'),
(36, 'default', 'deleted', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":8,\"program\":\"Full Time\",\"level\":\"OND 2\"}}', '2019-07-31 08:20:43', '2019-07-31 08:20:43'),
(37, 'default', 'restored', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"course_id\":2,\"user_id\":8,\"program\":\"Full Time\",\"level\":\"OND 2\"}', '2019-07-31 08:24:00', '2019-07-31 08:24:00'),
(38, 'default', 'deleted', 1, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":1,\"user_id\":7,\"program\":\"Full Time\",\"level\":\"OND 2\"}}', '2019-07-31 08:28:02', '2019-07-31 08:28:02'),
(39, 'default', 'restored', 1, 'App\\CourseAllocations', 1, 'App\\User', '{\"course_id\":1,\"user_id\":7,\"program\":\"Full Time\",\"level\":\"OND 2\"}', '2019-07-31 08:28:22', '2019-07-31 08:28:22'),
(40, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Name\",\"student_email\":\"Email\",\"matric_number\":\"Matric Number\"}}', '2019-07-31 10:43:46', '2019-07-31 10:43:46'),
(41, 'default', 'created', 9, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Name\",\"email\":\"Email\"}}', '2019-07-31 10:43:46', '2019-07-31 10:43:46'),
(42, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Sola\",\"student_email\":\"sola@gmail.com\",\"matric_number\":\"123\"}}', '2019-07-31 10:43:47', '2019-07-31 10:43:47'),
(43, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Sola\",\"student_email\":\"sola@gmail.com\",\"matric_number\":\"123\"}}', '2019-07-31 10:45:50', '2019-07-31 10:45:50'),
(44, 'default', 'created', 11, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Sola\",\"email\":\"sola@gmail.com\"}}', '2019-07-31 10:45:50', '2019-07-31 10:45:50'),
(45, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Fola\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"124\"}}', '2019-07-31 10:45:51', '2019-07-31 10:45:51'),
(46, 'default', 'created', 12, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Fola\",\"email\":\"kola@gmail.com\"}}', '2019-07-31 10:45:51', '2019-07-31 10:45:51'),
(47, 'default', 'created', 5, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"125\"}}', '2019-07-31 10:45:51', '2019-07-31 10:45:51'),
(48, 'default', 'created', 13, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-07-31 10:45:51', '2019-07-31 10:45:51'),
(49, 'default', 'created', 6, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"126\"}}', '2019-07-31 10:45:52', '2019-07-31 10:45:52'),
(50, 'default', 'created', 14, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-07-31 10:45:52', '2019-07-31 10:45:52'),
(51, 'default', 'created', 7, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-07-31 11:05:31', '2019-07-31 11:05:31'),
(52, 'default', 'created', 15, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-07-31 11:05:31', '2019-07-31 11:05:31'),
(53, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-07-31 11:18:41', '2019-07-31 11:18:41'),
(54, 'default', 'created', 16, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-07-31 11:18:41', '2019-07-31 11:18:41'),
(55, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-07-31 11:18:41', '2019-07-31 11:18:41'),
(56, 'default', 'created', 17, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-07-31 11:18:41', '2019-07-31 11:18:41'),
(57, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-07-31 11:18:42', '2019-07-31 11:18:42'),
(58, 'default', 'created', 18, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-07-31 11:18:42', '2019-07-31 11:18:42'),
(59, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-07-31 11:18:42', '2019-07-31 11:18:42'),
(60, 'default', 'created', 19, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-07-31 11:18:42', '2019-07-31 11:18:42'),
(61, 'default', 'updated', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope Hammed\",\"student_email\":\"hammed@gmail.com\",\"matric_number\":\"12030\"},\"old\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-07-31 11:50:33', '2019-07-31 11:50:33'),
(62, 'default', 'deleted', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope Hammed\",\"student_email\":\"hammed@gmail.com\",\"matric_number\":\"12030\"}}', '2019-07-31 11:53:57', '2019-07-31 11:53:57'),
(63, 'default', 'deleted', 16, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope Hammed\",\"email\":\"hammed@gmail.com\"}}', '2019-07-31 11:53:57', '2019-07-31 11:53:57'),
(64, 'default', 'restored', 1, 'App\\Students', 1, 'App\\User', '{\"student_name\":\"Kolasope Hammed\",\"student_email\":\"hammed@gmail.com\"}', '2019-07-31 12:04:11', '2019-07-31 12:04:11'),
(65, 'default', 'deleted', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope Hammed\",\"student_email\":\"hammed@gmail.com\",\"matric_number\":\"12030\"}}', '2019-07-31 12:06:27', '2019-07-31 12:06:27'),
(66, 'default', 'deleted', 16, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope Hammed\",\"email\":\"hammed@gmail.com\"}}', '2019-07-31 12:06:27', '2019-07-31 12:06:27'),
(67, 'default', 'restored', 1, 'App\\Students', 1, 'App\\User', '{\"student_name\":\"Kolasope Hammed\",\"student_email\":\"hammed@gmail.com\"}', '2019-07-31 12:17:45', '2019-07-31 12:17:45'),
(68, 'default', 'deleted', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-07-31 12:18:29', '2019-07-31 12:18:29'),
(69, 'default', 'deleted', 18, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-07-31 12:18:29', '2019-07-31 12:18:29'),
(70, 'default', 'deleted', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-07-31 12:23:33', '2019-07-31 12:23:33'),
(71, 'default', 'deleted', 18, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-07-31 12:23:33', '2019-07-31 12:23:33'),
(72, 'default', 'deleted', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-07-31 12:25:16', '2019-07-31 12:25:16'),
(73, 'default', 'deleted', 17, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-07-31 12:25:16', '2019-07-31 12:25:16'),
(74, 'default', 'deleted', 1, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Ajibade Samson\",\"staff_email\":\"samson@gmail.com\"}}', '2019-07-31 12:30:09', '2019-07-31 12:30:09'),
(75, 'default', 'deleted', 7, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-07-31 12:30:09', '2019-07-31 12:30:09'),
(76, 'default', 'created', 20, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Akinsola Sunday\",\"email\":\"sunday@gmail.com\"}}', '2019-08-01 07:49:57', '2019-08-01 07:49:57'),
(77, 'default', 'created', 3, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sunday@gmail.com\"}}', '2019-08-01 07:49:57', '2019-08-01 07:49:57'),
(78, 'default', 'updated', 20, 'App\\User', 20, 'App\\User', '{\"attributes\":{\"name\":\"Akinsola Sunday\",\"email\":\"sunday@gmail.com\"},\"old\":{\"name\":\"Akinsola Sunday\",\"email\":\"sunday@gmail.com\"}}', '2019-08-01 07:54:28', '2019-08-01 07:54:28'),
(79, 'default', 'updated', 1, 'App\\Courses', 20, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computer\"},\"old\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computer\"}}', '2019-08-01 07:55:10', '2019-08-01 07:55:10'),
(80, 'default', 'created', 4, 'App\\Courses', 20, 'App\\User', '{\"attributes\":{\"course_code\":\"MFX220\",\"course_title\":\"Mifox Training\"}}', '2019-08-01 07:56:25', '2019-08-01 07:56:25'),
(81, 'default', 'created', 4, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":4,\"user_id\":20,\"program\":\"Full Time\",\"level\":\"OND 1\"}}', '2019-08-01 08:26:34', '2019-08-01 08:26:34'),
(82, 'default', 'created', 5, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":3,\"user_id\":20,\"program\":\"Daily Part Time\",\"level\":\"OND 2\"}}', '2019-08-01 08:26:49', '2019-08-01 08:26:49'),
(83, 'default', 'updated', 3, 'App\\Staffs', 20, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sunday@gmail.com\"},\"old\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sunday@gmail.com\"}}', '2019-08-01 09:12:19', '2019-08-01 09:12:19'),
(84, 'default', 'created', 21, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-08-01 09:13:10', '2019-08-01 09:13:10'),
(85, 'default', 'created', 4, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Ajibade Samson\",\"staff_email\":\"samson@gmail.com\"}}', '2019-08-01 09:13:10', '2019-08-01 09:13:10'),
(86, 'default', 'updated', 21, 'App\\User', 21, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"},\"old\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-08-01 09:27:38', '2019-08-01 09:27:38'),
(87, 'default', 'updated', 4, 'App\\Staffs', 21, 'App\\User', '{\"attributes\":{\"staff_name\":\"Ajibade Samson Opeyemi\",\"staff_email\":\"samson@gmail.com\"},\"old\":{\"staff_name\":\"Ajibade Samson\",\"staff_email\":\"samson@gmail.com\"}}', '2019-08-01 09:32:49', '2019-08-01 09:32:49'),
(88, 'default', 'created', 5, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-01 10:03:06', '2019-08-01 10:03:06'),
(89, 'default', 'created', 22, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-01 10:03:06', '2019-08-01 10:03:06'),
(90, 'default', 'created', 6, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-01 10:03:06', '2019-08-01 10:03:06'),
(91, 'default', 'created', 23, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-08-01 10:03:06', '2019-08-01 10:03:06'),
(92, 'default', 'created', 7, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-01 10:03:06', '2019-08-01 10:03:06'),
(93, 'default', 'created', 24, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-08-01 10:03:07', '2019-08-01 10:03:07'),
(94, 'default', 'created', 8, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-08-01 10:03:07', '2019-08-01 10:03:07'),
(95, 'default', 'created', 25, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-08-01 10:03:07', '2019-08-01 10:03:07'),
(96, 'default', 'created', 5, 'App\\Courses', 21, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC219\",\"course_title\":\"Programming In High Level Language\"}}', '2019-08-01 10:09:55', '2019-08-01 10:09:55'),
(97, 'default', 'updated', 5, 'App\\Courses', 21, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC219\",\"course_title\":\"Programming In High Level Languages\"},\"old\":{\"course_code\":\"CSC219\",\"course_title\":\"Programming In High Level Language\"}}', '2019-08-01 10:10:24', '2019-08-01 10:10:24'),
(98, 'default', 'updated', 3, 'App\\Courses', 21, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC212\",\"course_title\":\"Structured Programming\"},\"old\":{\"course_code\":\"CSC212\",\"course_title\":\"Structured Programming\"}}', '2019-08-01 10:10:54', '2019-08-01 10:10:54'),
(99, 'default', 'created', 6, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":5,\"user_id\":21,\"program\":\"Daily Part Time\",\"level\":\"HND 1\"}}', '2019-08-01 10:14:51', '2019-08-01 10:14:51'),
(100, 'default', 'created', 7, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":4,\"user_id\":21,\"program\":\"Full Time\",\"level\":\"HND 2\"}}', '2019-08-01 10:15:21', '2019-08-01 10:15:21'),
(101, 'default', 'created', 1, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":6,\"question\":\"fgoq nwvmals;d ehrwje\",\"submission_date\":\"08\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 12:20:36', '2019-08-01 12:20:36'),
(102, 'default', 'created', 2, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":6,\"question\":\"fgoq nwvmals;d ehrwje\",\"submission_date\":\"08\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 12:20:51', '2019-08-01 12:20:51'),
(103, 'default', 'created', 3, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":6,\"question\":\"Read and Summarize chapter one to five of the uploaded handout\",\"submission_date\":\"02\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 13:02:28', '2019-08-01 13:02:28'),
(104, 'default', 'created', 1, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":6,\"question\":\"Read and Summarize chapter one to five of the uploaded handout\",\"submission_date\":\"02\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 13:05:25', '2019-08-01 13:05:25'),
(105, 'default', 'created', 2, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":7,\"question\":\"Please summarize the content of this material\",\"submission_date\":\"02\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 13:29:13', '2019-08-01 13:29:13'),
(106, 'default', 'updated', 2, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":7,\"question\":\"Please summarize the content of this material and submit on or before the stipulated date\",\"submission_date\":\"03\\/02\\/2019\",\"user_id\":21},\"old\":{\"allocation_id\":7,\"question\":\"Please summarize the content of this material\",\"submission_date\":\"02\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 13:50:29', '2019-08-01 13:50:29'),
(107, 'default', 'deleted', 2, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":7,\"question\":\"Please summarize the content of this material and submit on or before the stipulated date\",\"submission_date\":\"03\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 14:22:56', '2019-08-01 14:22:56'),
(108, 'default', 'created', 3, 'App\\Assignments', 20, 'App\\User', '{\"attributes\":{\"allocation_id\":5,\"question\":\"This is for testing\",\"submission_date\":\"08\\/14\\/2019\",\"user_id\":20}}', '2019-08-01 14:31:16', '2019-08-01 14:31:16'),
(109, 'default', 'deleted', 3, 'App\\Assignments', 20, 'App\\User', '{\"attributes\":{\"allocation_id\":5,\"question\":\"This is for testing\",\"submission_date\":\"08\\/14\\/2019\",\"user_id\":20}}', '2019-08-01 14:31:24', '2019-08-01 14:31:24'),
(110, 'default', 'updated', 3, 'App\\Assignments', 20, 'App\\User', '{\"attributes\":{\"allocation_id\":5,\"question\":\"This is for testing, Please submit before the stipulated date\",\"submission_date\":\"08\\/14\\/2019\",\"user_id\":20},\"old\":{\"allocation_id\":5,\"question\":\"This is for testing\",\"submission_date\":\"08\\/14\\/2019\",\"user_id\":20}}', '2019-08-01 14:36:53', '2019-08-01 14:36:53'),
(111, 'default', 'deleted', 3, 'App\\Assignments', 1, 'App\\User', '{\"attributes\":{\"allocation_id\":5,\"question\":\"This is for testing, Please submit before the stipulated date\",\"submission_date\":\"08\\/14\\/2019\",\"user_id\":20}}', '2019-08-01 14:40:47', '2019-08-01 14:40:47'),
(112, 'default', 'updated', 2, 'App\\Assignments', 1, 'App\\User', '{\"attributes\":{\"allocation_id\":7,\"question\":\"Please summarize the content of this material and submit on or before the stipulated date. Please Take note\",\"submission_date\":\"03\\/02\\/2019\",\"user_id\":1},\"old\":{\"allocation_id\":7,\"question\":\"Please summarize the content of this material and submit on or before the stipulated date\",\"submission_date\":\"03\\/02\\/2019\",\"user_id\":21}}', '2019-08-01 14:42:56', '2019-08-01 14:42:56'),
(113, 'default', 'created', 4, 'App\\Assignments', 21, 'App\\User', '{\"attributes\":{\"allocation_id\":6,\"question\":\"Read Chapter One to \\\" and Summerize\",\"submission_date\":\"08\\/20\\/2019\",\"user_id\":21}}', '2019-08-01 14:45:20', '2019-08-01 14:45:20'),
(114, 'default', 'updated', 6, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah Solafola\",\"student_email\":\"debby@gmail.com\",\"matric_number\":\"1294\"},\"old\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-11 17:59:47', '2019-08-11 17:59:47'),
(115, 'default', 'created', 26, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Agbeleke Folake\",\"email\":\"folake@gmail.com\"}}', '2019-08-11 18:09:55', '2019-08-11 18:09:55'),
(116, 'default', 'created', 5, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Agbeleke Folake\",\"staff_email\":\"folake@gmail.com\"}}', '2019-08-11 18:09:55', '2019-08-11 18:09:55'),
(117, 'default', 'created', 27, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Testing The STaff\",\"email\":\"test@gmail.com\"}}', '2019-08-11 18:14:57', '2019-08-11 18:14:57'),
(118, 'default', 'created', 6, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Testing The STaff\",\"staff_email\":\"test@gmail.com\"}}', '2019-08-11 18:14:57', '2019-08-11 18:14:57'),
(119, 'default', 'created', 28, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Teeboi\",\"email\":\"teeboi@gmail.com\"}}', '2019-08-11 18:26:16', '2019-08-11 18:26:16'),
(120, 'default', 'created', 7, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Teeboi\",\"staff_email\":\"teeboi@gmail.com\"}}', '2019-08-11 18:26:16', '2019-08-11 18:26:16'),
(121, 'default', 'created', 29, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Akinsola Sunday\",\"email\":\"sunday@gmail.com\"}}', '2019-08-11 18:35:37', '2019-08-11 18:35:37'),
(122, 'default', 'created', 1, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Akinsola Sunday\",\"staff_email\":\"sunday@gmail.com\"}}', '2019-08-11 18:35:37', '2019-08-11 18:35:37'),
(123, 'default', 'created', 6, 'App\\Courses', 29, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC109\",\"course_title\":\"Mifox Java Learning\"}}', '2019-08-11 18:41:26', '2019-08-11 18:41:26'),
(124, 'default', 'updated', 1, 'App\\Courses', 29, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computers\"},\"old\":{\"course_code\":\"CSC101\",\"course_title\":\"Introduction To Computer\"}}', '2019-08-11 18:41:47', '2019-08-11 18:41:47'),
(125, 'default', 'updated', 5, 'App\\Courses', 29, 'App\\User', '{\"attributes\":{\"course_code\":\"CSC210\",\"course_title\":\"Programming In HLL\"},\"old\":{\"course_code\":\"CSC219\",\"course_title\":\"Programming In High Level Languages\"}}', '2019-08-11 18:42:42', '2019-08-11 18:42:42'),
(126, 'default', 'created', 30, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-08-11 18:47:46', '2019-08-11 18:47:46'),
(127, 'default', 'created', 2, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Ajibade Samson\",\"staff_email\":\"samson@gmail.com\"}}', '2019-08-11 18:47:46', '2019-08-11 18:47:46'),
(128, 'default', 'created', 1, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":1,\"user_id\":30,\"program\":\"Full Time\",\"level\":\"OND 1\"}}', '2019-08-11 18:48:28', '2019-08-11 18:48:28'),
(129, 'default', 'created', 2, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":30,\"program\":\"Daily Part Time\",\"level\":\"OND 2\"}}', '2019-08-11 18:48:42', '2019-08-11 18:48:42'),
(130, 'default', 'created', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":6,\"user_id\":29,\"program\":\"Full Time\",\"level\":\"HND 1\"}}', '2019-08-11 18:48:55', '2019-08-11 18:48:55'),
(131, 'default', 'created', 4, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":4,\"user_id\":29,\"program\":\"Daily Part Time\",\"level\":\"HND 2\"}}', '2019-08-11 18:49:10', '2019-08-11 18:49:10'),
(132, 'default', 'created', 1, 'App\\Assignments', 29, 'App\\User', '{\"attributes\":{\"allocation_id\":4,\"question\":\"Please read and summerize the following material\",\"submission_date\":\"08\\/12\\/2019\",\"user_id\":29}}', '2019-08-11 18:52:43', '2019-08-11 18:52:43'),
(133, 'default', 'updated', 1, 'App\\Assignments', 29, 'App\\User', '{\"attributes\":{\"allocation_id\":4,\"question\":\"Please read and summarize the following materials\",\"submission_date\":\"08\\/12\\/2019\",\"user_id\":29},\"old\":{\"allocation_id\":4,\"question\":\"Please read and summerize the following material\",\"submission_date\":\"08\\/12\\/2019\",\"user_id\":29}}', '2019-08-11 18:53:49', '2019-08-11 18:53:49'),
(134, 'default', 'created', 2, 'App\\Assignments', 29, 'App\\User', '{\"attributes\":{\"allocation_id\":3,\"question\":\"Please read and summarize chapter 1\",\"submission_date\":\"08\\/19\\/2019\",\"user_id\":29}}', '2019-08-11 18:55:13', '2019-08-11 18:55:13'),
(135, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-11 18:58:12', '2019-08-11 18:58:12'),
(136, 'default', 'created', 31, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-11 18:58:12', '2019-08-11 18:58:12'),
(137, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-11 18:58:12', '2019-08-11 18:58:12'),
(138, 'default', 'created', 32, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-08-11 18:58:12', '2019-08-11 18:58:12'),
(139, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-11 18:58:13', '2019-08-11 18:58:13'),
(140, 'default', 'created', 33, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-08-11 18:58:13', '2019-08-11 18:58:13'),
(141, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-08-11 18:58:13', '2019-08-11 18:58:13'),
(142, 'default', 'created', 34, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-08-11 18:58:13', '2019-08-11 18:58:13'),
(143, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-11 19:05:40', '2019-08-11 19:05:40'),
(144, 'default', 'created', 35, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-11 19:05:40', '2019-08-11 19:05:40'),
(145, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-11 19:05:41', '2019-08-11 19:05:41'),
(146, 'default', 'created', 36, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-08-11 19:05:41', '2019-08-11 19:05:41'),
(147, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-11 19:05:41', '2019-08-11 19:05:41'),
(148, 'default', 'created', 37, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-08-11 19:05:41', '2019-08-11 19:05:41'),
(149, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-08-11 19:05:41', '2019-08-11 19:05:41'),
(150, 'default', 'created', 38, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-08-11 19:05:41', '2019-08-11 19:05:41'),
(151, 'default', 'created', 40, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Ajibade Samson\",\"email\":\"samson@gmail.com\"}}', '2019-08-24 08:33:25', '2019-08-24 08:33:25'),
(152, 'default', 'created', 1, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Ajibade Samson\",\"staff_email\":\"samson@gmail.com\"}}', '2019-08-24 08:33:26', '2019-08-24 08:33:26'),
(153, 'default', 'created', 41, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo O\",\"email\":\"taiwo@gmail.com\"}}', '2019-08-24 08:48:44', '2019-08-24 08:48:44'),
(154, 'default', 'created', 2, 'App\\Staffs', 1, 'App\\User', '{\"attributes\":{\"staff_name\":\"Adesina Taiwo O\",\"staff_email\":\"taiwo@gmail.com\"}}', '2019-08-24 08:48:44', '2019-08-24 08:48:44'),
(155, 'default', 'created', 1, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":1,\"user_id\":41,\"program\":\"Full Time\",\"level\":\"OND 1\"}}', '2019-08-24 08:57:53', '2019-08-24 08:57:53'),
(156, 'default', 'created', 2, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":41,\"program\":\"Daily Part Time\",\"level\":\"OND 2\"}}', '2019-08-24 08:58:11', '2019-08-24 08:58:11'),
(157, 'default', 'created', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":6,\"user_id\":40,\"program\":\"Full Time\",\"level\":\"HND 1\"}}', '2019-08-24 08:58:25', '2019-08-24 08:58:25'),
(158, 'default', 'created', 4, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":4,\"user_id\":40,\"program\":\"Daily Part Time\",\"level\":\"HND 2\"}}', '2019-08-24 08:58:42', '2019-08-24 08:58:42'),
(159, 'default', 'created', 5, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":5,\"user_id\":41,\"program\":\"Full Time\",\"level\":\"OND 1\",\"session\":\"2017\\/2018\"}}', '2019-08-24 09:07:26', '2019-08-24 09:07:26'),
(160, 'default', 'updated', 4, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":4,\"user_id\":40,\"program\":\"Daily Part Time\",\"level\":\"HND 2\",\"session\":\"2017\\/2018\"},\"old\":{\"course_id\":4,\"user_id\":40,\"program\":\"Daily Part Time\",\"level\":\"HND 2\",\"session\":\"\"}}', '2019-08-24 09:11:20', '2019-08-24 09:11:20'),
(161, 'default', 'updated', 3, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":6,\"user_id\":40,\"program\":\"Full Time\",\"level\":\"HND 1\",\"session\":\"2018\\/2019\"},\"old\":{\"course_id\":6,\"user_id\":40,\"program\":\"Full Time\",\"level\":\"HND 1\",\"session\":\"\"}}', '2019-08-24 09:11:36', '2019-08-24 09:11:36'),
(162, 'default', 'updated', 2, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":2,\"user_id\":41,\"program\":\"Daily Part Time\",\"level\":\"OND 2\",\"session\":\"2019\\/2020\"},\"old\":{\"course_id\":2,\"user_id\":41,\"program\":\"Daily Part Time\",\"level\":\"OND 2\",\"session\":\"\"}}', '2019-08-24 09:11:51', '2019-08-24 09:11:51'),
(163, 'default', 'updated', 1, 'App\\CourseAllocations', 1, 'App\\User', '{\"attributes\":{\"course_id\":1,\"user_id\":41,\"program\":\"Full Time\",\"level\":\"OND 1\",\"session\":\"2020\\/2021\"},\"old\":{\"course_id\":1,\"user_id\":41,\"program\":\"Full Time\",\"level\":\"OND 1\",\"session\":\"\"}}', '2019-08-24 09:12:06', '2019-08-24 09:12:06'),
(164, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-24 09:17:04', '2019-08-24 09:17:04'),
(165, 'default', 'created', 42, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-24 09:17:05', '2019-08-24 09:17:05'),
(166, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-24 09:17:05', '2019-08-24 09:17:05'),
(167, 'default', 'created', 43, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-08-24 09:17:05', '2019-08-24 09:17:05'),
(168, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-24 09:17:06', '2019-08-24 09:17:06'),
(169, 'default', 'created', 44, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-08-24 09:17:06', '2019-08-24 09:17:06'),
(170, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-08-24 09:17:06', '2019-08-24 09:17:06'),
(171, 'default', 'created', 45, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-08-24 09:17:07', '2019-08-24 09:17:07'),
(172, 'default', 'created', 1, 'App\\Assignments', 40, 'App\\User', '{\"attributes\":{\"allocation_id\":4,\"question\":\"Read and summerize&nbsp; chapter one and two\",\"submission_date\":\"08\\/26\\/2019\",\"user_id\":40}}', '2019-08-24 09:20:25', '2019-08-24 09:20:25'),
(173, 'default', 'updated', 1, 'App\\Assignments', 40, 'App\\User', '{\"attributes\":{\"allocation_id\":4,\"question\":\"Read and summarize&nbsp; chapter one and two\",\"submission_date\":\"08\\/26\\/2019\",\"user_id\":40},\"old\":{\"allocation_id\":4,\"question\":\"Read and summerize&nbsp; chapter one and two\",\"submission_date\":\"08\\/26\\/2019\",\"user_id\":40}}', '2019-08-24 09:20:48', '2019-08-24 09:20:48'),
(174, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-24 09:24:57', '2019-08-24 09:24:57'),
(175, 'default', 'created', 46, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-24 09:24:57', '2019-08-24 09:24:57'),
(176, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-24 09:24:57', '2019-08-24 09:24:57'),
(177, 'default', 'created', 47, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-08-24 09:24:57', '2019-08-24 09:24:57'),
(178, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-24 09:24:58', '2019-08-24 09:24:58'),
(179, 'default', 'created', 48, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-08-24 09:24:58', '2019-08-24 09:24:58'),
(180, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-08-24 09:24:59', '2019-08-24 09:24:59'),
(181, 'default', 'created', 49, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-08-24 09:24:59', '2019-08-24 09:24:59'),
(182, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-24 09:29:16', '2019-08-24 09:29:16'),
(183, 'default', 'created', 50, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-24 09:29:16', '2019-08-24 09:29:16'),
(184, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-24 09:29:16', '2019-08-24 09:29:16'),
(185, 'default', 'created', 51, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-08-24 09:29:17', '2019-08-24 09:29:17'),
(186, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-24 09:29:17', '2019-08-24 09:29:17'),
(187, 'default', 'created', 52, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-08-24 09:29:17', '2019-08-24 09:29:17'),
(188, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-08-24 09:29:18', '2019-08-24 09:29:18'),
(189, 'default', 'created', 53, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-08-24 09:29:18', '2019-08-24 09:29:18'),
(190, 'default', 'created', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-24 09:37:15', '2019-08-24 09:37:15'),
(191, 'default', 'created', 54, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-24 09:37:15', '2019-08-24 09:37:15'),
(192, 'default', 'deleted', 1, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-24 09:38:14', '2019-08-24 09:38:14'),
(193, 'default', 'deleted', 54, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-24 09:38:15', '2019-08-24 09:38:15'),
(194, 'default', 'created', 2, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-24 09:38:51', '2019-08-24 09:38:51'),
(195, 'default', 'created', 55, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kolasope\",\"email\":\"kolasope@gmail.com\"}}', '2019-08-24 09:38:51', '2019-08-24 09:38:51'),
(196, 'default', 'created', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-24 09:38:52', '2019-08-24 09:38:52'),
(197, 'default', 'created', 56, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Deborah\",\"email\":\"kola@gmail.com\"}}', '2019-08-24 09:38:52', '2019-08-24 09:38:52'),
(198, 'default', 'created', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-24 09:38:53', '2019-08-24 09:38:53'),
(199, 'default', 'created', 57, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Kemi\",\"email\":\"kemi@gmail.com\"}}', '2019-08-24 09:38:53', '2019-08-24 09:38:53'),
(200, 'default', 'created', 5, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Opeyemi\",\"student_email\":\"opeyemi@gmail.com\",\"matric_number\":\"1236\"}}', '2019-08-24 09:38:54', '2019-08-24 09:38:54'),
(201, 'default', 'created', 58, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Opeyemi\",\"email\":\"opeyemi@gmail.com\"}}', '2019-08-24 09:38:54', '2019-08-24 09:38:54'),
(202, 'default', 'updated', 2, 'App\\Students', 55, 'App\\User', '{\"attributes\":{\"student_name\":\"Kolasope Hammed\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"},\"old\":{\"student_name\":\"Kolasope\",\"student_email\":\"kolasope@gmail.com\",\"matric_number\":\"1203\"}}', '2019-08-24 11:28:55', '2019-08-24 11:28:55'),
(203, 'default', 'updated', 3, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Deborah Solafola\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"},\"old\":{\"student_name\":\"Deborah\",\"student_email\":\"kola@gmail.com\",\"matric_number\":\"1294\"}}', '2019-08-24 11:32:19', '2019-08-24 11:32:19'),
(204, 'default', 'updated', 4, 'App\\Students', 1, 'App\\User', '{\"attributes\":{\"student_name\":\"Kemi Afolabi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"},\"old\":{\"student_name\":\"Kemi\",\"student_email\":\"kemi@gmail.com\",\"matric_number\":\"1225\"}}', '2019-08-24 11:32:40', '2019-08-24 11:32:40'),
(205, 'default', 'created', 2, 'App\\Assignments', 40, 'App\\User', '{\"attributes\":{\"allocation_id\":3,\"question\":\"Read and so the assigment\",\"submission_date\":\"02\\/02\\/2019\",\"user_id\":40}}', '2019-08-24 13:07:26', '2019-08-24 13:07:26'),
(206, 'default', 'created', 3, 'App\\Assignments', 41, 'App\\User', '{\"attributes\":{\"allocation_id\":5,\"question\":\"Read and explain chpater one of these material\",\"submission_date\":\"08\\/02\\/2019\",\"user_id\":41}}', '2019-08-24 13:09:19', '2019-08-24 13:09:19'),
(207, 'default', 'created', 4, 'App\\Assignments', 41, 'App\\User', '{\"attributes\":{\"allocation_id\":2,\"question\":\"Rad and summerize chapter one\",\"submission_date\":\"08\\/20\\/2019\",\"user_id\":41}}', '2019-08-24 13:10:39', '2019-08-24 13:10:39'),
(208, 'default', 'created', 1, 'App\\AssignmentSolutions', 55, 'App\\User', '{\"attributes\":{\"assignment_id\":2,\"student_id\":2,\"solution\":\"This is the assignment solution\"}}', '2019-08-24 16:19:06', '2019-08-24 16:19:06'),
(209, 'default', 'created', 2, 'App\\AssignmentSolutions', 55, 'App\\User', '{\"attributes\":{\"assignment_id\":2,\"student_id\":2,\"solution\":\"sfknliohau ochjcupk tmhu\"}}', '2019-08-24 16:27:05', '2019-08-24 16:27:05'),
(210, 'default', 'created', 3, 'App\\AssignmentSolutions', 55, 'App\\User', '{\"attributes\":{\"assignment_id\":2,\"student_id\":2,\"solution\":\"<p>I am submtting the assignment<\\/p><p><br><\\/p>\"}}', '2019-08-31 11:41:49', '2019-08-31 11:41:49'),
(211, 'default', 'created', 4, 'App\\AssignmentSolutions', 55, 'App\\User', '{\"attributes\":{\"assignment_id\":2,\"student_id\":2,\"solution\":\"<p>I am submtting the assignment<\\/p><p><br><\\/p>\"}}', '2019-08-31 11:42:07', '2019-08-31 11:42:07'),
(212, 'default', 'updated', 4, 'App\\Assignments', 41, 'App\\User', '{\"attributes\":{\"allocation_id\":2,\"question\":\"Read and summarize chapter one\",\"submission_date\":\"08\\/20\\/2019\",\"user_id\":41},\"old\":{\"allocation_id\":2,\"question\":\"Rad and summerize chapter one\",\"submission_date\":\"08\\/20\\/2019\",\"user_id\":41}}', '2019-09-13 11:09:45', '2019-09-13 11:09:45'),
(213, 'default', 'created', 1, 'App\\AssignmentResults', 41, 'App\\User', '[]', '2019-09-13 13:13:54', '2019-09-13 13:13:54'),
(214, 'default', 'created', 2, 'App\\AssignmentResults', 41, 'App\\User', '[]', '2019-09-13 13:13:54', '2019-09-13 13:13:54'),
(215, 'default', 'created', 3, 'App\\AssignmentResults', 41, 'App\\User', '[]', '2019-09-13 13:19:00', '2019-09-13 13:19:00'),
(216, 'default', 'created', 4, 'App\\AssignmentResults', 41, 'App\\User', '[]', '2019-09-13 13:19:00', '2019-09-13 13:19:00'),
(217, 'default', 'created', 5, 'App\\AssignmentResults', 41, 'App\\User', '[]', '2019-09-13 13:44:31', '2019-09-13 13:44:31'),
(218, 'default', 'created', 6, 'App\\AssignmentResults', 41, 'App\\User', '[]', '2019-09-13 13:44:31', '2019-09-13 13:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_results`
--

CREATE TABLE `assignment_results` (
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `solution_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment_results`
--

INSERT INTO `assignment_results` (`result_id`, `user_id`, `score`, `assignment_id`, `solution_id`, `student_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(5, 41, 8, 2, 2, 3, '2019-09-13 13:44:31', '2019-09-13 13:44:31', NULL),
(6, 41, 7, 2, 1, 2, '2019-09-13 13:44:31', '2019-09-13 13:44:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_solutions`
--

CREATE TABLE `assignment_solutions` (
  `solution_id` bigint(20) UNSIGNED NOT NULL,
  `solution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment_solutions`
--

INSERT INTO `assignment_solutions` (`solution_id`, `solution`, `assignment_id`, `student_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'This is the assignment solution', 2, 2, '2019-08-24 16:19:06', '2019-08-24 16:19:06', NULL),
(2, 'sfknliohau ochjcupk tmhu', 2, 3, '2019-08-24 16:27:05', '2019-08-24 16:27:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_code`, `course_unit`, `course_file`, `course_status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Introduction To Computers', 'CSC101', '6', 'How_to_Create_a_Client1564491228.pptx', 'Elective', '2019-08-11 18:41:47', '2019-07-30 11:18:41', NULL),
(2, 'Introduction To Programming', 'CSC211', '4', 'Adding_a_Charge_to_a_Loan_Account1564489475.pptx', 'Required', '2019-07-30 11:46:34', '2019-07-30 11:24:35', NULL),
(3, 'Structured Programming', 'CSC212', '4', 'docs_UserManual_190719_14221564489521.pdf', 'Compulsory', '2019-08-01 10:10:54', '2019-07-30 11:25:21', NULL),
(4, 'Mifox Training', 'MFX220', '5', 'Adding_a_Charge_to_a_Loan_Account1564649784.pptx', 'Compulsory', '2019-08-01 07:56:24', '2019-08-01 07:56:24', NULL),
(5, 'Programming In HLL', 'CSC210', '4', 'How_to_Add_Collateral_to_a_Loan1564657795.pptx', 'Compulsory', '2019-08-11 18:42:42', '2019-08-01 10:09:55', NULL),
(6, 'Mifox Java Learning', 'CSC109', '5', 'Know_Your_Customer1565552486.pptx', 'Elective', '2019-08-11 18:41:26', '2019-08-11 18:41:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_allocations`
--

CREATE TABLE `course_allocations` (
  `allocation_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_allocations`
--

INSERT INTO `course_allocations` (`allocation_id`, `course_id`, `user_id`, `program`, `level`, `session`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 1, 41, 'Full Time', 'OND 1', '2020/2021', '2019-08-24 09:12:06', '2019-08-24 08:57:53', NULL),
(2, 2, 41, 'Part Time', 'OND 2', '2019/2020', '2019-08-24 09:11:51', '2019-08-24 08:58:11', NULL),
(3, 6, 40, 'Full Time', 'OND 1', '2018/2019', '2019-08-24 09:11:36', '2019-08-24 08:58:25', NULL),
(4, 4, 40, 'Part Time', 'HND 1', '2017/2018', '2019-08-24 09:11:20', '2019-08-24 08:58:42', NULL),
(5, 5, 41, 'Full Time', 'OND 1', '2017/2018', '2019-08-24 09:07:26', '2019-08-24 09:07:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_assignments`
--

CREATE TABLE `course_assignments` (
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `allocation_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(2) NOT NULL,
  `submission_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_assignments`
--

INSERT INTO `course_assignments` (`assignment_id`, `allocation_id`, `question`, `marks`, `submission_date`, `user_id`, `level`, `program`, `course_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 4, 'Read and summarize&nbsp; chapter one and two', 15, '08/26/2019', 40, 'HND 2', 'Daily Part Time', 4, '2019-08-24 09:20:48', '2019-08-24 09:20:25', NULL),
(2, 3, 'Read Chapter One and Two and submit before the stipulated date', 10, '02/02/2019', 40, 'OND 1', 'Full Time', 6, '2019-08-24 13:07:25', '2019-08-24 13:07:25', NULL),
(3, 5, 'Read and explain chpater one of these material', 20, '08/02/2019', 41, 'OND 1', 'Full Time', 5, '2019-08-24 13:09:19', '2019-08-24 13:09:19', NULL),
(4, 2, 'Read and summarize chapter one', 10, '08/20/2019', 41, 'OND 2', 'Part Time', 2, '2019-09-13 11:09:45', '2019-08-24 13:10:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_23_103402_create_permission_tables', 1),
(4, '2019_07_24_095830_add_deleted_at_to_users', 1),
(5, '2019_07_30_101812_create_courses_table', 1),
(6, '2019_07_30_102039_create_staffs_table', 1),
(7, '2019_07_30_102131_create_students_table', 1),
(8, '2019_07_30_102949_create_course_allocations_table', 1),
(9, '2019_07_30_113750_add_to_course_status_to_courses', 2),
(10, '2019_08_01_112152_create_assignments_table', 3),
(11, '2019_08_01_113048_create_course_assignments_table', 4),
(12, '2019_08_01_123050_add_user_id_to_course_assignments', 5),
(13, '2019_08_01_151021_add_courseid_to_course_assignments', 6),
(14, '2019_08_24_142140_create_assignment_solutions_table', 7),
(15, '2019_08_24_143846_create_assignment_results_table', 7),
(16, '2019_09_13_123818_add_submission_id_to_assignment_results', 8),
(17, '2019_09_13_143931_add_staff_id_to_assignment_results', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 40),
(1, 'App\\User', 41),
(2, 'App\\User', 40),
(2, 'App\\User', 41),
(3, 'App\\User', 40),
(3, 'App\\User', 41),
(12, 'App\\User', 40),
(12, 'App\\User', 41),
(13, 'App\\User', 40),
(13, 'App\\User', 41),
(14, 'App\\User', 40),
(14, 'App\\User', 41),
(14, 'App\\User', 55),
(14, 'App\\User', 56),
(14, 'App\\User', 57),
(14, 'App\\User', 58),
(24, 'App\\User', 55),
(24, 'App\\User', 56),
(24, 'App\\User', 57),
(24, 'App\\User', 58),
(25, 'App\\User', 55),
(25, 'App\\User', 56),
(25, 'App\\User', 57),
(25, 'App\\User', 58),
(28, 'App\\User', 40),
(28, 'App\\User', 41),
(28, 'App\\User', 55),
(28, 'App\\User', 56),
(28, 'App\\User', 57),
(28, 'App\\User', 58),
(31, 'App\\User', 40),
(31, 'App\\User', 41),
(31, 'App\\User', 55),
(31, 'App\\User', 56),
(31, 'App\\User', 57),
(31, 'App\\User', 58),
(32, 'App\\User', 40),
(32, 'App\\User', 41),
(33, 'App\\User', 40),
(33, 'App\\User', 41),
(34, 'App\\User', 40),
(34, 'App\\User', 41),
(35, 'App\\User', 40),
(35, 'App\\User', 41),
(38, 'App\\User', 40),
(38, 'App\\User', 41),
(41, 'App\\User', 55),
(41, 'App\\User', 56),
(41, 'App\\User', 57),
(41, 'App\\User', 58);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(2, 'App\\User', 50),
(2, 'App\\User', 51),
(2, 'App\\User', 52),
(2, 'App\\User', 53),
(2, 'App\\User', 54),
(2, 'App\\User', 55),
(2, 'App\\User', 56),
(2, 'App\\User', 57),
(2, 'App\\User', 58),
(3, 'App\\User', 40),
(3, 'App\\User', 41);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add Course', 'web', '2019-07-30 10:29:28', '2019-07-30 10:29:28'),
(2, 'Edit Course', 'web', '2019-07-30 10:29:42', '2019-07-30 10:29:42'),
(3, 'Update Course', 'web', '2019-07-30 10:29:49', '2019-07-30 10:29:49'),
(4, 'Delete Course', 'web', '2019-07-30 10:29:57', '2019-07-30 10:29:57'),
(5, 'Restore Course', 'web', '2019-07-30 10:30:04', '2019-07-30 10:30:04'),
(6, 'View User', 'web', '2019-07-30 12:37:44', '2019-07-30 12:37:44'),
(7, 'Delete User', 'web', '2019-07-30 12:38:13', '2019-07-30 12:38:13'),
(8, 'Restore User', 'web', '2019-07-30 12:38:25', '2019-07-30 12:38:25'),
(9, 'Suspend User', 'web', '2019-07-30 12:38:33', '2019-07-30 12:38:33'),
(10, 'UnSuspend User', 'web', '2019-07-30 12:38:40', '2019-07-30 12:38:40'),
(11, 'Add Staff', 'web', '2019-07-30 12:56:40', '2019-07-30 12:56:40'),
(12, 'Edit Staff', 'web', '2019-07-30 12:56:53', '2019-07-30 12:56:53'),
(13, 'Update Staff', 'web', '2019-07-30 12:57:00', '2019-07-30 12:57:00'),
(14, 'View Staff', 'web', '2019-07-30 12:57:06', '2019-07-30 12:57:06'),
(15, 'Delete Staff', 'web', '2019-07-30 12:57:12', '2019-07-30 12:57:12'),
(16, 'Restore Staff', 'web', '2019-07-30 12:57:19', '2019-07-30 12:57:19'),
(17, 'Allocate Course', 'web', '2019-07-30 21:06:30', '2019-07-30 21:06:30'),
(18, 'Edit Allocate Course', 'web', '2019-07-30 21:06:40', '2019-07-30 21:06:40'),
(19, 'Delete Allocate Course', 'web', '2019-07-30 21:06:52', '2019-07-30 21:06:52'),
(20, 'Restore Allocate Course', 'web', '2019-07-30 21:07:00', '2019-07-30 21:07:00'),
(21, 'Update Allocate Course', 'web', '2019-07-30 21:07:13', '2019-07-30 21:07:13'),
(22, 'Edit User', 'web', '2019-07-31 07:31:22', '2019-07-31 07:31:22'),
(23, 'Update User', 'web', '2019-07-31 07:31:57', '2019-07-31 07:31:57'),
(24, 'Update Student', 'web', '2019-07-31 09:27:30', '2019-07-31 09:27:30'),
(25, 'Edit Student', 'web', '2019-07-31 09:27:37', '2019-07-31 09:27:37'),
(26, 'Restore Student', 'web', '2019-07-31 09:27:50', '2019-07-31 09:27:50'),
(27, 'Add Student', 'web', '2019-07-31 09:27:56', '2019-07-31 09:27:56'),
(28, 'View Student', 'web', '2019-07-31 09:39:14', '2019-07-31 09:39:14'),
(29, 'Delete Student', 'web', '2019-07-31 10:46:13', '2019-07-31 10:46:13'),
(30, 'Add User', 'web', '2019-07-31 16:20:44', '2019-07-31 16:20:44'),
(31, 'View Allocate Course', 'web', '2019-08-01 07:52:51', '2019-08-01 07:52:51'),
(32, 'Add Assignment', 'web', '2019-08-01 10:50:39', '2019-08-01 10:50:39'),
(33, 'Edit Assignment', 'web', '2019-08-01 10:50:46', '2019-08-01 10:50:46'),
(34, 'Update Assignment', 'web', '2019-08-01 10:50:56', '2019-08-01 10:50:56'),
(35, 'Restore Assignment', 'web', '2019-08-01 10:51:06', '2019-08-01 10:51:06'),
(36, 'Submit Assignment', 'web', '2019-08-01 10:51:16', '2019-08-01 10:51:16'),
(37, 'View Assignment', 'web', '2019-08-01 10:51:32', '2019-08-01 10:51:32'),
(38, 'Delete Assignment', 'web', '2019-08-01 11:08:41', '2019-08-01 11:08:41'),
(41, 'View Course', 'web', '2019-08-24 09:37:47', '2019-08-24 09:37:47'),
(42, 'Restore Solution', 'web', '2019-08-24 15:55:08', '2019-08-24 15:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2019-07-30 09:54:46', '2019-07-30 09:54:46'),
(2, 'Student', 'web', '2019-07-30 10:02:49', '2019-07-30 10:02:49'),
(3, 'Staff', 'web', '2019-07-30 10:02:54', '2019-07-30 10:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `staff_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `staff_name`, `staff_email`, `initial`, `phone_number`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Ajibade Samson', 'samson@gmail.com', 'Dr.', '08137444243', '2019-08-24 08:33:25', '2019-08-24 08:33:25', NULL),
(2, 'Adesina Taiwo O', 'taiwo@gmail.com', 'Prof.', '081374442489', '2019-08-24 08:48:44', '2019-08-24 08:48:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_email`, `matric_number`, `phone_number`, `level`, `program`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Kolasope', 'kolasopde@gmail.com', '1203', '903833113', 'OND 1', 'Full Time', '2019-08-24 09:38:14', '2019-08-24 09:37:14', '2019-08-24 09:38:14'),
(2, 'Kolasope Hammed', 'kolasope@gmail.com', '1208', '903833113', 'OND 1', 'Full Time', '2019-08-24 11:28:55', '2019-08-24 09:38:51', NULL),
(3, 'Deborah Solafola', 'kola@gmail.com', '1294', '903833331', 'OND 1', 'Full Time', '2019-08-24 11:32:19', '2019-08-24 09:38:52', NULL),
(4, 'Kemi Afolabi', 'kemi@gmail.com', '1225', '9038338103', 'HND 1', 'Part Time', '2019-08-24 11:32:40', '2019-08-24 09:38:53', NULL),
(5, 'Opeyemi', 'opeyemi@gmail.com', '1236', '90383382243', 'HND2', 'Part Time', '2019-08-24 09:38:54', '2019-08-24 09:38:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Adesina Taiwo Olajide', 'administrator@gmail.com', '2019-07-24 13:26:22', '$2y$10$VEWAsXEQh14SikhK54AnhOq1VZPaeNXix.ubtNDE.MRmvBHiWhMii', 'Administrator', 1, NULL, '2019-07-30 12:42:25', '2019-07-24 10:33:08', NULL),
(2, 'Adesina Taiwo Olajide', 'tolajide74@gmail.com', '2019-07-24 11:44:07', '$2y$10$LKttpCXdk/8SORS84PDOXO1GuRkBE4mBwkR3flK4e0/yzlsKdtIwy', 'Administrator', 1, NULL, '2019-07-25 15:03:29', '2019-07-24 11:12:55', NULL),
(41, 'Adesina Taiwo O', 'taiwo@gmail.com', '2019-08-24 09:48:44', '$2y$10$3cwbfmSJux4OL6N/Ub2bbub7tpxb1bo0Co0yLuoD3F5skqO8LZCmy', 'Staff', 1, NULL, '2019-08-24 08:48:44', '2019-08-24 08:48:44', NULL),
(44, 'Ajibade Samson', 'samson@gmail.com', '2019-09-13 14:54:05', '$2y$10$RakXhy.iD6as/3n/sfMtw.TSPxSV/UJINig.DmZf1naHYELlBHrU6', 'Staff', 1, NULL, '2019-08-24 08:33:25', '2019-08-24 08:33:25', NULL),
(55, 'Kolasope Hammed', 'kolasope@gmail.com', '2019-08-24 12:28:55', '$2y$10$Cx2I44XSkf0yv9vLdRSF2OI0dJEWbl7Qb9mLmcKMjD7sweAlZw1Um', 'Student', 1, NULL, '2019-08-24 09:38:51', '2019-08-24 09:38:51', NULL),
(56, 'Deborah Solafola', 'kola@gmail.com', '2019-08-24 12:32:20', '$2y$10$FqtjK0oa4lyLcq4O1Qr3A.qjoK7tzK6iIEj0f1MTrjFlrGNtPmxGK', 'Student', 1, NULL, '2019-08-24 09:38:52', '2019-08-24 09:38:52', NULL),
(57, 'Kemi Afolabi', 'kemi@gmail.com', '2019-08-24 12:32:40', '$2y$10$04YX0qaAYzhyNnAx4XchKed7dDDzWX/5CUxOF2OzoBpJRLRqwipmG', 'Student', 1, NULL, '2019-08-24 09:38:53', '2019-08-24 09:38:53', NULL),
(58, 'Opeyemi', 'opeyemi@gmail.com', '2019-08-24 10:38:54', '$2y$10$t5Qv12jCVl56c9y5ZbFso.fftcNoXRfyh0RUm/IL88FSdW64ROG3a', 'Student', 1, NULL, '2019-08-24 09:38:54', '2019-08-24 09:38:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `assignment_results`
--
ALTER TABLE `assignment_results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `assignment_solutions`
--
ALTER TABLE `assignment_solutions`
  ADD PRIMARY KEY (`solution_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_allocations`
--
ALTER TABLE `course_allocations`
  ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `course_assignments`
--
ALTER TABLE `course_assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `assignment_results`
--
ALTER TABLE `assignment_results`
  MODIFY `result_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assignment_solutions`
--
ALTER TABLE `assignment_solutions`
  MODIFY `solution_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_allocations`
--
ALTER TABLE `course_allocations`
  MODIFY `allocation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_assignments`
--
ALTER TABLE `course_assignments`
  MODIFY `assignment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
