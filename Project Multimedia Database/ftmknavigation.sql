-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 07:49 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ftmknavigation`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
`block_id` int(3) NOT NULL,
  `Name` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `Name`) VALUES
(1, 'D1'),
(2, 'D2'),
(3, 'B1'),
(4, 'B2'),
(5, 'DB2-1'),
(6, 'DB2-2'),
(7, 'DB1-1'),
(8, 'DB1-2');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`department_id` int(3) NOT NULL,
  `Name` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `Name`) VALUES
(1, 'Computer System & Communication'),
(2, 'Intelligent Computing and Analyt'),
(3, 'Interactive Media'),
(4, 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `in_charge`
--

CREATE TABLE IF NOT EXISTS `in_charge` (
`person_id` int(3) NOT NULL,
  `Name` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `in_charge`
--

INSERT INTO `in_charge` (`person_id`, `Name`) VALUES
(1, 'Mohd FahrulRazi bin Saji'),
(2, 'Mohd Nizam bin Said'),
(3, 'Junaidi bin Ibrahim'),
(4, 'Mohd Kamal Tarmizi bin Razak'),
(5, 'Fauzura bt Mohd Salleh'),
(6, 'Norhafizan bin Md Yusof'),
(7, 'Zuraida bt Abdul Hadi'),
(8, ' Mohd Yuzaimie bin Md Yunus'),
(9, 'Shahrizan bin Abdullah'),
(10, 'Hazre bin Haron'),
(11, 'Norfazlizah bt Mat Sapar'),
(12, 'Zubaidah bt Abd Hamid'),
(13, 'Mohammad Uzaini bin Ab Rahim'),
(14, 'Mohd Rif’an bin Abdul Rahman'),
(15, 'Sharudin bin Ab Majid'),
(16, 'Hairmi Bin Othman'),
(17, 'BadrolHisam bin Harun'),
(18, ' Jazlan Bin Jamal Abdul Nasir'),
(20, 'Mohd Haffez bin Khalik'),
(23, 'Mohammad Uzaini bin AB.Rahim'),
(24, 'Azmi bin Hussin');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
`lecturer_id` int(3) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `RoomNo` varchar(8) NOT NULL,
  `Audio` varchar(100) DEFAULT NULL,
  `Pic` varchar(32) DEFAULT NULL,
  `department_id` int(3) NOT NULL,
  `block_id` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `Name`, `RoomNo`, `Audio`, `Pic`, `department_id`, `block_id`) VALUES
(61, 'Faaizah Shahbodin', 'B/1-12', 'audio/Faaizah Shahbodin.mp4', 'image/61.jpg', 3, 3),
(62, 'Sazilah Salam', 'B/2-08', 'audio/Sazilah Salam.mp4', 'image/62.jpg', 3, 3),
(63, 'Ahmad Naim Che Pee @ Che Hanapi', 'B/3-10', 'audio/Ahmad Naim Che Pee @ Che Hanapi.mp4', 'image/63.jpg', 3, 3),
(64, 'Mohd Hafiz Zakaria', 'B/3-08', 'audio/Mohd Hafiz Zakaria.mp4', 'image/64.jpg', 3, 3),
(65, 'Norasiken Bakar', 'B/1-11', 'audio/Norasiken Bakar.mp4', 'image/65.jpg', 3, 3),
(66, 'Ahmad Shaarizan Shaarani', 'B/1-10', 'audio/Ahmad Shaarizan Shaarani.mp4', 'image/66.jpg', 3, 3),
(67, 'Farah Nadia Azman', 'B01/02', 'audio/Farah Nadia Azman.mp4', 'image/67.jpg', 3, 3),
(68, 'Hamzah Asyrani Sulaiman', 'B/3-05', 'audio/Hamzah Asyrani Sulaiman.mp4', 'image/68.jpg', 3, 3),
(69, 'Ibrahim Ahmad', 'B/2-10', 'audio/Ibrahim Ahmad.mp4', 'image/69.jpg', 3, 3),
(70, 'Muhammad Haziq Lim Abdullah', 'B/3-03', 'audio/Muhammad Haziq Lim Abdullah.mp4', 'image/70.jpg', 3, 3),
(71, 'Mohamad Lutfi Dolhalit', 'B/1-03', 'audio/Mohamad Lutfi Dolhalit.mp4', 'image/71.jpg', 3, 3),
(72, 'Sarni Suhaila Rahim', 'B/3-01', 'audio/Sarni Suhaila Rahim.mp4', 'image/72.jpg', 3, 3),
(73, 'Shahril Parumo', 'B/3-02', 'audio/Shahril Parumo.mp4', 'image/73.jpg', 3, 3),
(74, 'Shahrul Badariah Mat Sah', 'B/3-11', 'audio/Shahrul Badariah Mat Sah.mp4', 'image/74.jpg', 3, 3),
(75, 'Siti Nurul Mahfuzah Mohamad', 'B/2-07', 'audio/Siti Nurul Mahfuzah Mohamad.mp4', 'image/75.jpg', 3, 3),
(76, 'Syariffanor Hisham', 'B/3-09', 'audio/Syariffanor Hisham.mp4', 'image/76.jpg', 3, 3),
(77, 'Ulka Chandini Pendit', 'D/1-06', 'audio/Ulka Chandini Pendit.mp4', 'image/77.jpg', 3, 1),
(78, 'Zulisman Maksom', 'B/1-05', 'audio/Zulisman Maksom.mp4', 'image/78.jpg', 3, 3),
(79, 'Mohd Adili Norasikin', 'B/0-16', 'audio/Mohd Adili Norasikin.mp4', 'image/79.jpg', 3, 3),
(80, 'Muhammad Helmy Bin Emran', 'B/3-06', 'audio/Muhammad Helmy Bin Emran.mp4', 'image/80.jpg', 3, 3),
(81, 'Nazreen Abdullasim	', 'B/1-01', 'audio/Nazreen Abdullasim.mp4', 'image/81.jpg', 3, 3),
(82, 'Norazlin Mohammed', 'B/3-07', 'audio/Norazlin Mohammed.mp4', 'image/82.jpg', 3, 3),
(84, 'Wan Sazli Nasaruddin Saifudin', 'B/1-07 ', 'audio/Wan Sazli Nasaruddin Saifudin.mp4', 'image/84.jpg', 3, 3),
(85, 'Shahrin bin Sahib @ Sahibuddin', 'B/1-16', 'audio/Shahrin bin Sahib @ Sahibuddin.mp4', 'image/85.jpg', 1, 4),
(86, 'Rabiah binti Ahmad', 'B/1-17', 'audio/Rabiah binti Ahmad.mp4', 'image/86.jpg', 1, 4),
(87, 'Mohd Faizal bin Abdollah ', 'B/2-25', 'audio/Mohd Faizal bin Abdollah.mp4', 'image/87.jpg', 1, 4),
(88, 'Nor Azman bin Abu ', 'B/2-14', 'audio/Nor Azman bin Abu.mp4', 'image/88.jpg', 1, 4),
(89, 'Ariff bin Idris', 'B/1-23', 'audio/Ariff bin Idris.mp4', 'image/89.jpg', 1, 4),
(90, 'Aslinda bt. Hassan', 'B/2-04', 'audio/Aslinda bt. Hassan.mp4', 'image/90.jpg', 1, 3),
(91, 'Erman Hamid', 'B/1-22', 'audio/Erman Hamid.mp4', 'image/91.jpg', 1, 4),
(92, 'Haniza Nahar', 'B/1-25', 'audio/Haniza Nahar.mp4', 'image/92.jpg', 1, 4),
(93, 'Mohammad Radzi Motsidi', 'B/2-18', 'audio/Mohammad Radzi Motsidi.mp4', 'image/93.jpg', 1, 4),
(94, 'Mohd Zaki Mas’ud', 'B/2-20', 'audio/Mohd Zaki Mas’ud.mp4', 'image/94.jpg', 1, 4),
(95, 'Mohd. Fairuz Iskandar Othman', 'B/2-01', 'audio/Mohd. Fairuz Iskandar Othman.mp4', 'image/85.jpg', 1, 3),
(96, 'Mohd. Rizuan Baharon', 'B/2-19', 'audio/Mohd. Rizuan Baharon.mp4', 'image/96.jpg', 1, 4),
(97, 'Nazrulazhar Bahaman', 'B/2-09', 'audio/Nazrulazhar Bahaman.mp4', 'image/97.jpg', 1, 3),
(98, 'Nor Azman Mat Ariff', 'B/1-20', 'audio/Nor Azman Mat Ariff.mp4', 'image/98.jpg', 1, 4),
(99, 'Norharyati Harum', 'B/2-05', 'audio/Norharyati Harum.mp4', 'image/99.jpg', 1, 3),
(100, 'Nur Fadzilah Othman', 'D/3-07', 'audio/Nur Fadzilah Othman.mp4', 'image/100.jpg', 1, 1),
(101, 'Nurul Azma Zakaria', 'B/1-18', 'audio/Nurul Azma Zakaria.mp4', NULL, 1, 4),
(102, 'Othman Mohd', 'B/2-13', 'audio/Othman Mohd.mp4', 'image/102.jpg', 1, 4),
(103, 'Raihana Syahirah Abdullah', 'B/2-03', 'audio/aihana Syahirah Abdullah.mp4', 'image/103.jpg', 1, 3),
(104, 'Robiah Yusof', 'B/2-22', 'audio/Robiah Yusof.mp4', 'image/104.jpg', 1, 4),
(105, 'S.M.Warusia Mohamed S.M.M Yassin', 'B/2-24', 'audio/S.M.Warusia Mohamed S.M.M Yassin.mp4', 'image/105.jpg', 1, 4),
(106, 'Shekh Faisal Abdul Latip', 'B/1-24', 'audio/Shekh Faisal Abdul Latip.mp4', 'image/106.jpg', 1, 4),
(107, 'Siti Rahayu Selamat', 'B/2-23', 'audio/Siti Rahayu Selamat.mp4', 'image/107.jpg', 1, 4),
(108, 'Syarulnaziah Anawar', 'B/1-27', 'audio/Syarulnaziah Anawar.mp4', 'image/108.jpg', 1, 4),
(109, 'Wahidah Md. Shah', 'B/2-11', 'audio/Wahidah Md. Shah.mp4', 'image/109.jpg', 1, 3),
(110, 'Zaheera Zainal Abidin', 'B/1-28', 'audio/Zaheera Zainal Abidin.mp4', 'image/110.jpg', 1, 4),
(111, 'Zakiah Ayop', 'B/1-26', 'audio/Zakiah Ayop.mp4', 'image/111.jpg', 1, 4),
(112, 'Zulkiflee Muslim', 'B/2-16', 'audio/Zulkiflee Muslim.mp4', 'image/112.jpg', 1, 4),
(113, 'Zurina Saaya', '	B/2-02', 'audio/Zurina Saaya.mp4', 'image/113.jpg', 1, 4),
(114, 'Khadijah Wan Mohd. Ghazali	', 'B/1-21', 'audio/Khadijah Wan Mohd. Ghazali.mp4', 'image/114.jpg', 1, 4),
(115, 'Irda Roslan', 'B/1-19', 'audio/Irda Roslan.mp4', 'image/115.jpg', 1, 4),
(116, 'Marliza Ramly', 'B/2-17', 'audio/Marliza Ramly.mp4', 'image/116.jpg', 1, 4),
(117, 'Mohd Hakim Abdul Hamid', 'B/2-06', 'audio/Mohd Hakim Abdul Hamid.mp4', 'image/117.jpg', 1, 3),
(118, 'Mohd Najwan Md Khambari	', 'B/2-21', 'audio/Mohd Najwan Md Khambari .mp4', 'image/118.jpg', 1, 4),
(119, 'Muhamad Syahrul Azhar Sani', 'B/2-26', 'audio/Muhamad Syahrul Azhar Sani.mp4', 'image/119.jpg', 1, 4),
(120, 'Suhaimi Basrah', 'B/2-15', 'audio/Suhaimi Basrah.mp4', 'image/120.jpg', 1, 4),
(121, 'Mohd. Khanapi Abd. Ghani', 'D/G 04', 'audio/Mohd. Khanapi Abd. Ghani.mp4', 'image/121.jpg', 4, 1),
(122, 'Nanna Suryana Herman', 'D/G 12', 'audio/Nanna Suryana Herman.mp4', 'image/122.jpg', 4, 1),
(123, 'Massila Kamalrudin', 'D/G 15', 'audio/Massila Kamalrudin.mp4', 'image/123.jpg', 4, 1),
(124, 'Nurul Akmar Emran', 'D/1-011', 'audio/Nurul Akmar Emran.mp4', 'image/124.jpg', 4, 1),
(125, 'Sabrina Ahmad', 'D/1-05', 'audio/Sabrina Ahmad.mp4', 'image/125.jpg', 4, 1),
(126, 'Mohd Sanusi Azmi', 'D/G 13', 'audio/Mohd Sanusi Azmi.mp4', 'image/126.jpg', 4, 1),
(127, 'Abdul Karim Mohamad', 'D/2-26', 'audio/Abdul Karim Mohamad.mp4', 'image/127.jpg', 4, 2),
(128, 'Abdul Razak Hussain', 'D/G 14', 'audio/Abdul Razak Hussain.mp4', 'image/128.jpg', 4, 1),
(129, 'Hidayah Rahmalan', 'D/2-08', 'audio/Hidayah Rahmalan.mp4', 'image/129.jpg', 4, 1),
(130, 'Intan Ermahani A. Jalil', 'D/G 11', 'audio/Intan Ermahani A. Jalil.mp4', 'image/130.jpg', 4, 1),
(131, 'Kasturi Kanchymalay	', 'D/G 01', 'audio/Kasturi Kanchymalay.mp4', 'image/131.jpg', 4, 1),
(132, 'Lizawati Salahuddin', 'D/3-13', 'audio/Lizawati Salahuddin.mp4', 'image/132.jpg', 4, 1),
(133, 'Mashanum Osman', 'D/2-14', 'audio/Mashanum Osman.mp4', 'image/133.jpg', 4, 1),
(134, 'Maslita Abd. Aziz', 'D/2-12', 'audio/Maslita Abd. Aziz.mp4', 'image/134.jpg', 4, 1),
(135, 'Noor Azilah Draman @ Muda', 'D/1-04', 'audio/Noor Azilah Draman @ Muda.mp4', 'image/135.jpg', 4, 1),
(136, 'Nor Haslinda Ismail', 'D/3-13', 'audio/Nor Haslinda Ismail.mp4', 'image/136.jpg', 4, 1),
(137, 'Norashikin Ahmad', 'D/1-08', 'audio/Norashikin Ahmad.mp4', 'image/137.jpg', 4, 1),
(138, 'Noraswaliza Abdullah', 'D1/13', 'audio/Noraswaliza Abdullah.mp4', 'image/138.jpg', 4, 1),
(139, 'Nor Hafeizah Hassan', 'D/1-02', 'audio/Nor Hafeizah Hassan.mp4', 'image/139.jpg', 4, 1),
(140, 'Nurazlina Mohd Sanusi', 'D/2-21', 'audio/Nurazlina Mohd Sanusi.mp4', 'image/140.jpg', 4, 1),
(143, 'Nuridawati Mustafa', 'D/G-03', 'audio/Nuridawati Mustafa.mp4', 'image/143.jpg', 4, 1),
(144, 'Raja Rina binti Raja Ikram	', 'D/2-10', 'audio/Raja Rina binti Raja Ikram.mp4', 'image/144.jpg', 4, 1),
(145, 'Rosleen Abd. Samad', 'D/2-03', 'audio/Rosleen Abd. Samad.mp4', 'image/145.jpg', 4, 1),
(146, 'Safiza Suhana Kamal Baharin', 'Safiza S', 'audio/Safiza Suhana Kamal Baharin.mp4', 'image/146.jpg', 4, 1),
(147, 'Satrya Fajri Pratama', 'D/2-02', 'audio/Satrya Fajri Pratama.mp4', 'image/147.jpg', 4, 1),
(148, 'Ummi Raba’ah Hashim', 'D/3-11', 'audio/Ummi Raba’ah Hashim.mp4', 'image/148.jpg', 4, 1),
(149, 'Yahaya Abd. Rahim', 'D/G-08', 'audio/Yahaya Abd. Rahim.mp4', 'image/149.jpg', 4, 1),
(150, 'Yahya Ibrahim', 'D/2-05', 'audio/Yahya Ibrahim.mp4', 'image/150.jpg', 4, 1),
(151, 'Zahriah Othman', 'D/2-04', 'audio/Zahriah Othman.mp4', 'image/151.jpg', 4, 1),
(152, 'Amir Syarifuddin Kasim', 'D/2-01', 'audio/Amir Syarifuddin Kasim.mp4', 'image/152.jpg', 4, 1),
(153, 'Aniza Othman	', 'B/1-04', 'audio/Aniza Othman .mp4', 'image/153.jpg', 4, 1),
(154, 'Azlianor Abdul Aziz', 'D/2-06', 'audio/Azlianor Abdul Aziz.mp4', 'image/154.jpg', 4, 1),
(155, 'Emaliana Kasmuri', 'D/3-10', 'audio/Emaliana Kasmuri.mp4', 'image/155.jpg', 4, 1),
(156, 'Mohd Hariz Naim @ Mohayat', 'D/3-01', 'audio/Mohd Hariz Naim @ Mohayat.mp4', 'image/156.jpg', 4, 1),
(157, 'Mohd. Fadzil Zulkifli', 'D/G 06', 'audio/Mohd. Fadzil Zulkifli.mp4', 'image/157.jpg', 4, 1),
(158, 'Muhammad Suhaizan Sulong', 'D/G 07', 'audio/Muhammad Suhaizan Sulong.mp4', 'image/158.jpg', 4, 1),
(159, 'Nor Mas Aina Md. Bohari', 'D/2-07', 'audio/Nor Mas Aina Md. Bohari.mp4', 'image/159.jpg', 4, 1),
(160, 'Rosmiza Wahida Abdullah', 'D/1-07', 'audio/Rosmiza Wahida Abdullah.mp4', 'image/160.jpg', 4, 1),
(161, 'Syahida Mohtar', 'D/3-08', 'audio/Syahida Mohtar.mp4', 'image/161.jpg', 4, 1),
(162, 'Zarita Mohd Kosnin', 'D/1-01', 'audio/Zarita Mohd Kosnin.mp4', 'image/162.jpg', 4, 1),
(163, 'Abd Samad Hasan Basari', 'D/G-23', 'audio/Abd Samad Hasan Basari.mp3', 'image/163.jpg', 2, 2),
(164, 'Goh Ong Sing', 'D/1-30', 'audio/Goh Ong Sing.mp3', 'image/164.png', 2, 2),
(165, 'Asmala Ahmad', 'D/1-28', 'audio/Asmala Ahmad.mp3', 'image/165.jpg', 2, 2),
(166, 'Azah Kamilah Draman @ Muda', 'D/1-012', 'audio/Azah Kamilah Draman @ Muda.mp3', 'image/166.jpg', 2, 1),
(167, 'Burhanuddin Mohd. Aboobaider', 'D/1-29', 'audio/Burhanuddin Mohd. Aboobaider.mp3', 'image/167.jpg', 2, 2),
(168, 'Choo Yun Huoy', 'D/1-23', 'audio/Choo Yun Huoy.mp3', 'image/168.jpg', 2, 2),
(169, 'Sharifah Sakinah Syed Ahmad', 'D/2-22', 'audio/Sharifah Sakinah Syed Ahmad.mp3', 'image/169.png', 2, 2),
(170, 'Zuraida Abal Abas', 'D/1-27', 'audio/Zuraida Abal Abas.mp3', 'image/170.jpg', 2, 2),
(171, 'Abdul Syukor Mohamad Jaya', 'D/G-24', 'audio/Abdul Syukor Mohamad Jaya.mp3', 'image/171.jpg', 2, 2),
(172, 'Ahmad Fadzli Nizam Abdul Rahman', 'D/1-22', 'audio/Ahmad Fadzli Nizam Abdul Rahman.mp4', 'image/172.jpg', 2, 2),
(173, 'Fauziah Kasmin', 'D/1-19', 'audio/Fauziah Kasmin.mp3', 'image/173.jpg', 2, 2),
(174, 'Gede Pramudya Ananta', 'DG/30', 'audio/Gede Pramudya Ananta.mp3', 'image/174.jpg', 2, 2),
(175, 'Halizah Basiron', 'DG/29', 'audio/Halizah Basiron.mp3', 'image/175.jpg', 2, 2),
(176, 'Ngo Hea Choon', 'D/2-20', 'audio/Ngo Hea Choon.mp3', 'image/176.jpg', 2, 2),
(177, 'Noor Fazilla Abd Yusof', 'D/1-20', 'audio/Noor Fazilla Abd Yusof.mp3', 'image/177.jpg', 2, 2),
(223, 'Norhazwani Md Yunos', 'D/2-17', 'audio/Norhazwani Md Yunos.mp3', 'image/223.jpg', 2, 2),
(224, 'Norzihani Yusof', 'D/G-21', 'audio/Norzihani Yusof.mp3', 'image/224.jpg', 2, 2),
(225, 'Nur Zareen Zulkarnain', 'D/G-18', 'audio/Nur Zareen Zulkarnain.mp3', 'image/225.jpg', 2, 2),
(226, 'Nuzulha Khilwani Ibrahim', 'D/G-20', 'audio/Nuzulha Khilwani Ibrahim.mp3', 'image/226.jpg', 2, 2),
(227, 'Sazalinsyah Razali', 'D/1-21', 'audio/Sazalinsyah Razali.mp3', 'image/227.jpg', 2, 2),
(228, 'Sek Yong Wee	', 'D/G-28', 'audio/Sek Yong Wee.mp3', 'image/228.jpg', 2, 2),
(229, 'Siti Azirah Asmai', 'D/G-22', 'audio/Siti Azirah Asmai.mp3', 'image/229.jpg', 2, 2),
(230, 'Yogan J Kumar	', 'D/G-25', 'audio/Yogan J Kumar.mp3', 'image/230.jpg', 2, 2),
(231, 'Zahriah Sahri	', 'D/G-19', 'audio/Zahriah Sahri.mp3', 'image/231.jpg', 2, 2),
(232, 'Zeratul Izzah Mohd. Yusoh', 'D/2-23', 'audio/Zeratul Izzah Mohd. Yusoh.mp3', 'image/232.jpg', 2, 2),
(233, 'Zuraini Othman', 'D/1-18', 'audio/Zuraini Othman.mp3', 'image/233.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`room_id` int(3) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Location` varchar(32) NOT NULL,
  `block_id` int(3) NOT NULL,
  `person_id` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `Name`, `Location`, `block_id`, `person_id`) VALUES
(1, 'Mini Theatre', 'Level 3', 5, 9),
(2, 'Studio Pengambaran', 'Level 3', 5, 9),
(3, 'Studio Realiti Maya', 'Level 1', 5, 8),
(4, 'Bilik Rakaman Audio', 'Level 3', 5, 9),
(5, 'Makmal Eksekutif', 'Level 3', 7, 1),
(6, 'Makmal Fiber Optik', 'Level 2', 6, 2),
(7, 'Makmal Kejuruteraan Perisian 1', 'Level 1', 7, 3),
(8, 'Makmal Kejuruteraan Perisian 2', 'Level 1', 7, 3),
(9, 'Makmal Kejuruteraan Perisian 3', 'Level 1', 7, 4),
(10, 'Makmal Kepintaran Buatan 1', 'Level 2', 8, 5),
(11, 'Makmal Kepintaran Buatan 2', 'Level 2', 8, 6),
(12, 'Makmal Kepintaran Buatan 3', 'Level 2', 8, 5),
(13, 'Makmal Kepintaran Buatan 4', 'Level 2', 8, 6),
(14, 'Makmal Keselamatan 2', 'Level 3', 8, 7),
(15, 'Makmal Multimedia 1', 'Level 2', 6, 8),
(16, 'Makmal Multimedia 2', 'Level 2', 6, 8),
(17, 'Makmal Multimedia 3', 'Level 3', 6, 9),
(18, 'Makmal Multimedia 4', 'Level 3', 6, 10),
(19, 'Makmal Pangkalan Data 1', 'Level 2', 7, 11),
(35, 'Makmal Pangkalan Data 2', 'Level 2', 7, 12),
(36, 'Makmal Pangkalan Data 3', 'Level 2', 7, 12),
(37, 'Makmal Pengaturcaraan 1', 'Level 1', 8, 13),
(38, 'Makmal Pengaturcaraan 2', 'Level 1', 8, 11),
(39, 'Makmal Pengaturcaraan 3', 'Level 4', 7, 14),
(40, 'Makmal Pengaturcaraan 4', 'Level 4', 7, 14),
(41, 'Makmal Permainan Komputer', 'Level 2', 7, 15),
(42, 'Makmal Bengkel BITD', 'Level 4', 7, 23),
(43, 'Makmal Rangkaian 1', 'Level 3', 7, 16),
(44, 'Makmal Rangkaian 2', 'Level 2', 7, 17),
(45, 'Makmal Realiti Maya', 'Level 3', 5, 10),
(46, 'Makmal Sistem', 'Level 3', 7, 18),
(47, 'Makmal Sistem Perkakasan', 'Level 3', 7, 18),
(48, 'Makmal Tanpa Wayar', 'Level 3', 8, 7),
(49, 'Makmal CCNA / CCNP', 'Level 2', 6, 20),
(50, 'Makmal Bengkel SKK', 'Level 3', 8, 16),
(51, 'Bilik Kuliah 1', 'Level 1', 7, 24),
(52, 'Bilik Kuliah 2', 'Level 1', 7, 24),
(53, 'Bilik Kuliah 3', 'Level 1', 7, 24),
(54, 'Bilik Kuliah 4', 'Level 1', 7, 24),
(55, 'Bilik Kuliah 5', 'Level 1', 7, 1),
(56, 'Bilik Kuliah 6', 'Level 1', 8, 1),
(57, 'Bilik Kuliah 7', 'Level 1', 8, 1),
(58, 'Bilik Kuliah 8', 'Level 1', 8, 1),
(59, 'Bilik Kuliah 9 & 10', 'Level 1', 5, 20),
(60, 'Bilik Kuliah 11', 'Level 1', 5, 20),
(61, 'Bilik Kuliah 12', 'Level 1', 5, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
 ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `in_charge`
--
ALTER TABLE `in_charge`
 ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
 ADD PRIMARY KEY (`lecturer_id`), ADD KEY `department_id` (`department_id`), ADD KEY `block_id` (`block_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`room_id`), ADD KEY `block_id` (`block_id`), ADD KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
MODIFY `block_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `in_charge`
--
ALTER TABLE `in_charge`
MODIFY `person_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
MODIFY `lecturer_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `room_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
ADD CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
ADD CONSTRAINT `lecturer_ibfk_2` FOREIGN KEY (`block_id`) REFERENCES `block` (`block_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `block` (`block_id`),
ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `in_charge` (`person_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
