-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2016 às 03:19
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

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
(2, 10, '10x10', 'endereco', 1, 1);

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
  `phone` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `rg`, `cpf`, `address`, `phone`, `password`) VALUES
(1, 'cebola', 'roxa', 'abc@d.com', 111222, '99988877766', 'rua%20teste%202%20numero%20123', 81818181, '123cebola4'),
(2, 'cebola', 'roxa', 'abc@d.com', 111222, '99988877766', 'rua%20teste%202%20numero%20123', 81818181, '123cebola4'),
(3, 'cebola', 'roxa', 'abc@d.com', 111222, '99988877766', 'rua%20teste%202%20numero%20123', 81818181, '123cebola4'),
(4, 'teste', 'porra', '123@4.com', 123456, '11122233344', 'fsdfsdfsdfsdf', 6545984, 'pass'),
(5, '123123', '12123', '312@c.c', 4524, '4224', '4242', 42424, '24242'),
(6, '123123', '12123', '312@c.c', 4524, '4224', '4242', 42424, 'gh');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
