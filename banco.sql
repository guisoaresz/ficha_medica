-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/04/2024 às 22:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `idContato` int(11) NOT NULL,
  `nomeContato` varchar(30) DEFAULT NULL,
  `grauParentescoContato` varchar(15) DEFAULT NULL,
  `numeroContato` varchar(25) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`idContato`, `nomeContato`, `grauParentescoContato`, `numeroContato`, `idUsuario`) VALUES
(1, 'Neymar Silva', 'Pai', '5515999999999', 1),
(2, 'Nadine Santos', 'Mãe', '5515999999999', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicamentos`
--

CREATE TABLE `medicamentos` (
  `idMedicamento` int(11) NOT NULL,
  `nomeMedicamento` varchar(50) NOT NULL,
  `dosMedicamento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicamentos`
--

INSERT INTO `medicamentos` (`idMedicamento`, `nomeMedicamento`, `dosMedicamento`, `idUsuario`) VALUES
(1, 'Paracetamol', 100, 1),
(2, 'Amoxilina', 250, 1),
(3, 'Ibuprofeno', 200, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `problemas_saude`
--

CREATE TABLE `problemas_saude` (
  `idProblema` int(11) NOT NULL,
  `infoProblema` varchar(300) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `problemas_saude`
--

INSERT INTO `problemas_saude` (`idProblema`, `infoProblema`, `idUsuario`) VALUES
(1, 'Dificuldades respiratórias', 1),
(2, 'Hipertensão arterial controlada com medicamentos', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `fotoUsuario` varchar(50) NOT NULL,
  `nomeUsuario` text NOT NULL,
  `idadeUsuario` int(3) NOT NULL,
  `doadorUsuario` tinyint(1) NOT NULL,
  `tipoSanguineoUsuario` varchar(3) NOT NULL,
  `alturaUsuario` float NOT NULL,
  `pesoUsuario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `fotoUsuario`, `nomeUsuario`, `idadeUsuario`, `doadorUsuario`, `tipoSanguineoUsuario`, `alturaUsuario`, `pesoUsuario`) VALUES
(1, 'user1_foto.jpg', 'Neymar Jr', 32, 1, 'O+', 1.75, 68),
(2, 'user418924_foto.jpg', 'Cássio Ramos', 36, 0, 'A', 1.96, 92);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`idContato`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`idMedicamento`);

--
-- Índices de tabela `problemas_saude`
--
ALTER TABLE `problemas_saude`
  ADD PRIMARY KEY (`idProblema`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `idMedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `problemas_saude`
--
ALTER TABLE `problemas_saude`
  MODIFY `idProblema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `contatos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
