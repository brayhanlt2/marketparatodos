function init(){
	$("#formLogin").on("submit", function(e){
		iniciarSesion(e);
	});
}


function iniciarSesion(e){
    e.preventDefault(); 
    $("#btnGuardarLogin").hide();
    $("#btnGifLogin").show();

    var formData = new FormData($("#formLogin")[0]);

    $.ajax({
      url: url_nivel_1 + "ajax/login.php?op=iniciarSesion",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(r){
        // console.log(r);
        var data = JSON.parse(r);
        // console.log(data);

        if (data.status=="exito") {
          localStorage.setItem("token", data.token);
          window.location.href="app/resumen";

        }else if (data.status=="error") {
          Swal.fire({
            icon: 'error',
            title: 'Datos incorrectos.',
            confirmButtonColor: '#0D6EFD',
          })

        }

        
        $("#btnGuardarLogin").show();
        $("#btnGifLogin").hide();
      }
    });
}








init();