<?php 

require "../../config/Conexion.php";

Class Listadogroup{

	public function __construct(){

	}

	public function listar(){
		$sql="SELECT * FROM entity";
		return ejecutarConsulta($sql);		
	}

		public function listarall($date_star,$date_end,$tipo_peo,$anio_peoget){
     $sql = "SELECT a.idassistance,a.kind_id,p.tipo_peo ,p.lastname_peo,p.name_peo,p.datos1_peo,p.datos2_peo,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i') as time_end FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and  DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and  p.tipo_peo='$tipo_peo' and p.anio_peo='$anio_peoget' and YEAR(a.fecha_star)='$anio_peoget'  order by p.lastname_peo,a.fecha_star asc";
        return ejecutarConsulta($sql);
    }


    public function listarstudent($date_star,$date_end,$tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget){
     $sql = "SELECT a.idassistance,a.kind_id,p.tipo_peo ,p.lastname_peo,p.name_peo,p.datos1_peo,p.datos2_peo,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i') as time_end FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and  DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and  p.tipo_peo='$tipo_peo' and p.datos1_peo='$datos1_peo' and p.datos2_peo='$datos2_peo' and p.anio_peo='$anio_peoget' and YEAR(a.fecha_star)='$anio_peoget' order by p.lastname_peo,a.fecha_star asc";
        return ejecutarConsulta($sql);
    }



    public function listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$ident){
     $sql = "SELECT a.idassistance,a.kind_id,p.tipo_peo ,p.lastname_peo,p.name_peo,p.datos1_peo,p.datos2_peo,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i') as time_end FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and  DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and  p.tipo_peo='$tipo_peo' and p.anio_peo='$anio_peoget' and YEAR(a.fecha_star)='$anio_peoget' and a.idpeople='$ident'  order by p.lastname_peo,a.fecha_star asc";
        return ejecutarConsulta($sql);
    }



}

?>