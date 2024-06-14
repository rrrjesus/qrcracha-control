-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/06/2024 às 06:22
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
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(2) NOT NULL,
  `description` varchar(75) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `grupos`
--

INSERT INTO `grupos` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Doações e Coletas', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(2, 'Compra de Insumos e Alimentação', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(3, 'Refeitórios', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(4, 'Brigada e Primeiros Socorros', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(5, 'Segurança e Trânsito', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(6, 'Limpeza e Organização das Casas de oração', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(7, 'Manutenção Som  - Ar Condicionado', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(8, 'Gráfica Suporte de Papelaria', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(9, 'Processamento de Dados, T.i, Emissão fichas, Credenciamento(Crachás), Telão', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(10, 'Apoio aos Grupos de Visitas (outras Localidades)', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(11, 'Libras', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(12, 'Orquestras Músicos', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(13, 'Orientação Geral, Apoio aos GT\'s', '2024-06-14 03:16:18', '2024-06-14 03:16:18'),
(14, 'Apoio aos servos de Deus nos Cultos', '2024-06-14 03:16:18', '2024-06-14 03:16:18');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
