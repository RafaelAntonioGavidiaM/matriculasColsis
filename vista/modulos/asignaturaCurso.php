
<header>
    <div class="container">
        <div class="texto">
            <div class="caja">
                <h1 id="h1rf">Asignar docente a una asignatura</h1>
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