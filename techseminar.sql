-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2015 at 08:02 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techseminar`
--

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE IF NOT EXISTS `fileupload` (
  `uploadid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  KEY `uploadid` (`uploadid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`uploadid`, `userid`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 2),
(22, 2),
(23, 2),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loginstaus`
--

CREATE TABLE IF NOT EXISTS `loginstaus` (
  `userid` int(10) NOT NULL,
  `notimes` int(1) NOT NULL DEFAULT '0',
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginstaus`
--

INSERT INTO `loginstaus` (`userid`, `notimes`) VALUES
(1, 0),
(2, 0),
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gpassword` varchar(200) NOT NULL,
  `accountype` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `registertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `username`, `password`, `email`, `gpassword`, `accountype`, `active`, `registertime`) VALUES
(1, 'vijesh9845', '9845248892', 'vijesh@gmail.com', 'images/elephant.jpg,images/jaguar.jpg,images/snake.jpeg', 0, 0, '2015-04-08 07:09:38'),
(2, 'dhoni', '123456789', 'dhoni@gmail.com', 'images/bear.jpg,images/panther.jpg,images/tiger.jpg', 0, 0, '2015-04-09 15:14:50'),
(3, 'manusamvijesh', '123456789', 'sammanuvijesh@gmail.com', 'images/dog.jpg,images/penguin.jpg,images/snake.jpeg', 1, 0, '2015-04-23 03:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `uploaddetails`
--

CREATE TABLE IF NOT EXISTS `uploaddetails` (
  `uploadid` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(200) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `patternoption` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`uploadid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `uploaddetails`
--

INSERT INTO `uploaddetails` (`uploadid`, `filename`, `subject`, `patternoption`, `password`) VALUES
(3, 'hDSDSD.pptx', 'csea', 'pattern1', '152,-213.8125'),
(4, 'jDSDSD.pptx', 'csea', 'pattern1', '526,-279.8125'),
(5, 'Raspberrypi.pptx', 'csea', 'pattern1', '693,-17.8125'),
(6, 'Raspberryi.pptx', 'csea', 'pattern1', '283,86.1875'),
(7, 'apppx.pptx', 'csea', 'pattern1', '601,-29.833328247070312'),
(8, 'nngh.pptx', 'csea', 'pattern1', '545,83.16667175292969'),
(9, 'selectup.pptx', 'csea', 'pattern1', '524,306.1875'),
(10, 'celectup.pptx', 'csea', 'pattern1', '544,311.1875'),
(11, 'sdsdsaw.pptx', 'csea', 'pattern1', '601,200.1875'),
(12, 'ESIGMNA.pptx', 'csea', 'pattern1', '728,469'),
(13, 'dfdfdf.pptx', 'csea', 'pattern1', '469,329'),
(14, 'sddghksgfgdfdfh.pptx', 'csea', 'pattern1', '463,369'),
(15, 'sjdghksgfgdfdfh.pptx', 'csea', 'pattern1', '541,313'),
(16, 'sjdghjkksgfgdfdfh.pptx', 'csea', 'pattern1', '468,329'),
(17, 'bfdhbjfh.pptx', 'csea', 'pattern1', '407,149'),
(18, 'dfd.pptx', 'csea', 'pattern1', '325,192'),
(19, 'vsgvfdcgfs.pptx', 'csea', 'pattern1', '504,163'),
(20, 'Raspberryi2.pptx', 'csea', 'pattern1', '696,249'),
(21, 'gjhgjjjjfdijfij.pptx', 'csea', 'pattern2', 'images/orange-number-3-filled-48.png,images/orange-number-6-filled-48.png,images/orange-number-9-filled-48.png,images/orange-number-8-filled-48.png,images/orange-number-5-filled-48.png,images/orange-n'),
(22, 'hgg.pptx', 'csea', 'pattern2', 'images/orange-number-2-filled-48.png,images/orange-number-5-filled-48.png'),
(23, 'zzzzzzzz.pptx', 'csea', 'pattern2', 'images/orange-number-2-filled-48.png,images/orange-number-8-filled-48.png,images/orange-number-5-filled-48.png,images/orange-number-2-filled-48.png'),
(24, 'xxcx.pptx', 'csea', 'pattern1', '251,394,270,371,157,418'),
(25, 'sd.pptx', 'csea', 'pattern1', '524,305,546,312,469,331,483,332'),
(26, 'vijayfkdj.pptx', 'csea', 'pattern2', 'images/orange-number-1-filled-48.png,images/orange-number-9-filled-48.png,images/orange-number-8-filled-48.png,images/orange-number-7-filled-48.png,images/orange-number-6-filled-48.png,images/orange-n'),
(27, 'ds.pptx', 'csea', 'pattern2', 'images/orange-number-1-filled-48.png,images/orange-number-2-filled-48.png,images/orange-number-3-filled-48.png,images/orange-number-4-filled-48.png,images/orange-number-5-filled-48.png,images/orange-number-6-filled-48.png,images/orange-number-7-filled-48.png,images/orange-number-8-filled-48.png'),
(28, 'dsdsdsd.pptx', 'csea', 'pattern1', '470,330,480,331,524,307,547,314'),
(29, 'GoogleGlass.pptx', 'csea', 'pattern1', '503,162,522,158,408,148,422,146'),
(30, 'gfk.pptx', 'csea', 'pattern2', 'images/orange-number-9-filled-48.png,images/orange-number-8-filled-48.png,images/orange-number-6-filled-48.png,images/orange-number-5-filled-48.png,images/orange-number-3-filled-48.png,images/orange-number-2-filled-48.png,images/orange-number-1-filled-48.png,images/orange-number-4-filled-48.png'),
(31, 'horik.pptx', 'csea', 'pattern2', 'images/orange-number-3-filled-48.png,images/orange-number-6-filled-48.png,images/orange-number-9-filled-48.png,images/orange-number-2-filled-48.png,images/orange-number-5-filled-48.png,images/orange-number-8-filled-48.png,images/orange-number-1-filled-48.png,images/orange-number-4-filled-48.png'),
(32, 'dsdsddasfavvc.pptx', 'csea', 'pattern3', ''),
(33, 'xsxc.pptx', 'csea', 'pattern3', 'column-0row0,column-1row0,column-2row0,column-3row0,column-4row0,column-5row0,column-6row0,column-7row0'),
(34, 'dsdsdsdadacxxc.pptx', 'csea', 'pattern3', 'column-7row5,column-8row5,column-9row5,column-10row5,column-10row6,column-9row6,column-8row6,column-7row6'),
(35, 'gtyty.pptx', 'csea', 'pattern3', 'column-5row4,column-6row4,column-8row4,column-9row4,column-7row3,column-8row3,column-9row3,column-0row3'),
(36, 'gytytygvcvxvxcv.pptx', 'csea', 'pattern3', 'column-0row1,column-1row1,column-2row1,column-3row1,column-19row1,column-18row1,column-17row1,column-16row1'),
(37, 'xcxcxctrytyt.pptx', 'csea', 'pattern3', 'column-0row0,column-1row0,column-2row0,column-3row0,column-4row0,column-19row0,column-18row0,column-17row0'),
(38, 'xcdfdsfsfserfsfdsfds.pptx', 'csea', 'pattern3', 'column-0row0,column-1row0,column-2row0,column-3row0,column-4row0,column-19row0,column-18row0,column-17row0'),
(39, 'xzxzttttttt.pptx', 'csea', 'pattern3', 'column-0row0,column-1row0,column-2row0,column-3row0,column-4row0,column-5row0,column-6row0,column-7row0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD CONSTRAINT `fileupload_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `register` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fileupload_ibfk_4` FOREIGN KEY (`uploadid`) REFERENCES `uploaddetails` (`uploadid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loginstaus`
--
ALTER TABLE `loginstaus`
  ADD CONSTRAINT `loginstaus_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `register` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
