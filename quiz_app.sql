-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 08:52 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_infos`
--

CREATE TABLE `basic_infos` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(255) DEFAULT NULL,
  `quiz_thankyou` varchar(255) DEFAULT NULL,
  `bgcolor` varchar(255) DEFAULT NULL,
  `btn_bgcolor` varchar(255) DEFAULT NULL,
  `btn_txtcolor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link_popup_width` varchar(255) DEFAULT NULL,
  `link_popup_height` varchar(255) DEFAULT NULL,
  `btn_popup_width` varchar(255) DEFAULT NULL,
  `btn_popup_height` varchar(255) DEFAULT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `btn_font_size` varchar(255) DEFAULT NULL,
  `btn_border_radius` varchar(255) DEFAULT NULL,
  `continue_btntext` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic_infos`
--

INSERT INTO `basic_infos` (`id`, `quiz_id`, `quiz_title`, `quiz_thankyou`, `bgcolor`, `btn_bgcolor`, `btn_txtcolor`, `created_at`, `updated_at`, `link_popup_width`, `link_popup_height`, `btn_popup_width`, `btn_popup_height`, `btn_text`, `btn_font_size`, `btn_border_radius`, `continue_btntext`) VALUES
(4, 1, 'Start Question', 'Thank You..', '#aaffff', '#254949', '#ffffff', '2021-02-25 10:08:18', '2021-04-03 07:34:15', NULL, NULL, NULL, NULL, 'TAKE QUIZ', '24', '15', 'Continue'),
(5, 2, 'Start Question??', 'Thank You....', '#aaffff', '#366d6d', '#ffffff', '2021-03-08 09:59:27', '2021-04-03 07:44:29', NULL, NULL, NULL, NULL, 'TAKE OUR QUIZ', '19', '15', 'Continue');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `select_frame_id` int(11) NOT NULL,
  `frame_id` bigint(20) NOT NULL,
  `frame` varchar(255) NOT NULL,
  `handle` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `choose` varchar(255) DEFAULT NULL,
  `choose_desc` varchar(255) DEFAULT NULL,
  `frame_img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `select_frame_id`, `frame_id`, `frame`, `handle`, `sort`, `choose`, `choose_desc`, `frame_img`, `created_at`, `updated_at`) VALUES
(29, 39, 71546077250, 'Broadway Slim', 'broadway-slim', 1, 'You Choose 3\" Of Broadway Slim', 'Now, what color frame would you choose for a picture hung in the bath? (Select one)', 'https://cdn.shopify.com/s/files/1/0090/5183/2386/collections/Broadway_Slim_Group-min-min.jpg?v=1604342380', '2021-01-21 01:57:14', '2021-01-21 01:57:32'),
(30, 39, 157530652810, 'Blue', 'blue', 2, 'You Choose 3\" Of Blue', 'Now, what color frame would you choose for a picture hung in the bath? (Select one)', 'https://cdn.shopify.com/s/files/1/0090/5183/2386/collections/blue-color500-min.jpg?v=1581190145', '2021-01-21 01:57:19', '2021-01-21 01:57:19'),
(31, 45, 71190741058, 'Black', 'black', 1, 'You Choose Modern & Contemporary Of Black', 'Now, what color frame would you choose for a picture hung in the bath? (Select one)', 'https://cdn.shopify.com/s/files/1/0090/5183/2386/collections/corner-0056.jpg?v=1581190136', '2021-01-27 04:39:03', '2021-01-27 04:39:03'),
(32, 45, 71266336834, 'Bronze', 'bronze', 2, 'You Choose Modern & Contemporary Of Bronze', 'Now, what color frame would you choose for a picture hung in the bath? (Select one)', 'https://cdn.shopify.com/s/files/1/0090/5183/2386/collections/corner-0001.jpg?v=1563284433', '2021-01-27 04:39:10', '2021-01-27 04:39:10'),
(33, 45, 71547060290, 'Paintable', 'paintable', 3, 'You Choose Modern & Contemporary Of Paintable', 'Now, what color frame would you choose for a picture hung in the bath? (Select one)', 'https://cdn.shopify.com/s/files/1/0090/5183/2386/collections/04A612-Paintable-Group.jpg?v=1581189884', '2021-01-27 04:39:25', '2021-01-27 04:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frame_cols`
--

CREATE TABLE `frame_cols` (
  `id` int(11) NOT NULL,
  `sel_frame_id` int(11) NOT NULL,
  `sel_color_id` int(11) NOT NULL,
  `frame_id` bigint(20) DEFAULT NULL,
  `frame` varchar(255) DEFAULT NULL,
  `handle` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `frame_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `quiz_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quiz_name`, `created_at`, `updated_at`) VALUES
(1, 'Test', '2021-02-25 10:23:05', '2021-02-25 10:23:05'),
(2, 'Quiz--test', '2021-03-08 09:59:26', '2021-03-08 09:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `selectedchoices`
--

CREATE TABLE `selectedchoices` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  `question_value` text,
  `question_value_1` text,
  `question` text,
  `question_answer` text,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selectedchoices`
--

INSERT INTO `selectedchoices` (`id`, `quiz_id`, `choice_id`, `question_value`, `question_value_1`, `question`, `question_answer`, `sort`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '[object jt]4', NULL, NULL, '[object jt]4', 2, '2021-02-19 03:33:01', '2021-04-02 23:45:57'),
(4, 1, 4, 'Yess,No', NULL, NULL, 'Yess', 4, '2021-02-19 04:07:36', '2021-04-03 05:12:31'),
(6, 1, 6, 'test--', NULL, NULL, 'Statement--test', 6, '2021-02-19 04:34:48', '2021-04-03 05:12:38'),
(12, 1, 7, 'testting,[object,[object Object,[obj', NULL, 't', 'test', 8, '2021-02-19 06:58:22', '2021-04-03 05:12:47'),
(14, 1, 11, NULL, NULL, NULL, 'v@gmail.com', 12, '2021-02-19 07:15:39', '2021-04-03 05:12:59'),
(15, 1, 12, NULL, NULL, 'Phone?', '9574139628', 14, '2021-02-19 07:15:47', '2021-04-02 23:50:12'),
(16, 1, 9, NULL, NULL, 'Date?', '29/02/1111', 16, '2021-02-19 07:15:51', '2021-04-03 05:13:15'),
(18, 1, 14, NULL, NULL, 'Collection test?', '3\"', 18, '2021-03-03 01:27:20', '2021-04-03 05:13:19'),
(20, 2, 2, 'optio1,optio2', NULL, 'Question1', 'optio1', 1, '2021-03-08 04:49:29', '2021-04-03 07:27:17'),
(21, 2, 7, NULL, NULL, 'Question2', 'test', 2, '2021-03-08 04:56:09', '2021-04-03 07:21:03'),
(22, 1, 13, 'I accept,I don\'t accept', NULL, NULL, 'I don\'t accept', 6, '2021-03-09 00:18:38', '2021-04-03 01:30:26'),
(24, 1, 14, NULL, NULL, 'test', '3\"', 10, '2021-03-09 00:21:19', '2021-04-03 05:12:51'),
(25, 1, 5, 'timthumb44.jpg,inhale-exhale-pencil-1024x682.jpg,woman-raising-her-arms-up-against-city-against-blue-sky.jpg,dummy.jpg', 'select123,tws,t,v', NULL, '0,1', 2, '2021-03-19 03:59:46', '2021-04-03 01:29:24'),
(26, 1, 14, NULL, NULL, NULL, 'Select', 1, '2021-04-03 03:54:03', '2021-04-03 07:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_choice`
--

CREATE TABLE `tbl_choice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `htmlcode` text,
  `options` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_choice`
--

INSERT INTO `tbl_choice` (`id`, `title`, `htmlcode`, `options`, `created_at`, `updated_at`) VALUES
(1, 'Thank You Message', NULL, '', '2021-02-08 10:49:36', '2021-02-08 10:49:36'),
(2, 'Dropdown', '<select><option>select</option></select>', '', '2021-02-08 10:49:36', '2021-02-08 10:49:36'),
(3, 'Multiple Choice', '<input type=\"radio\" name=\"choice\">', '', '2021-02-08 10:50:20', '2021-02-08 10:50:20'),
(4, 'Yes/No', '<input type=\"radio\" name=\"radiotype\">', 'Yes,No', '2021-02-08 10:50:20', '2021-02-08 10:50:20'),
(5, 'Pictures Choice', '<ul style=\"list-style:none;\"><li><div class=\"quizcolor-box\" ><div class=\"quizcolor-thumb\" :style=\"\'background-image: url(\'stepimg.jpg\')\'\"></div><div class=\"quizcolor-inner\"><div class=\"custom-control custom-checkbox mr-sm-2\">\r\n<input class=\"custom-control-input\" type=\"radio\" name=\"rdio\" ><label class=\"custom-control-label\">select</label></div></div></div></li></ul>', '', '2021-02-08 10:51:01', '2021-02-08 10:51:01'),
(6, 'Statement', NULL, '', '2021-02-08 10:51:01', '2021-02-08 10:51:01'),
(7, 'Short Text', ' <input type=\"text\" placeholder=\"Type your answer here\" class=\"lq-input\">', '', '2021-02-08 10:51:47', '2021-02-08 10:51:47'),
(8, 'Multi-line Text', '<textarea id=\"focus\" placeholder=\"Type your answer here\" name=\"longtext\" rows=\"4\" cols=\"25\"></textarea>', '', '2021-02-08 10:51:47', '2021-02-08 10:51:47'),
(9, 'Date', '<input placeholder=\"MM\" name=\"MM\" type=\"text\" maxlength=\"2\" style=\"max-width: 45px;\"> / \r\n<input placeholder=\"DD\" name=\"DD\" type=\"text\" maxlength=\"2\" style=\"max-width: 45px;\"> / \r\n<input placeholder=\"YYYY\" name=\"YYYY\" type=\"text\" maxlength=\"4\" style=\"max-width: 60px;\"> ', '', '2021-02-08 10:52:16', '2021-02-08 10:52:16'),
(10, 'Name', ' <input type=\"text\" placeholder=\"Type your name here\" class=\"lq-input\">', '', '2021-02-08 10:52:16', '2021-02-08 10:52:16'),
(11, 'Email Address', ' <input type=\"email\" placeholder=\"Your Email\" class=\"lq-input\">', '', '2021-02-08 10:53:03', '2021-02-08 10:53:03'),
(12, 'Phone Number', ' <input type=\"tel\" placeholder=\"Your Phone\" class=\"lq-input\">', '', '2021-02-08 10:53:03', '2021-02-08 10:53:03'),
(13, 'Legal Terms / GDPR', '<input type=\"radio\" name=\"radiotype\"> I accept<br/>\r\n<input type=\"radio\" name=\"radiotype\"> I don\'t accept', 'I accept,I don\'t accept', '2021-02-08 10:53:32', '2021-02-08 10:53:32'),
(14, 'collection Dropdown', '<select><option>select</option></select>', '', '2021-03-03 05:57:38', '2021-03-03 05:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matrix`
--

CREATE TABLE `tbl_matrix` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-start,2-finish ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matrix`
--

INSERT INTO `tbl_matrix` (`id`, `quiz_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-03-03 12:19:09', '2021-04-03 12:19:09'),
(2, 2, 1, '2021-04-03 12:23:05', '2021-04-03 12:23:05'),
(3, 2, 1, '2021-04-03 12:29:21', '2021-04-03 12:29:21'),
(4, 2, 1, '2021-04-03 12:44:03', '2021-04-03 12:44:03'),
(5, 2, 1, '2021-04-03 12:46:27', '2021-04-03 12:46:27'),
(6, 2, 1, '2021-04-03 12:50:56', '2021-04-03 12:50:56'),
(7, 2, 2, '2021-04-03 12:51:05', '2021-04-03 12:51:05'),
(8, 2, 1, '2021-04-03 12:57:14', '2021-04-03 12:57:14'),
(9, 2, 2, '2021-04-03 12:57:22', '2021-04-03 12:57:22'),
(10, 1, 1, '2021-04-03 13:04:33', '2021-04-03 13:04:33'),
(11, 2, 1, '2021-04-05 05:06:21', '2021-04-05 05:06:21'),
(12, 2, 2, '2021-04-05 05:08:17', '2021-04-05 05:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_infos`
--
ALTER TABLE `basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selectedchoices`
--
ALTER TABLE `selectedchoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_choice`
--
ALTER TABLE `tbl_choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_matrix`
--
ALTER TABLE `tbl_matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_infos`
--
ALTER TABLE `basic_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `selectedchoices`
--
ALTER TABLE `selectedchoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_choice`
--
ALTER TABLE `tbl_choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_matrix`
--
ALTER TABLE `tbl_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
