-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2025 at 10:48 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifehospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `name`, `email`, `doctor`, `appointment_date`, `appointment_time`, `message`, `created_at`) VALUES
(0, '', '', '', '0000-00-00', '00:00:00', '', '0000-00-00 00:00:00'),
(0, 'naveen', 'naveen@gmail.com', 'Dermatologist', '2024-11-28', '00:00:00', 'i need to meet', '2024-11-06 20:22:21'),
(0, 'dewa', 'dewa@gmail.com', 'Psychiatrist', '2024-11-10', '16:00:00', 'see you', '2024-11-06 20:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `name` varchar(50) NOT NULL,
  `passcode` varchar(50) NOT NULL,
  `em_type` varchar(50) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`name`, `passcode`, `em_type`, `id`) VALUES
('Naveen', 'AD963', 'admin', 5),
('DR Meegama', 'DR756', 'doctor', 4);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `full_name`, `email`, `phone`, `password`) VALUES
(0, 'naveen', 'kuna@gmail.com', '0424522', '$2y$10$uiEg5i5g7UVoufcdoll2SewX/Po1Acgvmo4bv1q5msm/V4m.LclBi'),
(0, 'naveen', 'kuna@gmail.com', '0424522', '123'),
(0, 'dev', 'baga@gmail.com', '0793658452', '258'),
(0, 'yasa', 'yasara@gmail.com', '0798542158', '789'),
(0, 'naveen', 'ndev25406@gmail.com', '0424922752', '2002');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(255) NOT NULL,
  `patients_email` varchar(50) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `patient_name`, `patients_email`, `doctor`, `doctor_name`, `description`, `date`) VALUES
(8, 'Siril', 'siril@gmail.com', 'Dermatologist', 'R.R.Jamaldeen', 'aclin\r\nmycin\r\ndoxyleb ', '2024-11-30'),
(9, 'piyal', 'piyal@gmail.com', 'Cardiologist', 'S.M.K.Perera', 'asprin\r\nNitroglycerin', '2024-11-08'),
(10, 'kumara', 'kumara@gmail.com', 'Neurologist', 'W.P.S.Udeni', 'Antidepressants\r\nAnticonvulsants', '2024-11-09'),
(11, 'wimala', 'wimala@gmail.com', 'Dermatologist', 'R.R.Jamaldeen', 'acnil', '2024-11-13'),
(12, 'mahinda', 'mahinda@gmail.com', 'Cardiologist', 'S.M.K.Perera', 'asprin', '2024-11-13'),
(13, 'bagya', 'bagya@gmail.com', 'Obstetrician-gynecologist', 'K.M.Meegama', 'Clotrimazole	\r\nFluconazole	\r\nItraconazol', '2024-11-09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
