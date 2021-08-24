<body>

  <!-- ---------------------------------------- -->
  <!-- -------------jUMBOTRON------------------ -->
  <!-- ---------------------------------------- -->

  <div class="container-fluid text-center">
    <div class="jumbotron">
      <h1>Personal</h1>
      <p>Apertado para adminsitracion del personal de trabajo.</p>
    </div>
  </div>
  <!-- ---------------------------------------- -->
  <!-- ------------Filtro de personal---------- -->
  <!-- ---------------------------------------- -->

  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <div class="form-group">
          <label for="txtBuscarPersonal">Buscar Personal</label>
          <input type="text" class="form-control" placeholder="Ingrese Documento" id="txtBuscarPersonal">
        </div>
      </div>
      <div class="col-lg-2">

        <br><br>
        <button id="btnBuscarPersonal"type="button" class="btn btn-info" title="Buscar"><span class="glyphicon glyphicon-search "></span></button>'

      </div>

    </div>

  </div>

  <!-- ---------------------------------------- -->
  <!-- -------------tabla de perosnal---------- -->
  <!-- ---------------------------------------- -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2">
        <br><br><br><br><br>
        <button id="btnRegPersonal" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ventanaRegPersonal">Registrar Nuevo personal</button>
      </div>
      <div class="col-lg-10">
        <table id="tablaPersonal" class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apelldios</th>
              <th>Documento</th>
              <th>Telefono</th>
              <th>Ciudad</th>
              <th>Correo</th>
              <th>Estado</th>
              <th>Rol</th>
              <th>Direccion</th>
              <th>Password</th>
              <th>Foto</th>
            </tr>
          </thead>
          <!-- -------------cuerpo de la tabla de personal---------- -->
          <tbody id="bodyPersonal">
          </tbody>
        </table>

      </div>
    </div>
  </div>


  <!-- ---------------------------------------- -->
  <!-- MODALES DE REGISTRO Y MODIFICAR PERSONAL -->
  <!-- ---------------------------------------- -->

  <div class="container-fluid">


    <!-- Modal registro personal -->
    <div class="modal fade" id="ventanaRegPersonal" role="dialog">
      <div class="modal-dialog">

        <!-- modal registro personal-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">👷Registro Personal</h4>
          </div>

          <!-- cuerpo de la modal de registro personal -->
          <div class="form-group">
            <label for="txtRegNombres">Nombres:</label>
            <input type="text" class="form-control" id="txtRegNombres">
          </div>

          <div class="form-group">
            <label for="txtRegApellidos">Apellidos:</label>
            <input type="text" class="form-control" id="txtRegApellidos">
          </div>

          <div class="form-group">
            <label for="txtRegDocumeto">Documento:</label>
            <input type="text" class="form-control" id="txtRegDocumeto">
          </div>

          <div class="form-group">
            <label for="txtRegTelefono">Telefono</label>
            <input type="text" class="form-control" id="txtRegTelefono">
          </div>

          <div class="form-group">
            <label for="txtRegCiudad">Ciudad</label>
            <input type="text" class="form-control" id="txtRegCiudad">
          </div>

          <div class="form-group">
            <label for="txtRegCorreo">Correo</label>
            <input type="text" class="form-control" id="txtRegCorreo">
          </div>
          <!-- -------------select de estado cargado manualmente----------- -->
          <div>
            <label for="esatodosPersonal">Estado</label><br>
            <select name="estado" id="esatodosPersonal">
              <option value="Habilitado">Habilitado</option>
              <option value="Deshabilitado">DesHabilitado</option>
            </select>
          </div>
          <!-- -------------select de rol cargado por la tabla rol---------- -->
          <div>
            <label for="regRol">Rol</label>
            <br>
            <select name="rol" id="regRol">


            </select>
          </div>

          <div class="form-group">
            <label for="txtRegDireccion">Direccion</label>
            <input type="text" class="form-control" id="txtRegDireccion">
          </div>

          <div class="form-group">
            <label for="txtRegPassword">Password</label>
            <input type="text" class="form-control" id="txtRegPassword">
          </div>


          <!-- -------------Caja de texto de type="file" para cargar la foto---------- -->
          <div class="form-group">
            <label for="txtRegFoto">Foto:</label>
            <img src="" id="regFoto">
            <input type="file" class="form-control" id="txtRegFoto">
          </div>

          <!-- pie de modal de rigsitro personal -->
          <div class="modal-footer">
            <button id="btnNewPersonal" type="button" class="btn btn-success" data-dismiss="modal">Registrar</button>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- ---------------------------------------- -->
  <!-- ---MODAL DE MODIFICAR PERSONAL---------- -->
  <!-- ---------------------------------------- -->

  <div class="container-fluid">


    <!-- Modal Modificar personal -->
    <div class="modal fade" id="ventanaModPersonal" role="dialog">
      <div class="modal-dialog">

        <!-- modal Modificar personal-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">👷Modificar Personal</h4>
          </div>

          <!-- cuerpo de la modal de Modificar personal -->
          <div class="form-group">
            <label for="txtModNombres">Nombres:</label>
            <input type="text" class="form-control" id="txtModNombres">
          </div>

          <div class="form-group">
            <label for="txtModApellidos">Apellidos:</label>
            <input type="text" class="form-control" id="txtModApellidos">
          </div>

          <div class="form-group">
            <label for="txtModDocumeto">Documento:</label>
            <input type="text" class="form-control" id="txtModDocumeto">
          </div>

          <div class="form-group">
            <label for="txtModTelefono">Telefono</label>
            <input type="text" class="form-control" id="txtModTelefono">
          </div>

          <div class="form-group">
            <label for="txtModCiudad">Ciudad</label>
            <input type="text" class="form-control" id="txtModCiudad">
          </div>

          <div class="form-group">
            <label for="txtModCorreos">Correo</label>
            <input type="text" class="form-control" id="txtModCorreo">
          </div>

          <!-- -------------select de estado cargado manualmente----------- -->
          <div>
            <label for="modEstadosPersonal">Estado</label><br>
            <select name="estado" id="modEstadosPersonal">
              <option value="Habilitado">Habilitado</option>
              <option value="Deshabilitado">DesHabilitado</option>
            </select>
          </div>

          <!-- -------------select de rol cargado por la tabla rol---------- -->
          <div>
            <label for="modRol">Rol</label>
            <br>
            <select name="rol" id="modRol">


            </select>
          </div>

          <div class="form-group">
            <label for="txtModDireccion">Direccion</label>
            <input type="text" class="form-control" id="txtModDireccion">
          </div>

          <div class="form-group">
            <label for="txtModPassword">Password</label>
            <input type="text" class="form-control" id="txtModPassword">
          </div>


          <!-- -------------Caja de texto de type="file" para cargar la foto---------- -->
          <div class="form-group">
            <label for="txtModFoto">Foto:</label>
            <img src="" id="ModFoto">
            <input type="file" class="form-control" id="txtModFoto">
          </div>

          <!-- pie de modal de Modificar Personal -->
          <div class="modal-footer">
            <button id="btnModificarPersonal" type="button" class="btn btn-success" data-dismiss="modal">Modificar</button>
          </div>
        </div>

      </div>
    </div>

  </div>



</body>