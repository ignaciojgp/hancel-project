<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	
	
	$dp = new DataProvider();
	
	
	
	if(isset($_REQUEST['id'])) $id = (int) trim($_REQUEST['id']);
	
	
	
		
	$dp->eliminarONG($id);
		
		
	header("location: lista_ongs.php?ajax=true");
	
		
	
?>