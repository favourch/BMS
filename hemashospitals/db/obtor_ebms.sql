-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2014 at 07:35 AM
-- Server version: 5.1.73
-- PHP Version: 5.5.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `obtor_ebms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_resource_actions`
--

CREATE TABLE IF NOT EXISTS `tbl_application_resource_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(250) DEFAULT NULL,
  `action_alias` varchar(55) DEFAULT NULL,
  `application_resource_controller_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_application_resource_actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_resource_controllers`
--

CREATE TABLE IF NOT EXISTS `tbl_application_resource_controllers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_name` varchar(250) DEFAULT NULL,
  `controller_alias` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_application_resource_controllers`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

CREATE TABLE IF NOT EXISTS `tbl_branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '		',
  `name` varchar(45) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_branches`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `prefix` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_country`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '		',
  `name` varchar(45) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_department`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_region`
--

CREATE TABLE IF NOT EXISTS `tbl_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `prefix` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_region`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_system_log`
--

CREATE TABLE IF NOT EXISTS `tbl_system_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(50) DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  `log_action` enum('ADD_NEW','EDIT','DELETE','STATUS_CHANGED','NOTIFICATION','REMINDER') DEFAULT NULL,
  `log_action_date` datetime DEFAULT NULL,
  `log_message` text,
  `action_user_display_name` varchar(150) DEFAULT NULL,
  `action_user_id` int(11) DEFAULT NULL,
  `action_user_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_system_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_user_roles`
--

INSERT INTO `tbl_user_roles` (`id`, `role_name`) VALUES
(1, 'Administrator'),
(17, 'Human resources manager'),
(18, 'Financial manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role_permissions`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `allowed_resource_controller` varchar(250) DEFAULT NULL,
  `allowed_resource_action` varchar(250) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_user_role_permissions`
--

