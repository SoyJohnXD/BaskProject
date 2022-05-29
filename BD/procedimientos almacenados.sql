DELIMITER $$
CREATE  PROCEDURE `pa_examen_insert`(IN `p_fk_profesor` INT, IN `p_fk_materia` INT, IN `p_corte` INT, IN `p_tipo` VARCHAR(15))
INSERT INTO `examen`( `fk_profesor`, `fk_materia`, `fecha_creacion`, `corte`, `tipo`) VALUES (p_fk_profesor,p_fk_materia,NOW(),p_corte,p_tipo)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_listar_facultad`()
SELECT *  from facultad$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_listar_materia`()
SELECT materia.id,materia.nombre,facultad.id as facultad_id, facultad.nombre as facultad_nombre from materia inner join facultad on materia.fk_facultad = facultad.id$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_listar_users`()
SELECT * from usuario$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_pregunta_examen_insert`(IN `p_fk_examen` INT, IN `p_fk_pregunta` INT)
INSERT INTO `pregunta_examen`(`fk_examen`, `fk_pregunta`) VALUES (p_fk_examen,p_fk_pregunta)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_pregunta_insert`(IN `p_tipo_pregunta` VARCHAR(20), IN `p_indicativo` VARCHAR(500), IN `p_contexto` VARCHAR(500), IN `p_enunciado` VARCHAR(1000), IN `p_fk_variacion` INT, IN `imagen` LONGBLOB)
INSERT INTO `pregunta`( `tipo_pregunta`, `indicativo`, `contexto`, `enunciado`, `fk_variacion`, `imagen`) VALUES (p_tipo_pregunta,p_indicativo,p_contexto,p_enunciado,p_fk_variacion,imagen)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_respuesta_insert`(IN `p_fk_pregunta` INT, IN `p_contenido` VARCHAR(200), IN `p_estado` VARCHAR(5))
INSERT INTO `respuesta`(`fk_pregunta`, `contenido`, `estado`) VALUES (p_fk_pregunta,p_contenido,p_estado)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_usuario_validar`(IN `p_usuario` VARCHAR(150), IN `p_pass` VARCHAR(150))
SELECT * FROM usuario where 
user = p_usuario and pass = p_pass$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_variacion_pregunta`(IN `p_fk_pregunta` INT)
INSERT INTO `variacion_pregunta`( `fk_pregunta`) VALUES (p_fk_pregunta)$$
DELIMITER ;
