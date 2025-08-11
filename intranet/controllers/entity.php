<?php 
require_once "../models/Entity.php";
$BDobj=new Entity();


$identity=isset($_POST["identity"])? limpiarCadena($_POST["identity"]):"";
$nombre_en=isset($_POST["nombre_en"])? limpiarCadena($_POST["nombre_en"]):"";
$direccion_en=isset($_POST["direccion_en"])? limpiarCadena($_POST["direccion_en"]):"";
$telefono_en=isset($_POST["telefono_en"])? limpiarCadena($_POST["telefono_en"]):"";

$identityimg=isset($_POST["identityimg"])? limpiarCadena($_POST["identityimg"]):"";
$logo=isset($_POST["logo"])? limpiarCadena($_POST["logo"]):"";
$logoactual=isset($_POST["logoactual"])? limpiarCadena($_POST["logoactual"]):"";


switch ($_GET["op"]){

	case 'saveupdate':
		$rspta=$BDobj->update($identity,$nombre_en,$direccion_en,$telefono_en);
		echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
	break;


	case 'updateimg':

	if (!file_exists($_FILES['logo']['tmp_name']) || !is_uploaded_file($_FILES['logo']['tmp_name'])){
		$logoac=$_POST["logoactual"];
	}else {
		$ext = explode(".", $_FILES["logo"]["name"]);

		if ($_FILES['logo']['type'] == "image/jpg" || $_FILES['logo']['type'] == "image/jpeg" || $_FILES['logo']['type'] == "image/png"){
			$logo = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES["logo"]["tmp_name"], "../resource/files/logo/" . $logo);
		}
	}


	if ($logo!="") {
		$ruta=is_file('../resource/files/logo/'.$logoactual);
		if ($ruta<>NULL) {
			unlink('../resource/files/logo/'.$logoactual);
			$rspta=$BDobj->updateimg($identityimg,$logo);
			echo $rspta ? "imagen actualizada" : "imagen no se pudo actualizar";
		}else{
			$rspta=$BDobj->updateimg($identityimg,$logo);
			echo $rspta ? "imagen actualizada" : "imagen no se pudo actualizar";
		}

	}else{
		$rspta=$BDobj->updateimg($identityimg,$logoac);
		echo $rspta ? "imagen actualizada" : "imagen no se pudo actualizar";
	}

	break;


	case 'view':
		$rspta=$BDobj->view($identity);
		echo json_encode($rspta); 
	break;


	case 'listar':
	$rspta=$BDobj->listar();
	$data= Array();

	while ($reg=$rspta->fetch_object()){
		$data[]=array(
			"0"=>$reg->nombre_en,
			"1"=>$reg->direccion_en,
			"2"=>$reg->telefono_en,
			"3"=>'<a href="../resource/files/logo/'.$reg->imagen_en.'" data-lighter><i class="fas fa-eye" style="font-size: 22px;"></i></a> 
			  <a href="#" onclick="viewimg('.$reg->identity.');"><i class="fas fa-sync-alt" style="font-size: 20px;"></i></a>',
			"4"=>'<a href="#" onclick="view('.$reg->identity.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a>',
		);
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