<header class="headerAsistencia">
    <div class="container">
        <div class="texto">
            <div class="caja">
                <h1 id="h1rf">Asistencia</h1>
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
<br>
<br>


<div class="">


    <div>

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4 col-lg-4  animate__animated animate__fadeInLeft">



                    <div class="panel panel-default borde_panel ">
                        <div class="panel-heading cabecera_panel borde_panel_Cabecera">
                            <h2 class="text-center">Crear Regsitro de Asistecia</h2>
                        </div>
                        <div class="panel-body">

                            <label for="selectCurso"> Curso: </label>


                            <button id="btnCargarAsignaturas" type="button" class="btn btn-default mover_btnCargarAsignatura color_btnCargar">Cargar</button>

                            <select id="selectCurso" class="form-control tamaño_selecurso">
                                <option value=""></option>
                            </select>

                            <label for="selectAsignaturaAsistencia"> Asignatura: </label>
                            <select name="" id="selectAsignaturaAsistencia" class="form-control" required="required">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="panel-footer borde_panel_pie cabecera_panel">

                            <button id="btnCrearAsistencia" type="button" class="btn btn-info btn-block">Crear Asistencia📋</button>

                        </div>
                    </div>

                    <br><br>

                    <!-- <div class="panel panel-default borde_panel">

                        <div class="panel-heading cabecera_panel borde_panel_Cabecera">
                            <h2 class="text-center"> Buscar Registro de asistencia </h2>
                        </div>
                        <div class="panel-body">



                            <label for="selectCurso"> Curso: </label>

                            <button id="btnBuscarCargarAsignaturas" type="button" class="btn btn-default mover_btnCargarAsignatura color_btnCargar">Cargar</button>

                            <select id="cursoSelect" class="form-control tamaño_selecurso">
                                <option value=""></option>
                            </select>

                            <label for="selectAsignaturaAsistencia"> Asignatura: </label>

                            <button id="btnCargarFechasAsignaturas" type="button" class="btn btn-default mover_btnCargarAsignatura color_btnCargar">Cargar</button>

                            <select name="" id="selectBuscarAsignatura" class="form-control tamaño_selecurso" required="required">
                                <option value=""></option>
                            </select>

                            <label for="selectFecha"> Fecha: </label>

                            <select name="" id="selectFecha" class="form-control">
                                
                            </select>

                        </div>
                        <div class="panel-footer borde_panel_pie cabecera_panel">

                            <button id="btnBuscarAsistencia" type="button" class="btn btn-info btn-block">Buscar Asistencia📋</button>

                        </div>
                    </div> -->

                </div>

                <div class="col-md-6 col-lg-6  animate__animated animate__backInRight">


                    <div class="panel panel-default borde_panel tamaño_panel_asistencias">

                        <div id="cabeceraAsistencia" class="panel-heading cabecera_panel borde_panel_Cabecera text_center">

                            <center><label for="cabeceraAsistencia" class="tamaño_letra_encabezado_tabla">📚Asistencia📋</label></center>

                        </div>

                        <div class="panel-body">

                            <table id="tablaAsistencia" class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Curso</th>
                                        <th>Asignatura</th>
                                        <th>Fecha</th>
                                        <th>Asistencia</th>

                                    </tr>
                                </thead>
                                <tbody id="bodyAsistencias">
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>


        </div>





    </div>






















</div>