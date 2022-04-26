<?php include 'header_app.php'; ?>



<div class="row">
	<div class="col-11 mx-auto mt-4">
		

		<div>
			<span class="titulo">Mi cuenta</span>
			<div class="float-right">
				<div class="card">
					<div class="card-body text-right">
						<span class="negrita text20">Brayhan Ladines</span> <br>
						<span class="link" onclick="cerrarSesion();">Cerrar sesión</span>
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="margin-top:50px;">
			<div class="col-12">
				<span></span>
			</div>


			<div class="col-12">
				<div class="row">
					<div class="col-4">
						<span class="negrita">Nombre</span>
					</div>
					<div class="col-8">
						<div>
							<label>Nombre</label>
							<input type="text" class="form-control">
						</div>
						<div class="mt-3">
							<label>Apellidos</label>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>

				<div class="row mt-4">
					<div class="col-4">
						<span class="negrita">Contraseña</span>
					</div>
					<div class="col-8">
						<div>
							<button class="btn btn-primary">Cambiar contraseña</button>
						</div>
					</div>
				</div>

				<div class="row mt-4">
					<div class="col-4">
						<span class="negrita">Idioma del sistema</span>
					</div>
					<div class="col-8">
						<div>
							<select class="form-control" style="width: 100px !important;">
								<option value="Español">Español</option>
								<option value="Inglés">Inglés</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-4">
						<span class="negrita">Eliminar mi cuenta</span>
					</div>
					<div class="col-8">
						<div>
							<button class="btn btn-danger">Eliminar cuenta</button><br>
						</div>
						<div class="mt-2">
							<small>Solo puedes eliminar tu cuenta si todas tus páginas web son Free o Play</small>
						</div>
					</div>
				</div>
			</div>




		</div>

	</div>
</div>


	        
	      





<?php include 'footer_app.php'; ?>


<script src="js/micuenta.js"></script>