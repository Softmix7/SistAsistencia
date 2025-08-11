<?php 
ob_start();

 $cardfondo="#".$_REQUEST["cardfondo"];
 $cardtexto="#".$_REQUEST["cardtexto"];

$card1=$_REQUEST["card1"];
$card2=$_REQUEST["card2"];
$tipo_peo=$_REQUEST["tipo_peo"];
$anio_peo=$_REQUEST["anio_peo"];

include './../models/Entity.php';
$entity=new Entity();
$obj = $entity->listar();
$rows=$obj->fetch_object();
$institucion=$rows->nombre_en; 


include './../models/Card.php';
$card = new Card();

if ($card1==0 and $card2==0 ) {
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


<table  width='53mm'  style='font-size:10px; '  >
			<tr>";

 $w=0;
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

      if ($tipo_personal=="Estudiante" and is_numeric($datos1)) {
      	$datos1 = "Grado : ". $datos1;
      	$datos2 = "Seccion : ". $datos2;
      }else if($tipo_personal=="Estudiante" and is_string($datos1)){
				$datos1 =  $datos1;
      	$datos2 =  $datos2;
      }


    $i++;

	$html.=	"
				<td class='line_carnet' width='53mm'  >
					<table width='51.3mm' class='sub_table' >
				      	
				      	<tr >
					        <td class='colorheader' COLSPAN='3' height='8.56mm' style='border:0.01px ".$cardfondo." 0.01px solid; background-color: ".$cardfondo.";color: ".$cardtexto.";' >".$institucion."</td>
				      	</tr>

				      

				      	<tr>
					        <td  height='11.274mm' style='border: 0.01px ".$cardfondo." solid; background-color: ".$cardfondo.";' rowspan='4' >&nbsp;</td>
					        <td  width='22.15mm'  style='border: 0.01px #000000 solid;' rowspan='6'  >&nbsp;</td>
					        <td style='border: 0.01px ".$cardfondo." solid; background-color: ".$cardfondo.";' rowspan='4'>&nbsp;</td>
				      	</tr>

				      	<tr >
				      	</tr>

				      	<tr >				   
				      	</tr>

				      	<tr>
				      	</tr>


				      	<tr>
					        <td  rowspan='2' height='14.581mm' >&nbsp;</td>
					        <td  rowspan='2' >&nbsp;</td>
				      	</tr>

				      	<tr>
				      	</tr>

				      	<tr>
					        <td class='bfont' height='3mm' style='background-color: ".$cardfondo."; color:".$cardtexto."; border: 0.01px ".$cardfondo." solid; padding-top:2px' COLSPAN='3'  >".$apellidos."</td>
				      	</tr>
				      	<tr>
					        <td class='bfont' height='3mm' style='background-color: ".$cardfondo."; color:".$cardtexto."; border: 0.01px ".$cardfondo." solid;'  COLSPAN='3' >".$name."</td>
				      	</tr>
				      	
				      	<tr>
					         <td  COLSPAN='3'>".$datos1. "</td>
				      	</tr>


						<tr>
					         <td  COLSPAN='3'>".$datos2."</td>
				      	</tr>

				      	<tr>
					         <td  COLSPAN='3'>&nbsp;</td>
				      	</tr>

				      	<tr>
					        <td  >&nbsp;</td>
					        <td  >".$dni."</td>
					        <td  >&nbsp;</td>
				      	</tr>


						<tr>
					        <td  >&nbsp;</td>
					        <td  rowspan='5' ><img class='radius_img alto'  src='../resource/files/qrcodes/".$codigo."' /></td>
					        <td  >&nbsp;</td>
				      	</tr>

				      	<tr>
					        <td  >&nbsp;</td>
					        <td  >&nbsp;</td>
				      	</tr>

				      	<tr>
					        <td  >&nbsp;</td>
					        <td  >&nbsp;</td>
				      	</tr>
				      	<tr>
					        <td  >&nbsp;</td>
					        <td  >&nbsp;</td>
				      	</tr>
				      	<tr>
					        <td  >&nbsp;</td>
					        <td  >&nbsp;</td>
				      	</tr>
	
					</table>
	</td>";

	 if($i%5==1)
		{
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

 ?>