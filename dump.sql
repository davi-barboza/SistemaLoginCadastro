

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Set-2020 às 11:36
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `created`, `modified`, `senha`) VALUES
(1, 'davi', 'davi@admin.com', '2017-11-12 22:35:47', '2020-09-03 08:13:18', 'palmeiras'),
(2, 'tati', 'tati@comum', '2017-11-12 22:37:15', NULL, 'saopaulo'),
(3, 'mateus', 'mateus@comum.com', '2017-11-12 22:39:14', NULL, 'flamengo'),
(4, 'heron', 'heron@comum', '2017-11-12 22:41:21', NULL, 'palmeiras'),
(5, 'carla', 'carla@comum.com', '2017-11-12 22:42:49', NULL, 'saopaulo'),
(6, 'daniel', 'daniel@comum', '2017-11-12 22:48:27', NULL, 'corintians'),
(7, 'maria', 'davicarlos_@hotmail.com', '2020-09-03 01:58:37', NULL, '12345'),
(8, 'mateus', 'debora@comum.com', '2020-09-03 04:52:52', NULL, ''),
(9, 'aleluia', 'aleluia@jesus', '2020-09-03 08:03:29', NULL, ''),
(10, 'tatiane', 'tatiane@comum.com', '2020-09-03 08:13:50', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
