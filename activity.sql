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
(42,	'swe ติวน้องasdzxc',	'',	'[\"1\"]',	'2018-12-10',	'2018-12-10',	'08:30:00',	'15:00:00',	2,	2560,	'ห้องเรียน 3310',	NULL,	'[\"1\",\"2\",\"3\",\"4\",\"5\"]',	'2018-12-06 22:32:36',	'',	'2018-12-13 14:43:25',	''),
(43,	'เก็บขยะ',	'ตามเก็บขยะในมหาวิทยาลัย',	'[\"1\",\"3\"]',	'1970-01-01',	'1970-01-01',	'08:00:00',	'10:30:00',	2,	2561,	'มหาวิทยาลัย',	NULL,	'[\"1\",\"3\"]',	'2018-12-06 22:39:19',	'',	'2018-12-06 22:39:56',	''),
(44,	'swe ติวน้อง',	'',	'[\"2\",\"4\"]',	'1970-01-01',	'1970-01-01',	'12:12:00',	'12:20:00',	2,	2562,	'รวม5',	NULL,	'[\"1\",\"3\"]',	'2018-12-07 12:13:22',	'',	'2018-12-07 12:13:22',	''),
(45,	'สอบโครงงาน',	'',	'[\"1\",\"2\",\"3\",\"4\",\"5\"]',	'1970-01-01',	'1970-01-01',	'13:00:00',	'17:00:00',	2,	2561,	'AD3501/SM Tower',	NULL,	'[\"1\"]',	'2018-12-11 11:04:02',	'',	'2018-12-11 11:05:33',	'');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4,	'setset',	'set',	'2018-11-21 15:37:42',	'',	'2018-11-21 15:37:42',	NULL),
(5,	'58122516',	'$2y$10$5LD.R8PHfpFJUlu/OgRwaeR6HaI78I77olAvdzoNRbHm4oo1Fhm.i',	'2018-12-25 17:06:35',	'',	'2018-12-06 23:22:57',	NULL),
(9,	'58112970',	'$2y$10$DfmoYdW8DxBRRc7yXO9sCeyeQ82s3aFXuH69RILVs4i3NkZAEr58a',	'2018-12-25 17:10:23',	'',	'2018-12-25 17:10:23',	NULL),
(10,	'58145236',	'$2y$10$6GJ5eGP2ewvqQxhAK1NcVubr3L8A7WYEWqGvGqiIB26wVhKpFDzOS',	'2018-12-25 17:13:28',	'',	'2018-12-25 17:13:28',	NULL);

-- 2018-12-25 10:14:21
