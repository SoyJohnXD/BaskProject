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


        case 'registrar':
            include "../config.php";
                $R_Nombre = $_REQUEST["R_Nombre"];
                $R_Apellido =$_REQUEST["R_Apellido"];
                $R_TipoDoc = $_REQUEST["R_TipoDoc"];
                $R_NumDoc = $_REQUEST["R_NumDoc"];
                $R_Email = $_REQUEST["R_Email"];
                $R_Tele = $_REQUEST["R_Tele"];
                $R_Pass = $_REQUEST["R_Pass"];
                
                
                
                $res = $Usuario->registroProfesor($R_Nombre, $R_Apellido, $R_TipoDoc, $R_NumDoc, $R_Email, $R_Tele, $R_Pass);
                if ($res == true) {
                    $_SESSION['documento']= $txtDocumento;
                    header('Location: ../View/index.php');
                }else {
                    header('Location: ../login.php?result=login');
                }                    
                
                break;

    
}
