<?php
	
	function todasLasAlertas(){
		
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$arreglo = array();
		
	  	$queryMysql = "SELECT * FROM tracking WHERE panic = 2 ";
	  	
		$consulta = $db->consulta($queryMysql);
		
		while($tracking = $db->fetch_array($consulta)){
			
			array_push($arreglo,$tracking);
		
		}
		
		
		
		return($arreglo);
		
	}
	
	function rastreosPorUsuario($idUsuario){
		
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$arreglo = array();
		
	  	$queryMysql = "SELECT * FROM tracking Where idUsuario = '".$idUsuario."'";
	  	
		$consulta = $db->consulta($queryMysql);
		
		while($tracking = $db->fetch_array($consulta)){
			
			array_push($arreglo,$tracking);
		
		}
		
		
		return($arreglo);
		
	}
	
	function rastreosPorUsuarioyFecha($idUsuario,$fecha){
		
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase
		
		
		$arreglo = array();
		
		
		
		
	  	$queryMysql = "SELECT * FROM tracking Where idUsuario = '".$idUsuario."' && fecha = '".$fecha."'";
	  	
		
		
		$consulta = $db->consulta($queryMysql);
		
		while($tracking = $db->fetch_array($consulta)){
			
			array_push($arreglo,$tracking);
		
		}
		
		
		
		return($arreglo);
		
	}
	
	function validaBusqueda($idTracking,$claveBusqueda){
	
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase
		
		$queryMysql = "SELECT 	
								tracking.id as track, 
								tracking.idUsuario,
								usuario.usuario,
								usuario.password
								
								FROM tracking 

			INNER JOIN usuario ON usuario.id = tracking.idUsuario

		
			Where tracking.id = '".$idTracking."
			
		' ";
	  	


		$consulta = $db->consulta($queryMysql);
		
		$usuario = $db->fetch_array($consulta);
		
		$clavePrivada = md5($usuario['usuario'].$usuario['password']);
	
		
		
		if($usuario != NULL){
			if($clavePrivada == trim($claveBusqueda)){
				
				return $usuario['idUsuario'];	
				
				
			}else{
				return NULL;
			}
		}else{
			return NULL;
		}
	}

 	function getEmailCodeForTracking($idTracking){
		
		include_once("../wp-3/bd.php");
		
		print($idTracking);
		
		$db = new appMySQL();//crear objeto clase
		
		$queryMysql = "SELECT 	
								tracking.id as track, 
								tracking.idUsuario,
								tracking.emailsIds,
								tracking.ongsIds,
								tracking.extra4,
								usuario.usuario,
								usuario.password
								
								FROM tracking 

			INNER JOIN usuario ON usuario.id = tracking.idUsuario

		
			Where tracking.id = ".$idTracking." ";
		
		
		$consulta = $db->consulta($queryMysql) or die("se jode");
		
		
		
		$usuario = $db->fetch_array($consulta);
		
		if(!$usuario){
			print ("n hay resultado");
			return false;	
		}
		
		
		print_r($usuario."usuario");
		
		
		$clavePrivada = md5($usuario['usuario'].$usuario['password']);
		
		
		$result = array("usrName"=>$usuario['usuario'],"usrId"=>$usuario['idUsuario'],"clave"=>$clavePrivada, "emails"=>$usuario['extra4'], "ongsIds"=>$usuario['ongsIds']);
		
		print_r($result);
		
		return $result;
	}

	function getTraking($idTracking){
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase
		
		
		$queryMysql = "SELECT * FROM tracking WHERE tracking.id = '".$idTracking."' ";
	  	
		$consulta = $db->consulta($queryMysql);
		
		return $db->fetch_array($consulta);
		
	}
	
	
	
	//f180e1a8f017bcd8dd48c5e4ee7573c7

?>