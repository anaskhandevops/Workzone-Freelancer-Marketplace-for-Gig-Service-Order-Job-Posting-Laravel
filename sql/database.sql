-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 08:17 AM
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
-- Database: `workzone_cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `seo_image` varchar(255) NOT NULL,
  `seo_signature` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_image`, `seo_image`, `seo_signature`, `created_at`, `updated_at`) VALUES
(1, 'uploads/custom-images/about_image--2024-07-10-02-06-21-1129.webp', 'uploads/custom-images/seo_image--2024-07-10-01-33-31-3266.webp', 'uploads/custom-images/seo_signature--2024-07-10-01-32-53-1689.webp', NULL, '2024-07-10 08:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_translations`
--

CREATE TABLE `about_us_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_us_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `item1` text NOT NULL,
  `item2` text NOT NULL,
  `item3` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_translations`
--

INSERT INTO `about_us_translations` (`id`, `about_us_id`, `lang_code`, `short_title`, `title`, `description`, `item1`, `item2`, `item3`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'About Company', 'Join World\'s Best Marketplace for Workers', '<p class=\"about-desc\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie mi ut arcu conde consequat erat iaculis. Duis quam lorem, bibendum at bibendum ut, auctor a ligula. Alv dolor urna. Proin rutrum lobortis vulputate. Suspendisse tincidunt urna et odio egestas tum. Class aptent taciti sociosqu ad litora torquen. Interdum et malesuada fames ac eu consequat. Nunc facilisis porttitor odio eu finibus.</p>', 'Modern Technology', 'Insured and Bonded', 'One-off, weekly or fortnightly visits', NULL, '2024-05-15 10:53:50'),
(10, 1, 'hd', 'About Company', 'Join World\'s Best Marketplace for Workers', '<p class=\"about-desc\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie mi ut arcu conde consequat erat iaculis. Duis quam lorem, bibendum at bibendum ut, auctor a ligula. Alv dolor urna. Proin rutrum lobortis vulputate. Suspendisse tincidunt urna et odio egestas tum. Class aptent taciti sociosqu ad litora torquen. Interdum et malesuada fames ac eu consequat. Nunc facilisis porttitor odio eu finibus.</p>', 'Modern Technology', 'Insured and Bonded', 'One-off, weekly or fortnightly visits', '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'enable',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `designation`, `facebook`, `linkedin`, `twitter`, `instagram`, `about_me`, `image`) VALUES
(1, 'Ibrahim Khalil', 'admin@gmail.com', NULL, '$2y$10$KtfJNrKyaQblEXhZ/4rR1OhtsCQnbFqRiDbNg1IlDSm/DXky7Dlee', 'enable', NULL, NULL, '2024-05-09 03:37:54', 'Web Developer', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://www.twitter.com', 'https://www.instagram.com', 'About Me', 'uploads/website-images/ibrahim-khalil-2024-05-09-09-19-12-8740.png');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `blog_category_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `show_homepage` varchar(255) NOT NULL DEFAULT 'no',
  `is_popular` varchar(255) NOT NULL DEFAULT 'no',
  `tags` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `image`, `admin_id`, `blog_category_id`, `views`, `status`, `show_homepage`, `is_popular`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'emerging-trends-tech-innovations-to-watch', 'uploads/custom-images/blog--2024-07-15-03-58-18-3203.webp', 1, 1, 0, 1, 'no', '0', '[{\"value\":\"web\"},{\"value\":\"design\"},{\"value\":\"technology\"},{\"value\":\"laravel\"},{\"value\":\"wordpress\"}]', '2024-07-10 09:10:19', '2024-07-15 09:58:18'),
(2, 'focused-on-their-studies-cropped-shot-of', 'uploads/custom-images/blog--2024-07-15-03-41-32-3716.webp', 1, 2, 0, 1, 'no', '0', '[{\"value\":\"event1\"},{\"value\":\"children\"},{\"value\":\"copa amercia\"},{\"value\":\"laravel\"},{\"value\":\"euro cup\"}]', '2024-07-15 09:41:32', '2024-07-15 09:41:32'),
(3, 'startup-team-as-concept-cropped-shot', 'uploads/custom-images/blog--2024-07-15-03-43-46-3036.webp', 1, 3, 0, 1, 'no', '0', '[{\"value\":\"larave\"},{\"value\":\"html\"},{\"value\":\"php\"},{\"value\":\"css\"},{\"value\":\"javascript\"}]', '2024-07-15 09:43:46', '2024-07-15 09:43:46'),
(4, 'tell-me-more-about-this-as-cropped-shot', 'uploads/custom-images/blog--2024-07-15-03-45-37-4986.webp', 1, 3, 0, 1, 'no', '0', '[{\"value\":\"larave\"},{\"value\":\"python\"},{\"value\":\"web design\"},{\"value\":\"programming\"}]', '2024-07-15 09:45:37', '2024-07-15 09:45:37'),
(5, 'graphics-designer-editor-workplace', 'uploads/custom-images/blog--2024-07-15-03-48-08-1303.webp', 1, 4, 0, 1, 'no', '0', '[{\"value\":\"php\"},{\"value\":\"laravel\"},{\"value\":\"html\"},{\"value\":\"css\"},{\"value\":\"design\"}]', '2024-07-15 09:48:08', '2024-07-15 09:48:08'),
(6, 'serious-confident-our-curly-bearded-office', 'uploads/custom-images/blog--2024-07-15-03-50-28-5273.webp', 1, 5, 0, 1, 'no', '0', '[{\"value\":\"djongo\"},{\"value\":\"python\"},{\"value\":\"mysql\"},{\"value\":\"database\"}]', '2024-07-15 09:49:50', '2024-07-15 09:50:28'),
(7, 'person-working-in-the-office-workplace', 'uploads/custom-images/blog--2024-07-15-03-54-04-7096.webp', 1, 2, 0, 1, 'no', '0', '[{\"value\":\"web development\"},{\"value\":\"programming\"},{\"value\":\"javascript\"},{\"value\":\"laravel\"}]', '2024-07-15 09:54:05', '2024-07-15 09:54:05'),
(8, 'colleagues-discussing-in-coworking-office', 'uploads/custom-images/blog--2024-07-15-03-58-45-2281.webp', 1, 1, 0, 1, 'no', '0', '[{\"value\":\"web devleopment\"},{\"value\":\"design\"},{\"value\":\"php\"},{\"value\":\"html\"}]', '2024-07-15 09:56:42', '2024-07-15 09:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'web-design', 1, '2024-07-10 09:06:01', '2024-07-10 09:06:01'),
(2, 'laravel', 1, '2024-07-10 09:06:10', '2024-07-10 09:06:10'),
(3, 'wordpress', 1, '2024-07-10 09:06:20', '2024-07-10 09:06:20'),
(4, 'technology', 1, '2024-07-10 09:06:28', '2024-07-10 09:06:28'),
(5, 'flutter-apps', 1, '2024-07-10 09:06:41', '2024-07-10 09:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_translations`
--

CREATE TABLE `blog_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category_translations`
--

INSERT INTO `blog_category_translations` (`id`, `blog_category_id`, `lang_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Web Design', '2024-07-10 09:06:01', '2024-07-10 09:06:01'),
(2, 1, 'hd', 'Web Design', '2024-07-10 09:06:01', '2024-07-10 09:06:01'),
(3, 2, 'en', 'Laravel', '2024-07-10 09:06:10', '2024-07-10 09:06:10'),
(4, 2, 'hd', 'Laravel', '2024-07-10 09:06:10', '2024-07-10 09:06:10'),
(5, 3, 'en', 'WordPress', '2024-07-10 09:06:20', '2024-07-10 09:06:20'),
(6, 3, 'hd', 'WordPress', '2024-07-10 09:06:20', '2024-07-10 09:06:20'),
(7, 4, 'en', 'Technology', '2024-07-10 09:06:28', '2024-07-10 09:06:28'),
(8, 4, 'hd', 'Technology', '2024-07-10 09:06:28', '2024-07-10 09:06:28'),
(9, 5, 'en', 'Flutter Apps', '2024-07-10 09:06:41', '2024-07-10 09:06:41'),
(10, 5, 'hd', 'Flutter Apps', '2024-07-10 09:06:41', '2024-07-10 09:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `phone`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'John Doe', 'user@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 09:59:56', '2024-07-15 10:00:14'),
(3, 1, 'Jonas Lawrence', 'client@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:00:08', '2024-07-15 10:00:14'),
(4, 1, 'David Simmonsss', 'david@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:01:30', '2024-07-15 10:02:15'),
(5, 2, 'David Richard', 'user@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:01:46', '2024-07-15 10:02:16'),
(6, 2, 'David Warner', 'david@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:02:11', '2024-07-15 10:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `blog_translations`
--

CREATE TABLE `blog_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_translations`
--

INSERT INTO `blog_translations` (`id`, `blog_id`, `lang_code`, `title`, `description`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Emerging Trends: Tech Innovations to Watch', '<p><strong>Blog Post Title: \"Cloud Computing: Enhancing Business Operations Globally\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-58-18-3203.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Emerging Trends: Tech Innovations to Watch', 'In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale.', '2024-07-10 09:10:19', '2024-07-15 09:58:28'),
(2, 1, 'hd', 'Emerging Trends: Tech Innovations to Watch', '<p><strong>Blog Post Title: \"Cloud Computing: Enhancing Business Operations Globally\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Emerging Trends: Tech Innovations to Watch', 'In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale.', '2024-07-10 09:10:19', '2024-07-10 09:10:19'),
(3, 2, 'en', 'Focused on their studies cropped shot of', '<p><strong>Blog Post Title: \"Focused on their studies cropped shot of\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-41-32-3716.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Focused on their studies cropped shot of', 'Focused on their studies cropped shot of', '2024-07-15 09:41:32', '2024-07-15 09:42:59'),
(4, 2, 'hd', 'Focused on their studies cropped shot of', '<p><strong>Blog Post Title: \"Cloud Computing: Enhancing Business Operations Globally\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Focused on their studies cropped shot of', 'Focused on their studies cropped shot of', '2024-07-15 09:41:32', '2024-07-15 09:41:32'),
(5, 3, 'en', 'Startup & team as concept cropped shot', '<p><strong>Blog Post Title: \"Startup &amp; team as concept cropped shot\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-43-46-3036.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Startup & team as concept cropped shot', 'Startup & team as concept cropped shot', '2024-07-15 09:43:46', '2024-07-15 09:44:45'),
(6, 3, 'hd', 'Startup & team as concept cropped shot', '<p><strong>Blog Post Title: \"Focused on their studies cropped shot of\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>&nbsp;</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Startup & team as concept cropped shot', 'Startup & team as concept cropped shot', '2024-07-15 09:43:46', '2024-07-15 09:43:46'),
(7, 4, 'en', 'Tell me more about this as cropped shot', '<p><strong>Blog Post Title: \"Tell me more about this as cropped shot\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-45-37-4986.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Tell me more about this as cropped shot', 'Tell me more about this as cropped shot', '2024-07-15 09:45:37', '2024-07-15 09:46:05'),
(8, 4, 'hd', 'Tell me more about this as cropped shot', '<p><strong>Blog Post Title: \"Startup &amp; team as concept cropped shot\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../uploads/custom-images/blog--2024-07-15-03-43-46-3036.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Tell me more about this as cropped shot', 'Tell me more about this as cropped shot', '2024-07-15 09:45:37', '2024-07-15 09:45:37'),
(9, 5, 'en', 'Graphics designer editor workplace', '<p><strong>Blog Post Title: \"Graphics designer editor workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-48-08-1303.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Graphics designer editor workplace', 'Graphics designer editor workplace', '2024-07-15 09:48:08', '2024-07-15 09:48:26'),
(10, 5, 'hd', 'Graphics designer editor workplace', '<p><strong>Blog Post Title: \"Graphics designer editor workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../uploads/custom-images/blog--2024-07-15-03-45-37-4986.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Graphics designer editor workplace', 'Graphics designer editor workplace', '2024-07-15 09:48:08', '2024-07-15 09:48:08'),
(11, 6, 'en', 'Serious confident our curly bearded office', '<p><strong>Blog Post Title: \"Serious confident our curly bearded office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-50-28-5273.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Serious confident our curly bearded office', 'Serious confident our curly bearded office', '2024-07-15 09:49:50', '2024-07-15 09:53:10');
INSERT INTO `blog_translations` (`id`, `blog_id`, `lang_code`, `title`, `description`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(12, 6, 'hd', 'Serious confident our curly bearded office', '<p><strong>Blog Post Title: \"Serious confident our curly bearded office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>&nbsp;</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Serious confident our curly bearded office', 'Serious confident our curly bearded office', '2024-07-15 09:49:50', '2024-07-15 09:49:50'),
(13, 7, 'en', 'Person working in the office workplace', '<p><strong>Blog Post Title: \"Person working in the office workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-54-04-7096.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Person working in the office workplace', 'Person working in the office workplace', '2024-07-15 09:54:05', '2024-07-15 09:54:18'),
(14, 7, 'hd', 'Person working in the office workplace', '<p><strong>Blog Post Title: \"Person working in the office workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../uploads/custom-images/blog--2024-07-15-03-50-28-5273.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Person working in the office workplace', 'Person working in the office workplace', '2024-07-15 09:54:05', '2024-07-15 09:54:05'),
(15, 8, 'en', 'Colleagues discussing in coworking office', '<p><strong>Blog Post Title: \"Colleagues discussing in coworking office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-58-45-2281.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Colleagues discussing in coworking office', 'Colleagues discussing in coworking office', '2024-07-15 09:56:42', '2024-07-15 09:59:02'),
(16, 8, 'hd', 'Colleagues discussing in coworking office', '<p><strong>Blog Post Title: \"Colleagues discussing in coworking office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Colleagues discussing in coworking office', 'Colleagues discussing in coworking office', '2024-07-15 09:56:42', '2024-07-15 09:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'enable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `status`, `created_at`, `updated_at`, `icon`) VALUES
(2, 'graphics-design', 'enable', '2024-07-10 05:57:39', '2024-07-10 05:57:39', 'uploads/custom-images/category--2024-07-10-11-57-39-8697.webp'),
(3, 'digital-marketing', 'enable', '2024-07-10 05:58:10', '2024-07-10 05:58:10', 'uploads/custom-images/category--2024-07-10-11-58-10-4298.webp'),
(4, 'animation', 'enable', '2024-07-10 05:58:25', '2024-07-10 06:10:33', 'uploads/custom-images/category--2024-07-10-11-58-25-6568.webp'),
(5, 'programming', 'enable', '2024-07-10 05:58:38', '2024-07-10 05:58:38', 'uploads/custom-images/category--2024-07-10-11-58-38-9116.webp'),
(6, 'design-creative', 'enable', '2024-07-10 05:58:56', '2024-07-10 05:58:56', 'uploads/custom-images/category--2024-07-10-11-58-56-5158.webp'),
(7, 'photography', 'enable', '2024-07-10 05:59:21', '2024-07-10 05:59:21', 'uploads/custom-images/category--2024-07-10-11-59-21-7503.webp'),
(8, 'development-it', 'enable', '2024-07-10 05:59:39', '2024-07-10 05:59:45', 'uploads/custom-images/category--2024-07-10-11-59-39-3517.webp'),
(9, 'business-style', 'enable', '2024-07-10 06:00:17', '2024-07-10 06:00:17', 'uploads/custom-images/category--2024-07-10-12-00-17-4763.webp'),
(10, 'ai-services', 'enable', '2024-07-10 06:00:34', '2024-07-10 06:00:37', 'uploads/custom-images/category--2024-07-10-12-00-34-4230.webp'),
(11, 'web-design', 'enable', '2024-07-10 06:00:48', '2024-07-10 06:11:17', 'uploads/custom-images/category--2024-07-10-12-00-48-3620.webp'),
(12, 'architecture', 'enable', '2024-07-10 06:01:00', '2024-07-10 06:01:00', 'uploads/custom-images/category--2024-07-10-12-01-00-5020.webp'),
(13, 'marketing', 'enable', '2024-07-10 06:01:20', '2024-07-10 06:11:04', 'uploads/custom-images/category--2024-07-10-12-01-20-4028.webp');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `lang_code`, `name`, `created_at`, `updated_at`, `category_id`) VALUES
(3, 'en', 'Graphics & Design', '2024-07-10 05:57:39', '2024-07-10 05:57:39', 2),
(4, 'hd', 'Graphics & Design', '2024-07-10 05:57:39', '2024-07-10 05:57:39', 2),
(5, 'en', 'Digital Marketing', '2024-07-10 05:58:10', '2024-07-10 05:58:10', 3),
(6, 'hd', 'Digital Marketing', '2024-07-10 05:58:10', '2024-07-10 05:58:10', 3),
(7, 'en', 'Animation', '2024-07-10 05:58:25', '2024-07-10 06:10:33', 4),
(8, 'hd', 'Video & Animation', '2024-07-10 05:58:25', '2024-07-10 05:58:25', 4),
(9, 'en', 'Programming', '2024-07-10 05:58:38', '2024-07-10 05:58:38', 5),
(10, 'hd', 'Programming', '2024-07-10 05:58:38', '2024-07-10 05:58:38', 5),
(11, 'en', 'Design & Creative', '2024-07-10 05:58:56', '2024-07-10 05:58:56', 6),
(12, 'hd', 'Design & Creative', '2024-07-10 05:58:56', '2024-07-10 05:58:56', 6),
(13, 'en', 'Photography', '2024-07-10 05:59:21', '2024-07-10 05:59:21', 7),
(14, 'hd', 'Photography', '2024-07-10 05:59:21', '2024-07-10 05:59:21', 7),
(15, 'en', 'Development & It', '2024-07-10 05:59:39', '2024-07-10 05:59:39', 8),
(16, 'hd', 'Development & It', '2024-07-10 05:59:39', '2024-07-10 05:59:39', 8),
(17, 'en', 'Business Style', '2024-07-10 06:00:17', '2024-07-10 06:00:17', 9),
(18, 'hd', 'Business Style', '2024-07-10 06:00:17', '2024-07-10 06:00:17', 9),
(19, 'en', 'AI Services', '2024-07-10 06:00:34', '2024-07-10 06:00:34', 10),
(20, 'hd', 'AI Services', '2024-07-10 06:00:34', '2024-07-10 06:00:34', 10),
(21, 'en', 'Web Design', '2024-07-10 06:00:48', '2024-07-10 06:11:17', 11),
(22, 'hd', 'Branding Design', '2024-07-10 06:00:48', '2024-07-10 06:00:48', 11),
(23, 'en', 'Architecture', '2024-07-10 06:01:00', '2024-07-10 06:01:00', 12),
(24, 'hd', 'Architecture', '2024-07-10 06:01:00', '2024-07-10 06:01:00', 12),
(25, 'en', 'Marketing', '2024-07-10 06:01:20', '2024-07-10 06:11:04', 13),
(26, 'hd', 'Sales & Marketing', '2024-07-10 06:01:20', '2024-07-10 06:01:20', 13);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `image`) VALUES
(1, '2024-07-10 06:27:43', '2024-07-10 06:27:43', 'uploads/custom-images/city--2024-07-10-12-27-43-4809.webp'),
(2, '2024-07-10 06:27:56', '2024-07-10 06:27:56', 'uploads/custom-images/city--2024-07-10-12-27-56-3200.webp'),
(3, '2024-07-10 06:28:12', '2024-07-10 06:28:12', 'uploads/custom-images/city--2024-07-10-12-28-12-2224.webp');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `city_id`, `lang_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Dhaka', '2024-07-10 06:27:43', '2024-07-10 06:27:43'),
(2, 1, 'hd', 'Dhaka', '2024-07-10 06:27:43', '2024-07-10 06:27:43'),
(3, 2, 'en', 'Noakhali', '2024-07-10 06:27:56', '2024-07-10 06:27:56'),
(4, 2, 'hd', 'Noakhali', '2024-07-10 06:27:56', '2024-07-10 06:27:56'),
(5, 3, 'en', 'Chittagong', '2024-07-10 06:28:12', '2024-07-10 06:28:12'),
(6, 3, 'hd', 'Chittagong', '2024-07-10 06:28:12', '2024-07-10 06:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ibrahim Khalil', 'user@gmail.com', '123-343-4444434', 'Can&#039;t able to login', 'Award-winning, family owned dealership of new and pre-owned Workzone with several \r\nlocations across the city.', '2024-07-10 07:40:27', '2024-07-10 07:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `map_code` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `phone`, `email`, `phone2`, `email2`, `map_code`, `created_at`, `updated_at`) VALUES
(1, '+88 234 567 8991', 'abdur.rohman2003@gmail.com', '+88 234 567 8992', 'workzone@gmail.com', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.579502735794!2d90.36542960000001!3d23.82233695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1701237009812!5m2!1sen!2sbd', NULL, '2024-07-10 07:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_translations`
--

CREATE TABLE `contact_us_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_us_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `contact_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_translations`
--

INSERT INTO `contact_us_translations` (`id`, `contact_us_id`, `lang_code`, `address`, `title`, `description`, `contact_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', '4517 Washington Ave. 32 King Street.', 'Get in Touch', 'Award-winning, family owned dealership of new and pre-owned Workzone with several locations across the city.', 'Contrary to popular belief Lorem Ipsum is not simply random text.It has roots in a piece of classical Latin literature', '2024-01-28 09:47:29', '2024-07-12 08:58:17'),
(28, 1, 'hd', '4517 Washington Ave. 32 King Street, Melbourne Manchester, Road USA', 'Get in Touch', 'Award-winning, family owned dealership of new and pre-owned Aadfirst with several locations across the city.', NULL, '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `currency_icon` varchar(255) NOT NULL,
  `is_default` varchar(255) NOT NULL DEFAULT 'no',
  `currency_rate` decimal(8,2) NOT NULL,
  `currency_position` varchar(255) NOT NULL DEFAULT 'before_price',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_code`, `country_code`, `currency_icon`, `is_default`, `currency_rate`, `currency_position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'USD', 'USA', '$', 'yes', 1.00, 'before_price', 'active', '2024-05-07 12:20:36', '2024-05-07 12:20:36'),
(8, 'INR', 'INR', 'IN', '₹', 'no', 2.00, 'before_price', 'active', '2024-07-10 05:35:14', '2024-07-10 05:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'custom-page-one', 1, '2024-07-10 08:25:59', '2024-07-10 08:25:59'),
(2, 'custom-page-two', 1, '2024-07-10 08:26:08', '2024-07-10 08:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `custom_page_translations`
--

CREATE TABLE `custom_page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_page_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_page_translations`
--

INSERT INTO `custom_page_translations` (`id`, `custom_page_id`, `lang_code`, `page_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Custom Page One', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:25:59', '2024-07-10 08:25:59'),
(2, 1, 'hd', 'Custom Page One', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:25:59', '2024-07-10 08:25:59'),
(3, 2, 'en', 'Custom Page Two', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:26:08', '2024-07-10 08:26:08'),
(4, 2, 'hd', 'Custom Page Two', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:26:08', '2024-07-10 08:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sender_name', 'WorkZone', NULL, '2024-07-10 04:49:08'),
(2, 'mail_host', 'workzone.minionionbd.com', NULL, '2024-07-10 04:49:08'),
(3, 'email', 'sendmail@workzone.minionionbd.com', NULL, '2024-07-10 04:49:08'),
(4, 'smtp_username', 'sendmail@workzone.minionionbd.com', NULL, '2024-07-10 04:49:08'),
(5, 'smtp_password', ',{dK=1Ov5Vmc', NULL, '2024-07-10 04:49:08'),
(6, 'mail_port', '465', NULL, '2024-07-10 04:49:08'),
(7, 'mail_encryption', 'tls', NULL, '2024-07-10 04:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Reset Password', 'Reset Password', '<h4>Dear <strong>{{user_name}}</strong>,</h4><p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p><p><strong>{{reset_link}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL),
(2, 'Contact Email', 'Contact Email', '<p>Hello there,</p><p><strong>Mr. {{user_name}} </strong>has send a new email to you. See the message description below:</p><p>Email: <strong>{{user_email}}</strong></p><p>Phone: <strong>{{user_phone}}</strong></p><p><span style=\"background-color: transparent;\">Subject: <strong>{{message_subject}}</strong></span></p><p>Message: <strong>{{message}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL),
(3, 'NewsLetter Verification', 'NewsLetter Verification', '<h2><strong>Hi there</strong>,</h2><p>Congratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription.&nbsp;</p><p><strong>{{verification_link}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL),
(4, 'User Verification', 'User Verification', '<p>Dear <strong>{{user_name}}</strong>,</p><p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p><p><strong>{{varification_link}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `created_at`, `updated_at`) VALUES
(2, '2024-07-15 08:25:58', '2024-07-15 08:25:58'),
(3, '2024-07-15 08:26:14', '2024-07-15 08:26:14'),
(4, '2024-07-15 08:26:32', '2024-07-15 08:26:32'),
(5, '2024-07-15 08:26:48', '2024-07-15 08:26:48'),
(6, '2024-07-15 08:27:24', '2024-07-15 08:27:24'),
(7, '2024-07-15 08:27:44', '2024-07-15 08:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `faq_translations`
--

CREATE TABLE `faq_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_translations`
--

INSERT INTO `faq_translations` (`id`, `faq_id`, `lang_code`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(3, 2, 'en', 'How do I create a freelance profile on the marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:25:58', '2024-07-15 08:25:58'),
(4, 2, 'hd', 'How do I create a freelance profile on the marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:25:58', '2024-07-15 08:25:58'),
(5, 3, 'en', 'What steps are involved in submitting a proposal for a job?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:14', '2024-07-15 08:26:14'),
(6, 3, 'hd', 'What steps are involved in submitting a proposal for a job?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:14', '2024-07-15 08:26:14'),
(7, 4, 'en', 'Are there any fees associated with using the freelance marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:32', '2024-07-15 08:26:32'),
(8, 4, 'hd', 'Are there any fees associated with using the freelance marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:32', '2024-07-15 08:26:32'),
(9, 5, 'en', 'What should I do if I encounter issues with a client or project?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:26:48', '2024-07-15 08:26:48'),
(10, 5, 'hd', 'What should I do if I encounter issues with a client or project?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:26:48', '2024-07-15 08:26:48'),
(11, 6, 'en', 'What precautions should I take to avoid scams?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:27:24', '2024-07-15 08:27:24'),
(12, 6, 'hd', 'What precautions should I take to avoid scams?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:27:24', '2024-07-15 08:27:24'),
(13, 7, 'en', 'Can I make bank payment ?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:27:44', '2024-07-15 08:28:28'),
(14, 7, 'hd', 'How do I handle test influencer and inspections?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:27:44', '2024-07-15 08:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `playstore` varchar(255) DEFAULT NULL,
  `appstore` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `facebook`, `twitter`, `linkedin`, `instagram`, `copyright`, `address`, `phone`, `email`, `playstore`, `appstore`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'Copyright 2024, QuomodoSoft. All Rights Reserved.', 'Los Angeles, CA, USA', '123-343-4444', 'workzone@gmail.com', 'https://play.google.com/', 'https://www.apple.com/app-store/', NULL, '2024-07-02 02:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `footer_translations`
--

CREATE TABLE `footer_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `about_us` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_translations`
--

INSERT INTO `footer_translations` (`id`, `footer_id`, `lang_code`, `about_us`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout the point of using lorem varius sit amet ipsum.', NULL, '2024-07-12 09:10:52'),
(8, 1, 'hd', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout the point of using lorem varius sit amet ipsum.', '2024-07-02 12:15:43', '2024-07-02 12:15:43'),
(9, 1, 'hd', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout the point of using lorem varius sit amet ipsum.', '2024-07-09 11:47:59', '2024-07-09 11:47:59'),
(10, 1, 'hd', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout the point of using lorem varius sit amet ipsum.', '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `global_settings`
--

CREATE TABLE `global_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_settings`
--

INSERT INTO `global_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'uploads/website-images/logo-2024-07-02-06-01-21-9490.png', NULL, '2024-07-02 12:01:21'),
(2, 'favicon', 'uploads/website-images/favicon-2024-07-02-05-50-21-5549.png', NULL, '2024-07-02 11:50:21'),
(3, 'app_name', 'WorkZone', NULL, '2024-09-15 04:40:41'),
(4, 'contact_message_mail', 'workzone.contact@gmail.com', NULL, '2024-09-15 04:40:41'),
(5, 'timezone', 'Asia/Dhaka', NULL, '2024-09-15 04:40:41'),
(6, 'selected_theme', 'all_theme', NULL, '2024-09-15 04:40:41'),
(7, 'recaptcha_status', '0', NULL, '2024-07-10 05:25:54'),
(8, 'recaptcha_site_key', '6LdnfvkpAAAAAOoDqEeVqqOA-BIdVmYd4bBPejuq', NULL, '2024-07-10 05:25:54'),
(9, 'recaptcha_secret_key', '6LdnfvkpAAAAAC0GBj1_ERX2y581bVRUdSpNDgJm', NULL, '2024-07-10 05:25:54'),
(10, 'tawk_chat_link', 'https://embed.tawk.to/5a7c31ded7591465c7077c48/default', NULL, '2024-05-07 10:53:59'),
(11, 'tawk_status', '1', NULL, '2024-05-07 10:53:59'),
(12, 'google_analytic_id', '55525522', NULL, '2024-07-10 05:25:46'),
(13, 'google_analytic_status', '0', NULL, '2024-07-10 05:25:46'),
(14, 'pixel_app_id', '156905933', NULL, '2024-07-02 12:10:44'),
(15, 'pixel_status', '1', NULL, '2024-07-02 12:10:44'),
(16, 'placeholder_image', 'uploads/website-images/placeholder-image.png', NULL, '2024-05-07 11:05:22'),
(17, 'cookie_consent_status', '0', NULL, '2024-07-10 07:23:48'),
(18, 'cookie_consent_message', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the when an unknown printer took.', NULL, '2024-07-10 07:23:48'),
(19, 'error_image', 'uploads/website-images/error-image-2024-07-02-09-51-10-1816.png', NULL, '2024-07-02 03:51:10'),
(20, 'login_page_bg', 'uploads/website-images/login-bg-image-2024-07-02-09-51-30-6904.png', NULL, '2024-07-02 03:51:30'),
(21, 'admin_login', 'uploads/website-images/admin-bg-image-2024-07-16-11-20-09-9979.png', NULL, '2024-07-16 05:20:09'),
(22, 'breadcrumb_image', 'uploads/website-images/breadcrumb-image-2024-05-17-11-50-01-3653.png', NULL, '2024-05-17 05:50:03'),
(23, 'is_facebook', '1', NULL, '2024-07-10 04:51:29'),
(24, 'facebook_client_id', '1844188565781706', NULL, '2024-07-10 04:51:29'),
(25, 'facebook_secret_id', '18441885657817', NULL, '2024-07-10 04:51:29'),
(26, 'facebook_redirect_url', 'http://localhost/callback/facebook', NULL, '2024-07-10 04:51:29'),
(27, 'is_gmail', '1', NULL, '2024-07-10 04:51:29'),
(28, 'gmail_client_id', '673210704627-g002lb3mstedn57b4geupsfhakcqo316.apps.googleusercontent.com', NULL, '2024-07-10 04:51:29'),
(29, 'gmail_secret_id', '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', NULL, '2024-07-10 04:51:29'),
(30, 'gmail_redirect_url', 'https://workzone.minionionbd.com/buyer/callback/google', NULL, '2024-07-10 04:51:29'),
(31, 'default_avatar', 'uploads/website-images/avatar-image-2024-07-02-10-08-24-5849.png', NULL, '2024-07-02 04:08:24'),
(32, 'default_cover_image', 'uploads/website-images/default-cover-image-2024-05-09-06-53-46-2041.png', NULL, '2024-05-09 00:53:47'),
(33, 'maintenance_status', '0', NULL, '2024-07-10 04:39:56'),
(34, 'maintenance_image', 'uploads/website-images/maintenance-image-2024-07-08-03-59-12-7938.png', NULL, '2024-07-08 09:59:12'),
(35, 'maintenance_text', 'We are upgrading our site.  We will come back soon.  \r\nPlease stay with us. \r\nThank you.', NULL, '2024-07-10 04:39:56'),
(36, 'app_version', '3.0.0', NULL, '2024-09-15 04:46:44'),
(37, 'facebook_link', 'facebook_link', NULL, NULL),
(38, 'twitter_link', 'twitter_link', NULL, NULL),
(39, 'linkedin_link', 'linkedin_link', NULL, NULL),
(40, 'instagram_link', 'instagram_link', NULL, NULL),
(41, 'footer_logo', 'uploads/website-images/footer-logo-2024-07-02-06-01-21-8933.png', '2024-07-02 11:51:07', '2024-07-02 12:01:21'),
(42, 'empty_image', 'uploads/website-images/empty-2024-05-17-11-50-01-3653.png', '2024-07-03 14:39:42', NULL),
(43, 'not_found', 'uploads/website-images/not-found-2024-05-17-11-50-01-3653.png', '2024-07-08 10:07:05', NULL),
(44, 'commission_type', 'subscription', '2024-09-15 03:54:23', '2024-09-15 04:40:41'),
(45, 'commission_per_sale', '1', '2024-09-15 03:54:23', '2024-09-15 04:40:41'),
(46, 'commission_type', 'commission', '2024-09-15 04:46:44', '2024-09-15 04:46:44'),
(47, 'commission_per_sale', '1', '2024-09-15 04:46:44', '2024-09-15 04:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `intro_banner_one` varchar(255) DEFAULT NULL,
  `intro_banner_two` varchar(255) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `explore_image` varchar(255) DEFAULT NULL,
  `explore_total_customer` varchar(255) DEFAULT NULL,
  `explore_total_service` varchar(255) DEFAULT NULL,
  `explore_total_job` varchar(255) DEFAULT NULL,
  `join_seller_image` varchar(255) DEFAULT NULL,
  `mobile_app_image` varchar(255) DEFAULT NULL,
  `working_step_icon1` varchar(255) DEFAULT NULL,
  `working_step_icon2` varchar(255) DEFAULT NULL,
  `working_step_icon3` varchar(255) DEFAULT NULL,
  `working_step_icon4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_playstore` varchar(255) DEFAULT NULL,
  `mobile_appstore` varchar(255) DEFAULT NULL,
  `feature_icon1` varchar(255) DEFAULT NULL,
  `feature_icon2` varchar(255) DEFAULT NULL,
  `feature_icon3` varchar(255) DEFAULT NULL,
  `feature_icon4` varchar(255) DEFAULT NULL,
  `feature_icon5` varchar(255) DEFAULT NULL,
  `home2_intro_bg` varchar(255) DEFAULT NULL,
  `home2_intro_forground` varchar(255) DEFAULT NULL,
  `home2_intro_tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `intro_banner_one`, `intro_banner_two`, `customer_image`, `explore_image`, `explore_total_customer`, `explore_total_service`, `explore_total_job`, `join_seller_image`, `mobile_app_image`, `working_step_icon1`, `working_step_icon2`, `working_step_icon3`, `working_step_icon4`, `created_at`, `updated_at`, `mobile_playstore`, `mobile_appstore`, `feature_icon1`, `feature_icon2`, `feature_icon3`, `feature_icon4`, `feature_icon5`, `home2_intro_bg`, `home2_intro_forground`, `home2_intro_tags`) VALUES
(1, 'uploads/custom-images/intro-one--2024-07-10-12-03-05-5735.webp', 'uploads/custom-images/intro-one--2024-05-14-10-06-01-1053.webp', 'uploads/custom-images/intro-two--2024-07-10-12-24-55-5158.webp', 'uploads/custom-images/explore--2024-07-10-12-28-50-6980.webp', '56', '59', '65', 'uploads/custom-images/working-step--2024-07-10-12-58-03-4540.webp', 'uploads/custom-images/working-step--2024-05-14-12-08-19-7969.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-1055.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-8063.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-8354.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-1463.webp', NULL, '2024-07-10 06:58:03', 'Play store link', 'App store link', 'uploads/custom-images/feature_icon1--2024-07-10-12-39-51-1271.webp', 'uploads/custom-images/feature_icon2--2024-07-10-12-45-16-9285.webp', 'uploads/custom-images/feature_icon3--2024-07-10-12-45-16-1439.webp', 'uploads/custom-images/feature_icon4--2024-07-10-12-45-16-7641.webp', 'uploads/custom-images/feature_icon5--2024-07-10-12-45-16-9388.webp', 'uploads/custom-images/intro-one--2024-07-10-12-55-27-4546.webp', 'uploads/custom-images/intro-two--2024-07-10-12-08-32-3503.webp', '[{\"value\":\"laravel\"},{\"value\":\"php\"},{\"value\":\"javascript\"},{\"value\":\"html\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_translations`
--

CREATE TABLE `homepage_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `homepage_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `intro_title` varchar(255) DEFAULT NULL,
  `total_customer` varchar(255) DEFAULT NULL,
  `total_rating` varchar(255) DEFAULT NULL,
  `explore_short_title` varchar(255) DEFAULT NULL,
  `explore_title` text DEFAULT NULL,
  `explore_description` text DEFAULT NULL,
  `working_step_title1` varchar(255) DEFAULT NULL,
  `working_step_title2` varchar(255) DEFAULT NULL,
  `working_step_title3` varchar(255) DEFAULT NULL,
  `working_step_title4` varchar(255) DEFAULT NULL,
  `join_seller_title` text DEFAULT NULL,
  `join_seller_des` text DEFAULT NULL,
  `mobile_app_title` varchar(255) DEFAULT NULL,
  `mobile_app_des` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `working_step_des1` varchar(255) DEFAULT NULL,
  `working_step_des2` varchar(255) DEFAULT NULL,
  `working_step_des3` varchar(255) DEFAULT NULL,
  `working_step_des4` varchar(255) DEFAULT NULL,
  `feature_title1` varchar(255) DEFAULT NULL,
  `feature_title2` varchar(255) DEFAULT NULL,
  `feature_title3` varchar(255) DEFAULT NULL,
  `feature_title4` varchar(255) DEFAULT NULL,
  `feature_title5` varchar(255) DEFAULT NULL,
  `home2_intro_title` text DEFAULT NULL,
  `home2_intro_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_translations`
--

INSERT INTO `homepage_translations` (`id`, `homepage_id`, `lang_code`, `intro_title`, `total_customer`, `total_rating`, `explore_short_title`, `explore_title`, `explore_description`, `working_step_title1`, `working_step_title2`, `working_step_title3`, `working_step_title4`, `join_seller_title`, `join_seller_des`, `mobile_app_title`, `mobile_app_des`, `created_at`, `updated_at`, `working_step_des1`, `working_step_des2`, `working_step_des3`, `working_step_des4`, `feature_title1`, `feature_title2`, `feature_title3`, `feature_title4`, `feature_title5`, `home2_intro_title`, `home2_intro_description`) VALUES
(1, 1, 'en', 'Find Your Perfect <span>Freelancer</span> Quick and Easy', '35M+', '4.9', 'Explore New Life', 'Don’t just find. Be found put your CV in front of great employers', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.', 'Proof of Quality Works', 'No Cost Until You Hire', 'Safe and Secure Payment Both', 'A whole world of freelance talent at your fingertip', 'Find the talent needed to get your business growing.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.', 'Get a Mobile Application Enjoy Food Experience', 'We\'ve done it carefully and simply. Combined with the ingredients makes for beautiful landings.', NULL, '2024-07-12 09:14:29', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'Pay online with Multiple credit Cards or Cash!', 'Hourly Rated Jobs', 'Projects Gig Catalogue', 'Paid Membership', 'Custom Order', 'Live Chat System', 'Hire the best freelancers for any job, online', 'For optimal online freelancing hires, precisely outline project requirements, select reputable platforms, and thoroughly vet candidates\' profiles, ensuring a seamless collaboration.'),
(9, 1, 'hd', 'Find Your Perfect <span>Freelancer</span> Quick and Easy', '35M+', '4.9', 'Explore New Life', 'Don’t just find. Be found put your CV in front of great employers', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.', 'Proof of Quality Works', 'No Cost Until You Hire', 'Safe and Secure Payment Both', 'A whole world of freelance talent at your fingertip', 'Find the talent needed to get your business growing.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.', 'Get a Mobile Application Enjoy Food Experience', 'We\'ve done it carefully and simply. Combined with the ingredients makes for beautiful landings.', '2024-07-10 05:34:58', '2024-07-10 05:34:58', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', NULL, 'Hourly Rated Jobs', 'Projects Gig Catalogue', 'Paid Membership', 'Custom Order', 'Live Chat System', 'Hire the best freelancers for any job, online', 'For optimal online freelancing hires, precisely outline project requirements, select reputable platforms, and thoroughly vet candidates\' profiles, ensuring a seamless collaboration.');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `total_view` bigint(20) NOT NULL DEFAULT 0,
  `regular_price` decimal(8,2) NOT NULL,
  `is_urgent` varchar(255) NOT NULL DEFAULT 'disable',
  `status` varchar(255) NOT NULL DEFAULT 'disable',
  `approved_by_admin` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `user_id`, `category_id`, `city_id`, `thumb_image`, `slug`, `job_type`, `total_view`, `regular_price`, `is_urgent`, `status`, `approved_by_admin`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-14-02-30-59-4201.webp', 'video-editor-for-creative-projects', 'Monthly', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:17:23'),
(2, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-14-02-31-26-8758.webp', 'video-editor-for-creative-projects2', 'Yearly', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:17:36'),
(3, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-14-02-31-35-7682.webp', 'video-editor-for-creative-projects3', 'Monthly', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:17:46'),
(4, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-57-15-9738.webp', 'video-editor-for-creative-projects4', 'Daily', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:57:15'),
(5, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-01-01-41-8015.webp', 'video-editor-for-creative-projects5', 'Daily', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 07:01:41'),
(6, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-57-38-8735.webp', 'video-editor-for-creative-projects6', 'Monthly', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:18:04'),
(7, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-57-53-7875.webp', 'video-editor-for-creative-projects7', 'Daily', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:57:53'),
(8, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-59-33-5051.webp', 'video-editor-for-creative-projects8', 'Yearly', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:59:33'),
(9, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-59-44-8950.webp', 'video-editor-for-creative-projects9', 'Daily', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:59:44'),
(10, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-59-53-4692.webp', 'video-editor-for-creative-projects10', 'Daily', 0, 199.00, 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_translations`
--

CREATE TABLE `job_post_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_translations`
--

INSERT INTO `job_post_translations` (`id`, `job_post_id`, `lang_code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-14 08:30:59'),
(2, 1, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(3, 2, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-14 08:31:26'),
(4, 2, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(5, 3, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-14 08:31:35'),
(6, 3, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(7, 4, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:15'),
(8, 4, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(9, 5, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:25'),
(10, 5, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(11, 6, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:38'),
(12, 6, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(13, 7, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:53'),
(14, 7, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(15, 8, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:58:45'),
(16, 8, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(17, 9, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:59:44');
INSERT INTO `job_post_translations` (`id`, `job_post_id`, `lang_code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(18, 9, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(19, 10, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:59:53'),
(20, 10, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_requests`
--

CREATE TABLE `job_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_requests`
--

INSERT INTO `job_requests` (`id`, `job_post_id`, `seller_id`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, 'fjxdfg', 'approved', '2024-07-13 09:11:44', '2024-07-15 09:22:42'),
(2, 6, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'approved', '2024-07-15 09:21:07', '2024-07-15 09:22:24'),
(3, 9, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'approved', '2024-07-15 09:21:17', '2024-07-15 09:22:34'),
(4, 10, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'pending', '2024-07-15 09:21:25', '2024-07-15 09:21:25'),
(5, 4, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'pending', '2024-07-15 09:21:36', '2024-07-15 09:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_information`
--

CREATE TABLE `kyc_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kyc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_information`
--

INSERT INTO `kyc_information` (`id`, `kyc_id`, `user_id`, `file`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'uploads/custom-images/kyc-2024-08-29-02-03-01-2814.webp', '&lt;p&gt;This is my NID, please check and verified my account. Thanks&lt;/p&gt;', 1, '2024-08-29 08:03:01', '2024-08-29 08:04:03'),
(2, 2, 4, 'uploads/custom-images/kyc-2024-08-29-02-08-49-5243.webp', '&lt;p&gt;I have attached my driving license, please check and verified my account. thanks&lt;/p&gt;', 1, '2024-08-29 08:08:50', '2024-08-29 08:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_types`
--

CREATE TABLE `kyc_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_types`
--

INSERT INTO `kyc_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NID', 1, '2024-08-29 08:00:57', '2024-08-29 08:00:57'),
(2, 'Driving License', 1, '2024-08-29 08:02:04', '2024-08-29 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `lang_direction` varchar(255) NOT NULL,
  `is_default` varchar(255) NOT NULL DEFAULT 'yes',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `lang_code`, `lang_direction`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'left_to_right', 'No', 1, '2024-05-07 11:56:30', '2024-05-07 12:01:16'),
(22, 'Hindi', 'hd', 'left_to_right', 'No', 1, '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `total_view` bigint(20) NOT NULL DEFAULT 0,
  `regular_price` decimal(8,2) DEFAULT NULL,
  `offer_price` decimal(8,2) DEFAULT NULL,
  `is_featured` varchar(255) NOT NULL DEFAULT 'disable',
  `status` varchar(255) NOT NULL DEFAULT 'disable',
  `approved_by_admin` varchar(255) NOT NULL DEFAULT 'pending',
  `tags` text DEFAULT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `sub_category_id`, `seller_id`, `category_id`, `thumb_image`, `slug`, `total_view`, `regular_price`, `offer_price`, `is_featured`, `status`, `approved_by_admin`, `tags`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 0, 7, 2, 'uploads/custom-images/listing-2024-07-10-12-24-41-9621.webp', 'mobile-app-ios-developer-wanted', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-08-25 07:12:32'),
(2, 0, 7, 13, 'uploads/custom-images/listing-2024-07-10-01-07-02-4407.webp', 'content-writer-for-blog-articles', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The ideal candidate should be able to communicate brand messages effectively through visual elements. If you have a passion for branding and can turn ideas into visually striking logos, we want to see your portfolio.', '2024-07-10 06:24:41', '2024-07-10 07:37:47'),
(3, 11, 5, 6, 'uploads/custom-images/listing-2024-07-10-01-09-04-3084.webp', 'digital-marketer-for-social-media', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-08-27 04:38:19'),
(4, 0, 3, 2, 'uploads/custom-images/listing-2024-07-10-01-10-30-5232.webp', 'video-editor-for-creative-projects', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{&quot;value&quot;:&quot;Mobile apps&quot;},{&quot;value&quot;:&quot;ios apps&quot;},{&quot;value&quot;:&quot;android&quot;}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-08-29 07:16:37'),
(5, 37, 4, 10, 'uploads/custom-images/listing-2024-07-10-01-12-40-6616.webp', 'social-media-manager-for-engagement', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-08-27 04:38:40'),
(6, 17, 7, 8, 'uploads/custom-images/listing-2024-07-10-02-54-59-4379.webp', 'mobile-app-ios-developer-wanted6', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-08-27 04:38:52'),
(7, 0, 7, 9, 'uploads/custom-images/listing-2024-07-10-03-02-20-2006.webp', 'mobile-app-ios-developer-wanted7', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-07-10 09:02:20'),
(8, 13, 7, 6, 'uploads/custom-images/listing-2024-07-10-03-02-58-6573.webp', 'mobile-app-ios-developer-wanted8', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-08-27 04:39:14'),
(9, 27, 7, 12, 'uploads/custom-images/listing-2024-07-10-03-03-38-1821.webp', 'mobile-app-ios-developer-wanted9', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-08-27 04:39:25'),
(10, 0, 7, 13, 'uploads/custom-images/listing-2024-07-10-03-04-10-7837.webp', 'mobile-app-ios-developer-wanted10', 0, NULL, NULL, 'enable', 'enable', 'approved', '[{\"value\":\"Mobile apps\"},{\"value\":\"ios apps\"},{\"value\":\"android\"}]', 'Mobile application development', 'The successful candidate should have a keen eye for detail, a passion for technology, and the ability to collaborate with cross-functional teams. If you have a proven track record of developing successful iOS applications and can bring creative ideas to the table, we would love to hear from you.', '2024-07-10 06:24:41', '2024-07-10 09:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `listing_galleries`
--

CREATE TABLE `listing_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_galleries`
--

INSERT INTO `listing_galleries` (`id`, `listing_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-54380.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(7, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-82411.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(8, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-34692.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(9, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-32443.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(10, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-56654.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(11, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-91900.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(12, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-15131.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(13, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-57172.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(14, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-25053.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(15, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-54880.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(16, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-96001.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(17, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-27572.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(18, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-27953.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(19, 4, 'uploads/custom-images/listing-gallery-2024-07-10-01-11-00-80070.webp', '2024-07-10 07:11:00', '2024-07-10 07:11:00'),
(20, 4, 'uploads/custom-images/listing-gallery-2024-07-10-01-11-00-54651.webp', '2024-07-10 07:11:00', '2024-07-10 07:11:00'),
(21, 4, 'uploads/custom-images/listing-gallery-2024-07-10-01-11-00-91302.webp', '2024-07-10 07:11:00', '2024-07-10 07:11:00'),
(23, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-99870.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(24, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-96961.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(25, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-45182.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(26, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-41983.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(27, 7, 'uploads/custom-images/listing-gallery-2024-07-10-03-02-34-13930.webp', '2024-07-10 09:02:34', '2024-07-10 09:02:34'),
(28, 7, 'uploads/custom-images/listing-gallery-2024-07-10-03-02-34-82151.webp', '2024-07-10 09:02:34', '2024-07-10 09:02:34'),
(29, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-85650.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(30, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-36261.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(31, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-39682.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(32, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-78773.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(33, 9, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-49-17110.webp', '2024-07-10 09:03:49', '2024-07-10 09:03:49'),
(34, 9, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-49-20441.webp', '2024-07-10 09:03:49', '2024-07-10 09:03:49'),
(35, 9, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-49-38572.webp', '2024-07-10 09:03:49', '2024-07-10 09:03:49'),
(36, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-29590.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24'),
(37, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-47971.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24'),
(38, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-91602.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24'),
(39, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-32533.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `listing_packages`
--

CREATE TABLE `listing_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `basic_name` varchar(255) NOT NULL,
  `basic_description` text NOT NULL,
  `basic_price` decimal(8,2) NOT NULL,
  `basic_delivery_date` varchar(255) NOT NULL DEFAULT '0',
  `basic_revision` varchar(255) NOT NULL DEFAULT '0',
  `basic_fn_website` varchar(255) NOT NULL DEFAULT 'no',
  `basic_page` varchar(255) NOT NULL DEFAULT '0',
  `basic_responsive` varchar(255) NOT NULL DEFAULT 'no',
  `basic_source_code` varchar(255) NOT NULL DEFAULT 'no',
  `basic_content_upload` varchar(255) NOT NULL DEFAULT 'no',
  `basic_speed_optimized` varchar(255) NOT NULL DEFAULT 'no',
  `standard_name` varchar(255) NOT NULL,
  `standard_description` text NOT NULL,
  `standard_price` decimal(8,2) NOT NULL,
  `standard_delivery_date` varchar(255) NOT NULL DEFAULT '0',
  `standard_revision` varchar(255) NOT NULL DEFAULT '0',
  `standard_fn_website` varchar(255) NOT NULL DEFAULT 'no',
  `standard_page` varchar(255) NOT NULL DEFAULT '0',
  `standard_responsive` varchar(255) NOT NULL DEFAULT 'no',
  `standard_source_code` varchar(255) NOT NULL DEFAULT 'no',
  `standard_content_upload` varchar(255) NOT NULL DEFAULT 'no',
  `standard_speed_optimized` varchar(255) NOT NULL DEFAULT 'no',
  `premium_name` varchar(255) NOT NULL,
  `premium_description` text NOT NULL,
  `premium_price` decimal(8,2) NOT NULL,
  `premium_delivery_date` varchar(255) NOT NULL DEFAULT '0',
  `premium_revision` varchar(255) NOT NULL DEFAULT '0',
  `premium_fn_website` varchar(255) NOT NULL DEFAULT 'no',
  `premium_page` varchar(255) NOT NULL DEFAULT '0',
  `premium_responsive` varchar(255) NOT NULL DEFAULT 'no',
  `premium_source_code` varchar(255) NOT NULL DEFAULT 'no',
  `premium_content_upload` varchar(255) NOT NULL DEFAULT 'no',
  `premium_speed_optimized` varchar(255) NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_packages`
--

INSERT INTO `listing_packages` (`id`, `listing_id`, `basic_name`, `basic_description`, `basic_price`, `basic_delivery_date`, `basic_revision`, `basic_fn_website`, `basic_page`, `basic_responsive`, `basic_source_code`, `basic_content_upload`, `basic_speed_optimized`, `standard_name`, `standard_description`, `standard_price`, `standard_delivery_date`, `standard_revision`, `standard_fn_website`, `standard_page`, `standard_responsive`, `standard_source_code`, `standard_content_upload`, `standard_speed_optimized`, `premium_name`, `premium_description`, `premium_price`, `premium_delivery_date`, `premium_revision`, `premium_fn_website`, `premium_page`, `premium_responsive`, `premium_source_code`, `premium_content_upload`, `premium_speed_optimized`, `created_at`, `updated_at`) VALUES
(1, 1, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 59.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(2, 2, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 60.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(3, 3, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 49.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(4, 4, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 30.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(5, 5, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 15.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(6, 6, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 25.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(7, 7, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 90.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(8, 8, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 95.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(9, 9, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 70.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(10, 10, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', 80.00, '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Standard', 'Get a professional Mobile App Design or Development.', 199.00, '2', '2', 'yes', '8', 'yes', 'yes', 'yes', 'yes', 'Premium', 'Get a professional Mobile App Design or Development', 599.00, '3', '3', 'yes', '10', 'yes', 'yes', 'yes', 'yes', '2024-07-10 06:24:41', '2024-07-10 06:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `listing_translations`
--

CREATE TABLE `listing_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_translations`
--

INSERT INTO `listing_translations` (`id`, `listing_id`, `lang_code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\r\n<ul>\r\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\r\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\r\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\r\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\r\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\r\n<ul>\r\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\r\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\r\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\r\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\r\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\r\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-08-25 07:08:23'),
(2, 1, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-12 09:23:11'),
(3, 2, 'en', 'Content Writer for Blog Articles', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 07:35:36'),
(4, 2, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(5, 3, 'en', 'Digital Marketer for Social Media', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\r\n<ul>\r\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\r\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\r\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\r\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\r\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\r\n<ul>\r\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\r\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\r\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\r\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\r\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\r\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-08-27 04:38:19'),
(6, 3, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(7, 4, 'en', 'Video Editor for Creative Projects', '&lt;p&gt;Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-size: 14pt;&quot;&gt;&lt;strong&gt;Service Offerings:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Swift Expertise:&lt;/strong&gt; Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;UI/UX Design:&lt;/strong&gt; Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Testing &amp;amp; Optimization:&lt;/strong&gt; Conducting thorough testing and&amp;nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Collaborative Approach:&lt;/strong&gt; Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Continuous Support:&lt;/strong&gt; Providing ongoing supportissues, implement updates, and ensure the app&#039;s optimal performance and functionality.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-size: 14pt;&quot;&gt;&lt;strong&gt;Why Choose Me:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;&lt;strong&gt;Expertise:&lt;/strong&gt; With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Quality Focus:&lt;/strong&gt; Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Client-Centric:&lt;/strong&gt; Prioritizing client satisfaction by&amp;nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Innovation:&lt;/strong&gt; Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.&lt;/li&gt;\r\n&lt;li&gt;&lt;strong&gt;Reliability:&lt;/strong&gt; Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&lt;span style=&quot;font-size: 14pt;&quot;&gt;&lt;strong&gt;Let&#039;s Collaborate:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&amp;nbsp;&lt;/p&gt;', '2024-07-10 06:24:41', '2024-08-25 08:22:54'),
(8, 4, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(9, 5, 'en', 'Social Media Manager for Engagement', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\r\n<ul>\r\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\r\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\r\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\r\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\r\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\r\n<ul>\r\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\r\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\r\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\r\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\r\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\r\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-08-27 04:38:40'),
(10, 5, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(11, 6, 'en', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\r\n<ul>\r\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\r\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\r\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\r\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\r\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\r\n<ul>\r\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\r\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\r\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\r\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\r\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\r\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-08-27 04:38:52'),
(12, 6, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(13, 7, 'en', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:44:53');
INSERT INTO `listing_translations` (`id`, `listing_id`, `lang_code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(14, 7, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(15, 8, 'en', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\r\n<ul>\r\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\r\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\r\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\r\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\r\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\r\n<ul>\r\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\r\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\r\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\r\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\r\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\r\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-08-27 04:39:14'),
(16, 8, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(17, 9, 'en', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\r\n<ul>\r\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\r\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\r\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\r\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\r\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\r\n<ul>\r\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\r\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\r\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\r\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\r\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\r\n</ul>\r\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\r\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-08-27 04:39:25'),
(18, 9, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41'),
(19, 10, 'en', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:44:53'),
(20, 10, 'hd', 'Mobile App iOS Developer Wanted', '<p>Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.</p>\n<p><span style=\"font-size: 14pt;\"><strong>Service Offerings:</strong></span></p>\n<ul>\n<li><strong>Swift Expertise:</strong> Leveraging my proficiency in Swift language to develop robust and efficient iOS applications that meet your requirements.</li>\n<li><strong>UI/UX Design:</strong> Crafting visually appealing and intuitive user interfaces to enhance user engagement and drive app usability.</li>\n<li><strong>Testing &amp; Optimization:</strong> Conducting thorough testing and&nbsp; ensure bug-free, high-performance apps that deliver a seamless user experience.</li>\n<li><strong>Collaborative Approach:</strong> Working closely with clients to goals, and to tailor app solutions that align with their brand identity and objectives.</li>\n<li><strong>Continuous Support:</strong> Providing ongoing supportissues, implement updates, and ensure the app\'s optimal performance and functionality.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Why Choose Me:</strong></span></p>\n<ul>\n<li><strong>Expertise:</strong> With years of experience in iOS app development, I bring expertise in creating custom solutions tailored to your specific needs.</li>\n<li><strong>Quality Focus:</strong> Committed to delivering high-quality apps that exceed expectations in terms of design, functionality, and user experience.</li>\n<li><strong>Client-Centric:</strong> Prioritizing client satisfaction by&nbsp; their needs, communicating effectively, and ensuring transparency throughout the project.</li>\n<li><strong>Innovation:</strong> Embracing creativity and innovation to develop unique andsolutions that set clients apart in the competitive app market.</li>\n<li><strong>Reliability:</strong> Delivering projects on time and within budget, while open communication channels and providing regular updates on progress.</li>\n</ul>\n<p><span style=\"font-size: 14pt;\"><strong>Let\'s Collaborate:</strong></span></p>\n<p>If you are ready to take your app idea to the next level and create a standout mobile application that resonates with users, I am here to help. Together, we can turn your vision into a functional, visually appealing, and user-friendly iOS app that makes a lasting impression. Contact me today to discuss your project requirements and explore how we can work together to bring your app dreams to life. Are you looking to transform your app idea into a reality? As a seasoned iOS App Developer, I offer specialized gig services to cater to your mobile app development needs. With a focus on innovation, user experience, and quality, I am dedicated to delivering top-notch iOS applications that resonate with your target audience and elevate your brand presence in the digital realm.&nbsp;</p>', '2024-07-10 06:24:41', '2024-07-10 06:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) NOT NULL DEFAULT 1,
  `seller_id` int(11) NOT NULL DEFAULT 1,
  `message` text DEFAULT NULL,
  `buyer_read_msg` int(11) NOT NULL DEFAULT 0,
  `seller_read_msg` int(11) NOT NULL DEFAULT 0,
  `send_by` varchar(255) DEFAULT NULL,
  `service_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `buyer_id`, `seller_id`, `message`, `buyer_read_msg`, `seller_read_msg`, `send_by`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Hello brother, How are you ? I have a laravel project.', 1, 1, 'buyer', 0, '2024-07-26 09:12:38', '2024-07-26 09:13:05'),
(2, 1, 3, 'Hello', 1, 1, 'seller', 0, '2024-07-26 09:13:12', '2024-08-29 07:58:42'),
(3, 1, 3, 'I&#039;m fine. What&#039;s about you ?', 1, 1, 'seller', 0, '2024-07-26 09:13:21', '2024-08-29 07:58:42'),
(4, 1, 3, 'Let&#039;s discuss the project', 1, 1, 'seller', 0, '2024-07-26 09:13:30', '2024-08-29 07:58:42'),
(5, 1, 3, 'Please share google meet link', 1, 0, 'buyer', 0, '2024-07-26 09:13:42', '2024-07-26 09:13:42'),
(6, 1, 7, 'Hello, I have laravel project. I need a fixing the bug. can you help me ?', 1, 0, 'buyer', 0, '2024-07-26 09:14:31', '2024-07-26 09:14:31'),
(7, 1, 7, 'Please response me', 1, 0, 'buyer', 0, '2024-07-26 09:14:42', '2024-07-26 09:14:42'),
(8, 1, 7, 'Can you share the bug sample ?', 1, 1, 'seller', 0, '2024-07-26 09:14:42', '2024-08-29 07:58:43'),
(9, 1, 7, 'Sure, Give me time please', 1, 0, 'buyer', 0, '2024-07-26 09:15:33', '2024-07-26 09:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 2),
(9, '2024_05_06_161335_create_admins_table', 3),
(10, '2024_05_06_182035_create_global_settings_table', 4),
(11, '2024_05_07_174113_create_languages_table', 5),
(12, '2024_05_07_180516_create_currencies_table', 6),
(15, '2024_05_09_045544_create_testimonials_table', 7),
(16, '2024_05_09_045555_create_testimonial_trasnlations_table', 7),
(19, '2024_05_09_080956_create_email_settings_table', 8),
(20, '2024_05_09_082850_create_email_templates_table', 9),
(21, '2024_05_09_090449_add_statu_to_users', 10),
(22, '2024_05_09_090506_add_personal_info_to_admins', 10),
(23, '2024_05_09_091106_add_avatar_to_admins', 11),
(24, '2024_05_09_100009_create_seo_settings_table', 12),
(27, '2024_05_09_110823_create_term_and_conditions_table', 13),
(28, '2024_05_09_111521_create_privacy_policies_table', 13),
(29, '2024_05_09_114012_create_faqs_table', 14),
(30, '2024_05_09_114027_create_faq_translations_table', 14),
(31, '2024_05_08_151634_create_blogs_table', 15),
(32, '2024_05_08_152208_create_blog_categories_table', 15),
(33, '2024_05_08_152741_create_blog_translations_table', 15),
(34, '2024_05_08_152807_create_blog_category_translations_table', 15),
(35, '2024_05_12_064013_create_blog_comments_table', 16),
(36, '2024_01_31_044113_create_cities_table', 17),
(37, '2024_01_31_045030_create_city_translations_table', 17),
(38, '2024_02_24_052456_create_categories_table', 17),
(39, '2024_02_24_054937_create_sub_categories_table', 17),
(40, '2024_02_24_054952_create_sub_category_translations_table', 17),
(44, '2024_05_13_053040_add_city_image_to_cities', 18),
(45, '2024_05_13_060052_create_category_translations', 19),
(46, '2024_05_13_062301_add_icon_to_categories', 20),
(47, '2024_05_13_062424_add_category_id_to_category_translation', 21),
(48, '2024_05_13_081716_create_payment_gateways_table', 22),
(53, '2024_05_13_121650_create_homepages_table', 24),
(54, '2024_05_13_122614_create_homepage_translations_table', 24),
(55, '2024_05_14_102923_add_working_des_to_homepage_translations', 25),
(56, '2024_05_14_115626_add_app_link_to_homepages', 26),
(57, '2024_01_31_090220_create_listings_table', 27),
(58, '2024_01_31_092624_create_listing_translations_table', 27),
(59, '2024_02_01_104552_create_listing_galleries_table', 27),
(60, '2024_03_20_060641_create_job_requests_table', 27),
(61, '2024_05_02_171413_create_job_posts_table', 27),
(62, '2024_05_02_171618_create_job_post_translations_table', 27),
(63, '2024_05_14_144849_add_banned_to_users', 28),
(64, '2024_05_15_163816_create_about_us_table', 29),
(65, '2024_05_15_163829_create_about_us_translations_table', 29),
(66, '2024_05_27_161629_create_listing_packages_table', 30),
(67, '2024_06_09_155059_create_newsletters_table', 31),
(68, '2024_06_15_154748_create_footers_table', 32),
(69, '2024_06_15_155130_create_footer_translations_table', 32),
(70, '2024_06_26_105119_create_orders_table', 33),
(71, '2024_06_28_122222_create_reviews_table', 34),
(72, '2024_06_28_145313_create_withdraw_methods_table', 34),
(73, '2024_06_28_161601_create_seller_withdraws_table', 34),
(74, '2024_07_02_220449_create_custom_pages_table', 35),
(75, '2024_07_02_221522_create_custom_page_translations_table', 35),
(76, '2024_07_03_121953_create_contact_messages_table', 36),
(77, '2024_07_03_125356_add_features_to_homepages', 37),
(78, '2024_07_03_125617_add_features_to_homepage_translations', 38),
(79, '2024_07_06_105541_add_home2_intro_to_homepages', 39),
(80, '2024_07_06_105607_add_home2_intro_to_homepage_translations', 39),
(81, '2024_07_06_171027_create_wishlists_table', 40),
(82, '2024_07_25_123830_create_messages_table', 41),
(83, '2024_07_25_204121_create_wallets_table', 42),
(84, '2024_07_25_204251_create_wallet_transactions_table', 42),
(85, '2024_07_28_212722_add_submit_file_to_orders', 43),
(86, '2024_07_28_215446_create_refund_requests_table', 43),
(89, '2024_08_24_165133_create_sub_categories_table', 44),
(90, '2024_08_24_165613_create_sub_category_translates_table', 44),
(91, '2024_08_25_122955_add_category_id_to_listings_table', 45),
(92, '2024_08_27_155829_create_kyc_types_table', 46),
(93, '2024_08_27_155830_create_kyc_information_table', 46),
(94, '2024_08_27_182402_add_kyc_status_to_users_table', 46),
(95, '2024_08_28_141156_add_status_columns_to_users_table', 46);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `verified_token` varchar(255) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `listing_package_id` int(11) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `package_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `additional_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `package_name` varchar(255) NOT NULL,
  `package_description` text NOT NULL,
  `delivery_date` varchar(255) NOT NULL DEFAULT '0',
  `revision` varchar(255) NOT NULL DEFAULT '0',
  `fn_website` varchar(255) NOT NULL DEFAULT 'no',
  `number_of_page` varchar(255) NOT NULL DEFAULT '0',
  `responsive` varchar(255) NOT NULL DEFAULT 'no',
  `source_code` varchar(255) NOT NULL DEFAULT 'no',
  `content_upload` varchar(255) NOT NULL DEFAULT 'no',
  `speed_optimized` varchar(255) NOT NULL DEFAULT 'no',
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `approved_by_seller` varchar(255) NOT NULL DEFAULT 'pending',
  `completed_by_buyer` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submit_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `buyer_id`, `seller_id`, `listing_id`, `listing_package_id`, `total_amount`, `package_amount`, `additional_amount`, `package_name`, `package_description`, `delivery_date`, `revision`, `fn_website`, `number_of_page`, `responsive`, `source_code`, `content_upload`, `speed_optimized`, `payment_method`, `payment_status`, `transaction_id`, `order_status`, `approved_by_seller`, `completed_by_buyer`, `created_at`, `updated_at`, `submit_file`) VALUES
(1, '1532267775', 1, 7, 2, 2, 99.00, 99.00, 0.00, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Stripe', 'success', 'txn_3PcjoYF56Pb8BOOX1O6qD8NJ', 'pending', 'pending', 'pending', '2024-07-15 07:59:19', '2024-07-15 07:59:19', NULL),
(2, '17774696', 1, 5, 3, 3, 99.00, 99.00, 0.00, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Paypal', 'success', 'ZUJKUEUDELUGE', 'cancel_by_buyer', 'pending', 'pending', '2024-07-15 07:59:51', '2024-07-30 02:15:38', NULL),
(3, '928264438', 1, 7, 10, 10, 99.00, 99.00, 0.00, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Mollie', 'success', 'tr_aB8CcdG94i', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:00:28', '2024-07-15 08:09:31', NULL),
(4, '1720558422', 1, 3, 4, 4, 99.00, 99.00, 0.00, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Stripe', 'success', 'txn_3PcjrVF56Pb8BOOX0zsOfVSe', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:02:22', '2024-07-15 08:08:54', NULL),
(5, '535722509', 1, 3, 4, 4, 99.00, 99.00, 0.00, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Mollie', 'success', 'tr_rY7HW8CoWJ', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:03:26', '2024-07-15 08:11:17', NULL),
(6, '1246543857', 1, 3, 4, 4, 30.00, 30.00, 0.00, 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Paypal', 'success', 'ZUJKUEUDELUGE', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:10:35', '2024-07-15 08:11:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'stripe_status', '1', NULL, '2024-06-26 03:47:57'),
(2, 'stripe_image', 'uploads/website-images/stripe-2024-06-26-09-11-39-8478.png', NULL, '2024-06-26 03:11:39'),
(3, 'stripe_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(4, 'stripe_key', 'pk_test_51JU61aF56Pb8BOOX5ucAe5DlDwAkCZyffqlKMDUWsAwhKbdtuY71VvIzr0NgFKjq4sOVVaaeeyVXXnNWwu5dKgeq00kMzCBUm5', NULL, '2024-06-26 03:47:57'),
(5, 'stripe_secret', 'sk_test_51JU61aF56Pb8BOOXlz7jGkzJsCkozuAoRlFJskYGsgunfaHLmcvKLubYRQLCQOuyYHq0mvjoBFLzV7d8F6q8f6Hv00CGwULEEV', NULL, '2024-06-26 03:47:57'),
(6, 'paypal_status', '1', NULL, '2024-06-27 06:52:59'),
(7, 'paypal_image', 'uploads/website-images/paypal-2024-06-26-09-12-11-9195.png', NULL, '2024-06-26 03:12:11'),
(8, 'paypal_account_mode', 'sandbox', NULL, '2024-06-27 06:52:59'),
(9, 'paypal_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(10, 'paypal_client_id', 'AWlV5x8Lhj9BRF8-TnawXtbNs-zt69mMVXME1BGJUIoDdrAYz8QIeeTBQp0sc2nIL9E529KJZys32Ipy', NULL, '2024-06-27 06:52:59'),
(11, 'paypal_secret_key', 'EEvn1J_oIC6alxb-FoF4t8buKwy4uEWHJ4_Jd_wolaSPRMzFHe6GrMrliZAtawDDuE-WKkCKpWGiz0Yn', NULL, '2024-06-27 06:52:59'),
(12, 'razorpay_status', '1', NULL, '2024-07-26 08:49:08'),
(13, 'razorpay_image', 'uploads/website-images/paypal-2024-06-26-09-12-18-5252.png', NULL, '2024-06-26 03:12:18'),
(14, 'razorpay_currency_id', '8', NULL, '2024-07-26 08:49:08'),
(15, 'razorpay_key', 'rzp_test_K7CipNQYyyMPiS', NULL, '2024-07-26 08:49:08'),
(16, 'razorpay_secret', 'zSBmNMorJrirOrnDrbOd1ALO', NULL, '2024-07-26 08:49:08'),
(17, 'razorpay_name', 'WorkZone', NULL, '2024-07-26 08:49:08'),
(18, 'razorpay_description', 'Online MarketPlace', NULL, '2024-07-26 08:49:08'),
(19, 'razorpay_theme_color', '#57c20f', NULL, '2024-07-26 08:49:08'),
(20, 'flutterwave_status', '1', NULL, '2024-06-30 08:03:34'),
(21, 'flutterwave_logo', 'uploads/website-images/paypal-2024-06-26-09-12-33-6846.png', NULL, '2024-06-26 03:12:33'),
(22, 'flutterwave_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(23, 'flutterwave_public_key', 'FLWPUBK_TEST-5760e3ff9888aa1ab5e5cd1ec3f99cb1-X', NULL, '2024-06-30 08:03:34'),
(24, 'flutterwave_secret_key', 'FLWSECK_TEST-81cb5da016d0a51f7329d4a8057e766d-X', NULL, '2024-06-30 08:03:34'),
(25, 'flutterwave_title', 'WorkZone', NULL, '2024-06-30 08:03:34'),
(26, 'mollie_status', '1', NULL, '2024-07-03 04:47:49'),
(27, 'mollie_image', 'uploads/website-images/paypal-2024-06-26-09-12-39-3044.png', NULL, '2024-06-26 03:12:39'),
(28, 'mollie_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(29, 'mollie_key', 'test_p9qgUn7Sg22xF3Q8D9heBSVEzrzM5Q', NULL, '2024-07-03 04:47:49'),
(30, 'paystack_status', '1', NULL, '2024-07-03 05:17:44'),
(31, 'paystack_image', 'uploads/website-images/paypal-2024-06-26-09-12-47-9168.png', NULL, '2024-06-26 03:12:47'),
(32, 'paystack_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(33, 'paystack_public_key', 'pk_test_057dfe5dee14eaf9c3b4573df1e3760c02c06e38', NULL, '2024-07-03 05:17:44'),
(34, 'paystack_secret_key', 'sk_test_77cb93329abbdc18104466e694c9f720a7d69c97', NULL, '2024-07-03 05:17:44'),
(35, 'instamojo_status', '1', NULL, '2024-07-03 06:04:33'),
(36, 'instamojo_image', 'uploads/website-images/paypal-2024-06-26-09-12-53-1868.png', NULL, '2024-06-26 03:12:53'),
(37, 'instamojo_account_mode', 'Sandbox', NULL, '2024-07-03 06:04:33'),
(38, 'instamojo_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(39, 'instamojo_api_key', 'test_5f4a2c9a58ef216f8a1a688910f', NULL, '2024-07-03 06:04:33'),
(40, 'instamojo_auth_token', 'test_994252ada69ce7b3d282b9941c2', NULL, '2024-07-03 06:04:33'),
(41, 'bank_status', '1', NULL, '2024-06-26 05:52:39'),
(42, 'bank_image', 'uploads/website-images/paypal-2024-06-26-09-12-59-4505.png', NULL, '2024-06-26 03:12:59'),
(43, 'bank_account_info', 'Bank Name: Your bank name\r\nAccount Number:  Your bank account number\r\nRouting Number: Your bank routing number\r\nBranch: Your bank branch name', NULL, '2024-06-26 05:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `lang_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'en', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02.Workzone of Privacy and Policy</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', NULL, '2024-07-10 08:24:22'),
(19, 'hd', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02.Freelance Terms of Service (Privacy and Policy)</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `refund_requests`
--

CREATE TABLE `refund_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) NOT NULL DEFAULT 0,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `refund_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'pending' COMMENT 'pending,rejected,approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refund_requests`
--

INSERT INTO `refund_requests` (`id`, `buyer_id`, `seller_id`, `order_id`, `note`, `refund_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, 'please refund the balance', 99.00, 'approved', '2024-07-30 02:15:52', '2024-07-30 02:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'disable',
  `review_by` varchar(255) NOT NULL DEFAULT 'buyer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_id`, `listing_id`, `buyer_id`, `seller_id`, `rating`, `review`, `status`, `review_by`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 1, 3, 4, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:09:21', '2024-07-15 08:09:50'),
(2, 3, 10, 1, 7, 3, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:09:36', '2024-07-15 08:09:44'),
(3, 6, 4, 1, 3, 3, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:11:12', '2024-07-15 08:11:49'),
(4, 5, 4, 1, 3, 5, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:11:22', '2024-07-15 08:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `seller_withdraws`
--

CREATE TABLE `seller_withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `withdraw_method_id` int(11) NOT NULL,
  `withdraw_method_name` varchar(255) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `withdraw_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `charge_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_withdraws`
--

INSERT INTO `seller_withdraws` (`id`, `seller_id`, `withdraw_method_id`, `withdraw_method_name`, `total_amount`, `withdraw_amount`, `charge_amount`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Bank Payment', 10.00, 9.95, 0.05, 'Account : 93843943\r\nIBBL Dhaka', 'approved', '2024-07-15 09:24:22', '2024-07-15 09:25:16'),
(2, 3, 1, 'Bank Payment', 10.00, 9.95, 0.05, 'Account : 93843945\r\nDBBL Dhaka', 'approved', '2024-07-15 09:24:48', '2024-07-15 09:25:01'),
(3, 3, 1, 'Bank Payment', 10.00, 9.95, 0.05, 'Branch: Your bank branch name', 'pending', '2024-09-15 03:55:24', '2024-09-15 03:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page_name`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home Page', '<p>Home Page</p>', NULL, '2024-05-09 04:12:51'),
(2, 'Blogs', 'Blogs', 'Blogs', NULL, NULL),
(3, 'About Us', 'About Us', '<p>About Us</p>', NULL, '2024-07-02 11:43:46'),
(4, 'Contact Us', 'Contact Us', '<p>Contact Us</p>', NULL, '2024-05-09 04:12:54'),
(5, 'FAQ', 'FAQ', 'FAQ', NULL, NULL),
(6, 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', NULL, NULL),
(7, 'Freelancer', 'Freelancer', 'Freelancer', NULL, NULL),
(8, 'Job Post', 'Job Post', 'Job Post', NULL, NULL),
(9, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', NULL, NULL),
(10, 'Service', 'Service', 'Service', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(11, 6, 'logo-design', 'enable', '2024-08-26 04:50:41', '2024-08-26 04:50:41'),
(12, 6, 'brand-style-guides', 'enable', '2024-08-26 04:50:54', '2024-08-26 04:50:54'),
(13, 6, 'business-cards-stationery', 'enable', '2024-08-26 04:51:06', '2024-08-26 04:51:06'),
(14, 6, 'fonts-typography', 'enable', '2024-08-26 04:51:18', '2024-08-26 04:51:18'),
(15, 6, 'illustration', 'enable', '2024-08-26 04:51:31', '2024-08-26 04:51:31'),
(16, 8, 'frontend-development', 'enable', '2024-08-26 04:53:38', '2024-08-26 04:53:38'),
(17, 8, 'backend-development', 'enable', '2024-08-26 04:53:49', '2024-08-26 04:53:49'),
(18, 8, 'fullstack-development', 'enable', '2024-08-26 04:54:01', '2024-08-26 04:54:01'),
(19, 8, 'web-mobile-design', 'enable', '2024-08-26 04:54:12', '2024-08-26 04:54:12'),
(20, 8, 'cms-development-eg-wordpress-joomla', 'enable', '2024-08-26 04:54:21', '2024-08-26 04:54:21'),
(21, 3, 'social-media-marketing', 'enable', '2024-08-26 04:54:40', '2024-08-26 04:54:40'),
(22, 3, 'seo-optimization', 'enable', '2024-08-26 04:54:52', '2024-08-26 04:54:52'),
(23, 3, 'content-marketing', 'enable', '2024-08-26 04:55:01', '2024-08-26 04:55:01'),
(24, 3, 'email-marketing', 'enable', '2024-08-26 04:55:13', '2024-08-26 04:55:13'),
(25, 3, 'paid-advertising-eg-google-ads-facebook-ads', 'enable', '2024-08-26 04:55:24', '2024-08-26 04:55:24'),
(26, 12, 'residential-design', 'enable', '2024-08-26 05:02:47', '2024-08-26 05:02:47'),
(27, 12, 'commercial-design', 'enable', '2024-08-26 05:03:04', '2024-08-26 05:03:04'),
(28, 12, 'landscape-architecture', 'enable', '2024-08-26 05:03:14', '2024-08-26 05:03:14'),
(29, 12, 'interior-design', 'enable', '2024-08-26 05:03:24', '2024-08-26 05:03:24'),
(30, 12, 'urban-planning', 'enable', '2024-08-26 05:03:34', '2024-08-26 05:03:34'),
(31, 11, 'xui-design', 'enable', '2024-08-26 05:03:53', '2024-08-26 05:03:53'),
(32, 11, 'responsive-design', 'enable', '2024-08-26 05:04:02', '2024-08-26 05:04:02'),
(33, 11, 'wordpress-design', 'enable', '2024-08-26 05:04:10', '2024-08-26 05:04:10'),
(34, 11, 'ecommerce-design', 'enable', '2024-08-26 05:04:20', '2024-08-26 05:04:20'),
(35, 11, 'landing-page-design', 'enable', '2024-08-26 05:04:29', '2024-08-26 05:04:29'),
(36, 10, 'machine-learning', 'enable', '2024-08-26 05:04:39', '2024-08-26 05:04:39'),
(37, 10, 'ai-chatbots', 'enable', '2024-08-26 05:04:48', '2024-08-26 05:04:48'),
(38, 10, 'natural-language-processing', 'enable', '2024-08-26 05:05:03', '2024-08-26 05:05:03'),
(39, 10, 'predictive-analytics', 'enable', '2024-08-26 05:05:14', '2024-08-26 05:05:14'),
(40, 10, 'computer-vision', 'enable', '2024-08-26 05:05:23', '2024-08-26 05:05:23'),
(41, 7, 'portrait-photography', 'enable', '2024-08-26 05:06:09', '2024-08-26 05:06:09'),
(42, 7, 'event-photography', 'enable', '2024-08-26 05:06:20', '2024-08-26 05:06:20'),
(43, 7, 'product-photography', 'enable', '2024-08-26 05:06:30', '2024-08-26 05:06:30'),
(44, 7, 'photo-editing', 'enable', '2024-08-26 05:06:38', '2024-08-26 05:06:38'),
(45, 7, 'stock-photography', 'enable', '2024-08-26 05:06:49', '2024-08-26 05:06:49'),
(46, 4, '2d-animation', 'enable', '2024-08-26 05:07:03', '2024-08-26 05:07:03'),
(47, 4, '3d-animation', 'enable', '2024-08-26 05:07:13', '2024-08-26 05:07:13'),
(48, 4, 'motion-graphics', 'enable', '2024-08-26 05:07:24', '2024-08-26 05:07:24'),
(49, 4, 'whiteboard-animation', 'enable', '2024-08-26 05:07:35', '2024-08-26 05:07:35'),
(50, 4, 'character-animation', 'enable', '2024-08-26 05:07:46', '2024-08-26 05:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_translates`
--

CREATE TABLE `sub_category_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category_translates`
--

INSERT INTO `sub_category_translates` (`id`, `subcategory_id`, `lang_code`, `name`, `created_at`, `updated_at`) VALUES
(13, 11, 'en', 'Logo Design', '2024-08-26 04:50:41', '2024-08-26 04:50:41'),
(14, 11, 'hd', 'Logo Design', '2024-08-26 04:50:41', '2024-08-26 04:50:41'),
(15, 12, 'en', 'Brand Style Guides', '2024-08-26 04:50:54', '2024-08-26 04:50:54'),
(16, 12, 'hd', 'Brand Style Guides', '2024-08-26 04:50:54', '2024-08-26 04:50:54'),
(17, 13, 'en', 'Business Cards & Stationery', '2024-08-26 04:51:06', '2024-08-26 04:51:06'),
(18, 13, 'hd', 'Business Cards & Stationery', '2024-08-26 04:51:06', '2024-08-26 04:51:06'),
(19, 14, 'en', 'Fonts & Typography', '2024-08-26 04:51:18', '2024-08-26 04:51:18'),
(20, 14, 'hd', 'Fonts & Typography', '2024-08-26 04:51:18', '2024-08-26 04:51:18'),
(21, 15, 'en', 'Illustration', '2024-08-26 04:51:31', '2024-08-26 04:51:31'),
(22, 15, 'hd', 'Illustration', '2024-08-26 04:51:31', '2024-08-26 04:51:31'),
(23, 16, 'en', 'Frontend Development', '2024-08-26 04:53:38', '2024-08-26 04:53:38'),
(24, 16, 'hd', 'Frontend Development', '2024-08-26 04:53:38', '2024-08-26 04:53:38'),
(25, 17, 'en', 'Backend Development', '2024-08-26 04:53:49', '2024-08-26 04:53:49'),
(26, 17, 'hd', 'Backend Development', '2024-08-26 04:53:49', '2024-08-26 04:53:49'),
(27, 18, 'en', 'Full-Stack Development', '2024-08-26 04:54:01', '2024-08-26 04:54:01'),
(28, 18, 'hd', 'Full-Stack Development', '2024-08-26 04:54:01', '2024-08-26 04:54:01'),
(29, 19, 'en', 'Web & Mobile Design', '2024-08-26 04:54:12', '2024-08-26 04:54:12'),
(30, 19, 'hd', 'Web & Mobile Design', '2024-08-26 04:54:12', '2024-08-26 04:54:12'),
(31, 20, 'en', 'CMS Development (e.g., WordPress, Joomla)', '2024-08-26 04:54:21', '2024-08-26 04:54:21'),
(32, 20, 'hd', 'CMS Development (e.g., WordPress, Joomla)', '2024-08-26 04:54:21', '2024-08-26 04:54:21'),
(33, 21, 'en', 'Social Media Marketing', '2024-08-26 04:54:40', '2024-08-26 04:54:40'),
(34, 21, 'hd', 'Social Media Marketing', '2024-08-26 04:54:40', '2024-08-26 04:54:40'),
(35, 22, 'en', 'SEO Optimization', '2024-08-26 04:54:52', '2024-08-26 04:54:52'),
(36, 22, 'hd', 'SEO Optimization', '2024-08-26 04:54:52', '2024-08-26 04:54:52'),
(37, 23, 'en', 'Content Marketing', '2024-08-26 04:55:01', '2024-08-26 04:55:01'),
(38, 23, 'hd', 'Content Marketing', '2024-08-26 04:55:01', '2024-08-26 04:55:01'),
(39, 24, 'en', 'Email Marketing', '2024-08-26 04:55:13', '2024-08-26 04:55:13'),
(40, 24, 'hd', 'Email Marketing', '2024-08-26 04:55:13', '2024-08-26 04:55:13'),
(41, 25, 'en', 'Paid Advertising (e.g., Google Ads, Facebook Ads)', '2024-08-26 04:55:24', '2024-08-26 04:55:24'),
(42, 25, 'hd', 'Paid Advertising (e.g., Google Ads, Facebook Ads)', '2024-08-26 04:55:24', '2024-08-26 04:55:24'),
(43, 26, 'en', 'Residential Design', '2024-08-26 05:02:47', '2024-08-26 05:02:47'),
(44, 26, 'hd', 'Residential Design', '2024-08-26 05:02:47', '2024-08-26 05:02:47'),
(45, 27, 'en', 'Commercial Design', '2024-08-26 05:03:04', '2024-08-26 05:03:04'),
(46, 27, 'hd', 'Commercial Design', '2024-08-26 05:03:04', '2024-08-26 05:03:04'),
(47, 28, 'en', 'Landscape Architecture', '2024-08-26 05:03:14', '2024-08-26 05:03:14'),
(48, 28, 'hd', 'Landscape Architecture', '2024-08-26 05:03:14', '2024-08-26 05:03:14'),
(49, 29, 'en', 'Interior Design', '2024-08-26 05:03:24', '2024-08-26 05:03:24'),
(50, 29, 'hd', 'Interior Design', '2024-08-26 05:03:24', '2024-08-26 05:03:24'),
(51, 30, 'en', 'Urban Planning', '2024-08-26 05:03:34', '2024-08-26 05:03:34'),
(52, 30, 'hd', 'Urban Planning', '2024-08-26 05:03:34', '2024-08-26 05:03:34'),
(53, 31, 'en', 'X/UI Design', '2024-08-26 05:03:53', '2024-08-26 05:03:53'),
(54, 31, 'hd', 'X/UI Design', '2024-08-26 05:03:53', '2024-08-26 05:03:53'),
(55, 32, 'en', 'Responsive Design', '2024-08-26 05:04:02', '2024-08-26 05:04:02'),
(56, 32, 'hd', 'Responsive Design', '2024-08-26 05:04:02', '2024-08-26 05:04:02'),
(57, 33, 'en', 'WordPress Design', '2024-08-26 05:04:10', '2024-08-26 05:04:10'),
(58, 33, 'hd', 'WordPress Design', '2024-08-26 05:04:10', '2024-08-26 05:04:10'),
(59, 34, 'en', 'eCommerce Design', '2024-08-26 05:04:20', '2024-08-26 05:04:20'),
(60, 34, 'hd', 'eCommerce Design', '2024-08-26 05:04:20', '2024-08-26 05:04:20'),
(61, 35, 'en', 'Landing Page Design', '2024-08-26 05:04:29', '2024-08-26 05:04:29'),
(62, 35, 'hd', 'Landing Page Design', '2024-08-26 05:04:29', '2024-08-26 05:04:29'),
(63, 36, 'en', 'Machine Learning', '2024-08-26 05:04:39', '2024-08-26 05:04:39'),
(64, 36, 'hd', 'Machine Learning', '2024-08-26 05:04:39', '2024-08-26 05:04:39'),
(65, 37, 'en', 'AI Chatbots', '2024-08-26 05:04:48', '2024-08-26 05:04:48'),
(66, 37, 'hd', 'AI Chatbots', '2024-08-26 05:04:48', '2024-08-26 05:04:48'),
(67, 38, 'en', 'Natural Language Processing', '2024-08-26 05:05:03', '2024-08-26 05:05:03'),
(68, 38, 'hd', 'Natural Language Processing', '2024-08-26 05:05:03', '2024-08-26 05:05:03'),
(69, 39, 'en', 'Predictive Analytics', '2024-08-26 05:05:14', '2024-08-26 05:05:14'),
(70, 39, 'hd', 'Predictive Analytics', '2024-08-26 05:05:14', '2024-08-26 05:05:14'),
(71, 40, 'en', 'Computer Vision', '2024-08-26 05:05:23', '2024-08-26 05:05:23'),
(72, 40, 'hd', 'Computer Vision', '2024-08-26 05:05:23', '2024-08-26 05:05:23'),
(73, 41, 'en', 'Portrait Photography', '2024-08-26 05:06:09', '2024-08-26 05:06:09'),
(74, 41, 'hd', 'Portrait Photography', '2024-08-26 05:06:09', '2024-08-26 05:06:09'),
(75, 42, 'en', 'Event Photography', '2024-08-26 05:06:20', '2024-08-26 05:06:20'),
(76, 42, 'hd', 'Event Photography', '2024-08-26 05:06:20', '2024-08-26 05:06:20'),
(77, 43, 'en', 'Product Photography', '2024-08-26 05:06:30', '2024-08-26 05:06:30'),
(78, 43, 'hd', 'Product Photography', '2024-08-26 05:06:30', '2024-08-26 05:06:30'),
(79, 44, 'en', 'Photo Editing', '2024-08-26 05:06:38', '2024-08-26 05:06:38'),
(80, 44, 'hd', 'Photo Editing', '2024-08-26 05:06:38', '2024-08-26 05:06:38'),
(81, 45, 'en', 'Stock Photography', '2024-08-26 05:06:49', '2024-08-26 05:06:49'),
(82, 45, 'hd', 'Stock Photography', '2024-08-26 05:06:49', '2024-08-26 05:06:49'),
(83, 46, 'en', '2D Animation', '2024-08-26 05:07:03', '2024-08-26 05:07:03'),
(84, 46, 'hd', '2D Animation', '2024-08-26 05:07:03', '2024-08-26 05:07:03'),
(85, 47, 'en', '3D Animation', '2024-08-26 05:07:13', '2024-08-26 05:07:13'),
(86, 47, 'hd', '3D Animation', '2024-08-26 05:07:13', '2024-08-26 05:07:13'),
(87, 48, 'en', 'Motion Graphics', '2024-08-26 05:07:24', '2024-08-26 05:07:24'),
(88, 48, 'hd', 'Motion Graphics', '2024-08-26 05:07:24', '2024-08-26 05:07:24'),
(89, 49, 'en', 'Whiteboard Animation', '2024-08-26 05:07:35', '2024-08-26 05:07:35'),
(90, 49, 'hd', 'Whiteboard Animation', '2024-08-26 05:07:35', '2024-08-26 05:07:35'),
(91, 50, 'en', 'Character Animation', '2024-08-26 05:07:46', '2024-08-26 05:07:46'),
(92, 50, 'hd', 'Character Animation', '2024-08-26 05:07:46', '2024-08-26 05:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `term_and_conditions`
--

CREATE TABLE `term_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_and_conditions`
--

INSERT INTO `term_and_conditions` (`id`, `lang_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'en', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02. Workzone Terms of Service</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', NULL, '2024-07-12 08:57:41'),
(19, 'hd', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02.Freelance Terms of Service (Privacy and Policy)</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `logo`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'uploads/custom-images/abdur-rohman-20240710125422.png', 'active', '2024-07-10 06:54:22', '2024-07-10 06:54:22'),
(2, NULL, 'uploads/custom-images/niloy-mazumdar-20240710125510.png', 'active', '2024-07-10 06:55:10', '2024-07-10 06:55:10'),
(3, NULL, 'uploads/custom-images/nasrun-nessa-20240710125554.png', 'active', '2024-07-10 06:55:54', '2024-07-10 06:55:54'),
(4, NULL, 'uploads/custom-images/rafiqul-shuvo-20240710125626.png', 'active', '2024-07-10 06:56:26', '2024-07-10 06:56:26'),
(5, NULL, 'uploads/custom-images/ibrahim-khalil-20240710125702.png', 'active', '2024-07-10 06:57:02', '2024-07-10 06:57:02'),
(6, NULL, 'uploads/custom-images/sheikh-hasin-20240710125822.png', 'active', '2024-07-10 06:58:22', '2024-07-10 06:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_trasnlations`
--

CREATE TABLE `testimonial_trasnlations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testimonial_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_trasnlations`
--

INSERT INTO `testimonial_trasnlations` (`id`, `testimonial_id`, `lang_code`, `name`, `designation`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Abdur Rohman', 'CEO', 'Working with Shohelon our app project expectations was an absolute pleasure. Their attention to detail, creativity, and technical expertise shone through in every aspect of the app development process. The final product exceeded our expectations and has been well-received by our expectations users. Highly recommend!  Their attention to detail', '2024-07-10 06:54:22', '2024-07-15 08:21:48'),
(2, 1, 'hd', 'Abdur Rohman', 'CEO', 'Working with [Your Name] on our app project was an absolute pleasure. Their attention to detail, creativity, and technical expertise shone through in every aspect of the app development process. The final product exceeded our expectations and has been well-received by our users. Highly recommend!', '2024-07-10 06:54:22', '2024-07-10 06:54:22'),
(3, 2, 'en', 'Niloy Mazumdar', 'Founder', 'I am thrilled with the professionalism iOS app developed by [Your Name]. Their professionalism, dedication, and ability to bring our professionalism vision to life were exceptional. The app\'s user-friendly interface and seamless developer functionality are a testament to their expertise. professionalismA truly talented developer & results.', '2024-07-10 06:55:10', '2024-07-15 08:24:04'),
(4, 2, 'hd', 'Niloy Mazumdar', 'Founder', 'I am thrilled with the iOS app developed by [Your Name]. Their professionalism, dedication, and ability to bring our vision to life were exceptional. The app\'s user-friendly interface and seamless functionality are a testament to their expertise. A truly talented developer who delivers outstanding results.', '2024-07-10 06:55:10', '2024-07-10 06:55:10'),
(5, 3, 'en', 'Nasrun Nessa', 'Chairman', 'Choosing Shohel for our app development needs was one of the best decisions we made. Their knowledge of Swift programming and UI/UX design transformed our ideas into a polished, high-quality app. The collaborative approach, clear decisions communication, and commitment to excellence decisions made the entire process smooth and successful.', '2024-07-10 06:55:54', '2024-07-10 07:01:46'),
(6, 3, 'hd', 'Nasrun Nessa', 'Chairman', 'Choosing Shohel for our app development needs was one of the best decisions we made. Their knowledge of Swift programming and UI/UX design transformed our ideas into a polished, high-quality app. The collaborative approach, clear communication, and commitment to excellence made the entire process smooth and successful.', '2024-07-10 06:55:54', '2024-07-10 06:55:54'),
(7, 4, 'en', 'Rafiqul Shuvo', 'CTO', 'Shohel is a standout iOS App Developer who goes above and beyond to deliver exceptional results. Their attention to detail, problem-solving skills, and ability to adapt to changes made the development process seamless. The app they created for us not only met but exceeded ours. Highly recommended for anyone app development services.', '2024-07-10 06:56:26', '2024-07-15 08:23:33'),
(8, 4, 'hd', 'Rafiqul Shuvo', 'CTO', 'Shohel is a standout iOS App Developer who goes above and beyond to deliver exceptional results. Their attention to detail, problem-solving skills, and ability to adapt to changes made the development process seamless. The app they created for us not only met but exceeded our expectations. Highly recommended for anyone seeking top-notch app development services.', '2024-07-10 06:56:26', '2024-07-10 06:56:26'),
(9, 5, 'en', 'Ibrahim Khalil', 'COO', 'I cannot speak highly enough of the professionalism and expertise demonstrated by Shohel throughout our app development journey. Their commitment to quality, responsiveness to feedback, and dedication to delivering a top-tier app were truly . collaborative professionalism. Thank you for your outstanding work!', '2024-07-10 06:57:02', '2024-07-15 08:22:52'),
(10, 5, 'hd', 'Ibrahim Khalil', 'COO', 'I cannot speak highly enough of the professionalism and expertise demonstrated by Shohel throughout our app development journey. Their commitment to quality, responsiveness to feedback, and dedication to delivering a top-tier app were truly commendable. Working with them was a collaborative and rewarding experience that resulted in a successful app launch. Thank you for your outstanding work!', '2024-07-10 06:57:02', '2024-07-10 06:57:02'),
(11, 6, 'en', 'Sheikh Hasin', 'PM', 'I cannot speak highly enough of the professionalism and expertise demonstrated by Shohel throughout our app development journey. Their commitment to quality, responsiveness to feedback, and dedication to delivering a top-tier app were truly commendable. Working with them was a collaborative and rewarding experience', '2024-07-10 06:58:22', '2024-07-15 08:24:21'),
(12, 6, 'hd', 'Sheikh Hasin', 'PM', 'I cannot speak highly enough of the professionalism and expertise demonstrated by Shohel throughout our app development journey. Their commitment to quality, responsiveness to feedback, and dedication to delivering a top-tier app were truly commendable. Working with them was a collaborative and rewarding experience that resulted in a successful app launch. Thank you for your outstanding work!\"', '2024-07-10 06:58:22', '2024-07-10 06:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `kyc_status` int(11) DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `hourly_payment` decimal(8,2) NOT NULL DEFAULT 0.00,
  `designation` varchar(255) DEFAULT NULL,
  `is_top_seller` varchar(255) NOT NULL DEFAULT 'disable',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'disable',
  `is_banned` varchar(255) NOT NULL DEFAULT 'no',
  `is_seller` varchar(255) NOT NULL DEFAULT '0',
  `about_me` text DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `university_location` varchar(255) DEFAULT NULL,
  `university_time_period` varchar(255) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_location` varchar(255) DEFAULT NULL,
  `school_time_period` varchar(255) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `forget_password_token` varchar(255) DEFAULT NULL,
  `feez_status` varchar(255) NOT NULL DEFAULT '0',
  `online_status` varchar(255) NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `kyc_status`, `phone`, `address`, `gender`, `image`, `hourly_payment`, `designation`, `is_top_seller`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `is_banned`, `is_seller`, `about_me`, `language`, `university_name`, `university_location`, `university_time_period`, `school_name`, `school_location`, `school_time_period`, `skills`, `verification_token`, `provider`, `provider_id`, `forget_password_token`, `feez_status`, `online_status`, `online`) VALUES
(1, 'John Doe', 'john-doe-20240710113541', 'buyer@gmail.com', 0, '125-985-4587', 'Los Angeles, CA, USA', 'Male', 'uploads/custom-images/john-doe-2024-07-10-04-01-57-4496.png', 0.00, 'Web Developer', 'disable', '2024-07-10 05:35:57', '$2y$10$hPSxen6nSk7nTL6s8hxoFe3rZXYjLmU/UfjjJWLxVo1Jig30oi0Hu', NULL, '2024-07-10 05:35:41', '2024-07-10 10:04:36', 'enable', 'no', '0', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 0),
(3, 'David Richard', 'david-richard-20240710113753', 'seller@gmail.com', 1, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/david-richard-2024-07-10-11-40-49-2937.png', 10.00, 'Laravel Developer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', 'K2agyG2bHLnVgew5zP2sfmmn3CLwpGJDCKRurWdLAx5MsM8kRfdZV4x8AidN', '2024-07-10 05:37:53', '2024-08-29 08:39:51', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '1', 1),
(4, 'David Simmonsss', 'david-simmons-20240710113753', 'seller2@gmail.com', 1, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/david-simmonsss-2024-07-10-11-42-35-3948.png', 10.00, 'Laravel Developer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-08-29 08:09:42', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '1', 0),
(5, 'Naymr Jhon', 'naymr-jhon-20240710113753', 'seller3@gmail.com', 0, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/naymr-jhon-2024-07-10-11-43-55-9474.png', 15.00, 'Graphic Designer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-07-10 05:43:55', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '0', 0),
(6, 'Madge Jordan', 'madge-jordan-20240710113753', 'seller4@gmail.com', 0, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/madge-jordan-2024-07-10-11-45-29-6149.png', 20.00, 'Graphic Designer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-07-10 05:45:29', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '0', 0),
(7, 'David Miller', 'david-miller-20240710113753', 'seller5@gmail.com', 0, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/david-miller-2024-07-10-11-47-42-9536.png', 25.00, 'Web Designer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-07-10 05:47:42', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `balance` decimal(8,2) DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `buyer_id`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 264.00, 'active', '2024-07-26 07:10:15', '2024-07-30 02:16:36'),
(2, 3, 0.00, 'active', '2024-07-30 02:40:53', '2024-07-30 02:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `amount` decimal(8,2) DEFAULT 0.00,
  `payment_gateway` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_type` varchar(255) NOT NULL DEFAULT 'credit',
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `buyer_id`, `amount`, `payment_gateway`, `transaction_id`, `payment_status`, `payment_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 20.00, 'Stripe', 'txn_3PgiKnF56Pb8BOOX1Z3Cx1F7', 'success', 'credit', NULL, 'success', '2024-07-26 07:13:04', '2024-07-26 07:13:04'),
(2, 1, 25.00, 'Paypal', 'ZUJKUEUDELUGE', 'success', 'credit', NULL, 'success', '2024-07-26 07:13:35', '2024-07-26 07:13:35'),
(3, 1, 60.00, 'Mollie', 'tr_uFXZkrJmaB', 'success', 'credit', NULL, 'success', '2024-07-26 08:46:07', '2024-07-26 08:46:07'),
(4, 1, 20.00, 'Stripe', 'txn_3PgjnHF56Pb8BOOX0UIM554V', 'success', 'credit', NULL, 'success', '2024-07-26 08:46:34', '2024-07-26 08:46:34'),
(5, 1, 20.00, 'Paypal', 'ZUJKUEUDELUGE', 'success', 'credit', NULL, 'success', '2024-07-26 08:48:21', '2024-07-26 08:48:21'),
(6, 1, 20.00, 'Razorpay', 'pay_OdCV21UF8xttCi', 'success', 'credit', NULL, 'success', '2024-07-26 08:49:37', '2024-07-26 08:49:37'),
(7, 1, 99.00, 'Refund amount', 'from_refund', 'success', 'credit', NULL, 'success', '2024-07-30 02:16:36', '2024-07-30 02:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `item_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-07-15 09:27:46', '2024-07-15 09:27:46'),
(2, 3, 1, '2024-07-15 09:27:48', '2024-07-15 09:27:48'),
(3, 5, 1, '2024-07-15 09:27:49', '2024-07-15 09:27:49'),
(4, 6, 1, '2024-07-15 09:27:51', '2024-07-15 09:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(255) NOT NULL,
  `min_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `max_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `withdraw_charge` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `method_name`, `min_amount`, `max_amount`, `withdraw_charge`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank Payment', 1.00, 10.00, 0.50, '<p>Bank Name: Your bank name<br>Account Number: &nbsp;Your bank account number<br>Routing Number: Your bank routing number<br>Branch: Your bank branch name</p>', 'enable', '2024-07-15 09:23:29', '2024-07-15 09:23:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_translations`
--
ALTER TABLE `blog_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_translations`
--
ALTER TABLE `contact_us_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_page_translations`
--
ALTER TABLE `custom_page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_translations`
--
ALTER TABLE `faq_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_translations`
--
ALTER TABLE `footer_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_settings`
--
ALTER TABLE `global_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_translations`
--
ALTER TABLE `homepage_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post_translations`
--
ALTER TABLE `job_post_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requests`
--
ALTER TABLE `job_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_information`
--
ALTER TABLE `kyc_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_types`
--
ALTER TABLE `kyc_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_galleries`
--
ALTER TABLE `listing_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_packages`
--
ALTER TABLE `listing_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_translations`
--
ALTER TABLE `listing_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_withdraws`
--
ALTER TABLE `seller_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`);

--
-- Indexes for table `sub_category_translates`
--
ALTER TABLE `sub_category_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_and_conditions`
--
ALTER TABLE `term_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_trasnlations`
--
ALTER TABLE `testimonial_trasnlations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_translations`
--
ALTER TABLE `blog_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_translations`
--
ALTER TABLE `contact_us_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_page_translations`
--
ALTER TABLE `custom_page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq_translations`
--
ALTER TABLE `faq_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_translations`
--
ALTER TABLE `footer_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `global_settings`
--
ALTER TABLE `global_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_translations`
--
ALTER TABLE `homepage_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_post_translations`
--
ALTER TABLE `job_post_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `job_requests`
--
ALTER TABLE `job_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kyc_information`
--
ALTER TABLE `kyc_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyc_types`
--
ALTER TABLE `kyc_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `listing_galleries`
--
ALTER TABLE `listing_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `listing_packages`
--
ALTER TABLE `listing_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `listing_translations`
--
ALTER TABLE `listing_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `refund_requests`
--
ALTER TABLE `refund_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_withdraws`
--
ALTER TABLE `seller_withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sub_category_translates`
--
ALTER TABLE `sub_category_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `term_and_conditions`
--
ALTER TABLE `term_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial_trasnlations`
--
ALTER TABLE `testimonial_trasnlations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
