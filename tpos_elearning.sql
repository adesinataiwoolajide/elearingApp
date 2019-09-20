-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 04:23 PM
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
(11, 41, 8, 1, 6, 2, '2019-09-20 13:16:22', '2019-09-20 13:16:22', NULL),
(12, 41, 5, 2, 5, 2, '2019-09-20 13:16:22', '2019-09-20 13:16:22', NULL),
(13, 41, 5, 1, 7, 3, '2019-09-20 13:19:00', '2019-09-20 13:19:00', NULL),
(14, 41, 5, 2, 8, 3, '2019-09-20 13:21:18', '2019-09-20 13:21:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_solutions`
--

CREATE TABLE `assignment_solutions` (
  `solution_id` bigint(20) UNSIGNED NOT NULL,
  `solution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment_solutions`
--

INSERT INTO `assignment_solutions` (`solution_id`, `solution`, `assignment_id`, `student_id`, `status`, `updated_at`, `created_at`, `deleted_at`, `user_id`) VALUES
(5, 'I ve submitted my hard copy', 2, 2, 1, '2019-09-20 13:11:00', '2019-09-20 13:11:00', NULL, 41),
(6, 'Computer is widely used', 1, 2, 1, '2019-09-20 13:15:11', '2019-09-20 13:15:11', NULL, 41),
(7, 'New Assignment', 1, 3, 1, '2019-09-20 13:17:55', '2019-09-20 13:17:55', NULL, 41),
(8, 'Submitted&nbsp;', 2, 3, 1, '2019-09-20 13:20:22', '2019-09-20 13:20:22', NULL, 41);

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
(1, 1, 'Read and submit', 15, '09/20/2019', 41, 'OND 1', 'Full Time', 1, '2019-09-20 13:00:53', '2019-09-20 13:00:53', NULL),
(2, 5, 'Submit the hard copy', 10, '09/23/2019', 41, 'OND 1', 'Full Time', 5, '2019-09-20 13:01:40', '2019-09-20 13:01:40', NULL),
(3, 2, 'Please read and submit assignment', 15, '09/24/2019', 41, 'OND 2', 'Part Time', 2, '2019-09-20 13:02:21', '2019-09-20 13:02:21', NULL);

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
(17, '2019_09_13_143931_add_staff_id_to_assignment_results', 9),
(18, '2019_09_18_163602_add_user_id_to_assignment_solutions', 10);

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
(40, 'Ajibade Samson', 'samson@gmail.com', '2019-09-17 12:52:04', '$2y$10$RakXhy.iD6as/3n/sfMtw.TSPxSV/UJINig.DmZf1naHYELlBHrU6', 'Staff', 1, NULL, '2019-08-24 08:33:25', '2019-08-24 08:33:25', NULL),
(41, 'Adesina Taiwo O', 'taiwo@gmail.com', '2019-08-24 09:48:44', '$2y$10$3cwbfmSJux4OL6N/Ub2bbub7tpxb1bo0Co0yLuoD3F5skqO8LZCmy', 'Staff', 1, NULL, '2019-08-24 08:48:44', '2019-08-24 08:48:44', NULL),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `assignment_results`
--
ALTER TABLE `assignment_results`
  MODIFY `result_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assignment_solutions`
--
ALTER TABLE `assignment_solutions`
  MODIFY `solution_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `assignment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
