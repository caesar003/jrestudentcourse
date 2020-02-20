-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 07:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `syll_sen`
--

CREATE TABLE `syll_sen` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `assigned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syll_sen`
--

INSERT INTO `syll_sen` (`id`, `section`, `topic`, `ind`, `status`, `assigned`) VALUES
(1, 1, 0, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 1, 0, 0),
(4, 1, 1, 2, 0, 0),
(5, 1, 1, 3, 0, 0),
(6, 1, 2, 0, 0, 0),
(7, 1, 2, 1, 0, 0),
(8, 1, 2, 2, 0, 0),
(9, 1, 2, 3, 0, 0),
(10, 1, 3, 0, 0, 0),
(11, 1, 3, 1, 0, 0),
(12, 1, 3, 2, 0, 0),
(13, 1, 3, 0, 0, 0),
(14, 1, 4, 1, 0, 0),
(15, 1, 4, 2, 0, 0),
(16, 1, 4, 3, 0, 0),
(17, 1, 5, 0, 0, 0),
(18, 1, 5, 1, 0, 0),
(19, 1, 5, 2, 0, 0),
(20, 1, 5, 3, 0, 0),
(21, 1, 6, 0, 0, 0),
(22, 1, 6, 1, 0, 0),
(23, 1, 6, 2, 0, 0),
(24, 1, 7, 0, 0, 0),
(25, 1, 7, 1, 0, 0),
(26, 1, 7, 2, 0, 0),
(27, 1, 7, 3, 0, 0),
(28, 1, 8, 0, 0, 0),
(29, 1, 8, 1, 0, 0),
(30, 1, 8, 2, 0, 0),
(31, 1, 8, 3, 0, 0),
(32, 2, 0, 0, 0, 0),
(33, 2, 1, 0, 0, 0),
(34, 2, 1, 1, 0, 0),
(35, 2, 1, 2, 0, 0),
(36, 2, 1, 3, 0, 0),
(37, 2, 2, 0, 0, 0),
(38, 2, 2, 1, 0, 0),
(39, 2, 2, 2, 0, 0),
(40, 2, 2, 3, 0, 0),
(41, 2, 3, 0, 0, 0),
(42, 2, 3, 1, 0, 0),
(43, 2, 3, 2, 0, 0),
(44, 2, 3, 3, 0, 0),
(45, 2, 4, 0, 0, 0),
(46, 2, 4, 1, 0, 0),
(47, 2, 4, 2, 0, 0),
(48, 2, 4, 3, 0, 0),
(49, 2, 5, 0, 0, 0),
(50, 2, 5, 1, 0, 0),
(51, 2, 5, 2, 0, 0),
(52, 2, 5, 3, 0, 0),
(53, 2, 6, 0, 0, 0),
(54, 2, 6, 1, 0, 0),
(55, 2, 6, 2, 0, 0),
(56, 2, 7, 0, 0, 0),
(57, 2, 7, 1, 0, 0),
(58, 2, 7, 2, 0, 0),
(59, 2, 7, 3, 0, 0),
(60, 2, 8, 0, 0, 0),
(61, 2, 8, 1, 0, 0),
(62, 2, 8, 2, 0, 0),
(63, 2, 9, 0, 0, 0),
(64, 2, 9, 1, 0, 0),
(65, 2, 9, 2, 0, 0),
(66, 2, 10, 0, 0, 0),
(67, 2, 10, 1, 0, 0),
(68, 2, 10, 2, 0, 0),
(69, 2, 10, 3, 0, 0),
(70, 2, 11, 0, 0, 0),
(71, 2, 11, 1, 0, 0),
(72, 2, 11, 2, 0, 0),
(73, 2, 11, 3, 0, 0),
(74, 3, 0, 0, 0, 0),
(75, 3, 1, 0, 0, 0),
(76, 3, 1, 1, 0, 0),
(77, 3, 1, 2, 0, 0),
(78, 3, 1, 0, 0, 0),
(79, 3, 2, 1, 0, 0),
(80, 3, 2, 2, 0, 0),
(81, 3, 2, 3, 0, 0),
(82, 3, 3, 0, 0, 0),
(83, 3, 3, 1, 0, 0),
(84, 3, 3, 2, 0, 0),
(85, 3, 3, 3, 0, 0),
(86, 3, 4, 0, 0, 0),
(87, 3, 4, 1, 0, 0),
(88, 3, 4, 2, 0, 0),
(89, 3, 5, 0, 0, 0),
(90, 3, 5, 1, 0, 0),
(91, 3, 5, 2, 0, 0),
(92, 3, 5, 3, 0, 0),
(93, 3, 6, 0, 0, 0),
(94, 3, 6, 1, 0, 0),
(95, 3, 6, 2, 0, 0),
(96, 3, 7, 0, 0, 0),
(97, 3, 7, 1, 0, 0),
(98, 3, 7, 2, 0, 0),
(99, 3, 8, 0, 0, 0),
(100, 3, 8, 1, 0, 0),
(101, 3, 8, 2, 0, 0),
(102, 3, 8, 3, 0, 0),
(103, 3, 9, 0, 0, 0),
(104, 3, 9, 1, 0, 0),
(105, 3, 9, 2, 0, 0),
(106, 3, 10, 0, 0, 0),
(107, 3, 10, 1, 0, 0),
(108, 3, 10, 2, 0, 0),
(109, 3, 11, 0, 0, 0),
(110, 3, 11, 1, 0, 0),
(111, 3, 11, 2, 0, 0),
(112, 3, 12, 0, 0, 0),
(113, 3, 12, 1, 0, 0),
(114, 3, 12, 3, 0, 0),
(115, 3, 13, 0, 0, 0),
(116, 3, 13, 1, 0, 0),
(117, 3, 13, 2, 0, 0),
(118, 3, 13, 3, 0, 0),
(119, 4, 0, 0, 0, 0),
(120, 4, 1, 0, 0, 0),
(121, 4, 1, 1, 0, 0),
(122, 4, 1, 2, 0, 0),
(123, 4, 1, 3, 0, 0),
(124, 4, 2, 0, 0, 0),
(125, 4, 2, 1, 0, 0),
(126, 4, 2, 2, 0, 0),
(127, 4, 2, 3, 0, 0),
(128, 4, 3, 0, 0, 0),
(129, 4, 3, 1, 0, 0),
(130, 4, 3, 2, 0, 0),
(131, 4, 3, 0, 0, 0),
(132, 4, 4, 0, 0, 0),
(133, 4, 4, 1, 0, 0),
(134, 4, 4, 2, 0, 0),
(135, 4, 4, 0, 0, 0),
(136, 4, 5, 0, 0, 0),
(137, 4, 5, 1, 0, 0),
(138, 4, 5, 2, 0, 0),
(139, 4, 6, 0, 0, 0),
(140, 4, 6, 1, 0, 0),
(141, 4, 6, 2, 0, 0),
(142, 4, 6, 3, 0, 0),
(143, 4, 7, 0, 0, 0),
(144, 4, 7, 1, 0, 0),
(145, 4, 7, 2, 0, 0),
(146, 4, 7, 3, 0, 0),
(147, 4, 8, 0, 0, 0),
(148, 4, 8, 1, 0, 0),
(149, 4, 8, 2, 0, 0),
(150, 4, 8, 3, 0, 0),
(151, 4, 9, 0, 0, 0),
(152, 4, 9, 1, 0, 0),
(153, 4, 9, 2, 0, 0),
(154, 4, 9, 3, 0, 0),
(155, 4, 10, 0, 0, 0),
(156, 4, 10, 1, 0, 0),
(157, 4, 10, 2, 0, 0),
(158, 5, 0, 0, 0, 0),
(159, 5, 1, 0, 0, 0),
(160, 5, 1, 1, 0, 0),
(161, 5, 1, 2, 0, 0),
(162, 5, 1, 3, 0, 0),
(163, 5, 2, 0, 0, 0),
(164, 5, 2, 1, 0, 0),
(165, 5, 2, 2, 0, 0),
(166, 5, 2, 3, 0, 0),
(167, 5, 3, 0, 0, 0),
(168, 5, 3, 1, 0, 0),
(169, 5, 3, 2, 0, 0),
(170, 5, 4, 0, 0, 0),
(171, 5, 4, 1, 0, 0),
(172, 5, 4, 2, 0, 0),
(173, 5, 4, 3, 0, 0),
(174, 5, 5, 0, 0, 0),
(175, 5, 5, 1, 0, 0),
(176, 5, 5, 2, 0, 0),
(177, 5, 5, 3, 0, 0),
(178, 5, 6, 0, 0, 0),
(179, 5, 6, 1, 0, 0),
(180, 5, 6, 2, 0, 0),
(181, 5, 6, 3, 0, 0),
(182, 5, 7, 0, 0, 0),
(183, 5, 7, 1, 0, 0),
(184, 5, 7, 2, 0, 0),
(185, 5, 8, 0, 0, 0),
(186, 5, 8, 1, 0, 0),
(187, 5, 8, 2, 0, 0),
(188, 5, 8, 3, 0, 0),
(189, 5, 9, 0, 0, 0),
(190, 5, 9, 1, 0, 0),
(191, 5, 9, 2, 0, 0),
(192, 5, 9, 3, 0, 0),
(193, 5, 10, 0, 0, 0),
(194, 5, 10, 1, 0, 0),
(195, 5, 10, 2, 0, 0),
(196, 5, 11, 0, 0, 0),
(197, 5, 11, 1, 0, 0),
(198, 5, 11, 2, 0, 0),
(199, 5, 12, 0, 0, 0),
(200, 5, 12, 1, 0, 0),
(201, 5, 12, 2, 0, 0),
(202, 5, 12, 0, 0, 0),
(203, 6, 0, 0, 0, 0),
(204, 6, 1, 0, 0, 0),
(205, 6, 1, 1, 0, 0),
(206, 6, 1, 2, 0, 0),
(207, 6, 2, 0, 0, 0),
(208, 6, 2, 1, 0, 0),
(209, 6, 2, 2, 0, 0),
(210, 6, 3, 0, 0, 0),
(211, 6, 3, 1, 0, 0),
(212, 6, 3, 2, 0, 0),
(213, 6, 4, 0, 0, 0),
(214, 6, 4, 1, 0, 0),
(215, 6, 4, 2, 0, 0),
(216, 6, 5, 0, 0, 0),
(217, 6, 5, 1, 0, 0),
(218, 6, 5, 2, 0, 0),
(219, 6, 5, 3, 0, 0),
(220, 6, 6, 0, 0, 0),
(221, 6, 6, 1, 0, 0),
(222, 6, 6, 2, 0, 0),
(223, 6, 6, 3, 0, 0),
(224, 6, 7, 0, 0, 0),
(225, 6, 7, 1, 0, 0),
(226, 6, 7, 2, 0, 0),
(227, 6, 8, 0, 0, 0),
(228, 6, 8, 1, 0, 0),
(229, 6, 8, 2, 0, 0),
(230, 6, 8, 3, 0, 0),
(231, 6, 9, 0, 0, 0),
(232, 6, 9, 1, 0, 0),
(233, 6, 9, 2, 0, 0),
(234, 6, 9, 3, 0, 0),
(235, 6, 10, 0, 0, 0),
(236, 6, 10, 1, 0, 0),
(237, 6, 10, 2, 0, 0),
(238, 6, 10, 3, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `syll_sen`
--
ALTER TABLE `syll_sen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `syll_sen`
--
ALTER TABLE `syll_sen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
