

<?php
require "../config/Conexion.php";
Class Import {

	public function __construct()
	{ 
	}


	public function insert($lastname_peo,$name_peo,$tipodoc_peo,$numberdoc_peo,$datos1_peo,$datos2_peo,$codpostal_peo,$phone_peo,$mail_peo,$tipo_peo,$anio_peo,$codigo)
	{
		$sql="INSERT INTO people (lastname_peo,name_peo,tipodoc_peo,numberdoc_peo,datos1_peo,datos2_peo,codpostal_peo,phone_peo,mail_peo,tipo_peo,anio_peo,qrcode,status_peo) VALUES ('$lastname_peo','$name_peo','$tipodoc_peo','$numberdoc_peo','$datos1_peo','$datos2_peo','$codpostal_peo','$phone_peo','$mail_peo','$tipo_peo','$anio_peo','$codigo','1')";
		return ejecutarConsulta($sql);
	}



}


?>