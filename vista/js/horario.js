$(document).ready(function() {
    cargarDatosCursoHorario(1, "", "");
    dias();
    $(".editarHorario").hide();




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
        var mensaje = $("#buscarIdCurso").val();

        cargarHorario(mensaje);




    })


    function cargarHorario(idCurso) {
        var dataset = [];
        var dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];





        var mensaje = idCurso;

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

                // $("#tablaHorario").DataTable(dataset);


                var horaAnterior = "";
                var horaActual = "";


                var datos = [];

                contador = 0;

                for (let index = 0; index < respuesta.length; index++) {
                    var hora = "";
                    var idHorario = respuesta[index]["idHorario"];



                    var dia3 = respuesta[index]["dia"];
                    horaActual = respuesta[index]["Hora"];

                    // alert(horaActual + " " + dia3);
                    var asignatura3 = respuesta[index]["nombreAsignatura"];

                    if (contador == 0) {

                        horaAnterior = respuesta[index]["Hora"];
                        hora = horaAnterior;

                        datos.push({ hora, dia3, idHorario, asignatura3 })

                    } else {
                        if (horaActual == horaAnterior) {

                            hora = "";
                            datos.push({ hora, dia3, idHorario, asignatura3 });




                        } else if (horaActual != horaAnterior) {

                            horaAnterior = respuesta[index]["Hora"];
                            hora = horaAnterior;
                            datos.push({ hora, dia3, idHorario, asignatura3 });

                        }

                    }



                    contador++;

                }

                console.log(datos);

                var resultados = [];

                var concatenarR = "";

                var contadorConcatenar = 0;
                var ultimodia = 0;




                for (let index = 0; index < datos.length; index++) {

                    var diaValidar = datos[index]["dia3"];



                    if (datos[index]["hora"] != "") {

                        if (index == 1) {
                            concatenarR += '<tr>';
                            ultimodia = 0;

                        } else {
                            concatenarR += '</tr>';
                            concatenarR += '<tr>';
                            ultimodia = 0;




                        }
                        concatenarR += '<td>' + datos[index]["hora"] + '</td>';
                        for (let index2 = ultimodia; index2 < dias.length; index2++) {

                            //alert(ultimodia);
                            // alert(diaValidar + " " + dias[index2]);



                            if (diaValidar !== dias[index2]) {
                                concatenarR += '<td>' + '</td>';



                            } else {
                                ultimodia = index2 + 1;
                                //alert("Entro");
                                break;

                            }


                        }

                        concatenarR += '<td><button type="button" id="btnAsignaturaHorario" class="btn btn-info" idHorario=' + datos[index]["idHorario"] + ' data-toggle="modal" data-target="#modalHorario">' + datos[index]["asignatura3"] + ' </button></td>';


                    } else {

                        for (let index2 = ultimodia; index2 < dias.length; index2++) {

                            //alert(ultimodia);
                            //alert(diaValidar + "" + dias[index2]);



                            if (diaValidar !== dias[index2]) {
                                concatenarR += '<td>' + '</td>';


                            } else {
                                ultimodia = index2 + 1;
                                // alert("Entro");
                                break;


                            }


                        }


                        concatenarR += '<td><button type="button" id="btnAsignaturaHorario" class="btn btn-info" idHorario=' + datos[index]["idHorario"] + ' data-toggle="modal" data-target="#modalHorario">' + datos[index]["asignatura3"] + ' </button></td>';


                    }


                }
                concatenarR += '<tr>';
                //alert(concatenarR);
                $("#cuerpoTablaHorario").html(concatenarR);



            }
        })
    }

    $("#tablaHorario").on("click", "#btnAsignaturaHorario", function() {
        var idHorario = $(this).attr("idHorario");
        //  alert(idHorario);
        $("#btnEditarHorario").attr("idEditar", idHorario);
        $("#eidHorario").attr("idEliminar", idHorario);









    })

    $("#btnEditarHorario").click(function() {

        $(".editarHorario").show();

        var dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

        var idHorario = $(this).attr("idEditar");
        var objData = new FormData();
        objData.append("idEditarHorario", idHorario);

        $.ajax({
            url: "control/horarioControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (respuesta != null) {
                    var principal = "";
                    var concatenar = "";

                    respuesta.forEach(cargarDatosHorarioEditar);


                    function cargarDatosHorarioEditar(item, index) {



                        $("#nombreAsignatura").val(item.nombreAsignatura);

                        for (let index2 = 0; index2 < dias.length; index2++) {

                            if (item.dia == dias[index2]) {

                                principal = '<option value=' + item.dia + '>' + item.dia + '</option>';



                            } else {
                                concatenar += '<option value=' + dias[index2] + '>' + dias[index2] + '</option>';
                            }

                        }

                        $("#horaInicioEditar").val(item.horaInicio);
                        $("#horaFinEditar").val(item.horaFinal);





                    }



                }

                $("#selectEHorario").html(principal + concatenar);

            }
        })


    })

    $("#buttonEditar").click(function() {
        $(".editarHorario").hide();

        var idHorario = $("#btnEditarHorario").attr("idEditar");
        var dia = $("#selectEHorario").val();
        var horaInicio = $("#horaInicioEditar").val();
        var horaFinal = $("#horaFinEditar").val();

        var objData = new FormData();
        objData.append("idE", idHorario);
        objData.append("diaE", dia);
        objData.append("horaInicioE", horaInicio);
        objData.append("horaFinEditar", horaFinal);

        $.ajax({
            url: "control/horarioControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (respuesta == "ok") {
                    var mensaje = $("#buscarIdCurso").val();

                    cargarHorario(mensaje);

                    Command: toastr["success"]("Registro modificado correctamente", "Succes")



                } else {

                    Command: toastr["error"](respuesta, "Succes")

                }

            }
        })





    })





    $("#eidHorario").click(function() {

        var idHorario = $(this).attr("idEliminar");

        Swal.fire({
            title: '¿Seguro?',
            text: "No se podran revertir los cambios ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                var objData = new FormData();
                objData.append("idEliminar", idHorario);

                $.ajax({
                    url: "control/horarioControl.php",
                    type: "post",
                    dataType: "json",
                    data: objData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta) {

                        if (respuesta == "ok") {
                            Command: toastr["success"]("Registro eliminado correctamente", "Succes")
                            var mensaje = $("#buscarIdCurso").val();

                            cargarHorario(mensaje);

                        }
                        else {
                            Command: toastr["error"]("No se pudo eliminar el registro", "Error")

                        }

                    }
                })





            }
        })



    });
    $



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

                var mensaje = $("#buscarIdCurso").val();


                if (respuesta != null) {

                    Command: toastr["info"](respuesta, "respuesta")
                    cargarHorario(mensaje);
                    limpiarCamposRegistras();
                }
            }
        })
    })

    function limpiarCamposRegistras() {
        $("#selectAsignaturasCarga").val("");
        $("#horaInicio").val("");
        $("#horaFin").val("");
    }

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
                    $("#selectEliminarHorarioCurso").html(concatenarCursoHorario);

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

    $("#selectEliminarHorarioCurso").on("change", function() {


        var idCurso = $("#selectEliminarHorarioCurso").val();
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

                $("#selectEliminarHorarioAsignatura").html(concatenar);



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