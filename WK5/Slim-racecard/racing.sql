-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2013 at 07:44 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `racing`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `trainer` varchar(60) NOT NULL,
  `jockey` varchar(40) NOT NULL,
  `owner` varchar(60) NOT NULL,
  `breeder` varchar(40) NOT NULL,
  `sire` varchar(40) NOT NULL,
  `dam` varchar(40) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `age` int(20) NOT NULL,
  `betting` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `name`, `trainer`, `jockey`, `owner`, `breeder`, `sire`, `dam`, `picture`, `age`, `betting`) VALUES
(1, 'BROWN BUTTERFLY', 'Kevin Pendergast', 'D E Hogan', 'John J Foley', 'Cheveley Park Stud', 'Medicean', 'Auspicious', 'brownbutterfly.png', 5, '2-1f'),
(2, 'REGAL POWER', 'Edward Lynam', 'R P Downey', 'Mrs S Power', 'Equine Breeding Ltd.', 'Royal Applause', 'Be My charm', 'regalpower.png', 4, '8-1'),
(3, 'EASTERN RULES', 'M Halford', 'Shane Foley', 'S Hales', 'Michael Woodlock & Seamus Kennedy', 'Golden Snake', 'Eastern Ember', 'easternrules.png', 5, '6-1'),
(4, 'RUMMAGING', 'M Halford', 'Conor Hoban', 'P E Newell', 'P Newell', 'Chineur', 'Roundabout Girl', 'rummaging.png', 5, '10-1'),
(5, 'CAPTAIN CULLEN', 'Gerard Keane', 'Dylan Robinson', 'Ms Lisa Sheridan', 'Pollards Stables', 'Strategic Prince', 'Missouri', 'captaincullen.png', 4, '15-2'),
(6, 'RAIN GOD', 'A P O'' Brien', 'Joseph O'' Brien', 'Michael Tabor & Derrick Smith & Mrs John Magnier', 'Eagle Holdings', 'Henrythenavigator', 'Lotta Dancing', 'raingod.png', 3, '7-1'),
(7, 'MONA BROWN', 'J S Bolger', 'Kevin Manning', 'Michael D Ryan', 'Michael G Daly', 'Dylan Thomas', 'Softly Thread', 'monabrown.png', 4, '12-1'),
(8, 'ENGIMA CODE', 'Damian Joseph English', 'Rory Cleary', 'Rory Cleary', 'Darley', 'Elusive Quality', 'Tempting Fate', 'enigmacode.png', 8, '13-2'),
(9, 'FOOT PERFECT', 'M Halford', 'Marc Monaghan', 'G W Robinson', 'G W Robinson', 'Footstepinthesand', 'Lupine', 'footperfect.png', 5, '10-1'),
(10, 'BETHANY BAY', 'John Patrick Shanahan', 'Tadhg O'' Shea', 'Thistle Bloodstock Ltd', 'Thistle Bloodstock Ltd', 'Dylan Thomas', 'Spinney', 'bethanybay.png', 3, '16-1'),
(11, 'LAKE GEORGE', 'James M Barrett', 'Dylan Robinson', 'P J Kavanagh', 'P J Kavanagh', 'Alkaadhem', 'Ballyronan Girl', 'lakegeorge.png', 5, '11-1'),
(12, 'MEASURED APPROVAL', 'Patrick J Flynn', 'Danny Grant', 'Paddy O Brien Racing Syndicate', 'Ms Louise Kelly', 'Acclamation', 'Measured Leap', 'measuredapproval.png', 5, '9-2');
