<?php

include_once "../modelo/personalModelo.php";

class personalControl
{
    // ---------->Variables
    public $idPersonal;
    public $nombre;
    public $apellidos;
    public $documento;
    public $telefono;
    public $ciudad;
    public $correo;
    public $estado;
    public $idRol;
    public $direccion;
    public $password;
    public $foto;
    public $fotoAntigua;

    // --------->Controles

    // ------------------------------------------------------------------
    // --------------Listar Datos de personal en la tabla----------------
    // ------------------------------------------------------------------

    public function ctrListarPersonal()
    {

        $objRespuesta = persnalModelo::mdlListarPersonal();
        echo json_encode($objRespuesta);
    }

    // ------------------------------------------------------------------
    // --------------Listar Roles en el select---------------------------
    // ------------------------------------------------------------------

    public function ctrListarRol()
    {

        $objRespuesta = persnalModelo::mdlListarRol();
        echo json_encode($objRespuesta);
    }

    // ------------------------------------------------------------------
    // --------------Registrar nuevo perosonal---------------------------
    // ------------------------------------------------------------------

    public function ctrRegistrarPerosonal()
    {

        $objRespuesta = persnalModelo::mdlRegistrarPersonal($this->nombre, $this->apellidos, $this->documento, $this->telefono, $this->ciudad, $this->correo, $this->estado, $this->idRol, $this->direccion, $this->password, $this->foto);
        echo json_encode($objRespuesta);
    }

    // ------------------------------------------------------------------
    // --------------Eliminar registro de personal-----------------------
    // ------------------------------------------------------------------

    public function ctrDeletePersonal()
    {

        $objRespuesta = persnalModelo::mdlDeletePersonal($this->idPersonal, $this->foto);
        echo json_encode($objRespuesta);
    }

    // ------------------------------------------------------------------
    // ----------Modificar personal sin cambio en la foto----------------
    // ------------------------------------------------------------------

    public function ctrModPersonal_1()
    {

        $objRespuesta = persnalModelo::mdlModificarPerosonalSinCambioFoto($this->idPersonal, $this->nombre, $this->apellidos, $this->documento, $this->telefono, $this->ciudad, $this->correo, $this->estado, $this->idRol, $this->direccion, $this->password, $this->foto);
        echo json_encode($objRespuesta);
    }


    // ------------------------------------------------------------------
    // ----------Modificar personal con cambio en la foto----------------
    // ------------------------------------------------------------------


    public function ctrModPersonal_2()
    {

        $objRespuesta = persnalModelo::mdlModificarPerosonalConCambioFoto($this->idPersonal, $this->nombre, $this->apellidos, $this->documento, $this->telefono, $this->ciudad, $this->correo, $this->estado, $this->idRol, $this->direccion, $this->password, $this->foto, $this->fotoAntigua);
        echo json_encode($objRespuesta);
    }
    // ------------------------------------------------------------------
    // ----------Buscar personal por documento---------------------------
    // ------------------------------------------------------------------

    public function ctrFiltroPersonal(){




    }

    
}

// ------>VALIDACIOONES

// ------------------------------------------------------------------
// --------------Listar Datos de personal en la tabla----------------
// ------------------------------------------------------------------

if (isset($_POST["listaPersonal"]) == "ok") {

    $objListarPersonal = new personalControl();
    $objListarPersonal->ctrListarPersonal();
}

// ------------------------------------------------------------------
// --------------Listar Roles en el select---------------------------
// ------------------------------------------------------------------

if (isset($_POST["listaRoles"]) == "ok") {

    $objListarRol = new personalControl();
    $objListarRol->ctrListarRol();
}

// ------------------------------------------------------------------
// --------------Registrar nuevo perosonal---------------------------
// ------------------------------------------------------------------

if (isset($_POST["nombre"])  && isset($_POST["apellido"]) && isset($_POST["documento"])  && isset($_POST["telefono"])  && isset($_POST["ciudad"])  && isset($_POST["correo"])  && isset($_POST["idRol"])  && isset($_POST["estado"])  && isset($_POST["direccion"]) && isset($_POST["password"])) {

    $objRegPersonal = new personalControl();
    $objRegPersonal->nombre = $_POST["nombre"];
    $objRegPersonal->apellidos = $_POST["apellido"];
    $objRegPersonal->documento = $_POST["documento"];
    $objRegPersonal->telefono = $_POST["telefono"];
    $objRegPersonal->ciudad = $_POST["ciudad"];
    $objRegPersonal->correo = $_POST["correo"];
    $objRegPersonal->idRol = $_POST["idRol"];
    $objRegPersonal->estado = $_POST["estado"];
    $objRegPersonal->direccion = $_POST["direccion"];
    $objRegPersonal->password = $_POST["password"];
    $objRegPersonal->foto = $_FILES["foto"];
    $objRegPersonal->ctrRegistrarPerosonal();
}

// ------------------------------------------------------------------
// --------------Eliminar registro de personal-----------------------
// ------------------------------------------------------------------

if (isset($_POST["idDeletePersonal"]) && isset($_POST["deleteFoto"])) {

    $objDeletePersonal =  new personalControl();
    $objDeletePersonal->idPersonal = $_POST["idDeletePersonal"];
    $objDeletePersonal->foto = $_POST["deleteFoto"];
    $objDeletePersonal->ctrDeletePersonal();
}


// ------------------------------------------------------------------
// ----------Modificar personal sin cambio en la foto----------------
// ------------------------------------------------------------------


if (isset($_POST["opcion1"]) == "fotoNormal") {

    $objModPersonal =  new personalControl();
    $objModPersonal->idPersonal = $_POST["idModPersonal"];
    $objModPersonal->nombre = $_POST["modNombre"];
    $objModPersonal->apellidos = $_POST["modApellido"];
    $objModPersonal->documento = $_POST["modDocumento"];
    $objModPersonal->telefono = $_POST["modTelefono"];
    $objModPersonal->ciudad = $_POST["modCiudad"];
    $objModPersonal->correo = $_POST["modCorreo"];
    $objModPersonal->estado = $_POST["modEstado"];
    $objModPersonal->idRol = $_POST["modIdRol"];
    $objModPersonal->direccion = $_POST["modDireccion"];
    $objModPersonal->password = $_POST["modPassword"];
    $objModPersonal->foto = $_POST["modFoto"];
    $objModPersonal->ctrModPersonal_1();
}

// ------------------------------------------------------------------
// ----------Modificar personal con cambio en la foto----------------
// ------------------------------------------------------------------

if (isset($_POST["opcion2"]) == "fotoArray") {

    $objModPersonal =  new personalControl();
    $objModPersonal->idPersonal = $_POST["idModPersonal"];
    $objModPersonal->nombre = $_POST["modNombre"];
    $objModPersonal->apellidos = $_POST["modApellido"];
    $objModPersonal->documento = $_POST["modDocumento"];
    $objModPersonal->telefono = $_POST["modTelefono"];
    $objModPersonal->ciudad = $_POST["modCiudad"];
    $objModPersonal->correo = $_POST["modCorreo"];
    $objModPersonal->estado = $_POST["modEstado"];
    $objModPersonal->idRol = $_POST["modIdRol"];
    $objModPersonal->direccion = $_POST["modDireccion"];
    $objModPersonal->password = $_POST["modPassword"];
    $objModPersonal->foto = $_FILES["modFoto"];
    $objModPersonal->fotoAntigua = $_POST["fotoAnterior"];
    $objModPersonal->ctrModPersonal_2();
}

// ------------------------------------------------------------------
// ----------Buscar personal por documento---------------------------
// ------------------------------------------------------------------

if (isset($_POST["filtroDocumento"])) {
    
    $objFiltroDocumento= new personalControl();
    $objFiltroDocumento->documento = $_POST["filtroDocumento"];
    $objFiltroDocumento->ctrFiltroPersonal();
}
