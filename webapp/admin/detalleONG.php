<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	
	
	$dp = new DataProvider();
	
	$id = 0;
	
	if(isset($_REQUEST['id'])) $id = (int) trim($_REQUEST['id']);
	
	
	
	if(isset($_REQUEST['ong'])){
		
		$ong = $_REQUEST['ong'];
		
		if($_REQUEST['ong']['id']!=0){
			
			$dp->saveONG(	$ong['id'], 
							$ong['imagen'], 
							$ong['nombre'],	
							$ong['descripcion'],	
							$ong['mail']);
							
		}else{
			
			$dp->saveNewONG($ong['imagen'], 
							$ong['nombre'],	
							$ong['descripcion'],	
							$ong['mail']);
			
		}
		
		include("phpLib/closeColorbox.php");
		
	}
	
		
	$ong = $dp->getONG($id);
		
	$subview ="detalleONG-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}
	
?>