-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2014 at 12:15 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_idive`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `addtocart`
--


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
  `beverage` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `beverage_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `beverages`
--

INSERT INTO `beverages` (`id`, `beverage`, `status`, `language_id`, `beverage_type_id`) VALUES
(1, 'Cocacola', 1, 1, 1),
(1, 'Cocacola', 1, 2, 1),
(1, 'Cocacola', 1, 4, 1),
(2, 'Pepsi', 1, 1, 1),
(2, 'เป๊ปซี่', 1, 2, 1),
(2, 'Pepsi', 1, 4, 1),
(3, 'Apple Juice', 1, 1, 2),
(3, 'น้ำผลไม้แอปเปิ้ล', 1, 2, 2),
(3, 'jus de pomme', 1, 4, 2),
(4, 'Banana Juice', 1, 1, 2),
(4, 'น้ำผลไม้กล้วย', 1, 2, 2),
(4, 'Banana Juice', 1, 4, 2),
(5, 'Haywards 5000', 1, 1, 3),
(5, 'Haywards 5000', 1, 2, 3),
(5, 'Haywards 5000', 1, 4, 3),
(6, 'tyt', 1, 1, 1),
(6, '', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `beverage_types`
--

CREATE TABLE IF NOT EXISTS `beverage_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `beverage_type` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `beverage_types`
--

INSERT INTO `beverage_types` (`id`, `language_id`, `beverage_type`, `status`) VALUES
(1, 1, 'Soft Drink', 1),
(1, 2, 'เครื่องดื่ม', 1),
(1, 4, 'boisson non-alcoolisée', 1),
(2, 1, 'Fruit drink', 1),
(2, 2, 'เครื่องดื่มผลไม้', 1),
(2, 4, 'Boisson de fruits', 1),
(3, 1, 'Alcoholics', 0),
(3, 2, 'มีส่วนผสมของแอลกอฮอล์', 0),
(3, 4, 'alcoolique', 0),
(4, 1, 'fdgd', 1),
(4, 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE IF NOT EXISTS `boats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_type_id` int(11) NOT NULL DEFAULT '1' COMMENT 'it tells that boat is liveaboard(1) or day(2)',
  `operator_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `company_branch_id` int(11) NOT NULL,
  `established` date NOT NULL,
  `latest_overhall` date NOT NULL,
  `hull_type` varchar(300) DEFAULT NULL,
  `hull_material` varchar(300) DEFAULT NULL,
  `boat_width` varchar(300) DEFAULT NULL,
  `boat_range` varchar(300) DEFAULT NULL,
  `fresh_water_capacity` varchar(300) DEFAULT NULL,
  `gray_water_capacity` varchar(300) DEFAULT NULL,
  `black_water_capacity` varchar(300) DEFAULT NULL,
  `boat_price` float NOT NULL,
  `boat_length` int(11) NOT NULL,
  `boat_beam` int(11) NOT NULL,
  `fuel_capacity` int(11) NOT NULL,
  `men_capacity` int(11) NOT NULL,
  `main_image` varchar(200) DEFAULT NULL,
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
  `boat_technical` text,
  `boat_cockpit` text,
  `boat_helm` text,
  `boat_hulldeck` text,
  `boat_enginepower` text,
  `boat_engine` text,
  `boat_facilities` text,
  `boat_safety` text,
  `boat_comunication_and_navigation` text,
  `child_discount1` int(11) NOT NULL COMMENT 'child discount below 6 years',
  `child_discount2` int(11) NOT NULL COMMENT 'child discount below 12 years',
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`id`, `boat_type_id`, `operator_id`, `company_id`, `country_id`, `company_branch_id`, `established`, `latest_overhall`, `hull_type`, `hull_material`, `boat_width`, `boat_range`, `fresh_water_capacity`, `gray_water_capacity`, `black_water_capacity`, `boat_price`, `boat_length`, `boat_beam`, `fuel_capacity`, `men_capacity`, `main_image`, `upper_deck`, `main_deck`, `lower_deck`, `draft_drive_up_high_trim`, `draft_drive_down`, `deadrise`, `approx_dry_weight`, `estimated_height_on_trailer_top_windshield`, `boat_height_windshield_to_keel`, `bridge_clearance_top_up`, `bridge_clearance_top_down`, `cockpit_depth_helm`, `cockpit_storage`, `boat_technical`, `boat_cockpit`, `boat_helm`, `boat_hulldeck`, `boat_enginepower`, `boat_engine`, `boat_facilities`, `boat_safety`, `boat_comunication_and_navigation`, `child_discount1`, `child_discount2`, `date_time`, `status`) VALUES
(6, 1, 1, 14, 2, 92, '2014-02-01', '2014-05-27', 'jughj', 'jkhjk', '78', '6', '67', '56', '67', 789, 76, 54, 567, 68, 'media/boats/6/main6Sun_224_Helm_02_14.jpg', 'media/boats/6/upper_deckBoats-Luxury-yacht-1.jpg', 'media/boats/6/main_deckhouseboat_kerala_photos.jpg', 'media/boats/6/lower_deckurl.jpg', '756', '5675', '567', '675', '5675', '567', '56756', '567', '567', '567', '3,8', '4,6', '2,4,6,7', '5,6,7,8', '4,6', '2,3,4,6', NULL, NULL, NULL, 0, 0, '2014-05-27 14:58:04', 1),
(4, 1, 1, 2, 1, 67, '2014-02-04', '1970-01-01', 'ghfgfghfgh', 'fghfghfgh', '34', '54', '45', '34', '34', 567, 6, 47676, 7767, 97, 'media/boats/4/main422902Boats-Luxury-yacht-1.jpg', 'media/boats/4/upper_deck4lower_deck4Boats-Luxury-yacht-1.jpg', 'media/boats/4/main_deck4main_deck4houseboat_kerala_photos.jpg', 'media/boats/4/lower_deck4lower_deck4mercuriaLARGE.jpg', '56', '78', '8', '6', '8', '9', '5', '9', '6', '5', '3,7,9', '1,5,6', '2,6,8', '2,3,4,5', '3,2,4,5', '2,3,4,5,6', '5,7,9,11,13,15,17', '8,10,12,14', '5,6,7,8', 15, 10, '2014-06-07 15:41:10', 1),
(7, 1, 1, 14, 5, 92, '2014-01-25', '1970-01-01', 'rui', 'iuiyui', '34', '54', '67', '34', '67', 786, 867, 678, 678, 678, 'media/boats/7/main7324098_p_t_640x480_image07.jpg', 'media/boats/7/upper_deck7Boats-Luxury-yacht-1.jpg', 'media/boats/7/main_deck7url.jpg', 'media/boats/7/lower_deck7houseboat_kerala_photos.jpg', '786', '678', '678', '78', '67', '678', '6678', '678', '678', '678', '3,7', '1,3,5,7', '2,3,4,5', '4,5,6,7', '3,2,4,5', '2,3,4', NULL, NULL, NULL, 0, 0, '2014-05-27 16:55:25', 1),
(8, 1, 1, 22, 3, 93, '2014-01-24', '2014-05-27', 'ghfgfghfgh', 'fghfghfgh', '34', '54', '45', '34', '34', 420.99, 33, 678, 678, 678, 'media/boats/8/main8401682_0_240220100738_5.jpg', 'media/boats/8/upper_deck8floorplan_458.jpg', 'media/boats/8/main_deck8alaskayachtadventures14.jpg', 'media/boats/8/lower_deck8majesty-sx-large-pontoon.jpg', '786', '678', '678', '78', '67', '678', '6678', '678', '678', '678', '8,9', '1,2,3,4,5,6,7,8', '2,4,6,7,8,9', '4,5,6,7,8', '3,2,4,5', '2,3,4,5,6', NULL, NULL, NULL, 15, 25, '2014-05-27 16:53:54', 1),
(101, 2, 5, 1, 1, 98, '2014-05-20', '1970-01-01', 'hgkghjk', 'hjkhjk', '34', '54', '45', '34', '34', 5600, 4, 4, 678, 49, 'media/boats/101/529592131101sun_224_bowtable_14.jpg', 'media/boats/101/358669896101324085_p_t_640x480_image04.jpg', 'media/boats/101/153709522101upper.jpg', 'media/boats/101/858570099101lower.jpg', '56', '78', '8', '6', '8', '9', '5', '9', '6', '5', '3,8', '1,3,5,7', '2,4,6,7,8,9', '2,4,6,7,8,9', '3,2,4,5,6,7', '2,3,4,5,6', NULL, NULL, NULL, 0, 0, '2014-06-03 18:49:09', 1),
(103, 1, 1, 1, 1, 91, '2014-05-22', '2014-05-27', 'ghfgfghfgh', 'fghfghfgh', '34', '54', '45', '34', '34', 780, 4, 4, 34, 49, 'media/boats/103/main103401682_0_240220100738_2.jpg', 'media/boats/103/upper_deck103upper.jpg', 'media/boats/103/main_deck103main.jpg', 'media/boats/103/lower_deck103lower.jpg', '56', '78', '8', '6', '8', '9', '5', '9', '6', '5', '3,7,8,9', '1,2,3,4,5,6,7,8', '2,3,4,5,6,7,8,9', '2,3,4,5,6,7,8,9', '3,2,4,5,6,7', '2,3,4,5,6', NULL, NULL, NULL, 15, 10, '2014-06-03 18:42:21', 1),
(124, 1, 1, 25, 1, 96, '2014-05-27', '2014-05-22', 'rui', 'hjkhjk', '78', '89', '45', '23', '12', 786, 4, 678, 34, 49, 'media/boats/124/main124401682_0_240220100738_4.jpg', 'media/boats/124/6028752551241_n.jpg', 'media/boats/124/main_deck124lower.jpg', 'media/boats/124/456265976124bh-support-bnr.jpg', '786', '678', '678', '78', '67', '9', '6678', '678', '678', '678', '3,7,8,9', '1,2,3,4,5,6,7,8', '2,3,4,5,6,7,8,9', '2,3,4,5,6,7,8,9', '3,2,4,5,6,7', '2,3,4,5,6', NULL, NULL, NULL, 15, 10, '2014-05-30 12:48:07', 1);

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
  `imgdescription` text NOT NULL,
  `design_hull_detail` text NOT NULL,
  `safty_detail` text NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`boat_id`,`language_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `boatspecifications`
--

INSERT INTO `boatspecifications` (`id`, `boat_id`, `language_id`, `boat_name`, `description`, `imgdescription`, `design_hull_detail`, `safty_detail`, `date_time`, `status`) VALUES
(9, 6, 2, 'fgh', 'fghfg', 'fghdfgh', 'dghdfgh', 'fghdfgh fgh dfghfgh', '2014-05-27 14:58:04', 1),
(2, 4, 1, '190 Sports', 'Boat english description....\r\n', '<p>\r\n	right now img description is not available..</p>\r\n', '<p>\r\n	Worry about this is for you can''t take without performance.</p>\r\n', 'fgjh sfdgh fdghd dfgh\r\n', '2014-06-07 15:41:10', 1),
(3, 4, 2, 'เรือชื่อในภาษาอังกฤษ', 'เรือคำอธิบายภาษาอังกฤษ ...\r\n', '', '<p>\r\n	???????????????????????????????????????????? ..</p>\r\n', 'hjkghjm fgyhyj hjrtyhj ghg\r\n', '2014-06-07 15:41:10', 1),
(8, 6, 1, '540 Sundancer', 'tyutyu', 'yutyutyu tyutyu', 'hfghfghfgh', 'fghfghfgh', '2014-05-27 14:58:04', 1),
(4, 4, 4, 'ฉันต้องการ', 'ฉันต้องการที่จะทำให้ความสัมพันธ์ทางกายภาพกับ ..\r\n', '', '<p>\r\n	Beauti filles Beauti filles Beauti filles Je veux faire rapport physique avec ..</p>\r\n', 'uykjiyu ghhg gfh', '2014-05-22 11:11:01', 1),
(73, 124, 1, 'Sports Gk47', 'Sports Gk47 amazing boat', 'tghfghjh', 'fgjhjghj', 'fgjhghghjghj', '2014-05-30 12:48:07', 1),
(10, 6, 4, '', '', '', '', '', '2014-04-10 18:36:15', 1),
(11, 7, 1, 'Digital 2013 Yachts Catalog', 'fdgjhdfjhfh drfyh fjhfhj', 'fgjhfdgj ftghdfgh fgh', 'fghjdfjdfjhdfj', 'jhhfgjhgj', '2014-05-27 16:55:25', 1),
(12, 7, 2, 'hjfdhj', 'dfrtgjhdfgjhj', '', '', '', '2014-05-27 16:55:25', 1),
(13, 7, 4, '', '', '', '', '', '2014-02-27 15:01:55', 1),
(14, 8, 1, 'Digital 2013 International Boat Catalogs', 'fdgjhdfjhfh drfyh fjhfhj', 'fgjhfdgj ftghdfgh fgh', 'fghjdfjdfjhdfj', 'jhhfgjhgj', '2014-05-27 16:53:54', 1),
(15, 8, 2, 'hjfdhj', 'dfrtgjhdfgjhj', '', '', '', '2014-05-27 16:53:54', 1),
(66, 101, 1, 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', '2014-06-03 18:49:09', 1),
(67, 101, 2, 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', '2014-06-03 18:49:09', 1),
(68, 101, 4, 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', 'Bowrider Express', '2014-05-20 13:33:41', 1),
(69, 103, 1, 'Bowrider Rajdhani', 'Bowrider Rajdhani is a standard boat , it ha smany features , a customer also can dive this boat without a diver.', 'Bowrider Rajdhani is a standard boat , it ha smany features , a customer also can dive this boat without a diver.', 'Bowrider Rajdhani is a standard boat , it ha smany features , a customer also can dive this boat without a diver.', 'Bowrider Rajdhani is a standard boat , it ha smany features , a customer also can dive this boat without a diver.', '2014-06-03 18:42:21', 1),
(70, 103, 2, 'Bowrider Rajdhani', 'Bowrider Rajdhani เป็นเรือมาตรฐานก็ ha คุณสมบัติ smany ลูกค้ายังสามารถดำน้ำเรือนี้โดยนักดำน้ำ', 'Bowrider Rajdhani ????????????????? ha ????????? smany ??????????????????????????????????????', 'Bowrider Rajdhani ????????????????? ha ????????? smany ??????????????????????????????????????', 'Bowrider Rajdhani ????????????????? ha ????????? smany ??????????????????????????????????????', '2014-06-03 18:42:21', 1),
(71, 103, 4, 'Bowrider Rajdhani', 'Bowrider Rajdhani est un bateau standard, il ha caractéristiques smany, un client peut également plonger ce bateau sans plongeur.', 'Bowrider Rajdhani est un bateau standard, il ha caractéristiques smany, un client peut également plonger ce bateau sans plongeur.', 'Bowrider Rajdhani est un bateau standard, il ha caractéristiques smany, un client peut également plonger ce bateau sans plongeur.', 'Bowrider Rajdhani est un bateau standard, il ha caractéristiques smany, un client peut également plonger ce bateau sans plongeur.', '2014-05-22 12:00:36', 1),
(72, 103, 5, 'Bowrider राजधानी', 'Bowrider राजधानी यह एक ग्राहक भी एक गोताखोर के बिना इस नाव गोता लगा सकते हैं, smany सुविधाओं हा, एक मानक नाव है.', 'Bowrider ??????? ?? ?? ?????? ?? ?? ??????? ?? ???? ?? ??? ???? ??? ???? ???, smany ???????? ??, ?? ???? ??? ??.', 'Bowrider ??????? ?? ?? ?????? ?? ?? ??????? ?? ???? ?? ??? ???? ??? ???? ???, smany ???????? ??, ?? ???? ??? ??.', 'Bowrider ??????? ?? ?? ?????? ?? ?? ??????? ?? ???? ?? ??? ???? ??? ???? ???, smany ???????? ??, ?? ???? ??? ??.', '2014-05-22 12:00:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_beverages`
--

CREATE TABLE IF NOT EXISTS `boat_beverages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `beverage_id` int(11) NOT NULL,
  `eq_value` double NOT NULL,
  `eq_type` varchar(200) NOT NULL,
  `eq_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`boat_id`,`beverage_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `boat_beverages`
--

INSERT INTO `boat_beverages` (`id`, `boat_id`, `beverage_id`, `eq_value`, `eq_type`, `eq_status`) VALUES
(54, 4, 5, 95, 'paid', 1),
(53, 4, 3, 25, 'paid', 1),
(52, 4, 2, 0, 'free', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_cabins`
--

CREATE TABLE IF NOT EXISTS `boat_cabins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `cabin_id` int(11) NOT NULL,
  `no_of_cabin` int(11) NOT NULL,
  `no_of_person` int(11) NOT NULL,
  `cabin_price` double NOT NULL,
  `last_update` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cabin_options` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=391 ;

--
-- Dumping data for table `boat_cabins`
--

INSERT INTO `boat_cabins` (`id`, `boat_id`, `cabin_id`, `no_of_cabin`, `no_of_person`, `cabin_price`, `last_update`, `status`, `cabin_options`) VALUES
(388, 4, 3, 2, 4, 213, '2014-06-07 15:41:10', 1, '13,14,15'),
(390, 4, 2, 6, 6, 234, '2014-06-07 15:41:10', 1, '10'),
(269, 6, 4, 5, 4, 67, '2014-05-27 14:58:04', 1, NULL),
(268, 6, 3, 6, 8, 34, '2014-05-27 14:58:04', 1, NULL),
(267, 6, 2, 9, 7, 54, '2014-05-27 14:58:04', 1, NULL),
(266, 6, 1, 8, 6, 67, '2014-05-27 14:58:04', 1, NULL),
(306, 7, 4, 7, 15, 789, '2014-05-27 16:55:25', 1, NULL),
(305, 7, 3, 5, 12, 346, '2014-05-27 16:55:25', 1, NULL),
(304, 7, 2, 8, 3, 76, '2014-05-27 16:55:25', 1, NULL),
(303, 7, 1, 7, 4, 56, '2014-05-27 16:55:25', 1, NULL),
(298, 8, 3, 4, 6, 67, '2014-05-27 16:53:54', 1, NULL),
(297, 8, 2, 5, 4, 456, '2014-05-27 16:53:54', 1, NULL),
(296, 8, 1, 7, 12, 656, '2014-05-27 16:53:54', 1, NULL),
(389, 4, 1, 5, 5, 100, '2014-06-07 15:41:10', 1, '2'),
(377, 103, 1, 5, 12, 100, '2014-06-03 18:42:21', 1, '2'),
(358, 124, 2, 6, 11, 456, '2014-05-30 12:48:07', 1, '11,12'),
(376, 103, 3, 5, 8, 346, '2014-06-03 18:42:21', 1, '14'),
(375, 103, 4, 7, 15, 789, '2014-06-03 18:42:21', 1, '19,20'),
(357, 124, 1, 7, 12, 656, '2014-05-30 12:48:07', 1, '2,3'),
(356, 124, 3, 8, 12, 67, '2014-05-30 12:48:07', 1, '13,17'),
(387, 4, 4, 7, 4, 56, '2014-06-07 15:41:10', 1, '19,20,21'),
(378, 103, 2, 6, 6, 234, '2014-06-03 18:42:21', 1, '9');

-- --------------------------------------------------------

--
-- Table structure for table `boat_cockpit`
--

CREATE TABLE IF NOT EXISTS `boat_cockpit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `boat_cockpit`
--

INSERT INTO `boat_cockpit` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(1, 1, 'Courtesy Blue LED Lights', 'With the standard blue LED cockpit lights, your boat is sure to make a statement at the dock.', '2014-02-05', 1),
(1, 2, 'fdg', 'dfgd', '2014-02-05', 1),
(1, 4, 'fdg', 'dfgd', '2014-02-05', 1),
(2, 1, 'Fiberglass Hatches', 'Many manufacturers use starboard instead of fiberglass. However, starboard is not color-matched and is very slippery when wet.', '2014-02-05', 1),
(2, 2, 'ghf', 'fghf', '2014-02-05', 1),
(2, 4, 'fgh', 'fghgf', '2014-02-05', 1),
(3, 1, 'Fusion Marine Sound - 4 Cockpit Speakers', 'he best sound begins with the best equipment. That means four 200 watt Fusion cockpit speakers with an IP65 waterproof rating.', '2014-02-05', 1),
(4, 1, 'Lockable Glove Box', 'The lockable glove block is a perfect spot to store your valuables while at the dock.', '2014-02-05', 1),
(5, 1, 'Removable Cooler', 'The 36 quart removable cooler ensures the crew will never go thirsty.', '2014-02-05', 1),
(6, 1, 'Transom Shower', 'The transom shower will help keep the salt out of the cockpit and can give the body a good rinse.', '2014-05-26', 1),
(7, 1, 'U-Shaped Seating', 'The U-shaped seating is perfect no matter how big your crew is.', '2014-02-05', 1),
(8, 1, 'Transom Walk-Thru', 'The transom walk-thru saves your upholstery from being trampled on.', '2014-04-08', 0),
(3, 2, 'ฟิวชั่นมารีนเสียง - 4 ลำโพงนักบิน', 'เขาเสียงที่ดีที่สุดเริ่มต้นด้วยอุปกรณ์ที่ดีที่สุด นั่นหมายถึงสี่ 200 วัตต์ลำโพงฟิวชั่นห้องนักบินที่มีคะแนน IP65 กันน้ำ', '2014-02-05', 1),
(3, 4, 'Fusion Marine Sound - 4 haut-parleurs de cockpit', 'il commence son meilleur avec le meilleur équipement. Cela signifie que quatre haut-parleurs de cockpit 200 watts de fusion avec une note étanche IP65.', '2014-02-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_comunication_and_navigation`
--

CREATE TABLE IF NOT EXISTS `boat_comunication_and_navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `boat_comunication_and_navigation`
--

INSERT INTO `boat_comunication_and_navigation` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(5, 1, 'Radar', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(6, 1, 'GPS plotter', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(7, 1, 'Auto pilot', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(8, 1, 'Depth Sonar', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(9, 1, 'SSB Radio', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(10, 1, 'CB Radio', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(11, 1, 'VHF Radio', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(12, 1, 'Satelite Phone', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1),
(13, 1, 'EPRIB', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2014-05-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_engine`
--

CREATE TABLE IF NOT EXISTS `boat_engine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `boat_engine`
--

INSERT INTO `boat_engine` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(2, 1, 'Automatic Bilge Pump', 'The automatic bilge pump takes action before you even realize what is wrong.', '2014-02-05', 1),
(3, 1, 'Battery Switch', 'The standard battery switch will add longevity to the life of your battery.', '2014-02-05', 1),
(4, 1, 'NMMA, ABYC, USCG & CE Certified', 'iDive makes sure that it meets the highest standards of safety in the industry.', '2014-02-05', 1),
(5, 1, 'Power Assisted Steering', 'Nothing like fingertip control created by the power steering.', '2014-02-05', 1),
(6, 1, 'Weather resistant Deutsch connectors', 'On a Regal you''ll find Deutsch connectors for superior protection and durability.', '2014-05-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `boat_enginepower`
--

CREATE TABLE IF NOT EXISTS `boat_enginepower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `power` varchar(200) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `boat_enginepower`
--

INSERT INTO `boat_enginepower` (`id`, `language_id`, `name`, `title`, `power`, `description`, `date`, `status`) VALUES
(2, 4, 'try', 'try', 'try', 'rtyr', '2014-02-05', 1),
(2, 2, 'rty', 'rty', 'rty', 'trytr', '2014-02-05', 1),
(3, 1, 'Horsepower', 'Merc 4.3 MPI Alpha Catalyst', '225', 'Drives: Bravo Three *Not Available in USA', '2014-02-05', 1),
(2, 1, 'Standard Power', 'Merc 4.3 MPI Alpha', '225', 'Drive: Alpha', '2014-02-05', 1),
(4, 1, 'Optional power', 'Volvo V6 200 SX', '200', 'Drive: SX', '2014-02-05', 1),
(5, 1, 'Horsepower', 'Twin Volvo V8 320 Catalyst EVC Joystick', '640', 'Drives: Duoprop with Electronic Shift', '2014-02-05', 1),
(6, 1, 'Horsepower', 'Twin Volvo V8 380 DP OX Catalyst', '760', 'Drives: Duoprop', '2014-02-05', 1),
(7, 1, 'Horsepower', 'Twin Merc 8.2 MAG MPI B3 Catalyst', '786', 'Drives: Bravo Three', '2014-05-27', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `boat_equipments`
--

INSERT INTO `boat_equipments` (`id`, `boat_id`, `equipment_id`, `eq_value`, `eq_type`, `eq_status`) VALUES
(119, 5, 2, 454, 'paid', 1),
(122, 4, 4, 0, 'free', 1),
(121, 4, 2, 345, 'paid', 1),
(120, 4, 3, 0, 'free', 1),
(118, 5, 3, 654, 'paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_facilities`
--

CREATE TABLE IF NOT EXISTS `boat_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `boat_facilities`
--

INSERT INTO `boat_facilities` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(5, 1, 'Freshwater shower', 'There are two type of water hot and cool....', '2014-05-31', 0),
(6, 1, 'Electric outlet', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(7, 1, 'Extra Activities ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(8, 1, 'Sun Deck', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(9, 1, 'Internet connection', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(10, 1, 'Satelite Phone', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(11, 1, 'Kitchen onboard', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(12, 1, 'Bar onboard', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(13, 1, 'TV ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(14, 1, 'Sound System', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(15, 1, 'Freezer', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(16, 1, 'Water Cooler', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(17, 1, 'Hot drinks facilities', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(18, 1, 'Camera washing tank', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(19, 1, 'In door Saloon', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(20, 1, 'Out door Saloon', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1),
(21, 1, 'Aircondition', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2014-05-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_foods`
--

CREATE TABLE IF NOT EXISTS `boat_foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `eq_value` double NOT NULL,
  `eq_type` varchar(200) NOT NULL,
  `eq_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`boat_id`,`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `boat_foods`
--

INSERT INTO `boat_foods` (`id`, `boat_id`, `food_id`, `eq_value`, `eq_type`, `eq_status`) VALUES
(35, 4, 3, 40, 'paid', 1),
(33, 5, 3, 0, 'free', 1),
(34, 4, 2, 123, 'paid', 1),
(32, 5, 2, 54645, 'paid', 1);

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

--
-- Dumping data for table `boat_fuel_tank`
--


-- --------------------------------------------------------

--
-- Table structure for table `boat_helm`
--

CREATE TABLE IF NOT EXISTS `boat_helm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `boat_helm`
--

INSERT INTO `boat_helm` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(2, 2, 'cvbc', 'cvbc', '2014-02-05', 1),
(2, 1, '12 Volt Accessory Plug', 'Regal engineers think of everything. They even included a 12v plug for your spotlight.', '2014-02-05', 1),
(2, 4, 'cvbc', 'cvbc', '2014-02-05', 1),
(3, 1, '5-Position Tilt Steering Wheel', 'The standard tilting steering wheel with sport grip adjusts to the preference of every captain.', '2014-02-05', 1),
(4, 1, 'Digital Depth Sounder', 'The digital depth sounder with shallow water alarm will help you keep your boat in a safe depth.', '2014-02-05', 1),
(5, 1, 'Faria Gauges', 'The Black Faria gauges not only give you the information you need but also turn the dash into a piece of art.', '2014-02-05', 1),
(6, 1, 'Hand Wrapped Steering Wheel', 'Regals feature a premium hand-wrapped steering wheel for the utmost comfort and control.', '2014-02-05', 1),
(7, 1, 'Twin Binnacle Controls', 'When you''re ready to take command, the twin binnacle controls place all the horsepower at your fingertips.', '2014-02-05', 1),
(8, 1, 'Trim Tab Controls', 'The standard trim tabs give you complete control over your boat even in the roughest of seas.', '2014-02-05', 1),
(9, 1, 'Fusion 700i Marine Stereo Remote', 'When you''re ready to take control of your tunes, the Fusion remote gives you complete access to all of your music.', '2014-05-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_hulldeck`
--

CREATE TABLE IF NOT EXISTS `boat_hulldeck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `boat_hulldeck`
--

INSERT INTO `boat_hulldeck` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(2, 1, 'Composite Stringers', 'iDives feature all composite stringers, making the boat stronger and lighter.', '2014-02-05', 1),
(3, 1, 'Electric Horn with Stainless Cover', 'The horn with stainless cover is a perfect example of how Regal combines form with function.', '2014-02-05', 1),
(4, 1, 'Extended Swim Platform', 'Extended swim platforms are lower to the water and completely cover the outdrive.', '2014-02-05', 1),
(5, 1, 'FasTrac Hull Design', 'FasTrac Hull gives more control on the water, with 26% faster speeds, and at the fuel pump, with 30% better fuel efficiency.', '2014-02-05', 1),
(6, 1, 'Anchor Bay', 'The first mate will enjoy the flat foredeck when working the anchor or bow lines.', '2014-02-05', 1),
(7, 1, 'Anchor Roller', 'Your next Regal comes standard with an anchor roller and stainless steel guard plate to keep your foredeck free of scratches.', '2014-02-05', 1),
(8, 1, 'Deck Hatch with Privacy Screen', 'Let the cool weather in but keep the bugs out with the deck hatch and screen.', '2014-02-05', 1),
(9, 1, 'Stainless Cleats', 'Regal features six 8" stainless steel cleats which won''t rust or break over time.', '2014-05-27', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=267 ;

--
-- Dumping data for table `boat_images`
--

INSERT INTO `boat_images` (`id`, `boat_id`, `images`, `gallery_type_id`, `status`) VALUES
(55, 7, 'media/boats/7/gallery/29209Sun_224_BowTable_14.jpg', 1, 1),
(56, 7, 'media/boats/7/gallery/25310Sun_224_ConsoleStorage_14.jpg', 1, 1),
(57, 7, 'media/boats/7/gallery/27839Sun_224_Head_14.jpg', 1, 1),
(58, 7, 'media/boats/7/gallery/20202401682_0_240220100738_2.jpg', 2, 1),
(12, 30, 'media/boats/30/gallery/1231820131009_163311.jpg', 1, 1),
(44, 4, 'media/boats/4/gallery/17014piscina.jpg', 1, 1),
(45, 4, 'media/boats/4/gallery/28791port.jpg', 1, 1),
(46, 4, 'media/boats/4/gallery/21732residence-filanda-1.jpg', 1, 1),
(47, 4, 'media/boats/4/gallery/19789residence-filanda-3.jpg', 1, 1),
(48, 4, 'media/boats/4/gallery/233769.jpg', 2, 1),
(49, 4, 'media/boats/4/gallery/290019experia.jpg', 2, 1),
(50, 4, 'media/boats/4/gallery/108309-residenze-le-due-torri-apartments-riva-del-garda-swimming-pool.jpg', 2, 1),
(52, 4, 'media/boats/4/gallery/2367611_corteparadiso.jpg', 2, 1),
(54, 7, 'media/boats/7/gallery/7520Sun_224_AnchorLocker_14.jpg', 1, 1),
(24, 6, 'media/boats/6/gallery/15264324085_p_t_640x480_image03.jpg', 1, 1),
(25, 6, 'media/boats/6/gallery/21337324085_p_t_640x480_image04.jpg', 1, 1),
(26, 6, 'media/boats/6/gallery/19230324098_p_t_640x480_image07.jpg', 1, 1),
(27, 6, 'media/boats/6/gallery/20479jpeg.jpg', 1, 1),
(28, 6, 'media/boats/6/gallery/29132jpgfheg.jpg', 1, 1),
(29, 6, 'media/boats/6/gallery/31530401682_0_240220100738_0.jpg', 2, 1),
(30, 6, 'media/boats/6/gallery/27931401682_0_240220100738_1.jpg', 2, 1),
(31, 6, 'media/boats/6/gallery/24248401682_0_240220100738_2.jpg', 2, 1),
(32, 6, 'media/boats/6/gallery/5265401682_0_240220100738_3.jpg', 2, 1),
(33, 6, 'media/boats/6/gallery/8182401682_0_240220100738_4.jpg', 2, 1),
(34, 6, 'media/boats/6/gallery/16375401682_0_240220100738_5.jpg', 2, 1),
(59, 7, 'media/boats/7/gallery/5595401682_0_240220100738_3.jpg', 2, 1),
(60, 7, 'media/boats/7/gallery/14456401682_0_240220100738_4.jpg', 2, 1),
(61, 7, 'media/boats/7/gallery/19281401682_0_240220100738_5.jpg', 2, 1),
(62, 8, 'media/boats/8/gallery/7514324085_p_t_640x480_image03.jpg', 1, 1),
(63, 8, 'media/boats/8/gallery/7051324085_p_t_640x480_image04.jpg', 1, 1),
(64, 8, 'media/boats/8/gallery/17512324098_p_t_640x480_image07.jpg', 1, 1),
(65, 8, 'media/boats/8/gallery/129jpeg.jpg', 1, 1),
(170, 124, 'media/boats/124/gallery/7773401682_0_240220100738_1.jpg', 1, 1),
(67, 8, 'media/boats/8/gallery/9149Sun_224_BowTable_14.jpg', 2, 1),
(151, 101, 'media/boats/101/gallery/15493324085_p_t_640x480_image04.jpg', 2, 1),
(175, 124, 'media/boats/124/gallery/8652Sun_224_ConsoleStorage_14.jpg', 2, 1),
(174, 124, 'media/boats/124/gallery/16383Sun_224_BowTable_14.jpg', 2, 1),
(173, 124, 'media/boats/124/gallery/31518Sun_224_AnchorLocker_14.jpg', 2, 1),
(172, 124, 'media/boats/124/gallery/31907401682_0_240220100738_4.jpg', 1, 1),
(171, 124, 'media/boats/124/gallery/29650401682_0_240220100738_3.jpg', 1, 1),
(159, 103, 'media/boats/103/gallery/22644401682_0_240220100738_0.jpg', 1, 1),
(123, 4, 'media/boats/4/gallery/407166714401682_0_240220100738_0.jpg', 1, 1),
(124, 4, 'media/boats/4/gallery/1068177905401682_0_240220100738_1.jpg', 1, 1),
(125, 4, 'media/boats/4/gallery/919115815324085_p_t_640x480_image03.jpg', 1, 1),
(126, 4, 'media/boats/4/gallery/93465028324085_p_t_640x480_image04.jpg', 1, 1),
(127, 4, 'media/boats/4/gallery/5821339361374578205slider333.jpg', 2, 1),
(157, 103, 'media/boats/103/gallery/6022401682_0_240220100738_5.jpg', 1, 1),
(169, 124, 'media/boats/124/gallery/52401682_0_240220100738_0.jpg', 1, 1),
(158, 103, 'media/boats/103/gallery/2119401682_0_240220100738_6.jpg', 1, 1),
(155, 101, 'media/boats/101/gallery/256899734bh-support-bnr.jpg', 1, 1),
(156, 101, 'media/boats/101/gallery/237836654sun_224_bowtable_14.jpg', 1, 1),
(150, 101, 'media/boats/101/gallery/7676324085_p_t_640x480_image03.jpg', 2, 1),
(149, 101, 'media/boats/101/gallery/12238jpgfheg.jpg', 1, 1),
(148, 101, 'media/boats/101/gallery/7369jpeg.jpg', 1, 1),
(147, 101, 'media/boats/101/gallery/1232324098_p_t_640x480_image07.jpg', 1, 1),
(146, 101, 'media/boats/101/gallery/31891324085_p_t_640x480_image04.jpg', 1, 1),
(145, 101, 'media/boats/101/gallery/15746324085_p_t_640x480_image03.jpg', 1, 1),
(152, 101, 'media/boats/101/gallery/31450324098_p_t_640x480_image07.jpg', 2, 1),
(153, 101, 'media/boats/101/gallery/27403jpeg.jpg', 2, 1),
(154, 101, 'media/boats/101/gallery/7656jpgfheg.jpg', 2, 1),
(160, 103, 'media/boats/103/gallery/12701401682_0_240220100738_1.jpg', 1, 1),
(161, 103, 'media/boats/103/gallery/9746401682_0_240220100738_2.jpg', 1, 1),
(162, 103, 'media/boats/103/gallery/25059401682_0_240220100738_3.jpg', 1, 1),
(163, 103, 'media/boats/103/gallery/2016Sun_224_BowTable_14.jpg', 2, 1),
(164, 103, 'media/boats/103/gallery/19097Sun_224_ConsoleStorage_14.jpg', 2, 1),
(165, 103, 'media/boats/103/gallery/4446Sun_224_Head_14.jpg', 2, 1),
(166, 103, 'media/boats/103/gallery/14655Sun_224_Helm_02_14.jpg', 2, 1),
(167, 103, 'media/boats/103/gallery/16908Sun_224_WetBar_01_14.jpg', 2, 1),
(168, 103, 'media/boats/103/gallery/30549Sun_224_AnchorLocker_14.jpg', 2, 1),
(176, 124, 'media/boats/124/gallery/15381Sun_224_Head_14.jpg', 2, 1),
(177, 124, 'media/boats/124/gallery/11050Sun_224_Helm_02_14.jpg', 2, 1),
(178, 124, 'media/boats/124/gallery/23835Sun_224_WetBar_01_14.jpg', 2, 1),
(179, 124, 'media/boats/124/gallery/367792634pic_7.jpg', 1, 1),
(180, 124, 'media/boats/124/gallery/191405363pic_16.jpg', 1, 1),
(182, 124, 'media/boats/124/gallery/1309457103pic_20.jpg', 1, 1),
(183, 124, 'media/boats/124/gallery/1242026302pic_4.jpg', 1, 1),
(198, 124, 'media/boats/124/gallery/722933925bg_img1.jpg', 1, 1),
(262, 124, 'media/boats/124/gallery/83266496hot_04.jpg', 1, 1),
(263, 124, 'media/boats/124/gallery/1345173481hot_05.jpg', 1, 1),
(264, 124, 'media/boats/124/gallery/596463519hot_07.jpg', 1, 1),
(265, 124, 'media/boats/124/gallery/43806353hot_12.jpg', 1, 1),
(266, 124, 'media/boats/124/gallery/150568202hot_13.jpg', 1, 1),
(252, 103, 'media/boats/103/gallery/12507profile-avatar.png', 1, 1),
(253, 103, 'media/boats/103/gallery/14200profile-avatar--.png', 1, 1),
(254, 103, 'media/boats/103/gallery/24145EB6FED7D09CD3186D74810A3A8B.jpg', 1, 1),
(256, 101, 'media/boats/101/gallery/25276EB6FED7D09CD3186D74810A3A8B.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_power_diving`
--

CREATE TABLE IF NOT EXISTS `boat_power_diving` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boat_id` int(11) NOT NULL,
  `engine_type1` varchar(500) DEFAULT NULL,
  `no_of_engine1` varchar(100) DEFAULT NULL,
  `engine_type2` varchar(500) DEFAULT NULL,
  `no_of_engine2` varchar(100) DEFAULT NULL,
  `generator_type1` varchar(500) DEFAULT NULL,
  `no_of_generator1` varchar(100) DEFAULT NULL,
  `generator_type2` varchar(500) DEFAULT NULL,
  `no_of_generator2` varchar(100) DEFAULT NULL,
  `tec_dive_friendly` tinyint(4) NOT NULL,
  `ccr_friendly` tinyint(4) NOT NULL,
  `dive_course_friendly` tinyint(4) NOT NULL,
  `dive_platform` tinyint(4) NOT NULL,
  `compresor_type1` varchar(500) DEFAULT NULL,
  `no_of_compresor1` varchar(100) DEFAULT NULL,
  `compresor_type2` varchar(500) DEFAULT NULL,
  `no_of_compresor2` varchar(100) DEFAULT NULL,
  `nitrox` tinyint(4) NOT NULL,
  `trimix` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `boat_power_diving`
--

INSERT INTO `boat_power_diving` (`id`, `boat_id`, `engine_type1`, `no_of_engine1`, `engine_type2`, `no_of_engine2`, `generator_type1`, `no_of_generator1`, `generator_type2`, `no_of_generator2`, `tec_dive_friendly`, `ccr_friendly`, `dive_course_friendly`, `dive_platform`, `compresor_type1`, `no_of_compresor1`, `compresor_type2`, `no_of_compresor2`, `nitrox`, `trimix`) VALUES
(6, 103, 'fghfgh', '56', '', '', 'fhfghfgh', '56', '', '', 0, 0, 0, 0, 'yrty', '675', 'rtyrty', '567', 0, 0),
(5, 4, 'aaa', '65', 'bbb', '565', 'cccc', '75', 'dddd', '575', 1, 1, 0, 0, 'cmp', '655', 'cmp2', '54', 0, 0),
(7, 101, 'kgyk', '68', '', '', 'jkljklfgh', '856', '', '', 0, 0, 0, 0, 'uiui', '6', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `boat_safety`
--

CREATE TABLE IF NOT EXISTS `boat_safety` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `boat_safety`
--

INSERT INTO `boat_safety` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(8, 1, 'Life jackets', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1),
(9, 1, 'Life Rafts', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1),
(10, 1, 'Propeller Guard', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1),
(11, 1, 'Oxygen Unit', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1),
(12, 1, 'First aid kit', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1),
(13, 1, 'Powered boat', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1),
(14, 1, 'Fire Extenguisher', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1),
(15, 1, 'Satelite Phone', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2014-05-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boat_technical`
--

CREATE TABLE IF NOT EXISTS `boat_technical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `boat_technical`
--

INSERT INTO `boat_technical` (`id`, `language_id`, `title`, `description`, `date`, `status`) VALUES
(3, 1, 'Automatic Fire Extinguisher', 'A dedicated fire extinguisher in the engine room is just another great safety option found on a Regal.', '2014-05-15', 0),
(3, 2, 'เครื่องดับเพลิงอัตโนมัติ', 'เครื่องดับเพลิงโดยเฉพาะในห้องเครื่องยนต์เป็นเพียงตัวเลือกอื่นที่ดีด้านความปลอดภัยที่พบใน Regal', '2014-05-15', 0),
(3, 4, 'Extincteur automatique', 'Un extincteur dédié à la salle des machines est juste une autre option de sécurité grand trouvé sur un Regal.', '2014-05-15', 0),
(9, 2, 'เครื่องปรับอากาศ - ด้วยความร้อนแบบย้อนกลับ', 'ให้เย็นในวันฤดูร้อนหรืออุ่นขึ้นนั่งตอนเช้าของคุณคมชัด', '2014-05-26', 1),
(7, 1, 'Transom trim switch', 'The transom trim switch gives you the ability to easily raise and lower your drive while in water or on a trailer.', '0000-00-00', 1),
(7, 2, 'สวิทช์ตัดท้าย', 'สวิทช์ตัดท้ายช่วยให้คุณสามารถได้อย่างง่ายดายเพิ่มและลดไดรฟ์ของคุณในขณะที่อยู่ในน้ำหรือบนรถพ่วง', '0000-00-00', 1),
(7, 4, 'Interrupteur de compensation de traverse', 'L''interrupteur de compensation tableau vous donne la possibilité d''augmenter facilement et réduire votre voiture alors que dans l''eau ou sur une remorque.', '0000-00-00', 1),
(8, 1, 'Gas Vapor Detector', 'The gas vapor detector lets you know when fumes are in the air.', '0000-00-00', 1),
(8, 2, 'ก๊าซไอตรวจจับ', 'เครื่องตรวจจับก๊าซไอจะช่วยให้คุณทราบเมื่อมีควันอยู่ในอากาศ', '0000-00-00', 1),
(8, 4, 'Détecteur de vapeur de gaz', 'Le détecteur de vapeurs de gaz vous permet de savoir quand les fumées sont dans l''air.', '0000-00-00', 1),
(9, 1, 'Air Conditioning - with Reverse Heat', 'Keep cool on a hot summer day, or warm up on your crisp morning ride.', '2014-05-26', 1),
(9, 4, 'Climatisation - avec Reverse chaleur', 'Tenir au frais sur une chaude journée d''été, ou vous réchauffer sur votre trajet frais du matin.', '2014-04-08', 1);

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
  `booking_date` date NOT NULL,
  `cancel_date` datetime NOT NULL,
  `cancel_status` tinyint(1) NOT NULL,
  `no_of_person` int(11) NOT NULL,
  `no_of_child` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `grand_total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `trip_id`, `trip_schedule_id`, `user_id`, `trip_status`, `pay_status`, `booking_date`, `cancel_date`, `cancel_status`, `no_of_person`, `no_of_child`, `status`, `grand_total`) VALUES
(78, 1, 9, 30, 0, 0, '2014-04-04', '0000-00-00 00:00:00', 0, 2, 0, 0, 264107.52),
(80, 1, 188, 30, 0, 0, '2014-05-21', '0000-00-00 00:00:00', 0, 1, 0, 0, 600.48),
(83, 1, 162, 30, 0, 0, '2014-06-12', '0000-00-00 00:00:00', 0, 2, 1, 0, 1546.614);

-- --------------------------------------------------------

--
-- Table structure for table `booking_beverages`
--

CREATE TABLE IF NOT EXISTS `booking_beverages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `trip_beverage_id` int(11) NOT NULL,
  `no_of_qty` int(11) NOT NULL,
  `beverage_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1226 ;

--
-- Dumping data for table `booking_beverages`
--

INSERT INTO `booking_beverages` (`id`, `booking_id`, `trip_beverage_id`, `no_of_qty`, `beverage_price`) VALUES
(1219, 78, 83, 2, 690),
(1218, 78, 81, 2, 690),
(1217, 78, 79, 2, 694);

-- --------------------------------------------------------

--
-- Table structure for table `booking_cabins`
--

CREATE TABLE IF NOT EXISTS `booking_cabins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `boat_cabin_id` int(11) NOT NULL,
  `no_of_cabin` int(11) NOT NULL,
  `cabin_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=710 ;

--
-- Dumping data for table `booking_cabins`
--

INSERT INTO `booking_cabins` (`id`, `booking_id`, `boat_cabin_id`, `no_of_cabin`, `cabin_price`) VALUES
(690, 78, 136, 1, 56),
(691, 80, 243, 1, 56),
(709, 83, 388, 1, 213);

-- --------------------------------------------------------

--
-- Table structure for table `booking_equipments`
--

CREATE TABLE IF NOT EXISTS `booking_equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `no_of_equipment` int(11) NOT NULL,
  `eq_prices` int(11) NOT NULL,
  PRIMARY KEY (`equipment_id`,`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1050 ;

--
-- Dumping data for table `booking_equipments`
--

INSERT INTO `booking_equipments` (`id`, `booking_id`, `equipment_id`, `no_of_equipment`, `eq_prices`) VALUES
(1043, 78, 904, 2, 1000),
(1042, 78, 905, 2, 40),
(1041, 78, 906, 2, 1150);

-- --------------------------------------------------------

--
-- Table structure for table `booking_foods`
--

CREATE TABLE IF NOT EXISTS `booking_foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `trip_food_id` int(11) NOT NULL,
  `no_of_qty` int(11) NOT NULL,
  `food_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=598 ;

--
-- Dumping data for table `booking_foods`
--

INSERT INTO `booking_foods` (`id`, `booking_id`, `trip_food_id`, `no_of_qty`, `food_price`) VALUES
(591, 78, 35, 2, 68),
(590, 78, 33, 2, 156);

-- --------------------------------------------------------

--
-- Table structure for table `booking_persons`
--

CREATE TABLE IF NOT EXISTS `booking_persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `relation_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_gender` tinyint(1) NOT NULL,
  `p_age` int(11) NOT NULL,
  `dive_certificate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1403 ;

--
-- Dumping data for table `booking_persons`
--

INSERT INTO `booking_persons` (`id`, `booking_id`, `user_id`, `relation_id`, `p_name`, `p_gender`, `p_age`, `dive_certificate_id`) VALUES
(1283, 78, 30, 0, 'kaif 1', 0, 16, 0),
(1282, 78, 30, 0, 'kaif 2', 1, 25, 0),
(1284, 80, 30, 0, 'gfhjghjghj', 1, 21, 0),
(1402, 83, 30, 0, 'fghfgh', 0, 5, 6),
(1401, 83, 30, 0, 'dfhgfgh', 0, 16, 8),
(1400, 83, 30, 0, 'dgfdgdfg', 1, 25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `booking_tickets`
--

CREATE TABLE IF NOT EXISTS `booking_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(255) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_no` (`ticket_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `booking_tickets`
--


-- --------------------------------------------------------

--
-- Table structure for table `cabins`
--

CREATE TABLE IF NOT EXISTS `cabins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `cabin` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cabins`
--

INSERT INTO `cabins` (`id`, `language_id`, `cabin`, `detail`, `status`) VALUES
(4, 1, 'Lower-Standard Cabin', 'Lower-Standard Cabin', 1),
(3, 1, 'Upper-Standard Cabin', 'Upper-Standard Cabin', 1),
(1, 1, 'Master Cabin', 'Master Cabin', 1),
(2, 1, 'Delux Cabin', 'Delux Cabin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cabin_features`
--

CREATE TABLE IF NOT EXISTS `cabin_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabin_id` int(11) NOT NULL,
  `option` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `cabin_features`
--

INSERT INTO `cabin_features` (`id`, `cabin_id`, `option`, `status`) VALUES
(25, 1, 'Ensuite Bathroom', 1),
(2, 1, 'Aircon', 1),
(3, 1, 'Safe Box', 1),
(4, 1, 'Electric outlet', 1),
(5, 1, 'TV', 1),
(6, 1, 'Sound System', 1),
(7, 2, 'Ensuite Bathroom', 1),
(8, 2, 'Aircon', 1),
(9, 2, 'Safe Box', 1),
(10, 2, 'TV', 1),
(11, 2, 'Sound System', 1),
(12, 2, 'Electric outlet', 1),
(13, 3, 'Ensuite Bathroom', 1),
(14, 3, 'Electric outlet', 1),
(15, 3, 'Safe Box', 1),
(16, 3, 'Sound System', 1),
(17, 3, 'TV', 1),
(18, 3, 'Aircon', 1),
(19, 4, 'Ensuite Bathroom', 1),
(20, 4, 'Aircon', 1),
(21, 4, 'Electric outlet', 1),
(22, 4, 'Safe Box', 1),
(23, 4, 'TV', 1),
(24, 4, 'Sound System', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `language_id`, `country_id`, `state_id`, `city`, `status`) VALUES
(1, 1, 1, 2, 'Kanpur', 1),
(2, 1, 1, 1, 'Lucknow', 1),
(3, 1, 1, 2, 'Bhopal', 1),
(4, 1, 1, 2, 'Indore', 1),
(5, 1, 1, 1, 'Bristol', 1),
(7, 1, 2, 4, 'Sydney', 1),
(8, 1, 2, 5, 'Melbourne', 1),
(9, 1, 5, 3, 'Pattaya', 1),
(10, 1, 5, 4, 'Phuket', 1),
(11, 1, 3, 5, 'Paris', 1),
(12, 1, 5, 3, 'Koh Taichai', 1),
(14, 1, 1, 5, 'Goa', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `language_id`, `company`, `logo`, `description`, `date_time`, `status`) VALUES
(1, 1, 'Bowrider', 'images/company/1Cruise Ship Rocking.gif', 'These type company are total suport live dive to our customer with care.\r\n', '2013-11-19 17:00:04', 1),
(2, 1, 'Cuddy', 'images/company/2me.jpg', 'These type company are total suport live dive to our customer with care.', '2013-11-21 15:49:59', 1),
(1, 2, 'เบล', 'images/company/1Cruise Ship Rocking.gif', '<p>\r\n	ssdfdf</p>\r\n', '2013-12-04 17:15:57', 1),
(2, 2, 'เบล', 'images/company/2me.jpg', '<p>\r\n	tewwe</p>\r\n', '2013-12-04 17:16:13', 1),
(14, 1, 'Deck Boat', 'images/company/120.png', 'Andaman & Nicobar Administration\r\n', '2013-12-16 13:24:30', 1),
(14, 2, 'చిరాగ్గా com', 'images/company/120.png', '<p>\r\n	hjkghjghkjghjk</p>\r\n', '2013-12-16 13:24:30', 1),
(22, 1, 'Express Cruiser', 'images/company/2300-DualUltraLounges2-310x520.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2014-01-24 18:06:40', 1),
(22, 2, 'Express thai', 'images/company/2300-DualUltraLounges2-310x520.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2014-01-24 18:06:40', 1),
(22, 4, 'Express french', 'images/company/2300-DualUltraLounges2-310x520.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2014-01-24 18:06:40', 1),
(25, 1, 'Sport Coupen', 'images/company/25download.jpg', 'Sport Coupe Sport Coupen', '2014-02-06 16:48:04', 0),
(1, 4, 'dfhgdfg', '', 'hfdghdfgh', '2014-05-22 12:11:11', 1),
(1, 5, 'dfghdfh', '', 'sdfhfghfgh', '2014-05-22 12:11:11', 1),
(29, 1, 'hgjhj', 'images/company/Cruise Ship Rocking.gif', 'gg', '2014-05-26 14:40:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_branch_address`
--

CREATE TABLE IF NOT EXISTS `company_branch_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_name` varchar(500) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `company_branch_address`
--

INSERT INTO `company_branch_address` (`id`, `language_id`, `company_id`, `branch_name`, `branch_email`, `mobile`, `phone`, `fax`, `country_id`, `state_id`, `city_id`, `street`, `location`, `address`, `type`, `status`) VALUES
(92, 1, 14, 'Sun Corporation', 'sub@sun.com', '8987676545', '0989876566', '098765', 3, 4, 4, 'street', 'location', 'address', '', 1),
(93, 1, 22, 'Faluda Boat In', 'boatFlco@co.com', '9877665433', '67857644', '756765', 5, 1, 17, 'street', 'India', '82/62 pant nagar', '', 1),
(97, 1, 1, 'fhrhrt', 'jon@gmail.com', '7657657', '76575', '56765', 1, 1, 1, 'rtyrt', 'rtytr', 'rtyr', '', 1),
(98, 1, 1, 'kaif', 'john@gmail.com', '9898897667', '9989676767', '767676', 1, 1, 2, 'lko', 'lko', 'lko', '', 1),
(96, 1, 25, 'hjh', 'kaifehtishahjhjkllk@gmail.com', '9889140890', '878787', '665565', 3, 1, 3, '584 ka/jkj171 bangla bazar lucknow', 'Indiaj', 'jjjhjjk', '', 1),
(91, 1, 1, 'Andaman Co', 'andamanCo@gmail.com', '566556', '5565656', '6776', 2, 1, 10, 'address', 'lucknow', 'update address', '', 1),
(67, 1, 2, 'Nikobar', 'nikpbar@gmail.com', '7865654345', '8778688', '876878', 3, 1, 2, 'fdgdf', 'cxfvgf', 'dsfds', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE IF NOT EXISTS `compare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `user_id`, `trip_id`, `trip_schedule_id`, `date_time`) VALUES
(222, '3t3tc3f0eosgqa2n6l3in573e3', 29, 164, '2014-04-17 16:11:07'),
(221, 'e7a9qtt0unmqhpmka2kn5o2qf4', 1, 5, '2014-04-09 11:53:33'),
(220, '6k06e0aof3aavtabb1tcomo3v4', 17, 147, '2014-04-08 15:57:34'),
(219, '6k06e0aof3aavtabb1tcomo3v4', 1, 5, '2014-04-08 15:57:28'),
(216, 't2nh1onur06v7ld88ec46854k0', 1, 5, '2014-04-08 11:53:51'),
(217, 't2nh1onur06v7ld88ec46854k0', 17, 147, '2014-04-08 11:54:14'),
(218, 't2nh1onur06v7ld88ec46854k0', 3, 21, '2014-04-08 11:54:21'),
(224, 'r6njnc50ot219e3psmjadnnqp2', 1, 162, '2014-05-08 17:12:08'),
(225, 'blpbb2uf9kii7fku748e74lpa0', 1, 162, '2014-05-14 17:40:30'),
(226, 'obtbv7q229s2iqq36iv0s6u2o4', 1, 162, '2014-05-15 14:25:27'),
(227, '9a9os6bhgp5ebl35f1ril2m5h1', 37, 189, '2014-05-23 16:44:51'),
(230, '8hh2rog9v0so4ev8ak8aul8gv6', 1, 162, '2014-06-13 10:55:28'),
(231, '2qp8ele5jctd84uam4u5s06d10', 1, 162, '2014-06-13 12:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `confic`
--

CREATE TABLE IF NOT EXISTS `confic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `confic_type_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `control` varchar(200) NOT NULL DEFAULT 'text',
  PRIMARY KEY (`id`,`confic_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `confic`
--

INSERT INTO `confic` (`id`, `confic_type_id`, `title`, `value`, `description`, `control`) VALUES
(1, 1, 'paging', '10', 'Page should be #5, 10, 20, 50, 100, 1000', 'select'),
(3, 1, 'default_mail', 'linus.romak@gmail.com', 'Default mail to communicate with user', 'text'),
(4, 1, 'max_count', '100', '', ''),
(5, 2, 'language', '1', '', ''),
(6, 1, 'service_tax', '8', '', ''),
(10, 1, 'join_point', '100', '', ''),
(11, 1, 'rating_point', '10', '', ''),
(12, 1, 'get_point_on_purchase_product_per_1000_USD', '100', '', ''),
(13, 1, 'login_point', '5', '', ''),
(14, 1, 'price_per_100_point', '2', '', ''),
(15, 1, 'admin_gift_point', '50', '', ''),
(16, 1, 'minimum_used_point', '500', '', ''),
(17, 1, 'point_per_beverage', '5', '', ''),
(18, 1, 'point_per_eqipment', '5', '', ''),
(19, 1, 'point_per_food', '5', '', ''),
(20, 1, 'point_per_cabin', '10', '', ''),
(21, 1, 'trip_low_price_range', '5000', '', 'text'),
(22, 1, 'trip_high_price_range', '25000', '', 'text');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `language_id`, `country`, `country_code`, `status`) VALUES
(1, 1, 'India', 'INR', 1),
(2, 1, 'Australia', 'AUS', 1),
(3, 1, 'France', 'Fr', 1),
(5, 1, 'Thailand', 'THAI', 1),
(5, 2, 'ประเทศไทย', 'THAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_category_id` int(11) NOT NULL COMMENT 'product or trip type id',
  `coupon_type_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL COMMENT 'in percent',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `no_of_coupon` int(11) NOT NULL,
  `no_of_redeem` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `coupon_send_status` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_category_id`, `coupon_type_id`, `discount`, `start_date`, `end_date`, `no_of_coupon`, `no_of_redeem`, `image`, `create_date`, `last_update`, `coupon_send_status`, `status`) VALUES
(19, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:23:02', '2014-04-07 16:23:02', 0, 1),
(18, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:22:17', '2014-04-07 16:22:17', 0, 1),
(15, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:20:37', '2014-04-07 16:20:37', 0, 1),
(16, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:20:43', '2014-04-07 16:20:43', 0, 1),
(17, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:22:05', '2014-04-07 16:22:05', 0, 1),
(12, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-05 13:39:31', '2014-04-05 13:39:31', 0, 1),
(13, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-05 13:39:38', '2014-04-05 13:39:38', 0, 1),
(14, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:20:32', '2014-04-07 16:20:32', 0, 1),
(11, 1, 0, 0, '2014-04-14 00:00:00', '2014-04-17 00:00:00', 0, 0, '', '2014-04-05 13:31:02', '2014-04-05 13:31:02', 0, 1),
(10, 1, 1, 10, '2014-04-02 00:00:00', '2014-04-16 00:00:00', 10, 0, 'media/coupons/10KO samui.jpg', '2014-04-02 12:46:50', '2014-04-23 15:47:57', 1, 1),
(20, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:42:37', '2014-04-07 16:42:37', 0, 1),
(21, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:43:17', '2014-04-07 16:43:17', 0, 1),
(22, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:43:44', '2014-04-07 16:43:44', 0, 1),
(23, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:44:01', '2014-04-07 16:44:01', 0, 1),
(24, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:44:19', '2014-04-07 16:44:19', 0, 1),
(25, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:47:05', '2014-04-07 16:47:05', 0, 1),
(26, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 16:47:12', '2014-04-07 16:47:12', 0, 1),
(27, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 17:27:21', '2014-04-07 17:27:21', 0, 1),
(28, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '2014-04-07 17:27:46', '2014-04-07 17:27:46', 0, 1),
(29, 1, 0, 787, '2014-04-10 00:00:00', '2014-04-23 00:00:00', 8778, 0, 'media/coupons/URL.txt', '2014-04-08 16:35:27', '2014-04-08 16:35:27', 0, 1),
(30, 1, 0, 888, '2014-04-09 00:00:00', '2014-04-24 00:00:00', 88, 0, 'media/coupons/Nagesh-C.V.doc.docx', '2014-04-09 15:26:55', '2014-04-09 15:26:55', 0, 1),
(31, 1, 0, 111, '2014-04-10 00:00:00', '2014-04-17 00:00:00', 9898, 0, 'media/coupons/Nagesh-C.V.doc.docx', '2014-04-09 15:28:39', '2014-04-09 15:28:39', 0, 1),
(32, 1, 0, 989, '2014-04-01 00:00:00', '2014-04-18 00:00:00', 989, 0, 'media/coupons/Nagesh-C.V.doc.docx', '2014-04-09 15:31:31', '2014-04-09 15:31:31', 0, 1),
(33, 1, 0, 87, '2014-04-10 00:00:00', '2014-04-17 00:00:00', 7887, 0, 'media/coupons/19.gif', '2014-04-09 15:32:30', '2014-04-09 15:32:30', 0, 1),
(43, 1, 1, 56, '2014-04-16 00:00:00', '2014-04-24 00:00:00', 65, 0, 'media/coupons/Funny Banana.jpg', '2014-04-10 12:04:59', '2014-04-10 12:10:40', 1, 1),
(36, 1, 0, 998, '2014-04-10 00:00:00', '2014-04-25 00:00:00', 9889, 0, 'media/coupons/Funny Banana.jpg', '2014-04-09 17:01:07', '2014-04-09 17:01:07', 0, 1),
(40, 2, 1, 56, '2014-04-10 00:00:00', '2014-04-18 00:00:00', 100, 0, 'media/coupons/544_1.jpg', '2014-04-09 17:37:23', '2014-04-10 11:56:45', 1, 1),
(42, 1, 1, 43, '2014-04-15 00:00:00', '2014-04-23 00:00:00', 10, 0, 'media/coupons/image11.png', '2014-04-10 11:55:22', '2014-04-10 13:36:10', 0, 1),
(44, 1, 2, 43, '2014-04-30 00:00:00', '2014-05-02 00:00:00', 10, 0, 'media/coupons/44thanks.php', '2014-04-10 12:25:04', '2014-05-21 16:17:59', 1, 0),
(48, 2, 1, 111, '2014-05-21 00:00:00', '2014-05-28 00:00:00', 100, 0, 'media/coupons/Cruise Ship Rocking.gif', '2014-05-27 13:01:30', '2014-05-27 13:01:30', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_attached_to`
--

CREATE TABLE IF NOT EXISTS `coupon_attached_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `attached_id` int(11) NOT NULL COMMENT 'product or tripp_schedule_id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

--
-- Dumping data for table `coupon_attached_to`
--

INSERT INTO `coupon_attached_to` (`id`, `coupon_id`, `attached_id`) VALUES
(64, 36, 21),
(63, 35, 5),
(56, 34, 10),
(55, 34, 15),
(193, 10, 5),
(192, 10, 147),
(191, 10, 9),
(115, 37, 21),
(77, 38, 12),
(76, 38, 21),
(81, 39, 10),
(137, 40, 10),
(135, 41, 15),
(134, 41, 10),
(182, 42, 9),
(181, 42, 5),
(160, 43, 21),
(159, 43, 6),
(200, 44, 5),
(177, 45, 21),
(176, 45, 6),
(203, 46, 162),
(204, 47, 188),
(205, 48, 193);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_details`
--

CREATE TABLE IF NOT EXISTS `coupon_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`coupon_id`,`language_id`,`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `coupon_details`
--

INSERT INTO `coupon_details` (`id`, `coupon_id`, `language_id`, `title`, `description`, `status`) VALUES
(68, 20, 5, '', '', 1),
(64, 19, 5, '', '', 1),
(65, 20, 1, '', '', 1),
(66, 20, 2, '', '', 1),
(67, 20, 4, '', '', 1),
(62, 19, 2, '', '', 1),
(63, 19, 4, '', '', 1),
(59, 18, 4, '', '', 1),
(60, 18, 5, '', '', 1),
(61, 19, 1, '', '', 1),
(58, 18, 2, '', '', 1),
(54, 17, 2, '', '', 1),
(55, 17, 4, '', '', 1),
(56, 17, 5, '', '', 1),
(57, 18, 1, '', '', 1),
(52, 16, 5, '', '', 1),
(53, 17, 1, '', '', 1),
(49, 16, 1, '', '', 1),
(50, 16, 2, '', '', 1),
(51, 16, 4, '', '', 1),
(48, 15, 5, '', '', 1),
(44, 14, 5, '', '', 1),
(45, 15, 1, '', '', 1),
(46, 15, 2, '', '', 1),
(47, 15, 4, '', '', 1),
(42, 14, 2, '', '', 1),
(43, 14, 4, '', '', 1),
(39, 13, 4, '', '', 1),
(40, 13, 5, '', '', 1),
(41, 14, 1, '', '', 1),
(38, 13, 2, '', '', 1),
(32, 11, 5, '', '', 1),
(33, 12, 1, '', '', 1),
(34, 12, 2, '', '', 1),
(35, 12, 4, '', '', 1),
(36, 12, 5, '', '', 1),
(37, 13, 1, '', '', 1),
(29, 11, 1, '', '', 1),
(30, 11, 2, '', '', 1),
(31, 11, 4, '', '', 1),
(27, 10, 4, 'Réduction de 10 pour cent', '10 Percent Discount', 1),
(28, 10, 5, '10 प्रतिशत छूट', '10 Percent Discount', 1),
(25, 10, 1, '10 Percent Discount', '10 Percent Discount', 1),
(26, 10, 2, 'ส่วนลด 10 เปอร์เซ็นต์', '10 Percent Discount', 1),
(69, 21, 1, '', '', 1),
(70, 21, 2, '', '', 1),
(71, 21, 4, '', '', 1),
(72, 21, 5, '', '', 1),
(73, 22, 1, '', '', 1),
(74, 22, 2, '', '', 1),
(75, 22, 4, '', '', 1),
(76, 22, 5, '', '', 1),
(77, 23, 1, '', '', 1),
(78, 23, 2, '', '', 1),
(79, 23, 4, '', '', 1),
(80, 23, 5, '', '', 1),
(81, 24, 1, '', '', 1),
(82, 24, 2, '', '', 1),
(83, 24, 4, '', '', 1),
(84, 24, 5, '', '', 1),
(85, 25, 1, '', '', 1),
(86, 25, 2, '', '', 1),
(87, 25, 4, '', '', 1),
(88, 25, 5, '', '', 1),
(89, 26, 1, '', '', 1),
(90, 26, 2, '', '', 1),
(91, 26, 4, '', '', 1),
(92, 26, 5, '', '', 1),
(93, 27, 1, '', '', 1),
(94, 27, 2, '', '', 1),
(95, 27, 4, '', '', 1),
(96, 27, 5, '', '', 1),
(97, 28, 1, '', '', 1),
(98, 28, 2, '', '', 1),
(99, 28, 4, '', '', 1),
(100, 28, 5, '', '', 1),
(101, 29, 1, '8787', '87887', 1),
(102, 29, 2, '', '', 1),
(103, 29, 4, '', '', 1),
(104, 29, 5, '', '', 1),
(105, 30, 1, 'jkk', 'jkkjjkkjjkjkjk', 1),
(106, 30, 2, '', '', 1),
(107, 30, 4, '', '', 1),
(108, 30, 5, '', '', 1),
(109, 31, 1, '8998', '98989', 1),
(110, 31, 2, '', '', 1),
(111, 31, 4, '', '', 1),
(112, 31, 5, '', '', 1),
(113, 32, 1, 'kjkj', 'kjjk', 1),
(114, 32, 2, '', '', 1),
(115, 32, 4, '', '', 1),
(116, 32, 5, '', '', 1),
(117, 33, 1, 'kjjk', 'jkkj', 1),
(118, 33, 2, '', '', 1),
(119, 33, 4, '', '', 1),
(120, 33, 5, '', '', 1),
(121, 34, 1, 'tes', 'test', 1),
(122, 34, 2, '', '', 1),
(123, 34, 4, '', '', 1),
(124, 34, 5, '', '', 1),
(125, 35, 1, 'ffggf', 'fghgf', 1),
(126, 35, 2, '', '', 1),
(127, 35, 4, '', '', 1),
(128, 35, 5, '', '', 1),
(129, 36, 1, '98', '899898', 1),
(130, 36, 2, '', '', 1),
(131, 36, 4, '', '', 1),
(132, 36, 5, '', '', 1),
(133, 37, 1, 'dfg', 'rewtre', 1),
(134, 37, 2, '', '', 1),
(135, 37, 4, '', '', 1),
(136, 37, 5, '', '', 1),
(137, 38, 1, '5656', '66565656', 1),
(138, 38, 2, '', '', 1),
(139, 38, 4, '', '', 1),
(140, 38, 5, '', '', 1),
(141, 39, 1, '43r3', 'edede', 1),
(142, 39, 2, '', '', 1),
(143, 39, 4, '', '', 1),
(144, 39, 5, '', '', 1),
(145, 40, 1, 'ghhg', 'ghghgh', 1),
(146, 40, 2, '', '', 1),
(147, 40, 4, '', '', 1),
(148, 40, 5, '', '', 1),
(149, 41, 1, 'ghhg', '5555', 1),
(150, 41, 2, '', '', 1),
(151, 41, 4, '', '', 1),
(152, 41, 5, '', '', 1),
(153, 42, 1, 'yutu', 'gfhfg', 1),
(154, 42, 2, '', '', 1),
(155, 42, 4, '', '', 1),
(156, 42, 5, '', '', 1),
(157, 43, 1, '6556', '655656', 1),
(158, 43, 2, '', '', 1),
(159, 43, 4, '', '', 1),
(160, 43, 5, '', '', 1),
(161, 44, 1, 'nagesh', 'dfd', 1),
(162, 44, 2, '', '', 1),
(163, 44, 4, '', '', 1),
(164, 44, 5, '', '', 1),
(165, 45, 1, '6776', '766', 1),
(166, 45, 2, '', '', 1),
(167, 45, 4, '', '', 1),
(168, 45, 5, '', '', 1),
(169, 46, 1, 'dfg', 'cb', 1),
(170, 46, 2, '', '', 1),
(171, 47, 1, 'dsfds', 'sdf', 1),
(172, 47, 2, '', '', 1),
(173, 48, 1, 'fghf', 'fghf', 1),
(174, 48, 2, '', '', 1),
(175, 48, 14, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_redeems`
--

CREATE TABLE IF NOT EXISTS `coupon_redeems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `coupon_code` varchar(200) NOT NULL,
  `date_redeem` datetime NOT NULL,
  `redeem_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=272 ;

--
-- Dumping data for table `coupon_redeems`
--


-- --------------------------------------------------------

--
-- Table structure for table `coupon_types`
--

CREATE TABLE IF NOT EXISTS `coupon_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `coupon_type` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `coupon_types`
--

INSERT INTO `coupon_types` (`id`, `language_id`, `coupon_type`, `detail`, `status`) VALUES
(1, 1, 'public_user', 'Send coupon to all user.', 1),
(2, 1, 'regular_user', 'Send coupon to all user who finished any trips.', 1),
(3, 1, 'normal', 'Coupon send to user when user will book any related trip to this coupon.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_users`
--

CREATE TABLE IF NOT EXISTS `coupon_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_gift_by_user_id` int(11) NOT NULL COMMENT 'gift by this user id',
  `coupon_gift_to_user_id` int(11) NOT NULL COMMENT 'gift to this user id',
  `description` text NOT NULL,
  `coupon_code` varchar(500) NOT NULL,
  `product_id` int(11) NOT NULL,
  `coupon_status` int(11) NOT NULL COMMENT '0=Can Not Use; 1=You Can Use; 2=Gift Out; 3=Redeemed; 4=For Approve',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `coupon_users`
--

INSERT INTO `coupon_users` (`id`, `coupon_id`, `user_id`, `coupon_gift_by_user_id`, `coupon_gift_to_user_id`, `description`, `coupon_code`, `product_id`, `coupon_status`) VALUES
(40, 10, 30, 0, 0, 'Coupon from site admin', 'DHW80SBRLD79', 0, 1),
(39, 10, 1, 0, 0, 'Coupon from site admin', '4M5PNAA98KUV', 0, 1),
(50, 38, 1, 0, 0, 'Coupon from site admin', 'YDSFTBBV4LEJ', 0, 1),
(46, 35, 1, 0, 0, 'Coupon from site admin', 'ELRG5ZA7Q8FX', 0, 1),
(49, 37, 30, 0, 0, 'Coupon from site admin', 'RCZXK74RHSK2', 0, 1),
(48, 37, 1, 0, 0, 'Coupon from site admin', '742G1W6KAXNC', 0, 1),
(47, 35, 30, 0, 0, 'Coupon from site admin', 'YDR87XAGCPQB', 0, 1),
(51, 38, 30, 0, 0, 'Coupon from site admin', 'HWFWZG6Z6107', 0, 1),
(52, 39, 1, 0, 0, 'Coupon from site admin', '7TSKPGTHMAY0', 0, 1),
(53, 39, 30, 0, 0, 'Coupon from site admin', 'PZJJWQF2Y901', 0, 1),
(54, 40, 1, 0, 0, 'Coupon from site admin', 'XQKMC2QF5PS4', 0, 1),
(55, 40, 30, 0, 0, 'Coupon from site admin', '85F15KWZSJYB', 0, 1),
(56, 43, 1, 0, 0, 'Coupon from site admin', 'ZKMJ2X71TTX3', 0, 1),
(57, 43, 30, 0, 0, 'Coupon from site admin', 'VP2XJDRYG7DD', 0, 1),
(58, 44, 1, 0, 0, 'Coupon from site admin', '957UDB1HZVDE', 0, 1),
(59, 44, 30, 0, 0, 'Coupon from site admin', 'KEN2A8MDS2QV', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencys`
--

CREATE TABLE IF NOT EXISTS `currencys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(200) NOT NULL,
  `sign_code` varchar(100) NOT NULL COMMENT 'Currency sign code',
  `value` double NOT NULL,
  `default_cur` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `currencys`
--

INSERT INTO `currencys` (`id`, `currency`, `sign_code`, `value`, `default_cur`, `status`) VALUES
(1, 'USD', '$', 1, 1, 1),
(2, 'EURO', '&#8364;', 0.72, 0, 1),
(3, 'BCP', '&pound;', 0.61, 0, 1),
(4, 'INR', 'Rs', 60.77, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dive_certificates`
--

CREATE TABLE IF NOT EXISTS `dive_certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `certificate` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `dive_certificates`
--

INSERT INTO `dive_certificates` (`id`, `language_id`, `certificate`, `description`, `status`) VALUES
(1, 1, 'PADI Open Water', '', 1),
(1, 4, 'PADI Open Water', '', 1),
(2, 1, 'PADI Advanced Open Water', '', 0),
(1, 2, 'PADI Open Water', '', 1),
(2, 2, 'PADI Open Water ???????', '', 0),
(2, 4, 'PADI Advanced Open Water', '', 0),
(3, 1, 'PADI Rescue Diver', '', 1),
(3, 2, '??? PADI Rescue Diver', '', 1),
(3, 4, 'PADI Rescue Diver', '', 1),
(4, 1, 'PADI Divemaster', '', 1),
(4, 2, 'PADI Divemaster', '', 1),
(4, 4, 'PADI Divemaster', '', 1),
(5, 1, 'PADI Instructor', '', 1),
(5, 2, '???????????', '', 1),
(5, 4, 'instructeur PADI', '', 1),
(6, 1, 'CMAS *', '', 1),
(6, 2, 'CMAS *', '', 1),
(6, 4, 'CMAS *', '', 1),
(7, 1, 'CMAS **', '', 1),
(7, 2, 'CMAS **', '', 1),
(7, 4, 'CMAS **', '', 1),
(8, 1, 'CMAS ***', '', 1),
(8, 2, 'CMAS ***', '', 1),
(8, 4, 'CMAS ***', '', 1),
(9, 1, 'CMAS Instructor *', '', 1),
(9, 2, ' CMAS ??? *', '', 1),
(9, 4, 'CMAS Instructor *', '', 1),
(10, 4, 'CMAS **', '', 1),
(10, 2, '??? CMAS **', '', 1),
(10, 1, 'CMAS Instructor **', '', 1),
(11, 4, 'SSI Open Water', '', 1),
(11, 2, 'SSI Open Water', '', 1),
(11, 1, 'SSI Open Water', '', 1),
(12, 1, 'SSI Advanced Open Water', '', 1),
(12, 2, 'SSI Advanced Open Water', '', 1),
(12, 4, 'SSI Advanced Open Water', '', 1),
(13, 1, 'SSI Stress & Rescue', '', 1),
(13, 2, 'SSI Stress & Rescue', '', 1),
(13, 4, 'SSI Stress & Rescue', '', 1),
(14, 1, 'SSI Dive Con', '', 1),
(14, 2, 'SSI Dive Con', '', 1),
(14, 4, 'SSI Dive Con', '', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `language_id`, `title`, `subject`, `content`, `type`, `create_date`, `last_update`, `status`) VALUES
(14, 1, 'Registration', 'iDive Registration', '<table align="left" border="0" style="border-color:#CCCCCC; border-spacing:10; border-width:medium; border:solid; font-family:verdana,geneva,sans-serif; font-size:11px; width:625px">\r\n	<tbody>\r\n		<tr>\r\n			<td>You have received this e-mail because you have registered on iDive Trip.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt="" src="http://idivetrips.com/images/logo.png" style="height:104px; width:200px" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><br />\r\n			<strong>Date : {date} </strong></p>\r\n\r\n			<p>Dear {name},<br />\r\n			<br />\r\n			Welcome to <span style="font-family:verdana,geneva,sans-serif; font-size:11px">iDive Trip</span>. You have successfully registered with us.</p>\r\n\r\n			<p>To verify your acount please <a href="{link}">Click here</a></p>\r\n\r\n			<p>After verified your account you can login with your following username and password.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Username :{username} Password : {password}</p>\r\n\r\n			<p>Thanks.</p>\r\n\r\n			<p>iDive Team</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Registration', '2014-05-27', '2014-05-27 10:05:53', 1),
(15, 1, 'yurty', 'rtytr', '<p>rtyrt</p>\r\n', 'Forget Password', '2014-05-27', '2014-05-27 13:02:06', 1),
(16, 1, 'rtyrt', 'tryrt', '<p>rtyr</p>\r\n', 'New Password', '2014-05-27', '2014-05-27 13:02:14', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `language_id`, `equipment`, `status`) VALUES
(3, 1, 'dive suits', 1),
(2, 2, ' LTE  th_internet', 1),
(2, 1, 'internet', 1),
(2, 4, ' LTE  fr_internet', 1),
(3, 4, 'costumes de plongée', 1),
(3, 2, '????????????????', 1),
(4, 1, 'life jacket', 1),
(4, 2, 'trytr', 1),
(4, 4, 'rtyrt', 1),
(5, 1, 'Airplane', 1),
(5, 2, 'hai', 1),
(5, 4, 'avion', 1),
(6, 1, 'rtyr', 1),
(6, 2, '', 1),
(6, 14, '', 1);

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
  `language_id` int(11) NOT NULL,
  `food_type_id` int(11) NOT NULL,
  `food` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `language_id`, `food_type_id`, `food`, `status`) VALUES
(2, 1, 1, 'Burger,Pizza,Fish Fry,Chiken', 1),
(2, 2, 1, 'เบอร์เกอร์, พิซซ่า, ปลาทอด Murga Bhurji, Chiken', 1),
(2, 4, 1, 'Burger, Pizza, Fish Fry, Murga Bhurji, Chiken', 1),
(4, 4, 1, '', 0),
(4, 2, 1, '', 0),
(4, 1, 1, 'Pulse,Rice,Paneer', 0),
(4, 5, 1, '', 0),
(5, 1, 1, 'ssssaa', 1),
(5, 2, 1, '', 1),
(6, 2, 1, '', 1),
(6, 1, 1, 'dffdf', 1),
(7, 1, 1, 'gfhf', 1),
(7, 2, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_types`
--

CREATE TABLE IF NOT EXISTS `food_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `food_type` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `food_types`
--

INSERT INTO `food_types` (`id`, `language_id`, `food_type`, `status`) VALUES
(1, 1, 'Rice en', 1),
(1, 2, 'rice th', 1),
(1, 4, 'rice fr', 1),
(4, 2, '', 1),
(4, 1, 'vbc', 1),
(3, 1, 'fghfg', 0),
(3, 2, 'fghf', 0),
(3, 4, 'fghf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_tank`
--

CREATE TABLE IF NOT EXISTS `fuel_tank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fuel_tank` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fuel_tank`
--

INSERT INTO `fuel_tank` (`id`, `fuel_tank`, `status`) VALUES
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gallery_type`
--

INSERT INTO `gallery_type` (`id`, `gallery`, `status`) VALUES
(1, 'Exterior', 1),
(2, 'Interior', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gas_type`
--

CREATE TABLE IF NOT EXISTS `gas_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gastype` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gas_type`
--

INSERT INTO `gas_type` (`id`, `gastype`, `status`) VALUES
(1, 'Air Gas', 1),
(2, 'Nitrox Gas', 1),
(3, 'Trimix Gas', 1),
(7, 'hy', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `content`, `icon`, `deff`, `date_time`, `status`) VALUES
(1, 'English', '', 1, '2014-05-16 00:00:00', 1),
(2, 'Thai', '', 1, '2013-11-30 18:21:33', 1);

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
(1, 1, 'top', 'Contact Us', 'index.php?control=menu&id=1', '<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong>CONTACT US</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="0" cellspacing="2" class="contact_tab" style="border:1px solid rgb(241, 241, 241); color:rgb(68, 68, 68); font-family:arial,helvetica,sans-serif; font-size:12px; line-height:22px; margin:0px; padding:0px; text-align:justify; width:631px">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Address</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>INFRANIX Technologies Pvt. Ltd.<br />\r\n			First Floor, Y-Square, Opp. S.K.Motors, Near Khurram Nagar Girls Inter College, Khurram Nagar, Lucknow - 226022, Uttar Pradesh, INDIA</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Phone</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 0522 - 4081436</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Mobile</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 7860022700, 9450020328</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Fax</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>+91 - 0522 - 4081436</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Email</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td><a href="mailto:contact@infranix.com" style="padding: 0px; margin: 0px; color: rgb(139, 0, 0); cursor: pointer;">contact@infranix.com</a>,&nbsp;<a href="mailto:infranix@yahoo.co.in" style="padding: 0px; margin: 0px; color: rgb(139, 0, 0); cursor: pointer;">infranix@yahoo.co.in</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Skype ID</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>tauseef.2sidd</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Website</strong></td>\r\n			<td><strong>:</strong></td>\r\n			<td>www.infranix.com</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="3"><img alt="INFRANIX Technologies Pvt. Ltd." class="goog_map" src="http://infranix.net/templates/infranix/images/mapBig.jpg" style="border:1px solid rgb(204, 204, 204); margin:6px 0px; padding:1px" title="INFRANIX Technologies Pvt. Ltd." /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2014-01-22 15:08:50', 1),
(3, 4, 'top', 'Why iDiveTrips', 'index.php?control=menu&id=3', '<p>Pourquoi iDiveTrips</p>\r\n', '2014-01-22 18:03:39', 1),
(3, 2, 'top', 'ทำไม iDiveTrips', 'index.php?control=menu&id=3', '<p>ทำไม iDiveTrips</p>\r\n', '2014-01-22 18:03:39', 1),
(3, 1, 'top', 'Why iDiveTrips', 'index.php?control=menu&id=3', '<h2><span style="color:#4B0082">Why iDive Trips</span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">Northeast Florida&rsquo;s best reviewed dive shop offers scuba certification courses, dive trips, try scuba, equipment sales, service, rental &amp; repair, tank fills &amp; visual or hydrostatic inspections. &nbsp;We also offer the only official dive charter that travels offshore St. Augustine (spear fishing trips).</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">Very competitive pricing, flexible courses, and a fun, safe crew are what</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">make iDive Florida what it is. &nbsp;We keep our overhead low by keeping a small</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">storefront &amp; using local pools for scuba training, which in turn keeps pricing as low</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">as possible. &nbsp;We offer every course from Open Water to Instructor, as well</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">as Technical, CPR &amp; 1st Aid Certification.</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">Our scuba training staff includes St. John&rsquo;s County Fire, EMT, &amp; Marine Rescue &amp; Paramedic Trainers, Flagler</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">College Alumni, and active Disney Divemasters. &nbsp;Our scuba certification clients include Flagler College,</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">Marineland, Conch House Marina, Comanchee Cove Marina, Girl Scouts, Naval Sea Cadets &amp; many others.</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">We are a NAUI facility, meaning you will receive the best coursework &amp; training available from the oldest</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">scuba certifying agency in existence. &nbsp;NAUI is also the scuba diving agency used by Disney&rsquo;s Dive Team, FDNY, Dept. Of Defense, &amp; now St. John&rsquo;s County Fire Rescue &amp; Sheriff&rsquo;s Dept.</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">We are located on A1A, near the Saint Augustine Lighthouse on Anastasia Island. &nbsp;We all look forward</span></span></span></h2>\r\n\r\n<h2><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">to seeing you on the next dive trip, scuba class, or even just to come by and say hi at the shop!</span></span></span></h2>\r\n\r\n<p><span style="font-size:12px"><span style="color:#000000"><span style="font-family:tahoma,sans-serif">What are you wading for?</span></span></span></p>\r\n', '2014-01-22 18:03:39', 1),
(4, 1, 'footer', 'CURRENT iDIVE PROMOTION', 'index.php?control=menu&id=4', '<p>hhhhhhhhhh</p>\r\n', '2014-01-22 18:33:35', 0),
(4, 2, '', '', 'index.php?control=menu&id=4', '', '2014-01-22 18:33:35', 0),
(4, 4, '', '', 'index.php?control=menu&id=4', '', '2014-01-22 18:33:35', 0),
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
(9, 4, '', '', 'index.php?control=menu&id=9', '', '2014-01-23 15:39:54', 1),
(10, 1, 'footer', 'MEDIA', 'index.php?control=menu&id=10', '<div class="esc-lead-article-title-wrapper">\r\n<h2>The mass <em>media</em> are diversified <em>media</em> technologies that are intended to reach a large audience by mass communication. The technologies through which this&nbsp;<strong>...</strong></h2>\r\n</div>\r\n\r\n<div class="esc-lead-snippet-wrapper">&nbsp;</div>\r\n', '2014-02-20 16:00:34', 1),
(12, 1, 'bottom footer', 'About iDiveTrips', 'index.php?control=menu&id=12', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>\r\n', '2014-02-21 10:57:45', 1),
(12, 2, 'bottom footer', 'เกี่ยวกับ iDiveTrips', 'index.php?control=menu&id=12', '<p>จำ dolor นั่ง Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ยูทาห์ laoreet dolore Magna ประมวลข้อมูลยานพาหนะ erat Ut WISI enim โฆษณาขีดต่ำที่สุด veniam, เลิกเชื่อ ullamcorper ช่อ exerci nostrud สินค้าหลัก lobortis nisl อดีตยูทาห์ aliquip อี commodo consequat Duis autem eum นั้นเพลง iriure ชื่อรหัสในสำนักใน vulputate โพลล์ esse molestie consequat, เพลง Illum dolore eu feugiat nulla facilisis ที่ vero ที่อยู่และรหัส accumsan และรหัส iusto odio dignissim qui blandit praesent luptatum zzril delenit augue Duis dolore เต feugait nulla facilisi</p>\r\n', '2014-02-21 10:57:45', 1),
(12, 4, 'bottom footer', 'À propos de iDiveTrips', 'index.php?control=menu&id=12', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>\r\n', '2014-02-21 10:57:45', 1),
(10, 2, 'footer', '', 'index.php?control=menu&id=10', '', '2014-02-20 16:00:34', 1),
(10, 4, 'footer', '', 'index.php?control=menu&id=10', '', '2014-02-20 16:00:34', 1),
(11, 1, 'footer', 'NEWS', 'index.php?control=menu&id=11', '<div class="esc-lead-article-title-wrapper">\r\n<h2><a class="article usg-AFQjCNGFX0r4BUQfNRwCn_d8MZeuYZUT9Q sig2-JG74AlL-G4JbsFnCejfnhQ did--3412845320840260585" href="http://www.hindustantimes.com/india-news/supreme-court-restrains-tn-govt-from-releasing-rajiv-killers/article1-1186042.aspx" id="MAA4AEgAUABgAWoCaW4" target="_blank">SC stays release of 3 convicts in Rajiv Gandhi killing</a></h2>\r\n</div>\r\n\r\n<div class="esc-lead-article-source-wrapper">\r\n<table cellpadding="0" cellspacing="0" class="al-attribution single-line-height">\r\n	<tbody>\r\n		<tr>\r\n			<td>Hindustan Times</td>\r\n			<td>&nbsp;- &lrm;9 minutes ago&lrm;</td>\r\n			<td>\r\n			<table cellpadding="0" cellspacing="0" class="share-bar-table yesscript" id="43982325787495-sharebar">\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<div class="share-button-wrapper" id=":2u" title="Share on Google+">\r\n						<div class="share-button-state">\r\n						<div class="icon-fc gplus-share-icon share-button">&nbsp;</div>\r\n						</div>\r\n						</div>\r\n						</td>\r\n						<td>\r\n						<div class="share-button-wrapper" id=":2v" title="Share on Twitter">\r\n						<div class="share-button-state">\r\n						<div class="icon-fc share-icon-twitter share-button">&nbsp;</div>\r\n						</div>\r\n						</div>\r\n						</td>\r\n						<td>\r\n						<div class="share-button-wrapper" id=":2w" title="Share on Facebook">\r\n						<div class="share-button-state">\r\n						<div class="icon share-icon-facebook2 share-button">&nbsp;</div>\r\n						</div>\r\n						</div>\r\n						</td>\r\n						<td>\r\n						<div class="share-button-wrapper" id=":2x" title="Share via Email">\r\n						<div class="share-button-state">\r\n						<div class="icon email-icon2 share-button">&nbsp;</div>\r\n						</div>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class="esc-lead-snippet-wrapper">The Supreme Court on Thursday stayed the release of three convicts in the Rajiv Gandhi assassination case by the Tamil Nadu government, saying there have been procedural lapses on the part of the state.</div>\r\n', '2014-02-20 16:03:01', 1),
(11, 2, 'footer', '', 'index.php?control=menu&id=11', '', '2014-02-20 16:03:01', 1),
(11, 4, 'footer', '', 'index.php?control=menu&id=11', '', '2014-02-20 16:03:01', 1),
(13, 1, 'bottom footer', 'Contact a Dealer', 'index.php?control=menu&id=13', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>\r\n', '2014-02-21 10:59:20', 1),
(13, 2, 'bottom footer', 'ติดต่อตัวแทนจำหน่าย', 'index.php?control=menu&id=13', '<p>จำ dolor นั่ง Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ยูทาห์ laoreet dolore Magna ประมวลข้อมูลยานพาหนะ erat Ut WISI enim โฆษณาขีดต่ำที่สุด veniam, เลิกเชื่อ ullamcorper ช่อ exerci nostrud สินค้าหลัก lobortis nisl อดีตยูทาห์ aliquip อี commodo consequat Duis autem eum นั้นเพลง iriure ชื่อรหัสในสำนักใน vulputate โพลล์ esse molestie consequat, เพลง Illum dolore eu feugiat nulla facilisis ที่ vero ที่อยู่และรหัส accumsan และรหัส iusto odio dignissim qui blandit praesent luptatum zzril delenit augue Duis dolore เต feugait nulla facilisi</p>\r\n', '2014-02-21 10:59:20', 1),
(13, 4, 'bottom footer', 'Contactez un concessionnaire', 'index.php?control=menu&id=13', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>\r\n', '2014-02-21 10:59:20', 1),
(14, 1, 'bottom footer', 'Terms of Use', 'index.php?control=menu&id=14', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', '2014-02-21 11:41:25', 1),
(14, 2, 'bottom footer', 'เงื่อนไขการใช้งาน', 'index.php?control=menu&id=14', '<p>จำ dolor นั่ง Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ยูทาห์ laoreet dolore Magna ประมวลข้อมูลยานพาหนะ erat Ut WISI enim โฆษณาขีดต่ำที่สุด veniam, เลิกเชื่อ ullamcorper ช่อ exerci nostrud สินค้าหลัก lobortis nisl อดีตยูทาห์ aliquip อี commodo consequat</p>\r\n', '2014-02-21 11:41:25', 1),
(14, 4, 'bottom footer', 'Conditions d''utilisation', 'index.php?control=menu&id=14', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', '2014-02-21 11:41:25', 1),
(15, 1, 'bottom footer', 'Privacy Policy', 'index.php?control=menu&id=15', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', '2014-02-21 11:44:27', 1),
(15, 2, 'bottom footer', 'นโยบายความเป็นส่วนตัว', 'index.php?control=menu&id=15', '<p>จำ dolor นั่ง Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ยูทาห์ laoreet dolore Magna ประมวลข้อมูลยานพาหนะ erat Ut WISI enim โฆษณาขีดต่ำที่สุด veniam, เลิกเชื่อ ullamcorper ช่อ exerci nostrud สินค้าหลัก lobortis nisl อดีตยูทาห์ aliquip อี commodo consequat</p>\r\n', '2014-02-21 11:44:27', 1),
(15, 4, 'bottom footer', 'Politique de confidentialité', 'index.php?control=menu&id=15', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', '2014-02-21 11:44:27', 1),
(16, 1, 'bottom footer', 'Sitemap', 'index.php?control=menu&id=16', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', '2014-02-21 11:46:02', 1),
(16, 2, 'bottom footer', 'แผนผังเว็บไซต์', 'index.php?control=menu&id=16', '<p>จำ dolor นั่ง Amet, consectetuer adipiscing Elit, sed diam nonummy nibh euismod tincidunt ยูทาห์ laoreet dolore Magna ประมวลข้อมูลยานพาหนะ erat Ut WISI enim โฆษณาขีดต่ำที่สุด veniam, เลิกเชื่อ ullamcorper ช่อ exerci nostrud สินค้าหลัก lobortis nisl อดีตยูทาห์ aliquip อี commodo consequat</p>\r\n', '2014-02-21 11:46:02', 1),
(16, 4, 'bottom footer', 'Plan du site', 'index.php?control=menu&id=16', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', '2014-02-21 11:46:02', 1),
(1, 2, 'top', 'ติดต่อเรา', '', '<p>Contact Us</p>\r\n', '2014-03-20 11:45:29', 1),
(1, 4, 'top', 'Contactez-nous', '', '<p>हमसे संपर्क करें</p>\r\n', '2014-03-20 11:45:29', 1),
(1, 5, 'top', 'हमसे संपर्क करें', '', '<p>हमसे संपर्क करें</p>\r\n', '2014-03-20 11:45:29', 1),
(3, 5, 'top', 'क्यों iDiveTrips', '', '<p>क्यों iDiveTrips</p>\r\n', '2014-03-20 11:46:38', 1),
(18, 1, 'terms conditions', 'nagesh1', 'index.php?control=menu&id=18', '<p>tert</p>\r\n', '2014-05-08 17:48:26', 0),
(18, 2, 'terms conditions', '', 'index.php?control=menu&id=18', '', '2014-05-08 17:48:26', 0),
(18, 4, 'terms conditions', '', 'index.php?control=menu&id=18', '', '2014-05-08 17:48:26', 0),
(18, 5, 'terms conditions', '', 'index.php?control=menu&id=18', '', '2014-05-08 17:48:26', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `language_id`, `company_id`, `first_name`, `last_name`, `email`, `email_trip_manager`, `manager_name`, `email_trip_branch`, `branch_name`, `join_date`, `description`, `latitude`, `longitude`, `status`) VALUES
(1, 1, 1, 'laravel', 'frame', 'laravel54321@gmail.com', 'laravel@yahoo.com', 'billy ferno', 'biltinF54@gmail.com', 'Centero', '2014-01-05 00:00:00', 'testing operators description', 26.726347623874, 100.27836472364, 1),
(5, 1, 2, 'kaif', 'ehtisham', 'admin@gmail.com', 'admin@gmail.com', 'tryr', 'admin@gmail.com', 'rtyr', '2014-01-13 00:00:00', 'rtytr', NULL, NULL, 1);

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

--
-- Dumping data for table `oprator_address`
--


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
(1, 1, 1, 'Home', 'http://gmail.com', '  ', 1, '2013-01-02 00:00:00', 0),
(2, 1, 1, 'Contact us', 'index.php?control=page&id=2', '<p>\r\n	contact us&nbsp;</p>\r\n', 0, '2013-01-01 00:00:00', 1),
(3, 1, 1, 'About Us', 'index.php?control=page&id=3', ' Lorem Ipsum doler sit amet. Lorem Ipsum doler sit amet.Lorem Ipsum doler sit amet. Lorem Ipsum doler sit amet. Lorem Ipsumdolersit amet.\r\n\r\n\r\nFirst Floor, Y-Square, Opposite S.K. Motors, Khurram Nagar, Lucknow - 226022, Uttar Pradesh, INDIA\r\nPhone : +91 - 0522 - 4081436\r\nEmail   : contact@infranix.com\r\nSkype : tauseef.2sidd', 0, '2012-12-31 00:00:00', 1),
(31, 1, 1, 'disclaimer', 'http://label9420.org/tradeallstar/index.php?control=page&id=31', '<p>\r\n	<span style="font-family: Arial, Helvetica, sans-serif; font-style: italic; line-height: 18px; text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially u</span><span style="color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; font-style: italic; line-height: 18px; text-align: justify;">nchanged.</span></p>\r\n', 0, '2013-01-17 17:45:22', 1),
(44, 1, 1, 'Mobile service', 'http://label9420.org/tradeallstar/index.php?control=page&id=44', '', 1, '2013-01-21 18:17:49', 1),
(49, 1, 1, 'service', 'http://google.com', '', 1, '2013-01-22 13:58:13', 1),
(50, 1, 1, 'new content', 'http://label9420.org/tradeallstar/index.php?control=page&id=50', '<p>\r\n	hi dear.</p>\r\n', 0, '2013-01-22 13:58:44', 1),
(57, 1, 1, 'sdod', 'http://localhost/sprovider/index.php?control=page&id=57&tmpid=6', '<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(85, 85, 85); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span></span></p>\r\n', 0, '2013-01-30 18:11:56', 1),
(35, 1, 2, 'Address', 'http://localhost/sprovider/index.php?control=page&id=58&tmpid=6', '<p>\r\n	<span style="font-size: 8pt; line-height: 18px; background-color: rgb(33, 33, 33); color: rgb(123, 123, 123); font-family: Arial, Helvetica, sans-serif;">First Floor, Y-Square, Opposite S.K. Motors, Khurram Nagar, Lucknow - 226022, Uttar Pradesh, INDIA</span></p>\r\n<p style="padding: 5px 0px; margin: 0px; color: rgb(123, 123, 123); background-image: url(http://localhost/sprovider/template/sp_template/images/bod_bot.png); background-color: rgb(33, 33, 33); font-family: Arial, Helvetica, sans-serif; font-size: 16px; background-position: 50% 100%; background-repeat: repeat no-repeat;">\r\n	<span style="padding: 0px; margin: 0px; font-size: 8pt; line-height: 18px;"><label class="lab_for" for="Phone" style="padding: 0px; margin: 0px; width: 100px; text-align: right;"><strong style="padding: 0px; margin: 0px;">Phone&nbsp;</strong>:</label>&nbsp;<label for="number" style="padding: 0px; margin: 0px;">+91 - 0522 - 4081436</label></span></p>\r\n', 0, '2013-02-12 15:26:56', 1),
(59, 1, 1, 'test', 'http://localhost/sprovider/index.php?control=page&id=59&tmpid=6', '<p>\r\n	vbnvbn vb nvn&nbsp;</p>\r\n', 0, '2013-02-20 12:38:47', 1),
(56, 1, 1, 'check', 'http://localhost/sprovider/index.php?control=page&id=56&tmpid=6', '<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; text-align: justify; color: rgb(70, 70, 70); font-family: Arial, Helvetica, sans-serif; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc<br />\r\n	<br />\r\n	<span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc.</span><span style="padding: 5px 7px 3px 0px; margin: 0px; line-height: 15.989583969116211px;">If the tradesperson coming into their home is senstive to small children, doesnt kick the dog... nice to the wife etc</span></span></span></p>\r\n', 0, '2013-01-30 18:03:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateway`
--

CREATE TABLE IF NOT EXISTS `paymentgateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gateway` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `paymentgateway`
--

INSERT INTO `paymentgateway` (`id`, `gateway`, `image`, `status`) VALUES
(3, 'Paypal', 'images/paymentgateway/3ajax-loader.gif', 0),
(10, 'fg', 'images/paymentgateway/Cruise Ship Rocking.gif', 0),
(13, 'ghjgh', 'images/paymentgateway/Cruise Ship Rocking.gif', 0),
(15, 'rra', 'images/paymentgateway/15Cruise Ship Rocking.gif', 0);

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

--
-- Dumping data for table `paypal`
--


-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE IF NOT EXISTS `relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `relation`, `status`) VALUES
(13, 'my_sister', 1),
(25, 'rtytr', 1),
(22, 'nag', 0),
(24, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relation_lang`
--

CREATE TABLE IF NOT EXISTS `relation_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`,`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `relation_lang`
--

INSERT INTO `relation_lang` (`id`, `relation_id`, `language_id`, `content`, `status`) VALUES
(3, 13, 1, 'MY SIsTEr', 1),
(3, 13, 2, 'gfd', 1),
(3, 13, 4, 'fdgd', 1),
(9, 24, 2, '', 1),
(7, 22, 2, '', 0),
(9, 24, 1, '', 1),
(10, 25, 2, '', 1),
(10, 25, 1, 'rtytr', 1),
(7, 22, 1, 'nag', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `language_id`, `country_id`, `state`, `status`) VALUES
(1, 1, 1, 'Uttar Pradesh', 1),
(2, 1, 1, 'Madhya Pradesh', 1),
(3, 1, 2, 'Melbourne', 1),
(4, 1, 2, 'Sydney', 1),
(5, 1, 1, 'UP En', 1),
(5, 2, 1, 'thai up', 1),
(5, 4, 1, 'fr up', 1),
(28, 1, 1, 'cvvg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy`
--

CREATE TABLE IF NOT EXISTS `taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=393 ;

--
-- Dumping data for table `taxonomy`
--

INSERT INTO `taxonomy` (`id`, `keyword`, `description`, `date_time`, `status`) VALUES
(1, 'companies', '', '0000-00-00 00:00:00', 1),
(3, 'show_entries', '', '2013-12-03 13:26:42', 1),
(4, 'taxonomy', '', '2013-12-03 13:51:35', 1),
(5, 'add_new', '', '2013-12-03 13:51:38', 1),
(6, 'cvbcvbcvb', '', '2013-12-03 14:57:23', 1),
(7, 'asdasd', '', '2013-12-12 16:43:08', 1),
(8, 'boats', '', '2013-12-12 18:11:49', 1),
(9, 'add_new', '', '0000-00-00 00:00:00', 1),
(10, 'general_info', '', '2014-01-02 12:41:12', 1),
(11, ' Click to Deactive', '', '0000-00-00 00:00:00', 1),
(12, ' Edit', '', '0000-00-00 00:00:00', 1),
(13, 'Click to Deactive', '', '0000-00-00 00:00:00', 1),
(14, 'Edit', '', '0000-00-00 00:00:00', 1),
(15, 'News & Announcements', '', '0000-00-00 00:00:00', 1),
(16, 'ADD NEW', '', '0000-00-00 00:00:00', 1),
(17, 'Phone No', '', '0000-00-00 00:00:00', 1),
(18, 'Confirm Password', '', '0000-00-00 00:00:00', 1),
(19, 'New Password', '', '0000-00-00 00:00:00', 1),
(20, 'Old Password', '', '0000-00-00 00:00:00', 1),
(21, 'Subscribe', '', '0000-00-00 00:00:00', 1),
(22, 'Nationality', '', '0000-00-00 00:00:00', 1),
(23, 'Mobile No', '', '0000-00-00 00:00:00', 1),
(24, 'City', '', '0000-00-00 00:00:00', 1),
(25, 'State', '', '0000-00-00 00:00:00', 1),
(26, 'Gender', '', '0000-00-00 00:00:00', 1),
(27, 'DOB', '', '0000-00-00 00:00:00', 1),
(28, 'Email-ID', '', '0000-00-00 00:00:00', 1),
(29, 'Last Name', '', '0000-00-00 00:00:00', 1),
(30, 'First Name', '', '0000-00-00 00:00:00', 1),
(31, 'Contact Detail', '', '0000-00-00 00:00:00', 1),
(32, 'Personal Detail', '', '0000-00-00 00:00:00', 1),
(33, 'My Profile', '', '0000-00-00 00:00:00', 1),
(34, 'Qr Code', '', '0000-00-00 00:00:00', 1),
(35, 'Users', '', '0000-00-00 00:00:00', 1),
(36, 'Languages', '', '0000-00-00 00:00:00', 1),
(37, 'Promotions', '', '0000-00-00 00:00:00', 1),
(38, 'Statistics', '', '0000-00-00 00:00:00', 1),
(39, 'Announcements', '', '0000-00-00 00:00:00', 1),
(40, 'Contacts', '', '0000-00-00 00:00:00', 1),
(41, 'Contact', '', '0000-00-00 00:00:00', 1),
(42, 'User Detail', '', '0000-00-00 00:00:00', 1),
(43, 'Total Users', '', '0000-00-00 00:00:00', 1),
(44, 'Search', '', '0000-00-00 00:00:00', 1),
(45, 'Rate', '', '0000-00-00 00:00:00', 1),
(46, 'My Office', '', '0000-00-00 00:00:00', 1),
(47, 'Actions', '', '0000-00-00 00:00:00', 1),
(48, 'Title', '', '0000-00-00 00:00:00', 1),
(49, 'Promotions', '', '0000-00-00 00:00:00', 1),
(50, 'Show Entries', '', '0000-00-00 00:00:00', 1),
(51, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(52, 'Change Password', '', '0000-00-00 00:00:00', 1),
(53, 'New Users', '', '0000-00-00 00:00:00', 1),
(54, 'Active Users', '', '0000-00-00 00:00:00', 1),
(55, 'Deactive Users', '', '0000-00-00 00:00:00', 1),
(56, 'Mail / Message', '', '0000-00-00 00:00:00', 1),
(57, 'Total Messages', '', '0000-00-00 00:00:00', 1),
(58, 'New Messages', '', '0000-00-00 00:00:00', 1),
(59, 'ending Messages', '', '0000-00-00 00:00:00', 1),
(60, 'Notifications', '', '0000-00-00 00:00:00', 1),
(61, 'Total Visits', '', '0000-00-00 00:00:00', 1),
(62, 'New Visits', '', '0000-00-00 00:00:00', 1),
(63, 'New Posts', '', '0000-00-00 00:00:00', 1),
(64, 'Report Abuse', '', '0000-00-00 00:00:00', 1),
(65, 'Account Settings', '', '0000-00-00 00:00:00', 1),
(66, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(67, 'Change Password', '', '0000-00-00 00:00:00', 1),
(68, 'welcome', '', '0000-00-00 00:00:00', 1),
(69, 'User ID', '', '0000-00-00 00:00:00', 1),
(70, 'Name', '', '0000-00-00 00:00:00', 1),
(71, 'Email', '', '0000-00-00 00:00:00', 1),
(72, 'country', '', '0000-00-00 00:00:00', 1),
(73, 'Contact Us', '', '0000-00-00 00:00:00', 1),
(74, 'About Us', '', '0000-00-00 00:00:00', 1),
(75, 'Articles', '', '0000-00-00 00:00:00', 1),
(76, 'News Letters', '', '0000-00-00 00:00:00', 1),
(77, 'Templates', '', '0000-00-00 00:00:00', 1),
(78, 'Iframes', '', '0000-00-00 00:00:00', 1),
(79, 'Subject', '', '0000-00-00 00:00:00', 1),
(80, 'Design for', '', '0000-00-00 00:00:00', 1),
(81, 'Quick Links', '', '0000-00-00 00:00:00', 1),
(82, 'Preview', '', '0000-00-00 00:00:00', 1),
(83, 'Mobile', '', '0000-00-00 00:00:00', 1),
(84, 'Phone', '', '0000-00-00 00:00:00', 1),
(85, 'Thumb Image', '', '0000-00-00 00:00:00', 1),
(86, 'Image', '', '0000-00-00 00:00:00', 1),
(87, 'Add', '', '0000-00-00 00:00:00', 1),
(88, 'Dashboard', '', '0000-00-00 00:00:00', 1),
(89, 'EDIT', '', '0000-00-00 00:00:00', 1),
(90, 'Address', '', '0000-00-00 00:00:00', 1),
(91, 'Content', '', '0000-00-00 00:00:00', 1),
(92, 'Show on home', '', '0000-00-00 00:00:00', 1),
(93, 'Zip Code', '', '0000-00-00 00:00:00', 1),
(323, 'exterior', '', '0000-00-00 00:00:00', 1),
(95, 'Call Center', '', '0000-00-00 00:00:00', 1),
(96, 'View Map', '', '0000-00-00 00:00:00', 1),
(190, 'operator', '', '0000-00-00 00:00:00', 1),
(98, 'Click to Deactive', '', '0000-00-00 00:00:00', 1),
(99, 'Edit', '', '0000-00-00 00:00:00', 1),
(100, 'News & Announcements', '', '0000-00-00 00:00:00', 1),
(101, 'ADD NEW', '', '0000-00-00 00:00:00', 1),
(102, 'Phone No', '', '0000-00-00 00:00:00', 1),
(103, 'Confirm Password', '', '0000-00-00 00:00:00', 1),
(104, 'New Password', '', '0000-00-00 00:00:00', 1),
(105, 'Old Password', '', '0000-00-00 00:00:00', 1),
(106, 'Subscribe', '', '0000-00-00 00:00:00', 1),
(107, 'Nationality', '', '0000-00-00 00:00:00', 1),
(108, 'Mobile No', '', '0000-00-00 00:00:00', 1),
(109, 'City', '', '0000-00-00 00:00:00', 1),
(110, 'State', '', '0000-00-00 00:00:00', 1),
(111, 'Gender', '', '0000-00-00 00:00:00', 1),
(112, 'DOB', '', '0000-00-00 00:00:00', 1),
(113, 'Email-ID', '', '0000-00-00 00:00:00', 1),
(114, 'Last Name', '', '0000-00-00 00:00:00', 1),
(115, 'First Name', '', '0000-00-00 00:00:00', 1),
(116, 'Contact Detail', '', '0000-00-00 00:00:00', 1),
(117, 'Personal Detail', '', '0000-00-00 00:00:00', 1),
(118, 'My Profile', '', '0000-00-00 00:00:00', 1),
(119, 'Qr Code', '', '0000-00-00 00:00:00', 1),
(120, 'Users', '', '0000-00-00 00:00:00', 1),
(121, 'Languages', '', '0000-00-00 00:00:00', 1),
(122, 'Promotions', '', '0000-00-00 00:00:00', 1),
(123, 'Statistics', '', '0000-00-00 00:00:00', 1),
(124, 'Announcements', '', '0000-00-00 00:00:00', 1),
(125, 'Contacts', '', '0000-00-00 00:00:00', 1),
(126, 'Contact', '', '0000-00-00 00:00:00', 1),
(127, 'User Detail', '', '0000-00-00 00:00:00', 1),
(128, 'Total Users', '', '0000-00-00 00:00:00', 1),
(129, 'Search', '', '0000-00-00 00:00:00', 1),
(130, 'Rate', '', '0000-00-00 00:00:00', 1),
(131, 'My Office', '', '0000-00-00 00:00:00', 1),
(132, 'Actions', '', '0000-00-00 00:00:00', 1),
(133, 'Title', '', '0000-00-00 00:00:00', 1),
(134, 'Promotions', '', '0000-00-00 00:00:00', 1),
(135, 'Show Entries', '', '0000-00-00 00:00:00', 1),
(136, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(137, 'Change Password', '', '0000-00-00 00:00:00', 1),
(138, 'New Users', '', '0000-00-00 00:00:00', 1),
(139, 'Active Users', '', '0000-00-00 00:00:00', 1),
(140, 'Deactive Users', '', '0000-00-00 00:00:00', 1),
(141, 'Mail / Message', '', '0000-00-00 00:00:00', 1),
(142, 'Total Messages', '', '0000-00-00 00:00:00', 1),
(143, 'New Messages', '', '0000-00-00 00:00:00', 1),
(144, 'ending Messages', '', '0000-00-00 00:00:00', 1),
(145, 'Notifications', '', '0000-00-00 00:00:00', 1),
(146, 'Total Visits', '', '0000-00-00 00:00:00', 1),
(147, 'New Visits', '', '0000-00-00 00:00:00', 1),
(148, 'New Posts', '', '0000-00-00 00:00:00', 1),
(149, 'Report Abuse', '', '0000-00-00 00:00:00', 1),
(150, 'Account Settings', '', '0000-00-00 00:00:00', 1),
(151, 'Edit Account', '', '0000-00-00 00:00:00', 1),
(152, 'Change Password', '', '0000-00-00 00:00:00', 1),
(153, 'Welcome', '', '0000-00-00 00:00:00', 1),
(154, 'User ID', '', '0000-00-00 00:00:00', 1),
(155, 'Name', '', '0000-00-00 00:00:00', 1),
(156, 'Email', '', '0000-00-00 00:00:00', 1),
(157, 'Country', '', '0000-00-00 00:00:00', 1),
(158, 'Contact Us', '', '0000-00-00 00:00:00', 1),
(159, 'About Us', '', '0000-00-00 00:00:00', 1),
(160, 'Articles', '', '0000-00-00 00:00:00', 1),
(161, 'News Letters', '', '0000-00-00 00:00:00', 1),
(162, 'Templates', '', '0000-00-00 00:00:00', 1),
(163, 'Iframes', '', '0000-00-00 00:00:00', 1),
(164, 'Subject', '', '0000-00-00 00:00:00', 1),
(165, 'Design for', '', '0000-00-00 00:00:00', 1),
(166, 'Quick Links', '', '0000-00-00 00:00:00', 1),
(167, 'Preview', '', '0000-00-00 00:00:00', 1),
(168, 'Mobile', '', '0000-00-00 00:00:00', 1),
(169, 'Phone', '', '0000-00-00 00:00:00', 1),
(170, 'Thumb Image', '', '0000-00-00 00:00:00', 1),
(171, 'Image', '', '0000-00-00 00:00:00', 1),
(172, 'Add', '', '0000-00-00 00:00:00', 1),
(173, 'Dashboard', '', '0000-00-00 00:00:00', 1),
(174, 'EDIT', '', '0000-00-00 00:00:00', 1),
(175, 'Address', '', '0000-00-00 00:00:00', 1),
(176, 'Content', '', '0000-00-00 00:00:00', 1),
(177, 'Show on home', '', '0000-00-00 00:00:00', 1),
(178, 'Zip Code', '', '0000-00-00 00:00:00', 1),
(322, 'gallery', '', '0000-00-00 00:00:00', 1),
(180, 'Call Center', '', '0000-00-00 00:00:00', 1),
(181, 'View Map', '', '0000-00-00 00:00:00', 1),
(182, 'Click to Deactive', '', '0000-00-00 00:00:00', 1),
(183, 'Itinerary', '', '0000-00-00 00:00:00', 1),
(185, 'flag_image', '', '0000-00-00 00:00:00', 1),
(186, 'language_file', '', '0000-00-00 00:00:00', 1),
(187, 'save', '', '0000-00-00 00:00:00', 1),
(188, 'itinerary;msgstr_การเดินทาง', '', '2014-01-27 15:39:10', 1),
(189, 'itinerary;msgstr_itinerary', '', '2014-01-27 15:56:37', 1),
(191, 'trips', '', '0000-00-00 00:00:00', 1),
(192, 'click_to_deactive', '', '0000-00-00 00:00:00', 1),
(193, 'news_&_announcements', '', '0000-00-00 00:00:00', 1),
(194, 'phone_no', '', '0000-00-00 00:00:00', 1),
(195, 'confirm_password', '', '0000-00-00 00:00:00', 1),
(196, 'new_password', '', '0000-00-00 00:00:00', 1),
(197, 'old_password', '', '0000-00-00 00:00:00', 1),
(198, 'mobile_no', '', '0000-00-00 00:00:00', 1),
(199, 'last_name', '', '0000-00-00 00:00:00', 1),
(200, 'first_name', '', '0000-00-00 00:00:00', 1),
(201, 'contact_detail', '', '0000-00-00 00:00:00', 1),
(202, 'personal_detail', '', '0000-00-00 00:00:00', 1),
(203, 'my_profile', '', '0000-00-00 00:00:00', 1),
(204, 'qr_code', '', '0000-00-00 00:00:00', 1),
(205, 'user_detail', '', '0000-00-00 00:00:00', 1),
(206, 'total_users', '', '0000-00-00 00:00:00', 1),
(207, 'my_office', '', '0000-00-00 00:00:00', 1),
(208, 'edit_account', '', '0000-00-00 00:00:00', 1),
(209, 'change_password', '', '0000-00-00 00:00:00', 1),
(210, 'new_users', '', '0000-00-00 00:00:00', 1),
(211, 'active_users', '', '0000-00-00 00:00:00', 1),
(212, 'deactive_users', '', '0000-00-00 00:00:00', 1),
(213, 'mail_/_message', '', '0000-00-00 00:00:00', 1),
(214, 'total_messages', '', '0000-00-00 00:00:00', 1),
(215, 'new_messages', '', '0000-00-00 00:00:00', 1),
(216, 'ending_messages', '', '0000-00-00 00:00:00', 1),
(217, 'total_visits', '', '0000-00-00 00:00:00', 1),
(218, 'new_visits', '', '0000-00-00 00:00:00', 1),
(219, 'new_posts', '', '0000-00-00 00:00:00', 1),
(220, 'report_abuse', '', '0000-00-00 00:00:00', 1),
(221, 'account_settings', '', '0000-00-00 00:00:00', 1),
(222, 'user_id', '', '0000-00-00 00:00:00', 1),
(223, 'contact_us', '', '0000-00-00 00:00:00', 1),
(224, 'about_us', '', '0000-00-00 00:00:00', 1),
(225, 'news_letters', '', '0000-00-00 00:00:00', 1),
(226, 'design_for', '', '0000-00-00 00:00:00', 1),
(227, 'quick_links', '', '0000-00-00 00:00:00', 1),
(228, 'thumb_image', '', '0000-00-00 00:00:00', 1),
(229, 'show_on_home', '', '0000-00-00 00:00:00', 1),
(230, 'zip_code', '', '0000-00-00 00:00:00', 1),
(231, 'call_center', '', '0000-00-00 00:00:00', 1),
(232, 'view_map', '', '0000-00-00 00:00:00', 1),
(233, 'events', '', '0000-00-00 00:00:00', 1),
(234, 'products', '', '0000-00-00 00:00:00', 1),
(235, 'home', '', '0000-00-00 00:00:00', 1),
(236, 'wishlist', '', '0000-00-00 00:00:00', 1),
(237, 'compare', '', '0000-00-00 00:00:00', 1),
(238, 'my_account', '', '0000-00-00 00:00:00', 1),
(239, 'logout', '', '0000-00-00 00:00:00', 1),
(240, 'login', '', '0000-00-00 00:00:00', 1),
(241, 'last_minute_trips', '', '0000-00-00 00:00:00', 1),
(242, 'read_more', '', '0000-00-00 00:00:00', 1),
(243, 'liveabords', '', '0000-00-00 00:00:00', 1),
(244, 'day_trips', '', '0000-00-00 00:00:00', 1),
(245, 'monthly_e-news_letter', '', '0000-00-00 00:00:00', 1),
(246, 'this_trip_will_expire_in', '', '0000-00-00 00:00:00', 1),
(247, 'famous_boats', '', '0000-00-00 00:00:00', 1),
(248, 'our_trips', '', '0000-00-00 00:00:00', 1),
(249, '', '', '0000-00-00 00:00:00', 1),
(250, 'welcome_visitor_you_can', '', '0000-00-00 00:00:00', 1),
(251, 'create_an_account', '', '0000-00-00 00:00:00', 1),
(252, 'subscribe_to_our_newsletter_and_get_exclusive_deals_you_wont_find_anywhere.', '', '0000-00-00 00:00:00', 1),
(253, 'subscribe_to_our_newsletter_and_get_exclusive_deals_you_wont_find_anywhere', '', '0000-00-00 00:00:00', 1),
(254, 'e-mail_id_here', '', '0000-00-00 00:00:00', 1),
(255, 'submit', '', '0000-00-00 00:00:00', 1),
(256, '_all_right_reserved', '', '0000-00-00 00:00:00', 1),
(257, 'all_right_reserved', '', '0000-00-00 00:00:00', 1),
(258, 'view_boat_specification', '', '0000-00-00 00:00:00', 1),
(259, 'start_date', '', '0000-00-00 00:00:00', 1),
(260, 'end_date', '', '0000-00-00 00:00:00', 1),
(261, 'no_of_dives', '', '0000-00-00 00:00:00', 1),
(262, 'description', '', '0000-00-00 00:00:00', 1),
(263, 'space_left', '', '0000-00-00 00:00:00', 1),
(264, 'origin', '', '0000-00-00 00:00:00', 1),
(265, 'no_trips_found', '', '0000-00-00 00:00:00', 1),
(266, 'share_your_story', '', '0000-00-00 00:00:00', 1),
(267, 'owners', '', '0000-00-00 00:00:00', 1),
(268, 'sportswear', '', '0000-00-00 00:00:00', 1),
(269, 'tips', '', '0000-00-00 00:00:00', 1),
(270, 'safety', '', '0000-00-00 00:00:00', 1),
(271, 'boat_name', '', '0000-00-00 00:00:00', 1),
(272, 'destination', '', '0000-00-00 00:00:00', 1),
(273, 'days', '', '0000-00-00 00:00:00', 1),
(274, 'nights', '', '0000-00-00 00:00:00', 1),
(275, 'dives', '', '0000-00-00 00:00:00', 1),
(276, 'cabin_pricing_(per_pax)', '', '0000-00-00 00:00:00', 1),
(277, 'available_options', '', '0000-00-00 00:00:00', 1),
(278, 'review', '', '0000-00-00 00:00:00', 1),
(279, 'total', '', '0000-00-00 00:00:00', 1),
(280, 'book_now', '', '0000-00-00 00:00:00', 1),
(281, 'specification', '', '0000-00-00 00:00:00', 1),
(282, 'related_trips', '', '0000-00-00 00:00:00', 1),
(283, 'no_items', '', '0000-00-00 00:00:00', 1),
(284, 'view_all_trips', '', '0000-00-00 00:00:00', 1),
(285, 'no_reviews_found', '', '0000-00-00 00:00:00', 1),
(286, 'customer_review', '', '0000-00-00 00:00:00', 1),
(287, 'important_notice', '', '0000-00-00 00:00:00', 1),
(288, 'package_includes', '', '0000-00-00 00:00:00', 1),
(289, 'package_excludes', '', '0000-00-00 00:00:00', 1),
(290, 'day', '', '0000-00-00 00:00:00', 1),
(291, 'you_can_add_upto_3_trips_to_compare', '', '0000-00-00 00:00:00', 1),
(292, 'duration', '', '0000-00-00 00:00:00', 1),
(293, 'price', '', '0000-00-00 00:00:00', 1),
(294, 'boat_specification', '', '0000-00-00 00:00:00', 1),
(295, 'length_overall', '', '0000-00-00 00:00:00', 1),
(296, 'beam', '', '0000-00-00 00:00:00', 1),
(297, 'draft-drive_up-high_trim', '', '0000-00-00 00:00:00', 1),
(298, 'draft-drive_down', '', '0000-00-00 00:00:00', 1),
(299, 'deadrise', '', '0000-00-00 00:00:00', 1),
(300, 'approximate_dry_weight', '', '0000-00-00 00:00:00', 1),
(301, 'estimated_height_on_trailer_-_top_of_windshield', '', '0000-00-00 00:00:00', 1),
(302, 'boat_height_-_windshield_to_keel', '', '0000-00-00 00:00:00', 1),
(303, 'bridge_clearance_-_top_up', '', '0000-00-00 00:00:00', 1),
(304, 'bridge_clearance_-_top_down', '', '0000-00-00 00:00:00', 1),
(305, 'cockpit_depth_-_helm', '', '0000-00-00 00:00:00', 1),
(306, 'cockpit_storage', '', '0000-00-00 00:00:00', 1),
(307, 'fuel_capacity', '', '0000-00-00 00:00:00', 1),
(308, 'boat_technical_features', '', '0000-00-00 00:00:00', 1),
(309, 'technical_features', '', '0000-00-00 00:00:00', 1),
(310, 'engine_options', '', '0000-00-00 00:00:00', 1),
(311, 'technical_options', '', '0000-00-00 00:00:00', 1),
(312, 'estimated_height_on_trailer-top_of_windshield', '', '0000-00-00 00:00:00', 1),
(313, 'boat_height-windshield_to_keel', '', '0000-00-00 00:00:00', 1),
(314, 'bridge_clearance-top_up', '', '0000-00-00 00:00:00', 1),
(315, 'bridge_clearance-top_down', '', '0000-00-00 00:00:00', 1),
(316, 'cockpit_depth-helm', '', '0000-00-00 00:00:00', 1),
(317, 'boat_engine_&_technical_options', '', '0000-00-00 00:00:00', 1),
(318, 'overview', '', '0000-00-00 00:00:00', 1),
(319, 'floorplans', '', '0000-00-00 00:00:00', 1),
(320, 'specs', '', '0000-00-00 00:00:00', 1),
(321, 'featured_&_options', '', '0000-00-00 00:00:00', 1),
(324, 'interior', '', '0000-00-00 00:00:00', 1),
(325, 'no_gallery_found', '', '0000-00-00 00:00:00', 1),
(326, 'specifications', '', '0000-00-00 00:00:00', 1),
(327, 'interior_features', '', '0000-00-00 00:00:00', 1),
(328, 'cockpit_features', '', '0000-00-00 00:00:00', 1),
(329, 'helm_features', '', '0000-00-00 00:00:00', 1),
(330, 'hull_&_deck_features', '', '0000-00-00 00:00:00', 1),
(331, 'action', '', '0000-00-00 00:00:00', 1),
(332, 'trip_price', '', '0000-00-00 00:00:00', 1),
(333, 'trip_name', '', '0000-00-00 00:00:00', 1),
(334, 'my_wishlist', '', '0000-00-00 00:00:00', 1),
(335, 'no_items_found', '', '0000-00-00 00:00:00', 1),
(336, 'continue', '', '0000-00-00 00:00:00', 1),
(337, 'edit_your_account_information', '', '0000-00-00 00:00:00', 1),
(338, 'change_your_password', '', '0000-00-00 00:00:00', 1),
(339, 'modify_your_address_book_entries', '', '0000-00-00 00:00:00', 1),
(340, 'modify_your_wishlist', '', '0000-00-00 00:00:00', 1),
(341, 'my_orders', '', '0000-00-00 00:00:00', 1),
(342, 'view_your_order_history', '', '0000-00-00 00:00:00', 1),
(343, 'your_rewards_points', '', '0000-00-00 00:00:00', 1),
(344, 'view_your_coupons', '', '0000-00-00 00:00:00', 1),
(345, 'your_transactions', '', '0000-00-00 00:00:00', 1),
(346, 'newsletter', '', '0000-00-00 00:00:00', 1),
(347, 'subscribe_to_our_newsletter', '', '0000-00-00 00:00:00', 1),
(348, 'my_account_information', '', '0000-00-00 00:00:00', 1),
(349, 'your_personal_details', '', '0000-00-00 00:00:00', 1),
(350, 'username', '', '0000-00-00 00:00:00', 1),
(351, 'e-mail', '', '0000-00-00 00:00:00', 1),
(352, 'update', '', '0000-00-00 00:00:00', 1),
(353, 'your_password', '', '0000-00-00 00:00:00', 1),
(354, 'password_changed_sucessfully', '', '0000-00-00 00:00:00', 1),
(355, 'address_book', '', '0000-00-00 00:00:00', 1),
(356, 'address_book_entries', '', '0000-00-00 00:00:00', 1),
(357, 'new_address_entry', '', '0000-00-00 00:00:00', 1),
(358, 'post_code', '', '0000-00-00 00:00:00', 1),
(359, 'region/state', '', '0000-00-00 00:00:00', 1),
(360, 'delete', '', '0000-00-00 00:00:00', 1),
(361, 'order_history', '', '0000-00-00 00:00:00', 1),
(362, 'my_trips', '', '0000-00-00 00:00:00', 1),
(363, 'checkout_status', '', '0000-00-00 00:00:00', 1),
(364, 'you_have_not_order_any_trip_yet', '', '0000-00-00 00:00:00', 1),
(365, 'return_date', '', '0000-00-00 00:00:00', 1),
(366, 'departure_date', '', '0000-00-00 00:00:00', 1),
(367, 'booking_date', '', '0000-00-00 00:00:00', 1),
(368, 'persons', '', '0000-00-00 00:00:00', 1),
(369, 'children', '', '0000-00-00 00:00:00', 1),
(370, 'grand_total', '', '0000-00-00 00:00:00', 1),
(371, 'rate_it', '', '0000-00-00 00:00:00', 1),
(372, 'rewards', '', '0000-00-00 00:00:00', 1),
(373, 'my_rewards', '', '0000-00-00 00:00:00', 1),
(374, 'remain_points', '', '0000-00-00 00:00:00', 1),
(375, 'points_details(log)', '', '0000-00-00 00:00:00', 1),
(376, 'my_coupon', '', '0000-00-00 00:00:00', 1),
(377, 'new_coupon', '', '0000-00-00 00:00:00', 1),
(378, 'used_coupon', '', '0000-00-00 00:00:00', 1),
(379, 'redeem', '', '0000-00-00 00:00:00', 1),
(380, 'cancel', '', '0000-00-00 00:00:00', 1),
(381, 'share', '', '0000-00-00 00:00:00', 1),
(382, 'you_have_not_used_any_coupon_yet', '', '0000-00-00 00:00:00', 1),
(383, 'discount', '', '0000-00-00 00:00:00', 1),
(384, 'last_date', '', '0000-00-00 00:00:00', 1),
(385, 'password', '', '0000-00-00 00:00:00', 1),
(386, 'transactions', '', '0000-00-00 00:00:00', 1),
(387, 'address_books', '', '0000-00-00 00:00:00', 1),
(388, 'select_country', '', '0000-00-00 00:00:00', 1),
(389, 'select_origin', '', '0000-00-00 00:00:00', 1),
(390, 'select_destination', '', '0000-00-00 00:00:00', 1),
(391, 'price_from:_min', '', '0000-00-00 00:00:00', 1),
(392, 'price_from:_max', '', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=393 ;

--
-- Dumping data for table `taxonomy_content`
--

INSERT INTO `taxonomy_content` (`taxonomy_id`, `language_id`, `content`, `date_time`, `status`) VALUES
(1, 2, 'บริษัท', '2013-12-02 13:37:10', 1),
(211, 2, 'ผู้ใช้งานที่ใช้งานล่าสุด', '2014-05-16 11:51:18', 1),
(3, 2, 'แสดงคอมเมนต์', '2014-05-16 11:51:18', 1),
(4, 2, 'อนุกรมวิธาน', '2013-12-03 13:57:12', 1),
(210, 2, 'ผู้ใช้งานใหม่', '2014-05-16 11:51:18', 1),
(5, 2, 'เพิ่มใหม', '2014-05-16 11:51:18', 1),
(209, 2, 'เปลี่ยนรหัสผ่าน', '2014-05-16 11:51:18', 1),
(9, 2, 'เพิ่มรายการใหม่', NULL, 1),
(11, 2, ' Click to Deactive', NULL, 1),
(12, 2, ' Edit', NULL, 1),
(208, 2, 'แก้ไขบัญชี', '2014-05-16 11:51:18', 1),
(13, 4, 'Click to Deactive', NULL, 1),
(14, 4, 'Edit', NULL, 1),
(15, 4, 'News & Announcements', NULL, 1),
(16, 4, 'ADD NEW', NULL, 1),
(17, 4, 'Phone No', NULL, 1),
(18, 4, 'Confirm Password', NULL, 1),
(19, 4, 'New Password', NULL, 1),
(20, 4, 'Old Password', NULL, 1),
(21, 4, 'Subscribe', NULL, 1),
(22, 4, 'Nationality', NULL, 1),
(23, 4, 'Mobile No', NULL, 1),
(24, 4, 'City', NULL, 1),
(25, 4, 'State', NULL, 1),
(26, 4, 'Gender', NULL, 1),
(27, 4, 'DOB', NULL, 1),
(28, 4, 'Email-ID', NULL, 1),
(29, 4, 'Last Name', NULL, 1),
(30, 4, 'First Name', NULL, 1),
(31, 4, 'Contact Detail', NULL, 1),
(32, 4, 'Personal Detail', NULL, 1),
(33, 4, 'My Profile', NULL, 1),
(34, 4, 'Qr Code', NULL, 1),
(35, 4, 'Users', NULL, 1),
(36, 4, 'Languages', NULL, 1),
(37, 4, 'Promotions', NULL, 1),
(38, 4, 'Statistics', NULL, 1),
(39, 4, 'Announcements', NULL, 1),
(40, 4, 'Contacts', NULL, 1),
(41, 4, 'Contact', NULL, 1),
(42, 4, 'User Detail', NULL, 1),
(43, 4, 'Total Users', NULL, 1),
(44, 4, 'Search', NULL, 1),
(45, 4, 'Rate', NULL, 1),
(46, 4, 'My Office', NULL, 1),
(47, 4, 'Actions', NULL, 1),
(48, 4, 'Title', NULL, 1),
(49, 4, 'Promotions', NULL, 1),
(50, 4, 'Show Entries', NULL, 1),
(51, 4, 'Edit Account', NULL, 1),
(52, 4, 'Change Password', NULL, 1),
(53, 4, 'New Users', NULL, 1),
(54, 4, 'Active Users', NULL, 1),
(55, 4, 'Deactive Users', NULL, 1),
(56, 4, 'Mail / Message', NULL, 1),
(57, 4, 'Total Messages', NULL, 1),
(58, 4, 'New Messages', NULL, 1),
(59, 4, 'ending Messages', NULL, 1),
(60, 4, 'Notifications', NULL, 1),
(61, 4, 'Total Visits', NULL, 1),
(62, 4, 'New Visits', NULL, 1),
(63, 4, 'New Posts', NULL, 1),
(64, 4, 'Report Abuse', NULL, 1),
(65, 4, 'Account Settings', NULL, 1),
(66, 4, 'Edit Account', NULL, 1),
(67, 4, 'Change Password', NULL, 1),
(68, 4, 'Welcome', NULL, 1),
(69, 4, 'User ID', NULL, 1),
(70, 4, 'Name', NULL, 1),
(71, 4, 'Email', NULL, 1),
(72, 4, 'Country', NULL, 1),
(73, 4, 'Contact Us', NULL, 1),
(74, 4, 'About Us', NULL, 1),
(75, 4, 'Articles', NULL, 1),
(76, 4, 'News Letters', NULL, 1),
(77, 4, 'Templates', NULL, 1),
(78, 4, 'Iframes', NULL, 1),
(79, 4, 'Subject', NULL, 1),
(80, 4, 'Design for', NULL, 1),
(81, 4, 'Quick Links', NULL, 1),
(82, 4, 'Preview', NULL, 1),
(83, 4, 'Mobile', NULL, 1),
(84, 4, 'Phone', NULL, 1),
(85, 4, 'Thumb Image', NULL, 1),
(86, 4, 'Image', NULL, 1),
(87, 4, 'Add', NULL, 1),
(88, 4, 'Dashboard', NULL, 1),
(89, 4, 'EDIT', NULL, 1),
(90, 4, 'Address', NULL, 1),
(91, 4, 'Content', NULL, 1),
(92, 4, 'Show on home', NULL, 1),
(93, 4, 'Zip Code', NULL, 1),
(324, 1, 'Interior', '2014-05-16 11:51:10', 1),
(95, 4, 'Call Center', NULL, 1),
(96, 4, 'View Map', NULL, 1),
(97, 4, '', NULL, 1),
(48, 2, 'ชื่อเรื่อง', '2014-05-16 11:51:18', 1),
(47, 2, 'การปฏิบัติ', '2014-05-16 11:51:18', 1),
(207, 2, 'Office ของฉัน', '2014-05-16 11:51:18', 1),
(45, 2, 'อัตรา', '2014-05-16 11:51:18', 1),
(44, 2, 'ค้นหา', '2014-05-16 11:51:18', 1),
(206, 2, 'สมาชิกทั้งหมด', '2014-05-16 11:51:18', 1),
(205, 2, 'รายละเอียดผู้ใช้', '2014-05-16 11:51:18', 1),
(41, 2, 'ติดต่อ', '2014-05-16 11:51:18', 1),
(40, 2, 'ติดต่อ', '2014-05-16 11:51:18', 1),
(39, 2, 'ประกาศ', '2014-05-16 11:51:18', 1),
(38, 2, 'สถิต', '2014-05-16 11:51:18', 1),
(37, 2, 'โปรโมชั่น', '2014-05-16 11:51:18', 1),
(36, 2, 'ภาษา', '2014-05-16 11:51:18', 1),
(35, 2, 'ผู้ใช้งาน', '2014-05-16 11:51:18', 1),
(204, 2, 'รหัส QR', '2014-05-16 11:51:18', 1),
(203, 2, 'โปรไฟล์ของฉัน', '2014-05-16 11:51:18', 1),
(202, 2, 'รายละเอียดส่วนบุคคล', '2014-05-16 11:51:18', 1),
(201, 2, 'รายละเอียดติดต่อ', '2014-05-16 11:51:18', 1),
(200, 2, 'ชื่อแรก', '2014-05-16 11:51:18', 1),
(199, 2, 'นามสกุล', '2014-05-16 11:51:18', 1),
(28, 2, 'อีเมล์-ID', '2014-05-16 11:51:18', 1),
(27, 2, 'วันเกิด', '2014-05-16 11:51:18', 1),
(26, 2, 'เพศ', '2014-05-16 11:51:18', 1),
(25, 2, 'รัฐ', '2014-05-16 11:51:18', 1),
(24, 2, 'เมือง', '2014-05-16 11:51:18', 1),
(198, 2, 'ไม่มีมือถือ', '2014-05-16 11:51:18', 1),
(22, 2, 'สัญชาติ', '2014-05-16 11:51:18', 1),
(21, 2, 'สมัครสมาชิก', '2014-05-16 11:51:18', 1),
(197, 2, 'รหัสผ่านเก่า', '2014-05-16 11:51:18', 1),
(196, 2, 'รหัสผ่านตัวใหม่', '2014-05-16 11:51:18', 1),
(195, 2, 'ยืนยันรหัสผ่าน', '2014-05-16 11:51:18', 1),
(194, 2, 'โทรศัพท์ไม่มี', '2014-05-16 11:51:18', 1),
(193, 2, 'ข่าวและประกาศ', '2014-05-16 11:51:18', 1),
(14, 2, 'แก้ไข', '2014-05-16 11:51:18', 1),
(184, 2, 'Itinerary', NULL, 1),
(185, 2, 'ภาพธงประจำชาติ', NULL, 1),
(191, 1, 'trips', '2014-05-16 11:51:10', 1),
(192, 2, 'คลิกที่นี่เพื่อ deactive', '2014-05-16 11:51:18', 1),
(186, 2, 'ไฟล์ภาษา', NULL, 1),
(250, 1, 'Welcome visitor you can', '2014-05-16 11:51:10', 1),
(187, 2, 'ประหยัด', NULL, 1),
(212, 2, 'ผู้ใช้ deactive', '2014-05-16 11:51:18', 1),
(213, 2, '/ จดหมายข้อความ', '2014-05-16 11:51:18', 1),
(214, 2, 'ข้อความทั้งหมดม', '2014-05-16 11:51:18', 1),
(215, 2, 'ข้อความใหม่', '2014-05-16 11:51:18', 1),
(216, 2, 'ข้อความที่สิ้นสุด', '2014-05-16 11:51:18', 1),
(60, 2, 'การแจ้งเตือน', '2014-05-16 11:51:18', 1),
(217, 2, 'การเยี่ยมชมทั้งหมด', '2014-05-16 11:51:18', 1),
(218, 2, 'การเข้าชมใหม่', '2014-05-16 11:51:18', 1),
(219, 2, 'ตอบกระทู้ใหม่', '2014-05-16 11:51:18', 1),
(220, 2, 'รายงานการใช้ผิดวิธี', '2014-05-16 11:51:18', 1),
(221, 2, 'การตั้งค่าบัญชี', '2014-05-16 11:51:18', 1),
(68, 2, 'ยินดีต้อนรับ', '2014-05-16 11:51:18', 1),
(222, 2, 'ผู้ใช้ ID', '2014-05-16 11:51:18', 1),
(70, 2, 'ชื่อ', '2014-05-16 11:51:18', 1),
(71, 2, 'อีเมล์', '2014-05-16 11:51:18', 1),
(72, 2, 'ประเทศ', '2014-05-16 11:51:18', 1),
(223, 2, 'ติดต่อเรา', '2014-05-16 11:51:18', 1),
(224, 2, 'เกี่ยวกับเรา', '2014-05-16 11:51:18', 1),
(75, 2, 'บทความ', '2014-05-16 11:51:18', 1),
(225, 2, 'จดหมายข่าว', '2014-05-16 11:51:18', 1),
(77, 2, 'แม่แบบ', '2014-05-16 11:51:18', 1),
(78, 2, 'iframes', '2014-05-16 11:51:18', 1),
(79, 2, 'เรื่อง', '2014-05-16 11:51:18', 1),
(226, 2, 'ที่ออกแบบมาสำหรับ', '2014-05-16 11:51:18', 1),
(227, 2, 'ลิงค์ที่ใช้บ่อย', '2014-05-16 11:51:18', 1),
(82, 2, 'แสดงตัวอย่าง', '2014-05-16 11:51:18', 1),
(83, 2, 'โทรศัพท์มือถือ', '2014-05-16 11:51:18', 1),
(84, 2, 'โทรศัพท์', '2014-05-16 11:51:18', 1),
(228, 2, 'ภาพที่นิ้วหัวแม่มือ', '2014-05-16 11:51:18', 1),
(86, 2, 'ภาพ', '2014-05-16 11:51:18', 1),
(87, 2, 'เพิ่ม', '2014-05-16 11:51:18', 1),
(88, 2, 'หน้าปัด', '2014-05-16 11:51:18', 1),
(90, 2, 'ที่อยู่', '2014-05-16 11:51:18', 1),
(91, 2, 'เนื้อหา', '2014-05-16 11:51:18', 1),
(229, 2, 'แสดงในบ้าน', '2014-05-16 11:51:18', 1),
(230, 2, 'รหัสไปรษณีย์', '2014-05-16 11:51:18', 1),
(322, 2, 'เฉลียง', '2014-05-16 11:51:18', 1),
(231, 2, 'คอลเซ็นเตอร์', '2014-05-16 11:51:18', 1),
(232, 2, 'ดูแผนที่', '2014-05-16 11:51:18', 1),
(190, 1, 'Operator', '2014-05-16 11:51:10', 1),
(233, 1, 'Events', '2014-05-16 11:51:10', 1),
(191, 5, 'लंबी पैदल यात्रा', '2014-05-15 12:29:26', 1),
(191, 2, 'ทริป', '2014-05-16 11:51:18', 1),
(233, 2, 'เหตุการณ์ที่เกิดขึ้น', '2014-05-16 11:51:18', 1),
(236, 2, 'รายชื่อที่ร้องขอ', '2014-03-20 11:13:06', 1),
(234, 1, 'Products', '2014-05-16 11:51:10', 1),
(234, 2, 'ผลิตภัณฑ์', '2014-05-16 11:51:18', 1),
(235, 1, 'Home', '2014-05-16 11:51:10', 1),
(235, 2, 'บ้าน', '2014-05-16 11:51:18', 1),
(68, 1, 'Welcome', '2014-05-16 11:51:10', 1),
(236, 1, 'Wishlist', '2014-05-16 11:51:10', 1),
(237, 1, 'Compare', '2014-05-16 11:51:10', 1),
(238, 1, 'My Account', '2014-05-16 11:51:10', 1),
(239, 1, 'Logout', '2014-05-16 11:51:10', 1),
(240, 1, 'Login', '2014-05-16 11:51:10', 1),
(241, 1, 'Last Minute Trips', '2014-05-16 11:51:10', 1),
(242, 1, 'Read More', '2014-05-16 11:51:10', 1),
(243, 1, 'Liveabords', '2014-05-16 11:51:10', 1),
(244, 1, 'Day Trips', '2014-05-16 11:51:10', 1),
(245, 1, 'Monthly E-News Letter', '2014-05-16 11:51:10', 1),
(237, 2, 'เปรียบเทียบ', '2014-03-20 11:13:06', 1),
(238, 2, 'บัญชีของฉัน', '2014-03-20 11:13:06', 1),
(239, 2, 'ออกจากระบบ', '2014-03-20 11:13:06', 1),
(240, 2, 'เข้าสู่ระบบ', '2014-03-20 11:13:06', 1),
(241, 2, 'ทริปเดินทางล่าสุด', '2014-03-20 11:13:06', 1),
(242, 2, 'อ่านรายละเอียดเพิ่มเติม', '2014-03-20 11:13:06', 1),
(243, 2, 'ทริปยาว', '2014-05-16 11:51:18', 1),
(244, 2, 'ทริปวัน', '2014-05-16 11:51:18', 1),
(245, 2, 'รายเดือนจดหมายข่าวอิเล็กทรอนิกส์', '2014-05-16 11:51:18', 1),
(246, 1, 'THIS TRIP WILL EXPIRE IN', '2014-03-20 11:13:01', 1),
(246, 2, 'การเดินทางครั้งนี้จะหมดอายุใน', '2014-03-20 11:13:06', 1),
(247, 1, 'Famous Boats', '2014-03-20 11:13:01', 1),
(248, 1, 'Our Trips', '2014-05-16 11:51:10', 1),
(223, 1, 'Contact Us', '2014-03-20 11:13:01', 1),
(247, 2, 'เรือที่มีชื่อเสียง', '2014-03-20 11:13:06', 1),
(248, 2, 'ทริปของเรา', '2014-05-16 11:51:18', 1),
(190, 2, 'ผู้ประกอบการ', '2014-05-16 11:51:18', 1),
(250, 2, 'ยินดีต้อนรับผู้เข้าชมที่คุณสามารถ', '2014-05-16 11:51:18', 1),
(251, 2, 'สร้างบัญชี', '2014-05-16 11:51:18', 1),
(251, 1, 'create an account', '2014-05-16 11:51:10', 1),
(190, 5, 'प्रचालक', '2014-05-15 12:29:26', 1),
(251, 5, 'एक खाता बनाने', '2014-05-15 12:29:26', 1),
(252, 1, 'Subscribe to our newsletter and get exclusive deals you wont find anywhere.', '2014-05-14 13:25:45', 1),
(252, 2, 'สมัครรับจดหมายข่าวของเราและได้รับข้อเสนอพิเศษที่คุณจะไม่พบทุกที่', '2014-05-14 13:26:38', 1),
(253, 1, 'Subscribe to our newsletter and get exclusive deals you wont find anywhere', '2014-05-16 11:51:10', 1),
(253, 2, 'สมัครรับจดหมายข่าวของเราและได้รับข้อเสนอพิเศษที่คุณจะไม่พบทุกที่', '2014-05-16 11:51:18', 1),
(254, 2, 'E-mail รหัสที่นี่', '2014-05-16 11:51:18', 1),
(254, 1, 'E-mail ID here', '2014-05-16 11:51:10', 1),
(255, 2, 'เสนอ', '2014-05-16 11:51:18', 1),
(255, 1, 'Submit', '2014-05-16 11:51:10', 1),
(256, 1, 'All right reserved', '2014-05-14 14:15:50', 1),
(256, 2, 'สงวนลิขสิทธิ์', '2014-05-14 14:16:00', 1),
(257, 1, 'All right reserved', '2014-05-16 11:51:10', 1),
(257, 2, 'สงวนลิขสิทธิ์', '2014-05-16 11:51:18', 1),
(258, 2, 'ดูสเปคเรือ', '2014-05-16 11:51:18', 1),
(258, 1, 'View boat specification', '2014-05-16 11:51:10', 1),
(259, 2, 'วันที่เริ่มต้น', '2014-05-16 11:51:18', 1),
(259, 1, 'Start Date', '2014-05-16 11:51:10', 1),
(260, 1, 'End Date', '2014-05-16 11:51:10', 1),
(260, 2, 'วันที่สิ้นสุด', '2014-05-16 11:51:18', 1),
(261, 1, 'No of Dives', '2014-05-16 11:51:10', 1),
(262, 1, 'Description', '2014-05-16 11:51:10', 1),
(72, 1, 'Country', '2014-05-16 11:51:10', 1),
(249, 1, '', '2014-05-16 11:09:20', 1),
(261, 2, 'ไม่มีของ การดำน้ำ', '2014-05-16 11:51:18', 1),
(262, 2, 'ลักษณะ', '2014-05-16 11:51:18', 1),
(249, 2, '', '2014-05-16 11:51:18', 1),
(263, 2, 'พื้นที่ที่เหลือ', '2014-05-16 11:51:18', 1),
(264, 2, 'ที่มา', '2014-05-16 11:51:18', 1),
(263, 1, 'Space left', '2014-05-16 11:51:10', 1),
(264, 1, 'Origin', '2014-05-16 11:51:10', 1),
(265, 1, 'No trips found', '2014-05-16 11:51:10', 1),
(265, 2, 'ไม่พบการเดินทาง', '2014-05-16 11:51:18', 1),
(266, 1, 'Share Your Story', '2014-05-16 11:51:10', 1),
(267, 1, 'Owners', '2014-05-16 11:51:10', 1),
(268, 1, 'Sportswear', '2014-05-16 11:51:10', 1),
(269, 1, 'Tips', '2014-05-16 11:51:10', 1),
(270, 1, 'Safety', '2014-05-16 11:51:10', 1),
(266, 2, 'แบ่งปันเรื่องราวของคุณ', '2014-05-16 11:51:18', 1),
(267, 2, 'เจ้าของธุรกิจ', '2014-05-16 11:51:18', 1),
(268, 2, 'กีฬา', '2014-05-16 11:51:18', 1),
(269, 2, 'เคล็ดลับ', '2014-05-16 11:51:18', 1),
(270, 2, 'ความปลอดภัย', '2014-05-16 11:51:18', 1),
(271, 1, 'Boat Name', '2014-05-16 11:51:10', 1),
(272, 1, 'Destination', '2014-05-16 11:51:10', 1),
(271, 2, 'ชื่อเรือ', '2014-05-16 11:51:18', 1),
(272, 2, 'จุดหมายปลายทาง', '2014-05-16 11:51:18', 1),
(273, 1, 'Days', '2014-05-16 11:51:10', 1),
(274, 1, 'Nights', '2014-05-16 11:51:10', 1),
(275, 1, 'Dives', '2014-05-16 11:51:10', 1),
(273, 2, 'วัน', '2014-05-16 11:51:18', 1),
(274, 2, 'คืน', '2014-05-16 11:51:18', 1),
(275, 2, 'การดำน้ำ', '2014-05-16 11:51:18', 1),
(276, 1, 'Cabin Pricing (per pax)', '2014-05-16 11:51:10', 1),
(276, 2, 'ราคาห้องโดยสาร (ต่อท่าน)', '2014-05-16 11:51:18', 1),
(277, 1, 'Available Options', '2014-05-16 11:51:10', 1),
(277, 2, 'ตัวเลือกที่มีอยู่', '2014-05-16 11:51:18', 1),
(278, 1, 'Review', '2014-05-16 11:51:10', 1),
(278, 2, 'ทบทวน', '2014-05-16 11:51:18', 1),
(279, 1, 'Total', '2014-05-16 11:51:10', 1),
(279, 2, 'รวมทั้งหมด', '2014-05-16 11:51:18', 1),
(280, 1, 'Book Now', '2014-05-16 11:51:10', 1),
(280, 2, 'จองตอนนี้', '2014-05-16 11:51:18', 1),
(281, 1, 'Specification', '2014-05-16 11:51:10', 1),
(281, 2, 'สเปค', '2014-05-16 11:51:18', 1),
(282, 1, 'Related Trips', '2014-05-16 11:51:10', 1),
(283, 1, 'No Items', '2014-05-16 11:51:10', 1),
(284, 1, 'View all trips', '2014-05-16 11:51:10', 1),
(282, 2, 'ทริปที่เกี่ยวข้อง', '2014-05-16 11:51:18', 1),
(283, 2, 'ไม่มีรายการ', '2014-05-16 11:51:18', 1),
(284, 2, 'ดูการเดินทางทั้งหมด', '2014-05-16 11:51:18', 1),
(285, 1, 'No reviews found', '2014-05-16 11:51:10', 1),
(286, 1, 'CUSTOMER REVIEW', '2014-05-16 11:51:10', 1),
(285, 2, 'ไม่มีการพบ', '2014-05-16 11:51:18', 1),
(286, 2, 'ความคิดเห็นของลูกค้า', '2014-05-16 11:51:18', 1),
(287, 1, 'Important Notice', '2014-05-16 11:51:10', 1),
(288, 1, 'Package Includes', '2014-05-16 11:51:10', 1),
(289, 1, 'Package Excludes', '2014-05-16 11:51:10', 1),
(290, 1, 'Day', '2014-05-16 11:51:10', 1),
(287, 2, 'เวปไซด์ที่สำคัญ', '2014-05-16 11:51:18', 1),
(288, 2, 'แพคเกจรวม', '2014-05-16 11:51:18', 1),
(289, 2, 'ไม่รวมแพคเกจ', '2014-05-16 11:51:18', 1),
(290, 2, 'วัน', '2014-05-16 11:51:18', 1),
(291, 1, 'You can add upto 3 trips to compare', '2014-05-16 11:51:10', 1),
(291, 2, 'คุณสามารถเพิ่มไม่เกิน 3 ทริปที่จะเปรียบเทียบ', '2014-05-16 11:51:18', 1),
(292, 1, 'Duration', '2014-05-16 11:51:10', 1),
(293, 1, 'Price', '2014-05-15 11:00:33', 1),
(292, 2, 'ระยะเวลา', '2014-05-16 11:51:18', 1),
(293, 2, 'ราคา', '2014-05-16 11:51:18', 1),
(294, 1, 'Boat Specification', '2014-05-16 11:51:10', 1),
(295, 1, 'Length Overall', '2014-05-16 11:51:10', 1),
(296, 1, 'Beam', '2014-05-16 11:51:10', 1),
(297, 1, 'Draft-Drive Up-High Trim', '2014-05-16 11:51:10', 1),
(298, 1, 'Draft-Drive Down', '2014-05-16 11:51:10', 1),
(299, 1, 'Deadrise', '2014-05-16 11:51:10', 1),
(300, 1, 'Approximate Dry Weight', '2014-05-16 11:51:10', 1),
(301, 1, 'Estimated Height On Trailer - Top of Windshield', '2014-05-15 11:35:34', 1),
(302, 1, 'Boat Height - Windshield To Keel', '2014-05-15 11:35:34', 1),
(303, 1, 'Bridge Clearance - Top Up', '2014-05-15 11:35:34', 1),
(304, 1, 'Bridge Clearance - Top Down', '2014-05-15 11:35:34', 1),
(305, 1, 'Cockpit Depth - Helm', '2014-05-15 11:35:34', 1),
(306, 1, 'Cockpit Storage', '2014-05-16 11:51:10', 1),
(307, 1, 'Fuel Capacity', '2014-05-16 11:51:10', 1),
(308, 1, 'Boat Technical Features', '2014-05-16 11:51:10', 1),
(309, 1, 'Technical Features', '2014-05-16 11:51:10', 1),
(310, 1, 'Engine Options', '2014-05-16 11:51:10', 1),
(311, 1, 'Technical Options', '2014-05-16 11:51:10', 1),
(294, 2, 'เรือสเปค', '2014-05-16 11:51:18', 1),
(295, 2, 'ความยาวโดยรวม', '2014-05-16 11:51:18', 1),
(296, 2, 'คาน', '2014-05-16 11:51:18', 1),
(297, 2, 'ร่างไดรฟ์ขึ้นสูงตัด', '2014-05-16 11:51:18', 1),
(298, 2, 'ร่างไดรฟ์ลง', '2014-05-16 11:51:18', 1),
(299, 2, 'คนตาย', '2014-05-16 11:51:18', 1),
(300, 2, 'น้ำหนักแห้งประมาณ', '2014-05-16 11:51:18', 1),
(301, 2, 'ประมาณความสูงที่พ่วง - ด้านบนของกระจก', '2014-05-15 11:35:43', 1),
(302, 2, 'เรือสูง - กระจกเพื่อกระดูกงู', '2014-05-15 11:35:43', 1),
(303, 2, 'สะพาน การกวาดล้าง - Top Up', '2014-05-15 11:35:43', 1),
(304, 2, 'สะพาน การกวาดล้าง - Top ลง', '2014-05-15 11:35:43', 1),
(305, 2, 'ห้องนักบินระดับความลึก - พวงมาลัย', '2014-05-15 11:35:43', 1),
(306, 2, 'นักบินที่จัดเก็บ', '2014-05-16 11:51:18', 1),
(307, 2, 'ความจุเชื้อเพลิง', '2014-05-16 11:51:18', 1),
(308, 2, 'คุณสมบัติทางเทคนิคเรือ', '2014-05-16 11:51:18', 1),
(309, 2, 'คุณสมบัติทางเทคนิค', '2014-05-16 11:51:18', 1),
(310, 2, 'ตัวเลือกเครื่องยนต์', '2014-05-16 11:51:18', 1),
(311, 2, 'ทางเทคนิค', '2014-05-16 11:51:18', 1),
(312, 1, 'Estimated Height On Trailer - Top of Windshield', '2014-05-16 11:51:10', 1),
(313, 1, 'Boat Height - Windshield To Keel', '2014-05-16 11:51:10', 1),
(314, 1, 'Bridge Clearance - Top Up', '2014-05-16 11:51:10', 1),
(315, 1, 'Bridge Clearance - Top Down', '2014-05-16 11:51:10', 1),
(316, 1, 'Cockpit Depth - Helm', '2014-05-16 11:51:10', 1),
(312, 2, 'ประมาณความสูงที่พ่วง - ด้านบนของกระจก', '2014-05-16 11:51:18', 1),
(313, 2, 'เรือสูง - กระจกเพื่อกระดูกงู', '2014-05-16 11:51:18', 1),
(314, 2, 'สะพาน การกวาดล้าง - Top Up', '2014-05-16 11:51:18', 1),
(315, 2, 'สะพาน การกวาดล้าง - Top ลง', '2014-05-16 11:51:18', 1),
(316, 2, 'ห้องนักบินระดับความลึก - พวงมาลัย', '2014-05-16 11:51:18', 1),
(317, 1, 'Boat Engine & Technical Options', '2014-05-16 11:51:10', 1),
(317, 2, 'เรือเครื่องยนต์และตัวเลือกทางเทคนิค', '2014-05-16 11:51:18', 1),
(318, 1, 'Overview', '2014-05-16 11:51:10', 1),
(319, 1, 'Floorplans', '2014-05-16 11:51:10', 1),
(323, 1, 'Exterior', '2014-05-16 11:51:10', 1),
(320, 1, 'Specs', '2014-05-16 11:51:10', 1),
(321, 1, 'Featured & Options', '2014-05-16 11:51:10', 1),
(318, 2, 'ภาพรวม', '2014-05-16 11:51:18', 1),
(319, 2, 'ผัง', '2014-05-16 11:51:18', 1),
(320, 2, 'รายละเอียด', '2014-05-16 11:51:18', 1),
(321, 2, 'ที่โดดเด่นและตัวเลือก', '2014-05-16 11:51:18', 1),
(322, 1, 'Gallery', '2014-05-16 11:51:10', 1),
(325, 1, 'No Gallery Found', '2014-05-16 11:51:10', 1),
(323, 2, 'ภายนอก', '2014-05-16 11:51:18', 1),
(324, 2, 'ภายใน', '2014-05-16 11:51:18', 1),
(325, 2, 'ไม่พบแกลเลอรี่', '2014-05-16 11:51:18', 1),
(326, 1, 'Specifications', '2014-05-16 11:51:10', 1),
(326, 2, 'ข้อมูลจำเพาะของ', '2014-05-16 11:51:18', 1),
(327, 1, 'Interior Features', '2014-05-16 11:51:10', 1),
(328, 1, 'Cockpit Features', '2014-05-16 11:51:10', 1),
(327, 2, 'สิ่งอำนวยความสะดวกภายใน', '2014-05-16 11:51:18', 1),
(328, 2, 'สิ่งอำนวยความสะดวกในห้องนักบิน', '2014-05-16 11:51:18', 1),
(329, 2, 'คุณสมบัติหางเสือ', '2014-05-16 11:51:18', 1),
(330, 2, 'ฮัลล์และดาดฟ้าคุณสมบัติ', '2014-05-16 11:51:18', 1),
(329, 1, 'Helm Features', '2014-05-16 11:51:10', 1),
(330, 1, 'Hull & Deck Features', '2014-05-16 11:51:10', 1),
(331, 1, 'Action', '2014-05-16 11:51:10', 1),
(332, 1, 'Trip Price', '2014-05-16 11:51:10', 1),
(333, 1, 'Trip Name', '2014-05-16 11:51:10', 1),
(334, 1, 'My Wishlist', '2014-05-16 11:51:10', 1),
(331, 2, 'การกระทำ', '2014-05-16 11:51:18', 1),
(332, 2, 'ราคาการเดินทาง', '2014-05-16 11:51:18', 1),
(333, 2, 'ชื่อการเดินทาง', '2014-05-16 11:51:18', 1),
(334, 2, 'ของฉันรายชื่อที่ร้องขอ', '2014-05-16 11:51:18', 1),
(335, 1, 'No items found', '2014-05-16 11:51:10', 1),
(336, 1, 'Continue', '2014-05-16 11:51:10', 1),
(335, 2, 'ไม่พบรายการ', '2014-05-16 11:51:18', 1),
(336, 2, 'ต่อ', '2014-05-16 11:51:18', 1),
(337, 1, 'Edit your account information', '2014-05-16 11:51:10', 1),
(338, 1, 'Change your password', '2014-05-16 11:51:10', 1),
(339, 1, 'Modify your address book entries', '2014-05-16 11:51:10', 1),
(340, 1, 'Modify your wishlist', '2014-05-16 11:51:10', 1),
(341, 1, 'My Orders', '2014-05-16 11:51:10', 1),
(342, 1, 'View your order history', '2014-05-16 11:51:10', 1),
(343, 1, 'Your Rewards Points', '2014-05-16 11:51:10', 1),
(344, 1, 'View your coupons', '2014-05-16 11:51:10', 1),
(345, 1, 'Your Transactions', '2014-05-16 11:51:10', 1),
(346, 1, 'Newsletter', '2014-05-16 11:51:10', 1),
(347, 1, 'Subscribe to our newsletter', '2014-05-16 11:51:10', 1),
(337, 2, 'แก้ไขข้อมูลบัญชีของคุณ', '2014-05-16 11:51:18', 1),
(338, 2, 'เปลี่ยนรหัสผ่านของคุณ', '2014-05-16 11:51:18', 1),
(339, 2, 'ปรับเปลี่ยนรายการหนังสือที่อยู่ของคุณ', '2014-05-16 11:51:18', 1),
(340, 2, 'แก้ไขสิ่งที่คุณอยาก', '2014-05-16 11:51:18', 1),
(341, 2, 'คำสั่งของฉัน', '2014-05-16 11:51:18', 1),
(342, 2, 'ดูประวัติการสั่งซื้อของคุณ', '2014-05-16 11:51:18', 1),
(343, 2, 'คะแนนสะสมของคุณ', '2014-05-16 11:51:18', 1),
(344, 2, 'ดูคูปองของคุณ', '2014-05-16 11:51:18', 1),
(345, 2, 'การทำธุรกรรมของคุณ', '2014-05-16 11:51:18', 1),
(346, 2, 'จดหมายข่าว', '2014-05-16 11:51:18', 1),
(347, 2, 'สมัครรับจดหมายข่าวของเรา', '2014-05-16 11:51:18', 1),
(348, 1, 'My Account Information', '2014-05-16 11:51:10', 1),
(349, 1, 'Your Personal Details', '2014-05-16 11:51:10', 1),
(350, 1, 'Username', '2014-05-16 11:51:10', 1),
(200, 1, 'First Name', '2014-05-16 11:51:10', 1),
(199, 1, 'Last Name', '2014-05-16 11:51:10', 1),
(351, 1, 'E-Mail', '2014-05-16 11:51:10', 1),
(83, 1, 'Mobile', '2014-05-16 11:51:10', 1),
(352, 1, 'Update', '2014-05-16 11:51:10', 1),
(348, 2, 'ข้อมูลบัญชีของฉัน', '2014-05-16 11:51:18', 1),
(349, 2, 'รายละเอียดส่วนบุคคลของคุณ', '2014-05-16 11:51:18', 1),
(350, 2, 'ชื่อผู้ใช้', '2014-05-16 11:51:18', 1),
(351, 2, 'อีเมล์', '2014-05-16 11:51:18', 1),
(352, 2, 'ปรับปรุง', '2014-05-16 11:51:18', 1),
(209, 1, 'Change Password', '2014-05-16 11:51:10', 1),
(353, 1, 'Your Password', '2014-05-16 11:51:10', 1),
(354, 1, 'Password changed sucessfully', '2014-05-16 11:51:10', 1),
(197, 1, 'Old Password', '2014-05-16 11:51:10', 1),
(196, 1, 'New Password', '2014-05-16 11:51:10', 1),
(195, 1, 'Confirm Password', '2014-05-16 11:51:10', 1),
(355, 1, 'Address Book', '2014-05-16 11:51:10', 1),
(356, 1, 'Address Book Entries', '2014-05-16 11:51:10', 1),
(355, 2, 'สมุดที่อยู่', '2014-05-16 11:51:18', 1),
(356, 2, 'สมุดที่อยู่รายการ', '2014-05-16 11:51:18', 1),
(357, 1, 'New Address Entry', '2014-05-16 11:51:10', 1),
(90, 1, 'Address', '2014-05-16 11:51:10', 1),
(24, 1, 'City', '2014-05-16 11:51:10', 1),
(358, 1, 'Post Code', '2014-05-16 11:51:10', 1),
(359, 1, 'Region/State', '2014-05-16 11:51:10', 1),
(14, 1, 'Edit', '2014-05-16 11:51:10', 1),
(360, 1, 'Delete', '2014-05-16 11:51:10', 1),
(357, 2, 'รายการที่อยู่ใหม่', '2014-05-16 11:51:18', 1),
(358, 2, 'รหัสไปรษณีย์', '2014-05-16 11:51:18', 1),
(359, 2, 'ภาค / รัฐ', '2014-05-16 11:51:18', 1),
(360, 2, 'ลบ', '2014-05-16 11:51:18', 1),
(361, 1, 'Order History', '2014-05-16 11:51:10', 1),
(362, 1, 'My Trips', '2014-05-16 11:51:10', 1),
(361, 2, 'ประวัติการสั่งซื้อ', '2014-05-16 11:51:18', 1),
(362, 2, 'การเดินทางของฉัน', '2014-05-16 11:51:18', 1),
(363, 1, 'Checkout Status', '2014-05-16 11:51:10', 1),
(364, 1, 'You have not order any trip yet', '2014-05-16 11:51:10', 1),
(365, 1, 'Return Date', '2014-05-16 11:51:10', 1),
(366, 1, 'Departure Date', '2014-05-16 11:51:10', 1),
(367, 1, 'Booking Date', '2014-05-16 11:51:10', 1),
(368, 1, 'Persons', '2014-05-16 11:51:10', 1),
(369, 1, 'Children', '2014-05-16 11:51:10', 1),
(370, 1, 'Grand Total', '2014-05-16 11:51:10', 1),
(363, 2, 'สถานะการชำระเงิน', '2014-05-16 11:51:18', 1),
(364, 2, 'ท่านยังไม่ได้สั่งการเดินทางใด ๆ', '2014-05-16 11:51:18', 1),
(371, 2, 'ให้คะแนน', '2014-05-16 11:51:18', 1),
(365, 2, 'กลับวันที่', '2014-05-16 11:51:18', 1),
(366, 2, 'วันที่ออกเดินทาง', '2014-05-16 11:51:18', 1),
(367, 2, 'วันที่จองห้องพัก', '2014-05-16 11:51:18', 1),
(368, 2, 'บุคคล', '2014-05-16 11:51:18', 1),
(369, 2, 'เด็ก ๆ', '2014-05-16 11:51:18', 1),
(370, 2, 'แกรนด์รวม', '2014-05-16 11:51:18', 1),
(371, 1, 'Rate It', '2014-05-16 11:51:10', 1),
(372, 2, 'ผลตอบแทนที่', '2014-05-16 11:51:18', 1),
(373, 2, 'รางวัลของฉัน', '2014-05-16 11:51:18', 1),
(374, 2, 'ยังคงเป็นจุด', '2014-05-16 11:51:18', 1),
(375, 2, 'คะแนนรายละเอียด (เข้าสู่ระบบ)', '2014-05-16 11:51:18', 1),
(372, 1, 'Rewards', '2014-05-16 11:51:10', 1),
(373, 1, 'My Rewards', '2014-05-16 11:51:10', 1),
(374, 1, 'Remain Points', '2014-05-16 11:51:10', 1),
(375, 1, 'Points Details(Log)', '2014-05-16 11:51:10', 1),
(21, 1, 'Subscribe', '2014-05-16 11:51:10', 1),
(376, 1, 'My Coupon', '2014-05-16 11:51:10', 1),
(377, 1, 'New Coupon', '2014-05-16 11:51:10', 1),
(378, 1, 'Used Coupon', '2014-05-16 11:51:10', 1),
(379, 1, 'Redeem', '2014-05-16 11:51:10', 1),
(380, 1, 'Cancel', '2014-05-16 11:51:10', 1),
(381, 1, 'Share', '2014-05-16 11:51:10', 1),
(382, 1, 'You have not used any coupon yet', '2014-05-16 11:51:10', 1),
(383, 1, 'Discount', '2014-05-16 11:51:10', 1),
(384, 1, 'Last Date', '2014-05-16 11:51:10', 1),
(376, 2, 'คูปองของฉัน', '2014-05-16 11:51:18', 1),
(377, 2, 'คูปองใหม่', '2014-05-16 11:51:18', 1),
(378, 2, 'คูปองที่ใช้', '2014-05-16 11:51:18', 1),
(379, 2, 'ไถ่ถอน', '2014-05-16 11:51:18', 1),
(380, 2, 'ยกเลิก', '2014-05-16 11:51:18', 1),
(381, 2, 'ส่วนแบ่ง', '2014-05-16 11:51:18', 1),
(382, 2, 'คุณไม่ได้ใช้คูปองใด ๆ', '2014-05-16 11:51:18', 1),
(383, 2, 'ส่วนลด', '2014-05-16 11:51:18', 1),
(384, 2, 'วันที่ผ่านมา', '2014-05-16 11:51:18', 1),
(385, 1, 'Password', '2014-05-16 11:51:10', 1),
(385, 2, 'รหัสผ่าน', '2014-05-16 11:51:18', 1),
(208, 1, 'Edit Account', '2014-05-16 11:51:10', 1),
(386, 1, 'Transactions', '2014-05-16 11:51:10', 1),
(386, 2, 'การทำธุรกรรม', '2014-05-16 11:51:18', 1),
(387, 1, 'Address Books', '2014-05-16 11:51:10', 1),
(387, 2, 'หนังสือที่อยู่', '2014-05-16 11:51:18', 1),
(388, 1, 'Select Country', '2014-05-16 11:51:10', 1),
(389, 1, 'Select Origin', '2014-05-16 11:51:10', 1),
(390, 1, 'Select Destination', '2014-05-16 11:51:10', 1),
(391, 1, 'Price from: Min', '2014-05-16 11:51:10', 1),
(392, 1, 'Price from: Max', '2014-05-16 11:51:10', 1),
(388, 2, 'เลือกประเทศ', '2014-05-16 11:51:18', 1),
(389, 2, 'เลือกแหล่งกำเนิดสินค้า', '2014-05-16 11:51:18', 1),
(390, 2, 'เลือกปลายทาง', '2014-05-16 11:51:18', 1),
(391, 2, 'ราคาเริ่มต้นที่: นาที', '2014-05-16 11:51:18', 1),
(392, 2, 'ราคาเริ่มต้นที่: แม็กซ์', '2014-05-16 11:51:18', 1);

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
  `boat_price_range` varchar(50) NOT NULL DEFAULT 'all',
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
  `price_for_diver` int(11) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `boat_id`, `trip_type_id`, `boat_price_range`, `country_id`, `destination_country_id`, `origin_id`, `destination_id`, `start_date`, `end_date`, `no_of_days`, `no_of_nights`, `no_of_dives`, `trip_price`, `price_for_diver`, `image`, `airport`, `hotel`, `lastminut`, `upcoming`, `popular`, `create_date`, `modified_date`, `status`) VALUES
(1, 4, 1, 'all', 5, 5, 10, 9, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, 0, 0, 567, 0, 'media/trips/1/1378738271main_1401682_0_240220100738_0.jpg', 0, 0, 1, 0, 0, '2014-01-08 15:29:56', '2014-06-11 13:22:55', 1),
(2, 6, 1, 'all', 5, 5, 9, 12, '2014-05-01 00:00:00', '2014-05-06 00:00:00', 0, 0, 0, 2342300, 0, 'media/trips/2/main_2boat-01.jpg', 0, 0, 1, 0, 0, '2014-01-08 15:51:31', '2014-05-26 10:25:22', 1),
(3, 4, 1, 'all', 1, 1, 5, 4, '2014-04-17 00:00:00', '2014-04-25 00:00:00', 0, 0, 0, 33333, 0, 'media/trips/3/2299e_img3_b.jpg', 0, 0, 1, 0, 0, '2014-01-13 16:32:18', '2014-05-27 11:56:10', 1),
(11, 5, 1, 'all', 2, 2, 7, 8, '2014-04-15 00:00:00', '2014-04-25 00:00:00', 0, 0, 0, 566660, 3000, 'media/trips/11/main_1159095_big.jpg', 0, 0, 0, 0, 0, '2014-01-21 11:41:48', '2014-05-20 18:17:02', 1),
(15, 101, 2, 'all', 2, 2, 7, 8, '2014-04-22 00:00:00', '2014-04-22 00:00:00', 0, 0, 0, 20002, 66, 'media/trips/15/main_1532024e_img4_b.jpg', 0, 0, 0, 0, 0, '2014-02-07 11:04:27', '2014-05-20 14:12:50', 1),
(37, 101, 2, 'all', 1, 1, 1, 2, '2014-05-04 00:00:00', '2014-05-04 00:00:00', 0, 0, 0, 346780, 900, 'media/trips/37/main_37401682_0_240220100738_0.jpg', 0, 0, 0, 0, 0, '2014-05-02 15:53:41', '2014-05-20 13:35:30', 1),
(38, 7, 1, 'low', 2, 1, 7, 14, '2014-05-02 00:00:00', '2014-05-02 00:00:00', 0, 0, 0, 786, 66, 'media/trips/38/main_38Winter.jpg', 0, 0, 0, 0, 0, '2014-05-02 17:49:27', '2014-06-07 13:06:10', 1),
(44, 101, 2, 'all', 2, 2, 7, 8, '2014-05-05 00:00:00', '2014-05-05 00:00:00', 0, 0, 0, 56768000, 200, 'media/trips/44/main_44401682_0_240220100738_4.jpg', 0, 0, 0, 0, 0, '2014-05-05 18:13:44', '2014-05-20 13:35:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_beverages`
--

CREATE TABLE IF NOT EXISTS `trip_beverages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `beverage_id` int(11) NOT NULL,
  `eq_value` double NOT NULL,
  `eq_type` varchar(200) NOT NULL,
  `eq_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`trip_schedule_id`,`beverage_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=499 ;

--
-- Dumping data for table `trip_beverages`
--

INSERT INTO `trip_beverages` (`id`, `trip_id`, `trip_schedule_id`, `beverage_id`, `eq_value`, `eq_type`, `eq_status`) VALUES
(474, 38, 179, 2, 11, 'paid', 1),
(498, 1, 5, 5, 456, 'paid', 1),
(497, 1, 5, 4, 3213, 'paid', 1),
(496, 1, 5, 2, 11, 'paid', 1),
(495, 1, 5, 1, 22, 'paid', 1),
(302, 15, 163, 2, 10, 'paid', 1),
(202, 1, 149, 5, 100, 'paid', 1),
(129, 2, 113, 3, 980, 'paid', 1),
(193, 1, 160, 5, 95, 'paid', 1),
(192, 1, 160, 2, 11, 'paid', 1),
(191, 1, 160, 1, 22, 'paid', 1),
(201, 1, 149, 4, 0, 'free', 1),
(200, 1, 149, 3, 50, 'paid', 1),
(199, 1, 149, 2, 0, 'free', 1),
(198, 1, 149, 1, 0, 'free', 1),
(330, 11, 190, 2, 0, 'free', 1),
(133, 11, 150, 2, 0, 'free', 1),
(132, 11, 150, 1, 0, 'free', 1),
(71, 11, 151, 1, 50, 'paid', 1),
(72, 11, 151, 2, 20, 'paid', 1),
(73, 11, 151, 3, 0, 'free', 1),
(186, 1, 9, 5, 345, 'paid', 1),
(185, 1, 9, 4, 5677, 'paid', 1),
(184, 1, 9, 3, 345, 'paid', 1),
(183, 1, 9, 2, 656, 'paid', 1),
(182, 1, 9, 1, 347, 'paid', 1),
(494, 1, 162, 1, 10, 'paid', 1),
(197, 1, 6, 5, 567, 'paid', 1),
(196, 1, 6, 3, 345, 'paid', 1),
(195, 1, 6, 2, 456, 'paid', 1),
(194, 1, 6, 1, 676, 'paid', 1),
(112, 2, 11, 6, 3456, 'paid', 1),
(111, 2, 11, 5, 345, 'paid', 1),
(110, 2, 11, 4, 567, 'paid', 1),
(109, 2, 11, 3, 457, 'paid', 1),
(108, 2, 11, 2, 457, 'paid', 1),
(107, 2, 11, 1, 457, 'paid', 1),
(101, 2, 114, 1, 675, 'paid', 1),
(102, 2, 114, 2, 354, 'paid', 1),
(103, 2, 114, 3, 477, 'paid', 1),
(104, 2, 114, 4, 345, 'paid', 1),
(105, 2, 114, 5, 678, 'paid', 1),
(106, 2, 114, 6, 657, 'paid', 1),
(128, 2, 115, 6, 7686, 'paid', 1),
(127, 2, 115, 5, 567, 'paid', 1),
(126, 2, 115, 2, 456, 'paid', 1),
(125, 2, 115, 1, 678, 'paid', 1),
(331, 11, 190, 1, 0, 'free', 1),
(344, 2, 10, 5, 5768, 'paid', 1),
(134, 11, 150, 5, 4564, 'paid', 1),
(135, 11, 150, 6, 456, 'paid', 1),
(329, 11, 15, 5, 665, 'paid', 1),
(328, 11, 15, 1, 0, 'free', 1),
(139, 15, 26, 1, 0, 'free', 1),
(140, 15, 26, 2, 0, 'free', 1),
(141, 15, 26, 5, 567, 'paid', 1),
(142, 15, 26, 6, 243, 'paid', 1),
(473, 38, 179, 1, 22, 'paid', 1),
(333, 11, 190, 6, 456, 'paid', 1),
(300, 37, 178, 1, 45, 'paid', 1),
(301, 37, 178, 2, 23, 'paid', 1),
(332, 11, 190, 5, 4564, 'paid', 1),
(340, 11, 191, 5, 4564, 'paid', 1),
(339, 11, 191, 2, 0, 'free', 1),
(338, 11, 191, 1, 0, 'free', 1),
(343, 3, 198, 4, 22, 'paid', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1310 ;

--
-- Dumping data for table `trip_equipments`
--

INSERT INTO `trip_equipments` (`id`, `trip_id`, `trip_schedule_id`, `equipment_id`, `eq_value`, `eq_type`, `eq_status`) VALUES
(1, 1, 2, 2, 0, '', 1),
(954, 11, 150, 4, 100, 'paid', 1),
(953, 11, 150, 2, 0, 'free', 1),
(468, 37, 94, 4, 567657, 'paid', 1),
(18, 13, 7, 3, 2300, 'paid', 1),
(19, 13, 7, 4, 0, 'free', 1),
(20, 13, 8, 3, 0, 'paid', 1),
(21, 13, 8, 2, 0, 'paid', 1),
(22, 13, 8, 4, 0, 'paid', 1),
(1309, 1, 5, 4, 435, 'paid', 1),
(1308, 1, 5, 3, 0, 'free', 1),
(928, 2, 11, 5, 3756, 'paid', 1),
(309, 3, 13, 4, 33, 'paid', 1),
(308, 3, 13, 2, 22, 'paid', 1),
(307, 3, 13, 3, 11, 'paid', 1),
(310, 3, 14, 3, 0, 'free', 1),
(1198, 11, 15, 4, 0, 'free', 1),
(1197, 11, 15, 2, 555, 'paid', 1),
(40, 13, 16, 3, 120, 'paid', 1),
(41, 13, 16, 2, 0, 'free', 1),
(313, 3, 21, 2, 0, 'paid', 1),
(467, 37, 93, 3, 0, 'free', 1),
(312, 3, 21, 3, 0, 'paid', 1),
(311, 3, 14, 2, 5000, 'paid', 1),
(926, 2, 11, 2, 4444, 'paid', 1),
(1155, 37, 178, 5, 456, 'paid', 1),
(1015, 1, 6, 3, 22, 'free', 1),
(1016, 1, 6, 2, 1000, 'paid', 1),
(1017, 1, 6, 4, 1222, 'paid', 1),
(1117, 11, 167, 3, 200, 'paid', 1),
(1154, 37, 178, 3, 678, 'paid', 1),
(1156, 15, 163, 3, 200, 'paid', 1),
(1018, 1, 149, 3, 1200, 'paid', 1),
(1019, 1, 149, 2, 0, 'free', 1),
(1020, 1, 149, 4, 0, 'free', 1),
(1021, 1, 149, 5, 12000, 'paid', 1),
(1307, 1, 162, 3, 200, 'paid', 1),
(1006, 1, 9, 5, 575, 'paid', 1),
(1005, 1, 9, 4, 20, 'paid', 1),
(1003, 1, 9, 3, 0, 'free', 1),
(1004, 1, 9, 2, 500, 'paid', 1),
(927, 2, 11, 4, 586, 'paid', 1),
(1196, 11, 15, 3, 0, 'free', 1),
(1014, 1, 160, 5, 0, 'free', 1),
(1221, 2, 10, 4, 0, 'free', 1),
(1220, 2, 10, 3, 3333, 'paid', 1),
(946, 2, 113, 5, 784, 'paid', 1),
(945, 2, 113, 2, 787, 'paid', 1),
(952, 11, 150, 3, 200, 'paid', 1),
(897, 11, 151, 3, 0, 'free', 1),
(898, 11, 151, 2, 0, 'free', 1),
(925, 2, 11, 3, 3333, 'paid', 1),
(921, 2, 114, 3, 768, 'paid', 1),
(922, 2, 114, 2, 435, 'paid', 1),
(923, 2, 114, 4, 897, 'paid', 1),
(924, 2, 114, 5, 346, 'paid', 1),
(944, 2, 115, 5, 546, 'paid', 1),
(943, 2, 115, 4, 768, 'paid', 1),
(942, 2, 115, 2, 456, 'paid', 1),
(941, 2, 115, 3, 578, 'paid', 1),
(1013, 1, 160, 4, 500, 'paid', 1),
(1012, 1, 160, 2, 100, 'paid', 1),
(1011, 1, 160, 3, 200, 'paid', 1),
(1222, 3, 12, 3, 444, 'paid', 1),
(1295, 38, 179, 3, 0, 'free', 1),
(1199, 37, 189, 3, 33, 'paid', 1),
(1200, 11, 190, 4, 100, 'paid', 1),
(1201, 11, 190, 2, 0, 'free', 1),
(1202, 11, 190, 3, 200, 'paid', 1),
(1208, 11, 191, 4, 100, 'paid', 1),
(1207, 11, 191, 2, 0, 'free', 1),
(1206, 11, 191, 3, 200, 'paid', 1),
(1247, 37, 192, 3, 33, 'paid', 1),
(1248, 37, 193, 3, 33, 'paid', 1),
(1219, 3, 198, 3, 11, 'paid', 1),
(1223, 3, 12, 4, 0, 'free', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_foods`
--

CREATE TABLE IF NOT EXISTS `trip_foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `eq_value` double NOT NULL,
  `eq_type` varchar(200) NOT NULL,
  `eq_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`trip_schedule_id`,`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=236 ;

--
-- Dumping data for table `trip_foods`
--

INSERT INTO `trip_foods` (`id`, `trip_id`, `trip_schedule_id`, `food_id`, `eq_value`, `eq_type`, `eq_status`) VALUES
(226, 38, 179, 5, 0, 'free', 1),
(235, 1, 5, 2, 1234, 'paid', 1),
(79, 1, 160, 2, 123, 'paid', 1),
(80, 1, 160, 3, 444, 'paid', 1),
(84, 1, 149, 3, 0, 'free', 1),
(234, 1, 162, 2, 50, 'paid', 1),
(156, 15, 163, 3, 50, 'paid', 1),
(47, 2, 113, 2, 678, 'paid', 1),
(225, 38, 179, 2, 0, 'free', 1),
(83, 1, 149, 2, 500, 'paid', 1),
(51, 11, 150, 3, 100, 'paid', 1),
(50, 11, 150, 2, 50, 'paid', 1),
(76, 1, 9, 4, 34, 'paid', 1),
(75, 1, 9, 3, 45, 'paid', 1),
(74, 1, 9, 2, 78, 'paid', 1),
(81, 1, 6, 2, 878, 'paid', 1),
(42, 2, 11, 2, 766, 'paid', 1),
(41, 2, 114, 2, 456, 'paid', 1),
(46, 2, 115, 2, 234, 'paid', 1),
(176, 2, 10, 3, 0, 'free', 1),
(171, 11, 15, 2, 456, 'paid', 1),
(53, 15, 26, 2, 0, 'free', 1),
(82, 1, 6, 3, 0, 'free', 1),
(175, 2, 10, 2, 456, 'paid', 1),
(155, 37, 178, 4, 12, 'paid', 1),
(174, 11, 191, 2, 50, 'paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_fuel_tank`
--

CREATE TABLE IF NOT EXISTS `trip_fuel_tank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `fuel_tank_id` int(11) NOT NULL,
  `gastype` int(11) NOT NULL,
  `tank_price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `trip_fuel_tank`
--

INSERT INTO `trip_fuel_tank` (`id`, `trip_id`, `fuel_tank_id`, `gastype`, `tank_price`, `status`) VALUES
(135, 1, 2, 1, 0, 1),
(134, 1, 1, 1, 555, 1),
(41, 2, 1, 1, 0, 1),
(40, 11, 2, 1, 500, 1),
(39, 11, 1, 1, 0, 1),
(14, 15, 3, 1, 2000, 1),
(13, 15, 2, 1, 0, 1),
(12, 15, 1, 1, 0, 1),
(9, 14, 1, 1, 0, 1),
(10, 14, 2, 1, 0, 1),
(11, 14, 3, 1, 0, 1),
(125, 38, 2, 2, 0, 1),
(124, 38, 1, 1, 555, 1),
(32, 44, 2, 1, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

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
(9, 2, 'media/trips/2/59095_big.jpg', 1),
(10, 2, 'media/trips/2/271786_big.jpg', 1),
(11, 2, 'media/trips/2/19701e_img1_b.jpg', 1),
(12, 2, 'media/trips/2/6794e_img2_b.jpg', 1),
(16, 11, 'media/trips/11/20712299e_img3_b.jpg', 1),
(17, 11, 'media/trips/11/92206794e_img2_b.jpg', 1),
(18, 11, 'media/trips/11/1585317265i_img1_b.jpg', 1),
(19, 11, 'media/trips/11/1744219701e_img1_b.jpg', 1),
(20, 11, 'media/trips/11/376322522_big.jpg', 1),
(21, 11, 'media/trips/11/3185632024e_img4_b.jpg', 1),
(27, 15, 'media/trips/15/77646794e_img2_b.jpg', 1),
(26, 15, 'media/trips/15/147592299e_img3_b.jpg', 1),
(28, 15, 'media/trips/15/1279717265i_img1_b.jpg', 1),
(29, 15, 'media/trips/15/382619701e_img1_b.jpg', 1),
(30, 15, 'media/trips/15/1875522522_big.jpg', 1),
(31, 15, 'media/trips/15/1939232024e_img4_b.jpg', 1),
(51, 3, 'media/trips/3/14264Sun_224_AnchorLocker_14.jpg', 1),
(52, 3, 'media/trips/3/31121Sun_224_BowTable_14.jpg', 1),
(63, 37, 'media/trips/37/19736401682_0_240220100738_0.jpg', 1),
(53, 3, 'media/trips/3/8438Sun_224_ConsoleStorage_14.jpg', 1),
(54, 3, 'media/trips/3/11511Sun_224_Head_14.jpg', 1),
(55, 3, 'media/trips/3/5988Sun_224_Helm_02_14.jpg', 1),
(56, 3, 'media/trips/3/7629Sun_224_WetBar_01_14.jpg', 1),
(64, 37, 'media/trips/37/21361401682_0_240220100738_1.jpg', 1),
(65, 37, 'media/trips/37/9558401682_0_240220100738_2.jpg', 1),
(66, 37, 'media/trips/37/18903401682_0_240220100738_3.jpg', 1),
(67, 37, 'media/trips/37/8900401682_0_240220100738_4.jpg', 1),
(68, 37, 'media/trips/37/13741401682_0_240220100738_5.jpg', 1),
(69, 38, 'media/trips/38/1767Water_lilies.jpg', 1),
(70, 38, 'media/trips/38/660Winter.jpg', 1),
(94, 1, 'media/trips/1/329623444324085_p_t_640x480_image03.jpg', 1),
(93, 1, 'media/trips/1/274800955324085_p_t_640x480_image04.jpg', 1),
(92, 44, 'media/trips/44/20599401682_0_240220100738_5.jpg', 1),
(89, 44, 'media/trips/44/32056401682_0_240220100738_2.jpg', 1),
(90, 44, 'media/trips/44/4369401682_0_240220100738_3.jpg', 1),
(91, 44, 'media/trips/44/8822401682_0_240220100738_4.jpg', 1),
(97, 38, 'media/trips/38/1372498662401682_0_240220100738_0.jpg', 1),
(98, 38, 'media/trips/38/688680627401682_0_240220100738_1.jpg', 1),
(99, 38, 'media/trips/38/70787280401682_0_240220100738_2.jpg', 1),
(100, 38, 'media/trips/38/381519772401682_0_240220100738_3.jpg', 1),
(101, 38, 'media/trips/38/828404820401682_0_240220100738_4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_gas_type`
--

CREATE TABLE IF NOT EXISTS `trip_gas_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `gas_type_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `trip_gas_type`
--

INSERT INTO `trip_gas_type` (`id`, `trip_id`, `gas_type_id`, `status`) VALUES
(14, 11, 3, 1),
(13, 11, 2, 1),
(12, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_itinerary`
--

CREATE TABLE IF NOT EXISTS `trip_itinerary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `deprture_country_id` int(11) NOT NULL,
  `arrival_country_id` int(11) NOT NULL,
  `departure_place` varchar(500) NOT NULL,
  `arrival_place` varchar(500) NOT NULL,
  `departure_time` varchar(100) NOT NULL,
  `arrival_time` varchar(100) NOT NULL,
  `travel_time` varchar(100) NOT NULL,
  `stay_hour` int(11) NOT NULL,
  `itinerary_date` datetime NOT NULL,
  `no_of_dive` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `trip_itinerary`
--

INSERT INTO `trip_itinerary` (`id`, `trip_id`, `trip_schedule_id`, `deprture_country_id`, `arrival_country_id`, `departure_place`, `arrival_place`, `departure_time`, `arrival_time`, `travel_time`, `stay_hour`, `itinerary_date`, `no_of_dive`, `status`) VALUES
(92, 29, 165, 2, 2, '7', '7', '8:5:AM', '10:35:AM', '2:30', 8, '2014-04-19 00:00:00', 3, 1),
(91, 1, 160, 0, 0, '', '', ':0:AM', ':0:AM', '', 0, '0000-00-00 00:00:00', 0, 1),
(90, 1, 160, 0, 0, '', '', ':0:AM', ':0:AM', '', 0, '0000-00-00 00:00:00', 0, 1),
(85, 29, 164, 2, 2, '7', '7', '3:20:AM', '12:20:AM', '9:00', 5, '2014-04-23 00:00:00', 3, 1),
(88, 1, 160, 2, 1, '7', '2', '3:0:AM', '2:5:AM', '', 0, '0000-00-00 00:00:00', 3, 1),
(89, 1, 160, 0, 0, '', '', ':0:AM', ':0:AM', '', 0, '0000-00-00 00:00:00', 0, 1),
(87, 29, 165, 2, 2, '8', '7', '10:10:PM', '5:5:AM', '6:55', 3, '2014-04-18 00:00:00', 5, 1),
(82, 11, 151, 2, 2, '7', '7', '8:0:PM', '10:0:PM', '', 0, '0000-00-00 00:00:00', 2, 1),
(81, 11, 151, 2, 2, '7', '7', '8:0:AM', '12:0:PM', '', 0, '0000-00-00 00:00:00', 3, 1),
(80, 11, 151, 2, 2, '7', '7', '6:0:PM', '8:0:PM', '', 0, '0000-00-00 00:00:00', 2, 1),
(79, 11, 151, 2, 2, '7', '7', '12:0:PM', '6:0:PM', '', 0, '0000-00-00 00:00:00', 5, 1),
(78, 11, 15, 2, 2, '7', '7', '8:0:PM', '10:0:PM', '', 2, '2014-04-24 00:00:00', 2, 1),
(77, 11, 15, 2, 2, '7', '7', '8:0:AM', '12:0:PM', '', 4, '2014-04-24 00:00:00', 3, 1),
(76, 11, 15, 2, 2, '7', '7', '6:0:PM', '8:0:PM', '', 2, '2014-04-23 00:00:00', 2, 1),
(75, 11, 15, 2, 2, '7', '7', '12:0:PM', '6:0:PM', '', 6, '2014-04-23 00:00:00', 5, 1),
(74, 29, 165, 2, 2, '7', '7', '2:0:AM', '6:10:AM', '4:10', 5, '2014-04-17 00:00:00', 3, 1),
(86, 29, 165, 2, 2, '7', '8', '11:10:AM', '4:10:PM', '5:00', 6, '2014-04-17 00:00:00', 6, 1),
(72, 1, 163, 2, 2, '7', '7', '3:0:AM', '6:0:AM', '', 5, '2014-04-22 00:00:00', 5, 1),
(71, 1, 9, 3, 1, '11', '2', '0:0:AM', '10:10:AM', '10:10', 5, '2014-04-12 00:00:00', 5, 1),
(70, 1, 5, 2, 2, '7', '7', '3:0:AM', '5:0:AM', '', 0, '2014-04-12 00:00:00', 4, 1),
(69, 1, 5, 2, 2, '7', '7', '3:0:AM', '5:0:AM', '', 0, '2014-04-12 00:00:00', 4, 1),
(68, 1, 5, 2, 2, '7', '7', '3:0:AM', '5:0:AM', '', 0, '2014-04-12 00:00:00', 4, 1),
(66, 2, 10, 2, 2, '7', '7', '3:0:AM', '6:0:AM', '', 0, '2014-04-13 00:00:00', 3, 1),
(64, 1, 149, 0, 0, '', '', ':0:AM', ':0:AM', '', 0, '0000-00-00 00:00:00', 0, 1),
(65, 0, 161, 2, 3, '7', '7', '7:0:AM', '6:0:AM', '', 7, '2014-04-17 00:00:00', 5, 1),
(62, 1, 149, 0, 0, '', '', ':0:AM', ':0:AM', '', 0, '0000-00-00 00:00:00', 0, 1),
(63, 1, 149, 0, 0, '', '', ':0:AM', ':0:AM', '', 0, '0000-00-00 00:00:00', 0, 1),
(61, 1, 149, 2, 1, '7', '2', '3:0:AM', '2:5:AM', '', 0, '2014-04-24 00:00:00', 3, 1),
(93, 29, 165, 2, 2, '7', '7', '6:35:PM', '8:5:PM', '1:30', 6, '2014-04-19 00:00:00', 5, 1),
(94, 29, 168, 1, 1, '4', '3', '10:30:AM', '1:10:PM', '26:40', 3, '2014-06-24 00:00:00', 3, 1),
(95, 29, 165, 2, 2, '7', '7', '2:5:AM', '6:55:PM', '16:50', 10, '2014-04-20 00:00:00', 4, 1),
(96, 29, 168, 1, 1, '3', '3', '4:10:PM', '5:5:PM', '00:55', 1, '2014-06-25 00:00:00', 1, 1),
(97, 29, 168, 1, 1, '3', '3', '6:5:PM', '8:0:PM', '1:55', 6, '2014-06-25 00:00:00', 1, 1),
(98, 29, 169, 1, 1, '4', '1', '2:0:AM', '9:20:PM', '19:20', 13, '2014-09-10 00:00:00', 4, 1),
(99, 29, 164, 2, 2, '7', '7', '5:20:PM', '1:20:AM', '8:00', 10, '2014-04-23 00:00:00', 2, 1),
(100, 1, 9, 1, 1, '2', '17', '3:10:PM', '8:25:AM', '65:15', 10, '2014-04-15 00:00:00', 10, 1),
(101, 15, 163, 2, 1, '7', '0', '0:0:AM', '8:10:AM', '8:10', 5, '2014-04-22 00:00:00', 5, 1),
(102, 1, 9, 1, 5, '17', '10', '6:25:PM', '9:35:AM', '15:10', 5, '2014-04-19 00:00:00', 5, 1),
(103, 3, 12, 1, 5, '5', '10', '3:15:AM', '9:15:AM', '6:00', 9, '2014-04-17 00:00:00', 5, 1),
(104, 1, 9, 5, 1, '10', '17', '2:35:PM', '7:45:AM', '65:10', 4, '2014-04-23 00:00:00', 7, 1),
(105, 1, 188, 5, 5, '10', '10', '6:0:AM', '1:0:AM', '1:00', 2, '2014-05-29 00:00:00', 2, 1),
(107, 1, 162, 5, 5, '10', '10', '7:0:AM', '9:0:AM', '2:00', 2, '2014-08-26 00:00:00', 4, 1),
(108, 1, 162, 5, 2, '10', '7', '11:0:AM', '1:0:PM', '74:00', 4, '2014-08-26 00:00:00', 10, 1),
(109, 1, 162, 2, 2, '7', '8', '5:0:PM', '1:0:AM', '8:00', 4, '2014-08-29 00:00:00', 4, 1),
(110, 1, 162, 2, 1, '8', '3', '5:0:AM', '3:0:AM', '46:00', 2, '2014-08-30 00:00:00', 4, 1),
(111, 0, 189, 1, 1, '1', '1', '6:0:AM', '8:0:AM', '2:00', 2, '2014-05-31 00:00:00', 4, 1),
(112, 0, 189, 1, 1, '1', '2', '10:0:AM', '1:0:PM', '3:00', 5, '2014-05-31 00:00:00', 2, 1),
(113, 0, 189, 1, 1, '2', '3', '6:0:PM', '10:0:PM', '4:00', 3, '2014-05-31 00:00:00', 4, 1),
(114, 37, 192, 1, 1, '1', '1', '10:00:AM', '00:00:PM', '2:00', 2, '2014-06-04 00:00:00', 4, 1),
(115, 37, 192, 1, 1, '1', '2', '2:00:PM', '5:00:PM', '3:00', 5, '2014-06-04 00:00:00', 2, 1),
(116, 37, 192, 1, 1, '2', '3', '10:0:PM', '2:0:AM', '4:00', 3, '2014-06-04 00:00:00', 4, 1),
(117, 37, 193, 1, 1, '1', '1', '6:0:AM', '8:0:AM', '2:00', 2, '2014-06-07 00:00:00', 4, 1),
(118, 37, 193, 1, 1, '1', '2', '10:00:AM', '1:00:PM', '3:00', 5, '2014-06-07 00:00:00', 2, 1),
(119, 37, 193, 1, 1, '2', '3', '6:00:PM', '10:00:PM', '4:00', 3, '2014-06-07 00:00:00', 4, 1),
(120, 37, 194, 1, 1, '1', '1', '6:0:AM', '8:0:AM', '2:00', 1, '2014-06-10 00:00:00', 4, 1),
(121, 37, 194, 1, 1, '1', '2', '9:00:AM', '00:00:PM', '3:00', 1, '2014-06-10 00:00:00', 2, 1),
(122, 37, 194, 1, 1, '2', '3', '1:00:PM', '5:00:PM', '4:00', 3, '2014-06-10 00:00:00', 4, 1),
(123, 37, 195, 1, 1, '1', '1', '9:00:AM', '11:00:AM', '2:00', 1, '2014-06-18 00:00:00', 4, 1),
(124, 37, 195, 1, 1, '1', '2', '00:00:PM', '3:00:PM', '3:00', 1, '2014-06-18 00:00:00', 2, 1),
(125, 37, 195, 1, 1, '2', '3', '4:00:PM', '8:00:PM', '4:00', 3, '2014-06-18 00:00:00', 4, 1),
(126, 37, 196, 1, 1, '1', '1', '00:00:PM', '2:00:PM', '2:00', 1, '2014-06-28 00:00:00', 4, 1),
(127, 37, 196, 1, 1, '1', '2', '3:00:PM', '6:00:PM', '3:00', 1, '2014-06-28 00:00:00', 2, 1),
(128, 37, 196, 1, 1, '2', '3', '7:00:PM', '11:00:PM', '4:00', 3, '2014-06-28 00:00:00', 4, 1),
(129, 37, 197, 1, 1, '1', '1', '3:00:PM', '5:00:PM', '2:00', 1, '2014-07-01 00:00:00', 4, 1),
(130, 37, 197, 1, 1, '1', '2', '6:00:PM', '9:00:PM', '3:00', 1, '2014-07-01 00:00:00', 2, 1),
(131, 37, 197, 1, 1, '2', '3', '10:00:PM', '2:00:AM', '4:00', 3, '2014-07-01 00:00:00', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_itinerary_details`
--

CREATE TABLE IF NOT EXISTS `trip_itinerary_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_itinerary_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `night_schedule` text NOT NULL,
  `detail` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=308 ;

--
-- Dumping data for table `trip_itinerary_details`
--

INSERT INTO `trip_itinerary_details` (`id`, `trip_itinerary_id`, `language_id`, `night_schedule`, `detail`, `status`) VALUES
(5, 62, 1, '', '', 1),
(4, 61, 1, 'bvghhg', 'ghghgh', 1),
(6, 63, 1, '', '', 1),
(7, 64, 1, '', '', 1),
(8, 66, 1, 'dfg', 'dfg', 1),
(9, 67, 1, '', '', 1),
(10, 68, 1, 'test', 'test', 1),
(11, 69, 1, 'test', 'test', 1),
(12, 70, 1, 'test', 'test', 1),
(13, 71, 1, 'kkkkkkkkkk', 'kkkkkkk', 1),
(14, 72, 1, 'trest', 'trst', 1),
(15, 72, 5, '', '', 1),
(16, 72, 2, '', '', 1),
(17, 72, 4, '', '', 1),
(18, 73, 1, 'cvvvv', 'cvcvvccv', 1),
(19, 73, 2, '', '', 1),
(20, 73, 4, '', '', 1),
(21, 73, 5, '', '', 1),
(22, 73, 5, '', '', 1),
(23, 71, 2, '', '', 1),
(24, 71, 4, '', '', 1),
(25, 71, 5, '', '', 1),
(26, 71, 5, '', '', 1),
(27, 67, 2, '', '', 1),
(28, 67, 4, '', '', 1),
(29, 67, 5, '', '', 1),
(30, 67, 5, '', '', 1),
(31, 65, 1, 'jkjkjkkj', 'kjkjjkjkkj', 1),
(32, 65, 2, '', '', 1),
(33, 65, 4, '', '', 1),
(34, 65, 5, '', '', 1),
(35, 65, 5, '', '', 1),
(36, 74, 5, '', '', 1),
(37, 74, 1, 'hgg', 'fggfgf', 1),
(38, 74, 2, '', '', 1),
(39, 74, 4, '', '', 1),
(40, 75, 1, 'test again', 'test again', 1),
(41, 40, 1, '', '', 1),
(42, 41, 1, '', '', 1),
(43, 42, 1, '', '', 1),
(44, 75, 2, '', '', 1),
(45, 75, 4, '', '', 1),
(46, 75, 5, '', '', 1),
(47, 75, 5, '', '', 1),
(48, 76, 1, '', '', 1),
(49, 76, 1, '', '', 1),
(50, 76, 1, '', '', 1),
(51, 76, 1, '', '', 1),
(52, 77, 1, '', '', 1),
(53, 77, 1, '', '', 1),
(54, 77, 1, '', '', 1),
(55, 77, 1, '', '', 1),
(56, 78, 1, 'asd', 'qwert', 1),
(57, 78, 1, '', '', 1),
(58, 78, 1, '', '', 1),
(59, 78, 1, '', '', 1),
(60, 79, 5, '', '', 1),
(61, 80, 1, '', '', 1),
(62, 81, 1, '', '', 1),
(63, 82, 1, '', '', 1),
(95, 87, 1, 'dfg', 'dfg', 1),
(94, 87, 1, 'dfg', 'dfg', 1),
(93, 87, 1, 'dfg', 'dfg', 1),
(92, 87, 1, 'dfg', 'dfg', 1),
(91, 86, 1, 'fdgdf', 'gdfg', 1),
(90, 86, 1, 'fdgdf', 'gdfg', 1),
(89, 86, 1, 'fdgdf', 'gdfg', 1),
(88, 86, 1, 'fdgdf', 'gdfg', 1),
(100, 88, 1, 'bvghhg', 'ghghgh', 1),
(99, 86, 5, '', '', 1),
(97, 86, 4, '', '', 1),
(98, 86, 5, '', '', 1),
(96, 86, 2, '', '', 1),
(80, 85, 1, 'fgh', 'fghf', 1),
(81, 85, 1, 'fgh', 'fghf', 1),
(82, 85, 1, 'fgh', 'fghf', 1),
(83, 85, 1, 'fgh', 'fghf', 1),
(84, 85, 2, '', '', 1),
(85, 85, 4, '', '', 1),
(86, 85, 5, '', '', 1),
(87, 85, 5, '', '', 1),
(101, 89, 1, '', '', 1),
(102, 90, 1, '', '', 1),
(103, 91, 1, '', '', 1),
(104, 87, 2, '', '', 1),
(105, 87, 4, '', '', 1),
(106, 87, 5, '', '', 1),
(107, 87, 5, '', '', 1),
(108, 92, 1, 'dfg', 'dfdg', 1),
(109, 92, 1, 'dfg', 'dfdg', 1),
(110, 92, 1, 'dfg', 'dfdg', 1),
(111, 92, 1, 'dfg', 'dfdg', 1),
(112, 92, 2, '', '', 1),
(113, 92, 4, '', '', 1),
(114, 92, 5, '', '', 1),
(115, 92, 5, '', '', 1),
(116, 93, 1, 'sdf', 'sdf', 1),
(117, 93, 1, 'sdf', 'sdf', 1),
(118, 93, 1, 'sdf', 'sdf', 1),
(119, 93, 1, 'sdf', 'sdf', 1),
(120, 93, 2, '', '', 1),
(121, 93, 4, '', '', 1),
(122, 93, 5, '', '', 1),
(123, 93, 5, '', '', 1),
(124, 94, 1, 'werwe', 'rwerwe', 1),
(125, 94, 1, 'werwe', 'rwerwe', 1),
(126, 94, 1, 'werwe', 'rwerwe', 1),
(127, 94, 1, 'werwe', 'rwerwe', 1),
(128, 94, 2, '', '', 1),
(129, 94, 4, '', '', 1),
(130, 94, 5, '', '', 1),
(131, 94, 5, '', '', 1),
(132, 95, 1, 'erert', 'erter', 1),
(133, 95, 1, 'erert', 'erter', 1),
(134, 95, 1, 'erert', 'erter', 1),
(135, 95, 1, 'erert', 'erter', 1),
(136, 95, 2, '', '', 1),
(137, 95, 4, '', '', 1),
(138, 95, 5, '', '', 1),
(139, 95, 5, '', '', 1),
(140, 96, 1, 'sdf', 'sdfsdf', 1),
(141, 96, 1, 'sdf', 'sdfsdf', 1),
(142, 96, 1, 'sdf', 'sdfsdf', 1),
(143, 96, 1, 'sdf', 'sdfsdf', 1),
(144, 97, 1, 'sdf', 'sdfsdf', 1),
(145, 97, 1, 'sdf', 'sdfsdf', 1),
(146, 97, 1, 'sdf', 'sdfsdf', 1),
(147, 97, 1, 'sdf', 'sdfsdf', 1),
(148, 97, 2, '', '', 1),
(149, 97, 4, '', '', 1),
(150, 97, 5, '', '', 1),
(151, 97, 5, '', '', 1),
(152, 96, 2, '', '', 1),
(153, 96, 4, '', '', 1),
(154, 96, 5, '', '', 1),
(155, 96, 5, '', '', 1),
(156, 98, 1, 'vbn', 'vbnvb', 1),
(157, 98, 1, 'vbn', 'vbnvb', 1),
(158, 98, 1, 'vbn', 'vbnvb', 1),
(159, 98, 1, 'vbn', 'vbnvb', 1),
(160, 98, 2, '', '', 1),
(161, 98, 4, '', '', 1),
(162, 98, 5, '', '', 1),
(163, 98, 5, '', '', 1),
(164, 99, 1, 'kkkk', 'kkkk', 1),
(165, 99, 1, 'kkkk', 'kkkk', 1),
(166, 99, 1, 'kkkk', 'kkkk', 1),
(167, 99, 1, 'kkkk', 'kkkk', 1),
(168, 99, 2, '', '', 1),
(169, 99, 4, '', '', 1),
(170, 99, 5, '', '', 1),
(171, 99, 5, '', '', 1),
(172, 99, 8, '', '', 1),
(173, 99, 9, '', '', 1),
(174, 99, 10, '', '', 1),
(175, 99, 10, '', '', 1),
(208, 105, 1, 'kjh', 'jhg', 1),
(176, 100, 1, 'kjkjkj', 'kjjkjkkjkj', 1),
(177, 100, 1, 'kjkjkj', 'kjjkjkkjkj', 1),
(178, 100, 1, 'kjkjkj', 'kjjkjkkjkj', 1),
(179, 100, 1, 'kjkjkj', 'kjjkjkkjkj', 1),
(180, 101, 1, 'jhjh', 'jhjhjhjh', 1),
(181, 101, 1, '', '', 1),
(182, 101, 1, '', '', 1),
(183, 101, 1, '', '', 1),
(184, 100, 2, '', '', 1),
(185, 100, 4, '', '', 1),
(186, 100, 5, '', '', 1),
(187, 100, 5, '', '', 1),
(188, 102, 1, 'ghhggh', 'hghgghgh', 1),
(189, 102, 1, 'ghhggh', 'hghgghgh', 1),
(190, 102, 1, 'ghhggh', 'hghgghgh', 1),
(191, 102, 1, 'ghhggh', 'hghgghgh', 1),
(192, 103, 1, 'ghhgf', 'ghfgfggf', 1),
(193, 103, 1, 'ghhgf', 'ghfgfggf', 1),
(194, 103, 1, 'ghhgf', 'ghfgfggf', 1),
(195, 103, 1, 'ghhgf', 'ghfgfggf', 1),
(196, 103, 2, '', '', 1),
(197, 103, 4, '', '', 1),
(198, 103, 5, '', '', 1),
(199, 103, 5, '', '', 1),
(200, 102, 2, '', '', 1),
(201, 102, 4, '', '', 1),
(202, 102, 5, '', '', 1),
(203, 102, 5, '', '', 1),
(204, 104, 1, 'hjjhjh', 'jhjhjh', 1),
(205, 104, 1, '', '', 1),
(206, 104, 1, '', '', 1),
(207, 104, 1, '', '', 1),
(209, 105, 1, '', '', 1),
(210, 105, 1, '', '', 1),
(211, 105, 1, '', '', 1),
(212, 106, 1, 'hd hjdf fjgf gjg g', 'fghjfgh fghjfghj vghjgvh vghjfghj', 1),
(213, 106, 1, '', '', 1),
(214, 106, 1, '', '', 1),
(215, 106, 1, '', '', 1),
(216, 107, 1, 'hjfghgh', 'ghjghjghj ghjghgjk jhhjkj', 1),
(217, 107, 1, 'hjfghgh', 'ghjghjghj ghjghgjk jhhjkj', 1),
(218, 107, 1, 'hjfghgh', 'ghjghjghj ghjghgjk jhhjkj', 1),
(219, 107, 1, 'hjfghgh', 'ghjghjghj ghjghgjk jhhjkj', 1),
(220, 107, 2, '', '', 1),
(221, 107, 4, '', '', 1),
(222, 107, 5, '', '', 1),
(223, 107, 5, '', '', 1),
(224, 108, 1, 'fgyhjfghj', 'fgkjghjghkjghkjghk', 1),
(225, 108, 1, '', '', 1),
(226, 108, 1, '', '', 1),
(227, 108, 1, '', '', 1),
(228, 109, 1, 'hjh', 'fghjgfhkjghj', 1),
(229, 109, 1, '', '', 1),
(230, 109, 1, '', '', 1),
(231, 109, 1, '', '', 1),
(232, 110, 1, 'm,ghj,kghj', 'hgjkghjgj', 1),
(233, 110, 1, '', '', 1),
(234, 110, 1, '', '', 1),
(235, 110, 1, '', '', 1),
(236, 111, 1, 'asd', 'asd', 1),
(237, 111, 1, '', '', 1),
(238, 112, 1, 'sdf', 'sdf', 1),
(239, 112, 1, '', '', 1),
(240, 113, 1, 'sdf', 'sdf', 1),
(241, 113, 1, '', '', 1),
(242, 114, 1, 'asd', 'asd', 1),
(243, 114, 1, '', '', 1),
(244, 115, 1, 'sdf', 'sdf', 1),
(245, 115, 1, '', '', 1),
(246, 116, 1, 'sdf', 'sdf', 1),
(247, 116, 1, 'sdf', 'sdf', 1),
(248, 116, 2, '', '', 1),
(249, 116, 2, '', '', 1),
(250, 117, 1, 'asd', 'asd', 1),
(251, 117, 1, 'asd', 'asd', 1),
(252, 118, 1, 'sdf', 'sdf', 1),
(253, 118, 1, '', '', 1),
(254, 119, 1, 'sdf', 'sdf', 1),
(255, 119, 1, 'sdf', 'sdf', 1),
(256, 119, 2, '', '', 1),
(257, 119, 2, '', '', 1),
(258, 120, 1, 'asd', 'asd', 1),
(259, 120, 1, 'asd', 'asd', 1),
(260, 121, 1, 'sdf', 'sdf', 1),
(261, 121, 1, 'sdf', 'sdf', 1),
(262, 122, 1, 'sdf', 'sdf', 1),
(263, 122, 1, 'sdf', 'sdf', 1),
(264, 122, 2, '', '', 1),
(265, 122, 2, '', '', 1),
(266, 121, 2, '', '', 1),
(267, 121, 2, '', '', 1),
(268, 120, 2, '', '', 1),
(269, 120, 2, '', '', 1),
(270, 117, 2, '', '', 1),
(271, 117, 2, '', '', 1),
(272, 123, 1, 'asd', 'asd', 1),
(273, 123, 1, 'asd', 'asd', 1),
(274, 123, 2, '', '', 1),
(275, 123, 2, '', '', 1),
(276, 124, 1, 'sdf', 'sdf', 1),
(277, 124, 1, 'sdf', 'sdf', 1),
(278, 124, 2, '', '', 1),
(279, 124, 2, '', '', 1),
(280, 125, 1, 'sdf', 'sdf', 1),
(281, 125, 1, 'sdf', 'sdf', 1),
(282, 125, 2, '', '', 1),
(283, 125, 2, '', '', 1),
(284, 126, 1, 'asd', 'asd', 1),
(285, 126, 1, 'asd', 'asd', 1),
(286, 126, 2, '', '', 1),
(287, 126, 2, '', '', 1),
(288, 127, 1, 'sdf', 'sdf', 1),
(289, 127, 1, 'sdf', 'sdf', 1),
(290, 127, 2, '', '', 1),
(291, 127, 2, '', '', 1),
(292, 128, 1, 'sdf', 'sdf', 1),
(293, 128, 1, 'sdf', 'sdf', 1),
(294, 128, 2, '', '', 1),
(295, 128, 2, '', '', 1),
(296, 129, 1, 'asd', 'asd', 1),
(297, 129, 1, 'asd', 'asd', 1),
(298, 129, 2, '', '', 1),
(299, 129, 2, '', '', 1),
(300, 130, 1, 'sdf', 'sdf', 1),
(301, 130, 1, 'sdf', 'sdf', 1),
(302, 130, 2, '', '', 1),
(303, 130, 2, '', '', 1),
(304, 131, 1, 'sdf', 'sdf', 1),
(305, 131, 1, 'sdf', 'sdf', 1),
(306, 131, 2, '', '', 1),
(307, 131, 2, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_itinerary_foods`
--

CREATE TABLE IF NOT EXISTS `trip_itinerary_foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_itinerary_id` int(11) NOT NULL,
  `food_type_id` int(11) NOT NULL,
  `food_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `trip_itinerary_foods`
--


-- --------------------------------------------------------

--
-- Table structure for table `trip_rating`
--

CREATE TABLE IF NOT EXISTS `trip_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `rating_type` varchar(100) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `trip_rating`
--

INSERT INTO `trip_rating` (`id`, `user_id`, `trip_id`, `trip_schedule_id`, `rating_type`, `rating`, `date_time`) VALUES
(119, 30, 1, 9, 'diver', 5, '2014-04-04 16:53:45'),
(118, 30, 1, 9, 'crew', 4, '2014-04-04 16:53:45'),
(117, 30, 1, 9, 'service', 5, '2014-04-04 16:53:45'),
(116, 30, 1, 9, 'cabin', 4, '2014-04-04 16:53:45'),
(114, 30, 1, 9, 'equipment', 2, '2014-04-04 16:53:45'),
(115, 30, 1, 9, 'beverage', 5, '2014-04-04 16:53:45'),
(113, 30, 1, 9, 'food', 4, '2014-04-04 16:53:45'),
(120, 30, 1, 188, 'food', 3, '2014-06-13 12:22:48'),
(121, 30, 1, 188, 'equipment', 4, '2014-06-13 12:22:48'),
(122, 30, 1, 188, 'beverage', 5, '2014-06-13 12:22:48'),
(123, 30, 1, 188, 'cabin', 5, '2014-06-13 12:22:48'),
(124, 30, 1, 188, 'service', 5, '2014-06-13 12:22:48'),
(125, 30, 1, 188, 'crew', 5, '2014-06-13 12:22:48'),
(126, 30, 1, 188, 'diver', 5, '2014-06-13 12:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `trip_refund_transaction`
--

CREATE TABLE IF NOT EXISTS `trip_refund_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `refund_amount` int(11) NOT NULL,
  `refund_transaction_id` int(11) NOT NULL,
  `refund_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `trip_refund_transaction`
--

INSERT INTO `trip_refund_transaction` (`id`, `transaction_id`, `booking_id`, `refund_amount`, `refund_transaction_id`, `refund_date`, `status`) VALUES
(13, 1, 81, 51111, 2147483647, '2014-05-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_reviews`
--

CREATE TABLE IF NOT EXISTS `trip_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `review` text,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `trip_reviews`
--

INSERT INTO `trip_reviews` (`id`, `user_id`, `trip_id`, `trip_schedule_id`, `review`, `date_time`, `status`) VALUES
(3, 30, 1, 9, 'This trip was awesome..', '2014-04-04 16:54:09', 0),
(4, 30, 1, 9, 'fsdfsd sdf ', '2014-05-23 14:26:18', 1),
(5, 30, 1, 9, 'fgddf dfgsd fg ', '2014-05-15 14:26:43', 1),
(6, 30, 1, 188, 'awesome trip i enjoy very much', '2014-06-13 12:23:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trip_schedules`
--

CREATE TABLE IF NOT EXISTS `trip_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `start_trip_datetime` date NOT NULL,
  `end_trip_datetime` date NOT NULL,
  `trip_price` double NOT NULL,
  `last_update` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

--
-- Dumping data for table `trip_schedules`
--

INSERT INTO `trip_schedules` (`id`, `trip_id`, `start_trip_datetime`, `end_trip_datetime`, `trip_price`, `last_update`, `status`) VALUES
(185, 44, '2014-05-05', '2014-05-05', 56768000, '2014-05-20 13:35:00', 1),
(162, 1, '2014-08-01', '2014-08-30', 567, '2014-06-07 14:45:19', 1),
(3, 13, '2014-01-22', '2014-01-22', 0, '0000-00-00 00:00:00', 1),
(21, 3, '2014-05-07', '2014-05-10', 22222, '2014-02-14 12:26:47', 1),
(5, 1, '1970-01-01', '1970-01-01', 567, '2014-06-11 13:22:55', 1),
(6, 1, '2014-04-21', '2014-04-25', 23000, '2014-04-12 14:58:22', 1),
(7, 13, '2014-01-23', '2014-01-23', 132000, '0000-00-00 00:00:00', 1),
(8, 13, '2014-01-23', '2014-01-23', 234234, '0000-00-00 00:00:00', 1),
(9, 1, '2014-04-16', '2014-04-20', 120000, '2014-04-12 14:51:18', 1),
(10, 2, '2014-05-01', '2014-05-06', 2342300, '2014-05-26 10:25:22', 1),
(11, 2, '2014-04-10', '2014-04-14', 234230, '2014-03-29 12:55:37', 1),
(12, 3, '2014-04-17', '2014-04-25', 33333, '2014-05-27 11:56:10', 1),
(13, 3, '2014-04-26', '2014-04-28', 3400, '2014-02-14 12:25:40', 1),
(14, 3, '2014-04-30', '2014-05-04', 50000, '2014-02-14 12:26:18', 1),
(15, 11, '2014-04-15', '2014-04-25', 566660, '2014-05-20 18:17:02', 1),
(16, 13, '2014-01-24', '2014-01-29', 10000, '0000-00-00 00:00:00', 1),
(114, 2, '2014-04-15', '2014-04-20', 897867, '2014-03-29 12:55:28', 1),
(22, 14, '2014-02-01', '2014-02-01', 0, '0000-00-00 00:00:00', 1),
(113, 2, '2014-04-25', '2014-04-28', 3457800, '2014-03-29 12:58:05', 1),
(155, 1, '2014-04-01', '2014-04-16', 77676776, '2014-04-12 14:58:41', 1),
(163, 15, '2014-04-22', '2014-04-22', 20002, '2014-05-20 14:12:50', 1),
(149, 1, '2014-05-10', '2014-05-20', 150000, '2014-04-12 14:58:33', 1),
(179, 38, '2014-05-02', '2014-05-02', 786, '2014-06-07 13:06:10', 1),
(115, 2, '2014-04-21', '2014-04-24', 890984, '2014-03-29 12:57:30', 1),
(160, 1, '2014-04-30', '2014-05-10', 10000, '2014-04-12 14:53:28', 1),
(150, 11, '2014-05-05', '2014-05-10', 100000, '2014-03-29 13:00:42', 1),
(151, 11, '2014-04-27', '2014-04-30', 20000, '2014-03-27 15:44:30', 1),
(167, 11, '2014-04-30', '2014-05-03', 11000, '2014-04-17 15:57:40', 1),
(178, 37, '2014-05-04', '2014-05-04', 346780, '2014-05-20 13:35:30', 1),
(186, 44, '2014-05-06', '2014-05-06', 786786700, '2014-05-06 16:37:25', 1),
(188, 1, '2014-05-29', '2014-05-29', 500, '2014-05-08 17:26:41', 1),
(189, 37, '2014-05-31', '2014-05-31', 111, '2014-05-22 12:12:12', 1),
(190, 11, '2014-06-01', '2014-06-06', 100000, '2014-05-23 15:59:49', 1),
(191, 11, '2014-06-10', '2014-06-15', 100000, '2014-05-23 16:32:30', 1),
(192, 37, '2014-06-04', '2014-06-04', 5600, '2014-06-03 15:31:17', 1),
(193, 37, '2014-06-07', '2014-06-07', 5600, '2014-06-03 15:31:24', 1),
(198, 3, '2014-05-30', '2014-06-02', 22222, '2014-05-23 18:41:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_specifications`
--

CREATE TABLE IF NOT EXISTS `trip_specifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `trip_title` varchar(200) NOT NULL,
  `specification` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `trip_specifications`
--

INSERT INTO `trip_specifications` (`id`, `trip_id`, `language_id`, `trip_title`, `specification`) VALUES
(1, 1, 1, 'Similan Islands, Koh Bon, Koh Taichai', 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock'),
(2, 1, 2, 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock', 'fgjh'),
(3, 1, 4, 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock', 'fghfgj'),
(4, 2, 1, '4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock', 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock'),
(5, 2, 2, 'Koh Bon, Koh Taichai', 'tyjirtyi trfyujrtyury'),
(6, 2, 4, 'Koh Bon, Koh Taichai', 'tryurtyityui'),
(7, 3, 1, 'Similan Islands, Koh Bon', 'Similan Islands, Koh Bon,Similan Islands, Koh Bon'),
(8, 3, 2, '', ''),
(9, 3, 4, '', ''),
(31, 11, 1, 'Equirem industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s'),
(32, 11, 2, '', ''),
(33, 11, 4, '', ''),
(43, 15, 1, 'Sydney,Yard,Antlatic', 'Sydney,Yard,Antlatic,Sydney,Yard,Antlatic'),
(44, 15, 2, '', ''),
(45, 15, 4, '', ''),
(119, 37, 4, '', ''),
(118, 37, 2, '', ''),
(117, 37, 1, 'kanpur,lucknow', 'kanpur,lucknow'),
(120, 37, 5, '', ''),
(121, 38, 1, 'Similan Islands, Koh Bon, Koh Taichai', 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock'),
(122, 38, 2, 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock', 'fgjh'),
(123, 38, 4, 'Similan Islands, Koh Bon, Koh Taichai, Richelieu Rock', 'fghfgj'),
(124, 38, 5, '', ''),
(147, 44, 4, '', ''),
(146, 44, 2, '', ''),
(145, 44, 1, 'Sydney, Melbourne, Yard, Antlatic', 'Sydney, Melbourne, Yard, Antlatic Australia..'),
(148, 44, 5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `trip_transactions`
--

CREATE TABLE IF NOT EXISTS `trip_transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `txn_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `txn_amount` decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
  `txn_currency` varchar(50) DEFAULT NULL,
  `txn_status` varchar(50) DEFAULT NULL,
  `txn_paypal_txn_id` varchar(128) DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL,
  `txn_fortumo_message_id` varchar(50) DEFAULT NULL,
  `txn_service_provider` int(11) NOT NULL,
  `booking_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `booking_id` (`booking_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trip_transactions`
--

INSERT INTO `trip_transactions` (`id`, `txn_date`, `txn_amount`, `txn_currency`, `txn_status`, `txn_paypal_txn_id`, `payment_method_id`, `txn_fortumo_message_id`, `txn_service_provider`, `booking_id`) VALUES
(1, '2014-05-29 16:17:51', '100.00', 'yes', '1', '123456', 1, '1', 0, 81);

-- --------------------------------------------------------

--
-- Table structure for table `trip_types`
--

CREATE TABLE IF NOT EXISTS `trip_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_type` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `trip_types`
--

INSERT INTO `trip_types` (`id`, `trip_type`, `status`) VALUES
(1, 'Liveabords', 1),
(2, 'Day Trips', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `email`, `mobile`, `gender`, `dob`, `language`, `address`, `image`, `postalcode`, `city_id`, `token`, `exp_date_time`, `date_time`, `subscription`, `utype`, `exp_status`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Gaurav', 'Tiwari', 'gaurav7tiwari@gmail.com', '9236619342', 1, '0000-00-00', NULL, NULL, 'anjali bhadula.jpg', 0, 0, '1390549805738', '2014-01-25 13:20:05', '2013-11-13 12:55:02', 1, 1, 0, 1),
(30, 'sunil', '21232f297a57a5a743894a0e4a801fc3', 'Sunil', 'Srivastava', 'sunkumar8@gmail.com', '8768789067', 1, '0000-00-00', NULL, NULL, 'user_30Copy_of_Photo-0179.jpg', 0, 0, '139643497132666', '2014-04-03 16:06:11', '2014-03-29 13:26:57', 1, 0, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_addressbook`
--

INSERT INTO `user_addressbook` (`id`, `user_id`, `fname`, `lname`, `addressone`, `addresstwo`, `city`, `postalcode`, `country`, `state`, `date_time`) VALUES
(22, 30, 'gfgfg', 'dfgdf', 'ghfghfgh', 'fghfghf', 'hgfgh', '768678', 'fghfgh', 'fghfg', '2014-04-02 15:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE IF NOT EXISTS `user_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`id`, `user_id`, `point`, `status`) VALUES
(12, 30, 900, 1),
(13, 35, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_point_logs`
--

CREATE TABLE IF NOT EXISTS `user_point_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `point_from` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL COMMENT 'get or used',
  `date_time` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `user_point_logs`
--

INSERT INTO `user_point_logs` (`id`, `user_id`, `point`, `point_from`, `type`, `date_time`, `product_id`, `product_type`) VALUES
(104, 30, 100, 'join_point', 'get', '2014-03-29 13:26:58', 0, ''),
(130, 35, 100, 'join_point', 'get', '2014-05-22 14:44:29', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `trip_schedule_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `trip_id`, `trip_schedule_id`, `date_time`) VALUES
(94, 30, 1, 5, '0000-00-00 00:00:00'),
(95, 30, 3, 21, '0000-00-00 00:00:00'),
(96, 30, 15, 26, '0000-00-00 00:00:00'),
(97, 30, 1, 6, '0000-00-00 00:00:00'),
(98, 30, 1, 162, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
