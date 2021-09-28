$(document).ready(function(){

    // Iniciar funciones

  
    //Inciializacion de variables 



    // funcion de carga asignaturas de Asistencia
    $("#btnCargarAsignaturas").click(function(){

        var idCurso = $("#selectCurso").val();
        var listaAsignatura = "ok";
        var objListarAsignatura = new FormData();
        objListarAsignatura.append("idCurso",idCurso)
        objListarAsignatura.append("listaAsignatura",listaAsignatura) 

        $.ajax({

            url: "control/asistenciaControl.php",
            type: "post",
            dataType: "json",
            data: objListarAsignatura,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

                $("#selectAsignaturaAsistencia").html("");
                respuesta.forEach(lisaAsignaturaAsistencia);

                function lisaAsignaturaAsistencia(item, index){
                    // alert(item.idAsignatura);
                    // alert(item.nombreAsignatura);
                    $("#selectAsignaturaAsistencia").append( '<option value=" ' + item.idAsignatura + '">' + item.nombreAsignatura + '</option>');

                    
                }

            }
        })
    })










})