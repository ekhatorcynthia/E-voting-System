-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2015 at 08:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `Adminid` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(15) NOT NULL DEFAULT '''Electorate''',
  `Username` varchar(20) NOT NULL,
  `Password` int(10) NOT NULL,
  PRIMARY KEY (`Adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Adminid`, `Name`, `Username`, `Password`) VALUES
(1, '''Electorate''', 'Admin', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `presidential_votes`
--

CREATE TABLE IF NOT EXISTS `presidential_votes` (
  `cand_name` varchar(29) COLLATE latin1_bin NOT NULL,
  `party` enum('ASFC','SSFC') COLLATE latin1_bin NOT NULL DEFAULT 'ASFC',
  `pres_count` varchar(19) COLLATE latin1_bin NOT NULL DEFAULT '',
  `vote_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `presidential_votes`
--

INSERT INTO `presidential_votes` (`cand_name`, `party`, `pres_count`, `vote_date`) VALUES
('Ahmad Ahmad Sani', 'ASFC', '0', '2014-12-26 12:41:20'),
('Yusuf Hayatuddeen', 'SSFC', '0', '2014-12-26 12:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `social_attempt`
--

CREATE TABLE IF NOT EXISTS `social_attempt` (
  `Voters_id` int(10) NOT NULL AUTO_INCREMENT,
  `election_type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `attempt` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Voters_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `social_attempt`
--


-- --------------------------------------------------------

--
-- Table structure for table `sodirector_votes`
--

CREATE TABLE IF NOT EXISTS `sodirector_votes` (
  `cand_name` varchar(29) NOT NULL,
  `party` enum('ASFC','SSFC') NOT NULL,
  `social_count` varchar(19) NOT NULL,
  `vote_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sodirector_votes`
--

INSERT INTO `sodirector_votes` (`cand_name`, `party`, `social_count`, `vote_date`) VALUES
('Rabiu Umar', 'ASFC', '0', '2014-12-26 11:53:06'),
('Tijjani Mahmud Gazali', 'SSFC', '0', '2014-12-26 11:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `treasurer_votes`
--

CREATE TABLE IF NOT EXISTS `treasurer_votes` (
  `cand_name` varchar(30) NOT NULL,
  `party` enum('ASFC','SSFC') NOT NULL,
  `treasure_count` varchar(19) NOT NULL,
  `vote_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treasurer_votes`
--

INSERT INTO `treasurer_votes` (`cand_name`, `party`, `treasure_count`, `vote_date`) VALUES
('Salma Talba Alkali', 'ASFC', '0', '2014-12-28 16:11:30'),
('Mariya A.D Rufai', 'SSFC', '0', '2014-12-28 16:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `treasure_attempt`
--

CREATE TABLE IF NOT EXISTS `treasure_attempt` (
  `Voters_id` int(10) NOT NULL AUTO_INCREMENT,
  `election_type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `attempt` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Voters_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `treasure_attempt`
--


-- --------------------------------------------------------

--
-- Table structure for table `vice_president`
--

CREATE TABLE IF NOT EXISTS `vice_president` (
  `cand_name` varchar(22) COLLATE latin1_bin NOT NULL,
  `party` enum('ASFC','SSFC') COLLATE latin1_bin NOT NULL,
  `vice_count` varchar(9) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `vice_president`
--

INSERT INTO `vice_president` (`cand_name`, `party`, `vice_count`) VALUES
('Saifullahi Ibrahim', 'ASFC', '0'),
('Asiya AK Kura', 'SSFC', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vice_votes`
--

CREATE TABLE IF NOT EXISTS `vice_votes` (
  `Voters_id` int(10) NOT NULL AUTO_INCREMENT,
  `election_type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `attempt` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Voters_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vice_votes`
--


-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE IF NOT EXISTS `voter` (
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `Age` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `Address` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Student_id` varchar(15) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `state_nonindigene` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `faculty` varchar(40) NOT NULL,
  `level` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Voters_id` int(15) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Voters_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`First_name`, `Last_name`, `sex`, `Age`, `photo`, `Address`, `Student_id`, `country`, `state`, `state_nonindigene`, `phone`, `e_mail`, `faculty`, `level`, `username`, `Voters_id`) VALUES
('Farooq', 'Hayatuddeen', 'Male', '16', 'images/_;;)  Meemee Mousarh;;)df.jpg', 'University quaters', '45342334', 'Nigeria', 'ABIA', 'No', '08065445367', 'farooqhayat@yahoo.com', 'Information Technology', '500', 'faroooq', 24),
('Ibrahim', 'bakari', 'Male', '21', 'images/__chris-brown.jpg', 'nima', '14001301', 'nigeria', 'ADAMAWA', 'Kaduna', '0247004041', 'ibwalii@yahoo.com', 'information technology', '300', 'ibwalii', 26);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `Voters_id` int(10) NOT NULL AUTO_INCREMENT,
  `election_type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `attempt` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Voters_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `votes`
--

