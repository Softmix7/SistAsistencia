<?php 

require "../config/Conexion.php";

Class Group
{

	public function __construct(){

	}

	public function listar(){
		$sql="SELECT * FROM groups order by idgroup desc";
		return ejecutarConsulta($sql);		
	}
 
	public function listarother(){
		$sql="SELECT * FROM groups where status_group='1' order by idgroup desc";
		return ejecutarConsulta($sql);		
	}

	public function insert($detalle_group){
		$sql="INSERT INTO groups (detalle_group,status_group)
		VALUES ('$detalle_group','1')";
		return ejecutarConsulta($sql);
	}

	public function update($idgroup,$detalle_group){
		$sql="UPDATE groups SET detalle_group='$detalle_group' WHERE idgroup='$idgroup'";
		return ejecutarConsulta($sql);
	}

	public function view($idgroup){
		$sql="SELECT * FROM groups where idgroup='$idgroup'";
		return ejecutarConsultaSimpleFila($sql);
	}


	public function inactive($idgroup)
	{
		$sql="UPDATE groups SET status_group='0' WHERE idgroup='$idgroup'";
		return ejecutarConsulta($sql);
	}


	public function active($idgroup)
	{
		$sql="UPDATE groups SET status_group='1' WHERE idgroup='$idgroup'";
		return ejecutarConsulta($sql);
	}
	public function delete($idgroup)
	{
		$sql="DELETE FROM groups WHERE idgroup='$idgroup'";
		return ejecutarConsulta($sql);
	}
	


}

?>