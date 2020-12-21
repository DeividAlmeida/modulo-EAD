SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET @@time_zone = `+03:00`;

INSERT INTO `modulos` (`nome`, `url`, `icone`, `status`, `ordem`, `tabela`, `cod_head`, `data_atualizacao`, `chave`, `acao`)
SELECT "EAD", "ead.php", "icon-shopping-bag", 1, 0, "ead", "ead/ead.js", "2019-05-07", "72b4b1d7ce2b514a981a49b1db5790a7", "{\"pedidos\":[\"notificar\",\"editar\",\"deletar\"],\"listagem\":[\"adicionar\",\"editar\",\"deletar\"],\"categoria\":[\"adicionar\",\"editar\",\"deletar\"],\"marca\":[\"adicionar\",\"editar\",\"deletar\"],\"atributo\":[\"adicionar\",\"editar\",\"deletar\"],\"termo\":[\"adicionar\",\"editar\",\"deletar\"],\"produto\":[\"adicionar\",\"editar\",\"deletar\"],\"codigo\":[\"acessar\"],\"configuracao\":[\"acessar\"]}";

-- CONFIGURAÇÃO
CREATE TABLE IF NOT EXISTS `ead` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- PROFESSOR
CREATE TABLE IF NOT EXISTS `ead_prof` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) DEFAULT NULL,
  `cargo` VARCHAR(255) DEFAULT NULL,
  `redes` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- CATEGORIA
CREATE TABLE IF NOT EXISTS `ead_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- USUARIO
CREATE TABLE IF NOT EXISTS `ead_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `data`  date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- CURSO
CREATE TABLE IF NOT EXISTS `ead_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `nome` varchar(255) DEFAULT NULL,
  `descricao_curta` int(11) DEFAULT NULL,
  `descricao_longa` text DEFAULT NULL,
  `vender` varchar(255) DEFAULT NULL,
  `categoria` text DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `tempo` varchar(255) DEFAULT NULL,
  `exibi_professor` varchar(255) DEFAULT NULL,
  `professor` text DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- MODULO
CREATE TABLE IF NOT EXISTS `ead_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `curso` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- AULA
CREATE TABLE IF NOT EXISTS `ead_aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `modulo` int(11) DEFAULT NULL,
  `campos` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `tipo`  varchar(255) DEFAULT NULL,
  `video`  text DEFAULT NULL,
  `nome_arquivo`  varchar(255) DEFAULT NULL,
  `arquivo`  text DEFAULT NULL,
  `professor` text DEFAULT NULL,
  `tipo_prova` varchar(255) DEFAULT NULL,
  `questoes` text DEFAULT NULL,
  `gabarito` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;