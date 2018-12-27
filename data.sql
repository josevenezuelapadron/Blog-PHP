-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-12-2018 a las 23:40:14
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php-blog`

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `NOMBRE`) VALUES
(2, 'Deporte'),
(3, 'Accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `CATEGORIA_ID` int(11) NOT NULL,
  `TITULO` varchar(255) COLLATE utf8_bin NOT NULL,
  `DESCRIPCION` varchar(255) COLLATE utf8_bin DEFAULT 'Descripcion vacia',
  `FECHA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`ID`, `USUARIO_ID`, `CATEGORIA_ID`, `TITULO`, `DESCRIPCION`, `FECHA`) VALUES
(1, 11, 2, 'Por que correr', 'Descripcion vacia', '2018-12-25'),
(2, 11, 2, 'Probando el Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '2018-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) COLLATE utf8_bin NOT NULL,
  `APELLIDO` varchar(255) COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_bin NOT NULL,
  `FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `APELLIDO`, `EMAIL`, `PASSWORD`, `FECHA`) VALUES
(3, 'Jose', 'Padron', 'jose@padron.com', '$2y$04$ba.FwOKSrAJ2g/moiBevU.MusY5WcNMIqydywWwyQGxjLtzwtYAnO', '2018-12-23'),
(9, 'dasdas', 'asdasdasd\'', 'jose@padr2on.com', '$2y$04$2qDK8se5B7Y/T/UCOUVlkuWpeXd8t4xij.dquhBL5hRYkHtcUV3kq', '2018-12-23'),
(10, 'asddsa', 'asdasdasd\'', 'jose@padron.com2', '$2y$04$a3IBFJHgkaoHY98a/sBDhek85D4FBVY32T1e6md2oNljE4sHSjnfq', '2018-12-25'),
(11, 'abc', 'def', 'jose2@padron.com', '$2y$04$E34nbnCz0bPAcDb0yVxEQOEbgthl1C2mugtznJLswcOXR2fms9znG', '2018-12-25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USUARIO_ID` (`USUARIO_ID`),
  ADD KEY `CATEGORIA-ID` (`CATEGORIA_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `entradas_ibfk_2` FOREIGN KEY (`CATEGORIA_ID`) REFERENCES `categorias` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
