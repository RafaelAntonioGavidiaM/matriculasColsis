<div class="jumbotron">
    <div class="container">
        <h1>Hello, world!</h1>
        <p>Contents ...</p>
        <p>
            <a class="btn btn-primary btn-lg">Learn more</a>
        </p>
    </div>
</div>
<div class="container">
<a class="btn btn-primary" data-toggle="modal" data-target='#modalPeriodo'>Registar Periodo</a>

</div>

<div class="row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">


        <table id="tablaPeriodo"  class="table table-condensed table-hover">
            <thead>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin </th>
                <th>Acciones</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>



        <div class="modal fade" id="modalPeriodo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Crear Periodo</h4>
                    </div>
                    <div class="modal-body">


                        <label for=""> Nombre Periodo </label>

                        <input type="text" class="form-control" id="nombrePeriodo">
                        <label for="">Fecha Inicio</label>

                        <input type="date"   class="form-control" id="fechaI">
                        <label for="">Fecha Fin</label>
                        <input type="date"  class="form-control" id="fechaF">







                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnCperiodo">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-sm-4">



    </div>
</div>