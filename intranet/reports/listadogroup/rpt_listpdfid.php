<?php
date_default_timezone_set('America/Lima');
ob_start();
require_once __DIR__ . '/../../resource/domPdf/vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

    $date_star= $_REQUEST['date_star']; 
    $date_end= $_REQUEST['date_end']; 
    $tipo_peo= $_REQUEST['tipo_peo']; 
    $datos1_peo= $_REQUEST['datos1_peo'];
    $datos2_peo= $_REQUEST['datos2_peo'];
    $timein= $_REQUEST['timein'];
        $ident= $_REQUEST['identificacion'];
    $anio_peoget= $_REQUEST['anio_peoget']; 
     if ($timein!=0) {
        $timein;
    } else {
        $timein='00:00';
    } 

$aniostar= date("Y", strtotime($date_star));
$messtar= date("m", strtotime($date_star));
$diastar= date("d", strtotime($date_star));

$anioend= date("Y", strtotime($date_end));
$mesend= date("m", strtotime($date_end));
$diaend= date("d", strtotime($date_end));


$meses = array('ENERO',"FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
$mes_star= date("m", strtotime($date_star));
$mes_end= date("m", strtotime($date_end));


$fecha_star=$meses[date($mes_star)-1];
$fecha_end=$meses[date($mes_end)-1];

require_once '../../models/Listadogroupid.php';
$DBobj=new Listadogroup();


$obj = $DBobj->listar();
$rows=$obj->fetch_object();
$institucion=$rows->nombre_en; 
$logo=$rows->imagen_en;
$IMG = '../../resource/files/logo/'.$logo; 


    if ($tipo_peo=="Estudiante") {
        if ($ident=="") {
            $rspta = $DBobj->listarstudent($date_star,$date_end,$tipo_peo,$datos1_peo,$datos2_peo,$timein,$anio_peoget);
        } else {
           $rspta = $DBobj->listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$timein,$ident);
       }
    } else {

        if ($ident=="") {
            $rspta = $DBobj->listarall($date_star,$date_end,$tipo_peo,$timein,$anio_peoget);
        } else {
           $rspta = $DBobj->listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$timein,$ident);
       }
    }


$pdf=''; 
$pdf.=' 
<link rel="stylesheet" href="../css/pdflistgroup.css"> 

<table class="txtheader" style="font-size: 8pt;">
                <tr>
                  <td style="width:10%;" rowspan="3"><img class="radius_img" src="'.$IMG.'" alt=""></td>
                  <td style="text-align:center; background-color:#FFFFCC;color:#000000"  colspan="4">'.$institucion.'</td>
                </tr>
                <tr>
                  <td  style="text-align:center; background-color:#FFFFCC;color:#000000"  colspan="4">LISTADO DE ASISTENCIAS</td>
                </tr>
                <tr>
                  <td style="width:12%;background-color:#FFFFCC;color:#000000">DATOS I</td>
                  <td style="text-align: left;">'.$tipo_peo.'</td>
                  <td style="width:12%;background-color:#FFFFCC;color:#000000">DATOS II</td>
                  <td style="text-align: left;">'.$tipo_peo.'</td>
                </tr>
</table><br>

<table style="font-size: 8pt;">
    <tr id="header">
      <td colspan="5" style="text-align:center;">PERSONAL</td>
      <td colspan="4" style="text-align:center;">'.$diastar.' '.$fecha_star.' - '.$diaend.' '.$fecha_end.'</td>
    </tr>
    <tr id="header">
      <td>ID</td>
      <td>APELLIDOS</td>
      <td>NOMBRE</td>
      <td>DATOS I</td>
      <td>DATOS II</td>
      <td>FECHA</td>
      <td>H. ENTRADA</td>
      <td>H. SALIDA</td>
      <td>STATUS</td>
    </tr>';
$tardanza= "";
$i = 1;

while ($reg=$rspta->fetch_object()){
 $marcacion=$timein;
        if ($reg->kind_id==1) {

                if ($reg->time_star<$timein) {
                    $tardanza="<i class='fa fa-check' style='color:green;'>Temprano</i>";
                } elseif($reg->time_star>$timein) { 
                   if ($timein=="00:00") {
                        $tardanza= "<i class='fa fa-check' style='color:green;'>Asistio</i>";
                    }elseif($reg->time_star>$timein) {
                           $tardanza= "<i class='' style='color:#EF870D'>Retardo ". $reg->tardanza."</i>";
                    }
                }elseif($reg->tardanza=$timein){
                    $tardanza="<i class='fa fa-check' style='color:green;'>Temprano</i>";
                }


        }else if($reg->kind_id==2){
          $tardanza=  "<i class='' style='color:#1313D3'>Justificado</i>";
        }else if($reg->kind_id==3){                                              
           $tardanza='<i style="color:#FF0000;">Faltó</i>';
        }

                                        if ($reg->kind_id==2 or $reg->kind_id==3) {
                                            $time_star="";
                                        } else {
                                            $time_star=$reg->time_star;
                                        }
    $pdf.='<tr>
      <td>'.$i.'</td>
      <td>'.$reg->lastname_peo.'</td>
      <td>'.$reg->name_peo.'</td>
      <td>'.$reg->datos1_peo.'</td>
      <td>'.$reg->datos2_peo.'</td>
      <td>'.$reg->fecha.'</td>
      <td>'.$time_star.'</td>
      <td>'.$reg->time_end.'</td>
      <td>'.$tardanza.'</td>';
   $pdf.=' </tr>';
  $i++;
  }
$pdf.='
</table>
';

ob_end_clean();
$dompdf->setPaper( 'A4','landscape');
$dompdf ->set_option('defaultFont','Courier');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->loadHtml($pdf);
$dompdf->render();
$dompdf->stream('invoice.pdf',array("Attachment"=>false));
