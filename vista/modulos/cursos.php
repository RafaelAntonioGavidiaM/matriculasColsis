
<header>
    <div class="container">
        <div class="texto">
            <div class="caja">
                <h1 id="h1rf">CURSOS</h1>
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
  

  <button id="btnCursos" class="btn btn-success" data-toggle="modal" data-target="#mdCursos"> Crear Cursos</button>

  <!-- Modal -->
  <br><br><br><br><br>
  <div class="modal fade" id="mdCursos" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <br>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¡Registrar Cursos!</h4>
        </div>
        <div class="modal-body">
          <form>

            <div class="form-group">
              <label for="txtCurso">Curso</label>
              <input type="text" class="form-control" id="txtCurso">
            </div>

            <div class="form-group">
              <label for="txtNombreCurso">NOMBRE CURSO</label>
              <input type="text" class="form-control" id="txtNombreCurso">
            </div>

            <div class="form-group">
              <label for="txtAño">AÑO</label>
              <input type="text" class="form-control" id="txtAño">
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
          <button type="button" class="btn btn-success" id="btnCrearCursos" class="btn btn-default" data-dismiss="modal">Crear Cursos</button>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="mdCursosModificar" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <br>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Cursos</h4>
        </div>
        <div class="modal-body">
          <form>

              <div class="form-group">
                <label for="txtModCurso">Curso</label>
                <input type="text" class="form-control" id="txtModCurso">
              </div>

              <div class="form-group">
                <label for="txtModNombreCurso">NOMBRE CURSO</label>
                <input type="text" class="form-control" id="txtModNombreCurso">
              </div>

              <div class="form-group">
                <label for="txtModAño">AÑO</label>
                <input type="text" class="form-control" id="txtModAño">
              </div>

              <div class="form-group">
                <label for="txtModDocente">DOCENTE</label>
                <select type="text" class="form-control" id="txtModPersonalSelect">
                  <p id="cargar"></p>
                </select>  
              </div>
            
          </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="btnModCursos" class="btn btn-default" data-dismiss="modal">Modificar Cursos</button>
        </div>
      </div>

    </div>
  </div>

  
  <table id="tablaCursos" class="table table-hover  table-striped">
    <thead class="cabeceraTablaCurso">
      <tr>
        <th>CURSO</th>
        <th>NOMBRE CURSO</th>
        <th>AÑO</th>
        <th>DIRECTOR DE CURSO</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody id="tbodyCursos">
    
    </tbody>
  </table>
  
  <br><br>

</div>