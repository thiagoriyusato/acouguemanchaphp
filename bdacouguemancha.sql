-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 05:05 AM
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
-- Database: `bdacouguemancha`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcargos`
--
CREATE DATABASE `bdacouguemancha`;

USE `bdacouguemancha`;

CREATE TABLE `tbcargos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcargos`
--

INSERT INTO `tbcargos` (`id`, `descricao`) VALUES
(1, 'Atendente'),
(2, 'Acougueiro'),
(3, 'Caixa'),
(4, 'Gerente');

-- --------------------------------------------------------

--
-- Table structure for table `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcategoria`
--

INSERT INTO `tbcategoria` (`id`, `descricao`) VALUES
(1, 'Bovino'),
(2, 'Suino'),
(3, 'Branca'),
(4, 'Embutidos');

-- --------------------------------------------------------

--
-- Table structure for table `tbclientes`
--

CREATE TABLE `tbclientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbclientes`
--

INSERT INTO `tbclientes` (`id`, `nome`, `CPF`, `endereco`) VALUES
(1, 'Joao Augusto', '111.111.111/91', 'jardim nuness'),
(2, 'Cliente2', '333.333.333/33', 'enderecocliente');

-- --------------------------------------------------------

--
-- Table structure for table `tbcontas`
--

CREATE TABLE `tbcontas` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcontas`
--

INSERT INTO `tbcontas` (`id`, `email`, `senha`, `tipo`) VALUES
(1, 'joao@gmail.com', '$2y$10$DN0YmgO2iVKLSGvDFWjoFe52yEas4ip4fhf7GKsyByHSUhL/cpZXe', 1),
(2, 'thiago@gmail.com', '$2y$10$DN0YmgO2iVKLSGvDFWjoFe52yEas4ip4fhf7GKsyByHSUhL/cpZXe', 2),
(3, 'job@gmail.com', '$2y$10$DN0YmgO2iVKLSGvDFWjoFe52yEas4ip4fhf7GKsyByHSUhL/cpZXe', 3),
(4, 'tes@gag', '$2y$10$DN0YmgO2iVKLSGvDFWjoFe52yEas4ip4fhf7GKsyByHSUhL/cpZXe', 1),
(6, 'teste@gmail.com', '$2y$10$zIiH28fyEh3QeVZzTjr/2.OPsgaaRGCgRMWDWF8nwIzwXW7zCa9Gi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbfornecedores`
--

CREATE TABLE `tbfornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `cnpj` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbfornecedores`
--

INSERT INTO `tbfornecedores` (`id`, `nome`, `idPessoa`, `cnpj`) VALUES
(1, 'Zekarne', 2, '11.222.333/4444-55');

-- --------------------------------------------------------

--
-- Table structure for table `tbfuncionarios`
--

CREATE TABLE `tbfuncionarios` (
  `id` int(11) NOT NULL,
  `idPessoa` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `salario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbfuncionarios`
--

INSERT INTO `tbfuncionarios` (`id`, `idPessoa`, `idCargo`, `salario`) VALUES
(1, 1, 4, 3002.00),
(2, 3, 3, 3330.00),
(3, 4, 1, 10001414.00),
(6, 10, 2, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbpedidos`
--

CREATE TABLE `tbpedidos` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpedidos`
--

INSERT INTO `tbpedidos` (`id`, `idCliente`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbpedidosprodutos`
--

CREATE TABLE `tbpedidosprodutos` (
  `id` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpedidosprodutos`
--

INSERT INTO `tbpedidosprodutos` (`id`, `idPedido`, `idProduto`, `quantidade`, `preco`) VALUES
(1, 1, 1, 2, 110.00),
(2, 1, 2, 2, 93.98);

-- --------------------------------------------------------

--
-- Table structure for table `tbpessoas`
--

CREATE TABLE `tbpessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpessoas`
--

INSERT INTO `tbpessoas` (`id`, `nome`, `email`, `endereco`, `cpf`) VALUES
(1, 'Joao Augusto', 'joao_rp14@hotmail.com', 'jardim nunes', '111.222.333/44'),
(2, 'Job', 'gabrielpjob@gmail.com', 'mirassol', '222.333.444/55'),
(3, 'Thiago', 'thiago.sato01@gmail.com', 'rio preto', '333.444.555/66'),
(4, 'Giovanna', 'gimaiotto@gmail.com', 'bady', '111.222.345/55'),
(10, 'Cliente 1', 'cliente1@gmail.com', 'enderecocliente1', '111.111.111/22'),
(11, 'Teste', 'teste@hotmail.com', 'testando', '111.111.111/77');

-- --------------------------------------------------------

--
-- Table structure for table `tbprodutos`
--

CREATE TABLE `tbprodutos` (
  `id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `idFornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbprodutos`
--

INSERT INTO `tbprodutos` (`id`, `preco`, `categoria`, `quantidade`, `descricao`, `idFornecedor`) VALUES
(1, 55.00, 1, 15, 'Picanha', 1),
(2, 46.99, 1, 10, 'Alacatra', 1),
(3, 20.99, 4, 10, 'Linguiça Suína', 1),
(5, 32.99, 1, 10, 'Ponta de Peito', 1),
(6, 14.49, 3, 10, 'Peito de Frango', 1),
(7, 35.99, 1, 10, 'Alcatra', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcargos`
--
ALTER TABLE `tbcargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcontas`
--
ALTER TABLE `tbcontas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbfornecedores`
--
ALTER TABLE `tbfornecedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PesFor` (`idPessoa`);

--
-- Indexes for table `tbfuncionarios`
--
ALTER TABLE `tbfuncionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PesFun` (`idPessoa`),
  ADD KEY `fk_FunCar` (`idCargo`);

--
-- Indexes for table `tbpedidos`
--
ALTER TABLE `tbpedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PedPP` (`idCliente`);

--
-- Indexes for table `tbpedidosprodutos`
--
ALTER TABLE `tbpedidosprodutos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PPPe` (`idPedido`),
  ADD KEY `fk_PPPr` (`idProduto`);

--
-- Indexes for table `tbpessoas`
--
ALTER TABLE `tbpessoas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ProFor` (`idFornecedor`),
  ADD KEY `fk_ProCat` (`categoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcargos`
--
ALTER TABLE `tbcargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbcontas`
--
ALTER TABLE `tbcontas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbfornecedores`
--
ALTER TABLE `tbfornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbfuncionarios`
--
ALTER TABLE `tbfuncionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbpedidos`
--
ALTER TABLE `tbpedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbpedidosprodutos`
--
ALTER TABLE `tbpedidosprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbpessoas`
--
ALTER TABLE `tbpessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbfornecedores`
--
ALTER TABLE `tbfornecedores`
  ADD CONSTRAINT `fk_PesFor` FOREIGN KEY (`idPessoa`) REFERENCES `tbpessoas` (`id`);

--
-- Constraints for table `tbfuncionarios`
--
ALTER TABLE `tbfuncionarios`
  ADD CONSTRAINT `fk_FunCar` FOREIGN KEY (`idCargo`) REFERENCES `tbcargos` (`id`),
  ADD CONSTRAINT `fk_PesFun` FOREIGN KEY (`idPessoa`) REFERENCES `tbpessoas` (`id`);

--
-- Constraints for table `tbpedidos`
--
ALTER TABLE `tbpedidos`
  ADD CONSTRAINT `fkPedCli` FOREIGN KEY (`idCliente`) REFERENCES `tbclientes` (`id`),
  ADD CONSTRAINT `fk_PedPP` FOREIGN KEY (`idCliente`) REFERENCES `tbclientes` (`id`);

--
-- Constraints for table `tbpedidosprodutos`
--
ALTER TABLE `tbpedidosprodutos`
  ADD CONSTRAINT `fk_PPPe` FOREIGN KEY (`idPedido`) REFERENCES `tbpedidos` (`id`),
  ADD CONSTRAINT `fk_PPPr` FOREIGN KEY (`idProduto`) REFERENCES `tbprodutos` (`id`);

--
-- Constraints for table `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD CONSTRAINT `fk_ProCat` FOREIGN KEY (`categoria`) REFERENCES `tbcategoria` (`id`),
  ADD CONSTRAINT `fk_ProFor` FOREIGN KEY (`idFornecedor`) REFERENCES `tbfornecedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
