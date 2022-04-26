<?php include 'header_web.php'; ?>
<link rel="stylesheet" href="view_5/vistas/css/login.css">


    <nav class="navbar navbar-light bg-light">
  	  <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="home">TESO</a>
      </div>
  	</nav>


    <div class="container divLogin">
      
      <div style="width: 400px;" class="mx-auto">
        <div class="card" style="">
          <div class="card-body">

            <h4>Login</h4>
            
            <form name="formLogin" id="formLogin" method="POST">
              <div class="col-12 mt-3">
                <input id="email" name="email" class="form-control" type="text" placeholder="Dirección de email" required>
              </div>

              <div class="col-12">
                <input id="contra" name="contra" class="form-control mt-2" type="password" placeholder="Contraseña" required>
              </div>

              <div class="col-12 mt-3">
                <div class="d-grid gap-2">
                  <button id="btnGuardarLogin" class="btn btn-primary" type="submit">Iniciar sesión</button>
                  <button id="btnGifLogin" class="btn btn-secondary"  style="height: 35px;display: none;"><i class="fa-solid fa-fan fa-lg fa-spin"></i> </button>
                </div>
              </div> 
            </form>

          </div>
        </div>
      </div>
        
    
    </div>


<?php include 'footer_web.php'; ?>


<script src="view_5/vistas/js/login.js"></script>
