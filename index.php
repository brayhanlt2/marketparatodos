<?php 
	if (isset($_GET['vista'])) {

		$views = explode("/", $_GET['vista']);
		// var_dump($views);

		if (!isset($views[1])) {
			$views[1] = "";
		}
		if (!isset($views[2])) {
			$views[2] = "";
		}

	

		if ($views[0]=="5") {
			include 'view_5/home.php';

		}else if ($views[0]=="10") {
			include 'view_10/home.php';

		}else if (is_file('vistas/'.$views[0].'.php')) {			
			include 'vistas/'.$views[0].'.php';
		
		}else if (is_file('app/'.$views[1].'.php')) {			
			include 'app/'.$views[1].'.php';
		
		}else{
			// echo "GAAAAA";
			include 'view_5/home.php';
		}

			
	
	}else {
		// var_dump("GAAA");
		include 'view_5/home.php';

		/*REDIRECCION*/
		/*$host = $_SERVER['HTTP_HOST'];
		$ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$html = '5';
		$url = "http://$host$ruta/$html";
		// echo $url;
		header('Location: '.$url);
		die();*/
	}
?>
