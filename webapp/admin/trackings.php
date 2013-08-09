<?php
	
	function todasLasAlertas(){
		
		include("../wp-3/bd.php");
		  
          $i=0;
          $queryMysql = "SELECT * FROM usuario  WHERE usuario ='".$username."' AND password = '".$password."'";
          $consulta = $db->consulta($queryMysql);
	
		
	}

?>