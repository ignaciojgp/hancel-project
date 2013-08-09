<?php
	
	function getLocaleString($string){
		global $_REQUEST;
		$lang="es";
		
		$lang = getLang();
		
		//print($_REQUEST['lang']);
		
		if( isset($_REQUEST['lang']) ){
			$_SESSION['lang'] = $_REQUEST['lang'];
			$lang = $_REQUEST['lang'];
		}else{
			if(isset($_SESSION['lang'])){
				$lang = $_SESSION['lang'];
			}
		}
		
		
		
		
		$s = findTranslatedString($string,$lang);
		
		if($s != NULL){
			return $s;
		}else{
			return $string;	
		}
	}
	
	function findTranslatedString($string, $lang){
		
		
		
		if(isset($lang)){
		
			if(trim($lang) != ""){
				include("string_".$lang.".php");
			}else{
				include("string_es.php");
			}
			
		}else{
			include("string_es.php");
		}
		
		//include("string_".$lang.".php");
		
		
		if(isset($translates[$string])){
			return($translates[$string]);
		}else{
			return NULL;	
		}
		
	}
	
	function getLang(){
		
		$lang = "es";
		
		if( isset($_REQUEST['lang']) ){
			
			$_SESSION['lang']= $_REQUEST['lang'];
			$lang = $_REQUEST['lang'];
			
		}else{
			
			if(isset($_SESSION['lang'])){
				$lang = $_SESSION['lang'];
			}
			
		}
		
		
		return $lang;
	}
	
	function getSecondaryLanguaje(){
		
		if(getLang()=="es"){
			return "en";	
		}
		
		return "es";
		
	}
	
?>