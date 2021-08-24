$(document).ready(function() {

    function cargarGradosNota() {

        var mensaje = "ok";
        var objData = new FormData();
        objData.append("graddos", mensaje);
        $.ajax({
            url: "control/rolControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {


                cargarRoles();


            }
        })


    }


})