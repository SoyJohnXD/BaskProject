<?php

class Facultad_model{

        private $db;
        private $facultad;

        private $rol;

        public function __CONSTRUCT()
        {
            try 
            {
                require_once "../Model/Conexion.php";
                $this->db = Conexion::Conectar();
                $this->facultad=array();
                $this->rol=array();
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function Listar()
        {
            try {
                $stm = $this->db->query("call pa_listar_facultad");

                while($filas = $stm->fetch(PDO::FETCH_ASSOC)) {
                    $this->facultad[]=$filas;
                }

                return $this->facultad;
            } 
            catch (Exception $e) {
                die($e->getMessage());
            }
        }

         

        

}
    
?>