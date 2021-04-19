-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2020 às 23:38
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `funcionarios_bd`
--
CREATE DATABASE IF NOT EXISTS `funcionarios_bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `funcionarios_bd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios_tb`
--

CREATE TABLE `funcionarios_tb` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios_tb`
--

INSERT INTO `funcionarios_tb` (`id_funcionario`, `nome`, `cargo`, `email`) VALUES
(3, 'David Matheus Rosa da Silva', 'Programador', 'davidsilva@hotmail.com'),
(5, 'Maria da Silva', 'Analista', 'maria.silva@gmail.com'),
(6, 'Guilherme Almeida', 'DBA', 'guilherme.almeida@outlook.com'),
(7, 'Sandra Madalena', 'Arquiteto de Sistemas', 'sandramadalena@yahoo.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_tb`
--

CREATE TABLE `usuarios_tb` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`id_usuario`, `username`, `password`, `email`) VALUES
(1, 'davmath98', '201610', 'davidmatheus@hotmail.com'),
(2, 'pressrforgg', 'qweasdz', 'davidsilva@hotmail.com'),
(3, 'babyKet', 'babyket', 'babyket@hotmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios_tb`
--
ALTER TABLE `funcionarios_tb`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices para tabela `usuarios_tb`
--
ALTER TABLE `usuarios_tb`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios_tb`
--
ALTER TABLE `funcionarios_tb`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios_tb`
--
ALTER TABLE `usuarios_tb`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
