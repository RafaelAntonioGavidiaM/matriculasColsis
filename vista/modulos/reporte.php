<body>
    <header id="headerReporte">
        <div class="container">
            <div class="texto">
                <div class="caja">
                    <h1 id="h1rf">Reportes</h1>
                </div>
            </div>
        </div>
        <div class="wave" style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-4.22,101.14 C240.12,148.52 305.58,54.77 503.10,122.86 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgb(235, 235, 235);"></path>
            </svg>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container wells">
        <div class="well well-lg">
            <center>Reportes Estudiantes</center>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <form>
                    <select id="selectPeriodo" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected place>Seleccionar Periodo</option>
                    </select>
                    <select id="selectGrado" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected place>Seleccionar Curso</option>
                    </select>
                    <button type="button" id="btnFiltrar">Filtrar</button>
                </form>
            </div>
            <div class="col-sm-9">
                <table id="tablaReportes" style="width:100%" class="table row-border stripe display nowrap hover display compact order-column">
                    <thead class="cabeceraTabla">

                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Acudiente</th>
                            <th>Curso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bodyReportes">
                    </tbody>
                </table>
                <div id="seleccionarReporte">
                    <h1 class="tituloReporte">Seleccione Un Periodo Y Grado</h1>
                </div>
            </div>
        </div>
</body>