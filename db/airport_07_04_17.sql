-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 06 2017 г., 18:53
-- Версия сервера: 10.0.29-MariaDB
-- Версия PHP: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `airport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bilet`
--

CREATE TABLE IF NOT EXISTS `bilet` (
  `id` int(11) NOT NULL,
  `id_reis` int(11) NOT NULL,
  `id_stoim` int(11) NOT NULL,
  `id_passajir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'Эконом класс'),
(2, 'Бизнес класс'),
(3, 'Первый класс');

-- --------------------------------------------------------

--
-- Структура таблицы `gorod`
--

CREATE TABLE IF NOT EXISTS `gorod` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gorod`
--

INSERT INTO `gorod` (`id`, `name`) VALUES
(1, 'Самара'),
(2, 'Екатеринбург'),
(3, 'Москва'),
(4, 'Ростов на Дону'),
(5, 'Уфа'),
(6, 'Хабаровск');

-- --------------------------------------------------------

--
-- Структура таблицы `passajir`
--

CREATE TABLE IF NOT EXISTS `passajir` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `date_rojden` date NOT NULL,
  `num_pasport` varchar(25) NOT NULL,
  `pol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `reis`
--

CREATE TABLE IF NOT EXISTS `reis` (
  `id_reis` int(11) NOT NULL,
  `date_time_vilet` datetime NOT NULL,
  `date_time_posadka` datetime NOT NULL,
  `id_gorod_vilet` int(11) NOT NULL,
  `id_gorod_posadka` int(11) NOT NULL,
  `id_samolet` int(11) NOT NULL,
  `colvo_mest` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reis`
--

INSERT INTO `reis` (`id_reis`, `date_time_vilet`, `date_time_posadka`, `id_gorod_vilet`, `id_gorod_posadka`, `id_samolet`, `colvo_mest`) VALUES
(2, '2017-03-30 18:03:14', '2017-03-30 16:03:14', 2, 1, 10, 11),
(3, '2017-03-29 18:03:57', '2017-03-29 18:03:57', 3, 1, 17, 23),
(4, '2017-03-30 18:03:54', '2017-03-31 19:03:54', 1, 3, 9, 500),
(6, '2017-04-03 16:44:59', '2017-04-04 09:09:59', 1, 2, 11, 300),
(7, '2017-04-03 16:49:03', '2017-04-11 13:13:03', 1, 2, 5, 100),
(8, '2017-04-03 17:17:21', '2017-04-03 19:19:21', 1, 1, 17, 23),
(9, '2017-04-08 09:11:28', '2017-04-08 19:15:28', 1, 2, 11, 300),
(10, '2017-04-08 14:14:04', '2017-04-20 18:18:04', 1, 2, 5, 100),
(11, '2017-04-08 10:10:22', '2017-04-08 06:06:23', 2, 1, 13, 0),
(12, '2017-04-08 14:14:38', '2017-04-28 19:15:38', 2, 1, 12, 234),
(13, '2017-04-08 13:13:35', '2017-04-09 01:01:35', 1, 2, 3, 158),
(14, '2017-04-08 06:06:15', '2017-04-08 23:23:15', 1, 2, 4, 214),
(15, '2017-04-08 02:02:55', '2017-04-08 14:14:55', 1, 2, 2, 80);

-- --------------------------------------------------------

--
-- Структура таблицы `samolet`
--

CREATE TABLE IF NOT EXISTS `samolet` (
  `id` int(11) NOT NULL,
  `bort_num` varchar(256) DEFAULT NULL,
  `model` varchar(256) DEFAULT NULL,
  `company` varchar(256) DEFAULT NULL,
  `date_vipusk` varchar(256) DEFAULT NULL,
  `colvo_mest` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `samolet`
--

INSERT INTO `samolet` (`id`, `bort_num`, `model`, `company`, `date_vipusk`, `colvo_mest`) VALUES
(2, 'RA-85684', 'Туполев Ту-134', 'Северный ветер', '----', 80),
(3, 'RA-85714', 'Туполев Ту-154 ', 'Балтийский берег', '---', 158),
(4, 'RA-82964', 'Туполев Ту-204', 'Аэрофлот', '---', 214);

-- --------------------------------------------------------

--
-- Структура таблицы `stoimost`
--

CREATE TABLE IF NOT EXISTS `stoimost` (
  `id` int(11) NOT NULL,
  `id_reis` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `sum` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stoimost`
--

INSERT INTO `stoimost` (`id`, `id_reis`, `id_class`, `sum`) VALUES
(1, 13, 3, '15900.00'),
(2, 13, 1, '4850.00'),
(3, 14, 2, '7630.00'),
(4, 15, 2, '8100.00'),
(6, 14, 3, '16000.00'),
(7, 14, 1, '5100.79');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(256) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `priv` int(1) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `pass`, `status`, `priv`, `email`, `tel`, `last_time`) VALUES
(34, 'Администратор', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 0, 'sabashlive@gmail.com', '----', '2017-04-06 20:51:50'),
(35, 'Сергеев Артём Николаевич', 'U2', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-10-03 11:19:29'),
(36, 'Каплин Сергей Вячеславович', 'U', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-09-09 14:37:27'),
(38, 'Координатор', 'K', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 1, 'sabashlive@gmail.com', '123', '2016-09-28 09:57:59'),
(42, 'Гришкова Алла Михайловна', 'U3', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-06-08 11:21:52'),
(44, 'Исполнитель', 'I', '0822e8ed92c42f678825aa67e6b1f8e130941230', 1, 2, 'sabashlive@gmail.com', '123', '2016-05-30 11:58:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bilet`
--
ALTER TABLE `bilet`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gorod`
--
ALTER TABLE `gorod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `passajir`
--
ALTER TABLE `passajir`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reis`
--
ALTER TABLE `reis`
  ADD PRIMARY KEY (`id_reis`);

--
-- Индексы таблицы `samolet`
--
ALTER TABLE `samolet`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stoimost`
--
ALTER TABLE `stoimost`
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
-- AUTO_INCREMENT для таблицы `bilet`
--
ALTER TABLE `bilet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `gorod`
--
ALTER TABLE `gorod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `passajir`
--
ALTER TABLE `passajir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `reis`
--
ALTER TABLE `reis`
  MODIFY `id_reis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `samolet`
--
ALTER TABLE `samolet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `stoimost`
--
ALTER TABLE `stoimost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
