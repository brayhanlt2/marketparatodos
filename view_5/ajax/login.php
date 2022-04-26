<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";



	require_once "../modelo/login.php";
	$login = new Login();



	



	$email = isset($_POST["email"])?limpiarCadena($_POST["email"]):"";
	$contra = isset($_POST["contra"])?limpiarCadena($_POST["contra"]):"";



	function generar_token_seguro($longitud){
	    if ($longitud < 4) {
	        $longitud = 4;
	    }
	 
	    return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
	}


	switch ($_GET["op"]) {

		case 'iniciarSesion':
			$rspta = $login->iniciarSesion($email,$contra);
			$reg=$rspta->fetch_object();
			$response = array();
			if ($reg->cont>0){
				$rspta1 = $login->consultar_token($reg->idusuario);
				$reg1=$rspta1->fetch_object();
				if(!empty($reg1->token)){
					$token = $reg1->token;
				}else {
					$token = generar_token_seguro(15);
					$rspta1 = $login->agregar_token($reg->idusuario,$token);
				}
				
				

				if ($rspta1) {
					$response = array(
						"status"=>"exito",
						"token"=>$token
					);

				}else{
					$response = array(
						"status"=>"error"
					);
				}
					
			}else{
				$response = array(
					"status"=>"error"
				);
			}

			echo json_encode($response);
		break;


		

	}

?>