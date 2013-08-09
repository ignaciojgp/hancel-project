<?php

function panico($androidId, $idDevice, $idUsuario, $latitude, $longitude, $bateria, $fecha, $hora, $panic, $imei, $emailsIds, $ongsIds, $usuario)
{

include "bd.php";
$aviso = "";
$responde = "ok";

//-> id de USR == id de Device - en labla usuario
//<- true
//Insertos los datos.
$trackingQueryMysql = "INSERT INTO tracking (id, androidId, idDevice, idUsuario, latitude, longitude, bateria, fecha, hora, panic, imei, emailsIds, ongsIds, extra1, extra2, extra3, extra4 )VALUES (null,'$androidId','$idDevice','$idUsuario','$latitude', '$longitude', '$bateria', '$fecha', '$hora','$panic', '$imei', 'null', '$ongsIds', 'null','null','null','$emailsIds')";
$consultaTres       = $db->consulta($trackingQueryMysql);
$array['bd'] =  'ok';


$idQueryMysql = "SELECT MAX(id) AS id FROM tracking";

$consultaId   = $db->consulta($idQueryMysql);


if($db->num_rows($consultaId)>0)
        {
            while($resultados = $db->fetch_array($consultaId))
          { 
            $idMails =  $resultados['id'];
          }
        }


include "../admin/phpLib/dummyServices/correos.php";

enviaCorreoAContacto($idMails);


//-> ultimo tracking si no hay lo iniciamos en (1);

//envio de correos


$emails = explode("|", $emailsIds);
//echo $pieces[0]; // piece1

$email = "hancel.app@gmail.com";
//$email = "jhosuasme@gmail.com";

//enviar_mail($usuario, $mailsAmigos,$email);
//
//foreach ($emails as $i => $value) {
//    enviar_mail($usuario, $mailsAmigos, $email);
//    //unset($array[$i]);
//}

$object = array('resultado' => $responde,'descripcion'=>$array);

//return $object;
return $idMails;
}

    function enviar_mail($usuario, $mailsAmigos, $email){

    				$subject = "::alerta de panico desde App Hansel::";

                    $mensaje.= "Es un mensaje de panico \n";
                    $mensaje = " \n";
                    $mensaje.= "comunicate conmigo:".$usuario." \n";
                    $mensaje.= "FECHA:       ".date("d/m/Y")."\n";
                    $mensaje.= "HORA:        ".date("h:i:s a")."\n";
                    $mensaje.= "IP:           ".$_SERVER['REMOTE_ADDR']."\n\n";
                    $mensaje.= "---------------------------------- \n";
                    $mensaje.= "Enviado desde http://www.hanselapp.com/ \n";
                   
                    // headers del email
                    $headers = "From: "."noreply@hanselapp.com"."\r\n";
                    // Enviamos el mensaje

                    if (mail($email, $subject, $mensaje, $headers)) {
                        return 1; 
                    } else {
                        return 0; 
                    }
                 }
?>