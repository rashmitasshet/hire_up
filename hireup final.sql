-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 06:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hireup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminpassword`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectid`, `title`, `description`, `skills`) VALUES
(6, 'E-commerce Website Development', 'Design and develop a fully functional e-commerce website where users can browse products, add them to their cart, and securely check out', 'Web development (HTML, CSS, JavaScript), Backend development (Python, Ruby, Node.js), Database management (SQL, MongoDB), UI/UX design, payment gateway integration'),
(7, 'Mobile App for Fitness Tracking', 'Create a mobile application that allows users to track their fitness activities, set goals, and monitor their progress over time', 'Mobile app development (iOS/Android), Programming languages (Swift, Kotlin), Database management (SQLite, Firebase), User authentication, Data visualization'),
(8, 'Machine Learning-Based Recommendation System', 'Build a recommendation system that analyzes user preferences and behavior to suggest personalized content, such as movies, books, or products', 'Machine learning (Python, scikit-learn, TensorFlow), Data analysis, Recommendation algorithms (collaborative filtering, content-based filtering), API integration'),
(9, 'Social Media Analytics Dashboard', 'Create a dashboard that collects and analyzes data from social media platforms (Twitter, Facebook, Instagram) to provide insights into user engagement, sentiment analysis, and trending topics', 'Data visualization (Matplotlib, Plotly), Data Mining, Natural Language Processing (NLP), API Integration'),
(10, 'Smart Home Automation System', 'Develop a system that allows users to control various smart home devices (lights, thermostats, locks) through a central interface, either a mobile app or a web application.', 'Internet of Things (IoT) development, Embedded Systems, Cybersecurity, Mobile/Web development'),
(11, 'Online Learning Platform', 'Create an online learning platform that offers courses in various subjects. The platform should include features such as user registration, course enrollment, video lectures, quizzes, and progress tracking. Additionally, an admin interface for managing courses and users should be included.', 'Front-end Development (HTML, CSS, JavaScript, React.js or Vue.js), Back-end Development (Node.js, Express.js, or Django), Database Management (MySQL, PostgreSQL), Video Streaming (Integration with video hosting services)'),
(12, 'hh', 'yyyyyyyyyyy', 'dddddddd, gggggggggg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `phone`, `email`, `password`, `repassword`) VALUES
(6, 'user2', 2147483647, 'user2@gmail.com', '1234', ''),
(7, 'user3', 2147483647, 'user3@gmail.com', '1234', ''),
(8, 'saksha', 2147483647, 'saksha@gmail.com', '1234', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
