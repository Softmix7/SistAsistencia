<?php 
date_default_timezone_set('America/Lima');
require "./../config/Conexion.php";

Class graphics{
  
	public function __construct(){ 

	}


    public function total_people($anio_peo){
        $sql="SELECT IFNULL(COUNT(p.idpeople),0) as total from  people p WHERE p.anio_peo='$anio_peo'";
        return ejecutarConsulta($sql);
    }

    public function total_group($anio_peo){
        $sql="SELECT IFNULL(COUNT(p.idpeople),0) as totalgroup,p.tipo_peo from   people p WHERE p.anio_peo='$anio_peo' group by p.tipo_peo";
        return ejecutarConsulta($sql);
    }


    public function barchartabsence($anio_peo){
        $sql="SELECT IFNULL(COUNT(a.idpeople),0) as total_student,CONCAT(p.name_peo,' ',p.lastname_peo) as nombre,p.tipo_peo FROM assistance a inner join people p on a.idpeople=p.idpeople WHERE YEAR(a.fecha_star)=YEAR(CURRENT_DATE()) and a.kind_id='3' GROUP BY a.idpeople,p.tipo_peo ORDER BY COUNT(a.idpeople) DESC LIMIT 0,12";
        return ejecutarConsulta($sql);
    }


}

?>
