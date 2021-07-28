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

    <div id="contenedorReg" class="containers">
        <div class="well well-lg">Registrar Estudiantes</div>
        <div class="col-sm-9">
            <ul class="pager">
                <li><a href="#moduloReg">Llenar</a></li>
                <li><a href="#moduloTab">Tabla</a></li>
            </ul>
        </div>
        <div class="row">
            <div id="scrollGLobal" class="col-sm-9">
                <div id="moduloReg">
                    <form>

                        <div class="col-sm-6">
                            <input type="text" placeholder="Nombre" id="txtNombre" name="fname">

                            <input type="text" placeholder="Apellido" id="txtApellido" name="lname">

                            <input type="text" placeholder="Documento" id="txtDocumento" name="lname">

                            <select id="selectTD" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected place>Tipo de documento</option>
                                <option value="C.C">C.C</option>
                                <option value="T.I">T.I</option>
                                <option value="T.I.E">T.I.E</option>
                            </select>

                            <input id="dateNacimiento" type="date">
                            <P>Fecha de nacimiento</P>

                        </div>
                        <div class="col-sm-6">

                            <select id="selectTS" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected place>Tipo de sangre</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>

                            <input type="text" placeholder="Seguro estudiantil" id="txtSeguroE" name="lname">

                            <input type="text" placeholder="Telefono" id="txtTelefono" name="lname">

                            <select id="selectAcudiente">
                                <option selected place>Seleccionar Acudiente</option>
                            </select>

                            <select id="selectCurso">
                                <option selected place>Seleccionar Curso</option>
                            </select>

                        </div>
                        <div class="col-sm-12">
                            <button type="button" id="btnRegEstudiante" class="btn btn-default">Registrar</button>
                            <button type="button" id="btnModEstudiante" class="btn btn-default">Modificar</button>
                        </div>
                    </form>
                </div>
                <br>
                <div id="moduloTab">
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
                                <th>Acudiente</th>
                                <th>Curso</th>
                                <th>Acciones</th>
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