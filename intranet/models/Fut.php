<?php 

require "../config/Conexion.php";

Class Fut
{

	public function __construct(){

	}

	public function listar(){
		$sql="SELECT * FROM fut";
		return ejecutarConsulta($sql);		
	}

	public function update($idfut,$futdocument){
		$sql="UPDATE fut SET fut_document='$futdocument' WHERE idfut='$idfut'";
		return ejecutarConsulta($sql);
	}

	public function view($idfut){
		$sql="SELECT * FROM fut where idfut='$idfut'";
		return ejecutarConsultaSimpleFila($sql);
	}
}

?>