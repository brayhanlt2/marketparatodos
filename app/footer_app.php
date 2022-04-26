			</div>	      
	    </main>
	  </div>
	</div>




<div class="modal fade" id="modalAgregarUsuario" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-header">
    		Agregar usuario
    	</div>
	    <div class="modal-body">
	      	
	        

	    </div>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
	function cerrarSesion(){
		localStorage.removeItem("token");
		var planNum = localStorage.getItem("plan").slice(0, -4);
		window.location.href="../"+planNum;
	}
	function mantenemos_la_sesion(){
		$("#divLoader").fadeOut( "slow", function() {
	    // Animation complete.
	  });
	}

	if (token===null){
		cerrarSesion();

	}else{
		// console.log(vistaName);
		$.post(url_nivel_2+'ajax/header.php?op=verificarToken', {token: token}, function(r) {
			var data = JSON.parse(r);
			
			var num=parseInt(data.cont);

			/*console.log(num);
			console.log(data.estado);
			console.log(vistaName);*/

			if (data.tipo_usuario=="admin") {

				if (vistaName=="controlpanel") {
					mantenemos_la_sesion();

				}else if (vistaName!="controlpanel") {
					window.location.href="controlpanel";
				}

			}else if (data.tipo_usuario=="usuario") {

				if((num>0 && data.estado=="activo") || (num>0 && data.estado=="pendiente" && vistaName=="graciasporsuscribirte_es")){
					mantenemos_la_sesion();
					
				}else if(num>0 && data.estado=="pendiente" && vistaName!="graciasporsuscribirte_es"){
					window.location.href="graciasporsuscribirte_es";
				}else{
					cerrarSesion();
				}

			}
				
		});
	}
		

</script>

<script src="../app/js/header.js"></script>


</body>



  
</html>