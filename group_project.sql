-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 08:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appID` int(11) NOT NULL,
  `subID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `appDate` date DEFAULT NULL,
  `appTime` time DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `meetType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appID`, `subID`, `userID`, `tutorID`, `appDate`, `appTime`, `details`, `meetType`) VALUES
(10, 1, 1, 2, '2019-11-25', '13:30:00', 'testing', 'zoom'),
(11, 1, 1, 1, '2019-12-02', '12:00:00', 'testing', 'inPerson');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `holidayID` int(11) NOT NULL,
  `holiday` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`holidayID`, `holiday`, `date`) VALUES
(113, 'New Years Day', '2020-01-01'),
(114, 'Martin Luther King Day', '2020-01-20'),
(115, 'Presidents Day', '2020-02-17'),
(116, 'Memorial Day', '2020-05-25'),
(117, 'Independance Day(observed)', '2020-07-03'),
(118, 'Independance Day', '2020-07-04'),
(119, 'Labor Day', '2020-09-07'),
(120, 'Columbus Day', '2020-10-12'),
(121, 'Veterans Day', '2020-11-11'),
(122, 'Thanksgiving', '2020-11-26'),
(123, 'Christmas', '2020-12-25'),
(124, 'New Years Day', '2021-01-01'),
(125, 'Martin Luther King Day', '2021-01-18'),
(126, 'Presidents Day', '2021-02-15'),
(127, 'Memorial Day', '2021-05-31'),
(128, 'Independance Day(observed)', '2021-07-05'),
(129, 'Independance Day', '2021-07-04'),
(130, 'Labor Day', '2021-09-06'),
(131, 'Columbus Day', '2021-10-11'),
(132, 'Veterans Day', '2021-11-11'),
(133, 'Thanksgiving', '2021-11-25'),
(134, 'Christmas', '2021-12-25'),
(135, 'Christmas(observed)', '2021-12-24'),
(136, 'New Years Eve(observed)', '2021-12-31'),
(137, 'New Years Day', '2022-01-01'),
(138, 'Martin Luther King Day', '2022-01-17'),
(139, 'Presidents Day', '2022-02-21'),
(140, 'Memorial Day', '2022-05-30'),
(141, 'Independance Day', '2022-07-04'),
(142, 'Labor Day', '2022-09-05'),
(143, 'Columbus Day', '2022-10-10'),
(144, 'Veterans Day', '2022-11-11'),
(145, 'Thanksgiving', '2022-11-24'),
(146, 'Christmas', '2022-12-25'),
(147, 'Christmas(observed)', '2022-12-26'),
(148, 'New Years Day', '2023-01-01'),
(149, 'Martin Luther King Day', '2023-01-16'),
(150, 'Presidents Day', '2023-02-20'),
(151, 'Memorial Day', '2023-05-29'),
(152, 'Veterans Day(observed)', '2023-11-10'),
(153, 'Independance Day', '2023-07-04'),
(154, 'Labor Day', '2023-09-04'),
(155, 'Columbus Day', '2023-10-09'),
(156, 'Veterans Day', '2023-11-11'),
(157, 'Thanksgiving', '2023-11-23'),
(158, 'Christmas', '2023-12-25'),
(159, 'New Years Day', '2024-01-01'),
(160, 'Martin Luther King Day', '2024-01-15'),
(161, 'Presidents Day', '2024-02-19'),
(162, 'Memorial Day', '2024-05-27'),
(163, 'Independance Day', '2024-07-04'),
(164, 'Labor Day', '2024-09-02'),
(165, 'Columbus Day', '2024-10-14'),
(166, 'Veterans Day', '2024-11-11'),
(167, 'Thanksgiving', '2024-11-28'),
(168, 'Christmas', '2024-12-25'),
(169, 'New Years Day', '2025-01-01'),
(170, 'Martin Luther King Day', '2025-01-20'),
(171, 'Presidents Day', '2025-02-17'),
(172, 'Memorial Day', '2025-05-26'),
(173, 'Independance Day', '2025-07-04'),
(174, 'Labor Day', '2025-09-01'),
(175, 'Columbus Day', '2025-10-13'),
(176, 'Veterans Day', '2025-11-11'),
(177, 'Thanksgiving', '2025-11-27'),
(178, 'Christmas', '2025-12-25'),
(179, 'New Years Day', '2026-01-01'),
(180, 'Martin Luther King Day', '2026-01-19'),
(181, 'Presidents Day', '2026-02-16'),
(182, 'Memorial Day', '2026-05-25'),
(183, 'Independance Day', '2026-07-04'),
(184, 'Labor Day', '2026-09-07'),
(185, 'Columbus Day', '2026-10-12'),
(186, 'Veterans Day', '2026-11-11'),
(187, 'Thanksgiving', '2026-11-26'),
(188, 'Christmas', '2026-12-25'),
(189, 'Independance Day(observed)', '2026-07-03'),
(190, 'New Years Day', '2027-01-01'),
(191, 'Martin Luther King Day', '2027-01-18'),
(192, 'Presidents Day', '2027-02-15'),
(193, 'Memorial Day', '2027-05-31'),
(194, 'Independance Day(observed)', '2027-07-05'),
(195, 'Independance Day', '2027-07-04'),
(196, 'Labor Day', '2027-09-06'),
(197, 'Columbus Day', '2027-10-11'),
(198, 'Veterans Day', '2027-11-11'),
(199, 'Thanksgiving', '2027-11-25'),
(200, 'Christmas', '2027-12-25'),
(201, 'Christmas(observed)', '2027-12-24'),
(202, 'New Years Eve(observed)', '2027-12-31'),
(203, 'New Years Day', '2028-01-01'),
(204, 'Martin Luther King Day', '2028-01-17'),
(205, 'Presidents Day', '2028-02-21'),
(206, 'Memorial Day', '2028-05-29'),
(207, 'Independance Day', '2028-07-04'),
(208, 'Labor Day', '2028-09-04'),
(209, 'Columbus Day', '2028-10-09'),
(210, 'Veterans Day', '2028-11-11'),
(211, 'Veterans Day(observed)', '2028-11-10'),
(212, 'Thanksgiving', '2028-11-23'),
(213, 'Christmas', '2028-12-25'),
(214, 'New Years Day', '2029-01-01'),
(215, 'Martin Luther King Day', '2029-01-15'),
(216, 'Presidents Day', '2029-02-19'),
(217, 'Memorial Day', '2029-05-28'),
(218, 'Independance Day', '2029-07-04'),
(219, 'Labor Day', '2029-09-02'),
(220, 'Columbus Day', '2029-10-08'),
(221, 'Veterans Day', '2029-11-11'),
(222, 'Veterans Day(observed)', '2029-11-12'),
(223, 'Thanksgiving', '2029-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subID` int(11) NOT NULL,
  `subName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subID`, `subName`) VALUES
(1, 'Writing'),
(2, 'Chemistry'),
(3, 'CADD'),
(4, 'C#'),
(5, 'Java'),
(6, 'Javascript'),
(7, 'Web Server Scripting'),
(8, 'Capstone'),
(9, 'ASP.NET'),
(10, 'Program Design and Problem Solving');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutorID` int(11) NOT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `city` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutorID`, `lName`, `fName`, `email`, `phone`, `city`) VALUES
(1, 'Rem', 'Will', 'email@email.com', '444556789', 'Lincoln'),
(2, 'Test', 'Emi', 'emi@email.com', '333445555', 'Beatrice'),
(3, 'Post', 'Yep', 'rep@email.org', '222458900', 'Milford'),
(4, 'Wape', 'Pat', 'trust@tre.com', '111223333', 'Lincoln');

-- --------------------------------------------------------

--
-- Table structure for table `tutorsubject`
--

CREATE TABLE `tutorsubject` (
  `tsID` int(11) NOT NULL,
  `subID` int(11) DEFAULT NULL,
  `tutorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorsubject`
--

INSERT INTO `tutorsubject` (`tsID`, `subID`, `tutorID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 5, 3),
(4, 4, 4),
(5, 8, 4),
(6, 9, 3),
(7, 7, 1),
(8, 6, 2),
(9, 10, 3),
(10, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_availability`
--

CREATE TABLE `tutor_availability` (
  `taID` int(11) NOT NULL,
  `tutorID` int(11) NOT NULL,
  `day` varchar(3) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `hours` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_availability`
--

INSERT INTO `tutor_availability` (`taID`, `tutorID`, `day`, `start`, `end`, `hours`) VALUES
(14, 1, 'Mon', '10:00:00', '18:00:00', '8.00'),
(17, 3, 'Tue', '10:00:00', '15:00:00', '5.00'),
(18, 2, 'Mon', '10:30:00', '17:00:00', '6.50'),
(19, 4, 'wed', '11:30:00', '17:30:00', '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `lName`, `fName`, `email`, `phone`, `role`, `password`) VALUES
(1, 'Remaklus', 'William', 'wr6964@southeast.edu', '14026104568', 'Student', '$2y$11$oD7sx5kM7nIEk6HSVnmaeeRZv9ZxbWem1sRS5jE6nMsj8X7WJxbx2'),
(2, 'McTesty', 'Test', 'evil@mctestydom.com', '444-666-3039', 'Admin', '$2y$11$YbCM7kQ./1CpWDNNtibyFOLhVWV34NGdkR3uXJGWCrQOBM1f/h4wG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appID`),
  ADD KEY `FK_Subjects_subID` (`subID`),
  ADD KEY `FK_Users_userID` (`userID`),
  ADD KEY `FK_Tutor_tutorID` (`tutorID`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`holidayID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subID`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutorID`);

--
-- Indexes for table `tutorsubject`
--
ALTER TABLE `tutorsubject`
  ADD PRIMARY KEY (`tsID`),
  ADD KEY `FK_Subject_subID` (`subID`),
  ADD KEY `FK_tutors_tutorID` (`tutorID`);

--
-- Indexes for table `tutor_availability`
--
ALTER TABLE `tutor_availability`
  ADD PRIMARY KEY (`taID`),
  ADD KEY `FK_tutorTbl_tutorID` (`tutorID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holidayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1586;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tutorsubject`
--
ALTER TABLE `tutorsubject`
  MODIFY `tsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tutor_availability`
--
ALTER TABLE `tutor_availability`
  MODIFY `taID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FK_Subjects_subID` FOREIGN KEY (`subID`) REFERENCES `subjects` (`subID`),
  ADD CONSTRAINT `FK_Tutor_tutorID` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`tutorID`),
  ADD CONSTRAINT `FK_Users_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `tutorsubject`
--
ALTER TABLE `tutorsubject`
  ADD CONSTRAINT `FK_Subject_subID` FOREIGN KEY (`subID`) REFERENCES `subjects` (`subID`),
  ADD CONSTRAINT `FK_tutors_tutorID` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`tutorID`);

--
-- Constraints for table `tutor_availability`
--
ALTER TABLE `tutor_availability`
  ADD CONSTRAINT `FK_tutorTbl_tutorID` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`tutorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
