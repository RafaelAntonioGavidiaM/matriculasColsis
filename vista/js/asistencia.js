$(document).ready(function() {

    // Iniciar funciones


    //Inciializacion de variables 


    // listar asistencias

    function listarAsistencia(fechaBuscar) {

        var idCurso = $("#selectCurso").val();
        var idAsignatura = $("#selectAsignaturaAsistencia").val();
        var listaAsistencia = "ok";
        var objListaAsistencia = new FormData;
        objListaAsistencia.append("listaAsistencia", listaAsistencia);
        objListaAsistencia.append("idCurso", idCurso);
        objListaAsistencia.append("idAsignatura", idAsignatura);
        objListaAsistencia.append("fechaBuscar", fechaBuscar);




        $.ajax({

            url: "control/asistenciaControl.php",
            type: "post",
            dataType: "json",
            data: objListaAsistencia,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                alert("hola mundo");
                dataAsistencia = [];
                respuesta.forEach(cargarAsistencia)

                function cargarAsistencia(item, index) {

                    var objBotonesAsistencia = '<button type="button" class="btn btn-success" title="Asistio"  id="btnAsistioEstudiante" idAsistencia="' + item.idAsistencia + '"><span class="glyphicon glyphicon-pencil"></span></button>'
                    objBotonesAsistencia += '<button type="button" class="btn btn-danger" title ="Eliminar" id="btnFaltoEstudiante" idAsistencia="' + item.idAsistencia + '"><span class="glyphicon glyphicon-remove"></span></button>';

                    dataAsistencia.push([item.idEstudiante, item.nombres, item.apellidos, item.nombreCurso, item.nombreAsignatura, item.fechaHora, item.asistencia, objBotonesAsistencia])
                }

                $('#tablaAsistencia').DataTable({

                    data: dataAsistencia,

                    language: {
                        "decimal": "",
                        "emptyTable": "No data available in table",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Show _MENU_ entries",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encuentro registros con el criterio de busqueda",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                    }

                })

            }
        })
    }

    $("#btnCrearAsistencia").click(function() {




        //listarAsistencia();
        var idCurso = $("#selectCurso").val();
        var idAsignatura = $("#selectAsignaturaAsistencia").val();

        var objData = new FormData();

        objData.append("idCursoC", idCurso);
        objData.append("idAsignaturaC", idAsignatura);



        $.ajax({

            url: "control/asistenciaControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                try {
                    var fecha = respuesta[0];
                    var resultado = respuesta[1];

                    if (resultado == "ok") {


                        inicarTablaAsistencia();
                        listarAsistencia(fecha);
                        


                    }
                   

                } catch (error) {

                    alert("Problemas al realizar el registro");

                }
                





            }


        })



    })

    // funcion de carga asignaturas de Asistencia
    $("#btnCargarAsignaturas").click(function() {

        var idCurso = $("#selectCurso").val();
        var listaAsignatura = "ok";
        var objListarAsignatura = new FormData();
        objListarAsignatura.append("idCurso", idCurso)
        objListarAsignatura.append("listaAsignatura", listaAsignatura)

        $.ajax({

            url: "control/asistenciaControl.php",
            type: "post",
            dataType: "json",
            data: objListarAsignatura,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                $("#selectAsignaturaAsistencia").html("");
                respuesta.forEach(lisaAsignaturaAsistencia);

                function lisaAsignaturaAsistencia(item, index) {
                    // alert(item.idAsignatura);
                    // alert(item.nombreAsignatura);
                    $("#selectAsignaturaAsistencia").append('<option value=" ' + item.idAsignatura + '">' + item.nombreAsignatura + '</option>');


                }
                
            }
        })
    })




    function inicarTablaAsistencia(){

        var tabla = $("#tablaAsistencia").DataTable();
        tabla.destroy();


    }





})