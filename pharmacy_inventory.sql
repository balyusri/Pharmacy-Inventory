-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 06:41 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` int(7) NOT NULL,
  `drug_name` varchar(300) NOT NULL,
  `drug_type` varchar(300) NOT NULL,
  `drug_desc` varchar(300) NOT NULL,
  `drug_price` double(12,2) NOT NULL,
  `drug_quantity` int(15) NOT NULL,
  `drug_supplier` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `drug_type`, `drug_desc`, `drug_price`, `drug_quantity`, `drug_supplier`) VALUES
(1, 'Panadol Actifast', 'Paracetamol', 'Medication for temporarily symptoms of headache, fever, toothache, and migraine', 8.20, 150, 'GSK (Malaysia) Sdn Bhd\r\n'),
(3, 'Inderal LA 60', 'Propranolol HCl 60mg', 'Medication for high blood pressure, and irregular heartbeat', 37.40, 80, 'AstraZeneca Sdn Bhd\r\n'),
(4, 'Deltasone', 'Prednisone 20mg', 'Medication for breathing disorder, allergic disorder ', 11.00, 70, 'Bayer Co. (Malaysia) Sdn Bhd'),
(5, 'Panadol Extend ', 'Paracetamol 665mg', 'Medication for muscle pain, backache and joint pain', 4.50, 80, 'GSK (Malaysia) Sdn Bhd\r\n'),
(6, 'Panadol Optizorb', 'Paracetamol 500mg', 'Medication for fever, headache, tootache, migraine etc', 4.60, 120, 'GSK (Malaysia) Sdn Bhd\r\n'),
(7, 'Panadol Menstrual ', 'Paracetamol 500mg \r\nParabrom 25mg', 'Medication for period pain, bloatedness, water weight loss and discomforts due to menstrual ', 4.50, 120, 'GSK (Malaysia) Sdn Bhd\r\n'),
(8, 'Afrin Nasal Spray ', 'Oxymetazonline HCL 0.5mg', 'Medication for temporarily relief of congestion in the nostril caused by allegic rhinitis. ', 28.40, 40, 'Bayer Co. (Malaysia) Sdn Bhd'),
(9, 'Zylovaa-H 125', 'Losartan Potassium 100mg \r\nHydrochlorothiazide 25mg ', 'Medication for high blood pressure, irregular heartbeat', 28.90, 75, 'MSD (Malaysia) Sdn Bhd\r\n'),
(10, 'Clarinase ', 'loratadine 5mg \r\npseudoepheedrine 120mg', 'Medication for temporarily symptoms of allergic rhinitis and urticaria', 13.90, 140, 'Schering-Plough (Singapore) Ptd Ltd'),
(11, 'Buscopan ', 'Hyoscine Butylbromide 10mg ', 'Medication for stomach cramps ', 3.00, 80, 'Bayer Co. (Malaysia) Sdn Bhd\r\n'),
(12, 'Panadol Panaflex Pain Relief Patch (Value Pack) ', 'Glycol Salicylate 15%\r\nMenthol 1.0%', 'Patch for medication of muscoskeletal pain and backpain', 10.20, 60, 'GSK (Malaysia) Sdn Bhd\r\n'),
(13, 'Nexium Mups ', 'Esomeprazole Magnesium 40mg ', 'Medication for GERD, gasthrithis, reducing reflux acid', 10.40, 50, 'AstraZeneca Sdn Bhd '),
(14, 'Aerius 5', 'Desloratadine', 'Medication for temporarily symptoms of allergic rhinitis and urticaria', 22.40, 70, 'MSD (Malaysia) Sdn Bhd\r\n'),
(15, 'Ubat Batuk Cap Ibu dan Anak ', 'Bulbus Fritillaria Cirrhosa', 'Medication for cough and sore throat ', 18.00, 40, 'Nin Jiom Medicine Manufactory (Hong Kong) Ptd Ltd'),
(16, 'Augmentin 625', 'Amoxicillin 500mg \r\nClavulanate 125 mg ', 'Medication for infections caused by bacteria ', 29.50, 100, 'GSK (Malaysia) Sdn Bhd'),
(17, 'Difflam Anti-Inflamm Lozenge', 'Benzydamine HCl 3mg ', 'Medication for inflammatory condition of mouth (sore throat) ', 13.90, 40, 'Zuellig Pharma (M) Sdn Bhd'),
(18, 'Bonjela ', 'Choline Salicytate', 'Medication for teething and mouth ulcer ', 20.90, 40, 'Reckitt Benckisser (M) Sdn Bhd'),
(19, 'Pacerone', 'Amiodarone', ' medication is used to treat certain types of serious (possibly fatal) irregular heartbeat', 57.00, 40, 'FDA'),
(20, 'Ashlyna', 'L Norgest', 'hormone medication is used to prevent pregnancy', 16.00, 26, 'MSD (Malaysia) Sdn Bhd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `drug_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
