<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";

	require_once '../vendor/autoload.php';
	MercadoPago\SDK::setAccessToken("TEST-6956734717679363-050423-b7751158d22916b3c1d94cd5d757ae47-1118151824");



	function getProtectedValue( $object, $prop_name ) { 
        $array = ( array ) $object;
        $prefix = chr( 0 ) . '*' . chr( 0 );
        return $array[ $prefix . $prop_name ];
    }


	switch ($_GET["op"]) {

		case 'pagarVIP':

			$dataPago = json_decode($_POST["dataPago"],true);
		    var_dump($dataPago);

		    echo "\n";
		    echo "\n";

		    $customer = new MercadoPago\Customer();
			$customer->email = $dataPago["payer"]["email"];
			$customer->save();

			$customerId = getProtectedValue($customer,"id");

		    echo "\n";
		    echo "\n";

			$card = new MercadoPago\Card();
			$card->token = $dataPago["token"];
			$card->customer_id = $customerId;
			$card->issuer = array("id" => $dataPago["issuer_id"]);
			$card->payment_method = array("id" => $dataPago["payment_method_id"]);
			$card->save();
		    var_dump($card);


		    $payment = new MercadoPago\Payment();
			$payment->transaction_amount = 100;
			$payment->token = $dataPago["token"];
			$payment->installments = 1;
			$payment->payer = array(
		        "type" => "customer",
		        "id" => $customerId
		    );
			$payment->save();
			var_dump($payment);


		break;
		











		case 'crearCliente':
			$customer = new MercadoPago\Customer();
			$customer->email = "test_user_67596313@testuser.com";
			$customer->save();

			var_dump($customer);
		break;

		case 'buscarClientes':
			/*$filters = array(
				"id"=>"247711297-jxOV430go9fx2e"
			);*/

			$customers = MercadoPago\Customer::search();
			var_dump($customers);
		break;

		case 'guardarTarjeta':
			$card = new MercadoPago\Card();
			$card->token = "";
			$card->customer_id = "1118152772-uKW07frQDbGCUC";
			$card->issuer = array("id" => "");
			$card->payment_method = array("id" => "");
			$card->save();
			var_dump($card);
		break;



	}

?>