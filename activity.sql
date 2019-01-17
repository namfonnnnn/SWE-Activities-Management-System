-- Adminer 4.6.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('42', 'swe ติวน้องasdzxc', '', '[\"1\"]', '2019-01-14', '2019-01-22', '08:30:00', '15:00:00', '2', '2560', 'ห้องเรียน 3310', null, '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '2018-12-06 22:32:36', '', '2018-12-13 14:43:25', '');
INSERT INTO `activity` VALUES ('43', 'เก็บขยะ', 'ตามเก็บขยะในมหาวิทยาลัย', '[\"1\",\"3\"]', '2019-01-16', '2019-01-23', '08:00:00', '10:30:00', '2', '2561', 'มหาวิทยาลัย', null, '[\"1\",\"3\"]', '2018-12-06 22:39:19', '', '2018-12-06 22:39:56', '');
INSERT INTO `activity` VALUES ('44', 'swe ติวน้อง', '', '[\"2\",\"4\"]', '1970-01-01', '1970-01-01', '12:12:00', '12:20:00', '2', '2562', 'รวม5', null, '[\"1\",\"3\"]', '2018-12-07 12:13:22', '', '2018-12-07 12:13:22', '');
INSERT INTO `activity` VALUES ('45', 'สอบโครงงาน', '', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '1970-01-01', '1970-01-01', '13:00:00', '17:00:00', '2', '2561', 'AD3501/SM Tower', null, '[\"1\"]', '2018-12-11 11:04:02', '', '2018-12-11 11:05:33', '');

-- ----------------------------
-- Table structure for `albumactivity`
-- ----------------------------
DROP TABLE IF EXISTS `albumactivity`;
CREATE TABLE `albumactivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `albumName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albumactivity
-- ----------------------------

-- ----------------------------
-- Table structure for `albumactivitydetail`
-- ----------------------------
DROP TABLE IF EXISTS `albumactivitydetail`;
CREATE TABLE `albumactivitydetail` (
  `id` int(11) NOT NULL,
  `albumID` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `name_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albumactivitydetail
-- ----------------------------

-- ----------------------------
-- Table structure for `checking`
-- ----------------------------
DROP TABLE IF EXISTS `checking`;
CREATE TABLE `checking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of checking
-- ----------------------------
INSERT INTO `checking` VALUES ('2', '42', '1', '1');

-- ----------------------------
-- Table structure for `participation`
-- ----------------------------
DROP TABLE IF EXISTS `participation`;
CREATE TABLE `participation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of participation
-- ----------------------------

-- ----------------------------
-- Table structure for `position`
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positionName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES ('1', 'teacher', '2019-01-09 23:04:35', '2019-01-09 23:04:37');
INSERT INTO `position` VALUES ('2', 'president', '2019-01-09 23:04:58', '2019-01-09 23:05:01');
INSERT INTO `position` VALUES ('3', 'professor', '2019-01-09 23:05:16', '2019-01-09 23:05:20');
INSERT INTO `position` VALUES ('4', 'schoolteacher', '2019-01-09 23:05:36', '2019-01-09 23:05:39');

-- ----------------------------
-- Table structure for `responsible`
-- ----------------------------
DROP TABLE IF EXISTS `responsible`;
CREATE TABLE `responsible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of responsible
-- ----------------------------

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'teacher', '2019-01-09 23:03:53', '2019-01-09 23:03:57');
INSERT INTO `role` VALUES ('2', 'admin', '2019-01-09 23:04:10', '2019-01-09 23:04:13');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'root'  , '$2y$10$rYf5dHuXTtLpdTlKfkEOJOVqPTF4h1PlzWvYeo3BDmkKnBU/ZwjRO', 'Saharat ', 'Rakdam', '0635404688', 'mail@mail.com', 'avatar/1/2019011310543019.PNG', '2018-12-25 15:48:00', '2019-01-13 13:32:58', 'student', '0V132ZbyMKCHEMnf2Fd75kXZo3kTtOUFGbeqv5IZhaqSqSdKpyvsWHFjMua5', '541102109102', null, null, null, '2561');
INSERT INTO `users` VALUES ('3', 'teach1', '$2y$10$3vw4Hz5byW26Fsu99abhx.1WWl/7/bnx7e89Zaa81DTT4I3OjVqDe', 'teach1123', 'teach1', '0888888881', 'nukdev021@gmail.com', 'avatar/3/2019011310512020.PNG', '2019-01-10 21:45:56', '2019-01-13 15:26:39', 'teach', '4uo3rFwQGlVs1rAENIx2YmCgDOWkHhbjNB2nSlv2xHpSb1blBWClPh0msW1A', null, '202', '1', '1', null);
INSERT INTO `users` VALUES ('4', 'test1' , '$2y$10$/Zds5L0AqbgI3eghm81y6OdJNB190ITTV9.p1czurfqfSU0XtP.Qq', 'sadas', 'dsad', '088888888', 'dasdasd@dasdas.com', 'avatar/4/2019011310421110.PNG', '2019-01-13 10:42:11', '2019-01-13 12:33:57', 'teach', 'mbtdzWfJ7qZ9Qf3rbrXhWDBA73e7JTsFNxfxMku17tMFAVBSJpqwNCywVJkk', null, 'asdas', '2', '2', null);
INSERT INTO `users` VALUES ('5', 'teach2', '$2y$10$K.E/n7LHn//tNAuOYYgV6..hkFbt7h8lsG2pVmvmfQH9BiL7LhZ46', 'ๅ/-ๅ', '/-ๅ/-', '0996717562', 'hawkandeagle5@gmail.com', null, '2019-01-13 11:56:03', '2019-01-13 11:56:03', 'student', null, '541102109103', null, null, null, '2561');

-- ----------------------------
-- Table structure for `users_bk`
-- ----------------------------
DROP TABLE IF EXISTS `users_bk`;
CREATE TABLE `users_bk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users_bk
-- ----------------------------
INSERT INTO `users_bk` VALUES ('4', 'setset', 'set', '2018-11-21 15:37:42', '', '2018-11-21 15:37:42', null);
INSERT INTO `users_bk` VALUES ('5', '58122516', '$2y$10$5LD.R8PHfpFJUlu/OgRwaeR6HaI78I77olAvdzoNRbHm4oo1Fhm.i', '2018-12-25 17:06:35', '', '2018-12-06 23:22:57', null);
INSERT INTO `users_bk` VALUES ('9', '58112970', '$2y$10$DfmoYdW8DxBRRc7yXO9sCeyeQ82s3aFXuH69RILVs4i3NkZAEr58a', '2018-12-25 17:10:23', '', '2018-12-25 17:10:23', null);
INSERT INTO `users_bk` VALUES ('10', '58145236', '$2y$10$6GJ5eGP2ewvqQxhAK1NcVubr3L8A7WYEWqGvGqiIB26wVhKpFDzOS', '2018-12-25 17:13:28', '', '2018-12-25 17:13:28', null);
