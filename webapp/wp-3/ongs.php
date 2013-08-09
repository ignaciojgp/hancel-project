<?php
	function ongs()
    {
		include "bd.php";
		
		//$db = new appMySQL();
		
		$respuesta = array();
		$queryMysql = "SELECT * FROM ongs";
		$consulta = $db->consulta($queryMysql);
		
		if($db->num_rows($consulta)>0)
		{
			$respuesta['resultado']="ok";
		  	$descripcion = array();
		  	while($resultado = $db->fetch_array($consulta))
			{	 
				 $ong = array();
				 
				 $ong["id"]=$resultado["id"];
				 $ong["imagen"]=$resultado["imagen"];
				 $ong["nombre"]=$resultado["nombre"];
				 $ong["descripcion"]=$resultado["descripcion"];
				 
				 array_push($descripcion, $ong);
			}
			$respuesta['descripcion'] = $descripcion;
		}
		else
		{
			$respuesta['resultado']="error";
			$respuesta['descripcion']="no se accede a las ongs";		
		}
		$db->cerrar_conexion;
          return $respuesta;
		  //print_r($respuesta);
    }
?>