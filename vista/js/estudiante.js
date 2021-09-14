$(document).ready(function () {

    iniciarTabla();
    cargarEstudiantes();
    cargarComboCurso(1);
    cargarComboCursoFiltro(1);

    $("#btnRegEstudiante").show();
    $("#btnModEstudiante").hide();
    $("#moduloImagen").hide();

    //cargar aucudiente

    function autocompletarAcudiente() {
        const inputAcudiente = document.querySelector('#selectAcudiente');
        let indexFocus = -1;

        inputAcudiente.addEventListener("input", function () {

            const tipoAcudiente = this.value;
            if (!tipoAcudiente) return false;

            cerraLista();
            //creat lista
            const divList = document.createElement("div");
            divList.setAttribute("id", this.id + "-lista-autocompletar");
            divList.setAttribute("class", "lista-autocompletar-items");
            this.parentNode.appendChild(divList);

            //conexion a Bd

            httpRequest('control/itemsAcudienteControlador.php?auto-acudiente=' + tipoAcudiente, function () {

                const arr = JSON.parse(this.responseText);
                console.log(arr);
                //validar arreglo

                if (arr.length == 0) return false;



                if (arr != null) {

                    const elementoLista = document.createElement("div");
                    // elementoLista.innerHTML = `<strong>${item.substr(0, tipoAcudiente.length)}</strong>${item.substr(tipoAcudiente.length)}`;
                    var id = arr[0];
                    var nombre = arr[1];
                    var apellido = arr[2];
                    elementoLista.innerHTML = `<strong>${nombre + ' ' + apellido}</strong>`;
                    elementoLista.addEventListener('click', function () {
                        inputAcudiente.value = this.innerText;
                        $("#selectAcudiente").attr("idAcudiente", id);
                        cerraLista();
                        return false;
                    })
                    divList.appendChild(elementoLista);

                }
            });
        });


        inputAcudiente.addEventListener('keydown', function (e) {

            const divList = document.querySelector('#' + this.id + '-lista-autocompletar');
            let items;

            if (divList) {
                items = divList.querySelectorAll('div');
                switch (e.keyCode) {

                    case 40:
                        indexFocus++;
                        if (indexFocus > items.length - 1) indexFocus = items.length = 1;
                        break;

                    case 38:
                        indexFocus--;
                        if (indexFocus < 0) indexFocus = 0;
                        break;

                    case 13:
                        e.preventDefault();
                        items[indexFocus].click();
                        indexFocus = -1;
                        break;

                    default:
                        break;
                }

                seleccionar(items, indexFocus);
                return false;
            }

        });

        document.addEventListener('click', function () {
            cerraLista()
        });

    }
    autocompletarAcudiente();

    function seleccionar(items, indexFocus) {
        if (!items || indexFocus == -1) return false;
        items.forEach(x => { x.classList.remove('autocompletar-active') });
        items[indexFocus].classList.add('autocompletar-active');
    }

    function cerraLista() {
        const items = document.querySelectorAll('.lista-autocompletar-items')
        items.forEach(item => {
            item.parentNode.removeChild(item);
        });
        indexFocus = -1;
    }

    function httpRequest(url, callback) {
        const http = new XMLHttpRequest();
        http.open('GET', url);
        http.send();

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                callback.apply(http);
            }
        }
    }



    //cargar Curso en el combo
    function cargarComboCurso(opcion, principal, idCurso) {
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
                if (opcion == 1) {
                    $("#selectCurso").html("");
                    respuesta.forEach(cargarSelectCurso);

                    function cargarSelectCurso(item, index) {
                        $("#selectCurso").append('<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>');
                    }

                } else if (opcion == 2) {
                    var concatenar = "";
                    respuesta.forEach(cargarSelectCurso);

                    function cargarSelectCurso(item, index) {
                        if (item.idCurso == idCurso) {

                        } else {
                            concatenar += '<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>';

                        }



                    }
                    $("#selectCurso").html(principal + concatenar);



                }


            }
        });
    };

    //Regristrar estudiante

    $("#btnRegEstudiante").click(function () {

        var nombres = $("#txtNombre").val();
        var apellidos = $("#txtApellido").val();
        var documento = $("#txtDocumento").val();
        var tipoDocumento = $("#selectTD").val();
        var fechaNacimiento = $("#dateNacimiento").val();
        var tipoSangre = $("#selectTS").val();
        var seguroEstudiantil = $("#txtSeguroE").val();
        var telefono = $("#txtTelefono").val();
        var idAcudiente = $("#selectAcudiente").attr("idAcudiente");
        var idCurso = document.getElementById("selectCurso").value;
        var foto = document.getElementById("txtFoto").files[0];


        var objDatRegistrarUsuario = new FormData();
        objDatRegistrarUsuario.append("nombres", nombres);
        objDatRegistrarUsuario.append("apellidos", apellidos);
        objDatRegistrarUsuario.append("documento", documento);
        objDatRegistrarUsuario.append("tipoDocumento", tipoDocumento);
        objDatRegistrarUsuario.append("fechaNacimiento", fechaNacimiento);
        objDatRegistrarUsuario.append("tipoSangre", tipoSangre);
        objDatRegistrarUsuario.append("seguroEstudiantil", seguroEstudiantil);
        objDatRegistrarUsuario.append("telefono", telefono);
        objDatRegistrarUsuario.append("acudiente", idAcudiente);
        objDatRegistrarUsuario.append("curso", idCurso);
        objDatRegistrarUsuario.append("foto", foto);

        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objDatRegistrarUsuario,
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
                    BlanquearCampos();
                    iniciarTabla();
                } else {
                    swal({
                        title: "Error!",
                        text: respuesta,
                        icon: "error",
                        button: "Aceptar",
                    });
                }

            }
        });

    });

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
                var dataSet = [];
                var contadorFilas = 0;
                respuesta.forEach(cargarListaEstudiantes);

                function cargarListaEstudiantes(item, index) {
                    contadorFilas += 1;

                    var objBotones = '<button id="btnEditarEstudiante" type="button" class="btn btn-warning" title="editar" idEstudiante="' + item.idEstudiante + '" nombres="' + item.nombres + '" apellidos="' + item.apellidos + '" documento="' + item.documento + '" tipoDocumento="' + item.tipoDocumento + '" fechaNacimiento="' + item.fechaNacimiento + '"  tipoSangre="' + item.tipoSangre + '" seguroEstudiantil="' + item.seguroEstudiantil + '" telefono="' + item.telefono + '" idAcudiente="' + item.idAcudiente + '" idCurso="' + item.idCurso + '"  nombreAcudiente="' + item.nombre + " " + item.apellido + '"  nombreCurso="' + item.nombreCurso + '" url="' + item.url + '" ><span style="width:5px; height:5px; padding:0px;" class="glyphicon glyphicon-pencil"></span></button>';
                    objBotones += '<button id="btnEliminarEstudiante" type="button" class="btn btn-danger" title="eliminar" idEstudiante="' + item.idEstudiante + '" url="' + item.url + '"><span style="width:5px; height:5px; padding:0px;    " class="glyphicon glyphicon-remove"></span></button>';
                    var interface = '<td><img src="' + item.url + '"high="70" width="80"></td>';

                    dataSet.push([contadorFilas, item.nombres, item.apellidos, item.documento, item.tipoDocumento, item.fechaNacimiento, item.tipoSangre, item.seguroEstudiantil, item.telefono, item.nombre + " " + item.apellido, item.nombreCurso, interface, objBotones])
                }

                $('#tablaEstudiantes').DataTable({
                    data: dataSet,
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
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                        'colvis'
                    ],
                    "scrollX": true,

                    language: {
                        "decimal": "",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "info": "Mostrando de _START_ a _END_ de _TOTAL_ de registros",
                        "infoEmpty": "Mostrando 0 a 0 of de registros",
                        "infoFiltered": "(Filtrado de _MAX_ total registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activar para ordenar la columna ascendente",
                            "sortDescending": ": activar para ordenar la columna descendente"
                        }
                    }
                });

            }
        });
    };

    function iniciarTabla() {

        var tabla = $("#tablaEstudiantes").DataTable();
        tabla.destroy();

    }



    $("#btnFiltrarCurso").click(function () {


        var idCurso = document.getElementById("selectCursoFiltro").value;

        var objData = new FormData();
        objData.append("filtroCurso", idCurso);
        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                console.log(respuesta);

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
                    interface += '<td>' + item.nombre + " " + item.apellido + '</td>';
                    interface += '<td>' + item.nombreCurso + '</td>';
                    interface += '<td>';

                    interface += '<div class="btn-group">';
                    interface += '<button id="btnEditarEstudiante" type="button" class="btn btn-warning" title="editar" idEstudiante="' + item.idEstudiante + '" nombres="' + item.nombres + '" apellidos="' + item.apellidos + '" documento="' + item.documento + '" tipoDocumento="' + item.tipoDocumento + '" fechaNacimiento="' + item.fechaNacimiento + '"  tipoSangre="' + item.tipoSangre + '" seguroEstudiantil="' + item.seguroEstudiantil + '" telefono="' + item.telefono + '" idAcudiente="' + item.idAcudiente + '" idCurso="' + item.idCurso + '"  nombreAcudiente="' + item.nombre + " " + item.apellido + '"  nombreCurso="' + item.nombreCurso + '" ><span style="width:5px; height:5px; padding:0px;" class="glyphicon glyphicon-pencil"></span></button>';
                    interface += '<button id="btnEliminarEstudiante" type="button" class="btn btn-danger" title="eliminar" idEstudiante="' + item.idEstudiante + '"><span style="width:5px; height:5px; padding:0px;    " class="glyphicon glyphicon-remove"></span></button>';
                    interface += '</div>';
                    interface += '</td>';
                    interface += '</tr>';
                }

                $("#bodyEstudiantes").html(interface);


            }


        });

    });

    $("#btnListaCompleta").click(function () {

        cargarEstudiantes();
        iniciarTabla();

    });

    function cargarComboCursoFiltro(opcion, principal, idCurso) {
        var cargarCursoFiltro = "ok";
        var objCargarCursoFiltro = new FormData();

        objCargarCursoFiltro.append("cargarCursoFiltro", cargarCursoFiltro);

        $.ajax({
            url: "control/estudianteControl.php",
            type: "post",
            dataType: "json",
            data: objCargarCursoFiltro,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (opcion == 1) {
                    $("#selectCursoFiltro").html("");
                    respuesta.forEach(cargarSelectCursoFiltro);

                    function cargarSelectCursoFiltro(item, index) {
                        $("#selectCursoFiltro").append('<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>');
                    }

                } else if (opcion == 2) {
                    var concatenar = "";
                    respuesta.forEach(cargarSelectCursoFiltro);

                    function cargarSelectCursoFiltro(item, index) {
                        if (item.idCurso == idCurso) {

                        } else {
                            concatenar += '<option value="' + item.idCurso + '">' + item.nombreCurso + '</option>';

                        }

                    }
                    $("#selectCursoFiltro").html(principal + concatenar);

                }

            }
        });
    };

    var foto = "";
    $("#tablaEstudiantes").on("click", "#btnEditarEstudiante", function () {

        $("#btnModEstudiante").show();
        $("#btnRegEstudiante").hide();
        $("#moduloImagen").fadeIn();

        var nombreAcudiente = $(this).attr("nombreAcudiente");
        var nombreCurso = $(this).attr("nombreCurso");

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
        foto = $(this).attr("url");

        $("#imagenActual").attr("src", foto);


        $("#txtNombre").val(nombres);
        $("#txtApellido").val(apellidos);
        $("#txtDocumento").val(documento);
        $("#selectTD").val(tipoDocumento);
        $("#dateNacimiento").val(fechaNacimiento);
        $("#selectTS").val(tipoSangre);
        $("#txtSeguroE").val(seguroEstudiantil);
        $("#txtTelefono").val(telefono);
        $("#btnModEstudiante").attr("estudiante", idEstudiante);
        var principal = '<option value="' + idAcudiente + '">' + nombreAcudiente + '</option>';
        var principalCurso = '<option value="' + idCurso + '">' + nombreCurso + '</option>';

        cargarAcudiente(2, principal, idAcudiente);
        cargarComboCurso(2, principalCurso, idCurso);
        $("#txtFoto").val(foto);


    });

    $("#btnModEstudiante").click(function () {

        $("#btnModEstudiante").show();
        $("#moduloImagen").fadeOut();

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
        var rutaFoto = "";
        var opcion1 = "";
        var opcion2 = "";
        var fotoAnterior = "";

        if ($("#txtFoto").val() == null || $("#txtFoto").val() == "") {

            rutaFoto = foto;
            opcion1 = "fotoNormal";
            console.log(rutaFoto);



        } else {

            var fotoNueva = document.getElementById("txtFoto").files[0];
            rutaFoto = fotoNueva;
            fotoAnterior = foto;
            alert(fotoAnterior);
            opcion2 = "fotoArray";
        }

        $("#imagenNueva").attr("src", rutaFoto);


        var objData = new FormData();

        if (opcion1 = "fotoNormal" && opcion2 == "") {

            objData.append("opcion1", opcion1);
            console.log("foto original");

        } else if (opcion2 = "fotoArray" && opcion1 == "") {

            objData.append("opcion2", opcion2);
            console.log("foto array");

        };

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
        objData.append("modFoto", rutaFoto);
        objData.append("fotoAnterior", fotoAnterior);

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
                        text: "Estudiante modificado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });

                    iniciarTabla();
                    cargarEstudiantes();
                    BlanquearCampos();

                    $("#btnRegEstudiante").show();
                    $("#btnModEstudiante").hide();
                } else {
                    swal({
                        title: "Error!",
                        text: respuesta,
                        icon: "error",
                        button: "Aceptar",
                    });
                };

            }
        });

        $("#btnRegEstudiante").hide();

    });

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
                    var foto = $(this).attr("url");

                    var objData = new FormData();
                    objData.append("eliminarEstudiante", idEstudiante);
                    objData.append("url", foto);

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
                            iniciarTabla();
                        }


                    })

                } else {
                    swal("¡Su Registro Esta A Salvo!");
                }

            });
    });

    function BlanquearCampos() {
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

    };

    function archivo(evt) {
        var files = evt.target.files;

        for (var i = 0, f; f = files[i]; i++) {

            if (!f.type.match('image.*')) {
                continue;
            };

            var reader = new FileReader();

            reader.onload = (function (theFile) {
                return function (e) {

                    document.getElementById("list").innerHTML = ['<img class="thumb" id="imagenNueva" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);

            reader.readAsDataURL(f);
        };
    };

    document.getElementById('txtFoto').addEventListener('change', archivo, false);

});