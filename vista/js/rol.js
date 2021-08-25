$(document).ready(function() {
    cargarRoles();


    $("#btnCrearRol").click(function() {

        var valor = $("#nombreRol").val();
        var nombre = valor.toUpperCase();
        alert(nombre);

        var objData = new FormData();
        objData.append("nombreRol", nombre);

        $.ajax({
            url: "control/rolControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                alert(respuesta);
                destruirTabla();
                cargarRoles();
            }
        })



    })

    function cargarRoles() {

        datosCargar = [];

        var mensaje = "ok";
        var objData = new FormData();
        objData.append("mensaje", mensaje);

        $.ajax({
            url: "control/rolControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                console.log(respuesta);
                var concatenar = "";


                respuesta.forEach(cargarTabla);

                function cargarTabla(item, index) {
                    var btn = '<button id="btnPermiso" class="btn btn-primary" data-toggle="modal" data-target="#mdRolModificar" nombre=' + item.nombre + ' idRol=' + item.idRol + '>Permisos </button>';

                    concatenar = '<button id="EliminarRol" type="button" class="btn btn-danger" idRol=' + item.idRol + ' ><span class="glyphicon glyphicon-remove"></span></button><button id="btnEditarNombre" type="button" class="btn btn-success" idRol=' + item.idRol + ' nombre=' + item.nombre + '  data-toggle="modal" data-target="#mdRolModificarNombre"><span class="glyphicon glyphicon-pencil"></span></button> ';


                    datosCargar.push([item.nombre, btn, concatenar]);




                }
                // $("#tbodyRol").html(concatenar);
                //alert(concatenar);

                console.log(datosCargar);
                $("#tablaRol").DataTable({
                    data: datosCargar,
                    dom: 'Bfrtip',
                    buttons: [{


                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        'colvis'
                    ],

                });




            }
        })


    }

    var idRolModificar = 0;

    $("#tablaRol").on("click", "#btnEditarNombre", function() {
        var nombreRol = $(this).attr("nombre");
        idRolModificar = $(this).attr("idRol");
        // alert(nombreRol);

        $("#nombreRolMod").val(nombreRol);








    })

    $("#btnModRol").click(function() {


        var valor = $("#nombreRolMod").val();
        var nombre = valor.toUpperCase();

        var objData = new FormData();
        objData.append("nombreMod", nombre);
        objData.append("idRolMod", idRolModificar);

        $.ajax({
            url: "control/notaControles.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                destruirTabla();


                cargarRoles();


            }
        })






    })



    var idRol = 0;

    $("#tablaRol").on("click", "#btnPermiso", function() {

        idRol = $(this).attr("idRol");
        var nombre = $(this).attr("nombre");
        $("#tituloMod").html(nombre);

        var objData = new FormData();
        objData.append("idRol", idRol);

        $.ajax({
            url: "control/rolControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                concatenar = "";

                console.log(respuesta);
                respuesta.forEach(cargarTablaPermisos);

                function cargarTablaPermisos(item, index) {

                    var orden = "";





                    concatenar += "<tr>";
                    concatenar += "<td>" + item.nombreFormulario + "</td>";

                    var idPermiso = Number(item.idPermiso);
                    console.log(idPermiso);

                    if (idPermiso == 1) {


                        orden += '<option value=' + item.idPermiso + ' >Habilitado</option>';
                        orden += '<option value=' + 2 + '>Desabilitado</option>';


                    } else if (idPermiso == 2) {
                        orden += '<option value=' + item.idPermiso + '>Desabilitado</option>';
                        orden += '<option value=' + 1 + '>Habilitado</option>';

                    }




                    concatenar += "<td>" + '<select id="permisos" name="permisos" idFormulario=' + item.idFormulario + '>' + orden + '</select>' + "</td >";
                    concatenar += "</tr>";




                }
                $("#tbodyPermisos").html(concatenar);
                // alert(concatenar);

            }
        })

    })
    $("#tablaPermisos").on("change", "#permisos", function() {

        var permiso = $(this).val();
        var idFormulario = $(this).attr("idFormulario");

        var objData = new FormData();
        objData.append("idRolPermiso", idRol);
        objData.append("idFormulario", idFormulario);
        objData.append("permiso", permiso);

        $.ajax({
            url: "control/rolControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                alert(respuesta);




            }
        })







    })

    $("#tablaRol").on("click", "#EliminarRol", function() {


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var idRol = $(this).attr("idRol");
                var objData = new FormData();
                objData.append("idRolEliminar", idRol);
                $.ajax({
                    url: "control/rolControl.php",
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
                            destruirTabla();

                            cargarRoles();


                        } else {

                            alert(respuesta);
                        }


                    }
                })












            }
        })













    })


    $("#CerrarPermiso").click(function() {
        alert("hola");
        location.reload();
    })

    function destruirTabla() {
        tabla = $("#tablaRol").DataTable();
        tabla.destroy();
    }








})