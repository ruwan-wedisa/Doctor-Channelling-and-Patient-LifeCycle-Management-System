-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 07:12 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echannelling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `telNo` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telHome` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `address`, `NIC`, `telNo`, `email`, `telHome`) VALUES
(1, 'Ruwan Wedisa', 'mirigama', '933183297v', 710193381, 'ruwan.wedisa0150@gmail.com', 335680060);

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `allergy` (
  `aid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `reaction` int(1) NOT NULL,
  `date` date NOT NULL,
  `still_have` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allergy`
--

INSERT INTO `allergy` (`aid`, `id`, `type`, `reaction`, `date`, `still_have`) VALUES
(1, 81, 1, 1, '2018-04-29', 1),
(2, 81, 9, 2, '2018-05-24', 1),
(7, 1, 1, 0, '2018-08-14', 1),
(10, 1, 3, 1, '2018-09-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_recipt`
--

CREATE TABLE `booking_recipt` (
  `refNo` int(200) NOT NULL,
  `Full Name` varchar(255) NOT NULL,
  `Phone` int(10) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bpressure`
--

CREATE TABLE `bpressure` (
  `BPid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `systolic` int(11) NOT NULL,
  `diasolic` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bpressure`
--

INSERT INTO `bpressure` (`BPid`, `id`, `date`, `systolic`, `diasolic`) VALUES
(1, 1, '2018-05-05', 287, 160),
(2, 81, '2018-04-29', 221, 65),
(3, 81, '2018-05-05', 52, 523),
(4, 81, '2018-05-13', 331, 54),
(7, 81, '2018-06-06', 682, 181),
(8, 81, '2018-07-01', 321, 200),
(9, 81, '2018-07-28', 481, 254);

-- --------------------------------------------------------

--
-- Table structure for table `cholostrol`
--

CREATE TABLE `cholostrol` (
  `did` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `HDL` int(11) NOT NULL,
  `LDL` int(11) NOT NULL,
  `VLDL` int(11) NOT NULL,
  `TRI` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cholostrol`
--

INSERT INTO `cholostrol` (`did`, `id`, `date`, `total`, `HDL`, `LDL`, `VLDL`, `TRI`) VALUES
(1, 1, '2018-05-10', 158, 78, 89, 52, 67),
(50, 2, '2018-08-06', 322, 33, 332, 443, 12),
(53, 81, '2018-01-01', 112, 21, 45, 21, 47),
(18, 83, '2018-05-10', 432, 33, 12, 21, 44),
(17, 82, '2018-05-16', 500, 55, 65, 25, 47),
(59, 3, '2018-05-01', 223, 112, 22, 12, 12),
(54, 81, '2018-02-08', 150, 12, 31, 33, 1),
(55, 81, '2018-03-30', 220, 22, 32, 11, 43),
(57, 81, '2018-06-20', 187, 41, 24, 11, 25),
(56, 81, '2018-05-06', 389, 21, 77, 41, 21),
(58, 81, '2018-08-01', 341, 41, 25, 21, 77);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `reply` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `id`, `comment`, `reply`) VALUES
(30, 3, 'I Want to take some advise about Biological Botney', 'take penadol'),
(29, 3, 'I Have Apointed Dr Kariyawasam', NULL),
(31, 81, 'asdasd', NULL),
(32, 81, 'asdasd', NULL),
(33, 3, 'Why my head is paining everytime?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `No` int(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `region` varchar(255) NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`No`, `firstname`, `lastname`, `phoneno`, `region`, `subject`) VALUES
(7, 'Abbas', 'Imthath', 719001913, 'northWesternProvince', 'Your site is too poor');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` varchar(100) NOT NULL,
  `docName` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `speciality` int(20) DEFAULT NULL,
  `NIC` varchar(12) DEFAULT NULL,
  `telNo` int(10) DEFAULT NULL,
  `hospital` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telHome` int(10) NOT NULL,
  `channelRoomNo` int(11) NOT NULL,
  `priceForChannel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `docName`, `address`, `speciality`, `NIC`, `telNo`, `hospital`, `email`, `telHome`, `channelRoomNo`, `priceForChannel`) VALUES
('2', 'Sahan Mapalage', 'No 25 gampaha road, Yakkala.', 1, '512547521v', 714215221, 'Uva Base Hospital,Badulla', 'sahan@gmail.com', 556655214, 22, 1800),
('3', 'Nimeshan', 'Awissawella', 2, '856521485v', 925488552, 'Balangoda Central Hospital', 'nime@gmail.com', 665214852, 34, 2200),
('4', 'Thulki', 'Minuwangoda', 2, '632547521v', 713205874, 'Sri Nangika pvt Ltd', 'thulki@gmail.com', 115547852, 11, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_shedule`
--

CREATE TABLE `doctor_shedule` (
  `id` int(11) NOT NULL,
  `doctorId` varchar(100) DEFAULT NULL,
  `sheduleType` text,
  `day` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_shedule`
--

INSERT INTO `doctor_shedule` (`id`, `doctorId`, `sheduleType`, `day`) VALUES
(1, '2', 'Monthly', '18'),
(3, '3', 'Monthly', '29'),
(4, '2', 'Daily', ''),
(5, '2', 'Monthly', '24'),
(9, '2', 'Monthly', '29');

-- --------------------------------------------------------

--
-- Table structure for table `fbsugar`
--

CREATE TABLE `fbsugar` (
  `FBSid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `glucose` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fbsugar`
--

INSERT INTO `fbsugar` (`FBSid`, `id`, `date`, `glucose`) VALUES
(1, 1, '2018-05-03', 183),
(2, 81, '2018-04-29', 254),
(3, 81, '2018-05-02', 195),
(4, 81, '2018-05-06', 325),
(5, 81, '2018-05-15', 120),
(6, 81, '2018-05-17', 125),
(7, 81, '2018-05-19', 325),
(18, 1, '2018-06-04', 220),
(19, 1, '2018-06-30', 125),
(20, 1, '2018-07-12', 441),
(21, 1, '2018-08-02', 330);

-- --------------------------------------------------------

--
-- Table structure for table `heightweightage`
--

CREATE TABLE `heightweightage` (
  `did` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heightweightage`
--

INSERT INTO `heightweightage` (`did`, `id`, `date`, `height`, `weight`, `Age`) VALUES
(1, 1, '2018-05-01', 180, 90, 24),
(27, 81, '2018-05-01', 168, 84, 23),
(28, 2, '2018-06-01', 178, 65, 48),
(29, 81, '2018-06-08', 168, 89, 23),
(30, 81, '2018-07-11', 169, 97, 24),
(31, 81, '2018-08-01', 169, 82, 24),
(32, 3, '2018-07-02', 150, 110, 21);

-- --------------------------------------------------------

--
-- Table structure for table `labreport`
--

CREATE TABLE `labreport` (
  `id` int(10) NOT NULL,
  `patienId` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `reportCategory` int(10) NOT NULL,
  `fileName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labreport`
--

INSERT INTO `labreport` (`id`, `patienId`, `date`, `reportCategory`, `fileName`) VALUES
(1, 81, '2018-08-17', 1, 'IMG-20161212-WA0030.jpg'),
(15, 81, '2018-08-17', 3, 'IMG-20161212-WA0030.jpg'),
(16, 81, '2018-08-24', 3, 'block.jpg'),
(18, 81, '2018-08-31', 1, 'logoweb.png'),
(19, 81, '2018-07-20', 1, 'Hackathon-top.png'),
(20, 81, '2018-08-09', 4, 'ww.png'),
(21, 81, '2018-08-06', 1, '3d-icon2.png'),
(22, 81, '2018-08-06', 4, 'bg.jpg'),
(23, 81, '2018-08-02', 2, 'lwIk-ZQT_400x400.png'),
(24, 81, '2018-08-16', 2, 'party-icon-png-19.png'),
(25, 81, '2018-08-01', 2, '3stars.png'),
(26, 2, '2018-08-02', 4, 'lon.jpg'),
(27, 81, '2018-08-06', 4, 'a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `latestnewsupdate`
--

CREATE TABLE `latestnewsupdate` (
  `mg_No` int(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latestnewsupdate`
--

INSERT INTO `latestnewsupdate` (`mg_No`, `message`) VALUES
(1, 'n,mn,mn,mn,'),
(2, 'nbmnbmnbmnm'),
(3, 'XZCZXCZXCZXC'),
(4, 'ZXZxzXz'),
(5, 'LATEST NEWS CAN BE UPDTED LIKE THIS'),
(6, 'sdfdsf'),
(7, 'sdfsdfsdfsdfsd asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `medical_tips`
--

CREATE TABLE `medical_tips` (
  `No` int(11) NOT NULL,
  `Tips` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_tips`
--

INSERT INTO `medical_tips` (`No`, `Tips`) VALUES
(10, 'Load up on vitamin C.We need at least 90 mg of vitamin C per day and the best way to get this is by eating at least five servings of fresh fruit and vegetables every day. So hit the oranges and guavas!'),
(11, 'Burn fat during intervals. To improve your fitness quickly and lose weight , harness the joys of interval training. Set the treadmill or step machine on the interval program , where your speed and workload varies from minute to minute. Build up gradually, every minute and return to the starting speed. Repeat this routine. Not only will it be less monotonous, but you can train for a shorter time and achieve greater results.'),
(12, 'Eat your stress away. Prevent low blood sugar as it stresses you out. Eat regular and small healthy meals and keep fruit and veggies handy. Herbal teas will also soothe your frazzled nerves.'),
(13, 'Get smelly. Garlic, onions, spring onions and leeks all contain stuff thatâ€™s good for you. A study at the Childâ€™s Health Institute in Cape Town found that eating raw garlic helped fight serious childhood infections. Heat destroys these properties, so eat yours raw, wash it down with fruit juice or, if youâ€™re a sissy, have it in tablet form.'),
(14, 'Bone up daily. Get your daily calcium by popping a tab, chugging milk or eating yoghurt. Itâ€™ll keep your bones strong. Remember that your bone density declines after the age of 30. You need at least 200 milligrams daily, which you should combine with magnesium, or it simply wonâ€™t be absorbed.'),
(15, 'Eat your stress away. Prevent low blood sugar as it stresses you out. Eat regular and small healthy meals and keep fruit and veggies handy. Herbal teas will also soothe your frazzled nerves.  Eating unrefined carbohydrates, nuts and bananas boosts the formation of serotonin, another feel-good drug. Small amounts of protein containing the amino acid tryptamine can give you a boost when stress tires you out.'),
(16, 'Your dirtiest foot forward. If your ankles, knees, and hips ache from running on pavement, head for the dirt. Soft trails or graded roads are a lot easier on your joints than the hard stuff. Also, dirt surfaces tend to be uneven, forcing you to slow down a bit and focus on where to put your feet â€“ great for agility and concentration.'),
(17, 'Do self-checks. Do regular self-examinations of your breasts. Most partners are more than happy to help, not just because breast cancer is the most common cancer among SA women. The best time to examine your breasts is in the week after your period.'),
(18, 'Doggone. If youâ€™re allergic to your cat, dog, budgie or pet piglet, stop suffering the ravages of animal dander: Install an air filter in your home.			       Keep your pet outside as much as possible and brush him outside of the home to remove loose hair and other allergens. Better yet, ask someone else to do so.'),
(19, 'Asthma-friendly sports. Swimming is the most asthma-friendly sport of all, but cycling, canoeing, fishing, sailing and walking are also good, according to the experts.'),
(20, 'Avoid heavy meals in the summer months, especially during hot days.'),
(21, 'Avoid heavy meals in the summer months, especially during hot days.');

-- --------------------------------------------------------

--
-- Table structure for table `message1`
--

CREATE TABLE `message1` (
  `M_No` int(10) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message1`
--

INSERT INTO `message1` (`M_No`, `Message`) VALUES
(1, 'Everyone should have health insurance? '),
(2, '“The road to health is paved with good intestines!”');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `M_No` int(10) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`M_No`, `Message`) VALUES
(4, '    You treat a person, I guarantee you, you\'ll win'),
(5, 'health care system is neither healthy'),
(6, 'collection of quotations by famous author');

-- --------------------------------------------------------

--
-- Table structure for table `otherdetail`
--

CREATE TABLE `otherdetail` (
  `did` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `bloodGroup` int(1) NOT NULL,
  `smoking` int(1) NOT NULL,
  `alchohol` int(1) NOT NULL,
  `waterIntake` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherdetail`
--

INSERT INTO `otherdetail` (`did`, `id`, `bloodGroup`, `smoking`, `alchohol`, `waterIntake`) VALUES
(1, 1, 1, 0, 1, 3.5),
(11, 81, 6, 1, 1, 2.6),
(12, 82, 6, 1, 1, 2.5),
(13, 83, 4, 1, 1, 3.5),
(14, 84, 4, 0, 0, 2.4),
(15, 2, 7, 1, 1, 2.4),
(17, 3, 2, 0, 0, 2.4);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patientName` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `telNo` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telHome` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patientName`, `address`, `NIC`, `telNo`, `email`, `telHome`) VALUES
(84, 'kasun Perera', 'Gampaha', '987452221v', 710193381, 'ruwan.wedisa0150@gmail.com', 710193381),
(81, 'Oshan Lukmal', 'Rathnapura', '965487214v', 754852147, 'amimthath@gmail.com', 665485214),
(85, 'Hasanka Senadeera', 'No 25, kesel Le nawa, Bandarapura', '952147582v', 752148542, 'hasankaLaknath@gmail.com', 115544785),
(86, 'thulki', 'dasdasd', '954852145v', 234333221, 'ruwan.wedisa0150@gmail.com', 710193381);

-- --------------------------------------------------------

--
-- Table structure for table `patientsbooking`
--

CREATE TABLE `patientsbooking` (
  `refNo` int(11) NOT NULL,
  `patientName` varchar(100) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `doctorName` varchar(100) NOT NULL,
  `dateBooked` date NOT NULL,
  `time` time NOT NULL,
  `roomNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientsbooking`
--

INSERT INTO `patientsbooking` (`refNo`, `patientName`, `contactNum`, `doctorName`, `dateBooked`, `time`, `roomNum`) VALUES
(1, 'maju', 719001913, 'Sahan Mapalage', '2018-07-27', '15:12:00', 11),
(2, 'oshan lakmal', 719001913, 'Sahan Mapalage', '2018-07-03', '19:00:00', 11),
(3, 'oshan lakmal', 719001913, 'Sahan Mapalage', '2018-07-18', '21:00:00', 11),
(4, 'oshan lakmal', 719001913, 'Sahan Mapalage', '2018-07-30', '23:12:00', 11),
(5, 'oshan lakmal', 719001913, 'Sahan Mapalage', '2018-08-04', '21:12:00', 10),
(6, 'oshan lakmal', 719001913, 'Sahan Mapalage', '2018-08-07', '21:12:00', 10),
(7, 'ruwan', 719001913, 'Isuru Uthpala', '2018-08-08', '21:12:00', 25),
(8, 'ruwan', 719001913, 'Nimeshan Dayananda', '2018-08-11', '06:00:00', 24),
(9, 'ruwan', 719001913, 'Sahan Mapalage', '2018-08-14', '10:00:00', 28),
(10, 'ruwan', 719001913, 'Sahan Mapalage', '2018-08-06', '00:02:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payedpatients`
--

CREATE TABLE `payedpatients` (
  `id` int(11) DEFAULT NULL,
  `refNo` int(100) NOT NULL,
  `patientName` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `dateBooked` date DEFAULT NULL,
  `doctorName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payedpatients`
--

INSERT INTO `payedpatients` (`id`, `refNo`, `patientName`, `phone`, `nic`, `email`, `amount`, `dateBooked`, `doctorName`) VALUES
(81, 9, 'Ruwan Wedisa                    ', 710193381, '933183297v  ', 'ruwan.wedisa0150@gmail.com                    ', 2669, '2018-08-06', 'sahan Mapalage'),
(82, 10, 'Ruwan Wedisa                    ', 710193381, '933183297v  ', 'ruwan.wedisa0150@gmail.com                    ', 2669, '2018-08-03', 'Sahan Mapalage                    '),
(83, 11, 'Ruwan Wedisa                    ', 710193381, '948512451v  ', 'ruwan.wedisa0150@gmail.com                    ', 2669, '2018-08-06', 'Sahan Mapalage                    '),
(1, 12, 'patient                    ', 55214, '22554       ', 'patiemt@famasd.com                    ', 2669, '2018-08-18', 'Sahan Mapalage                    '),
(1, 13, 'asdasdas                    ', 34242, '44232       ', 'adsada                    ', 2669, '2018-08-18', 'Sahan Mapalage                    '),
(NULL, 14, 'Ruwan Wedisa                    ', 710193381, '933183297v  ', 'ruwan.wedisa0150@gmail.com                    ', 2669, '2018-08-06', 'Sahan Mapalage                    '),
(NULL, 15, 'Ruwan Wedisa                    ', 719001913, '933183297v  ', 'ruwan.wedisa0150@gmail.com                    ', 2669, '2018-08-24', 'Sahan Mapalage                    '),
(NULL, 16, 'Ruwan Wedisa                    ', 719001913, '933183297v  ', 'ruwan.wedisa0150@gmail.com                    ', 2669, '2018-08-07', 'Sahan Mapalage                    ');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` date NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `pid`, `date`, `link`) VALUES
(1, 2, '2018-08-03', '240_F_98370826_nfUZcCOoOzrqzmzQtpOG4IOlwIUiC3Mp.jpg'),
(2, 2, '2018-08-03', 'em.jpg'),
(3, 2, '2018-08-09', '3stars.png'),
(4, 0, '2018-08-06', 'chennel.png'),
(6, 81, '2018-08-06', 'doctor.png');

-- --------------------------------------------------------

--
-- Table structure for table `rbsugar`
--

CREATE TABLE `rbsugar` (
  `RBSid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `glucose` float NOT NULL,
  `afterBefore` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbsugar`
--

INSERT INTO `rbsugar` (`RBSid`, `id`, `date`, `glucose`, `afterBefore`) VALUES
(1, 1, '2018-05-04', 284, 1),
(2, 81, '2018-04-29', 354, 1),
(3, 81, '2018-05-03', 35, 0),
(4, 81, '2018-05-30', 120, 0),
(7, 81, '2018-06-13', 224, 1),
(8, 81, '2018-06-29', 142, 0),
(9, 81, '2018-07-18', 300, 1),
(10, 81, '2018-07-26', 240, 0);

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `recName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `telNo` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telHome` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `recName`, `address`, `NIC`, `telNo`, `email`, `telHome`) VALUES
(3, 'Thilini Sewwandi', 'rathnapura', '65541', 235688, 'thilini@gmail.com', 336655421);

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE `specialty` (
  `id` int(10) NOT NULL,
  `specialty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`id`, `specialty`) VALUES
(1, 'Denatal'),
(2, 'Mental'),
(3, 'Surgeon '),
(4, 'VP'),
(5, 'VOG'),
(6, 'Dermatologist '),
(7, 'Cancer Specialist '),
(8, 'Ophthalmologist'),
(9, 'NDT'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `time_shedule`
--

CREATE TABLE `time_shedule` (
  `id` int(11) NOT NULL,
  `TNo` int(10) NOT NULL,
  `Time` time NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `enable` char(1) NOT NULL,
  `bookedDate` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_shedule`
--

INSERT INTO `time_shedule` (`id`, `TNo`, `Time`, `status`, `enable`, `bookedDate`) VALUES
(2, 1, '18:00:00', '1', '0', 7),
(2, 2, '19:00:00', '1', '0', 18),
(2, 3, '20:00:00', '1', '0', 6),
(3, 4, '08:00:00', '1', '1', 0),
(3, 5, '09:00:00', '1', '0', 29);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_paypal`
--

CREATE TABLE `transaction_paypal` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `paymentid` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `complete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploadedprescriptions`
--

CREATE TABLE `uploadedprescriptions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadedprescriptions`
--

INSERT INTO `uploadedprescriptions` (`id`, `uid`, `name`, `date`) VALUES
(9, 0, 'fin.pdf', '2018-05-23'),
(8, 0, 'DNS_activity.pdf', '2018-05-10'),
(13, 81, 'fin.pdf', '2018-04-30'),
(16, 1, 'oodbms.concepts.pdf', '2018-08-22'),
(17, 2, 'oodbms.concepts.pdf', '2018-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userCategory` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `userName`, `password`, `userCategory`) VALUES
(81, 'oshan', 'b1ec116382610363540cd956821a9d6f', 4),
(1, 'ruwan', 'a619597f6455b6ff5fd08598677880d9', 1),
(84, 'kasun', 'b1ec116382610363540cd956821a9d6f', 4),
(2, 'sahan', '6e1976430566578b792771faea058fc9', 2),
(3, 'thilini', 'c3fb77d9363f2d15be8018eea9a292df', 3),
(85, 'hasanka', 'c48d4378431497c8c5345efaa44a0754', 4),
(86, 'thulki1', 'efae5dc5e0a0ecf00f826d9e776d8967', 4);

-- --------------------------------------------------------

--
-- Table structure for table `userstestdelete`
--

CREATE TABLE `userstestdelete` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `member` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstestdelete`
--

INSERT INTO `userstestdelete` (`id`, `username`, `email`, `member`) VALUES
(1, 'alex', 'ruwan.wedisa0150@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIC`),
  ADD UNIQUE KEY `userId` (`id`),
  ADD UNIQUE KEY `userId_2` (`id`);

--
-- Indexes for table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `booking_recipt`
--
ALTER TABLE `booking_recipt`
  ADD PRIMARY KEY (`refNo`);

--
-- Indexes for table `bpressure`
--
ALTER TABLE `bpressure`
  ADD PRIMARY KEY (`BPid`);

--
-- Indexes for table `cholostrol`
--
ALTER TABLE `cholostrol`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_shedule`
--
ALTER TABLE `doctor_shedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fbsugar`
--
ALTER TABLE `fbsugar`
  ADD PRIMARY KEY (`FBSid`);

--
-- Indexes for table `heightweightage`
--
ALTER TABLE `heightweightage`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `labreport`
--
ALTER TABLE `labreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latestnewsupdate`
--
ALTER TABLE `latestnewsupdate`
  ADD PRIMARY KEY (`mg_No`);

--
-- Indexes for table `medical_tips`
--
ALTER TABLE `medical_tips`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `message1`
--
ALTER TABLE `message1`
  ADD PRIMARY KEY (`M_No`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`M_No`);

--
-- Indexes for table `otherdetail`
--
ALTER TABLE `otherdetail`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`NIC`),
  ADD UNIQUE KEY `userId` (`id`),
  ADD UNIQUE KEY `userId_2` (`id`);

--
-- Indexes for table `patientsbooking`
--
ALTER TABLE `patientsbooking`
  ADD PRIMARY KEY (`refNo`);

--
-- Indexes for table `payedpatients`
--
ALTER TABLE `payedpatients`
  ADD PRIMARY KEY (`refNo`),
  ADD UNIQUE KEY `refNo` (`refNo`),
  ADD UNIQUE KEY `refNo_2` (`refNo`),
  ADD UNIQUE KEY `refNo_3` (`refNo`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `pid_2` (`pid`);

--
-- Indexes for table `rbsugar`
--
ALTER TABLE `rbsugar`
  ADD PRIMARY KEY (`RBSid`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_shedule`
--
ALTER TABLE `time_shedule`
  ADD PRIMARY KEY (`TNo`);

--
-- Indexes for table `transaction_paypal`
--
ALTER TABLE `transaction_paypal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paymentid` (`paymentid`);

--
-- Indexes for table `uploadedprescriptions`
--
ALTER TABLE `uploadedprescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userName`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `userstestdelete`
--
ALTER TABLE `userstestdelete`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking_recipt`
--
ALTER TABLE `booking_recipt`
  MODIFY `refNo` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bpressure`
--
ALTER TABLE `bpressure`
  MODIFY `BPid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cholostrol`
--
ALTER TABLE `cholostrol`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `No` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_shedule`
--
ALTER TABLE `doctor_shedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fbsugar`
--
ALTER TABLE `fbsugar`
  MODIFY `FBSid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `heightweightage`
--
ALTER TABLE `heightweightage`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `labreport`
--
ALTER TABLE `labreport`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `latestnewsupdate`
--
ALTER TABLE `latestnewsupdate`
  MODIFY `mg_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medical_tips`
--
ALTER TABLE `medical_tips`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message1`
--
ALTER TABLE `message1`
  MODIFY `M_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `M_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `otherdetail`
--
ALTER TABLE `otherdetail`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patientsbooking`
--
ALTER TABLE `patientsbooking`
  MODIFY `refNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rbsugar`
--
ALTER TABLE `rbsugar`
  MODIFY `RBSid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `specialty`
--
ALTER TABLE `specialty`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `time_shedule`
--
ALTER TABLE `time_shedule`
  MODIFY `TNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_paypal`
--
ALTER TABLE `transaction_paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploadedprescriptions`
--
ALTER TABLE `uploadedprescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `userstestdelete`
--
ALTER TABLE `userstestdelete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
