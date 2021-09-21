$(document).ready(function () {


    cagarSelectArea(1);



    // ------------------------------------------------------------------------------------
    // ----------------Funciones de show y hide de Asignaturas-----------------------------
    // ------------------------------------------------------------------------------------

    // ------------------------------------------------------------------------------------
    // -----------------------------Crud de Area-------------------------------------------
    // ------------------------------------------------------------------------------------

    // litarAreas

    function listarAreas() {

        var cargarAreas = "ok";
        var objData = new FormData();
        objData.append("cargarAreas", cargarAreas);

        $.ajax({
            url: "control/asignaturaControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                var dataArea = [];
                respuesta.forEach(listarArea);

                function listarArea(item, index) {

                    var objBotones = '<button type="button" class="btn btn-warning" title="Editar"  id="btnEditarArea" idArea="' + item.idArea + '" nombreArea="' + item.nombreArea + '" data-toggle="modal" data-target="#modalModArea"><span class="glyphicon glyphicon-pencil"></span></button>'
                    objBotones += '<button type="button" class="btn btn-danger" title ="Eliminar" id="btnEliminarArea" idArea="' + item.idArea + '"><span class="glyphicon glyphicon-remove"></span></button>';

                    dataArea.push([item.nombreArea, objBotones])



                }

                $('#tablaArea').DataTable({
                    data: dataArea,

                    language: {
                        "decimal": "",
                        "emptyTable": "No data available in table",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Show _MENU_ entries",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encuentro registros con el criterio de busqueda",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                    }
                });


            }
        })






    }

    //REGISTRAR AREA

    $("#btnNewArea").click(function () {

        var nombreArea = $("#txtRegArea").val();

        var objData = new FormData();
        objData.append("nombreArea", nombreArea);


        $.ajax({
            url: "control/asignaturaControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                if (respuesta == "ok") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Registro Exitoso',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    iniciarTablaArea();
                    listarAreas();
                    limpiarTextArea(1);
                }


            }
        })



    })

    // VARIABLES DE AREA PARA MODIFICAR

    var idArea = "";


    // MODIFICAR AREA

    $("#tablaArea").on("click", "#btnEditarArea", function () {

        idArea = $(this).attr("idArea");
        var nombreArea = $(this).attr("nombreArea");
        alert(idArea);
        $("#btnModArea").attr("idArea", idArea);
        $("#txtModArea").val(nombreArea);
    })

    $("#btnModArea").click(function () {

        var nombreArea = $("#txtModArea").val();

        if (nombreArea == null || nombreArea == "") {

            Swal.fire({
                icon: 'error',
                title: 'Nulos',
                text: 'Hay cajas Nulas!',

            })
        } else {

            var objData = new FormData();
            objData.append("idArea", idArea);
            objData.append("modNombreArea", nombreArea);

            $.ajax({
                url: "control/asignaturaControl.php",
                type: "post",
                dataType: "json",
                data: objData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {


                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Modificacion Exitosa',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    listarAreas();
                    iniciarTablaArea();


                }


            })

        }







    })


    // Eliminar Area

    $("#tablaArea").on("click", "#btnEliminarArea", function () {


        idArea = $(this).attr("idArea");


        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Estas seguro?',
            text: "no puedes recuperar la informacion despues de ser eliminada!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                var objData = new FormData();
                objData.append("idDeleteArea", idArea);


                $.ajax({

                    url: "control/asignaturaControl.php",
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
                            listarAreas();
                            iniciarTablaArea();
                        } else if (respuesta == "error") {

                            Swal.fire({
                                icon: 'error',
                                title: 'Esta Area presenta relaciones',
                                text: 'Cancelado!',

                            })


                        }


                    }
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Tu registro se a salvado',
                    'error',
                )
            }
        })



    })






    // ------------------------------------------------------------------------------------
    // -----------------------------Crud de Asignaturas------------------------------------
    // ------------------------------------------------------------------------------------

    // Listar Asignaturas

    function listarAsignaturas() {

        var listaAsignatura = "ok";
        var objListaAsigantura = new FormData();
        objListaAsigantura.append("listaAsignatura", listaAsignatura);

        $.ajax({
            url: "control/asignaturaControl.php",
            type: "post",
            dataType: "json",
            data: objListaAsigantura,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                var dataAsignatura = [];
                respuesta.forEach(cargarAsignatura)

                function cargarAsignatura(item, index) {

                    var objBotones = '<button type="button" class="btn btn-warning" title="Editar"  id="btnEditarAsignatura" idAsignatura="' + item.idAsignatura + '" nombreAsignatura="' + item.nombreAsignatura + '" idArea="' + item.idArea + '" nombreArea="' + item.nombreArea + '" data-toggle="modal" data-target="#modalModAsignatura"><span class="glyphicon glyphicon-pencil"></span></button>'
                    objBotones += '<button type="button" class="btn btn-danger" title ="Eliminar" id="btnEliminarAsignatura" idAsignatura="' + item.idAsignatura + '"><span class="glyphicon glyphicon-remove"></span></button>';

                    dataAsignatura.push([item.nombreAsignatura, item.nombreArea, objBotones])





                }

                $('#tablaAsignatura').DataTable({
                    data: dataAsignatura,

                    language: {
                        "decimal": "",
                        "emptyTable": "No data available in table",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Show _MENU_ entries",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encuentro registros con el criterio de busqueda",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                    }
                });

            }

        })




    }

    // cargar select de Registrar y modificar en el apartado de asignatura


    function cagarSelectArea(opcion, id, principal) {

        var listarSelectArea = "ok";
        var objSelectArea = new FormData();
        objSelectArea.append("listarSelectArea", listarSelectArea);


        $.ajax({
            url: "control/asignaturaControl.php",
            type: "post",
            dataType: "json",
            data: objSelectArea,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                if (opcion == 1) {

                    $("#selectAreaAsignatura").html("");
                    respuesta.forEach(listarRegSelect);

                    function listarRegSelect(item, index) {

                        $("#selectAreaAsignatura").append('<option value="' + item.idArea + '">' + item.nombreArea + '</option>');

                    }


                } else if (opcion == 2) {
                    var concatenar = "";
                    $("#selectModArea").html("");

                    respuesta.forEach(listarModSelect);


                    function listarModSelect(item, index) {

                        if (item.idRol == id) {

                        } else {
                            concatenar += '<option value="' + item.idArea + '">' + item.nombreArea + '</option>';

                        }

                        ;


                    }
                    $("#selectModArea").html(principal + concatenar);


                }
            }
        })








    }


    // Registrar Asignatura a la tabla de asignatura con su respectiva area


    $("#btnNewAsignatura").click(function () {

        var nombreAsignatura = $("#txtRegAsignatura").val();
        var nombreArea = document.getElementById("selectAreaAsignatura").value;

        var objData = new FormData();
        objData.append("nombreAsignatura", nombreAsignatura);
        objData.append("regNombreArea", nombreArea);

        $.ajax({

            url: "control/asignaturaControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                if (respuesta == "ok") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Registro Exitoso',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    iniciarTablaAsignaturas();
                    listarAsignaturas();
                    limpiarTextArea(2);

                } else {

                    swal.fire({

                        position: 'top-end',
                        icon: 'error',
                        title: 'no se pudo resgitrar!',
                        showConfirmButton: true,
                        timer: 2000,


                    })


                }





            }




        })





    })

    // Modificar Asignatura 

    var idAsignatura = "";

    $("#tablaAsignatura").on("click", "#btnEditarAsignatura", function () {

        $("#selectModArea").html("");
        var idArea = $(this).attr("idArea");
        idAsignatura = $(this).attr("idAsignatura");
        var nombreArea = $(this).attr("nombreArea");
        var nombreAsignatura = $(this).attr("nombreAsignatura");


        $("#btnModAsignatura").attr("idAsignatura", idAsignatura);
        $("#txtModAsignatura").val(nombreAsignatura);
        var principal = '<option value="' + idArea + '">' + nombreArea + '</option>';

        cagarSelectArea(2, idArea, principal);


    })


    $("#btnModAsignatura").click(function () {

        var idArea = document.getElementById("selectModArea").value;
        var nombreAsignatura = $("#txtModAsignatura").val();

        var objData = new FormData();
        objData.append("idModAsignatura", idAsignatura);
        objData.append("modNombreAsignatura", nombreAsignatura);
        objData.append("idModArea", idArea);

        $.ajax({

            url: "control/asignaturaControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                if (respuesta == "ok") {


                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Modificacion Exitosa',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    iniciarTablaAsignaturas();
                    listarAsignaturas();

                }
                else {

                    swal.fire({

                        position: 'top-end',
                        icon: 'error',
                        title: 'no se pudo realizar la modificacion!',
                        showConfirmButton: true,
                        timer: 2000,


                    })

                }

            }

        })




    })


    // Eliminar Asignatura 

    $("#tablaAsignatura").on("click", "#btnEliminarAsignatura", function () {

        idAsignatura = $(this).attr("idAsignatura");


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
                objData.append("idDeleteAsignatura", idAsignatura);


                $.ajax({

                    url: "control/asignaturaControl.php",
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
                                'Asignatura eliminada exitosamente.',
                                'success'
                            )
                            iniciarTablaAsignaturas();
                            listarAsignaturas();

                        } else if (respuesta == "error2") {

                            Swal.fire({
                                icon: 'error',
                                title: 'Este Asignatura presenta registros',
                                text: 'porfavor elimine los registros y vuelva a intentarlo!',

                            })



                        }


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

    // ------------------------------------------------------------------
    // --------------------funcion de destruir la tabla--------------------
    // ------------------------------------------------------------------

    function iniciarTablaArea() {

        var tabla = $("#tablaArea").DataTable();
        tabla.destroy();

    }

    function iniciarTablaAsignaturas() {

        var tabla = $("#tablaAsignatura").DataTable();
        tabla.destroy();


    }

    // ------------------------------------------------------------------
    // --------------------funcion limpiar text area--------------------
    // ------------------------------------------------------------------

    function limpiarTextArea($numero) {

        if ($numero == 1) {

            // limpiar campos de registrod de area

            $("#txtRegArea").val("");


        } else if ($numero == 2) {

            // Limpiar campos de registro de Asignatura

            $("#txtRegAsignatura").val("");

        }

    }

    // ------------------------------------------------------------------
    // --------------------funcion de mostrar y ocultar--------------------
    // ------------------------------------------------------------------


 
    $("#btnTablasDeContenido").click(function () {
        
        document.getElementById("btnTablasDeContenido").disabled = true;
        listarAreas();
        listarAsignaturas();
        iniciarTablaArea();
        iniciarTablaAsignaturas();
        $("#contenidoDeArea").fadeIn().addClass('mover_contenido_arriba');
        $("#contenidoDeAsignatura").fadeIn().addClass('mover_contenido_arriba');
        $("#btnbtnTablasDeContenido").addClass('diseño_boton_tablas');




        // $("#contenidoDeArea").show();
        // $("#contenidoDeAsignatura").show();

    })


    $("#btnMostrarRegArea").click(function () {
        $("#ventadeRegistroAera").fadeIn().addClass('mover_contenido_abajo');
    })

    $("#btnCerrarRegistroArea").click(function () {
        $("#ventadeRegistroAera").fadeOut();
    })

    $("#btnMostrarRegAsignatura").click(function () {
        $("#ventadeRegistroAsignatura").fadeIn().addClass('mover_contenido_abajo');
    })

    $("#btnCerrarRegistroAsignatura").click(function () {
        $("#ventadeRegistroAsignatura").fadeOut();
    })


})