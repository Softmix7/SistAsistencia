<?php 

require "../config/Conexion.php";

Class Detalladogroup{

	public function __construct(){

	} 
 


	public function listarpersonal($tipo_peo,$anio_peo){
		$sql = "SELECT * FROM people p where p.tipo_peo='$tipo_peo' and tipo_peo<>'Estudiante' and anio_peo='$anio_peo' order by p.lastname_peo  asc ";
		return ejecutarConsulta($sql);
	}

	public function listarstudent($tipo_peo,$datos1_peo,$datos2_peo,$anio_peo){
		$sql = "SELECT * FROM people p  where p.tipo_peo='$tipo_peo' and datos1_peo='$datos1_peo' and datos2_peo='$datos2_peo' and anio_peo='$anio_peo' order by p.lastname_peo  asc ";
		return ejecutarConsulta($sql);
	}


	public function listarassistance($idpeople,$date_at){
		$sql = "SELECT *,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star from assistance a where a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')='$date_at'";
		return ejecutarConsulta($sql);
	}


	public function listarholidays($date_star,$date_end){
		$sql="SELECT date(start) as dateholidays,title as descripcion FROM calendar where date(start)>='$date_star' and date(start)<='$date_end' and  status=1 and tipo=1";
		return ejecutarConsulta($sql);      
	}


	public function listar(){
		$sql="SELECT * FROM groups where status_group='1' order by idgroup desc";
		return ejecutarConsulta($sql);		
	}


	public function listgroup_student($anio_peoget){
		$sql="SELECT p.idpeople,p.tipo_peo,p.datos1_peo,p.datos2_peo,p.anio_peo FROM people p where p.tipo_peo='Estudiante' and p.anio_peo='$anio_peoget' group by p.datos1_peo,p.datos2_peo order by p.datos1_peo,p.datos2_peo asc";
		return ejecutarConsulta($sql);		
	}



 public function autocomplete($searchTerm,$datos1_peo,$datos2_peo) {
   $search='%'.$searchTerm.'%';
   $sql="SELECT * FROM people WHERE datos1_peo='$datos1_peo' AND datos2_peo='$datos2_peo' AND  numberdoc_peo LIKE '$search' or name_peo LIKE '$search' or lastname_peo LIKE '$search'";
   return ejecutarConsulta($sql);      
}



 public function autocompleteid($searchTerm,$tipo_peo) {
   $search='%'.$searchTerm.'%';
   $sql="SELECT * FROM people WHERE tipo_peo='$tipo_peo' AND  numberdoc_peo LIKE '$search' or name_peo LIKE '$search' or lastname_peo LIKE '$search'";
   return ejecutarConsulta($sql);      
}


}

?>