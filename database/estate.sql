-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2019 at 12:20 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `owner` varchar(10) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `number`, `bank`, `owner`, `owner_id`, `date`) VALUES
(1, 'Theophilus Igwe', '2692162354', 'Ecobank', 'main', 1, '2018-12-08 09:04:00'),
(2, 'Sunday Nweke', '0025364758', 'Diamond', 'main', 1, '2018-12-08 09:14:02'),
(3, 'Sunday Nweke', '6734526183', 'Zenith Bank', 'main', 1, '2018-12-08 09:16:14'),
(4, 'Monday Ifeanyi', '7687543213', 'Fidelity', 'main', 1, '2018-12-08 09:20:07'),
(5, 'Mark Ekwe', '8787654323', 'Access Bank', 'estate', 1, '2018-12-08 09:38:57'),
(6, 'Monday Igwe', '1234567890', 'Sky Bank', 'estate', 1, '2018-12-08 09:46:45'),
(8, 'Sample Bank', '7987583214', 'UBA Bank', 'estate', 1, '2018-12-11 01:44:29'),
(9, 'Account name', '2345678909', 'Bank name', 'main', 1, '2019-01-24 09:53:58'),
(10, 'Estate Name1', '2816735654', 'Bank name', 'estate', 4, '2019-01-24 10:16:28'),
(11, 'Account name', '9876543234', 'Bank name', 'estate', 5, '2019-01-26 12:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `owner` int(11) NOT NULL,
  `estate` int(11) NOT NULL,
  `for_sale` tinyint(1) NOT NULL,
  `sale_amount` double NOT NULL,
  `flat_count` int(11) NOT NULL,
  `flat_description` varchar(100) NOT NULL,
  `flat_rent` double NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`, `location`, `description`, `owner`, `estate`, `for_sale`, `sale_amount`, `flat_count`, `flat_description`, `flat_rent`, `date`) VALUES
(1, 'Omereoha Building', 'North side of the estate', 'No description', 1, 1, 1, 200000, 9, 'One room flats with shared toilet and bathroom', 0, '2018-12-07 06:23:09'),
(23, 'Emma and Sons Building', 'No 6 Ogwuoji Street, Democracy Estate', '6 flats with veranda', 6, 1, 1, 20000000, 9, '2 bedroom flats, toilet and bathroom', 100000, '2018-12-13 05:32:10'),
(32, 'Example Building', 'Example Location', 'Example description', 5, 1, 0, 0, 6, 'Example descriipiont', 100000, '2018-12-13 05:56:17'),
(35, 'Example Building 2', 'Example Location', 'none', 4, 1, 1, 100000000, 12, 'Example description 2', 0, '2018-12-13 06:12:16'),
(36, 'Testing Buiding', 'Virtual Location', 'I don\'t know which description you want', 3, 1, 0, 0, 7, '3 Bedroom flats with toilets and bathrooms', 250000, '2018-12-15 12:24:46'),
(37, 'Testing Buiding 2', 'Virtual Location 2', 'I don\'t know which description you want', 4, 1, 1, 30000000, 7, '3 Bedroom flats with toilets and bathrooms', 250000, '2018-12-15 12:26:21'),
(38, 'Example Building 3', 'Any location can serve', 'Beautify affordable estates for both students and workers', 6, 1, 0, 0, 19, 'One room flats', 45000, '2018-12-15 19:59:50'),
(39, 'Grenadine Block', 'North side of the estate', 'Block of flats', 9, 11, 1, 200000000, 10, '3 bedroom flats', 120000, '2019-01-24 10:07:05'),
(40, 'Cappa Building', 'Southern side of the estate', 'Block of flats', 9, 11, 0, 0, 8, '2 bedroom flat', 200000, '2019-01-24 17:10:27'),
(41, 'St. Anthony\'s Building', 'Opposite Police Station, Water Works', 'Block of flats', 10, 12, 0, 0, 4, '2 Bedrooms', 220000, '2019-01-26 12:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `building_owner`
--

CREATE TABLE `building_owner` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `estate` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building_owner`
--

INSERT INTO `building_owner` (`id`, `name`, `email`, `phone`, `estate`, `date`) VALUES
(1, 'Chief Ezeona Igwe', 'ezeonaigwe@yahoo.com', '09087675432', 1, '2018-12-07 06:21:55'),
(2, 'Mr. Omereoha Nwankwo', 'nwankwoholding@gmail.com', '09237485746', 2, '2018-12-07 06:21:55'),
(3, 'Chief Onyenankeya Oke', 'onyenankeya@yahoo.com', '09087600432', 1, '2018-12-11 06:21:55'),
(4, 'Chief Ikpeama', 'ikpema@yahoo.com', '09082267543', 1, '2018-12-11 06:21:55'),
(5, 'Chief Egouche', 'egouche@yahoo.com', '09087110431', 1, '2018-12-11 06:21:55'),
(6, 'Chief Emmanuel Okoro', 'emmanuelokoro@emmanandsons.com', '08267354321', 1, '2018-12-13 04:55:43'),
(7, 'Chief Emmanuel igwe', 'emmanueligwe@gmail.com', '08267354000', 1, '2018-12-13 05:01:42'),
(8, 'Example Owner 2', 'exampleowner@gmail.com', '09066675423', 1, '2018-12-13 18:34:47'),
(9, 'Owner 1', 'owner1@gmail.com', '08123456543', 11, '2019-01-24 10:04:39'),
(10, 'St Anthony', 'anthony@gmail.com', '08126364746', 12, '2019-01-26 12:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `estate`
--

CREATE TABLE `estate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estate`
--

INSERT INTO `estate` (`id`, `name`, `address`, `description`, `city`, `state`, `date`) VALUES
(1, 'Democracy Estate', 'Presco', 'One of the students in Ebonyi State', 'Abakaliki', 'Ebonyi', '2018-11-30 18:25:26'),
(3, 'Lagos Estate', 'Presco', 'One of the students in Ebonyi State', 'Abakaliki', 'Ebonyi', '2018-11-30 18:29:09'),
(4, 'Abakaliki Estate See', 'Presco', 'One of the students in Ebonyi State', 'Abakaliki', 'Ebonyi', '2018-12-01 08:13:17'),
(5, 'Democracy Estate', 'Beside Presco Junction', 'Beautify affordable estates for both students and workers', 'Ezza North', 'Ebonyi State', '2018-12-07 10:11:05'),
(9, 'Wilco Estate', 'No 9 Wilco Street', 'Best of the best', 'Mainland', 'Lagos State', '2018-12-09 16:49:42'),
(11, 'New Estate', 'New Address', 'New description', 'New City', 'Enugu State', '2019-01-24 09:51:21'),
(12, 'Lowcost Estate', 'Water works', 'Cool estate', 'Abakaliki', 'Ebonyi State', '2019-01-26 12:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `estate_admin`
--

CREATE TABLE `estate_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `estate` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estate_admin`
--

INSERT INTO `estate_admin` (`id`, `name`, `phone`, `email`, `address`, `estate`, `password`, `date`) VALUES
(1, 'Estate one', '08127397362', 'estateone@gmail.com', 'Estate one address', 1, 'estateone', '2018-12-05 16:55:24'),
(2, 'Estate two', '09127364531', 'estatetwo@gmail.com', 'Estate two address', 9, 'estatetwo', '2018-12-08 07:47:16'),
(3, 'Estate three', '98267676543', 'estatethree@gmail.com', 'Estate three address', 4, 'estatethree', '2018-12-09 12:22:49'),
(4, 'Estate four', '08125354657', 'estatefour@gmail.com', 'Estate four address', 11, 'estatefour', '2019-01-24 09:49:18'),
(5, 'Estate five', '09156565656', 'estatefive@gmail.com', 'Estate five address', 12, 'estatefive', '2019-01-26 12:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `building` int(11) NOT NULL,
  `vacant` tinyint(1) NOT NULL,
  `amount` double NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`id`, `description`, `building`, `vacant`, `amount`, `date`) VALUES
(1, '2 Bedroom flat, toilet and bathroom', 1, 1, 120000, '2018-12-07 06:39:02'),
(2, '2 Bedroom flat, toilet and bathroom', 1, 1, 120000, '2018-12-07 06:39:02'),
(4, 'Two bedroom flats with toilet and bathroom', 23, 1, 120000, '2018-12-15 09:08:57'),
(5, '3 bedroom flats', 1, 1, 100000, '2018-12-15 11:19:37'),
(6, '3 bedroom flats', 1, 1, 100000, '2018-12-15 11:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `type_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `width_x` int(11) NOT NULL,
  `width_y` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `type`, `type_id`, `size`, `width_x`, `width_y`, `name`, `description`, `date`) VALUES
(14, '0', 1, 441, 1200, 1000, 'e11548291756.jpg', 'Estate image 1', '2019-01-24 02:02:45'),
(15, '0', 1, 1750, 1200, 1000, 'e11548291787.png', 'Estate image 2', '2019-01-24 02:03:08'),
(16, '1', 1, 205, 1200, 1000, 'b111548317812.jpg', 'Building image testing', '2019-01-24 09:17:02'),
(17, '1', 23, 204, 1200, 1000, 'b1231548317868.jpg', 'Example testing image for building', '2019-01-24 09:17:57'),
(21, '1', 39, 202, 1200, 1000, 'b4391548345331.jpg', 'Beautiful Building', '2019-01-24 16:55:40'),
(22, '1', 39, 177, 1200, 1000, 'b4391548345374.jpg', 'Grenadine Building in Lagos', '2019-01-24 16:56:23'),
(23, '0', 11, 197, 1200, 1000, 'e41548346140.jpg', 'Sunshine City Estate', '2019-01-24 17:09:09'),
(24, '1', 40, 174, 1200, 1000, 'b4401548346257.jpg', 'Front view of the cappa building', '2019-01-24 17:11:05'),
(25, '1', 40, 177, 1200, 1000, 'b4401548346326.jpg', 'Night View of Cappa Building', '2019-01-24 17:12:15'),
(26, '1', 1, 170, 1200, 1000, 'b111548400197.jpg', 'Whole view of the building', '2019-01-25 08:10:06'),
(27, '1', 1, 183, 1200, 1000, 'b111548400243.jpg', 'Parkview of the building', '2019-01-25 08:10:52'),
(28, '0', 12, 225, 1200, 1000, 'e51548502602.jpg', 'Lowcost estate main view', '2019-01-26 12:36:50'),
(29, '1', 41, 131, 1200, 1000, 'b5411548502674.jpg', 'Front view of St. Anthony building', '2019-01-26 12:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `levy`
--

CREATE TABLE `levy` (
  `id` int(11) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `flat_count` int(11) NOT NULL,
  `building_count` int(11) NOT NULL,
  `estate` int(11) NOT NULL,
  `recipient_bank_id` int(11) NOT NULL,
  `one_time` tinyint(1) NOT NULL,
  `payer_name` varchar(50) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `slip_no` varchar(25) NOT NULL,
  `method` varchar(15) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed_date` datetime NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levy`
--

INSERT INTO `levy` (`id`, `purpose`, `amount`, `start`, `end`, `flat_count`, `building_count`, `estate`, `recipient_bank_id`, `one_time`, `payer_name`, `confirmed`, `slip_no`, `method`, `date`, `confirmed_date`, `payment_date`) VALUES
(1, 'Sanitation Levy', 200000, '2019-02-15', '2024-05-15', 0, 0, 1, 2, 0, 'Ogbe Doc', 1, '765432457', 'Bank Transfer', '2019-01-16 15:33:43', '2019-01-17 07:22:55', '2023-02-10'),
(2, 'Sanitation', 50, '2019-01-24', '2019-01-24', 0, 0, 11, 4, 1, 'Payers name', 1, '567457', 'Bank Deposit', '2019-01-24 10:20:35', '2019-01-24 10:21:49', '2019-03-14'),
(3, 'No purpose', 100, '2019-01-24', '2019-01-24', 0, 0, 11, 2, 1, 'Payer name2', 1, '567888898', 'Bank transfer', '2019-01-24 16:15:58', '2019-01-26 12:29:15', '2019-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `main_admin`
--

CREATE TABLE `main_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_admin`
--

INSERT INTO `main_admin` (`id`, `name`, `email`, `phone`, `address`, `password`, `date`) VALUES
(1, 'Emmanuel Wilson Chuks', 'wilsonchuks@yahoo.com', '08101154454', 'Presco Abakaliki', 'main', '2018-12-05 16:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `estate` int(11) NOT NULL DEFAULT '0',
  `building` int(11) NOT NULL DEFAULT '0',
  `sender` varchar(15) NOT NULL,
  `body` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver` varchar(15) NOT NULL,
  `receiver_id` int(11) NOT NULL DEFAULT '0',
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `address`, `subject`, `estate`, `building`, `sender`, `body`, `email`, `sender_id`, `receiver`, `receiver_id`, `seen`, `date`) VALUES
(1, 'Emmanuel Chukwu', 'Emma and Sons Building in No 6 Ogwuoji Street, Democracy Estate', 'Payment Details', 1, 23, 'tenant', 'This is to notify you that I have paid my house for this year yesterday. The payment details are as follows;\r\nName : Emmanuel Wilson Chukwu\r\nDate: 22th December, 2018\r\nAmount : N 120,000', 'wilsonemmanuel144@gmail.com', 2, 'estate', 1, 0, '2018-12-23 16:54:51'),
(2, 'Wilson Emmanuel Chukwu', 'No. 6 Umuchi Street, Ntezi Aba, Abakaliki, Ebonyi State', 'Levy Payment', 1, 0, 'estate', 'This is to inform you that I have paid the estate fees into you account today.\r\nThe followings are the payment details;\r\nName : Emmanuel Ifeanyi\r\nEstate : Democracy Estate, Presco, Abakaliki\r\nAmount : 4200', 'wilsonemmanuel144@gmail.com', 1, 'main', 0, 1, '2018-12-24 08:20:02'),
(5, 'Wilson Emmanuel Chukwu', 'No. 6 Umuchi Street, Ntezi Aba, Abakaliki, Ebonyi State', 'Fees Payment', 1, 23, 'estate', 'This is to inform everyone that there will estate-wide sanitation on the last Saturday of this month. All tenants are hereby informed to turn up for the cleaning exercise as absentism or lateness will attract some fine. Thanks.\r\n\r\nEstate Manager.', 'wilsonemmanuel144@gmail.com', 1, 'tenant', 2, 0, '2018-12-02 08:29:01'),
(6, 'Wilson Emmanuel Chukwu', 'No. 6 Umuchi Street, Ntezi Aba, Abakaliki, Ebonyi State', 'Fees Payment', 1, 1, 'estate', 'This is to inform everyone that there will estate-wide sanitation on the last Saturday of this month. All tenants are hereby informed to turn up for the cleaning exercise as absentism or lateness will attract some fine. Thanks.\r\n\r\nEstate Manager.', 'wilsonemmanuel144@gmail.com', 1, 'tenant', 4, 0, '2018-12-24 08:29:01'),
(8, 'Emmanuel Wilson Chuks', 'Presco Abakaliki', 'See you', 0, 0, 'main', 'See me see me see me see me see me see me see me see me see me see me see me see me see me. You must be mad. do you even know what you are doing like that. I don\'t want to know what is happening right.', 'wilsonchuks29@yahoo.com', 1, 'estate', 1, 0, '2019-01-14 11:24:54'),
(10, 'Wilson Emmanuel Chukwu', 'No. 6 Umuchi Street, Ntezi Aba, Abakaliki, Ebonyi State', 'Democracy Estate First Message to the Main Admin', 1, 0, 'estate', 'this message is out first message to the general admin. It is just a dummy message.', 'wilsonemmanuel144@gmail.com', 1, 'main', 0, 1, '2019-01-14 18:44:27'),
(11, 'Emmanuel Wilson Chuks', 'Presco Abakaliki', 'Testing Message', 0, 0, 'main', 'I just want to test how the system is working', 'wilsonchuks29@yahoo.com', 1, 'estate', 1, 0, '2019-01-24 09:56:07'),
(13, 'Tenant name1', 'Building name1 in North side of the estate', 'This is my subject', 0, 39, 'tenant', 'This is just a testing message. It\'s just a dummy text.', 'tenantname1@gmail.com', 5, 'estate', 0, 0, '2019-01-24 10:46:39'),
(14, 'Tenant name1', 'Building name1 in North side of the estate', 'This is the subject', 0, 39, 'tenant', 'hey Admin!\r\nI have a message for you.', 'tenantname1@gmail.com', 5, 'estate', 4, 1, '2019-01-24 10:48:45'),
(15, 'Emmanuel Wilson Chukwu', 'Presco Junction', 'Just Testing External Message', 0, 0, 'user', 'This is nothing. You should ignore it and move on. I will send you a better one later.', 'wilsonemmanue@gmail.com', 0, 'estate', 1, 1, '2019-01-25 08:45:23'),
(16, 'Emmanuel Wilson Chuks', 'Presco Abakaliki', 'Just checking on you', 0, 0, 'main', 'dummy text', 'wilsonchuks29@yahoo.com', 1, 'estate', 5, 1, '2019-01-26 12:27:11'),
(17, 'Admin2', 'admin2 address', 'Welcome Message', 12, 41, 'estate', 'You welcome to our estate.', 'admin2@gmail.com', 5, 'tenant', 6, 1, '2019-01-26 12:39:27'),
(18, 'User name', 'No address', 'How to Rent a House', 0, 0, 'user', 'I want to rent an appartment in your estate', 'user@email.com', 0, 'estate', 5, 1, '2019-01-26 12:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `occupant`
--

CREATE TABLE `occupant` (
  `id` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `flats` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupant`
--

INSERT INTO `occupant` (`id`, `building`, `name`, `phone`, `email`, `flats`, `password`, `date`, `estate`) VALUES
(2, 23, 'Emmanuel Chukwu', '09126374851', 'wilsonemmanuel@gmail.com', 2, 'emmanuel', '2018-11-27 05:52:52', 1),
(4, 1, 'Emmanuel Igwe', '09127364500', 'emmanueligwe@gmail.com', 1, 'emmanuel', '2018-12-15 19:22:07', 1),
(5, 39, 'Tenant name1', '08125364534', 'tenantname1@gmail.com', 1, 'tenant1', '2019-01-24 10:14:26', 11),
(6, 41, 'Dr. Igwe Joseph', '08126354637', 'igwe@yahoo.com', 1, 'igwe', '2019-01-26 12:35:10', 12);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `method` varchar(15) NOT NULL,
  `payer_name` varchar(50) NOT NULL,
  `recipient_bank_id` int(11) NOT NULL,
  `slip_no` varchar(25) NOT NULL,
  `one_time` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed` tinyint(1) NOT NULL,
  `occupant` int(11) NOT NULL,
  `payer_estate` int(11) NOT NULL,
  `confirmed_date` datetime NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `purpose`, `amount`, `start`, `end`, `method`, `payer_name`, `recipient_bank_id`, `slip_no`, `one_time`, `date`, `confirmed`, `occupant`, `payer_estate`, `confirmed_date`, `payment_date`) VALUES
(7, 'House Rent', 120000, '2019-01-16', '2019-01-16', 'Bank Deposit', 'Engr. Okoro Ogbonna', 6, '7665433423', 1, '2019-01-16 14:06:48', 1, 2, 1, '2019-01-16 14:06:48', '2023-03-13'),
(8, 'House Rent', 150000, '2019-02-03', '2020-01-18', 'Bank Deposit', 'Payer name', 10, '45664355', 0, '2019-01-24 10:38:09', 1, 5, 11, '2019-01-24 10:38:09', '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `name`) VALUES
(1, 'Abia State'),
(2, 'Adamawa State'),
(3, 'Akwa Ibom State'),
(4, 'Anambra State'),
(5, 'Bauchi State'),
(6, 'Bayelsa State'),
(7, 'Benue State'),
(8, 'Borno State'),
(9, 'Cross River State'),
(10, 'Delta State'),
(11, 'Ebonyi State'),
(12, 'Edo State'),
(13, 'Ekiti State'),
(14, 'Enugu State'),
(15, 'FCT'),
(16, 'Gombe State'),
(17, 'Imo State'),
(18, 'Jigawa State'),
(19, 'Kaduna State'),
(20, 'Kano State'),
(21, 'Katsina State'),
(22, 'Kebbi State'),
(23, 'Kogi State'),
(24, 'Kwara State'),
(25, 'Lagos State'),
(26, 'Nasarawa State'),
(27, 'Niger State'),
(28, 'Ogun State'),
(29, 'Ondo State'),
(30, 'Osun State'),
(31, 'Oyo State'),
(32, 'Plateau State'),
(33, 'Rivers State'),
(34, 'Sokoto State'),
(35, 'Taraba State'),
(36, 'Yobe State'),
(37, 'Zamfara State');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`),
  ADD KEY `estate` (`estate`);

--
-- Indexes for table `building_owner`
--
ALTER TABLE `building_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estate`
--
ALTER TABLE `estate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estate_admin`
--
ALTER TABLE `estate_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estate` (`estate`);

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building` (`building`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levy`
--
ALTER TABLE `levy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estate` (`estate`);

--
-- Indexes for table `main_admin`
--
ALTER TABLE `main_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupant`
--
ALTER TABLE `occupant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estate` (`estate`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `building_owner`
--
ALTER TABLE `building_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `estate`
--
ALTER TABLE `estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `estate_admin`
--
ALTER TABLE `estate_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `flat`
--
ALTER TABLE `flat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `levy`
--
ALTER TABLE `levy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `main_admin`
--
ALTER TABLE `main_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `occupant`
--
ALTER TABLE `occupant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `estate` FOREIGN KEY (`estate`) REFERENCES `estate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `owner` FOREIGN KEY (`owner`) REFERENCES `building_owner` (`id`);

--
-- Constraints for table `estate_admin`
--
ALTER TABLE `estate_admin`
  ADD CONSTRAINT `admin` FOREIGN KEY (`estate`) REFERENCES `estate` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `tenant` FOREIGN KEY (`building`) REFERENCES `building` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `levy`
--
ALTER TABLE `levy`
  ADD CONSTRAINT `levy` FOREIGN KEY (`estate`) REFERENCES `estate` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
