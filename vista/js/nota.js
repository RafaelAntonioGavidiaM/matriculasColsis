$(document).ready(function() {
    $("#contenido").hide();



    cargarGradosNota();

    ///Carga Cursos Para Ser Seleccionados

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

    ///Selecciona Asignatura

    $("#Seleccion").click(function() {

            $("#contenido").show();

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
        /// Abre Modal de Crear Nota

    $("#btnCrearNota").click(function() {


        var devuelto = validarSaleccionMaterias();
        if (devuelto == 1) {
            $("#modalCrearN").modal('show');


        }


    })

    ////Valida que haya seleccionado una materia

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


    ///Valida y Abre Modal de Modificar Nota 


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

    ///Eliminar Nota : Selecciona una nota y despues elige si desea eliminarla. Esto afectara registros en nota y asignaturanota.

    $("#btnEliminarNota").click(function() {

        var devuelto = validarSaleccionMaterias();
        if (devuelto == 1) {

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

                    var concatenar = "<option value='enserio'>Seleccione una nota a eliminar</option>";

                    respuesta.forEach(cargarNotasAEliminar);

                    function cargarNotasAEliminar(item, index) {

                        concatenar += '<option value=' + item.idNota + '>' + item.nombreNota + '</option>';

                    }


                    $("#notaAeliminar").html(concatenar);


                }


            })


            Swal.fire({
                title: '¿Esta Seguro?',
                text: "Los datos se podran recuperar!",

                icon: 'warning',
                html: '<select id="notaAeliminar"></select>',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Quiero Eliminarla!'
            }).then((result) => {
                if (result.isConfirmed) {

                    var idNotaEliminar = $("#notaAeliminar").val();

                    //alert(idNotaEliminar);

                    if (idNotaEliminar == "enserio") {

                        Command: toastr["error"]("Debe Seleccionar una Nota", "Error")
                    }
                    else {

                        var objData2 = new FormData();
                        objData2.append("idNotaEliminar", idNotaEliminar);

                        $.ajax({
                            url: "control/notaControles.php",
                            type: "post",
                            dataType: "json",
                            data: objData2,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(respuesta) {

                                if (respuesta == "ok") {
                                    Swal.fire(
                                        'Eliminada!',
                                        'Se ha eliminado nota y sus registros.',
                                        'success'
                                    )
                                    cargarTablaToda();
                                } else {

                                    Command: toastr["error"](respuesta, "Error")


                                }


                            }

                        })







                    }






                }
            })


        }


    })














    //Si el select de modificar Nota cambia se asignan datos a las variables segun los attr

    $("#SelectnombreNotas").change(function() {
        $("#mEstadoNota").html("");
        var estado = $("#SelectnombreNotas").find(':selected').attr("estado");
        var nombre = $("#SelectnombreNotas").find(':selected').attr("nombreNota");
        // alert(estado);
        validarEstado(estado);

        $("#inpNombreNota").val(nombre);

        function validarEstado(estadoNota) {
            if (estadoNota == 1) {
                $("#mEstadoNota").append('<option value=1>Habilitado</option>');
                $("#mEstadoNota").append('<option value=0>Desabilitado</option>');



            } else if (estadoNota == 0) {
                $("#mEstadoNota").append('<option value=0>Desabilitado</option>');
                $("#mEstadoNota").append('<option value=1>Habilitado</option>');

            }



        }










    })

    ///Modifica los campos de la nota en la bd Tabla Nota

    $("#modificarNota").click(function() {

        var nombre = $("#inpNombreNota").val();
        var estado = $("#mEstadoNota").val();
        var idNota = $("#SelectnombreNotas").val();

        alert(nombre + " " + estado + " " + idNota);

        var objData = new FormData();
        objData.append("mnombreNota", nombre);
        objData.append("mestado", estado);
        objData.append("midNota", idNota);

        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,
            contentType: false,
            processData: false,
            cache: false,
            success: function(respuesta) {

                if (respuesta == "ok") {
                    Command: toastr["success"]("Cambio realizado correctamente", "Success ")

                        toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }


                        cargarTablaToda();
                    limpiarCampos();

                    function limpiarCampos() {
                        $("#inpNombreNota").val(" ");
                        $("#mEstadoNota").html("");


                    }


                }



            }


        })


    })





    ///Creacion de Notas 



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
                cargarTablaToda();










            }
        })














    })

    //Si la asigntura cambia se recarga la tabla



    $("#Asignaturas").change(function() {


        cargarTablaToda();







    })

    ///Funcion que recarga la tabla segun curso y asignatura 

    function cargarTablaToda() {
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

                // alert(respuesta);
                //console.log(respuesta);

                if (respuesta != null && respuesta != "No se ha realizado la creacion del periodo" && respuesta != "No hay notas") {
                    $("#contenedorTabla").hide();








                    cargarCabeceraTabla(respuesta);

















                } else {
                    alert(respuesta);

                    $("#contenedorTabla").show();

                    $("#cabecera").empty();
                    $("#cuerpoTabla").empty();
                    $("#contenedorTabla").css("witdh", "20px");
                    $("#contenedorTabla").css("height", "100px");
                    $("#contenedorTabla").css("background-color", "white");
                    $("#contenedorTabla").html(respuesta);
                }





















            }





        })

    }

    ///Solo carga la cabecera de la tabla, Esto debido a una consulta organizada


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
                console.log(respuesta);

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




    ///cargar las notas segun estudiante , para ser modificadas una por una . 



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

    //Si los inputs de las notas cambian los datos se cargaran a la base de datos 


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
                    Command: toastr["info"]("Cambio realizado correctamente", "Success ")



                        cargarTablaToda();
                }
                else if (respuesta == "Error") {
                    Command: toastr["error"]("No se pudo actualizar el valor", "Error")

                        toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }



            }
        })




    })




    ///ESTA FUNCION ESTA INABILITADA 


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