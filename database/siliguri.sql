-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2021 at 08:19 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siliguri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_type` enum('SUPER_ADMIN','ADMIN_ACCOUNTANT','ADMIN_ATTENDANT','ADMIN_LOGISTICS') NOT NULL,
  `admin_login` datetime DEFAULT NULL,
  `admin_stat` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_type`, `admin_login`, `admin_stat`) VALUES
(1, 'Super Admin', 'admin@siliguri.city', 'a8f5f167f44f4964e6c998dee827110c', 'SUPER_ADMIN', '2020-12-26 11:51:56', 1),
(2, 'Sayantan Dev', 'sayantan@siliguri.city', '5c01125755c37db49d4d8247f01b4363', 'SUPER_ADMIN', '2021-08-28 12:59:17', 1),
(3, 'asd', 'asd@siliguri.city', 'a8f5f167f44f4964e6c998dee827110c', 'SUPER_ADMIN', '2021-08-28 11:35:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `enrolment_id` int NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_start_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('PENDING','CONFIRMED','REJECTED','COMPLETED','CANCELLED') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `customer_id`, `enrolment_id`, `appointment_date`, `appointment_start_time`, `updated_at`, `status`) VALUES
(2, 0, 21, '2020-12-17', '04:14:48', '0000-00-00 00:00:00', 'PENDING'),
(3, 6, 21, '2020-12-14', '05:35:02', '0000-00-00 00:00:00', 'PENDING'),
(4, 16, 4, '2021-01-26', '09:34:05', '0000-00-00 00:00:00', 'PENDING'),
(5, 6, 4, '2020-12-26', '17:00:00', '0000-00-00 00:00:00', 'PENDING'),
(6, 6, 4, '2020-12-25', '10:00:00', '0000-00-00 00:00:00', 'PENDING'),
(7, 17, 4, '2020-12-24', '10:00:00', '0000-00-00 00:00:00', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int NOT NULL,
  `enrol_id` int NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_regular` tinyint(1) NOT NULL,
  `selected_days` set('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `max_customers` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `enrol_id`, `start_date`, `end_date`, `start_time`, `end_time`, `is_regular`, `selected_days`, `max_customers`) VALUES
(1, 4, '2020-12-12', '2020-12-12', '10:00:00', '12:00:00', 1, 'Monday,Tuesday,Wednesday,Thursday,Friday', 2),
(2, 4, '2020-12-12', '2020-12-12', '17:00:00', '19:00:00', 1, 'Monday,Tuesday,Wednesday,Thursday,Friday', 2),
(3, 4, '2020-12-23', '2020-12-23', '08:52:00', '08:52:00', 1, 'Sunday,Monday', 10),
(4, 4, '2020-12-23', '2020-12-23', '01:05:00', '12:05:00', 1, 'Sunday,Tuesday', 10),
(5, 4, NULL, NULL, '12:27:00', '12:27:00', 0, 'Sunday,Monday', 10),
(6, 4, NULL, NULL, '12:27:00', '05:27:00', 1, 'Monday,Tuesday', 10);

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE `business_category` (
  `biscat_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `business_registry_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`biscat_id`, `cat_id`, `business_registry_id`) VALUES
(33, 464, 21),
(34, 219, 22),
(35, 464, 23),
(36, 464, 24),
(37, 27, 25),
(38, 218, 26);

-- --------------------------------------------------------

--
-- Table structure for table `business_certificate`
--

CREATE TABLE `business_certificate` (
  `bis_cer_id` int NOT NULL,
  `business_registry_id` int NOT NULL,
  `certificate_id` int NOT NULL,
  `pic` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_registry`
--

CREATE TABLE `business_registry` (
  `business_registry_id` int NOT NULL,
  `user_id` int NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `business_type` enum('PRODUCT','SERVICE','BOTH') NOT NULL,
  `business_about` text,
  `business_address` varchar(500) DEFAULT NULL,
  `business_city` varchar(100) DEFAULT NULL,
  `business_zip` varchar(8) DEFAULT NULL,
  `business_gmap` varchar(100) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `coverr` varchar(255) DEFAULT NULL,
  `business_contact_person` varchar(100) DEFAULT NULL,
  `business_phone` varchar(100) DEFAULT NULL,
  `business_email` varchar(100) DEFAULT NULL,
  `business_stat` tinyint NOT NULL,
  `premium` tinyint NOT NULL COMMENT 'premium=1, tieup=2',
  `business_open` int NOT NULL DEFAULT '0',
  `offer_available` int NOT NULL DEFAULT '0',
  `approved` tinyint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_registry`
--

INSERT INTO `business_registry` (`business_registry_id`, `user_id`, `business_name`, `business_type`, `business_about`, `business_address`, `business_city`, `business_zip`, `business_gmap`, `logo`, `coverr`, `business_contact_person`, `business_phone`, `business_email`, `business_stat`, `premium`, `business_open`, `offer_available`, `approved`) VALUES
(21, 7, 'Sayantan Diagnostic Center', 'SERVICE', 'the best diagnostic center in the world', 'Arabindapally', 'Siliguri', '734006', '', 'clinic.png', NULL, '', '9051311471', '', 1, 0, 0, 0, 1),
(22, 10, 'test', 'BOTH', '', '', 'Siliguri', '', '', NULL, NULL, '', '123456', '', 0, 0, 0, 0, 0),
(23, 13, 'abcd', 'SERVICE', 'clinic', 'Siliguri', 'Siliguri', '734001', '', 'entreprenuer.png', NULL, 'abcd', '9876543210', 'suvam800@gmail.com', 0, 0, 0, 0, 0),
(24, 17, 'Small Clinic', 'SERVICE', 'this is about my business', 'Dabgram', 'Siliguri', '734006', '', '4.jpg', NULL, '', '9876598635', '', 1, 0, 0, 0, 1),
(25, 14, 'paromita testing', 'PRODUCT', '', '', 'Siliguri', '', '', NULL, NULL, '', '', '', 1, 0, 0, 0, 1),
(26, 6, 'flaaaa', 'BOTH', 'rtrftg', 'fgjhfgh', 'Siliguri', '734006', '', 'Flaamant_72.jpg', NULL, '', '546465654', '', 0, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_sociallink`
--

CREATE TABLE `business_sociallink` (
  `business_social_id` int NOT NULL,
  `business_registry_id` int NOT NULL,
  `link_type` int NOT NULL COMMENT ' web=1, fb=2, insta=3, lkdn=4, ttr=5, pint=6 ',
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_timing`
--

CREATE TABLE `business_timing` (
  `bisTiming_id` int NOT NULL,
  `business_registry_id` int NOT NULL,
  `day` enum('Sunday','Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_timing`
--

INSERT INTO `business_timing` (`bisTiming_id`, `business_registry_id`, `day`, `start_time`, `end_time`, `status`) VALUES
(1, 26, 'Sunday', NULL, NULL, 1),
(2, 26, 'Monday', NULL, NULL, 1),
(3, 26, 'Tuesday', NULL, NULL, 1),
(4, 26, 'Wednesday', NULL, NULL, 0),
(5, 26, 'Thrusday', NULL, NULL, 0),
(6, 26, 'Friday', NULL, NULL, 0),
(7, 26, 'Saturday', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `sub_cat_id` int NOT NULL,
  `keywords` text,
  `cat_stat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `sub_cat_id`, `keywords`, `cat_stat`) VALUES
(3, 'Automobile', 0, NULL, 0),
(7, 'Flat 1', 1, NULL, 1),
(10, 'Flat 2', 1, NULL, 1),
(12, 'New Cars', 3, NULL, 1),
(13, 'New Two Wheelers', 3, NULL, 1),
(14, 'Used Cars', 3, NULL, 1),
(15, 'Properties', 0, NULL, 1),
(16, 'For Sale: Houses & Apartments', 15, NULL, 1),
(18, 'For Rent: Houses & Apartments', 15, NULL, 1),
(19, 'Restaurants', 0, NULL, 1),
(20, 'Indian Flavours', 19, NULL, 1),
(21, 'Global Cuisines', 19, NULL, 1),
(22, 'Nightlife', 19, NULL, 1),
(23, 'Fast Foods', 19, NULL, 1),
(25, 'Dessert', 19, NULL, 1),
(26, 'Daily Needs', 0, NULL, 1),
(27, 'Grocery', 26, NULL, 1),
(28, 'Chemists', 26, NULL, 1),
(29, 'Bakery', 26, NULL, 1),
(30, 'Dairy Products', 26, NULL, 1),
(31, 'Vegetable', 26, NULL, 1),
(213, 'Lands & Plots', 15, NULL, 1),
(214, 'For Rent: Shops & Offices', 15, NULL, 1),
(215, 'For Sale: Shops & Offices', 15, NULL, 1),
(216, 'PG & Guest Houses', 15, NULL, 1),
(217, 'Used Two Wheelers', 3, NULL, 1),
(218, 'Car Insurance', 3, NULL, 1),
(219, 'Car Loans', 3, NULL, 1),
(220, 'Car Services', 3, NULL, 1),
(221, 'Two Wheeler Insurance', 3, NULL, 1),
(222, 'Two Wheeler Loans', 3, NULL, 1),
(223, 'Two Wheeler Services', 3, NULL, 1),
(224, 'Loans', 0, NULL, 1),
(225, 'Home Loans', 224, NULL, 1),
(226, 'Credit Cards', 224, NULL, 1),
(227, 'Personal Loans', 224, NULL, 1),
(228, 'Car Loans', 224, NULL, 1),
(229, 'Business Loans', 224, NULL, 1),
(230, 'Educational Loans', 224, NULL, 1),
(231, 'Loan Against Gold', 224, NULL, 1),
(232, 'Mortgage Loans', 224, NULL, 1),
(233, 'Two Wheeler Loans', 224, NULL, 1),
(234, 'Driving Schools', 3, NULL, 1),
(235, 'Home Services', 0, NULL, 1),
(236, 'Carpenters', 235, NULL, 1),
(237, 'Carpet Cleaners', 235, NULL, 1),
(238, 'Driver Service', 235, NULL, 1),
(239, 'Duplicate Key Makers', 235, NULL, 1),
(240, 'Electricians', 235, NULL, 1),
(241, 'Painters', 235, NULL, 1),
(242, 'Pest Control', 235, NULL, 1),
(243, 'Plumbers', 235, NULL, 1),
(244, 'Towing Services', 235, NULL, 1),
(245, 'Electric Chimney', 235, NULL, 1),
(246, 'Fire Fighting Contractors', 235, NULL, 1),
(247, 'Flooring Contractors', 235, NULL, 1),
(248, 'Civil Contractors', 235, NULL, 1),
(249, 'Gardening Tools Services', 235, NULL, 1),
(250, 'House Keeping Cleaning', 235, NULL, 1),
(251, 'Interior Designers Architecture', 235, NULL, 1),
(252, 'Interior Decorators', 235, NULL, 1),
(253, 'Internet Service Providers', 235, NULL, 1),
(254, 'Architects', 235, NULL, 1),
(255, 'Packaging Labelling', 235, NULL, 1),
(256, 'Painting Contractors', 235, NULL, 1),
(257, 'Roofing Contractors', 235, NULL, 1),
(258, 'Security Equipment Services', 235, NULL, 1),
(259, 'DTH', 235, NULL, 1),
(260, 'Water Proofing Contractors', 235, NULL, 1),
(261, 'Travel', 0, NULL, 1),
(262, 'Flights', 261, NULL, 1),
(263, 'Bus', 261, NULL, 1),
(264, 'Trains', 261, NULL, 1),
(265, 'Car Rentals', 261, NULL, 1),
(266, 'Tempo Travellers', 261, NULL, 1),
(267, 'Hotels', 261, NULL, 1),
(268, 'Home Stays', 261, NULL, 1),
(269, 'Forex', 261, NULL, 1),
(270, 'Visa', 261, NULL, 1),
(271, 'Travel Agents', 261, NULL, 1),
(272, 'Personal Care', 0, NULL, 1),
(273, 'Beauty Parlours', 272, NULL, 1),
(274, 'Beauty Services', 272, NULL, 1),
(275, 'Bridal Makeup', 272, NULL, 1),
(276, 'Bridegroom Makeup', 272, NULL, 1),
(277, 'Salons', 272, NULL, 1),
(278, 'Spas', 272, NULL, 1),
(279, 'Wedding', 0, NULL, 1),
(280, 'Men\'s Care', 273, NULL, 1),
(281, 'Banquet Halls', 279, NULL, 1),
(282, 'Bridal Requisites', 279, NULL, 1),
(283, 'Florists', 279, NULL, 1),
(284, 'Vegetables & Fruits', 279, NULL, 1),
(285, 'Jewellery', 279, NULL, 1),
(286, 'Matrimonial Bureaus', 279, NULL, 1),
(287, ' Photographers', 279, NULL, 1),
(289, 'Jobs', 0, NULL, 1),
(290, 'Repairs', 0, NULL, 1),
(291, 'AC', 290, NULL, 1),
(292, 'Air Cooler', 290, NULL, 1),
(293, 'CCTV Camera', 290, NULL, 1),
(294, 'Camera', 290, NULL, 1),
(295, 'Car', 290, NULL, 1),
(296, 'Car AC', 290, NULL, 1),
(297, 'Computer', 290, NULL, 1),
(298, 'Computer Printer', 290, NULL, 1),
(299, 'DVD Player', 290, NULL, 1),
(300, 'Electric Chimney', 290, NULL, 1),
(301, 'Elevator', 290, NULL, 1),
(302, 'Gas Stove', 290, NULL, 1),
(303, 'Generator', 290, NULL, 1),
(304, 'Geyser', 290, NULL, 1),
(305, 'Home Theatre', 290, NULL, 1),
(306, 'Inverter', 290, NULL, 1),
(307, 'Laptop', 290, NULL, 1),
(308, 'Microwave Oven', 290, NULL, 1),
(309, 'Mobile Phone', 290, NULL, 1),
(310, 'Motorcycle', 290, NULL, 1),
(311, 'Projector', 290, NULL, 1),
(312, 'Refrigerator', 290, NULL, 1),
(313, 'Ro Water Purifier', 290, NULL, 1),
(314, 'Scooter', 290, NULL, 1),
(315, 'Sewing Machine', 290, NULL, 1),
(316, 'Sofa Set', 290, NULL, 1),
(317, 'TV', 290, NULL, 1),
(318, 'Tablet', 290, NULL, 1),
(319, 'Treadmill', 290, NULL, 1),
(320, 'UPS', 290, NULL, 1),
(321, 'Washing Machine', 290, NULL, 1),
(322, 'Water Purifier', 290, NULL, 1),
(323, 'Wrist Watch', 290, NULL, 1),
(324, 'Doctors', 0, NULL, 1),
(326, 'Bone & Joints', 324, NULL, 1),
(327, 'Cardiologists', 324, NULL, 1),
(328, 'Chest Specialists', 324, NULL, 1),
(329, 'Child Specialist', 324, NULL, 1),
(330, 'Cosmetic Surgeons', 324, NULL, 1),
(331, 'Dentists', 324, NULL, 1),
(332, 'Dermatologists', 324, NULL, 1),
(333, 'Diabetologists', 324, NULL, 1),
(334, 'Dietitians', 324, NULL, 1),
(335, 'ENT Specialists', 324, NULL, 1),
(336, 'Eye Specialists', 324, NULL, 1),
(337, 'Gastroenterologists', 324, NULL, 1),
(338, 'General Physicians', 324, NULL, 1),
(339, 'Gynaecologists & Obstetricians', 324, NULL, 1),
(340, 'Homeopathic Doctors', 324, NULL, 1),
(341, 'Neonatologists', 324, NULL, 1),
(342, 'Neurologists', 324, NULL, 1),
(343, 'Neurosurgeons', 324, NULL, 1),
(344, 'On Call Doctors', 324, NULL, 1),
(345, 'Oncologists', 324, NULL, 1),
(346, 'Ophthalmologists', 324, NULL, 1),
(347, 'Orthopaedic', 324, NULL, 1),
(348, 'Paediatricians', 324, NULL, 1),
(349, 'Physiotherapists', 324, NULL, 1),
(351, 'Piles', 324, NULL, 1),
(352, 'Psychologists', 324, NULL, 1),
(353, 'Sexologists', 324, NULL, 1),
(354, 'Skin & Hair', 324, NULL, 1),
(356, 'Speech Therapists', 324, NULL, 1),
(357, 'Thyroid Doctors', 324, NULL, 1),
(358, 'Trichologists', 324, NULL, 1),
(359, 'Unani', 324, NULL, 1),
(360, 'Urologists', 324, NULL, 1),
(361, 'Veterinary', 324, NULL, 1),
(362, 'Psychiatrists', 324, NULL, 1),
(363, 'Data entry & Back office', 289, NULL, 1),
(364, 'Sales & Marketing', 289, NULL, 1),
(365, 'BPO & Telecaller', 289, NULL, 1),
(366, 'Driver', 289, NULL, 1),
(367, 'Office Assistant', 289, NULL, 1),
(368, 'Delivery & Collection', 289, NULL, 1),
(369, 'Teacher', 289, NULL, 1),
(370, 'Cook', 289, NULL, 1),
(371, 'Receptionist & Front office', 289, NULL, 1),
(372, 'Operator & Technician', 289, NULL, 1),
(373, 'IT Engineer & Developer', 289, NULL, 1),
(374, 'Hotel & Travel Executive', 289, NULL, 1),
(375, 'Accountant', 289, NULL, 1),
(376, 'Designer', 289, NULL, 1),
(377, 'Other Jobs', 289, NULL, 1),
(379, 'Second Hand Product', 0, NULL, 1),
(380, 'Electronics & Appliances', 379, NULL, 1),
(384, 'TVs, Video - Audio', 380, NULL, 1),
(385, 'Kitchen & Other Appliances', 380, NULL, 1),
(386, 'Computers & Laptops', 380, NULL, 1),
(387, 'Cameras & Lenses', 380, NULL, 1),
(388, 'Games & Entertainment', 380, NULL, 1),
(389, 'Fridges', 380, NULL, 1),
(390, 'Computer Accessories', 380, NULL, 1),
(391, 'Hard Disks, Printers & Monitors', 380, NULL, 1),
(392, 'ACs', 380, NULL, 1),
(393, 'Washing Machines', 380, NULL, 1),
(394, 'Mobile Phones', 380, NULL, 1),
(396, 'Lawyers', 0, NULL, 1),
(397, 'Civil Lawyers', 396, NULL, 1),
(398, 'Lawyers For Criminal', 396, NULL, 1),
(399, 'Lawyers For Divorce Case', 396, NULL, 1),
(400, 'Lawyers For Property Case', 396, NULL, 1),
(401, 'Labour Law Lawyers', 396, NULL, 1),
(402, 'Lawyers For Debt Recovery Tribunal', 396, NULL, 1),
(403, 'Lawyers For Society Registration', 396, NULL, 1),
(404, 'Family Case Lawyers', 396, NULL, 1),
(405, 'Lawyers For High Court', 396, NULL, 1),
(406, 'Lawyers For Legal Advisor', 396, NULL, 1),
(407, 'Lawyers For Consumer Court', 396, NULL, 1),
(408, 'Lawyers For Documentation', 396, NULL, 1),
(409, 'Lawyers For Notary', 396, NULL, 1),
(410, 'Lawyers For Human Rights', 396, NULL, 1),
(411, 'GST Lawyers', 396, NULL, 1),
(412, 'Lawyers For Income Tax', 396, NULL, 1),
(413, 'Lawyers For Anti Corruption', 396, NULL, 1),
(414, 'Lawyers For Aviation', 396, NULL, 1),
(415, 'Lawyers For Industrial Design', 396, NULL, 1),
(416, 'Lawyers For Intestacy', 396, NULL, 1),
(417, 'Lawyers For Wealth Tax', 396, NULL, 1),
(418, 'Lawyers For Trademark Litigation', 396, NULL, 1),
(419, 'Lawyers For Deemed Conveyance', 396, NULL, 1),
(420, 'Supreme Court Lawyers For Criminal Cases', 396, NULL, 1),
(421, 'Lawyers For Guardianship', 396, NULL, 1),
(422, 'Emergency', 0, NULL, 1),
(423, '24 Hours Chemists', 422, NULL, 1),
(424, 'Ambulance Service', 422, NULL, 1),
(425, 'Blood Banks', 422, NULL, 1),
(426, 'Cardiologists', 422, NULL, 1),
(427, 'Duplicate Key Stores', 422, NULL, 1),
(428, 'Fire Brigade', 422, NULL, 1),
(429, 'Hospitals', 422, NULL, 1),
(430, 'Police', 422, NULL, 1),
(431, 'Towing Services', 422, NULL, 1),
(432, 'Fitness', 0, NULL, 1),
(433, 'Dietitians', 432, NULL, 1),
(434, 'Fitness Classes', 432, NULL, 1),
(435, 'Gym', 432, NULL, 1),
(436, 'Health Equipments', 432, NULL, 1),
(437, 'Health Food & Supplements', 432, NULL, 1),
(438, 'Meditation & Relaxation', 432, NULL, 1),
(439, 'Sport Clubs', 432, NULL, 1),
(440, 'Weight Reduction', 432, NULL, 1),
(441, 'Yoga Classes', 432, NULL, 1),
(442, 'Used Cars', 379, NULL, 1),
(443, 'Tablets', 380, NULL, 1),
(444, 'Used Two Wheelers', 379, NULL, 1),
(445, 'Caterers', 0, NULL, 1),
(446, 'All Caterers', 445, NULL, 1),
(447, 'Birthday Party Caterers', 445, NULL, 1),
(448, 'Party Caterers', 445, NULL, 1),
(449, 'Wedding Caterers', 445, NULL, 1),
(450, 'Office Caterers', 445, NULL, 1),
(451, 'Courier Services', 0, NULL, 1),
(452, 'All Courier Services', 451, NULL, 1),
(453, 'International', 451, NULL, 1),
(454, 'Local', 451, NULL, 1),
(455, 'National', 451, NULL, 1),
(457, 'Bulk Courier', 451, NULL, 1),
(458, 'Packers And Movers', 0, NULL, 1),
(459, 'Packers & Movers (All India)', 458, NULL, 1),
(460, 'Packers & Movers (Within City)', 458, NULL, 1),
(461, 'Packers & Movers (Outside India)', 458, NULL, 1),
(463, 'Clinics', 0, NULL, 1),
(464, 'Diagnostic Centre', 463, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `certificate_id` int NOT NULL,
  `certificate_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`certificate_id`, `certificate_name`) VALUES
(1, 'Address'),
(2, 'ID'),
(3, 'Registration'),
(4, 'GST'),
(5, 'PAN');

-- --------------------------------------------------------

--
-- Table structure for table `customer_care`
--

CREATE TABLE `customer_care` (
  `care_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_care`
--

INSERT INTO `customer_care` (`care_id`, `name`, `phone`, `priority`) VALUES
(1, 'Sayantan Dev', '9051311471', 1),
(2, 'Sandipan Tar', '9641666523', 1),
(3, 'Suvam Kundu', '8759920097', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dealings_with`
--

CREATE TABLE `dealings_with` (
  `deals_id` int NOT NULL,
  `business_registry_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `deal_type` varchar(10) NOT NULL COMMENT 'product, service',
  `deals_name` varchar(100) NOT NULL,
  `deals_descrption` mediumtext NOT NULL,
  `deals_price` varchar(100) NOT NULL,
  `deals_pic` varchar(600) DEFAULT NULL,
  `deals_waranty_support` varchar(100) NOT NULL,
  `deals_keyword` varchar(1000) NOT NULL,
  `deals_stat` tinyint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealings_with`
--

INSERT INTO `dealings_with` (`deals_id`, `business_registry_id`, `cat_id`, `deal_type`, `deals_name`, `deals_descrption`, `deals_price`, `deals_pic`, `deals_waranty_support`, `deals_keyword`, `deals_stat`) VALUES
(1, 25, 27, 'kjb', 'any', 'thing', '200', NULL, 'gcjy', 'vlfhgv', 1),
(2, 25, 27, 'product', 'rice', 'nndsvkb cgn', '100', NULL, 'cgfcbv', 'bxd gfbxds', 1),
(3, 26, 354, 'product', 'new', 'sdcvsdvsd', '130', '', '', 'fwefwf', 1),
(4, 26, 359, 'product', 'another', 'xcvbxcb', '900', '', '', 'ffuui yuy ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deals_portfolio`
--

CREATE TABLE `deals_portfolio` (
  `deals_portfolio_id` int NOT NULL,
  `deals_id` int NOT NULL,
  `deals_portfolio_name` varchar(100) NOT NULL,
  `deals_portfolio_logo` varchar(100) NOT NULL,
  `deals_portfolio_link` varchar(100) NOT NULL,
  `deals_portfolio_stat` tinyint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deals_rating_review`
--

CREATE TABLE `deals_rating_review` (
  `deals_rr_id` int NOT NULL,
  `deals_id` int NOT NULL,
  `reviewer_id` int NOT NULL,
  `rating` tinyint DEFAULT NULL,
  `review` varchar(800) DEFAULT NULL,
  `deals_pic_review` varchar(300) DEFAULT NULL,
  `deals_rating_review_stat` tinyint NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--

CREATE TABLE `enrolment` (
  `enrol_id` int NOT NULL,
  `user_id` int NOT NULL,
  `business_registry_id` int NOT NULL,
  `id_default` tinyint(1) NOT NULL,
  `role` enum('ACCOUNTANT','HELP DESK','DOCTOR','TEACHER','MANAGER') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('VERIFICATION_PENDING','ACTIVE','INACTIVE','DELETED') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`enrol_id`, `user_id`, `business_registry_id`, `id_default`, `role`, `status`) VALUES
(1, 8, 21, 0, 'TEACHER', 'ACTIVE'),
(2, 9, 21, 1, 'HELP DESK', 'ACTIVE'),
(4, 7, 21, 1, 'DOCTOR', 'ACTIVE'),
(5, 10, 21, 1, 'HELP DESK', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `feed_id` int NOT NULL,
  `business_registry_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_post`
--

CREATE TABLE `offer_post` (
  `offer_id` int NOT NULL,
  `offer_name` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `offer_details` varchar(200) NOT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `offer_img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offer_post`
--

INSERT INTO `offer_post` (`offer_id`, `offer_name`, `product_id`, `start_date`, `end_date`, `offer_details`, `coupon_code`, `link`, `offer_img`) VALUES
(1, 'rrrrrrrrrrr', 3, '2021-05-03 00:00:00', '2021-05-26 00:00:00', 'fghfghfg', 'fghfgh', 'fghfgh', NULL),
(2, '', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', NULL),
(3, 'qqqqqqqqqqqqq', 3, '2021-05-03 00:00:00', '2021-05-25 00:00:00', 'dddddddddddd', 'sdfsadf', 'sdfsdfsd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_family_history`
--

CREATE TABLE `patient_family_history` (
  `patient_family_history_id` int NOT NULL,
  `screening_id` int NOT NULL,
  `disease` enum('cardio_vascular_disease','hypertension_bp','diabetes','thalassemia','alzheimers_disease','arthritis','cancer','dementia','multiple_sclerosis','parkinsons_disease','thyroid_disorders','spinal_cord','asthma','anemia','congenital_deafness','obesity','chromosomal_genetic_disorder','epilepsy','osteoporosis','eye_problems') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_has` tinyint(1) NOT NULL,
  `mother_has` tinyint(1) NOT NULL,
  `other_has` tinyint(1) NOT NULL,
  `risk_factor_score` int NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_follow_up`
--

CREATE TABLE `patient_follow_up` (
  `patient_follow_up_id` int NOT NULL,
  `screening_id` int NOT NULL,
  `appointment_id` int NOT NULL,
  `height_in_cm` float NOT NULL,
  `weight_in_kg` float NOT NULL,
  `bmi` float NOT NULL,
  `blood_pressure` int NOT NULL COMMENT '(mm Hg)',
  `random_blood_sugar_level` int NOT NULL COMMENT '(mg /dl)',
  `fasting_blood_sugar` int NOT NULL,
  `postprandial_blood_sugar` int NOT NULL,
  `temparature` float NOT NULL,
  `patient_status` enum('+3','+2','+1','0','-1','-2','-3','-4') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prescribed_medicine` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `repetition` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prescribing_symptoms` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `life_style` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visit_no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_follow_up_medicine`
--

CREATE TABLE `patient_follow_up_medicine` (
  `id` int NOT NULL,
  `medicine` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `repetition` enum('OD','BD','TDS','QDS','HS','AC','PC') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `days` int NOT NULL,
  `follow_up_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_other_problem`
--

CREATE TABLE `patient_other_problem` (
  `patient_other_problem_id` int NOT NULL,
  `screening_id` int NOT NULL,
  `title` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medicine` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `operation` tinyint(1) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_report`
--

CREATE TABLE `patient_report` (
  `report_id` int NOT NULL,
  `patient_follow_up_id` int NOT NULL,
  `medical_test_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medical_test_report_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `test_result` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_screening`
--

CREATE TABLE `patient_screening` (
  `screening_id` int NOT NULL,
  `user_id` int NOT NULL,
  `appointment_id` int NOT NULL,
  `height_in_cm` float NOT NULL,
  `weight_in_kg` float NOT NULL,
  `bmi` float NOT NULL,
  `waist_circumference_cm` float NOT NULL,
  `hip_circumference_cm` float NOT NULL,
  `waist_hip_ratio` float NOT NULL,
  `body_built` enum('stocky','lean','normal','obese') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `respiratory_per_min` int NOT NULL,
  `blood_pressure` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `random_blood_sugar` int NOT NULL,
  `pulse_rate` int NOT NULL,
  `habits_tobacco` tinyint(1) NOT NULL,
  `habits_alcohol` tinyint(1) NOT NULL,
  `habits_exposure_to_pollution` tinyint(1) NOT NULL,
  `risk_factor_age` enum('< 35 years','35 to 39 years','≥50 years') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `risk_factor_abdominal_obesity` enum('Waist circumference females <80cm & males < 90cm','Female 80-89cm','Male 90-99cm','Female ≥90cm','Male ≥100cm') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `risk_factor_physical_activity` enum('Vigorous exercise or strenuous at work','Moderate exercise at work/home','Mild exercise at work/home','No exercise and sedentary at work/home') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `risk_factor_score` float NOT NULL,
  `chief_complaints` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diagnosis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medicine_asper_diagnosis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professional_info`
--

CREATE TABLE `professional_info` (
  `professional_id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_type` enum('DOCTOR','TEACHER') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doc_cat` int NOT NULL,
  `experience` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `license_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `license_doc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `service` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `specialization` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `award` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `education` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `membership` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `registration` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `like_profile` int DEFAULT '0',
  `verified` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professional_info`
--

INSERT INTO `professional_info` (`professional_id`, `user_id`, `user_type`, `doc_cat`, `experience`, `license_no`, `license_doc`, `about`, `service`, `specialization`, `award`, `education`, `membership`, `registration`, `like_profile`, `verified`) VALUES
(1, 7, 'DOCTOR', 347, NULL, 'Dr Sayantan', 'logo2.png', 'dfgj  ddddg dfghdfgh', NULL, NULL, 'gfjh', 'sfsdf sd fsd s s sdf gds', 'dff  d hfgfg', '67i 6jtyg hnghj 56', 24, NULL),
(2, 17, 'DOCTOR', 327, 'qweqweqweqweqwe', '35797we34rf5', 'admin1.jpg', 'i am a disco doctor', '', NULL, 'yuiioiiuytyu', '', '', NULL, 6, NULL),
(3, 13, 'DOCTOR', 326, '5 Years', '123456789', 'entreprenuer.png', 'bones care', 'best bones service', NULL, 'Grandred Technology', 'abcd', '', NULL, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professional_rating_review`
--

CREATE TABLE `professional_rating_review` (
  `pro_rr_id` int NOT NULL,
  `professional_id` int NOT NULL,
  `reviewer_id` int NOT NULL,
  `rating` int NOT NULL,
  `review` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pro_pic_review` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_rating_review_stat` tinyint NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `q_id` int NOT NULL,
  `u_id` int DEFAULT NULL,
  `phn_ip` varchar(100) NOT NULL,
  `query` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply_seller_review`
--

CREATE TABLE `reply_seller_review` (
  `reviewReply_id` int NOT NULL,
  `review_id` int NOT NULL,
  `reply` varchar(50) NOT NULL,
  `reply_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_rating_review`
--

CREATE TABLE `seller_rating_review` (
  `review_id` int NOT NULL,
  `business_registry_id` int NOT NULL,
  `reviewer_id` int NOT NULL,
  `rating` int DEFAULT NULL,
  `review` varchar(800) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_review_stat` tinyint NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seller_rating_review`
--

INSERT INTO `seller_rating_review` (`review_id`, `business_registry_id`, `reviewer_id`, `rating`, `review`, `seller_review_stat`, `date`) VALUES
(5, 26, 16, 5, 'THIS REVIEW IS FOR TESTING.56131', 0, '2021-04-20 13:14:41'),
(27, 26, 12, 5, 'testing for replied part', 0, '2021-04-24 23:15:38'),
(28, 26, 12, 3, 'testing for not-replied part', 0, '2021-04-24 23:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_type` enum('DOCTOR','PATIENT') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `device_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `device_type` enum('Web','iOS','Android') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expired_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `user_type`, `token`, `device_id`, `device_type`, `expired_time`) VALUES
(8, 17, 'DOCTOR', '1226519775', '7415ddbb-d638-4212-9975-8877dad28021', 'Web', '2020-12-27 11:27:49'),
(9, 7, 'DOCTOR', '2312890933', '63dc78d4-ef2e-405c-b267-3bc027843998', 'Web', '2021-08-29 11:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `stored_ip`
--

CREATE TABLE `stored_ip` (
  `ip_id` int NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stored_ip`
--

INSERT INTO `stored_ip` (`ip_id`, `ip_address`) VALUES
(1, '117.201.124.119'),
(2, '117.201.122.238');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `login_oauth_uid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_provider` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `pincode` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('MALE','FEMALE','OTHER') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int NOT NULL,
  `locale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `premium` tinyint DEFAULT NULL,
  `user_stat` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `login_oauth_uid`, `oauth_provider`, `first_name`, `last_name`, `address`, `pincode`, `dob`, `phone`, `email`, `gender`, `age`, `locale`, `profile_picture`, `occupation`, `education`, `link`, `user_type`, `premium`, `user_stat`, `created_at`, `updated_at`) VALUES
(6, '103963152412574816099', 'google', 'Flaamant.', 'Com', 'ard', '734006', NULL, NULL, 'flaamant@gmail.com', NULL, 0, 'en', 'https://lh3.googleusercontent.com/a-/AOh14GjMXrDUtzYIWyvyEnYaydG-3ELar_KqjkqJv-HQ=s96-c', 'bekar', 'masters', '', 'Saler', 0, 1, '2020-11-30 11:29:49', '2021-06-29 18:15:35'),
(7, '117452866349921997835', 'google', 'Sayantan', 'Dev', 'Arabindapally', '734006', NULL, NULL, 'a.sayantan.dev@gmail.com', NULL, 0, 'en-GB', 'https://lh3.googleusercontent.com/a-/AOh14GjKZbhwfzeQuBRpMvuDw0Ek_961RMupUx0x0EQ9nA=s96-c', 'Bekar', 'phd', '', 'Saler', 0, 1, '2020-11-30 12:38:18', '2021-08-28 11:35:25'),
(8, '115970269548751276130', 'google', 'Grandred', 'Technology', NULL, NULL, NULL, NULL, 'grandredtechnology@gmail.com', NULL, 0, 'en-GB', 'https://lh3.googleusercontent.com/a-/AOh14GjFX7QiHlYVNCHUOIlOEo0e8SkiSwEaJFvHEMY8tA=s96-c', NULL, NULL, '', 'User', 0, 1, '2020-12-02 13:40:56', '2020-12-07 21:52:58'),
(9, '100195089898209695784', 'google', 'Suvam', 'Kundu', NULL, NULL, NULL, NULL, 'suvam800@gmail.com', NULL, 0, 'en', 'https://lh3.googleusercontent.com/a-/AOh14Gi4e-ryepzZ3siDfol_WWnyXBCYUp6tST9-RPte7w=s96-c', NULL, NULL, '', 'User', 0, 1, '2020-12-03 17:40:54', '2020-12-09 12:16:33'),
(10, '102361054773132800221', 'google', 'Sandipan', 'Tar', 's', '734006', NULL, NULL, 'sandipantar@gmail.com', NULL, 0, 'en', 'https://lh3.googleusercontent.com/a-/AOh14GgR0GhxNycdlgnj9c9jQ-qqItR4mI6rGpX1LVigqw=s96-c', '', '', NULL, 'Saler', 0, 1, '2020-12-05 19:15:20', '2020-12-17 13:20:41'),
(11, '100593736844563097094', 'google', 'Prasenjit', 'Saha', NULL, NULL, NULL, NULL, 'dev.prasenjitsaha@gmail.com', NULL, 0, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GjBbpcNlYKoK07kfNnkDfuqRwZDF93Op2Y6SBrl=s96-c', NULL, NULL, NULL, 'User', NULL, 1, '2020-12-14 15:48:24', '0000-00-00 00:00:00'),
(12, '108613363331778930945', 'google', 'Goutam', 'Singha', NULL, NULL, NULL, NULL, 'goutam.singha.cse@gmail.com', NULL, 0, 'en', 'https://lh3.googleusercontent.com/a-/AOh14GibfE87U8268UVLEuMqf85FpIxP91L0EXsjuqhy3Q=s96-c', NULL, NULL, NULL, 'User', 0, 1, '2020-12-16 00:43:46', '2020-12-19 13:25:09'),
(13, '112674476388870173431', 'google', 'Siliguri', 'City', 'Raja Ram Mohan Roy Road. Hakim Para', '734001', NULL, NULL, 'info.siliguricity@gmail.com', NULL, 0, 'en', 'https://lh5.googleusercontent.com/-AUy5Mfyg6dg/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnMRpAj6fLvDkl19Us41JSELtwSYw/s96-c/photo.jpg', 'Bekar', 'graduate', NULL, 'Saler', 0, 1, '2020-12-16 13:15:55', '2020-12-24 11:34:46'),
(14, '117296213671380389940', 'google', 'Paramita', 'Deb', NULL, NULL, NULL, NULL, 'paromitadeb99@gmail.com', NULL, 0, 'en', 'https://lh5.googleusercontent.com/-7Fo6MlvX3sU/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmqFmrIIPJZctg8SNAraUYGsV-cww/s96-c/photo.jpg', NULL, NULL, NULL, 'Saler', 0, 1, '2020-12-16 14:49:06', '2021-04-25 12:03:46'),
(15, '113980900530129375894', 'google', 'Shantanu', 'Bhaumik', NULL, NULL, NULL, NULL, 'shan.bhaumik@gmail.com', NULL, 0, 'en', 'https://lh3.googleusercontent.com/a-/AOh14GgIIPd6ySL3MdNx6jHmlwLqGVEzvzsr3QuNwSI8=s96-c', NULL, NULL, NULL, 'User', NULL, 1, '2020-12-17 08:31:14', '2020-12-17 08:31:14'),
(16, '106153583444893063284', 'google', 'Sandipan', 'Tar', NULL, NULL, NULL, NULL, 'sandipantr@gmail.com', NULL, 0, 'en', 'https://lh3.googleusercontent.com/a-/AOh14GjAWXThnExHKxCUXILe_ovsBdCEcLgD_col9KIxbQ=s96-c', NULL, NULL, NULL, 'User', NULL, 1, '2020-12-18 21:04:14', '2020-12-18 21:04:14'),
(17, '113055917012790677136', 'google', 'Cma', 'Siliguri', '', '', NULL, NULL, 'cma.siliguri@gmail.com', NULL, 0, 'en', 'https://lh4.googleusercontent.com/-Vhugz2kh1WI/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucl0z-nveP3dGyjCmJwoWMLHaBT1Mw/s96-c/photo.jpg', '', '', NULL, 'Saler', 0, 1, '2020-12-20 15:48:14', '2020-12-26 11:27:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_category`
--
ALTER TABLE `business_category`
  ADD PRIMARY KEY (`biscat_id`);

--
-- Indexes for table `business_certificate`
--
ALTER TABLE `business_certificate`
  ADD PRIMARY KEY (`bis_cer_id`);

--
-- Indexes for table `business_registry`
--
ALTER TABLE `business_registry`
  ADD PRIMARY KEY (`business_registry_id`);

--
-- Indexes for table `business_sociallink`
--
ALTER TABLE `business_sociallink`
  ADD PRIMARY KEY (`business_social_id`);

--
-- Indexes for table `business_timing`
--
ALTER TABLE `business_timing`
  ADD PRIMARY KEY (`bisTiming_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `customer_care`
--
ALTER TABLE `customer_care`
  ADD PRIMARY KEY (`care_id`);

--
-- Indexes for table `dealings_with`
--
ALTER TABLE `dealings_with`
  ADD PRIMARY KEY (`deals_id`);

--
-- Indexes for table `deals_portfolio`
--
ALTER TABLE `deals_portfolio`
  ADD PRIMARY KEY (`deals_portfolio_id`);

--
-- Indexes for table `deals_rating_review`
--
ALTER TABLE `deals_rating_review`
  ADD PRIMARY KEY (`deals_rr_id`);

--
-- Indexes for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`enrol_id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `offer_post`
--
ALTER TABLE `offer_post`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `patient_family_history`
--
ALTER TABLE `patient_family_history`
  ADD PRIMARY KEY (`patient_family_history_id`);

--
-- Indexes for table `patient_follow_up`
--
ALTER TABLE `patient_follow_up`
  ADD PRIMARY KEY (`patient_follow_up_id`);

--
-- Indexes for table `patient_follow_up_medicine`
--
ALTER TABLE `patient_follow_up_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_other_problem`
--
ALTER TABLE `patient_other_problem`
  ADD PRIMARY KEY (`patient_other_problem_id`);

--
-- Indexes for table `patient_report`
--
ALTER TABLE `patient_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `patient_screening`
--
ALTER TABLE `patient_screening`
  ADD PRIMARY KEY (`screening_id`);

--
-- Indexes for table `professional_info`
--
ALTER TABLE `professional_info`
  ADD PRIMARY KEY (`professional_id`);

--
-- Indexes for table `professional_rating_review`
--
ALTER TABLE `professional_rating_review`
  ADD PRIMARY KEY (`pro_rr_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `reply_seller_review`
--
ALTER TABLE `reply_seller_review`
  ADD PRIMARY KEY (`reviewReply_id`);

--
-- Indexes for table `seller_rating_review`
--
ALTER TABLE `seller_rating_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stored_ip`
--
ALTER TABLE `stored_ip`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `business_category`
--
ALTER TABLE `business_category`
  MODIFY `biscat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `business_certificate`
--
ALTER TABLE `business_certificate`
  MODIFY `bis_cer_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_registry`
--
ALTER TABLE `business_registry`
  MODIFY `business_registry_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `business_sociallink`
--
ALTER TABLE `business_sociallink`
  MODIFY `business_social_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_timing`
--
ALTER TABLE `business_timing`
  MODIFY `bisTiming_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `certificate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_care`
--
ALTER TABLE `customer_care`
  MODIFY `care_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dealings_with`
--
ALTER TABLE `dealings_with`
  MODIFY `deals_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrolment`
--
ALTER TABLE `enrolment`
  MODIFY `enrol_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `feed_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_post`
--
ALTER TABLE `offer_post`
  MODIFY `offer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_family_history`
--
ALTER TABLE `patient_family_history`
  MODIFY `patient_family_history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_follow_up`
--
ALTER TABLE `patient_follow_up`
  MODIFY `patient_follow_up_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_follow_up_medicine`
--
ALTER TABLE `patient_follow_up_medicine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_other_problem`
--
ALTER TABLE `patient_other_problem`
  MODIFY `patient_other_problem_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_report`
--
ALTER TABLE `patient_report`
  MODIFY `report_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_screening`
--
ALTER TABLE `patient_screening`
  MODIFY `screening_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_info`
--
ALTER TABLE `professional_info`
  MODIFY `professional_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professional_rating_review`
--
ALTER TABLE `professional_rating_review`
  MODIFY `pro_rr_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply_seller_review`
--
ALTER TABLE `reply_seller_review`
  MODIFY `reviewReply_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `seller_rating_review`
--
ALTER TABLE `seller_rating_review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
