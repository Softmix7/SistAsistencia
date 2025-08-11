<?php 

date_default_timezone_set('America/Lima');
require_once "../models/Grouplist.php";
$DBobj=new Listadogroup();


switch ($_GET["op"]){


	case 'listgroupcard':
		$rspta_group = $DBobj->listar();
		
		while ($reg = $rspta_group->fetch_object()){
			$colores = array("bg-info", "bg-success", "bg-warning", "bg-danger", "bg-gray", "bg-purple","bg-gray-dark","bg-cyan","bg-teal","bg-indigo");
			$color =  substr(str_shuffle('ABCDEF0123456789'), 0, 6);
			echo '<div class="col-md-3 col-sm-6 col-12"><a href="#"   onclick="sendvar('.'\''. $reg->detalle_group.'\');listgroupstudent('.'\''. $reg->detalle_group.'\');" >
              <div class="info-box shadow">
                <span class="info-box-icon '.$colores[array_rand($colores)].'" ><i class="fas fa-user-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number">' . $reg->detalle_group . '</span>
                  <span class="info-box-text"><i class="fas fa-chevron-right"></i> Seleccionar </span>
                </div>
              </div></a>
            </div>';
			}
	break;


case 'listgroupstudent':

		$rspta_student = $DBobj->listgroup_student($_GET['anio_peoget']);

		echo '<thead>
                                <tr>
                                    <th class="dt-right sorting_disabled" rowspan="1" colspan="1" style="width: 200px;">
                                    </th>
                                    <th style="width: 200px;">
                                        NOMBRE
                                    </th>
                                    <th >DATOS
 									</th>
                                </tr>
               </thead><tbody>';

		while ($reg = $rspta_student->fetch_object()){
					echo '<tr>
							<td><button type="button" class="btn btn-secondary btn-sm" onclick="viewform(true);  getinput('.'\''.$reg->tipo_peo.'\',\''.$reg->datos1_peo.'\',\''.$reg->datos2_peo.'\',\''.$reg->anio_peo.'\')">Seleccionar <i class="fa fa-arrow-right"></i></button></td>
							<td><a onclick="viewform(true);  getinput('.'\''.$reg->tipo_peo.'\',\''.$reg->datos1_peo.'\',\''.$reg->datos2_peo.'\',\''.$reg->anio_peo.'\')" href="#">'.$reg->tipo_peo.'</a></td>
							<td><a onclick="viewform(true);  getinput('.'\''.$reg->tipo_peo.'\',\''.$reg->datos1_peo.'\',\''.$reg->datos2_peo.'\',\''.$reg->anio_peo.'\')" href="#">'.$reg->datos1_peo.' - '.$reg->datos2_peo.'</a></td>
						</tr>';	
				}
			echo '</tbody>';

break;


   case 'listar':

    $anio_peoget=$_REQUEST['anio_peoget'];    
    $date_star= $_REQUEST['date_star']; 
    $date_end= $_REQUEST['date_end']; 
    $tipo_peo= $_REQUEST['tipo_peo']; 
    $datos1_peo= $_REQUEST['datos1_peo'];
    $datos2_peo= $_REQUEST['datos2_peo'];
    $ident= $_REQUEST['identificacion'];
    

    if ($tipo_peo=="Estudiante") {
        if ($ident=="") {
            $rspta = $DBobj->listarstudent_time($date_star,$date_end,$tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget);
        } else {
           $rspta = $DBobj->listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$ident);
       }
    } else {

        if ($ident=="") {
            $rspta = $DBobj->listar_time($date_star,$date_end,$tipo_peo,$anio_peoget);
        } else {
           $rspta = $DBobj->listar_ident($date_star,$date_end,$tipo_peo,$anio_peoget,$ident);
       }
    }



        $data = array();
        $i = 1;
        while ($reg = $rspta->fetch_object()) {

            if ($reg->kind_id==2) {
                $time_star="";
                $time_end="";
                $status='<span style="color:#2B21AB;">Justificado</span>';
            } else if($reg->kind_id==3) {
                $time_star="";
                $time_end="";
                $status='<span style="color:#FF0000;">Faltó</span>';
            } else {
                $time_star=Date('g:i A',strtotime($reg->time_star));
                $time_end=$reg->time_end;
                $status='<span style="color:green;">Asistio</span>';
            }


            $data[] = array(
                "0" => $i,
                "1" => $reg->lastname_peo.' '.$reg->name_peo,
                "2" => $reg->datos1_peo,
                "3" => $reg->datos2_peo,
                "4" => $reg->fecha,
                "5" => $time_star,
                "6" => $time_end,
                "7" => $status,
            );
            $i++;
        }
        $results = array(
            "sEcho"                => 1, 
            "iTotalRecords"        => count($data),
            "iTotalDisplayRecords" => count($data), 
            "aaData"               => $data);
        echo json_encode($results);
    break;


case 'autocomplete':

$searchTerm = $_GET['q'];
$datos1_peo = $_GET['datos1_peo'];
$datos2_peo = $_GET['datos2_peo'];
$tipo_peo = $_GET['tipo_peo'];


if ($tipo_peo=="Estudiante") {
  $rspta = $DBobj->autocomplete($searchTerm,$datos1_peo,$datos2_peo);
} else {
  $rspta = $DBobj->autocompleteid($searchTerm,$tipo_peo);
}




$datos = array();

while ($reg=$rspta->fetch_object()){
    $idpeople = $reg->idpeople;
    $name_peo = $reg->name_peo;
    $lastname_peo=$reg->lastname_peo;
    $numberdoc_peo = $reg->numberdoc_peo;
    $row_array['value'] =$numberdoc_peo." | " .$name_peo." ".$lastname_peo;
    $row_array['idpersonal']=$idpeople;
    $row_array['dni']=$numberdoc_peo;
    $row_array['nombre']=$name_peo;
    $row_array['apellidos']=$lastname_peo;
    array_push($datos,$row_array);
}
echo json_encode($datos);
break;


}

?>