<?php 

require "../config/Conexion.php";

Class Entity
{

	public function __construct(){

	}

	public function listar(){
		$sql="SELECT * FROM entity";
		return ejecutarConsulta($sql);		
	}

	public function update($identity,$nombre_en,$direccion_en,$telefono_en){
		$sql="UPDATE entity SET nombre_en='$nombre_en',direccion_en='$direccion_en', telefono_en='$telefono_en'WHERE identity='$identity'";
		return ejecutarConsulta($sql);
	}

	public function view($identity){
		$sql="SELECT * FROM entity where identity='$identity'";
		return ejecutarConsultaSimpleFila($sql);
	}


	public function updateimg($identity,$imagen_en){
		$sql="UPDATE entity SET imagen_en='$imagen_en' WHERE identity='$identity'";
		return ejecutarConsulta($sql);
	}

	


}

?>