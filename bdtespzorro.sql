-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Jun-2023 às 09:28
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
  `estado` enum('Em Lançamento','Emitida','Paga') NOT NULL,
  `idcliente` int NOT NULL,
  `idfuncionario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcliente` (`idcliente`),
  KEY `idfuncionario` (`idfuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `folhaobras`
--

INSERT INTO `folhaobras` (`id`, `data`, `valortotal`, `ivatotal`, `estado`, `idcliente`, `idfuncionario`) VALUES
(1, '0000-00-00 00:00:00', 100, 50, '', 1, 1);

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
(1, 'Sim', 'teste', 0),
(2, 'Não', 'Taxa Normal – 23%', 1.23),
(3, 'Não', 'Taxa Intermédia – 13%', 1.13),
(4, 'Não', 'Taxa Reduzida – 6%\r\n', 1.06),
(7, 'Não', 'teste', 12),
(9, 'Sim', 'criar9', 11);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `referencia`, `descricao`, `precohora`, `iva_id`) VALUES
(17, 'aiai', 'ai', 10, 1);

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
