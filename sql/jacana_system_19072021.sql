-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jul-2021 às 02:15
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

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
(1, 'Sistema de Gerenciamento de Colaboradores desenvolvido por Rodolfo R R de Jesus.', 'Rodolfo Romaioli Ribeiro de Jesus', 'Jaçanã Controle', 'imagens/icons/favicon_jaca_control.ico', 'Jaçanã System', '1.0', 'Todos os direitos reservados', 'Rodolfo R R de Jesus', 'rodolfo.romaioli@gmail.com', 2021, 'menu-principal.php', 'Jaçanã Controle');

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
(1, 'administrativo'),
(2, 'manutencao'),
(3, 'informatica'),
(4, 'portaria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'imagens/foto_exists.png',
  `nome` varchar(36) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `email` varchar(57) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `nivel_acesso_id` int(1) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `sexo` int(1) NOT NULL DEFAULT 2,
  `setor` int(1) NOT NULL DEFAULT 4,
  `hash_cracha` varchar(100) NOT NULL,
  `usuariocad` varchar(11) DEFAULT NULL,
  `criado` timestamp NULL DEFAULT current_timestamp(),
  `usuarioalt` varchar(11) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL,
  `loginenvioemailsenha` varchar(10) DEFAULT NULL,
  `chavesetsenha` varchar(200) DEFAULT NULL,
  `datapedidochavesetsenha` datetime DEFAULT NULL,
  `datafeitonovasenha` datetime DEFAULT NULL,
  `dataenvioemailsenha` timestamp NULL DEFAULT current_timestamp(),
  `emailenviadosenha` varchar(3) NOT NULL DEFAULT 'NAO',
  `resetsenha` varchar(3) DEFAULT 'NAO',
  `dataresetsenha` datetime DEFAULT NULL,
  `date_alter_senha` timestamp NULL DEFAULT current_timestamp(),
  `lixeira` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `foto`, `nome`, `sobrenome`, `datanascimento`, `cpf`, `email`, `senha`, `nivel_acesso_id`, `celular`, `status`, `sexo`, `setor`, `hash_cracha`, `usuariocad`, `criado`, `usuarioalt`, `alterado`, `loginenvioemailsenha`, `chavesetsenha`, `datapedidochavesetsenha`, `datafeitonovasenha`, `dataenvioemailsenha`, `emailenviadosenha`, `resetsenha`, `dataresetsenha`, `date_alter_senha`, `lixeira`) VALUES
(1, 'sistema/imagens/padrao.jpg', 'EZEQUIEL', 'GRIMA ROMAIOLI RIBEIRO DE JESUS', '2008-12-21', '18233564654', 'ezequiel.romaioli@gmail.com', 'cde7ee70d15c9cecbc95da5cf9b8f509a64384ed29938561c2a76e2c76b95240', 3, '11955545646', 0, 1, 1, '120e871758b552f450366b802c4c474052ba62d73eaac1a6e017c793da7767ad', '22068876817', '2021-07-12 02:10:22', '22068876817', '2021-07-19 09:57:40', NULL, NULL, NULL, NULL, '2021-07-12 02:10:22', 'NAO', 'NAO', NULL, '2021-07-12 02:10:22', 0),
(2, 'sistema/imagens/22068876817/fotologin/13072021_gato_macho_neve.jpeg', 'RODOLFO', 'ROMAIOLI RIBEIRO DE JESUS', '1981-02-07', '22068876817', 'rodolfo.romaioli@gmail.com', 'd7c1e9ddb8586f297280695a8c61662ed044156d67e212ec022f244118fecdc0', 1, '11991091365', 1, 1, 0, '380423c936ba6cc37de255f8771a259f8917a6e712ab5985d95b58f7664a75b4', '18233564654', '2021-07-14 02:26:23', '22068876817', '2021-07-13 23:28:16', NULL, NULL, NULL, NULL, '2021-07-14 02:26:23', 'NAO', 'NAO', NULL, '2021-07-14 02:26:23', 0);

--
-- Índices para tabelas despejadas
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
