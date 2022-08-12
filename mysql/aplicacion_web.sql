-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2022 a las 01:33:22
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aplicacion_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumnos` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumnos`, `nombre`, `apellido`) VALUES
(16, 'Garber', 'Batista'),
(17, 'juan', 'Daniel J.'),
(18, 'Tomas', 'Ramirez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_cursos`
--

CREATE TABLE `alumno_cursos` (
  `id_alumnos_cursos` int(11) NOT NULL,
  `idalumnos` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno_cursos`
--

INSERT INTO `alumno_cursos` (`id_alumnos_cursos`, `idalumnos`, `idcurso`) VALUES
(22, 18, 26),
(30, 16, 24),
(31, 16, 25),
(33, 17, 28),
(34, 17, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL,
  `nombre_cursos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcurso`, `nombre_cursos`) VALUES
(23, 'HTML'),
(24, 'javascript'),
(25, 'PHP'),
(26, 'Big data'),
(27, 'Diseño grafico'),
(28, 'Flutter');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumnos`);

--
-- Indices de la tabla `alumno_cursos`
--
ALTER TABLE `alumno_cursos`
  ADD PRIMARY KEY (`id_alumnos_cursos`),
  ADD KEY `idalumnos` (`idalumnos`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idalumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `alumno_cursos`
--
ALTER TABLE `alumno_cursos`
  MODIFY `id_alumnos_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_cursos`
--
ALTER TABLE `alumno_cursos`
  ADD CONSTRAINT `alumno_cursos_ibfk_1` FOREIGN KEY (`idalumnos`) REFERENCES `alumnos` (`idalumnos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_cursos_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
