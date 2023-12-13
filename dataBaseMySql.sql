-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 10:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `btype` varchar(20) NOT NULL,
  `bname` varchar(255) DEFAULT NULL,
  `bauthor` varchar(255) DEFAULT NULL,
  `bimage` varchar(255) DEFAULT NULL,
  `bprice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `btype`, `bname`, `bauthor`, `bimage`, `bprice`) VALUES
(1, 'Novels', 'Sajjayana', 'Achala Dilrukshi', 'images/Novels/book5.jpg', 1755),
(2, 'Novels', 'Back to school', 'Mallawarachchi', 'images/Novels/book6.jpg', 900),
(3, 'Novels', 'Sirasalawanya', 'Chamil harshana', 'images/Novels/book7.jpg', 920),
(4, 'Novels', 'Pini Yahan', 'chethana de Silva', 'images/Novels/book8.jpg', 1800),
(5, 'Novels', 'Viraga Raga', 'Madushika Dilhani', 'images/Novels/book9.jpg', 1296),
(6, 'Novels', 'Ada', 'Anuhas Viduranga', 'images/Novels/book10.jpg', 495),
(7, 'Novels', 'walawa', 'Piyadasa Udawatta', 'images/Novels/book11.jpg', 780),
(8, 'Novels', 'Sashayi Mamayi', 'Damayanthi Ambepitiya', 'images/Novels/book12.jpg', 490),
(9, 'ShortStory', 'Life Flows', 'Thyaga Dissanayake', 'images/ShortStory/book101.jpg', 495),
(10, 'ShortStory', 'Jewels', 'Manel Eriyagama', 'images/ShortStory/book102.jpg', 600),
(11, 'ShortStory', 'My Universe', 'Rusiru Tharana', 'images/ShortStory/book103.jpg', 450),
(12, 'ShortStory', 'Unbound', 'Sarasavi Poth', 'images/ShortStory/book104.jpg', 780),
(13, 'ShortStory', 'Asanga Saha Joshu', 'Swarnakanthi Perera', 'images/ShortStory/book105.jpg', 600),
(14, 'ShortStory', 'Pasuthewilla Ahawarayi', 'Saman D Waduge', 'images/ShortStory/book106.jpg', 550),
(15, 'ShortStory', 'The Faith', 'Thilini Peshala', 'images/ShortStory/book107.jpg', 490),
(16, 'ShortStory', 'Oddumaa', 'Ayathurai Santhan', 'images/ShortStory/book108.jpg', 430),
(17, 'Fantasy', 'Starter Villain', 'John Scalzi', 'images/Fantasy/book201.jpg', 1235),
(18, 'Fantasy', 'jim butcher', 'WarriorBorn', 'images/Fantasy/book202.jpg', 3200),
(19, 'Fantasy', 'faebound', 'Saara El-Arifi', 'images/Fantasy/book203.jpg', 1250),
(20, 'Fantasy', 'The Scarlet veil', 'Shelbi Mahurrin', 'images/Fantasy/book204.jpg', 1400),
(21, 'Fantasy', 'A study drowning', 'Ava Reid', 'images/Fantasy/book205.jpg', 1390),
(22, 'Fantasy', 'iron kissed', 'Patrica Briggs', 'images/Fantasy/book206.jpg', 1730),
(23, 'Fantasy', 'Moon called', 'Patrica Briggs', 'images/Fantasy/book207.jpg', 1450),
(24, 'Fantasy', 'Magic bleeds', 'Ilona Andrews', 'images/Fantasy/book208.jpg', 2300),
(25, 'Thriller', 'The last Trial', 'Robert Bailey', 'images/Thriller/book301.jpg', 2275),
(26, 'Thriller', 'Then target', 'Catherine Coulter', 'images/Thriller/book302.jpg', 2375),
(27, 'Thriller', 'Hysteria', 'Lj Ross', 'images/Thriller/book303.jpg', 2000),
(28, 'Thriller', 'Knock out', 'Catherine Coulter', 'images/Thriller/book304.jpg', 2975),
(29, 'Thriller', 'Paradox', 'Catherine Coulter', 'images/Thriller/book305.jpg', 2300),
(30, 'Thriller', 'The Defendants', 'John Ellsworth', 'images/Thriller/book306.jpg', 2500),
(31, 'Thriller', 'Absent pity', 'Blake Pierce', 'images/Thriller/book307.jpg', 1950),
(32, 'Thriller', 'You will be sorry', 'Ava Strong', 'images/Thriller/book308.jpg', 2250),
(33, 'Fiction', 'isac asimov', 'I, Robot', 'images/Fiction/fiction1.jpg', 2900),
(34, 'Fiction', 'Angampora queen', 'TP Tovenaar', 'images/Fiction/fiction2.jpg', 2150),
(35, 'Fiction', 'Kadol Aththu', 'Kamal Gunarathne', 'images/Fiction/fiction3.jpg', 3650),
(36, 'Fiction', 'A Shining star', 'Freeda Villavarayan', 'images/Fiction/fiction4.jpg', 1350),
(37, 'Fiction', 'After we fell', 'Anna Todd', 'images/Fiction/fiction5.jpg', 2320),
(38, 'Fiction', 'After We collided', 'Anna Todd', 'images/Fiction/fiction6.jpg', 2320),
(39, 'Fantasy', 'Harry Potter 1', 'J.K Rowling', 'images/Fantasy/1.jpg', 4490),
(40, 'Fantasy', 'Breaking Down', 'Stepheneie Meyer', 'images/Fantasy/2.jpg', 2990),
(41, 'Fantasy', 'The Hobbit', 'J.R.R. Tolien', 'images/Fantasy/3.jpg', 2490),
(42, 'Fantasy', 'Blood of Tyrants', 'NayomiNovik', 'images/Fantasy/5.jpg', 4890),
(43, 'Fantasy', 'Burning Maze : Trials of Apollo', 'Rick Riordan', 'images/Fantasy/6.jpg', 1620),
(44, 'Fantasy', 'Manikkawatha', 'Mahinda Prasad', 'images/Fantasy/7.jpg', 450),
(45, 'Fantasy', 'The Book Thief', 'Markus Zusak', 'images/Fantasy/8.jpg', 3000),
(46, 'Fantasy', 'Sun & The Star', 'Rick Riordan & Mark Oshiro', 'images/Fantasy/9.jpg', 3330),
(47, 'Fantasy', 'Chain of gold', 'Cassandra Clare', 'images/Fantasy/10.jpg', 2700),
(48, 'Fantasy', 'The Poppy War', 'R.F Kuang', 'images/Fantasy/11.jpg', 2990),
(49, 'Fantasy', 'New Moon', 'Stepheneie J.', 'images/Fantasy/12.jpg', 2990),
(50, 'Fantasy', 'House of Sky & Breath', 'Sarah J.Mass', 'images/Fantasy/13.jpg', 3990),
(51, 'Fantasy', 'Midnight Sun', 'Stephenie Meyer', 'images/Fantasy/14.jpg', 3490),
(52, 'Fantasy', 'Spookas Alise', 'Joseph Delaney', 'images/Fantasy/15.jpg', 3000),
(66, 'Fantasy', 'Seventh Son', 'Joseph Delaney', 'images/Fantasy/16.jpg', 2600),
(67, 'Fantasy', 'The Witcher', 'Andrzej Sapkowski', 'images/Fantasy/17.jpg', 2900),
(68, 'Fantasy', 'Heretics of Dune', 'Frank Herbert', 'images/Fantasy/18.jpg', 3200),
(69, 'Novels', 'Uththara', 'Chandrika Kumari', 'images/Novels/book1.jpg', 855),
(70, 'Novels', 'Meedum Salu', 'Nisansala Senadeera', 'images/Novels/book2.jpg', 1800),
(71, 'Novels', 'Santhulana', 'Ashirna Ekanayke', 'images/Novels/book3.jpg', 2214),
(72, 'Novels', 'Binara Mala', 'Dilini Weerakoon', 'images/Novels/book4.jpg', 1557),
(73, 'Novels', 'Prabahsawara', 'Dilini Kausalya', 'images/Novels/book13.jpg', 891),
(74, 'Novels', 'Kayili', 'Wasana Perera', 'images/Novels/book14.jpg', 1710),
(75, 'Novels', 'Veeduru', 'ithumini Palipanne', 'images/Novels/book15.jpg', 1800),
(76, 'Novels', 'Drohee', 'Kathleen Jayawardana', 'images/Novels/book16.jpg', 2070),
(77, 'Novels', 'Snehaye Dasi', 'Tharhari Abeysekarai', 'images/Novels/book22.jpg', 900),
(78, 'Novels', 'Gangula', 'Shanthi Dissanayake', 'images/Novels/book23.jpg', 1980),
(79, 'Novels', 'THawathinisa', 'Apoorwa mandarami', 'images/Novels/book24.jpg', 1215),
(80, 'ShortStory', 'IN A Movie', 'Chanchana Priyakantha', 'images/ShortStory/11.jpg', 855),
(81, 'ShortStory', 'Haduwak', 'Sanjana Kavindi', 'images/ShortStory/1.jpg', 2990),
(82, 'ShortStory', 'Santhulana', 'Tattoed', 'images/ShortStory/2.jpg', 2214),
(83, 'ShortStory', 'Fairy Tale Classics', 'Rapunzel', 'images/ShortStory/3.jpg', 1557),
(84, 'ShortStory', 'Was Shy To Tee', 'Yasmin Jaldin', 'images/ShortStory/4.jpg', 1350),
(85, 'ShortStory', 'Life Flows', 'Thyaga Dissanayake', 'images/ShortStory/5.jpg', 1530),
(86, 'ShortStory', 'Asanthuka Premaya', 'Ayomi Vithanage', 'images/ShortStory/6.jpg', 630),
(87, 'ShortStory', 'Nuralink', 'Piyumi Jayakalani', 'images/ShortStory/7.jpg', 900),
(88, 'ShortStory', 'Hanthana Adare', 'Sarath Nithalawa', 'images/ShortStory/8.jpg', 1080),
(89, 'ShortStory', 'Rahas KIyana Kadadasi', 'Pubudu Dissanayake', 'images/ShortStory/9.jpg', 1215),
(90, 'ShortStory', 'Bambara Pilliya', 'Chathura Umagiliya', 'images/ShortStory/10.jpg', 1620),
(91, 'ShortStory', 'A mage Amma', 'Thilanga Fonseka', 'images/ShortStory/12.jpg', 1170),
(92, 'ShortStory', 'Ikbithiwaa', 'Abewansa Dewapriya', 'images/ShortStory/13.jpg', 891),
(93, 'ShortStory', 'Rathu Deliya', 'Manel Iriyagama', 'images/ShortStory/14.jpg', 1710),
(94, 'ShortStory', 'Bako Bale', 'Amla Pahalawela', 'images/ShortStory/15.jpg', 1800),
(95, 'ShortStory', 'Magaherunu Dupath', 'Prabath JAyaseinghe', 'images/ShortStory/16.jpg', 2070),
(96, 'ShortStory', 'Suwada Kadulu', 'Abenayake J H A', 'images/ShortStory/17.jpg', 1040),
(97, 'ShortStory', 'Mathaka Miriwedi', 'Miyondi Manjula', 'images/ShortStory/18.jpg', 1728),
(98, 'ShortStory', 'Kelabige Kathawa', 'Patricia Maclachlan', 'images/ShortStory/19.jpg', 1665),
(99, 'ShortStory', 'Unbound', 'N/A', 'images/ShortStory/20.jpg', 180),
(100, 'ShortStory', 'MY UNIVERSE', 'Rusiru Tharana', 'images/ShortStory/21.jpg', 450),
(101, 'ShortStory', 'PILGRIMAGE', 'Ajith Thilakasena', 'images/ShortStory/22.jpg', 220),
(102, 'ShortStory', 'THE NEW BORN', 'KAMINI ABEYKOON', 'images/ShortStory/23.jpg', 300),
(103, 'ShortStory', 'SWIMMING', 'Sunila Nanayakkara', 'images/ShortStory/24.jpg', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
