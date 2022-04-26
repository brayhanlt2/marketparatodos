var	suscripcionCosto = 5;
var	comisionMercadopago = 1.2;
var paraRepartir = suscripcionCosto - comisionMercadopago;
var gananciasDirectasPorcentaje = 0.4;
var gananciasDeLaRedPorcentaje = parseFloat(1-gananciasDirectasPorcentaje);
var gananciasDirectasXUsuario = (gananciasDirectasPorcentaje * paraRepartir);
var gananciasDeLaRedXUsuario = [];
var nivelJerarquico = 8;


function init(){
	cantidad_actual_participantes();
	porcentaje_herencia_array(1000);

	$("#nivelJerarquicoSpan").text(nivelJerarquico);

	$(".costoSuscripcionSpan").text(suscripcionCosto.toFixed(0));
	$(".costoSuscripcion_2decimales").text(suscripcionCosto.toFixed(2));	

	$(".comisionMercadopagoSpan").text(comisionMercadopago.toFixed(2));
	$(".paraRepartirSpan").text(paraRepartir.toFixed(2));
	$(".gananciasDirectasPorcentajeSpan").text(gananciasDirectasPorcentaje*100);
	$(".gananciasDeLaRedPorcentajeSpan").text(gananciasDeLaRedPorcentaje*100);
	$(".gananciasDirectasSpan").text(gananciasDirectasXUsuario.toFixed(2));

	$("#gananciaDirecta_1_0").text(gananciasDirectasXUsuario.toFixed(2));
	$("#gananciaDirecta_1_1").text(gananciasDirectasXUsuario.toFixed(2));
	$("#gananciaDirecta_1_2").text(gananciasDirectasXUsuario.toFixed(2));
	$("#gananciaDirecta_1_3").text(gananciasDirectasXUsuario.toFixed(2));
	$("#gananciaDirecta_1_4").text(gananciasDirectasXUsuario.toFixed(2));
}

function cantidad_actual_participantes(){
	$.post(url_nivel_1+'ajax/home.php?op=cantidad_actual_participantes', function(r) {
		console.log(r)
		$("#cantidad_actual_participantes").text(r);
	});
}
function porcentaje_herencia_array(val){
	var result=[];
	for (i=0; i < val; i++) { 
			var porcentaje_que_recibo = (i!=0)? (100/i)/100 : 1;
			var aporte_que_recibo = (gananciasDeLaRedPorcentaje * paraRepartir) *porcentaje_que_recibo;

			result[i] = {
				"porcentaje_que_recibo": porcentaje_que_recibo,
				"aporte": aporte_que_recibo,
			};
	}
	
	gananciasDeLaRedXUsuario = result;
	// return result;
}









/*SIMULADOR*/
	var cuadroSeleccionado = "0_0";
	var filaSeleccionada = {
		"fila":0,
		"posicion":"",
		"subposicion":"",
	};
	var fila1_posicion=0;
	var tamano_wrapper = 0;
	var fila2_0_posicion=0;
	var fila2_1_posicion=0;
	var fila2_2_posicion=0;
	var fila2_3_posicion=0;
	var fila2_4_posicion=0;
	var fila3_0_0_posicion=0;
	var fila3_0_1_posicion=0;
	var fila3_1_0_posicion=0;
	var fila3_1_1_posicion=0;
	var fila3_2_0_posicion=0;
	var fila3_2_1_posicion=0;
	var fila3_3_0_posicion=0;
	var fila3_3_1_posicion=0;
	var fila3_4_0_posicion=0;
	var fila3_4_1_posicion=0;

	var gananciasDirectas=0; 
	var gananciasDeLaRed=0;

	function agragarFilaOrganigrama(nivel){
		
		/* POR FILA */
		if (filaSeleccionada["fila"]==0) {

			$("#lvl2wrapperID").show();


			/*ganancias*/
			gananciasDirectas += parseFloat(gananciasDirectasXUsuario);			
			gananciasDeLaRed += parseFloat(gananciasDeLaRedXUsuario[nivelJerarquico]["aporte"]);
			$("#gananciaPorLaRed_1_"+fila1_posicion).text(gananciasDeLaRedXUsuario[nivelJerarquico]["aporte"].toFixed(2));
			

			if (fila1_posicion<5) {

				/*TAMANO WRAPPER*/
				tamano_wrapper=(fila1_posicion+1);
				$(".level-2-wrapper").css("grid-template-columns", "repeat("+tamano_wrapper+", 1fr)");


				/* LINEA DIVISORIA NIVEL 1 */
				if (fila1_posicion==0) {
					$("#li_0_0_1_0").show();
					
				}else if(fila1_posicion==1){
					$("#li_0_0_1_1").show();
					$("#linea_divisoria").show();

				}else if(fila1_posicion==2){
					$("#li_0_0_1_2").show();
					$(".linea_divisoria").css("width", "66.8%");

				}else if(fila1_posicion==3){
					$("#li_0_0_1_3").show();
					$(".linea_divisoria").css("width", "75%");

				}else if(fila1_posicion==4){
					$("#li_0_0_1_4").show();
					$(".linea_divisoria").css("width", "80%");

				}
			}

			fila1_posicion++;
			$("#spanCantidadUsuarios_nivel0").text(fila1_posicion);



		}else if (filaSeleccionada["fila"]==1) {
			
			

			$("#lvl3wrapperID_"+filaSeleccionada["posicion"]).show();

			if (filaSeleccionada["posicion"]==0) {
				/*TAMANO WRAPPER*/
				tamano_wrapper=fila2_0_posicion+1;

				/*ganancias*/
				$("#gananciaPorLaRed_1_0_2_"+fila2_0_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+1)]["aporte"].toFixed(2));

				
				/* POR POSICION */
				if (fila2_0_posicion==0) {
					$("#li_0_0_1_0_2_0").show();
					
				}else if(fila2_0_posicion==1){
					$("#li_0_0_1_0_2_1").show();
					$("#linea_divisoria_2_0").show();
				}

				fila2_0_posicion++;
				$("#spanCantidadUsuarios_nivel1_0").text(fila2_0_posicion);
				
		
			}else if (filaSeleccionada["posicion"]==1) {
				/*TAMANO WRAPPER*/
				tamano_wrapper=fila2_1_posicion+1;

				/*ganancias*/
				$("#gananciaPorLaRed_1_1_2_"+fila2_1_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+1)]["aporte"].toFixed(2));

				
				/* POR POSICION */
				if (fila2_1_posicion==0) {
					$("#li_0_0_1_1_2_0").show();
					
				}else if(fila2_1_posicion==1){
					$("#li_0_0_1_1_2_1").show();
					$("#linea_divisoria_2_1").show();

				}

				fila2_1_posicion++;
				$("#spanCantidadUsuarios_nivel1_1").text(fila2_1_posicion);
				

			}else if (filaSeleccionada["posicion"]==2) {
				/*TAMANO WRAPPER*/
				tamano_wrapper=fila2_2_posicion+1;

				/*ganancias*/
				$("#gananciaPorLaRed_1_2_2_"+fila2_2_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+1)]["aporte"].toFixed(2));

				
				/* POR POSICION */
				if (fila2_2_posicion==0) {
					$("#li_0_0_1_2_2_0").show();
					
				}else if(fila2_2_posicion==1){
					$("#li_0_0_1_2_2_1").show();
					$("#linea_divisoria_2_2").show();

				}

				fila2_2_posicion++;
				$("#spanCantidadUsuarios_nivel1_2").text(fila2_2_posicion);

				
			}else if (filaSeleccionada["posicion"]==3) {
				/*TAMANO WRAPPER*/
				tamano_wrapper=fila2_3_posicion+1;

				/*ganancias*/
				$("#gananciaPorLaRed_1_3_2_"+fila2_3_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+1)]["aporte"].toFixed(2));

				
				/* POR POSICION */
				if (fila2_3_posicion==0) {
					$("#li_0_0_1_3_2_0").show();
					
				}else if(fila2_3_posicion==1){
					$("#li_0_0_1_3_2_1").show();
					$("#linea_divisoria_2_3").show();
				}

				fila2_3_posicion++;
				$("#spanCantidadUsuarios_nivel1_3").text(fila2_3_posicion);
				
				
			}else if (filaSeleccionada["posicion"]==4) {
				/*TAMANO WRAPPER*/
				tamano_wrapper=fila2_4_posicion+1;

				/*ganancias*/
				$("#gananciaPorLaRed_1_4_2_"+fila2_4_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+1)]["aporte"].toFixed(2));

				
				/* POR POSICION */
				if (fila2_4_posicion==0) {
					$("#li_0_0_1_4_2_0").show();
					
				}else if(fila2_4_posicion==1){
					$("#li_0_0_1_4_2_1").show();
					$("#linea_divisoria_2_4").show();
				}

				fila2_4_posicion++;
				$("#spanCantidadUsuarios_nivel1_4").text(fila2_4_posicion);
				
			}

			/*ganancias*/
			gananciasDeLaRed += parseFloat(gananciasDeLaRedXUsuario[(nivelJerarquico+1)]["aporte"]);


				
		}else if (filaSeleccionada["fila"]==2) {
					
			

			if (filaSeleccionada["posicion"]==0) {
				if (filaSeleccionada["subposicion"]==0) {
				
					$("#lvl4wrapperID_0_0_1_0_2_0").show();

					/*ganancias*/
					$("#gananciaPorLaRed_1_0_2_0_3_"+fila3_0_0_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


					/* POR POSICION */
					$("#li_0_0_1_0_2_0_3_"+fila3_0_0_posicion).show();

					fila3_0_0_posicion++;
					$("#spanCantidadUsuarios_nivel2_0_0").text(fila3_0_0_posicion);
						
					
				}else{
					if (fila3_0_1_posicion<5) {
						$("#lvl4wrapperID_0_0_1_0_2_1").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_0_2_1_3_"+fila3_0_1_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_0_2_1_3_"+fila3_0_1_posicion).show();

						if (fila3_0_1_posicion<5) {
							fila3_0_1_posicion++;
							$("#spanCantidadUsuarios_nivel2_0_1").text(fila3_0_1_posicion);
						}
					}
				}
					

			}else if (filaSeleccionada["posicion"]==1){

				if (filaSeleccionada["subposicion"]==0) {
					if (fila3_1_0_posicion<5) {
						$("#lvl4wrapperID_0_0_1_1_2_0").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_1_2_0_3_"+fila3_1_0_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_1_2_0_3_"+fila3_1_0_posicion).show();

						if (fila3_1_0_posicion<5) {
							fila3_1_0_posicion++;
							$("#spanCantidadUsuarios_nivel2_1_0").text(fila3_1_0_posicion);
						}
					}
						
				}else{
					if (fila3_1_1_posicion<5) {
						$("#lvl4wrapperID_0_0_1_1_2_1").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_1_2_1_3_"+fila3_1_1_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_1_2_1_3_"+fila3_1_1_posicion).show();

						if (fila3_1_1_posicion<5) {
							fila3_1_1_posicion++;
							$("#spanCantidadUsuarios_nivel2_1_1").text(fila3_1_1_posicion);
						}
					}	
				}				


			}else if (filaSeleccionada["posicion"]==2){

				if (filaSeleccionada["subposicion"]==0) {
					if (fila3_2_0_posicion<5) {
						$("#lvl4wrapperID_0_0_1_2_2_0").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_2_2_0_3_"+fila3_2_0_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_2_2_0_3_"+fila3_2_0_posicion).show();

						if (fila3_2_0_posicion<5) {
							fila3_2_0_posicion++;
							$("#spanCantidadUsuarios_nivel2_2_0").text(fila3_2_0_posicion);
						}
					}

				}else{
					if (fila3_2_1_posicion<5) {
						$("#lvl4wrapperID_0_0_1_2_2_1").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_2_2_1_3_"+fila3_2_1_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_2_2_1_3_"+fila3_2_1_posicion).show();

						if (fila3_2_1_posicion<5) {
							fila3_2_1_posicion++;
							$("#spanCantidadUsuarios_nivel2_2_1").text(fila3_2_1_posicion);
						}
					}
				}				


			}else if (filaSeleccionada["posicion"]==3){

				if (filaSeleccionada["subposicion"]==0) {
					if (fila3_3_0_posicion<5) {
						$("#lvl4wrapperID_0_0_1_3_2_0").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_3_2_0_3_"+fila3_3_0_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_3_2_0_3_"+fila3_3_0_posicion).show();

						if (fila3_3_0_posicion<5) {
							fila3_3_0_posicion++;
							$("#spanCantidadUsuarios_nivel2_3_0").text(fila3_3_0_posicion);
						}
					}
						
				}else{
					if (fila3_3_1_posicion<5) {
						$("#lvl4wrapperID_0_0_1_3_2_1").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_3_2_1_3_"+fila3_3_1_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_3_2_1_3_"+fila3_3_1_posicion).show();

						if (fila3_3_1_posicion<5) {
							fila3_3_1_posicion++;
							$("#spanCantidadUsuarios_nivel2_3_1").text(fila3_3_1_posicion);
						}
					}
						
				}				


			}else if (filaSeleccionada["posicion"]==4){

				if (filaSeleccionada["subposicion"]==0) {
					if (fila3_4_0_posicion<5) {
						$("#lvl4wrapperID_0_0_1_4_2_0").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_4_2_0_3_"+fila3_4_0_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_4_2_0_3_"+fila3_4_0_posicion).show();

						if (fila3_4_0_posicion<5) {
							fila3_4_0_posicion++;
							$("#spanCantidadUsuarios_nivel2_4_0").text(fila3_4_0_posicion);
						}
					}
						
				}else{
					if (fila3_4_1_posicion<5) {
						$("#lvl4wrapperID_0_0_1_4_2_1").show();

						/*ganancias*/
						$("#gananciaPorLaRed_1_4_2_1_3_"+fila3_4_1_posicion).text(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"].toFixed(2));


						/* POR POSICION */
						$("#li_0_0_1_4_2_1_3_"+fila3_4_1_posicion).show();

						if (fila3_4_1_posicion<5) {
							fila3_4_1_posicion++;
							$("#spanCantidadUsuarios_nivel2_4_1").text(fila3_4_1_posicion);
						}
					}
						
				}

			}
			

			/*ganancias*/
			gananciasDeLaRed += parseFloat(gananciasDeLaRedXUsuario[(nivelJerarquico+2)]["aporte"]);
		}


		/*TAMANO WRAPPER*/
		if (tamano_wrapper<3) {
			if (filaSeleccionada["fila"]==1) {
				$(".level-3-wrapper_"+filaSeleccionada["posicion"]).css("grid-template-columns", "repeat("+tamano_wrapper+", 1fr)");
			}else{
				$(".level-3-wrapper").css("grid-template-columns", "repeat("+tamano_wrapper+", 1fr)");
			}		
		}

		/*ganancia directa*/
		$("#gananciaDirecta_0").html(gananciasDirectas.toFixed(2));
		$("#gananciaPorLaRed_0").html(gananciasDeLaRed.toFixed(2));
		$("#simulador_ingresoTotal").html((parseFloat(gananciasDirectas.toFixed(2)) + parseFloat(gananciasDeLaRed.toFixed(2))).toFixed(2) + " PEN");
	}

	function resetOrganigrama(){
		cuadroSeleccionado = "0_0";
		filaSeleccionada = {
			"fila":0,
			"posicion":"",
			"subposicion":"",
		};

		fila1_posicion=0;
		tamano_wrapper = 0;
		fila2_0_posicion=0;
		fila2_1_posicion=0;
		fila2_2_posicion=0;
		fila2_3_posicion=0;
		fila2_4_posicion=0;
		fila3_0_0_posicion=0;
		fila3_0_1_posicion=0;
		fila3_1_0_posicion=0;
		fila3_1_1_posicion=0;
		fila3_2_0_posicion=0;
		fila3_2_1_posicion=0;
		fila3_3_0_posicion=0;
		fila3_3_1_posicion=0;
		fila3_4_0_posicion=0;
		fila3_4_1_posicion=0;


		gananciasDirectas=0; 
		gananciasDeLaRed=0;
		/*ganancia directa*/
		$("#gananciaDirecta_0").html("0.00");
		$("#gananciaPorLaRed_0").html("0.00");
		$("#simulador_ingresoTotal").html("0.00" + " PEN");


		/*fila1*/
		$("#lvl2wrapperID").hide();
		$(".linea_divisoria").css("width", "50%");
		$("#linea_divisoria").hide();
		$("#li_0_0_1_0").hide();
		$("#li_0_0_1_1").hide();
		$("#li_0_0_1_2").hide();
		$("#li_0_0_1_3").hide();
		$("#li_0_0_1_4").hide();
		$("#spanCantidadUsuarios_nivel0").text(fila1_posicion);
		
		/*fila2*/
		$("#lvl3wrapperID_0").hide();
		$("#lvl3wrapperID_1").hide();
		$("#lvl3wrapperID_2").hide();
		$("#lvl3wrapperID_3").hide();
		$("#lvl3wrapperID_4").hide();
		$("#li_0_0_1_0_2_0").hide();
		$("#li_0_0_1_0_2_1").hide();
		$("#li_0_0_1_1_2_0").hide();
		$("#li_0_0_1_1_2_1").hide();
		$("#li_0_0_1_2_2_0").hide();
		$("#li_0_0_1_2_2_1").hide();
		$("#li_0_0_1_3_2_0").hide();
		$("#li_0_0_1_3_2_1").hide();
		$("#li_0_0_1_4_2_0").hide();
		$("#li_0_0_1_4_2_1").hide();
		$("#linea_divisoria_2_0").hide();
		$("#linea_divisoria_2_1").hide();
		$("#linea_divisoria_2_2").hide();
		$("#linea_divisoria_2_3").hide();
		$("#linea_divisoria_2_4").hide();
		$("#spanCantidadUsuarios_nivel1_0").text(fila2_0_posicion);
		$("#spanCantidadUsuarios_nivel1_1").text(fila2_1_posicion);
		$("#spanCantidadUsuarios_nivel1_2").text(fila2_2_posicion);
		$("#spanCantidadUsuarios_nivel1_3").text(fila2_3_posicion);
		$("#spanCantidadUsuarios_nivel1_4").text(fila2_4_posicion);

		/*fila3*/
		$("#lvl4wrapperID_0_0_1_0_2_0").hide();
		$("#lvl4wrapperID_0_0_1_0_2_1").hide();
		$("#lvl4wrapperID_0_0_1_1_2_0").hide();
		$("#lvl4wrapperID_0_0_1_1_2_1").hide();
		$("#lvl4wrapperID_0_0_1_2_2_0").hide();
		$("#lvl4wrapperID_0_0_1_2_2_1").hide();
		$("#lvl4wrapperID_0_0_1_3_2_0").hide();
		$("#lvl4wrapperID_0_0_1_3_2_1").hide();
		$("#lvl4wrapperID_0_0_1_4_2_0").hide();
		$("#lvl4wrapperID_0_0_1_4_2_1").hide();
		$("#li_0_0_1_0_2_0_3_0").hide();
		$("#li_0_0_1_0_2_0_3_1").hide();
		$("#li_0_0_1_0_2_0_3_2").hide();
		$("#li_0_0_1_0_2_0_3_3").hide();
		$("#li_0_0_1_0_2_0_3_4").hide();
		$("#li_0_0_1_0_2_1_3_0").hide();
		$("#li_0_0_1_0_2_1_3_1").hide();
		$("#li_0_0_1_0_2_1_3_2").hide();
		$("#li_0_0_1_0_2_1_3_3").hide();
		$("#li_0_0_1_0_2_1_3_4").hide();
		$("#li_0_0_1_1_2_0_3_0").hide();
		$("#li_0_0_1_1_2_0_3_1").hide();
		$("#li_0_0_1_1_2_0_3_2").hide();
		$("#li_0_0_1_1_2_0_3_3").hide();
		$("#li_0_0_1_1_2_0_3_4").hide();
		$("#li_0_0_1_1_2_1_3_0").hide();
		$("#li_0_0_1_1_2_1_3_1").hide();
		$("#li_0_0_1_1_2_1_3_2").hide();
		$("#li_0_0_1_1_2_1_3_3").hide();
		$("#li_0_0_1_1_2_1_3_4").hide();
		$("#li_0_0_1_2_2_0_3_0").hide();
		$("#li_0_0_1_2_2_0_3_1").hide();
		$("#li_0_0_1_2_2_0_3_2").hide();
		$("#li_0_0_1_2_2_0_3_3").hide();
		$("#li_0_0_1_2_2_0_3_4").hide();
		$("#li_0_0_1_2_2_1_3_0").hide();
		$("#li_0_0_1_2_2_1_3_1").hide();
		$("#li_0_0_1_2_2_1_3_2").hide();
		$("#li_0_0_1_2_2_1_3_3").hide();
		$("#li_0_0_1_2_2_1_3_4").hide();
		$("#li_0_0_1_3_2_0_3_0").hide();
		$("#li_0_0_1_3_2_0_3_1").hide();
		$("#li_0_0_1_3_2_0_3_2").hide();
		$("#li_0_0_1_3_2_0_3_3").hide();
		$("#li_0_0_1_3_2_0_3_4").hide();
		$("#li_0_0_1_3_2_1_3_0").hide();
		$("#li_0_0_1_3_2_1_3_1").hide();
		$("#li_0_0_1_3_2_1_3_2").hide();
		$("#li_0_0_1_3_2_1_3_3").hide();
		$("#li_0_0_1_3_2_1_3_4").hide();
		$("#li_0_0_1_4_2_0_3_0").hide();
		$("#li_0_0_1_4_2_0_3_1").hide();
		$("#li_0_0_1_4_2_0_3_2").hide();
		$("#li_0_0_1_4_2_0_3_3").hide();
		$("#li_0_0_1_4_2_0_3_4").hide();
		$("#li_0_0_1_4_2_1_3_0").hide();
		$("#li_0_0_1_4_2_1_3_1").hide();
		$("#li_0_0_1_4_2_1_3_2").hide();
		$("#li_0_0_1_4_2_1_3_3").hide();
		$("#li_0_0_1_4_2_1_3_4").hide();
		$("#spanCantidadUsuarios_nivel2_0_0").text(fila3_0_0_posicion);
		$("#spanCantidadUsuarios_nivel2_0_1").text(fila3_0_1_posicion);
		$("#spanCantidadUsuarios_nivel2_1_0").text(fila3_1_0_posicion);
		$("#spanCantidadUsuarios_nivel2_1_1").text(fila3_1_1_posicion);
		$("#spanCantidadUsuarios_nivel2_2_0").text(fila3_2_0_posicion);
		$("#spanCantidadUsuarios_nivel2_2_1").text(fila3_2_1_posicion);
		$("#spanCantidadUsuarios_nivel2_3_0").text(fila3_3_0_posicion);
		$("#spanCantidadUsuarios_nivel2_3_1").text(fila3_3_1_posicion);
		$("#spanCantidadUsuarios_nivel2_4_0").text(fila3_4_0_posicion);
		$("#spanCantidadUsuarios_nivel2_4_1").text(fila3_4_1_posicion);

		seleccionarOrganigrama("h_0_0");
	}

	function seleccionarOrganigrama(id){
		$("#h_"+cuadroSeleccionado).removeClass("seleccionado");

		var id_modificado = id.slice(2);
		var posicion = parseInt(id.slice(-1));
		var pos2dafila = id.slice(-5,-4);
		$("#h_"+id_modificado).addClass("seleccionado");
		cuadroSeleccionado=id_modificado;
		/*console.log(id_modificado)
		console.log(posicion)
		console.log(id_modificado.length)
		console.log(pos2dafila)*/

		if (id_modificado.length==3) {
			filaSeleccionada["fila"]=0;
			filaSeleccionada["posicion"]=posicion;
			filaSeleccionada["subposicion"]="";

		}else if (id_modificado.length==7) {
			filaSeleccionada["fila"]=1;
			filaSeleccionada["posicion"]=posicion;
			filaSeleccionada["subposicion"]="";

		}else if (id_modificado.length==11) {
			filaSeleccionada["fila"]=2;
			filaSeleccionada["posicion"]=pos2dafila;
			filaSeleccionada["subposicion"]=posicion;

		}else if (id_modificado.length==15) {
			filaSeleccionada["fila"]=3;
			filaSeleccionada["posicion"]=posicion;
			filaSeleccionada["subposicion"]="";

		}
	}







init();