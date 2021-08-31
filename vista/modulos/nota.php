<br><br><br>





Periodo:
<div class="container center">




  <br><br><br><br><br>

  <p> Seleccione el Grado:<select id="grado">

    </select><button type="button" id="Seleccion" class="btn btn-default" data-dismiss="modal">Seleccionar</button></p>


  <p>Seleccion Asignatura: <select id="Asignaturas">


    </select>


  </p>
  <br><br><br>


  <div id="opciones">


    <button type="button" id="btnCrearNota" class="btn btn-default" data-toggle="modal">Crear Nota </button>
    <button type="button" id="btnCrearModificar" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modalCrearN">Modificar </button>
    <button type="button" id="btnCrearEliminarNota" class="btn btn-default" data-dismiss="modal">Eliminar Nota</button>

  </div>
  <div class="container">


    <!-- Modal -->
    <div class="modal fade" id="modalCrearN" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">


            <form>
              <div class="form-group">
                <label for="email">Nombre:</label>
                <input type="email" class="form-control" id="nombreNota" name="email">
              </div>
              <div class="form-group">
                <select id="habilitacion">
                  <option value='0'> Desabilitado </option>;
                  <option value='1'>Habilitado</option>;

                </select>



              </div>


            </form>










          </div>
          <div class="modal-footer">
            <button id="GuardarNota" type="button" class="btn btn-default" data-dismiss="modal">Guardar Nota</button>
          </div>
        </div>

      </div>
    </div>

  </div>

  <div class="container">
    <table class="table" id="tablaNota">
      <thead id="cabeceraNota">
      

      </thead>
      <tbody>

      </tbody>
    </table>

  </div>