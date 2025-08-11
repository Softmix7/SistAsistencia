<?php 

date_default_timezone_set('America/Lima');
require_once "../models/Detalladogroup.php";
$DBobj=new Detalladogroup();


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

    $ii = 1;
    $range = 0; 

	$anio_peoget=$_GET['anio_peoget'];    
    $date_star= $_GET['date_star']; 
    $date_end= $_GET['date_end']; 
    $tipo_peo= $_GET['tipo_peo']; 
    $datos1_peo= $_GET['datos1_peo'];
    $datos2_peo= $_GET['datos2_peo'];
    $timein= $_GET['timein']; 
     if ($timein!=0) {
        $timein;
    } else {
        $timein='';
    } 

if($date_star==null and $date_end==null){
echo '<div class="alert alert-warning fade show" role="alert" id="alerta">
                                    
    <div class="alert-text">No hay datos, por favor selecciona una fecha.</div>
 </div>';
}else{


        if($date_star<=$date_end){
                    $range= ((strtotime($date_end)-strtotime($date_star))+(24*60*60)) /(24*60*60);
                    if($range>31){
                        echo '<div class="alert alert-danger fade show" role="alert" id="alert2">
                            <div class="alert-icon"><i class="flaticon-danger"></i></div>
                            <div class="alert-text">El Rango Maximo es 31 Dias</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>';
                        exit(0);
                    }
        }else{
            echo '<div class="alert alert-danger fade show" role="alert" id="alert3">
                            <div class="alert-icon"><i class="flaticon-danger"></i></div>
                            <div class="alert-text">Rango Invalido</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>';
            exit(0);
         }


if ($datos1_peo=="" and $datos2_peo=="") {


        $rspta=$DBobj->listarpersonal($tipo_peo,$anio_peoget);
        $rows = $rspta->num_rows;
      
        if ($rows>0) {
            echo '
                    <tr style="color:#FFFFFF;  background-color:#006B3D;">
                        
                        <td rowspan="2" style="vertical-align:middle;">ID</td>
                        <td rowspan="2" style="vertical-align:middle;" width="25%">APELLIDOS Y NOMBRES</td>';
                    for($i=0;$i<$range;$i++): 
                            $namberdate=date("d",strtotime($date_star)+($i*(24*60*60)));
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

                            echo '  <td class="text-center" style="height:auto;">'.$namberdate.'</td>';

                         endfor;
            echo '</tr>



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

                        echo '  <td class="text-center" style="height:auto;">'.$newdia.'</td>';
                    endfor;
                        
            echo '</tr>';




                            while ($regss=$rspta->fetch_object()) {
                            
            echo '    <tr>
                        <td >'.$ii.'</td>
                        <td >'.$regss->lastname_peo.", ".$regss->name_peo.'</td>';
                                 for($i=0;$i<$range;$i++):
                                    $date_at= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));

                                    $newdate_at= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));
                                    
                                    $new_date= date("d",strtotime($newdate_at));//1

                                    $rspta_assistance=$DBobj->listarassistance($regss->idpeople,$date_at,$tipo_peo);
                                    $reg=$rspta_assistance->fetch_object();
                                    $rspta_holidays=$DBobj->listarholidays($date_star,$date_end);

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

                        if($reg!=null){
                 echo '      <td class="text-center">';
                            if ($reg->kind_id==1) {
                                            if($reg->time_star==$timein){
                                               echo "<i class='fa fa-check' style='color:green;'></i>";
                                            }elseif ($reg->time_star<$timein) {
                                                echo "<i class='fa fa-check' style='color:green;'></i>"; 
                                            } elseif($reg->time_star>$timein) {
                                               if ($timein==null) {
                                                    echo "<i class='fa fa-check' style='color:green;'></i>";
                                                }elseif($reg->time_star>$timein) {
                                                      echo "<i class='' style='color:#F28900'>T</i>";
                                                }
                                            }
                            }else if($reg->kind_id==2){                                                     
                                            echo  "<i  style='color:#1313D3'>J</i>";
                            }else if($reg->kind_id==3){                                                     
                                            echo  "<i  style='color:#FF0000'>F</i>";
                            }
                 echo '      </td>';
                        } else {

                            if ($newdia=="S") {
                                 echo '  <td style="height:auto; color:#FFFFFF;  background-color:#FFD966;"></td>';           
                            }elseif($newdia=="D"){
                                echo '  <td style="height:auto; color:#FFFFFF;  background-color:#FFD966;"></td>';
                            } else {

                                                 echo '      <td class="text-center">';
                            while ($rowholidays=$rspta_holidays->fetch_object()) {
                                                $newholidays= $rowholidays->dateholidays;
                                                if($newdate_at==$newholidays){
                                                    echo "<i class='fa fa-calendar-check' data-skin='brand' data-toggle='kt-tooltip' data-placement='top' title='".$rowholidays->descripcion."' style='color:#FF0000;'></i>"; 
                                                }
                                            }
                echo '      </td>';

                             }
                        }



                
                                endfor; 
            echo '      </tr>';
            $ii++;
                            }

        }else{
                    echo '<div class="alert alert-danger fade show" role="alert" id="alert4">
                            <div class="alert-icon"><i class="flaticon-danger"></i></div>
                            <div class="alert-text">No hay personal registrado</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>';           
             }
}else{


    $rspta=$DBobj->listarstudent($tipo_peo,$datos1_peo,$datos2_peo,$anio_peoget);
        $rows = $rspta->num_rows;

        if ($rows>0) {
            echo '
                    <tr style="color:#FFFFFF;  background-color:#006B3D;">
                        
                        <td rowspan="2" style="vertical-align:middle;">ID</td>
                        <td rowspan="2" style="vertical-align:middle;" width="25%">APELLIDOS Y NOMBRES</td>';
                    for($i=0;$i<$range;$i++): 
                            $namberdate=date("d",strtotime($date_star)+($i*(24*60*60)));
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

                            echo '  <td class="text-center" style="height:auto;">'.$namberdate.'</td>';

                         endfor;
            echo '</tr>



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

                        echo '  <td class="text-center" style="height:auto;">'.$newdia.'</td>';
                    endfor;
                        
            echo '</tr>';




                            while ($regss=$rspta->fetch_object()) {
                            
            echo '    <tr>
                        <td >'.$ii.'</td>
                        <td >'.$regss->lastname_peo.", ".$regss->name_peo.'</td>';
                                 for($i=0;$i<$range;$i++):
                                    $date_at= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));

                                    $newdate_at= date("Y-m-d",strtotime($date_star)+($i*(24*60*60)));
                                    
                                    $new_date= date("d",strtotime($newdate_at));//1

                                    $rspta_assistance=$DBobj->listarassistance($regss->idpeople,$date_at);
                                    $reg=$rspta_assistance->fetch_object();
                                    $rspta_holidays=$DBobj->listarholidays($date_star,$date_end);

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

                        if($reg!=null){
                 echo '      <td class="text-center">';
                            if ($reg->kind_id==1) {
                                            if($reg->time_star==$timein){
                                               echo "<i class='fa fa-check' style='color:green;'></i>";
                                            }elseif ($reg->time_star<$timein) {
                                                echo "<i class='fa fa-check' style='color:green;'></i>"; 
                                            } elseif($reg->time_star>$timein) {
                                               if ($timein==null) {
                                                    echo "<i class='fa fa-check' style='color:green;'></i>";
                                                }elseif($reg->time_star>$timein) {
                                                      echo "<i class='' style='color:#F28900'>T</i>";
                                                }
                                            }
                            }else if($reg->kind_id==2){                                                     
                                            echo  "<i  style='color:#1313D3'>J</i>";
                            }else if($reg->kind_id==3){                                                     
                                            echo  "<i  style='color:#FF0000'>F</i>";
                            }
                 echo '      </td>';
                        } else {

                            if ($newdia=="S") {
                                 echo '  <td style="height:auto; color:#FFFFFF;  background-color:#FFD966;"></td>';           
                            }elseif($newdia=="D"){
                                echo '  <td style="height:auto; color:#FFFFFF;  background-color:#FFD966;"></td>';
                            } else {

                                                 echo '      <td class="text-center">';
                            while ($rowholidays=$rspta_holidays->fetch_object()) {
                                                $newholidays= $rowholidays->dateholidays;
                                                if($newdate_at==$newholidays){
                                                    echo "<i class='fa fa-calendar-check' data-skin='brand' data-toggle='kt-tooltip' data-placement='top' title='".$rowholidays->descripcion."' style='color:#FF0000;'></i>"; 
                                                }
                                            }
                echo '      </td>';

                             }
                        }
                                endfor; 
            echo '      </tr>';
            $ii++;
                            }

        }else{
                    echo '<div class="alert alert-danger fade show" role="alert" id="alert4">
                            <div class="alert-icon"><i class="flaticon-danger"></i></div>
                            <div class="alert-text">No hay personal registrado</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>';           
             }







}

}



    break;


}
?>