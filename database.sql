SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET @@time_zone = `+03:00`;

INSERT INTO `modulos` (`nome`, `url`, `icone`, `status`, `ordem`, `tabela`, `cod_head`, `data_atualizacao`, `chave`, `acao`)
SELECT "EAD", "ead.php", "icon-shopping-bag", 1, 0, "ead", "ead/ead.js", "2019-05-07", "72b4b1d7ce2b514a981a49b1db5790a7", "{\"pedidos\":[\"notificar\",\"editar\",\"deletar\"],\"listagem\":[\"adicionar\",\"editar\",\"deletar\"],\"categoria\":[\"adicionar\",\"editar\",\"deletar\"],\"marca\":[\"adicionar\",\"editar\",\"deletar\"],\"atributo\":[\"adicionar\",\"editar\",\"deletar\"],\"termo\":[\"adicionar\",\"editar\",\"deletar\"],\"produto\":[\"adicionar\",\"editar\",\"deletar\"],\"codigo\":[\"acessar\"],\"configuracao\":[\"acessar\"]}";

-- CONFIGURAÇÃO
CREATE TABLE IF NOT EXISTS `ead` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `dev` text DEFAULT NULL,
    `prod` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `ead` (`id`, `dev`, `prod`) VALUES (
    1, 
    '<script src=\"https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js\"></script>', 
    '<script src=\"https://cdn.jsdelivr.net/npm/vue@2\"></script>'
    );
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
    `arquivo`  text DEFAULT NULL,
    `professor` text DEFAULT NULL,
    `tipo_prova` varchar(255) DEFAULT NULL,
    `qtd_alternativas` int(11) DEFAULT NULL,
    `questoes` text DEFAULT NULL,
    `alternativas` text DEFAULT NULL,
    `gabarito` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- CONFIGURAR EMAIL
CREATE TABLE IF NOT EXISTS `ead_config_email` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nome` varchar(255) NOT NULL,
    `email_usuario` varchar(255) DEFAULT NULL,
    `email_senha` varchar(255) DEFAULT NULL,
    `email_porta` varchar(255) DEFAULT NULL,
    `email_servidor` varchar(255) DEFAULT NULL,
    `email_protocolo_seguranca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    INSERT INTO `ead_config_email` (
        `id`, 
        `nome`, 
        `remetente`, 
        `email_usuario`, 
        `email_senha`, 
        `email_porta`, 
        `email_servidor`, 
        `email_protocolo_seguranca` 
    ) VALUES
    (1, '','','','','','','');

-- CONFIGURAR PAGSEGURO
CREATE TABLE  IF NOT EXISTS `ead_config_pagseguro` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `email` varchar(255) DEFAULT NULL,
    `token` varchar(255) DEFAULT NULL,
    `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    INSERT INTO `ead_config_pagseguro` (
        `id`, 
        `email`, 
        `token`, 
        `status`
    ) VALUES
    (1, '', '', '');


-- CONFIGURAR DEPOSITO EM CONTA
CREATE TABLE IF NOT EXISTS `ead_config_deposito` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titulo` varchar(255) DEFAULT NULL,
    `descricao` varchar(255) DEFAULT NULL,
    `instucoes` varchar(255) DEFAULT NULL,
    `detalhes` text DEFAULT NULL,
    `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    INSERT INTO `ead_config_deposito` (
        `id`, 
        `titulo`, 
        `descricao`, 
        `instucoes`, 
        `detalhes`, 
        `status`
    ) VALUES
    (1, '', '', '', '', '');

-- CONFIGURACAO GERAL
CREATE TABLE IF NOT EXISTS `ead_config_geral` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

        #CARRINHO
    `carrinho_cor_btn` varchar(255) DEFAULT NULL,
    `carrinho_cor_btn_finalizar` varchar(255) DEFAULT NULL,

        #ICONE CARINHO  MENU
    `icon_carrinho_cor_icon` varchar(255) DEFAULT NULL,
    `icon_carrinho_cor_fundo` varchar(255) DEFAULT NULL,
    `icon_carrinho_cor_texto` varchar(255) DEFAULT NULL,
    `icon_carrinho_cor_btn_ver` varchar(255) DEFAULT NULL,
    `icon_carrinho_cor_btn_ver_texto` varchar(255) DEFAULT NULL,
    `icon_carrinho_cor_btn_ver_hover` varchar(255) DEFAULT NULL,

        #LINK DO CARRINHO
    `link_carrinho` text DEFAULT NULL,

        #BUSCA
    `busca_limite_resultado` varchar(255) DEFAULT NULL,
    `busca_tipo_btn` varchar(255) DEFAULT NULL,
    `busca_tamanho_btn` varchar(255) DEFAULT NULL,
    `busca_cor_btn` varchar(255) DEFAULT NULL,
    `busca_cor_btn_hover` varchar(255) DEFAULT NULL,
    `busca_cor_btn_texto` varchar(255) DEFAULT NULL,

        #LINK DO RESULTADO DA BUSCA
    `link_busca` varchar(255) DEFAULT NULL,

        #LINK CHECKOUT
    `link_checkout` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    INSERT INTO `ead_config_geral` (
        `id`, 

            #CARRINHO
        `carrinho_cor_btn`, 
        `carrinho_cor_btn_finalizar`, 

            #ICONE CARINHO  MENU
        `icon_carrinho_cor_icon`, 
        `icon_carrinho_cor_fundo`, 
        `icon_carrinho_cor_texto`, 
        `icon_carrinho_cor_btn_ver`, 
        `icon_carrinho_cor_btn_ver_texto`, 
        `icon_carrinho_cor_btn_ver_hover`,

            #LINK DO CARRINHO
        `link_carrinho`,

            #BUSCA
        `busca_limite_resultado`, 
        `busca_tipo_btn`, 
        `busca_tamanho_btn`, 
        `busca_cor_btn`, 
        `busca_cor_btn_hover`, 
        `busca_cor_btn_texto`,
        
            #LINK CHECKOUT
        `link_checkout`
    ) VALUES
    (1,'','','','','','','','','','','','','','','','');