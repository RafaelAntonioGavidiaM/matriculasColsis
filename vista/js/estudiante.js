$(document).ready(function () {

    cargarEstudiantes();
    cargarAcudiente();
    cargarComboCurso();

    $("#btnRegEstudiante").show();
    $("#btnModEstudiante").hide();

    //cargar Acudiente en el combo
    function cargarAcudiente() {
        var cargarAcudiente = "ok";
        var objcargarAcudiente = new FormData();
        objcargarAcudiente.append("cargarAcudiente", cargarAcudiente);
        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objcargarAcudiente,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                $("#selectAcudiente").html("");
                respuesta.forEach(cargarSelectAcudientes);

                function cargarSelectAcudientes(item, index) {
                    $("#selectAcudiente").append('<option value="' + item.idAcudiente + '">' + item.nombre + '</option>');
                }

            }
        })
    }

    //cargar Curso en el combo
    function cargarComboCurso() {
        var cargarCurso = "ok";
        var objCargarCurso = new FormData();
        objCargarCurso.append("cargarCurso", cargarCurso);
        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objCargarCurso,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                $("#selectCurso").html("");
                respuesta.forEach(cargarSelectCurso);

                function cargarSelectCurso(item, index) {
                    $("#selectCurso").append('<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>');
                }

            }
        })
    }

    //Regristrar estudiante

    $("#btnRegEstudiante").click(function () {

        var nombre = $("#txtNombre").val();
        var apellido = $("#txtApellido").val();
        var documento = $("#txtDocumento").val();
        var tipoDocumento = $("#selectTD").val();
        var fechaNacimiento = $("#dateNacimiento").val();
        var tipoSangre = $("#selectTS").val();
        var seguroEstudiantil = $("#txtSeguroE").val();
        var telefono = $("#txtTelefono").val();
        var idAcudiente = document.getElementById("selectAcudiente").value;
        var idCurso = document.getElementById("selectCurso").value;

        var objData = new FormData();
        objData.append("nombre", nombre);
        objData.append("apellido", apellido);
        objData.append("documento", documento);
        objData.append("tipoDocumento", tipoDocumento);
        objData.append("fechaNacimiento", fechaNacimiento);
        objData.append("tipoSangre", tipoSangre);
        objData.append("seguroEstudiantil", seguroEstudiantil);
        objData.append("telefono", telefono);
        objData.append("acudiente", idAcudiente);
        objData.append("curso", idCurso);

        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta == "ok") {
                    swal({
                        title: "Buen Trabajo!",
                        text: "Estudiante registrado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    cargarEstudiantes();
                } else {
                    swal({
                        title: "Error!",
                        text: respuesta,
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            }
        })

    })

    //listar Estudiante

    function cargarEstudiantes() {
        var cargarEstudiante = "ok";
        var objData = new FormData();
        objData.append("cargarEstudiante", cargarEstudiante);
        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                var interface = '';
                var contadorFilas = 0;
                respuesta.forEach(cargarListaEstudiantes);

                function cargarListaEstudiantes(item, index) {
                    contadorFilas += 1;
                    interface += '<tr>';
                    interface += '<td>' + contadorFilas + '</td>';
                    interface += '<td>' + item.nombres + '</td>';
                    interface += '<td>' + item.apellidos + '</td>';
                    interface += '<td>' + item.documento + '</td>';
                    interface += '<td>' + item.tipoDocumento + '</td>';
                    interface += '<td>' + item.fechaNacimiento + '</td>';
                    interface += '<td>' + item.tipoSangre + '</td>';
                    interface += '<td>' + item.seguroEstudiantil + '</td>';
                    interface += '<td>' + item.telefono + '</td>';
                    interface += '<td>' + item.idAcudiente + '</td>';
                    interface += '<td>' + item.idCurso + '</td>';
                    interface += '<td>';

                    interface += '<div class="btn-group">';
                    interface += '<button id="btnEditarEstudiante" type="button" class="btn btn-warning" title="editar" idEstudiante="' + item.idEstudiante + '" nombres="' + item.nombres + '" apellidos="' + item.apellidos + '" documento="' + item.documento + '" tipoDocumento="' + item.tipoDocumento + '" fechaNacimiento="' + item.fechaNacimiento + '"  tipoSangre="' + item.tipoSangre + '" seguroEstudiantil="' + item.seguroEstudiantil + '" telefono="' + item.telefono + '" idAcudiente="' + item.idAcudiente + '" idCurso="' + item.idCurso + '"><span style="width:5px; height:5px; padding:0px;" class="glyphicon glyphicon-pencil"></span></button>';
                    interface += '<button id="btnEliminarEstudiante" type="button" class="btn btn-danger" title="eliminar" idEstudiante="' + item.idEstudiante + '"><span style="width:5px; height:5px; padding:0px;" class="glyphicon glyphicon-remove"></span></button>';
                    interface += '</div>';
                    interface += '</td>';
                    interface += '</tr>';
                }

                $("#bodyEstudiantes").html(interface);

            }
        })
    }

    $("#tablaEstudiantes").on("click", "#btnEditarEstudiante", function () {

        $("#btnModEstudiante").show();

        var nombres = $(this).attr("nombres");
        var apellidos = $(this).attr("apellidos");
        var documento = $(this).attr("documento");
        var tipoDocumento = $(this).attr("tipoDocumento");
        var fechaNacimiento = $(this).attr("fechaNacimiento");
        var tipoSangre = $(this).attr("tipoSangre");
        var seguroEstudiantil = $(this).attr("seguroEstudiantil");
        var telefono = $(this).attr("telefono");
        var idAcudiente = $(this).attr("idAcudiente");
        var idCurso = $(this).attr("idCurso");
        var idEstudiante = $(this).attr("idEstudiante");

        $("#txtNombre").val(nombres);
        $("#txtApellido").val(apellidos);
        $("#txtDocumento").val(documento);
        $("#selectTD").val(tipoDocumento);
        $("#dateNacimiento").val(fechaNacimiento);
        $("#selectTS").val(tipoSangre);
        $("#txtSeguroE").val(seguroEstudiantil);
        $("#txtTelefono").val(telefono);
        $("#selectAcudiente").attr(idAcudiente);
        $("#selectCurso").attr(idCurso);
        $("#btnModEstudiante").attr("estudiante", idEstudiante);

        $("#btnRegEstudiante").hide();

    })


    $("#btnModEstudiante").click(function () {

        var nombres = $("#txtNombre").val();
        var apellidos = $("#txtApellido").val();
        var documento = $("#txtDocumento").val();
        var tipoDocumento = $("#selectTD").val();
        var fechaNacimiento = $("#dateNacimiento").val();
        var tipoSangre = $("#selectTS").val();
        var seguroEstudiantil = $("#txtSeguroE").val();
        var telefono = $("#txtTelefono").val();
        var idAcudiente = $("#selectAcudiente").val();
        var idCurso = $("#selectCurso").val();
        var idEstudiante = $(this).attr("estudiante");


        var objData = new FormData();
        objData.append("editarNombres", nombres);
        objData.append("editarApellidos", apellidos);
        objData.append("editarDocumento", documento);
        objData.append("editarTipoDocumento", tipoDocumento);
        objData.append("editarFechaNacimiento", fechaNacimiento);
        objData.append("editarTipoSangre", tipoSangre);
        objData.append("editarSeguroEstudiantil", seguroEstudiantil);
        objData.append("editarTelefono", telefono);
        objData.append("editarIdAcudiente", idAcudiente);
        objData.append("editarIdCurso", idCurso);
        objData.append("idEstudiante", idEstudiante);

        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta == "ok") {
                    cargarEstudiantes();
                    swal({
                        title: "Buen Trabajo!",
                        text: "Estudiante modificado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                } else {
                    swal({
                        title: "Error!",
                        text: respuesta,
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            }
        })

    })

    $("#tablaEstudiantes").on("click", "#btnEliminarEstudiante", function () {
        swal({
            title: "¿Desea Eliminar Este Registro?",
            text: "¡Una vez eliminado no se podra recuperar el registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    var idEstudiante = $(this).attr("idEstudiante");
                    var objData = new FormData();

                    objData.append("eliminarEstudiante", idEstudiante);

                    $.ajax({
                        url: "control/estudianteControl.php",
                        type: "post",
                        dataType: "json",
                        data: objData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (respuesta) {

                            swal("¡Registro Eliminado!", {
                                icon: "success",
                            });

                            cargarEstudiantes();

                        }
                    })

                } else {
                    swal("¡Su Registro Esta A Salvo!");
                }

            });

    })

    $("#btnRegEstudiante").click(function () {
        $("#txtNombre").val("");
        $("#txtApellido").val("");
        $("#txtDocumento").val("");
        $("#selectTD").val("Tipo Documento");
        $("#dateNacimiento").val("");
        $("#selectTS").val("Tipo Sangre");
        $("#txtSeguroE").val("");
        $("#txtTelefono").val("");
        $("#selectAcudiente").val("Seleccionar Acudiente");
        $("#selectCurso").val("Seleccionar Curso");

    })
    $("#btnModEstudiante").click(function () {
        $("#txtNombre").val("");
        $("#txtApellido").val("");
        $("#txtDocumento").val("");
        $("#selectTD").val("Tipo Documento");
        $("#dateNacimiento").val("");
        $("#selectTS").val("Tipo Sangre");
        $("#txtSeguroE").val("");
        $("#txtTelefono").val("");
        $("#selectAcudiente").val("Seleccionar Acudiente");
        $("#selectCurso").val("Seleccionar Curso");

    })
})