<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";

	require_once '../vendor/autoload.php';
	MercadoPago\SDK::setAccessToken("APP_USR-8104791343627101-050218-0bec40c92d0a7b810856a95958951d0f-1116632075");




	switch ($_GET["op"]) {

		case 'pagarVIP':

			$dataPago = json_decode($_POST["dataPago"],true);
		    var_dump($dataPago);


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
			$payment = new MercadoPago\Payment();
		    $payment->transaction_amount = 100;
		    $payment->token = $dataPago['token'];
		    $payment->description = "VIP";
		    $payment->installments = 1;
		    $payment->payment_method_id = $dataPago['payment_method_id'];
		    $payment->issuer_id = (int)$dataPago['issuer_id'];

		    $payer = new MercadoPago\Payer();
		    $payer->email = $dataPago['payer']['email'];
		    $payer->identification = array(
		        "type" => $dataPago['payer']['identification']['type'],
		        "number" => $dataPago['payer']['identification']['number']
		    );
		    $payer->first_name = $dataPago['payer']['name'];
		    $payment->payer = $payer;

		    $payment->save();

		    $response = array(
		        'status' => $payment->status,
		        'status_detail' => $payment->status_detail,
		        'id' => $payment->id
		    );
		    echo json_encode($response);
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



	}

?>