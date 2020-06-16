--
-- Table structure for table `nmc_special_offers`
--

DROP TABLE IF EXISTS `nmc_special_offers`;
CREATE TABLE IF NOT EXISTS `nmc_special_offers` (
  `recordID` int(10) NOT NULL,
  `recordTitle` varchar(100) default NULL,
  `recordYear` varchar(4) default NULL,
  `pubID` varchar(6) default NULL,
  `catID` varchar(6) default NULL,
  `recordPrice` decimal(4,2) default NULL,
  KEY `recordID` (`recordID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Insert data for table `nmc_special_offers`
--

INSERT INTO `nmc_special_offers` (`recordID`, `recordTitle`, `recordYear`, `pubID`, `catID`, `recordPrice`) VALUES
(663, 'All Good Men', '2000', 'a1', '20', '5.90'),
(681, 'Arabesque [Gut]', '2000', 'a1', '50', '7.80'),
(692, 'Best of 1990-2000', '2000', 'a1', '50', '6.90'),
(708, 'Casa Babylon', '2000', 'a1', '50', '4.20'),
(722, 'Complete 50''s Chess Recordings (2 of 2)', '2000', 'a6', '9', '3.90'),
(742, 'Dial Masters, Original Choice Takes, Disk 1 West Coast', '2000', 'a7', '27', '9.80'),
(747, 'Dirt Floor', '2000', 'a1', '50', '4.40'),
(748, 'Dog''s', '2000', 'a1', '49', '3.60'),
(749, 'Dose', '2000', 'a1', '50', '5.50'),
(750, 'Dream of 100 Nations', '2000', 'a1', '20', '7.10'),
(778, 'G major, Op. 9 no 3', '2000', 'a5', '12', '8.20'),
(814, 'Kate & Anna McGarrigle [Carthage]', '2000', 'a1', '21', '10.60'),
(842, 'Medieval Women'' Song', '2000', 'a1', '33', '5.50'),
(859, 'Nocturnes - Biret, Idil', '2000', 'a1', '29', '8.20'),
(870, 'Op. 2, No 1 A Major', '2000', 'a5', '12', '5.60'),
(888, 'Ray of Light [Japan Bonus CD]', '2000', 'a1', '50', '9.30'),
(904, 'Saint Dominic''s Preview', '2000', 'a1', '50', '4.30');
