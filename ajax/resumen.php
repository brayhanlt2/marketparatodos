<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";



	require_once "../modelo/resumen.php";
	$resumen = new Resumen();




	// $token = isset($_POST["token"])?limpiarCadena($_POST["token"]):"";




	switch ($_GET["op"]) {



	}

?>