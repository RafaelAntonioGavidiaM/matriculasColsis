<body>



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
                <path d="M-4.22,101.14 C240.12,148.52 305.58,54.77 503.10,122.86 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="margenes">


        <div class="container-fluid margenes">
            <div class="row">
                <div class="col-lg-6">
                    <button id="btnMostrarRegArea" type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#ventanaRegPersonal">Registro una nueva Area✏️</button>
                    <br>
                    <br>
                </div>
                <div class="col-lg-6">
                    <button id="btnMostrarRegAsignatura" type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#ventanaRegPersonal">Registrar una nueva asignatura✏️</button>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">

                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="txtRegArea">Area:</label>
                            <input type="text" class="form-control" id="txtRegArea">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox">Mostrar Registros de Areas</label>
                        </div>
                        <center><button id="btnNewArea" type="button" class="btn btn-warning">Guardar Area</button></center>
                        <br>
                        <br>
                    </form>

                </div>
                <div class="col-lg-6">
                    <form action="/action_page.php">
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
                        <div class="checkbox">
                            <label><input type="checkbox">Mostrar Registros de Asignaturas</label>
                        </div>
                        <center><button id="btnNewAsignatura" type="button" class="btn btn-warning">Agregar Asignatura</button></center>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
            <div class="row">
                <!-- tabala de areas -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
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

                <div class="col-lg-6">
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
                    <br>
                    <button id="btnRegPersonal" type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#ventanaRegPersonal">Asignar una asigantura a un curso</button>


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
                    <h4 class="modal-title">Modificar Area</h4>
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
                            <label for=selectModArea">Area</label><br>
                            <select id="selectModArea">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center><button id="btnModArea" type="button" class="btn btn-success" data-dismiss="modal">Modificar Area</button></center>
                </div>
            </div>

        </div>
    </div>

</body>