var modalAgregarUsuario = new bootstrap.Modal(document.getElementById('modalAgregarUsuario'), {
  keyboard: false
})

function init(){
	datosUsuario();
}

function redirigir(val){
	window.location.href = val;
}


function datosUsuario(){
	$.post(url_nivel_2+'ajax/header.php?op=datosUsuario',{token:token}, function(r) {
		// console.log(r)
		var data = JSON.parse(r);
		// console.log(data);
		dataUsuario = data;


		$(".redNameClass").text(data.nombre_red);
		$(".nivelNameClass").text(data.nivel);


		registradoo();
	});
}

function registradoo(){
	var circle="";
	console.log(dataUsuario);

	var cantidadDePasosCumplidos=0;
	var cantidadDePasosCumplidosWidth="0%";

	if (dataUsuario.cuenta_estado=="no registrado") {
		/*ABRIR MODAL PARA REGISTRAR*/
		// modalRegistrarRed.show();

		/*TU RED*/
		$("#tuRedDescripcion1").show();
		$("#tuRedDescripcion2").hide();
		$("#estadoIconDiv").html('<i class="fa-solid fa-circle text-danger"></i> <span class="estadoRegistroClass">NO REGISTRADO</span>');

		/*CONFIGURA TU RED*/
		/*PASO 1*/
		$("#configPaso1Text").html('<i class="fa-solid fa-circle fa-lg"></i> Registra tu red.');
		$("#configPaso1Boton").html('<button class="bttn-unite bttn-md bttn-primary">Registra tu red <i class="fa-solid fa-arrow-right"></i></button>');

		/*PASO 2*/
		$("#configPaso2Id").addClass("disabled");
		$("#configPaso2Text").html('<i class="fa-solid fa-circle fa-lg"></i> 0 usuarios registrados en tu red.');
		$("#configPaso2BotonBoton").attr("data-bs-toggle","");

		/*CARD RED*/
		$("#cardRegistraRed").show();

	}else if (dataUsuario.cuenta_estado=="registrado"){
		cantidadDePasosCumplidos++;
		cantidadDePasosCumplidosWidth="50%";
		
		/*TU RED*/
		$("#tuRedDescripcion1").hide();
		$("#tuRedDescripcion2").show();
		$("#estadoIconDiv").html('<i class="fa-solid fa-circle text-success"></i> <span class="estadoRegistroClass">REGISTRADO</span>');

		/*CONFIGURA TU RED*/
		/*PASO 1*/
		$("#configPaso1Id").addClass("active");

		$("#configPaso1Text").html('<i class="fa-solid fa-circle-check fa-lg"></i> Registra tu red.');
		$("#configPaso1Boton").html('Listo');

		/*PASO 2*/
		$("#configPaso2Id").removeClass("disabled");
		var check2='fa-circle';
		if (dataUsuario.cantidad_usuarios_directos>1) {
			cantidadDePasosCumplidos++;
			cantidadDePasosCumplidosWidth="100%";
			$("#configPaso2Id").addClass("active");

			check2 = 'fa-circle-check';
		}
		$("#configPaso2Text").html('<i class="fa-solid '+check2+' fa-lg"></i> '+dataUsuario.cantidad_usuarios_directos+' usuarios registrados en tu red.');
		$("#configPaso2BotonBoton").attr("data-bs-toggle","modal");

		/*CARD RED*/
		$("#cardRegistraRed").hide();
	}

	/*PROGRESS BAR*/
	$("#progressSpan").text(cantidadDePasosCumplidos+"/2");
	$("#progressBarConfigRed").css('width', cantidadDePasosCumplidosWidth);
}


/*REGISTRAR RED*/
function registrarRed(val){
	if (val=="basic") {

		$("#btn_registrarRedBasic").hide();
		$("#gif_registrarRedBasic").show();
		$.post(url_nivel_2+'ajax/header.php?op=registrarRed',{token:token}, function(r) {
			// console.log(r)
			if (r=="exito") {
				location.reload();
			}
			$("#btn_registrarRedBasic").show();
			$("#gif_registrarRedBasic").hide();
		});

	}else if (val=="vip") {
		console.log("configurar con Mercadopago.");
	}
}


init();