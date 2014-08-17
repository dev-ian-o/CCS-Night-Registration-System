-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2014 at 05:58 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccsnight2014_registry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE IF NOT EXISTS `tbl_students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(8) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `section` varchar(10) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email_add` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `student_id`, `lastname`, `firstname`, `middlename`, `program`, `section`, `contact_no`, `email_add`) VALUES
(1, 'A1111476', 'Olinares', 'Ian', 'Ramos', 'BSIT', 'IV-BITSM', '09212344', 'iasdasd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets_students`
--

CREATE TABLE IF NOT EXISTS `tbl_tickets_students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_number` varchar(11) NOT NULL,
  `student_id` varchar(8) NOT NULL,
  `date_claimed` datetime NOT NULL,
  `party_time_in` datetime NOT NULL,
  `ticket_status` varchar(20) NOT NULL,
  `balance` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_tickets_students`
--

INSERT INTO `tbl_tickets_students` (`id`, `ticket_number`, `student_id`, `date_claimed`, `party_time_in`, `ticket_status`, `balance`) VALUES
(1, '', 'A1111476', '0000-00-00 00:00:00', '2014-08-15 17:56:20', 'PAID_WITHBALANCE', '190'),
(2, 'LIVIT-001', 'A1111555', '0000-00-00 00:00:00', '2014-08-15 15:51:05', 'PAID_WITHBALANCE', '280'),
(3, 'LIVIT-002', 'A1111aaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PAID_WITHBALANCE', '10'),
(4, 'LIVITUP-111', 'A1111111', '0000-00-00 00:00:00', '2014-08-15 15:51:54', 'PAID_WITHBALANCE', '100'),
(5, 'LIVITUP-222', 'A2222222', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PAID_FULL', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
