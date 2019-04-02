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
(43,	'เก็บขยะ',	'ตามเก็บขยะในมหาวิทยาลัย',	'[\"1\",\"3\"]',	'2019-03-16',	'2019-03-23',	'08:00:00',	'10:30:00',	2,	2561,	'มหาวิทยาลัย',	NULL,	'[\"1\",\"3\"]',	'2018-12-06 22:39:19',	'',	'2018-12-06 22:39:56',	''),
(44,	'swe ติวน้อง',	'',	'[\"2\",\"4\"]',	'2019-04-01',	'2019-04-01',	'12:12:00',	'12:20:00',	2,	2562,	'รวม5',	NULL,	'[\"1\",\"3\"]',	'2018-12-07 12:13:22',	'',	'2018-12-07 12:13:22',	''),
(45,	'สอบโครงงาน',	'',	'[\"1\",\"2\",\"3\",\"4\",\"5\"]',	'1970-01-01',	'1970-01-01',	'13:00:00',	'17:00:00',	2,	2561,	'AD3501/SM Tower',	NULL,	'[\"1\"]',	'2018-12-11 11:04:02',	'',	'2018-12-11 11:05:33',	''),
(46,	'กิจกรรมรับน้อง',	'ทะเล',	'[\"1\",\"3\",\"4\"]',	'2019-02-04',	'2019-02-06',	'00:00:00',	'00:00:00',	0,	2563,	'ทะเล',	NULL,	'[\"1\",\"3\",\"4\"]',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	''),
(47,	'กิจกรรมรับน้อง2',	'น้ำตก',	'[\"1\",\"3\",\"4\"]',	'0000-00-00',	'0000-00-00',	'00:00:00',	'00:00:00',	2,	2564,	'น้ำตก',	NULL,	'[\"1\",\"3\",\"4\"]',	'0000-00-00 00:00:00',	'',	'0000-00-00 00:00:00',	'');

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
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `students` (`id`, `user_id`, `prefix`, `firstname`, `lastname`, `image`, `year`, `tel`, `email`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(12345678,	50,	'นางสาว',	'สุดหล่อ',	'มากๆ',	NULL,	'2558',	NULL,	NULL,	'2019-01-26 23:52:08',	NULL,	'2019-03-04 15:18:40',	NULL),
(58112418,	34,	'นาย',	'ฉลองราช',	'ประสิทธิวงศ์',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:08:25',	NULL,	'2019-01-26 18:54:31',	NULL),
(58112970,	22,	'นางสาว',	'ชิดชนก',	' ยีสมัน',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:47:47',	NULL,	'2019-01-26 18:56:21',	NULL),
(58113341,	23,	'',	'ฏอฮีเราะฮ์',	'ฮูซัยนี',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:49:34',	NULL,	'2019-01-20 02:49:34',	NULL),
(58120379,	27,	'',	'วุฒิชัย',	'เพ็ชร์ทอง',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:54:22',	NULL,	'2019-01-20 02:54:22',	NULL),
(58122516,	11,	'',	'หฤษฎ์',	'คงทอง',	NULL,	'2558',	NULL,	NULL,	'2019-01-19 23:08:31',	NULL,	'2019-01-19 23:08:31',	NULL),
(58140500,	24,	'',	'กิตปกรณ์',	'ทองเงิน',	NULL,	'2560',	NULL,	NULL,	'2019-01-20 02:50:33',	NULL,	'2019-01-20 02:50:33',	NULL),
(58141623,	25,	'',	'ทัศวัฒน์',	'รัตนพันธ์',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:51:15',	NULL,	'2019-01-20 02:51:15',	NULL),
(58142753,	35,	'',	'ประภาพร',	'มั่งมี',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:09:18',	NULL,	'2019-01-20 03:09:18',	NULL),
(58143033,	32,	'',	'พงศธร',	'จันด้วง',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:02:54',	NULL,	'2019-01-20 03:02:54',	NULL),
(58145230,	51,	'นางสาว',	'สุดสวย',	'มาก',	NULL,	'2558',	NULL,	NULL,	'2019-01-27 01:50:36',	NULL,	'2019-01-27 01:50:36',	NULL),
(58145231,	49,	'',	'สุดสวย',	'ผิวอ่อน',	NULL,	'2558',	NULL,	NULL,	'2019-01-26 18:31:38',	NULL,	'2019-01-26 18:31:38',	NULL),
(58145236,	31,	'นางสาว',	'สุดารัตน์',	'ผิวอ่อน',	'avatar/31/2019020813213438872283_1896761097057381_3144456994623062016_n.jpg',	'2558',	'0333345678',	'gmail@gmail.com',	'2019-01-20 03:01:20',	NULL,	'2019-03-01 14:29:05',	NULL),
(58148602,	33,	'',	'สิริพร',	'พุทธวิริยะ',	NULL,	'2559',	NULL,	NULL,	'2019-01-20 03:03:39',	NULL,	'2019-01-20 03:03:39',	NULL),
(77777777,	52,	'นางสาว',	'ก',	'ด',	NULL,	'2559',	NULL,	NULL,	'2019-01-27 01:52:24',	NULL,	'2019-01-27 01:52:24',	NULL);

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
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `teachers` (`id`, `user_id`, `position_id`, `role_id`, `prefix`, `firstname`, `lastname`, `image`, `tel`, `email`, `room`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3,	40,	3,	1,	'อาจารย์ ดร.',	'กรัณรัตน์',	'ธรรมรักษ์',	'avatar/40/20190213141508oo8ek47klJG95I46Xl1-o.jpg',	'0123456789',	'karanrat@gmail.com',	'999',	'2019-01-24 21:46:44',	0,	'2019-03-05 13:30:06',	0),
(6,	53,	1,	1,	'นางสาว',	'admin',	'admin',	NULL,	'0925902070',	'admin@gmail.com',	'221039',	'2019-01-27 03:01:53',	0,	'2019-01-27 03:01:53',	0),
(7,	54,	2,	2,	'อาจารย์ ดร.',	'พุทธิพร',	'ธนธรรมเมธี',	'avatar/54/20190222104353worstcase.jpg',	'0123456888',	'puttiporn@gmail.com',	'123',	'2019-01-27 03:04:46',	0,	'2019-02-22 10:43:53',	0),
(8,	55,	2,	2,	'ผู้ช่วยศาสตราจารย์ ดร.',	'ฐิมาพร',	'แก้ว',	NULL,	'0852963147',	'thimaporn@gmail.com',	'1234',	'2019-01-27 03:10:24',	0,	'2019-01-27 03:10:24',	0),
(9,	56,	1,	1,	'อาจารย์',	'อาจารย์',	'อาจารย์',	NULL,	'0123456789',	'admin@gmail.com',	'123',	'2018-02-04 08:00:00',	0,	'2019-02-07 10:47:32',	0);

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
(24,	'58140500',	'$2y$10$U9Qn.66XD4i2Q8bxejBrce/sCl2wvt3pSpLW5eUvwlpdl90M9Fdqa',	NULL,	'2019-01-20 02:50:33',	'',	'2019-01-20 02:50:33',	NULL),
(25,	'58141623',	'$2y$10$hc2GQPUXjYR8E6eqzHbN6O7QEOoSizFtA2d8iEuzK7NhYYB.iZ8oi',	NULL,	'2019-01-20 02:51:15',	'',	'2019-01-20 02:51:15',	NULL),
(27,	'58120379',	'$2y$10$7hCHW00i.fghuhEuHOz39efvHSKQWEIn3TBrZvyjDRU75dsjwvqXO',	NULL,	'2019-01-20 02:54:21',	'',	'2019-01-20 02:54:21',	NULL),
(31,	'58145236',	'$2y$10$XoIwwT0UnvxWA5ssUf283eSgxWYz3VSMNBLZFwd9poaJZ5O.vg7Iy',	'Wi9EdRxEXZ7Lliu4g417ZctqTtDDMusPm2Px6643daUTp1PJkgFJN7ucVgtS',	'2019-03-13 14:35:38',	'',	'2019-03-13 14:35:38',	NULL),
(32,	'58143033',	'$2y$10$bAUoKVrgiN2nIr/6FZINOub7zFin7j1qWeXgFn7II0hA0RM1oyoWa',	NULL,	'2019-01-20 03:02:54',	'',	'2019-01-20 03:02:54',	NULL),
(33,	'58148602',	'$2y$10$aMjdrrG5.P.SDwnXLyBAT.TRTnexVrIxyL3MJ8t1py1jwJj7Ixbji',	NULL,	'2019-01-20 03:03:39',	'',	'2019-01-20 03:03:39',	NULL),
(34,	'58112418',	'$2y$10$HmOWzuMF3mlOfNc8sa66/Oi6galXC/KxgEafnCjrop1F2WKXHWHA2',	NULL,	'2019-03-04 10:31:17',	'',	'2019-03-04 10:31:17',	NULL),
(35,	'58142753',	'$2y$10$gv8/9kUY0bPziyuxp5Q18eC3dXCptrPGaNJURei0LuDOy.JDE1mMe',	NULL,	'2019-01-20 03:09:18',	'',	'2019-01-20 03:09:18',	NULL),
(40,	'karanrat@gmail.com',	'$2y$10$DlNnYHkvt7ZeXXlEOSAdOOFkjClivrySg8vN9eSEGvwegKUjbMRPK',	'F6A7mfaEhyF1uVqOp7TwHgVMbvO5LQ6kmkEUMwA23dgrwS97HL8r5lF1WW7e',	'2019-03-11 10:30:56',	'',	'2019-03-11 10:30:56',	NULL),
(49,	'58145231',	'$2y$10$9AsN7HLALLWwrNWXhhRCm.Djlp0/zmabyULoIhJMT9kK9DXzGo9ey',	NULL,	'2019-01-26 18:31:37',	'',	'2019-01-26 18:31:37',	NULL),
(50,	'12345678',	'$2y$10$9H8mAWuNrE38nt9PnhYtx.uC2sLT7eRaAhZTIJ0q5H35q8ITy1jVG',	'gfP1zRXIWfZjtAmj95SrkTvffdNqNd5zcLowBJsRPtzlFTprBbYdIOZfYl1i',	'2019-03-04 14:20:57',	'',	'2019-03-04 14:20:57',	NULL),
(51,	'58145230',	'$2y$10$xsi/JOxRK64sEz8POVVIaOMh4XpPiNcx9TEvLxNt/DuPjin7EnNGu',	NULL,	'2019-01-27 01:50:36',	'',	'2019-01-27 01:50:36',	NULL),
(52,	'77777777',	'$2y$10$zds5OLUsAhiZhIj/2daxAOFOYKI0uvoYMGqjVXtvP9DJzbvj1D98W',	NULL,	'2019-01-27 01:52:24',	'',	'2019-01-27 01:52:24',	NULL),
(53,	'admin@gmail.com',	'$2y$10$ovIj56BNHRHIHP.ECtP6V.wC4Af/euYyMOdCOKMeYa7KjW1pyzNum',	NULL,	'2019-01-27 03:01:53',	'',	'2019-01-27 03:01:53',	NULL),
(54,	'puttiporn@gmail.com',	'$2y$10$9.NnZricA0FQ1O/MdPJe/.Vzkw6s4AJHE.irN7qPzv83LcQlEdRHK',	'gM0rYgGdN0QrXjxAOPtHVEpfz2OJcNBmMnANHhmL075vren8S51WSkuuEa0l',	'2019-03-07 10:19:18',	'',	'2019-03-07 10:19:18',	NULL),
(55,	'thimaporn@gmail.com',	'$2y$10$ouuYPr7Epyv/6UpIDLYoDO1r9J8gw0.P5Cnp72IDsCw5W0GDuJlSW',	NULL,	'2019-01-27 03:10:24',	'',	'2019-01-27 03:10:24',	NULL),
(56,	'admin@gmail.com',	'$2y$10$ObSqgbr/Cxk0Y8RddEvZg.U3uSTdJI/SZdlJlXP6tPuVdveNuhf4y',	'1234',	'2019-02-07 10:47:32',	'',	'2019-02-07 10:47:32',	NULL);

DROP TABLE IF EXISTS `users_bkkkkk`;
CREATE TABLE `users_bkkkkk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `remember_token` varchar(150) DEFAULT NULL,
  `code` varchar(150) DEFAULT NULL,
  `room_num` varchar(150) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  `positionID` int(11) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_bkkkkk` (`id`, `username`, `password`, `firstname`, `lastname`, `tel`, `email`, `image`, `created_at`, `updated_at`, `type`, `remember_token`, `code`, `room_num`, `roleID`, `positionID`, `year`) VALUES
(1,	'root',	'$2y$10$rYf5dHuXTtLpdTlKfkEOJOVqPTF4h1PlzWvYeo3BDmkKnBU/ZwjRO',	'Saharat ',	'Rakdam',	'0635404688',	'mail@mail.com',	'avatar/1/2019011310543019.PNG',	'2018-12-25 15:48:00',	'2019-01-13 13:32:58',	'student',	'0V132ZbyMKCHEMnf2Fd75kXZo3kTtOUFGbeqv5IZhaqSqSdKpyvsWHFjMua5',	'541102109102',	NULL,	NULL,	NULL,	'2561'),
(3,	'teach1',	'$2y$10$3vw4Hz5byW26Fsu99abhx.1WWl/7/bnx7e89Zaa81DTT4I3OjVqDe',	'teach1123',	'teach1',	'0888888881',	'nukdev021@gmail.com',	'avatar/3/2019011310512020.PNG',	'2019-01-10 21:45:56',	'2019-01-13 15:26:39',	'teach',	'4uo3rFwQGlVs1rAENIx2YmCgDOWkHhbjNB2nSlv2xHpSb1blBWClPh0msW1A',	NULL,	'202',	1,	1,	NULL),
(4,	'test1',	'$2y$10$/Zds5L0AqbgI3eghm81y6OdJNB190ITTV9.p1czurfqfSU0XtP.Qq',	'sadas',	'dsad',	'088888888',	'dasdasd@dasdas.com',	'avatar/4/2019011310421110.PNG',	'2019-01-13 10:42:11',	'2019-01-13 12:33:57',	'teach',	'mbtdzWfJ7qZ9Qf3rbrXhWDBA73e7JTsFNxfxMku17tMFAVBSJpqwNCywVJkk',	NULL,	'asdas',	2,	2,	NULL),
(5,	'teach2',	'$2y$10$K.E/n7LHn//tNAuOYYgV6..hkFbt7h8lsG2pVmvmfQH9BiL7LhZ46',	'ๅ/-ๅ',	'/-ๅ/-',	'0996717562',	'hawkandeagle5@gmail.com',	NULL,	'2019-01-13 11:56:03',	'2019-01-13 11:56:03',	'student',	NULL,	'541102109103',	NULL,	NULL,	NULL,	'2561'),
(6,	'58122516',	'$2y$10$YULtTcPT5tEby1CQYFHWWuUr1zR1xVrsqgvrfeVqwgC1rMJc/qX02',	NULL,	NULL,	NULL,	NULL,	NULL,	'2019-01-19 15:58:08',	'2019-01-19 15:58:08',	'student',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

-- 2019-03-13 14:59:06