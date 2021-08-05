<?php 

require_once "../modelos/AgendarCita.php";
if (strlen(session_id())<1) 
	session_start();

$agendarCita=new AgendarCita();

if ($_POST['key']=='GuardarCita'){
    $idusuario=$_SESSION["idusuario"];
	$rspta=$agendarCita->insertar($idusuario,$_POST['descripcion'],$_POST['fechadesde'],$_POST['fechahasta']);
    echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
}

if ($_POST['key']=='VerDetalle'){
    $id=$_POST["id"];
	$rspta=$agendarCita->mostrardatosID($id);
    echo json_encode($rspta);
}
