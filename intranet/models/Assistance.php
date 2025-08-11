<?php 

require "../config/Conexion.php";

Class Assistance
{

	public function __construct(){
 
	} 


	public function listar($tipo_peoget,$anio_peoget){
     $sql = "SELECT a.idassistance,a.kind_id,p.tipo_peo ,p.lastname_peo,p.name_peo,p.datos1_peo,p.datos2_peo,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as fecha,DATE_FORMAT(a.fecha_star,'%H:%i:%S') as time_star, DATE_FORMAT(a.fecha_end,'%H:%i:%S') as time_end,p.numberdoc_peo FROM assistance a inner join people p on a.idpeople=p.idpeople where p.tipo_peo='$tipo_peoget' and p.anio_peo='$anio_peoget' and DATE_FORMAT(a.fecha_star,'%Y')='$anio_peoget'  order by a.idassistance desc ";
        return ejecutarConsulta($sql);
    }



    public function update($idassistance,$idpeople,$newdatestar)
    {
        $sql="UPDATE assistance a SET a.idpeople='$idpeople',a.fecha_star='$newdatestar',a.fecha_end=NULL WHERE a.idassistance='$idassistance'";
        return ejecutarConsulta($sql);
    }


    public function update_2($idassistance,$idpeople,$newdatestar,$newdateend)
    {
        $sql="UPDATE assistance a SET a.idpeople='$idpeople',a.fecha_star='$newdatestar',a.fecha_end='$newdateend' WHERE a.idassistance='$idassistance'";
        return ejecutarConsulta($sql);
    }


    public function view($idassistance){

        $sql="SELECT a.idassistance,p.idpeople,p.name_peo,p.lastname_peo,DATE_FORMAT(a.fecha_star,'%H:%i') as timestar,DATE_FORMAT(a.fecha_star,'%Y-%m-%d') as datestar,DATE_FORMAT(a.fecha_end,'%H:%i') as timeend,DATE_FORMAT(a.fecha_end,'%Y-%m-%d') as dateend FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE idassistance='$idassistance'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function delete($idassistance)
    {
        $sql="DELETE FROM assistance WHERE idassistance='$idassistance'";
        return ejecutarConsulta($sql);
    }


}

?>

