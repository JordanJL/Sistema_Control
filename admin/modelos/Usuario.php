<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Usuario{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$apellidos,$login,$iddepartamento,$idtipousuario,$email,$clavehash,$imagen,$usuariocreado,$codigo_persona,$tiempo_aprobado){
	date_default_timezone_set('America/Mexico_City');
	$fechacreado=date('Y-m-d H:i:s');
	$sql="INSERT INTO usuarios (nombre,apellidos,login,iddepartamento,idtipousuario,email,password,imagen,estado,fechacreado,usuariocreado,codigo_persona,tiempo_aprobado) VALUES ('$nombre','$apellidos','$login','$iddepartamento','$idtipousuario','$email','$clavehash','$imagen','1','$fechacreado','$usuariocreado','$codigo_persona','$tiempo_aprobado')";
	return ejecutarConsulta($sql);

}

public function editar($idusuario,$nombre,$apellidos,$login,$iddepartamento,$idtipousuario,$email,$imagen,$usuariocreado,$codigo_persona,$tiempo_aprobado){
	$sql="UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',login='$login',iddepartamento='$iddepartamento',idtipousuario='$idtipousuario',email='$email',imagen='$imagen' ,usuariocreado='$usuariocreado',codigo_persona='$codigo_persona',tiempo_aprobado='$tiempo_aprobado'  
	WHERE idusuario='$idusuario'";
	 return ejecutarConsulta($sql);

}
public function editar_clave($idusuario,$clavehash){
	$sql="UPDATE usuarios SET password='$clavehash' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}
public function mostrar_clave($idusuario){
	$sql="SELECT idusuario, password FROM usuarios WHERE idusuario='$idusuario'";
	return ejecutarConsultaSimpleFila($sql);
}
public function desactivar($idusuario){
	$sql="UPDATE usuarios SET estado='0' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}
public function activar($idusuario){
	$sql="UPDATE usuarios SET estado='1' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idusuario){
	$sql="SELECT * FROM usuarios WHERE idusuario='$idusuario'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM usuarios ORDER BY idtipousuario ";
	return ejecutarConsulta($sql);
}
//listar registros
public function listar_clientes(){
	$sql="SELECT * FROM usuarios WHERE idtipousuario = 3 ORDER BY idtipousuario ";
	return ejecutarConsulta($sql);
}
//listar registros y horas acumuladas
public function listar_asistente($fecha_inicio,$fecha_fin,$idcalendario){

	$sql="      SELECT  IFNULL((select SUM(ut.horasregistro)
	from usuariostransacciones ut
	where ut.fechahasta  BETWEEN CAST('$fecha_inicio' AS DATE)  AND CAST('$fecha_fin' AS DATE) 
	and  ut.idAsistenteAsignado = us.idusuario ),0) as horas, us.*
	FROM usuarios us 
	WHERE us.idTipoUsuario = 2  
	AND  (us.Idusuario NOT IN ( SELECT  IFNULL(ut2.IdAsistenteAsignado , 0 ) 
		  FROM usuariostransacciones ut2 
		   WHERE ut2.fechahasta BETWEEN (SELECT ut.fechadesde
								FROM  usuariostransacciones ut
								WHERE ut.id= $idcalendario) AND  (SELECT ut.fechahasta
								FROM  usuariostransacciones ut
								WHERE ut.id= $idcalendario)) 
        AND us.Idusuario NOT IN ( SELECT ut2.Idusuario 
		  FROM usuariostransacciones ut2 
		   WHERE ut2.fechahasta BETWEEN (SELECT ut.fechadesde
								FROM  usuariostransacciones ut
								WHERE ut.id= $idcalendario) AND  (SELECT ut.fechahasta
								FROM  usuariostransacciones ut
								WHERE ut.id= $idcalendario)))             
	
	";
	return ejecutarConsulta($sql);
}
 


public function cantidad_usuario(){
	$sql="SELECT count(*) nombre FROM usuarios";
	return ejecutarConsulta($sql);
}

//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT u.codigo_persona,u.idusuario,u.nombre,u.apellidos,u.login,u.idtipousuario,u.iddepartamento,u.email,u.imagen,u.login, tu.nombre as tipousuario FROM usuarios u INNER JOIN tipousuario tu ON u.idtipousuario=tu.idtipousuario WHERE login='$login' AND password='$clave' AND estado='1'"; 
    	return ejecutarConsulta($sql);  
    }
}

 ?>
