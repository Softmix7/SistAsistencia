<?php 

require "../config/Conexion.php";

Class Checkout{

	public function __construct(){

	} 


	public function listar(){
		$sql="SELECT * FROM groups where status_group='1' order by idgroup desc";
		return ejecutarConsulta($sql);		
	}



	public function listgroup_student($anio_peoget){
		$sql="SELECT p.idpeople,p.tipo_peo,p.datos1_peo,p.datos2_peo,p.anio_peo FROM people p where p.tipo_peo='Estudiante' and p.anio_peo='$anio_peoget' group by p.datos1_peo,p.datos2_peo order by p.datos1_peo,p.datos2_peo asc";
		return ejecutarConsulta($sql);		
	}


	public function liststudent($tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget){
		$sql="SELECT p.idpeople,p.lastname_peo,p.name_peo FROM people p where p.tipo_peo='$tipo_peo' and p.datos1_peo='$datos1_peo' and p.datos2_peo='$datos2_peo' and p.anio_peo='$anio_peoget' order by p.lastname_peo asc";
		return ejecutarConsulta($sql);		
	}

	public function listother($tipo_peo,$anio_peoget){
		$sql="SELECT p.idpeople,p.lastname_peo,p.name_peo FROM people p where p.tipo_peo='$tipo_peo' and p.anio_peo='$anio_peoget' order by p.lastname_peo asc";
		return ejecutarConsulta($sql);		
	}



	public function listarassistance($idpeople,$date_at){
     $sql = "SELECT * from assistance a where a.idpeople='$idpeople' and DATE_FORMAT(a.fecha_star,'%Y-%m-%d')='$date_at'";
        return ejecutarConsulta($sql);
    }





    public function insert($idpeople,$date){
			$sql = "INSERT INTO assistance (idpeople,kind_id,fecha_star) VALUES ('$idpeople','3','$date')";
			return ejecutarConsulta($sql);
    }


    public function insertjustification($idpeople,$date,$descripcion){
			$sql = "INSERT INTO assistance (idpeople,kind_id,fecha_star,descripcion) VALUES ('$idpeople','2','$date','$descripcion')";
			return ejecutarConsulta($sql);
    }


   public function update($idassistance,$descripcion){
    	$sql="UPDATE assistance SET descripcion='$descripcion' WHERE idassistance='$idassistance'";
		return ejecutarConsulta($sql);
	}

   public function updatedelete($idassistance){
    	$sql="UPDATE assistance SET kind_id='3', descripcion='' WHERE idassistance='$idassistance'";
		return ejecutarConsulta($sql);
	}


	public function listcurdate($date)
    {
     $sql = "SELECT * from assistance a where DATE_FORMAT(a.fecha_star,'%Y-%m-%d')='$date'";
        return ejecutarConsulta($sql);
    }


}

?>