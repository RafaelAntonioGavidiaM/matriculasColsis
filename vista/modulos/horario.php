<div class="container">

    <center>
        <div class="jumbotron">
            <h1>HORARIO DE CLASES</h1>
            <p>¡Crea y administra el horario de clases de esta institución!</p>
        </div>
    </center>

    <div class="row">
        <div class="col-lg-12 ">

        </div>
    </div>

    <br>
    <div id="blanco">
        <div class="row">
            <div class="col-lg-4">
                <form>

                    <div class="form-group">
                        <label for="txtCurso">CURSO</label>
                        <select type="text" class="form-control" id="cursoSelect">
                            <p id="cargar"></p>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="txtAsignatura">ASIGNATURA</label>
                        <select type="text" class="form-control" id="asignaturaSelect">
                            <p id="cargar"></p>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="txtDia">DÍA</label>
                        <select type="text" class="form-control" id="diaSelect">
                            <p id="cargar"></p>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="txtHoraInicio">HORA INICIO</label>
                        <input type="time" name="hora" class="form-control" id="txtHoraInicio">
                    </div>

                    <div class="form-group">
                        <label for="txtHoraFin">HORA FIN</label>
                        <input type="time" name="hora" class="form-control" id="txtHoraFin">
                    </div>

                    <button type="button" class="btn btn-success" id="btnCrearHorario" class="btn btn-default">Registrar</button>
                    <button type="button" class="btn btn-success" id="btnModificarHorario" class="btn btn-default">Modificar</button>
                    <button type="button" class="btn btn-success" id="btnEliminarHorario" class="btn btn-default">Eliminar</button>
                </form>
                <br>
            </div>



            <div class="col-lg-8">

                <center>

                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="txtCurso">SELECCIONA EL GRADO AL QUE DESEA VER EL HORARIO</label>
                                <select type="text" class="form-control" id="cursoHorarioSelect">
                                    <p id="cargar"></p>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>

                </center>

                <table id="tablaHorario" class="table table-hover table-bordered">
                    <thead class="cabeceraTablaHorario">
                        <tr>
                            <th>HORA</th>
                            <th>LUNES</th>
                            <th>MARTES</th>
                            <th>MIERCOLES</th>
                            <th>JUEVES</th>
                            <th>VIERNES</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyHorario">

                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>