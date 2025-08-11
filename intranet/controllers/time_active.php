<?php 
require_once "../models/Time_active.php";
$BDobj=new Timeactive();

$idtimeactive=isset($_POST["idtimeactive"])? limpiarCadena($_POST["idtimeactive"]):"";
$horain_get=isset($_POST["horain"])? limpiarCadena($_POST["horain"]):"";
$horafin_get=isset($_POST["horafin"])? limpiarCadena($_POST["horafin"]):"";

$horain=date("H:i", strtotime($horain_get));
$horafin=date("H:i", strtotime($horafin_get));

switch ($_GET["op"]){

	case 'saveupdate': 

		if (empty($idtimeactive)){
			$rspta=$BDobj->insert($horain,$horafin);
			echo $rspta ? "registro guardado" : "registro no se pudo guardar";
		}else {
			$rspta=$BDobj->update($idtimeactive,$horain,$horafin);
			echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
		}
	break;

	case 'view':
		$rspta=$BDobj->view($idtimeactive);
		echo json_encode($rspta); 
	break;


	case 'listar':
	$rspta=$BDobj->listar();
	$data= Array();
	$i = 1;

	while ($reg=$rspta->fetch_object()){
		$data[]=array(
			"0"=>$i,
			"1"=>$reg->inicio,
			"2"=>$reg->fin,
			"3"=>'<a href="#" onclick="view('.$reg->idtimeactive.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a>',
		);$i++;
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