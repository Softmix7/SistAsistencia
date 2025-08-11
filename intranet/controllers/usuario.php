<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();
}

require_once "../models/Usuario.php";
$DBobj=new Usuario();


$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$logo=isset($_POST["logo"])? limpiarCadena($_POST["logo"]):"";
$logoactual=isset($_POST["logoactual"])? limpiarCadena($_POST["logoactual"]):"";



switch ($_GET["op"]){

	case 'saveupdate':


	if (!file_exists($_FILES['logo']['tmp_name']) || !is_uploaded_file($_FILES['logo']['tmp_name'])){
		$logoac=$_POST["logoactual"];
	}else {
		$ext = explode(".", $_FILES["logo"]["name"]);
		if ($_FILES['logo']['type'] == "image/jpg" || $_FILES['logo']['type'] == "image/jpeg" || $_FILES['logo']['type'] == "image/png")
		{
			$logo = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES["logo"]["tmp_name"], "../resource/files/usuarios/" . $logo);
		}
	}
	

	if (empty($idusuario)){
		$rspta=$DBobj->insertar($nombre,$cargo,$login,$clave,$logo,$_POST['permiso']);
		echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";

	}else {
		if ($logo!="") {
				$ruta=is_file('../resource/files/usuarios/'.$logoactual);
			if ($ruta<>NULL) {
				unlink('../resource/files/usuarios/'.$logoactual);
				$rspta=$DBobj->editar($idusuario,$nombre,$cargo,$login,$clave,$logo,$_POST['permiso']);
				echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
			}else{
				$rspta=$DBobj->editar($idusuario,$nombre,$cargo,$login,$clave,$logo,$_POST['permiso']);
				echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
			}

		}else{
			$rspta=$DBobj->update($idusuario,$nombre,$cargo,$login,$clave,$logoac,$_POST['permiso']);
			echo $rspta ? "registro actualizado" : "registro no se pudo actualizar";
		}

	}

	break;

	case 'inactive':
		$rspta=$DBobj->inactive($idusuario);
 		echo $rspta ? "registro Desactivado" : "registro no se puede desactivar";
	break;

	case 'active':
		$rspta=$DBobj->active($idusuario);
 		echo $rspta ? "registro activado" : "registro no se puede activar";
	break;

	case 'delete':
		$idusuario=$_GET['idusuario'];
		$rspta=$DBobj->delete($idusuario);
 		echo $rspta ? "registro eliminado" : "registro no se puede eliminar";
	break;	


	case 'view':
	$rspta=$DBobj->view($idusuario);
	echo json_encode($rspta);
	break;


	case 'listar':
	$rspta=$DBobj->listar();
	$data= Array();
	$i=1;
	
	$status="";
	$accion="";
	
	while ($reg=$rspta->fetch_object()){


		    if ($reg->cargo=='Administrador'){
		        	$status='<i class="nav-icon fas fa-lock text-info"></i>';
	                $accion='<i class="nav-icon fas fa-lock text-info"></i>';
		    }else{

$accion='<a href="#" onclick="view('.$reg->idusuario.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-pencil-alt" style="color: rgb(0, 166, 90);"></i></a> <a href="#" onclick="delet('.$reg->idusuario.');"><i data-toggle="tooltip" title="Modificar" class="fas fa-trash-alt" style="color: rgb(255, 0, 0);"></i></a>';		        
		if ($reg->condicion=="1") {
		    


				$status='<div class="vc-toggle-container" style="--vc-off-color: gray" onclick="inactive('.$reg->idusuario.')" >
				          <label class="vc-switch" >
				            <input type="checkbox" checked  class="vc-switch-input" id="marc'.$reg->idusuario.'" />
				            <span data-on="Activado" data-off="Desactivado" class="vc-switch-label"></span>
				            <span class="vc-handle"></span>
				          </label>
				        </div>';

		}else{
				$status='<div class="vc-toggle-container" style="--vc-off-color: gray" onclick="active('.$reg->idusuario.')" >
				          <label class="vc-switch" >
				            <input type="checkbox" class="vc-switch-input" id="marc'.$reg->idusuario.'" />
				            <span data-on="Activado" data-off="Desactivado" class="vc-switch-label"></span>
				            <span class="vc-handle"></span>
				          </label>
				        </div>';
		}		        
		    }





		if ($reg->imagen=="") {
			$imagen="";
		}else{
			$imagen="<a href='../resource/files/usuarios/".$reg->imagen."' data-lighter>
			<img src='../resource/files/usuarios/".$reg->imagen."' height='35px' width='35px' > </a>";
		}



		$data[]=array(
			"0"=>$i,
			"1"=>$reg->nombre,
			"2"=>$reg->cargo,
			"3"=>$reg->login,	
			"4"=>$imagen,
			"5"=>$status,
			"6"=>$accion,
 			
		);

		$i++;
	}
	$results = array(
 			"sEcho"=>1, 
 			"iTotalRecords"=>count($data), 
 			"iTotalDisplayRecords"=>count($data),
 			"aaData"=>$data);
	echo json_encode($results);

	break;

	case 'permisos':
		require_once "../models/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		$id=$_GET['id'];
		$marcados = $DBobj->listarmarcados($id);
		$valores=array();

		while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->idpermiso);
			}

		while ($reg = $rspta->fetch_object())
				{
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '
							<div class="form-check form-check-inline custom-checkbox">
							  <input class="form-check-input permisocheck " type="checkbox" '.$sw.' id="inlineCheckbox1" name="permiso[]" value="'.$reg->idpermiso.'">
							  <label class="form-check-label" for="inlineCheckbox1">' . $reg->nombre.'</label>
							</div>';
				}
	break;

	case 'verificar':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

		$rspta=$DBobj->verificar($logina, $clavea);
		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        $_SESSION['idusuario']=$fetch->idusuario;
			$_SESSION['nombre']=$fetch->nombre;
			$_SESSION['cargo']=$fetch->cargo;
	        $_SESSION['imagen']=$fetch->imagen;
	        $_SESSION['login']=$fetch->login;

	    	$marcados = $DBobj->listarmarcados($fetch->idusuario);
			$valores=array();

			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->idpermiso);
				}

			in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
			in_array(2,$valores)?$_SESSION['configuraciones']=1:$_SESSION['configuraciones']=0;
			in_array(3,$valores)?$_SESSION['personal']=1:$_SESSION['personal']=0;
			in_array(4,$valores)?$_SESSION['card-qr']=1:$_SESSION['card-qr']=0;
			in_array(5,$valores)?$_SESSION['asistencias']=1:$_SESSION['asistencias']=0;
			in_array(6,$valores)?$_SESSION['reportes']=1:$_SESSION['reportes']=0;
			in_array(7,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
			in_array(8,$valores)?$_SESSION['seguridad']=1:$_SESSION['seguridad']=0;
			in_array(9,$valores)?$_SESSION['mensajes']=1:$_SESSION['mensajes']=0;
			in_array(10,$valores)?$_SESSION['calendar']=1:$_SESSION['calendar']=0;
 
	    }
	    echo json_encode($fetch);
	break;

	case 'salir': 
        session_unset();
        session_destroy();
        header("Location: ../index.php");

	break;
}
ob_end_flush();
?>