<?php 

  include __DIR__.'/../url_tipo.php'; 
  include __DIR__.'/../ajax/colores.php';

  /*include "../php/versionsonaes.php";
  $version = new Version();

  $rspta = $version->versionSonaes();
  $reg = $rspta->fetch_object();
  $versionsonaes = $reg->version_sonaes;*/
  


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


    <link rel="stylesheet" href="vistas/css/bttn.min.css">
    <link rel="stylesheet" href="vistas/css/header.css">

    <title>Marketparatodos</title>
    <link rel="shortcut icon" href="public/img/logo.png">
    <link rel="icon" href="public/img/logo.png">
  </head>

  <style>

    
  </style>

  <body>

    <nav class="navbar fixed-top">
      <div class="container-fluid">

          <div class="col-12">
            <div class="navbar-brand mb-0 h1 text-center">
              <div class="float-start " style="height:50px;">
                <div class="input-group input-group-lg">
                  <button class="bttn-stretch bttn-lg bttn-primary" onclick="redirigir('home');"> <img src="public/img/logo_pequeno.png" alt="Marketparatodos" height="30px"> Marketparatodos</button>
                </div>
              </div>              

              <button class="bttn-unite tamanoBotonesHeader bttn-primary" data-bs-toggle="modal" data-bs-target="#modalUnirmeRed">QUIERO UNIRME A LA RED</button>

              <button class="bttn-unite tamanoBotonesHeader bttn-primary" onclick="redirigir('login');">INICIAR SESIÓN</button>

              <div class="float-end " style="height:50px;width: 212px;">
                <div class="input-group input-group-lg " style="justify-content: flex-end;">
                  <select name="selectPlanID" id="selectPlanID" class="form-select selectHeader" onchange="cambiarPlan(this.value);">
                    <option value="5 PEN">5 PEN</option>
                    <option value="10 PEN" >10 PEN(pronto)</option>
                    <option value="20 PEN" disabled>20 PEN(pronto)</option>
                  </select>
                </div>
              </div>
            </div>              
          </div>
          
      </div>
    </nav>