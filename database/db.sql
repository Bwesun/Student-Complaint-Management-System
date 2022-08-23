-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 24, 2020 at 12:39 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `contract`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(3) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`id`, `username`, `password`) VALUES 
(1, 'admin', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `credential`
-- 

CREATE TABLE `credential` (
  `id` int(3) NOT NULL auto_increment,
  `user_id` int(3) NOT NULL,
  `cred_name` varchar(100) NOT NULL,
  `cred` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `credential`
-- 

INSERT INTO `credential` (`id`, `user_id`, `cred_name`, `cred`) VALUES 
(5, 1, 'Birth Certificate', 'BeautyPlus_20190827172321_fast.jpg'),
(6, 1, 'Indegenship Certificate', 'ph-10021.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `jobapp`
-- 

CREATE TABLE `jobapp` (
  `app_id` int(3) NOT NULL auto_increment,
  `job_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `jn` varchar(100) NOT NULL,
  `cl` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `jobapp`
-- 

INSERT INTO `jobapp` (`app_id`, `job_id`, `user_id`, `jn`, `cl`, `name`) VALUES 
(5, 1, 1, 'Renovation of Complex', 'NILEST, Samaru, Zaria', 'Censono Corporation');

-- --------------------------------------------------------

-- 
-- Table structure for table `jobvacancy`
-- 

CREATE TABLE `jobvacancy` (
  `job_id` int(4) NOT NULL auto_increment,
  `jn` varchar(200) NOT NULL,
  `cl` varchar(100) NOT NULL,
  `jd` varchar(500) NOT NULL,
  PRIMARY KEY  (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `jobvacancy`
-- 

INSERT INTO `jobvacancy` (`job_id`, `jn`, `cl`, `jd`) VALUES 
(2, 'Complex Restructuring', 'NILEST Headquarters', 'Restructuring of NILEST Science Complex, Samaru, Zaria');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(4) NOT NULL auto_increment,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `foi` varchar(60) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `user` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `email`, `phone`, `address`, `foi`, `pass`, `name`, `user`) VALUES 
(1, 'maturinnocent@gmail.com', '08144529253', 'Jushi waaje, Near Gidan Sarkin noma, S/Gari, Zaria', '', 'innocent', 'Censono Corporation', 'innocent');
