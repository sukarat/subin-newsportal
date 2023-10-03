-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 06:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'useradmin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
(1, 'Health', 'Healthy hunu parxa...'),
(2, 'Entertainment', 'Enjoy music films etc'),
(3, 'Sports', 'khelnu paro ni mitra'),
(4, 'Politics', 'Paisa lutne safe place'),
(6, 'Education', 'padnu parxa hai');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `photo`, `sub_category_id`) VALUES
(7, 'EG.5 now dominant COVID variant in US.', 'A new variant now makes up a plurality of COVID-19 cases in the United States, federal data shows.\r\n\r\nEG.5, an offshoot of the omicron variant and descendant of the XBB strain, has been circulating in the country since at least April. However, as of Aug. 5, it accounts for 17.3% of COVID infections, according to the Centers for Disease Control and Prevention.\r\n\r\nThis is an increase from the 1.1% of cases it was estimated to make up at the end of May, CDC data shows.\r\n\r\nIt comes as COVID hospitalizations tick up across the U.S., increasing 12.5% in the most recent week to a total of 9,056 hospitalizations, according to the federal health agency.\r\n\r\nMeanwhile, in the United Kingdom, EG.5.1, which falls under the EG.5 lineage, makes up an estimated 14.55% of cases, making it the second most common strain, according to the UK Health Security Agency.', 'http://localhost/newsportal/uploads/covid-testing.jpg', 3),
(8, 'What is Cancer?', 'Cancer is a disease in which some of the body’s cells grow uncontrollably and spread to other parts of the body. \r\n\r\nCancer can start almost anywhere in the human body, which is made up of trillions of cells. Normally, human cells grow and multiply (through a process called cell division) to form new cells as the body needs them. When cells grow old or become damaged, they die, and new cells take their place.\r\n\r\nSometimes this orderly process breaks down, and abnormal or damaged cells grow and multiply when they shouldn’t. These cells may form tumors, which are lumps of tissue. Tumors can be cancerous or not cancerous (benign). \r\n\r\nCancerous tumors spread into, or invade, nearby tissues and can travel to distant places in the body to form new tumors (a process called metastasis). Cancerous tumors may also be called malignant tumors. Many cancers form solid tumors, but cancers of the blood, such as leukemias, generally do not.\r\n\r\nBenign tumors do not spread into, or invade, nearby tissues. When removed, benign tumors usually don’t grow back, whereas cancerous tumors sometimes do. Benign tumors can sometimes be quite large, however. Some can cause serious symptoms or be life threatening, such as benign tumors in the brain.', 'http://localhost/newsportal/uploads/cancer.jpg', 9),
(9, 'Arab Club Champions Cup semi-final: Al-Nassr beat Al-Shorta', 'Cristiano Ronaldo opened the scoring for Al-Nassr with a stunning finish in the Arab Club Champions Cup quarter-finals.\r\n\r\nRonaldo scored a stunning goal against Raja CA\r\nConverted a left-footed shot\r\nAl-Nassr book Arab Club Champions Cup semi-final berth\r\nWHAT HAPPENED? The Portuguese star slammed home a brilliant first time shot with his instep after receiving a pass from Anderson Talisca just inside the box. Al-Nassr went on to score two more goals to beat reigning champions Raja CA 3-1 and book a berth in the Arab Club Champions Cup semi-finals.', 'http://localhost/newsportal/uploads/cr7.webp', 6),
(10, 'Nepal: Pakistan team to travel to India for Cricket World Cup 2023', 'athmandu: Close on the heels of the unwarranted and undiplomatic threat loaded statement made, July 26, 2023, by India’s Defense Minister Raj Nath Singh, in DRASS, Ladakh warning the nearest rival Pakistan that if need be “we can go to any extreme to maintain the honor and dignity of the country…if that includes crossing the Line of Control (LoC), we are ready to do that …if we are provoked and if the need arises we will cross the LoC”.\r\n\r\nThe highly aggressive and provocative account was taken prompt note by the Pakistan’s Foreign Office which responded with an equal and fitting announcement wherein it was stated that, “Pakistan is fully capable of defending itself against any aggression.”\r\n\r\nThe Pakistani rebuttal to India further stated that, “we counsel India to exercise utmost caution as its belligerent rhetoric is a threat to the regional peace and stability, and contributes to de-stabilizing the strategic environment in South Asia.”\r\n\r\nHowever, within a week or so of the verbal duel in between India and Pakistan, a sport event is going to happen right inside India that is expected to patch up the political differences that has marred the Indo-Pakistan ties.\r\nPakistan has given its positive nod to the sport event that is going to be held in India.', 'http://localhost/newsportal/uploads/cricket.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `description`, `category_id`) VALUES
(3, 'Covid 19', 'very risk', 1),
(5, 'Movies', 'Film ta hernai prxa..', 2),
(6, 'Football', 'Suiiiiiiii', 3),
(7, 'Cricket', 'Bat ka grip...', 3),
(9, 'Cancer', 'Do check in time.', 1),
(10, 'Music', 'Sunnu parxa ni ....', 2),
(11, 'National', 'Aafno desh ko', 4),
(12, 'International', 'Bideshi ko ni feri.', 4),
(13, 'Online System', 'Future ma hunu parxa.', 6),
(14, 'Physical Class', 'Memory create hunxa.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`user_id`, `username`, `category`, `score`) VALUES
(1, '', 'politics', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`sub_category_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
