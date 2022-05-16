<?php 

	class Conexion{

		public static function Conectar(){

			try {

				$cnx = new PDO("mysql:host=localhost;dbname=baskproject","root","");
				$cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$cnx->exec("SET CHARACTER SET UTF8");

			} catch (Exception $e) {
		
				die("Error ".$e->GetMessage());

			}
			return $cnx;


		}
	}

?>