-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/07/2018 às 11:58
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `videoconferencia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'andre', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videoconferencias`
--

CREATE TABLE `videoconferencias` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `dia` date NOT NULL,
  `unidadesParticipantes` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nomeParticipantes` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salasFisicas` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFim` time NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `videoconferencias`
--

INSERT INTO `videoconferencias` (`id`, `ticket`, `dia`, `unidadesParticipantes`, `nomeParticipantes`, `salasFisicas`, `horaInicio`, `horaFim`, `pin`) VALUES
(40, 123456, '2018-07-17', 'Curitiba, Rio Grande, Rondópolis', 'Euzito, Francilucio, Myke, Marlistange', 'Mato Grosso, Sala 1, Sala 2', '13:00:00', '14:00:00', 11223344),
(41, 11223344, '2018-07-19', 'Paranguá, Curitiba', 'Juca', 'Sala Treinamento, Rio Grande', '08:00:00', '10:00:00', 44556677),
(42, 2078654, '2018-07-17', 'Santa Maria, Araraquara', 'Teste, teste 2, teste 3', 'Sala 6, Sala 10', '08:00:00', '09:00:00', 55443322),
(43, 928765, '2018-07-20', 'D, E, F', 'A, B, C', 'G, H I', '10:00:00', '18:00:00', 55667788);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `videoconferencias`
--
ALTER TABLE `videoconferencias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `videoconferencias`
--
ALTER TABLE `videoconferencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
