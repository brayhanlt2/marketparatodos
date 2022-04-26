<?php 

	require "../../config/conexion.php";

	Class Consultas_compartidas {

		//CONSTRUCTOR
		public function __construct(){

		}



		public function verificar_token($token) {
			$sql = "SELECT * FROM usuario where token='$token' ";
			return ejecutarConsulta($sql);
		}


	}

?>