-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2022 a las 23:20:03
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
-- Estructura de tabla para la tabla `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `conditions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conditions`
--

INSERT INTO `conditions` (`id`, `conditions`) VALUES
(1, 'No pagado'),
(2, 'Pagado'),
(3, 'Eliminado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infringement`
--

CREATE TABLE `infringement` (
  `id` int(11) NOT NULL,
  `motivo` longtext NOT NULL,
  `multa` float NOT NULL,
  `date` date NOT NULL,
  `people` int(11) DEFAULT NULL,
  `vehicle` int(11) DEFAULT NULL,
  `conditions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `infringement`
--

INSERT INTO `infringement` (`id`, `motivo`, `multa`, `date`, `people`, `vehicle`, `conditions`) VALUES
(5, 'NA', 400, '2022-07-13', 3, 1, 1),
(6, 'NA', 45000, '2022-07-14', 3, 1, 2),
(7, 'NA', 450, '2022-07-13', 2, 2, 2),
(8, 'NA', 5000, '2022-07-14', 2, 2, 4),
(9, 'Na', 500.99, '2022-07-11', 3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `edad` int(3) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` mediumtext NOT NULL,
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `nombre`, `paterno`, `materno`, `edad`, `telefono`, `direccion`, `sexo`) VALUES
(2, 'Rodrigo', 'Nochebuena', 'Martinez', 23, 7711423169, 'NA', 'H'),
(3, 'Leydi Laura', 'Rodriguez', 'Olivares', 23, 7717935021, 'NA', 'F');

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
  `verificado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `nickname`, `email`, `pass`, `registry_date`, `avatar`, `rol`, `last_connection`, `baneado`, `borrado`, `verificado`) VALUES
(1, 'Rodrigo', 'Nochebuena Martínez', 'elwetto', 'elwettoprods@gmail.com', '7987ccb03a3f86987e5dc4927178977e2e0a171b9e6d9e453f12f25653d5c42cec391a6962021bd5d587ad6e139d92b646733cd3c347bbd039dfc314efce66f8', '2022-07-14', 'http://localhost:8080/basemvc/public/img/default-avatar.jpg', 2, '2022-07-14 18:47:00', 0, 0, 1),
(2, 'Rodrigo', 'Nochebuena', 'elguerro', 'musicfenixrl@gmail.com', '7987ccb03a3f86987e5dc4927178977e2e0a171b9e6d9e453f12f25653d5c42cec391a6962021bd5d587ad6e139d92b646733cd3c347bbd039dfc314efce66f8', '2022-07-14', 'http://localhost:8080/basemvc/public/img/default-avatar.jpg', 1, '2022-07-14 19:10:00', 0, 0, 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `modelo` varchar(250) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `descripcion` longtext NOT NULL,
  `no_circulacion` varchar(20) NOT NULL,
  `no_licencia` varchar(20) NOT NULL,
  `matricula` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `modelo`, `marca`, `descripcion`, `no_circulacion`, `no_licencia`, `matricula`) VALUES
(1, 'Challenger Hellcat', 'Dodge', 'Color rojo, franjas negras a los costados, 4 puertas coupe/deportivo', '0123456789', '9876543210', 'HH-CG-001'),
(2, 'Viper', 'Dodge', 'Color verde, 2 puertas coupe', '1234567890', '0987654321', 'HH-CG-001');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `infringement`
--
ALTER TABLE `infringement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_people_infringement` (`people`),
  ADD KEY `fk_vehicle_infringement` (`vehicle`),
  ADD KEY `fk_conditions_infringement` (`conditions`);

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
  ADD KEY `fk_users_id_rol` (`rol`);

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
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `infringement`
--
ALTER TABLE `infringement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `infringement`
--
ALTER TABLE `infringement`
  ADD CONSTRAINT `fk_conditions_infringement` FOREIGN KEY (`conditions`) REFERENCES `conditions` (`id`),
  ADD CONSTRAINT `fk_people_infringement` FOREIGN KEY (`people`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `fk_vehicle_infringement` FOREIGN KEY (`vehicle`) REFERENCES `vehicles` (`id`);

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
