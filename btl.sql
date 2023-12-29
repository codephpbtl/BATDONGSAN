-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 01:08 PM
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
-- Database: `btl`
--

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `RentalID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `Status` enum('Paid','Unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`RentalID`, `UserID`, `UnitID`, `StartDate`, `EndDate`, `TotalPrice`, `Status`) VALUES
(1, 2, 1, '2023-01-01', '2023-01-10', 500.00, 'Paid'),
(2, 3, 3, '2023-02-15', '2023-03-15', 1500.00, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `storageunits`
--

CREATE TABLE `storageunits` (
  `UnitID` int(11) NOT NULL,
  `Capacity` float NOT NULL,
  `Rate` decimal(10,2) NOT NULL,
  `Date` enum('hour','day','month') DEFAULT NULL,
  `Available` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storageunits`
--

INSERT INTO `storageunits` (`UnitID`, `Capacity`, `Rate`, `Date`, `Available`) VALUES
(1, 10.5, 50.00, 'hour', 'Yes'),
(2, 20, 400.00, 'day', 'No'),
(3, 15, 1500.00, 'month', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `RentalID` int(11) DEFAULT NULL,
  `PaymentMethod` enum('CreditCard','BankTransfer') NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `TransactionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `RentalID`, `PaymentMethod`, `Amount`, `TransactionDate`) VALUES
(1, 1, 'CreditCard', 500.00, '2023-01-10'),
(2, 2, 'BankTransfer', 1500.00, '2023-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `RoleID` int(11) NOT NULL,
  `UserRole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`RoleID`, `UserRole`) VALUES
(1, 'admin'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `UserRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `FullName`, `Email`, `PhoneNumber`, `UserRole`) VALUES
(1, 'admin1', '1', 'admin', 'admin1@email.com', '123456789', 1),
(2, 'user1', '1', 'Toan', 'user1@email.com', '987654321', 2),
(3, 'user2', '1', 'Trinh', 'user2@email.com', '111222333', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`RentalID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `UnitID` (`UnitID`);

--
-- Indexes for table `storageunits`
--
ALTER TABLE `storageunits`
  ADD PRIMARY KEY (`UnitID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `RentalID` (`RentalID`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserRole` (`UserRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `RentalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storageunits`
--
ALTER TABLE `storageunits`
  MODIFY `UnitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`UnitID`) REFERENCES `storageunits` (`UnitID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`RentalID`) REFERENCES `rentals` (`RentalID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserRole`) REFERENCES `userrole` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
