<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	include_once("phpLib/classUser.php");
	
	$dp = new DataProvider();
		
	if(!isset($user)) $user = new User($_SESSION['user']);
		
	$listaTracking = $dp->getListadoUltimoTracking($user->id);
	
	$tiempoTracking = $dp->calcularTiempoDelTraking($listaTracking );
	
	$ultimoRastreo = end($listaTracking);
	
	reset($listaTracking);
	
	$tiempoTranscurrido = $dp->calculartiempoDesElTraking($ultimoRastreo);
	
	
	$subview ="ultima_ubicacion-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}
	
?>