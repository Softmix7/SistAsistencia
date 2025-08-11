<?php 

date_default_timezone_set('America/Lima');
require_once "../models/Consulta.php";
$BDobj=new Consulta();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../resource/phpmailer/vendor/autoload.php';
$mail = new PHPMailer(true);

switch ($_GET["op"]){
	case 'saveupdate':

    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = '6LecwkonAAAAAJ4MRrEhUb-zko6JGI5rMqap1UFl';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");

    if (empty($captcha)) {
         echo "1";
    }else{


	$numeroDocDNIStr=$_POST["numeroDocDNIStr"];
	$nombresStr=$_POST["nombresStr"];
	$apellidoPaternoStr=$_POST["apellidoPaternoStr"];
	$apellidoMaternoStr=$_POST["apellidoMaternoStr"];

	$telefonoStr=$_POST["telefonoStr"];
	$celularStr=$_POST["celularStr"];
	$correoStr=$_POST["correoStr"];
	$direccionStr=$_POST["direccionStr"];

	$asuntoStr=$_POST["asuntoStr"];
	$descripcionStr=$_POST["descripcionStr"];


	$fecha = date("Y-m-d H:i:s");
	$dateh=date("d-m-Y");
	$datey=date("y");
	$hora = date("H:i:s");

		$ext = explode(".", $_FILES["doc1Arr"]["name"]);
    	$new_name_file = null;

        if (end($ext) == 'doc' or end($ext) == 'docx' or end($ext) == 'pdf') {
            $dir = '../resource/files/documents/';


            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $new_name_files = round(microtime(true));
            $new_name_file = $new_name_files. '.' . end($ext);
            if (copy($_FILES["doc1Arr"]["tmp_name"], $dir. $new_name_file)) {
                
            }
        } 


	if (empty($iduserform)){
		$rspta=$BDobj->insert($numeroDocDNIStr,$nombresStr,$apellidoPaternoStr,$apellidoMaternoStr,$telefonoStr,$celularStr,$correoStr,$direccionStr,$asuntoStr,$descripcionStr,$new_name_file,$fecha);

		if (isset($rspta)) {
			if ($rspta<10) {
				$rsptaid='00'.$rspta;
			} else if($rspta<99) {
				$rsptaid='0'.$rspta;
			}else{
				$rsptaid=$rspta;
			}

			$num_exp='SAV-'.$rsptaid.'-'.$datey;

			$rsptaup=$BDobj->update($rspta,$num_exp);
  						

			try {
			    $mail->SMTPDebug = 0;  
			    $mail->isSMTP();                                        
			    $mail->Host       = 'smtp.gmail.com';                    
			    $mail->SMTPAuth   = true;                                  
			    $mail->Username   = 'josecarhuapoma2@gmail.com';                   
			    $mail->Password   = 'vquupdjiztbnkffs';                            
			    $mail->SMTPSecure = 'tls';          
			    $mail->Port       = 587;                                 


			    $mail->setFrom('josecarhuapoma2@gmail.com', 'ASISTENCIA');
			    $mail->addAddress($correoStr, 'usuario');    

			    $mail->isHTML(true);
			    $mail->CharSet = 'UTF-8';                                
			    $mail->Subject = 'Envio de documentos, Asistente Virtual';
			    $mail->Body    = 'Estimado: '.$nombresStr. ' ' .$apellidoPaternoStr. ' '.$apellidoMaternoStr.',Su solicitud ha sido registrado con éxito, con el Nº SAV-'.$rsptaid.'-'.$datey.', el '.$dateh.', a las '.$hora.' horas. Este está sujeto aún a revisión.';

			    $mail->send();
			    $msj=",revisar su correo";
			} catch (Exception $e) {
				$msj=",pero no se puede responder a su correo"; 
			}

		echo $rspta="su informacion a sido registrada ". $msj;
		} else {
			echo $rspta="informacion no ha sido registrada";
		}
	}
}

	break;

case 'listfile':

	$rspta=$BDobj->listar();

	while ($reg=$rspta->fetch_object()){
		echo '<a href="intranet/resource/files/fut/'.$reg->fut_document.'" download="FORMULARIO SOLICITUD"  class="m-b-5 d-block text-secondary" target="_blank"><i class="fas fa-download f-18"></i></a>  ';
	}
break;


case 'listentity':

	$rspta=$BDobj->listarentity();

	while ($reg=$rspta->fetch_object()){
		echo '* Mas informacion Comuniquese al: '.$reg->telefono_en;
	}
break;

case 'listname':

	$rspta=$BDobj->listarentity();

	while ($reg=$rspta->fetch_object()){
		echo $reg->nombre_en;
	}
break;

}
?>