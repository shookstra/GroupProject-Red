-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 09:42 PM
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
-- Database: `groupproject`
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
(1, 7, 1, 4, '2019-11-12', '11:30:00', 'Need a computer', 'In Person'),
(2, 1, 3, 4, '2019-11-13', '00:13:00', 'Need calculator', 'In person'),
(3, 2, 1, 6, '2019-11-15', '00:10:00', 'Bring beer', 'Web');

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
(1, 'Math'),
(2, 'Reading'),
(5, 'C#'),
(7, 'ASP.NET');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutorID` int(11) NOT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutorID`, `lName`, `fName`, `email`, `phone`, `city`) VALUES
(4, 'Manson', 'Charles', 'CharlesManson@cult.com', '4026666666', 'Lincoln'),
(6, 'Robertson', 'Turor', 'tRob@tutor.com', '3108746589', 'Lincoln');

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
(1, 1, 4),
(2, 7, 4),
(3, 2, 6),
(4, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_availability`
--

CREATE TABLE `tutor_availability` (
  `taID` int(11) NOT NULL,
  `tutorID` int(11) NOT NULL,
  `day` varchar(3) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_availability`
--

INSERT INTO `tutor_availability` (`taID`, `tutorID`, `day`, `start`, `end`) VALUES
(1, 4, 'Mon', 1130, 1200),
(2, 4, 'Tue', 1200, 1230),
(3, 6, 'Wed', 1300, 1400),
(4, 6, 'Fri', 1000, 1100);

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
(1, 'Jahnke', 'Kurtis', 'kjahnke@scc.edu', '4029876543', 'Student', '$2y$11$ASPrtZlsM1pdDDy98KWzeOZ4pAXHrLzBuTaO2n0v4XV5Cf0in3g9u'),
(2, 'Tester', 'Joe', 'JoeTester@test.com', '3217894563', 'Student', '$2y$11$UTxIUlD.LOSO0kGyuDqbA.JJf2XpfzDrau0fNqH3Y.AraNuTpw/tW'),
(3, 'Hugandkiss', 'Amanda', 'Amanda@gavytrain.org', '6517861230', 'Admin', '$2y$11$m1Jf6MRPOly/PsKp5SDm6u6GEiFpcLpTdmzEuzQ8IG58Cg74No3wO'),
(4, 'Manson', 'Charles', 'CharlesManson@cult.com', '4026666666', 'Tutor', '$2y$11$n8/NAHU4L9gMYM3LmQFk8.hpNZcd1L4.CzrZgrpQcTMa/0pkU4ylW'),
(5, 'Jackson', 'Michael', 'Jackson@hehe.com', '3102569874', 'Student', '$2y$11$3aMcOlDzpNFE8uKd3/oBVOrGucTMDv1.VMellb8IwEqU36w4ue3fS'),
(6, 'Robertson', 'Turor', 'tRob@tutor.com', '3108746589', 'Tutor', '$2y$11$pyErNSk1Rff.QMv9kwuX/./vj4ltzsjHidl5IaizRXRoo6jV9Iw5K');

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
  MODIFY `appID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tutorsubject`
--
ALTER TABLE `tutorsubject`
  MODIFY `tsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutor_availability`
--
ALTER TABLE `tutor_availability`
  MODIFY `taID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
