<div class="container">
  <center>
    <div class="jumbotron">
      <h1>Creacion de Asignatura Curso</h1>
      <p>Crea y administra los dococentes encargados de cada materia por curso.</p>
    </div>
  </center>

  <button id="btnAsignaturaCurso" class="btn btn-success" data-toggle="modal" data-target="#mdAsignaturaCurso"> Crear Asignatura</button>

  <!-- Modal -->
  <br><br><br><br><br>
  <div class="modal fade" id="mdAsignaturaCurso" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <br>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¡Registrar Asignatura Curso!</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="txtAsignatura">Asignatura</label>
              <select type="text" class="form-control" id="asignaturaSelect">
                <p id="cargar"></p>
              </select>
            </div>

            <div class="form-group">
              <label for="txtCurso">CURSO</label>
              <select type="text" class="form-control" id="cursoSelect">
                <p id="cargar"></p>
              </select>
            </div>

            <div class="form-group">
              <label for="txtDocente">DOCENTE</label>
              <select type="text" class="form-control" id="personalSelect">
                <p id="cargar"></p>
              </select>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="btnCrearAsignaturaCurso" class="btn btn-default" data-dismiss="modal">Crear Asignatura</button>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="mdModificarAsignaturaCurso" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <br>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Asignatura Curso</h4>
        </div>
        <div class="modal-body">
          <form>

            <div class="form-group">
              <label for="txtAsignatura">Asignatura</label>
              <select type="text" class="form-control" id="txtModAsignaturaSelect">
                <p id="cargar"></p>
              </select>
            </div>

            <div class="form-group">
              <label for="txtCurso">CURSO</label>
              <select type="text" class="form-control" id="txtModCursoSelect">
                <p id="cargar"></p>
              </select>
            </div>

            <div class="form-group">
              <label for="txtDocente">DOCENTE</label>
              <select type="text" class="form-control" id="txtModPersonalSelect">
                <p id="cargar"></p>
              </select>
            </div>

          </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="btnModificarAsignaturaCurso" class="btn btn-default" data-dismiss="modal">Modificar Asignatura Cursos</button>
        </div>
      </div>

    </div>
  </div>


  <table id="tablaAsignaturaCurso" class="table table-hover  table-striped">
    <thead class="cabeceraTablaAsignaturaCurso">
      <tr>
        <th>CURSO</th>
        <th>DOCENTE</th>
        <th>ASIGNATURA</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody id="tbodyAsignaturaCurso">

    </tbody>
  </table>

  <br><br>

</div>