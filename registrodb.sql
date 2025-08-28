-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Ago-2025 às 15:58
-- Versão do servidor: 9.1.0
-- versão do PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `registrodb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `status` enum('Ativo','Inativo') DEFAULT 'Ativo',
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `registros`
--

INSERT INTO `registros` (`id`, `titulo`, `conteudo`, `status`, `criado_em`) VALUES
(1, 'ssss', 'sss', 'Ativo', '2025-08-28 15:45:22'),
(2, 'hhhh', 'hhhh', 'Ativo', '2025-08-28 15:45:50'),
(3, 'ggggg', 'ggggg', 'Ativo', '2025-08-28 15:49:04'),
(4, 'wwww', 'wwww', 'Inativo', '2025-08-28 15:49:19'),
(5, 'jjjj', 'jjj', 'Inativo', '2025-08-28 15:49:24'),
(6, 'lll', 'lll', 'Inativo', '2025-08-28 15:49:32'),
(7, 'oooo', 'ooo', 'Inativo', '2025-08-28 15:49:38'),
(8, 'ddd', 'ddd', 'Inativo', '2025-08-28 15:49:45'),
(9, 'aaa', 'aaa', 'Ativo', '2025-08-28 15:49:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
