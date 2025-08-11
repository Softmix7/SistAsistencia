
<?php
date_default_timezone_set('America/Lima');

require_once "../models/Form_id.php";
$BDobj=new Form_id();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../resource/phpmailer/vendor/autoload.php';
$mail = new PHPMailer(true);


$identificacion=isset($_POST["identificacion"])? limpiarCadena($_POST["identificacion"]):"";


$hoy=date('Y-m-d H:i:s');
$anio=date('Y');
$hoy_fecha=date('Y-m-d');
$hoy_hora=date('H:i:s');

    $dateh=date("d-m-Y");
    $datey=date("y");
    $hora = date("H:i:s");


$idassistance="";
$fecha_star="";
$fecha_end="";
$rowdni="";

switch ($_GET["op"]){

case 'saveupdate':

  $rsptaEn = $BDobj->listarentity();
  $regEn=$rsptaEn->fetch_object();
  $entity=$regEn->nombre_en;
 
    if (empty($identificacion)){
        $rspta=0;
    }else{
        $rspta=$BDobj->listar_assistance($identificacion);
        while ($reg=$rspta->fetch_object()){
           $idassistance= $reg->idassistance;
           $fecha_star= $reg->fecha_star;
           $fecha_end= $reg->fecha_end;
           $kind_id= $reg->kind_id;
           $status= $reg->status;

           $lastname= $reg->lastname_peo;
           $name= $reg->name_peo;
           $mails= $reg->mail_peo;
        }

 
                if ($fecha_star<>0 and $fecha_end==0) {

                    $horaentrada=$fecha_star; 
                    $newtime=Date('H:i:S',strtotime($hoy));
                    $newtime_star=Date('H:i:S',strtotime($horaentrada)+60);
                        if ($kind_id==2) {
                            echo "7";
                        } else if($kind_id==3){
                            echo "8";
                        }else if($newtime_star>$newtime){
                            echo "3";
                        }else{

                            if ($rspta_update=$BDobj->update($idassistance,$hoy)) {

                                if (!empty($mails) ) {

            try {
                $mail->SMTPDebug = 0;  
                $mail->isSMTP();                                        
                $mail->Host       = 'asistencia2022.maticsaber.com';                    
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = 'asistencia@maticsaber.com';                   
                $mail->Password   = '^Ha9r(1?QJNA';                             
                $mail->SMTPSecure = 'ssl';          
                $mail->Port       = 465;                                 


                $mail->setFrom('asistencia@maticsaber.com', 'ASISTENCIA');
                $mail->addAddress($mails, 'usuario');    

                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';                                
                $mail->Subject = 'Registro de asistencia -'.$entity;
                $mail->Body    = 'Estimado: '.$lastname. ' ' .$name. ', se ha registrado correctamente su asistencia.<br>
                    <table style="border-collapse: collapse;margin: 25px 0;font-size: 0.9em;font-family: sans-serif;min-width: 400px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);padding: 12px 15px;border: 1px solid #dddddd;">

                        <thead>
                          <tr style="background-color: #009879;color: #ffffff; text-align: left;border: 1px solid #dddddd;">
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">FECHA</th>
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">HORA INGRESO</th>
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">HORA SALIDA</th>
                          </tr>          
                        </thead>     
                        <tbody style="border: 1px solid #dddddd;">
                          <tr style="border1px solid #dddddd;">
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;">'.$dateh.'</td>
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;">'.Date('g:i A',strtotime($fecha_star)).'</td>
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;">'.Date('g:i A',strtotime($hora)).'</td>
                          </tr>
                        </tbody>

                    </table>';

                $mail->send();
                $msj="revisar su correo";
            } catch (Exception $e) {
                $msj="error al enviar a correo"; 

            }


                                }
                                echo "4";



                

                               
                            }else{
                                echo "5";
                                }
                        }  

                }else if ($idassistance==0) {
                   $rspta_personal=$BDobj->listar_personal($identificacion,$anio);
                       while ($reg_personal=$rspta_personal->fetch_object()){
                               $idpeople= $reg_personal->idpeople;
                               $rowdni= $reg_personal->numberdoc_peo;
                               $lastname_peo= $reg_personal->lastname_peo;
                               $name_peo= $reg_personal->name_peo;
                               $mail_peo= $reg_personal->mail_peo;
                         }

                         if ($rowdni==$identificacion) {
                            $status='0';
                             if ($rspta_save=$BDobj->insert($idpeople,$hoy,$status)) {
                                echo "1";
                if (!empty($mail_peo) ) {
                    try {
                        $mail->SMTPDebug = 0;  
                        $mail->isSMTP();                                        
                        $mail->Host       = 'asistencia2022.maticsaber.com';                    
                        $mail->SMTPAuth   = true;                                  
                        $mail->Username   = 'asistencia@maticsaber.com';                   
                        $mail->Password   = '^Ha9r(1?QJNA';                          
                        $mail->SMTPSecure = 'ssl';          
                        $mail->Port       = 465;                                 


                        $mail->setFrom('asistencia@maticsaber.com', 'ASISTENCIA');
                        $mail->addAddress($mail_peo, 'usuario');    

                        $mail->isHTML(true);
                        $mail->CharSet = 'UTF-8';                                
                        $mail->Subject = 'Registro de asistencia -'.$entity;
                        $mail->Body    = 'Estimado: '.$lastname_peo. ' ' .$name_peo. ', se ha registrado correctamente su asistencia.
                            <table style="border-collapse: collapse;margin: 25px 0;font-size: 0.9em;font-family: sans-serif;min-width: 400px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);padding: 12px 15px;border: 1px solid #dddddd;">

                        <thead>
                          <tr style="background-color: #009879;color: #ffffff; text-align: left;border: 1px solid #dddddd;">
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">FECHA</th>
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">HORA INGRESO</th>
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">HORA SALIDA</th>
                          </tr>          
                        </thead>     
                        <tbody style="border: 1px solid #dddddd;">
                          <tr style="border1px solid #dddddd;">
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;">'.$dateh.'</td>
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;">'.Date('g:i A',strtotime($hora)).'</td>
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;"></td>
                          </tr>
                        </tbody>

                    </table>';

                        $mail->send();
                            /*printf(""); */  
                             $msj="revisar su correo";
                    } catch (Exception $e) {
                        $msj="error al enviar a correo"; 

                    }
                }



                                    
                                }else{
                                    echo "2";
                                }
                         }else{
                            echo "6";
                         }
                }else{
                    $rspta_personal=$BDobj->listar_personal($identificacion,$anio);
                       while ($reg_personal=$rspta_personal->fetch_object()){
                               $idpeople= $reg_personal->idpeople;
                               $rowdni= $reg_personal->numberdoc_peo;
                               $lastname_peo= $reg_personal->lastname_peo;
                               $name_peo= $reg_personal->name_peo;
                               $mail_peo= $reg_personal->mail_peo;
                         }

                         if ($rowdni==$identificacion) {
                            $status=$status+1;
                            if ($rspta_save=$BDobj->insert($idpeople,$hoy,$status)) {
                                echo "1";

                if (!empty($mail_peo) ) {
                    try {
                        $mail->SMTPDebug = 0;  
                        $mail->isSMTP();                                        
                        $mail->Host       = 'asistencia2022.maticsaber.com';                    
                        $mail->SMTPAuth   = true;                                  
                        $mail->Username   = 'asistencia@maticsaber.com';                   
                        $mail->Password   = '^Ha9r(1?QJNA';                                
                        $mail->SMTPSecure = 'ssl';          
                        $mail->Port       = 465;                                 


                        $mail->setFrom('asistencia@maticsaber.com', 'ASISTENCIA');
                        $mail->addAddress($mail_peo, 'usuario');    

                        $mail->isHTML(true);
                        $mail->CharSet = 'UTF-8';                                
                        $mail->Subject = 'Registro de asistencia -'.$entity;
                        $mail->Body    = 'Estimado: '.$lastname_peo. ' ' .$name_peo. ', se ha registrado correctamente su asistencia.
                            <table style="border-collapse: collapse;margin: 25px 0;font-size: 0.9em;font-family: sans-serif;min-width: 400px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);padding: 12px 15px;border: 1px solid #dddddd;">

                        <thead>
                          <tr style="background-color: #009879;color: #ffffff; text-align: left;border: 1px solid #dddddd;">
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">FECHA</th>
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">HORA INGRESO</th>
                            <th style="padding: 12px 15px;border: 1px solid #dddddd;">HORA SALIDA</th>
                          </tr>          
                        </thead>     
                        <tbody style="border: 1px solid #dddddd;">
                          <tr style="border1px solid #dddddd;">
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;">'.$dateh.'</td>
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;">'.Date('g:i A',strtotime($hora)).'</td>
                            <td style="padding: 12px 15px;border: 1px solid #dddddd;"></td>
                          </tr>
                        </tbody>

                    </table>';

                        $mail->send();
                        $msj="revisar su correo";
                    } catch (Exception $e) {
                        $msj="error al enviar a correo"; 

                    }
                }


                                    
                                }else{
                                    echo "2";
                                }
                         }else{
                            echo "6";
                         }
                }
    }

      

break; 


case 'listar':

    $rspta=$BDobj->listar_assistancehoy();
    $valor=$rspta->fetch_object();

    if (empty($valor)) {
       echo '<h4 class="text-center" style="float: none;">NINGUNA ASISTENCIA REGISTRADA</h4>';
    }else{
            $rspta_timestar=$BDobj->max_timestar();
            $reg_timestar=$rspta_timestar->fetch_object();
            $timestar_star=$reg_timestar->time_star; 
            $timeend_star=$reg_timestar->time_end; //mayor de salida


            $rspta_timeend=$BDobj->max_timeend();
            $reg_timeend=$rspta_timeend->fetch_object();
            $timestar_end=$reg_timeend->time_star; //mayor de entrada
            $timeend_end=$reg_timeend->time_end; 

           if ($timeend_star>$timestar_end) {
                        $rspta=$BDobj->listartimeend();

                        while ($reg=$rspta->fetch_object()){
                                    echo '<h4 class="text-center" style="float: none;">'.$reg->lastname_peo.' '.$reg->name_peo.' | SALIDA '.Date('g:i A',strtotime($reg->time_end)).' </h4>';
                        }

            }elseif ($timeend_star<$timestar_end){
                         $rspta=$BDobj->listartimestar();
                        while ($reg=$rspta->fetch_object()){

                            echo '<h4 class="text-center" style="float: none;">'.$reg->lastname_peo.' '.$reg->name_peo.' | ENTRADA ' .Date('g:i A',strtotime($reg->time_star)).' </h4>';
                            }

                
            }else{
                        $rspta=$BDobj->listar();
                        while ($reg=$rspta->fetch_object()){

                            echo '<h4 class="text-center" style="float: none;">'.$reg->lastname_peo.' '.$reg->name_peo.' | SALIDA' .Date('g:i A',strtotime($reg->time_star)).' </h4>';
                    }
           
            }
    }
 break;
}


?>
