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
-- Table structure for table `sl_125` senior
--

CREATE TABLE `sl_125` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sl_125`
--

INSERT INTO `sl_125` (`id`, `section`, `topic`, `ind`, `indicator`) VALUES
(1, 1, 0, 0, 'INTRODUCTION'),
(2, 1, 1, 0, 'GREETING '),
(3, 1, 1, 1, 'able to mention expressions of greeting'),
(4, 1, 1, 2, 'giving respond and asking greeting expression '),
(5, 1, 1, 3, 'create simple dialogue relates to greeting expression '),
(6, 1, 2, 0, 'INTRODUCTION'),
(7, 1, 2, 1, 'students are able to introduce themselves in simple way'),
(8, 1, 2, 2, 'asking someone identities'),
(9, 1, 2, 3, 'introduce other people'),
(10, 1, 3, 0, 'ALPHABET AND SPELLING'),
(11, 1, 3, 1, 'spell alphabet accurately from A-Z'),
(12, 1, 3, 2, 'using axpressions to ask someone to spell something'),
(13, 1, 3, 0, 'NUMBER (CARDINAL & ORDINAL)'),
(14, 1, 4, 1, 'mention  all different type of numbers'),
(15, 1, 4, 2, 'apply the use of the numbers in some contexts'),
(16, 1, 4, 3, 'create daily conversation relates to numbers'),
(17, 1, 5, 0, 'SUBJECT AND OBJECT PRONOUN'),
(18, 1, 5, 1, 'mentions subject and object pronoun in English'),
(19, 1, 5, 2, 'change noun into sunject or object pronoun accurately '),
(20, 1, 5, 3, 'create simple sentences by using subject and object pronoun'),
(21, 1, 6, 0, 'POSSESSIVE ADJECTIVE & PRONOUN'),
(22, 1, 6, 1, 'mention and identifies poss. Adjective and poss. Pronoun'),
(23, 1, 6, 2, 'create simple text about possesive '),
(24, 1, 7, 0, 'NOMINAL SENTENCE'),
(25, 1, 7, 1, 'identifying the pattern of nominal sentences '),
(26, 1, 7, 2, 'create simple nominal sentences '),
(27, 1, 7, 3, 'describe simple thing by using nominal sentences'),
(28, 1, 8, 0, 'VERBAL SENTENCE'),
(29, 1, 8, 1, 'identifiying the pattern of verbal sentences'),
(30, 1, 8, 2, 'create verbal sentences correctly '),
(31, 1, 8, 3, 'able to express some daily activities using verbal sentences'),
(32, 2, 0, 0, 'VOCABULARY'),
(33, 2, 1, 0, 'TIME'),
(34, 2, 1, 1, 'express the time correctly both brit and ame'),
(35, 2, 1, 2, 'asking time'),
(36, 2, 1, 3, 'telling activities and time'),
(37, 2, 2, 0, 'DIRECTION'),
(38, 2, 2, 1, 'mention expressions used in giving direction '),
(39, 2, 2, 2, 'mention different expessions used in asking direction'),
(40, 2, 2, 3, 'create dialogue relates to giving direction '),
(41, 2, 3, 0, 'DAILY VERBS'),
(42, 2, 3, 1, 'mention verbs related to daily activities '),
(43, 2, 3, 2, 'telling daily activties orally and in writing'),
(44, 2, 3, 3, 'asking question about other people activities'),
(45, 2, 4, 0, 'OCCUPATION'),
(46, 2, 4, 1, 'mentions kindsof jobs'),
(47, 2, 4, 2, 'asking someone job'),
(48, 2, 4, 3, 'describing job description of certaing jobs'),
(49, 2, 5, 0, 'FAMILY MEMBER'),
(50, 2, 5, 1, 'mention vocabularies relates family'),
(51, 2, 5, 2, 'describe relation among family'),
(52, 2, 5, 3, 'telling family member background '),
(53, 2, 6, 0, 'ADVERB OF TIME'),
(54, 2, 6, 1, 'recall adverb of time '),
(55, 2, 6, 2, 'apply adverb of time in sentences'),
(56, 2, 7, 0, 'ADVERB OF FREQUENCY'),
(57, 2, 7, 1, 'mention various kinds of adverb of frequency '),
(58, 2, 7, 2, 'describing the frequency of doing  certain activities'),
(59, 2, 7, 3, 'asking question how often someone does  certain activities'),
(60, 2, 8, 0, 'HUMAN BODY AND FACE'),
(61, 2, 8, 1, 'mention part of body'),
(62, 2, 8, 2, 'describe the function of each part of body'),
(63, 2, 9, 0, 'BUILDING AND PLACE'),
(64, 2, 9, 1, 'mention kinds of place and building'),
(65, 2, 9, 2, 'describe location of place and buiding'),
(66, 2, 10, 0, 'CLOTHES AND JEWELRY'),
(67, 2, 10, 1, 'mention kinds of clothes and jewelry '),
(68, 2, 10, 2, 'stating what someone is wearing'),
(69, 2, 10, 3, 'asking questions relates to clothes and jewelry '),
(70, 2, 11, 0, 'ADJECTIVE OF PERSONALITY'),
(71, 2, 11, 1, 'mention vocabularies relates to personalities '),
(72, 2, 11, 2, 'describe someone personalities'),
(73, 2, 11, 3, 'create dialogue relates to ask and describe someone personalities'),
(74, 3, 0, 0, 'PRACTICAL GRAMMAR'),
(75, 3, 1, 0, 'DEMONSTRATIVE PRONOUN'),
(76, 3, 1, 1, 'mention demonstrative pronoun'),
(77, 3, 1, 2, 'create and answer simple question relates to demonstratives'),
(78, 3, 0, 0, 'ARTICLE'),
(79, 3, 0, 1, 'identifying kinds of articles '),
(80, 3, 0, 2, 'state the usage of the articles'),
(81, 3, 0, 3, 'create simple paragraph which contains articles'),
(82, 3, 3, 0, 'COUNTABLE AND UNCOUNT NOUN'),
(83, 3, 3, 1, 'determine countable and uncountable noun'),
(84, 3, 3, 2, 'mention quatifiers '),
(85, 3, 3, 3, 'create question by using expression how much and how many'),
(86, 3, 4, 0, 'WH - QUESTION'),
(87, 3, 4, 1, 'mention w/h questions'),
(88, 3, 4, 2, 'create and  respond w/h question accurately '),
(89, 3, 5, 0, 'PREPOSITION, TIMES & PLACES'),
(90, 3, 5, 1, 'recall all types of preposition '),
(91, 3, 5, 2, 'create simple sentences by using correct prepositions'),
(92, 3, 5, 3, 'question-answer relates to prepositions'),
(93, 3, 6, 0, 'QUESTION TAG'),
(94, 3, 6, 1, 'identify structure of tag'),
(95, 3, 6, 2, 'create tag of sentences correctly '),
(96, 3, 7, 0, 'ELIPTICAL SENTENCES'),
(97, 3, 7, 1, 'mention types of eliptical sentences'),
(98, 3, 7, 2, 'applying  eliptical sentences in daily conversation'),
(99, 3, 8, 0, 'DEGREE OF COMPARISON'),
(100, 3, 8, 1, 'mention some adjectives'),
(101, 3, 8, 2, 'identifying the structure of comparison'),
(102, 3, 8, 3, 'apply comparison both in spoken or written expressions'),
(103, 3, 9, 0, 'PREFERENCE COMPARISON'),
(104, 3, 9, 1, 'mention different types of preference'),
(105, 3, 9, 2, 'asking some one preference'),
(106, 3, 10, 0, 'MODAL AUXILIARIES'),
(107, 3, 10, 1, 'mention kinds of modal and the  usage'),
(108, 3, 10, 2, 'using expressions of vocabularies in simple conversation'),
(109, 3, 11, 0, 'GERUND AND INFINITIVE'),
(110, 3, 11, 1, 'identifying the rule of gerund and to infinitive '),
(111, 3, 11, 2, 'applying gerund and to infinitive both in speaking or writing'),
(112, 3, 12, 0, 'DIRECT AND INDIRECT SPEECH'),
(113, 3, 12, 1, 'identify the form of indirect speech'),
(114, 3, 12, 3, 'apply in the inderect speech in conversation '),
(115, 3, 13, 0, 'CONDITIONAL SENTENCE'),
(116, 3, 13, 1, 'identify the strucure of conditional sentences'),
(117, 3, 13, 2, 'create conditional sentences accurately '),
(118, 3, 13, 3, 'question-answer related to conditional sentences'),
(119, 4, 0, 0, 'SIMPLE COMMUNICATION'),
(120, 4, 1, 0, 'TALKING ABOUT DAILY ACTIVITY'),
(121, 4, 1, 1, 'able to express daily activities correctly in spoken or written'),
(122, 4, 1, 2, 'express other people activities'),
(123, 4, 1, 3, 'asking question relates to someone\'s daly activities'),
(124, 4, 2, 0, 'TALKING ABOUT FAMILY'),
(125, 4, 2, 1, 'mention vocabularies relates family'),
(126, 4, 2, 2, 'describe relation among family'),
(127, 4, 2, 3, 'telling family member background '),
(128, 4, 3, 0, 'TALKING ABOUT SCHOOL'),
(129, 4, 3, 1, 'introducing vocabularies relate to school activities'),
(130, 4, 3, 2, 'give respond to some question relates school'),
(131, 4, 3, 0, 'create simple monologue about school activities'),
(132, 4, 4, 0, 'TALKING ABOUT LIKES AND DISLIKES'),
(133, 4, 4, 1, 'mention expression used in expressing like or dislike'),
(134, 4, 4, 2, 'students are able to express their favourite things'),
(135, 4, 4, 0, 'asking someone favourite things'),
(136, 4, 5, 0, 'TALKING ABOUT HOBBY'),
(137, 4, 5, 1, 'mention kinds of hobbies '),
(138, 4, 5, 2, 'stating students hobbies and asking someone\'s hobbies'),
(139, 4, 6, 0, 'SIMPLE PRESENT WITH NOMINAL'),
(140, 4, 6, 1, 'identifies the pattern of nominal sentences '),
(141, 4, 6, 2, 'create simple nominal sentences '),
(142, 4, 6, 3, 'describe simple thing by using nominal sentences'),
(143, 4, 7, 0, 'SIMPLE PRESENT WITH VERBAL'),
(144, 4, 7, 1, 'identifiying the pattern of verbal sentences'),
(145, 4, 7, 2, 'create verbal sentences correctly '),
(146, 4, 7, 3, 'able to express some daily activities using verbal sentences'),
(147, 4, 8, 0, 'PRESENT CONTINUOUS'),
(148, 4, 8, 1, 'comprehend the sructure and usage of present continous'),
(149, 4, 8, 2, 'telling activities by using present continous'),
(150, 4, 8, 3, 'create question by using present continous '),
(151, 4, 9, 0, 'SIMPLE FUTURE'),
(152, 4, 9, 1, 'identifying structure and usage of future tense'),
(153, 4, 9, 2, 'answering question by using simple future'),
(154, 4, 9, 3, 'telling prediction or future activities '),
(155, 4, 10, 0, 'FUTURE CONTINUOUS TENSE'),
(156, 4, 10, 1, 'identifying structure and usage of future continous tense'),
(157, 4, 10, 2, 'answering question by using simple future continous'),
(158, 5, 0, 0, 'EVERYDAY CONVERSATION'),
(159, 5, 1, 0, 'TALKING ABOUT DAILY ROUTINE'),
(160, 5, 1, 1, 'The clients are able to mention daily verbs '),
(161, 5, 1, 2, 'able to ask someone\'s daily activities '),
(162, 5, 1, 3, 'clients are able to tell their daily activities '),
(163, 5, 2, 0, 'TALKING ABOUT PRICE'),
(164, 5, 2, 1, 'recaling number'),
(165, 5, 2, 2, 'mention expression of asking price'),
(166, 5, 2, 3, 'role play seller and buyer'),
(167, 5, 3, 0, 'MAKING INVITATION'),
(168, 5, 3, 1, 'mention expresions used in inviting someone'),
(169, 5, 3, 2, 'create simple invitation card for other people'),
(170, 5, 4, 0, 'TALKING ABOUT LEISSURE TIME'),
(171, 5, 4, 1, 'comprehend the vocabularies relates to leissure time'),
(172, 5, 4, 2, 'telling activities in leissure time'),
(173, 5, 4, 3, 'asking someone activities in leissure time'),
(174, 5, 5, 0, 'TALKING ABOUT SPORT'),
(175, 5, 5, 1, 'comprehend vocabularies relate to sports'),
(176, 5, 5, 2, 'clients are able to express favourite sport'),
(177, 5, 5, 3, 'asking someone\'s favourite sport'),
(178, 5, 6, 0, 'TALKING ABOUT VACATION'),
(179, 5, 6, 1, 'comprehend structure of simple past '),
(180, 5, 6, 2, 'able to use simple past accurately to express past event'),
(181, 5, 6, 3, 'clients are able to tell their experience '),
(182, 5, 7, 0, 'TALKING ABOUT PLAN'),
(183, 5, 7, 1, 'comprehend the tense or expression used in telling future plan'),
(184, 5, 7, 2, 'able to state plan in the future by using correct structure'),
(185, 5, 8, 0, 'DESCRIBE ABOUT NEIGHBORHOOD'),
(186, 5, 8, 1, 'comprehend prepositions used to express location around neighborhood'),
(187, 5, 8, 2, 'able to tell the building or place around the neighborhood'),
(188, 5, 8, 3, 'asking someone\'s neighborhood'),
(189, 5, 9, 0, 'DESCRIBE ABOUT PUBLIC PLACES'),
(190, 5, 9, 1, 'mention kinds of public places'),
(191, 5, 9, 2, 'telling the location of certain public places'),
(192, 5, 9, 3, 'asking question relates to location of public places'),
(193, 5, 10, 0, 'SIMPLE PAST TENSE WITH NOMINAL'),
(194, 5, 10, 1, 'comprehend the sructure and usage of simple past'),
(195, 5, 10, 2, 'telling condition in the past'),
(196, 5, 11, 0, 'SIMPLE PAST TENSE WITH VERBAL'),
(197, 5, 11, 1, 'comprehend the sructure and usage of simple past'),
(198, 5, 11, 2, 'telling past activities '),
(199, 5, 12, 0, 'PAST CONTINUOUS TENSE'),
(200, 5, 12, 1, 'comprehend the sructure and usage of present continous'),
(201, 5, 12, 2, 'telling activities by using present continous'),
(202, 5, 12, 0, 'create question by using present continous'),
(203, 6, 0, 0, 'UPPER ENGLISH'),
(204, 6, 1, 0, 'DESCRIBING PEOPLE'),
(205, 6, 1, 1, 'recall vocabularies relates to appearance'),
(206, 6, 1, 2, 'describe someone appearance'),
(207, 6, 2, 0, 'COMPARING JOB'),
(208, 6, 2, 1, 'mention kinds of jobs'),
(209, 6, 2, 2, 'describe the responsiblities of jobs'),
(210, 6, 3, 0, 'ASKING PREFERENCE'),
(211, 6, 3, 1, 'expressing preference to students\' favorite things'),
(212, 6, 3, 2, 'able to responds and ask  preference '),
(213, 6, 4, 0, 'MAKING REQUEST'),
(214, 6, 4, 1, 'mention expressions in making request'),
(215, 6, 4, 2, 'create request axpressions and give appropriate responds'),
(216, 6, 5, 0, 'TALKING ABOUT EDUCATION'),
(217, 6, 5, 1, 'mention vocabularies relate to education'),
(218, 6, 5, 2, 'asking someone education background '),
(219, 6, 5, 3, 'replying some question related to education'),
(220, 6, 6, 0, 'TALKING ABOUT CULTURE'),
(221, 6, 6, 1, 'students learn some vocabularies relate to culture'),
(222, 6, 6, 2, 'describing culture in ceratin place'),
(223, 6, 6, 3, 'asking question related to culture'),
(224, 6, 7, 0, 'TALKING ABOUT COUNTRY'),
(225, 6, 7, 1, 'mention the name of country in English'),
(226, 6, 7, 2, 'describing the uniqueness of a certain country'),
(227, 6, 8, 0, 'TALKING ABOUT TOURISM OBJECT'),
(228, 6, 8, 1, 'mention kinds of tourism object'),
(229, 6, 8, 2, 'describing a certain tourism object'),
(230, 6, 8, 3, 'write simple monologue relates to tourism object'),
(231, 6, 9, 0, 'PRESENT PERFECT'),
(232, 6, 9, 1, 'comprehend the structure and the usage of present perfect'),
(233, 6, 9, 2, 'create simple sentence by using present perfect'),
(234, 6, 9, 3, 'applying the tenses in conversations'),
(235, 6, 10, 0, 'PRESENT PERFECT CONTINUOUS'),
(236, 6, 10, 1, 'comprehend the structure and the usage of present perfect continuous '),
(237, 6, 10, 2, 'create simple sentence by using present perfect continuous '),
(238, 6, 10, 3, 'able to use present perfect continuous actively in conversation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sl_125`
--
ALTER TABLE `sl_125`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sl_125`
--
ALTER TABLE `sl_125`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
