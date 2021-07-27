$(document).ready(function () {

    $("#btnRegestudiantes").click(function () {

        var nombre = $("#txtNombre").val();
        var apellido = $("#txtApellido").val();
        var documento = $("#txtDocumento").val();
        var tipoDocumento = document.getElementById("#selectTD").value;
        var fechaNacimiento = $("#dateNacimiento").val(); 
        var tipoSangre = document.getElementById("#selectTS").value;
        var seguroEstudiantil = $("#txtSeguroE").val();
        var telefono = $("#txtTelefono").val();

        var objData = new FormData();
        objData.append("nombre", nombre);
        objData.append("apellido", apellido);
        objData.append("documento", documento);
        objData.append("tipoDocumento", tipoDocumento);
        objData.append("fechaNacimiento", fechaNacimiento);
        objData.append("tipoSangre", tipoSangre);
        objData.append("seguroEstudiantil", seguroEstudiantil);
        objData.append("telefono", telefono);

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
})