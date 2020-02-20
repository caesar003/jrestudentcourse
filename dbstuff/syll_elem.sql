-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 07:43 PM
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
-- Table structure for table `syll_elem`
--

CREATE TABLE `syll_elem` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `assigned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syll_elem`
--

INSERT INTO `syll_elem` (`id`, `section`, `topic`, `ind`, `status`, `assigned`) VALUES
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
(13, 1, 4, 0, 0, 0),
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
(24, 1, 6, 3, 0, 0),
(25, 1, 7, 0, 0, 0),
(26, 1, 7, 1, 0, 0),
(27, 1, 7, 2, 0, 0),
(28, 1, 8, 0, 0, 0),
(29, 1, 8, 1, 0, 0),
(30, 1, 8, 2, 0, 0),
(31, 1, 8, 3, 0, 0),
(32, 1, 9, 0, 0, 0),
(33, 1, 9, 1, 0, 0),
(34, 1, 9, 2, 0, 0),
(35, 1, 9, 3, 0, 0),
(36, 1, 10, 0, 0, 0),
(37, 1, 10, 1, 0, 0),
(38, 1, 10, 2, 0, 0),
(39, 1, 11, 0, 0, 0),
(40, 1, 11, 1, 0, 0),
(41, 1, 11, 2, 0, 0),
(42, 1, 11, 3, 0, 0),
(43, 1, 12, 0, 0, 0),
(44, 1, 12, 1, 0, 0),
(45, 1, 12, 2, 0, 0),
(46, 1, 12, 3, 0, 0),
(47, 2, 0, 0, 0, 0),
(48, 2, 1, 0, 0, 0),
(49, 2, 1, 1, 0, 0),
(50, 2, 1, 2, 0, 0),
(51, 2, 1, 3, 0, 0),
(52, 2, 2, 0, 0, 0),
(53, 2, 2, 1, 0, 0),
(54, 2, 2, 2, 0, 0),
(55, 2, 2, 3, 0, 0),
(56, 2, 3, 0, 0, 0),
(57, 2, 3, 1, 0, 0),
(58, 2, 3, 2, 0, 0),
(59, 2, 4, 0, 0, 0),
(60, 2, 4, 1, 0, 0),
(61, 2, 4, 2, 0, 0),
(62, 2, 5, 0, 0, 0),
(63, 2, 5, 1, 0, 0),
(64, 2, 5, 2, 0, 0),
(65, 2, 5, 3, 0, 0),
(66, 2, 6, 0, 0, 0),
(67, 2, 6, 1, 0, 0),
(68, 2, 6, 2, 0, 0),
(69, 2, 6, 3, 0, 0),
(70, 2, 7, 0, 0, 0),
(71, 2, 7, 1, 0, 0),
(72, 2, 7, 2, 0, 0),
(73, 2, 8, 0, 0, 0),
(74, 2, 8, 1, 0, 0),
(75, 2, 8, 2, 0, 0),
(76, 2, 9, 0, 0, 0),
(77, 2, 9, 1, 0, 0),
(78, 2, 9, 2, 0, 0),
(79, 2, 10, 0, 0, 0),
(80, 2, 10, 1, 0, 0),
(81, 2, 10, 2, 0, 0),
(82, 2, 11, 0, 0, 0),
(83, 2, 11, 1, 0, 0),
(84, 2, 11, 2, 0, 0),
(85, 2, 12, 0, 0, 0),
(86, 2, 12, 1, 0, 0),
(87, 2, 12, 2, 0, 0),
(88, 2, 12, 3, 0, 0),
(89, 3, 0, 0, 0, 0),
(90, 3, 1, 0, 0, 0),
(91, 3, 1, 1, 0, 0),
(92, 3, 1, 2, 0, 0),
(93, 3, 1, 3, 0, 0),
(94, 3, 2, 0, 0, 0),
(95, 3, 2, 1, 0, 0),
(96, 3, 2, 2, 0, 0),
(97, 3, 2, 3, 0, 0),
(98, 3, 3, 0, 0, 0),
(99, 3, 3, 1, 0, 0),
(100, 3, 3, 2, 0, 0),
(101, 3, 3, 3, 0, 0),
(102, 3, 4, 0, 0, 0),
(103, 3, 4, 1, 0, 0),
(104, 3, 4, 2, 0, 0),
(105, 3, 5, 0, 0, 0),
(106, 3, 5, 1, 0, 0),
(107, 3, 5, 2, 0, 0),
(108, 3, 5, 3, 0, 0),
(109, 3, 6, 0, 0, 0),
(110, 3, 6, 1, 0, 0),
(111, 3, 6, 2, 0, 0),
(112, 3, 6, 3, 0, 0),
(113, 3, 7, 0, 0, 0),
(114, 3, 7, 1, 0, 0),
(115, 3, 7, 2, 0, 0),
(116, 3, 8, 0, 0, 0),
(117, 3, 8, 1, 0, 0),
(118, 3, 8, 2, 0, 0),
(119, 3, 9, 0, 0, 0),
(120, 3, 9, 1, 0, 0),
(121, 3, 9, 2, 0, 0),
(122, 3, 9, 3, 0, 0),
(123, 3, 10, 0, 0, 0),
(124, 3, 10, 1, 0, 0),
(125, 3, 10, 2, 0, 0),
(126, 3, 11, 0, 0, 0),
(127, 3, 11, 1, 0, 0),
(128, 3, 11, 2, 0, 0),
(129, 3, 12, 0, 0, 0),
(130, 3, 12, 1, 0, 0),
(131, 3, 12, 2, 0, 0),
(132, 3, 12, 3, 0, 0),
(133, 4, 0, 0, 0, 0),
(134, 4, 1, 0, 0, 0),
(135, 4, 1, 1, 0, 0),
(136, 4, 1, 2, 0, 0),
(137, 4, 2, 0, 0, 0),
(138, 4, 2, 1, 0, 0),
(139, 4, 2, 2, 0, 0),
(140, 4, 3, 0, 0, 0),
(141, 4, 3, 1, 0, 0),
(142, 4, 3, 2, 0, 0),
(143, 4, 4, 0, 0, 0),
(144, 4, 4, 1, 0, 0),
(145, 4, 4, 2, 0, 0),
(146, 4, 5, 0, 0, 0),
(147, 4, 5, 1, 0, 0),
(148, 4, 5, 2, 0, 0),
(149, 4, 6, 0, 0, 0),
(150, 4, 6, 1, 0, 0),
(151, 4, 6, 2, 0, 0),
(152, 4, 7, 0, 0, 0),
(153, 4, 7, 1, 0, 0),
(154, 4, 7, 2, 0, 0),
(155, 4, 8, 0, 0, 0),
(156, 4, 8, 1, 0, 0),
(157, 4, 8, 2, 0, 0),
(158, 4, 9, 0, 0, 0),
(159, 4, 9, 1, 0, 0),
(160, 4, 9, 2, 0, 0),
(161, 4, 10, 0, 0, 0),
(162, 4, 10, 1, 0, 0),
(163, 4, 10, 2, 0, 0),
(164, 4, 11, 0, 0, 0),
(165, 4, 11, 1, 0, 0),
(166, 4, 11, 2, 0, 0),
(167, 5, 0, 0, 0, 0),
(168, 5, 1, 0, 0, 0),
(169, 5, 1, 1, 0, 0),
(170, 5, 1, 2, 0, 0),
(171, 5, 2, 0, 0, 0),
(172, 5, 2, 1, 0, 0),
(173, 5, 2, 2, 0, 0),
(174, 5, 2, 3, 0, 0),
(175, 5, 3, 0, 0, 0),
(176, 5, 3, 1, 0, 0),
(177, 5, 3, 2, 0, 0),
(178, 5, 4, 0, 0, 0),
(179, 5, 4, 1, 0, 0),
(180, 5, 4, 2, 0, 0),
(181, 5, 5, 0, 0, 0),
(182, 5, 5, 1, 0, 0),
(183, 5, 5, 2, 0, 0),
(184, 5, 5, 3, 0, 0),
(185, 5, 6, 0, 0, 0),
(186, 5, 6, 1, 0, 0),
(187, 5, 6, 2, 0, 0),
(188, 5, 7, 0, 0, 0),
(189, 5, 7, 1, 0, 0),
(190, 5, 7, 2, 0, 0),
(191, 5, 8, 0, 0, 0),
(192, 5, 8, 1, 0, 0),
(193, 5, 8, 2, 0, 0),
(194, 5, 9, 0, 0, 0),
(195, 5, 9, 1, 0, 0),
(196, 5, 9, 2, 0, 0),
(197, 5, 9, 3, 0, 0),
(198, 5, 10, 0, 0, 0),
(199, 5, 10, 1, 0, 0),
(200, 5, 10, 2, 0, 0),
(201, 5, 10, 3, 0, 0),
(202, 5, 11, 0, 0, 0),
(203, 5, 11, 1, 0, 0),
(204, 5, 11, 2, 0, 0),
(205, 5, 11, 3, 0, 0),
(206, 5, 12, 0, 0, 0),
(207, 5, 12, 1, 0, 0),
(208, 5, 12, 2, 0, 0),
(209, 5, 12, 3, 0, 0),
(210, 6, 0, 0, 0, 0),
(211, 6, 1, 0, 0, 0),
(212, 6, 1, 1, 0, 0),
(213, 6, 1, 2, 0, 0),
(214, 6, 2, 0, 0, 0),
(215, 6, 2, 1, 0, 0),
(216, 6, 2, 2, 0, 0),
(217, 6, 3, 0, 0, 0),
(218, 6, 3, 1, 0, 0),
(219, 6, 3, 2, 0, 0),
(220, 6, 4, 0, 0, 0),
(221, 6, 4, 1, 0, 0),
(222, 6, 4, 2, 0, 0),
(223, 6, 5, 0, 0, 0),
(224, 6, 5, 1, 0, 0),
(225, 6, 5, 2, 0, 0),
(226, 6, 6, 0, 0, 0),
(227, 6, 6, 1, 0, 0),
(228, 6, 6, 2, 0, 0),
(229, 6, 6, 3, 0, 0),
(230, 6, 7, 0, 0, 0),
(231, 6, 7, 1, 0, 0),
(232, 6, 7, 2, 0, 0),
(233, 6, 7, 3, 0, 0),
(234, 6, 8, 0, 0, 0),
(235, 6, 8, 1, 0, 0),
(236, 6, 8, 2, 0, 0),
(237, 6, 8, 3, 0, 0),
(238, 6, 9, 0, 0, 0),
(239, 6, 9, 1, 0, 0),
(240, 6, 9, 2, 0, 0),
(241, 6, 10, 0, 0, 0),
(242, 6, 10, 1, 0, 0),
(243, 6, 10, 2, 0, 0),
(244, 6, 11, 0, 0, 0),
(245, 6, 11, 1, 0, 0),
(246, 6, 11, 2, 0, 0),
(247, 6, 12, 0, 0, 0),
(248, 6, 12, 1, 0, 0),
(249, 6, 12, 2, 0, 0),
(250, 6, 12, 3, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `syll_elem`
--
ALTER TABLE `syll_elem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `syll_elem`
--
ALTER TABLE `syll_elem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
