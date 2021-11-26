-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2021 a las 01:39:06
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `boxeodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competitors`
--

CREATE TABLE `competitors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `weight` float NOT NULL,
  `image` longtext COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(198) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `competitors`
--

INSERT INTO `competitors` (`id`, `first_name`, `last_name`, `age`, `weight`, `image`, `email`) VALUES
(1, 'joverneys', 'martinez', 28, 60, 'juverney.jpg', 'juver@gmail.com'),
(2, 'bob', 'esponja', 29, 58, 'bob.jpg', 'bob@gmail.com'),
(3, 'floy', 'apellido', 32, 67, 'floy.jpg', 'floy@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(1, 'bob', 'esponja', 'bob@gmail.com', '320345048', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `competitors`
--
ALTER TABLE `competitors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `competitors`
--
ALTER TABLE `competitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
