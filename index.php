<?php 
	if (isset($_GET['vista'])) {

		$views = explode("/", $_GET['vista']);
		var_dump($views);

		if (!isset($views[1])) {
			$views[1] = "";
		}



		if (is_file('view_5/vistas/'.$views[0].'.php')) {
			
			include 'view_5/vistas/'.$views[0].'.php';


		}elseif (is_file('view_5/app/'.$views[1].'.php')) {
			
			include 'view_5/app/'.$views[1].'.php';



		}else{
			include 'view_5/vistas/home.php';
		}	
	
	}else {
		include 'view_5/vistas/home.php';
	}
?>
