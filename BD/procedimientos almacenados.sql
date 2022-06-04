DELIMITER $$
CREATE  PROCEDURE `pa_Registrar_Usuario`(IN `p_Nombre` VARCHAR(155), IN `p_Apellido` VARCHAR(155), IN `p_TipoDoc` VARCHAR(155), IN `p_NumDoc` VARCHAR(155), IN `p_Email` VARCHAR(155), IN `p_Tele` VARCHAR(155), IN `p_pass` VARCHAR(155))
INSERT INTO `persona`( `nombres`, `apellidos`, `tipo_doc`, `num_doc`, `email`, `telefono`, `pass`) VALUES (p_Nombre, p_Apellido, p_TipoDoc, p_NumDoc, p_Email, p_Tele, p_Pass)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_examen_insert`(IN `p_fk_profesor` INT, IN `p_fk_materia` INT, IN `p_corte` INT, IN `p_tipo` VARCHAR(15), IN `p_descripcion` VARCHAR(200))
INSERT INTO `examen`( `fk_profesor`, `fk_materia`, `fecha_creacion`, `corte`, `tipo`,descripcion) VALUES (p_fk_profesor,p_fk_materia,NOW(),p_corte,p_tipo,p_descripcion)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_examen_profesor_list`(IN `p_id` INT)
SELECT examen.id,examen.fk_materia,examen.fk_profesor, facultad.id as fk_facultad, materia.nombre as materia, facultad.nombre as facultad , examen.corte, examen.tipo, examen.descripcion,examen.fecha_creacion
from examen inner join 
materia on examen.fk_materia = materia.id inner join
facultad on materia.fk_facultad = facultad.id
WHERE fk_profesor = p_id
ORDER BY examen.fecha_creacion DESC$$
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
CREATE  PROCEDURE `pa_pregunta_examen_insert`(IN `p_fk_examen` INT, IN `p_fk_pregunta` INT)
INSERT INTO `pregunta_examen`(`fk_examen`, `fk_pregunta`) VALUES (p_fk_examen,p_fk_pregunta)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_pregunta_examen_list`(IN `p_examn_id` INT)
SELECT p.id,p.tipo_pregunta,p.indicativo,p.contexto,p.enunciado,p.imagen FROM `pregunta` p  inner join 
pregunta_examen pe on p.id = pe.fk_pregunta 
inner join examen e on pe.fk_examen = e.id
WHERE e.id = p_examn_id$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_pregunta_insert`(IN `p_tipo_pregunta` VARCHAR(20), IN `p_indicativo` VARCHAR(500), IN `p_contexto` VARCHAR(500), IN `p_enunciado` VARCHAR(1000), IN `p_fk_variacion` INT, IN `imagen` LONGBLOB)
INSERT INTO `pregunta`( `tipo_pregunta`, `indicativo`, `contexto`, `enunciado`, `fk_variacion`, `imagen`) VALUES (p_tipo_pregunta,p_indicativo,p_contexto,p_enunciado,p_fk_variacion,imagen)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_pregunta_respuestas_list`(IN `p_idPregunta` INT)
select * from respuesta r WHERE r.fk_pregunta =  p_idPregunta$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_respuesta_insert`(IN `p_fk_pregunta` INT, IN `p_contenido` VARCHAR(200), IN `p_estado` VARCHAR(5))
INSERT INTO `respuesta`(`fk_pregunta`, `contenido`, `estado`) VALUES (p_fk_pregunta,p_contenido,p_estado)$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_usuario_validar`(IN `p_usuario` VARCHAR(150), IN `p_pass` VARCHAR(150))
SELECT * FROM persona where 
email = p_usuario and pass = p_pass$$
DELIMITER ;

DELIMITER $$
CREATE  PROCEDURE `pa_variacion_pregunta`(IN `p_fk_pregunta` INT)
INSERT INTO `variacion_pregunta`( `fk_pregunta`) VALUES (p_fk_pregunta)$$
DELIMITER ;
