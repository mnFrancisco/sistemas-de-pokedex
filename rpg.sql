-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2023 às 15:18
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rpg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(10) NOT NULL,
  `id_per` int(10) DEFAULT NULL,
  `nomeclas` varchar(20) DEFAULT NULL,
  `efeito` tinytext DEFAULT NULL,
  `afinidade` tinytext DEFAULT NULL,
  `bonus` tinytext DEFAULT NULL,
  `ptorcida` tinytext DEFAULT NULL,
  `evo` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id_classe`, `id_per`, `nomeclas`, `efeito`, `afinidade`, `bonus`, `ptorcida`, `evo`) VALUES
(1, 1, 'wdwad', 'wafawf', 'wsfaws', 'fwafa', 'wfaw', 'fawfaw'),
(2, 1, 'wdwad', 'wafawf', 'wsfaws', 'fwafa', 'wfaw', 'fawfaw');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mochila`
--

CREATE TABLE `mochila` (
  `id_per` int(10) DEFAULT NULL,
  `peso_usado` varchar(3) DEFAULT NULL,
  `nome_item` varchar(30) DEFAULT NULL,
  `qnt_item` int(4) DEFAULT NULL,
  `id_item` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mochila`
--

INSERT INTO `mochila` (`id_per`, `peso_usado`, `nome_item`, `qnt_item`, `id_item`) VALUES
(1, '0.1', 'cszc', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) NOT NULL,
  `id_per` int(10) DEFAULT NULL,
  `nomeper` varchar(20) DEFAULT NULL,
  `regiao` varchar(20) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `idade` int(4) DEFAULT NULL,
  `id_trei` varchar(4) DEFAULT NULL,
  `mundial` varchar(4) DEFAULT NULL,
  `insig` varchar(4) DEFAULT NULL,
  `contatos` varchar(500) NOT NULL,
  `hp` varchar(4) NOT NULL DEFAULT '5',
  `stamina` varchar(4) NOT NULL DEFAULT '10',
  `desloc` varchar(4) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `persona`
--

INSERT INTO `persona` (`id_persona`, `id_per`, `nomeper`, `regiao`, `cidade`, `idade`, `id_trei`, `mundial`, `insig`, `contatos`, `hp`, `stamina`, `desloc`) VALUES
(2, 1, 'mestre', 'asds', 'fasda', 25, '2452', '452', '2', 'asf', '5', '10', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem`
--

CREATE TABLE `personagem` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `personagem`
--

INSERT INTO `personagem` (`id`, `nome`, `email`, `password`) VALUES
(1, 'mestre', 'mestre@gmail.com', '5a1b210846cd2a7849f914ccfccb5d55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `poke`
--

CREATE TABLE `poke` (
  `id_poke` int(10) NOT NULL,
  `id_per` int(10) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `t_type` varchar(50) DEFAULT NULL,
  `hab` varchar(20) DEFAULT NULL,
  `nature` varchar(20) DEFAULT NULL,
  `xp` int(10) DEFAULT NULL,
  `lv` int(10) DEFAULT NULL,
  `hp` int(4) DEFAULT NULL,
  `atk` int(4) DEFAULT NULL,
  `satk` int(4) DEFAULT NULL,
  `def` int(4) DEFAULT NULL,
  `sdef` int(4) DEFAULT NULL,
  `speed` int(4) DEFAULT NULL,
  `desloc` int(10) DEFAULT NULL,
  `ami` int(4) DEFAULT NULL,
  `moves` varchar(500) NOT NULL,
  `tcap` varchar(20) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `shyni` varchar(20) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `poke`
--

INSERT INTO `poke` (`id_poke`, `id_per`, `nome`, `t_type`, `hab`, `nature`, `xp`, `lv`, `hp`, `atk`, `satk`, `def`, `sdef`, `speed`, `desloc`, `ami`, `moves`, `tcap`, `status`, `shyni`) VALUES
(1, 1, 'Giratina', 'ashdg', 'DKr', 'jsdan', 1, 11, 1, 1, 11, 1, 1, 11, 1, 1, '1', 'Recompensa', 1, 'normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `skill`
--

CREATE TABLE `skill` (
  `id_per` int(10) DEFAULT NULL,
  `skill` varchar(20) DEFAULT NULL,
  `spontos` varchar(3) NOT NULL,
  `id_skill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `skill`
--

INSERT INTO `skill` (`id_per`, `skill`, `spontos`, `id_skill`) VALUES
(1, 'dsa', '-1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fotos`
--

CREATE TABLE `tbl_fotos` (
  `id_foto` int(10) NOT NULL,
  `id_per` int(10) DEFAULT NULL,
  `nome_foto` varchar(20) DEFAULT NULL,
  `nomemd5_foto` varchar(200) DEFAULT NULL,
  `tamanho_foto` varchar(20) DEFAULT NULL,
  `status_fotos` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_fotos`
--

INSERT INTO `tbl_fotos` (`id_foto`, `id_per`, `nome_foto`, `nomemd5_foto`, `tamanho_foto`, `status_fotos`) VALUES
(2, 1, 'padrao.png', '5331d2221e36f9b9d0470c3438659286.png', '143804', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `id_per` (`id_per`);

--
-- Índices para tabela `mochila`
--
ALTER TABLE `mochila`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_per` (`id_per`);

--
-- Índices para tabela `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_per` (`id_per`);

--
-- Índices para tabela `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `poke`
--
ALTER TABLE `poke`
  ADD PRIMARY KEY (`id_poke`),
  ADD KEY `id_per` (`id_per`);

--
-- Índices para tabela `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`),
  ADD KEY `id_per` (`id_per`);

--
-- Índices para tabela `tbl_fotos`
--
ALTER TABLE `tbl_fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_per` (`id_per`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `mochila`
--
ALTER TABLE `mochila`
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `poke`
--
ALTER TABLE `poke`
  MODIFY `id_poke` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_fotos`
--
ALTER TABLE `tbl_fotos`
  MODIFY `id_foto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personagem` (`id`);

--
-- Limitadores para a tabela `mochila`
--
ALTER TABLE `mochila`
  ADD CONSTRAINT `mochila_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personagem` (`id`);

--
-- Limitadores para a tabela `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personagem` (`id`);

--
-- Limitadores para a tabela `poke`
--
ALTER TABLE `poke`
  ADD CONSTRAINT `poke_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personagem` (`id`);

--
-- Limitadores para a tabela `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personagem` (`id`);

--
-- Limitadores para a tabela `tbl_fotos`
--
ALTER TABLE `tbl_fotos`
  ADD CONSTRAINT `tbl_fotos_ibfk_1` FOREIGN KEY (`id_per`) REFERENCES `personagem` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
