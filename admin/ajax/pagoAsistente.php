<?php 
require_once "../modelos/estadoAsistente.php";
if (strlen(session_id())<1) 
	session_start();
    $asistencia=new estadoAsistente();

    switch ($_GET["op"]) {
    case 'listar_asistente':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"]; 

			$rspta=$asistencia->listar_asistente($fecha_inicio,$fecha_fin );//
			//declaramos un array
			$data=Array();
	
	//'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-info btn-xs" onclick="mostrar_clave('.$reg->idusuario.')"><i class="fa fa-key"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-info btn-xs" onclick="mostrar_clave('.$reg->idusuario.')"><i class="fa fa-key"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
			while ($reg=$rspta->fetch_object()) {
				$data[]=array(
					"0"=>$reg->idusuario,
					//"1"=>$reg->idusuario,
					"1"=>$reg->nombre,
					"2"=>$reg->horas_Acumuladas,
					"3"=>$reg->montoxhora,
					"4"=>$reg->monto_desembolsar  
					);
			}
	
			$results=array(
				 "sEcho"=>1,//info para datatables
				 "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
				 "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
				 "aaData"=>$data); 
			echo json_encode($results);
	
		break;
        
         }
 ?>