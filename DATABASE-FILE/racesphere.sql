-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2023 às 11:03
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
CREATE DATABASE IF NOT EXISTS `racesphere` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `racesphere`;

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
  `caixa_carro` enum('Manual','Sequencial','AutomÃ¡tico') COLLATE utf8mb4_unicode_ci NOT NULL,
  `comb_carro` enum('GasÃ³leo','Gasolina','ElÃ©trico','Hibrido','CombustÃ­vel de CompetiÃ§Ã£o') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cilind_carro` float NOT NULL,
  `hp_carro` int(11) NOT NULL,
  `desc_carro` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotocarro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`id_carro`, `marca_carro`, `modelo_carro`, `ano_carro`, `trac_carro`, `caixa_carro`, `comb_carro`, `cilind_carro`, `hp_carro`, `desc_carro`, `fotocarro`) VALUES
(52, 'ferrari', '330 P4', 1967, '4WD', 'Manual', 'GasÃ³leo', 236, 556, 'saxihsaubkuasu', '1686128761_transferir.jpg'),
(53, 'mercedes', '2323', 1980, '4WD', 'Manual', 'GasÃ³leo', 123, 235, 'efdsfdsdfdsf', '1686857548_im ages (6).jpg'),
(54, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860552_images (8).jpg'),
(55, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860557_images (8).jpg'),
(56, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860560_images (8).jpg'),
(57, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860563_images (8).jpg'),
(58, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860566_images (8).jpg'),
(59, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860569_images (8).jpg'),
(60, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860572_images (8).jpg'),
(61, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860575_images (8).jpg'),
(62, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860578_images (8).jpg'),
(63, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860581_images (8).jpg'),
(64, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860584_images (8).jpg'),
(65, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860587_images (8).jpg'),
(66, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860590_images (8).jpg'),
(67, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860593_images (8).jpg'),
(68, 'bmw', '333', 1965, '4WD', 'Manual', 'GasÃ³leo', 100, 500, 'fdgsf df fd fd  ', '1686860596_images (8).jpg'),
(69, 'mclaren', 'p40', 2015, '4WD', 'AutomÃ¡tico', 'Gasolina', 633, 230, 'sedfmso fsd fdsdsf jfds ', '1687030809_im ages (7).jpg'),
(70, 'nissan', 'x', 2010, '4WD', 'Manual', 'Gasolina', 130, 180, 'xvxxdvxd', '1687031759_ima ges (3).jpg');


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

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id_equipamento`, `nome_equipamento`, `img_equipamento`, `desc_equipamento`) VALUES
(1, 'luva', '1687032058_ulquiorra-cifer-background-1366x768-laptop-412470.jpg', 'dshvbsdhvdsh ds sdhds dshd sd ds hsd nds dsb dsb ds dsbsd nsdnd'),
(6, 'capaÃ§ete', '1687032464_910289.jpg', 'fghfg fg  fghf hgf fh'),
(5, 'luva', '1687032058_ulquiorra-cifer-background-1366x768-laptop-412470.jpg', 'dfsvidsvds dsh dshds dsbds sd dbs dsn dsnd ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa`
--

CREATE TABLE `etapa` (
  `id_etapa` int(11) NOT NULL,
  `num_etapa` int(11) NOT NULL,
  `dia_etapa` date NOT NULL,
  `inicio_etapa` time NOT NULL,
  `fim_etapa` time NOT NULL,
  `id_prova` int(11) NOT NULL
);

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

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo_noticia`, `desc_noticia`, `thumb_noticia`, `cat_noticia`, `data_noticia`) VALUES
(1, 'teste', '', '6474a1c9ad59a_equip_back.jpg', 'f1', '2023-05-29 12:59:53'),
(2, 'carros', '', '6474a24d21662_carros_back.jpg', 'wrc', '2023-05-29 13:02:05'),
(3, 'jkahskd', '', '6474a5304a6df_5_iii.png', 'wrc', '2023-05-29 13:14:24'),
(4, 'jkahskdasd', '', '6474a5836bd00_5_iii.png', 'wrc', '2023-05-29 13:15:47'),
(5, 'jkahskd', '', '6474a7307dfd7_5_iii.png', 'wrc', '2023-05-29 13:22:56'),
(6, 'asdasd', 'dsadasd', '6474a7410c308_carros_back.jpg', 'wrc', '2023-05-29 13:23:13'),
(7, 'asdasd', 'dsadasd', '6474a7f74ea0b_carros_back.jpg', 'wrc', '2023-05-29 13:26:15'),
(8, 'asdasd', 'dsadasd', '6474c4835f06b_carros_back.jpg', 'wrc', '2023-05-29 15:28:03'),
(9, 'asdasd', 'dsadasd', '6474c49394522_carros_back.jpg', 'wrc', '2023-05-29 15:28:19'),
(10, 'asdasd', 'dsadasd', '6474c4afe0538_carros_back.jpg', 'wrc', '2023-05-29 15:28:47'),
(11, 'asdasd', 'dsadasd', '6474c4bd8aed2_carros_back.jpg', 'wrc', '2023-05-29 15:29:01'),
(12, 'asdasd', 'dsadasd', '6474c530bb9df_carros_back.jpg', 'wrc', '2023-05-29 15:30:56'),
(13, 'asdasd', 'dsadasd', '6474c5fa82934_carros_back.jpg', 'wrc', '2023-05-29 15:34:18'),
(14, 'asdasd', 'dsadasd', '6474c631c2abf_carros_back.jpg', 'wrc', '2023-05-29 15:35:13'),
(15, 'asdasd', 'dsadasd', '6474c63a2bdc6_carros_back.jpg', 'wrc', '2023-05-29 15:35:22'),
(16, 'asdasd', 'dsadasd', '6474c6c632584_carros_back.jpg', 'wrc', '2023-05-29 15:37:42'),
(17, 'asdasd', 'dsadasd', '6474c6d55b7e5_carros_back.jpg', 'wrc', '2023-05-29 15:37:57'),
(18, 'asdasd', 'dsadasd', '6475b0770e63a_carros_back.jpg', 'wrc', '2023-05-30 08:14:47');

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
-- Estrutura da tabela `prova`
--

CREATE TABLE `prova` (
  `id_prova` int(11) NOT NULL,
  `nome_prova` varchar(255) NOT NULL,
  `inicio_prova` date NOT NULL,
  `fim_prova` date NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `categoria` enum('f1','wrc','wec') NOT NULL,
  `id_circuito` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `id_resultado` int(11) NOT NULL,
  `id_etapa` int(11) DEFAULT NULL,
  `id_sessao` int(11) DEFAULT NULL,
  `id_piloto` int(11) NOT NULL,
  `posicao_res` int(11) NOT NULL,
  `laptime_res` time NOT NULL,
  `dnf` enum('sim','nao') NOT NULL,
  `categoria` enum('f1','wrc','wec') NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `id_sessao` int(11) NOT NULL,
  `tipo_sessao` enum('P1','P2','P3','Q','R','W') NOT NULL,
  `dia_sessao` date NOT NULL,
  `inicio_sessao` time NOT NULL,
  `fim_sessao` time NOT NULL,
  `id_prova` int(11) NOT NULL,
  `categoria` enum('f1','wrc','wec') NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_user` int(11) DEFAULT NULL,
  `cargo_user` enum('admin','press') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_user`, `nome_user`, `email_user`, `password_user`, `telefone_user`, `cargo_user`) VALUES
(1, 'teste', 'teste@gmail.com', '1326134cb3db0705e4442013d79f7512121d74ee793ff177261fe52b581b6e9f77910c97ad7b981100b2287d7f3ea0a0775f1f61322a1448d72aef5ac9830654', 911, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `etapa`
--
ALTER TABLE `etapa`
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
-- Indexes for table `prova`
--
ALTER TABLE `prova`
  ADD PRIMARY KEY (`id_prova`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id_resultado`);

--
-- Indexes for table `sessao`
--
ALTER TABLE `sessao`
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
-- AUTO_INCREMENT for table `carro`
--
ALTER TABLE `carro`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `etapa`
--
ALTER TABLE `etapa`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
-- AUTO_INCREMENT for table `prova`
--
ALTER TABLE `prova`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessao`
--
ALTER TABLE `sessao`
  MODIFY `id_sessao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
