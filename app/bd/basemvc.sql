-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2022 a las 22:32:00
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
(9, 'Na', 500.99, '2022-07-11', 3, 1, 3),
(10, 'NA', 89489500, '2022-07-24', 36, 32, 1),
(11, '', 0, '2022-07-24', 2, 2, 1),
(12, '', 0, '2022-07-24', 2, 2, 1),
(13, 'NA', 1000000, '2022-07-24', 37, 33, 1),
(14, '', 0, '2022-07-24', 2, 2, 1),
(15, '', 0, '2022-07-24', 2, 2, 1),
(16, 'SPIDERVERSE', 51918, '2022-07-24', 2, 2, 1),
(17, 'VENOM NUNCA FUE UN SINIESTRO', 848948000, '2022-07-24', 38, 34, 1),
(18, 'VENNOM NO ES REAL', 198198, '2022-07-24', 39, 35, 1),
(19, 'VENNOM NO ES REAL', 489498, '2022-07-24', 46, 42, 1),
(20, 'SE CONFIRMA THOR :V', 500, '2022-07-29', 3, 2, 4),
(21, 'SE CONFIRMA OTRO IRON MAN :V', 150000, '2022-07-29', 2, 31, 3),
(22, 'NA', 80000, '2022-08-03', 47, 43, 1),
(23, 'VENNOM NO ES REAL O NO SE JAJAJA', 100000000, '2022-08-03', 48, 44, 1),
(24, 'Aiodnaiodnaiwodn', 80000, '2022-08-03', 5, 1, 1);

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
(2, 'Rodrigo', 'Nochebuena', 'Martinez', 23, 7711423169, 'López Mateos', 'H'),
(3, 'Leydi Laura', 'Rodriguez', 'Olivares', 23, 7717935021, 'NA', 'F'),
(4, 'Pedro', 'Ramirez', 'A', 23, 771, 'A', 'H'),
(5, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(6, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(7, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(8, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(9, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(10, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(11, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(12, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(13, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(14, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(15, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(16, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(17, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(18, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(19, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(20, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(21, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(22, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(23, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(24, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(25, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(26, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(27, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(28, 'Pedro', 'Ramirez', 'A', 23, 771, 'López Mateos', 'H'),
(29, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(30, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(31, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(32, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(33, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(34, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(35, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(36, 'Rod', 'Noc', 'Mar', 0, 0, 'LOP', 'H'),
(37, 'Anuel', 'Doble', 'Ano', 50, 1111222334, 'NA', 'M'),
(38, 'Madness', 'Hernandez', 'Figueroa', 80, 808, 'NA', 'H'),
(39, 'Madness', 'Hernandez', 'Figueroa', 80, 808, 'López Mateos', 'H'),
(40, 'Madness', 'Hernandez', 'Figueroa', 23, 771, 'López Mateos', 'H'),
(41, 'Madness', 'Hernandez', 'Figueroa', 23, 771, 'López Mateos', 'H'),
(42, 'Madness', 'Hernandez', 'Figueroa', 23, 771, 'López Mateos', 'H'),
(43, 'Madness', 'Hernandez', 'Figueroa', 23, 771, 'López Mateos', 'H'),
(44, 'Madness', 'Hernandez', 'Figueroa', 23, 771, 'López Mateos', 'H'),
(45, 'Madness', 'Hernandez', 'Figueroa', 23, 771, 'López Mateos', 'H'),
(46, 'Madness', 'Hernandez', 'Figueroa', 23, 771, 'López Mateos', 'H'),
(47, 'Hugo', 'Nochebuena', 'Martinez', 33, 7712142281, 'NA', 'H'),
(48, 'Madness', 'Hernandez', 'Figueroa', 80, 1111222334, 'López Mateos', 'F');

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
(2, 'Rodrigo', 'Nochebuena', 'elguerro', 'musicfenixrl@gmail.com', '7987ccb03a3f86987e5dc4927178977e2e0a171b9e6d9e453f12f25653d5c42cec391a6962021bd5d587ad6e139d92b646733cd3c347bbd039dfc314efce66f8', '2022-07-14', 'http://localhost:8080/basemvc/public/img/default-avatar.jpg', 1, '2022-07-14 19:10:00', 0, 0, 1),
(3, 'Antonio', 'Banderas', 'elbanderas', 'aon1399@gmail.com', '97f4e65aec887d2768678e269e49878fa810d2f29a1d47eb2cbb19bdf53524044afbd904825e1ed8dc73260abbe01298205d56c1388a00bcd66dbc0a44466c74', '2022-08-03', 'http://localhost:8080/basemvc/public/img/default-avatar.jpg', 1, '2022-08-03 22:14:00', 0, 0, 1),
(4, 'Antonio', 'No Banderas', 'elnobanderas', 'example@email.edu', '97f4e65aec887d2768678e269e49878fa810d2f29a1d47eb2cbb19bdf53524044afbd904825e1ed8dc73260abbe01298205d56c1388a00bcd66dbc0a44466c74', '2022-08-03', 'http://localhost:8080/basemvc/public/img/default-avatar.jpg', 1, '2022-08-03 22:17:00', 0, 0, 1),
(5, 'Yo', 'Mas yo', 'denuevo', 'example@email.mx', '97f4e65aec887d2768678e269e49878fa810d2f29a1d47eb2cbb19bdf53524044afbd904825e1ed8dc73260abbe01298205d56c1388a00bcd66dbc0a44466c74', '2022-08-03', 'http://localhost:8080/basemvc/public/img/default-avatar.jpg', 2, '2022-08-03 22:27:00', 0, 0, 1);

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
(1, 'Challenger Hellcat', 'Dodge', 'Color rojo, franjas negras a los costados, 4 puertas coupe/deportivo', '0123456789', '9876543210', 'HH-CG-003'),
(2, 'Viper SRS', 'Dodge', 'Color verde, 2 puertas coupe', '1234567890', '0987654321', 'HH-CG-100'),
(3, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(4, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(5, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(6, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(7, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(8, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(9, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(10, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(11, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(12, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(13, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(14, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(15, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(16, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(17, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(18, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(19, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(20, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(21, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(22, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(23, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(24, 'Ford', 'Mustang 2015', '4 puertas coupe', '000000000', '0000000000', '1122334455'),
(25, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(26, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(27, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(28, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(29, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(30, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(31, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(32, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '0101010101', '0000000000', 'HH-CG-100'),
(33, 'Tsuru', 'Nissan', 'UNa frijolera y ya', '16181', '84894', '848949'),
(34, 'Charger', 'Dodge', 'NA', '1111100000', '0000011111', 'GCA'),
(35, 'Charger', 'Dodge', 'NA', '1111100000', '0000011111', 'GCA'),
(36, 'Charger', 'Dodge', 'NA', '89484', '8484', '8489'),
(37, 'Charger', 'Dodge', 'NA', '89484', '8484', '8489'),
(38, 'Charger', 'Dodge', 'NA', '89484', '8484', '8489'),
(39, 'Charger', 'Dodge', 'NA', '89484', '8484', '8489'),
(40, 'Charger', 'Dodge', 'NA', '89484', '8484', '8489'),
(41, 'Charger', 'Dodge', 'NA', '89484', '8484', '8489'),
(42, 'Charger', 'Dodge', 'NA', '89484', '8484', '8489'),
(43, 'Frontier', 'Nissan', 'NA', '987654321', '123456799', 'NCH-NI'),
(44, 'Ford (Editado)', 'Mustang 2020', 'Camioneta doble cabina', '000000000', '0000000000', '666777888');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
