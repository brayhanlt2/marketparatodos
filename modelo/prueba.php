<?php 

	require "../config/conexion.php";

	Class Prueba {

		//CONSTRUCTOR
		public function __construct(){

		}


		public function prueba() {
			$sql = "SELECT count(*) as cont from usuario ";
			return ejecutarConsulta($sql);
		}

		


		


	}

?>