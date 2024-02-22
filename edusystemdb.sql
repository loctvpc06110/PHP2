-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2024 at 03:23 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edusystemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int NOT NULL,
  `ClassName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `ClassName`) VALUES
(1, 'WEB101'),
(2, 'WEB102'),
(3, 'WEB103'),
(8, 'MKT101111');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `RoomID` int NOT NULL,
  `RoomName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`RoomID`, `RoomName`) VALUES
(1, 'P-101'),
(2, 'P-102'),
(3, 'P-201'),
(4, 'P-202'),
(5, 'P-301'),
(6, 'P-303');

-- --------------------------------------------------------

--
-- Table structure for table `classschedule`
--

CREATE TABLE `classschedule` (
  `ClassSchID` int NOT NULL,
  `RoomID` int NOT NULL,
  `CourseID` int NOT NULL,
  `ClassID` int NOT NULL,
  `TeacherID` int NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classschedule`
--

INSERT INTO `classschedule` (`ClassSchID`, `RoomID`, `CourseID`, `ClassID`, `TeacherID`, `StartTime`, `EndTime`) VALUES
(1, 1, 2, 1, 24, '13:00:00', '15:00:00'),
(6, 6, 3, 8, 1, '22:16:00', '22:22:00'),
(7, 6, 4, 2, 27, '20:52:00', '23:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int NOT NULL,
  `CourseName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `Description`, `StartDate`, `EndDate`) VALUES
(1, 'HTML / CSS', 'HTML và CSS đóng vai trò quan trong việc hình thành một website, khóa học này sẽ giúp bạn làm chủ HTML / CSS', '2024-02-15', '2024-03-15'),
(2, 'JavaScript', 'JavaScript là ngôn ngữ lập trình được nhà phát triển sử dụng để tạo trang web tương tác, khóa học này sẽ giúp bạn làm chủ JavaScript', '2024-02-15', '2024-03-15'),
(3, 'PHP', 'PHP được dùng phổ biến cho việc phát triển các ứng dụng web chạy trên máy chủ.', '2024-02-15', '2024-03-15'),
(4, 'Game', 'Giúp bạn chơi game siêu cấp vip pro lll', '2024-01-18', '2024-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FullName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Access_Token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Password`, `FullName`, `Role`, `Access_Token`) VALUES
(1, 'admin', '$2y$10$BonmLBPmxGhIjmlY3cKTO.E2OlTf0eTwpaJWUiWYaZfJbStMPz.sy', 'Thái Văn Lộc', 'Quản Trị Viên', NULL),
(22, 'yatoharem07@gmail.com', '$2y$10$fPr4BkOp2rl7euPKyjedoOcxOQ7CVNRYR3MlLxWcLX1aj7YyZ5bOO', 'Thái Văn Lộc', 'Giáo Viên', '7961746f686172656d303740676d61696c2e636f6d31373037323338333737'),
(24, 'locga123@gmail.com', '$2y$10$RWceFuHZMHyBq58a8kYQu.i1R6YtETAShx4wFdokZbM/HAgqy6gCy', 'locga', 'Giáo Viên', NULL),
(27, 'loclatoi123@gmail.com', '$2y$10$7mgq3bta7ySE.NMgN2sSF.BwWPEl5hmj1BtF6k8Ixm1gVJw9Xtv1y', 'Lộc Là Tôi', 'Giáo Viên', NULL),
(28, 'locshadow69@gmail.com', '$2y$10$QkXip6NZ.gjPqvwqdtLDP.UsILhnIu43K4jOp8eLmKgbI6o9ngd2i', 'Lộc Shadow', 'Giáo Viên', NULL),
(29, 'anhteo123@gmail.com', '$2y$10$8xh7ppai7FlLLtkyvkNbGu22PCgypCLnvgqBfWEJsV7tlgrW9Roz2', 'Anh Tèo', 'Giáo Viên', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `classschedule`
--
ALTER TABLE `classschedule`
  ADD PRIMARY KEY (`ClassSchID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `RoomID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `classschedule`
--
ALTER TABLE `classschedule`
  MODIFY `ClassSchID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classschedule`
--
ALTER TABLE `classschedule`
  ADD CONSTRAINT `classschedule_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `classschedule_ibfk_3` FOREIGN KEY (`RoomID`) REFERENCES `classrooms` (`RoomID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `classschedule_ibfk_4` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `classschedule_ibfk_5` FOREIGN KEY (`TeacherID`) REFERENCES `users` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
