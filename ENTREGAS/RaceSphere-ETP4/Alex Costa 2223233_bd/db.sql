CREATE DATABASE RaceSphere;

CREATE TABLE Utilizador (
    IDuser int auto_increment primary key,
    nome varchar(70) not null,
    email varchar(50) not null,
    palavrapasse varchar(50) not null,
    contacto varchar(9) not null,
    nacionalidade varchar(50)
)engine = InnoDB;

CREATE TABLE Administrador (
    IDadmin int auto_increment primary key,
    nome varchar(70) not null,
    email varchar(50) not null,
    palavrapasse varchar(50) not null,
    contacto varchar(9) not null
)engine = InnoDB;

CREATE TABLE equipamento(
	IDequipamento int auto_increment primary key,
    descricao varchar(250),
    foto blob
)engine = InnoDB;

CREATE TABLE carro(
	IDcarro int auto_increment primary key,
    descricao varchar(250),
	foto blob
)engine = InnoDB;

CREATE TABLE categoria(
	IDcategoria int auto_increment primary key,
    nome enum("WEC","WRC","F1") not null,
	descricao varchar(100)
)engine = InnoDB;

CREATE TABLE circuito(
	IDcircuito int auto_increment primary key,
    nome varchar(50) not null,
	voltas INT not null,
    Km varchar(5)
)engine = InnoDB;

CREATE TABLE equipa(
	IDequipa int auto_increment primary key,
    nome varchar(50) not null,
	logo blob,
    TotalPontos INT not null
)engine = InnoDB;

CREATE TABLE piloto(
	IDpiloto int auto_increment primary key,
    nome varchar(50) not null,
	idade INT not null,
    foto blob,
    foreign key (IDpiloto) references equipa(IDequipa)
)engine = InnoDB;

CREATE TABLE evento(
	IDevento int auto_increment primary key,
    titulo varchar(50) not null,
    dataInicio date not null,
    dataFim date not null
)engine = InnoDB;

CREATE TABLE noticia(
	IDnoticia int auto_increment primary key,
    dataPubli date not null,
	tema varchar(50) not null
)engine = InnoDB;

CREATE TABLE resultado(
	IDresultado int auto_increment primary key,
    resultado varchar(50) not null
)engine = InnoDB;

CREATE TABLE calendario(
	IDcalendario int auto_increment primary key,
    dataEventos date not null
)engine = InnoDB;

INSERT INTO `racesphere`.`administrador` (`IDadmin`, `nome`, `email`, `palavrapasse`, `contacto`) VALUES ('1', 'João Pedro', 'joao@gmail.com', 'joaopedro1', '913415671');
INSERT INTO `racesphere`.`administrador` (`IDadmin`, `nome`, `email`, `palavrapasse`, `contacto`) VALUES ('2', 'Samuel Costa', 'samuel@gmail.com', 'samuelcosta1', '931127876');
INSERT INTO `racesphere`.`administrador` (`IDadmin`, `nome`, `email`, `palavrapasse`, `contacto`) VALUES ('3', 'Miguel Trindade', 'miguel@gmail.com', 'migueltrind1', '934117251');
INSERT INTO `racesphere`.`administrador` (`IDadmin`, `nome`, `email`, `palavrapasse`, `contacto`) VALUES ('4', 'Francisco Ferreira', 'francisco@gmail.com', 'franciscoF1', '962151743');
INSERT INTO `racesphere`.`administrador` (`IDadmin`, `nome`, `email`, `palavrapasse`, `contacto`) VALUES ('5', 'Ricardo Gomes', 'ricardo@gmail.com', 'RicardoG1', '969781655');


INSERT INTO `racesphere`.`utilizador` (`IDuser`, `nome`, `email`, `palavrapasse`, `contacto`, `nacionalidade`) VALUES ('1', 'Joaquim', 'joaquim@gmail.com', 'Joaquim1', '911423762', 'Portuguesa');
INSERT INTO `racesphere`.`utilizador` (`IDuser`, `nome`, `email`, `palavrapasse`, `contacto`, `nacionalidade`) VALUES ('2', 'Manuel', 'manuel@gmail.com', 'Manuel1', '965451232', 'Portuguesa');
INSERT INTO `racesphere`.`utilizador` (`IDuser`, `nome`, `email`, `palavrapasse`, `contacto`, `nacionalidade`) VALUES ('3', 'Maria', 'maria@gmail.com', 'Maria1', '914321561', 'Brasileira');
INSERT INTO `racesphere`.`utilizador` (`IDuser`, `nome`, `email`, `palavrapasse`, `contacto`, `nacionalidade`) VALUES ('4', 'Roberto', 'roberto@gmail.com', 'Roberto1', '969137141', 'Espanhol');
INSERT INTO `racesphere`.`utilizador` (`IDuser`, `nome`, `email`, `palavrapasse`, `contacto`, `nacionalidade`) VALUES ('5', 'Constança', 'constanca@gmail.com', 'Constança1', '912516231', 'Italiana');


INSERT INTO `racesphere`.`equipamento` (`IDequipamento`, `descricao`) VALUES ('1', 'Capacete');
INSERT INTO `racesphere`.`equipamento` (`IDequipamento`, `descricao`) VALUES ('2', 'Visor');
INSERT INTO `racesphere`.`equipamento` (`IDequipamento`, `descricao`) VALUES ('3', 'Luvas');
INSERT INTO `racesphere`.`equipamento` (`IDequipamento`, `descricao`) VALUES ('4', 'Roupa');
INSERT INTO `racesphere`.`equipamento` (`IDequipamento`, `descricao`) VALUES ('5', 'Calçado');


INSERT INTO `racesphere`.`carro` (`IDcarro`, `descricao`) VALUES ('1', 'Ferrari F2002');
INSERT INTO `racesphere`.`carro` (`IDcarro`, `descricao`) VALUES ('2', 'Mercedes-Benz W196');
INSERT INTO `racesphere`.`carro` (`IDcarro`, `descricao`) VALUES ('3', 'Vanwall Vandervell 680');
INSERT INTO `racesphere`.`carro` (`IDcarro`, `descricao`) VALUES ('4', 'Subaru Impreza');
INSERT INTO `racesphere`.`carro` (`IDcarro`, `descricao`) VALUES ('5', 'Audi Quattro S1');

-------------------------------------------------------------------------

INSERT INTO `racesphere`.`categoria` (`IDcategoria`, `nome`) VALUES ('1', 'F1');
INSERT INTO `racesphere`.`categoria` (`IDcategoria`, `nome`) VALUES ('2', 'WRC');
INSERT INTO `racesphere`.`categoria` (`IDcategoria`, `nome`) VALUES ('3', 'WEC');
INSERT INTO `racesphere`.`categoria` (`IDcategoria`, `nome`) VALUES ('4', 'F1');
INSERT INTO `racesphere`.`categoria` (`IDcategoria`, `nome`) VALUES ('5', 'WEC');


INSERT INTO `racesphere`.`calendario` (`IDcalendario`, `dataEventos`) VALUES ('1', '26/06/2023');
INSERT INTO `racesphere`.`calendario` (`IDcalendario`, `dataEventos`) VALUES ('2', '12/08/2023');
INSERT INTO `racesphere`.`calendario` (`IDcalendario`, `dataEventos`) VALUES ('3', '21/11/2023');
INSERT INTO `racesphere`.`calendario` (`IDcalendario`, `dataEventos`) VALUES ('4', '14/12/2023');
INSERT INTO `racesphere`.`calendario` (`IDcalendario`, `dataEventos`) VALUES ('5', '15/01/2024');


INSERT INTO `racesphere`.`circuito` (`IDcircuito`, `nome`, `voltas`, `Km`) VALUES ('1', 'Monaco', '78', '260');
INSERT INTO `racesphere`.`circuito` (`IDcircuito`, `nome`, `voltas`, `Km`) VALUES ('2', 'Desconhecido', '10', '200');
INSERT INTO `racesphere`.`circuito` (`IDcircuito`, `nome`, `voltas`, `Km`) VALUES ('3', 'Americas', '170', '1050');
INSERT INTO `racesphere`.`circuito` (`IDcircuito`, `nome`, `voltas`, `Km`) VALUES ('4', 'Americas ', '56', '308');
INSERT INTO `racesphere`.`circuito` (`IDcircuito`, `nome`, `voltas`, `Km`) VALUES ('5', 'Spa-Francorchamps', '150', '1000');


INSERT INTO `racesphere`.`equipa` (`IDequipa`, `nome`) VALUES ('1', 'Toyota Gazoo Racing');
INSERT INTO `racesphere`.`equipa` (`IDequipa`, `nome`) VALUES ('2', 'Porsche Team');
INSERT INTO `racesphere`.`equipa` (`IDequipa`, `nome`) VALUES ('3', 'Mercedes-AMG');
INSERT INTO `racesphere`.`equipa` (`IDequipa`, `nome`) VALUES ('4', 'Hyundai Shell Mobis World');
INSERT INTO `racesphere`.`equipa` (`IDequipa`, `nome`) VALUES ('5', 'Toyota Gazoo Racing');


INSERT INTO `racesphere`.`piloto` (`IDpiloto`, `nome`, `idade`) VALUES ('1', 'Lewis Hamilton', '36');
INSERT INTO `racesphere`.`piloto` (`IDpiloto`, `nome`, `idade`) VALUES ('2', 'Max Verstappen', '23');
INSERT INTO `racesphere`.`piloto` (`IDpiloto`, `nome`, `idade`) VALUES ('3', 'Charles Leclerc', '23');
INSERT INTO `racesphere`.`piloto` (`IDpiloto`, `nome`, `idade`) VALUES ('4', 'Sébastien Ogier', '37');
INSERT INTO `racesphere`.`piloto` (`IDpiloto`, `nome`, `idade`) VALUES ('5', 'Fernando Alonso', '40');


INSERT INTO `racesphere`.`noticia` (`IDnoticia`, `dataPubli`, `tema`) VALUES ('1', '05/01/2023', 'Vitória');
INSERT INTO `racesphere`.`noticia` (`IDnoticia`, `dataPubli`, `tema`) VALUES ('2', '01/02/2023', 'RedBull patrocina F1');
INSERT INTO `racesphere`.`noticia` (`IDnoticia`, `dataPubli`, `tema`) VALUES ('3', '26/02/2023', 'Derrota por parte da Ferrari');
INSERT INTO `racesphere`.`noticia` (`IDnoticia`, `dataPubli`, `tema`) VALUES ('4', '14/04/2023', 'Acidente');
INSERT INTO `racesphere`.`noticia` (`IDnoticia`, `dataPubli`, `tema`) VALUES ('5', '30/03/2023', 'Transferência de piloto');


INSERT INTO `racesphere`.`resultado` (`IDresultado`) VALUES ('1');
INSERT INTO `racesphere`.`resultado` (`IDresultado`) VALUES ('2');
INSERT INTO `racesphere`.`resultado` (`IDresultado`) VALUES ('3');
INSERT INTO `racesphere`.`resultado` (`IDresultado`) VALUES ('4');
INSERT INTO `racesphere`.`resultado` (`IDresultado`) VALUES ('5');


INSERT INTO `racesphere`.`evento` (`IDevento`, `titulo`, `dataInicio`, `dataFim`) VALUES ('1', 'Grande Prêmio de Mônaco', 'unknown', 'unknown');
INSERT INTO `racesphere`.`evento` (`IDevento`, `titulo`, `dataInicio`, `dataFim`) VALUES ('2', '24 Horas de Le Mans', 'unknown', 'unknown');
INSERT INTO `racesphere`.`evento` (`IDevento`, `titulo`, `dataInicio`, `dataFim`) VALUES ('3', 'Grande Prêmio da Grã-Bretanha', 'unknown', 'unknown');
INSERT INTO `racesphere`.`evento` (`IDevento`, `titulo`, `dataInicio`, `dataFim`) VALUES ('4', 'Rally da Finlândia', 'unknown', 'unknown');
INSERT INTO `racesphere`.`evento` (`IDevento`, `titulo`, `dataInicio`, `dataFim`) VALUES ('5', 'Rally da Argentina', 'unknown', 'unknown');

SELECT nome, contacto FROM Utilizador WHERE nacionalidade = 'Portuguesa';
SELECT nome, idade FROM Piloto WHERE idade > 30;
SELECT nome, foto FROM Carro WHERE descricao ;
SELECT * FROM categoria WHERE nome = "F1";