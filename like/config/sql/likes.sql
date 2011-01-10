-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 10, 2011 at 12:01 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `singularmen`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `likes`
-- 

CREATE TABLE `likes` (
  `id` int(11) NOT NULL auto_increment,
  `foreign_key` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `creator_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modifier_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
