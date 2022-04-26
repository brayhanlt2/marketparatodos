<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";



	require_once "../modelo/micuenta.php";
	$micuenta = new Micuenta();





	// SDK de Mercado Pago
	require '../vendor/autoload.php';
	// Agrega credenciales
	MercadoPago\SDK::setAccessToken('TEST-3913615103243260-031102-74d4030d3061514bc70512bd36812971-156933890');
	



	// $email = isset($_POST["email"])?limpiarCadena($_POST["email"]):"";




	switch ($_GET["op"]) {

		case 'crearPreferencia':
			/*$rspta = $login->verificarToken($token);
			$reg=$rspta->fetch_object();
			echo $reg->cont;*/






			// Crea un objeto de preferencia
			$preference = new MercadoPago\Preference();

			// Crea un ítem en la preferencia
			$item = new MercadoPago\Item();
			$item->title = 'Mi producto';
			$item->quantity = 1;
			$item->unit_price = 75.56;
			$preference->items = array($item);
			$preference->save();

			var_dump($preference);
		break;











		/*$data = array(
			"nivel"        =>0,
			"usuario"      =>"Brayhan Ladines",
			"trabajadores" =>array(
				"0"        =>"nivel"        =>1,
							"usuario"      =>"Usuario GAAA",
							"trabajadores" =>array(
								""
							),
				"1"        =>"nivel"        =>1,
							"usuario"      =>"Usuario GAAA",
							"trabajadores" =>array(
								""
							),
							
			),
		);*/







	}

?>