$(document).ready(function() {



    cargarGradosNota();


    function cargarGradosNota() {
        var mensaje = "ok";
        var objData = new FormData();
        objData.append("grados", mensaje);



        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var interface = "";

                respuesta.forEach(cargarSelectCurso);

                function cargarSelectCurso(item, index) {

                    interface += ' <option value=' + item.idCurso + '>' + item.nombreCurso + '</option>';
                }

                $("#grado").html(interface);









            }
        })






    }

    $("#Seleccion").click(function() {

        var idCurso = $("#grado").val();

        var mensaje = "ok";
        var objData = new FormData();

        objData.append("idCurso", idCurso);

        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var interface = "";

                respuesta.forEach(cargarSelectCurso);

                function cargarSelectCurso(item, index) {

                    interface += ' <option value=' + item.idAsignatura + '>' + item.nombreAsignatura + '</option>';
                }

                $("#Asignaturas").html(interface);









            }
        })





    })

    $("#btnCrearNota").click(function() {

        var devuelto = validarSaleccionMaterias();
        if (devuelto == 1) {
            $("#modalCrearN").modal('show');


        }


    })

    function validarSaleccionMaterias() {

        var valor = $("#Asignaturas").val();
        var opcion = 0;




        if (valor == null || valor == 0) {
            Swal.fire({
                title: 'Seleccione Curso',
                text: "",
                icon: 'warning',
                showCancelButton: true,

            })
            opcion = 0;


        } else {
            opcion = 1;


        }

        // alert("Este es el valor " + valor);

        return opcion;

    }


    $("#GuardarNota").click(function() {
        var nombreNota = $("#nombreNota").val();
        var visibilidad = $("#habilitacion").val();
        var asignatura = $("#Asignaturas").val();
        var idCurso = $("#grado").val();

        var objData = new FormData();
        objData.append("nombreNota", nombreNota);
        objData.append("visibilidad", visibilidad);
        objData.append("asignatura", asignatura);
        objData.append("idCursoR", idCurso);

        $.ajax({
            url: "control/notaControles.php",
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


    $("#Asignaturas").change(function() {

        destruirTabla();

        var dataSet = [];

        var idAsignaturaCurso = $(this).val();
        var idCurso = $("#grado").val();

        var objData = new FormData();

        objData.append("cAsignatura", idAsignaturaCurso);
        objData.append("cGrado", idCurso);

        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,

            cache: false,

            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (respuesta != null) {
                    console.log(respuesta);
                    cargarCabeceraTabla();


                    respuesta.forEach(cargarDatosTabla);

                    function cargarDatosTabla(item, index) {


                        dataSet.push([item.Nombre, item.ANIMALES, item.PERROS]);
                        console.log(dataSet);





                    }









                    $("#tablaNota").DataTable({
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





















            }





        })



    })

    function cargarCabeceraTabla() {

        var idAsignaturaCurso = $("#Asignaturas").val();
        var idCurso = $("#grado").val();

        var objData = new FormData();

        objData.append("MAsignatura", idAsignaturaCurso);
        objData.append("MGrado", idCurso);






        // objData.append("cargarNombreNotas", mensaje);
        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (respuesta != null) {

                    var concatenar = "";
                    var contador = 0;

                    // console.log(respuesta);

                    respuesta.forEach(cargarCabecera);

                    function cargarCabecera(item, index) {

                        if (contador == 0) {
                            concatenar += '<th>' + 'Nombre Estudiante' + '</th>';
                            concatenar += '<th>' + item.nombreNota + '</th>';

                        } else {
                            concatenar += '<th>' + item.nombreNota + '</th>';


                        }

                        contador++;






                    }



                    $("#cabeceraNota").html(concatenar);



                }




            }
        })




    }

    function destruirTabla() {
        tabla = $("#tablaRol").DataTable();
        tabla.destroy();
    }











})