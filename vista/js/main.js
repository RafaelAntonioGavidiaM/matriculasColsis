$(document).ready(function() {


    $("#ingresar").click(function() {

        var documento = $("#email").val();
        var contraseña = $("#pwd").val();
        alert(documento + " " + contraseña);

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
                    alert("Bienvenido");


                } else {
                    alert("Ingresao No valido");
                }







            }

        })







    })






})