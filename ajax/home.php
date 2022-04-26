<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";



	require_once "../modelo/home.php";
	$home = new Home();



	



	$email_registrar = isset($_POST["email_registrar"])?limpiarCadena($_POST["email_registrar"]):"";
	$contra_registrar = isset($_POST["contra_registrar"])?limpiarCadena($_POST["contra_registrar"]):"";
	$nombre_red_registrar = isset($_POST["nombre_red_registrar"])?limpiarCadena($_POST["nombre_red_registrar"]):"";

	$email_unirme = isset($_POST["email_unirme"])?limpiarCadena($_POST["email_unirme"]):"";
	$contra_unirme = isset($_POST["contra_unirme"])?limpiarCadena($_POST["contra_unirme"]):"";
	$nombre_red_unirme = isset($_POST["nombre_red_unirme"])?limpiarCadena($_POST["nombre_red_unirme"]):"";
	$red_yaexistente_unirme = isset($_POST["red_yaexistente_unirme"])?limpiarCadena($_POST["red_yaexistente_unirme"]):"";





	function generar_token_seguro($longitud){
	    if ($longitud < 4) {
	        $longitud = 4;
	    }
	 
	    return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
	}

	function quienEsElPapa($id){
		require_once "../modelo/home.php";
		$home = new Home();
		

		$rspta = $home->quienEsElPapa($id);
		$reg = $rspta->fetch_object();
		return $reg->idusuario;
	}
	function cantidad_trabajadores_en_la_red($id){
		require_once "../modelo/home.php";
		$home = new Home();
		

		$rspta = $home->red_contar_x_usuario($id);
		$reg = $rspta->fetch_object();
		return $reg->cont;
	}
	function listar_red_x_usuario($id){
		require_once "../modelo/home.php";
		$home = new Home();


		$rspta = $home->red_listar_x_usuario($id);
		$data=array();
		while ($reg = $rspta->fetch_object()) {
			$data[]=array(
				"idusuario" => $reg->idusuario,
				"idnuevousuario" => $reg->idnuevousuario,
				"fecha_hora" => $reg->fecha_hora,
			);
		}

		return $data;
	}
	function cantidad_niveles_en_la_red($id){
		require_once "../modelo/home.php";
		$home = new Home();


		$niveles = 1;
		$rspta = $home->red_listar_x_usuario($id);
		while ($reg = $rspta->fetch_object()) {
			$idusuario = $reg->idusuario;
			$idnuevousuario = $reg->idnuevousuario;
			$fecha_hora = $reg->fecha_hora;

			if (cantidad_trabajadores_en_la_red($idusuario)>0) {
				$data = listar_red_x_usuario($idusuario);
				$niveles++;
			}
		}

		return $niveles;
	}

	function search($array, $search_list) {
	  
	    // Create the result array
	    $result = array();
	  
	    // Iterate over each array element
	    foreach ($array as $key => $value) {
	  
	        // Iterate over each search condition
	        foreach ($search_list as $k => $v) {
	      
	            // If the array element does not meet
	            // the search condition then continue
	            // to the next element
	            if (!isset($value[$k]) || $value[$k] != $v)
	            {
	                  
	                // Skip two loops
	                continue 2;
	            }
	        }
	      
	        // Append array element's key to the
	        //result array
	        $result[] = $value;
	    }
	  
	    // Return result 
	    return $result;
	}

	function buscarRama($idusuariorama){
		require_once "../modelo/home.php";
		$home = new Home();

		$rspta=$home->buscarRama($idusuariorama);
		$reg=$rspta->fetch_object();

		return $reg->idusuario;
	}

	function porcentaje_herencia_array($val,$aporte){
		$result=array();
		for ($i=0; $i < $val; $i++) { 
			$porcentaje_que_recibo = ($i!=0)? (100/$i)/100 : 1;
				$aporte_que_recibo = $aporte*$porcentaje_que_recibo;

				/*$porcentaje_que_doy = (100/($i-1))/100;
				$aporte_que_doy = $aporte*$porcentaje_que_doy;*/

				$result[] = array(
					"porcentaje_que_recibo"=>$porcentaje_que_recibo,
					"aporte"=>$aporte_que_recibo,

					/*"porcentaje_que_doy"=>$porcentaje_que_doy,
					"aporte_que_doy"=>$aporte_que_doy,*/
				);
		}
		return $result;
	}



	switch ($_GET["op"]) {


		case 'cantidad_actual_participantes':
			$rspta = $home->cantidad_actual_participantes();
			$reg = $rspta->fetch_object();
			echo $reg->cont;
		break;



		/*MUY IMPORTANTE SON LOS CALCULOS ECONOMICOS DEL SISTEMA*/
		case 'gananciasDelaRed':
			//vamos a averiguar los niveles que existen en la red

			$costo_suscripcion         = 1;
			$porcentaje_red            = 0.7;
			$porcentaje_directo        = 0.3;
			$aporte_red            = 0.7;
			$aporte_directo        = 0.3;
			$porcentaje_herencia_array =porcentaje_herencia_array(1000,$aporte_red);
			// var_dump($porcentaje_herencia_array);
			/*array(999) {
			  [0]=>
			  array(2) {
			    ["porcentaje"]=>
			    int(1)
			    ["aporte"]=>
			    float(0.7)
			  }
			  [1]=>
			  array(2) {
			    ["porcentaje"]=>
			    float(0.5)
			    ["aporte"]=>
			    float(0.35)
			  }
			  [2]=>
			  array(2) {
			    ["porcentaje"]=>
			    float(0.33333333333333)
			    ["aporte"]=>
			    float(0.23333333333333)
			  }*/


			$rspta = $home->listar_usuarios();
			$nivelesData=array();
			
			while ($reg = $rspta->fetch_object()) {				
				
				$porciones = explode(",", $reg->rama);
				// var_dump($porciones);

				for ($i=0; $i < count($porciones); $i++) {
					$idusuario = $porciones[$i];

					if ($idusuario!=1) {
						$cantidad_trabajadores_en_la_red = cantidad_trabajadores_en_la_red($idusuario);
						$quienEsElPapa = quienEsElPapa($idusuario);

						//nivelesData
						if (isset($nivelesData[$i]["cantidad_usuarios"])) {	

							if (!isset($nivelesData[$i]["lista_usuarios"][$idusuario])){							
								$nivelesData[$i]["cantidad_usuarios"]++;
								$nivelesData[$i]["lista_usuarios"][$idusuario]=array(
									"cantidad_trabajadores" => $cantidad_trabajadores_en_la_red,
									"aporte_red"            =>$porcentaje_herencia_array[($i)]["aporte"],
									"aporte_directo"        =>$aporte_directo,
									"papa"					=>$quienEsElPapa,
								);
								
							}


						}else{
							$nivelesData[$i]["cantidad_usuarios"]=1;
							$nivelesData[$i]["lista_usuarios"][$idusuario]=array(
								"cantidad_trabajadores" => $cantidad_trabajadores_en_la_red,
								"aporte_red"            =>$porcentaje_herencia_array[($i)]["aporte"],
								"aporte_directo"        =>$aporte_directo,
								"papa"					=>$quienEsElPapa,
							);

						}
					}
				}
			}
			// var_dump($nivelesData);



			$resultadosData=array();

			foreach ($nivelesData as $nivel => $value) {
				// var_dump($value);

				$cantidad_usuarios_x_nivel = $value["cantidad_usuarios"];

				foreach ($value["lista_usuarios"] as $idusuario => $value2) {
					$cantidad_trabajadores = $value2["cantidad_trabajadores"];
					$aporte_red2            = $value2["aporte_red"];
					$aporte_directo2        = $value2["aporte_directo"];
					$papa                  = $value2["papa"];

					////////////////////////////////////////////AGREGAR GANANCIAS
					if (!isset($resultadosData[$papa])) {
						$resultadosData[$papa] = array(
							"gananciaDirecta"=>$aporte_directo2,
							"gananciaPorHerencia"=>$aporte_red2,
						);
					}else{
						$resultadosData[$papa] = array(
							"gananciaDirecta"=>$resultadosData[$papa]["gananciaDirecta"] + $aporte_directo2,
							"gananciaPorHerencia"=>$resultadosData[$papa]["gananciaPorHerencia"] + $aporte_red2,
						);
					}
							

					////////////////////////////////////////////AGREGAR GANANCIAS AL RESTO DE LA RED
					if ($nivel>1) {
						$rspta = $home->listar_usuarios_x_usuario($idusuario);
						$reg=$rspta->fetch_object();

						$porciones = explode(",", $reg->rama);
						// var_dump($porciones);

						for ($i=0; $i < count($porciones); $i++) {
							$idusuario_rama = $porciones[$i];

							if ($idusuario_rama!=$idusuario and $idusuario_rama!=$papa) {
								$resultadosData[$idusuario_rama]["gananciaPorHerencia"] = $resultadosData[$idusuario_rama]["gananciaPorHerencia"] + $aporte_red2;
							}
						}
					}
				}
			}



			var_dump($resultadosData);
		break;

	}

?>