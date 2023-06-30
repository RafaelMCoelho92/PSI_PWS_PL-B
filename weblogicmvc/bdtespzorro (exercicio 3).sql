-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Jun-2023 às 19:06
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
(1, 'TeSPZorro PSI', 'tespzorro@psi.com', 244820300, 434434434, 'Morro do Lena, Alto do Vieira', '2415250', 'Leiria', 100000);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `folhaobras`
--

INSERT INTO `folhaobras` (`id`, `data`, `valortotal`, `ivatotal`, `estado`, `idcliente`, `idfuncionario`, `subtotal`) VALUES
(1, '2023-06-29 10:37:29', 139.725, 22.225, 'Emitida', 4, 2, 117.5),
(2, '2023-06-29 10:38:01', 180.975, 23.475, 'Paga', 4, 2, 157.5),
(3, '2023-06-29 10:39:37', 118.08, 17.08, 'Em Lançamento', 5, 2, 101),
(4, '2023-06-29 10:40:38', 112.98, 11.98, 'Em Lançamento', 6, 3, 101),
(5, '2023-06-29 10:52:44', 662.988, 107.388, 'Emitida', 6, 2, 555.6),
(6, '2023-06-29 15:00:31', 13.56, 1.56, 'Em Lançamento', 5, 1, 12),
(7, '2023-06-29 15:08:55', 24.6, 4.6, 'Em Lançamento', 5, 1, 20),
(8, '2023-06-29 19:29:33', 0, 0, 'Anulada', 5, 32, 0),
(9, '2023-06-29 19:32:14', 628, 28, 'Paga', 33, 32, 600);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `emvigor`, `descricao`, `percentagem`) VALUES
(1, 'Não', 'Taxa Normal – 23%', 23),
(2, 'Não', 'Taxa Intermédia – 13%', 13),
(3, 'Sim', 'Taxa Reduzida – 6%', 6),
(15, 'Sim', 'Taxa nova 1', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `linhaobras`
--

INSERT INTO `linhaobras` (`id`, `quantidade`, `valor`, `valoriva`, `idfolhaobra`, `idservico`) VALUES
(230, 2, 20, 2.3, 1, 30),
(231, 4, 48, 1.56, 1, 31),
(232, 5, 49.5, 2.277, 1, 34),
(233, 5, 75, 0.9, 2, 32),
(234, 3, 52.5, 4.025, 2, 33),
(235, 3, 30, 2.3, 2, 30),
(236, 5, 50, 2.3, 3, 30),
(237, 3, 36, 1.56, 3, 31),
(238, 1, 15, 0.9, 3, 32),
(239, 2, 20, 2.3, 4, 30),
(240, 3, 36, 1.56, 4, 31),
(241, 3, 45, 0.9, 4, 32),
(242, 8, 120, 0.9, 5, 32),
(243, 44, 435.6, 2.277, 5, 34),
(244, 1, 12, 1.56, 6, 31),
(245, 2, 20, 2.3, 7, 30),
(246, 10, 500, 0.5, 9, 35),
(247, 10, 50, 2.3, 9, 30);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `referencia`, `descricao`, `precohora`, `iva_id`) VALUES
(30, '10120', 'PHP - Master', 10, 1),
(31, '10130', 'Desenvolvimento Servidor', 12, 2),
(32, '10140', 'Testes ao Programa', 15, 3),
(33, '10150', 'Segurança Servidor', 17.5, 1),
(34, '10160', 'Validação de Dados', 9.9, 1),
(35, '123', 'Novo Servico111', 50, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `done` enum('Sim','Não') NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tasks`
--

INSERT INTO `tasks` (`id`, `description`, `done`, `user_id`) VALUES
(16, '123', 'Não', 1),
(17, '123', 'Não', 1),
(18, 'teste', 'Não', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`) VALUES
(1, 'admin', '$2y$10$CQlRzEWEVl6swTSZ8KPoEeNXJ4Khibc/6sN5JBy523jeRSRuDBxsG', 'admin@tespzorro.com', 987987987, 266266266, 'IPLeiria ESTG', 1234567, 'Leiria', 'Admin'),
(2, 'funcionario', '$2y$10$s0HwmniVOKejrlgGmhPXTOZFHSgrLuOy0BlSqUHhzGa83FvpKZcd2', 'funcionario@tespzorro.com', 222222222, 222222222, 'IPLeiria', 1234567, 'Leiria', 'Funcionario'),
(3, 'funcionario2', '$2y$10$s0HwmniVOKejrlgGmhPXTOZFHSgrLuOy0BlSqUHhzGa83FvpKZcd2', 'funcionario2@tespzorro.com', 333333333, 333333333, 'IPLeiria', 1234567, 'Leiria', 'Funcionario'),
(4, 'Rafael', '$2y$10$EIRnc5CmhoDBEpBn9kr/Jee5/vXVXxu9TfeE/S5KD8sFwXO07VzEi', 'rafael@cliente.com', 444444444, 444444444, 'Rua do Estadio do Dragao', 1234567, 'Porto', 'Cliente'),
(5, 'Andre', '$2y$10$KpEqJLoBt2rB2j9ux5nJ9.FglHn6uHBaQ6VRxZNOXRa3m1gRVqllK', 'andre@cliente.com', 555555555, 555555555, 'Rua do Estadio Municipal de Leiria', 1234567, 'Leiria', 'Cliente'),
(6, 'Patrick', '$2y$10$aMy9EhSOeqBGQ3bHXoWY6OuRG45UEyJH0zH/ATJXhORYMWv.dSepa', 'patrick@cliente.com', 666666666, 666666666, 'Rua do Estadio da Luz', 1234567, 'Porto', 'Cliente'),
(31, 'teste', '$2y$10$yeI93rA53cB6Z9i18KEjheULieL/XKj2islpf77D23Le3GGNG17rm', 'teste@teste.com', 444555666, 456789456, 'teste', 1234567, 't', 'Funcionario'),
(32, 'func', '$2y$10$11PaU4yB3PHNUSUyHaTs6OTp7rJqYBM5pLkdwhbvexsFnEcsEegGW', 'func@a.a', 123123123, 789789789, 'a', 4564561, 'a', 'Funcionario'),
(33, 'cliente', '$2y$10$JxfyAq2hBTcMEvlN4Wt/keMJ7eLI67WjWbNF/83Yr6zDzGF2wzZmG', 'cliente@cliente.com', 123123123, 888888555, 'cliente', 1234567, 'cliente', 'Cliente');

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

--
-- Limitadores para a tabela `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
