<?php

		  $usuario = $_GET["usuario"];

          $androidId = $_GET["androidId"];
          $idDevice  = $_GET["idDevice"]; 
          $idUsuario = $_GET["idUsuario"];
          $latitude  = $_GET["latitude"];
          $longitude = $_GET["longitude"];
          $bateria   = $_GET["bateria"];
          $fecha     = date('d/m/y');
          $hora      = date('G:i:s');
          $panic     = 0;
          $imei      = "null";
          $emailsIds = "null";
          $ongsIds   = "null";
          
          include "tracking.php";
          //?f=tracking&androidId=androidId&idDevice=idDevice&idUsuario=idUsuario&latitude=latitude&longitude=longitude&bateria=50
		  

for ($i = 1; $i <= 100; $i++) 
{
          $res = tracking($androidId, $idDevice, $idUsuario, $latitude, $longitude, $bateria, $fecha, $hora, $panic, $imei, $emailsIds, $ongsIds);
          $res = json_encode($res);

        echo $res;
}

?>