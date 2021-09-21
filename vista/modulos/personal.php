<body>


  <header class="headerPersonal">
    <div class="container">
      <div class="texto">
        <div class="caja">
          <h1 id="h1rf">Personal</h1>
        </div>
      </div>
    </div>
    <div class="wave" style="height: 150px; overflow: hidden;">
      <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
        <path d="M-4.22,101.14 C240.12,148.52 305.58,54.77 503.10,122.86 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
      </svg>
    </div>
  </header>
  <br>
  <br>
  <br>
  <br>
  <br>

  <div class="margenes">


    <!-- ---------------------------------------- -->
    <!-- -------------jUMBOTRON------------------ -->
    <!-- ---------------------------------------- -->

    <!-- <div class="container-fluid text-center margenes">
      <div class="jumbotron">
        <h1>Personal</h1>
        <p>Apertado para adminsitracion del personal de trabajo.</p>
      </div>
    </div> -->


    <!-- ---------------------------------------- -->
    <!-- -------------tabla de perosnal---------- -->
    <!-- ---------------------------------------- -->

    <div class="container-fluid margenes">
      <div class="row">
        <div class="col-lg-12">
          <button id="btnRegPersonal" type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#ventanaRegPersonal">Registrar Nuevo personal</button>

          <br><br>
        </div>
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <center>
                <h1>👨🏼‍🔧Personal👨🏼‍🔬</h1>
              </center>
            </div>
            <div class="panel-body">

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
                    <th>Acciones</th>
                  </tr>
                </thead>
                <!-- -------------cuerpo de la tabla de personal---------- -->
                <tbody id="bodyPersonal">
                </tbody>
              </table>



            </div>
          </div>

        </div>
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
          <div class="modal-body">
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

          </div>
          


          <!-- pie de modal de rigsitro personal -->
          <div class="modal-footer">
            <button id="btnNewPersonal" type="button" class="btn btn-success" data-dismiss="modal">Registrar💾</button>
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
            <button id="btnModificarPersonal" type="button" class="btn btn-success" data-dismiss="modal">Modificar💾</button>
          </div>
        </div>

      </div>
    </div>

  </div>



</body>