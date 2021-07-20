<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{


require 'header.php';


 ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">CALENDARIZACIÓN DE CITAS <button data-toggle="modal"
                                data-target="#modal-default" class="btn btn-success" id="btnagregar" onclick=""><i
                                    class="fa fa-plus-circle"></i>Agregar</button></h1>
                    </div>

                    <!-- -------------------------------------------------------------------------------- -->
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sticky-top mb-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- the events -->

                                                <div id="calendar"></div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>


                    <div id="calendarModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                    <h4 id="modalTitle" class="modal-title"></h4>
                                </div>
                                <div id="modalBody" class="modal-body"> </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar cita</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row" id="formularioregistros">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" class="form-control" name="titulo" id="titulo"
                                                    placeholder="Título ...">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" rows="3" name="descripcion"
                                                    id="descripcion" placeholder="Descripción ..."></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="dtp_input1" class="col-md-2 control-label">Desde:</label>
                                            <div class="input-group date form_datetimedesde col-md-10" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input class="form-control" size="16" type="text" value="" name="fechadesde" id="fechadesde" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" /><br />
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="dtp_input1" class="col-md-2 control-label">Hasta</label>
                                            <div class="input-group date form_datetimehasta col-md-10" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input class="form-control" size="16" type="text" value="" name="fechahasta" id="fechahasta" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" /><br />
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" id="btnGuardar" onclick="GuardarCita()"
                                        class="btn btn-primary">Guardar</button>

                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- -------------------------------------------------------------------------------- -->
                    <!--box-header-->
                    <!--centro-->

                    <!--fin centro-->
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<?php 


require 'footeragendar.php';
?>
<script src="scripts/agregarcita.js"></script>
<?php 
}

ob_end_flush();
  ?>