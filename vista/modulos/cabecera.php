<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/cabeceraInicio.css'>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src='vista/js/main.js'></script>
  <script src='vista/js/personal.js'></script>
  <script src='vista/js/rol.js'></script>
  <script src='vista/js/estudiante.js'></script>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" i   d="myNavbar">
      <ul class="nav navbar-nav navbar-right">


      <?php

      $permisos= $_SESSION["permisos"];

      foreach ($permisos as $key => $value) {

        if($value["idPermiso"]==1){

          if($value["nombreFormulario"]=="facturaWeb" ){

          }
          else{
            $rest = substr($value["nombreFormulario"], 3);  // devuelve "abcde"
            $mayus=strtoupper($rest); //mayusculas
            $minus=strtolower($rest); // minusculas
  
          echo "<li><a href=".$minus.">".$mayus."</a></li>";
  
          }


        }

        
        
      }
       

      



      ?>

      </ul>
    </div>
  </div>
</nav>
<br>

      </div>
      <div class="collapse navbar-collapse" i d="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="rol">ROL</a></li>
          <li><a href="estudiante">ESTUDIANTE</a></li>
          <li><a href="#portfolio">PORTFOLIO</a></li>
          <li><a href="#pricing">PRICING</a></li>
          <li><a href="#contact">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br>