-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 17 2017 г., 12:42
-- Версия сервера: 10.0.27-MariaDB
-- Версия PHP: 5.6.1

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
-- Структура таблицы `gorod`
--

CREATE TABLE IF NOT EXISTS `gorod` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gorod`
--

INSERT INTO `gorod` (`id`, `name`) VALUES
(1, 'Самара'),
(2, 'Екатеринбург'),
(3, 'Москва');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reis`
--

INSERT INTO `reis` (`id_reis`, `date_time_vilet`, `date_time_posadka`, `id_gorod_vilet`, `id_gorod_posadka`, `id_samolet`, `colvo_mest`) VALUES
(1, '2009-04-30 10:09:00', '2009-04-30 10:09:00', 2, 3, 9, 11);

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
(2, '----', '---', '----', '----', 155),
(3, '55', '55', '55', '55', 100),
(4, '777', '777', '777', '777', 100),
(5, 'епукм', 'кепм', 'укепм', 'укепм', 100),
(7, 'йй', 'йй', 'йй', 'йй', 100),
(8, 'wsdf', 'sdf', 'asdf', 'asdf', 0),
(9, 'asdf', 'asdf', 'asdf', 'asdf', 500),
(10, 'sdfg', 'sdfg', 'sdfg', 'sdfg', 500),
(11, 'dfg', 'dfg', 'gfd', 'sdfg', 300),
(12, 'sdf', 'qwer', 'qwer', 'qwer', 234),
(13, 'qwef', 'qwef', 'qwef', 'wqef', 0),
(14, 'его', 'екнг', 'кенг', 'кенг', 300),
(15, 'кен', 'укен', 'укен', 'укен', 300),
(16, 'ывап', 'ывап', 'ывап', 'ывап', 300),
(17, 'вап', 'ывап', 'выап', 'ывап', 23),
(18, 'фыва', 'фыва', 'фыва', 'фыва', 300),
(19, 'фыва', 'фыва', 'фыва', 'ыфва', 300);

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
(34, 'Администратор', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 0, 'sabashlive@gmail.com', '----', '2017-03-17 13:33:50'),
(35, 'Сергеев Артём Николаевич', 'U2', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-10-03 11:19:29'),
(36, 'Каплин Сергей Вячеславович', 'U', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-09-09 14:37:27'),
(38, 'Координатор', 'K', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 1, 'sabashlive@gmail.com', '123', '2016-09-28 09:57:59'),
(42, 'Гришкова Алла Михайловна', 'U3', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-06-08 11:21:52'),
(44, 'Исполнитель', 'I', '0822e8ed92c42f678825aa67e6b1f8e130941230', 1, 2, 'sabashlive@gmail.com', '123', '2016-05-30 11:58:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gorod`
--
ALTER TABLE `gorod`
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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gorod`
--
ALTER TABLE `gorod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `reis`
--
ALTER TABLE `reis`
  MODIFY `id_reis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `samolet`
--
ALTER TABLE `samolet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
