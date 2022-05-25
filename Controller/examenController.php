<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */  require_once ("../Model/Usuario_model.php");
 require_once "../View/SessionController/sesiones.php";

$opcion = $_REQUEST["opcion"];
$Usuario = new Usuario_model();

$session = new Session();



switch ($opcion) {
    case 'crearExamen':
    include "../config.php";
        $data = $_REQUEST["data"];
        $ObjData = json_decode($data);
        var_dump($ObjData,"jaja");
        
            
        
        break;

    
}
