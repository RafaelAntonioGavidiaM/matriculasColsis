$(document).ready(function (){

    listarPersonal();
    

    function listarPersonal(){

        var listaPersonal = "ok";
        var objListarPersonal = new FormData();
        objListarPersonal.append("listaPersonal",listaPersonal);
       
        $.ajax({
            url: "control/personalControl.php",
            type: "post",
            dataType: "json",
            data: objListarPersonal,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

                console.log(respuesta);
                var interface = "";
                respuesta.forEach(listarPersonal)

                function listarPersonal(item, index){

                    interface += '<tr>';
                    interface += '<td>' + item.nombre + '</td>';
                    interface += '<td>' + item.apellido + '</td>';
                    interface += '<td>' + item.documento + '</td>';
                    interface += '<td>' + item.telefono + '</td>';
                    interface += '<td>' + item.ciudad + '</td>';
                    interface += '<td>' + item.correo + '</td>';
                    interface += '<td>' + item.estado + '</td>';
                    interface += '<td>' + item.rol + '</td>';
                    interface += '<td>' + item.direccion + '</td>';
                    interface += '<td>' + item.password + '</td>';
                    interface += '<td><img src="' + item.foto + '" high="40" width="40"></td>';
                    interface += '<td>'
                    interface += '<div class = "btn-group">'
                    interface += '<button type="button" class="btn btn-warning" title="Editar"  id="btnEditarPersonal" idPersonal="' + item.idPersonal + '" documento="' + item.documento + '" nombre="' + item.nombre + '" apellidos="' + item.apellidos + '" foto="' + item.foto + '" contraseña="' + item.contraseña + '" data-toggle="modal" data-target="#ventanaModPersonal"><span class="glyphicon glyphicon-pencil"></span></button>'
                    interface += '<button type="button" class="btn btn-danger" title ="Eliminar" id="btnEliminarPersonal" idPersonal="' + item.idPersonal + '" foto="' + item.foto + '"><span class="glyphicon glyphicon-remove"></span></button>';
                    interface += '<button type="button" class="btn btn-info" title ="PDF" id="btnPdf"  idPersonal="' + item.idPersonal + '" foto="' + item.foto + '"><span class="	glyphicon glyphicon-file"></span></button>';
                    interface += '</tr>';
                
                }

                $("#bodyPersonal").html(interface);



            }

        })

     



    }

    function listarRoles1(){

        var listaRoles = "ok";
        var objListarRoles = new FormData();
        objListarRoles.append("listaRoles",listaRoles);

        $.ajax({
            url: "control/personalControl.php",
            type: "post",
            dataType: "json",
            data: objListarRoles,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

                var interface = "";
                respuesta.forEach(selectRegRol)

                function selectRegRol(item, index){

                    interface += '<option value=' + item.idRol + '>' + item.nombre  +'</option>'
                    
                }

                $("#regRol").html(interface);

            }
        })





    }

    $("#btnRegPersonal").click(function(){

        listarRoles1();


    })










})