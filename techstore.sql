-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 16 2023 р., 20:46
-- Версія сервера: 8.0.19
-- Версія PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `techstore`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(1, 0, 'Монітори', 'Монітори', 'Монітори'),
(2, 1, 'SAMSUNG', 'Монітори SAMSUNG', 'Монітори SAMSUNG'),
(3, 0, 'Смартфони', 'Смартфони', 'Смартфони'),
(4, 3, 'SAMSUNG', 'Смартфони SAMSUNG', 'Смартфони SAMSUNG'),
(5, 0, 'Ноутбуки', 'Ноутбуки', 'Ноутбуки'),
(6, 5, 'Asus', 'Ноутбуки Asus', 'Ноутбуки Asus'),
(7, 0, 'Телевізори', 'Телевізори', 'Телевізори'),
(8, 7, 'LG', 'LG', 'LG'),
(10, 3, 'Apple', 'Apple', 'Apple'),
(11, 3, 'XIAOMI', 'XIAOMI', 'XIAOMI'),
(12, 0, 'Планшети', 'Планшети', 'Планшети'),
(13, 12, 'LENOVO', 'LENOVO', 'LENOVO'),
(14, 1, 'Asus', 'Asus', 'Asus');

-- --------------------------------------------------------

--
-- Структура таблиці `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `comment`
--

INSERT INTO `comment` (`id`, `text`, `user_id`, `product_id`, `date`) VALUES
(1, 'Дуже гарний монітор!', 2, 1, '2023-06-01');

-- --------------------------------------------------------

--
-- Структура таблиці `image`
--

CREATE TABLE `image` (
  `id` int NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `modelName`, `urlAlias`) VALUES
(1, 'Products/Product1/f45808.jpg', 1, 'Product', '94acc20e50-2'),
(2, 'Products/Product1/8fe5e6.jpg', 1, 'Product', 'cbdb2c05ae-2'),
(3, 'Products/Product2/006c04.jpg', 2, 'Product', 'c18bfbbf35-2'),
(4, 'Products/Product1/45c6a0.jpg', 1, 'Product', '88a99a2e40-3'),
(5, 'Products/Product1/ad4bdb.jpg', 1, 'Product', '37e9262266-4'),
(6, 'Products/Product3/d9c075.jpg', 3, 'Product', '6ce30d42e2-2'),
(7, 'Products/Product4/fcad1f.jpg', 4, 'Product', 'e489b9311a-2'),
(8, 'Products/Product5/4cffb9.jpg', 5, 'Product', 'e6de681507-2'),
(9, 'Products/Product6/4e0ec5.jpg', 6, 'Product', 'da62d80067-2'),
(10, 'Products/Product7/83bcfd.jpg', 7, 'Product', 'd84304403c-2'),
(11, 'Products/Product8/1063c0.jpg', 8, 'Product', '9f296bd842-2');

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `id` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `surname`, `email`, `phone`, `address`) VALUES
(1, '2023-06-01 03:07:00', '2023-06-01 03:07:00', 2, 11998, '1', 'Максим', 'Шишов', 'turanskaya1981@gmail.com', '32342432', '42334232'),
(2, '2023-06-01 08:37:58', '2023-06-01 08:37:58', 2, 25998, '0', 'Максим', 'Карпов', 'maximshishov228@gmail.com', '099999999', 'м. Херсон вул. Університетьска 102, кв.2'),
(4, '2023-06-16 20:29:17', '2023-06-16 20:29:17', 1, 5999, '0', 'Максим', 'Карпов', 'maximshishov228@gmail.com', '32342432', 'м. Херсон вул. Університетьска 102, кв.2');

-- --------------------------------------------------------

--
-- Структура таблиці `order_items`
--

CREATE TABLE `order_items` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(1, 1, 1, 'Монітор 27\" SAMSUNG LF27T350FHIXCI', 5999, 2, 11998),
(2, 2, 2, 'Смартфон SAMSUNG Galaxy A54 5G 6/128GB Black (SM-A546EZKASEK)', 19999, 1, 19999),
(3, 2, 1, 'Монітор 27\" SAMSUNG LF27T350FHIXCI', 5999, 1, 5999),
(6, 4, 1, 'Монітор 27\" SAMSUNG LF27T350FHIXCI', 5999, 1, 5999);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `price` float DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `stock` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `keywords`, `description`, `hit`, `new`, `sale`, `stock`) VALUES
(1, 2, 'Монітор 27\" SAMSUNG LF27T350FHIXCI', '<div>\r\n<h2><strong>ХарактеристикиМонітор 27&quot; SAMSUNG LF27T350FHIXCI</strong></h2>\r\n</div>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Основні дані</strong></span></p>\r\n\r\n<hr />\r\n<p>Призначення: для дому й офісу</p>\r\n\r\n<p>Діагональ: 27 &quot;</p>\r\n\r\n<p>Роздільна здатність дисплею: 1920x1080 (Full HD)</p>\r\n\r\n<p>Співвідношення сторін: 16:9</p>\r\n\r\n<p>Тип матриці: IPS</p>\r\n\r\n<p>Частота розгортки дисплея: 75 Гц</p>\r\n\r\n<p>Кольорове охоплення: NTSC 72%</p>\r\n\r\n<p>&nbsp;</p>\r\n', 5999, 'Монітор 27\" SAMSUNG LF27T350FHIXCI', 'Монітор 27\" SAMSUNG LF27T350FHIXCI', '1', '1', '1', '1'),
(2, 4, 'Смартфон SAMSUNG Galaxy A54 5G 6/128GB Black (SM-A546EZKASEK)', '<p><strong><span style=\"font-size:22px\">ХарактеристикиСмартфон SAMSUNG Galaxy A54 5G 6/128GB Black (SM-A546EZKASEK)</span></strong></p>\r\n\r\n<hr />\r\n<p><strong><span style=\"font-size:18px\">Дисплей</span></strong><br />\r\nДіагональ екрану: 6.4 &#39;&#39;<br />\r\nРоздільна здатність дисплея: 2340х1080 (Full HD+)<br />\r\nТип матриці дисплея: Super AMOLED<br />\r\nСпіввідношення сторін дисплея: 19.5:9<br />\r\nЧастота оновлення дисплея: 120 Гц</p>\r\n', 19999, 'Смартфон SAMSUNG Galaxy A54 5G 6/128GB Black (SM-A546EZKASEK)', 'Смартфон SAMSUNG Galaxy A54 5G 6/128GB Black (SM-A546EZKASEK)', '1', '1', '0', '1'),
(3, 6, 'Ноутбук ACER Nitro 5 AN515-57-54VT Shale Black', '<p><strong><span style=\"font-size:24px\">Характеристики Ноутбук ASUS TUF Gaming F15 FX506LHB-HN333 Bonfire Black (90NR03U2-M00C80)</span></strong></p>\r\n\r\n<hr />\r\n<p><strong><span style=\"font-size:20px\">Корпус</span></strong></p>\r\n\r\n<p>Тип ноутбука: ноутбук геймерський<br />\r\nГабарити (ВхШхГ): 24.7-24.9 x 359 x 256 мм<br />\r\nКолір: чорний<br />\r\nМатеріал корпуса: метал/пластик<br />\r\nВага: 2.3 кг<br />\r\nВид замка: Kensington</p>\r\n', 31999, 'Ноутбук ACER Nitro 5 AN515-57-54VT Shale Black', 'Ноутбук ACER Nitro 5 AN515-57-54VT Shale Black', '1', '1', '1', '1'),
(4, 8, 'Телевізор LG 43UQ75006LF', '<div class=\"description-title product-section-title\" style=\"box-sizing: inherit; outline: none; font-family: TTNorms; font-variant-ligatures: none; color: rgb(0, 0, 0); font-size: 15px;\">\r\n<h2>Характеристики<span style=\"color:var(--color-grey-02); font-size:20px\">Телевізор LG 43UQ75006LF</span></h2>\r\n</div>\r\n\r\n<div class=\"characteristics-container\" style=\"box-sizing: inherit; outline: none; font-family: TTNorms; font-variant-ligatures: none; color: rgb(0, 0, 0); font-size: 15px;\">\r\n<div class=\"attributes-block\" style=\"box-sizing: inherit; outline: none; display: flex; flex-flow: row wrap; justify-content: space-between;\">\r\n<div style=\"box-sizing: inherit; outline: none; width: 763.406px;\"><span style=\"color:rgb(51, 51, 51); font-family:sans-serif,arial,verdana,trebuchet ms; font-size:13px\">Якість зображення</span></div>\r\n\r\n<div style=\"box-sizing: inherit; outline: none; width: 763.406px;\">Роздільна здатність екрану: 3840x2160 (4К UHD)<br />\r\nТехнологія поліпшення контрастності: LG Dynamic Tone Mapping</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"box-sizing: inherit; outline: none; width: 763.406px;\">Підтримка HDR: так<br />\r\nОновлення панелі: 60 Гц</div>\r\n</div>\r\n</div>\r\n', 16499, 'Телевізор LG 43UQ75006LF', 'Телевізор LG 43UQ75006LF', '1', '0', '0', '0'),
(5, 10, 'Смартфон APPLE iPhone 13 512GB PRODUCT(RED) (MLQF3)', '<p><strong><span style=\"font-size:22px\">Характеристики Смартфон APPLE iPhone 13 512GB PRODUCT(RED) (MLQF3)</span></strong></p>\r\n\r\n<hr />\r\n<p><strong><span style=\"font-size:20px\">Дисплей</span></strong><br />\r\nДіагональ екрану: 6.1 &#39;&#39;<br />\r\nРоздільна здатність дисплея: 2532x1170<br />\r\nТип матриці дисплея: OLED<br />\r\nСпіввідношення сторін дисплея: 19.5:9</p>\r\n\r\n<p>Частота оновлення дисплея: 60 Гц</p>\r\n', 46499, 'Смартфон APPLE iPhone 13 512GB PRODUCT(RED) (MLQF3)', 'Смартфон APPLE iPhone 13 512GB PRODUCT(RED) (MLQF3)', '1', '0', '1', '0'),
(6, 11, 'Смартфон XIAOMI Redmi 12C 4/128GB Graphite Gray', '<p><strong><span style=\"font-size:22px\">Характеристики Смартфон XIAOMI Redmi 12C 4/128GB Graphite Gray</span></strong></p>\r\n\r\n<hr />\r\n<p><strong><span style=\"font-size:20px\">Дисплей</span></strong><br />\r\nДіагональ екрану: 6.71 &#39;&#39;<br />\r\nРоздільна здатність дисплея: 1650x720 (HD+)<br />\r\nСпіввідношення сторін дисплея: 20.6:9<br />\r\nЧастота оновлення дисплея: 60 Гц</p>\r\n', 5999, 'Смартфон XIAOMI Redmi 12C 4/128GB Graphite Gray', 'Смартфон XIAOMI Redmi 12C 4/128GB Graphite Gray', '1', '0', '0', '0'),
(7, 13, 'Планшет LENOVO Tab M8 (3 Gen) Wi-Fi 3/32 GB Iron Grey (ZA870076UA)', '<div class=\"description-title product-section-title\" style=\"box-sizing: inherit; outline: none; font-family: TTNorms; font-variant-ligatures: none; color: rgb(0, 0, 0); font-size: 15px;\">\r\n<h2><strong><span style=\"font-size:22px\">Характеристики&nbsp;<span style=\"color:var(--color-grey-02)\">Планшет LENOVO Tab M8 (3 Gen) Wi-Fi 3/32 GB Iron Grey</span>&nbsp;</span></strong></h2>\r\n\r\n<hr />\r\n<p><strong><span style=\"font-size:20px\">Пам&#39;ять</span></strong><br />\r\nОперативна пам&#39;ять: 3 Гб<br />\r\nВбудована пам&#39;ять: 32 Гб<br />\r\nРозширення пам&#39;яті: MicroSD до 128Гб</p>\r\n\r\n<p><strong><span style=\"font-size:20px\">Технічні характеристики</span></strong><br />\r\nОпераційна система: Android<br />\r\nПроцесор: MediaTek<br />\r\nМодель процесора: Helio P22T<br />\r\nКількість ядер: 8<br />\r\n<strong><span style=\"font-size:20px\">Технології та інтерфейси</span></strong><br />\r\nБездротові технології: Bluetooth, GPS, Wi-Fi<br />\r\nІнтерфейси і підключення: USB Type-С, роз&#39;єм для навушників</p>\r\n</div>\r\n', 4999, 'Планшет LENOVO Tab M8 (3 Gen) Wi-Fi 3/32 GB Iron Grey (ZA870076UA)', 'Планшет LENOVO Tab M8 (3 Gen) Wi-Fi 3/32 GB Iron Grey (ZA870076UA)', '1', '0', '0', '1'),
(8, 14, 'Монітор 23.8\" ASUS VA24EHE (90LM0569-B01170)', '<p><span style=\"font-size:22px\"><strong>ХарактеристикиМонітор 23.8&quot; ASUS VA24EHE (90LM0569-B01170)</strong></span></p>\r\n\r\n<hr />\r\n<p><strong><span style=\"font-size:20px\">Основні дані</span></strong><br />\r\nПризначення: для дому й офісу<br />\r\nДіагональ: 23.8 &quot;<br />\r\nРоздільна здатність дисплею: 1920x1080 (Full HD)<br />\r\nСпіввідношення сторін: 16:9<br />\r\nТип матриці: IPS<br />\r\nЧастота розгортки дисплея: 75 Гц<br />\r\nКількість bit інформації: 6 + 2 (FRC) bit</p>\r\n', 4999, 'Монітор 23.8\" ASUS VA24EHE (90LM0569-B01170)', 'Монітор 23.8\" ASUS VA24EHE (90LM0569-B01170)', '1', '1', '0', '1');

-- --------------------------------------------------------

--
-- Структура таблиці `token`
--

CREATE TABLE `token` (
  `user_id` int NOT NULL,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int NOT NULL,
  `type` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `isAdmin` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `confirmed_at`, `created_at`, `isAdmin`) VALUES
(2, 'natalya', 'turanskaya1981@gmail.com', '$2y$12$GcNiG0NkVcZtEWLzixN7t.S/FHDRZEjA2CegAV5J2JfKZH3EOvg4u', 1685576492, '2023-06-01 02:39:45', '0'),
(3, 'maxshishov', 'maximshishov228@gmail.com', '$2y$12$DeCioybbzFS9kgdOU0A6UO38GoONO6imAIP3hmT7PDvmJQch3lXtG', 1686935760, '2023-06-16 20:15:45', '1');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Індекси таблиці `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemId` (`itemId`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Індекси таблиці `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `image`
--
ALTER TABLE `image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
