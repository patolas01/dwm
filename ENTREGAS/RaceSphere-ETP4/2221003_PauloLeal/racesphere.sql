-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Maio-2023 às 12:36
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
CREATE DATABASE IF NOT EXISTS `racesphere` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `racesphere`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nome_admin` varchar(100) NOT NULL,
  `cargo_admin` enum('press','admin') NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `id_carro` int(11) NOT NULL,
  `marca_carro` varchar(50) NOT NULL,
  `modelo_carro` varchar(60) NOT NULL,
  `ano_carro` int(11) NOT NULL,
  `trac_carro` enum('4WD','RWD','FWD') NOT NULL,
  `caixa_carro` enum('Manual','Sequencial','Automático') NOT NULL,
  `comb_carro` enum('Gasóleo','Gasolina','Elétrico','Hibrido','Combustível de Competição') NOT NULL,
  `cilind_carro` float NOT NULL,
  `hp_carro` int(11) NOT NULL,
  `desc_carro` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `circuito`
--

CREATE TABLE `circuito` (
  `id_circuito` int(11) NOT NULL,
  `nome_circuito` varchar(80) NOT NULL,
  `cidade_circuito` varchar(50) NOT NULL,
  `nac_circuito` varchar(80) NOT NULL,
  `layout_circuito` longblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `circuito`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipa`
--

CREATE TABLE `equipa` (
  `id_equipa` int(11) NOT NULL,
  `nome_equipa` varchar(100) NOT NULL,
  `logo_equipa` longblob,
  `nac_equipa` varchar(50) NOT NULL,
  `cat_equipa` enum('f1','wrc','wec') NOT NULL,
  `subcat_equipa` enum('HYPERCAR','LMP2','LMGTE') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id_equipamento` int(11) NOT NULL,
  `nome_equipamento` varchar(50) NOT NULL,
  `img_equipamento` longblob,
  `desc_equipamento` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa_wrc`
--

CREATE TABLE `etapa_wrc` (
  `id_prova` int(11) NOT NULL,
  `num_etapa` int(11) NOT NULL,
  `id_etapa` int(11) NOT NULL,
  `inicio_sessao` time NOT NULL,
  `fim_sessao` time NOT NULL,
  `dia_etapa` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `etapa_wrc`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(100) NOT NULL,
  `desc_noticia` text NOT NULL,
  `thumb_noticia` longblob,
  `cat_noticia` enum('f1','wrc','wec') NOT NULL,
  `data_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_imagem`
--

CREATE TABLE `noticias_imagem` (
  `id_nimg` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `alt_nimg` varchar(150) NOT NULL,
  `img_nimg` longblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `piloto`
--

CREATE TABLE `piloto` (
  `id_piloto` int(11) NOT NULL,
  `nome_piloto` varchar(100) NOT NULL,
  `numero_piloto` int(11) NOT NULL,
  `nac_piloto` varchar(50) NOT NULL,
  `cat_piloto` enum('f1','wrc','wec') NOT NULL,
  `id_equipa` int(11) NOT NULL,
  `foto_piloto` longblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `piloto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova_f1`
--

CREATE TABLE `prova_f1` (
  `id_prova` int(11) NOT NULL,
  `gp_prova` varchar(80) NOT NULL,
  `id_circuito` int(11) NOT NULL,
  `inicio_prova` date NOT NULL,
  `fim_prova` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prova_f1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova_wec`
--

CREATE TABLE `prova_wec` (
  `id_prova` int(11) NOT NULL,
  `nome_prova` varchar(80) NOT NULL,
  `id_circuito` int(11) NOT NULL,
  `inicio_prova` date NOT NULL,
  `fim_prova` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prova_wec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova_wrc`
--

CREATE TABLE `prova_wrc` (
  `id_prova` int(11) NOT NULL,
  `nome_prova` varchar(80) NOT NULL,
  `local_prova` varchar(80) NOT NULL,
  `inicio_prova` date NOT NULL,
  `fim_prova` date NOT NULL,
  `img_prova` longblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prova_wrc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado_f1`
--

CREATE TABLE `resultado_f1` (
  `id_sessao` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `posicao_res` int(11) NOT NULL,
  `laptime_res` time DEFAULT NULL,
  `dnf` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resultado_f1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado_wec`
--

CREATE TABLE `resultado_wec` (
  `id_sessao` int(11) NOT NULL,
  `id_equipa` int(11) NOT NULL,
  `posicao_res` int(11) NOT NULL,
  `laptime_res` time DEFAULT NULL,
  `dnf` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resultado_wec`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado_wrc`
--

CREATE TABLE `resultado_wrc` (
  `id_etapa` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `posicao_res` int(11) NOT NULL,
  `laptime_res` time DEFAULT NULL,
  `dnf` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resultado_wrc`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao_f1`
--

CREATE TABLE `sessao_f1` (
  `id_sessao` int(11) NOT NULL,
  `tipo_prova` enum('P','Q','R','SS','SP') NOT NULL,
  `id_prova` int(11) NOT NULL,
  `dia_sessao` date NOT NULL,
  `inicio_sessao` time NOT NULL,
  `fim_sessao` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sessao_f1`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao_wec`
--

CREATE TABLE `sessao_wec` (
  `id_sessao` int(11) NOT NULL,
  `tipo_prova` enum('P','Q','W','R') NOT NULL,
  `dia_sessao` date NOT NULL,
  `inicio_sessao` time NOT NULL,
  `fim_sessao` time NOT NULL,
  `duracao_corrida` time DEFAULT NULL,
  `id_prova` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sessao_wec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(150) NOT NULL,
  `telefone_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id_carro`);

--
-- Indexes for table `circuito`
--
ALTER TABLE `circuito`
  ADD PRIMARY KEY (`id_circuito`);

--
-- Indexes for table `equipa`
--
ALTER TABLE `equipa`
  ADD PRIMARY KEY (`id_equipa`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id_equipamento`);

--
-- Indexes for table `etapa_wrc`
--
ALTER TABLE `etapa_wrc`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `noticias_imagem`
--
ALTER TABLE `noticias_imagem`
  ADD PRIMARY KEY (`id_nimg`);

--
-- Indexes for table `piloto`
--
ALTER TABLE `piloto`
  ADD PRIMARY KEY (`id_piloto`);

--
-- Indexes for table `prova_f1`
--
ALTER TABLE `prova_f1`
  ADD PRIMARY KEY (`id_prova`);

--
-- Indexes for table `prova_wec`
--
ALTER TABLE `prova_wec`
  ADD PRIMARY KEY (`id_prova`);

--
-- Indexes for table `prova_wrc`
--
ALTER TABLE `prova_wrc`
  ADD PRIMARY KEY (`id_prova`);

--
-- Indexes for table `sessao_f1`
--
ALTER TABLE `sessao_f1`
  ADD PRIMARY KEY (`id_sessao`);

--
-- Indexes for table `sessao_wec`
--
ALTER TABLE `sessao_wec`
  ADD PRIMARY KEY (`id_sessao`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
