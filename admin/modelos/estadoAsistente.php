<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class estadoAsistente{


	//implementamos nuestro constructor
public function __construct(){

} 

public function listar_asistente($fecha_inicio,$fecha_fin ){
	$sql = "  SELECT us.idusuario  , 
        CONCAT( us.nombre ,' ' ,us.apellidos) as nombre, 
	    IFNULL(( SELECT SUM(ut.horasregistro)
		FROM usuariostransacciones ut 
        WHERE ut.idAsistenteAsignado = us.idusuario
        AND DATE(ut.fechadesde)>=DATE('$fecha_inicio') AND DATE(ut.fechahasta)<=DATE('$fecha_fin')),0) as horas_Acumuladas,
        '₡2000'  as montoxhora,
        CONCAT('₡',IFNULL(( SELECT SUM(ut.horasregistro)
		FROM usuariostransacciones ut 
        WHERE ut.idAsistenteAsignado = us.idusuario
        AND DATE(ut.fechadesde)>=DATE('$fecha_inicio') AND DATE(ut.fechahasta)<=DATE('$fecha_fin')),0)
        * IFNULL(us.monto_asistente,0)) as monto_desembolsar 
FROM usuarios us 
WHERE us.idtipousuario = 2    ";
	//	$sql="SELECT a.idasistencia,a.codigo_persona,a.fecha_hora,a.tipo,a.fecha,u.nombre,u.apellidos,d.nombre as departamento FROM asistencia a INNER JOIN usuarios u INNER JOIN departamento d ON u.iddepartamento=d.iddepartamento WHERE a.codigo_persona=u.codigo_persona";
	return ejecutarConsulta($sql);
}
  }

?>