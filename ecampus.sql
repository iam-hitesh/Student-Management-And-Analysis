-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2017 at 10:00 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `idno` int(15) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`idno`, `regno`, `branch`, `session`, `sem`, `batch`, `subject`, `status`, `attendance`, `updated_on`, `updated_by`) VALUES
(1, '15ECTCS031', 'CERAMIC ENGINEERING', '2015-19', 'SEMESTER 1', 'A2', 'ENGINEERING MATHEMATICS - I', 1, 1, '2017-03-08', 'Hitesh'),
(6, '15ECTCS031', 'CERAMIC ENGINEERING', '2015-19', 'SEMESTER 1', 'A2', 'ENGINEERING MATHEMATICS - I', 1, 1, '2017-03-29', 'Hitesh');

-- --------------------------------------------------------

--
-- Table structure for table `books_list`
--

CREATE TABLE `books_list` (
  `id` int(11) NOT NULL,
  `bookid` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `authorname` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `bookcost` varchar(2552) NOT NULL,
  `status` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_list`
--

INSERT INTO `books_list` (`id`, `bookid`, `isbn`, `bookname`, `authorname`, `publisher`, `bookcost`, `status`, `category`, `profile_pic`, `updated_by`, `updated_on`) VALUES
(2, '3456789', '567890', '756890', '67890', '67890', '567890', 'Available', 'AVAILABLE', '', '', '0000-00-00 00:00:00'),
(6, '6788', '78', 'Operating Systems', 'AR Rehman', 'Prdoucers', '270', 'Available', 'Available', '', '', '0000-00-00 00:00:00'),
(7, '89278', '789789', 'HITESH', '789789', '7879', '78978', '', 'Available', '', '', '0000-00-00 00:00:00'),
(8, '68768', '678678', '6766', '6778', '67867', '7676', '', 'Not Available', '', '', '0000-00-00 00:00:00'),
(9, '86776886', '678689', '7890', '789', '7869', '789', 'Not Available', 'Text Book', '', '', '0000-00-00 00:00:00'),
(10, '34562182', '6788', '78978', 'Hjkkjh', 'Kllj', 'KLJKL', 'Available', 'Novel', '', '', '0000-00-00 00:00:00'),
(11, 'THANKS', 'WELCOME', 'KYA KAREGA', 'MAINE HUN NAA', 'TU HI TO NA CHAIYE', 'AUKAT SE BAHAR', 'Available', 'Novel', 'notices/bg.jpg', 'Hiteshy', '2017-03-29 11:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `chat_app`
--

CREATE TABLE `chat_app` (
  `idno` int(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` varchar(50000) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_app`
--

INSERT INTO `chat_app` (`idno`, `sender`, `receiver`, `message`, `time`) VALUES
(2, 'hitesh', 'jitendra', 'Hii', '2017-04-03 00:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Ceramic Engineering'),
(2, 'Ceramic Engineering'),
(3, 'Civil Engineering'),
(4, 'Computer Science & Engineering'),
(5, 'Electrical Engineering'),
(6, 'Electronics & Communication Engineering'),
(7, 'Mechanical Engineering'),
(8, 'Physics'),
(9, 'Chemistry'),
(10, 'Mathematics'),
(11, 'Humanities & English'),
(12, 'Administration/Proctor'),
(13, 'Library'),
(14, 'Exam Section'),
(15, 'MBA');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`) VALUES
(1, 'Principal'),
(2, 'Head of Department'),
(3, 'Professor'),
(4, 'Associate Professor'),
(5, 'Assistant Professor'),
(6, 'Guest Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `idno` int(15) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `10marksheet` varchar(255) NOT NULL,
  `12marksheet` varchar(255) NOT NULL,
  `1semamarksheet` varchar(255) NOT NULL,
  `2semmarksheet` varchar(255) NOT NULL,
  `3rdsemmarksheet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_list`
--

CREATE TABLE `faculty_list` (
  `id` int(11) NOT NULL,
  `idno` varchar(65) NOT NULL,
  `title` varchar(25) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(65) NOT NULL,
  `gender` varchar(65) NOT NULL,
  `dob` varchar(65) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `mob` varchar(20) NOT NULL,
  `designation` varchar(65) NOT NULL,
  `department` varchar(255) NOT NULL,
  `bg` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `research` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_list`
--

INSERT INTO `faculty_list` (`id`, `idno`, `title`, `fname`, `lname`, `gender`, `dob`, `mail`, `mob`, `designation`, `department`, `bg`, `address`, `research`, `about`, `profile_pic`, `updated_on`, `updated_by`) VALUES
(1, '678168271', 'MR.', 'HITESHR', 'YADAV', 'MALE', '20/04/1999', 'HHITESHYADAV@GMAIL.COM', '9024139964', 'HEAD OF DEPARTMENT', 'COMPUTER SCIENCE & ENGINEERING', 'A-+', 'ALWAR', 'OPERATING SYSTEMS', '', '', '2017-03-27 10:30:42', 'Hitesh'),
(2, '6757657', 'PROF.', 'HITESH AYDAV', 'HITSHJH', 'MALE', '20/04/1999', 'HHITESHYADAV@GMAIL.COM', '9024139964', 'HEAD OF DEPARTMENT', 'COMPUTER SCIENCE & ENGINEERING', 'A+', 'ALWAR', 'ALWAR', '', '', '2017-03-29 13:22:19', 'Hiteshy'),
(3, '789977', 'Mr.', 'Hitesh', 'Yadav', 'Male', '20/04/1999', 'hhiteshyadav@gmail.com', '9024139964', 'Head Of Department', 'Computer Science & Engineering', 'B+', 'Bikaner', 'Cryptography', '', '', '', ''),
(4, 'IUYUYY', 'Mr.', 'HITESH YADAV', 'TADA', 'Male', '20/01/199', 'hhiteshyadav@gmail.com', '9024139964', 'Head Of Department', 'Computer Science & Engineering', 'A+', 'HITESHYADAV', 'Cryptography', '', '', '', ''),
(5, 'MIAN', 'Mr.', 'TU ', 'LABjk', 'Male', 'LAb', 'kjhjk@k.com', 'Jks@h.com', 'Head Of Department', 'Computer Science & Engineering', 'A+', 'CHECK IT LATER', 'Cryptography', '', '', '', ''),
(6, '6768', 'Mr.', 'HITESHRA', 'YADAV', 'Female', '20/01/199', 'hhiteshyadav@gmail.com', '9024139964', 'Head Of Department', 'Ceramic Engineering', 'A+', 'BIA', 'Ioiou', '', 'uploads/facultypic/bg.jpg', '2017-03-29 19:35:13', '$Hitesh');

-- --------------------------------------------------------

--
-- Table structure for table `fees_allocation`
--

CREATE TABLE `fees_allocation` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `updated_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_allocation`
--

INSERT INTO `fees_allocation` (`id`, `regno`, `branch`, `batch`, `session`, `fees`, `status`, `note`, `added_by`, `updated_on`) VALUES
(1, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '35000', 'Submitted', 'SEM 1 Tution Fee', 'HItesh', '2015-08-05'),
(14, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '1200', 'Submitted', 'SEM 1 Exam Fee', 'HItesh', '2016-01-05'),
(15, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '35000', 'Submitted', 'SEM 2 Tution Fee', 'Hitesh', '2016-02-05'),
(16, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '2400', 'Submitted', 'SEM 2 Exam Fee', 'Hitesh', '2016-04-20'),
(17, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '35000', 'Submitted', 'SEM 3 Tution Fee', 'Hitesh', '2016-08-05'),
(18, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '1200', 'Submitted', 'SEM 3 Exam Fee', 'Hitesh', '2016-10-05'),
(19, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '1000', 'Submitted', 'Student Welfare Fee', 'Hitesh', '2016-10-05'),
(20, '15ECTCS031', 'Computer Science & Engineering', 'A2', '2015-19', '35000', 'Submitted', 'SEM 4 Tution Fee', 'Hitesh', '2017-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(12) NOT NULL,
  `bookid` varchar(255) NOT NULL,
  `issued_to` varchar(255) NOT NULL,
  `issued_on` datetime NOT NULL,
  `issued_by` varchar(255) NOT NULL,
  `returned` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `bookid`, `issued_to`, `issued_on`, `issued_by`, `returned`) VALUES
(1, '1234', 'Hitesh Yadav', '2017-03-08 00:00:00', 'Hitesh', '2017-03-09 00:00:00'),
(2, '1234', 'Ram', '2017-03-16 00:00:00', 'Hitesh', '2017-03-25 00:00:00'),
(7, '1234', '15ECTCS031', '2017-03-27 13:34:22', 'Hitesh', '0000-00-00 00:00:00'),
(8, '1234', '15ECTCS031', '2017-03-27 13:35:52', 'Hitesh', '0000-00-00 00:00:00'),
(9, '1234', '144', '2017-03-27 13:40:11', 'Hitesh', '0000-00-00 00:00:00'),
(10, '1234', '2671', '2017-03-27 13:46:08', 'Hitesh', '0000-00-00 00:00:00'),
(11, '1234', '123456', '2017-03-27 14:31:09', 'Hitesh', '2017-03-27 14:31:14'),
(12, '3456789', '15ECTCS031', '2017-03-27 14:33:43', 'Hitesh', '2017-03-27 14:33:50'),
(13, '3456789', '15ECTCS031', '2017-03-27 14:35:01', 'Hitesh', '2017-03-27 14:35:06'),
(14, '3456789', '15ECTCS031', '2017-03-27 15:22:32', 'Hitesh', '2017-03-29 13:41:10'),
(15, '1234', '15ECTCS031', '2017-03-29 12:34:16', 'Hiteshy', '0000-00-00 00:00:00'),
(16, '6788', '15ECTCS031', '2017-03-29 13:11:01', 'Hiteshy', '2017-03-29 13:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `marks_allocation`
--

CREATE TABLE `marks_allocation` (
  `id` int(12) NOT NULL,
  `regno` varchar(250) NOT NULL,
  `fname` varchar(2552) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `exam` varchar(250) NOT NULL,
  `sem` varchar(45) NOT NULL,
  `batch` varchar(12) NOT NULL,
  `marks` int(15) NOT NULL,
  `max_marks` int(15) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_allocation`
--

INSERT INTO `marks_allocation` (`id`, `regno`, `fname`, `lname`, `branch`, `session`, `subject`, `exam`, `sem`, `batch`, `marks`, `max_marks`, `added_by`, `updated_on`) VALUES
(1, '15ECTCS031', 'Hitesh', 'Yadav', 'Ceramic Engineering', '2015-19', 'Engineering Mathematics - I', 'Mid Term 1', 'Semester 1', 'A2', 8, 10, 'Hitesh', '2017-03-15 00:00:00'),
(2, '15ECTCS031', 'Hitesh', 'Yadav', 'Ceramic Engineering', '2015-19', 'Engineering Physics - I', 'Mid Term 1', 'Semester 1', 'A2', 7, 10, 'Hitesh', '2017-03-22 00:00:00'),
(3, '15ECTCS031', 'Hitesh', 'Yadav', 'Ceramic Engineering', '2015-19', 'ENGINEERING MATHEMATICS - I', 'Mid Term 1', 'SEMESTER 1', 'A2', 10, 10, 'Hitesh', '2017-03-31 18:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `notice_topic` varchar(255) NOT NULL,
  `notice_details` text NOT NULL,
  `notice_link` text NOT NULL,
  `file` text NOT NULL,
  `branch` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_topic`, `notice_details`, `notice_link`, `file`, `branch`, `session`, `created_by`, `created_on`) VALUES
(1, 'Exam Sechdule', 'This is Just a Trial', 'http://href.com', 'notices/bg.jpg', 'Computer', '2016', 'Hitesh', '2017-03-09 00:00:00'),
(2, 'This Is Again A Trial', 'Foo Fighters is an American rock band, formed in Seattle, Washington in 1994. It was founded by Nirvana drummer Dave Grohl as a one-man project following the death of Kurt Cobain and the resulting dissolution of his previous band. The group got its name from the UFOs and various aerial phenomena that were reported by Allied aircraft pilots in World War II, which were known collectively as foo fighters.\r\n\r\nPrior to the release of Foo Fighters\' 1995 debut album Foo Fighters, which featured Grohl as the only official member, Grohl recruited bassist Nate Mendel and drummer William Goldsmith, both formerly of Sunny Day Real Estate, as well as Nirvana touring guitarist Pat Smear to complete the lineup. The band began with performances in Portland, Oregon. Goldsmith quit during the recording of the group\'s second album, The Colour and the Shape (1997), when most of the drum parts were re-recorded by Grohl himself. Smear\'s departure followed soon afterward, though he would rejoin them in 2005.\r\n\r\nThey were replaced by Taylor Hawkins and Franz Stahl, respectively, although Stahl was fired before the recording of the group\'s third album, There Is Nothing Left to Lose (1999). The band briefly continued as a trio until Chris Shiflett joined as the band\'s lead guitarist after the completion of There Is Nothing Left to Lose. The band released its fourth album, One by One, in 2002. The group followed that release with the two-disc In Your Honor (2005), which was split between acoustic songs and heavier material. Foo Fighters released its sixth album, Echoes, Silence, Patience & Grace, in 2007. The band\'s seventh studio album, Wasting Light, produced by Butch Vig was released in 2011, in which Smear returned as a full member. In November 2014, the band\'s eighth studio album, Sonic Highways, was released as an accompanying soundtrack to the Grohl-directed 2014 miniseries of the same name.\r\n\r\nOver the course of the band\'s career, four of its albums have won Grammy Awards for Best Rock Album. As of 2015, the band\'s eight albums have sold 12 million copies in the U.S., and 30 million worldwide.[2]', 'https://en.wikipedia.org/wiki/Foo_Fighters', 'notices/bg.jpg', 'COMPUTER SCIENCE & ENGINEERING', '2014 - 18(4th Year)', 'Hitesh', '2017-03-27 21:20:13'),
(3, 'Once Again I Am Here', 'thank you', 'hh', 'notices/bg.jpg', 'COMPUTER SCIENCE & ENGINEERING', '2016 - 20(2nd Year)', 'Hitesh', '2017-03-28 12:46:55'),
(4, 'H', 'yuyui', 'yuyui', 'uploads/bg.jpg', 'CERAMIC ENGINEERING', '2017 - 21(1st Year)', 'Hitesh', '2017-03-30 02:36:58'),
(5, 'H', 'yuyui', 'yuyui', 'uploads/bg.jpg', 'CERAMIC ENGINEERING', '2017 - 21(1st Year)', 'Hitesh', '2017-03-30 02:37:23'),
(6, '4567890-', '567890-', '567890', 'uploads/bg.jpg', 'CIVIL ENGINEERING', '2016 - 20(2nd Year)', 'Hitesh', '2017-03-30 02:37:43'),
(7, '4567890-', '567890-', '567890', 'uploads/bg.jpg', 'CIVIL ENGINEERING', '2016 - 20(2nd Year)', 'Hitesh', '2017-03-30 02:37:54'),
(8, '4567890-', '567890-', '567890', 'uploads/bg.jpg', 'CIVIL ENGINEERING', '2016 - 20(2nd Year)', 'Hitesh', '2017-03-30 02:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `idno` int(15) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `languages` text NOT NULL,
  `interests` varchar(3000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `email` varchar(3000) NOT NULL,
  `city` varchar(3000) NOT NULL,
  `study` varchar(3000) NOT NULL,
  `skills` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`idno`, `regno`, `languages`, `interests`, `title`, `email`, `city`, `study`, `skills`) VALUES
(1, '15ECTCS031', 'PHP,Python,C++,C,Javascript,Bash,Arduino,HTML,CSS', 'Operating Systems', 'Programmer', 'hhiteshyadav@gmail.com', 'Jaipur', '', 'Xcode,MacOS,Linux,DBMS'),
(2, '15ECTCS032', 'C,C++,PHP', 'Operating Systems,Cryptography', 'Works at Lucidieus', 'napstar.hits@gmail.com', 'Bikaner', 'Alwar', 'Xcode,IntelliJ');

-- --------------------------------------------------------

--
-- Table structure for table `p_project`
--

CREATE TABLE `p_project` (
  `idno` int(45) NOT NULL,
  `regno` varchar(1000) NOT NULL,
  `project` varchar(1000) NOT NULL,
  `project_expo` text NOT NULL,
  `link` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_project`
--

INSERT INTO `p_project` (`idno`, `regno`, `project`, `project_expo`, `link`) VALUES
(1, '15ECTCS031', 'Channel I', 'This is developed in c and C++', 'http://facebook.com'),
(2, '15ECTCS031', 'Security Software', 'THis is an example of PHP and CPP', 'http://facebook.com'),
(3, '15ECTCS032', 'Security Tester', 'Python under ', 'http://github.com/security');

-- --------------------------------------------------------

--
-- Table structure for table `p_work`
--

CREATE TABLE `p_work` (
  `idno` int(20) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `work_at` varchar(1000) NOT NULL,
  `position` varchar(1000) NOT NULL,
  `work_period` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `p_work`
--

INSERT INTO `p_work` (`idno`, `regno`, `work_at`, `position`, `work_period`) VALUES
(1, '15ECTCS031', 'Cyberops LLC', 'Security Analyst', '2 Months from 1st Jan 2017 to Feb 2017'),
(2, '15ECTCS031', 'Lucidieus Pvt. Ltd.', 'Information Security Analyst', '2 Months from Feb 2017 to March 2017'),
(3, '15ECTCS032', 'IIT Mandi', 'Intern', '2 Years');

-- --------------------------------------------------------

--
-- Table structure for table `strings`
--

CREATE TABLE `strings` (
  `id` int(12) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `departments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strings`
--

INSERT INTO `strings` (`id`, `subjects`, `session`, `departments`) VALUES
(1, 'ENGINEERING PHYSICS - I ', '2017 - 21(1st Year)', 'CERAMIC ENGINEERING'),
(2, 'ENGINEERING CHEMISTRY', '2016 - 20(2nd Year)', 'CIVIL ENGINEERING'),
(3, 'COMMUNICATIVE ENGLISH', '2015 - 19(3rd Year)', 'COMPUTER SCIENCE & ENGINEERING'),
(4, 'ENGINEERING MATHEMATICS - I', '2014 - 18(4th Year)', 'ELECTRICAL ENGINEERING'),
(5, 'BASIC ELECTRICAL & ELECTRONICS ENGINEERING', '', 'ELECTRICAL & ELECTRONICS ENGINEERING'),
(6, 'ENGINEERING PHYSICS LAB - 1', '', 'MECHANICAL ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `students_list`
--

CREATE TABLE `students_list` (
  `id` int(11) NOT NULL,
  `regno` varchar(40) NOT NULL,
  `univreg` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(55) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `ptmail` varchar(65) NOT NULL,
  `stmob` varchar(20) NOT NULL,
  `ptmob` varchar(20) NOT NULL,
  `ftname` varchar(65) NOT NULL,
  `mtname` varchar(65) NOT NULL,
  `ftprof` varchar(65) NOT NULL,
  `mtprof` varchar(65) NOT NULL,
  `branch` varchar(65) NOT NULL,
  `session` varchar(65) NOT NULL,
  `mentor` varchar(255) NOT NULL,
  `batch` varchar(5) NOT NULL,
  `category` varchar(65) NOT NULL,
  `ptincome` varchar(65) NOT NULL,
  `bg` varchar(65) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `profile_pic` varchar(215) NOT NULL,
  `updated_on` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_list`
--

INSERT INTO `students_list` (`id`, `regno`, `univreg`, `fname`, `lname`, `gender`, `dob`, `mail`, `ptmail`, `stmob`, `ptmob`, `ftname`, `mtname`, `ftprof`, `mtprof`, `branch`, `session`, `mentor`, `batch`, `category`, `ptincome`, `bg`, `address`, `about`, `profile_pic`, `updated_on`, `updated_by`) VALUES
(2, '15ECTCS031', '15ECTCS035', 'Hitesh', 'Yadav', 'Male', '20/04/1999', 'hhiteshyadav@gmail.com', 'harindrakumar76@gmail.com', '7891537456', '9024139964', 'Harindra Kumar', 'Rajesh Devi', 'Farmer', 'HouseWife', 'Ceramic Engineering', '2015-19', 'Sunita Choudhary', 'A2', 'OBC', '45000', 'A+', 'Alwar', 'Empresario por eleccion , loco por defecto ; )\r\n\r\n', 'uploads/stprofile/IMG-20170228-WA0001.jpg', '2017-04-04 12:11:46', 'hitesh'),
(3, '15ECTCS032', '', 'Jitendra', 'Mali', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(12) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subcode`, `subjects`, `branch`, `sem`) VALUES
(1, '101', 'COMMUNICATIVE ENGLISH', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(2, '102', 'ENGINEERING MATHEMATICS - I', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(3, '103', 'ENGINEERING PHYSICS - I', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(4, '104', 'ENGINEERING CHEMISTRY', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(5, '105', 'BASIC ELECTRICAL & ELECTRONICS ENGINEERING', 'COMPUTER SCIENCE & ENGINEERING', 'SEMESTER 1'),
(6, '106', 'ENGINEERING PHYSICS LAB-I', 'COMPUTER SCIENCE & ENGINEERING', 'SEMESTER 1'),
(7, '107', 'ENGINEERING CHEMISTRY LAB', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(8, '108', 'ELECTRICAL & ELECTRONICS LAB', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(9, '109', 'PRACTICAL GEOMETRY', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(10, '110', 'WORKSHOP PRACTICE', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(11, '111', 'DISCIPLINE & EXTRA CURRICULAR ACTIVITIES', 'CERAMIC ENGINEERING', 'SEMESTER 1'),
(12, '201', 'COMMUNICATION TECHNIQUES', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(13, '202', 'ENGINEERING MATHEMATICS-II', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(14, '203', 'ENGINEERING PHYSICS-II', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(15, '204', 'CHEMISTRY & ENVIRONMENTAL ENGINEERING', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(16, '205', 'ENGINEERING MECHANICS', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(17, '206', 'FUNDAMENTALS OF COMPUTER PROGRAMMING', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(18, '207', 'ENGINEERING PHYSICS LAB-II', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(19, '208', 'CHEMISTRY & ENVIRONMENTAL ENGINEERING LAB', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(20, '209', 'COMPUTER PROGRAMMING LAB', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(21, '210', 'MACHINE DRAWING', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(22, '211', 'COMMUNICATION TECHNIQUE LAB', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(23, '212', 'DISCIPLINE & EXTRA CURRICULAR ACTIVITIES', 'CERAMIC ENGINEERING', 'SEMESTER 2'),
(24, '3CR1A', 'CERAMIC RAW MATERIALS AND CHARACTERIZATION', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(25, '3CR2A', 'CERAMIC PROCESSING', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(26, '', 'MATERIALS SCIENCE', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(27, '', 'ELECTRONIC MEASUREMENT & INSTRUMENTATION', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(28, '', 'THEORY OF SOLID MECHANICS', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(29, '', 'ADVANCED ENGG. MATHEMATICS-1', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(30, '', 'CERAMIC RAW MATERIAL & CHARACTERIZATION LAB', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(31, '', 'MINERALOGY AND MICROSCOPY LAB', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(32, '', 'ELECTRONICS MEASUREMENT & INSTRUMENTATION LAB', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(33, '', 'SOLID MECHANICS & MACHINE LAB', 'CERAMIC ENGINEERING', 'SEMESTER 3'),
(34, '', 'DISCIPLINE & EXTRA CURRICULAR ACTIVITY', 'CERAMIC ENGINEERING', 'SEMESTER 3');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(12) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `mem_regno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `regno`, `members`, `mem_regno`) VALUES
(1, '15ECTCS031', 'Jitendra Mali', '15ECTCS034'),
(2, '15ECTCS031', 'Abhinav Chouhan', '15ECTCS002');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `regno` varchar(60) NOT NULL,
  `univreg` varchar(65) NOT NULL,
  `idno` varchar(65) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_type` char(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `regno`, `univreg`, `idno`, `password`, `user_type`, `created_at`, `updated_by`) VALUES
(1, 'hiteshy', '1234', '', '', '700c8b805a3e2a265b01c77614cd8b21', 'student', '2017-03-30 22:51:59', ''),
(2, '123', '123456', '', '', '6116afedcb0bc31083935c1c262ff4c9', 'student', '2017-03-30 22:59:29', ''),
(3, 'hitesh', '15ECTCS031', '', '', 'd93a5def7511da3d0f2d171d9c344e91', 'student', '2017-03-30 23:43:58', ''),
(4, 'jitendra', '15ECTCS035', '', '', 'd93a5def7511da3d0f2d171d9c344e91', 'student', '2017-03-31 12:17:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(15) NOT NULL,
  `regno` varchar(2552) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `logged_in` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `books_list`
--
ALTER TABLE `books_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookid` (`bookid`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `chat_app`
--
ALTER TABLE `chat_app`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `faculty_list`
--
ALTER TABLE `faculty_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idno` (`idno`);

--
-- Indexes for table `fees_allocation`
--
ALTER TABLE `fees_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_allocation`
--
ALTER TABLE `marks_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `p_project`
--
ALTER TABLE `p_project`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `p_work`
--
ALTER TABLE `p_work`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `strings`
--
ALTER TABLE `strings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_list`
--
ALTER TABLE `students_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regno` (`regno`),
  ADD UNIQUE KEY `univreg` (`univreg`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `idno` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `books_list`
--
ALTER TABLE `books_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `chat_app`
--
ALTER TABLE `chat_app`
  MODIFY `idno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `idno` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faculty_list`
--
ALTER TABLE `faculty_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fees_allocation`
--
ALTER TABLE `fees_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `marks_allocation`
--
ALTER TABLE `marks_allocation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `idno` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `p_project`
--
ALTER TABLE `p_project`
  MODIFY `idno` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `p_work`
--
ALTER TABLE `p_work`
  MODIFY `idno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `strings`
--
ALTER TABLE `strings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students_list`
--
ALTER TABLE `students_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
