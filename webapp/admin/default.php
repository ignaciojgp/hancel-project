<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	include_once("phpLib/classUser.php");



	
	if(isset($_SESSION['user'])){
		
		$user = new User($_SESSION['user']);
		//petición de valores
		$dp = new DataProvider();
		
		$listaONGs = $dp->getListaONGsPorUsuario($user->id);
		$listaContactos = explode(",",$user->contactos);
		
		
		
		if($user->perfil == 1){
			
			include("busqueda_usuario.php");
			include("default_ongview.php");	
			
			
			
		}else if($user->perfil==2){
			
			include("lista_usuarios.php");
			include("default_administratorview.php");
			
		}else{
			
			include("ultima_ubicacion.php");
			include("default_view.php");
		
		}
		
		commitAlerts();
			
	}else{
		
		$_SESSION['redirect'] == curPageURL();
		
		header("location: login.php");
	}
	

	function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}

	
?>