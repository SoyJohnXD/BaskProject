<?php
session_start();

if(!defined("FOLD_PROYECT") )define("FOLD_PROY",$_SERVER["CONTEXT_DOCUMENT_ROOT"]."/baskprojet/");

if(!defined("FOLDER_TEMPLATE")) define("FOLDER_TEMPLATE", FOLD_PROY."Template/");


/*TRAER LOS ESTILOS PARA EL TEMPLATE*/

/*Encuentra la carpeta proyecto*/
if(!defined("URL_PROY")) define("URL_PROY", "/baskprojet/");

/*Seguido, encuentra la carpeta 'assets' con los estilos*/
if(!defined("URL_LIBS")) define("URL_LIBS", URL_PROY."assets/");
if(!defined("URL_EXTRA_LIBS")) define("URL_EXTRA_LIBS", URL_PROY."assets/extra-libs/");
if(!defined("URL_IMAGES")) define("URL_IMAGES", URL_PROY."assets/images/");
if(!defined("URL_CSS")) define("URL_CSS", URL_PROY."dist/css/");
if(!defined("URL_JS")) define("URL_JS", URL_PROY."dist/js/");
if(!defined("URL_CONTROLLER")) define("URL_CONTROLLER", URL_PROY."Controller/");

if(!defined("URL_MAIN")) define("URL_MAIN", URL_PROY."mainLib/lib/");

include "view/SessionController/sesion.php";

?>