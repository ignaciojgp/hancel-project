<?php
	//inclusion de las libreras
	include("phpLib/common.php");
	
	unset($_SESSION['user']);
	
	header("location: login.php");

?>