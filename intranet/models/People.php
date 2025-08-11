<?php 

require "../config/Conexion.php";

Class People{

	public function __construct(){

	}

	public function listar($tipo_peoget,$anio_peoget){
		$sql="SELECT * FROM people where tipo_peo='$tipo_peoget' and anio_peo='$anio_peoget' order by idpeople desc";
		return ejecutarConsulta($sql);		
	}

	public function insert($lastname_peo,$name_peo,$tipodoc_peo,$numberdoc_peo,$datos1_peo,$datos2_peo,$codpostal_peo,$phone_peo,$mail_peo,$tipo_peo,$anio_peo,$codigo){
		$sql="INSERT INTO people (lastname_peo,name_peo,tipodoc_peo,numberdoc_peo,datos1_peo,datos2_peo,codpostal_peo,phone_peo,mail_peo,status_peo,tipo_peo,anio_peo,qrcode)
		VALUES ('$lastname_peo','$name_peo','$tipodoc_peo','$numberdoc_peo','$datos1_peo','$datos2_peo','$codpostal_peo','$phone_peo','$mail_peo','1','$tipo_peo','$anio_peo','$codigo')";
		return ejecutarConsulta($sql);
	}

	public function updateimagencrop($idpeoplecrop,$imagename){
	$sql="UPDATE people SET imagencrop='$imagename' WHERE idpeople='$idpeoplecrop'";
	return ejecutarConsulta($sql);

	}


	public function update($idpeople,$lastname_peo,$name_peo,$tipodoc_peo,$numberdoc_peo,$datos1_peo,$datos2_peo,$codpostal_peo,$phone_peo,$mail_peo,$codigo){
		$sql="UPDATE people SET lastname_peo='$lastname_peo',name_peo='$name_peo',tipodoc_peo='$tipodoc_peo',numberdoc_peo='$numberdoc_peo',datos1_peo='$datos1_peo',datos2_peo='$datos2_peo',codpostal_peo='$codpostal_peo',phone_peo='$phone_peo',mail_peo='$mail_peo',qrcode='$codigo' WHERE idpeople='$idpeople'";
		return ejecutarConsulta($sql);
	}

	public function view($idpeople){
		$sql="SELECT * FROM people where idpeople='$idpeople'";
		return ejecutarConsultaSimpleFila($sql);
	}


	public function inactive($idpeople)
	{
		$sql="UPDATE people SET status_peo='0' WHERE idpeople='$idpeople'";
		return ejecutarConsulta($sql);
	}


	public function active($idpeople)
	{
		$sql="UPDATE people SET status_peo='1' WHERE idpeople='$idpeople'";
		return ejecutarConsulta($sql);
	}
	public function delete($idpeople)
	{
		$sql="DELETE FROM people WHERE idpeople='$idpeople'";
		return ejecutarConsulta($sql);
	}
	


}

?>