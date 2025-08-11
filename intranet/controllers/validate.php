<?php 
require_once "../models/Validate.php";
$BDobj=new Validate();


switch ($_GET["op"]){

	case 'listar':

		$rspta=$BDobj->listar();
		$reg=$rspta->fetch_object();
		$validate=$reg->status_bd;

		echo $validate; 



	break;
}
?>