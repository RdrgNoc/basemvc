-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2022 a las 17:32:08
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basemvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `lastname1` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  `sex` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `name`, `lastname`, `lastname1`, `age`, `phone`, `address`, `sex`) VALUES
(1, 'Rodrigo', 'Nochebuena', 'Martinez', 23, '7717935021', 'NA', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nickname` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `registry_date` date NOT NULL,
  `avatar` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `last_connection` datetime NOT NULL,
  `baneado` int(11) NOT NULL,
  `borrado` int(11) NOT NULL,
  `verificado` int(11) NOT NULL,
  `people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `nickname`, `email`, `pass`, `registry_date`, `avatar`, `rol`, `last_connection`, `baneado`, `borrado`, `verificado`, `people`) VALUES
(1, 'Rodrigo', 'Nochebuena Martínez', 'elwetto', 'musicfenixrl@gmail.com', '82fb2e0195b4b3201afe79396e1f30e25687d268ec9273edb2b58be75412c02805fb7aa4494e000be2292f1f0ebacb488f2869aae2324ae8ebd8db2df4c669a0', '2022-06-30', 'http://localhost:8080/basemvc/public/img/default-avatar.jpg', 1, '2022-06-30 02:54:00', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_activation`
--

CREATE TABLE `users_activation` (
  `id_user` int(11) NOT NULL,
  `user_key` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_remember`
--

CREATE TABLE `users_remember` (
  `id_user` int(11) NOT NULL,
  `user_key` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_rol` (`rol`),
  ADD KEY `people` (`people`);

--
-- Indices de la tabla `users_activation`
--
ALTER TABLE `users_activation`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `users_remember`
--
ALTER TABLE `users_remember`
  ADD PRIMARY KEY (`id_user`,`user_key`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_id_rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `users_activation`
--
ALTER TABLE `users_activation`
  ADD CONSTRAINT `users_user_activation` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
