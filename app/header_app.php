<?php 

  include __DIR__.'/../url_tipo.php'; 
  include __DIR__.'/../ajax/colores.php';

  /*include "../php/versionsonaes.php";
  $version = new Version();

  $rspta = $version->versionSonaes();
  $reg = $rspta->fetch_object();
  $versionsonaes = $reg->version_sonaes;*/
  

  $col_12_o_10=false;
  $ocultar_en_esta_vista="";
  /*ocultar vistas*/
  if ($views[1]=="controlpanel" or $views[1]=="graciasporsuscribirte_es" ) {
    $col_12_o_10=true;
    $ocultar_en_esta_vista="display: none !important;";
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../vistas/css/bttn.min.css">
    <link href="css/header.css" rel="stylesheet">


    <title>TESO</title>

    <script>
      var token = localStorage.getItem("token");
      var vistaName = "<?php echo $views[1]; ?>";
      var dataUsuario;
    </script>
  </head>


  


  <header class="navbar sticky-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="micuenta">brayhanladines@gmail.com<br><small>Cuenta</small></a>
    

    <div class="w-100 text-center">
      <button class="bttn-stretch bttn-lg bttn-primary" onclick="redirigir('resumen');">TESO</button>
    </div>

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-right pointer" style="height: 72px;" onclick="cerrarSesion();"><span style="position: absolute;top: 1.2rem;right: 1rem;"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</span></a>
  </header>

  <body>

    <div id="divLoader" style="position: absolute;top:0px;left:0px;z-index: 1500;width: 100%;height: 100%;background: white;text-align: center;">
      <i class="fas fa-spinner fa-spin fa-3x color1" style="margin-top: 46vh;"></i>
    </div>

    <div class="container-fluid">
      <div class="row">

        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="<?php echo $ocultar_en_esta_vista; ?>">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <?php
                if ($views[1]=="resumen") {
                  echo '<a class="nav-link float-left textAzul" href="resumen">Resumen</a> <i class="fa-solid fa-angle-down float-right textAzul angle-position"></i>';
                }else {
                  echo '<a class="nav-link float-left" href="resumen">Resumen</a> <i class="fa-solid fa-angle-right float-right angle-position"></i>';
                }
                ?>
              </li>
              <li class="nav-item">
                <?php 
                if ($views[1]=="ajustes") {
                  echo '<a class="nav-link float-left textAzul" href="ajustes">Ajustes</a> <i class="fa-solid fa-angle-down float-right textAzul angle-position"></i>';
                }else {
                  echo '<a class="nav-link float-left" href="ajustes">Ajustes</a> <i class="fa-solid fa-angle-right float-right angle-position"></i>';
                }
                ?>
              </li>
            </ul>

          </div>
        </nav>

        <?php 
        if ($col_12_o_10) {
          echo '<main class="col-md-9 col-lg-12 ms-sm-auto  px-md-4">';
        }else{
          echo '<main class="col-md-9 col-lg-10 ms-sm-auto  px-md-4">';
        }
        ?>
        
          <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">