$(document).ready(function() {
    cargarDatosCursoHorario(1, "", "");
    dias();




    function dias() {

        var dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];



        console.log(dias);
        var concatenar = "";

        for (let index = 0; index < dias.length; index++) {

            concatenar += '<option value=' + dias[index] + '>' + dias[index] + '</option>';

        }

        $("#dias").html(concatenar);

    }


    $("#buscarIdCurso").on("change", function horario() {

        var dataset = [];
        var dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];


        var lunes = [];
        var martes = [];
        var miercoles = [];
        var jueves = [];
        var viernes = [];
        var sabado = [];
        var domingo = [];


        var mensaje = $("#buscarIdCurso").val();

        var objData = new FormData();
        objData.append("horario", mensaje);

        $.ajax({
            url: "control/horarioControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                console.log(respuesta);



                respuesta.forEach(cargararrays);

                function cargararrays(item, index2) {

                    var hora = item.Hora;
                    var asignatura = item.nombreAsignatura;
                    var vacio = "";

                    if (item.dia == "Lunes") {

                        lunes.push({ hora, asignatura });
                    } else if (item.dia == "Martes") {

                        martes.push({ hora, asignatura });
                    } else if (item.dia == "Miercoles") {

                        miercoles.push({ hora, asignatura });
                    } else if (item.dia == "Jueves") {

                        jueves.push({ hora, asignatura });
                    } else if (item.dia == "Viernes") {

                        viernes.push({ hora, asignatura });
                    } else if (item.dia == "Sabado") {

                        sabado.push({ hora, asignatura });
                    } else if (item.dia == "Domingo") {

                        domingo.push({ hora, asignatura });
                    }

                }

                var horaUnica = [...new Set(respuesta)];

                console.log(horaUnica);

                console.log(lunes, martes, miercoles, jueves, viernes, sabado, domingo);


                dataset.push({ lunes, martes, miercoles, jueves, viernes, sabado, domingo });
                console.log(dataset);

                // $("#tablaHorario").DataTable(dataset);


                var horaAnterior = "";
                var horaActual = "";

                var datos = [];

                contador = 0;

                for (let index = 0; index < respuesta.length; index++) {

                    var dia3 = respuesta[index]["dia"];
                    horaActual = respuesta[index]["Hora"];

                    // alert(horaActual + " " + dia3);
                    var asignatura3 = respuesta[index]["nombreAsignatura"];

                    if (contador == 0) {

                        horaAnterior = respuesta[index]["Hora"];
                        datos.push({ horaAnterior, dia3, asignatura3 })

                    } else {
                        if (horaActual == horaAnterior) {
                            datos.push({ dia3, asignatura3 });




                        } else if (horaActual != horaAnterior) {
                            horaAnterior = respuesta[index]["Hora"];
                            datos.push({ horaActual, dia3, asignatura3 });

                        }

                    }



                    contador++;

                }

                console.log(datos);


















            }
        })


    })




    $("#btnRegistrarHorario").click(function() {

        var curso = $("#selectCursoForm1234").val();
        var asignatura = $("#selectAsignaturasCarga").val();
        var dia = $("#dias").val();
        var horaInicio = $("#horaInicio").val();
        var horaFin = $("#horaFin").val();

        var objData = new FormData();
        objData.append("curso", curso);
        objData.append("asignatura", asignatura);
        objData.append("dia", dia);
        objData.append("horaInicio", horaInicio);
        objData.append("horaFin", horaFin);

        $.ajax({
            url: "control/horarioControl.php",
            type: "post",
            datatype: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {


            }
        })




    })





    // cargarDatosCursos(1, "", "");
    // cargarDatosAsignatura(1);
    // cargarDatosCursoHorario(1);



    // /*--------------------------------------------------------------------------------------------------------*/
    // /*-----------------------------------------CARGAR DATOS ASIGNATURA----------------------------------------*/
    // /*--------------------------------------------------------------------------------------------------------*/

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
                    //$("#asignaturaSelect").html(concatenarAsignaturaCurso);




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
                    $("#selectGrado").html(concatenarCursoHorario);
                    $("#selectCursoForm1234").html(concatenarCursoHorario);
                    $("#buscarIdCurso").html(concatenarCursoHorario);

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



    $("#selectCursoForm1234").on("change", function() {


        var idCurso = $("#selectCursoForm1234").val();
        var objData = new FormData();
        objData.append("idCurso", idCurso);


        $.ajax({
            url: "control/horarioControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var concatenar = "";
                console.log(respuesta);

                respuesta.forEach(cargarAsignaturasSelect);

                function cargarAsignaturasSelect(item, index) {

                    concatenar += '<option value=' + item.idAsignatura + '>' + item.nombreAsignatura + '</option>';

                }
                // alert(concatenar);

                $("#selectAsignaturasCarga").html(concatenar);


            }
        })


    })

    // /*--------------------------------------------------------------------------------------------------------*/
    // /*-------------------------------------------CARGAR DATOS HORARIO-----------------------------------------*/
    // /*--------------------------------------------------------------------------------------------------------*/

    // cargarDatos();
    // $("#btnCrearHorario").click(function() {
    //     var asignatura = $("#asignaturaSelect").val();
    //     var cursoAsignatura = $("#cursoSelect").val();
    //     var dia = $("#txtDia").val();
    //     var horaInicio = $("#txtHoraInicio").val();
    //     var horaFin = $("#txtHoraFin").val();
    //     var objData = new FormData();

    //     objData.append("asignatura", asignatura);
    //     objData.append("cursoAsignatura", cursoAsignatura);
    //     objData.append("dia", dia);
    //     objData.append("horaInicio", horaInicio);
    //     objData.append("horaFin", horaFin);

    //     $.ajax({
    //         url: "control/horarioControl.php",
    //         type: "post",
    //         dataType: "json",
    //         data: objData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: function(respuesta) {
    //             Swal.fire({
    //                 position: 'top-center',
    //                 icon: 'success',
    //                 title: 'Registro Exitoso',
    //                 showConfirmButton: false,
    //                 timer: 1500
    //             })
    //             cargarDatos();
    //         }
    //     })
    // })

    // /*--------------------------------------------------------------------------------------------------------*/
    // /*-----------------------------------------LISTAR DATOS HORARIO-------------------------------------------*/
    // /*--------------------------------------------------------------------------------------------------------*/

    // function cargarDatos() {
    //     var listaHorio = "ok";
    //     var datosCargarHorario = [];
    //     var objListaHorario = new FormData();
    //     objListaHorario.append("listaHorio", listaHorio);

    //     $.ajax({
    //         url: "control/horarioControl.php",
    //         type: "post",
    //         dataType: "json",
    //         data: objListaHorario,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: function(respuesta) {

    //             var concatentarHorario = "";

    //             respuesta.forEach(cargarTablaHorario);

    //             function cargarTablaHorario(item, index) {

    //                 var btnCursos = '<button type="button" class="btn btn-success" title="Editar" id="btn-editarHorario" idHorario="' + item.idHorario + '"  lunes="' + item.lunes + '" martes="' + item.martes + '" miercoles="' + item.miercoles + '" jueves="' + item.jueves + '"  viernes="' + item.viernes + '"  sabado="' + item.sabado + '"  domingo="' + item.domingo + '" data-toggle="modal" data-target="#mdHorarioModificar"><span class="glyphicon glyphicon-pencil"></span></button>';
    //                 btnCursos += '<button type="button" class="btn btn-danger" title="Eliminar" id="btn-eliminarHorario" idHorario="' + item.idHorario + '"><span class="glyphicon glyphicon-trash"></span></button>';

    //                 datosCargarHorario.push([item.lunes, item.martes, item.miercoles, item.jueves, item.viernes, item.sabado, item.domingo]);
    //             }

    //             $("#tablaHorario").DataTable({
    //                 data: datosCargarHorario,
    //                 dom: 'Bfrtip',
    //                 buttons: [{
    //                         extend: 'copyHtml5',
    //                         exportOptions: {
    //                             columns: [0, ':visible']
    //                         }
    //                     },
    //                     {
    //                         extend: 'excelHtml5',
    //                         exportOptions: {
    //                             columns: [0, ':visible']
    //                         }
    //                     },
    //                     {
    //                         extend: 'pdfHtml5',
    //                         exportOptions: {
    //                             columns: [0, ':visible']
    //                         }
    //                     },
    //                     'colvis'
    //                 ],

    //             });
    //         }
    //     })
    // }

    // /*--------------------------------------------------------------------------------------------------------*/
    // /*------------------------------------------FUNCION DESTUIR TABLA-----------------------------------------*/
    // /*--------------------------------------------------------------------------------------------------------*/

    // /*--------------------------------------------------------------------------------------------------------*/
    // /*------------------------------------------CARGAR DATOS MODAL--------------------------------------------*/
    // /*--------------------------------------------------------------------------------------------------------*/

    // /*--------------------------------------------------------------------------------------------------------*/
    // /*----------------------------------------EDITAR DATOS HORARIO--------------------------------------------*/
    // /*--------------------------------------------------------------------------------------------------------*/

    // /*--------------------------------------------------------------------------------------------------------*/
    // /*---------------------------------------------ELIMINAR DATOS---------------------------------------------*/
    // /*--------------------------------------------------------------------------------------------------------*/
})