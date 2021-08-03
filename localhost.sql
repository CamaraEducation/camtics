-- Adminer 4.8.0 MySQL 5.5.5-10.3.30-MariaDB-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `desk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `desk`;

DROP TABLE IF EXISTS `agent`;
CREATE TABLE `agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `photo` int(11) NOT NULL,
  `logs` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` int(11) NOT NULL,
  `path` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` int(3) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `imap` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `smtp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `configs` (`id`, `name`, `value`) VALUES
(1,	'site',	'camtics'),
(2,	'sms_api',	'123456789'),
(3,	'sms_key',	'987654321');

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `branch` int(11) NOT NULL DEFAULT 0,
  `description` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `department` (`id`, `name`, `branch`, `description`) VALUES
(1,	'Sales',	0,	'the sales department'),
(2,	'Technical',	0,	'Technical Department'),
(3,	'General',	0,	'Other Department');

DROP TABLE IF EXISTS `organization`;
CREATE TABLE `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `short` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `agent` int(11) DEFAULT NULL,
  `urgency` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'open',
  `attachment` int(11) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `ticket` (`id`, `sender`, `branch`, `department`, `agent`, `urgency`, `subject`, `content`, `status`, `attachment`, `time`) VALUES
(1,	1,	1,	1,	NULL,	1,	'test',	'this is a test message',	'open',	0,	'2021-07-27 14:03:10'),
(2,	1,	1,	1,	NULL,	1,	'test',	'this is a test message',	'active',	0,	'2021-08-02 11:17:55'),
(3,	1,	1,	1,	NULL,	3,	'i',	'this is not 16 chars',	'closed',	0,	'2021-08-02 12:03:11'),
(4,	1,	1,	1,	NULL,	3,	'i',	'this is not 16 chars',	'open',	0,	'2021-08-02 12:03:14');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `organization` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `nin` int(20) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-08-03 15:12:01
