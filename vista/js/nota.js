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
                    // console.log(respuesta);
                    // var hola = cargarCabeceraTabla(respuesta);
                    //console.log(hola);




                    cargarCabeceraTabla(respuesta);

















                }





















            }





        })



    })

    function cargarCabeceraTabla(respuestaDatos) {

        var cabecera = [];

        dataSet = [];

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

                    console.log(respuesta);









                    respuestaDatos.forEach(cargarDatosTabla);



                    function cargarDatosTabla(item, index) {
                        var concatenar2 = [];


                        concatenar2[concatenar2.length] = item.Nombre;

                        var contador = 5;





                        for (let index2 = 0; index2 < respuesta.length; index2++) {
                            var variable = Object;
                            variable.nombreNota = respuesta[index2][0];

                            alert(variable);

                            //concatenar2.push(respuestaDatos[index][contador]);

                            concatenar2[concatenar2.length] = respuestaDatos[index][contador];

                            contador++;


                        }

                        dataSet.push(
                            [concatenar2],
                        );

                        console.log(dataSet);



















                    }












                    var concatenar = "";
                    var cadena = "";
                    var contador = 0;

                    // console.log(respuesta);

                    respuesta.forEach(cargarCabecera);

                    function cargarCabecera(item, index) {

                        if (contador == 0) {


                            concatenar += 'Nombre Estudiante';
                            cabecera.push({ title: concatenar });
                            cadena += '{ title: "Nombre Estudiante" },';
                            concatenar = item.nombreNota;
                            cadena += '{ title: "' + item.nombreNota + '" },';

                        } else {
                            concatenar = item.nombreNota;
                            cadena += '{ title: "' + item.nombreNota + '" },';


                        }

                        contador++;


                        cabecera.push({ title: concatenar });





                    }

                    console.log(cabecera);
                    alert(cadena);





                    // $("#cabeceraNota").html(concatenar);

                    $("#tablaNota").DataTable({
                        data: dataSet,

                        // dom: 'Bfrtip',
                        columns: cabecera,



                    });




                }




            }
        })




    }

    function destruirTabla() {
        tabla = $("#tablaRol").DataTable();
        tabla.destroy();
    }











})