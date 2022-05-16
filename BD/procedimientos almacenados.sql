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
CREATE  PROCEDURE `pa_usuario_validar`(IN `p_usuario` VARCHAR(150), IN `p_pass` VARCHAR(150))
SELECT * FROM usuario where 
user = p_usuario and pass = p_pass$$
DELIMITER ;

