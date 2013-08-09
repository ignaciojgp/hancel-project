<?php

	function listaONGs(){
		
		include_once("../wp-3/bd.php");
		$db = new appMySQL();//crear objeto clase

		
		$arreglo = array();
		
	  	$queryMysql = "SELECT id,imagen, nombre FROM ongs ORDER BY 'nombre' ";
	  	
		$consulta = $db->consulta($queryMysql);
		
		while($ong = $db->fetch_array($consulta)){
			
			array_push($arreglo,$ong);
		
		}
		
		return($arreglo);
		
	}
	
	function detalleOng($idONG){
		
		include_once("../wp-3/bd.php");
		$db = new appMySQL();//crear objeto clase

		
		$arreglo = array();
		
	  	$queryMysql = "SELECT id,imagen, nombre FROM ongs Where id = ".$idONG." ";
	  	
		$consulta = $db->consulta($queryMysql);
		
		$ong = $db->fetch_array($consulta);
		
		
		
		return($ong);
		
	}
	

?>