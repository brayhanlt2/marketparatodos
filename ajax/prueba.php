<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";



	require_once "../modelo/prueba.php";
	$prueba = new Prueba();



	$email = isset($_POST["email"])?limpiarCadena($_POST["email"]):"";
	$contra = isset($_POST["contra"])?limpiarCadena($_POST["contra"]):"";


	switch ($_GET["op"]) {

		case 'ejecutar_insertarETC':

			// echo "GAA DESDE AJAX";

			$archivo = fopen("../../datos.txt", "w+b");    // Abrir el archivo, creándolo si no existe
		    if( $archivo == false )
		      echo "Error al crear el archivo";
		    else
		      echo "El archivo ha sido creado";

		    fclose($archivo);   // Cerrar el archivo

		break;

		case 'prueba':
			echo "desde ajax ctm";

			$rspta = $prueba->prueba();
			$reg=$rspta->fetch_object();
			var_dump($reg->cont);

		break;

	}

?>