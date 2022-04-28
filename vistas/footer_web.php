<div class="container" style="">
  <div class="card mt-2">
    
    <div class="row">
      <div class="col-6 text-center mx-auto">

        <form id="form-checkout" >
          <div class="row">
            <div class="col-6">
              <input class="form-control mt-1" type="text" name="cardNumber" id="form-checkout__cardNumber" required />
              <input class="form-control mt-1" type="text" name="cardExpirationDate" id="form-checkout__cardExpirationDate" required/>
              <input class="form-control mt-1" type="text" name="cardholderName" id="form-checkout__cardholderName" required/>
              <select class="form-control mt-1" name="identificationType" id="form-checkout__identificationType" required></select>
            </div>
            <div class="col-6">
              <select class="form-control mt-1" name="issuer" id="form-checkout__issuer" required></select>
              <input class="form-control mt-1" type="text" name="securityCode" id="form-checkout__securityCode" required/>
              <input class="form-control mt-1" type="email" name="cardholderEmail" id="form-checkout__cardholderEmail" required/>
              <input class="form-control mt-1" type="text" name="identificationNumber" id="form-checkout__identificationNumber" required/>
            </div>
          </div>
           
           

           <select name="installments" id="form-checkout__installments" style="display: none;"></select>

           <div class="d-grid gap-2 mt-2">
              <button class="btn btn-primary" type="submit" id="form-checkout__submit">Suscribirme</button>
              <progress value="0" class="progress-bar w-100">Cargando...</progress>
            </div>             
        </form>

      </div>
    </div>

  </div>
</div>

<div class="footer-basic">
    <footer>
        <div class="social">
        	<i class="fa-brands fa-facebook-f"></i>
        	<i class="fa-brands fa-instagram"></i>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Red de Mercadeo Teso © <span id="spanAnoFooter">...</span></p>
    </footer>
</div>



<div class="modal fade" id="modalUnirmeRed" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>REGÍSTRATE</h4>
      </div>
      <div class="modal-body">

        
        <div id="bloque_registro_unirme" style="" class="mx-auto">
          <form name="formRegistrateEmail_unirme" id="formRegistrateEmail_unirme" method="POST">
            <div class="card" style="">
              <div id="cardOpcionDeCompra_div_basic" class="card-body cardOpcionDeCompraClass cardOpcionDeCompraClass_seleccionado" onclick="seleccionar_cardOpcionDeCompra('basic');">

                <div class="row">
                  <div class="col-4">
                    <div class="text-center">
                      <h5 class="negrita mb-0 color1">BASIC</h5>
                      <h1 class="mt-2">Gratis</h1>
                      <small class=""><span class="costoSuscripcionSpan"></span> PEN x mes</small>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="col-12 mt-4">
                      <input id="red_yaexistente_unirme" name="red_yaexistente_unirme" class="form-control" type="text" placeholder="UNIRME A ESTA RED (OPCIONAL)" onkeyup="nombre_red_mayus_yaexistente();">
                      <small class="fst-italic">* Si no coloca ninguna red válida será agregado(a) a una red de marena aleatoria.</small>
                    </div>
                  </div>
                </div>
                    
              </div>

              <hr>

              <div id="cardOpcionDeCompra_div_vip" class="card-body cardOpcionDeCompraClass" onclick="seleccionar_cardOpcionDeCompra('vip');">

                <div class="row">
                  <div class="col-4">
                    <div class="text-center">
                      <h5 class="negrita mb-0 color1">VIP</h5>
                      <small>OBTÉN NIVEL 1</small>
                      <h1 class="mt-2">$100</h1>
                      <small class=""><span class="costoSuscripcionSpan"></span> PEN x mes</small>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="col-12" style="margin-top: 2.2rem;">
                      <input class="form-control" type="text" placeholder="NOMBRE DE LA RED" value="TESO" readonly disabled>
                    </div>
                  </div>
                </div>
                    
              </div>
            </div>

            <div class="card mt-3" style="">
              <div class="card-body">

                <span class="fs-4 fw-bold">MIS DATOS (obligatorio)</span>                
                
                <div class="col-12 mt-3">
                  <input id="email_unirme" name="email_unirme" class="form-control" type="text" placeholder="Dirección de email" required>
                </div>
                <div class="col-12">
                  <input id="contra_unirme" name="contra_unirme" class="form-control mt-2" type="password" placeholder="Contraseña" required>
                </div>
                <div class="col-12">
                  <input id="nombre_red_unirme" name="nombre_red_unirme" class="form-control mt-2" type="text" placeholder="NOMBRE DE MI RED" onkeyup="nombre_red_mayus_unirme();" required>
                </div>             

              </div>
            </div>
                
            <div class="col-12 mt-3">
              <div class="d-grid gap-2">
                <button id="btnGuardarRegistrateEmail_unirme" class="btn btn-primary" type="submit">Crear cuenta</button>
                <button id="btnGifRegistrateEmail_unirme" class="btn btn-secondary" type="submit" style="height: 35px;display: none;"><i class="fa-solid fa-fan fa-lg fa-spin"></i></button>
              </div>
            </div>

          </form>
        </div>
        

      </div>
    </div>
  </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="vistas/js/header.js"></script>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
   const mp = new MercadoPago('APP_USR-f797e6c8-bc63-4368-89eb-7bf2c2037bc4');
   // Add step #3

   // Step #3
    const cardForm = mp.cardForm({
      amount:"5",
      autoMount: true,
      form: {
        id: "form-checkout",
        cardholderName: {
          id: "form-checkout__cardholderName",
          placeholder: "Titular de la tarjeta",
        },
        cardholderEmail: {
          id: "form-checkout__cardholderEmail",
          placeholder: "E-mail",
        },
        cardNumber: {
          id: "form-checkout__cardNumber",
          placeholder: "Número de la tarjeta",
        },
        cardExpirationDate: {
          id: "form-checkout__cardExpirationDate",
          placeholder: "Fecha de vencimiento (MM/YYYY)",
        },
        securityCode: {
          id: "form-checkout__securityCode",
          placeholder: "Código de seguridad",
        },
        installments: {
          id: "form-checkout__installments",
          placeholder: "Cuotas",
        },
        identificationType: {
          id: "form-checkout__identificationType",
          placeholder: "Tipo de documento",
        },
        identificationNumber: {
          id: "form-checkout__identificationNumber",
          placeholder: "Número de documento",
        },
        issuer: {
          id: "form-checkout__issuer",
          placeholder: "Banco emisor",
        },
      },
      callbacks: {
        onFormMounted: error => {
          if (error) return console.warn("Form Mounted handling error: ", error);
          console.log("Form mounted");
        },
        onFormUnmounted: error => {
            if (error) return console.warn('Form Unmounted handling error: ', error)
            console.log('Form unmounted')
        },
        onIdentificationTypesReceived: (error, identificationTypes) => {
            if (error) return console.warn('identificationTypes handling error: ', error)
            console.log('Identification types available: ', identificationTypes)
        },
        onPaymentMethodsReceived: (error, paymentMethods) => {
            if (error) return console.warn('paymentMethods handling error: ', error)
            console.log('Payment Methods available: ', paymentMethods)
        },
        onIssuersReceived: (error, issuers) => {
            if (error) return console.warn('issuers handling error: ', error)
            console.log('Issuers available: ', issuers)
        },
        onInstallmentsReceived: (error, installments) => {
            if (error) return console.warn('installments handling error: ', error)
            console.log('Installments available: ', installments)
        },
        onCardTokenReceived: (error, token) => {
          console.log(token);
            if (error) return console.warn('Token handling error: ', error)
            console.log('Token available: ', token)
        },
        onSubmit: event => {
          event.preventDefault();

          // console.log("desde js");
          // console.log(cardForm.getCardFormData());

          const {
            paymentMethodId: payment_method_id,
            issuerId: issuer_id,
            cardholderEmail: email,
            token,
            identificationNumber,
            identificationType,
          } = cardForm.getCardFormData();


          // console.log(payment_method_id);

          var dataPago = {dataPago:JSON.stringify({
                            token:token,
                            issuer_id:issuer_id,
                            payment_method_id:payment_method_id,
                            payer: {
                              name:$("#form-checkout__cardholderName").val(),
                              email:email,
                              identification: {
                                type: identificationType,
                                number: identificationNumber,
                              },
                            },
                          })};

          $.post(url_nivel_1+'ajax/header.php?op=process_payment',dataPago, function(r) {
            console.log(r);
          });
        },
        onFetching: (resource) => {
          console.log("Fetching resource: ", resource);

          // Animate progress bar
          const progressBar = document.querySelector(".progress-bar");
          progressBar.removeAttribute("value");

          return () => {
            progressBar.setAttribute("value", "0");
          };
        }
      },
    });
</script>


</body>



  
</html>