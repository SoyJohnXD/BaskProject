<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */  require_once ("../model/Usuario_model.php");
 require_once "../view/SessionController/sesiones.php";

$opcion = $_REQUEST["opcion"];
$Usuario = new Usuario_model();

$session = new Session();



switch ($opcion) {
    case 'validar':
    include "../config.php";
        $uName = $_REQUEST["uName"];
        $uPass = $_REQUEST["uPass"];
        
        $res = $Usuario->ValidarUsuario($uName, $uPass);
        if ($res == true) {
            $_SESSION['documento']= $txtDocumento;
            header('Location: ../View/index.php');
        }else {
            header('Location: ../login.php?result=login');
        }
            
        
        break;

    
}
