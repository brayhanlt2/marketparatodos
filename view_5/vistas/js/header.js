var paginaFueraDeLaVista = false;
var cardOpcionDeCompra = "basic";

function init(){
	/*ano footer*/
	var dt = new Date();
	$("#spanAnoFooter").text(dt.getFullYear());

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})
	$("#formRegistrateEmail_unirme").on("submit", function(e){
		guardarRegistrateEmail_unirme(e);
	});
}

function handleVisibilityChange() {
  if(document.hidden) {
    // the page is hidden
    // console.log("hidden");
    paginaFueraDeLaVista = true;
  }
}
document.addEventListener("visibilitychange", handleVisibilityChange, false);


function redirigir(val){
	window.location.href = val;
}

/*FORMULARIOS*/
function guardarRegistrateEmail_unirme(e){
	if (cardOpcionDeCompra=="basic") {

		e.preventDefault(); 
    $("#btnGuardarRegistrateEmail_unirme").hide();
    $("#btnGifRegistrateEmail_unirme").show();

    var formData = new FormData($("#formRegistrateEmail_unirme")[0]);

    $.ajax({
      url: url_nivel_1 + "ajax/header.php?op=guardarRegistrateEmail_unirme",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(r){

        // console.log(r);
        var data = JSON.parse(r);
        // console.log(data);
        
        if (data.estado=="exito") {

        	localStorage.setItem("token", data.token);
          window.location.href="app/resumen";

        }else if (data.estado=="error") {

					Swal.fire({
					  title: 'Oops...',
					  text: data.mensaje,
					  icon: 'error',
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Ok'
					}).then((result) => {
					  if (result.isConfirmed) {
					  	if (data.focus=="red") {
					    	$("#nombre_red_unirme").focus();
					  	}else if (data.focus=="email") {
					    	$("#email_unirme").focus();
					  	}
					  }
					})
        }
        
        $("#btnGuardarRegistrateEmail_unirme").show();
        $("#btnGifRegistrateEmail_unirme").hide();
      }
    });

	}else if (cardOpcionDeCompra=="vip") {
		e.preventDefault(); 
		
	}
    
}

var arranque="";
var estadoInput;

var	numNuevo;
var	numAntiguo;
var	nombreNuevo;
var	nombreAntiguo;

var redValidadaUltima;

function nombre_red_mayus_yaexistente() {
	var nombre_red = $("#red_yaexistente_unirme").val();
  $("#red_yaexistente_unirme").val(nombre_red.toUpperCase());		
}
function nombre_red_mayus_unirme() {
  var nombre_red = $("#nombre_red_unirme").val();
  $("#nombre_red_unirme").val(nombre_red.toUpperCase());
}


function seleccionar_cardOpcionDeCompra(val){
	cardOpcionDeCompra = val;
	if (val=="vip") {
		$("#cardOpcionDeCompra_div_basic").removeClass('cardOpcionDeCompraClass_seleccionado');
		$("#cardOpcionDeCompra_div_vip").addClass('cardOpcionDeCompraClass_seleccionado');

		$("#red_yaexistente_unirme").prop('disabled', true);
	
	}else if (val=="basic") {
		$("#cardOpcionDeCompra_div_basic").addClass('cardOpcionDeCompraClass_seleccionado');
		$("#cardOpcionDeCompra_div_vip").removeClass('cardOpcionDeCompraClass_seleccionado');
	
		$("#red_yaexistente_unirme").prop('disabled', false);
	}
}



init();