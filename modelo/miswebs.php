<?php 

	require "../config/conexion.php";

	Class Miswebs {

		//CONSTRUCTOR
		public function __construct(){

		}



		public function nuevoProyecto($idusuario,$idhash,$nombreNuevoProyecto) {
			$sql = "INSERT INTO web (idusuario,idhash,nombre_proyecto) VALUES ('$idusuario','$idhash','$nombreNuevoProyecto')";
			return ejecutarConsulta($sql);
		}

		public function listarProyectos($idusuario) {
			$sql = "SELECT * from web where idusuario='$idusuario'";
			return ejecutarConsulta($sql);
		}



	}

?>