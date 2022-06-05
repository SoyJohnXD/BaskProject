<?php

class Usuario_model
{

    private $db;
    private $usuarios;

    private $rol;

    public function __CONSTRUCT()
    {
        try {
            require_once "../Model/Conexion.php";
            $this->db = Conexion::Conectar();
            $this->usuarios = array();
            $this->rol = array();
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



    function CargarUsuario($usuDocumento)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call PA_Carga_Usuario (:cedula)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':cedula' => $usuDocumento));
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
            return [
                $fila['id_usuario'],
                $fila['cedula'],
                $fila['nombres'],
                $fila['apellidos'],
                $fila['telefono'],
                $fila['celular'],
                $fila['email'],
                $fila['direccion'],
                $fila['clave']
            ];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /* function InsertarUsuAdminHotel($usuNombre,$usuApellido,$usuDocumento, $usuCelular,$usuTelefono,$usuDireccion, $usuEmail,$usuPassword,$usuRol)
        { try{
            // hacer uso de una declaración preparada para evitar la inyección de sql
                        $sentencia = $this->db->prepare("call PA_Insertar_Usuario_AD (:cedula,:nombres,:apellidos,:telefono,:celular,:email,:direccion,:clave,:idRol)");
                        // declaración if-else en la ejecución de nuestra declaración preparada
                       $sentencia->execute(array(':cedula' => $usuDocumento , ':nombres' => $usuNombre , ':apellidos' => $usuApellido,
                        ':telefono' => $usuTelefono,':celular' => $usuCelular,':email' => $usuEmail,':direccion' => $usuDireccion,':clave' => $usuPassword,':idRol' => $usuRol));
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
                
            
        }
  function ActualizarUsu($usuNombre,$usuApellido,$usuDocumento, $usuCelular,$usuTelefono,$usuDireccion, $usuEmail,$usuPassword)
  {
      try{
        // hacer uso de una declaración preparada para evitar la inyección de sql
                    $sentencia = $this->db->prepare("call PA_Actualizar_Usuario (:nombres,:apellidos,:telefono,:celular,:email,:direccion,:clave,:cedula)");
                    // declaración if-else en la ejecución de nuestra declaración preparada
                   $sentencia->execute(array(':cedula' => $usuDocumento , ':nombres' => $usuNombre , ':apellidos' => $usuApellido,
                   ':telefono' => $usuTelefono,':celular' => $usuCelular,':email' => $usuEmail,':direccion' => $usuDireccion,':clave' => $usuPassword));
                   $num = $sentencia->rowCount();
                   if ($num == 1) {
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



    function ValidarUsuario($email, $pass)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_usuario_validar (:p_usuario,:p_pass)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_usuario' => $email, ':p_pass' => $pass));
            $num = $sentencia->rowCount();
            if ($num == true) {
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

    function RecuperarClave($usuDocumento, $usuEmail, $newClave)
    {
        try {

            $sentencia = $this->db->prepare("call PA_Recuperar_Clave (:cedula,:email,:clave)");
            $sentencia->execute(array(':cedula' => $usuDocumento, ':email' => $usuEmail, ':clave' => $newClave));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if (!$sentencia) {
            $Bool = false;
            return $Bool;
        } else {
            $Bool = true;
            return $Bool;
        }
    }


    //Registro de profesor.


    function registroProfesor($R_Nombre, $R_Apellido, $R_TipoDoc, $R_NumDoc, $R_Email, $R_Tele, $R_Pass)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_Registrar_Usuario (:p_Nombre, :p_Apellido, :p_TipoDoc, :p_NumDoc, :p_Email, :p_Tele, :p_Pass)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_Nombre' => $R_Nombre, ':p_Apellido' => $R_Apellido, ':p_TipoDoc' => $R_TipoDoc, ':p_NumDoc' => $R_NumDoc, ':p_Email' => $R_Email, ':p_Tele' => $R_Tele, ':p_Pass' => $R_Pass ));
            $num = $sentencia->rowCount();
            if ($num == true) {
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


    function registroPasswordProfesor($user, $pass)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_Consultar_ultimoID  (:p_user, :p_pass");      
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_user' => $user, ':p_pass' => $pass));
            $num = $sentencia->rowCount();
            if ($num == true) {
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

    //Contactanos

    function contactanos($R_NombresC, $R_ApellidosC, $R_EmailC, $R_Message)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $sentencia = $this->db->prepare("call pa_Contactarnos (:p_NombresC, :p_ApellidosC, :p_EmailC, :p_Message)");
            // declaración if-else en la ejecución de nuestra declaración preparada
            $sentencia->execute(array(':p_NombresC' => $R_NombresC, ':p_ApellidosC' => $R_ApellidosC, ':p_EmailC' => $R_EmailC, ':p_Message' => $R_Message));
            $num = $sentencia->rowCount();
            if ($num == true) {
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


}
    