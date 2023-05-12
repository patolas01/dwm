-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Maio-2023 às 21:23
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `racesphere`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nivel` enum('pres','r1','r2') DEFAULT NULL,
  `idUtilizador` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idAdmin`, `nivel`, `idUtilizador`) VALUES
(1, 'pres', 1),
(2, 'pres', 3),
(3, 'pres', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `Id` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `cilindrada` int(11) NOT NULL,
  `cavalos` int(11) NOT NULL,
  `idfoto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`Id`, `marca`, `peso`, `modelo`, `cor`, `cilindrada`, `cavalos`, `idfoto`) VALUES
(1, 'bmw', '2.00', 'x6 m', 'branco', 460, 625, 1),
(2, 'bugati', '2.00', 'x6 m', 'preto', 500, 700, 3),
(3, 'ferrari', '2.00', 'x6 m', 'vermelho', 550, 750, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` enum('luvas','capacete','t-shirt') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'luvas'),
(2, 'luvas'),
(3, 'capacete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `circuitos`
--

CREATE TABLE `circuitos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `circuitos`
--

INSERT INTO `circuitos` (`id`, `nome`, `foto`, `pais`) VALUES
(1, 'pppppppppppppp', 'yyyyyyyyyyyyyyyyyyyy', '1'),
(2, 'pppppppppppppp', 'yyyyyyyyyyyyyyyyyyyy', '1'),
(3, 'yjdyykjytjytj', 'ahjkhjfjgyhgyhjdjjj', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `Id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `IDfoto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`Id`, `nome`, `IDfoto`) VALUES
(1, 'luva', 1),
(2, 'luva', 3),
(3, 'capacete', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipas`
--

CREATE TABLE `equipas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `desporto` enum('f1','wec','wrc') NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banpais` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipas`
--

INSERT INTO `equipas` (`id`, `nome`, `desporto`, `logo`, `banpais`) VALUES
(1, 'aaaaaaaaaa', 'f1', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(2, 'sdffdsd', 'wec', 'fdsvuuhyfvds', 'sfddsfdsfds'),
(3, 'aaaaaaaaaa', 'f1', 'fghfghfggfd', 'dghdgfhdfghdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapas`
--

CREATE TABLE `etapas` (
  `id` int(11) NOT NULL,
  `numEtapa` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `etapas`
--

INSERT INTO `etapas` (`id`, `numEtapa`) VALUES
(1, 1),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `ronda` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `data`, `ronda`) VALUES
(1, 'aaaaaaaaaaaaaaaaaaa', '2023-05-17', 2),
(2, 'sdffdsfdsd', '2003-05-17', 2),
(3, 'stjytytjyjyyjyy', '2023-05-17', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventoscircuitos`
--

CREATE TABLE `eventoscircuitos` (
  `idEventos` int(11) DEFAULT NULL,
  `idCircuitos` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventoscircuitos`
--

INSERT INTO `eventoscircuitos` (`idEventos`, `idCircuitos`) VALUES
(1, 1),
(3, 3),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotocarro`
--

CREATE TABLE `fotocarro` (
  `Id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `dataUpload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotocarro`
--

INSERT INTO `fotocarro` (`Id`, `nome`, `path`, `dataUpload`) VALUES
(1, 'çççççççççççççç', 'ççççççççççççççççççççççççççç', '2023-05-10 17:30:00'),
(2, 'sfsddffdsfds', 'sfsddsdfdsfd', '2003-05-10 17:30:00'),
(3, 'dyjyjyyjyjyjyj', 'djytjjjjjjjjjjdddddddddssssss', '2023-05-10 17:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotocircuito`
--

CREATE TABLE `fotocircuito` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `dataUpload` date DEFAULT NULL,
  `id_circuito` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotocircuito`
--

INSERT INTO `fotocircuito` (`id`, `nome`, `dataUpload`, `id_circuito`) VALUES
(1, 'xxxxxxxxxxxxxxxxx', '2023-05-09', 1),
(2, 'sdfdfsdsfdfd', '2004-05-09', 3),
(3, 'asuyfusfufdsudfgf', '2023-05-09', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotodefundo`
--

CREATE TABLE `fotodefundo` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotodefundo`
--

INSERT INTO `fotodefundo` (`id`, `foto`) VALUES
(1, 'foto1'),
(2, 'foto3'),
(3, 'foto2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotoequipamentos`
--

CREATE TABLE `fotoequipamentos` (
  `Id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `patch` varchar(255) NOT NULL,
  `dataUpload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotoequipamentos`
--

INSERT INTO `fotoequipamentos` (`Id`, `nome`, `patch`, `dataUpload`) VALUES
(1, 'hiugufgiufg', 'rdrudrtydytdydy', '2023-05-09 17:27:10'),
(2, 'gsdfjkfkdfgkfd', 'sdfdsgashhhh', '2009-05-09 17:27:10'),
(3, 'hiugufgiufg', 'rdrudrtydytdydy', '2023-05-09 17:27:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `fotodefundo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descricao`, `fotodefundo`) VALUES
(1, 'rrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '1'),
(2, 'rrrrrrrrr', 'sdfsdfdsffdsf', '3'),
(3, 'rrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pilotoposicao`
--

CREATE TABLE `pilotoposicao` (
  `idPiloto` int(11) DEFAULT NULL,
  `idPosicao` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pilotoposicao`
--

INSERT INTO `pilotoposicao` (`idPiloto`, `idPosicao`) VALUES
(1, 1),
(3, 3),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pilotos`
--

CREATE TABLE `pilotos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `datanasc` date DEFAULT NULL,
  `nacionalidade` varchar(255) DEFAULT NULL,
  `idEquipa` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pilotos`
--

INSERT INTO `pilotos` (`id`, `nome`, `numero`, `datanasc`, `nacionalidade`, `idEquipa`) VALUES
(1, 'Alexander Albon', 23, '1996-03-23', 'Thailand', 1),
(2, 'Alex Mane', 33, '1990-03-23', 'Frances', 3),
(3, 'Alexander Albon', 23, '1996-03-23', 'Thailand', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `id` int(11) NOT NULL,
  `posicao` int(11) DEFAULT NULL,
  `tempo` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resultado`
--

INSERT INTO `resultado` (`id`, `posicao`, `tempo`) VALUES
(1, 2, '03:47:23'),
(2, 1, '03:47:23'),
(3, 11, '03:47:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultadoetapas`
--

CREATE TABLE `resultadoetapas` (
  `idResultado` int(11) DEFAULT NULL,
  `idEtapas` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resultadoetapas`
--

INSERT INTO `resultadoetapas` (`idResultado`, `idEtapas`) VALUES
(1, 1),
(2, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `idUtilizador` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` enum('admin','regular') DEFAULT 'regular'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`idUtilizador`, `nome`, `username`, `senha`, `tipo`) VALUES
(1, 'joão', 'joão costa', 'vusdfuiOUIFGFG', 'admin'),
(2, 'manuel', 'mane', 'bsdijvbgdsbdjh', 'regular'),
(3, 'joão', 'joão costa', 'vusdfuiOUIFGFG', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `idUtilizador` (`idUtilizador`);

--
-- Indexes for table `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idfoto` (`idfoto`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circuitos`
--
ALTER TABLE `circuitos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDfoto` (`IDfoto`);

--
-- Indexes for table `equipas`
--
ALTER TABLE `equipas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logo` (`logo`);

--
-- Indexes for table `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotocarro`
--
ALTER TABLE `fotocarro`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fotocircuito`
--
ALTER TABLE `fotocircuito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_circuito` (`id_circuito`);

--
-- Indexes for table `fotodefundo`
--
ALTER TABLE `fotodefundo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotoequipamentos`
--
ALTER TABLE `fotoequipamentos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilotos`
--
ALTER TABLE `pilotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEquipa` (`idEquipa`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUtilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `carros`
--
ALTER TABLE `carros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `circuitos`
--
ALTER TABLE `circuitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `equipas`
--
ALTER TABLE `equipas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fotocarro`
--
ALTER TABLE `fotocarro`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fotocircuito`
--
ALTER TABLE `fotocircuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fotodefundo`
--
ALTER TABLE `fotodefundo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fotoequipamentos`
--
ALTER TABLE `fotoequipamentos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pilotos`
--
ALTER TABLE `pilotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUtilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
