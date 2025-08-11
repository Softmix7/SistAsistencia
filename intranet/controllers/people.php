<?php 
require_once "../models/People.php";
include('../resource/phpqrcode/qrlib.php');
$BDobj=new People();

$idpeople=isset($_POST["idpeople"])? limpiarCadena($_POST["idpeople"]):"";
$lastname_peo=isset($_POST["lastname_peo"])? limpiarCadena($_POST["lastname_peo"]):"";
$name_peo=isset($_POST["name_peo"])? limpiarCadena($_POST["name_peo"]):"";
$tipodoc_peo=isset($_POST["tipodoc_peo"])? limpiarCadena($_POST["tipodoc_peo"]):"";
$numberdoc_peo=isset($_POST["numberdoc_peo"])? limpiarCadena($_POST["numberdoc_peo"]):"";
$datos1_peo=isset($_POST["datos1_peo"])? limpiarCadena($_POST["datos1_peo"]):"";
$datos2_peo=isset($_POST["datos2_peo"])? limpiarCadena($_POST["datos2_peo"]):"";
$codpostal_peo=isset($_POST["codpostal_peo"])? limpiarCadena($_POST["codpostal_peo"]):"";
$phone_peo=isset($_POST["phone_peo"])? limpiarCadena($_POST["phone_peo"]):"";
$mail_peo=isset($_POST["mail_peo"])? limpiarCadena($_POST["mail_peo"]):"";

$tipo_peo=isset($_POST["tipo_peo"])? limpiarCadena($_POST["tipo_peo"]):"";
$anio_peo=isset($_POST["anio_peo"])? limpiarCadena($_POST["anio_peo"]):"";


$numberdocimg_peo=isset($_POST["numberdocimg_peo"])? limpiarCadena($_POST["numberdocimg_peo"]):"";
$year=date("Y-m-d");
$calidad='H';
$tamanio=5;
$borde=1;



switch ($_GET["op"]){

	case 'saveupdate':

		if (empty($idpeople)){
			$image_location = "../resource/files/qrcodes/";
			$codigo= $numberdoc_peo.'.png';
			QRcode::png($numberdoc_peo, $image_location.$codigo,$calidad,$tamanio,$borde);

			$rspta=$BDobj->insert($lastname_peo,$name_peo,$tipodoc_peo,$numberdoc_peo,$datos1_peo,$datos2_peo,$codpostal_peo,$phone_peo,$mail_peo,$tipo_peo,$anio_peo,$codigo);
			echo $rspta ? "registro guardado" : "registro no se pudo guardar";
		}else {

			if ($numberdoc_peo<>$numberdocimg_peo) {
				unlink('../resource/files/qrcodes/'.$numberdocimg_peo.'.png');
			} 

			$image_location = "../resource/files/qrcodes/";
			$codigo = $numberdoc_peo.'.png';
			QRcode::png($numberdoc_peo, $image_location.$codigo,$calidad,$tamanio,$borde);

			$rspta=$BDobj->update($idpeople,$lastname_peo,$name_peo,$tipodoc_peo,$numberdoc_peo,$datos1_peo,$datos2_peo,$codpostal_peo,$phone_peo,$mail_peo,$codigo);
			echo $rspta ? "registro actualizado" : $rspta;
		}
	break;


case 'imagencrop':

			$imagenamecrop=$_REQUEST['imgcrop'];
			$idpeoplecrop=$_REQUEST['idpeoplecrop'];

		    $data = $_POST['image'];
		    $image_array_1 = explode(";", $data);
		    $image_array_2 = explode(",", $image_array_1[1]);
		    $base64_decode = base64_decode($image_array_2[1]);

		    $path_img = '../resource/files/photo/'.time().'.png';
		    $imagename = ''.time().'.png';
		    file_put_contents($path_img, $base64_decode);

		if (empty($imagenamecrop)) {
			$rspta=$BDobj->updateimagencrop($idpeoplecrop,$imagename);
			echo $path_img;

		} else {
			unlink('../resource/files/photo/'.$imagenamecrop);
			$rspta=$BDobj->updateimagencrop($idpeoplecrop,$imagename);
			echo $path_img;
		}

break;



	case 'view':
		$rspta=$BDobj->view($idpeople);
		echo json_encode($rspta); 
	break;


	case 'delete':
		$idpeople=$_GET['idpeople'];
		$rspta=$BDobj->delete($idpeople);
 		echo $rspta ? "registro eliminado" : "registro no se puede eliminar";
	break;	


	case 'inactive':
		$rspta=$BDobj->inactive($idpeople);
 		echo $rspta ? "Registro Desactivado" : "registro no se puede desactivar";
	break;
 
	case 'active':
		$rspta=$BDobj->active($idpeople);
 		echo $rspta ? "Registro activado" : "registro no se puede activar";
	break;


	case 'listar':
    $tipo_peoget=$_REQUEST['tipo_peoget'];
    $anio_peoget= $_REQUEST['anio_peoget'];

	$rspta=$BDobj->listar($tipo_peoget,$anio_peoget);
	$data= Array();
	$i = 1;

	while ($reg=$rspta->fetch_object()){

		if ($reg->status_peo=="1") {


				$status='<div class="vc-toggle-container" style="--vc-off-color: gray" onclick="inactive('.$reg->idpeople.')" >
				          <label class="vc-switch" >
				            <input type="checkbox" checked  class="vc-switch-input" id="marc'.$reg->idpeople.'" />
				            <span data-on="Activado" data-off="Desactivado" class="vc-switch-label"></span>
				            <span class="vc-handle"></span>
				          </label>
				        </div>';

		}else{
			$status='<div class="vc-toggle-container" style="--vc-off-color: gray" onclick="active('.$reg->idpeople.')" >
				          <label class="vc-switch" >
				            <input type="checkbox" class="vc-switch-input" id="marc'.$reg->idpeople.'" />
				            <span data-on="Activado" data-off="Desactivado" class="vc-switch-label"></span>
				            <span class="vc-handle"></span>
				          </label>
				        </div>';
		}

		$data[]=array(
			"0"=>$i,
			"1"=>$reg->lastname_peo,
			"2"=>$reg->name_peo,
			"3"=>$reg->tipodoc_peo .' '. $reg->numberdoc_peo ,
			"4"=>$reg->datos1_peo,
			"5"=>$reg->datos2_peo,
			"6"=>$reg->codpostal_peo .' '. $reg->phone_peo,
			"7"=>$reg->mail_peo,
			"8"=>$status,
			"9"=>'<a href="#" onclick="imagencrop('.$reg->idpeople.',\''.$reg->imagencrop.'\');"><i class="fas fa-camera-retro"></i></a> <a href="#" onclick="view('.$reg->idpeople.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a> <a href="#" onclick="delet('.$reg->idpeople.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-trash-alt" style="color: rgb(255, 0, 0);"></i></a> ',
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

		$rspta_group = $BDobj->listar();

		while ($reg = $rspta_group->fetch_object()){
					echo '<option value=' . $reg->lastname_peo . '> ' . $reg->lastname_peo . '</option>';

			}
	break;


}
?>