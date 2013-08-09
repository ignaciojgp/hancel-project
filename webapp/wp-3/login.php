<?php
    //?f=login&strPass=a&strUsr=a&id_device=767tgb7665564f5654456
    function login($username,$password,$idDevice)
    {
		include "bd.php";
		$respuesta = array();
		
        	
		$queryMysql = "SELECT * FROM usuario  WHERE usuario ='".$username."' AND password = '".$password."' limit 1";
		$consulta = $db->consulta($queryMysql);
		
		$i=0;
		
		if($db->num_rows($consulta)>0)
		{
			$respuesta['resultado']="ok";
			/*
			$responde = "ok";
		  
			$arrayStatus['respuesta'] =  'ok';
		  */
		  	$descripcion = array();
		  
		  	while($resultado = $db->fetch_array($consulta))
			{
				 $i++;
				 $descripcion['usr-id'] =  $resultado['id'];
				 $descripcion['usr-usuario'] =  $resultado['usuario'];
				 $descripcion['usr-perfil'] =  $resultado['extra1'];
				 $descripcion['usr-contactos'] =  $resultado['extra4'];
				 
			}
			
			$hoy = getdate();
			
//			$idDevice = md5($hoy[0]."".$descripcion['usr-usuario']);
			//$idDevice = $hoy[0];
			
			$setIdDeviceQuery = "UPDATE usuario SET idDevice = '".$idDevice."' WHERE id = '".$descripcion['usr-id']."'";
			
			
			$db->consulta($setIdDeviceQuery);
			
			$descripcion['android-Id'] =  $idDevice;
			
			
			
			$trackingSQL = "SELECT * FROM tracking WHERE idUsuario = '".$descripcion['usr-id']."' ORDER BY id ASC LIMIT 1";
			$consultaDos   = $db->consulta($trackingSQL);
			
			
			
			
			if($db->num_rows($consultaDos)>0)
			{
				$tracking = $db->fetch_array($consultaDos);
				$descripcion['id-tracking']=  $tracking['id'];
				
				
			}else{
				$descripcion['id-tracking'] = 0;
			}
			
			$respuesta['descripcion'] = $descripcion;
			
		  
			
			
		}
		else
		{

			
			$respuesta['resultado']="error";
			$respuesta['descripcion']="no se encontraron usuarios";
			
		}
		

          return $respuesta;
    }

?>