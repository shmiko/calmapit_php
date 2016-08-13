-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2014 at 05:36 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social_startup`
--
CREATE DATABASE IF NOT EXISTS `social_startup` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `social_startup`;

-- --------------------------------------------------------

--
-- Table structure for table `comment_details`
--

CREATE TABLE IF NOT EXISTS `comment_details` (
  `comment_id` int(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_user`
--

CREATE TABLE IF NOT EXISTS `comment_user` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `date_time` varchar(150) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_desc` varchar(500) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_follower`
--

CREATE TABLE IF NOT EXISTS `event_follower` (
  `event_id` int(100) NOT NULL,
  `follower_id` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_photo`
--

CREATE TABLE IF NOT EXISTS `event_photo` (
  `photo_id` int(100) NOT NULL AUTO_INCREMENT,
  `event_id` int(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `added_by` int(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE IF NOT EXISTS `follower` (
  `user_id` int(100) NOT NULL,
  `follower_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE IF NOT EXISTS `following` (
  `user_id` int(100) NOT NULL,
  `following_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `user_id` int(100) NOT NULL,
  `friend_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `how_to_reach`
--

CREATE TABLE IF NOT EXISTS `how_to_reach` (
  `event_id` int(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE IF NOT EXISTS `invite` (
  `invited_friend` text NOT NULL,
  `friend_id` int(100) NOT NULL,
  `event_id` int(100) NOT NULL,
  `location` text NOT NULL,
  `invited_by` varchar(100) NOT NULL,
  PRIMARY KEY (`friend_id`),
  UNIQUE KEY `event_id` (`event_id`),
  UNIQUE KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(100) NOT NULL AUTO_INCREMENT,
  `event_id` int(100) NOT NULL,
  `added_by` int(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`photo_id`),
  UNIQUE KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE IF NOT EXISTS `profile_pic` (
  `user_id` int(100) NOT NULL,
  `pic_name` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hash` varchar(25) NOT NULL,
  `verify` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  FULLTEXT KEY `first_name` (`first_name`,`middle_name`,`last_name`,`email`,`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `job_designation` varchar(100) NOT NULL,
  `work_email` varchar(100) NOT NULL,
  `home_state` varchar(50) NOT NULL,
  `home_city` varchar(50) NOT NULL,
  `home_pincode` varchar(10) NOT NULL,
  `cur_state` varchar(50) NOT NULL,
  `cur_city` varchar(50) NOT NULL,
  `cur_pincode` varchar(10) NOT NULL,
  `personal_webpage` varchar(100) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `hobbies` varchar(250) NOT NULL,
  `fav_songs` varchar(500) NOT NULL,
  `fav_tv_series` varchar(250) NOT NULL,
  `fav_movies` varchar(250) NOT NULL,
  `fav_sports` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(100) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `added_by` text NOT NULL,
  `path` text NOT NULL,
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
