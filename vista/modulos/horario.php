

    <div class="jumbotron">
        <div class="container">
            <h1>Horario!</h1>
            <p>Gestiona horarios , recursos</p>
            <p>

            </p>
        </div>
    </div>


    <br><br><br>




    <div class="row">
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



                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button class="btn btn-primary" id="btnRegistrarHorario">Registrar Horario</button>
                    </div>
                </div>
            

        </div>




        <div class="col-sm-8" color="white" >



        
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
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>

</div>