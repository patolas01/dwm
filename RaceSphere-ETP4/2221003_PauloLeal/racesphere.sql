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

INSERT INTO `administrador` (`id_admin`, `nome_admin`, `cargo_admin`, `email_admin`, `password_admin`) VALUES
(1, 'Sofia', 'press', 'sofia@gmail.com', 'aqjst'),
(2, 'Tiago', 'admin', 'tiago@gmail.com', 'zklcp'),
(3, 'Martim', 'press', 'martim@gmail.com', 'xlvhd'),
(4, 'Beatriz', 'admin', 'beatriz@gmail.com', 'fuyrn'),
(5, 'Afonso', 'press', 'afonso@gmail.com', 'idpwx'),
(6, 'Matilde', 'admin', 'matilde@gmail.com', 'qnszc'),
(7, 'Vasco', 'press', 'vasco@gmail.com', 'oebkt'),
(8, 'Inês', 'admin', 'ines@gmail.com', 'mrjla'),
(9, 'Rodrigo', 'press', 'rodrigo@gmail.com', 'pyhtx'),
(10, 'Carolina', 'admin', 'carolina@gmail.com', 'gnqsz');

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

INSERT INTO `carro` (`id_carro`, `marca_carro`, `modelo_carro`, `ano_carro`, `trac_carro`, `caixa_carro`, `comb_carro`, `cilind_carro`, `hp_carro`, `desc_carro`) VALUES
(11, 'Volkswagen', 'Gol', 2010, 'FWD', 'Manual', 'Gasolina', 1, 76, 'Carro popular com bom desempenho e baixo consumo de combustível'),
(12, 'Chevrolet', 'Onix', 2019, 'FWD', 'Automático', 'Gasolina', 1, 116, 'Carro econômico e espaçoso, com bom desempenho em cidade e estrada'),
(13, 'Fiat', 'Uno', 2005, 'FWD', 'Manual', 'Gasolina', 1, 68, 'Carro compacto e econômico, ideal para uso urbano'),
(14, 'Renault', 'Kwid', 2020, 'FWD', 'Manual', 'Gasolina', 1, 70, 'Carro compacto e econômico, com bom espaço interno e baixo consumo de combustível'),
(15, 'Ford', 'EcoSport', 2015, '4WD', 'Automático', 'Gasolina', 2, 141, 'SUV compacto com ótimo desempenho e conforto'),
(16, 'Toyota', 'Corolla', 2021, 'FWD', 'Automático', 'Gasolina', 2, 177, 'Sedã médio com design moderno e alto nível de tecnologia'),
(17, 'Volkswagen', 'T-Cross', 2021, 'FWD', 'Automático', 'Gasolina', 1.4, 200, 'SUV compacto com ótimo desempenho e conforto'),
(18, 'Hyundai', 'HB20', 2020, 'FWD', 'Automático', 'Gasolina', 1, 128, 'Carro compacto com bom desempenho e baixo consumo de combustível'),
(19, 'Honda', 'Civic', 2018, 'FWD', 'Automático', 'Gasolina', 2, 150, 'Sedã médio com ótimo desempenho e tecnologia de ponta'),
(20, 'Jeep', 'Renegade', 2022, '4WD', 'Automático', 'Gasolina', 1.3, 185, 'SUV compacto com excelente desempenho off-road e alto nível de conforto');

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

INSERT INTO `circuito` (`id_circuito`, `nome_circuito`, `cidade_circuito`, `nac_circuito`, `layout_circuito`) VALUES
(1, 'Circuit de Barcelona-Catalunya', 'Barcelona', 'Espanha', 0x3031313130),
(2, 'Circuit de Spa-Francorchamps', 'Stavelot', 'Bélgica', 0x3130313031),
(3, 'Silverstone Circuit', 'Silverstone', 'Reino Unido', 0x3131303131),
(4, 'Circuit de Monaco', 'Monte Carlo', 'Mônaco', 0x3131313030),
(5, 'Circuit de Suzuka', 'Suzuka', 'Japão', 0x3031313130),
(6, 'Circuit of the Americas', 'Austin', 'Estados Unidos', 0x3130313031),
(7, 'Autódromo José Carlos Pace', 'São Paulo', 'Brasil', 0x3131313030),
(8, 'Red Bull Ring', 'Spielberg', 'Áustria', 0x3131303131),
(9, 'Circuit de Shanghai', 'Xangai', 'China', 0x3031313130),
(10, 'Bahrain International Circuit', 'Manama', 'Bahrein', 0x3130313031);

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

INSERT INTO `equipa` (`id_equipa`, `nome_equipa`, `logo_equipa`, `nac_equipa`, `cat_equipa`, `subcat_equipa`) VALUES
(1, 'Mercedes-AMG Petronas Formula One Team', NULL, 'Reino Unido', 'f1', NULL),
(2, 'Scuderia Ferrari Mission Winnow', NULL, 'Itália', 'f1', NULL),
(3, 'Red Bull Racing Honda', NULL, 'Reino Unido', 'f1', NULL),
(4, 'McLaren F1 Team', NULL, 'Reino Unido', 'f1', NULL),
(5, 'Alpine F1 Team', NULL, 'França', 'f1', NULL),
(6, 'Aston Martin Cognizant Formula One Team', NULL, 'Reino Unido', 'f1', NULL),
(7, 'Scuderia AlphaTauri Honda', NULL, 'Itália', 'f1', NULL),
(8, 'Alfa Romeo Racing ORLEN', NULL, 'Suíça', 'f1', NULL),
(9, 'Williams Racing', NULL, 'Reino Unido', 'f1', NULL),
(10, 'Haas F1 Team', NULL, 'Estados Unidos', 'f1', NULL),
(11, 'Toyota Gazoo Racing', NULL, 'Japão', 'wec', 'HYPERCAR'),
(12, 'Glickenhaus Racing', NULL, 'Estados Unidos', 'wec', 'HYPERCAR'),
(13, 'Alpine Elf Matmut', NULL, 'França', 'wec', 'LMP2'),
(14, 'United Autosports', NULL, 'Reino Unido', 'wec', 'LMP2'),
(15, 'JOTA', NULL, 'Reino Unido', 'wec', 'LMP2'),
(16, 'G-Drive Racing', NULL, 'Rússia', 'wec', 'LMP2'),
(17, 'AF Corse', NULL, 'Itália', 'wec', 'LMGTE'),
(18, 'Porsche GT Team', NULL, 'Alemanha', 'wec', 'LMGTE'),
(19, 'WeatherTech Racing', NULL, 'Estados Unidos', 'wec', 'LMGTE'),
(20, 'Team WRT', NULL, 'Bélgica', 'wec', 'LMGTE');

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

INSERT INTO `equipamento` (`id_equipamento`, `nome_equipamento`, `img_equipamento`, `desc_equipamento`) VALUES
(1, 'Capacete Moderno', NULL, '<p>Capacete de alta performance com acabamento em fibra de carbono e sistema de ventilação.</p>'),
(2, 'Luvas', NULL, '<p>Luvas de alta qualidade para competição automóvel com tecnologia antichama.</p>'),
(3, 'Fato', NULL, '<p>Fato de competição automóvel de 3 camadas com proteção antichama e sistema de refrigeração.</p>'),
(4, 'Botas', NULL, '<p>Botas de competição automóvel com tecnologia antichama e sola de alta aderência.</p>'),
(5, 'Capacete Kevlar', NULL, '<p>Capacete de alta performance com acabamento em kevlar e sistema de ventilação.</p>');

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

INSERT INTO `etapa_wrc` (`id_prova`, `num_etapa`, `id_etapa`, `inicio_sessao`, `fim_sessao`, `dia_etapa`) VALUES
(1, 1, 1001, '09:00:00', '11:00:00', '2023-06-01'),
(1, 2, 1002, '13:00:00', '15:00:00', '2023-06-01'),
(1, 3, 1003, '09:00:00', '11:00:00', '2023-06-02'),
(1, 4, 1004, '13:00:00', '15:00:00', '2023-06-02'),
(1, 5, 1005, '09:00:00', '11:00:00', '2023-06-03'),
(1, 6, 1006, '13:00:00', '15:00:00', '2023-06-03'),
(1, 7, 1007, '09:00:00', '11:00:00', '2023-06-04'),
(1, 8, 1008, '13:00:00', '15:00:00', '2023-06-04'),
(1, 9, 1009, '09:00:00', '11:00:00', '2023-06-05'),
(1, 10, 1010, '13:00:00', '15:00:00', '2023-06-05');

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

INSERT INTO `noticias` (`id_noticia`, `titulo_noticia`, `desc_noticia`, `thumb_noticia`, `cat_noticia`, `data_noticia`) VALUES
(1, 'Lewis Hamilton conquista seu sétimo título mundial de F1', 'No Grande Prêmio da Turquia, Lewis Hamilton vence e garante seu sétimo título mundial de Fórmula 1', NULL, 'f1', '2023-05-10 21:44:07'),
(2, 'Toyota vence as 24 Horas de Le Mans 2021', 'A equipe Toyota Gazoo Racing conquista sua quarta vitória consecutiva nas 24 Horas de Le Mans, a mais importante corrida de resistência do mundo.', NULL, 'wec', '2023-05-10 21:44:07'),
(3, 'Elfyn Evans vence o Rally da Suécia 2021', 'O piloto britânico da Toyota vence a segunda etapa do WRC 2021, o Rally da Suécia.', NULL, 'wrc', '2023-05-10 21:44:07'),
(4, 'Mercedes apresenta seu carro para a temporada 2022 de F1', 'A equipe Mercedes-AMG Petronas apresenta seu novo carro para a temporada 2022 da Fórmula 1, com mudanças significativas em relação ao modelo anterior.', NULL, 'f1', '2023-05-10 21:44:07'),
(5, 'Toyota apresenta seu Hypercar para a temporada 2021 do WEC', 'A equipe Toyota Gazoo Racing apresenta seu novo Hypercar GR010 Hybrid para a temporada 2021 do Campeonato Mundial de Endurance da FIA (WEC).', NULL, 'wec', '2023-05-10 21:44:07'),
(6, 'Sébastien Ogier conquista seu oitavo título mundial de WRC', 'O piloto francês da Toyota vence o Rally do Japão e garante seu oitavo título mundial de Rally', NULL, 'wrc', '2023-05-10 21:44:07'),
(7, 'Porsche anuncia seu retorno à categoria LMDh do WEC', 'A montadora alemã Porsche confirma seu retorno à categoria LMDh do Campeonato Mundial de Endurance da FIA (WEC) a partir de 2023.', NULL, 'wec', '2023-05-10 21:44:07'),
(8, 'Mercedes anuncia que deixará a Fórmula E após a temporada 2022', 'A equipe Mercedes-AMG Petronas anuncia que deixará a Fórmula E após a temporada 2022 para se concentrar em outras categorias do automobilismo.', NULL, 'wec', '2023-05-10 21:44:07'),
(9, 'FIA confirma que novas equipes poderão entrar na F1 a partir de 2022', 'A Federação Internacional de Automobilismo (FIA) confirma que novas equipes poderão entrar na Fórmula 1 a partir da temporada 2022.', NULL, 'f1', '2023-05-10 21:44:07'),
(10, 'Aston Martin apresenta seu novo carro para a temporada 2021 de F1', 'A equipe Aston Martin apresenta seu novo carro para a temporada 2021 da Fórmula 1, com a volta do tetracampeão mundial Sebastian Vettel.', NULL, 'f1', '2023-05-10 21:44:07');

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

INSERT INTO `piloto` (`id_piloto`, `nome_piloto`, `numero_piloto`, `nac_piloto`, `cat_piloto`, `id_equipa`, `foto_piloto`) VALUES
(1, 'Lewis Hamilton', 44, 'Reino Unido', 'f1', 1, NULL),
(2, 'Max Verstappen', 33, 'Países Baixos', 'f1', 2, NULL),
(3, 'Valtteri Bottas', 77, 'Finlândia', 'f1', 1, NULL),
(4, 'Sébastien Ogier', 1, 'França', 'wrc', 3, NULL),
(5, 'Thierry Neuville', 11, 'Bélgica', 'wrc', 4, NULL),
(6, 'Sébastien Loeb', 9, 'França', 'wrc', 5, NULL),
(7, 'Mike Conway', 7, 'Reino Unido', 'wec', 6, NULL),
(8, 'Kamui Kobayashi', 7, 'Japão', 'wec', 7, NULL),
(9, 'Gianmaria Bruni', 91, 'Itália', 'wec', 8, NULL),
(10, 'Nick Tandy', 9, 'Reino Unido', 'wec', 9, NULL);

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

INSERT INTO `prova_f1` (`id_prova`, `gp_prova`, `id_circuito`, `inicio_prova`, `fim_prova`) VALUES
(1, 'Monaco Grand Prix 2023', 1, '2023-05-25', '2023-05-28'),
(2, 'Canadian Grand Prix 2023', 2, '2023-06-09', '2023-06-11'),
(3, 'British Grand Prix 2023', 3, '2023-07-14', '2023-07-16'),
(4, 'United States Grand Prix 2023', 4, '2023-10-20', '2023-10-22'),
(5, 'Abu Dhabi Grand Prix 2023', 5, '2023-11-24', '2023-11-26');

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

INSERT INTO `prova_wec` (`id_prova`, `nome_prova`, `id_circuito`, `inicio_prova`, `fim_prova`) VALUES
(1, '24 Horas de Le Mans', 1, '2023-06-17', '2023-06-18'),
(2, '8 Horas de Portimão', 2, '2023-09-01', '2023-09-02'),
(3, '6 Horas de Fuji', 3, '2023-10-14', '2023-10-15'),
(4, 'Bapco 8 Horas do Bahrain', 4, '2023-11-17', '2023-11-18'),
(5, '1000 Milhas de Sebring', 5, '2024-03-15', '2024-03-16');

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

INSERT INTO `prova_wrc` (`id_prova`, `nome_prova`, `local_prova`, `inicio_prova`, `fim_prova`, `img_prova`) VALUES
(1, 'Rally de Portugal', 'Porto, Portugal', '2023-06-01', '2023-06-04', NULL),
(2, 'Rally de Finlândia', 'Jyväskylä, Finlândia', '2023-08-03', '2023-08-06', NULL),
(3, 'Rally da Austrália', 'Coffs Harbour, Austrália', '2023-11-09', '2023-11-12', NULL),
(4, 'Rally de Monte Carlo', 'Monte Carlo, Mônaco', '2024-01-25', '2024-01-28', NULL),
(5, 'Rally da Argentina', 'Villa Carlos Paz, Argentina', '2024-04-25', '2024-04-28', NULL);

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

INSERT INTO `resultado_f1` (`id_sessao`, `id_piloto`, `posicao_res`, `laptime_res`, `dnf`) VALUES
(1, 1, 1, '01:00:00', 0),
(1, 2, 2, '01:00:00', 0),
(1, 3, 3, '01:00:00', 0),
(1, 4, 4, '01:00:00', 0),
(1, 5, 5, '01:00:00', 0),
(1, 6, 6, '01:00:00', 0),
(1, 7, 7, '01:00:00', 0),
(1, 8, 8, '01:00:00', 0),
(1, 9, 9, '01:00:00', 0),
(1, 10, 10, '01:00:00', 0);

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

INSERT INTO `resultado_wec` (`id_sessao`, `id_equipa`, `posicao_res`, `laptime_res`, `dnf`) VALUES
(1, 1, 1, '00:01:00', 0),
(1, 2, 2, '00:01:00', 0),
(1, 3, 3, '00:01:00', 0),
(1, 4, 4, '00:01:00', 0),
(1, 5, 5, '00:01:00', 0),
(2, 1, 2, '00:01:00', 0),
(2, 2, 3, '00:01:00', 0),
(2, 3, 1, '00:01:00', 0),
(2, 4, 5, '00:01:00', 0),
(2, 5, 4, '00:01:00', 0);

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

INSERT INTO `resultado_wrc` (`id_etapa`, `id_piloto`, `posicao_res`, `laptime_res`, `dnf`) VALUES
(1, 1, 1, '01:00:00', 0),
(1, 2, 2, '01:00:00', 0),
(1, 3, 3, '01:00:00', 0),
(1, 4, 4, '01:00:00', 0),
(1, 5, 5, '01:00:00', 0),
(1, 6, 6, '01:00:00', 0),
(1, 7, 7, '01:00:00', 0),
(1, 8, 8, '01:00:00', 0),
(1, 9, 9, '01:00:00', 0),
(1, 10, 10, '01:00:00', 0);

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

INSERT INTO `sessao_f1` (`id_sessao`, `tipo_prova`, `id_prova`, `dia_sessao`, `inicio_sessao`, `fim_sessao`) VALUES
(1, 'P', 1, '2023-07-20', '14:00:00', '16:00:00'),
(2, 'Q', 1, '2023-07-22', '13:00:00', '14:00:00'),
(3, 'R', 1, '2023-07-23', '15:10:00', '17:10:00'),
(4, 'SS', 2, '2023-08-07', '13:30:00', '14:00:00'),
(5, 'SP', 2, '2023-08-08', '16:00:00', '18:00:00');

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

INSERT INTO `sessao_wec` (`id_sessao`, `tipo_prova`, `dia_sessao`, `inicio_sessao`, `fim_sessao`, `duracao_corrida`, `id_prova`) VALUES
(1, 'P', '2023-06-16', '15:00:00', '16:00:00', '01:00:00', 1),
(2, 'Q', '2023-06-17', '10:00:00', '11:00:00', '01:00:00', 1),
(3, 'W', '2023-06-18', '13:00:00', '19:00:00', '06:00:00', 1),
(4, 'R', '2023-06-18', '20:00:00', '23:00:00', '03:00:00', 1),
(5, 'P', '2023-07-14', '15:00:00', '16:00:00', '01:00:00', 2);

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

INSERT INTO `utilizador` (`id_user`, `nome_user`, `email_user`, `password_user`, `telefone_user`) VALUES
(1, 'Mariana Silva', 'mariana.silva@gmail.com', 'bcfet', 912345678),
(2, 'Rui Santos', 'rui.santos@hotmail.com', 'xylad', 931234567),
(3, 'Sofia Oliveira', 'sofia.oliveira@yahoo.com', 'rmtgj', 917654321),
(4, 'Pedro Costa', 'pedro.costa@gmail.com', 'hbnvf', 961234567),
(5, 'Ana Carvalho', 'ana.carvalho@gmail.com', 'skzlt', 925678901),
(6, 'Hugo Martins', 'hugo.martins@hotmail.com', 'dqjwp', 931111222),
(7, 'Inês Ferreira', 'ines.ferreira@yahoo.com', 'xpyhe', 939876543),
(8, 'Francisco Santos', 'francisco.santos@gmail.com', 'lwqnm', 913333444),
(9, 'Marta Costa', 'marta.costa@hotmail.com', 'ezfak', 925432109),
(10, 'João Oliveira', 'joao.oliveira@yahoo.com', 'gjmxn', 967654321);

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
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `carro`
--
ALTER TABLE `carro`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `circuito`
--
ALTER TABLE `circuito`
  MODIFY `id_circuito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `equipa`
--
ALTER TABLE `equipa`
  MODIFY `id_equipa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `etapa_wrc`
--
ALTER TABLE `etapa_wrc`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `noticias_imagem`
--
ALTER TABLE `noticias_imagem`
  MODIFY `id_nimg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piloto`
--
ALTER TABLE `piloto`
  MODIFY `id_piloto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `prova_f1`
--
ALTER TABLE `prova_f1`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prova_wec`
--
ALTER TABLE `prova_wec`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prova_wrc`
--
ALTER TABLE `prova_wrc`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sessao_f1`
--
ALTER TABLE `sessao_f1`
  MODIFY `id_sessao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sessao_wec`
--
ALTER TABLE `sessao_wec`
  MODIFY `id_sessao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*SELECTS*/
SELECT * FROM utilizador;

SELECT nome_user, email_user FROM utilizador WHERE id_user = 1;

SELECT nome_admin, email_admin FROM administrador WHERE id_admin = 2;

SELECT * FROM carro;

SELECT modelo_carro, cilind_carro, hp_carro FROM carro WHERE marca_carro = 'Ferrari';

SELECT nome_circuito, cidade_circuito FROM circuito WHERE nac_circuito = 'Portugal';

SELECT * FROM equipa;

SELECT nome_equipa, cat_equipa, subcat_equipa FROM equipa WHERE nac_equipa = 'Espanha';

SELECT nome_equipamento, desc_equipamento FROM equipamento WHERE id_equipamento = 3;

SELECT num_etapa, inicio_sessao, fim_sessao FROM etapa_wrc WHERE id_prova = 5 AND num_etapa = 3;
