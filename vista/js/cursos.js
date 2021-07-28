$(document).ready(function() {

    /*--------------------------------------------------------------------------------------------------------*/
    /*--------------------------------------------CARGAR DATOS CURSOS-----------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    cargarDatos();
    $("#btnCrearCursos").click(function() {
        alert("HolaMundo");
        var curso = $("#txtCurso").val();
        var nombreCurso = $("#txtNombreCurso").val();
        var año = $("#txtAño").val();
        var docente = $("#docenteSelect").val();
        var objData = new FormData();

        objData.append("curso", curso);
        objData.append("nombreCurso", nombreCurso);
        objData.append("año", año);
        objData.append("docente", docente);

        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })
                cargarDatos();
            }
        })
    })


    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------LISTAR DATOS CURSOS-------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    function cargarDatos() {
        var listaCursos = "ok";
        var objListaCursos = new FormData();
        objListaCursos.append("listaCursos", listaCursos);

        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objListaCursos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var interface = '';
                respuesta.forEach(cargarTablaCursos);

                function cargarTablaCursos(item, index) {
                    interface += '<tr>';

                    interface += '<td>' + item.curso + '</td>';
                    interface += '<td>' + item.nombreCurso + '</td>';
                    interface += '<td>' + item.año + '</td>';
                    interface += '<td>' + item.docente + '</td>';
                    interface += '<td>';
                    interface += '<div class="btn-group">';
                    interface += '<button type="button" class="btn btn-warning" title="Editar" id="btn-editarCursos" idCurso="' + item.idCurso + '"  curso="' + item.curso + '" nombreCurso="' + item.nombreCurso + '" año="' + item.año + '" docente="' + item.idDocente + '" data-toggle="modal" data-target="#mdCursosModificar"><span class="glyphicon glyphicon-pencil"></span></button>';
                    interface += '<button type="button" class="btn btn-danger" title="Eliminar" id="btn-eliminarCursos"><span class="glyphicon glyphicon-trash"></span></button>';
                    interface += '</div>';
                    interface += '</td>';
                    interface += '</tr>';
                }

                $("#tbodyCursos").html(interface);
            }
        })
    }

    /*--------------------------------------------------------------------------------------------------------*/
    /*------------------------------------------CARGAR DATOS MODAL--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#btnModCursos").click(function() {
        var curso = $("#txtModCurso").val();
        var nombreCurso = $("#txtModNombreCurso").val();
        var año = $("#txtModAño").val();
        var docente = $("#modDocenteSelect").val();

        objData.append("ModCurso", curso);
        objData.append("ModNombreCurso", nombreCurso);
        objData.append("ModAño", año);
        objData.append("modDocenteSelect", docente);
        $.ajax({
            url: "control/cursosControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })
                cargarDatos();

            }
        })
    })


    /*--------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------EDITAR DATOS CURSOS--------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#tablaCursos").on("click", "#btn-editarCursos", function() {


        var idCurso = $(this).attr("idCurso");
        var curso = $(this).attr("modelo");
        var nombreCurso = $(this).attr("nombreCurso");
        var año = $(this).attr("año");
        var docente = $(this).attr("docente");

        $("#txtModModelo").val(curso);
        $("#txtModColor").val(nombreCurso);
        $("#txtModPlaca").val(año);
        $("#btnModCarro").attr("idCarro", idCurso);

    })

    /*--------------------------------------------------------------------------------------------------------*/
    /*---------------------------------------------ELIMINAR DATOS---------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------*/

    $("#tablaCursos").on("click", "#btn-eliminarCursos", function() {

        Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, !Eliminalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                var idCurso = $(this).attr("idCurso");


                var objData = new FormData();
                objData.append("eliminarCursosId", idCurso);


                $.ajax({
                    url: "control/cursosControl.php",
                    type: "post",
                    dataType: "json",
                    data: objData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                        if (respuesta == "ok") {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                            cargarDatos();
                        }
                    }
                })
            }
        })
    })



})