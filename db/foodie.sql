-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for foodie
CREATE DATABASE IF NOT EXISTS `foodie` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `foodie`;

-- Dumping structure for table foodie.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_fname` varchar(45) DEFAULT NULL,
  `cust_lname` varchar(45) DEFAULT NULL,
  `cust_email` varchar(45) DEFAULT NULL,
  `cust_password` varchar(45) DEFAULT NULL,
  `cust_phone` varchar(15) DEFAULT NULL,
  `cust_photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table foodie.customerorders
CREATE TABLE IF NOT EXISTS `customerorders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_sn` varchar(30) NOT NULL,
  `orders_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `orders_status` enum('Pending','Ready','','') DEFAULT 'Pending',
  `orders_type` enum('Walk-in','Online','','') DEFAULT 'Online',
  `orders_amt` int(25) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT '1',
  PRIMARY KEY (`orders_id`),
  KEY `fok4_idx` (`cust_id`),
  KEY `fok16_idx` (`staff_id`),
  CONSTRAINT `fok16` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fok4` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table foodie.meal
CREATE TABLE IF NOT EXISTS `meal` (
  `meal_id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_name` varchar(45) DEFAULT NULL,
  `meal_description` varchar(100) NOT NULL,
  `meal_price` int(45) DEFAULT NULL,
  `mealcat_id` int(11) DEFAULT NULL,
  `meal_photo` varchar(150) NOT NULL,
  `meal_status` enum('0','1','','') NOT NULL DEFAULT '1',
  PRIMARY KEY (`meal_id`),
  KEY `fok2_idx` (`mealcat_id`),
  CONSTRAINT `fok2` FOREIGN KEY (`mealcat_id`) REFERENCES `mealcategory` (`mealcat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table foodie.mealcategory
CREATE TABLE IF NOT EXISTS `mealcategory` (
  `mealcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mealcat_list` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`mealcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table foodie.orderdetails
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orddetails_id` int(11) NOT NULL AUTO_INCREMENT,
  `orddetails_qty` int(11) DEFAULT NULL,
  `meal_id` int(11) DEFAULT NULL,
  `orders_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`orddetails_id`),
  KEY `fok5_idx` (`meal_id`),
  KEY `fok8_idx` (`orders_id`),
  CONSTRAINT `fok5` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`meal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fok8` FOREIGN KEY (`orders_id`) REFERENCES `customerorders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table foodie.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_amt` int(11) DEFAULT NULL,
  `payment_status` enum('pending','success','','') DEFAULT 'pending',
  `payment_method` enum('cash','bank','','') DEFAULT 'bank',
  `payment_trxref` int(20) NOT NULL,
  `orders_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk23` (`orders_id`),
  CONSTRAINT `fk23` FOREIGN KEY (`orders_id`) REFERENCES `customerorders` (`orders_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table foodie.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_fname` varchar(125) DEFAULT NULL,
  `staff_lname` varchar(50) NOT NULL,
  `staff_password` varchar(45) DEFAULT NULL,
  `staff_email` varchar(45) DEFAULT NULL,
  `staff_type` enum('admin','staff','','') DEFAULT NULL,
  `staff_photo` varchar(50) NOT NULL,
  `staff_phone` varchar(20) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
