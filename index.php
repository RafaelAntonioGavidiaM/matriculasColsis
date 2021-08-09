<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Colsis</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- SweetAlert-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--animated -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!--Fuente ubuntu google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/login.css'>
  <script src='vista/js/main.js'></script>
  


</head>

<body class="fondo">

  <div class="container-fluid">

    <div class="row">

      <div class="col-sm-4 animate__animated animate__fadeInLeft">
        <div id="box1" class="box">
          <h1>LOGIN</h1>
        </div>

        <div id="box2" class="box">
          <form>

            <input type="text" placeholder="Usuario" id="email" name="fname">

            <input type="password" placeholder="Contraseña" id="pwd" name="lname">

            <button type="button" id="ingresar" class="btn btn-default">Ingresar</button>

          </form>

        </div>

      </div>

      <div id="fondoLogin" class="col-sm-8 grid-block overlay">


        <h3 class="animate__animated animate__zoomIn animate__slow"></h3>
        <center>
          <div class="spinner"></div>
        </center>

      </div>

    </div>

  </div>

</body>

</html>