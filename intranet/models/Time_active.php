<?php 

require "../config/Conexion.php";

Class Timeactive
{

	public function __construct(){

	}

	public function listar(){
		$sql="SELECT *,DATE_FORMAT(horain_tim,'%h:%i %p') as inicio, DATE_FORMAT(horafin_tim,'%h:%i %p') as fin FROM time_active";
		return ejecutarConsulta($sql);		
	}

	public function insert($horain,$horafin){
		$sql="INSERT INTO time_active (horain_tim, horafin_tim)
		VALUES ('$horain','$horafin')";
		return ejecutarConsulta($sql);
	}

	public function update($idtimeactive,$horain,$horafin){
		$sql="UPDATE time_active SET horain_tim='$horain', horafin_tim='$horafin'  WHERE idtimeactive='$idtimeactive'";
		return ejecutarConsulta($sql);
	}

	public function view($idtimeactive){
		$sql="SELECT *,DATE_FORMAT(horain_tim,'%h:%i %p') as inicio, DATE_FORMAT(horafin_tim,'%h:%i %p') as fin FROM time_active where idtimeactive='$idtimeactive'";
		return ejecutarConsultaSimpleFila($sql);
	}


}

?>