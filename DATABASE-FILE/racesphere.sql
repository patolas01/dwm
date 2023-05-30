-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Maio-2023 às 22:20
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
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nome_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_admin` enum('press','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_admin` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `id_carro` int(11) NOT NULL,
  `marca_carro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo_carro` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano_carro` int(11) NOT NULL,
  `trac_carro` enum('4WD','RWD','FWD') COLLATE utf8mb4_unicode_ci NOT NULL,
  `caixa_carro` enum('Manual','Sequencial','Automático') COLLATE utf8mb4_unicode_ci NOT NULL,
  `comb_carro` enum('Gasóleo','Gasolina','Elétrico','Hibrido','Combustível de Competição') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cilind_carro` float NOT NULL,
  `hp_carro` int(11) NOT NULL,
  `desc_carro` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcarrofoto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`id_carro`, `marca_carro`, `modelo_carro`, `ano_carro`, `trac_carro`, `caixa_carro`, `comb_carro`, `cilind_carro`, `hp_carro`, `desc_carro`, `idcarrofoto`) VALUES
(1, 'ferrari', '330 P4', 1967, 'RWD', 'Manual', '', 300, 250, 'sjbsdihdsibhdshdssd', NULL),
(2, 'mercedes', 'x3', 2003, '4WD', 'Sequencial', 'Hibrido', 360, 300, 'fdhd fd fbdfd fd df fd jdf  dfb df bdfnb dfn dfn df dfn dfn dfn dfnb dfbn dfn  dfc ndf', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrofoto`
--

CREATE TABLE `carrofoto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataUpload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `circuito`
--

CREATE TABLE `circuito` (
  `id_circuito` int(11) NOT NULL,
  `nome_circuito` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade_circuito` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nac_circuito` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout_circuito` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipa`
--

CREATE TABLE `equipa` (
  `id_equipa` int(11) NOT NULL,
  `nome_equipa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_equipa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nac_equipa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_equipa` enum('f1','wrc','wec') COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_equipa` enum('HYPERCAR','LMP2','LMGTE') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id_equipamento` int(11) NOT NULL,
  `nome_equipamento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_equipamento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_equipamento` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentofoto`
--

CREATE TABLE `equipamentofoto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `patch` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dataUpload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_noticia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_noticia` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_noticia` enum('f1','wrc','wec') COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_imagem`
--

CREATE TABLE `noticias_imagem` (
  `id_nimg` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `alt_nimg` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_nimg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `piloto`
--

CREATE TABLE `piloto` (
  `id_piloto` int(11) NOT NULL,
  `nome_piloto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_piloto` int(11) NOT NULL,
  `nac_piloto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_piloto` enum('f1','wrc','wec') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_equipa` int(11) NOT NULL,
  `foto_piloto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova_f1`
--

CREATE TABLE `prova_f1` (
  `id_prova` int(11) NOT NULL,
  `gp_prova` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_circuito` int(11) NOT NULL,
  `inicio_prova` date NOT NULL,
  `fim_prova` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova_wec`
--

CREATE TABLE `prova_wec` (
  `id_prova` int(11) NOT NULL,
  `nome_prova` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_circuito` int(11) NOT NULL,
  `inicio_prova` date NOT NULL,
  `fim_prova` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova_wrc`
--

CREATE TABLE `prova_wrc` (
  `id_prova` int(11) NOT NULL,
  `nome_prova` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_prova` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio_prova` date NOT NULL,
  `fim_prova` date NOT NULL,
  `img_prova` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao_f1`
--

CREATE TABLE `sessao_f1` (
  `id_sessao` int(11) NOT NULL,
  `tipo_prova` enum('P','Q','R','SS','SP') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prova` int(11) NOT NULL,
  `dia_sessao` date NOT NULL,
  `inicio_sessao` time NOT NULL,
  `fim_sessao` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao_wec`
--

CREATE TABLE `sessao_wec` (
  `id_sessao` int(11) NOT NULL,
  `tipo_prova` enum('P','Q','W','R') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_sessao` date NOT NULL,
  `inicio_sessao` time NOT NULL,
  `fim_sessao` time NOT NULL,
  `duracao_corrida` time DEFAULT NULL,
  `id_prova` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_user`, `nome_user`, `email_user`, `password_user`, `telefone_user`) VALUES
(1, 'teste', 'teste@gmail.com', 'd614a4af09eb093f76b67e87cf62f8c49c44709216016e6a66cd69101e04936abe1f87434ba150422a2578d0d75fc44263bd3cce89efc4ecd0ecbdaeb2560562', 911);

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
-- Indexes for table `carrofoto`
--
ALTER TABLE `carrofoto`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `equipamentofoto`
--
ALTER TABLE `equipamentofoto`
  ADD PRIMARY KEY (`id`);

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
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carro`
--
ALTER TABLE `carro`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `carrofoto`
--
ALTER TABLE `carrofoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `circuito`
--
ALTER TABLE `circuito`
  MODIFY `id_circuito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipa`
--
ALTER TABLE `equipa`
  MODIFY `id_equipa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipamentofoto`
--
ALTER TABLE `equipamentofoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `etapa_wrc`
--
ALTER TABLE `etapa_wrc`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias_imagem`
--
ALTER TABLE `noticias_imagem`
  MODIFY `id_nimg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piloto`
--
ALTER TABLE `piloto`
  MODIFY `id_piloto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prova_f1`
--
ALTER TABLE `prova_f1`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prova_wec`
--
ALTER TABLE `prova_wec`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prova_wrc`
--
ALTER TABLE `prova_wrc`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessao_f1`
--
ALTER TABLE `sessao_f1`
  MODIFY `id_sessao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessao_wec`
--
ALTER TABLE `sessao_wec`
  MODIFY `id_sessao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
