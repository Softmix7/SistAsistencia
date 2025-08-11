<?php 

require "../config/Conexion.php";

Class Form_id{

	public function __construct(){
 
	} 


    public function listar_assistancehoy(){
     $sql = "SELECT * FROM assistance a  where DATE_FORMAT(a.fecha_star,'%Y-%m-%d')=curdate()";
        return ejecutarConsulta($sql);
    }


	public function listar_assistance($identificacion){
     $sql = "SELECT a.idassistance,a.idpeople,a.fecha_star,a.fecha_end,a.kind_id, a.status,p.lastname_peo,p.name_peo,p.mail_peo FROM assistance a inner join people p on a.idpeople=p.idpeople where DATE(a.fecha_star)=curdate() and p.numberdoc_peo='$identificacion' ORDER by a.fecha_star desc limit 1";
        return ejecutarConsulta($sql);
    }


    public function listar_personal($identificacion,$anio){
    $sql = "SELECT idpeople,numberdoc_peo,lastname_peo,name_peo,mail_peo FROM  people where numberdoc_peo='$identificacion' and status_peo='1' and anio_peo='$anio'";
        return ejecutarConsulta($sql);
    }


    public function insert($idpeople,$hoy,$status){
        $sql="INSERT INTO assistance (idpeople,kind_id,fecha_star,fecha_end,descripcion,status)
        VALUES ('$idpeople',1,'$hoy',null,null,'$status')";
        return ejecutarConsulta($sql);
    }



    public function update($idassistance,$hoy){
        $sql="UPDATE assistance SET fecha_end='$hoy' WHERE idassistance='$idassistance'";
        return ejecutarConsulta($sql);
    }


    public function max_timestar(){
    $sql = "SELECT a.idassistance,DATE_FORMAT(fecha_star,'%H:%i:%S') as time_star,max(DATE_FORMAT(fecha_end,'%H:%i:%S'))as time_end FROM  assistance a where DATE_FORMAT(fecha_star,'%Y-%m-%d')=curdate() order by DATE_FORMAT(fecha_star,'%H:%i:%S') desc";
        return ejecutarConsulta($sql);
    }


    public function max_timeend(){
    $sql = "SELECT a.idassistance,max(DATE_FORMAT(fecha_star,'%H:%i:%S')) as time_star, DATE_FORMAT(fecha_end,'%H:%i:%S')as time_end FROM  assistance a where DATE_FORMAT(fecha_star,'%Y-%m-%d')=curdate() order by DATE_FORMAT(fecha_end,'%H:%i:%S') desc";
        return ejecutarConsulta($sql);
    }



     public function listartimeend(){
        $sql="SELECT DATE_FORMAT(a.fecha_star,'%H:%i:%S') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i:%S') as time_end,p.lastname_peo,p.name_peo FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')=curdate() and a.kind_id='1' order by DATE_FORMAT(a.fecha_end,'%H:%i:%S') desc LIMIT 1";
        return ejecutarConsulta($sql);      
    }

     public function listartimestar(){
        $sql="SELECT DATE_FORMAT(a.fecha_star,'%H:%i:%S') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i:%S') as time_end,p.lastname_peo,p.name_peo FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')=curdate() and a.kind_id='1' order by DATE_FORMAT(a.fecha_star,'%H:%i:%S') desc LIMIT 1";
        return ejecutarConsulta($sql);      
    }

    public function listar(){
        $sql="SELECT DATE_FORMAT(a.fecha_star,'%H:%i:%S') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i:%S') as time_end,p.lastname_peo,p.name_peo FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE DATE_FORMAT(a.fecha_star,'%Y-%m-%d')=curdate() and a.kind_id='1'  order by a.idassistance desc LIMIT 1";
        return ejecutarConsulta($sql);      
    }


    public function listarentity(){
        $sql="SELECT * FROM entity";
        return ejecutarConsulta($sql);      
    } 

}

?>

 