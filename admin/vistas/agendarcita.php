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
                        <h1 class="box-title">Departamento <button data-toggle="modal" data-target="#modal-default" class="btn btn-success" id="btnagregar" onclick=""><i
                                    class="fa fa-plus-circle" ></i>Agregar</button></h1>
                                    <button type="button" class="btn btn-default"data-toggle="modal" data-target="#modal-default" >
                  Launch Default Modal
                </button>
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

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Default Modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>One fine body&hellip;</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar</button>
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



<?php 
}

ob_end_flush();
  ?>