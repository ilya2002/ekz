-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2019 г., 22:21
-- Версия сервера: 5.5.63-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task-manager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_name` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `id_name`, `message`, `time`) VALUES
(16, 1, 'оооо', '2019-06-20 09:39:02'),
(17, 1, 'sa', '2019-06-20 10:49:44'),
(18, 1, 'sa', '2019-06-20 10:50:22'),
(19, 1, 'sa', '2019-06-20 10:50:37'),
(20, 1, 'хай всем', '2019-09-08 20:44:00'),
(21, 20, '123', '2019-10-04 13:28:00'),
(22, 20, '123', '2019-10-04 13:28:00'),
(25, 1, '123', '2019-10-04 20:29:00'),
(26, 1, '1sqwe', '2019-10-04 20:29:00'),
(27, 1, '1', '2019-10-04 20:29:00'),
(28, 1, '1123', '2019-10-04 20:29:00'),
(29, 1, '1123', '2019-10-04 20:39:00'),
(30, 1, '1123', '2019-10-04 20:40:00'),
(31, 1, 'привет\r\n', '2019-10-07 15:14:00'),
(32, 1, 'привет\r\n', '2019-10-07 15:14:00'),
(33, 20, 'привет', '2019-10-21 22:10:00'),
(34, 20, 'привет1111111111111111111111111111111111111', '2019-10-21 22:10:00'),
(35, 20, 'привет1111111111111111111111111111111111111йййййййййййййййййййййййййййййййййййййййй', '2019-10-21 22:10:00'),
(36, 20, 'привет1111111111111111111111111111111111111ййййййййййййййййййййййййййййййййййййййййячячсф', '2019-10-21 22:11:00');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_tasks` int(11) NOT NULL,
  `text` text NOT NULL,
  `otvet` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `id_tasks`, `text`, `otvet`) VALUES
(3, 8, 'Готово', NULL),
(4, 8, 'Готово', NULL),
(5, 8, 'djn', NULL),
(6, 8, 'djn', NULL),
(7, 9, 'ttt', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `file`
--

INSERT INTO `file` (`id`, `id_comment`, `file`) VALUES
(2, 5, 'Документ.docx'),
(3, 6, 'Документ.docx'),
(4, 7, 'sonata_arctica_ecliptica.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `authority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `name`, `authority`) VALUES
(2, 'Директор', 100),
(10, 'Зам. Директора', 90),
(11, 'Уборщик', 1),
(12, 'Веб-дизайнер', 65);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `process` varchar(11) NOT NULL,
  `emloyment` int(11) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `process`, `emloyment`, `start`, `end`) VALUES
(2, 'нирисуй муравья', 'нужен большой муравей', 'выполнено', 20, '2019-08-07', '2019-11-07'),
(3, 'нарисовать рисунок', 'нужен большой муравей', 'В работе', 20, '2019-08-07', '2019-12-07'),
(4, 'нарисовать рисунок', 'слона нарисуй', 'В работе', 20, '2019-10-07', '2019-11-07'),
(5, 'нарисовать рисунок', 'нужен большой муравей', 'выполнено', 20, '2019-07-07', '2019-10-07'),
(6, 'добудь угля', 'Рыжий - чёрт', 'переделать', 20, '2019-11-12', '2019-12-10'),
(7, 'dd', 'a', 'В работе', 20, '2019-07-10', '2019-12-10'),
(8, 'мой пол', 'в коридоре', 'В работе', 20, '2019-10-10', '2024-11-11');

-- --------------------------------------------------------

--
-- Структура таблицы `task_hirer`
--

CREATE TABLE `task_hirer` (
  `id` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_hirer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_hirer`
--

INSERT INTO `task_hirer` (`id`, `id_task`, `id_hirer`) VALUES
(3, 2, 18),
(4, 2, 18),
(5, 3, 18),
(6, 4, 18),
(7, 5, 18),
(8, 6, 18),
(9, 7, 18),
(10, 8, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `fio` varchar(100) NOT NULL,
  `email` text,
  `id_post` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fio`, `email`, `id_post`, `id_roles`) VALUES
(1, 'Admin', '1234', 'Admin', '', 2, 1),
(17, 'Leha', 'Leha', 'Алексей Иванов Дмитриевич', 'leha.3000@mail.ru', 10, 1),
(18, 'Nikita', 'Nikita', 'Никита Чебурашкин Генадьевич', 'о', 11, 2),
(20, 'Димас', 'Димас', 'Дмитрий Антонов Андреевич', 'dima@yandex.ru', 12, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_name` (`id_name`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_task` (`id_tasks`);

--
-- Индексы таблицы `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comment` (`id_comment`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `authority` (`authority`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emloyment` (`emloyment`);

--
-- Индексы таблицы `task_hirer`
--
ALTER TABLE `task_hirer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_task` (`id_task`),
  ADD KEY `id_hirer` (`id_hirer`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `post` (`id_post`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_roles` (`id_roles`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `task_hirer`
--
ALTER TABLE `task_hirer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_name`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_tasks`) REFERENCES `task_hirer` (`id`);

--
-- Ограничения внешнего ключа таблицы `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id`);

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`emloyment`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `task_hirer`
--
ALTER TABLE `task_hirer`
  ADD CONSTRAINT `task_hirer_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_hirer_ibfk_2` FOREIGN KEY (`id_hirer`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
