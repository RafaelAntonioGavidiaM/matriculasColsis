<head>
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
    <link rel='stylesheet' type='text/css' media='screen' href='vista/css/estudiante.css'>
    <script src='vista/js/estudiante.js'></script>

</head>

<body>
    <header>
        <div class="container">
            <div class="texto">
                <div class="caja">
                    <h1 id="h1rf">Estudiantes</h1>
                </div>
            </div>
        </div>
        <div class="wave" style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-4.22,101.14 C240.12,148.52 305.58,54.77 503.10,122.86 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div id="contenedorReg" class="container">
        <div class="well well-lg">Registrar Estudiantes</div>
        <div class="row">
            <div id="scrollGLobal" class="col-sm-9">
                <div>
                    <form>

                        <div class="col-sm-6">
                            <input type="text" placeholder="Nombre" id="txtNombre" name="fname">

                            <input type="text" placeholder="Apellido" id="txtApellido" name="lname">

                            <input type="text" placeholder="Documento" id="txtDocumento" name="lname">

                            <select id="selectTD" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected place>Tipo de documento</option>
                                <option value="1">CC</option>
                                <option value="2">TI</option>
                                <option value="3">TIE</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <P>Fecha de nacimiento:</P>

                            <input id="dateNacimiento" type="date">

                            <select id="selectTS" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected place>Tipo de sangre</option>
                                <option value="1">O+</option>
                                <option value="2">O-</option>
                                <option value="3">A+</option>
                                <option value="4">A-</option>
                                <option value="5">B+</option>
                                <option value="6">B-</option>
                                <option value="8">AB+</option>
                                <option value="9">AB-</option>
                            </select>

                            <input type="text" placeholder="Seguro estudiantil" id="txtSeguroE" name="lname">

                            <input type="text" placeholder="Telefono" id="txtTelefono" name="lname">

                        </div>
                        <div class="col-sm-12">
                            <button type="button" id="btnRegEstudiante" class="btn btn-default">Registrar</button>
                            <button type="button" id="btnModEstudiante" class="btn btn-default">Modificar</button>
                        </div>
                    </form>
                </div>
                <br>
                <div>
                    <table id="tablaEstudiantes" class="table table-bordered">
                        <thead class="cabeceraTabla">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Tipo Documento</th>
                                <th>Fecha Nacimiento</th>
                                <th>Tipo Sangre</th>
                                <th>Seguro Estudiantil</th>
                                <th>Telefono</th>
                            </tr>
                        </thead>
                        <tbody id="bodyEstudiantes">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="imgForm col-sm-3">

            </div>
        </div>
    </div>

</body>