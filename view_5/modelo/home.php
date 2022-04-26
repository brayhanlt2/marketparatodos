<?php 

	require "../../config/conexion.php";

	Class Home {

		//CONSTRUCTOR
		public function __construct(){

		}


		public function listar_usuarios() {
			$sql = "SELECT * FROM usuario ";
			return ejecutarConsulta($sql);
		}
		public function listar_usuarios_x_usuario($idusuario) {
			$sql = "SELECT * FROM usuario where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}

		
		public function validarRed($red) {
			$sql = "SELECT count(*) as cont from usuario where nombre_red='$red' ";
			return ejecutarConsulta($sql);
		}	

		public function guardarRegistrateEmail_registrar($email,$contra,$tipo_usuario,$nombre_red) {
			$sql = "INSERT INTO usuario (tipo_creacion,password,email,email_estado,tipo_usuario,nombre_red) VALUES ('Por email','$contra','$email','Verificado','$tipo_usuario','$nombre_red')";
			return ejecutarConsulta_retornarID($sql);
		}

		public function registrarEnLaRed($idusuario,$idnuevousuario) {
			$sql = "INSERT INTO red (idusuario,idnuevousuario,fecha_hora) VALUES ('$idusuario','$idnuevousuario',current_timestamp())";
			return ejecutarConsulta($sql);
		}

		public function buscarRama($idusuario) {
			$sql = "SELECT * from red where idnuevousuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}		
		public function actualizar_cantidad_trabajadores($idusuario,$nuevaCantidad) {
			$sql = "UPDATE usuario set cantidad_trabajadores='$nuevaCantidad' where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}
		public function actualizar_rama($idusuario,$rama) {
			$sql = "UPDATE usuario set rama='$rama' where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}

		
		public function datosRedPorNombre($red_yaexistente_unirme) {
			$sql = "SELECT * from usuario where nombre_red='$red_yaexistente_unirme' ";
			return ejecutarConsulta($sql);
		}
		public function datosRedPorEmail($email_unirme) {
			$sql = "SELECT * from usuario where email='$email_unirme' ";
			return ejecutarConsulta($sql);
		}


		public function cantidad_actual_participantes() {
			$sql = "SELECT count(*) as cont FROM usuario";
			return ejecutarConsulta($sql);
		}

		public function red_contar_x_usuario($idusuario) {
			$sql = "SELECT count(*) as cont FROM red where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}
		public function red_listar_x_usuario($idusuario) {
			$sql = "SELECT * FROM red where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}
		public function red_listar() {
			$sql = "SELECT * FROM red ";
			return ejecutarConsulta($sql);
		}

		public function quienEsElPapa($id) {
			$sql = "SELECT * FROM red where idnuevousuario='$id' ";
			return ejecutarConsulta($sql);
		}
		
		
		


	}

?>