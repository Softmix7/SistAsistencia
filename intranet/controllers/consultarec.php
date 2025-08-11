<?php
date_default_timezone_set('America/Lima');
require_once "../models/Consultarec.php";
$Obj=new Consultarec();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../resource/phpmailer/vendor/autoload.php';
$mail = new PHPMailer(true);


$iduserforms=isset($_POST["iduserform"])? limpiarCadena($_POST["iduserform"]):"";
$correorec=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";

$asunto=isset($_POST["asunto"])? limpiarCadena($_POST["asunto"]):"";
$sms=isset($_POST["sms"])? limpiarCadena($_POST["sms"]):"";

$fech_actual = date("Y-m-d H:i:s");

switch ($_GET["op"]){


case 'saveupdate':




        $ext = explode(".", $_FILES["adjunto"]["name"]);
        $new_name_file = null;

        if (end($ext) == 'doc' or end($ext) == 'docx' or end($ext) == 'pdf' or end($ext) == 'xlsx' or end($ext) == 'xls') {
            $dir = '../resource/files/docatendidos/';


            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $new_name_files = round(microtime(true));
            $new_name_file = $new_name_files. '.' . end($ext);
            if (copy($_FILES["adjunto"]["tmp_name"], $dir. $new_name_file)) {
                
            }
        } 

    if (!empty($asunto)){
        $rspta=$Obj->insert_rec($iduserforms,$sms,$new_name_file,$fech_actual);

        if (isset($rspta)) {

            $rsptaup=$Obj->update_rec($iduserforms);      

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
                $mail->addAddress($correorec, 'usuario');    

            /*    $mail->addAttachment('logo.png', 'new.png');*/
                $mail->addAttachment($dir. $new_name_file);

                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';                                
                $mail->Subject = $asunto;
                $mail->Body    = $sms;

                $mail->send();
                $msj=",se ha dado respuesta al correo del solicitante correctamente";
            } catch (Exception $e) {
/*             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";*/
                $msj=",pero no se puede responder al correo del solicitante"; 

            }

        echo $rspta="su informacion a sido registrada ". $msj;

        } else {
            echo $rspta="informacion no ha sido registrada";
        }
        
    }

break;


     
 case 'msjrejected':

        $iduserform=$_POST["iduserform"];
        $num_exp=$_POST["num_exp"];
        $fecha=$_POST["fecha"];
        $correo=$_POST["correo"];

        $msjrejected=$_POST["msjrejected"];
        $fechaact = date("Y-m-d H:i:s");
        $condicion="3";


        $msj_usu="Documento ingresado con Expediente ".$num_exp.", el " .$fecha. " horas, fue ".$msjrejected;

        $rspta=$Obj->insert($iduserform,$msj_usu,$fechaact);

        if (isset($rspta)) {
        $rspta=$Obj->updatecondicion($iduserform,$condicion);

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
                $mail->addAddress($correo, 'usuario');    
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';                                
                $mail->Subject = 'Documento rechazado';
                $mail->Body    ='La solictud ingresado con Expediente '.$num_exp.', el ' .$fecha. ' horas, fue '.$msjrejected;

                $mail->send();
                $msj=",se ha enviado respuesta al correo del remitente";
            } catch (Exception $e) {
                $msj=",pero no se pudo dar respuesta al correo del remitente"; 
            }
                echo $rspta="Expediente rechazado con exito ". $msj;
        } else {
                echo $rspta="registro nose puede rechazar";
        }
    break;


case 'listar':
    $anio_peoget= $_REQUEST['anio_peoget'];

    $rspta=$Obj->listar($anio_peoget);
    $data= Array();
    $i = 1;
    while ($reg=$rspta->fetch_object()){



        $data[]=array(
            "0"=>$i,
            "1"=>$reg->num_exp,
            "2"=>$reg->fechas ." | ". $reg->hora,
            "3"=>$reg->dni,
            "4"=>$reg->ape_paterno.' '. $reg->ape_materno.', '. $reg->nombre,
            "5"=>'<a href="#"  onclick="viewdetalle('.$reg->iduserform.',\''.$reg->num_exp.'\',\''.$reg->asunto.'\',\''.$reg->descripcion.'\',\''.$reg->fecha.'\',\''.$reg->ape_paterno.'\',\''.$reg->ape_materno.'\',\''.$reg->nombre.'\',\''.$reg->telefono.'\',\''.$reg->celular.'\',\''.$reg->correo.'\',\''.$reg->direccion.'\',\''.$reg->document.'\');" > <i class="fas fa-eye" style="font-size: 20px;"></i></a>',
            "6"=>'
                     <a href="#"  title="Rechazar" onclick="accionrech('.$reg->iduserform.',\''.$reg->num_exp.'\',\''.$reg->fecha.'\',\''.$reg->correo.'\');" ><i class="fa fa-file-excel" style="font-size: 20px; color: red"></i></a>
                    <a href="#"  title="Atender" onclick="accionacep('.$reg->iduserform.',\''.$reg->ape_paterno.'\',\''.$reg->ape_materno.'\',\''.$reg->nombre.'\',\''.$reg->num_exp.'\',\''.$reg->correo.'\');" ><i class="fa fa-check-circle" style="font-size: 20px; color: #ffb822"></i></a>
                    ',
            
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

}

?>
