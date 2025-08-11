<?php
ob_start();
date_default_timezone_set('America/Lima');

require_once __DIR__ . '/../../resource/domPdf/vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

    $date_star= $_REQUEST['date_star']; 
    $date_end= $_REQUEST['date_end']; 
    $tipo_peo= $_REQUEST['tipo_peo']; 
    $datos1_peo= $_REQUEST['datos1_peo'];
    $datos2_peo= $_REQUEST['datos2_peo'];
    $timein= $_REQUEST['timein']; 
    $anio_peoget= $_REQUEST['anio_peoget']; 

     if ($timein!=0) {
        $timein;
    } else {
        $timein='';
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

            $status_a=0;
            $status_tem=0;
            $status_tar=0;
            $status_f=0;
            $status_j=0;
            $newholidays=0;

require_once "../../models/Reportsheetdetalle.php";
$obj=new Reportsheetdetalle();

$DBobj = $obj->listar();
$rows=$DBobj->fetch_object();
$institucion=$rows->nombre_en; 
$logo=$rows->imagen_en;
$IMG = '../../resource/files/logo/'.$logo; 
$range = 0;
$pdf='';
$ii=1;

if($date_star==null and $date_end==null){
echo "<script>alert('Seleccione fecha')</script>";
            echo "<script>window.close();</script>";
                        exit;
}


        if($date_star<=$date_end){
                    $range= ((strtotime($date_end)-strtotime($date_star))+(24*60*60)) /(24*60*60);
                    if($range>31){
                        echo "<script>alert('El Rango Maximo es 31 Dias')</script>";
                        echo "<script>window.close();</script>";
                        exit(0);

                    }
        }else{
           echo "<script>alert('Rango Invalido')</script>";
            echo "<script>window.close();</script>";
                        exit(0);

         }


$pdf.= '

<link rel="stylesheet" href="css/pdftime.css">  
';


if ($datos1_peo=="" and $datos2_peo=="") {
        $rspta=$obj->listarpersonal($tipo_peo,$anio_peoget);
        $rows = $rspta->num_rows;

        if ($rows>0) {
                $pdf.= 
            '
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
            <table style="font-size: 8pt;" class="table">
                <tr>
                    <td style="text-align:center; background-color:#006B3D;color:#FFFFFF" COLSPAN="2">PERSONAL</td> 
                    <td style="text-align:center;background-color:#006B3D;color:#FFFFFF" COLSPAN="'.$range.'" >'.$diastar.' '.$fecha_star.' - '.$diaend.' '.$fecha_end.'</td>
                    <td style="text-align:center;background-color:#006B3D;color:#FFFFFF" COLSPAN="4" >ESTADO</td>
                </tr>

                <tr style="color:#FFFFFF;  background-color:#006B3D;">
                        
                        <td rowspan="2" style="vertical-align:middle;">ID</td>
                        <td rowspan="2" style="vertical-align:middle;" width="25%">APELLIDOS Y NOMBRES</td>';
                            for($i=0;$i<$range;$i++): 
                         $namberdate=date("d",strtotime($date_star)+($i*(24*60*60)));
                $pdf.= '  <td class="text-center" style="">'.$namberdate.'</td>';       
                            endfor;

                $pdf.= '  <td rowspan="2" style="background-color:green; text-align:center;">A</td>
                        <td rowspan="2" style="background-color:#FF8400; text-align:center;">T</td>
                        <td rowspan="2" style="background-color:#FF0000; text-align:center;">F</td>
                        <td rowspan="2" style="background-color:blue; text-align:center;">J</td>
                 </tr>

                <tr style="color:#FFFFFF;  background-color:#006B3D;">';
                        for($i=0;$i<$range;$i++): 
                        $newdate= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));
                                $newdia= date("w",strtotime($newdate));
                                if ($newdia==1) {
                                   $newdia="L";
                                } else if($newdia==2 or $newdia==3) {
                                    $newdia="M";
                                }elseif ($newdia==4) {
                                   $newdia="J";
                                }elseif($newdia==5){
                                    $newdia="V";
                                }elseif ($newdia==6) {
                                    $newdia="S";
                                }elseif ($newdia==0) {
                                    $newdia="D";
                                }
                $pdf.= '  <td  style="text-align:center;">'.$newdia.'</td>';
                         endfor;
         $pdf.= '</tr>';
            

                while ($regss=$rspta->fetch_object()) {
                            
        $pdf.=  '<tr>
                    <td >'.$ii.'</td>
                    <td >'.$regss->lastname_peo.", ".$regss->name_peo.'</td>';
                            for($i=0;$i<$range;$i++):
                                $date_at= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));

                                $rspta_assistance=$obj->listarassistance($regss->idpeople,$date_at);
                                $reg=$rspta_assistance->fetch_object();
                                $rspta_holidays=$obj->listarholidays($date_at);

                                        $newdia= date("w",strtotime($date_at));
                                        if ($newdia==1) {
                                           $newdia="L";
                                        } else if($newdia==2 or $newdia==3) {
                                            $newdia="M";
                                        }elseif ($newdia==4) {
                                           $newdia="J";
                                        }elseif($newdia==5){
                                            $newdia="V";
                                        }elseif ($newdia==6) {
                                            $newdia="S";
                                        }elseif ($newdia==0) {
                                            $newdia="D";
                                        }


                                    if($reg!=null){
        $pdf.='       <td style="text-align:center;">';
                                            if ($reg->kind_id==1) {
                                                if($reg->time_star==$timein){
                                                    
                                                   $pdf.= "<i  style='color:green;'>&radic;</i>";
                                                }elseif ($reg->time_star<$timein) {
                                                   
                                                    $pdf.= "<i  style='color:green;'>&radic;</i>"; 
                                                } elseif($reg->time_star>$timein) {
                                                   if ($timein==null) {
                                                        
                                                        $pdf.= "<i  style='color:green;'>&radic;</i>";
                                                    }elseif($reg->time_star>$timein) {
                                                         
                                                          $pdf.= "<i style='color:#F28900'>T</i>";
                                                    }
                                                }
                                            }else if($reg->kind_id==2){                                                 
                                                            $pdf.=  "<i  style='color:#1313D3'>J</i>";
                                            }else if($reg->kind_id==3){                                                
                                                            $pdf.=  "<i  style='color:#FF0000'>F</i>";
                                            }
        $pdf.='       </td>';
                                     } else {

                                        if ($newdia=="S") {
        $pdf.= '      <td style="color:#FFFFFF;  background-color:#FFD966;"></td>';              
                                         }elseif($newdia=="D"){
        $pdf.= '      <td style="color:#FFFFFF;  background-color:#FFD966;"></td>';
                                         } else { 
        $pdf.= '      <td class="text-center">';
                                                    while ($rowholidays=$rspta_holidays->fetch_object()) {
                                                                        $newholidays= date("Y-m-d",strtotime($rowholidays->dateholidays));
                                                                        if($date_at==$newholidays){
                                                                            $pdf.= "<i  style='background-color:#C65911;color:#FFFFFF;padding:4px;'>C</i>"; 
                                                                        }else{
                                                                          $pdf.= "";  
                                                                        }
                                                                    }
        $pdf.= '      </td>';
                                         }
                                    }
                                
                            endfor;  $ii++;

                                    $rspt_j=$obj->listarj($regss->idpeople,$date_star,$date_end);
                                    $result_j=$rspt_j->fetch_object();
                                    if($result_j!=null){
                                        $status_j=$result_j->total;
                                    }else{
                                      $status_j='0';  
                                    }


                                    $rspt_f=$obj->listarf($regss->idpeople,$date_star,$date_end);
                                    $result_f=$rspt_f->fetch_object();
                                    if($result_f!=null){
                                        $status_f=$result_f->total;
                                    }else{
                                      $status_f='0';  
                                    }


                                    $rspt_a=$obj->listar_a_total($regss->idpeople,$date_star,$date_end);
                                    $result_a=$rspt_a->fetch_object();

                                    if ($timein==null) {
                                         if ($result_a!=null) {
                                            $status_a=$result_a->total;
                                    $pdf.='
                                            <td style="text-align:center;">'.$status_a.'</td>
                                            <td style="text-align:center;">0</td>';
                                        } else {
                                            $pdf.='
                                            <td style="text-align:center;">0</td>
                                            <td style="text-align:center;">0</td>';
                                        }
                                    }else{

                                        $rspt_tem=$obj->listar_a_tem($regss->idpeople,$date_star,$date_end,$timein);
                                        $result_tem=$rspt_tem->fetch_object();

                                        $rspt_tar=$obj->listar_a_tar($regss->idpeople,$date_star,$date_end,$timein);
                                        $result_tar=$rspt_tar->fetch_object();
                                        
                                        if ($result_tem==null) {
                                            $pdf.=' <td style="text-align:center;">0</td>';
                                        } else {
                                           $status_tem=$result_tem->total;
                                           $pdf.=' <td style="text-align:center;">'.$status_tem.'</td>';
                                        }
                                                                              

                                        if ($result_tar==null) {
                                            $pdf.=' <td style="text-align:center;">0</td>';
                                        } else {
                                           $status_tar=$result_tar->total;
                                            $pdf.=' <td style="text-align:center;">'.$status_tar.'</td>';
                                        }
                                    }

                                            
        $pdf.='       <td style="text-align:center;">'.$status_f.'</td>
                    <td style="text-align:center;">'.$status_j.'</td>
                </tr>';
                }

        $pdf.='</table>';
        }else{
                 echo "<script>alert('No hay personal seleccionado')</script>";
                        echo "<script>window.close();</script>";
                        exit();           
        }

}else {

        $rspta=$obj->listarstudent($tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget);
        $rows = $rspta->num_rows;

        if ($rows>0) {
                $pdf.= 
            '
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
                  <td style="text-align: left;">'.$datos1_peo.'</td>
                  <td style="width:12%;background-color:#FFFFCC;color:#000000">DATOS II</td>
                  <td style="text-align: left;">'.$datos2_peo.'</td>
                </tr>
            </table><br>
            <table style="font-size: 8pt;">
                <tr>
                    <td style="text-align:center; background-color:#006B3D;color:#FFFFFF" COLSPAN="2">PERSONAL</td> 
                    <td style="text-align:center;background-color:#006B3D;color:#FFFFFF" COLSPAN="'.$range.'" >'.$diastar.' '.$fecha_star.' - '.$diaend.' '.$fecha_end.'</td>
                    <td style="text-align:center;background-color:#006B3D;color:#FFFFFF" COLSPAN="4" >ESTADO</td>
                </tr>

                <tr style="color:#FFFFFF;  background-color:#006B3D;">
                        
                        <td rowspan="2" style="vertical-align:middle;">ID</td>
                        <td rowspan="2" style="vertical-align:middle;" width="25%">APELLIDOS Y NOMBRES</td>';
                            for($i=0;$i<$range;$i++): 
                         $namberdate=date("d",strtotime($date_star)+($i*(24*60*60)));
                $pdf.= '  <td class="text-center" style="">'.$namberdate.'</td>';       
                            endfor;

                $pdf.= '  <td rowspan="2" style="background-color:green; text-align:center;">A</td>
                        <td rowspan="2" style="background-color:#FF8400; text-align:center;">T</td>
                        <td rowspan="2" style="background-color:#FF0000; text-align:center;">F</td>
                        <td rowspan="2" style="background-color:blue; text-align:center;">J</td>
                 </tr>

                <tr style="color:#FFFFFF;  background-color:#006B3D;">';
                        for($i=0;$i<$range;$i++): 
                        $newdate= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));
                                $newdia= date("w",strtotime($newdate));
                                if ($newdia==1) {
                                   $newdia="L";
                                } else if($newdia==2 or $newdia==3) {
                                    $newdia="M";
                                }elseif ($newdia==4) {
                                   $newdia="J";
                                }elseif($newdia==5){
                                    $newdia="V";
                                }elseif ($newdia==6) {
                                    $newdia="S";
                                }elseif ($newdia==0) {
                                    $newdia="D";
                                }
                $pdf.= '  <td  style="text-align:center;">'.$newdia.'</td>';
                         endfor;
         $pdf.= '</tr>';
            

                while ($regss=$rspta->fetch_object()) {
                            
        $pdf.=  '<tr>
                    <td >'.$ii.'</td>
                    <td >'.$regss->lastname_peo.", ".$regss->name_peo.'</td>';
                            for($i=0;$i<$range;$i++):
                                $date_at= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));

                                $rspta_assistance=$obj->listarassistance($regss->idpeople,$date_at);
                                $reg=$rspta_assistance->fetch_object();
                                $rspta_holidays=$obj->listarholidays($date_at);

                                        $newdia= date("w",strtotime($date_at));
                                        if ($newdia==1) {
                                           $newdia="L";
                                        } else if($newdia==2 or $newdia==3) {
                                            $newdia="M";
                                        }elseif ($newdia==4) {
                                           $newdia="J";
                                        }elseif($newdia==5){
                                            $newdia="V";
                                        }elseif ($newdia==6) {
                                            $newdia="S";
                                        }elseif ($newdia==0) {
                                            $newdia="D";
                                        }


                                    if($reg!=null){
        $pdf.='       <td style="text-align:center;">';
                                            if ($reg->kind_id==1) {
                                                if($reg->time_star==$timein){
                                                    
                                                   $pdf.= "<i class='fa fa-check' style='color:green;'>&radic;</i>";
                                                }elseif ($reg->time_star<$timein) {
                                                   
                                                    $pdf.= "<i class='fa fa-check' style='color:green;'>&radic;</i>"; 
                                                } elseif($reg->time_star>$timein) {
                                                   if ($timein==null) {
                                                        
                                                        $pdf.= "<i class='fa fa-check' style='color:green;'>&radic;</i>";
                                                    }elseif($reg->time_star>$timein) {
                                                         
                                                          $pdf.= "<i class='' style='color:#F28900'>T</i>";
                                                    }
                                                }
                                            }else if($reg->kind_id==2){                                                 
                                                            $pdf.=  "<i  style='color:#1313D3'>J</i>";
                                            }else if($reg->kind_id==3){                                                
                                                            $pdf.=  "<i  style='color:#FF0000'>F</i>";
                                            }else{
                                                $pdf.= "";
                                            }
        $pdf.='       </td>';
                                     } else {

                                        if ($newdia=="S") {
        $pdf.= '      <td style="color:#FFFFFF;  background-color:#FFD966;"></td>';              
                                         }elseif($newdia=="D"){
        $pdf.= '      <td style="color:#FFFFFF;  background-color:#FFD966;"></td>';
                                         } else { 
        $pdf.= '      <td class="text-center">';
                                                    while ($rowholidays=$rspta_holidays->fetch_object()) {
                                                                        $newholidays= date("Y-m-d",strtotime($rowholidays->dateholidays));
                                                                        if($date_at==$newholidays){
                                                                            $pdf.= "<i  style='background-color:#C65911;color:#FFFFFF;padding:4px;'>C</i>"; 
                                                                        }else{
                                                                          $pdf.= "";  
                                                                        }
                                                                    }
        $pdf.= '      </td>';
                                         }
                                    }
                            endfor;  $ii++;

                                    $rspt_j=$obj->listarj($regss->idpeople,$date_star,$date_end);
                                    $result_j=$rspt_j->fetch_object();
                                    if($result_j!=null){
                                        $status_j=$result_j->total;
                                    }else{
                                      $status_j='0';  
                                    }


                                    $rspt_f=$obj->listarf($regss->idpeople,$date_star,$date_end);
                                    $result_f=$rspt_f->fetch_object();
                                    if($result_f!=null){
                                        $status_f=$result_f->total;
                                    }else{
                                      $status_f='0';  
                                    }


                                    $rspt_a=$obj->listar_a_total($regss->idpeople,$date_star,$date_end);
                                    $result_a=$rspt_a->fetch_object();

                                    if ($timein==null) {
                                         if ($result_a!=null) {
                                            $status_a=$result_a->total;
                                    $pdf.='
                                            <td style="text-align:center;">'.$status_a.'</td>
                                            <td style="text-align:center;">0</td>';
                                        } else {
                                            $pdf.='
                                            <td style="text-align:center;">0</td>
                                            <td style="text-align:center;">0</td>';
                                        }
                                    }else{

                                        $rspt_tem=$obj->listar_a_tem($regss->idpeople,$date_star,$date_end,$timein);
                                        $result_tem=$rspt_tem->fetch_object();

                                        $rspt_tar=$obj->listar_a_tar($regss->idpeople,$date_star,$date_end,$timein);
                                        $result_tar=$rspt_tar->fetch_object();
                                        
                                        if ($result_tem==null) {
                                            $pdf.=' <td style="text-align:center;">0</td>';
                                        } else {
                                           $status_tem=$result_tem->total;
                                           $pdf.=' <td style="text-align:center;">'.$status_tem.'</td>';
                                        }
                                                                              

                                        if ($result_tar==null) {
                                            $pdf.=' <td style="text-align:center;">0</td>';
                                        } else {
                                           $status_tar=$result_tar->total;
                                            $pdf.=' <td style="text-align:center;">'.$status_tar.'</td>';
                                        }
                                    }

                                            
        $pdf.='       <td style="text-align:center;">'.$status_f.'</td>
                    <td style="text-align:center;">'.$status_j.'</td>
                </tr>';
                }

        $pdf.='</table>';
        }else{
                 echo "<script>alert('No hay personal seleccionado')</script>";
                        echo "<script>window.close();</script>";
                        exit();           
        }
}


$pdf.='
<br>
<table style="width:20%; font-size: 8pt;padding: 2px;">
                <tr>
                  <td style="color:#FFFFFF; background-color:#006B3D;text-align: center; width:65px;">&radic;</td>
                  <td>Asistencia</td>
                </tr>
                <tr>
                  <td style="color:#FFFFFF; background-color:#006B3D;text-align: center;">T</td>
                  <td>Tardanza</td>
                </tr>
                <tr>
                  <td style="color:#FFFFFF; background-color:#006B3D;text-align: center;">F</td>
                  <td>Faltó</td>
                </tr>
                <tr>
                  <td style="color:#FFFFFF; background-color:#006B3D;text-align: center;">J</td>
                  <td>Justificacion</td>
                </tr>
                <tr>
                  <td style="color:#FFFFFF; background-color:#006B3D;text-align: center;">C</td>
                  <td>Celebracion/Feriado</td>
                </tr>
              </table>';

ob_end_clean();
$dompdf->setPaper( 'A4','landscape');
$dompdf ->set_option('defaultFont','Courier');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->loadHtml($pdf);
$dompdf->render();
$dompdf->stream('invoice.pdf',array("Attachment"=>false));
