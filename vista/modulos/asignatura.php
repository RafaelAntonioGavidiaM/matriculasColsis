<body >


   
        
    <div>
        <header class="headerAsignatura">
            <div class="container">
                <div class="texto">
                    <div class="caja">
                        <h1 id="h1rf">Asignaturas</h1>
                    </div>
                </div>
            </div>
            <div class="wave" style="height: 150px; overflow: hidden;">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M-4.22,101.14 C240.12,148.52 305.58,54.77 503.10,122.86 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #e8e8e8;"></path>
                </svg>
            </div>
        </header>
        <br>


        <div class="margenes">


            <div class="container-fluid margenes">

                <!-- Botonoes de mostrar formularios de registros -->

                <div class="row">
                    <div class="col-lg-6 animate__animated animate__fadeInLeft">
                        <button id="btnMostrarRegArea" type="button" class="btn_color_letra_success btn-block diseño_boton_success btn-lg">Registro una nueva Area✏️</button>
                        <br>
                    </div>
                    <div class="col-lg-6 animate__animated animate__fadeInRight">
                        <button id="btnMostrarRegAsignatura" type="button" class="btn_color_letra_success diseño_boton_success btn-lg btn-block">Registrar una nueva asignatura✏️</button>
                        <br>
                    </div>
                </div>

                <!-- Formulario de registro de Asignatura -->

                <div class="row">


                    <div class="col-lg-6">

                        <form id="ventadeRegistroAera" action="">
                            <div>
                                <button id="btnCerrarRegistroArea" type="button" class="btn diseño_boton_cerrar posicion_Boton "><span class="glyphicon glyphicon-remove color_icono" aria-hidden="true"></span></button>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="txtRegArea">Area:</label>
                                <input type="text" class="form-control" id="txtRegArea">
                            </div>

                            <center><button id="btnNewArea" type="button" class="btn btn-warning">Guardar Area</button></center>
                            <br>
                            <br>
                        </form>

                    </div>

                    <div class="col-lg-6">
                        <form id="ventadeRegistroAsignatura" action="">
                            <div>
                                <button id="btnCerrarRegistroAsignatura" type="button" class="btn diseño_boton_cerrar posicion_Boton"><span class="glyphicon glyphicon-remove color_icono" aria-hidden="true"></span></button>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="txtRegAsignatura">Asignatura:</label>
                                <input type="text" class="form-control" id="txtRegAsignatura">
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for=selectRegArea">Area</label><br>
                                    <select id="selectAreaAsignatura">

                                    </select>
                                </div>
                            </div>

                            <center><button id="btnNewAsignatura" type="button" class="btn btn-warning">Agregar Asignatura</button></center>
                            <br>

                        </form>
                    </div>
                </div>

                <br>
                <div class="row">

                    <div class="col-lg-12">
                        <button id="btnTablasDeContenido" type="button" class="btn_color_letra_tablas diseño_boton_tablas btn-lg btn-block animate__animated animate__fadeInUp"> 📝Registros💾</button>
                    </div>

                </div>
                <br>
                <br>

                <!-- Tabla de listado de Area -->

                <div id="tablasDeContenido" class="row">


                    <div id="contenidoDeArea" class="col-lg-6">
                        <div class="panel panel-default">
                            <!-- Cabecera de Area -->
                            <div class="panel-heading">
                                <center>
                                    <h1>📚Areas de formacion📚</h1>
                                </center>
                            </div>
                            <div class="panel-body">

                                <table id="tablaArea" class="table">
                                    <thead>
                                        <tr>
                                            <th>Area</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <!-- -------------cuerpo de la tabla de Asignatura---------- -->
                                    <tbody id="bodyAreasAsignatura">
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                    <div id="contenidoDeAsignatura" class="col-lg-6">
                        <!-- tabla de asignaturas -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                    <h1>📐Asignaturas📃</h1>
                                </center>
                            </div>
                            <div class="panel-body">

                                <table id="tablaAsignatura" class="table">
                                    <thead>
                                        <tr>
                                            <th>Asignatura</th>
                                            <th>Area</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <!-- -------------cuerpo de la tabla de Asignatura---------- -->
                                    <tbody id="bodyAsignatura">
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <br>
                        <a href="asignaturacurso" class="btn btn_color_letra_info diseño_boton_info btn-lg btn-block animate__animated animate__fadeInUp">Asignar a un curso</a>

                    </div>

                </div>
            </div>
        </div>

        <!----------------------------------------------------------------------------------------------->
        <!-----------------------------Modales de modificar de Area y Asignatura------------------------->
        <!----------------------------------------------------------------------------------------------->


        <!-- Modal Area-->
        <div id="modalModArea" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal contenido de Area-->
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Modificar Area</h4>
                    </div>
                    <!-- cuerpo modal de Area -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtModArea">Area:</label>
                            <input type="text" class="form-control" id="txtModArea">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center><button id="btnModArea" type="button" class="btn btn-success" data-dismiss="modal">Modificar Area</button></center>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal Asignatura-->
        <div id="modalModAsignatura" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal contenido de Area-->
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modificar Asignatura</h4>
                    </div>
                    <!-- cuerpo modal de Area -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtModAsignatura">Asignatura:</label>
                            <input type="text" class="form-control" id="txtModAsignatura">
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="selectModArea">Area</label><br>
                                <select id="selectModArea">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center><button id="btnModAsignatura" type="button" class="btn btn-success" data-dismiss="modal">Modificar Area</button></center>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>