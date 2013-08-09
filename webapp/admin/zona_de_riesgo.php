<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	
	$dp = new DataProvider();
		
	$listaTracking = $dp->getTodasLasAlertasdePanicoDeTodosLosUsuarios();
	
	$subview = "zona_de_riesgo-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}

	
?>