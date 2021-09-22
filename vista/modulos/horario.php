<header>
    <div class="container">
        <div class="texto">
            <div class="caja">
                <h1 id="h1rf">HORARIO DE CLASES</h1>
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

<div class="container">

    <div class="row">
        <div class="col-lg-12 "></div>
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
                        <select name="select">
                            <option value="Domingo">Domingo</option>
                            <option value="Lunes" selected>Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
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
                            <th>SABADO</th>
                            <th>DOMINGO</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyHorario">

                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>