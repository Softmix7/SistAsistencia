<?php 
date_default_timezone_set('America/Lima');
require "../config/Conexion.php";

Class Consultarec
{

	public function __construct(){
 
	} 


	public function listar($anio_peoget){
     $sql = "SELECT *,DATE_FORMAT(c.fecha,'%d-%m-%Y') as fechas,DATE_FORMAT(c.fecha,'%H:%i:%S') as hora FROM consulta c  where DATE_FORMAT(c.fecha,'%Y')='$anio_peoget' and c.condicion='1'  order by c.iduserform desc ";
        return ejecutarConsulta($sql);
    }

    public function insert($iduserform,$msj_usu,$fecha){
        $sql="INSERT INTO consulrech (iduserform,msj_usu,fech_actual)
        VALUES ('$iduserform','$msj_usu','$fecha')";
        return ejecutarConsulta($sql);
    }

    public function updatecondicion($iduserform,$condicion){
        $sql="UPDATE consulta a SET condicion='$condicion' WHERE iduserform='$iduserform'";
        return ejecutarConsulta($sql);
    }


    public function insert_rec($iduserforms,$sms,$new_name_file,$fech_actual){
        $sql="INSERT INTO consulaten (iduserform,msj_usu,adjunto,fech_actual)
        VALUES ('$iduserforms','$sms','$new_name_file','$fech_actual')";
        return ejecutarConsulta($sql);
    }

    public function update_rec($iduserforms){
        $sql="UPDATE consulta a SET condicion='2' WHERE iduserform='$iduserforms'";
        return ejecutarConsulta($sql);
    }

    public function listar_header(){
     $sql = "SELECT * FROM consulta c  where c.condicion='1'  order by c.iduserform desc limit 2 ";
        return ejecutarConsulta($sql);
    }

    public function cout_header(){
     $sql = "SELECT * FROM consulta c  where c.condicion='1' ";
        return ejecutarConsulta($sql);
    }
}

?>

