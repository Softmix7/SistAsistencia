<?php
date_default_timezone_set('America/Lima');
require_once "../models/Consultarech.php";
$Obj=new Consultarech();

switch ($_GET["op"]){


case 'listar':
    $anio_peoget= $_REQUEST['anio_peoget'];

    $rspta=$Obj->listar($anio_peoget);
    $data= Array();
    $i = 1;
    while ($reg=$rspta->fetch_object()){

        $data[]=array(
            "0"=>$i,
            "1"=>$reg->num_exp,
            "2"=>$reg->ape_paterno.' '. $reg->ape_materno.', '. $reg->nombre,
            "3"=>'<a href="#"  onclick="viewdetalle('.$reg->iduserform.',\''.$reg->num_exp.'\',\''.$reg->asunto.'\',\''.$reg->descripcion.'\',\''.$reg->fecha.'\',\''.$reg->ape_paterno.'\',\''.$reg->ape_materno.'\',\''.$reg->nombre.'\',\''.$reg->telefono.'\',\''.$reg->celular.'\',\''.$reg->correo.'\',\''.$reg->direccion.'\',\''.$reg->document.'\');" > <i class="fas fa-eye" style="font-size: 20px;"></i></a>',
            "4"=>$reg->msj_usu,
            "5"=>$reg->fech_actual,
        );

        $i++;
    }
    $results = array(
            "sEcho"=>1, 
            "iTotalRecords"=>count($data), 
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
    echo json_encode($results);

    break;

}

?>
