-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Jun-2023 às 10:40
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtespzorro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `email` varchar(80) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `codigopostal` varchar(8) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `localidade` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `capitalsocial` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(1, 'TeSPZorro PSI', 'tespzorro@psi.com', 244820300, 434434434, 'Morro do Lena, Alto do Vieira', '2411-901', 'Leiria', 100000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folhaobras`
--

DROP TABLE IF EXISTS `folhaobras`;
CREATE TABLE IF NOT EXISTS `folhaobras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `valortotal` double NOT NULL,
  `ivatotal` double NOT NULL,
  `estado` enum('Em Lançamento','Emitida','Paga','Anulada') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idcliente` int NOT NULL,
  `idfuncionario` int NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcliente` (`idcliente`),
  KEY `idfuncionario` (`idfuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `folhaobras`
--

INSERT INTO `folhaobras` (`id`, `data`, `valortotal`, `ivatotal`, `estado`, `idcliente`, `idfuncionario`, `subtotal`) VALUES
(282, '2023-06-26 09:19:34', 10, 2.3, 'Emitida', 16, 1, 0),
(283, '2023-06-26 09:20:43', 184.5, 34.5, 'Em Lançamento', 16, 1, 150),
(284, '2023-06-26 09:45:14', 0, 0, 'Paga', 24, 1, 0),
(285, '2023-06-26 09:46:01', 70, 16.1, 'Anulada', 16, 1, 0),
(286, '2023-06-26 10:27:14', 36.9, 6.9, 'Em Lançamento', 16, 1, 30),
(287, '2023-06-26 10:32:13', 24.6, 4.6, 'Em Lançamento', 16, 1, 20),
(288, '2023-06-26 10:34:45', 0, 0, 'Em Lançamento', 16, 1, 0),
(289, '2023-06-26 10:34:52', 12.3, 2.3, 'Em Lançamento', 16, 1, 10),
(290, '2023-06-26 10:38:22', 147.6, 27.6, 'Em Lançamento', 16, 1, 120),
(291, '2023-06-26 10:38:40', 135.3, 25.3, 'Em Lançamento', 16, 1, 110);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emvigor` enum('Sim','Não') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `percentagem` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `emvigor`, `descricao`, `percentagem`) VALUES
(2, 'Sim', 'Taxa Normal – 23%', 23),
(3, 'Sim', 'Taxa Intermédia – 13%', 13),
(4, 'Sim', 'Taxa Reduzida – 6%', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhaobras`
--

DROP TABLE IF EXISTS `linhaobras`;
CREATE TABLE IF NOT EXISTS `linhaobras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` int NOT NULL,
  `valor` float NOT NULL,
  `valoriva` float NOT NULL,
  `idfolhaobra` int NOT NULL,
  `idservico` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idservico` (`idservico`),
  KEY `idfolhaobra` (`idfolhaobra`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `linhaobras`
--

INSERT INTO `linhaobras` (`id`, `quantidade`, `valor`, `valoriva`, `idfolhaobra`, `idservico`) VALUES
(53, 2, 20, 2.3, 283, 19),
(54, 10, 100, 2.3, 283, 19),
(55, 2, 20, 2.3, 285, 19),
(56, 5, 50, 2.3, 285, 19),
(57, 1, 10, 2.3, 282, 19),
(58, 1, 10, 2.3, 283, 19),
(59, 1, 10, 2.3, 283, 19),
(60, 1, 10, 2.3, 283, 19),
(61, 1, 10, 2.3, 286, 19),
(62, 1, 10, 2.3, 286, 19),
(63, 1, 10, 2.3, 286, 19),
(64, 1, 10, 2.3, 287, 19),
(65, 1, 10, 2.3, 287, 19),
(66, 1, 10, 2.3, 289, 19),
(67, 12, 120, 2.3, 290, 19),
(68, 10, 100, 2.3, 291, 19),
(69, 1, 10, 2.3, 291, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `precohora` double NOT NULL,
  `iva_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `services_ibfk_1` (`iva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `referencia`, `descricao`, `precohora`, `iva_id`) VALUES
(19, 'Teste', 'Teste', 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `telefone` int NOT NULL,
  `nif` int NOT NULL,
  `morada` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `codigopostal` int NOT NULL,
  `localidade` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `role` enum('Cliente','Funcionario','Admin') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`) VALUES
(1, 'admin', 'admin', '', 0, 0, '', 0, '', 'Admin'),
(2, 'user', 'user', '', 0, 0, '', 0, '', 'Cliente'),
(3, 'funcionario', 'funcionario', '', 0, 0, '', 0, '', 'Funcionario'),
(16, 'teste', 'teste', 'teste@teste.com', 123456789, 123456789, 'teste', 123456789, 'teste', 'Cliente'),
(24, 'asd', 'a', 'a@a.a', 123123123, 123123123, 'a', 1234567, 'a', 'Cliente');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `folhaobras`
--
ALTER TABLE `folhaobras`
  ADD CONSTRAINT `folhaobras_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `folhaobras_ibfk_2` FOREIGN KEY (`idfuncionario`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `linhaobras`
--
ALTER TABLE `linhaobras`
  ADD CONSTRAINT `linhaobras_ibfk_1` FOREIGN KEY (`idservico`) REFERENCES `services` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `linhaobras_ibfk_2` FOREIGN KEY (`idfolhaobra`) REFERENCES `folhaobras` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
