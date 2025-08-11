

<?php
require "../config/Conexion.php";
Class Consulta {

 
	function __construct(){

	}

    public function insert($numeroDocDNIStr,$nombresStr,$apellidoPaternoStr,$apellidoMaternoStr,$telefonoStr,$celularStr,$correoStr,$direccionStr,$asuntoStr,$descripcionStr,$new_name_file,$fecha){
        $sql="INSERT INTO consulta (dni,nombre,ape_paterno,ape_materno,telefono,celular,correo,direccion,asunto,descripcion,document,num_exp,fecha,condicion)
        VALUES ('$numeroDocDNIStr','$nombresStr','$apellidoPaternoStr','$apellidoMaternoStr','$telefonoStr','$celularStr','$correoStr','$direccionStr','$asuntoStr','$descripcionStr','$new_name_file',null,'$fecha',1)";
        return ejecutarConsulta_retornarID($sql);
    }



    public function update($rspta,$num_exp){
        $sql="UPDATE consulta SET num_exp='$num_exp' WHERE iduserform='$rspta'";
        return ejecutarConsulta($sql);
    }

    public function listar(){
        $sql="SELECT * FROM fut";
        return ejecutarConsulta($sql);      
    }


    public function listarentity(){
        $sql="SELECT * FROM entity";
        return ejecutarConsulta($sql);      
    }

}


?>