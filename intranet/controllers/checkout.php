<?php 
require_once "../models/Checkout.php";
$DBobj=new Checkout();
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

	case 'listasistanceother':
		$i=1;

			$rspta_student = $DBobj->listother($_GET['tipo_peo'],$_GET['anio_peoget']);

		
		echo '<thead>
                                    <th>ID</th>
                                    <th>APELLIDOS Y NOMBRES</th>
                                    <th>STATUS</th>
                                    <th>DESCRIPCION</th>
               
              </thead><tbody>';

		while ($reg = $rspta_student->fetch_object()){
				$values = array("0"=>"Sin Seleccionar","2"=>"Justificacion"); 
				$rspta_assistance=$DBobj->listarassistance($reg->idpeople,$_GET['datesearch']);
                $rows=$rspta_assistance->fetch_object();		
				

			echo 		'<tr>
							<td><input type="hidden" name="idassistance[]" value="'.$rows->idassistance.'">
								<input type="hidden" name="idpeople[]" value="'.$reg->idpeople.'">'.$i.'</td>
							<td>'.$reg->lastname_peo.', '.$reg->name_peo.'</td>';

							if ($rows->kind_id==1) {
			echo 		'<td>
							<select  style="color:green;" class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">

									<option value="1" selected>Asistio</option>
							</select></td>';
						
			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" readonly>'.$rows->descripcion.'</textarea></td>';								
			

							} else if ($rows->kind_id==3) {
			echo 		'<td>
							<select style="color:red;" class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">

									<option value="3" selected>Falto</option>
							</select></td>';
						
			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" readonly>'.$rows->descripcion.'</textarea></td>';								
							
							}else if ($rows->kind_id==2) {
								echo 		'<td>
							<select style="color:blue;" class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">';

						foreach($values as $k=>$v):

			echo 				'<option value="'.$k.'"';
							if($rows!=null && $rows->kind_id==$k){ 
								echo "selected"; 
								}
			echo 				'>'.$v.'</option>';		
						endforeach;	

			echo 			'</select>
						</td>';
						

			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" >'.$rows->descripcion.'</textarea></td>';
							} 
							 else  {

								echo 		'<td>
							<select  class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">';

						foreach($values as $k=>$v):

			echo 				'<option value="'.$k.'"';
							if($rows!=null && $rows->kind_id==$k){ 
								echo "selected"; 
								}
			echo 				'>'.$v.'</option>';		
						endforeach;	

			echo 			'</select>
						</td>';
						

			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" readonly>guardar como falta</textarea></td>';
								
							}
					echo'
						</tr>';
					$i++;	
				}
			echo '</tbody>';
	break;



	case 'listassistance':
		$i=1;

			$rspta_student = $DBobj->liststudent($_GET['tipo_peo'],$_GET['datos1_peo'],$_GET['datos2_peo'],$_GET['anio_peoget']);
	
		
		
		echo '<thead>
                                    <th>ID</th>
                                    <th>APELLIDOS Y NOMBRES</th>
                                    <th>STATUS</th>
                                    <th>DESCRIPCION</th>
               
              </thead><tbody>';

		while ($reg = $rspta_student->fetch_object()){
				$values = array("0"=>"Sin Seleccionar","2"=>"Justificacion"); 
				$rspta_assistance=$DBobj->listarassistance($reg->idpeople,$_GET['datesearch']);
                $rows=$rspta_assistance->fetch_object();		
				

			echo 		'<tr>
							<td><input type="hidden" name="idassistance[]" value="'.$rows->idassistance.'">
								<input type="hidden" name="idpeople[]" value="'.$reg->idpeople.'">'.$i.'</td>
							<td>'.$reg->lastname_peo.', '.$reg->name_peo.'</td>';

							if ($rows->kind_id==1) {
			echo 		'<td>
							<select  style="color:green;" class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">

									<option value="1" selected>Asistio</option>
							</select></td>';
						
			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" readonly>'.$rows->descripcion.'</textarea></td>';								
			

							} else if ($rows->kind_id==3) {
			echo 		'<td>
							<select style="color:red;" class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">

									<option value="3" selected>Falto</option>
							</select></td>';
						
			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" readonly>'.$rows->descripcion.'</textarea></td>';								
							
							}else if ($rows->kind_id==2) {
								echo 		'<td>
							<select style="color:blue;" class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">';

						foreach($values as $k=>$v):

			echo 				'<option value="'.$k.'"';
							if($rows!=null && $rows->kind_id==$k){ 
								echo "selected"; 
								}
			echo 				'>'.$v.'</option>';		
						endforeach;	

			echo 			'</select>
						</td>';
						

			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" >'.$rows->descripcion.'</textarea></td>';
							} 
							 else  {

								echo 		'<td>
							<select  class="form-control form-control-sm"  name="kind_id[]" id="cbo'.$reg->idpeople.'" onclick="cbstatus('.$reg->idpeople.',\''.$rows->descripcion.'\');">';

						foreach($values as $k=>$v):

			echo 				'<option value="'.$k.'"';
							if($rows!=null && $rows->kind_id==$k){ 
								echo "selected"; 
								}
			echo 				'>'.$v.'</option>';		
						endforeach;	

			echo 			'</select>
						</td>';
						

			echo 		'<td><textarea name="descripcion[]" class="form-control form-control-sm" id="txt'.$reg->idpeople.'" style="height:30px" readonly>guardar como falta</textarea></td>';
								
							}
					echo'
						</tr>';
					$i++;	
				}
			echo '</tbody>';
	break;

case 'saveupdate':

for($i=0; $i<count($_POST['kind_id']); $i++){
    $kind_id = $_POST['kind_id'][$i];
    $idpeople = $_POST['idpeople'][$i];
    $descripcion = $_POST['descripcion'][$i];
    $idassistance = $_POST['idassistance'][$i];

    if ($kind_id==0) {
			if ($idassistance==0) {
				$rspta=$DBobj->insert($idpeople,$_POST['datesearch']);
			} else {
				$rspta=$DBobj->updatedelete($idassistance);
			}
 	
    }elseif ($kind_id==2) {
    	if ($idassistance==0) {
    		$rspta=$DBobj->insertjustification($idpeople,$_POST['datesearch'],$descripcion);
    	} else {
    		$rspta=$DBobj->update($idassistance,$descripcion);
    	}
    }      
}

break;


}
?>