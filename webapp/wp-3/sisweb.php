<?php
//class appMySQL consultar la base

$Function=$_GET["f"];//variable ENTRADA modo de pruebas

//case para crear switch de peticioes (interface)
switch ($Function) {

   case "login":

          $password = $_GET["strPass"];
          $username = $_GET["strUsr"];
          $idDevice = $_GET["id_device"];
          
          include "login.php";

          $res = login($username,$password,$idDevice);
          $res = json_encode($res);
          echo $res;

         break;
   case "registro":
          //echo "entro a registro";

          $usuario     = $_GET["usuario"];
          $idDevice    = $_GET["idDevice"];
          $password    = $_GET["password"];
          $email       = $_GET["email"];
          $cel         = $_GET["celular"];
          $imei        = $_GET["imei"];
          $verDroid    = $_GET["verDroid"];
          $mailsAmigos = $_GET["mailsAmigos"];

          $fechas      = date('d/m/y');
          $horas       = date('G:i:s');

          //echo "datos registro:".$usuario."---".$idDevice."---". $password."---". $email."---".$cel."---".$imei."---".$verDroid."---".$fechas."---".$horas."---".$mailsAmigos."<br><br>";
          include "registro.php";
          //?f=tracking&usuario=a&idDevice&password=a&email=jhosua&celular=67564654&imei=imei
          $res = registro($usuario, $idDevice, $password, $email,$cel, $imei, $verDroid, $fechas, $horas, $mailsAmigos);
          $res = json_encode($res);
          echo $res;

         break;
   
       case "tracking":
      
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
          $res = tracking($androidId, $idDevice, $idUsuario, $latitude, $longitude, $bateria, $fecha, $hora, $panic, $imei, $emailsIds, $ongsIds);
          $res = json_encode($res);
         break;
       case "panico":
      
          $usuario = $_GET["usuario"];

          $androidId = $_GET["androidId"];
          $idDevice  = $_GET["idDevice"]; 
          $idUsuario = $_GET["idUsuario"];
          $latitude  = $_GET["latitude"];
          $longitude = $_GET["longitude"];
          $bateria   = $_GET["bateria"];
          $fecha     = date('d/m/y');
          $hora      = date('G:i:s');
          $panic     = 1;
          $imei      = 'null';
          $emailsIds = $_GET["emailsIds"];
          $ongsIds   = $_GET["ongsIds"];
          
          include "panico.php";
          //?f=panico&androidId=androidId&idDevice=idDevice&idUsuario=idUsuario&latitude=latitude&longitude=longitude&bateria=50&fecha=fecha&hora=hora&emailsIds=a@a.com|b@b.com|c@c.com&ongsIds=1|2|3|4
          $res = panico($androidId, $idDevice, $idUsuario, $latitude, $longitude, $bateria, $fecha, $hora, $panic, $imei, $emailsIds, $ongsIds, $usuario);
          $res = json_encode($res);
         break;         
       
	   case "ongs":      
          include "ongs.php";          
          $res = ongs();
          $res = json_encode($res);
		  print_r($res);
         break;         

		 
		 }