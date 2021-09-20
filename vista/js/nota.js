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

        var principalSELCET = ' <option value="novalido" >Seleccione Asignatura</option>';

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


                $("#Asignaturas").html(principalSELCET + interface);









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




        if (valor == null || valor == 0 || valor == "novalido") {
            Swal.fire({
                title: 'Seleccione Asignatura',
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


    $("#btnCrearModificar").click(function() {
        var devuelto = validarSaleccionMaterias();
        if (devuelto == 1) {
            $("#modificarNotas").modal('show');

            var idAsignatura = $("#Asignaturas").val();
            var idCurso = $("#grado").val();
            objData = new FormData();
            objData.append("consultarNotasAsignatura", idAsignatura);
            objData.append("consultarNotasidCurso", idCurso);

            $.ajax({
                url: "control/notaControles.php",
                type: "post",
                dataType: "json",
                data: objData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    var concatenar = "";

                    respuesta.forEach(cargarSelectModificar);

                    function cargarSelectModificar(item, index) {

                        concatenar += '<option value=' + item.idNota + '   estado=' + item.estadoNota + ' nombreNota=' + item.nombreNota + '> ' + item.nombreNota + '</option>';


                    }

                    $("#SelectnombreNotas").html(concatenar);


                }
            })


        }


    })

    $("#SelectnombreNotas").change(function() {
        $("#mEstadoNota").html("");
        var estado = $("#SelectnombreNotas").find(':selected').attr("estado");
        var nombre = $("#SelectnombreNotas").find(':selected').attr("nombreNota");
        alert(estado);

        $("#inpNombreNota").val(nombre);

        if (estado = 1) {
            $("#mEstadoNota").append('<option value=1>Habilitado</option>');
            $("#mEstadoNota").append('<option value=2>Desabilitado</option>');



        } else if (estado = 0) {
            $("#mEstadoNota").append('<option value=2>Desabilitado</option>');
            $("#mEstadoNota").append('<option value=1>Habilitado</option>');

        }








    })





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


        cargarTablaToda();







    })

    function cargarTablaToda(idAsignaturaCurso) {
        var idAsignaturaCurso = $("#Asignaturas").val();


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





                    cargarCabeceraTabla(respuesta);

















                }





















            }





        })

    }


    function cargarCabeceraTabla(respuestaDatos) {
        // destruirTabla();

        var cabecera = [];
        var concatenar2 = "";

        data = [];

        var idAsignaturaCurso = $("#Asignaturas").val();
        var idCurso = $("#grado").val();

        var objData = new FormData();

        objData.append("MAsignatura", idAsignaturaCurso);
        objData.append("MGrado", idCurso);
        var resultado;






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

                    var contadorCiclos = 1;
                    console.log(respuesta);


                    var concatenar = "";
                    var cadena = "";
                    var contador = 0;
                    var encabezadoTabla = "";

                    // console.log(respuesta);

                    var ciclosRespuesta = respuesta.length - 1;
                    //alert(ciclosRespuesta)

                    respuesta.forEach(cargarCabecera);


                    function cargarCabecera(item, index) {
                        // alert(contador);

                        if (contador == 0) {


                            encabezadoTabla += '<td>';





                            concatenar += 'Nombre Estudiante';
                            encabezadoTabla += 'Nombre Estudiante';
                            encabezadoTabla += '</td>';
                            cabecera.push({ data: concatenar });


                            concatenar = item.nombreNota;
                            encabezadoTabla += '<td>';
                            encabezadoTabla += item.nombreNota;
                            encabezadoTabla += '</td>';


                        } else {
                            encabezadoTabla += '<td>';
                            encabezadoTabla += item.nombreNota;



                            concatenar = item.nombreNota;



                        }


                        contador++;


                        cabecera.push({ data: concatenar });






                    }
                    encabezadoTabla += '<td>';
                    encabezadoTabla += 'Editar Notas';
                    encabezadoTabla += '</td>';


                    $("#cabecera").html(encabezadoTabla);








                    var cuerpo = ""; // este es el cuerpo de la tabla

                    respuestaDatos.forEach(cargarDatosTabla);



                    function cargarDatosTabla(item, index) {

                        var prueba = {};

                        cuerpo += '<tr>';
                        cuerpo += '<td>';

                        cuerpo += item.Nombre + item.Apellidos;



                        prueba["Nombre Estudiante"] = item.Nombre + item.Apellidos;
                        cuerpo += '</td>';



                        contador = 6;

                        for (let index2 = 0; index2 < respuesta.length; index2++) {


                            cuerpo += '<td>';
                            // Number.parseFloat(x).toFixed(2);
                            cuerpo += Number.parseFloat(respuestaDatos[index][contador]).toFixed(1);

                            cuerpo += '</td>';







                            contador++;

                        }

                        cuerpo += '<td>';
                        var nombreTotal = item.Nombre + " " + item.Apellidos;
                        cuerpo += '<button type="button" class="btn btn-info" id="btnEditarNota" nombreEstudiante=' + nombreTotal + ' idEstudiante=' + item.cod_Estudiante + ' data-toggle="modal" data-target="#editarNota" ><span class="glyphicon glyphicon-pencil"></span></button>';

                        cuerpo += '</td>';


                        cuerpo += '</tr>';





                    }
                    // alert(cuerpo);

                    $("#cuerpoTabla").html(cuerpo);


































                }




            }
        })




    }






    $("#tablaNota").on("click", "#btnEditarNota", function() {
        var nombreEstudiante = $(this).attr("nombreEstudiante");
        $("#tituloModal").html(nombreEstudiante);
        var idEstudiante = $(this).attr("idEstudiante");
        var idCurso = $("#grado").val();
        var asignatura = $("#Asignaturas").val();

        var objData = new FormData();
        objData.append("cidEstudiante", idEstudiante);
        objData.append("cidCurso", idCurso);
        objData.append("casignatura", asignatura);

        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,

            contentType: false,
            processData: false,

            success: function(respuesta) {

                console.log(respuesta);

                var concatenar = "";


                respuesta.forEach(cargarDatos);

                function cargarDatos(item, index) {

                    concatenar += '<div class="form-group"> <label>' + item.nombreNota + '  ' + ' </label><input type="text" value=' + item.nota + ' idAsignatura=' + item.idAsignaturaNota + ' id="nota" ></div> <br> ';

                }

                // alert(concatenar);

                $("#contenedorNotas").html(concatenar);



            }

        })


    })

    $("#contenedorNotas").on("change", "#nota", function() {

        var idAsignaturaNota = $(this).attr("idAsignatura");
        var valorNota = $(this).val();
        //alert(idAsignaturaNota + " " + valorNota);
        var objData = new FormData();
        objData.append("idAsignaturaNotaCambiar", idAsignaturaNota);
        objData.append("notaCambiar", valorNota);

        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(respuesta) {
                if (respuesta == "ok") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Se realizo el cambio de nota',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    cargarTablaToda();
                } else if (respuesta == "Error") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Lo lamentamos no fue posible realizar el cambio',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }



            }
        })




    })





    function destruirTabla() {


        var table = $('"#tablaNota"').DataTable({
            paging: false
        });

        table.remove();

        table = $('"#tablaNota"').DataTable({
            searching: false
        });
    }











})