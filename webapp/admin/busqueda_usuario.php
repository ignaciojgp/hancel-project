<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	include_once("phpLib/classUser.php");

	$dp = new DataProvider();
		
	//http://localhost/hancel/admin/default.php?id=5&c=f180e1a8f017bcd8dd48c5e4ee7573c7&f=07/30/2013
	if(isset($_REQUEST['id']) && isset($_REQUEST['c'])){
		$idTracking = $_REQUEST['id'];
		
		$idClave = $_REQUEST['c'];

	
		$listaTracking = $dp->busquedaDeUsuarioPorOng($idTracking,$idClave);
		
		if($listaTracking != NULL){
			$datosTracking = $dp->obtenerTraking($idTracking);
		}
	}

	$subview = "busqueda_usuario-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}

	
?>