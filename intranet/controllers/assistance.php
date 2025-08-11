<?php
date_default_timezone_set('America/Lima');
require_once "../models/Assistance.php";
$Obj=new Assistance();

$idassistance=isset($_POST["idassistance"])? limpiarCadena($_POST["idassistance"]):"";
$idpeople=isset($_POST["idpeople"])? limpiarCadena($_POST["idpeople"]):"";
$timestar=isset($_POST["timestar"])? limpiarCadena($_POST["timestar"]):"";
$timeend=isset($_POST["timeend"])? limpiarCadena($_POST["timeend"]):"";
$datestar=isset($_POST["datestar"])? limpiarCadena($_POST["datestar"]):"";
$dateend=isset($_POST["dateend"])? limpiarCadena($_POST["dateend"]):"";

$newdatestar= date($datestar." ".$timestar);


$newdate=date('Y-m-d');
if ($dateend=="") {
    $newdateend= date($newdate." ".$timeend);
}else{
    $newdateend= date($dateend." ".$timeend);
}


switch ($_GET["op"]){

case 'saveupdate':

    if (empty($timeend)) {
        $rspta=$Obj->update($idassistance,$idpeople,$newdatestar);
        echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
    }else {
        $rspta=$Obj->update_2($idassistance,$idpeople,$newdatestar,$newdateend);
        echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
    }
    break;

case 'delete':
        $idassistance=$_GET['idassistance'];
        $rspta=$Obj->delete($idassistance);
        echo $rspta ? "registro eliminado" : "registro no se puede eliminar";
    break;

case 'view':
    $rspta=$Obj->view($idassistance);
    echo json_encode($rspta);
    break;
     

case 'listar':
    $tipo_peoget=$_REQUEST['tipo_peoget'];
    $anio_peoget= $_REQUEST['anio_peoget'];

    $rspta=$Obj->listar($tipo_peoget,$anio_peoget);
    $data= Array();
    $i = 1;
    while ($reg=$rspta->fetch_object()){

            if ($reg->kind_id==2) {
                $time_star="Justificado";
            } else if($reg->kind_id==3) {
                $time_star="Inasistencia";
            } else {
                $time_star=Date('g:i A',strtotime($reg->time_star));
            }


        $data[]=array(
            "0"=>$i,
            "1"=>$reg->lastname_peo.' ,'. $reg->name_peo,
            "2"=>$reg->numberdoc_peo,
            "3"=>$reg->datos1_peo,
            "4"=>$reg->datos2_peo,
            "5"=>$reg->fecha, 
            "6"=>$time_star,
            "7"=>($reg->time_end)? Date('g:i A',strtotime($reg->time_end)):$reg->time_end,
            "8"=>($reg->kind_id==2 or $reg->kind_id==3)?'<a href="#" onclick="delet(' . $reg->idassistance.')"><i data-toggle="tooltip" title="Modificar" class="fas fa-trash-alt" style="color: rgb(255, 0, 0);"></i></a>':
            ' <a href="#" onclick="delet(' . $reg->idassistance.')"><i data-toggle="tooltip" title="Modificar" class="fas fa-trash-alt" style="color: rgb(255, 0, 0);"></i>'. ' <a href="#"  onclick="view('.$reg->idassistance.'); "><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a>' 
            ,
            
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
