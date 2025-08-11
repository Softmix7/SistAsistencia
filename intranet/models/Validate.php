<?php 

require "../config/Conexion.php";

Class Validate{

	public function __construct(){

	}

	public function listar(){
		$sql="SELECT * FROM validate";
		return ejecutarConsulta($sql);		
	}
}

?>