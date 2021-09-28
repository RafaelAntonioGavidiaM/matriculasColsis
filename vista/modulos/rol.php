<header class="headerRol">
  <div class="container">
    <div class="texto">
      <div class="caja">
        <h1 id="h1rf">Roles</h1>
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
  <button id="btnCrear" class="btn btn-primary" data-toggle="modal" data-target="#mdRol"> Crear Rol</button>

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



  <div class="modal fade" id="mdRolModificarNombre" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <br>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Rol</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nombre">Nombre Rol</label>
              <input type="text" class="form-control" id="nombreRolMod">
            </div>


          </form>




        </div>
        <div class="modal-footer">
          <button type="button" id="btnModRol" class="btn btn-default" data-dismiss="modal">Modificar Rol</button>
        </div>
      </div>

    </div>
  </div>



  <table id="tablaRol" class="table">
    <thead>
      <tr>
        <th>Nombre Rol</th>
        <th>Permisos</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="tbodyRol">

    </tbody>
  </table>







</div>

<!-- Modal -->
<br><br><br><br><br>
<div class="modal fade" id="mdRolModificar" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <br>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="tituloMod" class="modal-title"></h4>
      </div>
      <div id="modalModificar" class="modal-body">
        <table id="tablaPermisos" class="table">
          <thead>
            <tr>
              <th>Nombre Formulario</th>
              <th>Permiso</th>

            </tr>
          </thead>
          <tbody id="tbodyPermisos">

          </tbody>
        </table>











      </div>
      <div class="modal-footer">
        <button id="CerrarPermiso" type="button" class="btn btn-primary" data-dismiss="modal">Cerrar </button>
      </div>
    </div>

  </div>
</div>