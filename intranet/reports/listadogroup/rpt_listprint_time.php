<?php
date_default_timezone_set('America/Lima');

    $date_star= $_REQUEST['date_star']; 
    $date_end= $_REQUEST['date_end']; 
    $tipo_peo= $_REQUEST['tipo_peo']; 
    $datos1_peo= $_REQUEST['datos1_peo'];
    $datos2_peo= $_REQUEST['datos2_peo'];
    $anio_peoget= $_REQUEST['anio_peoget']; 
    $ident= $_REQUEST['identificacion'];


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

  
require_once '../../models/Listadogroup.php';
$DBobj=new Listadogroup();


$obj = $DBobj->listar();
$rows=$obj->fetch_object();
$institucion=$rows->nombre_en; 
$logo=$rows->imagen_en;
$IMG = '../../resource/files/logo/'.$logo; 


    if ($tipo_peo=="Estudiante") {
        if ($ident=="") {
            $rspta = $DBobj->listarstudent($date_star,$date_end,$tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget);
        } else {
           $rspta = $DBobj->listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$ident);
       }
    } else {

        if ($ident=="") {
            $rspta = $DBobj->listarall($date_star,$date_end,$tipo_peo,$anio_peoget);
        } else {
           $rspta = $DBobj->listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$ident);
       }
    }


echo '

<!DOCTYPE html>
<html>
<head>
<title>Reporte</title>
<style type="text/css">
    body{
    font-family:Poppins,Helvetica,sans-serif;
    font-size: 10pt;
    }

    .txtheader{
      text-align: center;
    }


    .radius_img {
      width:50px;
      height:50px; 
    }


    table{
      border: none;
      border-collapse:collapse;
      width: 100%;
    }

    td,th{
    border: 0.1px #92D050 solid;
      padding: 3px;
    }

    #header{
      background-color: #006B3D;
      color: #FFFFFF;
    }

    </style>

</head>
<body>

<table class="txtheader" style="font-size: 8pt;">
                <tr>
                  <td style="width:10%;" rowspan="3"><img class="radius_img" src="'.$IMG.'" alt=""></td>
                  <td style="text-align:center; background-color:#FFFFCC;color:#000000"  colspan="4">'.$institucion.'</td>
                </tr>
                <tr>
                  <td  style="text-align:center; background-color:#FFFFCC;color:#000000"  colspan="4">LISTADO DE ASISTENCIAS</td>
                </tr>
                <tr>
                  <td style="width:12%;background-color:#FFFFCC;color:#000000">DATOS1</td>
                  <td style="text-align: left;">'.$tipo_peo.'</td>
                  <td style="width:12%;background-color:#FFFFCC;color:#000000">DATOS2</td>
                  <td style="text-align: left;">'.$tipo_peo.'</td>
                </tr>
</table><br>

<table style="font-size: 8pt;">
    <tr id="header">
      <td colspan="3" style="text-align:center;">PERSONAL</td>
      <td colspan="5" style="text-align:center;">'.$diastar.' '.$fecha_star.' - '.$diaend.' '.$fecha_end.'</td>
    </tr>
    <tr id="header">
      <td>ID</td>
      <td>APELLIDOS</td>
      <td>NOMBRE</td>
      <td>DATOS1</td>
      <td>DATOS2</td>
      <td>FECHA</td>
      <td>H. ENTRADA</td>
      <td>H. SALIDA</td>
    </tr>';

$i = 1;
while ($reg=$rspta->fetch_object()){

        if ($reg->kind_id==2 or $reg->kind_id==3) {
            $time_star="";
        } else {
             $time_star=$reg->time_star;
        }
    echo '<tr>
      <td>'.$i.'</td>
      <td>'.$reg->lastname_peo.'</td>
      <td>'.$reg->name_peo.'</td>
      <td>'.$reg->datos1_peo.'</td>
      <td>'.$reg->datos2_peo.'</td>
      <td>'.$reg->fecha.'</td>
      <td>'.$time_star.'</td>
      <td>'.$reg->time_end.'</td>'
      ;      
    echo ' </tr>';
  $i++;
  }
 echo '
</table>
</body>
</html>
';
