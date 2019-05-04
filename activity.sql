-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `teacher` text COLLATE utf8_unicode_ci NOT NULL,
  `day_start` date NOT NULL,
  `day_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `term_year` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `student` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `activity` (`id`, `activity_name`, `description`, `teacher`, `day_start`, `day_end`, `time_start`, `time_end`, `term_year`, `sector`, `location`, `image`, `student`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(42,	'swe ติวน้องasdzxc',	'',	'[\"1\",\"3\",\"5\"]',	'2019-02-14',	'2019-02-22',	'08:30:00',	'15:00:00',	2,	2561,	'ห้องเรียน 3310',	NULL,	'[\"1\",\"3\",\"4\"]',	'2018-12-06 22:32:36',	'',	'2019-01-26 16:32:38',	''),
(43,	'เก็บขยะ',	'ตามเก็บขยะในมหาวิทยาลัย',	'[\"1\",\"3\"]',	'2019-03-16',	'2019-03-23',	'00:00:00',	'00:00:00',	2,	2561,	'มหาวิทยาลัย',	'assets/upload/image/oo8ehfjpgkjD1444VzI-o.png',	'[\"1\",\"3\"]',	'2018-12-06 22:39:19',	'',	'2019-03-28 10:07:10',	''),
(44,	'swe ติวน้อง',	'',	'[\"2\",\"4\"]',	'2019-04-01',	'2019-04-01',	'12:12:00',	'12:20:00',	2,	2562,	'รวม5',	'assets/upload/image/logo.png	',	'[\"1\",\"3\"]',	'2018-12-07 12:13:22',	'',	'2018-12-07 12:13:22',	''),
(45,	'สอบโครงงาน',	'',	'[\"1\",\"2\",\"3\",\"4\",\"5\"]',	'1970-01-01',	'1970-01-01',	'13:00:00',	'17:00:00',	2,	2561,	'AD3501/SM Tower',	NULL,	'[\"1\"]',	'2018-12-11 11:04:02',	'',	'2018-12-11 11:05:33',	''),
(46,	'กิจกรรมรับน้อง',	'ทะเล',	'[\"1\",\"3\",\"4\"]',	'2019-02-04',	'2019-02-06',	'00:00:00',	'00:00:00',	3,	2563,	'ทะเล',	'assets/upload/image/oo8ehfjpgkjD1444VzI-o.png',	'[\"1\",\"3\",\"4\"]',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	''),
(47,	'กิจกรรมรับน้อง',	'น้ำตก',	'[\"1\",\"3\",\"4\"]',	'2019-01-01',	'2019-10-10',	'08:00:00',	'16:00:00',	2,	2564,	'น้ำตก',	'assets/upload/image/Picture2.jpg',	'[\"1\",\"3\",\"4\"]',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'');

DROP TABLE IF EXISTS `activity_details`;
CREATE TABLE `activity_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `day_start` date NOT NULL,
  `day_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `term_year` int(11) NOT NULL,
  `term_sector` int(11) NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `term_year` (`term_year`,`term_sector`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `activity_details_ibfk_1` FOREIGN KEY (`term_year`, `term_sector`) REFERENCES `terms` (`year`, `sector`),
  CONSTRAINT `activity_details_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `activity_details_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `activity_details_ibfk_5` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `activity_details` (`id`, `activity_id`, `day_start`, `day_end`, `time_start`, `time_end`, `term_year`, `term_sector`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(54,	54,	'2019-03-10',	'2019-03-12',	'08:00:00',	'16:00:00',	2561,	1,	'อาคารเรียนรวม',	'2019-03-04 14:34:58',	56,	'2019-03-04 14:34:58',	56),
(55,	54,	'2019-03-04',	'2019-03-04',	'08:00:00',	'16:00:00',	2561,	3,	'เรียนรวม',	'2019-03-04 14:44:44',	56,	'2019-03-04 14:44:44',	56);

DROP TABLE IF EXISTS `albumactivity`;
CREATE TABLE `albumactivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `albumName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `albumactivitydetail`;
CREATE TABLE `albumactivitydetail` (
  `id` int(11) NOT NULL,
  `albumID` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `name_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `checking`;
CREATE TABLE `checking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `checking` (`id`, `activityID`, `userID`, `status`) VALUES
(3,	42,	31,	1),
(4,	43,	31,	1),
(5,	44,	31,	1),
(6,	46,	31,	1),
(7,	47,	31,	1);

DROP TABLE IF EXISTS `participation`;
CREATE TABLE `participation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `participations`;
CREATE TABLE `participations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_detail_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `activity_detail_id` (`activity_detail_id`),
  CONSTRAINT `participations_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `participations_ibfk_4` FOREIGN KEY (`activity_detail_id`) REFERENCES `activity_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `participations` (`id`, `activity_detail_id`, `student_id`) VALUES
(359,	54,	58112418),
(360,	54,	58112970),
(361,	54,	58113341),
(362,	54,	58120379),
(363,	54,	58122516),
(364,	54,	58141623),
(365,	54,	58142753),
(366,	54,	58143033),
(367,	54,	58145236),
(368,	55,	58112418),
(369,	55,	58112970),
(370,	55,	58113341),
(371,	55,	58120379),
(372,	55,	58122516),
(373,	55,	58141623),
(374,	55,	58142753),
(375,	55,	58143033),
(376,	55,	58145236);

DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'นักวิชาการ',	'2019-01-09 23:04:35',	'2019-01-24 19:45:47'),
(2,	'อาจารย์',	'2019-01-24 19:45:32',	'2019-01-24 19:45:32'),
(3,	'ประธานหลักสูตร',	'2019-01-09 23:05:16',	'2019-01-09 23:05:20');

DROP TABLE IF EXISTS `rank_checks`;
CREATE TABLE `rank_checks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participation_id` int(11) NOT NULL,
  `date_check` date NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `participation_id` (`participation_id`),
  CONSTRAINT `rank_checks_ibfk_3` FOREIGN KEY (`participation_id`) REFERENCES `participations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `rank_checks` (`id`, `participation_id`, `date_check`, `time`, `status`) VALUES
(811,	359,	'2019-03-10',	'เช้า',	0),
(812,	359,	'2019-03-10',	'บ่าย',	0),
(813,	359,	'2019-03-11',	'เช้า',	0),
(814,	359,	'2019-03-11',	'บ่าย',	0),
(815,	359,	'2019-03-12',	'เช้า',	0),
(816,	359,	'2019-03-12',	'บ่าย',	0),
(817,	360,	'2019-03-10',	'เช้า',	0),
(818,	360,	'2019-03-10',	'บ่าย',	0),
(819,	360,	'2019-03-11',	'เช้า',	0),
(820,	360,	'2019-03-11',	'บ่าย',	0),
(821,	360,	'2019-03-12',	'เช้า',	0),
(822,	360,	'2019-03-12',	'บ่าย',	0),
(823,	361,	'2019-03-10',	'เช้า',	0),
(824,	361,	'2019-03-10',	'บ่าย',	0),
(825,	361,	'2019-03-11',	'เช้า',	0),
(826,	361,	'2019-03-11',	'บ่าย',	0),
(827,	361,	'2019-03-12',	'เช้า',	0),
(828,	361,	'2019-03-12',	'บ่าย',	0),
(829,	362,	'2019-03-10',	'เช้า',	0),
(830,	362,	'2019-03-10',	'บ่าย',	0),
(831,	362,	'2019-03-11',	'เช้า',	0),
(832,	362,	'2019-03-11',	'บ่าย',	0),
(833,	362,	'2019-03-12',	'เช้า',	0),
(834,	362,	'2019-03-12',	'บ่าย',	0),
(835,	363,	'2019-03-10',	'เช้า',	0),
(836,	363,	'2019-03-10',	'บ่าย',	0),
(837,	363,	'2019-03-11',	'เช้า',	0),
(838,	363,	'2019-03-11',	'บ่าย',	0),
(839,	363,	'2019-03-12',	'เช้า',	0),
(840,	363,	'2019-03-12',	'บ่าย',	0),
(841,	364,	'2019-03-10',	'เช้า',	0),
(842,	364,	'2019-03-10',	'บ่าย',	0),
(843,	364,	'2019-03-11',	'เช้า',	0),
(844,	364,	'2019-03-11',	'บ่าย',	0),
(845,	364,	'2019-03-12',	'เช้า',	0),
(846,	364,	'2019-03-12',	'บ่าย',	0),
(847,	365,	'2019-03-10',	'เช้า',	0),
(848,	365,	'2019-03-10',	'บ่าย',	0),
(849,	365,	'2019-03-11',	'เช้า',	0),
(850,	365,	'2019-03-11',	'บ่าย',	0),
(851,	365,	'2019-03-12',	'เช้า',	0),
(852,	365,	'2019-03-12',	'บ่าย',	0),
(853,	366,	'2019-03-10',	'เช้า',	0),
(854,	366,	'2019-03-10',	'บ่าย',	0),
(855,	366,	'2019-03-11',	'เช้า',	0),
(856,	366,	'2019-03-11',	'บ่าย',	0),
(857,	366,	'2019-03-12',	'เช้า',	0),
(858,	366,	'2019-03-12',	'บ่าย',	0),
(859,	367,	'2019-03-10',	'เช้า',	0),
(860,	367,	'2019-03-10',	'บ่าย',	0),
(861,	367,	'2019-03-11',	'เช้า',	0),
(862,	367,	'2019-03-11',	'บ่าย',	0),
(863,	367,	'2019-03-12',	'เช้า',	0),
(864,	367,	'2019-03-12',	'บ่าย',	0),
(865,	368,	'2019-03-04',	'เช้า',	1),
(866,	368,	'2019-03-04',	'บ่าย',	0),
(867,	369,	'2019-03-04',	'เช้า',	1),
(868,	369,	'2019-03-04',	'บ่าย',	0),
(869,	370,	'2019-03-04',	'เช้า',	1),
(870,	370,	'2019-03-04',	'บ่าย',	0),
(871,	371,	'2019-03-04',	'เช้า',	1),
(872,	371,	'2019-03-04',	'บ่าย',	0),
(873,	372,	'2019-03-04',	'เช้า',	1),
(874,	372,	'2019-03-04',	'บ่าย',	0),
(875,	373,	'2019-03-04',	'เช้า',	1),
(876,	373,	'2019-03-04',	'บ่าย',	0),
(877,	374,	'2019-03-04',	'เช้า',	1),
(878,	374,	'2019-03-04',	'บ่าย',	0),
(879,	375,	'2019-03-04',	'เช้า',	1),
(880,	375,	'2019-03-04',	'บ่าย',	0),
(881,	376,	'2019-03-04',	'เช้า',	1),
(882,	376,	'2019-03-04',	'บ่าย',	0);

DROP TABLE IF EXISTS `responsibilities`;
CREATE TABLE `responsibilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `activity_detail_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `activity_detail_id` (`activity_detail_id`),
  CONSTRAINT `responsibilities_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  CONSTRAINT `responsibilities_ibfk_3` FOREIGN KEY (`activity_detail_id`) REFERENCES `activity_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `responsibilities` (`id`, `teacher_id`, `activity_detail_id`) VALUES
(87,	9,	54),
(88,	12,	54),
(89,	9,	55);

DROP TABLE IF EXISTS `responsible`;
CREATE TABLE `responsible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `isAdmin` bit(1) NOT NULL,
  `isHeadTeacher` bit(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `name`, `isAdmin`, `isHeadTeacher`, `created_at`, `updated_at`) VALUES
(1,	'ผู้ดูแลระบบ',	CONV('1', 2, 10) + 0,	CONV('0', 2, 10) + 0,	'2019-01-09 23:03:53',	'2019-01-09 23:03:57'),
(2,	'อาจารย์',	CONV('0', 2, 10) + 0,	CONV('0', 2, 10) + 0,	'2019-01-09 23:04:10',	'2019-01-09 23:04:13'),
(3,	'ประธานหลักสูตร',	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'2019-01-24 20:24:54',	'2019-01-24 20:24:54');

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prefix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `students` (`id`, `user_id`, `prefix`, `firstname`, `lastname`, `image`, `year`, `tel`, `email`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(12345678,	50,	'นางสาว',	'สุดหล่อ',	'มากๆ',	NULL,	'2558',	NULL,	NULL,	'2019-01-26 23:52:08',	NULL,	'2019-03-04 15:18:40',	NULL),
(58112418,	34,	'นาย',	'ฉลองราช',	'ประสิทธิวงศ์',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:08:25',	NULL,	'2019-01-26 18:54:31',	NULL),
(58112970,	22,	'นางสาว',	'ชิดชนก',	' ยีสมัน',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:47:47',	NULL,	'2019-01-26 18:56:21',	NULL),
(58113341,	23,	'',	'ฏอฮีเราะฮ์',	'ฮูซัยนี',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:49:34',	NULL,	'2019-01-20 02:49:34',	NULL),
(58120379,	27,	'',	'วุฒิชัย',	'เพ็ชร์ทอง',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:54:22',	NULL,	'2019-01-20 02:54:22',	NULL),
(58122516,	11,	'',	'หฤษฎ์',	'คงทอง',	NULL,	'2558',	NULL,	NULL,	'2019-01-19 23:08:31',	NULL,	'2019-01-19 23:08:31',	NULL),
(58141623,	25,	'',	'ทัศวัฒน์',	'รัตนพันธ์',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:51:15',	NULL,	'2019-01-20 02:51:15',	NULL),
(58142753,	35,	'',	'ประภาพร',	'มั่งมี',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:09:18',	NULL,	'2019-01-20 03:09:18',	NULL),
(58143033,	32,	'',	'พงศธร',	'จันด้วง',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:02:54',	NULL,	'2019-01-20 03:02:54',	NULL),
(58145230,	51,	'นางสาว',	'สุดสวย',	'มาก',	NULL,	'2558',	NULL,	NULL,	'2019-01-27 01:50:36',	NULL,	'2019-01-27 01:50:36',	NULL),
(58145231,	49,	'',	'สุดสวย',	'ผิวอ่อน',	NULL,	'2558',	NULL,	NULL,	'2019-01-26 18:31:38',	NULL,	'2019-01-26 18:31:38',	NULL),
(58145236,	31,	'นางสาว',	'สุดารัตน์',	'ผิวอ่อน',	'avatar/31/20190405155119Lena-3(1).jpg',	'2558',	'0333345671',	'gmail2@gmail.com',	'2019-01-20 03:01:20',	NULL,	'2019-04-05 15:55:13',	NULL),
(58143900,	137,	'นาย',	'มูฮัมหมัดมะฮ์ดี',	'ราโอ๊ะ',	NULL,	'2558',	NULL,	NULL,	'2019-03-20 15:19:01',	NULL,	'2019-03-20 15:19:01',	NULL),
(58144239,	138,	'นาย',	'ลิขสิทธิ์',	'สุขชาญ',	NULL,	'2558',	NULL,	NULL,	'2019-03-20 15:21:56',	NULL,	'2019-03-20 15:21:56',	NULL),
(58144924,	139,	'นาย',	'ศุภณัฐ',	'คุ้มปิยะผล',	NULL,	'2558',	NULL,	NULL,	'2019-03-20 15:23:25',	NULL,	'2019-03-20 15:23:25',	NULL),
(58147406,	141,	'นาย',	'ธนากร',	'ลิ้มสกุล',	NULL,	'2558',	NULL,	NULL,	'2019-03-20 15:34:35',	NULL,	'2019-03-20 15:34:35',	NULL),
(58149840,	143,	'นางสาว',	'อลีฟ',	'รักไทรทอง',	NULL,	'2558',	NULL,	NULL,	'2019-03-20 15:35:35',	NULL,	'2019-03-20 15:35:35',	NULL),
(58162660,	144,	'นาย',	'สมศักดิ์',	'หมั่นถนอม',	NULL,	'2558',	NULL,	NULL,	'2019-03-20 15:36:01',	NULL,	'2019-03-20 15:36:01',	NULL),
(58162694,	145,	'นาย',	'สหรัฐ',	'รักดำ',	NULL,	'2558',	NULL,	NULL,	'2019-03-20 15:36:32',	NULL,	'2019-03-20 15:36:32',	NULL),
(59112557,	107,	'นาย',	'ชัยสิทธิ์',	'คุณาปกรณ์การ',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 13:56:04',	NULL,	'2019-03-20 13:56:04',	NULL),
(59113423,	108,	'นาย',	'ณัฐดนัย',	'จารย์โพธิ์',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 13:56:36',	NULL,	'2019-03-20 13:56:36',	NULL),
(59113589,	109,	'นาย',	'ณัฐพล',	'บุญสุวรรณ์',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 13:57:09',	NULL,	'2019-03-20 13:57:09',	NULL),
(59114462,	110,	'นาย',	'ธนวัฒน์',	'อุไรรัตน์',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 13:57:40',	NULL,	'2019-03-20 13:57:40',	NULL),
(59114819,	111,	'นางสาว',	'ธิดารัตน์',	'สุรัตวดี',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 13:58:22',	NULL,	'2019-03-20 13:58:22',	NULL),
(59119438,	112,	'นาย',	'ณัฐพงค์',	'ปริตรศิรประภา',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:01:19',	NULL,	'2019-03-20 14:01:19',	NULL),
(59119610,	113,	'นาย',	'วรวิบูล',	'ไกรแก้ว',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:01:52',	NULL,	'2019-03-20 14:01:52',	NULL),
(59119941,	114,	'นางสาว',	'วิชุตา',	'หมาดอะดำ',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:02:19',	NULL,	'2019-03-20 14:02:19',	NULL),
(59120535,	115,	'นางสาว',	'ศิริกัญญา',	'หัตถการ',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:04:32',	NULL,	'2019-03-20 14:04:32',	NULL),
(59121368,	116,	'นางสาว',	'สิดารัศมิ์',	'ขาวบาง',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:05:09',	NULL,	'2019-03-20 14:05:09',	NULL),
(59121970,	117,	'นางสาว',	'สุภาวดี',	'โพธิ์แป้น',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:05:46',	NULL,	'2019-03-20 14:05:46',	NULL),
(59123570,	118,	'นาย',	'อารีฟีน',	'กุลดี',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:06:41',	NULL,	'2019-03-20 14:06:41',	NULL),
(59141242,	119,	'นางสาว',	'ณกรตา',	'เปียทอง',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:07:11',	NULL,	'2019-03-20 14:07:11',	NULL),
(59142901,	120,	'นางสาว',	'พัฒนะศักดิ์',	'พิเศษศิลป์',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:07:57',	NULL,	'2019-03-20 14:07:57',	NULL),
(59145003,	121,	'นาย',	'อัสมาวี',	'ลาเตะ',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:08:29',	NULL,	'2019-03-20 14:08:29',	NULL),
(59145219,	122,	'นาย',	'เอกวิชญ์',	'จำนงจิต',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:17:12',	NULL,	'2019-03-20 14:17:12',	NULL),
(59147918,	123,	'นาย',	'ณัฐวุฒิ',	'ชูบัวทอง',	NULL,	'2559',	NULL,	NULL,	'2019-03-20 14:17:45',	NULL,	'2019-03-20 14:17:45',	NULL),
(60110673,	91,	'นางสาว',	'เก็จมณี',	'ทองใบ',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:22:22',	NULL,	'2019-03-20 13:22:22',	NULL),
(60110863,	92,	'นาย',	'คุณัชญ์',	'ทองมี',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:22:57',	NULL,	'2019-03-20 13:22:57',	NULL),
(60111465,	93,	'นาย',	'ชลธาร',	'แก้วเจริญ',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:27:26',	NULL,	'2019-03-20 13:27:26',	NULL),
(60112869,	94,	'นาย',	'ธีนพัฒน์',	'รัตนวงศ์',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:28:26',	NULL,	'2019-03-20 13:28:26',	NULL),
(60113008,	95,	'นาย',	'นฤเบศ',	'รีวรรณ',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:34:26',	NULL,	'2019-03-20 13:34:26',	NULL),
(60113479,	96,	'นาย',	'บุรินทร์',	'พันธ์ชาติ',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:35:46',	NULL,	'2019-03-20 13:35:46',	NULL),
(60113834,	97,	'นางสาว',	'ปัญญพัฒน์',	'เจือบุญ',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:36:23',	NULL,	'2019-03-20 13:36:23',	NULL),
(60114105,	98,	'นาย',	'พงศธร',	'รักทอง',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:38:19',	NULL,	'2019-03-20 13:38:19',	NULL),
(60140365,	99,	'นาย',	'กิตติพงษ์',	'ทูรย์ภานุประพันธ์',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:39:13',	NULL,	'2019-03-20 13:39:13',	NULL),
(60140852,	100,	'นางสาว',	'จุตติมาศ',	'มาลัย',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:41:31',	NULL,	'2019-03-20 13:41:31',	NULL),
(60141900,	101,	'นางสาว',	'ธัญวรัตน์',	'จินดา',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:41:58',	NULL,	'2019-03-20 13:41:58',	NULL),
(60144235,	102,	'นางสาว',	'ศิริรัตน์',	'วิชิตแย้ม',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:42:37',	NULL,	'2019-03-20 13:42:37',	NULL),
(60144730,	103,	'นาย',	'สุทธิพงษ์',	'จินตาแก้ว',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:43:08',	NULL,	'2019-03-20 13:43:08',	NULL),
(60144961,	104,	'นางสาว',	'เสาวรัตน์',	'ชวนดี',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:43:50',	NULL,	'2019-03-20 13:43:50',	NULL),
(60146313,	105,	'นาย',	'ชัชวาล',	'สุคนธปฏิภาค',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:44:22',	NULL,	'2019-03-20 13:44:22',	NULL),
(60191053,	106,	'นางสาว',	'อะวาฏิฟ',	'ยูโซ๊ะ',	NULL,	'2560',	NULL,	NULL,	'2019-03-20 13:44:56',	NULL,	'2019-03-20 13:44:56',	NULL),
(61101192,	67,	'นางสาว',	'จริยาวดี',	'เนียมนาค',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:50:18',	NULL,	'2019-03-18 13:50:18',	NULL),
(61101242,	68,	'นาย',	'จักรพงษ์',	'กระต่ายทอง',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:51:50',	NULL,	'2019-03-18 13:51:50',	NULL),
(61101655,	69,	'นางสาว',	'จุฑาภรณ์',	'พุ่มมณี',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:52:57',	NULL,	'2019-03-18 13:52:57',	NULL),
(61102299,	70,	'นาย',	'โชติวิชช์',	'วรเดช',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:54:20',	NULL,	'2019-03-18 13:54:20',	NULL),
(61103776,	71,	'นาย',	'ธิติพงศ์',	'ปุรินสุวรรณ',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:55:39',	NULL,	'2019-03-18 13:55:39',	NULL),
(61104139,	72,	'นาย',	'นลธวัช',	'แก้วจีน',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:56:34',	NULL,	'2019-03-18 13:56:34',	NULL),
(61105631,	73,	'นางสาว',	'ปิยมินทร์',	'ใจมา',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:57:43',	NULL,	'2019-03-18 13:57:43',	NULL),
(61105888,	74,	'นาย',	'พนมกร',	'มหาสวัสดิ์',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:59:08',	NULL,	'2019-03-18 13:59:08',	NULL),
(61107686,	75,	'นาย',	'วรเมธ',	'ขวัญนิมิตร',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 13:59:49',	NULL,	'2019-03-18 13:59:49',	NULL),
(61108262,	76,	'นางสาว',	'ศรินญา',	'คงเส้ง',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:00:47',	NULL,	'2019-03-18 14:00:47',	NULL),
(61108718,	77,	'นางสาว',	'สจีหัสสา',	'อินทรวิมล',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:01:44',	NULL,	'2019-03-18 14:01:44',	NULL),
(61111191,	78,	'นางสาว',	'จิราวรรณ',	'ช่วยแก้ว',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:02:57',	NULL,	'2019-03-18 14:02:57',	NULL),
(61111415,	79,	'นางสาว',	'ชุติมา',	'อนันตกูล',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:03:47',	NULL,	'2019-03-18 14:03:47',	NULL),
(61113239,	80,	'นาย',	'วิทวัส',	'ช่วยพนัง',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:04:33',	NULL,	'2019-03-18 14:04:33',	NULL),
(61113403,	81,	'นาย',	'ศิวกร',	'หนักแน่น',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:05:15',	NULL,	'2019-03-18 14:05:15',	NULL),
(61113619,	82,	'นาย',	'สิทธินนท์',	'เดิมหลิ่ม',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:05:55',	NULL,	'2019-03-18 14:05:55',	NULL),
(61113858,	83,	'นาย',	'สุวิจักขณ์',	'พิศสุพรรณ',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:07:18',	NULL,	'2019-03-18 14:07:18',	NULL),
(61115184,	84,	'นาย',	'ก่อกฤษฎิ์',	'อินทิศ',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:07:54',	NULL,	'2019-03-18 14:07:54',	NULL),
(61115267,	85,	'นางสาว',	'ชนิกานต์',	'พจมานพงศ์',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:08:41',	NULL,	'2019-03-18 14:08:41',	NULL),
(61116141,	86,	'นาย',	'ณธกร',	'จิระอรรคพงษ์',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:09:30',	NULL,	'2019-03-18 14:09:30',	NULL),
(61118717,	87,	'นาย',	'รัตธนาตย์',	'รัตนพันธุ์',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:13:06',	NULL,	'2019-03-18 14:13:06',	NULL),
(61120531,	88,	'นาย',	'ชุมพร',	'แก้วพิทักษ์',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:13:44',	NULL,	'2019-03-18 14:13:44',	NULL),
(61122685,	89,	'นางสาว',	'สัณห์สินี',	'รักเนียม',	NULL,	'2561',	NULL,	NULL,	'2019-03-18 14:14:19',	NULL,	'2019-03-18 14:14:19',	NULL);
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `prefix` text COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `position_id` (`position_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  CONSTRAINT `teachers_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `teachers` (`id`, `user_id`, `position_id`, `role_id`, `prefix`, `firstname`, `lastname`, `image`, `tel`, `email`, `room`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3,	40,	3,	1,	'อาจารย์ ดร.',	'กรัณรัตน์',	'ธรรมรักษ์',	'avatar/40/20190327101525oo8ek47klJG95I46Xl1-o.jpg',	'0123456789',	'karanrat@gmail.com',	'999',	'2019-01-24 21:46:44',	0,	'2019-03-27 10:15:25',	0),
(6,	53,	1,	1,	'นางสาว',	'admin',	'admin',	NULL,	'0925902070',	'admin@gmail.com',	'221039',	'2019-01-27 03:01:53',	0,	'2019-01-27 03:01:53',	0),
(7,	54,	2,	2,	'อาจารย์ ดร.',	'พุทธิพร',	'ธนธรรมเมธี',	'avatar/54/20190222104353worstcase.jpg',	'0123456888',	'puttiporn@gmail.com',	'123',	'2019-01-27 03:04:46',	0,	'2019-02-22 10:43:53',	0),
(8,	55,	2,	2,	'ผู้ช่วยศาสตราจารย์ ดร.',	'ฐิมาพร',	'แก้ว',	NULL,	'0852963147',	'thimaporn@gmail.com',	'1234',	'2019-01-27 03:10:24',	0,	'2019-01-27 03:10:24',	0),
(9,	56,	1,	1,	'อาจารย์',	'อาจารย์',	'อาจารย์',	NULL,	'0123456789',	'admin@gmail.com',	'123',	'2018-02-04 08:00:00',	0,	'2019-02-07 10:47:32',	0);

DROP TABLE IF EXISTS `terms`;
CREATE TABLE `terms` (
  `year` int(4) NOT NULL,
  `sector` int(1) NOT NULL,
  PRIMARY KEY (`year`,`sector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `terms` (`year`, `sector`) VALUES
(2558,	1),
(2558,	2),
(2558,	3),
(2559,	1),
(2559,	2),
(2559,	3),
(2560,	1),
(2560,	3),
(2561,	1),
(2561,	2),
(2561,	3);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(11,	'58122519',	'$2y$10$YS4BlqPJwGcxmGaJktXbket6kvqc87VLe/2hrZ692ApMtZmghH34a',	NULL,	'2019-01-20 02:16:11',	'',	'2019-01-20 02:08:44',	NULL),
(22,	'',	'$2y$10$z1jgJaJYCyASdYwYQwaTY.rE1WnAaKtgamrY5lGB13eZzKwHbh4Oq',	NULL,	'2019-01-26 18:56:26',	'',	'2019-01-26 18:56:26',	NULL),
(23,	'58113341',	'$2y$10$YQj0OYHm.KkkuskDVOdSfOAvU7YNCayQpDRw1n3brVozK01MsrezW',	NULL,	'2019-01-20 02:49:34',	'',	'2019-01-20 02:49:34',	NULL),
(25,	'58141623',	'$2y$10$hc2GQPUXjYR8E6eqzHbN6O7QEOoSizFtA2d8iEuzK7NhYYB.iZ8oi',	NULL,	'2019-01-20 02:51:15',	'',	'2019-01-20 02:51:15',	NULL),
(27,	'58120379',	'$2y$10$7hCHW00i.fghuhEuHOz39efvHSKQWEIn3TBrZvyjDRU75dsjwvqXO',	NULL,	'2019-01-20 02:54:21',	'',	'2019-01-20 02:54:21',	NULL),
(31,	'58145236',	'$2y$10$2tXCUnIvdMjXnD3rBB41oOOcIOt2n8t6gIyvF2/8H8QtEZKcsCNV2',	'TH2gKsX4LATB3Km3lXgmrkFQ1QNHSbiGiku0dSeCSj7IDrSUEoFXAlSaFwcO',	'2019-04-06 14:10:27',	'',	'2019-04-06 14:10:27',	NULL),
(32,	'58143033',	'$2y$10$bAUoKVrgiN2nIr/6FZINOub7zFin7j1qWeXgFn7II0hA0RM1oyoWa',	NULL,	'2019-01-20 03:02:54',	'',	'2019-01-20 03:02:54',	NULL),
(34,	'58112418',	'$2y$10$HmOWzuMF3mlOfNc8sa66/Oi6galXC/KxgEafnCjrop1F2WKXHWHA2',	NULL,	'2019-03-04 10:31:17',	'',	'2019-03-04 10:31:17',	NULL),
(35,	'58142753',	'$2y$10$gv8/9kUY0bPziyuxp5Q18eC3dXCptrPGaNJURei0LuDOy.JDE1mMe',	NULL,	'2019-01-20 03:09:18',	'',	'2019-01-20 03:09:18',	NULL),
(40,	'karanrat@gmail.com',	'$2y$10$bX6cl9nUXs7qycoVaRghK.S2zuUVRbbeKKLB5e1WQkrFXy7BkQN/O',	'krLkRlI2MpNvOfBEQYKWvahKn2S5oZ0aHeukcVCvEtSRJ0C3ZChqArFVWAPX',	'2019-04-06 15:31:55',	'',	'2019-04-06 15:31:55',	NULL),
(49,	'58145231',	'$2y$10$9AsN7HLALLWwrNWXhhRCm.Djlp0/zmabyULoIhJMT9kK9DXzGo9ey',	NULL,	'2019-01-26 18:31:37',	'',	'2019-01-26 18:31:37',	NULL),
(50,	'12345678',	'$2y$10$9H8mAWuNrE38nt9PnhYtx.uC2sLT7eRaAhZTIJ0q5H35q8ITy1jVG',	'gfP1zRXIWfZjtAmj95SrkTvffdNqNd5zcLowBJsRPtzlFTprBbYdIOZfYl1i',	'2019-03-04 14:20:57',	'',	'2019-03-04 14:20:57',	NULL),
(51,	'58145230',	'$2y$10$xsi/JOxRK64sEz8POVVIaOMh4XpPiNcx9TEvLxNt/DuPjin7EnNGu',	NULL,	'2019-01-27 01:50:36',	'',	'2019-01-27 01:50:36',	NULL),
(53,	'admin@gmail.com',	'$2y$10$ovIj56BNHRHIHP.ECtP6V.wC4Af/euYyMOdCOKMeYa7KjW1pyzNum',	NULL,	'2019-01-27 03:01:53',	'',	'2019-01-27 03:01:53',	NULL),
(54,	'puttiporn@gmail.com',	'$2y$10$9.NnZricA0FQ1O/MdPJe/.Vzkw6s4AJHE.irN7qPzv83LcQlEdRHK',	'gM0rYgGdN0QrXjxAOPtHVEpfz2OJcNBmMnANHhmL075vren8S51WSkuuEa0l',	'2019-03-07 10:19:18',	'',	'2019-03-07 10:19:18',	NULL),
(55,	'thimaporn@gmail.com',	'$2y$10$ouuYPr7Epyv/6UpIDLYoDO1r9J8gw0.P5Cnp72IDsCw5W0GDuJlSW',	NULL,	'2019-01-27 03:10:24',	'',	'2019-01-27 03:10:24',	NULL),
(56,	'admin@gmail.com',	'$2y$10$ObSqgbr/Cxk0Y8RddEvZg.U3uSTdJI/SZdlJlXP6tPuVdveNuhf4y',	'1234',	'2019-02-07 10:47:32',	'',	'2019-02-07 10:47:32',	NULL),
(67,	'61101192',	'$2y$10$JtL955mRwYQp40NmXZUVEevROCjykDm7n0kfZllVABLfVYMVNRxxC',	NULL,	'2019-03-18 13:50:18',	'',	'2019-03-18 13:50:18',	NULL),
(68,	'61101242',	'$2y$10$cJrNHlrQjUuDPSFmk594OeSz1xhWCuJuQMqVZt7t0MmdfszF6wnMG',	NULL,	'2019-03-18 13:51:50',	'',	'2019-03-18 13:51:50',	NULL),
(69,	'61101655',	'$2y$10$wgo7Fa6TNYMuEG2jjrHUuum29MeNMfbweQolGLcZDp2h/rIV/8qe6',	NULL,	'2019-03-18 13:52:57',	'',	'2019-03-18 13:52:57',	NULL),
(70,	'61102299',	'$2y$10$Fxci0rNfjrCG5CLriTkP.eqPfw2AW11RBT0a8MbQzfZqfxZNscqBC',	NULL,	'2019-03-18 13:54:20',	'',	'2019-03-18 13:54:20',	NULL),
(71,	'61103776',	'$2y$10$mZxJXB7mvuGf0h36uGX4zu8oXj3ZfPFthAtPL842snePX08eOtiXq',	NULL,	'2019-03-18 13:55:39',	'',	'2019-03-18 13:55:39',	NULL),
(72,	'61104139',	'$2y$10$zWzu.Z3xEgeXRgkakBG/r.vZXp0lUU/xJsbqrE5Wy5YKEy9GooBW2',	NULL,	'2019-03-18 13:56:34',	'',	'2019-03-18 13:56:34',	NULL),
(73,	'61105631',	'$2y$10$JldSiDgmo1ZqGUENSiZ4dOEbU3Ox/R9ks.X.Bx0J7Ob/BWGMIUyNa',	NULL,	'2019-03-18 13:57:42',	'',	'2019-03-18 13:57:42',	NULL),
(74,	'61105888',	'$2y$10$xHmKTIsUQFLBrUhWYxdOkO5Nnnj5yp54yHSDQlNT0y8OVB3rdiak2',	NULL,	'2019-03-18 13:59:08',	'',	'2019-03-18 13:59:08',	NULL),
(75,	'61107686',	'$2y$10$WaDw577JJ8kxslAkXfOMC.tMPYtE7jxn7WOM9UT8TfsxH6bxoGqBq',	NULL,	'2019-03-18 13:59:49',	'',	'2019-03-18 13:59:49',	NULL),
(76,	'61108262',	'$2y$10$xLZbNALchlZjGLZt1oqWDOcgSEtZv2ND/wM5qKxCS4sFFXa.WzAdq',	NULL,	'2019-03-18 14:00:47',	'',	'2019-03-18 14:00:47',	NULL),
(77,	'61108718',	'$2y$10$oEF6tAJgjQ.3stLskJhClOL4EUekljMsJRfT1f.eAuaANo9tdHafu',	NULL,	'2019-03-18 14:01:44',	'',	'2019-03-18 14:01:44',	NULL),
(78,	'61111191',	'$2y$10$mKn4aA9L6K6gkE0o5Fs66esRApC4S4TAzSUXofasVd1CIh5yTg9lO',	NULL,	'2019-03-18 14:02:57',	'',	'2019-03-18 14:02:57',	NULL),
(79,	'61111415',	'$2y$10$wy1D8uu1YkSy4eAxZp2H4.m8pccSscjKmvxFyANvE4lWtodKmhqY6',	NULL,	'2019-03-18 14:03:47',	'',	'2019-03-18 14:03:47',	NULL),
(80,	'61113239',	'$2y$10$xn97ll14PpetTXaCmxFlKe5oHxfqLSJ0ROWXQFWBL1hPuYk4xXUQ2',	NULL,	'2019-03-18 14:04:33',	'',	'2019-03-18 14:04:33',	NULL),
(81,	'61113403',	'$2y$10$ce2tsE29Lz.YundBEpsP3el2fkkjXMLsY3KWgVOBXRaXplPaymJxq',	NULL,	'2019-03-18 14:05:15',	'',	'2019-03-18 14:05:15',	NULL),
(82,	'61113619',	'$2y$10$WfWPoWCb6ZbUkohu.iS0j.GV/pK4QLTz28.hSr02NwUZprk8hWmtq',	NULL,	'2019-03-18 14:05:55',	'',	'2019-03-18 14:05:55',	NULL),
(83,	'61113858',	'$2y$10$7QC7nRpQjPW.NAKKT0hoaeP5tTtmaeM6H.USUkbYyMQUAISf2mZTK',	NULL,	'2019-03-18 14:07:18',	'',	'2019-03-18 14:07:18',	NULL),
(84,	'61115184',	'$2y$10$tDzf.E0MZ5fLcx4JUCOy0um8GDFLj2weGc7UvBKtyfPY.UK3lgJRK',	NULL,	'2019-03-18 14:07:54',	'',	'2019-03-18 14:07:54',	NULL),
(85,	'61115267',	'$2y$10$dgM/LgLnY0D/BqHO7WWfbeO.LE0MOd9XeZGmfeXniEkDSCxrFjUDq',	NULL,	'2019-03-18 14:08:41',	'',	'2019-03-18 14:08:41',	NULL),
(86,	'61116141',	'$2y$10$ujL4DZ/6w/49V.1/HVqUqOfYfJnSpi/kf0Au6K976kO.RSSVbhG7O',	NULL,	'2019-03-18 14:09:30',	'',	'2019-03-18 14:09:30',	NULL),
(87,	'61118717',	'$2y$10$kjix7E9g6YFtnAA2fMwCleaHRa9vynVi6Vl1W410Be0bmzuUW3YnG',	NULL,	'2019-03-18 14:13:06',	'',	'2019-03-18 14:13:06',	NULL),
(88,	'61120531',	'$2y$10$o/IZi3AMsZ8YMqtAcVYaVOwIciSId94CwCczhSV7HDR443ZAdMGra',	NULL,	'2019-03-18 14:13:44',	'',	'2019-03-18 14:13:44',	NULL),
(89,	'61122685',	'$2y$10$K9o4hhoWYoOwaHKAwZK4uupKoghRfdcBYAMtuE8SRQ49jPcgz5NjC',	NULL,	'2019-03-18 14:14:19',	'',	'2019-03-18 14:14:19',	NULL),
(91,	'60110673',	'$2y$10$PERC/7CiOi9FhN08sIkPLeBNL3rnjgUAirmG4UPKv1e/Hd4JXG3Pq',	NULL,	'2019-03-20 13:22:22',	'',	'2019-03-20 13:22:22',	NULL),
(92,	'60110863',	'$2y$10$gRtfBnkj9HM1LiuWoh6rK.zImEf3qR.njjDjFU34oS4T9ZzLUEtg2',	NULL,	'2019-03-20 13:22:57',	'',	'2019-03-20 13:22:57',	NULL),
(93,	'60111465',	'$2y$10$twdY0.SkdPec./9QA9YYT.rDQXkGDuYNxxcG9/6t2kgAYQI4oO3WC',	NULL,	'2019-03-20 13:27:26',	'',	'2019-03-20 13:27:26',	NULL),
(94,	'60112869',	'$2y$10$TEb709aAmWIZcSr7wihiGuxp/aLCQmaDVxgFBk3A0PQw85mlBBCoO',	NULL,	'2019-03-20 13:28:26',	'',	'2019-03-20 13:28:26',	NULL),
(95,	'60113008',	'$2y$10$edORuOhTWLBue0R5BT0McOSbtwPDAu3lcGSj7usYU2KFUhLITHj16',	NULL,	'2019-03-20 13:34:26',	'',	'2019-03-20 13:34:26',	NULL),
(96,	'60113479',	'$2y$10$ldSLlANzLIL7RGwwMQqgQecw3A/GGsbABcuev7tvxyxgShtWqS9Be',	NULL,	'2019-03-20 13:35:46',	'',	'2019-03-20 13:35:46',	NULL),
(97,	'60113834',	'$2y$10$hpsybBLnRIwVOmo5iGksTeoYjq6uc7URVs0N63QKLZneq2W.mEHsy',	NULL,	'2019-03-20 13:36:23',	'',	'2019-03-20 13:36:23',	NULL),
(98,	'60114105',	'$2y$10$YTX8Bv09W/IDmEOHvmgSOO7CayRnEtNU6KXQWjP2DIxd4d38vDu7K',	NULL,	'2019-03-20 13:38:19',	'',	'2019-03-20 13:38:19',	NULL),
(99,	'60140365',	'$2y$10$Hx31IIq20OXiHW9MciStOeCStVFs60j0s8tgGJcs..cHKHvuZE2R.',	NULL,	'2019-03-20 13:39:13',	'',	'2019-03-20 13:39:13',	NULL),
(100,	'60140852',	'$2y$10$.P4NGVpBVAytBrNRo3BoKOV3aWbzUxI9gCeUsb3/u0pygXH0dBl7G',	NULL,	'2019-03-20 13:41:31',	'',	'2019-03-20 13:41:31',	NULL),
(101,	'60141900',	'$2y$10$zGiAX0WbLmvSt57RePyo5.JXnKxaCV9Wg6ACr.XETsU/op/JtRh.S',	NULL,	'2019-03-20 13:41:58',	'',	'2019-03-20 13:41:58',	NULL),
(102,	'60144235',	'$2y$10$9QETjqZ64nvwlzVLyWLXEe540JdncbClm0n9wQpd0f2U37j3lqhOK',	NULL,	'2019-03-20 13:42:37',	'',	'2019-03-20 13:42:37',	NULL),
(103,	'60144730',	'$2y$10$TJhC/hIR3uevpjWynZYk.uuylDQAVoJa5vX72kHY1v5cs61A4aOd2',	NULL,	'2019-03-20 13:43:08',	'',	'2019-03-20 13:43:08',	NULL),
(104,	'60144961',	'$2y$10$7PnS5wh.DvRDq/tYoW4EKuNCsu3Q/CUei7QlVba9NI8PVUbrP/9/y',	NULL,	'2019-03-20 13:43:50',	'',	'2019-03-20 13:43:50',	NULL),
(105,	'60146313',	'$2y$10$u16ZmP9uEtPF1t0Z9vPZ.OZxQBvCKVLmHLg/oEK1vNy8XHZO7i2IG',	NULL,	'2019-03-20 13:44:22',	'',	'2019-03-20 13:44:22',	NULL),
(106,	'60191053',	'$2y$10$NqbT8fsU.oh/vlAG.33Quu/qVWXOFgqtIaQT2z4nq9VwB1T59n97.',	NULL,	'2019-03-20 13:44:56',	'',	'2019-03-20 13:44:56',	NULL),
(107,	'59112557',	'$2y$10$9.f7QusOIVq5H/qWz0Jdy.8E7eEvUxTxdIXHpe.u1VITuxapSmbd2',	NULL,	'2019-03-20 13:56:04',	'',	'2019-03-20 13:56:04',	NULL),
(108,	'59113423',	'$2y$10$9UygSPs2RwqJWm38hOGRN.nejTonMEKIuD29PJZ9sgFUox.gtpYR.',	NULL,	'2019-03-20 13:56:36',	'',	'2019-03-20 13:56:36',	NULL),
(109,	'59113589',	'$2y$10$kY5OzjzlE4QnG1UzI7yaaeI3HYoikoqO6f02p87u3c68YzC2FgfSS',	NULL,	'2019-03-20 13:57:09',	'',	'2019-03-20 13:57:09',	NULL),
(110,	'59114462',	'$2y$10$PzWQbc/VsXFnQkWW27UeaOKSIMYP3eUouZntmVXEE.5fqVrfdMSTG',	NULL,	'2019-03-20 13:57:40',	'',	'2019-03-20 13:57:40',	NULL),
(111,	'59114819',	'$2y$10$G4cYMS/w.nphNNGAYvqt.e8zkH6WWQkxCavfkRp7c/lDcUtkDmnbe',	NULL,	'2019-03-20 13:58:22',	'',	'2019-03-20 13:58:22',	NULL),
(112,	'59119438',	'$2y$10$1yVid4TqbgS4kECWlhahmO0cU3uiCeGPGVdtwoGdTXRosLjkJhxfi',	NULL,	'2019-03-20 14:01:19',	'',	'2019-03-20 14:01:19',	NULL),
(113,	'59119610',	'$2y$10$6GgzoDZcCnR8MxIEdnCGs.7W.sX.4Ey98U9nw/gRcnncVnL5qYSsC',	NULL,	'2019-03-20 14:01:52',	'',	'2019-03-20 14:01:52',	NULL),
(114,	'59119941',	'$2y$10$j.m7vtjWCpbad/WFM/iuZunXVkDK909/1xGYlssgQjFppaapZ.b2C',	NULL,	'2019-03-20 14:02:19',	'',	'2019-03-20 14:02:19',	NULL),
(115,	'59120535',	'$2y$10$uMKBJf92cbhSyQ1c3modAeNbr2oVeDSq6ViMTtebM/TvU/kpr7Pay',	NULL,	'2019-03-20 14:04:32',	'',	'2019-03-20 14:04:32',	NULL),
(116,	'59121368',	'$2y$10$qo3cV/n6EbTaq.HXgHFhqed2cEp4Id4lKcNMConR43DCcQRWK2WEG',	NULL,	'2019-03-20 14:05:09',	'',	'2019-03-20 14:05:09',	NULL),
(117,	'59121970',	'$2y$10$MR2owH3oGNr6qQa6Zg1MaufgPuBZrQTqUlyji7HTIjX/8lqNuWLUy',	NULL,	'2019-03-20 14:05:46',	'',	'2019-03-20 14:05:46',	NULL),
(118,	'59123570',	'$2y$10$Ojf06B2QpR0mMGXGlwLY1.pxf5PVAWSenB/EdhrjKMx0VGbJh8C8e',	NULL,	'2019-03-20 14:06:41',	'',	'2019-03-20 14:06:41',	NULL),
(119,	'59141242',	'$2y$10$yDOx1MS0P1.0OdAXHk31n.MDMqewry5kgpsfyVXNB.bPl5XwRMkeW',	NULL,	'2019-03-20 14:07:11',	'',	'2019-03-20 14:07:11',	NULL),
(120,	'59142901',	'$2y$10$FAoN.aXTo2RWSPVtnaRDxeJxeR8VBtHllvTDULXAe3rfV10hXURAa',	NULL,	'2019-03-20 14:07:56',	'',	'2019-03-20 14:07:56',	NULL),
(121,	'59145003',	'$2y$10$5m8V6Upy1FQqmdaXVIn10OT9PxlsgKgtBtHbTP6bxUn/kGi0ZgKhy',	NULL,	'2019-03-20 14:08:29',	'',	'2019-03-20 14:08:29',	NULL),
(122,	'59145219',	'$2y$10$qj7a8UAl6HMY86aUviQyyuOTrBXc3/cGap2fd/tYjkFHbYhUz.GPG',	NULL,	'2019-03-20 14:17:11',	'',	'2019-03-20 14:17:11',	NULL),
(123,	'59147918',	'$2y$10$ywApXZ49P95X5g.SxNLeZOw/FqCHIVn8C3B8j4g2KXIfWy2RjJxNG',	NULL,	'2019-03-20 14:17:44',	'',	'2019-03-20 14:17:44',	NULL),
(137,	'58143900',	'$2y$10$ObqGUXhBvN01JIJOFpjJ6O79JeycE2fMpdacGznr5Mm3m.HKJpB6K',	NULL,	'2019-03-20 15:19:01',	'',	'2019-03-20 15:19:01',	NULL),
(138,	'58144239',	'$2y$10$e6eT4A1kyezMObkY6LjN9.k77hp01/yfv.pH0c6/3saz6gs910OaK',	NULL,	'2019-03-20 15:21:56',	'',	'2019-03-20 15:21:56',	NULL),
(139,	'58144924',	'$2y$10$F42q9jdgMeUHvY7b2e9SAuWIilD2ejuEL2QAoALp/WOivGLjR.pwa',	NULL,	'2019-03-20 15:23:25',	'',	'2019-03-20 15:23:25',	NULL),
(141,	'58147406',	'$2y$10$CSj.RuMd37.8tvjxnjwHZ.cVk7R7Rrv0qnM82ksNCiBUjd5OkRr6O',	NULL,	'2019-03-20 15:34:35',	'',	'2019-03-20 15:34:35',	NULL),
(143,	'58149840',	'$2y$10$XYULxUeeHYh7ZMQp50A9XuySsdwPprq4Fr05kdzlBtlhZUQXwj9zi',	NULL,	'2019-03-20 15:35:35',	'',	'2019-03-20 15:35:35',	NULL),
(144,	'58162660',	'$2y$10$K53Suyg5IQXmOCfWh3P0MOQcnVPhD3lzVTymnR8fN3Gg3AmSOYnuK',	NULL,	'2019-03-20 15:36:01',	'',	'2019-03-20 15:36:01',	NULL),
(145,	'58162694',	'$2y$10$C43NLF8N3wQRy5chFa7vouqS9OnTrSoZpdGX5jMQruAp4lhowujci',	NULL,	'2019-03-20 15:36:32',	'',	'2019-03-20 15:36:32',	NULL);


-- 2019-04-08 04:18:26