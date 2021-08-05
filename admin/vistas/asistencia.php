<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
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
  <h1 class="box-title">Usuarios</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<div class="panel-body table-responsive" id="listadoregistros">
  <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <label>Fecha Inicio</label>
    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
  </div>
  <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <label>Fecha Fin</label>
    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
  </div>
  <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <label>Empleado</label>
    <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true" required>
    </select>
    <br>
    <button class="btn btn-success" onclick="listar_clientes();">
      Mostrar</button>
  </div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Nombres</th>
      <th>Descripcion</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Horas</th>
      <th>Estado</th>
      <th>Asistente</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Nombres</th>
      <th>Descripcion</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Horas</th>
      <th>Estado</th>
      <th>Asistente</th>
    </tfoot>   
  </table>
</div>


      </div>
      </div>
      <!-- /.box -->


            <!--modal para ver la venta-->
 <div class="modal fade" id="getCodeModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 20% !important;">
     <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Asigna Asistente</h4>
        </div>
        <div class="modal-body">
  <form action="" name="formularioc" id="formularioc" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Asistente Disponible:  </label>
            <input class="form-control" type="hidden" name="idcanderio" id="idcanderio"> 
            <select name="idasistente" id="idasistente" class="form-control selectpicker" data-live-search="true" required>
            </select>
          </div>
          <button class="btn btn-primary" type="button" id="btnGuardarAsistente" onclick="UpdateCalendar()"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger"  type="button"  data-dismiss="modal" ><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
        </form>

        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
        </div>
</div>
</div>
</div>
    </section>
    <!-- /.content -->



  </div>


<?php 

require 'footer.php';
 ?>
 <script src="scripts/asistencia.js"></script>
 <?php 
}

ob_end_flush();
  ?>
