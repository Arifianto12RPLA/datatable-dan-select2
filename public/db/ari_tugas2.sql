-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 09:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ari_tugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(100) NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'super user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `id_role` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `email`, `telepon`, `id_role`) VALUES
(1, 'coba2', 'coba', 'emailcoba@gmail.com', '23432434324', 1),
(2, 'asdasdasd', 'asdasdasd', 'emailcoba@gmail.com', '23432434324', 1),
(3, 'asdasdasd', 'asdasdasd', 'emailcoba@gmail.com', '23432434324', 1),
(4, 'asdasdasd', 'asdasdasd', 'emailcoba@gmail.com', '23432434324', 1),
(5, 'asdasdasd', 'asdasdasdasdasdasd', 'emailcoba@gmail.com', '23432434324', 1),
(6, 'asdasdasdasdasdasd', 'asdasdasd', 'emailcoba@gmail.com', '23432434324', 3),
(7, 'coba', 'tes', 'hehehaha@gmail.com', '234534656', 3),
(8, 'tes', 'mbatoe', 'imelemail@gmail.com', '08975567566', 3),
(9, 'percobaan', 'mbatoe', 'h3h3@gmail.com', '943589745', 3),
(10, 'arifianto', 'coba', 'testes@gmail.com', '7877000975', 2),
(11, 'arip', 'jekarta', 'h0h0@gmail.com', '100', 2),
(12, 'Arf', 'asdasdasdasdasdasd', 'testes244@gmail.com', '23849283', 2),
(13, 'ariii', 'tangerang', 'arip@gmail.com', '787878', 2),
(14, 'ubed', 'wehehe', 'ubed', '89787824', 2),
(15, 'ubedi', 'ubedi nomor 1', 'ubedbeud@gmail.com', '3573904', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
