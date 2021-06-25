-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 01:35 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newstoday`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Ifthekar', 'ifthekaralam@gmail.com', '12345'),
(3, 'Arthi', 'ar@g.c', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmnt_id` int(11) NOT NULL,
  `cmnt_author` int(11) NOT NULL,
  `cmnt_desc` text NOT NULL,
  `cmnt_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmnt_id`, `cmnt_author`, `cmnt_desc`, `cmnt_post`) VALUES
(3, 7, 'amamamamam', 5),
(4, 15, 'good', 2),
(5, 15, 'Excelent', 16);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `p_title` text NOT NULL,
  `p_image` text NOT NULL,
  `p_caption` text NOT NULL,
  `p_tag` text NOT NULL,
  `p_author` int(11) NOT NULL,
  `p_body` longtext NOT NULL,
  `p_section` text NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_title`, `p_image`, `p_caption`, `p_tag`, `p_author`, `p_body`, `p_section`, `p_status`) VALUES
(2, 'New Air Chief Air Vice Marshal Shaikh Abdul Hannan takes over BAF command', './images/s1422790534bonsai.jpg', '', '', 2, 'The newly-appointed Chief of Air Staff Air Vice Marshal Shaikh Abdul Hannan took over the command of Bangladesh Air Force on Saturday.\r\n\r\nHe succeeded the outgoing Chief of Air Staff Air Chief Marshal Masihuzzaman Serniabat. A taking over ceremony was held at Air Headquarters.\r\n\r\nNewly appointed Chief of Air Staff Air Vice Marshal Shaikh Abdul Hannan took over the command of Bangladesh Air Force from the outgoing Chief of Air Staff Air Chief Marshal Masihuzzaman Serniabat at a ceremony at Chief of Air Staffï¿½s secretariat.\r\nPrincipal Staff Officers along with other senior officers of Air Headquarters were present during the occasion.\r\n\r\nEarlier in the morning, the outgoing Air Chief Marshal Masihuzzaman Serniabat visited Father of the Nation Bangabandhu Sheikh Mujibur Rahman memorial museum and paid the homage to the Father of the Nation by placing a wreath at his portrait in front of the Bangabandhu Memorial Museum.\r\n', '4', 0),
(3, 'Islamic preacher Abu Twa-Ha Muhammad Adnan found', './images/s1424978171books-2606859_1920.jpg', '', '', 5, 'Young Islamic preacher Abu Twa-Ha Muhammad Adnan was found in Rangpur on Friday afternoon, seven days after he had gone missing.\r\n\r\nHe was taken to Kotwali Police Station around 3pm on Friday from his father-in-law house at Master Para adjacent Weather office in Rangpur city.\r\n\r\nThe police station officer in-charge Abdur Rashid confirmed the matter. \r\nEarlier on June 10, Abu Taw Haa, his driver and two companions reportedly went missing from Dhaka Gabtoli area when he was returning from Rangpur, family members said.\r\n\r\nLater, his wife and mother filed written complaints to the police in Rangpur and Dhaka.', '2', 1),
(4, 'Mujib Barsho Professional Golf starts Monday', './images/s1094514281person-984236_1920.jpg', '', '', 5, 'Mujib Barsho Runner-Walton Professional Golf Tournament 2021, organised by Bangladesh Professional Golf Association, will kick off on Monday at the Savar Golf Club.\r\n\r\nSome 15 professional golfers have already registered their names for the tournament. \r\n\r\nThe registration of the four-day event will be closed on Sunday.\r\nMujib Barsho Runner-Walton Professional Golf Tournament 2021, organised by Bangladesh Professional Golf Association, will kick off on Monday at the Savar Golf Club.\r\n\r\nSome 15 professional golfers have already registered their names for the tournament. \r\n\r\nThe registration of the four-day event will be closed on Sunday.', '1', 0),
(5, 'Rupganj request change of Old DOHS match venue', './images/s240369266sports.jpg', '', '', 5, 'Legends of Rupganj on Friday requested Cricket Committee of Dhaka Metropolis to change their match venue for a specific match in the ongoing Bangabandhu Dhaka Premier Division T20 League as well as increasing umpiring facilities during their Relegation League match against Old DOHS.\r\n\r\nRupganj are scheduled to face Old DOHS in a crucial match of Relegation League on June 21 at the BKSP-3, which is likely to decide the second team to get relegated from DPL.\r\n\r\nPartex Sporting Club, which could bag only one point from the first phase, have already been relegated while Rupganj and Old DOHS earned seven and six points respectively after the first phase.  \r\nIn a letter conveyed to CCDM chairman, Rupganj said they wanted CCDM to host the match at the Sher-e-Bangla National Stadium in Dhaka instead of the scheduled venue as there will be no Super League matches at that venue on that day.\r\n\r\nThey also requested ICC panel umpires and referees for the match and urged for DRS facility in the match.', '1', 0),
(6, 'asdfgh', './images/sedbad.jpg', 'sg', 'dsf', 15, 'srgrtssg rthgrtyhrthy rt yhr6tyh', 'sed', 1),
(7, 'yrytrtyry', './images/rtyrtyIMG20201009230343.jpg', 'rfy', 'rty, rtyry, ryrt6y', 15, 'retytytytytytytytytytytytytytytytytytytytytytytytytytytytytytytyr', 'rtyrty', 1),
(9, 'Ifthekar become billionior', './images/economyDSC_0022__01.jpg', 'ifthekar', 'eeeeeeeef, erqwer', 15, 'werw4ete4uity bwaep99999we48rtshfdkjhsiug aiiiiiiiiieryhsdfuhg aeroituheriotghdfskjbn', 'economy', 1),
(10, 'What is Lorem Ipsum?', './images/IMG_20210305_173234.jpg', 'ftgyh', 'fhdgj', 15, 'rtshhhhhhhhh rtttttttttttttttttttt 666666666666666666uhfddddddddddddddddddddddd h trrrrrds', 'sdrrrr', 1),
(11, 'ghjghj', './images/signature.jpg', 'gfhhhhj', 'ghjgc', 15, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'ghjghj', 1),
(12, 'saDF', './images/IMG20201009230343.jpg', 'fdsh', 'sdfsfg', 15, '9iourjgoise sdfopgijksodrpiiiiiiii pddddddddddddddddddddddddddddrs dspooooooooooooooooooooooojhdfopihj d0fiogjufopfopfopfopfopfopfopfopfopfopfopfopfopfopfopfopfopcih xdfoiiiiiiiiiiigtjh dfpgbjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkfd p[dogiitfhufgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgbn dfpppppgituphujfgopiiiijhbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbvjbv opiddddddddddddddddddddddddddddddddddd dffffffffffffffffffffffffffffffffffffffffffffjhfotp xdfopiguuuuuuuuuuuuuuuuuuuuuuuuuud', 'sdFsdf', 1),
(13, 'sedf', './images/DSC_0022__01.jpg', 'dfgdfg', 'dsfg', 15, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it', 'dfg', 1),
(15, 'sddddddddddddddddddddddd', './images/IMG_20210305_173234.jpg', 'dsfz', 'dszf', 15, 'hgckkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkj;', 'dszf', 1),
(16, 'vbn', './images/IMG_20210305_173234.jpg', 'ghhhhhhhhhhh', 'ghhh', 10, 'hgckkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkj;', 'gdhjn', 1),
(17, 'kjjjjjjjjj', './images/signature.jpg', 'hgvjh', 'knkj', 15, 'Legends of Rupganj on Friday requested Cricket Committee of Dhaka Metropolis to change their match venue for a specific match in the ongoing Bangabandhu Dhaka Premier Division T20 League as well as increasing umpiring facilities during their Relegation League match against Old DOHS. Rupganj are scheduled to face Old DOHS in a crucial match of Relegation League on June 21 at the BKSP-3, which is likely to decide the second team to get relegated from DPL. Partex Sporting Club, which could bag only one point from the first phase, have already been relegated while Rupganj and Old DOHS earned seven and six points respectively after the first phase. In a letter conveyed to CCDM chairman, Rupganj said they wanted CCDM to host the match at the Sher-e-Bangla National Stadium in Dhaka instead of the scheduled venue as there will be no Super League matches at that venue on that day. They also requested ICC panel umpires and referees for the match and urged for DRS facility in the match.', 'khjvug', 1),
(18, 'updated asdf', './images/photo-1612151855475-877969f4a6cc.jpg', 'updated dfg', 'updated, dfg', 12, 'updated sdf fddsg', 'updated sdf', 1),
(19, 'Why do we use it?', './images/photo-1612151855475-877969f4a6cc.jpg', 'Lorem Ipsum', 'Lorem, Ipsum', 11, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 'Lorem Ipsum', 1),
(20, 'bad', './images/photo-1612151855475-877969f4a6cc.jpg', 'bad', 'bad', 14, 'Legends of Rupganj on Friday requested Cricket Committee of Dhaka Metropolis to change their match venue for a specific match in the ongoing Bangabandhu Dhaka Premier Division T20 League as well as increasing umpiring facilities during their Relegation League match against Old DOHS. Rupganj are scheduled to face Old DOHS in a crucial match of Relegation League on June 21 at the BKSP-3, which is likely to decide the second team to get relegated from DPL. Partex Sporting Club, which could bag only one point from the first phase, have already been relegated while Rupganj and Old DOHS earned seven and six points respectively after the first phase. In a letter conveyed to CCDM chairman, Rupganj said they wanted CCDM to host the match at the Sher-e-Bangla National Stadium in Dhaka instead of the scheduled venue as there will be no Super League matches at that venue on that day. They also requested ICC panel umpires and referees for the match and urged for DRS facility in the match.', 'bad', 1),
(21, 'Update Where does it come from?', './images/photo-1612151855475-877969f4a6cc.jpg', 'update Lorem Ipsum', 'update, Lorem, Ipsum', 15, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', 'update Lorem Ipsum', 0);

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `s_id` int(11) NOT NULL,
  `s_author` int(11) NOT NULL,
  `s_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`s_id`, `s_author`, `s_post`) VALUES
(10, 0, 0),
(11, 15, 2),
(12, 15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_phone` int(11) NOT NULL,
  `u_dob` date NOT NULL,
  `u_gender` varchar(10) NOT NULL,
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_image`, `u_email`, `u_password`, `u_phone`, `u_dob`, `u_gender`, `u_status`) VALUES
(9, 'bad', './images/bad.jpg', 'b@g.c', '12345', 1756273593, '2021-06-05', 'on', 1),
(10, 'badhon', './images/badhon.jpg', 'badhon@gmail.com', '12345', 1756273593, '2021-06-05', 'on', 1),
(11, 'arthi', './images/Badhon1.jpg', 'arthi@g.c', '12345', 165498498, '2021-06-05', 'on', 0),
(12, 'badhon2', './images/badhon.jpg', 'bd@g.c', '12345', 254168419, '2021-06-05', 'on', 1),
(13, 'ifthekar', './images/badhon.jpgif@g.c', 'if@g.c', '12345', 165409840, '2021-06-05', 'on', 1),
(14, 'alam', './images/a@g.cbadhon.jpg', 'a@g.c', '12345', 549651, '2021-06-12', 'on', 1),
(15, 'map', './images/3eb2346a_30425_p_5_mr_1.jpg', 'm@g.c', '12345678', 1111111111, '2021-05-30', 'Male', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmnt_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
