-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/11/2023 às 16:25
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdd_pep`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `efeito` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `gif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `habilidades`
--

INSERT INTO `habilidades` (`id`, `nome`, `descricao`, `efeito`, `tipo`, `img`, `gif`) VALUES
(0, 'Golpe de Sorte', 'Um ataque que pode ou não ser poderoso.', '20', 'ATQ', '...', '...'),
(1, 'Defesa Alta', 'Levanta os braços protegendo seu próprio rosto.', '20', 'DEF', '...', '...'),
(2, 'Respirar Fundo', 'Respira profundamente se recuperando.', '10\r\n', 'CURA', '...', '...'),
(3, 'Estrondo Extrusivo', '...', '30', 'DEF', '...', '...'),
(4, 'Palmas Sismicas', '...', '40', 'ATQ', '...', '...'),
(5, 'Dispersar Divergente', '...', 'A FAZER', 'DBUF1', '...', '...'),
(6, 'Visão Cardeal', '...', '35', 'BUF', '...', '...'),
(7, 'Golpe Latitudinal', '...', '50', 'ATQ', '...', '...'),
(8, 'Defesa Escalar', '...', '30', 'DEF', '...', '...'),
(9, 'Nuvem na Cartola', '...', 'A FAZER', 'ESP', '...', '...'),
(10, 'Nuvem Massiva', '...', '50', 'ATQ', '...', '...'),
(11, 'Nuvens Aceleradas', '...', '30', 'DBUF2', '...', '...'),
(12, 'Invocar Pampa', '...', '...', 'IPM', '...', '...'),
(13, 'Invocar Mata Atlantica', '...', '...', 'IMA', '...', '...'),
(14, 'Invocar Caatinga', '...', '...', 'ICA', '...', '...');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogador`
--

CREATE TABLE `jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogador`
--

INSERT INTO `jogador` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'DM', 'root', '$2y$10$aHqS9gSYSO1fVQWL4Rp66O0IV8yok2/fmk1/yKOas1Y0OEzsO201.'),
(2, 'JogadorTeste#1', 'jogUm@mail.com', '$2y$10$tJyEv.Adb5oYi2AQKdmaXePLvePVZ6ucbkkBfocBXiknMjw/SiKH6'),
(3, 'JogadorTeste#2', 'jogDois@mail.com', '$2y$10$OfxQOnTMUnsH1vls3lqUhOYfHfV/JFo0rDcRu8iJkVC.Qs936dgOW');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jog_hab`
--

CREATE TABLE `jog_hab` (
  `id_jog` int(11) NOT NULL,
  `id_hab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jog_hab`
--

INSERT INTO `jog_hab` (`id_jog`, `id_hab`) VALUES
(1, 0),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `padraoinimigo`
--

CREATE TABLE `padraoinimigo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `p2` varchar(255) NOT NULL,
  `p3` varchar(255) NOT NULL,
  `p4` varchar(255) NOT NULL,
  `p5` varchar(255) NOT NULL,
  `p6` varchar(255) NOT NULL,
  `p7` varchar(255) NOT NULL,
  `p8` varchar(255) NOT NULL,
  `p9` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `padraoinimigo`
--

INSERT INTO `padraoinimigo` (`id`, `nome`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`) VALUES
(1, 'Quero Tempestade', 'ATQ', 'ATQ', 'ATQ', 'DEF', 'ATQ', 'ATQ', 'ATQ', 'DEF', 'ATQ'),
(2, 'Pedregulho Peludo', 'ATQ', 'ATQ', 'ATQ', 'CURA', 'ATQ', 'ATQ', 'ATQ', 'CURA', 'ESP'),
(3, 'Atlas Pintado', 'ATQ', 'ATQ', 'ATQ', 'ATQCRIT', 'ATQ', 'ATQ', 'ATQ', 'ATQCRIT', 'CURA'),
(4, 'Roedor Ancião V1', 'ATQ', 'ATQ', 'ATQ', 'CURA', 'DEF', 'ATQ', 'ATQ', 'ATQ', 'CURA'),
(5, 'Roedor Ancião V2', 'ATQ', 'ATQ', 'ATQCRIT', 'ATQ', 'ATQ', 'ATQCRIT', 'ATQ', 'ATQ', 'ATQCRIT');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `jog_hab`
--
ALTER TABLE `jog_hab`
  ADD UNIQUE KEY `id_jog` (`id_jog`,`id_hab`),
  ADD KEY `fk_hab` (`id_hab`);

--
-- Índices de tabela `padraoinimigo`
--
ALTER TABLE `padraoinimigo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `jog_hab`
--
ALTER TABLE `jog_hab`
  ADD CONSTRAINT `fk_hab` FOREIGN KEY (`id_hab`) REFERENCES `habilidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jog` FOREIGN KEY (`id_jog`) REFERENCES `jogador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
