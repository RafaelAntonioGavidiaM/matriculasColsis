<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Colsis</title>
  <link rel="icon" type="icon/.png" href="vista/imgs/colsis_logotipo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/cabeceraInicio.css'>
  <!-- DataTables -->
  <!-- Por Defecto -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css'>
  <!-- Botones Exportacion-->
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.jqueryui.min.js"></script>


  <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.dataTables.min.css'>
  <!-- ----------------------------------------------------------------------------------------------- -->
  <!--animated -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!--Fuente ubuntu google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <!-- Librerias para tablas dianamicas o datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <!-- CDN Botones de exportacion datatabale -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.dataTables.min.css">
  <!-- diseño modulo -->
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/estudiante.css'>
<<<<<<< HEAD
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/reporte.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/principal.css'>
=======
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/personal.css'>
<<<<<<< HEAD
>>>>>>> 098f483fed15ac45a99bcf04f125366963d56898
=======
  <link rel='stylesheet' type='text/css' media='screen' href='vista/css/asignaturas.css'>
>>>>>>> origin
  <script src="vista/js/rol.js"></script>
  <script src="vista/js/personal.js"></script>
  <script src="vista/js/estudiante.js"></script>
  <script src="vista/js/cursos.js"></script>
  <script src="vista/js/asignatura.js"></script>
  <script src="vista/js/nota.js"></script>
  <script src="vista/js/asignaturaCurso.js"></script>




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
      <div class="collapse navbar-collapse" i d="myNavbar">
        <ul class="nav navbar-nav navbar-right">


          <?php

          $permisos = $_SESSION["permisos"];

          foreach ($permisos as $key => $value) {

            if ($value["idPermiso"] == 1) {

              if ($value["nombreFormulario"] == "facturaWeb") {
              } else {
                $rest = substr($value["nombreFormulario"], 3);  // devuelve "abcde"
                $mayus = strtoupper($rest); //mayusculas
                $minus = strtolower($rest); // minusculas

                echo "<li><a href=" . $minus . ">" . $mayus . "</a></li>";
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

  </div>
  </nav>
  <br>