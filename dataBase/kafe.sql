-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 15 2021 г., 05:12
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kafe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(18) NOT NULL,
  `aty` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `kol` text NOT NULL,
  `summa` text NOT NULL,
  `gram` text NOT NULL,
  `sena1` text NOT NULL,
  `sena2` text NOT NULL,
  `sena3` text NOT NULL,
  `gram1` text NOT NULL,
  `gram2` text NOT NULL,
  `gram3` text NOT NULL,
  `type` int(11) NOT NULL,
  `ids` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `aty`, `text`, `image`, `kol`, `summa`, `gram`, `sena1`, `sena2`, `sena3`, `gram1`, `gram2`, `gram3`, `type`, `ids`) VALUES
(3, 'Суши лосось', 'Лосось, Риссь', './img/IMG-2021-09-10-18-14-24511k.png', '', '77р', '35гр', '', '', '', '', '', '', 1, 1),
(4, 'Сладкий ролл', 'По дороге домой не забудьте порадовать себя чудесным Сладким роллом! Хорошего вечера!', './img/IMG-2021-09-09-18-43-50662k.png', '', '209р', '200гр', '', '', '', '', '', '', 2, 2),
(5, 'Пепперони', 'Соус пицца, сыр моцарелла, пепперони, шампиньоны.', './img/IMG-2021-09-11-07-13-57866k.png', '3', '', '', '599р', '630р', '699р', '32см', '42см', '50см', 6, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `klient`
--

CREATE TABLE `klient` (
  `id` int(18) NOT NULL,
  `aty` text NOT NULL,
  `adres` text NOT NULL,
  `tel` text NOT NULL,
  `radio` text NOT NULL,
  `reading` text NOT NULL,
  `kol` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `klient`
--

INSERT INTO `klient` (`id`, `aty`, `adres`, `tel`, `radio`, `reading`, `kol`, `date`) VALUES
(21, 'Азизбек уулу Арген', 'Мамакева 4', '0777444555', 'Курьер', '', '15', '2021-09-12'),
(22, 'Азизбек уулу Арген', 'Мамакева 55', '0777444555', 'Почта', '', '2', '2021-09-13'),
(23, 'Азизбек уулу Арген', 'Мамакева 4556', '0777444555', 'Почта', '', '3', '2021-09-13'),
(24, 'Максим Нигерий', 'Ош 56', '0777 434 556', 'Такси', '', '4', '2021-09-13'),
(25, 'Азизбек уулу Арген', 'Мамакева 4', '0777444555', 'Почта', '', '1', '2021-09-14'),
(26, 'Азизбек уулу Арген', 'Мамакева 44444', '0777444555', 'Такси', '', '2', '2021-09-14'),
(27, 'Азизбек уулу Арген', 'Мамакева 4', '0777444555', 'Курьер', '', '30', '2021-09-14'),
(28, 'Азизбек уулу Арген', 'Cewk', '0999 67 45 33', 'Такси', '', '686', '2021-09-14'),
(29, 'c2a489aa', 'Moskwa', '0784 33 33 44', 'Почта', '', '5', '2021-09-14'),
(30, 'miki', 'kuba', '0667 444 33 2', 'Такси', '', '2', '2021-09-14'),
(31, 'lasy', 'Rossia', '+7778 44 33 22 3', 'Такси', '', '5', '2021-09-14'),
(32, 'Мадыш уулу Кылыч', 'Манас - ата 65', '+996 703 704 506', 'Такси', '', '4', '2021-09-14'),
(33, 'Basic Algebra', 'Bmw', '+996 789 456 333', 'Такси', '', '2', '2021-09-14'),
(34, 'JONY - Пустота (Премьера клипа)', 'atdfv', '9894053093', 'Курьер', '1', '9', '2021-09-14');

-- --------------------------------------------------------

--
-- Структура таблицы `popular`
--

CREATE TABLE `popular` (
  `id` int(18) NOT NULL,
  `aty` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `kol` text NOT NULL,
  `summa` text NOT NULL,
  `gram` text NOT NULL,
  `sena1` text NOT NULL,
  `sena2` text NOT NULL,
  `sena3` text NOT NULL,
  `gram1` text NOT NULL,
  `gram2` text NOT NULL,
  `gram3` text NOT NULL,
  `type` int(11) NOT NULL,
  `ids` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `popular`
--

INSERT INTO `popular` (`id`, `aty`, `text`, `image`, `kol`, `summa`, `gram`, `sena1`, `sena2`, `sena3`, `gram1`, `gram2`, `gram3`, `type`, `ids`) VALUES
(5, 'Суши лосось', 'Лосось, Риссь', './img/IMG-2021-09-10-18-14-24511k.png', '', '77р', '35гр', '', '', '', '', '', '', 1, 1),
(6, 'Лапша хрусаме (рисовая)', 'Рис , паприка, лук зеленый, фасоль, морковка, соус на выбор: сливочный, терияки, устричный соус.', './img/IMG-2021-09-09-16-25-48778k.png', '', '179р', '300гр', '', '', '', '', '', '', 5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int(18) NOT NULL,
  `aty` text NOT NULL,
  `type` text NOT NULL,
  `image` text NOT NULL,
  `summa` text NOT NULL,
  `text` text NOT NULL,
  `gram` text NOT NULL,
  `popular` text NOT NULL,
  `gallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `aty`, `type`, `image`, `summa`, `text`, `gram`, `popular`, `gallery`) VALUES
(1, 'Суши лосось', '1', './img/IMG-2021-09-10-18-14-24511k.png', '77р', 'Лосось, Риссь', '35гр', '1', '1'),
(2, 'Сладкий ролл', '2', './img/IMG-2021-09-09-18-43-50662k.png', '209р', 'По дороге домой не забудьте порадовать себя чудесным Сладким роллом! Хорошего вечера!', '200гр', '', '1'),
(3, 'Лапша хрусаме (рисовая)', '5', './img/IMG-2021-09-09-16-25-48778k.png', '179р', 'Рис , паприка, лук зеленый, фасоль, морковка, соус на выбор: сливочный, терияки, устричный соус.', '300гр', '1', ''),
(15, 'Лапша соба (гречневая)', '5', './img/IMG-2021-09-11-10-00-15292k.png', '179р', 'Состав: Лапша, паприка, лук зеленый, фасоль, морковка, соус на выбор: сливочный, терияки, устричный', '300гр', '', ''),
(17, 'Суп Кимчи', '8', './img/IMG-2021-09-14-16-55-12720k.png', '115 р', 'Соус ширачи.\n\n\n', '200 гр', '', ''),
(18, 'Суп Мисо', '8', './img/IMG-2021-09-14-16-59-0499k.png', '115 р', 'Грибы, Мисо бульон, Сыр тофу.', '200 гр', '', ''),
(19, 'Суп с лососем', '8', './img/IMG-2021-09-14-17-02-29456k.png', '249 р', 'Лосось, Лук зеленый, Рис, Рыбный бульон.', '300 гр', '', ''),
(20, 'Суп Том-ям', '8', './img/IMG-2021-09-14-17-05-33861k.png', '279 р', 'Тигровая креветка, Кунжут, Базелик, Имбирь, Кокосовый бульон, Соус имбирный , Чеснок.', '300 гр', '', ''),
(21, 'Суп Том-кха', '8', './img/IMG-2021-09-14-17-07-41508k.png', '299 р', 'Тигровая креветка, Куриное филе, Имбирь, Лук порей, Шампиньоны.', '300 гр', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar_pizza`
--

CREATE TABLE `tovar_pizza` (
  `id` int(18) NOT NULL,
  `aty` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `kol` int(11) NOT NULL,
  `sena1` text NOT NULL,
  `sena2` text NOT NULL,
  `sena3` text NOT NULL,
  `gram1` text NOT NULL,
  `gram2` text NOT NULL,
  `gram3` text NOT NULL,
  `popular` text NOT NULL,
  `gallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tovar_pizza`
--

INSERT INTO `tovar_pizza` (`id`, `aty`, `text`, `image`, `kol`, `sena1`, `sena2`, `sena3`, `gram1`, `gram2`, `gram3`, `popular`, `gallery`) VALUES
(4, 'Пепперони', 'Соус пицца, сыр моцарелла, пепперони, шампиньоны.', './img/IMG-2021-09-11-07-13-57866k.png', 3, '599р', '630р', '699р', '32см', '42см', '50см', '', '1'),
(5, 'Пицца 4 сыра', 'соус ранч сыр чедр, дор блю, пармезан, моцорела', './img/IMG-2021-09-11-11-20-3763k.png', 2, '577р', '630р', '', '36см', '42см', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(18) NOT NULL,
  `aty` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `image2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `aty`, `text`, `image`, `image2`) VALUES
(1, 'Суши', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-09-47-35419k.png', './img/IMG-2021-09-09-09-47-35792k.png'),
(2, 'Роллы', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.', './img/IMG-2021-09-08-30-27-05834k.png', './img/IMG-2021-09-08-30-27-05167k.jpg'),
(4, 'Наборы', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-09-36-08911k.png', './img/IMG-2021-09-09-30-40-10786k.png'),
(5, 'Лапша и рис', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-31-33423k.png', './img/IMG-2021-09-09-30-31-33456k.png'),
(6, 'Пицца', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-35-11990k.png', './img/IMG-2021-09-11-08-59-24399k.png'),
(7, 'Салаты', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-39-43211k.png', './img/IMG-2021-09-09-30-39-43630k.png'),
(8, 'Супы', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-41-57899k.png', './img/IMG-2021-09-09-30-41-57817k.png'),
(9, 'Дессерты', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-44-0322k.png', './img/IMG-2021-09-09-30-44-03639k.png'),
(10, 'Напитки', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-45-54912k.png', './img/IMG-2021-09-09-30-45-54209k.jpg'),
(11, 'Японские', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-47-20145k.png', './img/IMG-2021-09-09-30-47-20498k.png'),
(12, 'Дополнительно', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-48-45498k.png', './img/IMG-2021-09-09-30-48-45996k.jpg'),
(13, 'Бургеры', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-50-38713k.png', './img/IMG-2021-09-09-30-50-38558k.png'),
(14, 'Запечённый ролл', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-52-06977k.png', './img/IMG-2021-09-09-30-52-06725k.png'),
(15, 'Горячий ролл', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-55-02352k.png', './img/IMG-2021-09-09-30-55-02449k.png'),
(16, 'Запечённый суши', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.', './img/IMG-2021-09-09-30-57-53352k.jpg', './img/IMG-2021-09-09-30-57-53593k.png');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazy`
--

CREATE TABLE `zakazy` (
  `id` text NOT NULL,
  `aty` text NOT NULL,
  `image` text NOT NULL,
  `sena` text NOT NULL,
  `gram` text NOT NULL,
  `kol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakazy`
--

INSERT INTO `zakazy` (`id`, `aty`, `image`, `sena`, `gram`, `kol`) VALUES
('15', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('17', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('17', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('18', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '4'),
('18', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '77'),
('19', 'Пицца 4 сыра', './img/IMG-2021-09-11-11-20-3763k.png', '577р', '36см', '1'),
('19', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '4'),
('19', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '77'),
('19', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '699р', '50см', '1'),
('19', 'Пицца 4 сыра', './img/IMG-2021-09-11-11-20-3763k.png', '630р', '42см', '1'),
('19', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '599р', '32см', '1'),
('19', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '630р', '42см', '1'),
('21', 'Пицца 4 сыра', './img/IMG-2021-09-11-11-20-3763k.png', '630р', '42см', '1'),
('21', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '630р', '42см', '1'),
('21', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '699р', '50см', '1'),
('21', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '2'),
('21', 'Пицца 4 сыра', './img/IMG-2021-09-11-11-20-3763k.png', '577р', '36см', '1'),
('21', 'Сладкий ролл', './img/IMG-2021-09-09-18-43-50662k.png', '209р', '200гр', '3'),
('21', 'Лапша соба (гречневая)', './img/IMG-2021-09-11-10-00-15292k.png', '179р', '300гр', '2'),
('21', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '599р', '32см', '2'),
('21', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '2'),
('22', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('22', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('23', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('23', 'Лапша соба (гречневая)', './img/IMG-2021-09-11-10-00-15292k.png', '179р', '300гр', '1'),
('23', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('24', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '599р', '32см', '1'),
('24', 'Сладкий ролл', './img/IMG-2021-09-09-18-43-50662k.png', '209р', '200гр', '1'),
('24', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('24', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('25', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('26', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('26', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('27', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '15'),
('27', 'Лапша соба (гречневая)', './img/IMG-2021-09-11-10-00-15292k.png', '179р', '300гр', '15'),
('28', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '667'),
('28', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '19'),
('29', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '599р', '32см', '1'),
('29', 'Сладкий ролл', './img/IMG-2021-09-09-18-43-50662k.png', '209р', '200гр', '1'),
('29', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '2'),
('29', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('30', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('30', 'Сладкий ролл', './img/IMG-2021-09-09-18-43-50662k.png', '209р', '200гр', '1'),
('31', 'Пицца 4 сыра', './img/IMG-2021-09-11-11-20-3763k.png', '630р', '42см', '1'),
('31', 'Пицца 4 сыра', './img/IMG-2021-09-11-11-20-3763k.png', '577р', '36см', '1'),
('31', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '599р', '32см', '1'),
('31', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '630р', '42см', '1'),
('31', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '699р', '50см', '1'),
('32', 'Пепперони', './img/IMG-2021-09-11-07-13-57866k.png', '699р', '50см', '1'),
('32', 'Пицца 4 сыра', './img/IMG-2021-09-11-11-20-3763k.png', '630р', '42см', '1'),
('32', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '1'),
('32', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('33', 'Лапша хрусаме (рисовая)', './img/IMG-2021-09-09-16-25-48778k.png', '179р', '300гр', '1'),
('33', 'Лапша соба (гречневая)', './img/IMG-2021-09-11-10-00-15292k.png', '179р', '300гр', '1'),
('34', 'Суши лосось', './img/IMG-2021-09-10-18-14-24511k.png', '77р', '35гр', '9');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `popular`
--
ALTER TABLE `popular`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar_pizza`
--
ALTER TABLE `tovar_pizza`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `klient`
--
ALTER TABLE `klient`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `popular`
--
ALTER TABLE `popular`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `tovar_pizza`
--
ALTER TABLE `tovar_pizza`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
