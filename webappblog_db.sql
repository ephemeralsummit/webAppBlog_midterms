-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 03:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webappblog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `PublicationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Tags` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `Title`, `Content`, `Category`, `PublicationDate`, `Tags`, `UserID`) VALUES
(1, 'okay so', 'this finally works, i really really cheated on this one', 'Coding', '2025-10-27 14:32:14', 'coding, insanity, idkanymore', 2),
(2, 'tea', 'tea', 'tea', '2025-10-27 06:22:32', 'tea', NULL),
(3, 'sgdfnsgfdnf', 'sgnsgfnfg', 'snbfdgn', '2025-10-27 14:32:04', 'gfsdgfdr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Bio` text DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Email`, `Password`, `Bio`, `ProfilePicture`) VALUES
(2, 'julia', 'julia@mail.com', '$2y$10$1kl3uDj4nU9FBoR8Zdc9IeB4KYd8Dhz3kooLQPS9VHGMGX15rwfDC', 'julia', 'https://cdn.bsky.app/img/avatar/plain/did:plc:7i2grzu3lvuott3xqpl2vv3h/bafkreie5o5m3x7fro6jlwzda6qsxmoootdqke66xjm7ga5jmxjhk2wneau@jpeg'),
(3, 'kas', 'kas@mail.com', '$2y$10$ptwbpQ2e2grlTvFeM3LOKuK15lPmwnW61t3T8nC73xgik1dxC.6OC', '', 'https://preview.redd.it/t70nrakqa9571.jpg?width=640&crop=smart&auto=webp&s=65479c43d11fa7aea66f6a36db0af950d1717df8'),
(4, 'okay', 'okay@mail.com', '$2y$10$2bXy95IMeW.AWjKS.pqAB.ovxoKn70xf95AcicJdXATHBTAzA0mgG', 'okay', 'https://preview.redd.it/t70nrakqa9571.jpg?width=640&crop=smart&auto=webp&s=65479c43d11fa7aea66f6a36db0af950d1717df8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `FK_Post_User` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_Post_User` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
