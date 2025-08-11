<?php 

require "../../config/Conexion.php";

Class Identification_group{

	public function __construct(){

	} 



 public function listar_institucion(){
    $sql="SELECT * FROM entity";
    return ejecutarConsulta($sql);		
 }

 public function listarpersonal($tipo_peo,$anio_peoget){
    $sql = "SELECT * FROM people p where p.tipo_peo='$tipo_peo'  and anio_peo='$anio_peoget'  order by p.lastname_peo  asc ";
    return ejecutarConsulta($sql);
 }

 public function listarstudent($tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget){
    $sql = "SELECT * FROM people p  where p.tipo_peo='$tipo_peo' and datos1_peo='$datos1_peo' and datos2_peo='$datos2_peo' and anio_peo='$anio_peoget' order by p.lastname_peo  asc ";
    return ejecutarConsulta($sql);
 }


 public function listarassistance($idpeople,$date_at){
    $sql = "SELECT *,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i') as timestar, DATE_FORMAT(a.fecha_end,'%H:%i') as timeend from assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')='$date_at'";
    return ejecutarConsulta($sql);
 }

 public function listarassistance_all($idpeople,$date_at){
    $sql = "SELECT date(a.fecha_star) as fecha,DATE(a.fecha_end) as fechafin,time(a.fecha_star) as timestar, time(a.fecha_end) as timeend,a.status from assistance a WHERE a.idpeople='$idpeople' and DATE(a.fecha_star)='$date_at' and a.kind_id='1'";
    return ejecutarConsulta($sql);
 }

 public function listarassistance_all_day($idpeople,$date_at,$i){
    $sql = "SELECT date(a.fecha_star) as fecha,DATE(a.fecha_end) as fechafin,DATE_FORMAT(a.fecha_star,'%H:%i') as timestar, DATE_FORMAT(a.fecha_end,'%H:%i') as timeend,a.status from assistance a WHERE a.idpeople='$idpeople' and DATE(a.fecha_star)='$date_at'and a.status='$i' and a.kind_id='1'";
    return ejecutarConsulta($sql);
 }

 public function listarassistance_today($idpeople,$date_at,$date_end){

    $sql = "SELECT max(a.status) as numbertotal from assistance a WHERE a.idpeople='$idpeople' and date(a.fecha_star)>='$date_at' and Date(a.fecha_star)<='$date_end' and a.kind_id=1";
    return ejecutarConsulta($sql);
 }



 public function listarholidays($date_star){
    $sql="SELECT date(start) as dateholidays FROM calendar where date(start)='$date_star' and  status=1 and tipo=1";
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
    $sql = "SELECT a.idassistance,a.kind_id,a.fecha_star ,COUNT(a.idpeople) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and a.kind_id='1' and a.status='0' GROUP BY a.idpeople";
    return ejecutarConsulta($sql);
 }


 public function listar_a_tem($idpeople,$date_star,$date_end,$timestar){
    $sql = "SELECT a.idassistance,a.kind_id,DATE_FORMAT(a.fecha_star,'%H:%i:%S')as timestar ,COUNT(a.idpeople) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<'$date_end' and a.kind_id='1' and a.status='0' and DATE_FORMAT(a.fecha_star,'%H:%i')<='$timestar' GROUP BY a.idpeople";
    return ejecutarConsulta($sql);
 }

 public function listar_a_tar($idpeople,$date_star,$date_end,$timestar){
    $sql = "SELECT a.idassistance,a.kind_id,DATE_FORMAT(a.fecha_star,'%H:%i:%S')as timestar ,COUNT(a.idpeople) as total FROM assistance a WHERE a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')>='$date_star' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')<='$date_end' and a.kind_id='1' and a.status='0' and DATE_FORMAT(a.fecha_star,'%H:%i')>'$timestar' GROUP BY a.idpeople";
    return ejecutarConsulta($sql);
 }




public function list_people($idpeople,$anio_peoget){
  $sql = "SELECT * FROM people p WHERE  p.idpeople='$idpeople' and anio_peo='$anio_peoget'";
  return ejecutarConsulta($sql);
}



}

?>