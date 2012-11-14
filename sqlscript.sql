delimiter $$

CREATE DATABASE `una` /*!40100 DEFAULT CHARACTER SET latin1 */$$

delimiter $$

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projName` varchar(125) DEFAULT NULL,
  `projType` varchar(125) DEFAULT NULL,
  `projClass` varchar(125) DEFAULT NULL,
  `projPrinting` varchar(100) DEFAULT NULL,
  `projStatus` varchar(25) DEFAULT NULL,
  `projRush` varchar(3) DEFAULT NULL,
  `projUserID` varchar(3) DEFAULT NULL,
  `projUserID2` varchar(3) DEFAULT NULL,
  `reqID` varchar(10) DEFAULT NULL,
  `reqName` varchar(250) DEFAULT NULL,
  `reqEmail` varchar(250) DEFAULT NULL,
  `reqPhone` varchar(15) DEFAULT NULL,
  `dateComplete` date DEFAULT NULL,
  `dateRequested` date DEFAULT NULL,
  `dateProof1` date DEFAULT NULL,
  `dateDue` date DEFAULT NULL,
  `proofOut` varchar(3) DEFAULT NULL,
  `detailSize` varchar(25) DEFAULT NULL,
  `detailPages` varchar(4) DEFAULT NULL,
  `detailColorCover` varchar(25) DEFAULT NULL,
  `detailColorInside` varchar(25) DEFAULT NULL,
  `copyNeeded` varchar(3) DEFAULT NULL,
  `copySource` varchar(25) DEFAULT NULL,
  `copyReceived` varchar(3) DEFAULT NULL,
  `photographyNeeded` varchar(3) DEFAULT NULL,
  `photographySource` varchar(25) DEFAULT NULL,
  `photographyReceived` varchar(3) DEFAULT NULL,
  `homeArt` varchar(3) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `basicSearch` (`projName`,`reqID`,`reqName`,`reqEmail`,`reqPhone`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `requestors` (
  `requestors_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`requestors_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1$$

delimiter $$

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateTimeSlot` date NOT NULL,
  `numAllowed` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=384 DEFAULT CHARSET=utf8 COMMENT='Defines the schedule that will show up as options to registe'$$

delimiter $$

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scheduleId` int(11) NOT NULL,
  `lNum` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `class` varchar(150) NOT NULL,
  `regTime` datetime NOT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3407 DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `active` varchar(1) NOT NULL,
  `permission_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `job_type` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1$$

delimiter $$

CREATE TABLE `job_class` (
  `job_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_class_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`job_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1$$

delimiter $$

CREATE TABLE `distances` (
  `id_distance_class` int(11) NOT NULL AUTO_INCREMENT,
  `class_section` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_distance_class`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1$$

delimiter $$

CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1$$

