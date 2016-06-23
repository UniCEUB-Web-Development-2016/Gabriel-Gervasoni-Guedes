-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2016 às 03:30
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `dimensions` varchar(45) NOT NULL,
  `destination_address` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cod_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `package`
--

INSERT INTO `package` (`id`, `weight`, `dimensions`, `destination_address`, `status`, `cod_user`) VALUES
(2, 10, '10x10', 'endereco', 1, 1),
(4, 123, '50x50', 'endereco', 1, 4),
(14, 10, '10x10', 'endereco', 0, 4),
(15, 12, '32x32x32x', 'SQSW%20303,%20Bras%C3%ADlia%20-%20DF,%20Brasi', 0, 4),
(20, 12, 'teste', 'tes', 0, 4),
(22, 10, '10x10x10', 'SQSW+303+bloco+C+apto+407', 1, 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `rg`, `cpf`, `address`, `phone`, `password`) VALUES
(1, 'cebola', 'roxa', 'abc@d.com', 111222, '99988877766', 'rua%20teste%202%20numero%20123', 81818181, '123cebola4'),
(4, 'teste', 'porra', '123@4.com', 0, '1000000000', '15', 66666, 'pass'),
(6, '123123', '12123', '312@c.c', 4524, '4224', '4242', 42424, 'gh'),
(42, 'Edi', 'Gervasoni', 'qwe@r.com', 321312, '6548791362', 'teste', 881155111, 'pass'),
(43, 'marco', 'mane', 'mane@1.com', 1231231, '2131451341', 'teste', 2147483647, 'pass'),
(46, 'tes+te', '123', 'ewqeqwe@c1.a', 213321, '3211', '312', 213, 'pass'),
(47, 'Gabriel', 'Guedes', 'guedes_gabriel@hotmail.com', 125, '045541', 'SQSW+303+bloco+C+apto+407', 6181482030, 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_package_user` (`cod_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `fk_package_user` FOREIGN KEY (`cod_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
