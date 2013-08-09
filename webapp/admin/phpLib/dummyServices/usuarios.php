<?php

	function todosLosUsuarios($page){
		
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$arreglo = array();
		
	  	$queryMysql = "SELECT * FROM usuario ";
	  	
		$consulta = $db->consulta($queryMysql);
		
		while($tracking = $db->fetch_array($consulta)){
			
			array_push($arreglo,$tracking);
		
		}
		
		
		
		return($arreglo);
		
	}
	
	
	
	function todosLasONGs($page){
		
		include_once("../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$arreglo = array();
		
	  	$queryMysql = "SELECT * FROM ongs ";
	  	
		$consulta = $db->consulta($queryMysql);
		
		while($tracking = $db->fetch_array($consulta)){
			
			array_push($arreglo,$tracking);
		
		}
		
		
		
		return($arreglo);
		
	}
	
	function getONG($id){
		
		include_once("../wp-3/bd.php");
		//include_once("../../../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$RES = NULL;
		
	  	$queryMysql = "SELECT * FROM ongs WHERE id = '".$id."' LIMIT 1";
	  	
		$consulta = $db->consulta($queryMysql);
		
		while($tracking = $db->fetch_array($consulta)){
			$RES =$tracking;
		}
		
		return $RES;
			
	}
	
	function saveONG($data,$id){
		include_once("../wp-3/bd.php");
		//include_once("../../../wp-3/bd.php");
		$queryMysql ;
		
		
		if($id != NULL){
			
			$queryMysql = "UPDATE ongs SET 
			
				imagen = '".$data['imagen']."', 
				nombre = '".$data['nombre']."',	
				descripcion = '".$data['descripcion']."',	
				extra1 = '".$data['extra1']."',	
				extra2 = '".$data['extra2']."',	
				extra3 = '".$data['extra3']."',	
				extra4 = '".$data['extra4']."'
				
				WHERE id = '".$id."'";
			
			
		}else{
			
			$queryMysql = "INSERT INTO ongs  
			
				(
				imagen, 
				nombre,	
				descripcion,	
				extra1,	
				extra2,	
				extra3,	
				extra4
				)
				
				VALUES
				
				(
				'".$data['imagen']."', 
				'".$data['nombre']."',	
				'".$data['descripcion']."',	
				'".$data['extra1']."',	
				'".$data['extra2']."',	
				'".$data['extra3']."',	
				'".$data['extra4']."'
				)
				";	
		}
		
		$consulta = $db->consulta($queryMysql);
		
	}
	
	function eliminarONG($id){
		
		include_once("../wp-3/bd.php");
		//include_once("../../../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$RES = NULL;
		
	  	$queryMysql = "DELETE FROM ongs WHERE id = '".$id."' LIMIT 1";
	  	
		$consulta = $db->consulta($queryMysql);
		
		
		return $RES;
			
	}
	
	
	function getUsuario($id){
		
		include_once("../wp-3/bd.php");
		//include_once("../../../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$RES = NULL;
		
	  	$queryMysql = "SELECT usuario, email, extra1 FROM usuario WHERE id = '".$id."' LIMIT 1";
	  	
		$consulta = $db->consulta($queryMysql);
		
		while($tracking = $db->fetch_array($consulta)){
			$RES =$tracking;
		}
		
		return $RES;
			
	}
	
	function cambiaPerfilUsuario($id,$perfil){
		
		include_once("../wp-3/bd.php");
		//include_once("../../../wp-3/bd.php");
		
		$db = new appMySQL();//crear objeto clase

		
		$RES = NULL;
		
	  	$queryMysql = "UPDATE usuario SET extra1 = ".$perfil." WHERE id = '".$id."'";
	  	
		$consulta = $db->consulta($queryMysql);
		/*
		while($tracking = $db->fetch_array($consulta)){
			$RES =$tracking;
		}
		*/
		return $RES;
			
	}
	
	//cambiaPerfilUsuario(8,2);
	
	/*
	$data = array();
	
	$data['imagen'] ="otracosa.jpg";
	$data['nombre'] ="test2";
	$data['descripcion']="nuevo asd asd asd as";
	$data['extra1']=NULL;
	$data['extra2']	="phancel.app@gmail.com";
	$data['extra3']	=NULL;
	$data['extra4']=NULL;
	*/
	//saveONG($data,4);
	
//	print_r(getONG(3));
	
?>