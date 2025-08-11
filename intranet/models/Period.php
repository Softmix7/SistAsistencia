<?php 

require "../config/Conexion.php";

Class Period
{

	public function __construct(){

	}

	public function listar(){
		$sql="SELECT * FROM period order by name_per desc";
		return ejecutarConsulta($sql);		
	}

	public function insert($name_per){
		$sql="INSERT INTO period (name_per,status)
		VALUES ('$name_per','1')";
		return ejecutarConsulta($sql);
	}

	public function update($idperiod,$name_per){
		$sql="UPDATE period SET name_per='$name_per' WHERE idperiod='$idperiod'";
		return ejecutarConsulta($sql);
	}

	public function view($idperiod){
		$sql="SELECT * FROM period where idperiod='$idperiod'";
		return ejecutarConsultaSimpleFila($sql);
	}



	


}

?>