<?php
require_once "../models/ImportCSV.php";
$DBobj=new Import();
include('../resource/phpqrcode/qrlib.php');
 
$calidad='H';
$tamanio=5;
$borde=1;
$image_location = "../resource/files/qrcodes/";

			
			

switch ($_GET["op"]){
	case 'saveupdate':
			
			$csv =isset($_POST["file-es"])? limpiarCadena($_POST["file-es"]):"";
			$csv = $_FILES['file-es']['tmp_name'];
			$anio_peo=date("Y");

			if ($csv==null) {
				echo $rspta='sin datos que importar';
			} else {
				$handle = fopen($csv,'r');

				while ($data = fgetcsv($handle,10000,",","'")){
					$linea[]=array('lastname_peo' =>$data[0],'name_peo' =>$data[1],'tipodoc_peo' =>$data[2],'numberdoc_peo' =>$data[3],'datos1_peo' =>$data[4] ,'datos2_peo' =>$data[5],'codpostal_peo' =>$data[6],'phone_peo' =>$data[7],'mail_peo' =>$data[8],'tipo_peo' =>$data[9]);
					}

				foreach ($linea as $indice) {
					$lastname_peo=utf8_encode($indice["lastname_peo"]);
					$name_peo=utf8_encode($indice["name_peo"]);
					$tipodoc_peo=$indice["tipodoc_peo"];
					$numberdoc_peo=$indice["numberdoc_peo"];
					$datos1_peo=utf8_encode($indice["datos1_peo"]);
					$datos2_peo=utf8_encode($indice["datos2_peo"]);
					$codpostal_peo=$indice["codpostal_peo"];
					$phone_peo=$indice["phone_peo"];
					$mail_peo=$indice["mail_peo"];
					$tipo_peo=$indice["tipo_peo"];
					$codigo=$indice["numberdoc_peo"].".png";

					QRcode::png($numberdoc_peo, $image_location.$codigo,$calidad,$tamanio,$borde);
					$rspta=$DBobj->insert($lastname_peo,$name_peo,$tipodoc_peo,$numberdoc_peo,$datos1_peo,$datos2_peo,$codpostal_peo,$phone_peo,$mail_peo,$tipo_peo,$anio_peo,$codigo);
				}


			if (empty($rspta)){
				$rspta="registros no se pudieron importar";
			}else{
				$rspta="registros importados Satisfactoriamente";
			}

		echo json_encode($rspta); 

			}
			

	break;


}
?> 