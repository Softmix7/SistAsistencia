<?php 
require_once "../models/Group.php";
$BDobj=new Group();

$idgroup=isset($_POST["idgroup"])? limpiarCadena($_POST["idgroup"]):"";
$detalle_group=isset($_POST["detalle_group"])? limpiarCadena($_POST["detalle_group"]):"";


switch ($_GET["op"]){

	case 'saveupdate':

		if (empty($idgroup)){
			$rspta=$BDobj->insert($detalle_group);
			echo $rspta ? "registro guardado" : "registro no se pudo guardar";
		}else {
			$rspta=$BDobj->update($idgroup,$detalle_group);
			echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
		}
	break;

	case 'view':
		$rspta=$BDobj->view($idgroup);
		echo json_encode($rspta); 
	break;

	case 'delete':
		$idgroup=$_GET['idgroup'];
		$rspta=$BDobj->delete($idgroup);
 		echo $rspta ? "registro eliminado" : "registro no se puede eliminar";
	break;	


	case 'inactive':
		$rspta=$BDobj->inactive($idgroup);
 		echo $rspta ? "Registro Desactivado" : "registro no se puede desactivar";
	break;
 
	case 'active':
		$rspta=$BDobj->active($idgroup);
 		echo $rspta ? "Registro activado" : "registro no se puede activar";
	break;



	case 'listar':
	$rspta=$BDobj->listar();
	$data= Array();
	$i = 1;

	while ($reg=$rspta->fetch_object()){

		if ($reg->status_group=="1") {


				$status='<div class="vc-toggle-container" style="--vc-off-color: gray" onclick="inactive('.$reg->idgroup.')" >
				          <label class="vc-switch" >
				            <input type="checkbox" checked  class="vc-switch-input" id="marc'.$reg->idgroup.'" />
				            <span data-on="Activado" data-off="Desactivado" class="vc-switch-label"></span>
				            <span class="vc-handle"></span>
				          </label>
				        </div>';

		}else{
			$status='<div class="vc-toggle-container" style="--vc-off-color: gray" onclick="active('.$reg->idgroup.')" >
				          <label class="vc-switch" >
				            <input type="checkbox" class="vc-switch-input" id="marc'.$reg->idgroup.'" />
				            <span data-on="Activado" data-off="Desactivado" class="vc-switch-label"></span>
				            <span class="vc-handle"></span>
				          </label>
				        </div>';
		}



		$data[]=array(
			"0"=>$i,
			"1"=>$reg->detalle_group,
			"2"=>$status,
			"3"=>'<a href="#" onclick="view('.$reg->idgroup.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a> <a href="#" onclick="delet('.$reg->idgroup.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-trash-alt" style="color: rgb(255, 0, 0);"></i></a>',
		);$i++;
	}
	$results = array(
 			"sEcho"=>1, 
 			"iTotalRecords"=>count($data), 
 			"iTotalDisplayRecords"=>count($data),
 			"aaData"=>$data); 
	echo json_encode($results);

	break;

	case 'listgroup':
		$rspta_group = $BDobj->listarother();
		
		while ($reg = $rspta_group->fetch_object()){
			$colores = array("bg-info", "bg-success", "bg-warning", "bg-danger", "bg-gray", "bg-purple","bg-gray-dark","bg-cyan","bg-teal","bg-indigo");
			$color =  substr(str_shuffle('ABCDEF0123456789'), 0, 6);
			echo '<div class="col-md-3 col-sm-6 col-12"><a href="#" onclick="viewform(true); sendvar('.'\''. $reg->detalle_group.'\');listar('.'\''. $reg->detalle_group.'\');" >
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

	case 'listgroupcard':
		$rspta_group = $BDobj->listarother();
		
		while ($reg = $rspta_group->fetch_object()){
			$colores = array("bg-info", "bg-success", "bg-warning", "bg-danger", "bg-gray", "bg-purple","bg-gray-dark","bg-cyan","bg-teal","bg-indigo");
			$color =  substr(str_shuffle('ABCDEF0123456789'), 0, 6);
			echo '<div class="col-md-3 col-sm-6 col-12"><a href="#" onclick="viewform(true); sendvar('.'\''. $reg->detalle_group.'\');" >
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



}
?>