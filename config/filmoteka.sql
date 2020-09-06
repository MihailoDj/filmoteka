-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 09:33 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmoteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieID` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL,
  `releaseDate` int(4) NOT NULL,
  `leadActors` varchar(200) NOT NULL,
  `supportingActors` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `name`, `director`, `releaseDate`, `leadActors`, `supportingActors`) VALUES
(124, 'the hateful eight', 'Quentin Tarantino', 2015, 'Samuel L. Jasckson', 'Kurt Russell, Tim Roth'),
(129, 'the lord of the rings: the fellowship of the ring', 'Peter Jackson', 2001, 'Elijah Wood, Ian McKellen, Vigo Mortensen', 'Sean Bean, Orlando Bloom'),
(136, 'lepa sela lepo gore', 'Srdjan Dragojevic', 1996, 'Dragan Bjelogrlic, Nikola Kojo', 'Velimir Bata Zivojinovic'),
(138, 'the gentlemen', 'Guy Ritchie', 2019, 'Charlie Hunnam', 'McConaughey, Michelle Dockery'),
(139, 'the matrix', 'the Wachowskis', 1999, 'Keanu Reaves', 'Lawrence Fishburne'),
(140, 'the matrix reloaded', 'the Wachowskis', 2003, 'Keanu Reaves', 'Lawrence Fishburne'),
(141, 'Pulp Fiction', 'Quentin Tarantino', 1994, 'Samuel L. Jasckson, John Travolta, Uma Thurman', 'Bruce Willis, Tim Roth'),
(142, 'Once upon a time... in Hollywood', 'Quentin Tarantino', 2019, 'Leonardo DiCaprio, Brad Pitt, Margot Robbie', 'Margaret Qualley, Dakota Fanning'),
(143, 'Inglorious basterds', 'Quentin Tarantino', 2009, 'Brad Pitt, Diane Kruger, Cristoph Waltz', 'Eli Roth, Michael Fassbender'),
(144, 'star wars episode iv', 'George Lucas', 1977, 'Mark Hamill, Harrison Ford, Carrie Fisher', 'Alec Guinness, David Prowse'),
(145, 'Random film 123', 'reziser', 2021, 'glavni', 'sporedni'),
(146, 'Snatch', 'Guy Ritchie', 2000, 'Jason Statham, Brad Pitt', 'Benicio Del Toro');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`) VALUES
(1, 'Administrator'),
(2, 'Korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `savedmovies`
--

CREATE TABLE `savedmovies` (
  `id` int(4) NOT NULL,
  `userID` int(4) DEFAULT NULL,
  `movieID` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savedmovies`
--

INSERT INTO `savedmovies` (`id`, `userID`, `movieID`) VALUES
(25, 94, 48),
(26, 94, 52),
(36, 94, 104),
(42, 94, 105),
(37, 94, 107),
(38, 94, 108),
(34, 94, 113),
(35, 94, 114),
(40, 94, 116),
(41, 94, 117),
(56, 94, 120),
(53, 94, 121),
(108, 94, 124),
(57, 94, 127),
(58, 94, 128),
(62, 94, 129),
(93, 94, 132),
(61, 94, 133),
(100, 94, 134),
(79, 94, 135),
(98, 94, 136);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `roleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roleID`) VALUES
(28, 'admin@filmoteka.com', '$2y$10$g2McTfoKDSjRhDzobfOxbuueY63IlCIIS0WpA1gEHbIJ/P92LzMAu', 1),
(29, 'user01', '$2y$10$7uNq5mrC4QbpO2cW2Ql9FuyQqLL4gJXKBZ4fCslpLgNRwuRIzO15i', 2),
(30, 'user02', '$2y$10$/qG3Ix4ABWX5H20lZrNQHOVKtRp2x7sVijTR2iJjxYSN6Xay3UWkG', 2),
(31, 'user03', '$2y$10$R9QRus8x4fFD84jjFeG7U.2S6sW0y5NRcUmwvNEbw2rmkTUyIfkgC', 2),
(33, 'user05', '$2y$10$owwbeccpE8hjCNK7fpE5U.lfW.s5s5Yea6uQ0lCm7ltGvXAs715I.', 2),
(34, 'user06', '$2y$10$uPdDxZNfKOMDtKp9d1I1se9NJOjUkXHvMnlji0r9n1X1.cA/cEeq6', 2),
(60, 'user08', '$2y$10$7z.IBSzBe1ATcobqNBFVb.bvPPLD4a3.DjLSs3ISI40m1zXdIvXDq', 2),
(62, 'user09', '$2y$10$msbS.LOtL94PBl1YGjGBae6OxHe/qou1Mhw7ozsLpB9dQQ.fP4u1m', 2),
(63, 'user10', '$2y$10$lI8B89lJC/3UvxnFf/EFXu8sDQyS/SS4OvkrN26Wa69JmrCJSwHp2', 2),
(64, 'user11', '$2y$10$vcWnwOfy6BBUlCVvvTDrG.usz5k5HDscVsSHd1WvF.hRYaWQs57tq', 2),
(65, 'user12', '$2y$10$/2p./fkVZ42PxIYM0LhoguHBw7jVpt2bJhdr5vum0ESRZS9zJbgri', 2),
(66, 'user13', '$2y$10$P420zlHCIQzQ2ps3LAjf1.7AMAgDx.npvE07ViFgSdfBJRAj5/vKi', 2),
(67, 'user14', '$2y$10$BmaFnBtFcHHIRcPEOeDJH.ULXqhFGEQ9Q5dVdEQxzruKiJDUV7Xq6', 2),
(68, 'user15', '$2y$10$fwtaRPv.UugfCodz1nqIyeOp6n/kvDr9bEisijaLq6HdbKAJdmJOO', 2),
(69, 'user16', '$2y$10$3jcIx8PHfrDmVGTLIMcW1O0CvpfqAB6qwph9teVFoZtK8WgcpP.Eq', 2),
(70, 'user17', '$2y$10$oNb8yuWtizNoq7.SV3kWPuxQbkNZ1I2U7aplzsf4fa4XxiGEHaihS', 2),
(71, 'user18', '$2y$10$AEViNDBBtSChAVv865dXGOQf7s1T9ZVMrrHa0JupWbzOV9s0UMlFm', 2),
(72, 'user20', '$2y$10$6L8CJP5SAgy2CSA7ucdJTOxJbdDNx2RqWMfjeva.YhXg2GI71iCNW', 2),
(73, 'user21', '$2y$10$xnu.P8OD1Uhc/5VWLgoqZ.LW/WrhgrFKQGuhIQzPzhtzEs2WdmXKa', 2),
(75, 'user30', '$2y$10$DKPjv9RPODSf8zBCk809A.sDzpRI/JKv5f2akM22fKAZKd12OJpx2', 2),
(76, 'user31', '$2y$10$b0.gGDkzIHDjePQxxFtY6OkguDQwD4XnKBg0GVIsNUX8lCOk3cajC', 2),
(79, 'test_korisinik', '$2y$10$.t7WoVo8bvvPCcDgg4GVZOJeLiCMZNIHUptJmDW5LnvlyDKCeAl6W', 2),
(80, 'new_user88', '$2y$10$vcImdieOCoJ.pWQjYT0Y6.EydIfU6Op16CJu0IayN4J/BEM0PU13W', 2),
(81, 'test', '$2y$10$HpcJt.96G6cKTbXWPR3pzOYWpEJ96FP5w6Z.dJ6N..2ldRwoeKYBy', 2),
(84, 'abcde', '$2y$10$eItGpCU82yaShtWp1Ec/KOI0noAnl2RSYN02PEMzBwF.Z.zRRlhK2', 2),
(85, 'asd', '$2y$10$FkZAfvg4wTOBQ08WIBpcUOjMNjQGFrLtgiH6vEY/smia86uT12tpu', 2),
(86, 'test123', '$2y$10$gqecZIQnDv1qzHiAxkE96eh2hja.2kIQeFMKhZzWW9OB4GiB3QKD.', 2),
(87, 'new_user321', '$2y$10$ce452jt1pH0J0XmFILNYROFN6X2AzlEc9ggFFN.dy3KKj8OkBND4S', 2),
(89, 'bugtest01', '$2y$10$zRCqiq/EK6txH.jFGXmIIubT9jHYHHAobHCKrWArv9u3v2Ih7/Rwu', 2),
(90, 'bugtest02', '$2y$10$1fbJ6nHvn.lZZ7A7usk79e68BMS//WWWjORiNeS7/P2fSTJLxE3/K', 2),
(94, 'bugtest03', '$2y$10$.RErC4dr580C1DE2X.qFFuByoGywjD/vZc/0fh1yKR7mNjKB1n0Du', 2),
(95, 'new_user01', '$2y$10$w7I3jZpZdfgNlJGlnBejleKfxzrugAp1LCeQu4i.4IiEtCFKlLQaO', 2),
(96, 'abcdefgh', '$2y$10$DqKVSRbtIhRtziCLqEGZ3.tuDUmFaP.vie5WgmKGSBdxvBD8E061i', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `unique_movie` (`name`,`director`,`releaseDate`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `savedmovies`
--
ALTER TABLE `savedmovies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_movie` (`userID`,`movieID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `FK_USER` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `savedmovies`
--
ALTER TABLE `savedmovies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
