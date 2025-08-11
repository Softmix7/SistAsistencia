<?php 
ob_start();

 $cardfondo="#".$_REQUEST["cardfondo"];
 $cardtexto="#".$_REQUEST["cardtexto"];

$card1=$_REQUEST["card1"];
$card2=$_REQUEST["card2"];
$tipo_peo=$_REQUEST["tipo_peo"];
$anio_peo=$_REQUEST["anio_peo"];

include '../models/Entity.php';
$entity=new Entity();
$obj = $entity->listar();
$rows=$obj->fetch_object();
$institucion=$rows->nombre_en; 

 
include '../models/Card.php';
$card = new Card();

if (empty($card1) and empty($card2)) {
	$rspta = $card->card_group($tipo_peo,$anio_peo);
}else{
	$rspta = $card->card_study($tipo_peo,$card1,$card2,$anio_peo);
}

 


require_once __DIR__ . '/../resource/domPdf/vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html="";
$html.="
 <link rel='stylesheet' href='css/styles.css'>	


<table style='height:82mm;'>
			<tr>";

 $w=1;
 $i=1;

    while($reg= $rspta->fetch_object()){ 

      $id = $reg->idpeople;
      $tipo_personal = $reg->tipo_peo ;
      $name = $reg->name_peo ;
      $apellidos = $reg->lastname_peo;
      $dni = $reg->numberdoc_peo;
      $datos1 = $reg->datos1_peo ;
      $datos2 = $reg->datos2_peo ;
			$codigo=$reg->qrcode;
			$imagencrop =$reg->imagencrop;

			if (empty($imagencrop)) {
				$img="";

			}else{
					$img="<img src='../resource/files/photo/".$imagencrop."' style='display: block;margin-left: auto;margin-right: auto;width: 100%; text-align: center !important;border-radius:44px 44px 44px 44px;' >";
			}


      if ($tipo_personal=="Estudiante" and is_numeric($datos1)) {
      	$datos1 = "Grado : ". $datos1;
      	$datos2 = "Seccion : ". $datos2;
      }else if($tipo_personal=="Estudiante" and is_string($datos1)){
				$datos1 =  $datos1;
      			$datos2 =  $datos2;
      }

 $i++;

	$html.=	"<td class='line_carnet' style='height:82mm;position: absolute;'>
	<div class='divbodyright' style='background-color:".$cardfondo.";height:82mm;width:50mm;position: absolute; '>

	<div style='height:9mm;width:100%; background-color: ".$cardfondo.";  color: ".$cardtexto.";font-size: 10pt; position: absolute; text-align: center;line-height: 22px;overflow:hidden;font-family: sqr721bc;'>".$institucion."</div>

	<div style='width:100%; background-color:#FFFFFF; margin-right: 0.4rem; margin-left: 0.4rem; margin-top: 9mm; height:71mm;; border-radius: 0.5rem;position: absolute;'>
			
			<div style='height:23mm;width:23mm;position: absolute;margin-top: 1mm;margin-left: 12mm; border-radius:44px 44px 44px 44px;border: 0.001px #8E8E8E solid;'>".$img."</div>

			<div style='height:8mm;width:100%; margin-right: 1mm; margin-left: 1mm;background-color: ".$cardfondo.";color:".$cardtexto.";position: absolute;margin-top:25mm;border-radius:6px;font-size: 8pt;text-align: center;line-height: 0.8;vertical-align: middle;'>
			".$apellidos."<br>".$name." 


			</div>
			
			<div style='height:3.5mm;width:100%; margin-right: 1mm; margin-left: 1mm;position: absolute;margin-top: 34mm;font-size: 8pt;text-align: center;'> 
					<span style='line-height: 10px;left: 50%;top: 50%;'>".$datos1."</span>
			 </div>

			<div style=';height:3.5mm;width:100%; margin-right: 1mm; margin-left: 1mm;position: absolute;margin-top: 37.5mm;font-size: 8pt;text-align: center;'> 
					<span style='line-height: 10px;left: 50%;top: 50%;'>".$datos2."</span>
			 </div>


			<div style='height:28mm;width:100%; margin-right: 1mm; margin-left: 1mm;overflow:hidden;position: absolute;margin-top:42mm'>


			<div style='height:28mm;width:20%;position: absolute;font-size: 8pt;' >
					 <p style='transform: rotate(-90deg);padding-left:-28px'>".$dni."</p>  
			</div>

			<div style='height:28mm;width:80%; position: absolute; margin-left:10mm' >
				<img src='../resource/files/qrcodes/".$codigo."' style='width: 6.6rem;position: absolute;display: block;margin-left: auto;margin-right: auto; text-align: center !important;'>
			</div>

			</div>




		</div>

	</div>
	</td>";

	 if(($i%5) ==1){
			$html.="</tr>";
			$w++;
				}
				
}
	$html.=	"</table>";
ob_end_clean();
$dompdf->setPaper('A4', 'landscape');
$dompdf ->set_option('defaultFont','Courier');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('invoice.pdf',array("Attachment"=>false));
