<?php

	$res = "ok";
	$desc=array();
	
	
	$desc["val1"]="algo1";
	$desc["val2"]="algo2";
	$desc["val3"]="algo3";
	$desc["val4"]="algo4";
	
	
	$object=array("res"=>$res,"desc"=>$desc);
	
	$finalResponse=json_encode($object);
	
	print($finalResponse);

?>