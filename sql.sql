-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: projeto2
-- ------------------------------------------------------
-- Server version	8.0.32



--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;

CREATE TABLE `administrador` (
  `Id_adm` varchar(255) NOT NULL,
  `fk_Pessoa_Id_usu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_adm`),
  KEY `FK_Administrador_2` (`fk_Pessoa_Id_usu`),
  CONSTRAINT `FK_Administrador_2` FOREIGN KEY (`fk_Pessoa_Id_usu`) REFERENCES `pessoa` (`Id_usu`) ON DELETE CASCADE
);


--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;

UNLOCK TABLES;

--
-- Table structure for table `arquivos`
--

DROP TABLE IF EXISTS `arquivos`;

CREATE TABLE `arquivos` (
  `id_arquivo` varchar(255) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Arquivo` longblob,
  `Tipo` varchar(255) DEFAULT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `Data` timestamp NULL DEFAULT NULL,
  `Id_unico` varchar(255) DEFAULT NULL,
  `Compartilhamento_status` tinyint(1) DEFAULT NULL,
  `fk_Pasta_Id_pasta` varchar(255) DEFAULT NULL,
  `tamanho` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_arquivo`),
  UNIQUE KEY `Id_unico` (`Id_unico`),
  KEY `FK_Arquivos_2` (`fk_Pasta_Id_pasta`),
  CONSTRAINT `FK_Arquivos_2` FOREIGN KEY (`fk_Pasta_Id_pasta`) REFERENCES `pasta` (`Id_pasta`) ON DELETE CASCADE
) ;


--
-- Dumping data for table `arquivos`
--

LOCK TABLES `arquivos` WRITE;

UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;

CREATE TABLE `cidade` (
  `id_cid` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `fk_Estado_id_est` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cid`),
  KEY `FK_Cidade_2` (`fk_Estado_id_est`),
  CONSTRAINT `FK_Cidade_2` FOREIGN KEY (`fk_Estado_id_est`) REFERENCES `estado` (`id_est`) ON DELETE RESTRICT
) ;


--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id_end` varchar(255) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `fk_Cidade_id_cid` varchar(255) DEFAULT NULL,
  `fk_Administrador_Id_adm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_end`),
  KEY `FK_Endereco_2` (`fk_Cidade_id_cid`),
  KEY `FK_Endereco_3` (`fk_Administrador_Id_adm`),
  CONSTRAINT `FK_Endereco_2` FOREIGN KEY (`fk_Cidade_id_cid`) REFERENCES `cidade` (`id_cid`) ON DELETE CASCADE,
  CONSTRAINT `FK_Endereco_3` FOREIGN KEY (`fk_Administrador_Id_adm`) REFERENCES `administrador` (`Id_adm`) ON DELETE RESTRICT
);


--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;

UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_est` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sigla` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_est`)
);


--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `ip`
--

DROP TABLE IF EXISTS `ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ip` (
  `id_ip` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `FK_Pessoa_Id_usu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ip`),
  KEY `fk_pessoa` (`FK_Pessoa_Id_usu`),
  CONSTRAINT `fk_pessoa` FOREIGN KEY (`FK_Pessoa_Id_usu`) REFERENCES `pessoa` (`Id_usu`)
);

--
-- Dumping data for table `ip`
--

LOCK TABLES `ip` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `pasta`
--

DROP TABLE IF EXISTS `pasta`;
CREATE TABLE `pasta` (
  `Id_pasta` varchar(255) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `Data` timestamp NULL DEFAULT NULL,
  `Compartilhamento_status` tinyint(1) DEFAULT NULL,
  `id_unico` varchar(255) DEFAULT NULL,
  `fk_Pessoa_Id_usu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_pasta`),
  UNIQUE KEY `id_unico` (`id_unico`),
  KEY `fk_pasta_2` (`fk_Pessoa_Id_usu`),
  CONSTRAINT `fk_pasta_2` FOREIGN KEY (`fk_Pessoa_Id_usu`) REFERENCES `usuario` (`id_usu`)
) ;


--
-- Dumping data for table `pasta`
--

LOCK TABLES `pasta` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `Id_usu` varchar(255) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Sobrenome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Senha` varchar(512) DEFAULT NULL,
  `Data` timestamp NULL DEFAULT NULL,
  `IP_cadastro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_usu`),
  UNIQUE KEY `Email` (`Email`)
);

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usu` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `fk_Pessoa_Id_usu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usu`),
  KEY `FK_Usuario_2` (`fk_Pessoa_Id_usu`),
  CONSTRAINT `FK_Usuario_2` FOREIGN KEY (`fk_Pessoa_Id_usu`) REFERENCES `pessoa` (`Id_usu`) ON DELETE CASCADE
);

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
UNLOCK TABLES;


-- Dump completed on 2023-05-14  0:24:52
