$(document).ready(function() {

    cargarTabla();

    function cargarTabla() {

        var dataSet = [];

        var mensaje = "ok";
        var objData = new FormData();
        objData.append("mensaje", mensaje);




        $.ajax({
            url: "control/periodoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {


                var btns = "";

                respuesta.forEach(datos);

                function datos(item, index) {


                    var nombre = item.nombrePeriodo;
                    var fechaInicio = item.fechaInicio;
                    var fechaFin = item.fechaFin;

                    btns = '<button type="button" class="btn btn-info" id="btnEditar" nombre=' + item.nombrePeriodo + ' idPeriodo=' + item.idPeriodo + ' fechaI=' + item.fechaInicio + ' fechaF=' + item.fechaFin + '> Editar</button>';
                    btns += '<button type="button" class="btn btn-danger" id="btnEliminar" nombre=' + item.nombrePeriodo + ' idPeriodo=' + item.idPeriodo + ' fechaI=' + item.fechaInicio + ' fechaF=' + item.fechaFin + '> Eliminar</button> ';





                    dataSet.push([nombre, fechaInicio, fechaFin, btns]);






                }



                $("#tablaPeriodo").DataTable({
                    data: dataSet,
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









    $("#btnCperiodo").click(function() {

        var nombre = $("#nombrePeriodo").val();
        var fechaI = $("#fechaI").val();
        var fechaF = $("#fechaF").val();

        alert(nombre + " " + fechaI + " " + fechaF);

        var objData = new FormData();
        objData.append("nombreP", nombre);
        objData.append("fechaI", fechaI);
        objData.append("fechaF", fechaF);




        $.ajax({
            url: "control/periodoControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

            }


        })









    })

    $("#tablaPeriodo").on("click", "#btnEliminar", function() {
        alert("hola");

        var idEliminar = $(this).attr("idPeriodo");
        var objData = new FormData();
        objData.append("idEliminar", idEliminar);

        Swal.fire({
            title: '¿Seguro?',
            text: "No se podran revertir los cambios",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si,Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {


                $.ajax({
                    url: "control/periodoControl.php",
                    type: "post",
                    dataType: "json",
                    data: objData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta) {

                        if (respuesta == ok) {

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                        } else {

                            Command: toastr["error"](respuesta, "Error")
                        }


                    }
                })







            }
        })






    })





})