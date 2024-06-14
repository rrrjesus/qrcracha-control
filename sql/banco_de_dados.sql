-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/06/2024 às 05:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_de_dados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `albuns`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `albuns`
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
-- Estrutura para tabela `config_system`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `config_system`
--

INSERT INTO `config_system` (`id`, `description`, `author`, `title`, `icon`, `sistema`, `versao`, `direitos`, `desenvolvedor`, `email_contato`, `ano`, `pag_principal`, `unidade_name`) VALUES
(1, 'Sistema de Gerenciamento de Colaboradores desenvolvido por Rodolfo R R de Jesus.', 'Rodolfo Romaioli Ribeiro de Jesus', 'Jaçanã Controle', 'imagens/icons/favicon_jaca_control.ico', 'Jaçanã System', '1.0', 'Todos os direitos reservados', 'Rodolfo R R de Jesus', 'informatica.setor11@gmail.com', 2021, 'menu-principal', 'Jaçanã Controle');

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(2) NOT NULL,
  `nome_grupo` text NOT NULL,
  `description` varchar(75) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome_grupo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'NOME_GRUPO_1', 'Doações e Coletas', '2024-06-14 03:16:18', '2024-06-15 00:44:35'),
(2, 'NOME_GRUPO_2', 'Compra de Insumos e Alimentação', '2024-06-14 03:16:18', '2024-06-15 00:44:45'),
(3, 'ALIMENTAÇÃO', 'Refeitórios', '2024-06-14 03:16:18', '2024-06-15 00:44:58'),
(4, 'NOME_GRUPO_4', 'Brigada e Primeiros Socorros', '2024-06-14 03:16:18', '2024-06-15 00:45:30'),
(5, 'NOME_GRUPO_5', 'Segurança e Trânsito', '2024-06-14 03:16:18', '2024-06-15 00:45:37'),
(6, 'NOME_GRUPO_6', 'Limpeza e Organização das Casas de oração', '2024-06-14 03:16:18', '2024-06-15 00:45:42'),
(7, 'NOME_GRUPO_7', 'Manutenção Som  - Ar Condicionado', '2024-06-14 03:16:18', '2024-06-15 00:45:47'),
(8, 'NOM8E_GRUPO_8', 'Gráfica Suporte de Papelaria', '2024-06-14 03:16:18', '2024-06-15 00:45:59'),
(9, 'INFORMÁTICA', 'Processamento de Dados, T.i, Emissão fichas, Credenciamento(Crachás), Telão', '2024-06-14 03:16:18', '2024-06-15 00:45:18'),
(10, 'NOME_GRUPO_10', 'Apoio aos Grupos de Visitas (outras Localidades)', '2024-06-14 03:16:18', '2024-06-15 00:46:09'),
(11, 'NOME_GRUPO_11', 'Libras', '2024-06-14 03:16:18', '2024-06-15 00:46:15'),
(12, 'NOME_GRUPO_12', 'Orquestras Músicos', '2024-06-14 03:16:18', '2024-06-15 00:46:27'),
(13, 'NOME_GRUPO_13', 'Orientação Geral, Apoio aos GT\'s', '2024-06-14 03:16:18', '2024-06-15 00:46:36'),
(14, 'NOME_GRUPO_14', 'Apoio aos servos de Deus nos Cultos', '2024-06-14 03:16:18', '2024-06-15 00:46:42'),
(15, 'NOME_GRUPO_15', 'Não definido', '2024-06-14 23:44:29', '2024-06-15 00:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `igrejas`
--

CREATE TABLE `igrejas` (
  `id` int(11) NOT NULL,
  `nome_igreja` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `igrejas`
--

INSERT INTO `igrejas` (`id`, `nome_igreja`, `created_at`, `updated_at`) VALUES
(1, 'Barrocada', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(2, 'Jaçanã', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(3, 'Jardim Ataliba Leonel', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(4, 'Jardim Cabuçu', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(5, 'Jardim Fontalis', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(6, 'Jardim Hebron', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(7, 'Jardim Japão', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(8, 'Jardim Joamar', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(9, 'Jardim Julieta', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(10, 'Jardim Peri', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(11, 'Jardim Portal 1', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(12, 'Jardim São João', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(13, 'Jardim Tremembé', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(14, 'Joana Darc', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(15, 'Jova Rural', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(16, 'Mandaqui', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(17, 'Parque Edu Chaves', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(18, 'Parque Novo Mundo', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(19, 'Parque Vila Maria', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(20, 'Pedra Branca', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(21, 'Santana', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(22, 'Tremembé', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(23, 'Tucuruvi', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(24, 'Vila Albertina', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(25, 'Vila Aurora', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(26, 'Vila Ayrosa', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(27, 'Vila Cachoeira', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(28, 'Vila Ede', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(29, 'Vila Guilherme', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(30, 'Vila Maria', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(31, 'Vila Medeiros', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(32, 'Vila Nova Galvão', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(33, 'Vila Rosa', '2024-06-14 03:02:14', '2024-06-14 03:02:14'),
(34, 'Não Informado', '2024-06-14 03:29:05', '2024-06-14 03:29:25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu_principal`
--

CREATE TABLE `menu_principal` (
  `id` int(11) NOT NULL,
  `id_menu` int(3) DEFAULT NULL,
  `pag` varchar(20) NOT NULL DEFAULT 'index.php',
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `usuariocad` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Despejando dados para a tabela `menu_principal`
--

INSERT INTO `menu_principal` (`id`, `id_menu`, `pag`, `nome`, `icon`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, NULL, 'index.php', 'Credenciais', 'address-card', 'D788796', '2021-06-11 11:05:22', 'D788796', '2021-06-11 08:12:11'),
(2, NULL, 'index.php', 'Cadastramento', 'user-plus', 'D788796', '2021-06-12 05:34:10', NULL, '2021-06-12 05:34:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu_sub`
--

CREATE TABLE `menu_sub` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pag` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Despejando dados para a tabela `menu_sub`
--

INSERT INTO `menu_sub` (`id`, `id_menu`, `nome`, `pag`, `icon`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 1, 'Listagem Ativos', 'menu-principal.php?pag=lista_usuarios&year=2021', 'clipboard-list-check', NULL, NULL, 'D788796', '2021-06-11 10:06:55'),
(2, 2, 'Cadastrar Novo', 'menu-principal.php?pag=cadastro_usuarios&year=2021', 'plus-octagon', 'D788796', '2021-06-12 05:38:43', NULL, '0000-00-00 00:00:00'),
(3, 1, 'Lixeira', 'menu-principal.php?pag=lista_usuarios&lixeira=1&year=2021', 'trash-restore', '2', '2021-07-08 08:20:49', NULL, '2021-07-08 08:20:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu_sub_sub`
--

CREATE TABLE `menu_sub_sub` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pag` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Despejando dados para a tabela `menu_sub_sub`
--

INSERT INTO `menu_sub_sub` (`id`, `id_menu`, `nome`, `pag`, `icon`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 1, 'Listagem Ativos', 'menu-principal.php?pag=lista_usuarios&year=2021', 'clipboard-list-check', NULL, NULL, 'D788796', '2021-06-11 10:10:55'),
(2, 1, 'Lixeira', 'menu-principal.php?pag=lista_usuarios&lixeira=1&year=2021', 'trash-restore', 'D788796', '2021-06-12 05:29:34', NULL, '2021-06-12 05:29:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `navfootercolor`
--

CREATE TABLE `navfootercolor` (
  `id` int(11) NOT NULL,
  `navtext` varchar(100) NOT NULL DEFAULT 'navbar-dark',
  `navcolor` varchar(100) NOT NULL DEFAULT 'bg-dark',
  `footercolor` varchar(100) NOT NULL DEFAULT 'bg-dark',
  `footertext` varchar(100) NOT NULL DEFAULT 'text-white',
  `stylenavbar` varchar(100) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `navfootercolor`
--

INSERT INTO `navfootercolor` (`id`, `navtext`, `navcolor`, `footercolor`, `footertext`, `stylenavbar`) VALUES
(1, 'navbar-dark', 'bg-dark', 'bg-dark', 'text-white', '#000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pag_system`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Despejando dados para a tabela `pag_system`
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
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome_setor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `setor`
--

INSERT INTO `setor` (`id`, `nome_setor`) VALUES
(1, 'ADMINISTRAÇÃO'),
(2, 'MANUTENÇÃO'),
(3, 'INFORMÁTICA'),
(4, 'PORTEIRO'),
(5, 'BRIGADISTA'),
(6, 'COZINHA'),
(7, 'ASSESSOR'),
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
(18, 'SEGURANÇA - P. CIVIL'),
(19, 'JURÍDICO-ASSESSOR'),
(20, 'MÉDICA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `foto` varchar(89) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `sobrenome` varchar(150) DEFAULT NULL,
  `datanascimento` varchar(10) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(64) DEFAULT NULL,
  `nivel_acesso_id` int(1) DEFAULT NULL,
  `celular` bigint(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `sexo` int(1) DEFAULT NULL,
  `setor` varchar(2) DEFAULT NULL,
  `adm` varchar(50) NOT NULL DEFAULT 'JAÇANÃ',
  `cidade` varchar(100) NOT NULL DEFAULT 'SÃO PAULO',
  `hash_cracha` varchar(64) DEFAULT NULL,
  `usuariocad` bigint(11) DEFAULT NULL,
  `criado` datetime NOT NULL DEFAULT current_timestamp(),
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
  `lixeira` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `igreja_id` int(2) NOT NULL DEFAULT 34,
  `grupo_id` int(2) NOT NULL DEFAULT 15,
  `aceite_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `foto`, `nome`, `sobrenome`, `datanascimento`, `cpf`, `email`, `senha`, `nivel_acesso_id`, `celular`, `status`, `sexo`, `setor`, `adm`, `cidade`, `hash_cracha`, `usuariocad`, `criado`, `usuarioalt`, `alterado`, `loginenvioemailsenha`, `chavesetsenha`, `datapedidochavesetsenha`, `datafeitonovasenha`, `dataenvioemailsenha`, `emailenviadosenha`, `resetsenha`, `dataresetsenha`, `date_alter_senha`, `lixeira`, `igreja_id`, `grupo_id`, `aceite_id`) VALUES
(1, 'sistema/imagens/22068876817/fotologin/04092021_rodolfo.jpeg', 'RODOLFO', 'ROMAIOLI RIBEIRO DE JESUS', '1981-02-07', '22068876817', 'adm@gmail.com', '2d55fcb231b8e4855dc515dd9487a0caafa9f18549c68a3230cdf386b5fc5bfc', 1, 11991091365, 1, 1, '3', 'JAÇANÃ', 'SÃO PAULO', '259da8e4f7ef0d085b2819c9ea7448b9b6b237c22b594c358c7002b2e8809983', 22068876817, '2024-06-14 01:09:47', '22068876817', '2024-06-14 22:23', NULL, NULL, NULL, NULL, '2022-07-26 02:28', 'NAO', 'NAO', NULL, '2024-06-13 23:36', 0, 23, 9, 1),
(2, 'sistema/imagens/padrao.jpg', 'TESTE', 'TESTADO', '2024-06-13', '12345678910', 'teste@gmail.com', '2d55fcb231b8e4855dc515dd9487a0caafa9f18549c68a3230cdf386b5fc5bfc', 1, 11987979878, 1, 0, NULL, 'JAÇANÃ', 'SÃO PAULO', '259da8e4f7ef0d085b2819c9ea7448b9b6b237c22b594c358c7002b2e8809983', 22068876817, '2024-06-13 22:53:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 8, 12, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id_alb`);

--
-- Índices de tabela `config_system`
--
ALTER TABLE `config_system`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `igrejas`
--
ALTER TABLE `igrejas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `menu_principal`
--
ALTER TABLE `menu_principal`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `menu_sub`
--
ALTER TABLE `menu_sub`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `menu_sub_sub`
--
ALTER TABLE `menu_sub_sub`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pag_system`
--
ALTER TABLE `pag_system`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `igrejas`
--
ALTER TABLE `igrejas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
