-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 10:12 AM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `pin` int(11) NOT NULL,
  `grp` varchar(255) NOT NULL,
  `complete_name` varchar(255) NOT NULL,
  `cnst2` varchar(255) NOT NULL,
  `cnst3` varchar(255) NOT NULL,
  `cnst4` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `nnst2` varchar(255) NOT NULL,
  `nnst3` varchar(255) NOT NULL,
  `nnst4` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `adrst2` varchar(255) NOT NULL,
  `adrst3` varchar(255) NOT NULL,
  `adrst4` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `pobst2` varchar(255) NOT NULL,
  `pobst3` varchar(255) NOT NULL,
  `pobst4` varchar(255) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `dobst2` datetime NOT NULL,
  `dobst3` datetime NOT NULL,
  `dobst4` datetime NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phst2` varchar(255) NOT NULL,
  `phst3` varchar(255) NOT NULL,
  `phst4` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `program_duration` int(11) NOT NULL,
  `starting_date` datetime NOT NULL,
  `reason` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `difficulties` varchar(255) NOT NULL,
  `bground` varchar(255) NOT NULL,
  `self_introduction` varchar(255) NOT NULL,
  `weakness_point` varchar(255) NOT NULL,
  `action_plan` varchar(255) NOT NULL,
  `after_teaching` varchar(11) NOT NULL DEFAULT 'checked',
  `fsp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`pin`, `grp`, `complete_name`, `cnst2`, `cnst3`, `cnst4`, `nick_name`, `nnst2`, `nnst3`, `nnst4`, `address`, `adrst2`, `adrst3`, `adrst4`, `place_of_birth`, `pobst2`, `pobst3`, `pobst4`, `date_of_birth`, `dobst2`, `dobst3`, `dobst4`, `phone`, `phst2`, `phst3`, `phst4`, `program`, `program_duration`, `starting_date`, `reason`, `target`, `difficulties`, `bground`, `self_introduction`, `weakness_point`, `action_plan`, `after_teaching`, `fsp`) VALUES
(112, 'group 11', 'josh', 'putri', 'nia', 'rere', 'hello', 'alias', 'alias 3', 'w', 'Jl. Laksamana Muda 66. Blok A1. Denpasar Selatan', 'Perum Gajah Mada, blok 4F Kebayoran lama, GG Sempit jalan sulit.', 'Jl. Bareng Jadian Kagak', 'jalanin aja dulu.', 'place of birth', 'pob 2', 'pob 3', 'ww', '2012-11-30 00:00:00', '2019-11-30 00:00:00', '2019-11-30 00:00:00', '2020-02-18 00:00:00', '629988765', '624498765', '62676543', '44', 'Confidence Elementary', 60, '2019-11-30 00:00:00', 'reason', '88', 'dificulties', 'they want to go to ', 'Below Average', 'problems', 'suggestions', 'no', ''),
(121, 'group 2', 'name 1', 'name 2', 'name 3', '', 'n', 'hello', 'l', '', 'l', 'll', 'j', '', 'Labuhanbatu Selatan', 'j', 'k', '', '2019-11-30 00:00:00', '2019-11-30 00:00:00', '2019-11-30 00:00:00', '0000-00-00 00:00:00', '62', '62', '62', '', 'Confidence Elementary - Kids', 44, '2019-11-30 00:00:00', 'tt', '', '', '', '', '', '', 'checked', ''),
(123, 'group 3', 'name 1', 'name 2', '', '', 'World', 'nn2', '', '', 'somewhere', 'adr2', '', '', 'nobody cares', '', '', '', '2012-07-07 00:00:00', '2018-05-17 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '628997665', '22', '', '', 'Confidence Elementary', 60, '2019-07-05 00:00:00', 'some reason', 'target', 'diffculties', '', 'Average', 'problems', 'suggestion', 'yes', 'yes'),
(446, '', 'Angelina Jolie', 'Complete Name', 'Cintia bella', 'Ellie Blackburn', 'brad', 'Com', 'No nickname', 'Black', 'Jl. Mangga besar yang udah busuk tapi udah sering dicuri tetangga', 'Jalan bareng jadian kagak dan loe selalu ngarep, kasian deh luu', 'Jl. Diponegoro dan soekarno, mereka berdua pasti kaya banget punya jalan dimana mana', 'Pangeran street, gang putri, blok pelakor', 'banyumas', 'Some city', 'Banyuwangi', 'Banyumas', '2002-07-11 00:00:00', '2001-06-14 00:00:00', '2009-03-20 00:00:00', '2007-12-09 00:00:00', '123456789', '62899987364727', '6299887376', '6289987763', 'Confidence Elementary - Kids', 120, '2012-12-12 00:00:00', 'no reason', 'nothing', 'A lot', 'Light blue', 'Below Average', 'a lot more', 'anything you like', 'checked', ''),
(981, '', 'name 1', 'name 2', 'name 3', '', 'j', '', '', '', 'l', '', '', '', 'l', '', '', '', '2019-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '62', '', '', '', 'Confidence Elementary', 988, '2019-11-30 00:00:00', '', '', '', '', '', '', '', 'checked', ''),
(1234, 'Group Oke', 'Herna Lastari', 'Michel', 'name', 'name', 'Herna', 'mI', 'alias', 'alias', 'Peguyangan', 'somewhere', 'adress', 'adress', 'Denpasar', 'place of birth', 'place of birth', 'place of birth', '1995-05-30 00:00:00', '2011-11-07 00:00:00', '2003-02-03 00:00:00', '2012-09-12 00:00:00', '62123456789', '6298374', '6277465', '624797', 'Confidence Elementary', 60, '2013-11-30 00:00:00', 'no reason', 'target', 'difficulties', 'backgorund', 'Below Average', 'main problemds', 'suggestions', 'checked', ''),
(2222, '', 'name', 'name 2', '', '', 'nickname', '', '', '', 'address', '', '', '', 'place of birth', '', '', '', '2019-12-08 00:00:00', '2020-02-15 18:07:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '62899', '', '', '', 'Confidence Elementary - Kids', 60, '2020-12-31 00:00:00', 'reason', 'target', 'difficulties', 'background', 'Average', 'main problems', 'suggestions', 'checked', ''),
(2223, '', 'name', '', '', '', 'alias', '', '', '', 'address', '', '', '', 'pob', '', '', '', '2009-09-09 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '62', '', '', '', 'Confidence Elementary - Kids', 60, '2019-11-30 00:00:00', 'reason', 'tar', 'diff', 'bg', 'Below Average', 'wp', 'acp', 'checked', ''),
(8576, '', 'k', '', '', '', 'k', '', '', '', 'k', '', '', '', 'k', '', '', '', '2019-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '99', '', '', '', 'Confidence Elementary - Kids', 90, '2020-02-13 00:00:00', '', '', '', '', '', '', '', 'checked', ''),
(9876, '', 'n', '', '', '', 'i', '', '', '', 'i', '', '', '', 'm', '', '', '', '2019-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '62', '', '', '', 'Confidence General', 87, '2020-02-11 00:00:00', '', '', '', '', '', '', '', 'checked', ''),
(9908, '', 'Colie', 'John', 'Adolf Blaire', '', 'alias', 'Lennon', 'Bler', '', 'Jalan laksamana nomor empat puluh dua denpasar selatan', 'somewhere', 'Somewhere', '', 'pob', 'Somewhere', 'I don\'t know', '', '2020-02-13 00:00:00', '2018-10-28 00:00:00', '2009-03-10 00:00:00', '0000-00-00 00:00:00', '6288', '99987', '99098', '', 'Confidence Elementary', 98, '0000-00-00 00:00:00', 'reason', 'target', 'hello', 'background', 'Below Average', 'problems', 'suggestions', 'yes', ''),
(22787, '', 'caesar', '', '', '', 'hello', '', '', '', 'wordl', '', '', '', '', '', '', '', '2019-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '62', '', '', '', 'Confidence Elementary - Kids', 99, '2019-11-30 00:00:00', '', '', '', '', '', '', '', 'no', ''),
(22978, '', 'please', '', '', '', 'donot go', '', '', '', 'view', '', '', '', 'okay', '', '', '', '2009-07-08 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '6281176', '', '', '', 'Confidence Junior Student', 60, '2020-02-13 00:00:00', 'reason', 'target', 'difficulties', 'background', 'Below Average', 'weakness', 'suggestion', 'yes', ''),
(445534, 'some group', 'student 2', 'student one', 'student one', 'student one', 'student 3', 'student one', 'student one', 'student one', 'student 4', 'student one', 'student one', 'student one', 'student 5', 'student one', 'student one', 'student one', '2012-12-31 00:00:00', '2111-02-04 00:00:00', '2008-08-08 00:00:00', '2002-03-12 00:00:00', '6233456', '625567774', '62899876', '62123456', 'Confidence Junior Student', 60, '2020-02-19 00:00:00', 'reason', 'target', 'difficulties', 'background', 'Below Average', 'main problem', 'hello', 'checked', ''),
(7768998, '', 'k', '', '', '', 'k', '', '', '', 'k', '', '', '', 'l', '', '', '', '2019-10-29 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '998', '', '', '', 'Confidence Elementary - Kids', 99, '2018-12-11 00:00:00', 'tt', '4', '', '', '', '', '', 'checked', ''),
(9900998, '', 'nn', '', '', '', 'nn', '', '', '', 'nn', '', '', '', 'nn', '', '', '', '2019-11-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '62', '', '', '', 'Confidence Elementary', 99, '2019-11-30 00:00:00', 'rt', 'hh', 'ff', 'rr', 'Poor', '', '', 'checked', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `pin` (`pin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `pin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9900999;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
