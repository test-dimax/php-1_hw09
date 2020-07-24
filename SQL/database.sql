-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2020 г., 13:51
-- Версия сервера: 5.7.25-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `profit_php_1_9`
--

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

CREATE TABLE `text` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `text`
--

INSERT INTO `text` (`id`, `main_text`) VALUES
(1, '                Ста́врополь (от греч. σταυρός — «крест», πόλις — «город»[) — город, административный центр Ставропольского края Российской Федерации. Культурный, деловой и промышленный (машиностроение, приборостроение) центр края. Один из крупнейших городов Северного Кавказа и Северо-Кавказского федерального округа.\r\n\r\nПо итогам проводившегося в 2013, 2015 и 2016 году Всероссийского конкурса на звание «Самого благоустроенного городского (сельского) поселения России» Ставрополь занял первое место в категории «Городские поселения (городские округа), являющиеся административными центрами (столицами) субъектов Российской Федерации»                ');

-- --------------------------------------------------------

--
-- Структура таблицы `trains`
--

CREATE TABLE `trains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `train_n` varchar(10) NOT NULL,
  `way` text NOT NULL,
  `start` datetime NOT NULL,
  `finish` datetime NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trains`
--

INSERT INTO `trains` (`id`, `train_n`, `way`, `start`, `finish`, `price`) VALUES
(1, 'B328', 'Ставрополь - Москва', '2020-07-22 10:35:00', '2020-07-24 08:05:00', 3867),
(2, 'B320', 'Ставрополь - Санкт-Петербург', '2020-07-23 05:07:00', '2020-07-24 04:27:00', 4690),
(3, 'B320', 'Ставрополь - Санкт-Петербург', '2020-07-22 04:33:00', '2020-07-25 00:35:00', 2365),
(4, 'B323', 'Ставрополь - Санкт-Петербург', '2020-07-22 04:33:00', '2020-07-25 00:35:00', 23666),
(5, 'B325', 'Ставрополь - Краснодар', '2020-07-31 07:38:00', '2020-07-31 14:40:00', 1175),
(6, 'S245', 'Ставрополь - Казань', '2020-07-30 23:15:00', '2020-07-31 04:20:00', 4586);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$G4unZpdfstyVy6HGWUlebeKHE50B97bqzNRCuYqouQ..J5FOoMa/G');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trains`
--
ALTER TABLE `trains`
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
-- AUTO_INCREMENT для таблицы `text`
--
ALTER TABLE `text`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `trains`
--
ALTER TABLE `trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
