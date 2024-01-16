<?php

// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "batdongsandb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL queries to create tables
$sql_rentals = "
CREATE TABLE IF NOT EXISTS `rentals` (
  `RentalID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `Status` enum('Paid','Unpaid') NOT NULL,
  PRIMARY KEY (`RentalID`),
  KEY `UserID` (`UserID`),
  KEY `UnitID` (`UnitID`),
  CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`UnitID`) REFERENCES `storageunits` (`UnitID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

$sql_storageunits = "
CREATE TABLE IF NOT EXISTS `storageunits` (
  `UnitID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Image` text,
  `Capacity` float NOT NULL,
  `Rate` decimal(10,2) NOT NULL,
  `Date` enum('hour','day','month') DEFAULT NULL,
  `Available` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`UnitID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

$sql_transactions = "
CREATE TABLE IF NOT EXISTS `transactions` (
  `TransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `RentalID` int(11) DEFAULT NULL,
  `PaymentMethod` enum('CreditCard','BankTransfer') NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `TransactionDate` date NOT NULL,
  PRIMARY KEY (`TransactionID`),
  KEY `RentalID` (`RentalID`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`RentalID`) REFERENCES `rentals` (`RentalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

$sql_userrole = "
CREATE TABLE IF NOT EXISTS `userrole` (
  `RoleID` int(11) NOT NULL AUTO_INCREMENT,
  `UserRole` varchar(50) NOT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

$sql_users = "
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `UserRole` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  KEY `UserRole` (`UserRole`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserRole`) REFERENCES `userrole` (`RoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

// Execute queries
if ($conn->query($sql_userrole) === TRUE &&
    $conn->query($sql_users) === TRUE &&
    $conn->query($sql_storageunits) === TRUE &&
    $conn->query($sql_rentals) === TRUE &&
    $conn->query($sql_transactions) === TRUE) {
    echo "Các bảng đã được tạo thành công!";
} else {
    echo "Lỗi khi tạo bảng: " . $conn->error;
}

// Close connection
$conn->close();

?>
