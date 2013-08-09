<?php
	//inclusion de las libreras
	include_once("phpLib/common.php");
	
	
	
	
	if(isset($_REQUEST['id']) && isset($_REQUEST['c'])){
		
		$id = $_REQUEST['id'];
		$clave = $_REQUEST['c'];
		
		$dp = new DataProvider();
		
		$idUser = $dp->validaAlertaDePanico($id,$clave);
		
		if($idUser != null){
			
			if($dp->validaAlertaDePanico($_REQUEST['id'], $_REQUEST['c'])){
			
				if(isset($_REQUEST['confirm'])){
					
					$conf = $_REQUEST['confirm'];
					
					$errors = "";
					
					
					
					if( trim($conf['nombre']) == ""){ 
						if($errors != "") $errors.=", " ;
						$errors.=" ".getLocaleString("Escriba su nombre");
					}
					if( trim($conf['telefono']) == ""){
						if($errors != "") $errors.=", " ;
						$errors.=" ".getLocaleString("Escriba su nombre");
					}
					if( trim($conf['correo']) == ""){
						if($errors != "") $errors.=", " ;
						$errors.=" ".getLocaleString("Escriba su correo electrónico");
					}else{
						if(!filter_var($conf['correo'], FILTER_VALIDATE_EMAIL)){
							if($errors != "") $errors.=", " ;
							
							$errors.=" ".getLocaleString("El correo está mal escrito");
						}
					}
					
					if($errors == ""){
						
						$dp->enviaCorreoAOng($_REQUEST['id'],$conf);
						
						
						
						include("confirmacion-agradecimiento-view.php");
						
					}else{
						
						pushAlert(" ".$errors);
						
						
						include("confirmaAlerta-view.php");
						
						commitAlerts();
					}
									
				}else{
					include("confirmaAlerta-view.php");
				}
			}
				
		}else{
			
			pushAlert(getLocaleString("lo sentimos pero no puede acceder a esta sección"));
			header("location: login.php");
			
		}
		
		
	
		
		
	}else{
		pushAlert(getLocaleString("lo sentimos pero no puede acceder a esta sección"));
		header("location: login.php");
		
	}
	
	

	//include("confirmaAlerta-view.php");
	//commitAlerts();
?>