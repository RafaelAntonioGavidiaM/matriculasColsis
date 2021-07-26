$(document).ready(function() {


    $("#ingresar").click(function() {

        var documento = $("#email").val();
        var contraseña = $("#pwd").val();

        var objData = new FormData();
        objData.append("documento", documento);
        objData.append("contraseña", contraseña);

        $.ajax({
            url: "control/loginControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                if (respuesta == "valido") {
                    blanquear();
                    swal({
                        title: "Bienvenido",
                        text: "Usted se encuentra registrado",
                        icon: "success",
                        button: "Aceptar",
                    });
                    location.replace("principal.php");

                } else {
                    blanquear();
                    swal({
                        title: "Lo siento",
                        text: "Usted no se encuentra registrado",
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            }

        })

    })

    function blanquear() {
        $("#email").val("");
        $("#pwd").val("");
    }

})