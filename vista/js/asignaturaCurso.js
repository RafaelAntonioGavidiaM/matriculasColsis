$(document).ready(function() {
    cargarDocentes(1);
    cargarDatosCursos(1);
    cargarDatosAsignatura(1);

    /*--------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------CARGAR DATOS ASIGNATURA----------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatosAsignatura(opcion, principal, nombreAsignatura) {
        var mensajeAsignatura = "cargarDatosAsignatura";
        var objData = new FormData();
        objData.append("cargarDatosAsignatura", mensajeAsignatura);
        $.ajax({
            url: "control/asignaturaCursoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (opcion == 1) {
                    var concatenarAsignaturaCurso = "";


                    respuesta.forEach(forCargarAsignaturaCurso);

                    function forCargarAsignaturaCurso(item, index) {

                        concatenarAsignaturaCurso += '<option value="' + item.idAsignatura + '">' + item.nombreAsignatura + '</option>';


                    }
                    $("#asignaturaSelect").html(concatenarAsignaturaCurso);

                } else if (opcion == 2) {

                    var concatenarAsignaturaCurso = "";
                    respuesta.forEach(forCargarAsignaturaCurso);

                    function forCargarAsignaturaCurso(item, index) {
                        if (item.idAsignatura == nombreAsignatura) {


                        } else {

                            concatenarAsignaturaCurso += '<option value="' + item.idAsignatura + '">' + item.nombreAsignatura + '</option>';
                        }
                    }
                    $("#txtModAsignaturaSelect").html(principal + concatenarAsignaturaCurso);
                }
            }
        })
    }


    /*--------------------------------------------------------------------------------------------------------*/
    /*--------------------------------------------CARGAR DATOS CURSO------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatosCursos(opcion, principal, nombreCurso) {
        var mensajeCursos = "cargarDatosCursos";
        var objData = new FormData();
        objData.append("cargarDatosCursos", mensajeCursos);
        $.ajax({
            url: "control/asignaturaCursoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (opcion == 1) {
                    var concatenarCurso = "";


                    respuesta.forEach(forCargarCurso);

                    function forCargarCurso(item, index) {

                        concatenarCurso += '<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>';


                    }
                    $("#cursoSelect").html(concatenarCurso);

                } else if (opcion == 2) {

                    var concatenarCurso = "";
                    respuesta.forEach(forCargarCurso);

                    function forCargarCurso(item, index) {
                        if (item.idCurso == nombreCurso) {


                        } else {

                            concatenarCurso += '<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>';
                        }
                    }
                    $("#txtModCursoSelect").html(principal + concatenarCurso);
                }
            }
        })
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------CARGAR DATOS DOCENTE-----------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDocentes(opcion, principal, idDocente) {
        var mensaje = "cargarDocente";
        var objData = new FormData();
        objData.append("cargarDocente", mensaje);
        $.ajax({
            url: "control/asignaturaCursoControl.php",
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

    /*--------------------------------------------------------------------------------------------------------*/
    /*---------------------------------------CARGAR DATOS ASIGNATURACURSO-------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    cargarDatos();
    $("#btnCrearAsignaturaCurso").click(function() {
        var asignatura = $("#asignaturaSelect").val();
        var cursoAsignatura = $("#cursoSelect").val();
        var docente = $("#personalSelect").val();
        var objData = new FormData();

        objData.append("asignatura", asignatura);
        objData.append("cursoAsignatura", cursoAsignatura);
        objData.append("docente", docente);

        $.ajax({
            url: "control/asignaturaCursoControl.php",
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
                destruirTablaAsignaturaCurso()
                cargarDatos();
            }
        })
    })

    /*--------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------LISTAR DATOS ASIGNATURA CURSO--------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatos() {
        var listaAsignaturaCurso = "ok";
        var datosCargarAsignaturaCursos = [];
        var objListaAsignaturaCursos = new FormData();
        objListaAsignaturaCursos.append("listaAsignaturaCurso", listaAsignaturaCurso);

        $.ajax({
            url: "control/asignaturaCursoControl.php",
            type: "post",
            dataType: "json",
            data: objListaAsignaturaCursos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                //  console.log(respuesta);

                respuesta.forEach(cargarTablaAsignaturaCurso);

                function cargarTablaAsignaturaCurso(item, index) {

                    var btnAsignaturaCursos = '<button type="button" class="btn btn-success" title="Editar" id="btn-editarAsignaturaCursos" idCurso="' + item.idCurso + '"  idAsignatura="' + item.idAsignatura + '"  nombreAsignatura="' + item.nombreAsignatura + '" nombreCurso="' + item.nombreCurso + '" año="' + item.año + '" idDocente="' + item.idPersonal + '" idAsignaturaCurso="' + item.idAsignaturaCurso + '"  nombreDocente="' + item.nombre + " " + item.apellido + '" data-toggle="modal" data-target="#mdModificarAsignaturaCurso"><span class="glyphicon glyphicon-pencil"></span></button>';
                    btnAsignaturaCursos += '<button type="button" class="btn btn-danger" title="Eliminar" id="btn-eliminarAsignaturaCursos" idAsignaturaCurso="' + item.idAsignaturaCurso + '"  ><span class="glyphicon glyphicon-trash"></span></button>';
                    var docente = item.nombre + item.apellido;


                    datosCargarAsignaturaCursos.push([item.nombreCurso, docente, item.nombreAsignatura, btnAsignaturaCursos]);
                }

                // console.log(datosCargarAsignaturaCursos);
                $("#tablaAsignaturaCurso").DataTable({
                    data: datosCargarAsignaturaCursos,
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

    function destruirTablaAsignaturaCurso() {
        tabla = $("#tablaAsignaturaCurso").DataTable();
        tabla.destroy();
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------CARGAR DATOS MODAL--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#btnModificarAsignaturaCurso").click(function() {

        var asignatura = document.getElementById("txtModAsignaturaSelect").value;
        var cursoAsignatura = document.getElementById("txtModCursoSelect").value;
        var docente = document.getElementById("txtModPersonalSelect").value;
        var objData = new FormData();

        objData.append("modAsignaturaSelect", asignatura);
        objData.append("modCursoSelect", cursoAsignatura);
        objData.append("modDocenteSelect", docente);
        objData.append("modIdAsignaturaCurso", idAsignaturaCurso);
        $.ajax({
            url: "control/asignaturaCursoControl.php",
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
                destruirTablaAsignaturaCurso();
                cargarDatos();

            }
        })
    })

    var idAsignaturaCurso = 0
        /*--------------------------------------------------------------------------------------------------------*/
        /*-----------------------------------EDITAR DATOS ASIGNATURA CURSOS---------------------------------------*/
        /*--------------------------------------------------------------------------------------------------------*/

    $("#tbodyAsignaturaCurso").on("click", "#btn-editarAsignaturaCursos", function() {

        idAsignaturaCurso = $(this).attr("idAsignaturaCurso");
        var idAsignatura = $(this).attr("idAsignatura");
        var nombreAsignatura = $(this).attr("nombreAsignatura");
        var idCurso = $(this).attr("idCurso");
        var nombreCurso = $(this).attr("nombreCurso");
        var idDocente = $(this).attr("idDocente");
        var nombreDocente = $(this).attr("nombreDocente");

        var principal = '<option value=' + idAsignatura + '">' + nombreAsignatura + '</option>';
        cargarDatosAsignatura(2, principal, idAsignatura);

        var principal = '<option value=' + idCurso + '">' + nombreCurso + '</option>';

        cargarDatosCursos(2, principal, idCurso);

        var principal = '<option value="' + idDocente + '">' + nombreDocente + '</option>';
        cargarDocentes(2, principal, idDocente);

    })

    /*--------------------------------------------------------------------------------------------------------*/
    /*---------------------------------------------ELIMINAR DATOS---------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#tbodyAsignaturaCurso").on("click", "#btn-eliminarAsignaturaCursos", function() {

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
                var idAsignaturaCurso = $(this).attr("idAsignaturaCurso");


                var objData = new FormData();
                objData.append("eliminaAsignaturarCursoId", idAsignaturaCurso);


                $.ajax({
                    url: "control/asignaturaCursoControl.php",
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
                            destruirTablaAsignaturaCurso();
                            cargarDatos();
                        }
                    }
                })
            }
        })
    })


})