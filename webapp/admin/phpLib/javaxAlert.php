<?php
	
	
	function getMessagesBundle(){
		if(!isset($_SESSION['alerts'])){
			$_SESSION['alerts']=array();
		}
	}
	
	function pushAlert($message){
		
		getMessagesBundle();
		
		array_push($_SESSION['alerts'],$message);
		
	}

	function commitAlerts(){

		getMessagesBundle();
		
		$messages = $_SESSION['alerts'];
		
		$i=count($messages);
		if($i>0){
			
			$script="<script type='text/javascript'>";
			
			
			
			foreach ($messages as $value){
				
				$script.="alert('".$value."');";
				
			}
			$script.="</script>";
			
			
			print($script);
				
		}	
		
		unset($_SESSION['alerts']);
			
	}

?>