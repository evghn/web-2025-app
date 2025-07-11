-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MariaDB-11.2
-- Время создания: Июл 11 2025 г., 21:56
-- Версия сервера: 11.2.2-MariaDB
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`id`, `login`, `password`, `created_at`, `token`) VALUES
(11, 'user-1', '123', '2025-06-20 20:20:00', NULL),
(12, 'user-2', '123', '2025-06-20 20:20:00', NULL),
(13, 'user-3', '123', '2025-06-20 20:20:00', NULL),
(14, 'user-4', '123', '2025-06-20 20:20:00', NULL),
(15, 'user-5', '123', '2025-06-20 20:20:00', NULL),
(16, 'user-6', '123', '2025-06-20 20:20:00', NULL),
(17, 'user-7', '123', '2025-06-20 20:20:00', NULL),
(18, 'user-8', '123', '2025-06-20 20:20:00', NULL),
(19, 'user-9', '123', '2025-06-20 20:20:00', NULL),
(20, 'user-10', '123', '2025-06-20 20:20:00', NULL),
(27, 'user', '$2y$10$qmCYVMrZAz4aMqDN58zf8OL7IJEzFrNjm3lWcrWjR39uHymQjfa0W', '2025-07-04 20:48:28', NULL),
(28, 'q', '$2y$10$supKVIn1Y4eZ5MQW.vfwQu.sGgdXe9rkPU.hpJTgTDiC./HFaQNLm', '2025-07-07 20:36:10', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `account_role`
--

CREATE TABLE `account_role` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `account_role`
--

INSERT INTO `account_role` (`id`, `id_account`, `id_role`) VALUES
(1, 28, 2),
(2, 27, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `artical`
--

CREATE TABLE `artical` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `id_status` int(11) NOT NULL,
  `id_account` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `artical`
--

INSERT INTO `artical` (`id`, `name`, `content`, `created_at`, `id_status`, `id_account`) VALUES
(1, 'text - 1', 'content text - 1', '2025-06-23 19:39:06', 1, NULL),
(2, 'text - 1', 'content text - 1', '2025-06-23 21:12:27', 1, NULL),
(3, 'text - 1', 'content text - 1', '2025-06-23 21:16:44', 1, NULL),
(4, 'text - 1', 'content text - 1', '2025-06-23 21:18:07', 1, NULL),
(5, 'text - 1', 'content text - 1', '2025-06-23 21:19:57', 1, NULL),
(6, 'text - 1', 'content text - 1', '2025-06-23 21:21:08', 1, NULL),
(7, 'text - 1', 'content text - 1', '2025-06-23 21:22:00', 1, NULL),
(8, 'text - 1', 'content text - 1', '2025-06-23 21:26:01', 1, NULL),
(9, 'text - 2', 'content text - 2', '2025-06-23 21:26:01', 1, NULL),
(10, 'text - 1', 'content text - 1', '2025-06-23 21:27:03', 1, NULL),
(11, 'text - 2', 'content text - 2', '2025-06-23 21:27:03', 1, NULL),
(12, 'text - 3', 'content text - 3', '2025-06-23 21:27:03', 1, NULL),
(13, 'text - 4', 'content text - 4', '2025-06-23 21:27:03', 1, NULL),
(14, 'text - 5', 'content text - 5', '2025-06-23 21:27:03', 1, NULL),
(15, 'text - 6', 'content text - 6', '2025-06-23 21:27:03', 1, NULL),
(16, 'text - 7', 'content text - 7', '2025-06-23 21:27:03', 1, NULL),
(17, 'text - 8', 'content text - 8', '2025-06-23 21:27:03', 1, NULL),
(18, 'text - 9', 'content text - 9', '2025-06-23 21:27:03', 1, NULL),
(19, 'text - 10', 'content text - 10', '2025-06-23 21:27:03', 1, NULL),
(20, 'text - 1', 'content text - 1', '2025-06-23 21:27:49', 1, NULL),
(21, 'text - 2', 'content text - 2', '2025-06-23 21:27:49', 1, NULL),
(22, 'text - 3', 'content text - 3', '2025-06-23 21:27:49', 1, NULL),
(23, 'text - 4', 'content text - 4', '2025-06-23 21:27:50', 1, NULL),
(24, 'text - 5', 'content text - 5', '2025-06-23 21:27:50', 1, NULL),
(25, 'text - 6', 'content text - 6', '2025-06-23 21:27:50', 1, NULL),
(26, 'text - 7', 'content text - 7', '2025-06-23 21:27:50', 1, NULL),
(27, 'text - 8', 'content text - 8', '2025-06-23 21:27:50', 1, NULL),
(28, 'text - 9', 'content text - 9', '2025-06-23 21:27:50', 1, NULL),
(29, 'text - 10', 'content text - 10', '2025-06-23 21:27:50', 1, NULL),
(30, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:35:54', 4, 28),
(31, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:42:23', 4, 28),
(32, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:42:41', 1, 28),
(33, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:43:01', 4, 28),
(34, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:43:19', 4, 28),
(35, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:43:37', 1, 28),
(36, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:44:39', 1, 28),
(37, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:45:52', 1, 28),
(38, 'Статья 1', 'ячапыквупфвкп', '2025-07-09 19:51:31', 1, 28),
(39, 'новая статья', 'фыуафыафываы', '2025-07-11 20:26:19', 1, 28);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Новая'),
(2, 'Для редактирования'),
(3, 'На модерации'),
(4, 'Готова'),
(5, 'Отменена');

-- --------------------------------------------------------

--
-- Структура таблицы `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `topic`
--

INSERT INTO `topic` (`id`, `name`, `description`) VALUES
(1, 'Животные', NULL),
(2, 'Погода', NULL),
(3, 'Новости', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `topic_artical`
--

CREATE TABLE `topic_artical` (
  `id` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_artical` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `topic_artical`
--

INSERT INTO `topic_artical` (`id`, `id_topic`, `id_artical`) VALUES
(1, 1, 6),
(2, 2, 5),
(3, 1, 8),
(5, 1, 20),
(6, 3, 21),
(7, 3, 22),
(8, 3, 23),
(9, 1, 24),
(10, 1, 25),
(11, 2, 26),
(12, 1, 27),
(13, 3, 28),
(14, 1, 29),
(15, 1, 38),
(17, 1, 30),
(18, 1, 31),
(19, 1, 32),
(20, 1, 33),
(21, 1, 34),
(22, 1, 35),
(23, 1, 36),
(24, 1, 37),
(25, 1, 39);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `bddate` date NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `bio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `id_account`, `name`, `surname`, `bddate`, `sex`, `bio`) VALUES
(11, 11, 'user-name-1', 'user-surname-1', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(12, 12, 'user-name-2', 'user-surname-2', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(13, 13, 'user-name-3', 'user-surname-3', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(14, 14, 'user-name-4', 'user-surname-4', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(15, 15, 'user-name-5', 'user-surname-5', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(16, 16, 'user-name-6', 'user-surname-6', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(17, 17, 'user-name-7', 'user-surname-7', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(18, 18, 'user-name-8', 'user-surname-8', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(19, 19, 'user-name-9', 'user-surname-9', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(20, 20, 'user-name-10', 'user-surname-10', '2000-01-01', NULL, 'sg klsdj lakdjs fljds flkjas dflkjas df'),
(24, 27, 'user name', 'surname', '2025-07-04', NULL, 'bio text'),
(25, 28, 'q', 'surname', '2025-07-07', NULL, 'bio text');

-- --------------------------------------------------------

--
-- Структура таблицы `userartical`
--

CREATE TABLE `userartical` (
  `id_user` int(11) NOT NULL,
  `id_articals` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `account_role`
--
ALTER TABLE `account_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topic_artical`
--
ALTER TABLE `topic_artical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artical` (`id_artical`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user__id_account` (`id_account`);

--
-- Индексы таблицы `userartical`
--
ALTER TABLE `userartical`
  ADD PRIMARY KEY (`id_user`,`id_articals`),
  ADD KEY `idx_userartical__id_articals` (`id_articals`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `account_role`
--
ALTER TABLE `account_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `artical`
--
ALTER TABLE `artical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `topic_artical`
--
ALTER TABLE `topic_artical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `account_role`
--
ALTER TABLE `account_role`
  ADD CONSTRAINT `account_role_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `artical`
--
ALTER TABLE `artical`
  ADD CONSTRAINT `artical_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `topic_artical`
--
ALTER TABLE `topic_artical`
  ADD CONSTRAINT `topic_artical_ibfk_1` FOREIGN KEY (`id_artical`) REFERENCES `artical` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_artical_ibfk_2` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user__id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `userartical`
--
ALTER TABLE `userartical`
  ADD CONSTRAINT `fk_userartical__id_articals` FOREIGN KEY (`id_articals`) REFERENCES `artical` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userartical__id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
