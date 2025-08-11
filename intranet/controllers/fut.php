<?php 
require_once "../models/Fut.php";
$DBobj=new Fut();


$idfut=isset($_POST["idfut"])? limpiarCadena($_POST["idfut"]):"";

$fileactual=isset($_POST["fileactual"])? limpiarCadena($_POST["fileactual"]):"";


switch ($_GET["op"]){

	case 'saveupdate':


        $ext = explode(".", $_FILES["filedocument"]["name"]);
        $new_name_file = null;

        if (end($ext) == 'doc' or end($ext) == 'docx' or end($ext) == 'pdf') {
            $dir = '../resource/files/fut/';


            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $new_name_files = round(microtime(true));
            $new_name_file = $new_name_files. '.' . end($ext);
            if (copy($_FILES["filedocument"]["tmp_name"], $dir. $new_name_file)) {
                
            }
        } 


	if ($new_name_file!="") {
		$ruta=is_file('../resource/files/fut/'.$fileactual);
		if ($ruta<>NULL) {
			unlink('../resource/files/fut/'.$fileactual);
			$rspta=$DBobj->update($idfut,$new_name_file);
			echo $rspta ? "Documento actualizado correctamente" : "imagen no se pudo actualizar";
		}else{
			$rspta=$DBobj->update($idfut,$new_name_file);
			echo $rspta ? "Documento actualizado correctamente" : "imagen no se pudo actualizar";
		}

	}else{
		$rspta=$DBobj->update($idfut,$fileactual);
		echo $rspta ? "Documento actualizado correctamente" : "imagen no se pudo actualizar";
	}

	break;


	case 'view':
		$rspta=$DBobj->view($idfut);
		echo json_encode($rspta); 
	break;


	case 'listar':
	$rspta=$DBobj->listar();
	$data= Array();

	while ($reg=$rspta->fetch_object()){

		$ext= pathinfo($reg->fut_document, PATHINFO_EXTENSION);

		if ($ext=="pdf") {
			$file='<img src="../resource/files/iconfiles/pdf.png" alt="imagen"  height="30">';
		}  else{
			$file='<img src="../resource/files/iconfiles/word.png" alt="word"  height="30">';
		}

		$data[]=array(
			"0"=>'#',
			"1"=>'<a href="../resource/files/fut/'.$reg->fut_document.'" download="FORMULARIO SOLICITUD">'.$file.' </a>',
			"2"=>'<a href="#" onclick="view('.$reg->idfut.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a>',
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