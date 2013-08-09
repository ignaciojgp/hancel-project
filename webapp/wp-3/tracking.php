<?php

function tracking($androidId, $idDevice, $idUsuario, $latitude, $longitude, $bateria, $fecha, $hora, $panic, $imei, $emailsIds, $ongsIds)
{

include "bd.php";
$aviso = "";
$responde = "ok";

//-> id de USR == id de Device - en labla usuario
//<- true

$trackingQueryMysql = "INSERT INTO tracking (id, androidId, idDevice, idUsuario, latitude, longitude, bateria, fecha, hora, panic, imei, emailsIds, ongsIds, extra1, extra2, extra3, extra4 )VALUES (null,'$androidId','$idDevice','$idUsuario','$latitude', '$longitude', '$bateria', '$fecha', '$hora','$panic', '$imei', 'null', '$ongsIds', 'null','null','null','$emailsIds')";
$consultaTres       = $db->consulta($trackingQueryMysql);
$array['bd'] =  'ok';

//-> ultimo tracking si no hay lo iniciamos en (1);
//Insertos los datos.
$object = array('resultado' => $responde,'descripcion'=>$array);
return $object;
}

?>