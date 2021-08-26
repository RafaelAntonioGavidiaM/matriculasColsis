$(document).ready(function() {
    cargarDocentes(1);


    /*--------------------------------------------------------------------------------------------------------*/
    /*--------------------------------------------CARGAR DATOS CURSOS-----------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/
    function cargarDocentes(opcion, principal, idDocente) {
        var mensaje = "cargarDocente";
        var objData = new FormData();
        objData.append("cargarDocente", mensaje);
        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (opcion == 1) {
                    var concatenar = "";


                    respuesta.forEach(forCargaDocente);

                    function forCargaDocente(item, index) {

                        concatenar += '<option value="' + item.idPersonal + '">' + item.nombre + " " + item.apellido + '</option>';


                    }
                    $("#personalSelect").html(concatenar);

                } else if (opcion == 2) {

                    var concatenar = "";
                    respuesta.forEach(forCargaDocente);

                    function forCargaDocente(item, index) {
                        if (item.idPersonal == idDocente) {


                        } else {

                            concatenar += '<option value="' + item.idPersonal + '">' + item.nombre + " " + item.apellido + '</option>';
                        }




                    }
                    $("#txtModPersonalSelect").html(principal + concatenar);
                }
            }
        })
    }

    cargarDatos();
    $("#btnCrearCursos").click(function() {
        var curso = $("#txtCurso").val();
        var nombreCurso = $("#txtNombreCurso").val();
        var año = $("#txtAño").val();
        var docente = $("#personalSelect").val();
        var objData = new FormData();

        objData.append("curso", curso);
        objData.append("nombreCurso", nombreCurso);
        objData.append("año", año);
        objData.append("docente", docente);

        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })
                destruirTablaCursos()
                cargarDatos();
            }
        })
    })


    /*--------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------LIMPIAR DATOS AL DAR CREAR CURSOS----------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#btnCursos").click(function() {


        $("#txtCurso").val("");
        $("#txtNombreCurso").val("");
        $("#txtRegApellidos").val("");
        $("#txtAño").val("");

    })

    /*--------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------CARGAR DATOS PERSONAL------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarPersonal(opcion, idPersonal) {
        var mensaje = "ok";
        var objData = new FormData();

        objData.append("cargarPersonal", mensaje);

        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (opcion == 1) {
                    console.log(respuesta);

                    var interface = '';
                    respuesta.forEach(cargarPersonalCursos);

                    function cargarPersonalCursos(item, index) {

                        interface += '<option value="' + item.idPersonal + '">' + item.nombre + " " + item.apellido + '</option>';
                    }

                    //alert(interface);

                    $("#personalSelect").html(interface);

                } else if (opcion == 2) {

                    var interface = '';
                    var principal = "";
                    respuesta.forEach(cargarPersonalCursos);

                    function cargarPersonalCursos(item, index) {
                        if (item.idPersonal == idPersonal) {
                            principal = '<option value="' + item.idPersonal + '">' + item.nombre + " " + item.apellido + '</option>';
                        } else {
                            interface += '<option value="' + item.idPersonal + '">' + item.nombre + " " + item.apellido + '</option>';
                        }
                    }
                    $("#ModPersonalSelect").html(principal + interface);
                }
            }
        })
    }


    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------LISTAR DATOS CURSOS-------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatos() {
        var listaCursos = "ok";
        var datosCargarCursos = [];
        var objListaCursos = new FormData();
        objListaCursos.append("listaCursos", listaCursos);

        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objListaCursos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                console.log(respuesta);
                var concatentarCursos = "";

                respuesta.forEach(cargarTablaCursos);

                function cargarTablaCursos(item, index) {

                    var btnCursos = '<button type="button" class="btn btn-success" title="Editar" id="btn-editarCursos" idCurso="' + item.idCurso + '"  curso="' + item.curso + '" nombreCurso="' + item.nombreCurso + '" año="' + item.año + '" idDocente="' + item.idDocente + '"  nombreDocente="' + item.nombre + " " + item.apellido + '" data-toggle="modal" data-target="#mdCursosModificar"><span class="glyphicon glyphicon-pencil"></span></button>';
                    btnCursos += '<button type="button" class="btn btn-danger" title="Eliminar" id="btn-eliminarCursos" idCurso="' + item.idCurso + '"  imagen="' + item.imagen + '"><span class="glyphicon glyphicon-trash"></span></button>';
                    var docente = item.nombre + item.apellido;

                    datosCargarCursos.push([item.curso, item.nombreCurso, item.año, docente, btnCursos, concatentarCursos]);
                }

                console.log(datosCargarCursos);
                $("#tablaCursos").DataTable({
                    data: datosCargarCursos,
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        'colvis'
                    ],

                });
            }
        })
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------FUNCION DESTUIR TABLA--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function destruirTablaCursos() {
        tabla = $("#tablaCursos").DataTable();
        tabla.destroy();
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------CARGAR DATOS MODAL--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#btnModCursos").click(function() {

        var curso = $("#txtModCurso").val();
        var nombreCurso = $("#txtModNombreCurso").val();
        var año = $("#txtModAño").val();
        var docente = document.getElementById("txtModPersonalSelect").value;
        var objData = new FormData();

        objData.append("modCurso", curso);
        objData.append("modNombreCurso", nombreCurso);
        objData.append("modAño", año);
        objData.append("modDocenteSelect", docente);
        objData.append("modIdCurso", idCurso);
        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })
                destruirTablaCursos()
                cargarDatos();

            }
        })
    })

    var idCurso = 0
        /*--------------------------------------------------------------------------------------------------------*/
        /*-----------------------------------------EDITAR DATOS CURSOS--------------------------------------------*/
        /*--------------------------------------------------------------------------------------------------------*/

    $("#tbodyCursos").on("click", "#btn-editarCursos", function() {



        idCurso = $(this).attr("idCurso");
        var curso = $(this).attr("curso");
        var nombreCurso = $(this).attr("nombreCurso");
        var año = $(this).attr("año");
        var idDocente = $(this).attr("idDocente");
        var nombreDocente = $(this).attr("nombreDocente");

        var principal = '<option value="' + idDocente + '">' + nombreDocente + '</option>';
        cargarDocentes(2, principal, idDocente);




        $("#txtModCurso").val(curso);
        $("#txtModNombreCurso").val(nombreCurso);
        $("#txtModAño").val(año);

    })

    /*--------------------------------------------------------------------------------------------------------*/
    /*---------------------------------------------ELIMINAR DATOS---------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#tbodyCursos").on("click", "#btn-eliminarCursos", function() {

        Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, !Eliminalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                var idCurso = $(this).attr("idCurso");


                var objData = new FormData();
                objData.append("eliminarCursosId", idCurso);


                $.ajax({
                    url: "control/cursosControl.php",
                    type: "post",
                    dataType: "json",
                    data: objData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                        if (respuesta == "ok") {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            destruirTablaCursos()
                            cargarDatos();
                        }
                    }
                })
            }
        })
    })



})