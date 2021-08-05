<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class AgendarCita{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($idusuario,$descripcion,$fechadesde,$fechahasta){
	date_default_timezone_set('America/Mexico_City');
	$fechacreada=date('Y-m-d H:i:s');
	$sql="INSERT INTO usuariostransacciones(idusuario,descripcion,fechadesde,fechahasta) ".
          "VALUES ('$idusuario','$descripcion','$fechadesde','$fechahasta')";
	return ejecutarConsulta($sql);
	
}

public function mostrar($idusuario){
	$sql="SELECT id,descripcion,fechadesde,fechahasta ".
		 "FROM usuariostransacciones WHERE idusuario = ".$idusuario." AND DATEDIFF(NOW(),fechadesde) < (select datoInteger from variables where codigo='ClientesHistorialAgenda') ";
	return ejecutarConsulta($sql);
}

public function mostrardatosID($id){
	$sql="SELECT a.id,a.descripcion,a.fechadesde,a.fechahasta, case when isnull(a.idAsistenteAsignado) then 'No Asignado' else concat(b.nombre,' ',b.apellidos) end as Asistente, a.horasregistro as Horas ".
		 "FROM usuariostransacciones a left join usuarios b on (a.idAsistenteAsignado = b.idusuario) WHERE id = ".$id." ";
	//return $sql;
		 return ejecutarConsultaSimpleFila($sql);
}

/*
public function editar($iddepartamento,$nombre,$descripcion,$idusuario){
	$sql="UPDATE departamento SET nombre='$nombre',descripcion='$descripcion',idusuario='$idusuario' 
	WHERE iddepartamento='$iddepartamento'";
	return ejecutarConsulta($sql);
}
public function desactivar($iddepartamento){
	$sql="UPDATE departamento SET fechacreada='0' WHERE iddepartamento='$iddepartamento'";
	return ejecutarConsulta($sql);
}
public function activar($iddepartamento){
	$sql="UPDATE departamento SET fechacreada='1' WHERE iddepartamento='$iddepartamento'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($iddepartamento){
	$sql="SELECT * FROM departamento WHERE iddepartamento='$iddepartamento'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM departamento";
	return ejecutarConsulta($sql);
}
//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM departamento";
	return ejecutarConsulta($sql);
}

public function regresaRolDepartamento($departamento){
	$sql="SELECT nombre FROM departamento where iddepartamento='$departamento'";		
	return ejecutarConsulta($sql);
}*/



}
