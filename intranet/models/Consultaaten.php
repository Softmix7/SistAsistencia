<?php 
date_default_timezone_set('America/Lima');
require "../config/Conexion.php";

Class Consultaaten{

	public function __construct(){
 
	} 


	public function listar($anio_peoget){
     $sql = "SELECT *,DATE_FORMAT(c.fecha,'%d-%m-%Y') as fechas,DATE_FORMAT(c.fecha,'%H:%i:%S') as hora,cate.msj_usu,cate.fech_actual,cate.adjunto FROM consulta c inner join consulaten cate on c.iduserform=cate.iduserform where DATE_FORMAT(cate.fech_actual,'%Y')='$anio_peoget' order by c.iduserform desc ";
        return ejecutarConsulta($sql);
    }

}

?>

