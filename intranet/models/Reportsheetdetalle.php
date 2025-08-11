<?php 
date_default_timezone_set('America/Lima');
require "../../config/Conexion.php";

Class Reportsheetdetalle{
  
	public function __construct()
	{ 

	}

	public function listar(){
		$sql="SELECT * FROM entity";
		return ejecutarConsulta($sql);		
	}


    public function listarpersonal($tipo_peo,$anio_peoget){
     $sql = "SELECT * FROM people p where p.tipo_peo='$tipo_peo' and tipo_peo<>'Estudiante' and p.anio_peo='$anio_peoget' order by p.lastname_peo ASC ";
        return ejecutarConsulta($sql);
    }

        public function listarstudent($tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget){
     $sql = "SELECT * FROM people p  where p.tipo_peo='$tipo_peo' and datos1_peo='$datos1_peo' and datos2_peo='$datos2_peo' and p.anio_peo='$anio_peoget' order by p.lastname_peo ASC ";
        return ejecutarConsulta($sql);
    }
 

	public function listarassistance($idpeople,$date_at){
     $sql = "SELECT *,a.idassistance,DATE_FORMAT(a.fecha_star,'%H:%i') as time_star from assistance a where a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')='$date_at'";
        return ejecutarConsulta($sql);
    }
 

    public function listarholidays($newdate_at){
        $sql="SELECT date(start) as dateholidays FROM calendar where date(start)='$newdate_at' and  status=1 and tipo=1";
        return ejecutarConsulta($sql);      
    }


        public function listarj($idpeople,$date_star,$date_end){
     $sql = "SELECT a.idassistance,a.kind_id,a.fecha_star ,COUNT(a.idpeople) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and a.kind_id='2' GROUP BY a.idpeople";
        return ejecutarConsulta($sql);
    }

        public function listarf($idpeople,$date_star,$date_end){
     $sql = "SELECT a.idassistance,a.kind_id,a.fecha_star ,COUNT(a.idpeople) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and a.kind_id='3' GROUP BY a.idpeople";
        return ejecutarConsulta($sql);
    }

    public function listar_a_total($idpeople,$date_star,$date_end){
     $sql = "SELECT COUNT(*) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and a.kind_id='1' and a.status='0' GROUP BY a.idpeople";
        return ejecutarConsulta($sql);
    }


    public function listar_a_tem($idpeople,$date_star,$date_end,$timestar){
     $sql = "SELECT a.idassistance,a.kind_id,DATE_FORMAT(a.fecha_star,'%H:%i:%S')as timestar ,COUNT(a.idpeople) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and a.kind_id='1' and a.status='0' and DATE_FORMAT(a.fecha_star,'%H:%i')<='$timestar' GROUP BY a.idpeople";
        return ejecutarConsulta($sql);
    }

    public function listar_a_tar($idpeople,$date_star,$date_end,$timestar){
     $sql = "SELECT a.idassistance,a.kind_id,DATE_FORMAT(a.fecha_star,'%H:%i:%S')as timestar ,COUNT(a.idpeople) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and a.kind_id='1' and a.status='0' and DATE_FORMAT(a.fecha_star,'%H:%i')>'$timestar' GROUP BY a.idpeople";
        return ejecutarConsulta($sql);
    }

}

?>

