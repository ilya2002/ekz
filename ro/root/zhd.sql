-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 06 2019 г., 12:08
-- Версия сервера: 5.6.34
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zhd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_train` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_train`, `id_sender`, `text`) VALUES
(1, 41, 1, 'Test'),
(2, 41, 1, 'Test1');

-- --------------------------------------------------------

--
-- Структура таблицы `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `station`
--

INSERT INTO `station` (`id`, `name`) VALUES
(4, 'Санкт-Петербург'),
(5, 'Москва'),
(6, 'Киев'),
(7, 'Нижний Новгород'),
(8, 'Казань'),
(9, 'Минск'),
(10, 'Воронеж');

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `fio` text NOT NULL,
  `passport` text NOT NULL,
  `birthday` text NOT NULL,
  `phone` text NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `price` text NOT NULL,
  `id_traintype` int(11) NOT NULL,
  `id_tickettype` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `status` text NOT NULL,
  `date_buy` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `card` text,
  `cvc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `fio`, `passport`, `birthday`, `phone`, `id_from`, `id_to`, `price`, `id_traintype`, `id_tickettype`, `date_start`, `date_end`, `status`, `date_buy`, `id_user`, `card`, `cvc`) VALUES
(1, 'Иванов Иван Иванович', '40 05', '2019-06-06', '88009001010', 4, 5, '1800', 3, 1, '2019-06-06 10:00:00', '2019-06-06 15:30:00', 'Покупка', '2019-06-06 10:01:40', NULL, '123123123', '123'),
(2, 'Юзеров Юзер Юзерович', '40 08', '2019-05-27', '88009001010', 5, 4, '8000', 5, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 10:09:02', 8, '89111981273', '123'),
(3, 'Иванов Иван Иванович', '40 05', '2019-05-27', '88009001010', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 10:08:39', 8, '123123', '123'),
(4, 'Юзеров Юзер Юзерович', '40 05', '2000-06-07', '88029301011', 8, 4, '1800', 3, 1, '2019-06-07 02:15:00', '2019-06-07 09:30:00', 'Продано', '2019-06-06 10:43:07', 8, '34311256782', '437'),
(5, 'Иванов Иван Иванович', '123', '2019-06-05', '123', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 11:48:09', NULL, '123', '123'),
(6, '123', '123', '2019-05-29', '123', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 12:11:43', 1, '123', '123'),
(8, '123', '123', '2019-06-01', '123', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 12:33:03', 1, '123', '123'),
(9, '123', '123', '2019-06-04', '123', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 12:33:51', NULL, '123', '123'),
(11, '123', '123', '2019-05-29', '123', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 12:45:49', NULL, '123', '123'),
(12, '123', '123', '2019-06-11', '123', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 12:47:32', NULL, '123', '123'),
(13, 'Иванов Иван Иванович', '40 05', '2019-06-05', '88009001010', 5, 4, '1800', 3, 1, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 'Покупка', '2019-06-06 13:40:05', NULL, '73883718', '925');

-- --------------------------------------------------------

--
-- Структура таблицы `tickettype`
--

CREATE TABLE `tickettype` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tickettype`
--

INSERT INTO `tickettype` (`id`, `name`) VALUES
(1, 'Взрослый'),
(2, 'Детский');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `id_train` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `id_train`, `id_from`, `id_to`, `date_start`, `date_end`, `count`) VALUES
(10, 37, 4, 5, '2019-06-06 10:00:00', '2019-06-06 15:30:00', 50),
(11, 37, 5, 4, '2019-06-06 23:00:00', '2019-06-07 06:00:00', 15),
(12, 39, 4, 6, '2019-06-07 00:00:00', '2019-06-07 09:00:00', 48),
(13, 40, 6, 4, '2019-06-07 05:00:00', '2019-06-07 12:00:00', 50),
(14, 41, 6, 5, '2019-06-07 00:00:00', '2019-06-07 10:15:00', 50),
(15, 41, 4, 10, '2019-06-06 12:00:00', '2019-06-06 20:00:00', 50),
(16, 40, 4, 8, '2019-06-07 00:00:00', '2019-06-07 10:30:00', 49),
(17, 39, 4, 7, '2019-06-06 05:45:00', '2019-06-06 15:30:00', 50),
(18, 39, 8, 4, '2019-06-07 02:15:00', '2019-06-07 09:30:00', 48);

-- --------------------------------------------------------

--
-- Структура таблицы `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `info` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `train`
--

INSERT INTO `train` (`id`, `name`, `info`, `image`) VALUES
(37, 'Сапсан', 'Электропоезд.\r\n\r\n<b>Схема компоновки вагонов:</b>\r\n\r\nВерхний — односистемный поезд серии ЭВС1 на постоянном токе напряжением 3 кВ (версия B1) .\r\nНижний — двухсистемный поезд серии ЭВС2 на постоянном токе напряжением 3 кВ и на переменном токе напряжением 25 кВ частотой 50 Гц (версия B2) .\r\nГПм — Головной вагон, первый класс, моторный, 23 места (в том числе 4 в VIP-отсеке) + диван на 3 места.\r\nГТм — Головной вагон, туристический (третий) класс, моторный, 51 место (в том числе 7 в детском отсеке) + детская люлька.\r\nДБ — Дроссельный, бизнес (второй) класс, прицепной, 52 места.\r\nДТ — Дроссельный, туристический класс, прицепной, 66 мест.\r\nТ — Туристический класс, прицепной, 66 мест.\r\nТТр — Туристический класс, с трансформатором для переменного тока, прицепной, 66 мест.\r\nТм — Туристический класс, моторный, 66 мест,\r\nТа — Туристический класс, аккумуляторный, тормозные резисторы на крыше, прицепной, 60 мест.\r\nТаБ — Туристический класс, аккумуляторный, тормозные резисторы на крыше, с бистро (ресторан), прицепной, 40 мест + столики у барной стойки.\r\n\r\nКонструкционная скорость поезда составляет 250 км/ч, эксплуатационная скорость ограничена 230 км/ч. Большую часть пути Москва — Санкт-Петербург поезд следует с максимальной скоростью 200 км/ч; на участке Окуловка — Мстинский мост — до 250 км/ч.', 'upload/sapsan.jpg'),
(39, 'Ласточка', 'Электропоезд.\r\n\r\nКоличество дверей в вагоне — 2×2;\r\n\r\n<b>Число сидячих мест	пятивагонного состава:</b>\r\n443 (ЭС1 пригородный);\r\n340 (ЭС1 премиум);\r\n386/416 (ЭС2Г пригородный);\r\n346 (ЭС2Г городской);\r\n349 (ЭС1П и ЭС2ГП);\r\n\r\n<b>Длина состава по осям сцепок:</b>\r\nпятивагонного — 26 462 мм;\r\nсемивагонного — 176 062 мм;\r\n\r\n<b>Длина вагона	по осям сцепок:</b>\r\nголовной — 26 031 мм;\r\nпромежуточный — 24 800 мм;\r\nШирина — 3480 мм;\r\nВысота — 4850 мм;\r\nВысота пола — 1400 мм;\r\nДиаметр колёс — 920 - 840 мм;\r\nШирина колеи — 1520 мм;\r\n\r\n<b>Масса тары пятивагонного состава:</b>\r\nЭС1: 264,0 т;\r\nЭС1П: 274,0 т;\r\nЭС2Г: 260,2 т;\r\nЭС2ГП: 270,2 т;\r\n\r\nНагрузка от оси на рельсы — 20 тс (максимальная);\r\n\r\nМатериал вагона — алюминий;\r\n\r\n<b>Выходная мощность	пятивагонного состава:</b>\r\nЭС1: 2550 кВт;\r\nЭС2Г: 2932 кВт;\r\n\r\nТип ТЭД — асинхронный двигатель;\r\n\r\n<b>Мощность ТЭД:</b>\r\nЭС1: 318,75 кВт;\r\nЭС2Г: 366,5 кВт;\r\n\r\nКонструкционная скорость — 160 км/ч;\r\n\r\nУскорение при пуске — 0,64 м/с²;\r\n\r\nЭлектрическое торможение	— рекуперативно-реостатное;\r\n\r\nСистема тяги	асинхронный IGBT-привод;\r\n\r\nТормозная система — пневматическая,  электрическая;', 'upload/lasto4ka.jpg'),
(40, 'Стриж', 'Страна постройки — Испания;\r\n\r\nИзготовитель — Patentes Talgo S.L.;\r\n\r\nСоставов построено: 7;\r\nВагонов построено: 140;\r\n\r\nМодель вагонов — Talgo Intercity;\r\n\r\nШирина колеи — 1520/1435 мм;\r\n\r\n<b>Осевая формула:</b>\r\nТехнический вагон: (1-0.5);\r\nпромежуточный вагон: (0.5-0.5);\r\n\r\nКонструкционная скорость — 200 км/ч;\r\n\r\nЧисло вагонов в составе: 20 (18 пассажирских и 2 технических);\r\n\r\n<b>Типы вагонов: </b>\r\nсидячие, купе, СВ, ресторан, буфет, технические;\r\n\r\nКомпозиция — Т+18П+Т;\r\n\r\n<b>Длина вагона: </b>\r\n13 300 мм для промежуточных вагонов;\r\n12 200 для технических;\r\n\r\nШирина — 2941 мм;\r\n\r\nКоличество дверей в вагоне:	1 или 2, в зависимости от типа вагона;\r\n\r\nНагрузка от оси на рельсы — 21 т;\r\n\r\nМатериал вагона — алюминиевый сплав;\r\n\r\nТормозная система — пневмогидравлическая;\r\n\r\nСистема отопления — электрическая;', 'upload/strizh.jpg'),
(41, 'Иволга', '<b>Типы вагонов:</b>\r\nПг, Мп, Пп;\r\n\r\n<b>Число вагонов в составе:</b>\r\n5, 6 (выпускаемая);\r\n4…14 (возможная);\r\n\r\n<b>Композиция фактические:</b>\r\nПг+3Мп+Пг (исп. 4496.00.00.000));\r\nПг+2Мп+Пп+Пг (исп. 4496.00.00.000-01);\r\nПг+Мп+Пп+2Мп+Пг (серийные 6-вагонные);\r\n\r\n<b>Число сидячих мест: </b>\r\nвагоны Пг: 24 / 28;\r\nвагоны Мп, Пп: 58 / 68;\r\n\r\nПассажировместимость: 1638 (5-вагонный состав);\r\n\r\n<b>Длина состава: </b>\r\n116 000 мм (5 вагонов);\r\n138 800 мм (6 вагонов);\r\n\r\n<b>Длина вагона: </b>\r\nвагона Пг: 23 800 мм;\r\nвагонов Мп, Пп: 22 800 мм;\r\n\r\nШирина — 3480 мм;\r\nВысота пола — 1320 мм;\r\n\r\nПолная колёсная база вагона — 17 600 мм;\r\nРасстояние между шкворнями тележек — 15 000 мм;\r\nКолёсная база тележек — 2600 мм;\r\nШирина колеи — 1520 мм;\r\n\r\n<b>Масса тары:</b>\r\nвагона Пг: 55,55 т;\r\nвагона Мп: 56,9 т;\r\nвагона Пп: 46,3 т;\r\n\r\nМатериал вагона — нержавеющая сталь;\r\n\r\n<b>Выходная мощность: </b>\r\n3600 кВт (5 или 6 вагонов, 3 Мп);\r\n2400 кВт (5 вагонов, 2 Мп);\r\n\r\nТип ТЭД — асинхронный;\r\nМощность ТЭД — 4x300 кВт;\r\n\r\nКонструкционная скорость — 160 км/ч;\r\nМаксимальная служебная скорость — 120 или 160 км/ч[к 2];\r\nУскорение при пуске — до 60 км/ч;\r\n\r\nЭлектрическое торможение — рекуперативно-реостатное;\r\nСистема тяги	частотно-регулируемый — асинхронный привод;\r\n\r\n<b>Тормозная система:</b>\r\nпневматическая;\r\nэлектро-пневматическая;\r\n электрическая;\r\n\r\nСистемы безопасности — БЛОК, ТСКБМ;', 'upload/ivolga.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `traintype`
--

CREATE TABLE `traintype` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `traintype`
--

INSERT INTO `traintype` (`id`, `name`, `price`) VALUES
(3, 'Плацкарт', '1800'),
(4, 'Купейный', '3000'),
(5, 'Люкс', '8000');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` text NOT NULL,
  `login` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `mail`, `password`) VALUES
(1, 'Громов Егор Игоревич', 'admin', 'admin@mail.ru', 'admin'),
(4, '123', '123', '123@mail.ru', '123'),
(5, '2', '2', '2@mail.ru', '2'),
(6, 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff@f.rui', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff'),
(7, 'Артемыч артемов артемович', 'ААА', 'AAA@artem.ar', 'ААА'),
(8, 'Юзеров Юзер Юзерович', 'user', 'user_turbo@mail.ru', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_train` (`id_train`),
  ADD KEY `id_sender` (`id_sender`);

--
-- Индексы таблицы `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_to` (`id_to`),
  ADD KEY `id_from` (`id_from`),
  ADD KEY `id_traintype` (`id_traintype`),
  ADD KEY `id_tickettype` (`id_tickettype`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `tickettype`
--
ALTER TABLE `tickettype`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_train` (`id_train`),
  ADD KEY `id_from` (`id_from`),
  ADD KEY `id_to` (`id_to`);

--
-- Индексы таблицы `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `traintype`
--
ALTER TABLE `traintype`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tickettype`
--
ALTER TABLE `tickettype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `traintype`
--
ALTER TABLE `traintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_train`) REFERENCES `train` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_sender`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_from`) REFERENCES `station` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_to`) REFERENCES `station` (`id`),
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`id_traintype`) REFERENCES `traintype` (`id`),
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`id_tickettype`) REFERENCES `tickettype` (`id`),
  ADD CONSTRAINT `ticket_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`id_from`) REFERENCES `station` (`id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`id_to`) REFERENCES `station` (`id`),
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`id_train`) REFERENCES `train` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
