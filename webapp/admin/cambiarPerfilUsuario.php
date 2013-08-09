<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	
	
	$dp = new DataProvider();
	
	$id = 0;
	
	if(isset($_REQUEST['id'])) $id = (int) trim($_REQUEST['id']);
	
	$usuario = $dp->getUsuario($id);
	
	
	
	if(isset($_REQUEST['usuario'])){
		
		$user = $_REQUEST['usuario'];
		
		
			
		$dp->updatePerfilUsuario($user['id'], $user['perfil']);
			
		
		
		include("phpLib/closeColorbox.php");
		
	}
	
		
	$ong = $dp->getONG($id);
		
	$subview ="cambiarPerfilUsuario-view.php";
	
	if(isset($_REQUEST['ajax'])){
		include($subview);
	}
	
?>