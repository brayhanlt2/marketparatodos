<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";

	require_once '../vendor/autoload.php';

	require_once "../modelo/header.php";
	$header = new Header();




	//OBTENIENDO IDUSUARIO
	require_once "../modelo/consultas_compartidas.php";
	$consultas_compartidas = new Consultas_compartidas();

	$token = isset($_POST["token"])?limpiarCadena($_POST["token"]):"";

	$idusuario = '';

	if (!empty($token)) {
		$rspta999 = $consultas_compartidas->verificar_token($token);
		$reg999 = $rspta999->fetch_object();

		if(isset($reg999)){
			$idusuario = $reg999->idusuario;
		}
	}





	function generar_token_seguro($longitud){
	    if ($longitud < 4) {
	        $longitud = 4;
	    }
	 
	    return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
	}




	



	switch ($_GET["op"]) {

		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		case 'guardarRegistrateEmail_unirme':
			$email_unirme = isset($_POST["email_unirme"])?limpiarCadena($_POST["email_unirme"]):"";
			$contra_unirme = isset($_POST["contra_unirme"])?limpiarCadena($_POST["contra_unirme"]):"";
			$nombre_red_unirme = isset($_POST["nombre_red_unirme"])?limpiarCadena($_POST["nombre_red_unirme"]):"";
			$red_yaexistente_unirme = isset($_POST["red_yaexistente_unirme"])?limpiarCadena($_POST["red_yaexistente_unirme"]):"";
			$plan = isset($_POST["plan"])?limpiarCadena($_POST["plan"]):"";

			
			if (!empty($email_unirme) and !empty($contra_unirme) and !empty($nombre_red_unirme)) {
				
				$redAleatoriaEscogida = false;

				//consultar red existente
				$rspta = $header->datosRedPorNombre($red_yaexistente_unirme);
				$reg = $rspta->fetch_object();
				
				if ($reg) {

				}else{
					/*$rspta = $header->datosRedPorNombre("TESO");
					$reg = $rspta->fetch_object();*/

					$rspta = $header->listar_usuarios();
					$dataUsuarios=array();
					while ($reg = $rspta->fetch_object()) {
						$dataUsuarios[] = array(
							"idusuario"             =>$reg->idusuario,
							"email"                 =>$reg->email,
							"email_estado"          =>$reg->email_estado,
							"token"                 =>$reg->token,
							"nombre_red"            =>$reg->nombre_red,
							"cantidad_trabajadores" =>$reg->cantidad_trabajadores,
							"tipo_usuario"          =>$reg->tipo_usuario,
							"tipo_cuenta"          =>$reg->tipo_cuenta,
							"rama"                  =>$reg->rama,
						);
					}

					$numaleatorio = rand(0,(count($dataUsuarios)-1));

					/*var_dump($numaleatorio);
					var_dump($dataUsuarios[$numaleatorio]);*/

					$rspta = $header->datosRedPorNombre($dataUsuarios[$numaleatorio]["nombre_red"]);
					$reg = $rspta->fetch_object();

					$redAleatoriaEscogida = true;
				}


				$result=array();

				if ($reg) {
					$rspta000 = $header->datosRedPorNombre($nombre_red_unirme);
					$reg000 = $rspta000->fetch_object();

					if ($reg000) {

						$result=array("estado"=>"error","mensaje"=>"Esta red ya existe, prueba con otro nombre de red.","focus"=>"red");
						
					}else{

						$rspta0000 = $header->datosRedPorEmail($email_unirme);
						$reg0000 = $rspta0000->fetch_object();

						if ($reg0000) {

							$result=array("estado"=>"error","mensaje"=>"Esta email ya ha sido registrado.","focus"=>"email");
							
						}else{

							$idusuario             = $reg->idusuario;
							$cantidad_trabajadores = $reg->cantidad_trabajadores;
							$rama = $reg->rama;
							
							$idnuevousuario = $header->guardarRegistrateEmail_registrar($email_unirme,$contra_unirme,$nombre_red_unirme,$plan);
							
							if($idnuevousuario){

								//guardar union
								$rspta1=$header->registrarEnLaRed($idusuario,$idnuevousuario);						

								//armar rama
								$nuevaRama = $rama.",".$idnuevousuario;
								$rspta2=$header->actualizar_rama($idnuevousuario,$nuevaRama);

								//actualizar cantidad trabajadores
								$nuevacantidadTrabajadores = $cantidad_trabajadores+1;
								$rspta3=$header->actualizar_cantidad_trabajadores($idusuario,$nuevacantidadTrabajadores);

								//consultar token
								$token="";
								$rspta4 = $header->consultar_token($idnuevousuario);
								$reg4=$rspta4->fetch_object();
								if(!empty($reg4->token)){
									$token = $reg4->token;
								}else {
									$token = generar_token_seguro(15);
									$rspta5 = $header->agregar_token($idnuevousuario,$token);
								}


								if ($rspta1 and $rspta2 and $rspta3 and !empty($token)) {
									$result=array("estado"=>"exito","mensaje"=>'Registrado con ??xito, revisa tu bandeja de entrada. <a href="login">Haz click aqu?? para iniciar sesi??n.</a>',"token"=>$token);
								}else{
									$result=array("estado"=>"error","mensaje"=>"Error, vuelve a intentarlo m??s tarde.");
								}

							}else{
								//no se pudo insertar nuevo usuario
								$result=array("estado"=>"error","mensaje"=>"Error, vuelve a intentarlo m??s tarde.");
							}

						}
					}					

				}else{
					$result=array("estado"=>"error","mensaje"=>"Error, vuelve a intentarlo m??s tarde.");
				}

				echo json_encode($result);

			}
		break;

		case 'validarRed':
			$nombre_red = isset($_POST["nombre_red"])?limpiarCadena($_POST["nombre_red"]):"";
			
			$rspta = $header->validarRed($nombre_red);
			$reg = $rspta->fetch_object();
			$data = array();
			if ($reg->cont>0) {
				$data = array(
					"status"=>'exito',
					"icon"=>'<i class="fa-solid fa-circle-check fa-lg text-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="V??lido"></i>',
				);
			}else{
				$data = array(
					"status"=>'error',
					"icon"=>'<i class="fa-solid fa-circle-xmark fa-lg text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Inv??lido"></i>',
				);
			}

			echo json_encode($data);
		break;



		/*DENTRO DEL SiSTEMA*/
		/*DENTRO DEL SiSTEMA*/
		/*DENTRO DEL SiSTEMA*/
		/*DENTRO DEL SiSTEMA*/
		/*DENTRO DEL SiSTEMA*/
		case 'verificarToken':
			$token = isset($_POST["token"])?limpiarCadena($_POST["token"]):"";

			$rspta1 = $header->verificarToken($token);
			$reg1=$rspta1->fetch_object();

			$rspta = $header->datosUsuario($token);
			$reg=$rspta->fetch_object();
			$data = array(
				"cont"=>$reg1->cont,
				"estado"=>(isset($reg->cuenta_estado))? $reg->cuenta_estado : "error",
				"tipo_usuario"=>$reg->tipo_usuario,
			);

			echo json_encode($data);
		break;
		case 'datosUsuario':
			$rspta = $header->datosUsuario($token);
			$data = array();
			while ($reg=$rspta->fetch_object()) {
				//cantidad de usuarios directos
				$rspta1 = $header->contarRedXUsuario($idusuario);
				$reg1=$rspta1->fetch_object();

				$pedazos = explode(",", $reg->rama);

				$data = array(
					"cuenta_estado"=>$reg->cuenta_estado,
					"email"=>$reg->email,
					"nombre_red"=>$reg->nombre_red,
					"rama"=>$reg->rama,
					"cantidad_usuarios_directos"=>$reg1->cont,
					"nivel"=>count($pedazos)-1,
				);
			}
			echo json_encode($data);
		break;

		case 'registrarRed':
			$rspta = $header->registrarRed($idusuario);
			echo ($rspta)?"exito":"error";
		break;


	}

?>