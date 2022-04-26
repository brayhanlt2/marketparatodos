<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";

	require_once '../vendor/autoload.php';
	MercadoPago\SDK::setAccessToken("TEST-536565519815678-042201-f757c9c7164c33325c251cbb2a7846e9-1105628694");

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




	$email_unirme = isset($_POST["email_unirme"])?limpiarCadena($_POST["email_unirme"]):"";
	$contra_unirme = isset($_POST["contra_unirme"])?limpiarCadena($_POST["contra_unirme"]):"";
	$nombre_red_unirme = isset($_POST["nombre_red_unirme"])?limpiarCadena($_POST["nombre_red_unirme"]):"";
	$red_yaexistente_unirme = isset($_POST["red_yaexistente_unirme"])?limpiarCadena($_POST["red_yaexistente_unirme"]):"";



	switch ($_GET["op"]) {

		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		/*FUERA DEL SISTEMA*/
		case 'guardarRegistrateEmail_unirme':
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
							
							$idnuevousuario = $header->guardarRegistrateEmail_registrar($email_unirme,$contra_unirme,$nombre_red_unirme);
							
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
									$result=array("estado"=>"exito","mensaje"=>'Registrado con éxito, revisa tu bandeja de entrada. <a href="login">Haz click aquí para iniciar sesión.</a>',"token"=>$token);
								}else{
									$result=array("estado"=>"error","mensaje"=>"Error, vuelve a intentarlo más tarde.");
								}

							}else{
								//no se pudo insertar nuevo usuario
								$result=array("estado"=>"error","mensaje"=>"Error, vuelve a intentarlo más tarde.");
							}

						}
					}					

				}else{
					$result=array("estado"=>"error","mensaje"=>"Error, vuelve a intentarlo más tarde.");
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
					"icon"=>'<i class="fa-solid fa-circle-check fa-lg text-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Válido"></i>',
				);
			}else{
				$data = array(
					"status"=>'error',
					"icon"=>'<i class="fa-solid fa-circle-xmark fa-lg text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Inválido"></i>',
				);
			}

			echo json_encode($data);
		break;

		case 'process_payment':

			$dataPago = json_decode($_POST["dataPago"],true);
		    var_dump($dataPago);
		    var_dump($dataPago["token"]);


		    /*INTENTO 1*/
		    /*$url = 'https://api.mercadopago.com/preapproval';
			$headers = [
			  'Content-Type: application/json',
			  'Authorization: Bearer TEST-536565519815678-042201-f757c9c7164c33325c251cbb2a7846e9-1105628694',
			];

			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_HTTPHEADER => $headers,
			  CURLOPT_RETURNTRANSFER => 1,
			  CURLOPT_POST => 1,
			  CURLOPT_POSTFIELDS => '{
									   "preapproval_plan_id":"2c938084804da16001804eee311f0030",
									   "card_token_id":"'.$dataPago["token"].'",
									   "payer_email":"'.$dataPago["payer"]["email"].'",
									   "status": "authorized",
									}'
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$data = json_decode($response,true);
			var_dump($data);*/





			/*INTENTO 2*/
			/*$preapproval_data = new MercadoPago\Preapproval();

		    $preapproval_data->payer_email = $dataPago["payer"]["email"];
		    $preapproval_data->back_url = "http://www.my-site.com";
		    $preapproval_data->reason = "Suscripción mensual a la red TESO";
		    $preapproval_data->external_reference = "OP-1234";
		    $preapproval_data->auto_recurring = array( 
		        "frequency" => 1,
		        "frequency_type" => "months",
		        "transaction_amount" => 5,
		        "currency_id" => "PEN", // your currency
		    );

		    $preapproval_data->save();

		    var_dump($preapproval_data);*/
		break;
		/*case 'crearUsuarioDePrueba':		

			$url = 'https://api.mercadopago.com/users/test_user';
			$headers = [
			  'Accepts: application/json',
			  'Authorization: Bearer TEST-536565519815678-042201-f757c9c7164c33325c251cbb2a7846e9-1105628694',
			];

			$curl = curl_init(); 

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_HTTPHEADER => $headers,
			  CURLOPT_RETURNTRANSFER => 1,
			  CURLOPT_POST => 1,
			  CURLOPT_POSTFIELDS => '{"site_id":"MPE"}'
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$data = json_decode($response,true);
			var_dump($data);
		break;*/



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