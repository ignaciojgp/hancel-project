<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	include_once("phpLib/classUser.php");

	$dp = new DataProvider();
		
	$tag = "#peligro";
	
	if(isset($_REQUEST['tag'])){
		
		$tag = $_REQUEST['tag'];	
		
	}
		
	if(!isset($user)) $user = new User($_SESSION['user']);
		
		
	$listaTracking = $dp->busquedaDeTwitt($tag);
	
	$subview = "herramientas-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}

	
?>