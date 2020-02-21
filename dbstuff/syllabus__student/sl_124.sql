-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 02:53 PM
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
-- Table structure for table `sl_124` kids
--

CREATE TABLE `sl_124` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sl_124`
--

INSERT INTO `sl_124` (`id`, `section`, `topic`, `ind`, `indicator`) VALUES
(1, 1, 0, 0, 'INTRODUCTION'),
(2, 1, 1, 0, 'GREETING'),
(3, 1, 1, 1, 'able to mention expressions of greeting'),
(4, 1, 1, 2, 'giving respond and asking greeting expression'),
(5, 1, 1, 3, 'create simple dialogue relates to greeting expression'),
(6, 1, 2, 0, 'INTRODUCTION'),
(7, 1, 2, 1, 'students are able to introduce themselves in simple way'),
(8, 1, 2, 2, 'asking someone identities'),
(9, 1, 2, 3, 'introduce other people'),
(10, 1, 3, 0, 'ALPHABET AND SPELLING'),
(11, 1, 3, 1, 'spell alphabet accurately from A-Z'),
(12, 1, 3, 2, 'using axpressions to ask someone to spell something'),
(13, 1, 4, 0, 'NUMBER (CARDINAL & ORDINAL)'),
(14, 1, 4, 1, 'mention  all different type of numbers'),
(15, 1, 4, 2, 'apply the use of the numbers in some contexts'),
(16, 1, 4, 3, 'create daily conversation relates to numbers'),
(17, 1, 5, 0, 'TALKING ABOUT FAMILY'),
(18, 1, 5, 1, 'students are able to mention vocabularies related to family members'),
(19, 1, 5, 2, 'describe relation among family members'),
(20, 1, 5, 3, 'asking question relate to family and giving respond to the question'),
(21, 1, 6, 0, 'SUBJECT AND OBJECT PRONOUN'),
(22, 1, 6, 1, 'mentions subject and object pronoun in English'),
(23, 1, 6, 2, 'change noun into sunject or object pronoun accurately '),
(24, 1, 6, 3, 'create simple sentences by using subject and object pronoun'),
(25, 1, 7, 0, 'POSSESSIVE ADJECTIVE & PRONOUN'),
(26, 1, 7, 1, 'mention and identifies poss. Adjective and poss. Pronoun'),
(27, 1, 7, 2, 'create simple text about possesive '),
(28, 1, 8, 0, 'SIMPLE PRESENT WITH TO BE'),
(29, 1, 8, 1, 'identifies the pattern of nominal sentences '),
(30, 1, 8, 2, 'create simple nominal sentences'),
(31, 1, 8, 3, 'describe simple thing by using nominal sentences'),
(32, 1, 9, 0, 'SIMPLE PRESENT WITH VERB'),
(33, 1, 9, 1, 'identifiying the pattern of verbal sentences'),
(34, 1, 9, 2, 'create verbal sentences correctly '),
(35, 1, 9, 3, 'able to express some daily activities using verbal sentences'),
(36, 1, 10, 0, 'DAILY ACTIVITY'),
(37, 1, 10, 1, 'mention vocabularies relate to daily activities'),
(38, 1, 10, 2, 'students are able to tell their daily activities'),
(39, 1, 10, 3, 'asking someone daily actvities '),
(40, 1, 11, 0, 'ADVERB OF FREQUENCY'),
(41, 1, 11, 1, 'mention various kinds of adverb of frequency '),
(42, 1, 11, 2, 'describing the frequency of doing  certain activities'),
(43, 1, 11, 3, 'asking question how often someone does  certain activities'),
(44, 2, 0, 0, 'SIMPLE COMMUNICATION'),
(45, 2, 1, 0, 'BUILDING AND PLACE'),
(46, 2, 1, 1, 'mention vocabularies about building and place'),
(47, 2, 1, 2, 'describing location of building and place'),
(48, 2, 1, 3, 'asking question related to location of public places'),
(49, 2, 2, 0, 'ASKING AND GIVING DIRECTION'),
(50, 2, 2, 1, 'comprehend vocabularies relate to giving direction '),
(51, 2, 2, 2, 'giving direation to certain places'),
(52, 2, 2, 3, 'asking direction to other people'),
(53, 2, 3, 0, 'FOOD AND DRINK'),
(54, 2, 3, 1, 'recall name of food and beverage'),
(55, 2, 3, 2, 'asking and telling favorite food'),
(56, 2, 4, 0, 'VEGETABLES DAN FRUITS'),
(57, 2, 4, 1, 'mention various kinds of vegetables and fruits'),
(58, 2, 4, 2, 'describing the vegetables and fruits'),
(59, 2, 4, 3, 'using expression of like and dislike'),
(60, 2, 5, 0, 'SEASON AND WEATHER'),
(61, 2, 5, 1, 'state vocabularies about season and weather'),
(62, 2, 5, 2, 'telling wether and season'),
(63, 2, 5, 3, 'asking questions relate to weather and season'),
(64, 2, 6, 0, 'DISEASE'),
(65, 2, 6, 1, 'mention vocabularies relates to disease'),
(66, 2, 6, 2, 'aking someone diseases'),
(67, 2, 7, 0, 'ANIMAL'),
(68, 2, 7, 1, 'mention kind of animal'),
(69, 2, 7, 2, 'describe the appeaance of animal'),
(70, 2, 8, 0, 'TRANSPORTATION'),
(71, 2, 8, 1, 'mention kinds of transportation'),
(72, 2, 8, 2, 'asking question what transportation used by students'),
(73, 2, 9, 0, 'HUMAN BODY'),
(74, 2, 9, 1, 'identify part of body'),
(75, 2, 9, 2, 'menin the function of each part'),
(76, 2, 10, 0, 'OCCUPATION'),
(77, 2, 10, 1, 'mention kind of jobs'),
(78, 2, 10, 2, 'telling the main job description of each job'),
(79, 2, 11, 0, 'TALKING ABOUT HOBBY'),
(80, 2, 11, 1, 'state vocabularies relates to hobby'),
(81, 2, 11, 2, 'state students\' hobby'),
(82, 2, 12, 3, 'asking someone hobby'),
(83, 3, 0, 0, 'PRACTICAL GRAMMAR'),
(84, 3, 1, 0, 'ARTICLE'),
(85, 3, 1, 1, 'identifying kinds of articles'),
(86, 3, 1, 2, 'state the usage of the articles'),
(87, 3, 1, 3, 'create simple paragraph which contains articles'),
(88, 3, 2, 0, 'PREPOSITION, TIMES & PLACES'),
(89, 3, 2, 1, 'recall all types of preposition '),
(90, 3, 2, 2, 'create simple sentences by using correct prepositions'),
(91, 3, 2, 3, 'question-answer relates to prepositions'),
(92, 3, 3, 0, 'COUNTABLE AND UNCOUNTABLE'),
(93, 3, 3, 1, 'determine countable and uncountable noun'),
(94, 3, 3, 2, 'mention quatifiers used for both countable and uncountable'),
(95, 3, 3, 3, 'create question by using expression how much and how many'),
(96, 3, 4, 0, 'CLOTHES AND JEWELRY'),
(97, 3, 4, 1, 'mention kind of clothes and jwelry '),
(98, 3, 4, 2, 'asking and give respond what someone is wearing'),
(99, 3, 5, 0, 'SHAPE'),
(100, 3, 5, 1, 'mention kinds of shapes'),
(101, 3, 5, 2, 'using shapes to describe something around the students'),
(102, 3, 5, 3, 'asking the shape of other things'),
(103, 3, 6, 0, 'COLOUR'),
(104, 3, 6, 1, 'stating kinds of colors'),
(105, 3, 6, 2, 'describing the colors of the things around the students'),
(106, 3, 6, 3, 'asking the color of something'),
(107, 3, 7, 0, 'DESCRIBING OBJECT'),
(108, 3, 7, 1, 'recall vocabularies relates to describing object '),
(109, 3, 7, 2, 'describing things around the students'),
(110, 3, 8, 0, 'EXPRESSING TIME'),
(111, 3, 8, 1, 'stating the time'),
(112, 3, 8, 2, 'asking the time'),
(113, 3, 9, 0, 'PRESENT CONTINUOUS TENSE'),
(114, 3, 9, 1, 'comprehend the sructure and usage of present continous'),
(115, 3, 9, 2, 'telling activities by using present continous'),
(116, 3, 9, 3, 'create question by using present continous '),
(117, 3, 10, 0, 'WH - QUESTION'),
(118, 3, 10, 1, 'mention w/h questions'),
(119, 3, 10, 2, 'create and  respond w/h question accurately '),
(120, 4, 0, 0, 'PRE INTERMEDIATE'),
(121, 4, 1, 0, 'MODAL AUXILIARY'),
(122, 4, 1, 1, 'mention kinds of modal and the  usage'),
(123, 4, 1, 2, 'using expressions of vocabularies in simple conversation'),
(124, 4, 2, 0, 'PAST CONTINUOUS TENSE'),
(125, 4, 2, 1, 'comprehend the structure of  the past continuous '),
(126, 4, 2, 2, 'create statement and question by using past continuous '),
(127, 4, 3, 0, 'FUTURE CONTINUOUS TENSE'),
(128, 4, 3, 1, 'understanding the structure of future continous '),
(129, 4, 3, 2, 'apply future continuous to state future plan'),
(130, 4, 4, 0, 'COMPARISON DEGREE'),
(131, 4, 4, 1, 'understanding basic structure of comparison degree'),
(132, 4, 4, 2, 'apply comparison in conversation'),
(133, 4, 5, 0, 'GIVING ORDER'),
(134, 4, 5, 1, 'identify structure of giving order'),
(135, 4, 5, 2, 'create and respond simple order'),
(136, 4, 6, 0, 'PRESENT PERFECT TENSE'),
(137, 4, 6, 1, 'identify structure of present perfect tense'),
(138, 4, 6, 2, 'apply the tense in speaking or writing'),
(139, 4, 7, 0, 'TALKING ABOUT MANNER'),
(140, 4, 7, 1, 'identifying structure of manner'),
(141, 4, 7, 2, 'create simple sentences by using adverb of manner'),
(142, 4, 8, 0, 'IF CLAUSE TYPE I'),
(143, 4, 8, 1, 'understand basic structure of if clause'),
(144, 4, 8, 2, 'create and asking question relate to if clause type 1'),
(145, 4, 9, 0, 'IF CLAUSE TYPE II'),
(146, 4, 9, 1, 'comprehend structure of if clause type 2'),
(147, 4, 9, 2, 'create and asking question relate to if clause type 2'),
(148, 4, 10, 0, 'WISH SENTENCE'),
(149, 4, 10, 1, 'able to undertsand structure of wish clause'),
(150, 4, 10, 2, 'apply in conversation or writing'),
(151, 4, 11, 0, 'QUESTION TAG'),
(152, 4, 11, 1, 'able to comprehend the structure of question tag'),
(153, 4, 11, 2, 'create question tag both spoken or written'),
(154, 5, 0, 0, 'EVERYDAY CONVERSATION'),
(155, 5, 1, 0, 'SIMPLE PAST TENSE WITH TO BE'),
(156, 5, 1, 1, 'able to understand the structure of simple past nominal'),
(157, 5, 1, 2, 'able to create and respond questions by using simple past nominal'),
(158, 5, 2, 0, 'SIMPLE PAST TENSE WITH VERB'),
(159, 5, 2, 1, 'able to understand the structure of simple past verbal'),
(160, 5, 2, 2, 'able to create and respond questions by using simple past verbal'),
(161, 5, 2, 3, 'teling past activities by usingsimple past'),
(162, 5, 3, 0, 'TALKING ABOUT VACATION'),
(163, 5, 3, 1, 'stating vocabularies about vocation'),
(164, 5, 3, 2, 'telling vocation by using proper tenses'),
(165, 5, 4, 0, 'TALKING ABOUT EXPERIENCE'),
(166, 5, 4, 1, 'recalling simple past'),
(167, 5, 4, 2, 'create and tell experience'),
(168, 5, 5, 0, 'SIMPLE FUTURE TENSE'),
(169, 5, 5, 1, 'identfy the structure of simple future'),
(170, 5, 5, 2, 'create simple sentences by using simple future'),
(171, 5, 5, 3, 'telling future plan by using simple future'),
(172, 5, 6, 0, 'TALKING ABOUT LEISURE TIME'),
(173, 5, 6, 1, 'learn vocabularies relate to leissure time'),
(174, 5, 6, 2, 'telling activities in free time'),
(175, 5, 7, 0, 'LIKES AND DISLIKES'),
(176, 5, 7, 1, 'mention different expessions of like and dislike'),
(177, 5, 7, 2, 'asking someone like and dislike'),
(178, 5, 8, 0, 'ASKING PREFERENCE'),
(179, 5, 8, 1, 'expressing preference to students\' favorite things'),
(180, 5, 8, 2, 'able to responds and ask  preference '),
(181, 5, 9, 0, 'TALKING ABOUT SPORT'),
(182, 5, 9, 1, 'comprehend vocabularies relate to sports'),
(183, 5, 9, 2, 'clients are able to express favourite sport'),
(184, 5, 9, 3, 'asking someone\'s favourite sport'),
(185, 5, 10, 0, 'TALKING ABOUT SCHOOL'),
(186, 5, 10, 1, 'introducing vocabularies relate to job or campus activities'),
(187, 5, 10, 2, 'give respond to some question relates to jobor campus'),
(188, 5, 10, 3, 'create a simple monologue text and tell it to other people'),
(189, 5, 11, 0, 'TALKING ABOUT APPEARANCE'),
(190, 5, 11, 1, 'state vocabularies about appearance '),
(191, 5, 11, 2, 'describe someone appearance '),
(192, 5, 11, 3, 'asking someone to describe othe people appearance '),
(193, 5, 12, 0, 'TALKING ABOUT PERSONALITY'),
(194, 5, 12, 1, 'mention vocabularies relates to personalities '),
(195, 5, 12, 2, 'describe someone personalities'),
(196, 5, 12, 3, 'create dialogue relates to ask and describe someone personalities'),
(197, 6, 0, 0, 'INTERMEDIATE'),
(198, 6, 1, 0, 'HABITUAL PAST'),
(199, 6, 1, 1, 'comprehend th basic structure of expressing habitual past'),
(200, 6, 1, 2, 'create and respond question relate to habit in tha past'),
(201, 6, 2, 0, 'BE USED TO'),
(202, 6, 2, 1, 'identify the structure of present habit'),
(203, 6, 2, 2, 'create simple conversation relates to present habit'),
(204, 6, 3, 0, 'MAKING REQUEST'),
(205, 6, 3, 1, 'identify kinds of request expressions'),
(206, 6, 3, 2, 'create simple dilogue about request'),
(207, 6, 4, 0, 'MAKING INVITATION'),
(208, 6, 4, 1, 'recalling kind of invitation expression'),
(209, 6, 4, 2, 'craete invitation card or invite someone direactly'),
(210, 6, 5, 0, 'MAKING APPOINTMENT'),
(211, 6, 5, 1, 'mention kinds of expressions to make appoinment'),
(212, 6, 5, 2, 'create appoinment for ceratin purpose'),
(213, 6, 6, 0, 'PRESENT PERFECT CONTINUOUS TENSE'),
(214, 6, 6, 1, 'comprehend the sructure and usage of present continous'),
(215, 6, 6, 2, 'telling activities by using present continous'),
(216, 6, 6, 3, 'create question by using present continous '),
(217, 6, 7, 0, 'PAST PERFECT TENSE'),
(218, 6, 7, 1, 'comprehend the structure and the usage of past perfect'),
(219, 6, 7, 2, 'create simple sentence by using past perfect'),
(220, 6, 7, 3, 'able to use past perfect actively in conversation'),
(221, 6, 8, 0, 'PAST PERFECT CONTINUOUS TENSE'),
(222, 6, 8, 1, 'comprehend the structure of past continous '),
(223, 6, 8, 2, 'express past activities by uisng past continous tense'),
(224, 6, 8, 3, 'combining simple past and past continous '),
(225, 6, 9, 0, 'GERUND AND INFINITIVE'),
(226, 6, 9, 1, 'identifying the rule of gerund and to infinitive '),
(227, 6, 9, 2, 'applying gerund and to infinitive both in speaking or writing'),
(228, 6, 10, 0, 'DEMONSTRATIVE, EXPLETIVE AND REFLEXIVE'),
(229, 6, 10, 1, 'mention demonstrative, expletive, and reflexive'),
(230, 6, 10, 2, 'create simple expression bys using demontrative'),
(231, 6, 11, 0, 'DETERMINER'),
(232, 6, 11, 1, 'identify kinds of determiner '),
(233, 6, 11, 2, 'apply determiner in various context'),
(234, 6, 12, 0, 'PASSIVE VOICE'),
(235, 6, 12, 1, 'comprehend basic structure of passive voice'),
(236, 6, 12, 2, 'create passive voice using the tenses that have been learnt'),
(237, 6, 12, 3, 'applying passive voice in daily conversation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sl_124`
--
ALTER TABLE `sl_124`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sl_124`
--
ALTER TABLE `sl_124`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
