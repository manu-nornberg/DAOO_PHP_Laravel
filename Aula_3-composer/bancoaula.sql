-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Dez-2023 às 21:10
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancoaula`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `user_id`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `created_at`, `updated_at`) VALUES
(1, 1, 'Largo Guilherme Ortiz', '1072', 'Street', 'Corona d\'Oeste', 'Pará', '65109-605', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(2, 1, 'Rua Constância Souza', '33', 'Street', 'Vila Amélia d\'Oeste', 'Maranhão', '64713-019', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(3, 2, 'Av. Deivid Perez', '5373', 'Street', 'Zamana do Norte', 'Distrito Federal', '88100-633', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(4, 2, 'Largo Eva Toledo', '4', 'Street', 'Delatorre do Sul', 'Minas Gerais', '87389-803', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(5, 3, 'Av. Maria', '6', 'Street', 'Luara do Norte', 'Pernambuco', '02463-714', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(6, 3, 'Avenida Salas', '1', 'Street', 'Fernando do Leste', 'Acre', '54357-993', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(7, 4, 'Largo Emília Verdara', '931', 'Street', 'Verdara do Sul', 'Maranhão', '09425-709', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(8, 4, 'Avenida Allison Barros', '1', 'Street', 'Santa Carolina do Sul', 'Pará', '03610-337', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(9, 5, 'Avenida Salas', '78', 'Street', 'Porto João do Sul', 'Paraná', '42845-688', '2023-12-19 22:55:26', '2023-12-19 22:55:26'),
(10, 5, 'Avenida Montenegro', '508', 'Street', 'César do Leste', 'Sergipe', '57153-388', '2023-12-19 22:55:26', '2023-12-19 22:55:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_24_213939_create_produtos_table', 1),
(6, '2023_09_28_203926_create_transportadoras_table', 1),
(7, '2023_10_06_131526_create_enderecos_table', 1),
(8, '2023_10_20_010420_create_pedidos_table', 1),
(9, '2023_10_27_132126_produto_pedido', 1),
(10, '2023_12_18_132347_create_roles_table', 1),
(11, '2023_12_18_134427_create_role_user', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transportadora_id` bigint(20) UNSIGNED NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `valor_total` varchar(255) NOT NULL,
  `data_pedido` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `transportadora_id`, `quantidade`, `status`, `valor_total`, `data_pedido`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '0', '505.75', '2007-04-11', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(2, 1, 2, '3', '0', '62.25', '1997-02-18', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(3, 2, 1, '2', '1', '394.58', '1980-03-07', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(4, 2, 1, '10', '1', '220.36', '1987-10-29', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(5, 3, 2, '4', '0', '18.22', '1999-05-07', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(6, 3, 2, '6', '1', '765.41', '1983-09-02', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(7, 4, 1, '9', '1', '9.19', '2006-03-11', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(8, 4, 1, '2', '0', '569.87', '1977-12-22', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(9, 5, 1, '7', '1', '525.63', '1993-09-25', '2023-12-19 22:55:26', '2023-12-19 22:55:26'),
(10, 5, 1, '2', '1', '769.06', '1974-04-18', '2023-12-19 22:55:26', '2023-12-19 22:55:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `produto_id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` bigint(20) UNSIGNED NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`produto_id`, `pedido_id`, `quantidade`, `created_at`, `updated_at`) VALUES
(1, 1, '2', NULL, NULL),
(1, 2, '2', NULL, NULL),
(1, 3, '2', NULL, NULL),
(1, 4, '2', NULL, NULL),
(1, 5, '2', NULL, NULL),
(1, 6, '2', NULL, NULL),
(1, 7, '2', NULL, NULL),
(1, 8, '2', NULL, NULL),
(1, 9, '2', NULL, NULL),
(1, 10, '2', NULL, NULL),
(2, 1, '2', NULL, NULL),
(2, 2, '2', NULL, NULL),
(2, 3, '2', NULL, NULL),
(2, 4, '2', NULL, NULL),
(2, 5, '2', NULL, NULL),
(2, 6, '2', NULL, NULL),
(2, 7, '2', NULL, NULL),
(2, 8, '2', NULL, NULL),
(2, 9, '2', NULL, NULL),
(2, 10, '2', NULL, NULL),
(3, 1, '2', NULL, NULL),
(3, 2, '2', NULL, NULL),
(3, 3, '2', NULL, NULL),
(3, 4, '2', NULL, NULL),
(3, 5, '2', NULL, NULL),
(3, 6, '2', NULL, NULL),
(3, 7, '2', NULL, NULL),
(3, 8, '2', NULL, NULL),
(3, 9, '2', NULL, NULL),
(3, 10, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `created_at`, `updated_at`, `nome`, `descricao`, `preco`) VALUES
(1, '2023-12-19 22:55:25', '2023-12-19 22:55:25', 'hic', 'Voluptas molestiae autem et dicta et sed.', '6.15'),
(2, '2023-12-19 22:55:25', '2023-12-19 22:55:25', 'esse', 'Qui voluptates illum eveniet magni qui.', '6.44'),
(3, '2023-12-19 22:55:25', '2023-12-19 22:55:25', 'dolores', 'Eligendi aut a quam aut exercitationem.', '1.79');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadoras`
--

CREATE TABLE `transportadoras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` text NOT NULL,
  `cidade` text NOT NULL,
  `telefone` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transportadoras`
--

INSERT INTO `transportadoras` (`id`, `nome`, `cidade`, `telefone`, `created_at`, `updated_at`) VALUES
(1, 'Salas e Associados', 'Santa Silvana do Leste', '(98) 94134-9670', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(2, 'Verdara-Fonseca', 'Gil d\'Oeste', '(34) 3062-8590', '2023-12-19 22:55:25', '2023-12-19 22:55:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `cpf`, `status`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Caio Vila', 'livia.velasques@example.net', '2023-12-19 22:55:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '540.828.290-24', 0, 0, 'nTwGRdZp9E', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(2, 'Tábata Miriam Valência Filho', 'viviane.marinho@example.org', '2023-12-19 22:55:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '481.841.616-97', 1, 0, 'rng4fI10Oz', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(3, 'Cauan Serna Neto', 'romero.maximiano@example.org', '2023-12-19 22:55:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '983.211.505-19', 1, 0, 'oRCstcpj7N', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(4, 'Dr. Alonso Ramos Gusmão', 'acruz@example.net', '2023-12-19 22:55:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '204.639.757-66', 0, 0, 'oysRjgyjV3', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(5, 'Denis Chaves Ferminiano', 'tessalia.pacheco@example.net', '2023-12-19 22:55:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '824.547.110-01', 1, 0, 'aA5kyjfhm0', '2023-12-19 22:55:25', '2023-12-19 22:55:25'),
(6, 'admin', 'admin@gmail.com', '2023-12-19 22:55:26', '$2y$10$B02wyrz5ikHymE3mH5QanebEwktc0sYgpJTebLunrct/gF8T2bidG', '123456', 0, 0, 'bP7YUYNpdL', '2023-12-19 22:55:26', '2023-12-19 22:55:26'),
(7, 'manager', 'manager@gmail.com', '2023-12-19 22:55:26', '$2y$10$GtuO3NqLeSjJ0BrN3g3ocOlOdYzoNKGdIkfGxFC7J7d96MDldzo3O', '123456', 0, 0, 'itxrlL9UGy', '2023-12-19 22:55:26', '2023-12-19 22:55:26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enderecos_user_id_foreign` (`user_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_user_id_foreign` (`user_id`),
  ADD KEY `pedidos_transportadora_id_foreign` (`transportadora_id`);

--
-- Índices para tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`produto_id`,`pedido_id`),
  ADD KEY `pedido_produto_pedido_id_foreign` (`pedido_id`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Índices para tabela `transportadoras`
--
ALTER TABLE `transportadoras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transportadoras`
--
ALTER TABLE `transportadoras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_transportadora_id_foreign` FOREIGN KEY (`transportadora_id`) REFERENCES `transportadoras` (`id`),
  ADD CONSTRAINT `pedidos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `pedido_produto_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `pedido_produto_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
