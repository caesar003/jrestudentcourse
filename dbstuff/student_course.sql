-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 05:56 PM
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
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `sender` varchar(255) NOT NULL,
  `atch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fsp_123`
--

CREATE TABLE `fsp_123` (
  `id` int(5) UNSIGNED NOT NULL,
  `material` varchar(255) NOT NULL DEFAULT '',
  `fsp_result` varchar(255) NOT NULL DEFAULT '',
  `comment` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fsp_123`
--

INSERT INTO `fsp_123` (`id`, `material`, `fsp_result`, `comment`) VALUES
(1, 'topic 1', 'need_improvement', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(8) NOT NULL,
  `user` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user`, `post_date`, `message`, `link`) VALUES
(1, 1, '2020-02-08 09:53:41', 'Dear all, I would like to tell you that today we are going to have another discussion about our new online student course. Thus I highly appreciate that if you would spare 15 minutes of your time to attend it. That would be on Monday, 12', '');

-- --------------------------------------------------------

--
-- Table structure for table `schd_2020-02-09`
--

CREATE TABLE `schd_2020-02-09` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `_9` varchar(8) NOT NULL DEFAULT '',
  `_9r` varchar(8) NOT NULL DEFAULT '',
  `_9p` varchar(8) NOT NULL DEFAULT '',
  `_10` varchar(8) NOT NULL DEFAULT '',
  `_10r` varchar(8) NOT NULL DEFAULT '',
  `_10p` varchar(8) NOT NULL DEFAULT '',
  `_11` varchar(8) NOT NULL DEFAULT '',
  `_11r` varchar(8) NOT NULL DEFAULT '',
  `_11p` varchar(8) NOT NULL DEFAULT '',
  `_12` varchar(8) NOT NULL DEFAULT '',
  `_12r` varchar(8) NOT NULL DEFAULT '',
  `_12p` varchar(8) NOT NULL DEFAULT '',
  `_13` varchar(8) NOT NULL DEFAULT '',
  `_13r` varchar(8) NOT NULL DEFAULT '',
  `_13p` varchar(8) NOT NULL DEFAULT '',
  `_14` varchar(8) NOT NULL DEFAULT '',
  `_14r` varchar(8) NOT NULL DEFAULT '',
  `_14p` varchar(8) NOT NULL DEFAULT '',
  `_15` varchar(8) NOT NULL DEFAULT '',
  `_15r` varchar(8) NOT NULL DEFAULT '',
  `_15p` varchar(8) NOT NULL DEFAULT '',
  `_16` varchar(8) NOT NULL DEFAULT '',
  `_16r` varchar(8) NOT NULL DEFAULT '',
  `_16p` varchar(8) NOT NULL DEFAULT '',
  `_17` varchar(8) NOT NULL DEFAULT '',
  `_17r` varchar(8) NOT NULL DEFAULT '',
  `_17p` varchar(8) NOT NULL DEFAULT '',
  `_18` varchar(8) NOT NULL DEFAULT '',
  `_18r` varchar(8) NOT NULL DEFAULT '',
  `_18p` varchar(8) NOT NULL DEFAULT '',
  `_19` varchar(8) NOT NULL DEFAULT '',
  `_19r` varchar(8) NOT NULL DEFAULT '',
  `_19p` varchar(8) NOT NULL DEFAULT '',
  `_20` varchar(8) NOT NULL DEFAULT '',
  `_20r` varchar(8) NOT NULL DEFAULT '',
  `_20p` varchar(8) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schd_2020-02-09`
--

INSERT INTO `schd_2020-02-09` (`id`, `name`, `_9`, `_9r`, `_9p`, `_10`, `_10r`, `_10p`, `_11`, `_11r`, `_11p`, `_12`, `_12r`, `_12p`, `_13`, `_13r`, `_13p`, `_14`, `_14r`, `_14p`, `_15`, `_15r`, `_15p`, `_16`, `_16r`, `_16p`, `_17`, `_17r`, `_17p`, `_18`, `_18r`, `_18p`, `_19`, `_19r`, `_19p`, `_20`, `_20r`, `_20p`) VALUES
(1, 'Mr. Sugi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Ms. Herna', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Mr. Ivan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Ms. Priskil', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Ms. Olga', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Ms. Feb', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Mr. Sumer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Ms. Michel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Ms. Yuni', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Ms. Eta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Mr. Caesar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Ms. Jee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Ms. Ayu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schd_2020-02-10`
--

CREATE TABLE `schd_2020-02-10` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `_9` varchar(8) NOT NULL DEFAULT '',
  `_9r` varchar(8) NOT NULL DEFAULT '',
  `_9p` varchar(8) NOT NULL DEFAULT '',
  `_10` varchar(8) NOT NULL DEFAULT '',
  `_10r` varchar(8) NOT NULL DEFAULT '',
  `_10p` varchar(8) NOT NULL DEFAULT '',
  `_11` varchar(8) NOT NULL DEFAULT '',
  `_11r` varchar(8) NOT NULL DEFAULT '',
  `_11p` varchar(8) NOT NULL DEFAULT '',
  `_12` varchar(8) NOT NULL DEFAULT '',
  `_12r` varchar(8) NOT NULL DEFAULT '',
  `_12p` varchar(8) NOT NULL DEFAULT '',
  `_13` varchar(8) NOT NULL DEFAULT '',
  `_13r` varchar(8) NOT NULL DEFAULT '',
  `_13p` varchar(8) NOT NULL DEFAULT '',
  `_14` varchar(8) NOT NULL DEFAULT '',
  `_14r` varchar(8) NOT NULL DEFAULT '',
  `_14p` varchar(8) NOT NULL DEFAULT '',
  `_15` varchar(8) NOT NULL DEFAULT '',
  `_15r` varchar(8) NOT NULL DEFAULT '',
  `_15p` varchar(8) NOT NULL DEFAULT '',
  `_16` varchar(8) NOT NULL DEFAULT '',
  `_16r` varchar(8) NOT NULL DEFAULT '',
  `_16p` varchar(8) NOT NULL DEFAULT '',
  `_17` varchar(8) NOT NULL DEFAULT '',
  `_17r` varchar(8) NOT NULL DEFAULT '',
  `_17p` varchar(8) NOT NULL DEFAULT '',
  `_18` varchar(8) NOT NULL DEFAULT '',
  `_18r` varchar(8) NOT NULL DEFAULT '',
  `_18p` varchar(8) NOT NULL DEFAULT '',
  `_19` varchar(8) NOT NULL DEFAULT '',
  `_19r` varchar(8) NOT NULL DEFAULT '',
  `_19p` varchar(8) NOT NULL DEFAULT '',
  `_20` varchar(8) NOT NULL DEFAULT '',
  `_20r` varchar(8) NOT NULL DEFAULT '',
  `_20p` varchar(8) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schd_2020-02-10`
--

INSERT INTO `schd_2020-02-10` (`id`, `name`, `_9`, `_9r`, `_9p`, `_10`, `_10r`, `_10p`, `_11`, `_11r`, `_11p`, `_12`, `_12r`, `_12p`, `_13`, `_13r`, `_13p`, `_14`, `_14r`, `_14p`, `_15`, `_15r`, `_15p`, `_16`, `_16r`, `_16p`, `_17`, `_17r`, `_17p`, `_18`, `_18r`, `_18p`, `_19`, `_19r`, `_19p`, `_20`, `_20r`, `_20p`) VALUES
(1, 'Mr. Sugi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Ms. Herna', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Mr. Ivan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Ms. Priskil', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Ms. Olga', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Ms. Feb', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Mr. Sumer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Ms. Michel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Ms. Yuni', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Ms. Eta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Mr. Caesar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Ms. Jee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Ms. Ayu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `table_name` date NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `table_name`, `note`) VALUES
(1, '2020-02-09', 'hello'),
(2, '2020-02-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `pin` int(11) NOT NULL,
  `complete_name` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `phone` varchar(255) NOT NULL,
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

INSERT INTO `students` (`pin`, `complete_name`, `nick_name`, `address`, `place_of_birth`, `date_of_birth`, `phone`, `program`, `program_duration`, `starting_date`, `reason`, `target`, `difficulties`, `bground`, `self_introduction`, `weakness_point`, `action_plan`, `after_teaching`, `fsp`) VALUES
(123, 'Hello', 'World', 'somewhere', 'nobody cares', '2012-07-07 00:00:00', '628997665', 'Confidence Elementary', 60, '2019-07-05 00:00:00', 'some reason', 'target', 'diffculties', '', 'Average', 'problems', 'suggestion', 'checked', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_master`
--

CREATE TABLE `syllabus_master` (
  `id` int(11) UNSIGNED NOT NULL,
  `indicator` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `syllabus_master`
--

INSERT INTO `syllabus_master` (`id`, `indicator`) VALUES
(100, 'INTRODUCTION'),
(110, 'GREETING'),
(111, 'Able to Mention Expression of Greeting'),
(112, 'Giving respond relates to greeting expression in both written and spoken'),
(113, 'Creating simple dialogue relates to greeting expressions'),
(120, 'INTRODUCTION'),
(121, 'Able to introduce oneself in a simple way'),
(122, 'Asking someone identity'),
(123, 'Introducing others'),
(130, 'ALPHABET & SPELLING'),
(131, 'Spell Alphabet Accurately from A-Z'),
(132, 'Using expressions to ask someone to spell something'),
(140, 'TALKING ABOUT FAMILY'),
(141, 'Students are able to mention vocabularies relates to family member'),
(142, 'Describe relations among family members'),
(143, 'Telling family member background'),
(150, 'DAILY VERBS'),
(151, 'Mention verbs relates to daily activities'),
(152, 'Telling daily activities orally and in writing'),
(153, 'Asking question about other people activities'),
(160, 'SUBJECT & OBJECT PRONOUN'),
(161, 'Mention subject and object pronoun in English'),
(162, 'Change noun into subject or object pronoun in English'),
(163, 'Create simple sentences by using subject and object pronoun'),
(170, 'POSSESSIVE ADJECTIVE & POSSESSIVE PRONOUN'),
(171, 'Mention and identifies possessive adjective and possessive pronoun'),
(172, 'Create simple text about possessive'),
(180, 'SIMPLE PRESENT NOMINAL'),
(181, 'Identifies the pattern of nominal sentence'),
(182, 'Create simple nominal sentence'),
(183, 'Describe simple things by using nominal sentence'),
(190, 'SIMPLE PRESENT VERBAL'),
(191, 'identifying the pattern of verbal sentences'),
(192, 'Create verbal sentences correctly'),
(193, 'Able to express some daily activities using verbal sentences'),
(200, 'BASIC COMMUNICATION'),
(210, 'BUILDING and PLACE'),
(211, 'Mention vocalbularies about building and place'),
(212, 'Describing location of building and places'),
(213, 'Asking question relates to location of building and places'),
(220, 'CLOTHES and JEWELRIES'),
(221, 'Mention kinds of clothes and jewelries'),
(222, 'Stating what someone is wearing'),
(223, 'Asking questions relates to clothes and jewelry'),
(230, 'DISEASE'),
(231, 'Mention vocabularies relates to diseases'),
(232, 'Asking someone diseases'),
(240, 'HUMAN BODY and FACE'),
(241, 'Identify part of body'),
(242, 'Mention the function of each body part'),
(250, 'PRESENT CONTINUOUS TENSE'),
(251, 'Conprehend the structure and usage of present continuous'),
(252, 'Telling activities by using present continuous'),
(253, 'Create questions by using present continuous'),
(260, 'WH QUESTION'),
(261, 'Mention WH questions'),
(262, 'Create and respond WH question accurately'),
(270, 'SIMPLE PAST TENSE NOMINAL'),
(271, 'Conprehend the structure and usage of simple past'),
(272, 'Telling condition in the past'),
(280, 'SIMPLE PAST VERBAL'),
(281, 'Comprehend the structure and usage of simple past'),
(282, 'Telling past activities'),
(290, 'YES/NO QUESTION'),
(291, 'Comprehend the structure of yes/no question'),
(292, 'Create yes/no question by using different tenses'),
(300, 'BASIC GRAMMAR'),
(310, 'ARTICLE'),
(311, 'Identifying kinds of articles'),
(312, 'State the usage of the article'),
(313, 'Create simple paragraph contains articles'),
(320, 'PREPOSITION of TIME and PLACE'),
(321, 'Recall all types of preposition'),
(322, 'Create simple sentences by using correct prepositions'),
(323, 'Question-answer relates to prepositions'),
(330, 'EXPRESSING TIME'),
(331, 'Stating the time'),
(332, 'Asking the time'),
(340, 'PAST CONTINUOUS TENSE'),
(341, 'Conprehend the structure of past continuous'),
(342, 'Create statement and question by using past continuous'),
(350, 'DESCRIBING OBJECT'),
(351, 'Recall vocabularies relates to describing object'),
(352, 'Describing things around the students'),
(360, 'ADJECTIVE of PERSONALITY'),
(361, 'Mention vocabularies relates to personalities'),
(362, 'Describe someone personalities'),
(370, 'ADJECTIVE of APPEARANCE'),
(371, 'State vocabulary about appearance'),
(372, 'Describe someone\'s appearance'),
(373, 'Asking someone to describe other people appearance'),
(380, 'DEMONSTRATIVE PRONOUN'),
(381, 'Mention demonstrative pronoun'),
(382, 'Create and answer questions relates to demonstrative'),
(390, 'EXPLETIVE'),
(391, 'Mention expletive'),
(392, 'Create simple expressions by using expletive'),
(400, 'SIMPLE COMMUNICATION\r\n\r\n'),
(410, 'TALKING ABOUT DAILY ACTIVITY'),
(411, 'able to express daily activities correctly in spoken or written'),
(412, 'express other people activities'),
(413, 'asking question relates to someone\'s daily activities'),
(420, 'TALKING ABOUT FAMILY'),
(421, 'mention vocabularies relates family'),
(422, 'describe relation among family'),
(423, 'telling family member background'),
(430, 'TALKING ABOUT SCHOOL'),
(431, 'introducing vocabularies relate to school activities'),
(432, 'give respond to some question relates school'),
(433, 'create simple monologue about school activities'),
(440, 'TALKING ABOUT LIKES AND DISLIKES'),
(441, 'mention expression used in expressing like or dislike'),
(442, 'students are able to express their favourite things'),
(443, 'asking someone favourite things'),
(450, 'TALKING ABOUT HOBBY'),
(451, 'mention kinds of hobbies'),
(452, 'stating students hobbies and asking someone\'s hobbies'),
(460, 'SIMPLE PRESENT WITH NOMINAL'),
(461, 'identifies the pattern of nominal sentences'),
(462, 'create simple nominal sentences'),
(463, 'describe simple thing by using nominal sentences'),
(470, 'SIMPLE PRESENT WITH VERBAL'),
(471, 'identifiying the pattern of verbal sentences'),
(472, 'create verbal sentences correctly'),
(473, 'able to express some daily activities using verbal sentences'),
(480, 'PRESENT CONTINUOUS'),
(481, 'comprehend the structure and usage of present continuous'),
(482, 'telling activities by using present continuous'),
(483, 'create question by using present continuous'),
(490, 'SIMPLE FUTURE'),
(491, 'identifying structure and usage of future tense'),
(492, 'answering question by using simple future'),
(493, 'telling prediction or future activities'),
(500, 'EVERYDAY CONVERSATION'),
(510, 'TALKING ABOUT DAILY ROUTINE'),
(511, 'The clients are able to mention daily verbs'),
(512, 'Able to ask someone\'s daily activities'),
(513, 'Clients are able to tell their daily activities'),
(520, 'TALKING ABOUT PRICE'),
(521, 'Recalling number'),
(522, 'Mention expressions of asking price'),
(523, 'Role Play seller and buyer'),
(530, 'MAKING INVITATION'),
(531, 'Mention expressions used in inviting someone'),
(532, 'Create simple invitation card for other people'),
(540, 'MAKING INVITATION'),
(541, 'Comprehend the vocabulary relates to leisure time'),
(542, 'Telling activities in leisure time'),
(543, 'Asking someone activities in leisure time'),
(550, 'TALKING ABOUT SPORT'),
(551, 'Comprehend vocabularies relate to sports'),
(552, 'Clients are able to express favorite sport'),
(553, 'Asking someone\'s favorite sport'),
(560, 'TALKING ABOUT VACATION'),
(561, 'comprehend structure of simple past \r\n'),
(562, 'able to use simple past accurately to express past event'),
(563, 'clients are able to tell their experience \r\n'),
(570, 'TALKING ABOUT PLAN'),
(571, 'comprehend the tense or expression used in telling future plan'),
(572, 'able to state plan in the future by using correct structure'),
(580, 'DESCRIBE ABOUT NEIGHBORHOOD'),
(581, 'comprehend prepositions used to express location around neighborhood'),
(582, 'able to tell the building or place around the neighborhood'),
(583, 'asking someone\'s neighborhood'),
(590, 'DESCRIBE ABOUT PUBLIC PLACES'),
(591, 'mention kinds of public places'),
(592, 'telling the location of certain public places'),
(593, 'asking question relates to location of public places'),
(600, 'UPPER ENGLISH'),
(610, 'DESCRIBING PEOPLE'),
(611, 'Recall vocabularies relate to appearance'),
(612, 'Describe someone appearance'),
(620, 'COMPARING JOB'),
(621, 'Mention kinds of jobs'),
(622, 'Describe the responsibilities of jobs'),
(630, 'ASKING PREFERENCE'),
(631, 'Expressing preference to student\'s favorite things'),
(632, 'Able to respond and ask preference'),
(640, 'MAKING REQUEST'),
(641, 'Mention expressions in making request'),
(642, 'Create request expressions and give appropriate responds'),
(650, 'TALKING ABOUT EDUCATION'),
(651, 'Mention vocabularies relate to education'),
(652, 'Asking someone education background'),
(653, 'Replying some question relate to education'),
(660, 'TALKING ABOUT CULTURE'),
(661, 'Students learn some vocabularies relate to culture'),
(662, 'Describing culture in certain place'),
(663, 'Asking question relate to culture'),
(670, 'TALKING ABOUT COUNTRY'),
(671, 'Mention the name of country in English'),
(672, 'Describing uniqueness of a certain country'),
(680, 'TALKING ABOUT TOURISM OBJECT'),
(681, 'Mention kinds of tourism objects'),
(682, 'Describing a certain tourism object'),
(683, 'Write simple monologue relates to tourism object'),
(690, 'PRESENT PERFECT'),
(691, 'Comprehend the structure and the usage of present perfect'),
(692, 'Create simple sentence by using present perfect'),
(693, 'Applying the tenses in conversations'),
(700, 'FORMAL ENGLISH'),
(710, 'GIVING OPINION ABOUT JOB'),
(711, 'Mention expression in giving opinion'),
(712, 'Recall the kind of jobs in English'),
(713, 'Discussing opinion about the jobs'),
(720, 'DISCUSSING WAYS of LEARNING'),
(721, 'Mention vocabularies relate to teaching and learning activities'),
(730, 'TELEPHONY COURTESY'),
(731, 'Comprehend manner in answering phone'),
(732, 'Apply the rule in answering phone (role-play)'),
(740, 'HANDLING COMPLAIN'),
(741, 'Understand expression in handling complain'),
(742, 'Giving solution to certain complaints'),
(750, 'GIVING ADVICE'),
(751, 'Identifying expressions of giving advice'),
(752, 'State advice based on certain conditions'),
(761, 'INTERVIEW'),
(762, 'Tips to answer interview questions'),
(763, 'Answering questions in interview'),
(770, 'PAST FUTURE'),
(771, 'Comprehend the structure and the usage of past future'),
(772, 'Create simple sentence by using past future'),
(780, 'FUTURE PERFECT'),
(781, 'Comprehend the structure and the usage of future perfect'),
(782, 'Create simple sentence by using future perfect'),
(783, 'Applying future perfect in conversation'),
(790, 'MAKING PRESENTATION'),
(791, 'Understand the steps of creating presentation'),
(792, 'Comprehend how to deliver presentation'),
(800, 'ESP (ENGLISH for SPECIFIC PURPOSE)'),
(810, 'ENGLISH for HOTEL'),
(811, 'Greeting expression of welcoming the guest'),
(812, 'Expressions of check in'),
(813, 'Describing hotel facilities'),
(814, 'Expressing of escorting the guest'),
(815, 'Handling guest complain'),
(820, 'ENGLISH for RESTAURANT'),
(821, 'How to welcome guest'),
(822, 'Expressions of taking order'),
(823, 'Expressions explaining menu'),
(824, 'Expressions handling guest complain'),
(830, 'ENGLISH for BUSINESS'),
(831, 'Mention vocabularies used in business'),
(832, 'Making business letter'),
(833, 'Handling business meeting'),
(834, 'Holding presentation'),
(840, 'ENGLISH for HEALTH'),
(841, 'Comprehend vocabularies relate to health'),
(842, 'Describing step of handling patient'),
(850, 'ENGLISH for MEDITATION'),
(851, 'Vocabularies about meditation'),
(852, 'Describing step of doing meditation'),
(860, 'ENGLISH for GUIDING'),
(861, 'Welcoming the guest'),
(862, 'Escorting the guest to the destinations'),
(863, 'Able to describe tourism destination'),
(1100, 'ADVERB of FREQUENCY'),
(1101, 'Mention various kinds of adverb of frequency'),
(1102, 'Describing the frequency of doing certain activities'),
(1103, 'Asking question how often someone does certain activities'),
(2100, 'NUMBER'),
(2101, 'Identify number (cardinal-decimal)'),
(2102, 'Saying and writing numbers'),
(2103, 'Applying numbers in sentences'),
(2110, 'GIVING ORDER'),
(2111, 'Identify structure of giving order'),
(2112, 'Create and respond simple order'),
(2120, 'DIRECTION'),
(2121, 'mention expressions used in giving direction'),
(2122, 'mention expessions used in asking direction'),
(2123, 'create dialogue relates to giving direction '),
(2130, 'FOOD and DRINK'),
(2131, 'Recall name of food and beverage'),
(2132, 'Asking and telling favorite food'),
(2140, 'VEGETABLE and FRUIT'),
(2141, 'Mention various kinds of vegetables and fruits'),
(2142, 'Describing the vegetables and fruit'),
(2143, 'Using expression of like and dislike'),
(2150, 'SEASON and WEATHER'),
(2151, 'State vocabularies about season and weather'),
(2152, 'Telling weather and season'),
(2153, 'Asking questions relate to weather and season'),
(2160, 'DISEASE'),
(2161, 'Mention vocabularies relate to disease'),
(2162, 'Asking someone disease'),
(2170, 'ANIMAL'),
(2171, 'Mention kinds of aminal'),
(2172, 'Describe the appearance of animal'),
(2180, 'TRANSPORTATION'),
(2181, 'Mention kinds of transportation'),
(2182, 'Asking questions what transportation used by the students'),
(2190, 'OCCUPATION'),
(2191, 'Mention kinds of jobs'),
(2192, 'Telling the main job description of each job'),
(3100, 'REFLEXIVE'),
(3101, 'Mention reflexive'),
(3102, 'Create simple expressions by using reflexive'),
(3110, '[UN]COUNTABLE NOUN'),
(3111, 'Determine countable and uncountable noun'),
(3112, 'Mention quantifiers'),
(3113, 'Create question by using expression how much and how many'),
(3120, 'DETERMINER'),
(3121, 'Identify kinds of determiner'),
(3122, 'Apply determiner in various context'),
(3130, 'QUESTION TAG'),
(3131, 'Identify structure of tag'),
(3132, 'Create tag of sentences correctly'),
(3140, 'ELIPTICAL SENTENCES '),
(3141, 'mention types of eliptical sentences'),
(3142, 'applying  eliptical sentences in daily conversation'),
(3150, 'DEGREE of COMPARISON'),
(3151, 'Mention some adjectives'),
(3152, 'Identifying the structure of comparison'),
(3153, 'Apply comparison both in spoken and written'),
(3160, 'SHAPE'),
(3161, 'Mention kinds of Shape'),
(3162, 'Using shapes to describe something around the students'),
(3163, 'Asking the shape of other things'),
(3170, 'COLOR'),
(3171, 'Stating kinds of colors'),
(3172, 'Describing the colors of the things around the students'),
(3173, 'Asking the color of Something'),
(4100, 'FUTURE CONTINUOUS TENSE'),
(4101, 'identifying structure and usage of future continuous tense'),
(4102, 'answering question by using simple future continuous '),
(5100, 'SIMPLE PAST TENSE WITH NOMINAL'),
(5101, 'comprehend the sructure and usage of simple past'),
(5102, 'telling condition in the past'),
(5110, 'SIMPLE PAST TENSE WITH VERBAL'),
(5111, 'comprehend the sructure and usage of simple past'),
(5112, 'telling past activities '),
(5120, 'PAST CONTINUOUS TENSE'),
(5121, 'comprehend the structure and usage of present continuous'),
(5122, 'telling activities by using present continuous'),
(5123, 'create question by using present continuous '),
(6100, 'PRESENT PERFECT CONTINUOUS'),
(6101, 'Comprehend the structure and the usage of present perfect continuous'),
(6102, 'Create simple sentence by using present perfect continuous'),
(6103, 'Able to use present perfect continuous actively in conversation'),
(6110, 'PAST PERFECT (VERBAL & NOMINAL)'),
(6111, 'Comprehend the structure and the usage of past perfect'),
(6112, 'Create simple sentence by using past perfect'),
(6113, 'Able to use past perfect actively in conversation'),
(6120, 'PAST PERFECT CONTINUOUS'),
(6121, 'Comprehend the structure and the usage of past perfect continuous tense'),
(6122, 'Create simple sentence by using past perfect continuous tense'),
(6123, 'Able to use past perfect continuous actively in Conversation'),
(6130, 'PASSIVE VOICE'),
(6131, 'comprehend basic structure of passive voice'),
(6132, 'create passive voice using the tenses that have been learnt'),
(6133, 'applying passive voice in daily conversation'),
(6140, 'HABITUAL PAST'),
(6141, 'Comprehend the basic structure of expressing habitual past'),
(6142, 'Create and respond question relate to habit in the past'),
(6150, 'BE USED TO'),
(6151, 'Identify the structure of present habit'),
(6152, 'Create simple conversation relates to present habit'),
(6160, 'MAKING APPOINTMENT'),
(6161, 'Mention kinds of expressions to make appointment'),
(6162, 'Create appointment for certain purpose'),
(6170, 'GERUND and INFINITIVE'),
(6171, 'Identifying the rule of gerund and infinitive'),
(6172, 'Applying gerund and infinitive both in speaking and writing');

-- --------------------------------------------------------

--
-- Table structure for table `syll_123`
--

CREATE TABLE `syll_123` (
  `id` int(11) UNSIGNED NOT NULL,
  `section` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '',
  `assign` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `syll_123`
--

INSERT INTO `syll_123` (`id`, `section`, `topic`, `ind`, `status`, `assign`) VALUES
(100, 1, 0, 0, '', '1'),
(110, 1, 1, 0, '', '1'),
(111, 1, 1, 1, '1', '1'),
(112, 1, 1, 2, '1', '1'),
(113, 1, 1, 3, '', '1'),
(120, 1, 2, 0, '', '1'),
(121, 1, 2, 1, '', '1'),
(122, 1, 2, 2, '', '1'),
(123, 1, 2, 3, '', '1'),
(130, 1, 3, 0, '', '1'),
(131, 1, 3, 1, '', '1'),
(132, 1, 3, 2, '', '1'),
(140, 1, 4, 0, '', '1'),
(141, 1, 4, 1, '', '1'),
(142, 1, 4, 2, '', '1'),
(143, 1, 4, 3, '', '1'),
(150, 1, 5, 0, '', '1'),
(151, 1, 5, 1, '', '1'),
(152, 1, 5, 2, '', '1'),
(153, 1, 5, 3, '', '1'),
(160, 1, 6, 0, '', '1'),
(161, 1, 6, 1, '', '1'),
(162, 1, 6, 2, '', '1'),
(163, 1, 6, 3, '', '1'),
(170, 1, 7, 0, '', '1'),
(171, 1, 7, 1, '', '1'),
(172, 1, 7, 2, '', '1'),
(180, 1, 8, 0, '', '1'),
(181, 1, 8, 1, '', '1'),
(182, 1, 8, 2, '', '1'),
(183, 1, 8, 3, '', '1'),
(190, 1, 9, 0, '', '1'),
(191, 1, 9, 1, '', '1'),
(192, 1, 9, 2, '', '1'),
(193, 1, 9, 2, '', '1'),
(200, 2, 0, 0, '', '0'),
(210, 2, 1, 0, '', '0'),
(211, 2, 1, 1, '', '0'),
(212, 2, 1, 2, '', '0'),
(213, 2, 1, 3, '', '0'),
(220, 2, 2, 0, '', '0'),
(221, 2, 2, 1, '', '0'),
(222, 2, 2, 2, '', '0'),
(223, 2, 2, 3, '', '0'),
(230, 2, 3, 0, '', '0'),
(231, 2, 3, 1, '', '0'),
(232, 2, 3, 2, '', '0'),
(240, 2, 4, 0, '', '0'),
(241, 2, 4, 1, '', '0'),
(242, 2, 4, 2, '', '0'),
(250, 2, 5, 0, '', '0'),
(251, 2, 5, 1, '', '0'),
(252, 2, 5, 2, '', '0'),
(253, 2, 5, 3, '', '0'),
(260, 2, 6, 0, '', '0'),
(261, 2, 6, 1, '', '0'),
(262, 2, 6, 2, '', '0'),
(270, 2, 7, 0, '', '0'),
(271, 2, 7, 1, '', '0'),
(272, 2, 7, 2, '', '0'),
(280, 2, 8, 0, '', '0'),
(281, 2, 8, 1, '', '0'),
(282, 2, 8, 2, '', '0'),
(290, 2, 9, 0, '', '0'),
(291, 2, 9, 1, '', '0'),
(292, 2, 9, 2, '', '0'),
(300, 3, 0, 0, '', '0'),
(310, 3, 1, 0, '', '0'),
(311, 3, 1, 1, '', '0'),
(312, 3, 1, 2, '', '0'),
(313, 3, 1, 3, '', '0'),
(320, 3, 2, 0, '', '0'),
(321, 3, 2, 1, '', '0'),
(322, 3, 2, 2, '', '0'),
(323, 3, 2, 3, '', '0'),
(330, 3, 3, 0, '', '0'),
(331, 3, 3, 1, '', '0'),
(332, 3, 3, 2, '', '0'),
(340, 3, 4, 0, '', '0'),
(341, 3, 4, 1, '', '0'),
(342, 3, 4, 2, '', '0'),
(350, 3, 5, 0, '', '0'),
(351, 3, 5, 1, '', '0'),
(352, 3, 5, 2, '', '0'),
(360, 3, 6, 0, '', '0'),
(361, 3, 6, 1, '', '0'),
(362, 3, 6, 2, '', '0'),
(370, 3, 7, 0, '', '0'),
(371, 3, 7, 1, '', '0'),
(372, 3, 7, 2, '', '0'),
(373, 3, 7, 3, '', '0'),
(380, 3, 8, 0, '', '0'),
(381, 3, 8, 1, '', '0'),
(382, 3, 8, 2, '', '0'),
(390, 3, 9, 0, '', '0'),
(391, 3, 9, 1, '', '0'),
(392, 3, 9, 2, '', '0'),
(400, 4, 0, 0, '', '0'),
(410, 4, 1, 0, '', '0'),
(411, 4, 1, 1, '', '0'),
(412, 4, 1, 2, '', '0'),
(413, 4, 1, 3, '', '0'),
(420, 4, 2, 0, '', '0'),
(421, 4, 2, 1, '', '0'),
(422, 4, 2, 2, '', '0'),
(423, 4, 2, 3, '', '0'),
(430, 4, 3, 0, '', '0'),
(431, 4, 3, 1, '', '0'),
(432, 4, 3, 2, '', '0'),
(433, 4, 3, 3, '', '0'),
(440, 4, 4, 0, '', '0'),
(441, 4, 4, 1, '', '0'),
(442, 4, 4, 2, '', '0'),
(443, 4, 4, 3, '', '0'),
(450, 4, 5, 0, '', '0'),
(451, 4, 5, 1, '', '0'),
(452, 4, 5, 2, '', '0'),
(460, 4, 6, 0, '', '0'),
(461, 4, 6, 1, '', '0'),
(462, 4, 6, 2, '', '0'),
(463, 4, 6, 3, '1', '0'),
(470, 4, 7, 0, '', '0'),
(471, 4, 7, 1, '', '0'),
(472, 4, 7, 2, '', '0'),
(473, 4, 7, 3, '', '0'),
(480, 4, 8, 0, '', '0'),
(481, 4, 8, 1, '', '0'),
(482, 4, 8, 2, '', '0'),
(483, 4, 8, 3, '', '0'),
(490, 4, 9, 0, '', '0'),
(491, 4, 9, 1, '', '0'),
(492, 4, 9, 2, '', '0'),
(493, 4, 9, 3, '', '0'),
(500, 5, 0, 0, '', '0'),
(510, 5, 1, 0, '', '0'),
(511, 5, 1, 1, '0', '0'),
(512, 5, 1, 2, '', '0'),
(513, 5, 1, 3, '', '0'),
(520, 5, 2, 0, '', '0'),
(521, 5, 2, 1, '', '0'),
(522, 5, 2, 2, '0', '0'),
(523, 5, 2, 3, '', '0'),
(530, 5, 3, 0, '', '0'),
(531, 5, 3, 1, '', '0'),
(532, 5, 3, 2, '0', '0'),
(540, 5, 4, 0, '', '0'),
(541, 5, 4, 1, '', '0'),
(542, 5, 4, 2, '', '0'),
(543, 5, 4, 3, '', '0'),
(550, 5, 5, 0, '', '0'),
(551, 5, 5, 1, '', '0'),
(552, 5, 5, 2, '', '0'),
(553, 5, 5, 3, '', '0'),
(560, 5, 6, 0, '', '0'),
(561, 5, 6, 1, '', '0'),
(562, 5, 6, 2, '', '0'),
(563, 5, 6, 3, '', '0'),
(570, 5, 7, 0, '', '0'),
(571, 5, 7, 1, '', '0'),
(572, 5, 7, 2, '', '0'),
(580, 5, 8, 0, '', '0'),
(581, 5, 8, 1, '', '0'),
(582, 5, 8, 2, '', '0'),
(583, 5, 8, 3, '', '0'),
(590, 5, 9, 0, '', '0'),
(591, 5, 9, 1, '', '0'),
(592, 5, 9, 2, '', '0'),
(593, 5, 9, 3, '', '0'),
(600, 6, 0, 0, '', '0'),
(610, 6, 1, 0, '', '0'),
(611, 6, 1, 1, '', '0'),
(612, 6, 1, 2, '', '0'),
(620, 6, 2, 0, '', '0'),
(621, 6, 2, 1, '', '0'),
(622, 6, 2, 2, '', '0'),
(630, 6, 3, 0, '', '0'),
(631, 6, 3, 1, '', '0'),
(632, 6, 3, 2, '', '0'),
(640, 6, 4, 0, '', '0'),
(641, 6, 4, 1, '', '0'),
(642, 6, 4, 2, '', '0'),
(650, 6, 5, 0, '', '0'),
(651, 6, 5, 1, '', '0'),
(652, 6, 5, 2, '', '0'),
(653, 6, 5, 3, '', '0'),
(660, 6, 6, 0, '', '0'),
(661, 6, 6, 1, '', '0'),
(662, 6, 6, 2, '', '0'),
(663, 6, 6, 3, '', '0'),
(670, 6, 7, 0, '', '0'),
(671, 6, 7, 1, '', '0'),
(672, 6, 7, 2, '', '0'),
(680, 6, 8, 0, '', '0'),
(681, 6, 8, 1, '', '0'),
(682, 6, 8, 2, '', '0'),
(683, 6, 8, 3, '', '0'),
(690, 6, 9, 0, '', '0'),
(691, 6, 9, 1, '', '0'),
(692, 6, 9, 2, '', '0'),
(693, 6, 9, 3, '', '0'),
(700, 7, 0, 0, '', '0'),
(710, 7, 1, 0, '', '0'),
(711, 7, 1, 1, '', '0'),
(712, 7, 1, 2, '', '0'),
(713, 7, 1, 3, '', '0'),
(720, 7, 2, 0, '', '0'),
(721, 7, 2, 1, '', '0'),
(730, 7, 3, 0, '', '0'),
(731, 7, 3, 1, '', '0'),
(732, 7, 3, 2, '', '0'),
(740, 7, 4, 0, '', '0'),
(741, 7, 4, 1, '', '0'),
(742, 7, 4, 2, '', '0'),
(750, 7, 5, 0, '', '0'),
(751, 7, 5, 1, '', '0'),
(752, 7, 5, 2, '', '0'),
(761, 7, 6, 1, '', '0'),
(762, 7, 6, 2, '', '0'),
(763, 7, 6, 3, '', '0'),
(770, 7, 7, 0, '', '0'),
(771, 7, 7, 1, '', '0'),
(772, 7, 7, 2, '', '0'),
(780, 7, 8, 0, '', '0'),
(781, 7, 8, 1, '', '0'),
(782, 7, 8, 2, '', '0'),
(783, 7, 8, 3, '', '0'),
(790, 7, 9, 0, '', '0'),
(791, 7, 9, 1, '', '0'),
(792, 7, 9, 2, '', '0'),
(800, 8, 0, 0, '', '0'),
(810, 8, 1, 0, '', '0'),
(811, 8, 1, 1, '', '0'),
(812, 8, 1, 2, '', '0'),
(813, 8, 1, 3, '', '0'),
(814, 8, 1, 4, '', '0'),
(815, 8, 1, 5, '', '0'),
(820, 8, 2, 0, '', '0'),
(821, 8, 2, 1, '', '0'),
(822, 8, 2, 2, '', '0'),
(823, 8, 2, 3, '', '0'),
(824, 8, 2, 4, '', '0'),
(830, 8, 3, 0, '', '0'),
(831, 8, 3, 1, '', '0'),
(832, 8, 3, 2, '', '0'),
(833, 8, 3, 3, '', '0'),
(834, 8, 3, 4, '', '0'),
(840, 8, 4, 0, '', '0'),
(841, 8, 4, 1, '', '0'),
(842, 8, 4, 2, '', '0'),
(850, 8, 5, 0, '', '0'),
(851, 8, 5, 1, '', '0'),
(852, 8, 5, 2, '', '0'),
(860, 8, 6, 0, '', '0'),
(861, 8, 6, 1, '', '0'),
(862, 8, 6, 2, '', '0'),
(863, 8, 6, 3, '', '0'),
(1100, 1, 10, 0, '', '1'),
(1101, 1, 10, 1, '', '1'),
(1102, 1, 10, 2, '', '1'),
(1103, 1, 10, 3, '', '1'),
(2100, 2, 10, 0, '', '0'),
(2101, 2, 10, 1, '', '0'),
(2102, 2, 10, 2, '', '0'),
(2103, 2, 10, 3, '', '0'),
(2110, 2, 11, 0, '', '0'),
(2111, 2, 11, 1, '', '0'),
(2112, 2, 11, 2, '', '0'),
(2120, 2, 12, 0, '', '0'),
(2121, 2, 12, 1, '', '0'),
(2122, 2, 12, 2, '', '0'),
(2123, 2, 12, 3, '', '0'),
(2130, 2, 13, 0, '', '0'),
(2131, 2, 13, 1, '', '0'),
(2132, 2, 13, 2, '', '0'),
(2140, 2, 14, 0, '', '0'),
(2141, 2, 14, 1, '', '0'),
(2142, 2, 14, 2, '', '0'),
(2143, 2, 14, 3, '', '0'),
(2150, 2, 15, 0, '', '0'),
(2151, 2, 15, 1, '', '0'),
(2152, 2, 15, 2, '', '0'),
(2153, 2, 15, 3, '', '0'),
(2160, 2, 16, 0, '', '0'),
(2161, 2, 16, 1, '', '0'),
(2162, 2, 16, 2, '', '0'),
(2170, 2, 17, 0, '', '0'),
(2171, 2, 17, 1, '', '0'),
(2172, 2, 17, 2, '', '0'),
(2180, 2, 18, 0, '', '0'),
(2181, 2, 18, 1, '', '0'),
(2182, 2, 18, 2, '', '0'),
(2190, 2, 19, 0, '', '0'),
(2191, 2, 19, 1, '', '0'),
(2192, 2, 19, 2, '', '0'),
(3100, 3, 10, 0, '', '0'),
(3101, 3, 10, 1, '', '0'),
(3102, 3, 10, 2, '', '0'),
(3110, 3, 11, 0, '', '0'),
(3111, 3, 11, 1, '', '0'),
(3112, 3, 11, 2, '', '0'),
(3113, 3, 11, 3, '1', '0'),
(3120, 3, 12, 0, '', '0'),
(3121, 3, 12, 1, '', '0'),
(3122, 3, 12, 2, '', '0'),
(3130, 3, 13, 0, '', '0'),
(3131, 3, 13, 1, '', '0'),
(3132, 3, 13, 2, '', '0'),
(3140, 3, 14, 0, '', '0'),
(3141, 3, 14, 1, '', '0'),
(3142, 3, 14, 2, '', '0'),
(3150, 3, 15, 0, '', '0'),
(3151, 3, 15, 1, '', '0'),
(3152, 3, 15, 2, '', '0'),
(3153, 3, 15, 3, '', '0'),
(3160, 3, 16, 0, '', '0'),
(3161, 3, 16, 1, '', '0'),
(3162, 3, 16, 2, '', '0'),
(3163, 3, 16, 3, '', '0'),
(3170, 3, 17, 0, '', '0'),
(3171, 3, 17, 1, '', '0'),
(3172, 3, 17, 2, '', '0'),
(3173, 3, 17, 3, '', '0'),
(4100, 4, 10, 0, '', '0'),
(4101, 4, 10, 1, '', '0'),
(4102, 4, 10, 2, '', '0'),
(5100, 5, 10, 0, '', '0'),
(5101, 5, 10, 1, '', '0'),
(5102, 5, 10, 2, '', '0'),
(5110, 5, 11, 0, '', '0'),
(5111, 5, 11, 1, '0', '0'),
(5112, 5, 11, 2, '', '0'),
(5120, 5, 12, 0, '', '0'),
(5121, 5, 12, 1, '', '0'),
(5122, 5, 12, 2, '', '0'),
(5123, 5, 12, 3, '', '0'),
(6100, 6, 10, 0, '', '0'),
(6101, 6, 10, 1, '', '0'),
(6102, 6, 10, 2, '', '0'),
(6103, 6, 10, 3, '', '0'),
(6110, 6, 11, 0, '', '0'),
(6111, 6, 11, 1, '', '0'),
(6112, 6, 11, 2, '', '0'),
(6113, 6, 11, 3, '', '0'),
(6120, 6, 12, 0, '', '0'),
(6121, 6, 12, 1, '', '0'),
(6122, 6, 12, 2, '', '0'),
(6123, 6, 12, 3, '', '0'),
(6130, 6, 13, 0, '', '0'),
(6131, 6, 13, 1, '', '0'),
(6132, 6, 13, 2, '', '0'),
(6133, 6, 13, 3, '', '0'),
(6140, 6, 14, 0, '', '0'),
(6141, 6, 14, 1, '', '0'),
(6142, 6, 14, 2, '', '0'),
(6150, 6, 15, 0, '', '0'),
(6151, 6, 15, 1, '', '0'),
(6152, 6, 15, 2, '', '0'),
(6160, 6, 16, 0, '', '0'),
(6161, 6, 16, 1, '', '0'),
(6162, 6, 16, 2, '', '0'),
(6170, 6, 17, 0, '', '0'),
(6171, 6, 17, 1, '', '0'),
(6172, 6, 17, 2, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `s_123`
--

CREATE TABLE `s_123` (
  `meeting` int(5) UNSIGNED NOT NULL,
  `course_date` datetime NOT NULL,
  `teacher` varchar(255) NOT NULL DEFAULT '',
  `duration` varchar(255) DEFAULT NULL,
  `material` varchar(2000) NOT NULL,
  `evaluation` varchar(2500) NOT NULL DEFAULT '',
  `w` varchar(255) NOT NULL DEFAULT '',
  `s` varchar(255) NOT NULL DEFAULT '',
  `test` varchar(255) NOT NULL DEFAULT '',
  `test_number` varchar(255) NOT NULL DEFAULT '',
  `test_name` varchar(255) NOT NULL DEFAULT '',
  `of_test_number` varchar(255) NOT NULL DEFAULT '',
  `of_test` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_level` varchar(3) DEFAULT NULL,
  `unread_message` varchar(255) NOT NULL DEFAULT 'no',
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `unread_message`, `avatar`) VALUES
(1, 'caesar', 'user@01.com', 'afb3ded8b6ccd4fe60b7e9eb89135e67', '1', 'no', 'assets/users/user01/avatar.jpg'),
(2, 'Herna Lastari', 'user@02.com', '947c783924a1843353c76162736637b4', '2', 'no', 'assets/users/Herna Lastari/avatar.jpg'),
(3, 'Yuni', 'user@03.com', '25d55ad283aa400af464c76d713c07ad', '3', 'yes', 'assets/users/yuni/avatar.jpg'),
(4, 'mdsugiarta', '000', '25d55ad283aa400af464c76d713c07ad', '1', 'yes', 'assets/users/mdsugiarta/avatar.jpg'),
(5, 'Sumer', NULL, '25d55ad283aa400af464c76d713c07ad', '1', 'no', 'assets/users/sumer/avatar.jpg'),
(6, 'Julie', NULL, '25d55ad283aa400af464c76d713c07ad', '3', 'yes', 'assets/users/Julie/avatar.jpg'),
(7, 'Olgamaria', NULL, '25d55ad283aa400af464c76d713c07ad', '3', 'yes', 'assets/users/Olgamaria/avatar.jpg'),
(8, 'Pris', NULL, '25d55ad283aa400af464c76d713c07ad', '3', 'no', 'assets/users/Pris/avatar.jpg'),
(9, 'gede ayu etalia', NULL, '25d55ad283aa400af464c76d713c07ad', '3', 'yes', 'assets/users/gede ayu etalia/avatar.jpg'),
(10, 'adi arini', NULL, '25d55ad283aa400af464c76d713c07ad', '19', 'yes', 'assets/users/adi arini/avatar.jpg'),
(11, 'ivanarya', NULL, '25d55ad283aa400af464c76d713c07ad', '3', 'yes', 'assets/users/ivanarya/avatar.jpg'),
(12, 'Je', NULL, '25d55ad283aa400af464c76d713c07ad', '3', 'yes', 'assets/users/Je/avatar.jpg'),
(13, 'michel', NULL, '25d55ad283aa400af464c76d713c07ad', '3', 'yes', 'assets/users/michel/avatar.jpg'),
(14, 'nitha pramitha', NULL, '25d55ad283aa400af464c76d713c07ad', '2', 'yes', 'assets/users/nithapramitha/avatar.jpg'),
(15, 'inkaa', NULL, '25d55ad283aa400af464c76d713c07ad', '21', 'yes', 'assets/users/inkaa/avatar.jpg'),
(16, 'Mr. Komang', NULL, '25d55ad283aa400af464c76d713c07ad', '1', 'yes', 'assets/users/mrkomang/avatar.jpg'),
(17, 'JRE FO', NULL, '25d55ad283aa400af464c76d713c07ad', '21', 'no', 'assets/users/fo/avatar.jpg'),
(18, 'Suma Hendra', NULL, '25d55ad283aa400af464c76d713c07ad', '1', 'yes', 'assets/users/Sumahendra/avatar.jpg'),
(19, 'Ayu Febri', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, 'yes', 'assets/users/Ayu Febri/avatar.jpg'),
(20, 'Ayu_Citra', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, 'no', 'assets/users/Ayu_Citra/avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fsp_123`
--
ALTER TABLE `fsp_123`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schd_2020-02-09`
--
ALTER TABLE `schd_2020-02-09`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schd_2020-02-10`
--
ALTER TABLE `schd_2020-02-10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `pin` (`pin`);

--
-- Indexes for table `syllabus_master`
--
ALTER TABLE `syllabus_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syll_123`
--
ALTER TABLE `syll_123`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_123`
--
ALTER TABLE `s_123`
  ADD PRIMARY KEY (`meeting`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fsp_123`
--
ALTER TABLE `fsp_123`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schd_2020-02-09`
--
ALTER TABLE `schd_2020-02-09`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schd_2020-02-10`
--
ALTER TABLE `schd_2020-02-10`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `pin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `syllabus_master`
--
ALTER TABLE `syllabus_master`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6173;

--
-- AUTO_INCREMENT for table `syll_123`
--
ALTER TABLE `syll_123`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6173;

--
-- AUTO_INCREMENT for table `s_123`
--
ALTER TABLE `s_123`
  MODIFY `meeting` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
