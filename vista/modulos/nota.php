<br><br><br>
<div class="container center">
  <div class="jumbotron">
    <h1>Creacion de Rol</h1>
    <p>Acceda a permisos establesca privilegios al personal que se encuenta activo.</p>
  </div>



  <p> Seleccione el Grado:<select id="grado">
    <option value="apple">Apple</option>
    <option value="orange">Orange</option>
    <option value="pineapple">Pineapple</option>
    <option value="banana">Banana</option>
  </select></p>
  <button id="btnCrear" class="btn btn-primary" data-toggle="modal" data-target="#mdRol">Crear Nueva Nota</button>

 <!-- Modal -->
 <br><br><br><br><br>
  <div class="modal fade" id="mdRol" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <br>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registro Rol</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nombre">Nombre Rol</label>
              <input type="text" class="form-control" id="nombreRol">
            </div>


          </form>




        </div>
        <div class="modal-footer">
          <button type="button" id="btnCrearRol" class="btn btn-default" data-dismiss="modal">Crear Rol</button>
        </div>
      </div>

    </div>
  </div>

