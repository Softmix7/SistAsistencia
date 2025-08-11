<?php 

require "../config/Conexion.php";

Class Card{ 

	public function __construct(){

	} 




	public function card_study($tipo_peo,$card1,$card2,$anio_peo){
     $sql = "SELECT * FROM people pe WHERE  pe.tipo_peo='$tipo_peo' and pe.datos1_peo='$card1'and pe.datos2_peo='$card2' and pe.anio_peo='$anio_peo'";
        return ejecutarConsulta($sql);
    }


    public function card_group($tipo_peo,$anio_peo){
                $sql = "SELECT * FROM people pe WHERE  pe.tipo_peo='$tipo_peo' and pe.anio_peo='$anio_peo' ";
        return ejecutarConsulta($sql);
    }


    public function identificacion($identificacion,$tipo_peo,$anio_peo) {
                $sql = "SELECT * FROM people pe WHERE  pe.numberdoc_peo='$identificacion' and pe.tipo_peo='$tipo_peo' and pe.anio_peo='$anio_peo' ";
        return ejecutarConsulta($sql);
    }

    

}

?>