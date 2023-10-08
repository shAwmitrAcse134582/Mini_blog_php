-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 10:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practise`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `description`, `post_id`, `username`) VALUES
(14, 'Ami munna comment kortechi!!', 15, 'munna'),
(15, 'Ami valo nei!', 15, 'munna'),
(16, 'ami ke bhai?', 15, 'ashik763'),
(18, 'afdaf fdasf asdf adfdf adfadsf fddasfrtf ddf dasfasdf', 15, 'ashik763'),
(19, 'df fdf dtfrtf gfgfggsdf ', 15, 'ashik763'),
(20, 'adsf aadf as', 15, 'ashik763'),
(21, 'adf stfwergfgv fgfsd', 15, 'ashik763'),
(22, 'df adrtrfgg dsfsdadas ds', 15, 'ashik763'),
(23, 'fd afgdgdw tgfgfg', 15, 'ashik763'),
(24, 'first comment done!', 18, 'ashik763'),
(25, 'Amar nam ki?', 15, 'munna');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `description` text NOT NULL,
  `comment` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `title`, `time`, `description`, `comment`, `image`, `date`) VALUES
(15, 'munna', 'How Google Alters Search Queries to Get at Your Wallet!', '0000-00-00 00:00:00', '\r\nRECENTLY, A STARTLING piece of information came to light in the ongoing antitrust case against Google. During one employee’s testimony, a key exhibit momentarily flashed on a projector. In the mostly closed trial, spectators like myself have only a few seconds to scribble down the contents of exhibits shown during public questioning. Thus far, witnesses had dropped breadcrumbs hinting at the extent of Google’s drive to boost profits: a highly confidential effort called Project Mercury, urgent missives to “shake the sofa cushions” to generate more advertising revenue on the search engine results page (SERP), distressed emails about the sustained decline in the ad-triggering searches that generate most of Google’s money, recollections of how the executive team has long insisted that obscene corporate profit equals consumer good. Now, the projector screen showed an internal Google slide about changes to its search algorithm.\r\n\r\nI was attending the trial out of long-standing professional interest. I had previously battled Google’s legal team while at the Federal Trade Commission, and I advocated around the world for search engine competition as an executive for DuckDuckGo. I’m all too familiar with Google’s secret games and word play. With the trial practically in my backyard, I couldn’t stay away from the drama.', '', 'uploads/ab22.jpg', 1696453147),
(18, 'ashik763', 'Update done', '0000-00-00 00:00:00', '		checking update	', '', 'uploads/AG.jpg', 1696458924),
(20, 'ashik763', 'My first post', '0000-00-00 00:00:00', '				hello every one	', '', 'uploads/joker3.jpg', 1696493285);

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `title` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `email`, `password`) VALUES
('Nasim ', 'Nasim1', 'nasim@gmail.com', '01790'),
('Ashik Ghosh', 'ashik763', 'ashikghosh763@gmail.com', '123'),
('Munna Mia', 'munna', 'munna@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
