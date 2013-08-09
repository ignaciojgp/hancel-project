<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	
	
	
	if(isset($_SESSION['user'])){
		//si ya existe la sesion redirecciona al default
		header("location: default.php");
	}
	
	if(isset($_REQUEST['login'])){
		
		$user = trim($_REQUEST['login']['user']);
		$pass = trim($_REQUEST['login']['pass']);
		
		if(strlen($user) > 0 && strlen($pass) > 0){
		
			$dp = new DataProvider();
			
			
			
			if($dp->commitLogin($user,$pass)){
				
				
				if(isset($_SESSION['redirect'])){
					
					$url = $_SESSION['redirect'];
					
					unset($_SESSION['redirect']);
						
					header("location: ".$url);
					
				}else{
				
					header("location: default.php");
				}
				
				pushAlert("login success");
				
			}else{
				
				pushAlert("bad credentials");
		
			}
			
		}			
		
	}
	
	

	include("login_view.php");
	commitAlerts();
?>