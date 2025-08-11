<?php 
date_default_timezone_set('America/Lima');
require "../config/Conexion.php";

Class Consultarech
{

	public function __construct(){
 
	} 


	public function listar($anio_peoget){
     $sql = "SELECT *,DATE_FORMAT(c.fecha,'%d-%m-%Y') as fechas,DATE_FORMAT(c.fecha,'%H:%i:%S') as hora,crch.msj_usu,crch.fech_actual FROM consulta c inner join consulrech crch on c.iduserform=crch.iduserform where DATE_FORMAT(crch.fech_actual,'%Y')='$anio_peoget'  order by c.iduserform desc ";
        return ejecutarConsulta($sql);
    }

}

?>

