-- Adminer 4.6.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `activity`;
CREATE DATABASE `activity` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `activity`;

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
(42,	'swe ติวน้องasdzxc',	'',	'[\"1\"]',	'2019-01-14',	'2019-01-22',	'08:30:00',	'15:00:00',	2,	2560,	'ห้องเรียน 3310',	NULL,	'[\"1\",\"2\",\"3\",\"4\",\"5\"]',	'2018-12-06 22:32:36',	'',	'2018-12-13 14:43:25',	''),
(43,	'เก็บขยะ',	'ตามเก็บขยะในมหาวิทยาลัย',	'[\"1\",\"3\"]',	'2019-01-16',	'2019-01-23',	'08:00:00',	'10:30:00',	2,	2561,	'มหาวิทยาลัย',	NULL,	'[\"1\",\"3\"]',	'2018-12-06 22:39:19',	'',	'2018-12-06 22:39:56',	''),
(44,	'swe ติวน้อง',	'',	'[\"2\",\"4\"]',	'1970-01-01',	'1970-01-01',	'12:12:00',	'12:20:00',	2,	2562,	'รวม5',	NULL,	'[\"1\",\"3\"]',	'2018-12-07 12:13:22',	'',	'2018-12-07 12:13:22',	''),
(45,	'สอบโครงงาน',	'',	'[\"1\",\"2\",\"3\",\"4\",\"5\"]',	'1970-01-01',	'1970-01-01',	'13:00:00',	'17:00:00',	2,	2561,	'AD3501/SM Tower',	NULL,	'[\"1\"]',	'2018-12-11 11:04:02',	'',	'2018-12-11 11:05:33',	'');

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
(2,	42,	1,	1);

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
  KEY `user_id` (`user_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `students` (`id`, `user_id`, `prefix`, `firstname`, `lastname`, `image`, `year`, `tel`, `email`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(58112418,	34,	'',	'ฉลองราช',	'ประสิทธิวงศ์',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:08:25',	NULL,	'2019-01-20 03:08:25',	NULL),
(58112970,	22,	'',	'ชิดชนก',	' ยีสมัน',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:47:47',	NULL,	'2019-01-20 02:47:47',	NULL),
(58113341,	23,	'',	'ฏอฮีเราะฮ์',	'ฮูซัยนี',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:49:34',	NULL,	'2019-01-20 02:49:34',	NULL),
(58120379,	27,	'',	'วุฒิชัย',	'เพ็ชร์ทอง',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:54:22',	NULL,	'2019-01-20 02:54:22',	NULL),
(58122516,	11,	'',	'หฤษฎ์',	'คงทอง',	NULL,	'2558',	NULL,	NULL,	'2019-01-19 23:08:31',	NULL,	'2019-01-19 23:08:31',	NULL),
(58140500,	24,	'',	'กิตปกรณ์',	'ทองเงิน',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:50:33',	NULL,	'2019-01-20 02:50:33',	NULL),
(58141623,	25,	'',	'ทัศวัฒน์',	'รัตนพันธ์',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 02:51:15',	NULL,	'2019-01-20 02:51:15',	NULL),
(58142753,	35,	'',	'ประภาพร',	'มั่งมี',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:09:18',	NULL,	'2019-01-20 03:09:18',	NULL),
(58143033,	32,	'',	'พงศธร',	'จันด้วง',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:02:54',	NULL,	'2019-01-20 03:02:54',	NULL),
(58145236,	31,	'',	'สุดารัตน์',	'ผิวอ่อน',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:01:20',	NULL,	'2019-01-20 03:01:20',	NULL),
(58148602,	33,	'',	'สิริพร',	'พุทธวิริยะ',	NULL,	'2558',	NULL,	NULL,	'2019-01-20 03:03:39',	NULL,	'2019-01-20 03:03:39',	NULL),
(58222516,	37,	'',	'58222516',	'58222516',	NULL,	'5822',	NULL,	NULL,	'2019-01-20 03:53:40',	NULL,	'2019-01-20 03:53:40',	NULL);

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
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

INSERT INTO `teachers` (`id`, `user_id`, `position_id`, `role_id`, `firstname`, `lastname`, `image`, `tel`, `email`, `room`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3,	40,	2,	1,	'กรัณรัตน์',	'ธรรมรักษ์',	NULL,	'9811121212',	'ka@gmail.com',	'อาคารวิชาการ3',	'2019-01-24 21:46:44',	0,	'2019-01-24 21:46:44',	0),
(5,	42,	2,	2,	'พุทธิพร',	'ธนธรรมเมธี',	NULL,	'0988898889',	'h@hotmail.com',	'c4',	'2019-01-24 21:49:00',	0,	'2019-01-24 22:10:30',	0),
(7,	44,	1,	1,	'ฟ',	'asd',	NULL,	'ฟ',	's@s.com',	'ฟ',	'2019-01-24 22:16:16',	0,	'2019-01-24 22:16:16',	0);

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
(22,	'58112970',	'$2y$10$z1jgJaJYCyASdYwYQwaTY.rE1WnAaKtgamrY5lGB13eZzKwHbh4Oq',	NULL,	'2019-01-20 02:56:14',	'',	'2019-01-20 02:56:14',	NULL),
(23,	'58113341',	'$2y$10$YQj0OYHm.KkkuskDVOdSfOAvU7YNCayQpDRw1n3brVozK01MsrezW',	NULL,	'2019-01-20 02:49:34',	'',	'2019-01-20 02:49:34',	NULL),
(24,	'58140500',	'$2y$10$U9Qn.66XD4i2Q8bxejBrce/sCl2wvt3pSpLW5eUvwlpdl90M9Fdqa',	NULL,	'2019-01-20 02:50:33',	'',	'2019-01-20 02:50:33',	NULL),
(25,	'58141623',	'$2y$10$hc2GQPUXjYR8E6eqzHbN6O7QEOoSizFtA2d8iEuzK7NhYYB.iZ8oi',	NULL,	'2019-01-20 02:51:15',	'',	'2019-01-20 02:51:15',	NULL),
(27,	'58120379',	'$2y$10$7hCHW00i.fghuhEuHOz39efvHSKQWEIn3TBrZvyjDRU75dsjwvqXO',	NULL,	'2019-01-20 02:54:21',	'',	'2019-01-20 02:54:21',	NULL),
(31,	'58145236',	'$2y$10$XoIwwT0UnvxWA5ssUf283eSgxWYz3VSMNBLZFwd9poaJZ5O.vg7Iy',	'B469ckF35nqoYjJgj5ClHMq0NBd4BNN9mlFfBHkoi09UIIu7PmfLHjzbkR6h',	'2019-01-25 00:40:15',	'',	'2019-01-25 00:40:15',	NULL),
(32,	'58143033',	'$2y$10$bAUoKVrgiN2nIr/6FZINOub7zFin7j1qWeXgFn7II0hA0RM1oyoWa',	NULL,	'2019-01-20 03:02:54',	'',	'2019-01-20 03:02:54',	NULL),
(33,	'58148602',	'$2y$10$aMjdrrG5.P.SDwnXLyBAT.TRTnexVrIxyL3MJ8t1py1jwJj7Ixbji',	NULL,	'2019-01-20 03:03:39',	'',	'2019-01-20 03:03:39',	NULL),
(34,	'58112418',	'$2y$10$ZczyhQGcf4tEeObppttkKO9FwnifNshwE0u1FFJvEltO33EpBqRyK',	NULL,	'2019-01-24 21:14:00',	'',	'2019-01-23 15:33:40',	NULL),
(35,	'58142753',	'$2y$10$gv8/9kUY0bPziyuxp5Q18eC3dXCptrPGaNJURei0LuDOy.JDE1mMe',	NULL,	'2019-01-20 03:09:18',	'',	'2019-01-20 03:09:18',	NULL),
(37,	'58222516',	'$2y$10$fyE6.77XnSMvr/aVcP/3zO1gD7eUZmeB56p7DZd4qf.U24bBT5Kbq',	NULL,	'2019-01-20 03:53:40',	'',	'2019-01-20 03:53:40',	NULL),
(40,	'ka@gmail.com',	'$2y$10$9.NnZricA0FQ1O/MdPJe/.Vzkw6s4AJHE.irN7qPzv83LcQlEdRHK',	'XFxKJmx3lIsSlggPmFr7L0wOLA5v3aiRZejBg6M9AqeHL8mpGdEm1VomHsQD',	'2019-01-25 00:28:07',	'',	'2019-01-25 00:28:07',	NULL),
(42,	'h@hotmail.com',	'$2y$10$rxaTv8pNzIRQtXPhT61Z4OVqqRrZ1kOW5xDMtfIcBA.r.KP.trP1a',	NULL,	'2019-01-24 21:49:00',	'',	'2019-01-24 21:49:00',	NULL),
(44,	's@s.com',	'$2y$10$ccFC7oSo99MbJKVQEhlR1OWDQfnlL26n4pB5H7e3VdhJTy.CBbfWK',	NULL,	'2019-01-24 22:16:15',	'',	'2019-01-24 22:16:15',	NULL);

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

-- 2019-01-24 18:12:40
