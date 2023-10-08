-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2023 at 03:15 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'ENTERTAINMENT', 'ENTERTAINMENT', '2022-12-13 17:26:13', '2023-10-08 02:34:03', 1),
(2, 'TECHNOLOGY', 'TECHNOLOGY', '2022-12-13 17:36:33', NULL, 1),
(3, 'LIFESTYLE', 'LIFESTYLE', '2022-12-13 17:36:50', NULL, 1),
(4, 'POLITICAL', 'POLITICAL', '2022-12-13 17:37:23', NULL, 1),
(5, 'SPORTS', 'SPORTS', '2022-12-13 17:37:48', NULL, 1),
(6, 'SPIRITUAL', 'SPIRITUAL', '2022-12-16 11:32:39', NULL, 1),
(7, 'International', 'Internatinal news', '2023-10-07 17:55:24', '2023-10-08 02:23:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

DROP TABLE IF EXISTS `tblcomments`;
CREATE TABLE IF NOT EXISTS `tblcomments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `postId` int DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `postId` (`postId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(3, 4, 'Sukarat Luitel', 'pabanlucky@gmail.com', 'this is a comment', '2023-10-08 02:58:21', 1),
(4, 4, 'Pabati Ghimire', 'paru.ghimire118@gmail.com', 'This is another comment', '2023-10-08 02:59:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

DROP TABLE IF EXISTS `tblposts`;
CREATE TABLE IF NOT EXISTS `tblposts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `PostTitle` longtext,
  `CategoryId` int DEFAULT NULL,
  `SubCategoryId` int DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL,
  `PostUrl` mediumtext,
  `PostImage` varchar(255) DEFAULT NULL,
  `likeCount` int DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `postcatid` (`CategoryId`),
  KEY `postsucatid` (`SubCategoryId`),
  KEY `subadmin` (`postedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `likeCount`, `postedBy`, `lastUpdatedBy`) VALUES
(1, 'Team India on top as Bangladesh two wickets away from getting bowled out', 5, 4, '<p>Team India were humbled 2-1 by a resurgent Bangladesh team in the three-match ODI series which the visitors managed to end on a high thanks to Ishan Kishanâ€™s record double century. The Indian cricket team will now want to switch gears to prepare themselves for red-ball cricket as the first Test against Bangladesh gets underway in Chattogram on Wednesday (December 14). India will resume on 278/6 on Day 2 of the first Test on Thursday (December 15).</p><p>The Indian side will be led by KL Rahul with regular skipper Rohit Sharma ruled out after dislocating his thumb in the second ODI against Bangladesh last week. Shubman Gill is expected to take Rohitâ€™s place at the top of the order alongside stand-in skipper Rahul.<br></p><p>Bangladesh, on the other hand, will be led by veteran all-rounder Shakib al Hasan with Tamim Iqbal missing both the ODI and the Test series with injury. The home side will have their task cut out against the world No. 2-ranked Test side India as they eye first-ever Test match win over them.</p><p>India have promised to play aggressive cricket, much like Englandâ€™s â€˜Bazballâ€™ model which has powered them to a Test series win over Babar Azamâ€™s Pakistan. India need win at least 5 of the next 6 upcoming Tests, which includes the next two Test matches against Bangladesh to assure them of a qualification spot in the World Test Championships final next year.</p><p>The Indian side is injury-hit with the likes of Mohammed Shami and Ravindra Jadeja also ruled out with injury apart from skipper Rohit. It will be interesting to see if Jaydev Unadkat will make a return to Test cricket after a gap of 12 years. Mohammed Siraj and Umesh Yadav will be expected the carry the pace-bowling load while Ravichandran Ashwin and Kuldeep Yadav will team up in the spin bowling department.</p><p>Check all the LIVE Scores and Updates from Day 1 of 1st Test between India and Bangladesh here.</p>', '2022-12-15 18:08:34', '2023-10-07 16:10:46', 0, 'Team-India-on-top-as-Bangladesh-two-wickets-away-from-getting-bowled-out', '1167610aa17b0813233fe82d99403e41.jpg', 14, 'admin', NULL),
(2, 'Creative Christmas gift ideas for kids', 3, 8, '<p>With Christmas, a few weeks from now, planning a gift for your kids can be a task quite challenging. Worry not! We have a few ideas for all the parents who are looking for those creative gifts to make their kids Xmas merry.<br></p><div><br></div><p>Being unprepared for Christmas is the very last thing you want. Start looking for presents now, or at the very least start thinking about ideas, rather than waiting until the last minute and this guide is your saviour.<br></p>', '2022-12-15 18:14:00', '2023-10-04 09:55:38', 1, 'Creative-Christmas-gift-ideas-for-kids', '646c8915fc1096c12b679108e7022df9.jpg', 17, 'admin', NULL),
(3, 'Petrol prices still high in your city? Centre blames THESE for costly fuel', 4, 9, '<p>The minister said, currently the petrol price in India is one of the lowest. He said the oil marketing companies together suffered losses of Rs 27,276 crore due to high prices of crude in international markets.</p><p><br></p><p>Six states - West Bengal, Tamil Nadu, Andhra Pradesh, Telengana, Kerala, and Jharkhand - have not reduced the VAT, he said amidst vocal protests by the opposition members. The minister said, currently the petrol price in India is one of the lowest.&nbsp;</p>', '2022-12-15 18:16:46', '2023-10-04 09:56:16', 1, 'Petrol-prices-still-high-in-your-city?-Centre-blames-THESE-for-costly-fuel', 'c1ae896415041d9173d4935145243c14.jpg', 12, 'admin', NULL),
(4, 'Lionel Messi to Kylian Mbappe: Race to FIFA World Cup 2022 Golden Boot, in PICS test', 5, 5, '<p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p>The FIFA World Cup 2022 final are set with Lionel Messis Argentina set to take on Kylian Mbappe France at the Lusail Stadium on Sunday (December 18). Messi and Mbappe, teammates at PSG, are also in the race to win the FIFA World Cup 2022 Golden Boot award as well. In these collection of pictures, we take a look at players in race to win Golden Boot award this year.</p><p><br></p>', '2022-12-15 18:22:51', '2023-10-08 02:19:09', 1, 'Lionel-Messi-to-Kylian-Mbappe:-Race-to-FIFA-World-Cup-2022-Golden-Boot,-in-PICS-test', '4106106a3b2ba2ec88bf3521b412dcbb.jpg', 5, 'admin', ''),
(5, 'Twitter suspends journalists from NYT, Washington Post and others covering Elon Musk: Report', 2, 11, 'The Washington Posts Drew Harwell, alongside other banned reporters, was able to participate in a Twitter Spaces audio session while under suspension, exposing a loophole in Twitter’s enforcement.\r\n\r\n\r\nTwitter Inc. suspended the accounts of upstart rival service Mastodon and several prominent journalists covering the social network’s billionaire owner Elon Musk.\r\n\r\nLate Thursday, reporters from publications including the Washington Post, the New York Times, Mashable and CNN were listed as blocked and their tweets were no longer visible, with the companys standard notice saying it suspends accounts that violate the Twitter rules.\r\n\r\nAlso affected was sports and political commentator Keith Olbermann. Musk said Olbermann will be subject to a 7-day suspension for doxxing. In a separate tweet, he alleged the suspended journalists had posted his exact real-time location, describing the information as basically assassination coordinates.', '2022-12-16 11:34:26', '2023-10-04 09:08:58', 1, 'Twitter-suspends-journalists-from-NYT,-Washington-Post-and-others-covering-Elon-Musk:-Report', 'd7c9faa1953eebd19b2ae47f7f201858.jpg', 11, 'admin', 'admin'),
(26, 'Ibrahimovic aims dig at players who joined Saudi Pro League', 5, NULL, 'Zlatan Ibrahimovic has taken aim at players who joined the Saudi Pro League last summer, questioning the motivations behind their moves to the Gulf state.\r\n\r\nCristiano Ronaldo\'s move to Al Nassr last January was the catalyst for a number of the game\'s biggest stars to join the league on huge contracts in recent months, including Neymar, Sadio Mané and N\'Golo Kanté.\r\n\r\n- Stream on ESPN+: LaLiga, Bundesliga, more (U.S.)\r\n- Saudi Arabia transfer tracker: Done deals, players linked\r\n\r\nIbrahimovic revealed he had offers from Saudi Arabia and China at the end of his career -- the Sweden great retired in June -- but rejected the advances over considerations of legacy.\r\n\r\n\"I had an offer also from China. I had an offer also from Saudi, but the situation is, what do you want?\" Ibrahimovic told Piers Morgan on the Uncensored show. \"What objectives do you have?\r\n\r\n\"I said before we started, like certain players need to finish their career on the big stage because that is the high end of your career.', '2023-10-07 17:43:10', '2023-10-08 01:56:45', 0, 'Ibrahimovic-aims-dig-at-players-who-joined-Saudi-Pro-League', '134166cbbb3aa78cb0865b8c0dff70e2.jpg', 1, 'subin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `AdminUserName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmailId` varchar(255) DEFAULT NULL,
  `userType` int DEFAULT NULL,
  `preferences` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `AdminUserName_2` (`AdminUserName`),
  KEY `AdminUserName` (`AdminUserName`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `userType`, `preferences`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', 'admin123', '', 1, 'SPORTS,POLITICAL', '2022-12-12 18:30:00', '2023-10-04 10:28:11'),
(2, 'subin', 'password', '', 0, 'SPORTS,POLITICAL', '2022-12-16 11:32:06', '2023-10-04 10:28:20'),
(5, 'sbu', 'password', NULL, 0, '', '2023-10-03 14:08:17', '2023-10-03 14:40:43'),
(6, 'parbati', 'asdsadasd', NULL, 0, '', '2023-10-03 14:11:04', NULL),
(9, 'saanvi', 'saanvi', NULL, 0, '', '2023-10-03 14:11:53', NULL),
(14, 'asdasd', 'asdasd', NULL, 0, '', '2023-10-03 14:23:26', NULL),
(16, 'tttt', 'ugkugjk', NULL, 0, '', '2023-10-03 14:27:25', NULL),
(18, 'terimakabhosda', 'asdasdsad', NULL, 0, '', '2023-10-03 14:28:09', NULL),
(20, 'makiaankh', 'sadsad', NULL, 0, '', '2023-10-03 14:28:25', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `tblposts` (`id`);

--
-- Constraints for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD CONSTRAINT `postcatid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`),
  ADD CONSTRAINT `postsucatid` FOREIGN KEY (`SubCategoryId`) REFERENCES `tblsubcategory` (`SubCategoryId`),
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`postedBy`) REFERENCES `tbluser` (`AdminUserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
