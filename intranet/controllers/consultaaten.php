<?php
date_default_timezone_set('America/Lima');
require_once "../models/Consultaaten.php";
$Obj=new Consultaaten();

switch ($_GET["op"]){

  
case 'listar':
    $anio_peoget= $_REQUEST['anio_peoget'];

    $rspta=$Obj->listar($anio_peoget);
    $data= Array();
    $i = 1;
    while ($reg=$rspta->fetch_object()){

        $ext= pathinfo($reg->adjunto, PATHINFO_EXTENSION);

        if ($ext=="pdf") {
            $file='<img src="../resource/files/iconfiles/pdf.png" alt="imagen"  height="30">';
        } else if($ext=="doc" or $ext=="docx" ){
            $file='<img src="../resource/files/iconfiles/word.png" alt="word"  height="30">';
        } else {
            $file='<img src="../resource/files/iconfiles/excel.png" alt="word"  height="30">';
        }


        $data[]=array(
            "0"=>$i,
            "1"=>$reg->num_exp,
            "2"=>$reg->ape_paterno.' '. $reg->ape_materno.', '. $reg->nombre,
            "3"=>'<a href="#"  onclick="viewdetalle('.$reg->iduserform.',\''.$reg->num_exp.'\',\''.$reg->asunto.'\',\''.$reg->descripcion.'\',\''.$reg->fecha.'\',\''.$reg->ape_paterno.'\',\''.$reg->ape_materno.'\',\''.$reg->nombre.'\',\''.$reg->telefono.'\',\''.$reg->celular.'\',\''.$reg->correo.'\',\''.$reg->direccion.'\',\''.$reg->document.'\');" > <i class="fas fa-eye" style="font-size: 20px;"></i></a>',
            "4"=>$reg->msj_usu,
            "5"=>$reg->fech_actual,
            "6"=>'<a href="../resource/files/docatendidos/'.$reg->adjunto.'" download="DOC ATENDIDO">'.$file.' </a>', 
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
