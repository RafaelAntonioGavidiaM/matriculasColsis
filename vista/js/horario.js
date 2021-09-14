$(document).ready(function() {
    cargarDatosCursos(1);
    cargarDatosAsignatura(1);
    cargarDatosCursoHorario(1);

    /*--------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------CARGAR DATOS ASIGNATURA----------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatosAsignatura(opcion, principal, nombreAsignatura) {
        var mensajeAsignatura = "cargarDatosAsignatura";
        var objData = new FormData();
        objData.append("cargarDatosAsignatura", mensajeAsignatura);
        $.ajax({
            url: "control/horarioControl.php",
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
            url: "control/horarioControl.php",
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
    /*----------------------------------------CARGAR DATOS HORARIO--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatosCursoHorario(opcion, principal, nombreCurso) {
        var mensajeCursoHorario = "cargarDatosCursosHorario";
        var objData = new FormData();
        objData.append("cargarDatosCursosHorario", mensajeCursoHorario);
        $.ajax({
            url: "control/horarioControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (opcion == 1) {
                    var concatenarCursoHorario = "";


                    respuesta.forEach(forCargarCurso);

                    function forCargarCurso(item, index) {

                        concatenarCursoHorario += '<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>';


                    }
                    $("#cursoHorarioSelect").html(concatenarCursoHorario);

                } else if (opcion == 2) {

                    var concatenarCursoHorario = "";
                    respuesta.forEach(forCargarCurso);

                    function forCargarCurso(item, index) {
                        if (item.idCurso == nombreCurso) {


                        } else {

                            concatenarCursoHorario += '<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>';
                        }
                    }
                    $("#txtModCursoSelect").html(principal + concatenarCursoHorario);
                }
            }
        })
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------CARGAR DATOS HORARIO-----------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    cargarDatos();
    $("#btnCrearHorario").click(function() {
        var asignatura = $("#asignaturaSelect").val();
        var cursoAsignatura = $("#cursoSelect").val();
        var dia = $("#txtDia").val();
        var horaInicio = $("#txtHoraInicio").val();
        var horaFin = $("#txtHoraFin").val();
        var objData = new FormData();

        objData.append("asignatura", asignatura);
        objData.append("cursoAsignatura", cursoAsignatura);
        objData.append("dia", dia);
        objData.append("horaInicio", horaInicio);
        objData.append("horaFin", horaFin);

        $.ajax({
            url: "control/horarioControl.php",
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
                cargarDatos();
            }
        })
    })

    /*--------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------LISTAR DATOS HORARIO-------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatos() {
        var listaHorio = "ok";
        var datosCargarHorario = [];
        var objListaHorario = new FormData();
        objListaHorario.append("listaHorio", listaHorio);

        $.ajax({
            url: "control/horarioControl.php",
            type: "post",
            dataType: "json",
            data: objListaHorario,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var concatentarHorario = "";

                respuesta.forEach(cargarTablaHorario);

                function cargarTablaHorario(item, index) {

                    var btnCursos = '<button type="button" class="btn btn-success" title="Editar" id="btn-editarHorario" idHorario="' + item.idHorario + '"  lunes="' + item.lunes + '" martes="' + item.martes + '" miercoles="' + item.miercoles + '" jueves="' + item.jueves + '"  viernes="' + item.viernes + '"  sabado="' + item.sabado + '"  domingo="' + item.domingo + '" data-toggle="modal" data-target="#mdHorarioModificar"><span class="glyphicon glyphicon-pencil"></span></button>';
                    btnCursos += '<button type="button" class="btn btn-danger" title="Eliminar" id="btn-eliminarHorario" idHorario="' + item.idHorario + '"><span class="glyphicon glyphicon-trash"></span></button>';

                    datosCargarHorario.push([item.lunes, item.martes, item.miercoles, item.jueves, item.viernes, item.sabado, item.domingo]);
                }

                $("#tablaHorario").DataTable({
                    data: datosCargarHorario,
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
    /*------------------------------------------FUNCION DESTUIR TABLA-----------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------CARGAR DATOS MODAL--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    /*--------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------EDITAR DATOS HORARIO--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    /*--------------------------------------------------------------------------------------------------------*/
    /*---------------------------------------------ELIMINAR DATOS---------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/
})