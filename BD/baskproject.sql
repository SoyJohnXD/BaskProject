-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220530.a2456aa9a3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-06-2022 a las 01:13:14
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_examen_insert` (IN `p_fk_profesor` INT, IN `p_fk_materia` INT, IN `p_corte` INT, IN `p_tipo` VARCHAR(15), IN `p_descripcion` VARCHAR(200))   INSERT INTO `examen`( `fk_profesor`, `fk_materia`, `fecha_creacion`, `corte`, `tipo`,descripcion) VALUES (p_fk_profesor,p_fk_materia,NOW(),p_corte,p_tipo,p_descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_examen_profesor_list` (IN `p_id` INT)   SELECT examen.id,examen.fk_materia,examen.fk_profesor, facultad.id as fk_facultad, materia.nombre as materia, facultad.nombre as facultad , examen.corte, examen.tipo, examen.descripcion,examen.fecha_creacion
from examen inner join 
materia on examen.fk_materia = materia.id inner join
facultad on materia.fk_facultad = facultad.id
WHERE fk_profesor = p_id
ORDER BY examen.fecha_creacion DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_facultad` ()   SELECT *  from facultad$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_listar_materia` ()   SELECT materia.id,materia.nombre,facultad.id as facultad_id, facultad.nombre as facultad_nombre from materia inner join facultad on materia.fk_facultad = facultad.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_pregunta_examen_insert` (IN `p_fk_examen` INT, IN `p_fk_pregunta` INT)   INSERT INTO `pregunta_examen`(`fk_examen`, `fk_pregunta`) VALUES (p_fk_examen,p_fk_pregunta)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_pregunta_examen_list` (IN `p_examn_id` INT)   SELECT p.id,p.tipo_pregunta,p.indicativo,p.contexto,p.enunciado,p.imagen FROM `pregunta` p  inner join 
pregunta_examen pe on p.id = pe.fk_pregunta 
inner join examen e on pe.fk_examen = e.id
WHERE e.id = p_examn_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_pregunta_insert` (IN `p_tipo_pregunta` VARCHAR(20), IN `p_indicativo` VARCHAR(500), IN `p_contexto` VARCHAR(500), IN `p_enunciado` VARCHAR(1000), IN `p_fk_variacion` INT, IN `imagen` LONGBLOB)   INSERT INTO `pregunta`( `tipo_pregunta`, `indicativo`, `contexto`, `enunciado`, `fk_variacion`, `imagen`) VALUES (p_tipo_pregunta,p_indicativo,p_contexto,p_enunciado,p_fk_variacion,imagen)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_pregunta_respuestas_list` (IN `p_idPregunta` INT)   select * from respuesta r WHERE r.fk_pregunta =  p_idPregunta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_Registrar_Usuario` (IN `p_Nombre` VARCHAR(155), IN `p_Apellido` VARCHAR(155), IN `p_TipoDoc` VARCHAR(155), IN `p_NumDoc` VARCHAR(155), IN `p_Email` VARCHAR(155), IN `p_Tele` VARCHAR(155), IN `p_pass` VARCHAR(155))   INSERT INTO `persona`( `nombres`, `apellidos`, `tipo_doc`, `num_doc`, `email`, `telefono`, `pass`) VALUES (p_Nombre, p_Apellido, p_TipoDoc, p_NumDoc, p_Email, p_Tele, p_Pass)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_respuesta_insert` (IN `p_fk_pregunta` INT, IN `p_contenido` VARCHAR(200), IN `p_estado` VARCHAR(5))   INSERT INTO `respuesta`(`fk_pregunta`, `contenido`, `estado`) VALUES (p_fk_pregunta,p_contenido,p_estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_usuario_validar` (IN `p_usuario` VARCHAR(150), IN `p_pass` VARCHAR(150))   SELECT * FROM persona where 
email = p_usuario and pass = p_pass$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_variacion_pregunta` (IN `p_fk_pregunta` INT)   INSERT INTO `variacion_pregunta`( `fk_pregunta`) VALUES (p_fk_pregunta)$$

DELIMITER ;

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
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fk_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variacion_pregunta`
--

CREATE TABLE `variacion_pregunta` (
  `id` int(11) NOT NULL,
  `fk_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pregunta_variacion` (`fk_variacion`);

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
-- Indices de la tabla `variacion_pregunta`
--
ALTER TABLE `variacion_pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_variacion_pregunta` (`fk_pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `variacion_pregunta`
--
ALTER TABLE `variacion_pregunta`
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
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_variacion` FOREIGN KEY (`fk_variacion`) REFERENCES `variacion_pregunta` (`id`);

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

--
-- Filtros para la tabla `variacion_pregunta`
--
ALTER TABLE `variacion_pregunta`
  ADD CONSTRAINT `fk_variacion_pregunta` FOREIGN KEY (`fk_pregunta`) REFERENCES `pregunta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



