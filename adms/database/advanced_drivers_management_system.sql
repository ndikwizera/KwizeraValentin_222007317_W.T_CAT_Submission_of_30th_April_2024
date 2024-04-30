-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 12:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced_drivers_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('kwizera', '1234'),
('admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_Id` int(11) NOT NULL,
  `user_Name` varchar(200) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `estimated_hour` int(50) DEFAULT NULL,
  `payment_code` int(50) DEFAULT NULL,
  `amount_perhour` int(50) DEFAULT NULL,
  `total_amount` int(50) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_Id`, `user_Name`, `location`, `estimated_hour`, `payment_code`, `amount_perhour`, `total_amount`, `booking_date`, `booking_time`) VALUES
(17, 'emerance@gmail.com', 'Muhanga', 4, 354550, 10000, 40000, '2024-05-10', '06:17:00.000000'),
(18, 'gisa@gmail.com', 'kigali', 6, 354550, 10000, 60000, '2024-05-07', '06:30:00.000000'),
(19, 'solange@gmail.com', 'kigali', 4, 354550, 10000, 40000, '2024-05-05', '11:00:00.000000'),
(20, 'kellia@gmail.com', 'Kicukiro', 2, 354550, 10000, 20000, '2024-05-02', '16:23:00.000000'),
(21, 'bernard@gmail.com', 'Gasabo', 1, 354550, 10000, 30000, '2024-05-01', '02:00:00.000000'),
(22, 'gatete@gmail.com', 'Nyanza', 6, 354550, 10000, 60000, '2024-05-01', '22:30:00.000000'),
(23, 'pio@gmail.com', 'Nyagatare', 5, 354550, 10000, 50000, '2024-05-01', '05:30:00.000000'),
(24, 'gisa@gmail.com', 'kigali', 3, 354550, 10000, 30000, '2024-05-02', '14:30:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(11) NOT NULL,
  `First_Name` varchar(90) DEFAULT NULL,
  `Last_Name` varchar(90) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `Car_Categories` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `First_Name`, `Last_Name`, `location`, `Car_Categories`, `email`, `phone_number`, `password`) VALUES
(1, 'gisa', 'patrick', 'huye', 'A B', 'gisa@gmail.com', '07823457650', '1234'),
(3, 'Bernard', 'Ishimwe', 'Huye', 'C', 'bernard@gmail.com', '0783459984', '123456'),
(4, 'gatete', 'james', 'huye', 'b', 'gatete@gmail.com', '0782345765', '1234'),
(5, 'solange', 'Liza', 'Nyanza', 'D', 'solange@gmail.com', '0785645346', '123456'),
(6, 'Emmy', 'Niyomugabo', 'Kamonyi', 'B', 'emmynyawe@gmail.com', '0789654323', '123456'),
(7, 'Emerance', 'niyongira', 'Kigali', 'B D', 'emerance@gmail.com', '0798745346', '12346'),
(9, 'Celestin', 'Mvumbu', 'Rubava', 'B C ', 'celestin@gmail.com', '0784567890', '1234567'),
(11, 'Kellia', 'Ingabire', 'Kamonyi', 'B', 'kellia@gmail.com', '0789456546', '123456'),
(12, 'Fils', 'Igiraneza', 'Ruhango', 'A B C', 'fils@gmail.com', '0789876098', '12345'),
(13, 'Pierre', 'Nshimwe', 'Gicumbi', 'B', 'pierre@gmail.com', '0735679346', '12345'),
(14, 'Pio', 'Kayihura', 'kigali', 'B', 'pio@gmail.com', '0788834565', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_Id` int(11) NOT NULL,
  `First_Name` varchar(90) DEFAULT NULL,
  `Last_Name` varchar(90) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `Car_Categories` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_Id`, `First_Name`, `Last_Name`, `location`, `Car_Categories`, `email`, `phone_number`) VALUES
(5, 'Prince', 'Shema', 'Karongi', 'c', 'prince@gmail.com', '0782376548'),
(6, 'Jeanne', 'Uwase', 'Rwamagana', 'B ', 'jeanne@gmail.com', '0783456876'),
(7, 'Francois', 'Mfura', 'Rubavu', 'A B C D D1', 'francois@gmail.com', '0788856887'),
(8, 'Paccy', 'Niyibizi', 'Rwamagana', 'A B  D D1', 'paccy@gmail.com', '0788345679'),
(9, 'olivier', 'Tuyishime', 'Musanze', 'A B D ', 'olivier@gmail.com', '0798745679'),
(11, 'Angel', 'Umuriza', 'Kigali', 'A B D ', 'angel@gmail.com', '0793456899'),
(12, 'Melinda', 'Agahozo', 'kigali', 'B D', 'melinda@gmail.com', '0795376548'),
(13, 'James', 'Gakuba', 'kigali', 'A B D D1', 'james@gmail.com', '0782375558');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `message`) VALUES
(4, 'eric', 'erick@gmail.com', 'this platform give us good service'),
(5, 'Emerance', 'emerance@gmail.com', 'we are appreciate for you great services'),
(6, 'Emmy niyomugabo', 'emmynyawe@gmail.com', 'Thank you your professional dricvers'),
(7, 'Iliza ', 'solange@gmaIl.com', 'we are appriciate your panctuality');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_Id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
