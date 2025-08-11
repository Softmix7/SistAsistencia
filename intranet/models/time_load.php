
<?php 

require "intranet/config/Conexion.php";

Class Timeactive
{

	public function __construct(){

	}

	public function listar_active(){
		$sql="SELECT * FROM time_active";
		return ejecutarConsulta($sql);		
	}	
}

?>