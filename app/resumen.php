<?php include 'header_app.php'; ?>



<div class="row">
	<div class="col-11 mx-auto mt-4">

		<div class="row">
			
			<div class="col-8 mt-3">
				<!-- TU RED -->			
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<span class="negrita text20">Tu red</span>
								<div class="float-right" id="estadoIconDiv">
									
								</div>
							</div>
							<div class="col-12 mt-2">
								<div id="tuRedDescripcion1">
									<span class="negrita redNameClass"></span> aún se encuentra disponible. <a class="link" data-bs-toggle="modal" data-bs-target="#modalRegistrarRed">Regístralo ahora</a>
								</div>
								<div id="tuRedDescripcion2">
									<span class="negrita redNameClass"></span> se encuentra en el <span class="negrita">NIVEL <span class="nivelNameClass"></span></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- CONFIGURA TU RED -->
				<div class="row mt-4">
					<div class="col-12">
						<span class="subtitulo">Configura tu red</span>
						<div class="float-right negrita text-right" style="width: 80px">
							<span id="progressSpan">0/0</span>
							<div class="progress">
							  <div id="progressBarConfigRed" class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="col-12 mt-3">
						<div class="card">
							<table class="table">
								<tr id="configPaso1Id">
									<td >
										<div class="float-left mt-2">
											<span id="configPaso1Text"></span>
										</div>
										<div class="float-right mt-2" id="configPaso1Boton">
											
										</div>
									</td>
								</tr>
								<tr id="configPaso2Id">
									<td>
										<div class="float-left mt-2">
											<span id="configPaso2Text"></span>
										</div>
										
										<div class="float-right" id="configPaso2Boton">
											<button id="configPaso2BotonBoton" class="bttn-unite bttn-md bttn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">Agregar usuario <i class="fa-solid fa-arrow-right"></i></button>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				
			</div>

			<!-- ESTADISTICAS -->
			<div class="col-4">
				<div class="card mt-3" id="cardRegistraRed">
					<div class="card-body">
						<span class="negrita text20"><i class="fa-solid fa-laptop-code fa-lg"></i> <a  data-bs-toggle="modal" data-bs-target="#modalRegistrarRed">Registra tu red</a></span>
					</div>
				</div>

				<div class="card mt-3" id="cardEstadisticas">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<span class="negrita">ESTADÍSTICAS DETALLADAS</span>
							</div>
							<div class="col-12 mt-2">
								<span class="">¿Quieres saber más sobre tu red? Haz un seguimiento de tu tráfico y tus visitantes con las estadísticas de TESO. ¡Actívalas en un momento!</span>
							</div>
							<div class="col-12 mt-3">
								<table class="table">
									<tr>
										<td style="border-top-width: 1px;">
											<div class="float-left mt-2">
												<a class="negrita color1">Activar las estadísticas</a>
											</div>
											
											<div class="float-right mt-3">
												<i class="fa-solid fa-angle-right negrita color1"></i>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- CUPON HTML -->
				<!-- <div class="card mt-4">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<span class="negrita text20">¡Ahorra el 40% en cualquiera de los planes premium!</span>
							</div>
							<div class="col-12 mt-2">
								<span>Copia el siguiente código y canjéalo durante el proceso de compra. Oferta válida solo hasta el 28/02/2022*</span>
							</div>
							<div class="col-12 mt-3">
								<input type="text" class="form-control" value="40TESO" readonly disabled>
							</div>
							<div class="col-12 mt-3 text-center">
								<button class="btn btn-success">Aprovechar descuento ahora</button>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>

	</div>
</div>



	        
	      



<?php include 'footer_app.php'; ?>


<script src="js/resumen.js"></script>