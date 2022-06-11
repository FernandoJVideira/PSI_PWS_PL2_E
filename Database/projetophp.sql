DROP DATABASE IF EXISTS psi_pl2_pws_e;
CREATE DATABASE IF NOT EXISTS psi_pl2_pws_e;
USE psi_pl2_pws_e;

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `morada` varchar(50) NOT NULL,
  `cod_postal` varchar(8) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `capital_social` decimal(19,9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telefone` (`telefone`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `morada` varchar(50) NOT NULL,
  `cod_postal` varchar(8) NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `role` enum('cliente','funcionario','administrador') NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telefone` (`telefone`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `faturas`
--

DROP TABLE IF EXISTS `faturas`;
CREATE TABLE `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valor_preco_total` decimal(4,2) NOT NULL,
  `valor_iva_total` decimal(4,2) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `funcionario_id` int(11),
  `cliente_id` int(11),
  CONSTRAINT pk_faturas_id PRIMARY KEY (`id`),
  CONSTRAINT fk_faturas_idFunc FOREIGN KEY (`funcionario_id`) REFERENCES users(`id`),
  CONSTRAINT fk_faturas_idClie FOREIGN KEY (`cliente_id`) REFERENCES users(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentagem` int(100) UNSIGNED NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `em_vigor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `preco_unid` decimal(4,2) NOT NULL,
  `quant_stock` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia` (`referencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `linha_faturas`
--

DROP TABLE IF EXISTS `linha_faturas`;
CREATE TABLE `linha_faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(50) NOT NULL,
  `valor_uni` decimal(4,2) NOT NULL,
  `valor_iva` decimal(4,2) NOT NULL,
  `fatura_id` int(11) NOT NULL, 
  `produto_id` int(11) NOT NULL,
  CONSTRAINT pk_li_faturas_id PRIMARY KEY (`id`),
  CONSTRAINT fk_li_faturas_idFatu FOREIGN KEY (`fatura_id`) REFERENCES faturas(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;