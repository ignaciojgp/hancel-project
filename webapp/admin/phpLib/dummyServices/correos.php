<?php
	
	function getOngsList($ongs){
		
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase
		
		$queryMysql = "SELECT * FROM ongs WHERE id IN (".$ongs.")";
		
		$consulta = $db->consulta($queryMysql);
		
		$ongss = array();
		
		while($ong = $db->fetch_array($consulta)){
			array_push($ongss,$ong);	
		}
		
		return($ongss);
	}
	
	function enviaCorreoONG($contacto,$tracking){
		include_once("../wp-3/bd.php");
		//include_once("trackings.php");
		
		
		$template = file_get_contents('resources/plantillaCorreoONG.php');
		
		$keys= array();
		
		array_push($keys,"(@--usrNombre--@)");
		array_push($keys,"(@--confNombre--@)");
		array_push($keys,"(@--confTelefono--@)");
		array_push($keys,"(@--confEmail--@)");
		array_push($keys,"(@--mails--@)");
		array_push($keys,"(@--link--@)");
		array_push($keys,"(@--idtracking--@)");
		array_push($keys,"(@--claveBusqueda--@)");
			
		
		$data = getEmailCodeForTracking($tracking);
		
		$correos = explode(",", $data['emails']);
		
		
		$lis = "";
		while($correo=each($correos)){
			$lis.="<li> <a href='mailto: ".$correo['value']."' >".$correo['value']."</a></li>";	
		}
		
		$clave = $data['clave'];
		$usrName = $data['usrName'];
		
		$link = "http://hanselapp.com/admin/default.php?id=".$tracking."&c=".$clave;
		
		
		
		$values= array();
		
		array_push($values,$usrName);
		array_push($values,$contacto['nombre']);
		array_push($values,$contacto['telefono']);
		array_push($values,$contacto['correo']);
		array_push($values,$lis);
		array_push($values,$link);
		array_push($values,$tracking);
		array_push($values,$clave);
		
		
		
		
		$mailBody = str_replace($keys, $values, $template);		
		
		$email = "ignaciojpg@gmail.com";
		
		
		$ongs = getOngsList($data['ongsIds']);
		
		while($ong = each($ongs)){

			sendHancelMail($ong['value']['extra2'], $mailBody);
		
		}
		
		sendHancelMail($email, $mailBody);
		
		
		
		
		
	}
	function enviaBienvenida($correo, $usuario){
		
		
		
		$template = file_get_contents('resources/plantillaCorreoBienvenida.php');
		
		$keys= array();
		array_push($keys,"(@--usuario--@)");
		
		$values= array();
		array_push($values, $usuario);
		
		$mailBody = str_replace($keys, $values, $template);		
		
		sendHancelMail($correo,$mailBody);
		
	}
	function enviaCorreoAContacto($tracking){
		
		include_once("../wp-3/bd.php");
		include_once("../admin/phpLib/dummyServices/trackings.php");
		
		
		$template = file_get_contents('../admin/resources/plantillaCorreoAmigos.php');
		
		$keys= array();
		array_push($keys,"(@--link--@)");
			
		
		$data = getEmailCodeForTracking($tracking);
		
		
		
		$clave = $data['clave'];
		$link = "http://hanselapp.com/admin/confirmaAlerta.php?id=".$tracking."&c=".$clave;
		
		
		$values= array();
		array_push($values,$link);
		
		$mailBody = str_replace($keys, $values, $template);		
		
		$email = "ignaciojpg@gmail.com";
		sendHancelMail($email, $mailBody);
		
		$correos = explode(",", $data['emails']);
		while($correo=each($correos)){
			
			
			sendHancelMail($correo['value'],$mailBody);
		}
		
		
		
	}
	
	
	function sendHancelMail($email, $mailBody){
		
		$subject = "::alerta de panico desde App Hansel::";
		// headers del email
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: "."noreply@hanselapp.com"."\r\n";
		// Enviamos el mensaje

		if (mail($email, $subject,$mailBody, $headers)) {
			return 1; 
		} else {
			return 0; 
		}
	}
	
	//enviaBienvenida("ignaciojpg@gmail.com", "ignaciojgp");
	//enviaCorreoAContacto(6);
	
?>