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

        // destruirTabla();

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
                    // console.log(respuesta);
                    // var hola = cargarCabeceraTabla(respuesta);
                    //console.log(hola);




                    cargarCabeceraTabla(respuesta);

















                }





















            }





        })



    })

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
                            cuerpo += parseFloat(respuestaDatos[index][contador]);

                            cuerpo += '</td>';







                            contador++;

                        }

                        cuerpo += '<td>';
                        var nombreTotal = item.Nombre + " " + item.Apellidos;
                        cuerpo += '<button type="button" class="btn btn-info" id="btnEditarNota" nombreEstudiante=' + nombreTotal + ' idEstudiante=' + item.cod_Estudiante + ' data-toggle="modal" data-target="#editarNota" ><span class="glyphicon glyphicon-pencil"></span></button>';

                        cuerpo += '</td>';


                        cuerpo += '</tr>';





                    }
                    alert(cuerpo);

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
        alert(idAsignaturaNota + " " + valorNota);
        var objData = new FormData();
        objData.append("idAsignaturaNotaCambiar", idAsignaturaNota);
        objData.append("notaCambiar", valorNota);

        $.ajax({
            url: "control/controlesnota.php",
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