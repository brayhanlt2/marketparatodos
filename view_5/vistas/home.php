<?php include 'header_web.php'; ?>
<link rel="stylesheet" href="view_5/vistas/css/home.css">
<link rel="stylesheet" href="view_5/vistas/css/simulador.css">






<div class="container">
  
  <div class="card">
    <div class="card-body">
      <h1 class="color1 text-center mt-1 acercarSubtitulo tamanoMarketparatodos">Marketparatodos</h1>
      <h4 class="text-center tamanoSubtitulo">RED DE MERCADEO POR SUSCRIPCIÓN</h4>

      <h4>Miembros activos en la red <span id="cantidad_actual_participantes">0</span></h4>
    </div>
  </div>


  <div class="card mt-2">
    <div class="card-body">

      <h1 class="color1 text-center">¿POR QUÉ TESO?</h1>
      <h5>1. El costo de suscripción para red de mercadeo más baja del mercado, <span class="costoSuscripcionSpan"></span> PEN. </h5>
      <h5>2. Recibe ganancias del 30% de cada suscripción agregada a tu red. </h5>
      <h5>3. Regístrate y tendrás 2 formas de ganar dinero, ganancia directa(el 30% de cada suscripción se destina a pagar al dueño de la red a la que ha sido agregado directamente) y ganancia por la red(el 70% de cada suscripcion se reparte por igual entre todos los que están arriba jerarquicamente).</h5>
      

    </div>
  </div>

  <div class="card mt-2">
    <div class="card-body">

      <h1 class="color1 text-center acercarSubtitulo">MÁS RAZONES</h1>
      <h4 class="text-center tamanoSubtitulo">PARA ESTAR JUNTOS A TESO</h4>

      <div class="row mt-5">
        <div class="col-3">
          <div class="cuadroRazones">
            <h4>TEN UN INGRESO PASIVO</h4>
            <h6>Crea tu propria red virtual TESO por tan solo <span class="costoSuscripcionSpan"></span> PEN al mes y ten un ingreso pasivo desde cualquier lugar y cuando quieras.</h6>
            <div class="cuadroRazonesFooter">T</div>
          </div>
          
        </div>
        <div class="col-3">
          <div class="cuadroRazones">
            <h4>EL PRIMERO DE MUCHOS</h4>  
            <h6>Hemos lanzando esta red de <span class="costoSuscripcionSpan"></span> PEN, cuando lleguemos a 1000 miembros activos lanzaremos otra red totalmente independiente de 10 PEN.</h6>
            <div class="cuadroRazonesFooter">E</div>
          </div>
        </div>
        <div class="col-3">
          <div class="cuadroRazones">
            <h4>USUARIOS GRATIS PARA TU RED</h4>
            <h6>Los que se unan a la red sin especificar a donde se quieran unir, serán agregados aleatoriamente a una red, dándonos una oportunidad única con el paso del tiempo.</h6>
            <div class="cuadroRazonesFooter">S</div>
          </div>
        </div>
        <div class="col-3">
          <div class="cuadroRazones">
            <h4>OFERTAS EXCLUSIVAS</h4>
            <h6></h6> 
            <div class="cuadroRazonesFooter">O</div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="card mt-2">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-left">
            <h1 class="color1 text-center acercarSubtitulo">SIMULADOR</h1>
            <h4 class="text-center tamanoSubtitulo">SIMULA TU GANANCIA</h4>
          </div>
          <div class="col-12 text-center mt-4">
              
              <table class="tablaSimulador mx-auto">
                <tr>
                  <th class="align-middle tablaSimuladorTh">Pago de suscripción</th>                  
                  <td class="align-middle tablaSimuladorTd"><span class="costoSuscripcion_2decimales"></span> PEN</td>

                  <th class="align-middle tablaSimuladorTh"><i class="fa-solid fa-hand-holding-dollar fa-2x text-success"></i> Ganancias directas (<span class="gananciasDirectasPorcentajeSpan"></span>%) </th>
                  <td class="align-middle tablaSimuladorTd text-success"><span class="gananciasDirectasSpan"></span> PEN</td>
                  
                </tr>
                <tr>
                  <th class="align-middle tablaSimuladorTh">Comisión de Mercadopago</th>
                  <td class="align-middle tablaSimuladorTd text-danger"> -<span class="comisionMercadopagoSpan"></span> PEN</td>

                  <th class="align-middle tablaSimuladorTh"><i class="fa-solid fa-arrow-up-short-wide fa-2x text-success"></i> Ganancias por la red (<span class="gananciasDeLaRedPorcentajeSpan"></span>%) </th>
                  <td class="align-middle tablaSimuladorTd text-success">Varía según el nivel jerárquico.</td>
                </tr>
                <tr>
                  <th class="align-middle tablaSimuladorTh pt5px">Para repartir (100%)</th>
                  <td class="align-middle tablaSimuladorTd"><span class="paraRepartirSpan"></span> PEN</td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            
          </div>
          

          <div class="container-organigrama mt-5">
            <div class="float-start">
              <div class="nivelJerarquicoDiv">Nivel jerárquico de ejemplo: <span id="nivelJerarquicoSpan"></span></div>
            </div>
            <div class="float-end">
              <button class="bttn-unite bttn-primary" onclick="agragarFilaOrganigrama();" data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar usuario"><i class="fa-solid fa-user-plus"></i></button>
              <button class="bttn-unite bttn-primary" onclick="resetOrganigrama();" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset"><i class="fa-solid fa-rotate"></i></button>
            </div>

            <!-- NIVE81 -->
            <h1 id="h_0_0" class="level-1 rectangle seleccionado align-middle" onclick="seleccionarOrganigrama(this.id);" style="margin-bottom: 19px;">
              <div class="row">
                <div class="col-5 pr-0" style="padding-top: 12px;padding-left: 11px;">
                  <span id="spanCantidadUsuarios_nivel0" class="mb-1">0</span> <i class="fa-solid fa-user"></i> <span style="margin-left:5px;">Tu red recibe</span> 
                </div>
                <div class="col-7 pl-0" style="padding-right: 0px;padding-left: 0px;">
                  <span class="badge bg-light badgeRed text-success"> 
                    <span class="row">
                      <div class="col-4" style="margin-top: 3px">
                        <small style="font-size: 13px;"><i class="fa-solid fa-hand-holding-dollar"></i> <span id="gananciaDirecta_0">0.00</span></small> <br>
                        <small style="font-size: 13px;"><i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_0">0.00</small></span>
                      </div>
                      <div class="col-8" style="border-left:1px solid var(--color1);height:35px;line-height: 17px;font-size: 15px;font-weight: 900;">
                        Ingreso generado <br>
                        <span id="simulador_ingresoTotal">0.00 PEN</span> x mes
                      </div>
                    </span>
                  </span>
                </div>
              </div>
            </h1>

            <div id="linea_divisoria" class="linea_divisoria mx-auto" style="display: none;"></div>

            <ol class="level-2-wrapper" id="lvl2wrapperID" style="display:none;">
                <li id="li_0_0_1_0" style="display: none;">
                  <h2 id="h_0_0_1_0" class="level-2 rectangle" onclick="seleccionarOrganigrama(this.id);">
                    <div class="row">
                      <div class="col" style="padding-top: 9px;">
                        <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel1_0">0</span>
                      </div>
                      <div class="col text-success">
                        <span class="badge bg-secondary text-light badgeRed text-success"> 
                          <small style="font-size: 12px;">+<i class="fa-solid fa-hand-holding-dollar"></i> <span id="gananciaDirecta_1_0">0.00</span></small> <br>
                          <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0">0.00</span></small>
                        </span>
                      </div>
                    </div>
                  </h2>
                  <div id="linea_divisoria_2_0" class="linea_divisoria_2_0 mx-auto" style="display: none;"></div>

                  <ol class="level-3-wrapper_0"  id="lvl3wrapperID_0" style="display:none;">
                      <li id="li_0_0_1_0_2_0" style="display:none;">
                          <h3 id="h_0_0_1_0_2_0" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_0_0">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_0">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_0_2_0" style="display: none;">
                              <li id="li_0_0_1_0_2_0_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_0_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_0_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_0_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_0_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_0_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_0_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_0_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_0_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_0_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_0_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_0_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_0_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_0_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_0_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                      <li id="li_0_0_1_0_2_1" style="display:none;">
                          <h3 id="h_0_0_1_0_2_1" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">                            
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_0_1">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_1">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_0_2_1" style="display: none;">
                              <li id="li_0_0_1_0_2_1_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_1_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_1_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_1_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_1_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_1_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_1_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_1_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_1_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_1_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_1_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_1_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_0_2_1_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_0_2_1_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_0_2_1_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                  </ol>
                </li>
                
                <li id="li_0_0_1_1" style="display: none;">
                  <h2 id="h_0_0_1_1" class="level-2 rectangle" onclick="seleccionarOrganigrama(this.id);">
                    <div class="row">
                      <div class="col" style="padding-top: 9px;">
                        <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel1_1">0</span>
                      </div>
                      <div class="col text-success">
                        <span class="badge bg-secondary text-light badgeRed text-success"> 
                          <small style="font-size: 12px;">+<i class="fa-solid fa-hand-holding-dollar"></i> <span id="gananciaDirecta_1_1">0.00</span></small> <br>
                          <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1">0.00</span></small>
                        </span>
                      </div>
                    </div>
                  </h2>
                  <div id="linea_divisoria_2_1" class="linea_divisoria_2_1 mx-auto" style="display: none;"></div>

                  <ol class="level-3-wrapper_1"  id="lvl3wrapperID_1" style="display:none;">
                      <li id="li_0_0_1_1_2_0" style="display:none;">
                          <h3 id="h_0_0_1_1_2_0" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_1_0">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_0">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_1_2_0" style="display: none;">
                              <li id="li_0_0_1_1_2_0_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_0_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_0_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_0_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_0_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_0_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_0_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_0_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_0_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_0_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_0_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_0_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_0_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_0_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_0_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                      <li id="li_0_0_1_1_2_1" style="display:none;">
                          <h3 id="h_0_0_1_1_2_1" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_1_1">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_1">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_1_2_1" style="display: none;">
                              <li id="li_0_0_1_1_2_1_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_1_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_1_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_1_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_1_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_1_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_1_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_1_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_1_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_1_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_1_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_1_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_1_2_1_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_1_2_1_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_1_2_1_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                  </ol>
                </li>
                <li id="li_0_0_1_2" style="display: none;">
                  <h2 id="h_0_0_1_2" class="level-2 rectangle" onclick="seleccionarOrganigrama(this.id);">
                    <div class="row">
                      <div class="col" style="padding-top: 9px;">
                        <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel1_2">0</span>
                      </div>
                      <div class="col text-success">
                        <span class="badge bg-secondary text-light badgeRed text-success"> 
                          <small style="font-size: 12px;">+<i class="fa-solid fa-hand-holding-dollar"></i> <span id="gananciaDirecta_1_2">0.00</span></small> <br>
                          <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2">0.00</span></small>
                        </span>
                      </div>
                    </div>
                  </h2>
                  <div id="linea_divisoria_2_2" class="linea_divisoria_2_2 mx-auto" style="display: none;"></div>

                  <ol class="level-3-wrapper_2"  id="lvl3wrapperID_2" style="display:none;">
                      <li id="li_0_0_1_2_2_0" style="display:none;">
                          <h3 id="h_0_0_1_2_2_0" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_2_0">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_0">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_2_2_0" style="display: none;">
                              <li id="li_0_0_1_2_2_0_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_0_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_0_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_0_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_0_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_0_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_0_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_0_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_0_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_0_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_0_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_0_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_0_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_0_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_0_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                      <li id="li_0_0_1_2_2_1" style="display:none;">
                          <h3 id="h_0_0_1_2_2_1" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_2_1">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_1">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_2_2_1" style="display: none;">
                              <li id="li_0_0_1_2_2_1_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_1_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_1_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_1_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_1_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_1_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_1_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_1_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_1_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_1_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_1_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_1_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_2_2_1_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_2_2_1_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_2_2_1_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                  </ol>
                </li>
                <li id="li_0_0_1_3" style="display: none;">
                  <h2 id="h_0_0_1_3" class="level-2 rectangle" onclick="seleccionarOrganigrama(this.id);">
                    <div class="row">
                      <div class="col" style="padding-top: 9px;">
                        <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel1_3">0</span>
                      </div>
                      <div class="col text-success">
                        <span class="badge bg-secondary text-light badgeRed text-success"> 
                          <small style="font-size: 12px;">+<i class="fa-solid fa-hand-holding-dollar"></i> <span id="gananciaDirecta_1_3">0.00</span></small> <br>
                          <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3">0.00</span></small>
                        </span>
                      </div>
                    </div>
                  </h2>
                  <div id="linea_divisoria_2_3" class="linea_divisoria_2_3 mx-auto" style="display: none;"></div>

                  <ol class="level-3-wrapper_3"  id="lvl3wrapperID_3" style="display:none;">
                      <li id="li_0_0_1_3_2_0" style="display:none;">
                          <h3 id="h_0_0_1_3_2_0" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_3_0">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_0">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_3_2_0" style="display: none;">
                              <li id="li_0_0_1_3_2_0_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_0_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_0_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_0_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_0_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_0_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_0_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_0_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_0_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_0_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_0_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_0_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_0_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_0_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_0_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                      <li id="li_0_0_1_3_2_1" style="display:none;">
                          <h3 id="h_0_0_1_3_2_1" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_3_1">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_1">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_3_2_1" style="display: none;">
                              <li id="li_0_0_1_3_2_1_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_1_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_1_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_1_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_1_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_1_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_1_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_1_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_1_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_1_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_1_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_1_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_3_2_1_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_3_2_1_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_3_2_1_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                  </ol>
                </li>
                <li id="li_0_0_1_4" style="display: none;">
                  <h2 id="h_0_0_1_4" class="level-2 rectangle" onclick="seleccionarOrganigrama(this.id);">
                    <div class="row">
                      <div class="col" style="padding-top: 9px;">
                        <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel1_4">0</span>
                      </div>
                      <div class="col text-success">
                        <span class="badge bg-secondary text-light badgeRed text-success"> 
                          <small style="font-size: 12px;">+<i class="fa-solid fa-hand-holding-dollar"></i> <span id="gananciaDirecta_1_4">0.00</span></small> <br>
                          <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4">0.00</span></small>
                        </span>
                      </div>
                    </div>
                  </h2>
                  <div id="linea_divisoria_2_4" class="linea_divisoria_2_4 mx-auto" style="display: none;"></div>

                  <ol class="level-3-wrapper_4"  id="lvl3wrapperID_4" style="display:none;">
                      <li id="li_0_0_1_4_2_0" style="display:none;">
                          <h3 id="h_0_0_1_4_2_0" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_4_0">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_0">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_4_2_0" style="display: none;">
                              <li id="li_0_0_1_4_2_0_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_0_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_0_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_0_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_0_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_0_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_0_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_0_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_0_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_0_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_0_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_0_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_0_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_0_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_0_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                      <li id="li_0_0_1_4_2_1" style="display:none;">
                          <h3 id="h_0_0_1_4_2_1" class="level-3 rectangle" onclick="seleccionarOrganigrama(this.id);">
                            <div class="row">
                              <div class="col" style="padding-top: 2px;">
                                <i class="fa-solid fa-user"></i> <span id="spanCantidadUsuarios_nivel2_4_1">0</span>
                              </div>
                              <div class="col text-success">
                                <span class="badge bg-secondary text-light badgeRed text-success">
                                  <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_1">0.00</span></small>
                                </span>
                              </div>
                            </div>
                          </h3>

                          <ol class="level-4-wrapper" id="lvl4wrapperID_0_0_1_4_2_1" style="display: none;">
                              <li id="li_0_0_1_4_2_1_3_0" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_1_3_0" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_1_3_0">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_1_3_1" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_1_3_1" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_1_3_1">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_1_3_2" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_1_3_2" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_1_3_2">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_1_3_3" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_1_3_3" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_1_3_3">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                              <li id="li_0_0_1_4_2_1_3_4" style="display:none;">
                                  <h4 id="h_0_0_1_4_2_1_3_4" class="level-4 rectangle" onclick="seleccionarOrganigrama(this.id);">
                                    <i class="fa-solid fa-user"></i> 
                                    <span class="badge bg-secondary text-light text-success">
                                      <small style="font-size: 12px;">+<i class="fa-solid fa-arrow-up-short-wide mt-1"></i> <span id="gananciaPorLaRed_1_4_2_1_3_4">0.00</span></small>
                                    </span>
                                  </h4>
                              </li>
                          </ol>
                      </li>
                  </ol>  
                </li>


            </ol>
          </div>

        </div>
      </div>
  </div>


</div>


          











<?php include 'footer_web.php'; ?>


<script src="view_5/vistas/js/home.js"></script>