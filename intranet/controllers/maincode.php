<?php 

date_default_timezone_set('America/Lima');
    include('../resource/phpqrcode/qrlib.php'); 

    $dataContent = $_POST['dataContent'];
    $image_location = "./../resource/files/maincode/";
    $image_name = $dataContent." ".date('d-m-Y-h-i-s').'.png';
    $calidad = $_POST['calidad'];
    $size = $_POST['size'];
    $frameSize = 1;

switch ($_GET["op"]){

    case 'generateqr':

        $files = glob($image_location.'*'); //obtenemos todos los nombres de los ficheros
        foreach($files as $file){
            if(is_file($file))
            unlink($file); //elimino el fichero
        }




        if (empty($dataContent)){
            echo'Datos sin digitar';

        }else{ 
        QRcode::png($dataContent, $image_location.$image_name, $calidad, $size,$frameSize); 
        echo '<div class="row align-items-center"><div class="col-12 text-center"><img id="imj" download class="align-self-center img-thumbnail" src="'.$image_location.$image_name.'" /></div> <div class="col-12 text-center"><a target="_blank" download="'.$dataContent.'".png  href="'.$image_location.$image_name.'" ><i class="fas fa-download"></i> descargar</a></div> </div>';
        }

    break;
}

?>