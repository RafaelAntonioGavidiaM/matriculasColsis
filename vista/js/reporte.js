$(document).ready(function () {
    cargarComboPeriodo(1);
    cargarComboGrado(1);
    iniciarTabla();
    $("#tablaReportes").hide();

    function cargarComboPeriodo(opcion, principal) {
        var cargarPeriodo = "ok";
        var objCargarPeriodo = new FormData();
        objCargarPeriodo.append("cargarPeriodo", cargarPeriodo);
        $.ajax({
            url: "control/reporteControl.php",
            type: "post",
            dataType: "json",
            data: objCargarPeriodo,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (opcion == 1) {
                    $("#selectPeriodo").html("");
                } else {
                    $("#selectPeriodo").html("");
                    $("#selectPeriodo").append(principal);
                }

                respuesta.forEach(listarRegSelect);

                function listarRegSelect(item, index) {
                    if (opcion == 1) {
                        $("#selectPeriodo").append('<option value="' + item.idPeriodo + '">' + item.nombrePeriodo + '</option>');
                    } else {
                        if (item.idRol != id) {
                            $("#selectPeriodo").append('<option value="' + item.idPeriodo + '">' + item.nombrePeriodo + '</option>');
                        }
                    }
                }
            }
        })
    }
    function cargarComboGrado(opcion, principal) {
        var cargarGrado = "ok";
        var objCargarGrado = new FormData();
        objCargarGrado.append("cargarGrado", cargarGrado);
        $.ajax({
            url: "control/reporteControl.php",
            type: "post",
            dataType: "json",
            data: objCargarGrado,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (opcion == 1) {
                    $("#selectGrado").html("");
                } else {
                    $("#selectGrado").html("");
                    $("#selectGrado").append(principal);
                }

                respuesta.forEach(listarRegSelect);

                function listarRegSelect(item, index) {
                    if (opcion == 1) {
                        $("#selectGrado").append('<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>');
                    } else {
                        if (item.idRol != id) {
                            $("#selectGrado").append('<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>');
                        }
                    }
                }
            }
        })
    }
    $("#btnFiltrar").click(function () {
        $("#seleccionarReporte").hide();
        $("#tablaReportes").fadeIn();

        iniciarTabla();

        var idCurso = document.getElementById("selectGrado").value;

        var objData = new FormData();
        objData.append("filtroGrado", idCurso);
        $.ajax({
            url: "control/reporteControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                var dataSet = [];
                var contadorFilas = 0;
                respuesta.forEach(cargarListaReporte);

                function cargarListaReporte(item, index) {
                    contadorFilas += 1;

                    var objBotones = '<button id="btnCrearPdf" type="button" class="btn btn-success" title="PDF" idEstudiante="' + item.idEstudiante + '"><span class="glyphicon glyphicon-file"></span></button>';

                    dataSet.push([contadorFilas, item.nombres, item.apellidos, item.nombre + " " + item.apellido, item.nombreCurso, objBotones])
                }

                $('#tablaReportes').DataTable({
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
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                        'colvis'
                    ],
                    "scrollX": true,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "info": "Mostrando de _START_ a _END_ de _TOTAL_ de registros",
                        "infoEmpty": "Mostrando 0 a 0 of de registros",
                        "infoFiltered": "(Filtrado de _MAX_ total registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activar para ordenar la columna ascendente",
                            "sortDescending": ": activar para ordenar la columna descendente"
                        }
                    }
                });

            }
        });
    });

    function iniciarTabla() {

        var tabla = $("#tablaReportes").DataTable();
        tabla.destroy();

    }
    $("#tablaReportes").on("click", "#btnCrearPdf", function () {

        var idEstudiante = $(this).attr("idEstudiante");
        alert(idEstudiante);
        window.open("vista/modulos/informes/estudianteInformeP1.php?idEstudiante=" + idEstudiante, "_blank");

    })

});