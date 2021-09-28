<body>

    <header class="headerEstudiante">
        <div class="container">
            <div class="texto">
                <div class="caja">
                    <h1 id="h1rf">Estudiantes</h1>
                </div>
            </div>
        </div>
        <div class="wave" style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-4.22,101.14 C240.12,148.52 305.58,54.77 503.10,122.86 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(235, 235, 235);"></path>
            </svg>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container wells">
        <div class="well well-lg">
            <center>Registrar Estudiantes</center>
        </div>

        <div class="row">
            <div id="scrollGLobal">
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

                            <div class="autocompletar">
                                <input type="text" name="auto-acudiente" id="selectAcudiente" idAcudiente="" placeholder="Buscar Acudiente">
                            </div>

                            <select id="selectCurso" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected place>Seleccionar Curso</option>
                            </select>

                        </div>
                        <div>
                            <div class="col-sm-12">

                                <input type="file" id="txtFoto" name="files[]" />

                            </div>

                            <div class="col-sm-6">
                                <center>
                                    <output id="list2"></output>
                                </center>
                            </div>
                        </div>

                        <div class="col-sm-12" id="moduloImagen">

                            <div class="col-sm-6">
                                <div class="well text-center">Foto Actual</div>
                                <center>
                                    <img id="imagenActual" src="" alt="" srcset="">
                                </center>
                            </div>

                            <div class="col-sm-6">
                                <div class="well text-center">Foto Nueva</div>
                                <center>
                                    <output id="list"></output>
                                </center>
                            </div>

                        </div>

                        <div class="col-sm-12">
                            <button type="button" id="btnRegEstudiante" class="btn btn-default">Registrar</button>
                            <button type="button" id="btnModEstudiante" class="btn btn-default">Modificar</button>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <select id="selectCursoFiltro" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option selected place>Seleccionar Curso</option>
                                </select>

                            </div>
                            <div class="col-sm-3">
                                <button type="button" id="btnFiltrarCurso" class="btn btn-default">Filtrar Cursos</button>

                            </div>
                            <div class="col-sm-3">
                                <button type="button" id="btnListaCompleta" class="btn btn-default">Lista Completa</button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">

                    <div id="moduloTab">

                        <table id="tablaEstudiantes" style="width:100%" class="table row-border stripe display nowrap hover display compact order-column">
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
                                    <th>Foto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyEstudiantes">

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>