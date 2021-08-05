<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Asistencia{


	//implementamos nuestro constructor
public function __construct(){

}


//listar registros
public function listar(){
	$sql = "SELECT us.idusuario,
					CONCAT( us.nombre ,' ' ,us.apellidos) as nombre,
					ut.descripcion,
					ut.fechadesde,
					ut.fechahasta,
					ut.horasregistro,
					CASE ut.estado
					WHEN  'I' THEN 'PENDIENTE'
					ELSE 'ASIGNADO'
						END as estado, 
					CONCAT( us2.nombre ,' ' ,us2.apellidos) as nombreasistente
				FROM usuarios us
				INNER JOIN usuariostransacciones ut ON us.idusuario = ut.idusuario
				LEFT JOIN usuarios us2 ON us2.idusuario = ut.idAsistenteAsignado
				AND us.idtipousuario = 3";
	//	$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,u.nombre,u.apellidos,d.nombre as departamento FROM asistencia a INNER JOIN usuarios u INNER JOIN departamento d ON u.iddepartamento=d.iddepartamento WHERE a.codigo_persona=u.codigo_persona";
	return ejecutarConsulta($sql);
}

//Update registros
public function UpdateCalendar($idcalendario,$idasistente){
	$sql = "UPDATE usuariostransacciones 
	SET Estado = 'A',
		idAsistenteAsignado = '$idasistente' 
	WHERE id = '$idcalendario'";
	//	$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,u.nombre,u.apellidos,d.nombre as departamento FROM asistencia a INNER JOIN usuarios u INNER JOIN departamento d ON u.iddepartamento=d.iddepartamento WHERE a.codigo_persona=u.codigo_persona";
	return ejecutarConsulta($sql);
}




public function listaru($idusuario){
	$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,u.nombre,u.apellidos,d.nombre as departamento FROM asistencia a INNER JOIN usuarios u INNER JOIN departamento d ON u.iddepartamento=d.iddepartamento WHERE a.codigo_persona=u.codigo_persona AND u.idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}

public function listar_asistencia($fecha_inicio,$fecha_fin,$codigo_persona){
	$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,u.nombre,u.apellidos FROM asistencia a INNER JOIN usuarios u ON  a.codigo_persona=u.codigo_persona WHERE DATE(a.fecha)>='$fecha_inicio' AND DATE(a.fecha)<='$fecha_fin' AND a.codigo_persona='$codigo_persona'";
	return ejecutarConsulta($sql);
}

public function listar_clientes($fecha_inicio,$fecha_fin,$codigo_persona){
	$sql = "SELECT us.idusuario,
					ut.id as idcalendario,
					CONCAT( us.nombre ,' ' ,us.apellidos) as nombre,
					ut.descripcion,
					ut.fechadesde,
					ut.fechahasta,
					ut.horasregistro,
					CASE ut.estado
					WHEN  'I' THEN 'PENDIENTE'
					ELSE 'ASIGNADO'
						END as estado, 
					CONCAT( us2.nombre ,' ' ,us2.apellidos) as nombreasistente
				FROM usuarios us
				INNER JOIN usuariostransacciones ut ON us.idusuario = ut.idusuario
				LEFT JOIN usuarios us2 ON us2.idusuario = ut.idAsistenteAsignado 
				WHERE us.idtipousuario = 3 AND DATE(ut.fechadesde)>=DATE('$fecha_inicio') AND DATE(ut.fechahasta)<=DATE('$fecha_fin') AND us.idusuario='$codigo_persona'";
	//	$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,u.nombre,u.apellidos,d.nombre as departamento FROM asistencia a INNER JOIN usuarios u INNER JOIN departamento d ON u.iddepartamento=d.iddepartamento WHERE a.codigo_persona=u.codigo_persona";
	return ejecutarConsulta($sql);
}


}

 ?>
