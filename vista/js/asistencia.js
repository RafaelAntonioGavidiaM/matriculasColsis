$(document).ready(function () {

    // Iniciar funciones


    //Inciializacion de variables 

var contadorVeces=0;
    // listar asistencias

 
 


    function listarAsistencia(fechaBuscar) {
        if(contadorVeces!=0){
            inicarTablaAsistencia();

        }
      var  dataAsistencia = [];
        

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
            success: function (respuesta) {
               
                var cargarSelsct="";
              
                respuesta.forEach(cargarAsistencia)

                function cargarAsistencia(item, index) {

                    var selectAsistencia =    ' <select  id="asistenciaSelect" class="form-control" idAsistencia='+item.idAsistencia+' fechaHora=' + item.fechaHora + '>';
                    if(item.asistencia=='Falto'){
                         selectAsistencia +='<option value="Falto">Falto</option>';
                         selectAsistencia +='<option value="Asistio">Asistio</option>';
                        
                        
                    }else{
                        selectAsistencia +='<option value="Asistio">Asistio</option>';
                        selectAsistencia +='<option value="Falto">Falto</option>';

                    }
                    selectAsistencia +='</select>';
                
                    

                    // var objBotonesAsistencia = '<button type="button" class="btn btn-success" title="Asistio"  id="btnAsistioEstudiante" idAsistencia="' + item.idAsistencia + '"><span class="glyphicon glyphicon-ok"></span></button>'
                    // objBotonesAsistencia += '<button type="button" class="btn btn-danger" title ="Eliminar" id="btnFaltoEstudiante" idAsistencia="' + item.idAsistencia + '"><span class="glyphicon glyphicon-remove"></span></button>';

                    dataAsistencia.push([ item.nombres, item.apellidos, item.nombreCurso, item.nombreAsignatura, item.fechaHora, selectAsistencia ])
                }

                console.log(dataAsistencia);

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

        contadorVeces++;
    }

    $("#btnCrearAsistencia").click(function () {
       

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
            success: function (respuesta) {

              
                    var fecha = respuesta[0];
                    var resultado = respuesta[1];

                    if (resultado == "ok") {
                       


                       

                        listarAsistencia(fecha);



                    }


                






            }


        })



    })

    // funcion de carga asignaturas de Asistencia
    $("#btnCargarAsignaturas").click(function () {

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
            success: function (respuesta) {

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

    $("#btnBuscarCargarAsignaturas").click(function () {

        var idCurso = $("#selectCurso").val();
        var listaAsignatura = "ok";
        var objListarAsignatura = new FormData();
        objListarAsignatura.append("idBuscarCurso", idCurso)
        objListarAsignatura.append("buscarListaAsignatura", listaAsignatura)

        $.ajax({

            url: "control/asistenciaControl.php",
            type: "post",
            dataType: "json",
            data: objListarAsignatura,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                $("#selectBuscarAsignatura").html("");
                respuesta.forEach(lisaAsignaturaAsistencia);

                function lisaAsignaturaAsistencia(item, index) {
                  

                    $("#selectBuscarAsignatura").append('<option value=" ' + item.idAsignatura + '">' + item.nombreAsignatura + '</option>');


                }

            }
        })
    })

    $("#btnCargarFechasAsignaturas").click(function () {

        var idCurso = $("#cursoSelect").val();
        var idAsignatura = $("#selectBuscarAsignatura").val();
        var listaFecha = "ok";
        var objListarFecha = new FormData();
        objListarFecha.append("idBuscarCurso", idCurso);
        objListarFecha.append("idBuscarAsignatura", idAsignatura);
        objListarFecha.append("listaFecha", listaFecha);

        $.ajax({

            url: "control/asistenciaControl.php",
            type: "post",
            dataType: "json",
            data: objListarFecha,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                $("#selectFecha").html("");
                respuesta.forEach(lisaFechaAsistencia);

                function lisaFechaAsistencia(item, index) {
                  
                    $("#selectFecha").append('<option value=" ' + item.idAsistencia + '">' + item.fechaHora + '</option>');
                    alert(item.idAsistencia );
                    alert(item.fechaHora);

                }

            }
        })
    })



    function inicarTablaAsistencia() {

        var tabla = $("#tablaAsistencia").DataTable();
        tabla.destroy();


    }

    // Modificar Asistecia


    $("#tablaAsistencia").on("change", "#asistenciaSelect", function () {

        var fechaHora = $(this).attr("fechaHora");
        var idAsistencia = $(this).attr("idAsistencia");
        var valorAsistencia = $(this).val();
        var objData = new FormData();
        objData.append("idModAsistencia", idAsistencia)
        objData.append("valorAsistencia", valorAsistencia)

        $.ajax({

            url: "control/asistenciaControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                if (respuesta == "Asistio") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Asistio',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                }else{

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Falto',
                        showConfirmButton: false,
                        timer: 1500,
                    })

                }
                
            
                

                
                listarAsistencia(fechaHora);
            }


        })




    })





})