<?php 

	header('Access-Control-Allow-Origin: *'); 
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	require_once "colores.php";


	require_once "../modelo/miswebs.php";
	$miswebs = new Miswebs();




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

		case 'nuevoProyecto':
			$nombreNuevoProyecto = isset($_POST["nombreNuevoProyecto"])?limpiarCadena($_POST["nombreNuevoProyecto"]):"";

			$idhash = generar_token_seguro(15);

			$rspta = $miswebs->nuevoProyecto($idusuario,$idhash,$nombreNuevoProyecto);
			echo ($rspta)?"exito":"error";

		break;

		case 'listarProyectos':
			$html = '';

			$rspta = $miswebs->listarProyectos($idusuario);
			while ($reg=$rspta->fetch_object()) {

				$html .= '<div class="col-6">
							<div class="card">
								<div class="card-body" style="height:100px;">
									<h4>tesosite.com/'.$reg->nombre_proyecto.'</h4>
								</div>
								<div class="card-footer">
									<a href="resumen" class="btn btn-outline-primary">Panel de control</a>
									<div class="float-end" style="margin-top:8px;">
										<i class="fa-solid fa-circle-exclamation"></i> Sin publicar
									</div>
								</div>
							</div>
						</div>';				
			}


			$data = array(
				"html"=>$html
			);

			echo json_encode($data);
		break;

	}

?>