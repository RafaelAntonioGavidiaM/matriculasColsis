$(document).ready(function() {
    cargarDia(1);
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
    /*---------------------------------------------CARGAR DATOS DÍA-------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDia(opcion, principal, nombreDia) {
        var mensaje = "cargarDia";
        var objData = new FormData();
        objData.append("cargarDia", mensaje);
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
                    var concatenarDia = "";


                    respuesta.forEach(forCargarDia);

                    function forCargarDia(item, index) {

                        concatenarDia += '<option value="' + item.idDia + '">' + item.nombreDia + '</option>';


                    }
                    $("#diaSelect").html(concatenarDia);

                } else if (opcion == 2) {

                    var concatenarDia = "";
                    respuesta.forEach(forCargaDia);

                    function forCargaDia(item, index) {
                        if (item.idDia == nombreDia) {


                        } else {

                            concatenarHorario += '<option value="' + item.idDia + '">' + item.nombreDia + '</option>';
                        }
                    }

                    $("#txtModDiaSelect").html(principal + concatenarHorario);
                }
            }
        })
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------CARGAR DATOS HORARIO--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatosCursoHorario(opcion, principal, nombreCurso) {
        var mensajeCursos = "cargarDatosCursosHorario";
        var objData = new FormData();
        objData.append("cargarDatosCursosHorario", mensajeCursos);
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
                    var concatenarCursoHoraio = "";


                    respuesta.forEach(forCargarCurso);

                    function forCargarCurso(item, index) {

                        concatenarCursoHoraio += '<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>';


                    }
                    $("#cursoHorarioSelect").html(concatenarCursoHoraio);

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
        var dia = $("#diaSelect").val();
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