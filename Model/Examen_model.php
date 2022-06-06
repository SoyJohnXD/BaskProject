<?php

class Examen_model
{

    private $db;
    private $examenes;
    private $questions;
    private $answer;

    private $rol;

    public function __CONSTRUCT()
    {
        try {
            require_once "../Model/Conexion.php";
            $this->db = Conexion::Conectar();
            $this->usuarios = array();
            $this->examenes = array();
            $this->questions = array();
            $this->answer = array();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $stm = $this->db->query("call pa_listar_users");

            while ($filas = $stm->fetch(PDO::FETCH_ASSOC)) {
                $this->usuarios[] = $filas;
            }

            return $this->usuarios;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    function InsertarExamen($idProfesor, $idMateria, $corte, $tipo,$descripcion)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_examen_insert (:p_fk_profesor,:p_fk_materia,:p_corte,:p_tipo,:p_descripcion)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(
                ':p_fk_profesor' => intval($idProfesor), ':p_fk_materia' => intval($idMateria), ':p_corte' => intval($corte),
                ':p_tipo' => $tipo,':p_descripcion' => $descripcion
            ));
            $num = $sentencia->rowCount();
            if ($num >= 1) {
                $Bool = true;
                return $Bool;
            } else {
                $Bool = false;
                return $Bool;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /* function InsertarPregunta($tipoPregunta,$indicativo,$contexto, $enunciado,$imagen,$fk_variacion)
        { try{
            // hacer uso de una declaración preparada para evitar la inyección de sql
                        $sentencia = $this->db->prepare("call pa_pregunta_insert (:p_tipo_pregunta,:p_indicativo,:p_contexto,:p_enunciado,:p_fk_variacion,:imagen)");
                        // declaración if-else en la ejecución de nuestra declaración preparada
                        $sentencia->execute(array(':p_tipo_pregunta' => $tipoPregunta , ':p_indicativo' => $indicativo , ':p_contexto' => $contexto,
                        ':p_enunciado' => $enunciado,':p_fk_variacion' => $fk_variacion,':imagen' => $imagen));
                        var_dump($sentencia);die;
                        $num = $sentencia->rowCount();
                        if ($num >= 1) {
                          $Bool = true;
                          return $Bool;                      
                         }else{
                          $Bool = false;
                          return $Bool;
                          } 
                    }
                    catch(PDOException $e){
                       echo $e->getMessage();
                    }
                
            
        } */

    function InsertarPregunta($tipoPregunta, $indicativo, $contexto, $enunciado, $imagen, $fk_variacion)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
           // $sentencia = $this->db->prepare("call pa_pregunta_insert (:p_tipo_pregunta,:p_indicativo,:p_contexto,:p_enunciado,:p_fk_variacion,:imagen)");
            $sentencia = $this->db->prepare("call pa_pregunta_insert (?, ?, ?, ?, ?, ?)");

            $sentencia->bindParam(1, $tipoPregunta);
            $sentencia->bindParam(2, $indicativo);
            $sentencia->bindParam(3, $contexto);
            $sentencia->bindParam(4, $enunciado);
            $sentencia->bindParam(5, $fk_variacion);
            $sentencia->bindParam(6, $imagen, PDO::PARAM_LOB);
            $sentencia->execute();
            $num = $sentencia->rowCount();
            if ($num >= 1) {
                $Bool = true;
                return $Bool;
            } else {
                $Bool = false;
                return $Bool;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function InsertarRespuestas($idPregunta, $contenido, $estado)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_respuesta_insert (:p_fk_pregunta,:p_contenido,:p_estado)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_fk_pregunta' => $idPregunta, ':p_contenido' => $contenido, ':p_estado' => $estado));
            $num = $sentencia->rowCount();
            if ($num >= 1) {
                $Bool = true;
                return $Bool;
            } else {
                $Bool = false;
                return $Bool;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function InsertarPregunta_examen($idPregunta, $idExamen)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_pregunta_examen_insert (:p_fk_examen,:p_fk_pregunta)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_fk_examen' => $idExamen, ':p_fk_pregunta' => $idPregunta));
            $num = $sentencia->rowCount();
            if ($num >= 1) {
                $Bool = true;
                return $Bool;
            } else {
                $Bool = false;
                return $Bool;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function InsertarVariacion_pregunta($idPregunta)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_variacion_pregunta (:p_fk_pregunta)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_fk_pregunta' => $idPregunta));
            $num = $sentencia->rowCount();
            if ($num >= 1) {
                $Bool = true;
                return $Bool;
            } else {
                $Bool = false;
                return $Bool;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function list_Examen_profesor($id)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_examen_profesor_list (:p_id)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_id' => $id));
            while ($filas = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $this->examenes[] = $filas;
            }
            return $this->examenes;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function list_pregunta_examen($idExamen)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
           
            $sentencia = $this->db->prepare("call pa_pregunta_examen_list (:p_examn_id)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_examn_id' => $idExamen));
            while ($filas = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $this->questions[] = $filas;
            }
            return $this->questions;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function list_pregunta_respuestas($idpregunta)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
           $this->answer =array();
            $sentencia = $this->db->prepare("call pa_pregunta_respuestas_list (:p_idPregunta)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_idPregunta' => $idpregunta));
            while ($filas = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $this->answer[] = $filas;
            }
            return $this->answer;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function list_variacion_pregunta($id)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_variacion_pregunta_list (:p_fk_pregunta)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_fk_pregunta' => $id));
            while ($filas = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $this->examenes[] = $filas;
            }
            return $this->examenes;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function search_questios($filtro)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $this->questions=array();
            $sentencia = $this->db->prepare("call pa_busqueda_pregunta (:p_filter)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_filter' => "%".$filtro."%"));
            while ($filas = $sentencia->fetch(PDO::FETCH_ASSOC)) {
                $this->questions[] = $filas;
            }
            return $this->questions;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
}
