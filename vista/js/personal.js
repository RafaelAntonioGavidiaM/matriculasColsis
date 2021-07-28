$(document).ready(function () {

    listarPersonal();
    listarRoles(1);


    function listarPersonal() {

        var listaPersonal = "ok";
        var objListarPersonal = new FormData();
        objListarPersonal.append("listaPersonal", listaPersonal);

        $.ajax({
            url: "control/personalControl.php",
            type: "post",
            dataType: "json",
            data: objListarPersonal,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                console.log(respuesta);
                var interface = "";
                respuesta.forEach(listarPersonal)

                function listarPersonal(item, index) {

                    interface += '<tr>';
                    interface += '<td>' + item.nombre + '</td>';
                    interface += '<td>' + item.apellido + '</td>';
                    interface += '<td>' + item.documento + '</td>';
                    interface += '<td>' + item.telefono + '</td>';
                    interface += '<td>' + item.ciudad + '</td>';
                    interface += '<td>' + item.correo + '</td>';
                    interface += '<td>' + item.estado + '</td>';
                    interface += '<td>' + item.idRol + '</td>';
                    interface += '<td>' + item.direccion + '</td>';
                    interface += '<td>' + item.password + '</td>';
                    interface += '<td><img src="' + item.foto + '" high="40" width="40"></td>';
                    interface += '<td>'
                    interface += '<div class = "btn-group">'
                    interface += '<button type="button" class="btn btn-warning" title="Editar"  id="btnEditarPersonal" idPersonal="' + item.idPersonal + '" nombre="' + item.nombre + '" apellido="' + item.apellido + '" documento="' + item.documento + '" telefono="' + item.telefono + '" ciudad="' + item.ciudad + '" correo="' + item.correo + '" estado="' + item.estado + '" idRol="' + item.idRol + '" direccion="' + item.direccion + '" password="' + item.password + '" foto="' + item.foto + '" data-toggle="modal" data-target="#ventanaModPersonal"><span class="glyphicon glyphicon-pencil"></span></button>'
                    interface += '<button type="button" class="btn btn-danger" title ="Eliminar" id="btnEliminarPersonal" idPersonal="' + item.idPersonal + '" foto="' + item.foto + '"><span class="glyphicon glyphicon-remove"></span></button>';
                    interface += '</tr>';

                }

                $("#bodyPersonal").html(interface);



            }

        })





    }

    function listarRoles(opcion) {

        var listaRoles = "ok";
        var objListarRoles = new FormData();
        objListarRoles.append("listaRoles", listaRoles);

        $.ajax({
            url: "control/personalControl.php",
            type: "post",
            dataType: "json",
            data: objListarRoles,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                
                if (opcion == 1) {
                    
                    $("#regRol").html("");
                    respuesta.forEach(listarRoles);

                    function listarRoles(item, index){

                        $("#regRol").append('<option value="' + item.idRol + '">' + item.nombre + '</option>');

                    }
                }else if (opcion == 2) {
                    
                    $("#regRol").html("");
                    respuesta.forEach(listarRoles);

                    function listarRoles(item, index){

                        $("#modRol").append('<option value="' + item.idRol + '">' + item.nombre + '</option>');

                    }


                } 

            }
        })


    }

    $("#btnRegPersonal").click(function () {

        listarRoles(1);

    })


    var idPersonal = "";
    $("#tablaPersonal").on("click", "#btnEditarPersonal", function () {
        
        listarRoles(2);
        $("#modRol").html("");

        idPersonal = $(this).attr("idPersonal");


        var nombrePerosnal = $(this).attr("nombre");
        var apellido = $(this).attr("apellido");
        var documento = $(this).attr("documento");
        var telefono = $(this).attr("telefono");
        var ciudad = $(this).attr("ciudad");
        var correo = $(this).attr("correo");
        var estado = $(this).attr("estado");
        var idRol = $(this).attr("idRol");
        var direccion = $(this).attr("direccion");
        var password = $(this).attr("password");


        $("#btnModificarPersonal").attr("idPersonal", idPersonal);

        $("#txtModNombres").val(nombrePerosnal);
        $("#txtModApellidos").val(apellido);
        $("#txtModDocumeto").val(documento);
        $("#txtModTelefono").val(telefono);
        $("#txtModCiudad").val(ciudad);
        $("#txtModCorreo").val(correo);
        $("#txtModDireccion").val(direccion);
        $("#txtModPassword").val(password);
        $("#modEstadoPersonal").val(estado);
        $("#modRol").append('<option value="' + idRol + '">' + nombre + '</option>');
       
    })

    $("#btnNewPersonal").click(function () {
        alert("hola");
        var idRol = document.getElementById("regRol").value;
        var estado = document.getElementById("esatodosPersonal").value;

        var nombre = $("#txtRegNombres").val();
        var apellido = $("#txtRegApellidos").val();
        var documento = $("#txtRegDocumeto").val();
        var telefono = $("#txtRegTelefono").val();
        var ciudad = $("#txtRegCiudad").val();
        var correo = $("#txtRegCorreo").val();
        var direccion = $("#txtRegDireccion").val();
        var password = $("#txtRegPassword").val();
        var foto = document.getElementById("txtRegFoto").files[0];


        var objData = new FormData();
        objData.append("nombre", nombre);
        objData.append("apellido", apellido);
        objData.append("documento", documento);
        objData.append("telefono", telefono);
        objData.append("ciudad", ciudad);
        objData.append("correo", correo);
        objData.append("idRol", idRol);
        objData.append("estado", estado);
        objData.append("direccion", direccion);
        objData.append("password", password);
        objData.append("foto", foto);


        $.ajax({
            url: "control/personalControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                alert("registrado");
                listarPersonal();

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })

            }
        })


    })

    $("#tablaPersonal").on("click", "#btnEliminarPersonal", function () {


        idPersonal = $(this).attr("idPersonal");
        foto = $(this).attr("foto");

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Estas seguro?',
            text: "no puedes recuperar la informacion despues de ser eleiminada!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                var objData = new FormData();
                objData.append("idDeletePersonal", idPersonal);
                objData.append("deleteFoto", foto);

                $.ajax({

                    url: "control/personalControl.php",
                    type: "post",
                    dataType: "json",
                    data: objData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (respuesta) {
                        if (respuesta == "ok") {
                            swalWithBootstrapButtons.fire(
                                'Eliminado!',
                                'Registro eliminado exitosamente.',
                                'success'
                            )
                        }
                        listarPersonal();
                    }
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Tu registro e a salvado',
                    'error'
                )
            }
        })




    })










})