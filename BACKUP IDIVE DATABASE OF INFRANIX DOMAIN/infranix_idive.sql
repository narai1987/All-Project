-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: mysql1001.mochahost.com
-- Generation Time: Feb 11, 2014 at 03:39 AM
-- Server version: 5.5.27
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infranix_idive`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE IF NOT EXISTS `addtocart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `person` int(11) NOT NULL DEFAULT '1',
  `children` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `addtocart`
--

INSERT INTO `addtocart` (`id`, `user_id`, `trip_id`, `person`, `children`, `date_time`, `status`) VALUES
(6, '0ev6cb0fudo7ug5jsqeb0j6l46', 1, 2, 1, '2014-01-30 15:33:49', 1),
(3, 'vr39hiujf2kb26p3khnvvldbt1', 12, 1, 0, '2014-01-29 19:06:19', 1),
(5, '0ev6cb0fudo7ug5jsqeb0j6l46', 12, 4, 0, '2014-01-30 15:32:27', 1),
(7, 'hu9e2lvvme93gh3va14ik0t4e7', 1, 1, 0, '2014-01-30 17:54:50', 1),
(8, '27pbgp8227a4pss3j8kkpdn1t4', 11, 1, 0, '2014-01-31 07:23:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `defalut` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `language_id`, `title`, `content`, `category`, `status`, `defalut`) VALUES
(2, 0, 'Top ads', 'sfgsfgsdfs', 'top', 1, 1),
(3, 0, 'women trainer', 'asdfasdfsdf', 'bottom', 0, 1),
(6, 0, '5 Minute Abs Workout', 'left', 'bottomleft', 1, 1),
(7, 0, 'women trainer', 'sdfsdfsad', 'bottomright', 1, 1),
(8, 0, 'News', 'only', 'topright', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adverties`
--

CREATE TABLE IF NOT EXISTS `adverties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `category` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `adverties`
--

INSERT INTO `adverties` (`id`, `language_id`, `category`, `banner`, `link`, `status`) VALUES
(3, 0, 'bottom', 'Water lilies.jpg', 'http://gmail.com', 1),
(2, 0, 'bottom', 'Sunset.jpg', 'http://google.com', 1),
(5, 0, 'bottom', 'Winter.jpg', 'http://infranix.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `beverages`
--

CREATE TABLE IF NOT EXISTS `beverages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beverage` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE IF NOT EXISTS `boats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `company_branch_id` int(11) NOT NULL,
  `boat_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `established` datetime NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `boat_length` varchar(200) NOT NULL,
  `boat_beam` varchar(200) NOT NULL,
  `fuel_capacity` varchar(200) NOT NULL,
  `men_capacity` varchar(200) NOT NULL,
  `upper_deck` varchar(500) DEFAULT NULL,
  `main_deck` varchar(500) DEFAULT NULL,
  `lower_deck` varchar(500) DEFAULT NULL,
  `draft_drive_up_high_trim` varchar(500) NOT NULL,
  `draft_drive_down` varchar(500) NOT NULL,
  `deadrise` varchar(500) NOT NULL,
  `approx_dry_weight` varchar(500) NOT NULL,
  `estimated_height_on_trailer_top_windshield` varchar(500) NOT NULL,
  `boat_height_windshield_to_keel` varchar(500) NOT NULL,
  `bridge_clearance_top_up` varchar(500) NOT NULL,
  `bridge_clearance_top_down` varchar(500) NOT NULL,
  `cockpit_depth_helm` varchar(500) NOT NULL,
  `cockpit_storage` varchar(500) NOT NULL,
  `no_of_master_cabin` varchar(200) NOT NULL,
  `price_of_master_cabin` float NOT NULL,
  `no_of_upper_standard_cabin` varchar(200) NOT NULL,
  `price_of_upper_standard_cabin` float NOT NULL,
  `no_of_delux_cabin` varchar(200) NOT NULL,
  `price_of_delux_cabin` float NOT NULL,
  `no_of_lower_standard_cabin` varchar(200) NOT NULL,
  `price_of_lower_standard_cabin` float NOT NULL,
  `standard_power` varchar(500) DEFAULT NULL,
  `tested_power` varchar(500) DEFAULT NULL,
  `optional_power` varchar(500) DEFAULT NULL,
  `backup_power` varchar(500) DEFAULT NULL,
  `automatic_bilge_pump` tinyint(4) NOT NULL,
  `battery_switches` varchar(500) DEFAULT NULL,
  `nmma_abyc_uscg_ce_certified` varchar(500) DEFAULT NULL,
  `power_assisted_steering` varchar(500) DEFAULT NULL,
  `weather_resistants` varchar(500) DEFAULT NULL,
  `imgdescription` text NOT NULL,
  `lights` varchar(500) DEFAULT NULL,
  `fiber_glass` varchar(500) DEFAULT NULL,
  `speakers_sound` varchar(500) DEFAULT NULL,
  `glove_box` varchar(500) DEFAULT NULL,
  `plug` varchar(500) DEFAULT NULL,
  `steering_wheel` varchar(500) DEFAULT NULL,
  `alarm` varchar(500) DEFAULT NULL,
  `stringer` varchar(500) DEFAULT NULL,
  `horn` varchar(500) DEFAULT NULL,
  `swim_platform` varchar(500) DEFAULT NULL,
  `design_hull_detail` text NOT NULL,
  `life_jackets` tinyint(4) NOT NULL,
  `life_rafts` tinyint(4) NOT NULL,
  `oxygen` tinyint(4) NOT NULL,
  `satelite_service` tinyint(4) NOT NULL,
  `first_aid` tinyint(4) NOT NULL,
  `outboard` tinyint(4) NOT NULL,
  `safty_detail` text NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`id`, `language_id`, `operator_id`, `company_id`, `country_id`, `company_branch_id`, `boat_name`, `established`, `description`, `boat_length`, `boat_beam`, `fuel_capacity`, `men_capacity`, `upper_deck`, `main_deck`, `lower_deck`, `draft_drive_up_high_trim`, `draft_drive_down`, `deadrise`, `approx_dry_weight`, `estimated_height_on_trailer_top_windshield`, `boat_height_windshield_to_keel`, `bridge_clearance_top_up`, `bridge_clearance_top_down`, `cockpit_depth_helm`, `cockpit_storage`, `no_of_master_cabin`, `price_of_master_cabin`, `no_of_upper_standard_cabin`, `price_of_upper_standard_cabin`, `no_of_delux_cabin`, `price_of_delux_cabin`, `no_of_lower_standard_cabin`, `price_of_lower_standard_cabin`, `standard_power`, `tested_power`, `optional_power`, `backup_power`, `automatic_bilge_pump`, `battery_switches`, `nmma_abyc_uscg_ce_certified`, `power_assisted_steering`, `weather_resistants`, `imgdescription`, `lights`, `fiber_glass`, `speakers_sound`, `glove_box`, `plug`, `steering_wheel`, `alarm`, `stringer`, `horn`, `swim_platform`, `design_hull_detail`, `life_jackets`, `life_rafts`, `oxygen`, `satelite_service`, `first_aid`, `outboard`, `safty_detail`, `date_time`, `status`) VALUES
(6, 1, 1, 16, 1, 0, '', '2014-01-07 00:00:00', '', '76', '54', '567', '68', 'media/boats/6/upper_deckBoats-Luxury-yacht-1.jpg', 'media/boats/6/main_deckhouseboat_kerala_photos.jpg', 'media/boats/6/lower_deckurl.jpg', '756', '5675', '567', '675', '5675', '567', '56756', '567', '567', '567', '67', 67, '567', 456, '456', 456, '56', 465, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 1, 0, 0, 1, 1, '', '2014-01-10 18:39:44', 1),
(4, 1, 1, 1, 1, 0, '', '2014-01-05 00:00:00', '', '4', '4', '34', '49', 'media/boats/4/upper_deck4canal_boat_trips_london.jpg', 'media/boats/4/main_deck4boat-01.jpg', 'media/boats/4/lower_deck4mercuriaLARGE.jpg', '56', '78', '8', '6', '8', '9', '5', '9', '6', '5', '5', 40, '2', 30, '1', 25, '1', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 1, 1, 1, 0, 1, '', '2014-01-10 18:39:13', 1),
(5, 1, 1, 18, 1, 0, '', '2014-01-06 00:00:00', '', '67', '67', '674', '576', '', '', '', '67', '45', '68', '4', '78', '4', '45', '7', '4', '7', '5', 40, '2', 30, '1', 25, '1', 34, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 0, 1, 1, 1, 1, '', '2014-01-10 18:40:04', 1),
(7, 1, 1, 14, 1, 0, '', '2014-01-07 00:00:00', '', '867', '678', '678', '678', 'media/boats/7/upper_deck7Boats-Luxury-yacht-1.jpg', 'media/boats/7/main_deck7url.jpg', 'media/boats/7/lower_deck7houseboat_kerala_photos.jpg', '786', '678', '678', '78', '67', '678', '6678', '678', '678', '678', '78', 678, '678', 678, '678', 564, '67', 546, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 0, 1, 1, 0, 0, '', '2014-01-10 18:40:21', 1),
(8, 1, 1, 14, 1, 0, '', '2014-01-07 00:00:00', '', '867', '678', '678', '678', 'media/boats/8/upper_deck8Boats-Luxury-yacht-1.jpg', 'media/boats/8/main_deck8url.jpg', 'media/boats/8/lower_deck8houseboat_kerala_photos.jpg', '786', '678', '678', '78', '67', '678', '6678', '678', '678', '678', '78', 678, '678', 678, '678', 564, '67', 546, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 0, 1, 1, 0, 0, '', '2014-01-10 18:40:38', 1),
(25, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:29:58', 1),
(26, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:30:01', 1),
(27, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:30:04', 1),
(30, 1, 5, 2, 1, 0, '', '2014-01-13 00:00:00', '', '28'' 10', '8'' 6', '73 Gals', '10 Gals', 'media/boats/30/upper_deck3018SPORT_MAIN-1.jpg', 'media/boats/30/main_deck3018SPORT_MAIN-2.jpg', 'media/boats/30/lower_deck3018SPORT_MAIN-3.jpg', '22"', '5"', '18º', '7585 Lbs', '10'' 7"', '8'' 10"', '9'' 8"', '8'' 1"', '29"', '34 Cu. Ft', '5', 3000, '8', 4000, '3', 5000, '6', 2000, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-25 14:56:41', 1),
(35, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:12', 1),
(31, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:02', 1),
(32, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:04', 1),
(33, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:07', 1),
(34, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:10', 1),
(28, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:30:06', 1),
(29, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:30:08', 1),
(36, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:13', 1),
(37, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:14', 1),
(38, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:24', 1),
(39, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:25', 1),
(40, 1, 0, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 0, '0', 0, '0', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-13 16:31:27', 1),
(41, 1, 6, 20, 0, 0, '', '2013-11-13 00:00:00', '', '8.78 M', '2.6 M', '276 L', '15 L', 'media/boats/41/upper_deck41index342.jpg', 'media/boats/41/main_deck41Sport-Boat-Landing-2014_large.jpg', 'media/boats/41/lower_deck4118SPORT_MAIN-2.jpg', '0.56 M', '1', '18º', '3440 Kg', '3.2 M', '2.7 M', '2.9 M', '2.4 M', '0.7 M', '0.96 Cu M', '10', 50000, '8', 40000, '3', 70000, '6', 5000, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, '', '2014-01-25 15:08:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boatspecifications`
--

CREATE TABLE IF NOT EXISTS `boatspecifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `boat_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `no_of_lower_standard_cabin` int(11) NOT NULL,
  `price_of_lower_standard_cabin` float NOT NULL,
  `standard_power` varchar(500) DEFAULT NULL,
  `tested_power` varchar(500) DEFAULT NULL,
  `optional_power` varchar(500) DEFAULT NULL,
  `backup_power` varchar(500) DEFAULT NULL,
  `automatic_bilge_pump` tinyint(4) NOT NULL,
  `battery_switches` varchar(500) DEFAULT NULL,
  `nmma_abyc_uscg_ce_certified` varchar(500) DEFAULT NULL,
  `power_assisted_steering` varchar(500) DEFAULT NULL,
  `weather_resistants` varchar(500) DEFAULT NULL,
  `imgdescription` text NOT NULL,
  `lights` varchar(500) DEFAULT NULL,
  `fiber_glass` varchar(500) DEFAULT NULL,
  `speakers_sound` varchar(500) DEFAULT NULL,
  `glove_box` varchar(500) DEFAULT NULL,
  `plug` varchar(500) DEFAULT NULL,
  `steering_wheel` varchar(500) DEFAULT NULL,
  `alarm` varchar(500) DEFAULT NULL,
  `stringer` varchar(500) DEFAULT NULL,
  `horn` varchar(500) DEFAULT NULL,
  `swim_platform` varchar(500) DEFAULT NULL,
  `design_hull_detail` text NOT NULL,
  `safty_detail` text NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`boat_id`,`language_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `boatspecifications`
--

INSERT INTO `boatspecifications` (`id`, `boat_id`, `language_id`, `boat_name`, `description`, `no_of_lower_standard_cabin`, `price_of_lower_standard_cabin`, `standard_power`, `tested_power`, `optional_power`, `backup_power`, `automatic_bilge_pump`, `battery_switches`, `nmma_abyc_uscg_ce_certified`, `power_assisted_steering`, `weather_resistants`, `imgdescription`, `lights`, `fiber_glass`, `speakers_sound`, `glove_box`, `plug`, `steering_wheel`, `alarm`, `stringer`, `horn`, `swim_platform`, `design_hull_detail`, `safty_detail`, `date_time`, `status`) VALUES
(9, 6, 2, 'fgh', 'fghfg', 0, 0, 'fgh', 'fgh', 'dfh', 'dfgh', 1, 'fghd', 'dfgh', 'dfgh', 'fghfgh', 'fghdfgh', 'fghfgh', 'fgh', 'fghfgh', 'sdfgh', 'fghd', 'fgh', 'dfh', 'dfgh', 'sdfgh', 'dfgh', 'dghdfgh', 'fghdfgh fgh dfghfgh', '2014-01-10 18:39:44', 1),
(2, 4, 1, '190 Sports', 'Boat english description....\r\n', 0, 0, 'Strong', 'Extreme', 'Awesome', 'Strong', 1, 'Yes', 'Owner can do', 'comfortabe', 'bokwas', '<p>\r\n	right now img description is not available..</p>\r\n', '98', '34', 'I-567', 'U-67A', 'UUI', 'Y58', 'SS-07', 'TR-C 789', 'COM-40', 'JJ57', '<p>\r\n	Worry about this is for you can''t take without performance.</p>\r\n', 'fgjh sfdgh fdghd dfgh\r\n', '2014-01-10 18:39:13', 1),
(3, 4, 2, 'เรือชื่อในภาษาอังกฤษ', 'เรือคำอธิบายภาษาอังกฤษ ...\r\n', 0, 0, '????????', '????????', '????????', '????????', 1, '????????', '????????', '????????', '????????', '', 'Katrina Kaif', '??????????', '??????????', '??????????', '??????????', '??????????', '', '??????????', '??????????', '??????????', '<p>\r\n	???????????????????????????????????????????? ..</p>\r\n', 'hjkghjm fgyhyj hjrtyhj ghg\r\n', '2014-01-10 18:39:13', 1),
(8, 6, 1, '540 Sundancer', 'tyutyu', 0, 0, 'tyu', 'tyu', 'tyu', 'tyuty', 1, 'yuty', 'tyut', 'tyu', 'tyu', 'yutyutyu tyutyu', 'ytu', 'tyu', 'tyu', 'tyu', 'tyuty', 'gfhfg', 'fghfgh', 'fghgfh', 'fghgfh', 'fghg', 'hfghfghfgh', 'fghfghfgh', '2014-01-10 18:39:44', 1),
(4, 4, 4, 'ฉันต้องการ', 'ฉันต้องการที่จะทำให้ความสัมพันธ์ทางกายภาพกับ ..\r\n', 0, 0, '???????', '????????', '?????????????????', 'Je veux faire rapport physique avec ..', 1, 'Je veux', 'physique avec ..', 'physique avec ..', 'Je', '', 'Je veux faire rapport', 'avec ..', 'veux faire rap', 'Je veux fa', 'Beauti filles', 'Beauti filles', '', 'Beauti filles', 'Beauti filles', 'Beauti filles', '<p>\r\n	Beauti filles Beauti filles Beauti filles Je veux faire rapport physique avec ..</p>\r\n', 'uykjiyu ghhg gfh', '2014-01-10 18:39:13', 1),
(5, 5, 1, 'Past Models', '<p>\r\n	hjghjgh ghjghjghj ghjg hj</p>\r\n', 0, 0, 'Strong', 'Extreme', 'Awesome', 'Strong', 1, 'Yes', 'Owner can do', 'comfortabe', 'bokwas', '<p>\r\n	fghf fgh dghdfghdfghdgh fdgh</p>\r\n', '98', '34', 'I-567', 'U-67A', 'UUI', 'Y58', '', 'TR-C789', 'COM-40', 'JJ57', '<p>\r\n	fghjfgj djh fchgj fh gh</p>\r\n', '<p>\r\n	ghj fghjf ghjfjhfg dfhjg</p>\r\n', '2014-01-10 18:40:04', 1),
(6, 5, 2, 'io', '<p>\r\n	uioyuio</p>\r\n', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-10 18:40:04', 1),
(7, 5, 4, 'uiouio', '<p>\r\n	oioluio</p>\r\n', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-10 18:40:04', 1),
(10, 6, 4, '', '', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-10 18:39:44', 1),
(11, 7, 1, 'Digital 2013 Yachts Catalog', 'fdgjhdfjhfh drfyh fjhfhj', 0, 0, 'ghjghj', 'ghj', 'ghj', 'ghj', 1, 'ghjghj', 'ghjghj', 'gseryhd', 'dghfdgh', 'fgjhfdgj ftghdfgh fgh', 'fgjhdfj', 'fgjgh', 'ghjghj', 'ghjghj', 'fdjh', 'hjghj', 'dfjhj', 'gfjhdfj', 'dfgjhdf', 'jdhfj', 'fghjdfjdfjhdfj', 'jhhfgjhgj', '2014-01-10 18:40:21', 1),
(12, 7, 2, 'hjfdhj', 'dfrtgjhdfgjhj', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-10 18:40:21', 1),
(13, 7, 4, '', '', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-10 18:40:21', 1),
(14, 8, 1, 'Digital 2013 International Boat Catalogs', 'fdgjhdfjhfh drfyh fjhfhj', 0, 0, 'ghjghj', 'ghj', 'ghj', 'ghj', 1, 'ghjghj', 'ghjghj', 'gseryhd', 'dghfdgh', 'fgjhfdgj ftghdfgh fgh', 'fgjhdfj', 'fgjgh', 'ghjghj', 'ghjghj', 'fdjh', 'hjghj', 'dfjhj', 'gfjhdfj', 'dfgjhdf', 'jdhfj', 'fghjdfjdfjhdfj', 'jhhfgjhgj', '2014-01-10 18:40:38', 1),
(15, 8, 2, 'hjfdhj', 'dfrtgjhdfgjhj', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-10 18:40:38', 1),
(16, 8, 4, '', '', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-10 18:40:38', 1),
(59, 30, 1, '28 Express', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', 0, 0, 'Good', 'Good', 'Good', 'Good', 1, 'Good', 'yes', 'Yes', 'Yes', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', '0.7 M', 'Good', 'Good', 'Good', '29"', 'Good', 'Yes', 'Good', 'Good', 'Good', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', '2014-01-25 14:56:41', 1),
(60, 41, 1, 'Dockside Power ', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', 0, 0, 'Good', 'Good', 'Good', 'Good', 1, 'Good', 'yes', 'Yes', 'Yes', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', '0.7 M', 'Good', 'Good', 'Good', '29"', 'Good', 'Yes', 'Good', 'Good', 'Good', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', '', '2014-01-25 15:08:27', 1),
(61, 41, 2, 'เจือพาวเวอร์', 'จำ dolor นั่ง Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ยูทาห์ laoreet dolore Magna ประมวลข้อมูลยานพาหนะ erat Ut WISI enim ...', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-25 15:08:27', 1),
(62, 41, 4, 'Dockside puissance', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy NIBH euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...', 0, 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-25 15:08:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_equipments`
--

CREATE TABLE IF NOT EXISTS `boat_equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `eq_value` double NOT NULL,
  `eq_type` varchar(200) NOT NULL,
  `eq_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`boat_id`,`equipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `boat_fuel_tank`
--

CREATE TABLE IF NOT EXISTS `boat_fuel_tank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `fuel_tank_id` int(11) NOT NULL,
  `default_tank` tinyint(1) NOT NULL,
  `tank_price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `boat_images`
--

CREATE TABLE IF NOT EXISTS `boat_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `images` varchar(500) NOT NULL,
  `gallery_type_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `boat_images`
--

INSERT INTO `boat_images` (`id`, `boat_id`, `images`, `gallery_type_id`, `status`) VALUES
(1, 4, 'media/boats/4/gallery/28657boat-01.jpg', 0, 1),
(2, 4, 'media/boats/4/gallery/18390Boats-Luxury-yacht-1.jpg', 0, 1),
(3, 4, 'media/boats/4/gallery/31319canal_boat_trips_london.jpg', 0, 1),
(4, 4, 'media/boats/4/gallery/18756mercuriaLARGE.jpg', 0, 1),
(5, 4, 'media/boats/4/gallery/6701url.jpg', 0, 1),
(12, 30, 'media/boats/30/gallery/1231820131009_163311.jpg', 0, 1),
(13, 30, 'media/boats/30/gallery/208883435218SPORT_MAIN-1.jpg', 0, 1),
(14, 30, 'media/boats/30/gallery/41060847718SPORT_MAIN-2.jpg', 0, 1),
(15, 30, 'media/boats/30/gallery/179457334218SPORT_MAIN-3.jpg', 0, 1),
(16, 30, 'media/boats/30/gallery/11330250872300-DualUltraLounges2-310x520.jpg', 0, 1),
(17, 30, 'media/boats/30/gallery/1653366903324072_p_t_640x480_image02.jpg', 0, 1),
(18, 30, 'media/boats/30/gallery/27360982820131009_163129.jpg', 0, 1),
(19, 30, 'media/boats/30/gallery/197627736518SPORT_MAIN-1.jpg', 0, 1),
(20, 30, 'media/boats/30/gallery/212213106918SPORT_MAIN-2.jpg', 0, 1),
(21, 30, 'media/boats/30/gallery/63150941618SPORT_MAIN-3.jpg', 0, 1),
(22, 30, 'media/boats/30/gallery/1635947502300-DualUltraLounges2-310x520.jpg', 0, 1),
(23, 30, 'media/boats/30/gallery/1185914121324072_p_t_640x480_image02.jpg', 0, 1),
(24, 30, 'media/boats/30/gallery/97397881320131009_163129.jpg', 0, 1),
(25, 41, 'media/boats/41/gallery/806534571324072_p_t_640x480_image02.jpg', 0, 1),
(26, 41, 'media/boats/41/gallery/181021661918SPORT_MAIN-1.jpg', 0, 1),
(27, 41, 'media/boats/41/gallery/5209948718SPORT_MAIN-2.jpg', 0, 1),
(28, 41, 'media/boats/41/gallery/161214317018SPORT_MAIN-3.jpg', 0, 1),
(29, 41, 'media/boats/41/gallery/5760269832300-DualUltraLounges2-310x520.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_overviews`
--

CREATE TABLE IF NOT EXISTS `boat_overviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `beam` int(11) NOT NULL,
  `fuel_capacity` int(11) NOT NULL,
  `men_capacity` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_status` int(11) NOT NULL,
  `pay_status` tinyint(1) NOT NULL,
  `booking_date` datetime NOT NULL,
  `cancel_date` datetime NOT NULL,
  `cancel_status` tinyint(1) NOT NULL,
  `no_of_person` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `trip_id`, `trip_schedule_id`, `user_id`, `trip_status`, `pay_status`, `booking_date`, `cancel_date`, `cancel_status`, `no_of_person`, `status`) VALUES
(1, 1, 3, 1, 1, 1, '2014-02-01 16:59:47', '0000-00-00 00:00:00', 0, 2, 1),
(2, 2, 5, 1, 1, 1, '2014-01-29 17:00:20', '0000-00-00 00:00:00', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_equipments`
--

CREATE TABLE IF NOT EXISTS `book_equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`trip_schedule_id`,`equipment_id`,`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `category` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `language_id`, `category`, `description`, `status`) VALUES
(1, 0, 'Other Links', 'for footer links', 1),
(2, 0, 'Address', 'This data shown on only for footer ADDRESS section', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `language_id`, `country_id`, `state_id`, `city`, `status`) VALUES
(1, 1, 1, 1, 'kanpur', 1),
(2, 1, 1, 1, 'lucknow', 1),
(3, 1, 1, 2, 'bhopal', 1),
(4, 1, 1, 2, 'indore', 1),
(5, 1, 4, 0, 'bristol', 1),
(6, 1, 4, 0, 'cambridge', 1),
(7, 1, 2, 0, 'Sydney', 1),
(8, 1, 2, 0, 'Melbourne', 1),
(9, 1, 5, 0, 'Pattaya', 1),
(10, 1, 5, 0, 'Phuket', 1),
(11, 1, 3, 0, 'paris', 1),
(12, 1, 5, 0, 'Koh Taichai', 1),
(13, 1, 3, 0, 'Lyon', 1),
(14, 1, 1, 0, 'goa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `company` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `language_id`, `company`, `logo`, `description`, `date_time`, `status`) VALUES
(1, 1, 'bel', 'images/company/11.jpeg', '<p>\r\n	test only</p>\r\n', '2013-11-19 17:00:04', 1),
(2, 1, 'diveLive', 'images/company/2me.jpg', '<p>\r\n	These type company are total suport live dive to our customer with care.</p>\r\n', '2013-11-21 15:49:59', 1),
(1, 2, 'เบล', 'images/company/11.jpeg', '<p>\r\n	ssdfdf</p>\r\n', '2013-12-04 17:15:57', 1),
(2, 2, 'เบล', 'images/company/2me.jpg', '<p>\r\n	tewwe</p>\r\n', '2013-12-04 17:16:13', 1),
(14, 1, 'com in eng', 'images/company/120.png', '<p>\r\n	ghjfkgh</p>\r\n', '2013-12-16 13:24:30', 1),
(14, 2, 'చిరాగ్గా com', 'images/company/120.png', '<p>\r\n	hjkghjghkjghjk</p>\r\n', '2013-12-16 13:24:30', 1),
(20, 1, 'Express', 'images/company/2300-DualUltraLounges2-310x520.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2014-01-24 18:08:44', 1),
(20, 2, 'Express thai', 'images/company/2300-DualUltraLounges2-310x520.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2014-01-24 18:08:44', 1),
(20, 4, 'Express french', 'images/company/2300-DualUltraLounges2-310x520.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2014-01-24 18:08:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_branch_address`
--

CREATE TABLE IF NOT EXISTS `company_branch_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `street` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `company_branch_address`
--

INSERT INTO `company_branch_address` (`id`, `language_id`, `company_id`, `branch_email`, `mobile`, `phone`, `fax`, `country_id`, `state_id`, `city_id`, `street`, `location`, `address`, `type`, `status`) VALUES
(39, 1, 1, 'abc@gmail.com', '9411950511', '131546', '76876876876', 1, 1, 1, 'dehradoon', 'helth', '1123 road', '', 1),
(40, 1, 1, 'yuytu@tfu.hgkh', '66666666666', '7879', '78978', 1, 2, 1, 'jhkhgj', 'hjkhj', 'hjkhjk', '', 1),
(46, 1, 1, 'gaurav123', 'fdgd', 'dfgd', 'dfgd', 2, 1, 3, 'dfgd', 'dfgd', 'dfgd', '', 1),
(44, 1, 1, 'rtytryttry666666666', 'fgh', 'kjhkh', 'kjhkjhk', 2, 2, 2, 'kjhk', 'mjbgkj', 'kj', '', 1),
(90, 1, 1, 'gaurav7tiwari@rocketmail.com', '919956175946', '919956175946', '666666', 1, 1, 2, 'Lucknow', 'India', 'vikasnagar', '', 1),
(79, 1, 2, '', '', '', '', 0, 0, 0, '', '', '', '', 1),
(50, 1, 1, 'jon@gmail.com', '444444444455', '555555555555', '555555', 3, 1, 2, 'UP', 'vikasnagar', 'Lucknow', '', 1),
(66, 1, 1, 'y@gmail.com', '4444444444', '555555555555', '555555', 3, 2, 3, 'fdgdf', 'dfgdf', 'dfgd', '', 1),
(65, 1, 1, 'wwwwwwwww', '4444444444', '555555555555', 'fdgfdg', 3, 2, 4, 'fdgfd', 'dfgfd', 'fdg', '', 1),
(63, 1, 39, '', '', '', '', 0, 0, 0, '', '', '', '', 1),
(67, 1, 2, 'a@gmail.com', '333333333333', '8778688', '876878', 3, 1, 2, 'fdgdf', 'cxfvgf', 'dsfds', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE IF NOT EXISTS `compare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `user_id`, `trip_id`, `date_time`) VALUES
(3, '2', 1, '2014-01-17 16:57:20'),
(11, '2', 2, '2014-01-17 17:42:57'),
(12, '7', 1, '2014-01-17 17:50:15'),
(13, '7', 2, '2014-01-17 17:50:22'),
(14, '2', 3, '2014-01-18 12:06:02'),
(15, '0', 1, '2014-01-20 14:41:53'),
(16, '0', 3, '2014-01-20 14:42:06'),
(17, '0', 2, '2014-01-20 14:46:46'),
(48, '0oobdvudfo7s5q0j14gvl9t507', 1, '2014-01-20 18:01:49'),
(58, '7b9epj0aa2mu01tne52ln9shj7', 11, '2014-01-21 11:42:32'),
(53, '7b9epj0aa2mu01tne52ln9shj7', 1, '2014-01-21 10:52:16'),
(57, '7b9epj0aa2mu01tne52ln9shj7', 3, '2014-01-21 10:58:01'),
(59, 'ksh4k5cs7rf5rv711af6i0bjp3', 1, '2014-01-21 13:15:24'),
(60, 'ksh4k5cs7rf5rv711af6i0bjp3', 11, '2014-01-21 13:15:34'),
(62, 'ksh4k5cs7rf5rv711af6i0bjp3', 3, '2014-01-21 15:07:41'),
(63, 'ntn7h46g65ih3usqhovrjljsq4', 2, '2014-01-25 15:51:09'),
(64, 'ntn7h46g65ih3usqhovrjljsq4', 3, '2014-01-25 15:51:13'),
(68, '0ev6cb0fudo7ug5jsqeb0j6l46', 1, '2014-01-30 15:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `confic`
--

CREATE TABLE IF NOT EXISTS `confic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `confic_type_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`confic_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `confic`
--

INSERT INTO `confic` (`id`, `confic_type_id`, `title`, `value`) VALUES
(1, 1, 'paging', '50'),
(3, 1, 'default_mail', 'linus.romak@gmail.com'),
(4, 1, 'max_count', '100'),
(5, 2, 'language', '1');

-- --------------------------------------------------------

--
-- Table structure for table `confic_type`
--

CREATE TABLE IF NOT EXISTS `confic_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `confic_type`
--

INSERT INTO `confic_type` (`id`, `name`, `status`) VALUES
(1, 'site', 1),
(2, 'language', 1),
(3, 'trips', 1),
(4, 'boats', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `country` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`),
  UNIQUE KEY `country` (`country`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `language_id`, `country`, `country_code`, `status`) VALUES
(1, 1, 'india', 'INR', 1),
(2, 1, 'australia', 'AUS', 1),
(3, 1, 'France', 'Fr', 1),
(5, 1, 'Thailand', 'THAI', 1),
(5, 2, 'ประเทศไทย', 'THAI', 1),
(4, 1, 'England', 'Eng', 1),
(4, 2, 'อังกฤษ', 'Eng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `last_update` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `language_id`, `title`, `subject`, `content`, `type`, `create_date`, `last_update`, `status`) VALUES
(1, 1, 'hello', 'testmail', '<p>ghjhg</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-23 18:06:32', 0),
(1, 2, 'thai', 'mfdjgjkfd', '<p>ghjg</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-23 18:06:32', 0),
(1, 4, 'frnch', 'frnchhgjg', '<p>ghjg</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-23 18:06:32', 0),
(2, 1, 'tryr', 'rtytr', '<p>tryr</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-23 18:54:42', 1),
(2, 2, 'rty', 'rtyr', '<p>tryr</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-23 18:54:42', 1),
(2, 4, 'juy', 'iuyiu', '<p>yuyiuy</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-23 18:54:42', 1),
(3, 1, 'Forgot Password Change you New Password', 'Forgot Password', '<table border="0" cellspacing="2" class="contact_tab" style="border-color:rgb(241, 241, 241); border-style:solid; color:rgb(68, 68, 68); font-family:arial,helvetica,sans-serif; font-size:12px; line-height:22px; margin:0px; padding:0px; text-align:justify; width:631px">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Address</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>INFRANIX Technologies Pvt. Ltd.<br />\r\n			First Floor, Y-Square, Opp. S.K.Motors, Near Khurram Nagar Girls Inter College, Khurram Nagar, Lucknow - 226022, Uttar Pradesh, INDIA</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Phone</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 0522 - 4081436</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Mobile</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 7860022700, 9450020328</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Fax</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 0522 - 4081436</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Email</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td><a href="mailto:contact@infranix.com" style="color: rgb(139, 0, 0); padding: 0px; margin: 0px; cursor: pointer;">contact@infranix.com</a>,&nbsp;<a href="mailto:infranix@yahoo.co.in" style="color: rgb(139, 0, 0); padding: 0px; margin: 0px; cursor: pointer;">infranix@yahoo.co.in</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Skype ID</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>tauseef.2sidd</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Website</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>www.infranix.com</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3">&lt;iframe width=&quot;425&quot; height=&quot;350&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot; marginheight=&quot;0&quot; marginwidth=&quot;0&quot; src=&quot;https://maps.google.co.in/maps?f=q&amp;amp;source=s_q&amp;amp;hl=en&amp;amp;geocode=&amp;amp;q=Near+Khurram+Nagar+Girls+Inter+College,+Khurram+Nagar,+Lucknow+-+226022,+Uttar+Pradesh,+INDIA&amp;amp;aq=&amp;amp;sll=21.125498,81.914063&amp;amp;sspn=27.002574,33.881836&amp;amp;ie=UTF8&amp;amp;hq=Near+Khurram+Nagar+Girls+Inter+College,+Khurram+Nagar,+Lucknow+-+226022,+Uttar+Pradesh,+INDIA&amp;amp;t=m&amp;amp;ll=26.888695,80.967538&amp;amp;spn=0.006295,0.006295&amp;amp;output=embed&quot;&gt;&lt;/iframe&gt;&lt;br /&gt;&lt;small&gt;&lt;a href=&quot;https://maps.google.co.in/maps?f=q&amp;amp;source=embed&amp;amp;hl=en&amp;amp;geocode=&amp;amp;q=Near+Khurram+Nagar+Girls+Inter+College,+Khurram+Nagar,+Lucknow+-+226022,+Uttar+Pradesh,+INDIA&amp;amp;aq=&amp;amp;sll=21.125498,81.914063&amp;amp;sspn=27.002574,33.881836&amp;amp;ie=UTF8&amp;amp;hq=Near+Khurram+Nagar+Girls+Inter+College,+Khurram+Nagar,+Lucknow+-+226022,+Uttar+Pradesh,+INDIA&amp;amp;t=m&amp;amp;ll=26.888695,80.967538&amp;amp;spn=0.006295,0.006295&quot; style=&quot;color:#0000FF;text-align:left&quot;&gt;View Larger Map&lt;/a&gt;&lt;/small&gt;<br />\r\n			&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'Forget Password', '2014-01-23', '2014-01-24 15:59:01', 0),
(3, 2, 'thai', 'mfdjgjkfd', '<p>tyut</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-24 15:59:02', 0),
(3, 4, 'frnch', 'ytut', '<p>tutyu</p>\r\n', 'Forget Password', '2014-01-23', '2014-01-24 15:59:04', 0),
(4, 1, 'fghfg', 'fghgf', '<p>gfhfg</p>\r\n', 'Registration', '2014-01-23', '2014-01-23 19:34:50', 1),
(4, 2, 'fgh', 'fghfg', '<p>fghf</p>\r\n', 'Registration', '2014-01-23', '2014-01-23 19:34:50', 0),
(4, 4, 'gfhgf', 'fghgf', '<p>fghgf</p>\r\n', 'Registration', '2014-01-23', '2014-01-23 19:34:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `equipment` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `language_id`, `equipment`, `status`) VALUES
(1, 1, 'dive suits', 1),
(1, 2, '????????????????', 1),
(1, 4, 'costumes de plongée', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=330 ;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `language_id`, `provider_id`, `service_id`, `user_id`, `status`) VALUES
(328, 0, 116, 3, 1, 1),
(323, 0, 124, 2, 2, 1),
(291, 0, 94, 1, 2, 1),
(290, 0, 106, 2, 2, 1),
(329, 0, 162, 1, 1, 1),
(298, 0, 124, 18, 1, 1),
(322, 0, 124, 18, 2, 1),
(211, 0, 106, 2, 3, 1),
(320, 0, 124, 3, 2, 1),
(293, 0, 94, 2, 2, 1),
(210, 0, 106, 3, 3, 1),
(292, 0, 94, 3, 2, 1),
(289, 0, 106, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `usertype` int(11) NOT NULL,
  `feed` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `language_id`, `title`, `user_id`, `usertype`, `feed`, `date_time`, `status`) VALUES
(1, 0, 'title', 2, 0, 'Lorem Ipsum doler sit amet. Lorem Ipsum doler sit amet.Lorem Ipsum doler sit amet. Lorem Ipsum doler sit amet. Lorem Ipsumdolersit amet.', '2012-11-30 18:24:58', 1),
(31, 0, 'diclaimer', 31, 2, 'dfg', '2013-03-04 18:05:11', 1),
(8, 0, 'asd', 2, 0, 'asdkj haskjdh kjashd', '2013-01-12 17:51:25', 1),
(7, 0, 'test', 4, 0, 'nice to all', '2013-01-12 17:04:20', 1),
(6, 0, 'my feed', 2, 0, 'hi hello!', '2013-01-12 16:53:27', 1),
(10, 0, 'hi', 2, 0, 'my feed back.', '2013-01-12 18:15:51', 1),
(14, 0, 'test', 94, 1, 'asdas as as das da sad asd', '2013-01-14 16:00:20', 1),
(15, 0, 'test2', 2, 2, 'my work.', '2013-01-14 16:00:55', 1),
(16, 0, 'gdfgdfg', 2, 2, 'dfg', '2013-01-14 16:32:36', 1),
(17, 0, 'gdfgdfg', 2, 2, 'dfg', '2013-01-14 16:32:41', 1),
(18, 0, 'gdfgdfg', 2, 2, 'dfg', '2013-01-14 16:32:42', 1),
(19, 0, 'gdfgdfg', 2, 2, 'dfg', '2013-01-14 16:32:42', 1),
(20, 0, 'gdfgdfg', 2, 2, 'dfg', '2013-01-14 16:32:43', 1),
(21, 0, 'gdfgdfg', 2, 2, 'dfg', '2013-01-14 16:32:44', 1),
(22, 0, 'dfg', 2, 2, 'dfgdfgf', '2013-01-14 16:34:16', 1),
(24, 0, 'change', 94, 1, 'askdj askj dkasj klajslk jasl dkajskd', '2013-01-14 16:36:50', 1),
(25, 0, 'new one', 2, 2, 'asd as as d', '2013-01-15 12:50:10', 1),
(26, 0, 'test mode', 94, 1, 'ok ok ok ok ok ok ', '2013-01-16 12:20:32', 1),
(32, 0, 'hi liten', 2, 2, 'hello hi how r u?just chill...', '2013-03-19 12:48:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_tank`
--

CREATE TABLE IF NOT EXISTS `fuel_tank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fuel_tank` varchar(200) NOT NULL,
  `staus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fuel_tank`
--

INSERT INTO `fuel_tank` (`id`, `fuel_tank`, `staus`) VALUES
(1, '12 Lit tank', 1),
(2, '15 Lit tank', 1),
(3, '20 Lt Fuel Tank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_type`
--

CREATE TABLE IF NOT EXISTS `gallery_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deff` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `content`, `icon`, `deff`, `date_time`, `status`) VALUES
(1, 'English', '', 1, '2013-11-30 18:18:59', 1),
(2, 'Thai', '', 0, '2013-11-30 18:21:33', 1),
(4, 'French', '', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `menutype` varchar(200) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `language_id`, `menutype`, `title`, `link`, `content`, `date_time`, `status`) VALUES
(1, 1, 'top', 'Contact Us', 'index.php?control=menu&id=1', '<table border="0" cellspacing="2" class="contact_tab" style="border:1px solid rgb(241, 241, 241); color:rgb(68, 68, 68); font-family:arial,helvetica,sans-serif; font-size:12px; line-height:22px; margin:0px; padding:0px; text-align:justify; width:631px">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Address</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>INFRANIX Technologies Pvt. Ltd.<br />\r\n			First Floor, Y-Square, Opp. S.K.Motors, Near Khurram Nagar Girls Inter College, Khurram Nagar, Lucknow - 226022, Uttar Pradesh, INDIA</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Phone</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 0522 - 4081436</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Mobile</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 7860022700, 9450020328</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Fax</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 0522 - 4081436</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Email</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td><a href="mailto:contact@infranix.com" style="padding: 0px; margin: 0px; color: rgb(139, 0, 0); cursor: pointer;">contact@infranix.com</a>,&nbsp;<a href="mailto:infranix@yahoo.co.in" style="padding: 0px; margin: 0px; color: rgb(139, 0, 0); cursor: pointer;">infranix@yahoo.co.in</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Skype ID</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>tauseef.2sidd</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Website</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>www.infranix.com</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3"><img alt="INFRANIX Technologies Pvt. Ltd." class="goog_map" src="http://infranix.net/templates/infranix/images/mapBig.jpg" style="border:1px solid rgb(204, 204, 204); margin:6px 0px; padding:1px" title="INFRANIX Technologies Pvt. Ltd." /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2014-01-22 15:08:50', 1),
(3, 4, 'top', 'ghgf', 'index.php?control=menu&id=3', '<p>fghgf</p>\r\n', '2014-01-22 18:03:39', 1),
(3, 2, 'top', 'ghgf', 'index.php?control=menu&id=3', '<p>fghgf</p>\r\n', '2014-01-22 18:03:39', 1),
(3, 1, 'top', 'Why iDiveTrips', 'index.php?control=menu&id=3', '<p>gfhf</p>\r\n', '2014-01-22 18:03:39', 1),
(4, 1, 'footer', 'CURRENT iDIVE PROMOTION', 'index.php?control=menu&id=4', '<p>fdgdfdfgd</p>\r\n', '2014-01-22 18:33:35', 1),
(4, 2, '', '', 'index.php?control=menu&id=4', '', '2014-01-22 18:33:35', 1),
(4, 4, '', '', 'index.php?control=menu&id=4', '', '2014-01-22 18:33:35', 1),
(5, 1, 'footer', 'FEATURED BOAT', 'index.php?control=menu&id=5', '<p>en</p>\r\n', '2014-01-23 14:52:22', 1),
(5, 2, 'footer', 'ths', 'index.php?control=menu&id=5', '<p>th</p>\r\n', '2014-01-23 14:52:22', 1),
(5, 4, 'footer', 'frs', 'index.php?control=menu&id=5', '<p>fr</p>\r\n', '2014-01-23 14:52:22', 1),
(6, 1, 'footer', 'A FAMILY COMPANY', 'index.php?control=menu&id=6', '<p>ghj</p>\r\n', '2014-01-23 15:04:03', 1),
(6, 2, 'footer', 'ghjjhkj', 'index.php?control=menu&id=6', '<p>ghjkjhkhjk</p>\r\n', '2014-01-23 15:04:03', 1),
(6, 4, 'footer', 'retret', 'index.php?control=menu&id=6', '<p>jhkjhkhj</p>\r\n', '2014-01-23 15:04:03', 1),
(7, 1, 'footer', 'iDIVE COMMUNITY', 'index.php?control=menu&id=7', '<p>Reference site about <em>Lorem Ipsum</em>, giving information on its origins, as well as a random <em>Lipsum</em> generator.</p>\r\n', '2014-01-23 15:38:31', 1),
(7, 2, 'footer', '', 'index.php?control=menu&id=7', '', '2014-01-23 15:38:31', 1),
(7, 4, 'footer', '', 'index.php?control=menu&id=7', '', '2014-01-23 15:38:31', 1),
(8, 1, 'footer', 'iDIVE TOUR', 'index.php?control=menu&id=8', '<p>Reference site about <em>Lorem Ipsum</em>, giving information on its origins, as well as a random <em>Lipsum</em> generator.</p>\r\n', '2014-01-23 15:38:36', 1),
(8, 2, '', '', 'index.php?control=menu&id=8', '', '2014-01-23 15:38:36', 1),
(8, 4, '', '', 'index.php?control=menu&id=8', '', '2014-01-23 15:38:36', 1),
(9, 1, 'footer', 'CONTACT', 'index.php?control=menu&id=9', '<p>Reference site about <em>Lorem Ipsum</em>, giving information on its origins, as well as a random <em>Lipsum</em> generator.</p>\r\n', '2014-01-23 15:39:54', 1),
(9, 2, '', '', 'index.php?control=menu&id=9', '', '2014-01-23 15:39:54', 1),
(9, 4, '', '', 'index.php?control=menu&id=9', '', '2014-01-23 15:39:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `news` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `language_id`, `title`, `user_id`, `news`, `date_time`, `status`) VALUES
(1, 0, 'News Heading', 1, 'Contrary to popular belief, ', '2013-01-04 16:14:38', 1),
(9, 0, 'Ajj Tak', 1, 'If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc...', '2013-01-25 17:29:52', 1),
(6, 0, 'News Heading ', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicin..', '2012-12-20 12:31:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newslwtters`
--

CREATE TABLE IF NOT EXISTS `newslwtters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `subject` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_send_date` datetime NOT NULL,
  `send_status` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `newslwtters`
--

INSERT INTO `newslwtters` (`id`, `language_id`, `subject`, `message`, `create_date`, `last_update_date`, `last_send_date`, `send_status`, `status`) VALUES
(1, 0, 'asdasda', '<p>\r\n	hi hw are you???????????</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '2013-01-16 11:22:47', '2013-02-18 11:14:40', '2013-04-01 12:25:12', 0, 1),
(9, 0, 'fhhhhgfh', '<p>\r\n	hjhjjjhjhjhjhjhjhjh</p>\r\n', '2013-01-25 12:14:25', '0000-00-00 00:00:00', '2013-04-01 11:53:38', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE IF NOT EXISTS `operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `first_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_trip_manager` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `manager_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_trip_branch` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `join_date` datetime NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `language_id`, `company_id`, `first_name`, `last_name`, `email`, `email_trip_manager`, `manager_name`, `email_trip_branch`, `branch_name`, `join_date`, `description`, `latitude`, `longitude`, `status`) VALUES
(1, 1, 1, 'laravel', 'frame', 'laravel54321@gmail.com', 'laravel@yahoo.com', 'billy ferno', 'biltinF54@gmail.com', 'Centero', '2014-01-05 00:00:00', 'testing operators description', 26.726347623874, 100.27836472364, 1),
(5, 1, 2, 'Vessel', 'Type', 'admin@gmail.com', 'admin@gmail.com', 'Jon', 'admin@gmail.com', 'vijan', '2014-01-13 00:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, NULL, 1),
(6, 1, 2, 'Marina', 'Militare', 'sunkumgfhar88@gmail.com', 'admin@gmail.com', 'Mary', 'admin@gmail.com', 'Marlo', '1970-01-01 00:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oprator_address`
--

CREATE TABLE IF NOT EXISTS `oprator_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `mobile` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `page` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `language_id`, `category_id`, `page`, `link`, `content`, `type`, `date_time`, `status`) VALUES
(1, 0, 1, 'Home', 'http://gmail.com', '  ', 1, '2013-01-02 00:00:00', 0),
(2, 0, 1, 'Contact us', 'index.php?control=page&id=2', '<p>\r\n	contact us&nbsp;</p>\r\n', 0, '2013-01-01 00:00:00', 1),
(3, 0, 1, 'About Us', 'index.php?control=page&id=3', ' Lorem Ipsum doler sit amet. Lorem Ipsum doler sit amet.Lorem Ipsum doler sit amet. Lorem Ipsum doler sit amet. Lorem Ipsumdolersit amet.\r\n\r\n\r\nFirst Floor, Y-Square, Opposite S.K. Motors, Khurram Nagar, Lucknow - 226022, Uttar Pradesh, INDIA\r\nPhone : +91 - 0522 - 4081436\r\nEmail   : contact@infranix.com\r\nSkype : tauseef.2sidd', 0, '2012-12-31 00:00:00', 1),
(31, 0, 1, 'disclaimer', 'http://label9420.org/tradeallstar/index.php?control=page&id=31', '<p>\r\n	<span style="font-family: Arial, Helvetica, sans-serif; font-style: italic; line-height: 18px; text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially u</span><span style="color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; font-style: italic; line-height: 18px; text-align: justify;">nchanged.</span></p>\r\n', 0, '2013-01-17 17:45:22', 1),
(44, 0, 1, 'Mobile service', 'http://label9420.org/tradeallstar/index.php?control=page&id=44', '', 1, '2013-01-21 18:17:49', 1),
(49, 0, 1, 'service', 'http://google.com', '', 1, '2013-01-22 13:58:13', 1),
(50, 0, 1, 'new content', 'http://label9420.org/tradeallstar/index.php?control=page&id=50', '<p>\r\n	hi dear.</p>\r\n', 0, '2013-01-22 13:58:44', 1),
(57, 0, 1, 'sdod', 'http://localhost/sprovider/index.php?control=page&id=57&tmpid=6', '<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span></span></p>\r\n', 0, '2013-01-30 18:11:56', 1),
(35, 0, 2, 'Address', 'http://localhost/sprovider/index.php?control=page&id=58&tmpid=6', '<p>\r\n	<span style="font-size: 8pt; line-height: 18px; background-color: rgb(33, 33, 33); color: rgb(123, 123, 123); font-family: Arial, Helvetica, sans-serif;">First Floor, Y-Square, Opposite S.K. Motors, Khurram Nagar, Lucknow - 226022, Uttar Pradesh, INDIA</span></p>\r\n<p style="padding: 5px 0px; margin: 0px; color: rgb(123, 123, 123); background-image: url(http://localhost/sprovider/template/sp_template/images/bod_bot.png); background-color: rgb(33, 33, 33); font-family: Arial, Helvetica, sans-serif; font-size: 16px; background-position: 50% 100%; background-repeat: repeat no-repeat;">\r\n	<span style="padding: 0px; margin: 0px; font-size: 8pt; line-height: 18px;"><label class="lab_for" for="Phone" style="padding: 0px; margin: 0px; width: 100px; text-align: right;"><strong style="padding: 0px; margin: 0px;">Phone&nbsp;</strong>:</label>&nbsp;<label for="number" style="padding: 0px; margin: 0px;">+91 - 0522 - 4081436</label></span></p>\r\n', 0, '2013-02-12 15:26:56', 1),
(59, 0, 1, 'test', 'http://localhost/sprovider/index.php?control=page&id=59&tmpid=6', '<p>\r\n	vbnvbn vb nvn&nbsp;</p>\r\n', 0, '2013-02-20 12:38:47', 1),
(56, 0, 1, 'check', 'http://localhost/sprovider/index.php?control=page&id=56&tmpid=6', '<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc<br />\r\n	<br />\r\n	<span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span></span></span></p>\r\n', 0, '2013-01-30 18:03:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE IF NOT EXISTS `paypal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_id` varchar(200) NOT NULL,
  `txn_type` varchar(200) NOT NULL,
  `subscr_id` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `residence_country` varchar(200) NOT NULL,
  `mc_currency` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `business` varchar(200) NOT NULL,
  `amount3` varchar(200) NOT NULL,
  `address_street` varchar(200) NOT NULL,
  `verify_sign` varchar(200) NOT NULL,
  `payer_status` varchar(200) NOT NULL,
  `test_ipn` varchar(200) NOT NULL,
  `payer_email` varchar(200) NOT NULL,
  `address_status` varchar(200) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `address_country_code` varchar(200) NOT NULL,
  `payer_id` varchar(200) NOT NULL,
  `address_city` varchar(200) NOT NULL,
  `reattempt` varchar(200) NOT NULL,
  `item_number` varchar(200) NOT NULL,
  `address_state` varchar(200) NOT NULL,
  `subscr_date` varchar(200) NOT NULL,
  `address_zip` varchar(200) NOT NULL,
  `charset` varchar(200) NOT NULL,
  `notify_version` varchar(200) NOT NULL,
  `period3` varchar(200) NOT NULL,
  `address_country` varchar(200) NOT NULL,
  `mc_amount3` varchar(200) NOT NULL,
  `address_name` varchar(200) NOT NULL,
  `ipn_track_id` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `language_id`, `country_id`, `state`, `status`) VALUES
(1, 1, 1, 'uttar pradesh', 1),
(2, 1, 1, 'madyapradesh', 1),
(3, 1, 2, 'malbourn', 1),
(4, 1, 2, 'sydney', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy`
--

CREATE TABLE IF NOT EXISTS `taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `keyword` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=182 ;

--
-- Dumping data for table `taxonomy`
--

INSERT INTO `taxonomy` (`id`, `language_id`, `keyword`, `description`, `date_time`, `status`) VALUES
(1, 1, 'companies', '', '0000-00-00 00:00:00', 1),
(3, 1, 'show_entries', '', '2013-12-03 13:26:42', 1),
(4, 1, 'taxonomy', '', '2013-12-03 13:51:35', 1),
(5, 1, 'add_new', '', '2013-12-03 13:51:38', 1),
(6, 0, 'cvbcvbcvb', '', '2013-12-03 14:57:23', 1),
(7, 0, 'asdasd', '', '2013-12-12 16:43:08', 1),
(8, 0, 'boats', '', '2013-12-12 18:11:49', 1),
(9, 1, 'add_new', '', '0000-00-00 00:00:00', 1),
(10, 0, 'general_info', '', '2014-01-02 12:41:12', 1),
(11, 0, ' Click to Deactive', '', '0000-00-00 00:00:00', 1),
(12, 0, ' Edit', '', '0000-00-00 00:00:00', 1),
(13, 0, 'Click to Deactive', '', '0000-00-00 00:00:00', 1),
(14, 0, 'Edit', '', '0000-00-00 00:00:00', 1),
(15, 0, 'News & Announcements', '', '0000-00-00 00:00:00', 1),
(16, 0, 'ADD NEW', '', '0000-00-00 00:00:00', 1),
(17, 0, 'Phone No', '', '0000-00-00 00:00:00', 1),
(18, 0, 'Confirm Password', '', '0000-00-00 00:00:00', 1),
(19, 0, 'New Password', '', '0000-00-00 00:00:00', 1),
(20, 0, 'Old Password', '', '0000-00-00 00:00:00', 1),
(21, 0, 'Subscribe', '', '0000-00-00 00:00:00', 1),
(22, 0, 'Nationality', '', '0000-00-00 00:00:00', 1),
(23, 0, 'Mobile No', '', '0000-00-00 00:00:00', 1),
(24, 0, 'City', '', '0000-00-00 00:00:00', 1),
(25, 0, 'State', '', '0000-00-00 00:00:00', 1),
(26, 0, 'Gender', '', '0000-00-00 00:00:00', 1),
(27, 0, 'DOB', '', '0000-00-00 00:00:00', 1),
(28, 0, 'Email-ID', '', '0000-00-00 00:00:00', 1),
(29, 0, 'Last Name', '', '0000-00-00 00:00:00', 1),
(30, 0, 'First Name', '', '0000-00-00 00:00:00', 1),
(31, 0, 'Contact Detail', '', '0000-00-00 00:00:00', 1),
(32, 0, 'Personal Detail', '', '0000-00-00 00:00:00', 1),
(33, 0, 'My Profile', '', '0000-00-00 00:00:00', 1),
(34, 0, 'Qr Code', '', '0000-00-00 00:00:00', 1),
(35, 0, 'Users', '', '0000-00-00 00:00:00', 1),
(36, 0, 'Languages', '', '0000-00-00 00:00:00', 1),
(37, 0, 'Promotions', '', '0000-00-00 00:00:00', 1),
(38, 0, 'Statistics', '', '0000-00-00 00:00:00', 1),
(39, 0, 'Announcements', '', '0000-00-00 00:00:00', 1),
(40, 0, 'Contacts', '', '0000-00-00 00:00:00', 1),
(41, 0, 'Contact', '', '0000-00-00 00:00:00', 1),
(42, 0, 'User Detail', '', '0000-00-00 00:00:00', 1),
(43, 0, 'Total Users', '', '0000-00-00 00:00:00', 1),
(44, 0, 'Search', '', '0000-00-00 00:00:00', 1),
(45, 0, 'Rate', '', '0000-00-00 00:00:00', 1),
(46, 0, 'My Office', '', '0000-00-00 00:00:00', 1),
(47, 0, 'Actions', '', '0000-00-00 00:00:00', 1),
(48, 0, 'Title', '', '0000-00-00 00:00:00', 1),
(49, 0, 'Promotions', '', '0000-00-00 00:00:00', 1),
(50, 0, 'Show Entries', '', '0000-00-00 00:00:00', 1),
(51, 0, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(52, 0, 'Change Password', '', '0000-00-00 00:00:00', 1),
(53, 0, 'New Users', '', '0000-00-00 00:00:00', 1),
(54, 0, 'Active Users', '', '0000-00-00 00:00:00', 1),
(55, 0, 'Deactive Users', '', '0000-00-00 00:00:00', 1),
(56, 0, 'Mail / Message', '', '0000-00-00 00:00:00', 1),
(57, 0, 'Total Messages', '', '0000-00-00 00:00:00', 1),
(58, 0, 'New Messages', '', '0000-00-00 00:00:00', 1),
(59, 0, 'ending Messages', '', '0000-00-00 00:00:00', 1),
(60, 0, 'Notifications', '', '0000-00-00 00:00:00', 1),
(61, 0, 'Total Visits', '', '0000-00-00 00:00:00', 1),
(62, 0, 'New Visits', '', '0000-00-00 00:00:00', 1),
(63, 0, 'New Posts', '', '0000-00-00 00:00:00', 1),
(64, 0, 'Report Abuse', '', '0000-00-00 00:00:00', 1),
(65, 0, 'Account Settings', '', '0000-00-00 00:00:00', 1),
(66, 0, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(67, 0, 'Change Password', '', '0000-00-00 00:00:00', 1),
(68, 0, 'Welcome', '', '0000-00-00 00:00:00', 1),
(69, 0, 'User ID', '', '0000-00-00 00:00:00', 1),
(70, 0, 'Name', '', '0000-00-00 00:00:00', 1),
(71, 0, 'Email', '', '0000-00-00 00:00:00', 1),
(72, 0, 'Country', '', '0000-00-00 00:00:00', 1),
(73, 0, 'Contact Us', '', '0000-00-00 00:00:00', 1),
(74, 0, 'About Us', '', '0000-00-00 00:00:00', 1),
(75, 0, 'Articles', '', '0000-00-00 00:00:00', 1),
(76, 0, 'News Letters', '', '0000-00-00 00:00:00', 1),
(77, 0, 'Templates', '', '0000-00-00 00:00:00', 1),
(78, 0, 'Iframes', '', '0000-00-00 00:00:00', 1),
(79, 0, 'Subject', '', '0000-00-00 00:00:00', 1),
(80, 0, 'Design for', '', '0000-00-00 00:00:00', 1),
(81, 0, 'Quick Links', '', '0000-00-00 00:00:00', 1),
(82, 0, 'Preview', '', '0000-00-00 00:00:00', 1),
(83, 0, 'Mobile', '', '0000-00-00 00:00:00', 1),
(84, 0, 'Phone', '', '0000-00-00 00:00:00', 1),
(85, 0, 'Thumb Image', '', '0000-00-00 00:00:00', 1),
(86, 0, 'Image', '', '0000-00-00 00:00:00', 1),
(87, 0, 'Add', '', '0000-00-00 00:00:00', 1),
(88, 0, 'Dashboard', '', '0000-00-00 00:00:00', 1),
(89, 0, 'EDIT', '', '0000-00-00 00:00:00', 1),
(90, 0, 'Address', '', '0000-00-00 00:00:00', 1),
(91, 0, 'Content', '', '0000-00-00 00:00:00', 1),
(92, 0, 'Show on home', '', '0000-00-00 00:00:00', 1),
(93, 0, 'Zip Code', '', '0000-00-00 00:00:00', 1),
(94, 0, 'Gallery', '', '0000-00-00 00:00:00', 1),
(95, 0, 'Call Center', '', '0000-00-00 00:00:00', 1),
(96, 0, 'View Map', '', '0000-00-00 00:00:00', 1),
(97, 0, '', '', '0000-00-00 00:00:00', 1),
(98, 0, 'Click to Deactive', '', '0000-00-00 00:00:00', 1),
(99, 0, 'Edit', '', '0000-00-00 00:00:00', 1),
(100, 0, 'News & Announcements', '', '0000-00-00 00:00:00', 1),
(101, 0, 'ADD NEW', '', '0000-00-00 00:00:00', 1),
(102, 0, 'Phone No', '', '0000-00-00 00:00:00', 1),
(103, 0, 'Confirm Password', '', '0000-00-00 00:00:00', 1),
(104, 0, 'New Password', '', '0000-00-00 00:00:00', 1),
(105, 0, 'Old Password', '', '0000-00-00 00:00:00', 1),
(106, 0, 'Subscribe', '', '0000-00-00 00:00:00', 1),
(107, 0, 'Nationality', '', '0000-00-00 00:00:00', 1),
(108, 0, 'Mobile No', '', '0000-00-00 00:00:00', 1),
(109, 0, 'City', '', '0000-00-00 00:00:00', 1),
(110, 0, 'State', '', '0000-00-00 00:00:00', 1),
(111, 0, 'Gender', '', '0000-00-00 00:00:00', 1),
(112, 0, 'DOB', '', '0000-00-00 00:00:00', 1),
(113, 0, 'Email-ID', '', '0000-00-00 00:00:00', 1),
(114, 0, 'Last Name', '', '0000-00-00 00:00:00', 1),
(115, 0, 'First Name', '', '0000-00-00 00:00:00', 1),
(116, 0, 'Contact Detail', '', '0000-00-00 00:00:00', 1),
(117, 0, 'Personal Detail', '', '0000-00-00 00:00:00', 1),
(118, 0, 'My Profile', '', '0000-00-00 00:00:00', 1),
(119, 0, 'Qr Code', '', '0000-00-00 00:00:00', 1),
(120, 0, 'Users', '', '0000-00-00 00:00:00', 1),
(121, 0, 'Languages', '', '0000-00-00 00:00:00', 1),
(122, 0, 'Promotions', '', '0000-00-00 00:00:00', 1),
(123, 0, 'Statistics', '', '0000-00-00 00:00:00', 1),
(124, 0, 'Announcements', '', '0000-00-00 00:00:00', 1),
(125, 0, 'Contacts', '', '0000-00-00 00:00:00', 1),
(126, 0, 'Contact', '', '0000-00-00 00:00:00', 1),
(127, 0, 'User Detail', '', '0000-00-00 00:00:00', 1),
(128, 0, 'Total Users', '', '0000-00-00 00:00:00', 1),
(129, 0, 'Search', '', '0000-00-00 00:00:00', 1),
(130, 0, 'Rate', '', '0000-00-00 00:00:00', 1),
(131, 0, 'My Office', '', '0000-00-00 00:00:00', 1),
(132, 0, 'Actions', '', '0000-00-00 00:00:00', 1),
(133, 0, 'Title', '', '0000-00-00 00:00:00', 1),
(134, 0, 'Promotions', '', '0000-00-00 00:00:00', 1),
(135, 0, 'Show Entries', '', '0000-00-00 00:00:00', 1),
(136, 0, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(137, 0, 'Change Password', '', '0000-00-00 00:00:00', 1),
(138, 0, 'New Users', '', '0000-00-00 00:00:00', 1),
(139, 0, 'Active Users', '', '0000-00-00 00:00:00', 1),
(140, 0, 'Deactive Users', '', '0000-00-00 00:00:00', 1),
(141, 0, 'Mail / Message', '', '0000-00-00 00:00:00', 1),
(142, 0, 'Total Messages', '', '0000-00-00 00:00:00', 1),
(143, 0, 'New Messages', '', '0000-00-00 00:00:00', 1),
(144, 0, 'ending Messages', '', '0000-00-00 00:00:00', 1),
(145, 0, 'Notifications', '', '0000-00-00 00:00:00', 1),
(146, 0, 'Total Visits', '', '0000-00-00 00:00:00', 1),
(147, 0, 'New Visits', '', '0000-00-00 00:00:00', 1),
(148, 0, 'New Posts', '', '0000-00-00 00:00:00', 1),
(149, 0, 'Report Abuse', '', '0000-00-00 00:00:00', 1),
(150, 0, 'Account Settings', '', '0000-00-00 00:00:00', 1),
(151, 0, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(152, 0, 'Change Password', '', '0000-00-00 00:00:00', 1),
(153, 0, 'Welcome', '', '0000-00-00 00:00:00', 1),
(154, 0, 'User ID', '', '0000-00-00 00:00:00', 1),
(155, 0, 'Name', '', '0000-00-00 00:00:00', 1),
(156, 0, 'Email', '', '0000-00-00 00:00:00', 1),
(157, 0, 'Country', '', '0000-00-00 00:00:00', 1),
(158, 0, 'Contact Us', '', '0000-00-00 00:00:00', 1),
(159, 0, 'About Us', '', '0000-00-00 00:00:00', 1),
(160, 0, 'Articles', '', '0000-00-00 00:00:00', 1),
(161, 0, 'News Letters', '', '0000-00-00 00:00:00', 1),
(162, 0, 'Templates', '', '0000-00-00 00:00:00', 1),
(163, 0, 'Iframes', '', '0000-00-00 00:00:00', 1),
(164, 0, 'Subject', '', '0000-00-00 00:00:00', 1),
(165, 0, 'Design for', '', '0000-00-00 00:00:00', 1),
(166, 0, 'Quick Links', '', '0000-00-00 00:00:00', 1),
(167, 0, 'Preview', '', '0000-00-00 00:00:00', 1),
(168, 0, 'Mobile', '', '0000-00-00 00:00:00', 1),
(169, 0, 'Phone', '', '0000-00-00 00:00:00', 1),
(170, 0, 'Thumb Image', '', '0000-00-00 00:00:00', 1),
(171, 0, 'Image', '', '0000-00-00 00:00:00', 1),
(172, 0, 'Add', '', '0000-00-00 00:00:00', 1),
(173, 0, 'Dashboard', '', '0000-00-00 00:00:00', 1),
(174, 0, 'EDIT', '', '0000-00-00 00:00:00', 1),
(175, 0, 'Address', '', '0000-00-00 00:00:00', 1),
(176, 0, 'Content', '', '0000-00-00 00:00:00', 1),
(177, 0, 'Show on home', '', '0000-00-00 00:00:00', 1),
(178, 0, 'Zip Code', '', '0000-00-00 00:00:00', 1),
(179, 0, 'Gallery', '', '0000-00-00 00:00:00', 1),
(180, 0, 'Call Center', '', '0000-00-00 00:00:00', 1),
(181, 0, 'View Map', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy_content`
--

CREATE TABLE IF NOT EXISTS `taxonomy_content` (
  `taxonomy_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`taxonomy_id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `taxonomy_content`
--

INSERT INTO `taxonomy_content` (`taxonomy_id`, `language_id`, `content`, `date_time`, `status`) VALUES
(1, 1, 0x436f6d70616e696573, '2013-12-13 11:12:58', 1),
(1, 2, 0xe0b89ae0b8a3e0b8b4e0b8a9e0b8b1e0b897, '2013-12-02 13:37:10', 1),
(3, 1, 0x53686f7720456e7472696573, '2013-12-03 13:27:14', 1),
(3, 2, 0xe0b981e0b8aae0b894e0b887e0b8a3e0b8b2e0b8a2e0b881e0b8b2e0b8a3, '2013-12-03 13:27:18', 1),
(4, 1, 0x5461786f6e6f6d79, '2013-12-03 13:57:09', 1),
(4, 2, 0xe0b8ade0b899e0b8b8e0b881e0b8a3e0b8a1e0b8a7e0b8b4e0b898e0b8b2e0b899, '2013-12-03 13:57:12', 1),
(6, 1, 0x637662637662637662, '2013-12-03 14:57:23', 1),
(5, 1, 0x416464204e6577, '2013-12-03 14:58:26', 1),
(5, 2, 0xe0b980e0b89ee0b8b4e0b988e0b8a1e0b8a3e0b8b2e0b8a2e0b881e0b8b2e0b8a3e0b983e0b8abe0b8a1e0b988, '2013-12-03 14:58:20', 1),
(7, 1, 0x617364617364, '2013-12-12 16:43:08', 1),
(8, 1, 0x626f617473, '2013-12-12 18:12:07', 1),
(9, 1, 0x416464204e6577, NULL, 1),
(9, 2, 0xe0b980e0b89ee0b8b4e0b988e0b8a1e0b8a3e0b8b2e0b8a2e0b881e0b8b2e0b8a3e0b983e0b8abe0b8a1e0b988, NULL, 1),
(10, 1, 0x47656e6572616c20496e666f, '2014-01-02 12:41:12', 1),
(11, 2, 0x20436c69636b20746f204465616374697665, NULL, 1),
(12, 2, 0x2045646974, NULL, 1),
(13, 1, 0x20436c69636b20746f204465616374697665, NULL, 1),
(14, 1, 0x2045646974, NULL, 1),
(13, 4, 0x436c69636b20746f204465616374697665, NULL, 1),
(14, 4, 0x45646974, NULL, 1),
(15, 4, 0x4e657773202620416e6e6f756e63656d656e7473, NULL, 1),
(16, 4, 0x414444204e4557, NULL, 1),
(17, 4, 0x50686f6e65204e6f, NULL, 1),
(18, 4, 0x436f6e6669726d2050617373776f7264, NULL, 1),
(19, 4, 0x4e65772050617373776f7264, NULL, 1),
(20, 4, 0x4f6c642050617373776f7264, NULL, 1),
(21, 4, 0x537562736372696265, NULL, 1),
(22, 4, 0x4e6174696f6e616c697479, NULL, 1),
(23, 4, 0x4d6f62696c65204e6f, NULL, 1),
(24, 4, 0x43697479, NULL, 1),
(25, 4, 0x5374617465, NULL, 1),
(26, 4, 0x47656e646572, NULL, 1),
(27, 4, 0x444f42, NULL, 1),
(28, 4, 0x456d61696c2d4944, NULL, 1),
(29, 4, 0x4c617374204e616d65, NULL, 1),
(30, 4, 0x4669727374204e616d65, NULL, 1),
(31, 4, 0x436f6e746163742044657461696c, NULL, 1),
(32, 4, 0x506572736f6e616c2044657461696c, NULL, 1),
(33, 4, 0x4d792050726f66696c65, NULL, 1),
(34, 4, 0x517220436f6465, NULL, 1),
(35, 4, 0x5573657273, NULL, 1),
(36, 4, 0x4c616e677561676573, NULL, 1),
(37, 4, 0x50726f6d6f74696f6e73, NULL, 1),
(38, 4, 0x53746174697374696373, NULL, 1),
(39, 4, 0x416e6e6f756e63656d656e7473, NULL, 1),
(40, 4, 0x436f6e7461637473, NULL, 1),
(41, 4, 0x436f6e74616374, NULL, 1),
(42, 4, 0x557365722044657461696c, NULL, 1),
(43, 4, 0x546f74616c205573657273, NULL, 1),
(44, 4, 0x536561726368, NULL, 1),
(45, 4, 0x52617465, NULL, 1),
(46, 4, 0x4d79204f6666696365, NULL, 1),
(47, 4, 0x416374696f6e73, NULL, 1),
(48, 4, 0x5469746c65, NULL, 1),
(49, 4, 0x50726f6d6f74696f6e73, NULL, 1),
(50, 4, 0x53686f7720456e7472696573, NULL, 1),
(51, 4, 0x45646974204163636f756e74, NULL, 1),
(52, 4, 0x4368616e67652050617373776f7264, NULL, 1),
(53, 4, 0x4e6577205573657273, NULL, 1),
(54, 4, 0x416374697665205573657273, NULL, 1),
(55, 4, 0x4465616374697665205573657273, NULL, 1),
(56, 4, 0x4d61696c202f204d657373616765, NULL, 1),
(57, 4, 0x546f74616c204d65737361676573, NULL, 1),
(58, 4, 0x4e6577204d65737361676573, NULL, 1),
(59, 4, 0x656e64696e67204d65737361676573, NULL, 1),
(60, 4, 0x4e6f74696669636174696f6e73, NULL, 1),
(61, 4, 0x546f74616c20566973697473, NULL, 1),
(62, 4, 0x4e657720566973697473, NULL, 1),
(63, 4, 0x4e657720506f737473, NULL, 1),
(64, 4, 0x5265706f7274204162757365, NULL, 1),
(65, 4, 0x4163636f756e742053657474696e6773, NULL, 1),
(66, 4, 0x45646974204163636f756e74, NULL, 1),
(67, 4, 0x4368616e67652050617373776f7264, NULL, 1),
(68, 4, 0x57656c636f6d65, NULL, 1),
(69, 4, 0x55736572204944, NULL, 1),
(70, 4, 0x4e616d65, NULL, 1),
(71, 4, 0x456d61696c, NULL, 1),
(72, 4, 0x436f756e747279, NULL, 1),
(73, 4, 0x436f6e74616374205573, NULL, 1),
(74, 4, 0x41626f7574205573, NULL, 1),
(75, 4, 0x41727469636c6573, NULL, 1),
(76, 4, 0x4e657773204c657474657273, NULL, 1),
(77, 4, 0x54656d706c61746573, NULL, 1),
(78, 4, 0x496672616d6573, NULL, 1),
(79, 4, 0x5375626a656374, NULL, 1),
(80, 4, 0x44657369676e20666f72, NULL, 1),
(81, 4, 0x517569636b204c696e6b73, NULL, 1),
(82, 4, 0x50726576696577, NULL, 1),
(83, 4, 0x4d6f62696c65, NULL, 1),
(84, 4, 0x50686f6e65, NULL, 1),
(85, 4, 0x5468756d6220496d616765, NULL, 1),
(86, 4, 0x496d616765, NULL, 1),
(87, 4, 0x416464, NULL, 1),
(88, 4, 0x44617368626f617264, NULL, 1),
(89, 4, 0x45444954, NULL, 1),
(90, 4, 0x41646472657373, NULL, 1),
(91, 4, 0x436f6e74656e74, NULL, 1),
(92, 4, 0x53686f77206f6e20686f6d65, NULL, 1),
(93, 4, 0x5a697020436f6465, NULL, 1),
(94, 4, 0x47616c6c657279, NULL, 1),
(95, 4, 0x43616c6c2043656e746572, NULL, 1),
(96, 4, 0x56696577204d6170, NULL, 1),
(97, 4, '', NULL, 1),
(98, 1, 0x436c69636b20746f204465616374697665, NULL, 1),
(99, 1, 0x45646974, NULL, 1),
(100, 1, 0x4e657773202620416e6e6f756e63656d656e7473, NULL, 1),
(101, 1, 0x414444204e4557, NULL, 1),
(102, 1, 0x50686f6e65204e6f, NULL, 1),
(103, 1, 0x436f6e6669726d2050617373776f7264, NULL, 1),
(104, 1, 0x4e65772050617373776f7264, NULL, 1),
(105, 1, 0x4f6c642050617373776f7264, NULL, 1),
(106, 1, 0x537562736372696265, NULL, 1),
(107, 1, 0x4e6174696f6e616c697479, NULL, 1),
(108, 1, 0x4d6f62696c65204e6f, NULL, 1),
(109, 1, 0x43697479, NULL, 1),
(110, 1, 0x5374617465, NULL, 1),
(111, 1, 0x47656e646572, NULL, 1),
(112, 1, 0x444f42, NULL, 1),
(113, 1, 0x456d61696c2d4944, NULL, 1),
(114, 1, 0x4c617374204e616d65, NULL, 1),
(115, 1, 0x4669727374204e616d65, NULL, 1),
(116, 1, 0x436f6e746163742044657461696c, NULL, 1),
(117, 1, 0x506572736f6e616c2044657461696c, NULL, 1),
(118, 1, 0x4d792050726f66696c65, NULL, 1),
(119, 1, 0x517220436f6465, NULL, 1),
(120, 1, 0x5573657273, NULL, 1),
(121, 1, 0x4c616e677561676573, NULL, 1),
(122, 1, 0x50726f6d6f74696f6e73, NULL, 1),
(123, 1, 0x53746174697374696373, NULL, 1),
(124, 1, 0x416e6e6f756e63656d656e7473, NULL, 1),
(125, 1, 0x436f6e7461637473, NULL, 1),
(126, 1, 0x436f6e74616374, NULL, 1),
(127, 1, 0x557365722044657461696c, NULL, 1),
(128, 1, 0x546f74616c205573657273, NULL, 1),
(129, 1, 0x536561726368, NULL, 1),
(130, 1, 0x52617465, NULL, 1),
(131, 1, 0x4d79204f6666696365, NULL, 1),
(132, 1, 0x416374696f6e73, NULL, 1),
(133, 1, 0x5469746c65, NULL, 1),
(134, 1, 0x50726f6d6f74696f6e73, NULL, 1),
(135, 1, 0x53686f7720456e7472696573, NULL, 1),
(136, 1, 0x45646974204163636f756e74, NULL, 1),
(137, 1, 0x4368616e67652050617373776f7264, NULL, 1),
(138, 1, 0x4e6577205573657273, NULL, 1),
(139, 1, 0x416374697665205573657273, NULL, 1),
(140, 1, 0x4465616374697665205573657273, NULL, 1),
(141, 1, 0x4d61696c202f204d657373616765, NULL, 1),
(142, 1, 0x546f74616c204d65737361676573, NULL, 1),
(143, 1, 0x4e6577204d65737361676573, NULL, 1),
(144, 1, 0x656e64696e67204d65737361676573, NULL, 1),
(145, 1, 0x4e6f74696669636174696f6e73, NULL, 1),
(146, 1, 0x546f74616c20566973697473, NULL, 1),
(147, 1, 0x4e657720566973697473, NULL, 1),
(148, 1, 0x4e657720506f737473, NULL, 1),
(149, 1, 0x5265706f7274204162757365, NULL, 1),
(150, 1, 0x4163636f756e742053657474696e6773, NULL, 1),
(151, 1, 0x45646974204163636f756e74, NULL, 1),
(152, 1, 0x4368616e67652050617373776f7264, NULL, 1),
(153, 1, 0x57656c636f6d65, NULL, 1),
(154, 1, 0x55736572204944, NULL, 1),
(155, 1, 0x4e616d65, NULL, 1),
(156, 1, 0x456d61696c, NULL, 1),
(157, 1, 0x436f756e747279, NULL, 1),
(158, 1, 0x436f6e74616374205573, NULL, 1),
(159, 1, 0x41626f7574205573, NULL, 1),
(160, 1, 0x41727469636c6573, NULL, 1),
(161, 1, 0x4e657773204c657474657273, NULL, 1),
(162, 1, 0x54656d706c61746573, NULL, 1),
(163, 1, 0x496672616d6573, NULL, 1),
(164, 1, 0x5375626a656374, NULL, 1),
(165, 1, 0x44657369676e20666f72, NULL, 1),
(166, 1, 0x517569636b204c696e6b73, NULL, 1),
(167, 1, 0x50726576696577, NULL, 1),
(168, 1, 0x4d6f62696c65, NULL, 1),
(169, 1, 0x50686f6e65, NULL, 1),
(170, 1, 0x5468756d6220496d616765, NULL, 1),
(171, 1, 0x496d616765, NULL, 1),
(172, 1, 0x416464, NULL, 1),
(173, 1, 0x44617368626f617264, NULL, 1),
(174, 1, 0x45444954, NULL, 1),
(175, 1, 0x41646472657373, NULL, 1),
(176, 1, 0x436f6e74656e74, NULL, 1),
(177, 1, 0x53686f77206f6e20686f6d65, NULL, 1),
(178, 1, 0x5a697020436f6465, NULL, 1),
(179, 1, 0x47616c6c657279, NULL, 1),
(180, 1, 0x43616c6c2043656e746572, NULL, 1),
(181, 1, 0x56696577204d6170, NULL, 1),
(182, 1, '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `tmp_type` int(11) NOT NULL,
  `default_temp` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `tmp_type`, `default_temp`, `status`) VALUES
(1, 'tmp_1', 1, 0, 1),
(2, 'tmp_2', 1, 0, 1),
(3, 'tmp_2', 0, 1, 1),
(4, 'jet_tmp', 0, 0, 1),
(5, 'idive_tmp', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `trip_type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `destination_country_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `no_of_nights` int(11) NOT NULL,
  `no_of_dives` int(11) NOT NULL,
  `trip_price` double NOT NULL,
  `price_for_kids` double NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `airport` tinyint(1) NOT NULL,
  `hotel` tinyint(1) NOT NULL,
  `lastminut` tinyint(1) NOT NULL,
  `upcoming` tinyint(1) NOT NULL,
  `popular` tinyint(1) NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `boat_id`, `trip_type_id`, `country_id`, `destination_country_id`, `origin_id`, `destination_id`, `start_date`, `end_date`, `no_of_days`, `no_of_nights`, `no_of_dives`, `trip_price`, `price_for_kids`, `image`, `airport`, `hotel`, `lastminut`, `upcoming`, `popular`, `create_date`, `modified_date`, `status`) VALUES
(1, 4, 1, 5, 0, 0, 0, '2014-01-22 00:00:00', '2014-01-31 00:00:00', 7, 8, 5, 3400, 786, 'media/trips/1/main_1aa8747bc5376.jpg', 0, 0, 1, 1, 1, '2014-01-08 15:29:56', '2014-01-28 17:57:49', 1),
(2, 6, 2, 2, 0, 0, 0, '2014-01-21 00:00:00', '2014-01-30 00:00:00', 467, 56, 78, 7899, 7863, 'media/trips/2/main_2boat-01.jpg', 0, 0, 1, 1, 1, '2014-01-08 15:51:31', '2014-01-28 17:58:15', 1),
(3, 4, 2, 5, 0, 0, 0, '2014-01-26 00:00:00', '2014-01-31 00:00:00', 45645, 4564, 45675, 4564, 5464, 'media/trips/3/2299e_img3_b.jpg', 0, 0, 1, 1, 1, '2014-01-13 16:32:18', '2014-01-28 17:58:33', 1),
(11, 6, 1, 1, 0, 0, 0, '2014-01-21 00:00:00', '2014-01-25 00:00:00', 5, 4, 12, 12000, 2000, 'media/trips/11/main_1159095_big.jpg', 0, 0, 0, 0, 0, '2014-01-21 11:41:48', '2014-01-28 17:59:02', 1),
(12, 30, 1, 5, 0, 0, 0, '2014-01-29 00:00:00', '2014-01-30 00:00:00', 4, 5, 5, 20000, 12, 'media/trips/12/main_1218SPORT_MAIN-2.jpg', 0, 0, 0, 1, 1, '2014-01-25 15:44:35', '2014-01-28 17:59:10', 1),
(13, 30, 2, 4, 0, 0, 0, '2014-01-25 00:00:00', '2013-01-25 00:00:00', 11, 10, 0, 7658, 27, 'media/trips/13/main_13324085_p_t_640x480_image03.jpg', 0, 0, 0, 0, 0, '2014-01-25 15:46:30', '2014-01-28 17:59:24', 1),
(16, 6, 2, 2, 0, 0, 0, '2014-01-27 00:00:00', '2014-01-29 00:00:00', 3, 4, 3, 567, 0, 'media/trips/16/main_16401682_0_240220100738_0.jpg', 0, 0, 0, 1, 1, '2014-01-27 17:21:30', '2014-01-28 17:59:33', 1),
(15, 41, 1, 1, 0, 0, 0, '2014-01-31 00:00:00', '2014-02-05 00:00:00', 15, 15, 20, 60000, 0, 'media/trips/15/main_1518SPORT_MAIN-3.jpg', 0, 0, 0, 1, 1, '2014-01-25 16:01:55', '2014-01-28 18:00:19', 1),
(17, 41, 2, 3, 0, 0, 0, '2014-01-26 00:00:00', '2014-01-31 00:00:00', 7, 8, 5, 45678, 0, 'media/trips/17/main_17324098_p_t_640x480_image07.jpg', 0, 0, 0, 0, 0, '2014-01-27 18:01:48', '2014-01-28 18:01:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_config`
--

CREATE TABLE IF NOT EXISTS `trip_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `value` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trip_config`
--

INSERT INTO `trip_config` (`id`, `title`, `value`, `status`) VALUES
(1, 'for_trip_min_child_age', '8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_equipments`
--

CREATE TABLE IF NOT EXISTS `trip_equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `eq_value` double NOT NULL,
  `eq_type` varchar(200) NOT NULL,
  `eq_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`trip_schedule_id`,`equipment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `trip_equipments`
--

INSERT INTO `trip_equipments` (`id`, `trip_id`, `trip_schedule_id`, `equipment_id`, `eq_value`, `eq_type`, `eq_status`) VALUES
(2, 11, 2, 1, 2, 'paid', 1),
(5, 1, 3, 1, 234, 'paid', 1),
(4, 1, 4, 1, 120, 'paid', 1),
(7, 2, 5, 1, 500, 'paid', 1),
(8, 12, 6, 1, 0, '25000', 1),
(9, 3, 9, 1, 110, 'paid', 1),
(10, 15, 10, 1, 0, '', 1),
(11, 16, 11, 1, 0, '', 1),
(12, 17, 12, 1, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_fuel_tank`
--

CREATE TABLE IF NOT EXISTS `trip_fuel_tank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `fuel_tank_id` int(11) NOT NULL,
  `tank_price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `trip_fuel_tank`
--

INSERT INTO `trip_fuel_tank` (`id`, `trip_id`, `fuel_tank_id`, `tank_price`, `status`) VALUES
(1, 1, 1, 555, 1),
(2, 1, 2, 0, 1),
(3, 2, 1, 0, 1),
(4, 11, 1, 0, 1),
(5, 11, 2, 500, 1),
(6, 12, 1, 0, 1),
(7, 12, 2, 15000, 1),
(8, 12, 3, 20000, 1),
(9, 13, 1, 869, 1),
(10, 13, 2, 0, 1),
(11, 13, 3, 0, 1),
(12, 15, 1, 0, 1),
(13, 15, 2, 0, 1),
(14, 15, 3, 0, 1),
(15, 16, 3, 0, 1),
(16, 17, 2, 0, 1),
(17, 17, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_gallery`
--

CREATE TABLE IF NOT EXISTS `trip_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `trip_gallery`
--

INSERT INTO `trip_gallery` (`id`, `trip_id`, `image`, `status`) VALUES
(1, 1, 'media/trips/1/2349aa8747bc5376.jpg', 1),
(2, 1, 'media/trips/1/20066boat-01.jpg', 1),
(3, 1, 'media/trips/1/27635Boats-Luxury-yacht-1.jpg', 1),
(4, 1, 'media/trips/1/12464canal_boat_trips_london.jpg', 1),
(5, 1, 'media/trips/1/2857f6a10c2a6fb7.jpg', 1),
(6, 1, 'media/trips/1/28334houseboat_kerala_photos.jpg', 1),
(7, 2, 'media/trips/2/253431_big.jpg', 1),
(8, 2, 'media/trips/2/22522_big.jpg', 1),
(9, 2, 'media/trips/2/59095_big.jpg', 1),
(10, 2, 'media/trips/2/271786_big.jpg', 1),
(11, 2, 'media/trips/2/19701e_img1_b.jpg', 1),
(12, 2, 'media/trips/2/6794e_img2_b.jpg', 1),
(13, 2, 'media/trips/2/2299e_img3_b.jpg', 1),
(14, 2, 'media/trips/2/32024e_img4_b.jpg', 1),
(15, 2, 'media/trips/2/17265i_img1_b.jpg', 1),
(16, 11, 'media/trips/11/20712299e_img3_b.jpg', 1),
(17, 11, 'media/trips/11/92206794e_img2_b.jpg', 1),
(18, 11, 'media/trips/11/1585317265i_img1_b.jpg', 1),
(19, 11, 'media/trips/11/1744219701e_img1_b.jpg', 1),
(20, 11, 'media/trips/11/376322522_big.jpg', 1),
(21, 11, 'media/trips/11/3185632024e_img4_b.jpg', 1),
(22, 12, 'media/trips/12/700768099index.jpg', 1),
(23, 12, 'media/trips/12/711960454pattaya.JPG', 1),
(24, 12, 'media/trips/12/253239948samui.JPG', 1),
(25, 12, 'media/trips/12/587119746Sport-Boat-Landing-2014_large.jpg', 1),
(26, 15, 'media/trips/15/20119379218SPORT_MAIN-1.jpg', 1),
(27, 15, 'media/trips/15/120157265318SPORT_MAIN-2.jpg', 1),
(28, 15, 'media/trips/15/178839032818SPORT_MAIN-3.jpg', 1),
(29, 13, 'media/trips/13/16556879542699612349aa8747bc5376.jpg', 1),
(30, 13, 'media/trips/13/10749566292699612349aa8747bc5376.jpg', 1),
(31, 16, 'media/trips/16/1527700917401682_0_240220100738_0.jpg', 1),
(32, 16, 'media/trips/16/1796799944401682_0_240220100738_1.jpg', 1),
(33, 16, 'media/trips/16/361437786401682_0_240220100738_2.jpg', 1),
(34, 16, 'media/trips/16/497569316401682_0_240220100738_3.jpg', 1),
(35, 16, 'media/trips/16/1953848245401682_0_240220100738_4.jpg', 1),
(36, 16, 'media/trips/16/333912478401682_0_240220100738_5.jpg', 1),
(37, 17, 'media/trips/17/1371351532324085_p_t_640x480_image03.jpg', 1),
(38, 17, 'media/trips/17/1113206565324085_p_t_640x480_image04.jpg', 1),
(39, 17, 'media/trips/17/1166775267324098_p_t_640x480_image07.jpg', 1),
(40, 17, 'media/trips/17/2087441152jpeg.jpg', 1),
(41, 17, 'media/trips/17/517868931jpgfheg.jpg', 1),
(42, 13, 'media/trips/13/16858415324085_p_t_640x480_image04.jpg', 1),
(43, 13, 'media/trips/13/1724923106324098_p_t_640x480_image07.jpg', 1),
(44, 13, 'media/trips/13/68159537jpeg.jpg', 1),
(45, 13, 'media/trips/13/556307962jpgfheg.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_schedules`
--

CREATE TABLE IF NOT EXISTS `trip_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `start_trip_datetime` datetime NOT NULL,
  `end_trip_datetime` datetime NOT NULL,
  `trip_price` double NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `trip_schedules`
--

INSERT INTO `trip_schedules` (`id`, `trip_id`, `start_trip_datetime`, `end_trip_datetime`, `trip_price`, `status`) VALUES
(1, 11, '2014-01-23 09:14:58', '2014-01-23 09:14:58', 34343, 1),
(2, 11, '2014-01-23 09:17:04', '2014-01-23 09:17:04', 444, 1),
(3, 1, '2014-01-24 00:16:33', '2014-01-29 00:16:33', 2345, 1),
(4, 1, '2014-01-24 00:17:02', '2014-01-24 00:17:02', 12000, 1),
(5, 2, '2014-01-24 00:17:48', '2014-01-26 00:17:48', 5000, 1),
(6, 12, '2014-01-27 00:00:00', '2014-01-30 00:00:00', 0, 1),
(7, 13, '2014-01-25 00:00:00', '2014-01-25 00:00:00', 0, 1),
(8, 14, '2014-01-25 00:00:00', '2014-01-25 00:00:00', 0, 1),
(9, 3, '2014-01-25 04:19:48', '2014-01-25 04:19:48', 11000, 1),
(10, 15, '2014-01-31 00:00:00', '2014-02-05 00:00:00', 0, 1),
(11, 16, '2014-01-27 00:00:00', '2014-01-29 00:00:00', 0, 1),
(12, 17, '2014-01-26 00:00:00', '2014-01-31 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_specifications`
--

CREATE TABLE IF NOT EXISTS `trip_specifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `trip_title` varchar(200) NOT NULL,
  `origin` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `specification` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `trip_specifications`
--

INSERT INTO `trip_specifications` (`id`, `trip_id`, `language_id`, `trip_title`, `origin`, `destination`, `specification`) VALUES
(1, 1, 1, 'Similan Islands, Koh Bon, Koh Taichai', 'Pattaya', 'Phuket', 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock'),
(2, 1, 2, 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock', 'dfgjdfhj', 'dfgjdf', 'fgjh'),
(3, 1, 4, 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock', 'dfhjdfghj', 'dfjdfhj', 'fghfgj'),
(4, 2, 1, '4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock', 'Sydney', 'Perth', 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock'),
(5, 2, 2, 'Koh Bon, Koh Taichai', 'tyujtry', 'tyrtyi', 'tyjirtyi trfyujrtyury'),
(6, 2, 4, 'Koh Bon, Koh Taichai', 'tyurtfuyi', 'tyuirti', 'tryurtyityui'),
(7, 3, 1, 'Hulala', 'Phuket', 'Pattaya', 'fghf'),
(8, 3, 2, '', '', '', ''),
(9, 3, 4, '', '', '', ''),
(31, 11, 1, 'Equirem', 'Goa', 'Lyon', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s'),
(32, 11, 2, '', '', '', ''),
(33, 11, 4, '', '', '', ''),
(34, 12, 1, 'Helm', 'Pattaya', 'bristol', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...'),
(35, 12, 2, '???????', '?????', '??????', '?? dolor ???? Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ?????? laoreet dolore Magna ???????????????????? erat Ut WISI enim ...'),
(36, 12, 4, 'barre', 'Pattaya', 'Phuket', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy NIBH euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...'),
(37, 13, 1, 'posaidan', 'cambridge', 'melbourne', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...'),
(38, 13, 2, 'posaidan', 'sydney', '?????????', '?? dolor ???? Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ?????? laoreet dolore Magna ???????????????????? erat Ut WISI enim ...'),
(39, 13, 4, 'posaidan', 'sydneylor', 'melbourne', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...'),
(46, 16, 1, '2014 REGAL 53 SPORT COUPE', 'Melbourne', 'Sydney', 'As of March 1st there will be 3-52 Sport Coupes available for spring. Get your orders in and don''t miss out on a spring delivery. Please call the Basa''s marine sales staff for current show time sales event promotions and pricing?'),
(43, 15, 1, 'Newa River', 'Bhopal', 'Goa', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...'),
(44, 15, 2, 'Newa rivière', 'Parth', 'Melbourne', '?? dolor ???? Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ?????? laoreet dolore Magna ???????????????????? erat Ut WISI enim ...'),
(45, 15, 4, 'Newa rivière', 'Parth', 'Melbourne', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy NIBH euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...'),
(47, 16, 2, '', '', '', ''),
(48, 16, 4, '', '', '', ''),
(49, 17, 1, 'Koopmans, Royal Huisman Ocean Race/Cruiser Ketch', 'Paris', 'Lyon', 'Perfect for both laid-back and large-scale cruising, the 350 Sundancer has a social cockpit that converts to a sun pad, and a raised helm with double bench and advanced electronics. First-class amenities in the cabin start with the island-style bed and gorgeous salon. An enclosed stateroom is available in lieu of the mid-berth. Choose your power from gas or diesel sterndrives, or gas inboards.'),
(50, 17, 2, '', '', '', ''),
(51, 17, 4, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `trip_types`
--

CREATE TABLE IF NOT EXISTS `trip_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_type` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `trip_types`
--

INSERT INTO `trip_types` (`id`, `trip_type`, `status`) VALUES
(1, 'Liveabords', 1),
(2, 'Day Trips', 1),
(8, 'fgjhg', 1),
(14, 'fdgfdg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `language` varchar(100) DEFAULT NULL,
  `address` text,
  `image` varchar(1000) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `exp_date_time` datetime NOT NULL,
  `date_time` datetime NOT NULL,
  `subscription` tinyint(1) NOT NULL,
  `utype` int(11) NOT NULL,
  `exp_status` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `email`, `mobile`, `gender`, `dob`, `language`, `address`, `image`, `postalcode`, `city_id`, `token`, `exp_date_time`, `date_time`, `subscription`, `utype`, `exp_status`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'sunil', 'srivastava', 'sunkumar88@gmail.com', '9236619342', 1, '0000-00-00', NULL, NULL, 'me.jpg', 0, 0, '', '2014-01-25 01:06:13', '2013-11-13 12:55:02', 1, 1, 0, 1),
(2, 'gaurav', 'e10adc3949ba59abbe56e057f20f883e', 'Gauravc', 'Tiwari', 'gaurav7tiwari@rocketmail.com', '919956175946', 1, '0000-00-00', NULL, NULL, 'image_pro2.jpg', 0, 0, '13896064542', '0000-00-00 00:00:00', '2014-01-13 15:17:34', 0, 0, 0, 1),
(4, 'narai', 'b840b33809cff1037b86e2693459bfe1', 'nagesh', 'rai', 'narai1987@gmail.com', '9411950511', 1, '0000-00-00', NULL, NULL, '', 0, 0, '13896213394', '0000-00-00 00:00:00', '2014-01-13 19:25:39', 0, 0, 0, 1),
(5, 'sss', '21232f297a57a5a743894a0e4a801fc3', 'sunil', 'syh', 'sunkumar888@gmail.com', '5687678', 1, '1969-12-31', 'english', '117 Q/458', '5.jpg', 0, 0, '13896226975', '0000-00-00 00:00:00', '2014-01-13 19:48:17', 0, 0, 0, 1),
(7, 'linus', '21232f297a57a5a743894a0e4a801fc3', 'Linus', 'Romak', 'linus.romak@gmail.com', '9236619342', 1, '0000-00-00', NULL, NULL, '', 0, 0, '13899472157', '0000-00-00 00:00:00', '2014-01-17 13:56:55', 0, 0, 0, 0),
(8, 'sunil', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 's@g.com', '', 0, '0000-00-00', NULL, NULL, '', 0, 0, '', '0000-00-00 00:00:00', '2014-01-28 06:41:55', 0, 0, 0, 1),
(9, 'sunilk', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'ss@g.com', '', 0, '0000-00-00', NULL, NULL, '', 0, 0, '', '0000-00-00 00:00:00', '2014-01-28 06:42:43', 0, 0, 0, 1),
(10, 'me', 'ab86a1e1ef70dff97959067b723c5c24', 'me', 'mine', 'me@me.com', '0987654321', 0, '1989-01-28', 'English', 'Loki India', '10.jpg', 0, 0, '', '0000-00-00 00:00:00', '2014-01-28 06:52:30', 1, 0, 0, 1),
(11, 'artinz', '0e0c4a98abb2a517eec7aebd9f0fcc26', 'artin', 'zaman', 'artin@idivecenter.com', '+66860259358', 1, '0000-00-00', NULL, NULL, '', 0, 0, '139113378811', '0000-00-00 00:00:00', '2014-01-31 07:33:08', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_addressbook`
--

CREATE TABLE IF NOT EXISTS `user_addressbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `addressone` text NOT NULL,
  `addresstwo` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `postalcode` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_addressbook`
--

INSERT INTO `user_addressbook` (`id`, `user_id`, `fname`, `lname`, `addressone`, `addresstwo`, `city`, `postalcode`, `country`, `state`, `date_time`) VALUES
(1, 2, 'abhi', 'tyutyu', ' tyutyu', ' tyutyu', 'tyutyu', '567567', 'tyutyu', 'tyuty', '2014-01-13 18:25:24'),
(2, 2, 'check', 'rtury', '   rdtureyertu', '   rtyury', 'rtyuwerst', '7567567', 'rtfhjrfyu', 'fgjfhfghj', '2014-01-13 18:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `trip_id`, `date_time`) VALUES
(15, 0, 2, '0000-00-00 00:00:00'),
(141, 1, 3, '0000-00-00 00:00:00'),
(10, 5, 2, '0000-00-00 00:00:00'),
(11, 5, 1, '0000-00-00 00:00:00'),
(12, 7, 1, '0000-00-00 00:00:00'),
(14, 2, 3, '0000-00-00 00:00:00'),
(36, 2, 1, '0000-00-00 00:00:00'),
(18, 0, 1, '0000-00-00 00:00:00'),
(157, 1, 1, '0000-00-00 00:00:00'),
(135, 2, 16, '0000-00-00 00:00:00'),
(125, 10, 2, '0000-00-00 00:00:00'),
(143, 1, 2, '0000-00-00 00:00:00'),
(151, 1, 16, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
