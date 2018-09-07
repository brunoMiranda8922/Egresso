-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: fatec
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ano`
--

/*DROP TABLE IF EXISTS `ano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano_formacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ano_formacao_UNIQUE` (`ano_formacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano`
--

LOCK TABLES `ano` WRITE;
/*!40000 ALTER TABLE `ano` DISABLE KEYS */;
INSERT INTO `ano` VALUES (1,'2015'),(2,'2016'),(3,'2017'),(4,'2018');
/*!40000 ALTER TABLE `ano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_curso`
--

DROP TABLE IF EXISTS `area_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_curso` (
  `area_curso_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`area_curso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_curso`
--

LOCK TABLES `area_curso` WRITE;
/*!40000 ALTER TABLE `area_curso` DISABLE KEYS */;
INSERT INTO `area_curso` VALUES (1,'Administrativa'),(2,'Comercio Exterior'),(3,'Informatica/TI'),(4,'Logistica'),(5,'Eventos'),(6,'Vendas');
/*!40000 ALTER TABLE `area_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'Barueri'),(5,'Carapicuiba'),(4,'Itapevi'),(3,'Jandira'),(2,'Osasco'),(6,'Outras Cidades');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT 'NOT NULL',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (23,'Calculo'),(24,'Calculo2'),(3,'Comercio Exterior'),(21,'Contabilidade'),(2,'Eventos'),(1,'Gestao em T.I'),(22,'Matematica'),(20,'PHP'),(25,'Quimica'),(4,'Transporte Terrestre');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egressos`
--

DROP TABLE IF EXISTS `egressos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egressos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RA` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `PR` decimal(10,0) NOT NULL,
  `cursos_id` int(11) NOT NULL,
  `ano_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `RA_UNIQUE` (`RA`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  KEY `fk_cadastro_formados_cursos_idx` (`cursos_id`),
  KEY `fk_cadastro_formados_ano_idx` (`ano_id`),
  KEY `fk_cadastro_formados_semestre_idx` (`semestre_id`),
  KEY `fk_egressos_cidade1_idx` (`cidade_id`),
  CONSTRAINT `fk_cadastro_formados_ano` FOREIGN KEY (`ano_id`) REFERENCES `ano` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadastro_formados_cursos` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadastro_formados_semestre` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_egressos_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1082 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egressos`
--

LOCK TABLES `egressos` WRITE;
/*!40000 ALTER TABLE `egressos` DISABLE KEYS */;
INSERT INTO `egressos` VALUES (386,892220180,'Bruno Silva','43581572890','brunosilva@gmail.com',8,1,1,2,1),(387,892220181,'Bruno Miranda','43581572891','brunomiranda@gmail.com',6,1,4,1,1),(388,892220182,'Charles Turckamn','43581572892','tuck@gmail.com',8,1,1,1,1),(389,892220183,'Bruno Lost','43581572893','brunol@gmail.com',10,1,2,1,2),(390,892220184,'Bruna Pietro','43581572894','brunaa@gmail.com',8,1,2,1,2),(391,892220185,'Daniel Miranda','43581572895','daniel123@gmail.com',6,1,3,1,2),(392,892220186,'Thiago Ribeiro','43581572896','thiago.amaral14@gmail.com',6,1,3,1,3),(393,892220187,'Maria lisa','43581572897','marialisa@outlook.com',6,1,3,1,3),(394,892220188,'Maria Alver','43581572898','mariaAlves@gmail.com',9,1,4,2,3),(395,892220189,'Igor Silva','43581572810','igor@gmail.com',8,2,4,2,5),(396,892220190,'Guilherme Miranda','43581572811','mirandag@gmail.com',7,2,4,2,5),(397,892220191,'Maria Miranda','43581572812','maMiranda@gmail.com',7,2,4,2,5),(399,892220193,'Guilherme Miranda','43581572814','gui@gmail.com',7,2,3,1,4),(400,892220194,'Lauro Cesar','43581572815','laru@gmail.com',7,2,3,2,4),(401,892220195,'Jacob Json','43581572816','json@gmail.com',6,2,3,2,4),(402,892220196,'Heloy Freitas','43581572817','heloy@gmail.com',6,2,2,2,4),(403,892220197,'Bruno Pietro','43581572818','brunoas@gmail.com',6,2,2,2,4),(404,892220198,'Guilherme Miranda','43581572819','guilhermeM@gmail.com',6,2,1,2,4),(405,892220199,'Bruno Chavier','43581572820','bruchave@gmail.com',7,2,1,1,4),(406,892220110,'Felipe Vicente','43581572821','fec@gmail.com',9,3,1,1,1),(407,892220111,'Joao Joaquim','43581572822','joaquim@gmail.com',9,3,1,1,2),(408,892220112,'Jose Augusto','43581572823','joseAlgus@gmail.com',8,3,2,1,2),(409,892220113,'Pietro Pierre','43581572824','ppere@gmail.com',8,3,2,1,2),(410,892220114,'Lisa Mendes','43581572825','lisa@outlook.com',7,3,4,1,1),(411,892220115,'Bruno Pietro','43581572826','bruns@gmail.com',7,3,4,1,1),(412,892220116,'Ricardo Cardoso','43581572827','ricardos123@gmail.com',7,3,3,1,1),(413,892220117,'Joao Felipe','43581572828','joao@gmail.com',7,3,3,2,1),(414,892220118,'Rubens Queiroz','43581572829','rubs@gmail.com',7,3,3,1,1),(415,892220119,'Augusto Pereira','43581572830','augu@gmail.com',7,3,3,2,2),(416,892220120,'Harden James','43581572831','james@gmail.com',7,4,2,2,5),(417,892220121,'Ronaldo Max','43581572832','ro@gmail.com',7,4,2,2,5),(418,892220122,'Gustavo Amorim','43581572833','august@gmail.com',7,4,2,2,4),(419,892220123,'Daniel Pinto','43581572834','danielP@outlook.com',7,4,2,2,3),(420,892220124,'Maria Alves','43581572835','maria123@gmai.com',7,4,2,2,3),(421,892220125,'Augusto Pereira','43581572836','jasss@gmail.com',7,4,3,2,3),(422,892220126,'Gustavo Sonda','43581572837','sonda@gmail.com',8,4,4,1,3),(423,892220127,'Maria Jose','43581572838','mariaJose@gmail.com',8,4,4,1,3),(424,892220128,'Vinicius queiroz','43581572839','queirozz@gmail.com',8,4,4,1,3),(425,892220129,'Hugo Chaves','43581572840','chaves@gmail.com',8,4,1,1,1),(426,892220130,'Diego Silva','43581572841','diego@gmail.com',9,1,1,1,1),(427,892220131,'Ulisses Santos','43581572842','ulissesvidaloka@gmail.com',8,2,1,1,1),(511,892220132,'Ulisses Santos','43581572843','ulisses1257@gmail.com',8,2,1,1,1),(525,202547866,'Felipe Rissato','435815795','fele@gmail.com',8,4,1,2,5),(528,202032232,'Jorge Salcedo','43581577523','jorgerSalcedo@gmail.com',8,3,4,2,1),(707,202030322,'Juliana Evely','43587521009','julianaEvely@gmail.com',9,4,1,2,1),(770,202555877,'Heloisa Elisa','43587777777','eloisa@gmai.com',10,1,4,2,1),(771,592220109,'Livia Silva','99581572890','livia99@gmail.com',8,1,1,2,1),(772,592220108,'Jessika Miranda','99581572891','jessika@gmail.com',6,1,4,1,1),(773,592220107,'July Turckamn','99581572892','july@gmail.com',8,1,1,1,1),(774,592220106,'Mariene Lost','99581572893','mari100l@gmail.com',10,1,2,1,2),(775,592220105,'Bruna Listeri','99581572894','brunas2@gmail.com',8,1,2,1,2),(776,592220104,'Daniel Yeshouedi','99581572895','danielYeshoued@gmail.com',6,1,3,1,2),(777,592220103,'Thiago Amaral','99581572896','tiago41@gmail.com',6,1,3,1,3),(778,592220102,'Morgana lisa','99581572897','elisa@outlook.com',6,1,3,1,3),(779,592220101,'Alda Martins','99581572898','alda@gmail.com',9,1,4,2,3),(780,592220100,'Monica Alver','99581572810','morgona@gmail.com',8,2,4,2,5),(781,592220130,'Kyte Miranda','99581572811','monica@gmail.com',7,2,4,2,5),(782,592220131,'Gabriel Silva','99581572812','msgabi@gmail.com',7,2,4,2,5),(783,592220132,'Kyte Miranda','99581572813','kyte@gmail.com',7,2,4,1,5),(784,592220133,'Json Miranda','99581572814','joson@gmail.com',7,2,3,1,4),(785,592220134,'Charlote Miranda','99581572815','charlotte@gmail.com',7,2,3,2,4),(786,592220135,'Bear Miranda','99581572816','bear@gmail.com',6,2,3,2,4),(787,592220136,'Scot Cesar','99581572817','scott@gmail.com',6,2,2,2,4),(788,592220137,'Lustosa Qson','99581572818','lustosa@gmail.com',6,2,2,2,4),(789,592220138,'Neymar Freitas','99581572819','neymarjr@gmail.com',6,2,1,2,4),(790,592220139,'Vinicius Queiroz','99581572820','queirozs@gmail.com',7,2,1,1,4),(814,592220530,'Yara Flores','99581572999','yara@gmail.com',8,1,1,1,1),(832,502587412,'Gustavo Amorim Pinto','43581577422','gustapinto@gmail.com',10,4,1,2,6),(853,205633333,'Bruno Pietro','58425170220','bruno1245782@gmail.com',8,3,1,2,6),(894,592222785,'Bruno Oeste','99581572215','brunoOeste@gmail.com',8,1,1,2,1),(897,592220630,'Mariene Maria','99581572974','marimari12@gmail.com',10,1,2,1,2),(939,592211111,'Bruno Oeste','99581572111','brun8574@gmail.com',8,1,1,2,1),(959,486321574,'Bianca Cintra Miranda','44746498857','biazinha100%gata@gmail.com',10,21,4,2,3),(1020,592228896,'Livia Silva','99581582111','livia01052154@gmail.com',8,1,1,2,1),(1041,252544111,'Mario Marcio','50281578562','mariochiodi@gmail.com',10,24,1,2,4);
/*!40000 ALTER TABLE `egressos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario_aluno`
--

DROP TABLE IF EXISTS `formulario_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formulario_aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trabalha` tinyint(1) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `formacao` enum('1','2','3','4','5') NOT NULL,
  `cronograma` enum('1','2','3','4','5') NOT NULL,
  `professores` enum('1','2','3','4','5') NOT NULL,
  `infraestrutura` enum('1','2','3','4','5') NOT NULL,
  `recomendaria` enum('1','2','3','4','5') NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `estagio` tinyint(1) NOT NULL,
  `semestre` enum('6','7','8','9','10') NOT NULL,
  `egressos_id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `area_trabalho` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_formulario_aluno_egressos1_idx` (`egressos_id`),
  CONSTRAINT `fk_formulario_aluno_egressos1` FOREIGN KEY (`egressos_id`) REFERENCES `egressos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario_aluno`
--

LOCK TABLES `formulario_aluno` WRITE;
/*!40000 ALTER TABLE `formulario_aluno` DISABLE KEYS */;
INSERT INTO `formulario_aluno` VALUES (35,0,'NULL','NULL','1','1','1','2','1','M',1,'6',421,'2018-06-15 16:23:36',NULL),(39,1,'Catho','CEO','1','2','3','4','2','M',1,'8',389,'2018-06-15 16:50:34',2),(40,1,'Vagas.com','Desenvolvedor ','5','5','5','4','2','M',1,'7',402,'2018-06-15 17:06:38',3),(41,0,'NULL','NULL','3','3','2','1','1','M',0,'6',417,'2018-06-15 17:07:54',NULL),(42,0,'NULL','NULL','5','5','5','5','3','M',1,'6',386,'2018-06-16 02:38:06',NULL),(43,0,'NULL','NULL','5','5','5','5','3','F',0,'10',387,'2018-06-16 16:23:30',NULL),(46,1,'Apple','Jovem Aprendiz','5','5','5','5','3','F',0,'10',393,'2018-06-16 23:15:02',3),(54,0,'NULL','NULL','5','5','5','5','3','M',1,'6',418,'2018-06-17 23:48:21',NULL),(55,1,'UNIP','Professor','1','3','4','2','2','M',1,'6',407,'2018-06-18 00:06:36',5),(56,0,'NULL','NULL','1','3','3','2','2','M',0,'6',406,'2018-06-18 00:08:47',NULL),(57,0,'NULL','NULL','1','2','2','4','2','M',1,'8',400,'2018-06-18 00:10:20',NULL),(58,0,'NULL','NULL','1','1','1','2','3','M',1,'6',419,'2018-06-18 00:12:23',NULL),(59,0,'NULL','NULL','5','5','5','5','3','M',1,'10',424,'2018-06-18 09:01:39',NULL),(60,0,'NULL','NULL','5','5','5','5','3','M',1,'10',421,'2018-06-18 19:23:30',NULL),(61,0,'NULL','NULL','5','5','4','5','3','M',0,'10',396,'2018-06-19 15:55:08',NULL),(62,0,'NULL','NULL','5','5','5','5','3','M',1,'10',387,'2018-06-20 09:03:55',NULL),(63,0,'NULL','NULL','1','5','5','4','2','F',0,'7',782,'2018-06-21 18:41:37',NULL),(64,0,'NULL','NULL','5','5','5','5','3','M',1,'10',785,'2018-06-26 09:55:00',NULL),(65,0,'NULL','NULL','5','5','5','5','3','F',1,'6',781,'2018-06-29 16:47:22',NULL),(66,0,'NULL','NULL','5','5','5','5','1','F',1,'8',772,'2018-07-01 20:32:20',NULL),(67,0,'NULL','NULL','5','5','5','5','1','M',1,'6',411,'2018-07-02 09:02:13',NULL),(68,0,'NULL','NULL','5','5','1','1','1','M',0,'6',786,'2018-07-05 10:54:11',NULL),(69,0,'NULL','NULL','5','5','5','5','2','F',0,'6',397,'2018-07-16 16:55:53',NULL);
/*!40000 ALTER TABLE `formulario_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_semestre` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_semestre_UNIQUE` (`data_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestre`
--

LOCK TABLES `semestre` WRITE;
/*!40000 ALTER TABLE `semestre` DISABLE KEYS */;
INSERT INTO `semestre` VALUES (1,'1'),(2,'2');
/*!40000 ALTER TABLE `semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'adm@fatec.com','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-18 16:37:24
