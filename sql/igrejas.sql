-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/06/2024 às 06:20
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
-- Banco de dados: `u136567021_st11control`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `igrejas`
--

CREATE TABLE `igrejas` (
  `id` int(11) NOT NULL,
  `igrejas` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `igrejas`
--

INSERT INTO `igrejas` (`id`, `igrejas`, `created_at`, `updated_at`) VALUES
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

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `igrejas`
--
ALTER TABLE `igrejas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `igrejas`
--
ALTER TABLE `igrejas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
