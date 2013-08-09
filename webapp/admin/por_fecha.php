<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	include_once("phpLib/classUser.php");

	$dp = new DataProvider();
		
	$fecha = date("d-M-Y");
	$fechaSQL = date("Y-m-d");
	
	if(isset($_REQUEST['fecha'])){
		
		if(trim($_REQUEST['fecha']) != ""){
		
			$farray = explode("/",$_REQUEST['fecha']);
			
			$time = mktime(0,0,0,$farray[0],$farray[1],$farray[2]);
			
			$fecha = date("d-M-Y",$time);
			$fechaSQL = date("Y-m-d",$time);
		}
	}
		
	if(!isset($user)) $user = new User($_SESSION['user']);
		
		
	$listaTracking = $dp->fechasDeRastreo($user->id,$fechaSQL);
	
	$subview = "por_fecha-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}

	
?>