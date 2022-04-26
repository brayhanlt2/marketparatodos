<?php 

	require "../../config/conexion.php";

	Class Header {

		//CONSTRUCTOR
		public function __construct(){

		}


		public function verificarToken($token) {
			$sql = "SELECT count(*) as cont from usuario where token='$token' ";
			return ejecutarConsulta($sql);
		}
		public function datosUsuario($token) {
			$sql = "SELECT * FROM usuario where token='$token' ";
			return ejecutarConsulta($sql);
		}

		public function contarRedXUsuario($idusuario) {
			$sql = "SELECT count(*) as cont FROM red where idusuario='$idusuario' ";
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


		public function listar_usuarios() {
			$sql = "SELECT * FROM usuario ";
			return ejecutarConsulta($sql);
		}
		public function listar_usuarios_x_usuario($idusuario) {
			$sql = "SELECT * FROM usuario where idusuario='$idusuario' ";
			return ejecutarConsulta($sql);
		}


		public function guardarRegistrateEmail_registrar($email,$contra,$nombre_red) {
			$sql = "INSERT INTO usuario (email,email_estado,password,nombre_red,tipo_usuario,tipo_cuenta,cuenta_estado) VALUES ('$email','Verificado','$contra','$nombre_red','usuario','basic','pendiente')";
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


		public function validarRed($red) {
			$sql = "SELECT count(*) as cont from usuario where nombre_red='$red' ";
			return ejecutarConsulta($sql);
		}

		public function registrarRed($idusuario) {
			$sql = "UPDATE usuario set cuenta_estado='registrado' where idusuario='$idusuario' ";
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