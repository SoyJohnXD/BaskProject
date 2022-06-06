-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220530.a2456aa9a3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2022 a las 06:42:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baskproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `nombres` varchar(155) NOT NULL,
  `apellidos` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `asunto` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `fk_profesor` int(11) NOT NULL,
  `fk_materia` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `corte` int(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `descripcion` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`) VALUES
(1, 'Facultad de Negocios, Gestión y Sostenibilidad'),
(2, 'Facultad de Sociedad, Cultura y  Creatividad'),
(3, 'Facultad de Ingeniería, Diseño e Innovación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fk_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `fk_facultad`) VALUES
(1, 'Materia 1', 1),
(2, 'Materia 2', 1),
(3, 'Materia 3', 1),
(4, 'Materia 1', 3),
(5, 'Materia 2', 3),
(6, 'Materia 3', 3),
(7, 'Materia 1', 2),
(8, 'Materia 2', 2),
(9, 'Materia 3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `tipo_doc` varchar(20) NOT NULL,
  `num_doc` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `pass` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apellidos`, `tipo_doc`, `num_doc`, `email`, `telefono`, `pass`) VALUES
(1, 'John Breyner', 'Londoño Lopez', 'CC', '1000991879', 'Johnjulin2@gmail.com', '202020', 'prueba123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `tipo_pregunta` varchar(20) NOT NULL,
  `indicativo` varchar(500) NOT NULL,
  `contexto` varchar(500) NOT NULL,
  `enunciado` varchar(1000) NOT NULL,
  `fk_variacion` int(11) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_examen`
--

CREATE TABLE `pregunta_examen` (
  `fk_examen` int(11) NOT NULL,
  `fk_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `fk_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `fk_persona`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `fk_profesor` int(11) NOT NULL,
  `fk_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `fk_pregunta` int(11) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `estado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profesor_examen` (`fk_profesor`),
  ADD KEY `fk_materia_examen` (`fk_materia`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia_facultad` (`fk_facultad`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pregunta_examen`
--
ALTER TABLE `pregunta_examen`
  ADD KEY `fk_pregunta_examen_examen` (`fk_examen`),
  ADD KEY `fk_pregunta_examen_pregunta` (`fk_pregunta`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profesor_persona` (`fk_persona`);

--
-- Indices de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD KEY `fk_profesor_matria_profesor` (`fk_profesor`),
  ADD KEY `fk_profesor_matria_materia` (`fk_materia`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pregunta_respuesta` (`fk_pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `fk_materia_examen` FOREIGN KEY (`fk_materia`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `fk_profesor_examen` FOREIGN KEY (`fk_profesor`) REFERENCES `profesor` (`id`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_facultad` FOREIGN KEY (`fk_facultad`) REFERENCES `facultad` (`id`);

--
-- Filtros para la tabla `pregunta_examen`
--
ALTER TABLE `pregunta_examen`
  ADD CONSTRAINT `fk_pregunta_examen_examen` FOREIGN KEY (`fk_examen`) REFERENCES `examen` (`id`),
  ADD CONSTRAINT `fk_pregunta_examen_pregunta` FOREIGN KEY (`fk_pregunta`) REFERENCES `pregunta` (`id`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_persona` FOREIGN KEY (`fk_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD CONSTRAINT `fk_profesor_matria_materia` FOREIGN KEY (`fk_materia`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `fk_profesor_matria_profesor` FOREIGN KEY (`fk_profesor`) REFERENCES `profesor` (`id`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_pregunta_respuesta` FOREIGN KEY (`fk_pregunta`) REFERENCES `pregunta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



