<?php 
require_once "../models/Period.php";
$BDobj=new Period();

$idperiod=isset($_POST["idperiod"])? limpiarCadena($_POST["idperiod"]):"";
$name_per=isset($_POST["name_per"])? limpiarCadena($_POST["name_per"]):"";


switch ($_GET["op"]){

	case 'saveupdate':

		if (empty($idperiod)){
			$rspta=$BDobj->insert($name_per);
			echo $rspta ? "registro guardado" : "registro no se pudo guardar";
		}else {
			$rspta=$BDobj->update($idperiod,$name_per);
			echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
		}
	break;

	case 'view':
		$rspta=$BDobj->view($idperiod);
		echo json_encode($rspta); 
	break;


	case 'listar':
	$rspta=$BDobj->listar();
	$data= Array();
	$i = 1;

	while ($reg=$rspta->fetch_object()){
		$data[]=array(
			"0"=>$i,
			"1"=>$reg->name_per,
			"2"=>'<a href="#" onclick="view('.$reg->idperiod.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a>',
		);$i++;
	}
	$results = array(
 			"sEcho"=>1, 
 			"iTotalRecords"=>count($data), 
 			"iTotalDisplayRecords"=>count($data),
 			"aaData"=>$data);
	echo json_encode($results);

	break;


	case 'listperiod':
		$rspta_period = $BDobj->listar();
		while ($reg = $rspta_period->fetch_object()){
					echo '<option value=' . $reg->name_per . '> ' . $reg->name_per . '</option>';
			}
	break;


}
?>