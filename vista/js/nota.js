$(document).ready(function() {



    cargarGradosNota();


    function cargarGradosNota() {
        var mensaje = "ok";
        var objData = new FormData();
        objData.append("grados", mensaje);


        alert("hola");
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








    })







})