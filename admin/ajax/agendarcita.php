<?php 

require_once "../modelos/AgendarCita.php";
if (strlen(session_id())<1) 
	session_start();

$agendarCita=new AgendarCita();

if ($_POST['key']=='GuardarCita'){
    $idusuario=$_SESSION["idusuario"];

  /*  $rspta=$agendarCita->ValidarHoras($idusuario,$_POST['fechadesde'],$_POST['fechahasta']);
    $rspta -> fetch_object();*/
    //$rspta->DISPONETIEMPO;
    /*if($rspta->DISPONETIEMPO=1){*/
        $rspta=$agendarCita->insertar($idusuario,$_POST['descripcion'],$_POST['fechadesde'],$_POST['fechahasta']);
        echo $rspta ? "Datos registrados correctamente" : "N";
   /* }else{
        echo "N";
    }*/

    
}

if ($_POST['key']=='VerDetalle'){
    $id=$_POST["id"];
	$rspta=$agendarCita->mostrardatosID($id);
    echo json_encode($rspta);
}
