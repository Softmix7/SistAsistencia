<?php 

require "../config/Conexion.php";

Class Listadogroup{

	public function __construct(){

	} 
 


    public function listar_time($date_star,$date_end,$tipo_peo,$anio_peoget){
     $sql = "SELECT a.idassistance,a.kind_id,p.tipo_peo ,p.lastname_peo,p.name_peo,p.datos1_peo,p.datos2_peo,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i') as time_end FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and  DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and  p.tipo_peo='$tipo_peo' and p.anio_peo='$anio_peoget' and YEAR(a.fecha_star)='$anio_peoget'  order by p.lastname_peo,a.fecha_star asc";
        return ejecutarConsulta($sql);
    }


    public function listarstudent_time($date_star,$date_end,$tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget){
     $sql = "SELECT a.idassistance,a.kind_id,p.tipo_peo ,p.lastname_peo,p.name_peo,p.datos1_peo,p.datos2_peo,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i') as time_end FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and  DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and  p.tipo_peo='$tipo_peo' and p.datos1_peo='$datos1_peo' and p.datos2_peo='$datos2_peo' and p.anio_peo='$anio_peoget' and YEAR(a.fecha_star)='$anio_peoget'   order by p.lastname_peo,a.fecha_star asc";
        return ejecutarConsulta($sql);
    }


    public function listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$ident){
     $sql = "SELECT a.idassistance,a.kind_id,p.tipo_peo ,p.lastname_peo,p.name_peo,p.datos1_peo,p.datos2_peo,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i') as time_end FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and  DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and  p.tipo_peo='$tipo_peo' and p.anio_peo='$anio_peoget' and YEAR(a.fecha_star)='$anio_peoget' and a.idpeople='$ident'  order by p.lastname_peo,a.fecha_star asc";
        return ejecutarConsulta($sql);
    }



	public function listar(){
		$sql="SELECT * FROM groups where status_group='1'  order by idgroup desc";
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