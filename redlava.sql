-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 28 2020 г., 22:33
-- Версия сервера: 5.7.31-0ubuntu0.18.04.1
-- Версия PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `redlava`
--

-- --------------------------------------------------------

--
-- Структура таблицы `router`
--

CREATE TABLE `router` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `url` varchar(255) DEFAULT NULL COMMENT ' Урл страницы ',
  `class` varchar(255) DEFAULT NULL COMMENT ' Класс страницы ',
  `func` varchar(255) DEFAULT NULL COMMENT ' Функия вызова ',
  `Описание` text COMMENT ' Описание '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `router`
--

INSERT INTO `router` (`id`, `url`, `class`, `func`, `Описание`) VALUES
(1, '/', 'Modules\\Index\\Config\\Handler', 'index', 'Главная страница'),
(2, 'test', 'Modules\\Test\\Config\\Handler', 'index', 'Тестовая страница'),
(3, 'register', 'Modules\\User\\Config\\Handler', 'register', 'регистрация'),
(4, 'authorization', 'Modules\\User\\Config\\Handler', 'authorization', 'авторизация');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL COMMENT ' Идентификатор ',
  `login` varchar(255) DEFAULT NULL COMMENT ' Логин ',
  `password` varchar(255) DEFAULT NULL COMMENT ' Пароль ',
  `email` varchar(255) DEFAULT NULL COMMENT ' Емаил ',
  `ip_reg` varchar(255) DEFAULT NULL COMMENT ' ип регистрации ',
  `date_reg` varchar(255) DEFAULT NULL COMMENT ' дата регистрации '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `ip_reg`, `date_reg`) VALUES
(1, 'test', 'test', 'test', 'test', 'test'),
(2, 'test1', 'test1', 'test1', 'test1', 'test1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `router`
--
ALTER TABLE `router`
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
-- AUTO_INCREMENT для таблицы `router`
--
ALTER TABLE `router`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT COMMENT ' Идентификатор ', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
