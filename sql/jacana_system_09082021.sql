-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Ago-2021 às 21:21
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jacana_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome_adm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome_adm`) VALUES
(1, 'JAÇANÃ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `albuns`
--

CREATE TABLE `albuns` (
  `id_alb` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `card_img_top` varchar(1000) NOT NULL DEFAULT 'image/teste1.jpg',
  `card_title` varchar(25) NOT NULL DEFAULT 'Notícia de Ultima Hora',
  `card_text` varchar(500) NOT NULL DEFAULT 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
  `href_button` varchar(500) NOT NULL DEFAULT 'index.php',
  `criado` varchar(100) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado` varchar(100) NOT NULL,
  `data_alterado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `albuns`
--

INSERT INTO `albuns` (`id_alb`, `ativo`, `card_img_top`, `card_title`, `card_text`, `href_button`, `criado`, `data_criado`, `alterado`, `data_alterado`) VALUES
(1, 0, 'assets/img/teste1.jpg', 'Notícia de Ultima Hora', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 'index.php', 'd788796', '2021-03-13 20:14:40', 'd788796', '2021-03-13 20:14:40'),
(2, 1, 'assets/img/teste1.jpg', 'Notícia de Ultima Hora', 'testando cards.', 'index.php', '', '2021-03-13 20:40:52', '', '2021-03-13 20:40:52'),
(3, 1, 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1782c673520%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1782c673520%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E', 'Notícia de Ultima Hora', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 'index.php', '', '2021-03-13 20:47:59', '', '2021-03-13 20:47:59'),
(4, 1, 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1782c673520%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1782c673520%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E', 'Notícia de Ultima Hora', 'nennnnn.', 'index.php', '', '2021-03-13 20:48:33', '', '2021-03-13 20:48:33'),
(5, 1, 'assets/img/teste1.jpg', 'Notícia de Ultima Hora', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 'index.php', '', '2021-03-13 21:56:33', '', '2021-03-13 21:56:33'),
(6, 1, 'assets/img/teste1.jpg', 'Notícia de Ultima Hora', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 'index.php', '', '2021-03-13 21:56:48', '', '2021-03-13 21:56:48'),
(7, 1, 'assets/img/teste1.jpg', 'Notícia de Ultima Hora', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 'index.php', '', '2021-03-13 21:56:55', '', '2021-03-13 21:56:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_system`
--

CREATE TABLE `config_system` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `sistema` varchar(200) DEFAULT NULL,
  `versao` varchar(50) DEFAULT NULL,
  `direitos` varchar(200) DEFAULT NULL,
  `desenvolvedor` varchar(200) DEFAULT NULL,
  `email_contato` varchar(100) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `pag_principal` varchar(50) NOT NULL,
  `unidade_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config_system`
--

INSERT INTO `config_system` (`id`, `description`, `author`, `title`, `icon`, `sistema`, `versao`, `direitos`, `desenvolvedor`, `email_contato`, `ano`, `pag_principal`, `unidade_name`) VALUES
(1, 'Sistema de Gerenciamento de Colaboradores desenvolvido por Rodolfo R R de Jesus.', 'Rodolfo Romaioli Ribeiro de Jesus', 'Jaçanã Controle', 'imagens/icons/favicon_jaca_control.ico', 'Jaçanã System', '1.0', 'Todos os direitos reservados', 'Rodolfo R R de Jesus', 'rodolfo.romaioli@gmail.com', 2021, 'menu-principal.php', 'ADM JAÇANÃ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_principal`
--

CREATE TABLE `menu_principal` (
  `id` int(11) NOT NULL,
  `id_menu` int(3) DEFAULT NULL,
  `pag` varchar(20) NOT NULL DEFAULT 'index.php',
  `nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `usuariocad` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `menu_principal`
--

INSERT INTO `menu_principal` (`id`, `id_menu`, `pag`, `nome`, `icon`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, NULL, 'index.php', 'Credenciais', 'address-card', 'D788796', '2021-06-11 11:05:22', 'D788796', '2021-06-11 08:12:11'),
(2, NULL, 'index.php', 'Cadastramento', 'user-plus', 'D788796', '2021-06-12 05:34:10', NULL, '2021-06-12 05:34:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_sub`
--

CREATE TABLE `menu_sub` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `menu_sub`
--

INSERT INTO `menu_sub` (`id`, `id_menu`, `nome`, `pag`, `icon`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 1, 'Listagem Ativos', 'menu-principal.php?pag=lista_usuarios&year=2021', 'clipboard-list-check', NULL, NULL, 'D788796', '2021-06-11 10:06:55'),
(2, 2, 'Cadastrar Novo', 'menu-principal.php?pag=cadastro_usuarios&year=2021', 'plus-octagon', 'D788796', '2021-06-12 05:38:43', NULL, '0000-00-00 00:00:00'),
(3, 1, 'Lixeira', 'menu-principal.php?pag=lista_usuarios&lixeira=1&year=2021', 'trash-restore', '2', '2021-07-08 08:20:49', NULL, '2021-07-08 08:20:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_sub_sub`
--

CREATE TABLE `menu_sub_sub` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pag` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `menu_sub_sub`
--

INSERT INTO `menu_sub_sub` (`id`, `id_menu`, `nome`, `pag`, `icon`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 1, 'Listagem Ativos', 'menu-principal.php?pag=lista_usuarios&year=2021', 'clipboard-list-check', NULL, NULL, 'D788796', '2021-06-11 10:10:55'),
(2, 1, 'Lixeira', 'menu-principal.php?pag=lista_usuarios&lixeira=1&year=2021', 'trash-restore', 'D788796', '2021-06-12 05:29:34', NULL, '2021-06-12 05:29:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `navfootercolor`
--

CREATE TABLE `navfootercolor` (
  `id` int(11) NOT NULL,
  `navtext` varchar(100) NOT NULL DEFAULT 'navbar-dark',
  `navcolor` varchar(100) NOT NULL DEFAULT 'bg-dark',
  `footercolor` varchar(100) NOT NULL DEFAULT 'bg-dark',
  `footertext` varchar(100) NOT NULL DEFAULT 'text-white',
  `stylenavbar` varchar(100) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `navfootercolor`
--

INSERT INTO `navfootercolor` (`id`, `navtext`, `navcolor`, `footercolor`, `footertext`, `stylenavbar`) VALUES
(1, 'navbar-dark', 'bg-dark', 'bg-dark', 'text-white', '#000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pag_system`
--

CREATE TABLE `pag_system` (
  `id` int(11) NOT NULL,
  `name_pag` varchar(100) DEFAULT NULL,
  `name_form` varchar(100) NOT NULL DEFAULT 'SisdamWeb',
  `caminho` varchar(100) DEFAULT NULL,
  `tabela` varchar(25) DEFAULT NULL,
  `unidade` varchar(100) NOT NULL DEFAULT 'JAÇANÃ',
  `usuariocad` varchar(11) DEFAULT NULL,
  `criado` datetime DEFAULT current_timestamp(),
  `usuarioalt` varchar(11) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `pag_system`
--

INSERT INTO `pag_system` (`id`, `name_pag`, `name_form`, `caminho`, `tabela`, `unidade`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 'cadastro_usuarios', 'CADASTRAR USUARIOS', 'sistema/usuarios/cad-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', 'admin', '2021-06-11 10:15:37', 'D788796', '2021-03-08 08:13:39'),
(2, 'edicao_usuarios', 'EDITAR USUARIOS', 'sistema/usuarios/edit-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', 'admin', '2021-06-11 10:15:37', 'D788796', '2021-03-08 08:13:39'),
(3, 'lista_usuarios', 'USUARIOS', 'sistema/usuarios/list-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', 'admin', '2021-06-11 10:15:37', 'D788796', '2021-03-08 08:13:39'),
(4, 'acao_usuarios', 'EDIÇÃO DE USUÁRIOS', 'sistema/usuarios/action-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', 'D788796', '2021-06-11 10:15:37', NULL, NULL),
(5, 'visual_cracha', 'IDENTIFICAÇÃO', 'sistema/usuarios/ident-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', 'D788796', '2021-06-12 19:30:35', NULL, '0000-00-00 00:00:00'),
(6, 'edicao_perfil', 'EDIÇÃO DE PERFIL', 'sistema/usuarios/edit-perfil.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', '22068876817', '2021-07-10 01:43:40', NULL, '2021-07-10 06:41:30'),
(7, 'alteracao_senha', 'ALTERAR SENHA', 'sistema/usuarios/alt-senha.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', '22068876817', '2021-07-10 02:15:27', NULL, '2021-07-10 07:14:17'),
(8, 'edicao_perfil_usuario', 'EDIÇÃO PERFIL DE USUÁRIO', 'sistema/usuarios/edit-perfil-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', '22068876817', '2021-07-10 02:29:59', NULL, '2021-07-10 07:28:30'),
(9, 'autenticacao_cracha', 'AUTENTICAÇÃO CRACHA', 'locked/autentication-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', '22068876817', '2021-07-11 23:12:34', NULL, '2021-07-12 04:11:00'),
(10, 'print_cracha', 'IMPRESSAO CRACHA', 'sistema/usuarios/print-ident-user.php', 'usuarios', 'SÃO PAULO - SETOR JAÇANÃ', '22068876817', '2021-07-14 01:22:13', NULL, '2021-07-14 06:20:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome_setor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome_setor`) VALUES
(1, 'ADMINISTRAÇÃO'),
(2, 'MANUTENÇÃO'),
(3, 'INFORMÁTICA'),
(4, 'PORTEIRO'),
(5, 'BRIGADISTA'),
(6, 'COZINHA'),
(7, 'ACESSOR'),
(8, 'ENFERMEIRA'),
(9, 'ENFERMEIRO'),
(10, 'ESTACIONAMENTO'),
(11, 'LIMPEZA C.O'),
(12, 'LIMPEZA PIEDADE'),
(13, 'MÉDICO'),
(14, 'SOM'),
(15, 'RECEPÇÃO'),
(16, 'SECRETARIA'),
(17, 'SEGURANÇA - PM'),
(18, 'SEGURANÇA - P. CIVIL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(2) NOT NULL,
  `foto` varchar(89) DEFAULT NULL,
  `nome` varchar(9) DEFAULT NULL,
  `sobrenome` varchar(26) DEFAULT NULL,
  `datanascimento` varchar(10) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(28) DEFAULT NULL,
  `senha` varchar(64) DEFAULT NULL,
  `nivel_acesso_id` int(1) DEFAULT NULL,
  `celular` bigint(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `sexo` int(1) DEFAULT NULL,
  `setor` varchar(2) DEFAULT NULL,
  `hash_cracha` varchar(64) DEFAULT NULL,
  `usuariocad` bigint(11) DEFAULT NULL,
  `criado` varchar(16) DEFAULT NULL,
  `usuarioalt` varchar(11) DEFAULT NULL,
  `alterado` varchar(16) DEFAULT NULL,
  `loginenvioemailsenha` varchar(10) DEFAULT NULL,
  `chavesetsenha` varchar(10) DEFAULT NULL,
  `datapedidochavesetsenha` varchar(10) DEFAULT NULL,
  `datafeitonovasenha` varchar(10) DEFAULT NULL,
  `dataenvioemailsenha` varchar(16) DEFAULT NULL,
  `emailenviadosenha` varchar(3) DEFAULT NULL,
  `resetsenha` varchar(3) DEFAULT NULL,
  `dataresetsenha` varchar(10) DEFAULT NULL,
  `date_alter_senha` varchar(16) DEFAULT NULL,
  `lixeira` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `foto`, `nome`, `sobrenome`, `datanascimento`, `cpf`, `email`, `senha`, `nivel_acesso_id`, `celular`, `status`, `sexo`, `setor`, `hash_cracha`, `usuariocad`, `criado`, `usuarioalt`, `alterado`, `loginenvioemailsenha`, `chavesetsenha`, `datapedidochavesetsenha`, `datafeitonovasenha`, `dataenvioemailsenha`, `emailenviadosenha`, `resetsenha`, `dataresetsenha`, `date_alter_senha`, `lixeira`) VALUES
(1, 'sistema/imagens/padrao.jpg', 'AGNALDO', 'DO CARMO ', '', '', '', '', 3, 1122415079, 1, 1, '15', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(2, 'sistema/imagens/padrao.jpg', 'ALDO', 'MARIA DOS SANTOS ', '', '', '', '', 3, 1122415079, 1, 1, '14', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(3, 'sistema/imagens/padrao.jpg', 'ALEXANDRE', 'CASADO ALVES DIAS ', '', '', '', '', 3, 1122415079, 1, 1, '16', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(4, 'sistema/imagens/padrao.jpg', 'ALEXANDRE', 'DE SOUZA E SILVA', '', '', '', '', 3, 1122415079, 1, 1, '10', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(5, 'sistema/imagens/padrao.jpg', 'ANDRÉ', 'LUIZ LEAL FERREIRA ', '', '', '', '', 3, 1122415079, 1, 1, '17', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(6, 'sistema/imagens/padrao.jpg', 'BENEDITO', 'ANTONIO PINTO ', '', '', '', '', 3, 1122415079, 1, 1, '4', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(7, 'sistema/imagens/padrao.jpg', 'CLAUDEMIR', 'CAMARGO BARBOSA ', '', '', '', '', 3, 1122415079, 1, 1, '4', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(8, 'sistema/imagens/padrao.jpg', 'CLAUDEMIR', 'JOSÉ INÁCIO ', '', '', '', '', 3, 1122415079, 1, 1, '4', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(9, 'sistema/imagens/padrao.jpg', 'DANIEL', 'CHRISTINO DA SILVA ', '', '', '', '', 3, 1122415079, 1, 1, '4', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(10, 'sistema/imagens/padrao.jpg', 'DAVID', 'GRABOSKI ', '', '', '', '', 3, 1122415079, 1, 1, '16', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(11, 'sistema/imagens/padrao.jpg', 'ELIANA', 'CLAUDINO DE LIMA ', '', '', '', '', 3, 1122415079, 1, 0, '8', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(12, 'sistema/imagens/padrao.jpg', 'ELIELSON', 'DO NASCIMENTO ', '', '', '', '', 3, 1122415079, 1, 1, '5', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(13, 'sistema/imagens/padrao.jpg', 'ERNANI', 'APARECIDO DA SILVA ', '', '', '', '', 3, 1122415079, 1, 1, '1', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(14, 'sistema/imagens/padrao.jpg', 'ESTER', 'FERREIRA DE SOUZA E', '', '', '', '', 3, 1122415079, 1, 0, '6', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(15, 'sistema/imagens/padrao.jpg', 'FERNANDO', 'HENRIQUE ', '', '', '', '', 3, 1122415079, 1, 1, '7', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(16, 'sistema/imagens/padrao.jpg', 'FERNANDO', 'LUIZ DA SILVA ', '', '', '', '', 3, 1122415079, 1, 1, '5', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(17, 'sistema/imagens/padrao.jpg', 'FERNANDO', 'SHIGUEO SATO ', '', '', '', '', 3, 1122415079, 1, 1, '10', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(18, 'sistema/imagens/padrao.jpg', 'FLAVIO', 'GIANINI ', '', '', '', '', 3, 1122415079, 1, 1, '7', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(19, 'sistema/imagens/padrao.jpg', 'FRANCISCO', 'MARIANO LIMA ', '', '', '', '', 3, 1122415079, 1, 1, '11', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(20, 'sistema/imagens/padrao.jpg', 'GABRIELA', 'CRISTINA LEFUNDE GOMES ', '', '', '', '', 3, 1122415079, 1, 0, '8', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(21, 'sistema/imagens/padrao.jpg', 'HEITOR', 'EDUARDO DE SANT\'ANA', '', '', '', '', 3, 1122415079, 1, 1, '18', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(22, 'sistema/imagens/padrao.jpg', 'HUMBERTO', 'CARVALHO ', '', '', '', '', 3, 1122415079, 1, 1, '10', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(23, 'sistema/imagens/padrao.jpg', 'ISMAEL', 'ROSAN ', '', '', '', '', 3, 1122415079, 1, 1, '7', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(24, 'sistema/imagens/padrao.jpg', 'JOEL', 'SIMPLICIO DA SILVA ', '', '', '', '', 3, 1122415079, 1, 1, '7', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(25, 'sistema/imagens/padrao.jpg', 'JOSÉ', 'ARQUIBALDO DE LUCCA ', '', '', '', '', 3, 1122415079, 1, 1, '13', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(26, 'sistema/imagens/padrao.jpg', 'JOSÉ', 'DOS SANTOS BARRETO IRMÃO', '', '', '', '', 3, 1122415079, 1, 1, '7', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(27, 'sistema/imagens/padrao.jpg', 'JOSÉ', 'ROBERTO DIAS GOMES ', '', '', '', '', 3, 1122415079, 1, 1, '4', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(28, 'sistema/imagens/padrao.jpg', 'LAMARTINE', 'ELEOTÉRIO DE SOUZA FILHO', '', '', '', '', 3, 1122415079, 1, 1, '13', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(29, 'sistema/imagens/32945750848/fotologin/29072021_leandro.jpg', 'LEANDRO', 'SANTOS DA SILVA ', '07/02/1981', '32945750848', 'leandro_silvas@yahoo.com.br', '4a5e8f4f55a5d35ecd1ddc6c3f599e9ab8ac27408bd6a38b088bb34b987c7fee', 1, 11998057345, 1, 1, '1', 'cb2300256d8d9a22463ba2477c82cb05a0c0f0c84dda807d88905446129be0a9', 22068876817, '29/07/2021 03:29', '22068876817', '29/07/2021 03:46', '', '', '', '', '29/07/2021 03:29', 'NAO', 'NAO', '', '29/07/2021 03:29', 0),
(30, 'sistema/imagens/padrao.jpg', 'LEVY', 'ALEXANDRE MALARA ', '', '', '', '', 3, 1122415079, 1, 1, '7', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(31, 'sistema/imagens/padrao.jpg', 'MARCOS', 'ANTONIO PINTO ', '', '', '', '', 3, 1122415079, 1, 1, '12', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(32, 'sistema/imagens/padrao.jpg', 'MARIA', 'LUCIA O.BARRETO ', '', '', '', '', 3, 1122415079, 1, 0, '6', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(33, 'sistema/imagens/padrao.jpg', 'MARLENE', 'CHANGURI ', '', '', '', '', 3, 1122415079, 1, 0, '6', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(34, 'sistema/imagens/padrao.jpg', 'MARTA', 'MARCONDES DE ANDRADE ', '', '', '', '', 3, 1122415079, 1, 0, '6', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(35, 'sistema/imagens/padrao.jpg', 'MAURO', 'DE ARAUJO BARBOSA NUNES', '', '', '', '', 3, 1122415079, 1, 1, '4', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(36, 'sistema/imagens/padrao.jpg', 'MAXWLL', 'FELIPE FREIRE ', '', '', '', '', 3, 1122415079, 1, 1, '5', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(37, 'sistema/imagens/padrao.jpg', 'PAULO', 'EDUARDO MAGALHÃES (?) ', '', '', '', '', 3, 1122415079, 1, 1, '14', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(38, 'sistema/imagens/padrao.jpg', 'RICARDO', 'TKATCH ', '', '', '', '', 3, 1122415079, 1, 1, '2', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(39, 'sistema/imagens/padrao.jpg', 'ROBERVAL', 'DE BARROS BARBOSA ', '', '', '', '', 3, 1122415079, 1, 1, '9', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(40, 'sistema/imagens/22068876817/fotologin/29072021_WhatsApp Image 2021-07-20 at 22.14.57.jpeg', 'RODOLFO', 'ROMAIOLI RIBEIRO DE JESUS', '07/02/1981', '22068876817', 'rodolfo.romaioli@gmail.com', 'd7c1e9ddb8586f297280695a8c61662ed044156d67e212ec022f244118fecdc0', 1, 11991091365, 1, 1, '0', '380423c936ba6cc37de255f8771a259f8917a6e712ab5985d95b58f7664a75b4', 22068876817, '14/07/2021 02:26', '22068876817', '29/07/2021 03:11', '', '', '', '', '14/07/2021 02:26', 'NAO', 'NAO', '', '14/07/2021 02:26', 0),
(41, 'sistema/imagens/padrao.jpg', 'ROGÉRIO', 'SEVERINO ', '', '', '', '', 3, 1122415079, 1, 1, '10', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(42, 'sistema/imagens/padrao.jpg', 'RONALDO', 'MINQUIO ', '', '', '', '', 3, 1122415079, 1, 1, '10', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(43, 'sistema/imagens/padrao.jpg', 'SEBASTIÃO', 'FERREIRA DE ANDRADE ', '', '', '', '', 3, 1122415079, 1, 1, '2', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(44, 'sistema/imagens/padrao.jpg', 'SIDNEY', 'AGNES D\'LIMA', '', '', '', '', 3, 1122415079, 1, 1, '15', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(45, 'sistema/imagens/padrao.jpg', 'SILVANA', 'BATISTA DA SILVA GONÇALVES', '', '', '', '', 3, 1122415079, 1, 0, '6', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(46, 'sistema/imagens/padrao.jpg', 'VAGNER', 'MARI MONTEIRO ', '', '', '', '', 3, 1122415079, 1, 1, '3', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0),
(47, 'sistema/imagens/15665464646/fotologin/29072021_vitor.jpg', 'VITOR', 'ARAUJO VIEIRA ', '07/02/1981', '15665464646', 'victoraraujovieira@gmail.com', '87945bf32fec6f0b7b38ba754c6af49c4976544179766ed459746d2e29ad7f56', 1, 11993670927, 1, 1, '1', '0c7f45dec619f23d46075b9ddfb22de06a589d2b501f972357943cad862cf8bc', 22068876817, '29/07/2021 03:34', '', '', '', '', '', '', '29/07/2021 03:34', 'NAO', 'NAO', '', '29/07/2021 03:34', 0),
(48, 'sistema/imagens/padrao.jpg', 'WAGNER', 'ROBERTO DE CASTRO ', '', '', '', '', 3, 1122415079, 1, 1, '', '', 22068876817, '09/08/2021 15:51', '', '', '', '', '', '', '', '', '', '', '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id_alb`);

--
-- Índices para tabela `config_system`
--
ALTER TABLE `config_system`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_principal`
--
ALTER TABLE `menu_principal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_sub`
--
ALTER TABLE `menu_sub`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_sub_sub`
--
ALTER TABLE `menu_sub_sub`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pag_system`
--
ALTER TABLE `pag_system`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id_alb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `config_system`
--
ALTER TABLE `config_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `menu_principal`
--
ALTER TABLE `menu_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `menu_sub`
--
ALTER TABLE `menu_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `menu_sub_sub`
--
ALTER TABLE `menu_sub_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pag_system`
--
ALTER TABLE `pag_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
