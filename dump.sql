-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 17 2017 г., 19:00
-- Версия сервера: 10.1.28-MariaDB
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
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(64) CHARACTER SET utf16 NOT NULL,
  `parent_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_category`) VALUES
(1, 'Электроника', NULL),
(2, 'Телевизоры', 1),
(3, 'ЭЛТ/Барахолка', 2),
(4, 'LCD', 2),
(5, 'СМАРТ-ТВ', 2),
(6, 'Портативная электроника', 1),
(7, 'MP3 плееры', 6),
(8, 'Смарт-часы', 7),
(9, 'Смартфоны', 6),
(10, 'Тамагочи', 6),
(11, 'Бытовая техника', NULL),
(12, 'Крупная бытовая техника', 11),
(13, 'Малая бытовая техника', 11),
(14, 'Стиральные машинки', 12),
(15, 'Холодильники', 12),
(16, 'Хлебопечки', 13),
(17, 'Соковыжималки', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf16 NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`) VALUES
(1, 'Product 1', '100.00'),
(2, 'Product 2', '200.00'),
(3, 'Product 3', '300.00'),
(4, 'Product 4', '400.00'),
(5, 'Product 5', '500.00'),
(6, 'Product 6', '600.00'),
(7, 'Product 7', '700.00'),
(8, 'Product 8', '800.00'),
(9, 'Product 9', '900.00'),
(10, 'Product 10', '1000.00'),
(11, 'Product 11', '1100.00'),
(12, 'Product 12', '1200.00'),
(13, 'Product 13', '1300.00'),
(14, 'Product 14', '1400.00'),
(15, 'Product 15', '1500.00'),
(16, 'Product 16', '1600.00'),
(17, 'Product 17', '1700.00'),
(18, 'Product 18', '1800.00'),
(19, 'Product 19', '1900.00'),
(20, 'Product 20', '2000.00'),
(21, 'Product 21', '2100.00');

-- --------------------------------------------------------

--
-- Структура таблицы `products_categories`
--

CREATE TABLE `products_categories` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products_categories`
--

INSERT INTO `products_categories` (`product_id`, `category_id`) VALUES
(1, 15),
(1, 16),
(1, 17),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 15),
(3, 16),
(3, 17),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(5, 15),
(5, 16),
(5, 17),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(7, 15),
(7, 16),
(7, 17),
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(9, 15),
(9, 16),
(9, 17),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(11, 15),
(11, 16),
(11, 17),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(13, 15),
(13, 16),
(13, 17),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(15, 15),
(15, 16),
(15, 17),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(17, 15),
(17, 16),
(17, 17),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(19, 15),
(19, 16),
(19, 17),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(21, 15),
(21, 16),
(21, 17);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`product_id`,`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
