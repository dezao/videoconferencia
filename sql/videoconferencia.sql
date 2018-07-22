-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22/07/2018 às 20:07
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
  `senha` varchar(35) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `adm`) VALUES
(1, 'andre', 'cs300370', '202cb962ac59075b964b07152d234b70', 1),
(2, 'gabriel', 'gabriel', '202cb962ac59075b964b07152d234b70', 0);

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
  `pin` int(11) NOT NULL,
  `vip` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `videoconferencias`
--

INSERT INTO `videoconferencias` (`id`, `ticket`, `dia`, `unidadesParticipantes`, `nomeParticipantes`, `salasFisicas`, `horaInicio`, `horaFim`, `pin`, `vip`) VALUES
(6, 2089793, '2018-07-23', 'Sede e São Paulo', 'Não Informado', 'SEDE - Mato Grosso do Sul e SP - Sala 1510 ', '11:00:00', '12:00:00', 13, 'NÃO'),
(7, 2091284, '2018-07-23', 'SEDE e Faria Lima', 'Não Informado', 'SEDE - Sala Santa Catarina e Faria Lima 1510', '13:30:00', '14:00:00', 40, 'NÃO');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `videoconferencias`
--
ALTER TABLE `videoconferencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
