-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2023 г., 17:38
-- Версия сервера: 10.5.11-MariaDB-log
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `market`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `cust_id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_address` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_city` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_state` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_zip` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_country` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_contact` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_email` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_country`, `cust_contact`, `cust_email`) VALUES
('1000000001', 'Village Toys', '200 Maple Lane', 'Detroit', 'MI', '44444', 'USA', 'John Smith', 'sales@villagetoys.com'),
('1000000002', 'Kids Place', '333 South Lake Drive', 'Columbus', 'OH', '43333', 'USA', 'Michelle Green', NULL),
('1000000003', 'Fun4All', '1 Sunny Place', 'Muncie', 'IN', '42222', 'USA', 'Jim Jones', 'jjones@fun4all.com'),
('1000000004', 'Fun4All', '829 Riverside Drive', 'Phoenix', 'AZ', '88888', 'USA', 'Denise L. Stephens', 'dstephens@fun4all.com'),
('1000000005', 'The Toy Store', '4545 53rd Street', 'Chicago', 'IL', '54545', 'USA', 'Kim Howard', NULL),
('1000000006', 'NewOrganization', NULL, NULL, NULL, NULL, NULL, NULL, 'org@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `orderitems`
--

CREATE TABLE `orderitems` (
  `order_num` int(11) NOT NULL,
  `order_item` int(11) NOT NULL,
  `prod_id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orderitems`
--

INSERT INTO `orderitems` (`order_num`, `order_item`, `prod_id`, `quantity`, `item_price`) VALUES
(20005, 1, 'BR01', 100, '5.49'),
(20005, 2, 'BR03', 100, '10.99'),
(20006, 1, 'BR01', 20, '5.99'),
(20006, 2, 'BR02', 10, '8.99'),
(20006, 3, 'BR03', 10, '11.99'),
(20007, 1, 'BR03', 50, '11.49'),
(20007, 2, 'BNBG01', 100, '2.99'),
(20007, 3, 'BNBG02', 100, '2.99'),
(20007, 4, 'BNBG03', 100, '2.99'),
(20007, 5, 'RGAN01', 50, '4.49'),
(20008, 1, 'RGAN01', 5, '4.99'),
(20008, 2, 'BR03', 5, '11.99'),
(20008, 3, 'BNBG01', 10, '3.49'),
(20008, 4, 'BNBG02', 10, '3.49'),
(20008, 5, 'BNBG03', 10, '3.49'),
(20009, 1, 'BNBG01', 250, '2.49'),
(20009, 2, 'BNBG02', 250, '2.49'),
(20009, 3, 'BNBG03', 250, '2.49');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_num` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `cust_id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_num`, `order_date`, `cust_id`) VALUES
(20005, '2004-05-01 00:00:00', '1000000001'),
(20006, '2004-01-12 00:00:00', '1000000003'),
(20007, '2004-01-30 00:00:00', '1000000004'),
(20008, '2004-02-03 00:00:00', '1000000005'),
(20009, '2004-02-08 00:00:00', '1000000001'),
(20011, '2023-03-06 13:12:43', '1000000003');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `prod_id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vend_id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_price` decimal(8,2) NOT NULL,
  `prod_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`prod_id`, `vend_id`, `prod_name`, `prod_price`, `prod_desc`) VALUES
('BNBG01', 'DLL01', 'Fish bean bag toy', '3.49', 'Fish bean bag toy, complete with bean bag worms with which to feed it'),
('BNBG02', 'DLL01', 'Bird bean bag toy', '3.49', 'Bird bean bag toy, eggs are not included'),
('BNBG03', 'DLL01', 'Rabbit bean bag toy', '3.49', 'Rabbit bean bag toy, comes with bean bag carrots'),
('BR01', 'BRS01', '8 inch teddy bear', '5.99', '8 inch teddy bear, comes with cap and jacket'),
('BR02', 'BRS01', '12 inch teddy bear', '8.99', '12 inch teddy bear, comes with cap and jacket'),
('BR03', 'BRS01', '18 inch teddy bear', '11.99', '18 inch teddy bear, comes with cap and jacket'),
('RGAN01', 'DLL01', 'Raggedy Ann', '4.99', '18 inch Raggedy Ann doll'),
('RYL01', 'FNG01', 'King doll', '9.49', '12 inch king doll with royal garments and crown'),
('RYL02', 'FNG01', 'Queen doll', '9.49', '12 inch queen doll with royal garments and crown');

-- --------------------------------------------------------

--
-- Структура таблицы `vendors`
--

CREATE TABLE `vendors` (
  `vend_id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vend_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vend_address` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vend_city` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vend_state` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vend_zip` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vend_country` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `vendors`
--

INSERT INTO `vendors` (`vend_id`, `vend_name`, `vend_address`, `vend_city`, `vend_state`, `vend_zip`, `vend_country`) VALUES
('BRE02', 'Bear Emporium', '500 Park Street', 'Anytown', 'OH', '44333', 'USA'),
('BRS01', 'Bears R Us', '123 Main Street', 'Bear Town', 'MI', '44444', 'USA'),
('DLL01', 'Doll House Inc.', '555 High Street', 'Dollsville', 'CA', '99999', 'USA'),
('FNG01', 'Fun and Games', '42 Galaxy Road', 'London', NULL, 'N16 6PS', 'England'),
('FRB01', 'Furball Inc.', '1000 5th Avenue', 'New York', 'NY', '11111', 'USA'),
('JTS01', 'Jouets et ours', '1 Rue Amusement', 'Paris', NULL, '45678', 'France');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Индексы таблицы `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_num`,`order_item`),
  ADD KEY `FK_OrderItems_Products` (`prod_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_num`),
  ADD KEY `FK_Orders_Customers` (`cust_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `FK_Products_Vendors` (`vend_id`);

--
-- Индексы таблицы `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vend_id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `FK_OrderItems_Orders` FOREIGN KEY (`order_num`) REFERENCES `orders` (`order_num`),
  ADD CONSTRAINT `FK_OrderItems_Products` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_Orders_Customers` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Products_Vendors` FOREIGN KEY (`vend_id`) REFERENCES `vendors` (`vend_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
