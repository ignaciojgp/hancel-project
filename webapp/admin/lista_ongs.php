<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	include_once("phpLib/classUser.php");
	
	$dp = new DataProvider();
	
	$page = 1;
	
	if(isset($_REQUEST['page'])) $page = (int) trim($_REQUEST['page']);
		
	$ongs = $dp->getListaONGs();
		
	$subview ="lista_ongs-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}
	
?>