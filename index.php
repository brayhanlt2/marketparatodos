<?php 
	if (isset($_GET['vista'])) {

		$views = explode("/", $_GET['vista']);
		if (!isset($views[1])) {
			$views[1] = "";
		}

		if (is_file('vistas/'.$views[0].'.php')) {
			
			include 'vistas/'.$views[0].'.php';




		}elseif (is_file('app/'.$views[1].'.php')) {
			
			include 'app/'.$views[1].'.php';




		}else{
			include 'vistas/home.php';
		}	
	
	}else {
		include 'vistas/home.php';
	}
?>
