<?php

class Utilities_model{

        private $db;
        private $utilities;

        private $rol;

        public function __CONSTRUCT()
        {
            try 
            {
                require_once "../Model/Conexion.php";
                $this->db = Conexion::Conectar();
                $this->utilities=array();
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        function last_id($table)
    {
        try {
            // hacer uso de una declaración preparada para evitar la inyección de sql
            $count = $this->db->query("SELECT MAX(id) AS ultimo FROM " . $table);
            $fila = $count->fetch(PDO::FETCH_ASSOC);
            return $fila['ultimo'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
    
?>