<body>

    <header class="headerHorario">
        <div class="container">
            <div class="texto">
                <div class="caja">
                    <h1 id="h1rf">HORARIO</h1>
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
        <div class="col-sm-4">

            <div class="form-group">
                <label for="">Curso</label>
                <select name="" id="selectCursoForm1234" class="form-control" required="required">
                </select>
            </div>

            <div class="form-group">

                <label for="">Asignaturas</label>

                <select name="" id="selectAsignaturasCarga" class="form-control" required="required">

                </select>


            </div>

            <div class="form-group">

                <label for="">Dias</label>

                <select name="" id="dias" class="form-control" required="required">
                </select>

            </div>

            <div class="form-group">

                <label for="">Hora Inicio</label>
                <input type="time" id="horaInicio" class="form-control">

            </div>

            <div class="form-group">

                <label for="">Hora Fin</label>
                <input type="time" id="horaFin" class="form-control">

            </div>
            <center>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-success" id="btnRegistrarHorario">Registrar Horario</button>
                    </div>
                </div>
            </center>



            <br><br><br><br><br><br>

        </div>




        <div class="col-sm-8" color="white">




            <select name="" id="buscarIdCurso" class="form-control" required="required">


            </select>

            <table id="tablaHorario" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                        <th>Domingo</th>
                    </tr>
                </thead>
                <tbody id="cuerpoTablaHorario">

                </tbody>
            </table>


        </div>
    </div>

    </div>
    </div>




    <!-- Modal -->
    <div id="modalHorario" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Acciones Horario</h4>
                </div>
                <div class="modal-body">

                    <button type="button" id="eidHorario" idEliminar="" class="btn btn-danger">Eliminar</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</body>