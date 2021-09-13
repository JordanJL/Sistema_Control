<?php 

require_once "../modelos/AgendarCita.php";
if (strlen(session_id())<1) 
	session_start();

$agendarCita=new AgendarCita();

if ($_POST['key']=='GuardarCita'){
    $idusuario=$_SESSION["idusuario"];
    
    $rspta=$agendarCita->ValidarHoras($idusuario,$_POST['fechadesde'],$_POST['fechahasta']);
    $reg = $rspta -> fetch_object();
    //echo $rspta;

    //$rspta->DISPONETIEMPO;
    if($reg->DISPONETIEMPO==1){
        $rspta=$agendarCita->insertar($idusuario,$_POST['descripcion'],$_POST['fechadesde'],$_POST['fechahasta']);
        echo $rspta ? "Datos registrados correctamente" : "N";
    }else{
        echo "No cuenta con las horas disponibles para realizar dicha cita, usted tiene aprobado por mes: ".$reg->Aprobado." horas, de las cuales ha registrado: ".$reg->REGISTRADO." y esta solicitud suma: ".$reg->SOLICITUD;
    }

}

if ($_POST['key']=='BorrarCita'){
    $idusuario=$_SESSION["idusuario"];
    $idCita = $_POST['idCIta'];
    $rspta=$agendarCita->eliminar($idCita);
    echo $rspta ? "Cita eliminada correctamente" : "N";
}

if ($_POST['key']=='ConsultaHorasAcumuladas'){
    $idusuario=$_SESSION["idusuario"];
    $rspta=$agendarCita->ConsultaHoras($idusuario,$_POST['fecha_inicial']);
     echo json_encode( $rspta);
}
 

if ($_POST['key']=='VerDetalle'){
    $id=$_POST["id"];
	$rspta=$agendarCita->mostrardatosID($id);
    echo json_encode($rspta);
}
