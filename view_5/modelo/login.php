<?php 

	require "../../config/conexion.php";

	Class Login {

		//CONSTRUCTOR
		public function __construct(){

		}


		public function iniciarSesion($email,$contra) {
			$sql = "SELECT count(*) as cont, idusuario FROM usuario where email='$email' and password='$contra' and email_estado='Verificado'  ";
			return ejecutarConsulta($sql);
		}

		public function consultar_token($idusuario) {
			$sql = "SELECT token from usuario where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}
		public function agregar_token($idusuario,$token) {
			$sql = "UPDATE usuario set token='$token' where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}

		



	}

?>