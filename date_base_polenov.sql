-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3308
-- Время создания: Янв 17 2017 г., 19:58
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `date_base_polenov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `museum`
--

CREATE TABLE IF NOT EXISTS `museum` (
  `id_museum` int(5) NOT NULL AUTO_INCREMENT,
  `name_museum` text,
  `link_museum` text,
  `img_museum` text,
  PRIMARY KEY (`id_museum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `museum`
--

INSERT INTO `museum` (`id_museum`, `name_museum`, `link_museum`, `img_museum`) VALUES
(10, 'Поленово', 'http://www.polenovo.ru/', 'polenovo.jpg'),
(11, 'Государственная Третьяковская галерея', 'http://www.tretyakovgallery.ru/', '68148.660x371.jpg'),
(12, 'Государственный Русский музей', 'http://www.rusmuseum.ru/', '1-41.jpg'),
(13, 'Абрамцево (музей-заповедник)', 'http://www.abramtsevo.net/', 'muzey_zapovednik_abramcevo_2.jpg'),
(14, 'Киевский национальный музей русского искусства', 'http://www.kmrm.com.ua/', '962622.jpg'),
(15, 'Ростовский кремль', 'http://www.rostmuseum.ru/', '11531.jpg'),
(16, 'Ярославский художественный музей', 'http://artmuseum.yar.ru/', '185009.660x371.jpg'),
(17, 'Самарский художественный музей', 'http://www.artmus.ru/', 'img_1_1.jpeg'),
(18, 'Частное собрание', '', 'risovach.ru.png'),
(19, 'Севастопольский художественный музей имени М. П. Крошицкого', 'http://www.sevartmuseum.info/', 'dom.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(250) NOT NULL AUTO_INCREMENT,
  `title` text,
  `url_text` text,
  `img_post` text,
  `id_comment` int(250) DEFAULT NULL,
  `date_post` text,
  `id_museum` int(250) DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id_post`, `title`, `url_text`, `img_post`, `id_comment`, `date_post`, `id_museum`) VALUES
(5, 'Московский дворик', '../ws-content/t/Moskovskiy_dvorik.txt', 'moscow-dvorik.jpg', NULL, 'December 4, 2016, 20:07', 9),
(11, 'Белая лошадка. Нормандия', '../ws-content/t/Belaya_loshadka._Normandiya.txt', 'white-horse.jpg', NULL, '6 December 2016 21:09', 10),
(12, 'Больная', '../ws-content/t/Bolnaya.txt', 'ill-woman.jpg', NULL, '6 December 2016 21:12', 11),
(13, 'Мечты', '../ws-content/t/Mechti.txt', 'dreams.jpg', NULL, '6 December 2016 21:17', 18),
(14, 'Заросший пруд', '../ws-content/t/Zarosshiy_prud.txt', 'zarosshii-prud.jpg', NULL, '6 December 2016 21:19', 11),
(15, 'Ранний снег', '../ws-content/t/Ranniy_sneg.txt', 'early-snow.jpg', NULL, '6 December 2016 21:51', 11),
(16, 'Стынет. Осень на Оке близ Тарусы', '../ws-content/t/Stinet._Osen_na_Oke_bliz_Tarusi.txt', 'autumn-river.jpg', NULL, '6 December 2016 21:53', 18),
(18, 'Монастырь на рекою', '../ws-content/t/Monastir_na_rekoyu.txt', 'monaster-river.jpg', NULL, '6 December 2016 22:08', 19);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `usergroup` text,
  `view_name` int(1) DEFAULT NULL COMMENT '0 имя 1 ник',
  `user_logo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `usergroup`, `view_name`, `user_logo`) VALUES
(4, 'Пантелей', 'panteli', 'panteli@mail.ru', '986755431', NULL, 1, 'd0vbTXhmQ1A.jpg'),
(5, 'Кирилл', 'Kirilltolelev', 'kirill.tolelev@mail.ru', '1239874', NULL, 1, 'Rj45aBpE7ho.jpg'),
(7, 'Kirill', 'Kirillvlom', 'kirillvlom@gmail.com', 'root', NULL, 1, '2016-08-20 10.08.11 1.jpg'),
(8, 'Администратор', 'admin', 'admin@jooi.ru', 'root', 'admin', 1, 'scrat_2-1920x1080.jpg'),
(9, 'Алексей', 'parilka', 'alex@joomba.com', '3', NULL, NULL, 'uLKemMhbHVY.jpg'),
(11, 'имя', 'логин', 'почта', 'парлоь', NULL, NULL, '1rK7Y0Jznpc.jpg'),
(12, 'default', 'root', 'не', 'root', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
