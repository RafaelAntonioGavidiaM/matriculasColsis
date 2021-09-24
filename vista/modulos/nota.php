<br><br><br>






<div class="container center">




  <br><br><br><br><br>

  <p> Seleccione el Grado:<select id="grado">

    </select><button type="button" id="Seleccion" class="btn btn-primary" data-dismiss="modal">Seleccionar</button></p>


  <div id="contenido">

    <p>Seleccion Asignatura: <select id="Asignaturas">


      </select>


    </p>
    <br><br><br>


    <div id="opciones">


      <button type="button" id="btnCrearNota" class="btn btn-primary" data-toggle="modal">Crear Nota </button>
      <button type="button" id="btnCrearModificar" class="btn btn-primary" data-dismiss="modal" data-toggle="modal">Modificar </button>
      <button type="button" id="btnEliminarNota" class="btn btn-primary" data-dismiss="modal">Eliminar Nota</button>

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
              <button id="GuardarNota" type="button" class="btn btn-primary" data-dismiss="modal">Guardar Nota</button>
            </div>
          </div>

        </div>
      </div>

    </div>

    <br><br><br><br><br>

    <div class="container" >

    <div id="contenedorTabla" ></div>
      <table class="table table-bordered" id="tablaNota">


        <thead>

          <tr id="cabecera"></tr>




        </thead>

        <tbody id="cuerpoTabla">

        </tbody>







      </table>

    </div>

    <div id="editarNota" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="tituloModal"></h4>
          </div>
          <div class="modal-body">






            <div id="contenedorNotas"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>




    </div>
    <div id="modificarNotas" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="tituloModal"></h4>
          </div>
          <div class="modal-body">

            Seleccione Nombre Nota: <select name="" id="SelectnombreNotas"></select>
            Nombre: <input type="text" id="inpNombreNota">
            Estado: <select name="" id="mEstadoNota"></select>




            <div id="contenedorNotas"></div>
          </div>
          <div class="modal-footer">
            <button id="modificarNota" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
          </div>
        </div>

      </div>
    </div>