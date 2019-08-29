-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 07:24 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orm`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `content`, `question_id`, `is_correct`) VALUES
(17, 'Marilyn Monroe', 5, 0),
(18, 'Stephen King', 5, 0),
(19, 'Dr. Suess', 5, 1),
(20, 'Mark Caine', 5, 0),
(21, 'John F. Kennedy', 6, 0),
(22, 'Herbert Bayard Swope', 6, 0),
(23, 'Audre Lorde', 6, 1),
(24, 'Eleanor Roosevelt', 6, 0),
(25, 'Thomas J. Watson', 7, 0),
(26, 'Herbert Bayard Swope', 7, 0),
(27, 'Mother Theresa', 7, 0),
(28, 'Eleanor Roosevelt', 7, 1),
(29, 'Theodore Roosevelt', 8, 1),
(30, 'Mother Theresa', 8, 0),
(31, 'Lucille Ball', 8, 0),
(32, 'Joshua J. Marine', 8, 0),
(33, 'Plato', 9, 0),
(34, 'Francis Chan', 9, 0),
(35, 'Theodore Roosevelt', 9, 0),
(36, 'Mother Theresa', 9, 1),
(37, 'H. Jackson Brown, Jr.', 10, 0),
(38, 'Plato', 10, 1),
(39, 'Leonardo Da Vinci', 10, 0),
(40, 'Francis Chan', 10, 0),
(41, 'Pablo Picasso', 11, 0),
(42, 'Leo Tolstoy', 11, 0),
(43, 'Thomas A. Edison', 11, 0),
(44, 'Leonardo Da Vinci', 11, 1),
(45, 'Albert Einstein', 12, 0),
(46, 'Thomas A. Edison', 12, 1),
(47, 'Dax Shepard', 12, 0),
(48, 'Elie Wiesel', 12, 0),
(49, 'Albert Einstein', 13, 0),
(50, 'Jim Morrison', 13, 0),
(51, 'Sigmund Freud', 13, 0),
(52, 'Elie Wiesel', 13, 1),
(53, 'Babe Ruth', 14, 1),
(54, 'Ray Bradbury', 14, 0),
(55, 'David Rockefeller', 14, 0),
(56, 'Ralph Waldo Emerson', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `is_correct`) VALUES
(5, 'You know you’re in love when you can’t fall asleep because reality is finally better than your dreams', 'Dr. Suess', 1),
(6, 'When I dare to be powerful – to use my strength in the service of my vision, then it becomes less and less important whether I am afraid.', 'Mark Twain', 0),
(7, 'Great minds discuss ideas; average minds discuss events; small minds discuss people.', 'Eleanor Roosevelt', 1),
(8, 'It is hard to fail, but it is worse never to have tried to succeed.', 'Abraham Lincoln', 0),
(9, 'Let us always meet each other with smile, for the smile is the beginning of love.', 'Mother Theresa', 1),
(10, 'Love is a serious mental disease.', 'Plato', 1),
(11, 'It had long since come to my attention that people of accomplishment rarely sat back and let things happen to them. They went out and happened to things.', 'J. K Rowling', 0),
(12, 'Many of life’s failures are people who did not realize how close they were to success when they gave up.', 'Thomas A. Edison', 1),
(13, 'The opposite of love is not hate; it’s indifference.', 'Elie Wiesel', 1),
(14, 'Never let the fear of striking out keep you from playing the game.', 'Babe Ruth', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
