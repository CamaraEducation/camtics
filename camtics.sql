-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for desk
DROP DATABASE IF EXISTS `desk`;
CREATE DATABASE IF NOT EXISTS `desk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `desk`;

-- Dumping structure for table desk.agent
DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
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
  `logs` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table desk.agent: ~0 rows (approximately)
DELETE FROM `agent`;
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;

-- Dumping structure for table desk.attachment
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` int(11) NOT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table desk.attachment: ~0 rows (approximately)
DELETE FROM `attachment`;
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachment` ENABLE KEYS */;

-- Dumping structure for table desk.branch
DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` int(3) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `imap` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `country` text NOT NULL,
  `smtp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table desk.branch: ~2 rows (approximately)
DELETE FROM `branch`;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` (`id`, `name`, `code`, `phone`, `email`, `pass`, `imap`, `website`, `location`, `country`, `smtp`) VALUES
	(1, 'Camara Education Tanzania', 255, 0, 'tanzania@camara.or.tz', 'NULL', 'NULL', 'https://camara.or.tz', 'tz', 'Tanzania', 0),
	(2, 'Camara Education Ethiopia', 123, 0, 'ethiopia@camara.org', 'NULL', 'NULL', '', 'et', 'Ethiopia', 0);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;

-- Dumping structure for table desk.configs
DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table desk.configs: ~3 rows (approximately)
DELETE FROM `configs`;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` (`id`, `name`, `value`) VALUES
	(1, 'site', 'camtics'),
	(2, 'sms_api', '123456789'),
	(3, 'sms_key', '987654321');
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;

-- Dumping structure for table desk.department
DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `branch` int(11) NOT NULL DEFAULT '0',
  `description` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table desk.department: ~3 rows (approximately)
DELETE FROM `department`;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `name`, `branch`, `description`) VALUES
	(1, 'Sales', 0, 'the sales department'),
	(2, 'Technical', 0, 'Technical Department'),
	(3, 'General', 0, 'Other Department');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table desk.organization
DROP TABLE IF EXISTS `organization`;
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `short` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table desk.organization: ~0 rows (approximately)
DELETE FROM `organization`;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;

-- Dumping structure for table desk.ticket
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `agent` int(11) DEFAULT NULL,
  `urgency` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'open',
  `attachment` int(11) NOT NULL DEFAULT '0',
  `update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table desk.ticket: ~8 rows (approximately)
DELETE FROM `ticket`;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`id`, `sender`, `branch`, `department`, `agent`, `urgency`, `subject`, `content`, `status`, `attachment`, `update`, `time`) VALUES
	(1, 6, 1, 1, NULL, 1, 'test', 'this is a test message', 'closed', 0, '2021-08-10 15:00:51', '2021-07-27 14:03:10'),
	(2, 6, 1, 1, NULL, 1, 'no learning material', 'this is a test message', 'closed', 0, '2021-08-10 14:59:50', '2021-08-02 11:17:55'),
	(3, 6, 1, 1, NULL, 3, 'not booting', 'this is not 16 chars', 'active', 0, '2021-08-10 14:57:55', '2021-08-02 12:03:11'),
	(4, 6, 1, 1, NULL, 3, 'char test', 'this is not 16 chars', 'open', 0, '2021-08-10 14:24:36', '2021-08-02 12:03:14'),
	(5, 6, 1, 3, NULL, 1, 'Fetch Test', 'This is a ticket fetch test, trying to see and test the substring function', 'active', 0, '2021-08-10 14:58:15', '2021-08-07 07:53:12'),
	(6, 1, 1, 2, NULL, 3, 'Final Test', 'hello this is a test to test if ticket creation works', 'open', 0, NULL, '2021-08-10 14:10:50'),
	(7, 1, 1, 2, NULL, 3, 'new ticket', 'new ticket', 'open', 0, NULL, '2021-08-10 15:03:37'),
	(8, 6, 1, 2, NULL, 3, 'NEW TICKET NOW', 'JGFDJGJKFGJKFDJKFDJKFG', 'open', 0, NULL, '2021-08-10 15:06:23'),
	(9, 6, 1, 3, NULL, 2, 'KIOO KIMEVUNJIKA', 'LEO KIO KIMEVUNJIKA', 'open', 0, NULL, '2021-08-10 15:06:56');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Dumping structure for table desk.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `branch` int(11) DEFAULT NULL,
  `department` int(11) NOT NULL DEFAULT '0',
  `organization` int(11) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `hash` int(11) NOT NULL,
  `nin` int(20) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table desk.user: ~6 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `fname`, `mname`, `lname`, `username`, `phone`, `email`, `photo`, `branch`, `department`, `organization`, `pass`, `hash`, `nin`, `role`, `status`, `created`) VALUES
	(1, '', '', '', 'abdulbasit', '255682908805', 'abdulbasitrubeiyya@gmail.com', '', 0, 0, 0, '1e595917ca2e52830f7bb310ddb36254', 0, 0, 1, 0, '2021-08-07 13:19:10'),
	(2, '', '', '', 'dayani', '255123456789', 'dayanimbowe@camara.ie', '', 1, 0, 0, '1e595917ca2e52830f7bb310ddb36254', 0, 0, 2, 0, '2021-08-07 13:19:10'),
	(3, '', '', '', 'godfrey', '255234567891', 'godfrey@camara.ie', '', 1, 0, 0, '1e595917ca2e52830f7bb310ddb36254', 0, 0, 3, 0, '2021-08-07 13:19:10'),
	(4, '', '', '', 'shirima', '255345678912', 'shirima@camara.ie', '', 1, 0, 0, '1e595917ca2e52830f7bb310ddb36254', 0, 0, 4, 0, '2021-08-07 13:19:10'),
	(5, '', '', '', 'imelda', '255456789123', 'imelda@camara.ie', '', 1, 0, 0, '1e595917ca2e52830f7bb310ddb36254', 0, 0, 5, 0, '2021-08-07 13:19:10'),
	(6, '', '', '', 'bahati', '255567891235', 'bahati@camara.ie', '', 1, 0, 0, '1e595917ca2e52830f7bb310ddb36254', 0, 0, 0, 0, '2021-08-07 13:19:10');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
