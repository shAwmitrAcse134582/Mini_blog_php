-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 06:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `description`, `post_id`, `username`) VALUES
(30, 'good description', 15, 'kawshik'),
(31, 'good', 15, 'arnab'),
(32, 'good topic', 23, 'shawmitra'),
(33, 'good project', 24, 'shawmitra'),
(34, 'nice', 15, 'shawmitra');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `title`, `time`, `description`, `comment`, `image`, `date`) VALUES
(15, 'shawmitra', 'Health', '0000-00-00 00:00:00', 'In common usage and medicine, health, according to the World Health Organization, is \"a state of complete physical, mental and social well-being and not merely the absence of disease and infirmity\".[1] A variety of definitions have been used for different purposes over time. Health can be promoted by encouraging healthful activities, such as regular physical exercise and adequate sleep,[2] and by reducing or avoiding unhealthful activities or situations, such as smoking or excessive stress. Some factors affecting health are due to individual choices, such as whether to engage in a high-risk behavior, while others are due to structural causes, such as whether the society is arranged in a way that makes it easier or harder for people to get necessary healthcare services. Still, other factors are beyond both individual and group choices, such as genetic disorders.', '', 'uploads/health.jpg', 2023),
(23, 'shawmitra', 'java', '0000-00-00 00:00:00', 'Java is a widely used object-oriented programming language and software platform that runs on billions of devices, including notebook computers, mobile devices, gaming consoles, medical devices and many others. The rules and syntax of Java are based on the C and C++ languages.	', '', 'uploads/5d74e8c35c.png', 1696699440),
(24, 'arnab', 'css', '0000-00-00 00:00:00', 'CSS was developed by W3C (World Wide Web Consortium) in 1996 for a rather simple reason. HTML element was not designed to have tags that would help format the page. You were only supposed to write the markup for the web page.\r\n\r\nTags like <font> were introduced in HTML version 3.2, and it caused quite a lot of trouble for web developers. Due to the fact that web pages have different fonts, colored backgrounds, and multiple styles, it was a long, painful, and expensive process to rewrite the code. Thus, CSS was created by W3C to solve this problem.', '', 'uploads/cf5fe5b1d3.png', 1696700691),
(26, 'kawshik', 'computer', '0000-00-00 00:00:00', 'A computer is a machine that can be programmed to carry out sequences of arithmetic or logical operations (computation) automatically. Modern digital electronic computers can perform generic sets of operations known as programs. These programs enable computers to perform a wide range of tasks. A computer system is a nominally complete computer that includes the hardware, operating system (main software), and peripheral equipment needed and used for full operation. This term may also refer to a group of computers that are linked and function together, such as a computer network or computer cluster.', '', 'uploads/7fce8f40e8.jpg', 1696791883),
(27, 'kawshik', 'Education', '0000-00-00 00:00:00', 'Education is the transmission of knowledge, skills, and character traits. There are many debates about its precise definition, for example, about which aims it tries to achieve. A further issue is whether part of the meaning of education is that the change in the student is an improvement. Some researchers stress the role of critical thinking to distinguish education from indoctrination. These disagreements affect how to identify, measure, and improve forms of education. The term can also refer to the mental states and qualities of educated people. Additionally, it can mean the academic field studying education.', '', 'uploads/8606a6f164.png', 1696793102);

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `title` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `password`) VALUES
(1, 'Shawmitra Das Dwip', 'shawmitra', 'shawmitra@gmail.com', '01627869019', '123'),
(2, 'kawshik', 'kawshik', 'kawshik@gmail.com', '8057230409', '123'),
(3, 'Arnab Das', 'arnab', 'arnab@gmail.com', '0162786923', '123'),
(4, 'sajal', 'sajal', 'sajal@gmail.com', '0873987878', '123');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
