<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <div class="container">
    <br><br>
      <h4>
      <?php

      
      $documento=$_SESSION["documento"];
       $nombre = $_SESSION["nombre"];
       $apellidos=$_SESSION["apellido"];
       $foto=$_SESSION["foto"];
       $ruta="file:///C://Trabajo%20Final/RpE2Colsis/appE2Colsis/bin/Debug/fotosPersonal/";

       echo $documento;
       echo "<br>";
       echo "<br>";
       echo "<img src='$ruta$foto' ";
       

       echo $nombre." ".$apellidos;      
      
      ?>
      </h4>
      </div>

      <br>
      <br>
      <br><br><br><br><br>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li><a href="#section2">Friends</a></li>
        <li><a href="#section3">Family</a></li>
        <li><a href="#section3">Photos</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>