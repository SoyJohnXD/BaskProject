<?php

class Materia_model{

        private $db;
        private $materia;

        private $rol;

        public function __CONSTRUCT()
        {
            try 
            {
                require_once "../Model/Conexion.php";
                $this->db = Conexion::Conectar();
                $this->materia=array();
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
                $stm = $this->db->query("call pa_listar_materia");

                while($filas = $stm->fetch(PDO::FETCH_ASSOC)) {
                    $this->materia[]=$filas;
                }

                return $this->materia;
            } 
            catch (Exception $e) {
                die($e->getMessage());
            }
        }

         

        

}
    
?>