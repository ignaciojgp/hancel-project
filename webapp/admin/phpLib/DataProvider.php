<?php
class DataProvider{
	
	
	function commitLogin($usuario,$contrasenia){
		
		include_once("../wp-3/login.php");
		
		
		$p= md5($contrasenia);
	
		
		$resultado = login($usuario,$p,NULL);
		
		
		if(isset($resultado['resultado'])){
			
			if($resultado['resultado'] != "error"){
				$_SESSION['user'] = $resultado['descripcion'];
				return true;	
			}else{
				return false;	
			}
		
		}else{
			return false;	
		}
		
		
		
	}
	
	
	function getListadoUltimoTracking($idUsuario){
		include_once("dummyServices/trackings.php");
		
		$listaRastreos = rastreosPorUsuario($idUsuario);
		return $listaRastreos;
	}
	
	
	function getTodasLasAlertasdePanicoDeTodosLosUsuarios(){
		include_once("dummyServices/trackings.php");
		
		$listaRastreos = todasLasAlertas();
		
		return $listaRastreos;
	}
	
	
	function calcularDistancia($puntoA, $puntoB){
		return $distancia;
	}
	
	function calcularTiempoDelTraking($trakingList){
		
		
	
		
		$timespan = array_merge( explode("-",$trakingList[0]['fecha']), explode(":",$trakingList[0]['hora'])  );
		
		$startTimestamp = mktime($timespan[3],$timespan[4],$timespan[5],$timespan[1],$timespan[2],$timespan[0]);
	
		$fin = count($trakingList)-1;
	
		$timespan = array_merge( explode("-",$trakingList[$fin]['fecha']), explode(":",$trakingList[$fin]['hora'])  );
		
		$endTimestamp = mktime($timespan[3],$timespan[4],$timespan[5],$timespan[1],$timespan[2],$timespan[0]);
	
	
		$tiempo = $this->tiempoTranscurridoEntre($startTimestamp, $endTimestamp);
		
		return $tiempo;
	}
	
	function calculartiempoDesElTraking($traking){
		
		
		
		$timespan = array_merge( explode("-",$traking['fecha']), explode(":",$traking['hora'])  );
		
		$startTimestamp = mktime($timespan[3],$timespan[4],$timespan[5],$timespan[1],$timespan[2],$timespan[0]);
	
//		$fin = count($trakingList)-1;
	
		
		
		$endTimestamp = time();
	
	
		$tiempo = $this->tiempoTranscurridoEntre($startTimestamp, $endTimestamp);
		
		return $tiempo;
	}
	
	
	function tiempoTranscurridoEntre($startTimestamp, $endTimestamp){
		
		$seconds = $endTimestamp - $startTimestamp;
		
		$minutes = ($seconds / 60);
		
		$hours = floor($seconds / (60 * 60));
		
		$minutosRestantes = floor($minutes - $hours*60);
		
		
		$tiempo = array(
			"horas"=>$hours,
			"minutos"=>$minutosRestantes
		);
		
		return $tiempo;
	}
	
	function fechasDeRastreo($usuario, $fecha){
		include_once("dummyServices/trackings.php");
		
		$listaRastreos = rastreosPorUsuarioyFecha($usuario,$fecha);

		return $listaRastreos;
	}
	
	function busquedaDeTwitt($tag){
		
		$listaTagsGeolocalizados = array();
		return $listaTagsGeolocalizados;
	}
	
	function getListaContactosPorUsuario($idUsuario){
		
	
		$listaContactos = '{"contacto1":{"id":1, "nombre":"con1","img":"avatar.jpg"},	"contacto2":{"id":2, "nombre":"con2","img":"avatar2.jpg"},	"contacto3":{"id":3, "nombre":"con3","img":"avatar.jpg"},	"contacto4":{"id":4, "nombre":"con4","img":"avatar2.jpg"},	"contacto5":{"id":5, "nombre":"con5","img":"avatar.jpg"},	"contacto6":{"id":6, "nombre":"con6","img":"avatar2.jpg"}}';
	
		$listaContactos = json_decode($listaContactos);
		
		
		return $listaContactos;
	}
	
	function getListaONGs(){
		
		include_once("dummyServices/contactos.php");
		
		return listaONGs();
			
	}
	function getListaONGsPorUsuario($idUsuario){
	
		include_once("dummyServices/contactos.php");
		
		$listaContactos = listaONGs();
		
		return $listaContactos;
	}
	
	function distance($lat1, $lng1, $lat2, $lng2, $miles = true)
	{
		
		$pi80 = M_PI / 180;
		$lat1 *= $pi80;
		$lng1 *= $pi80;
		$lat2 *= $pi80;
		$lng2 *= $pi80;
	 
		$r = 6372.797; // mean radius of Earth in km
		$dlat = $lat2 - $lat1;
		$dlng = $lng2 - $lng1;
		$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
		$km = $r * $c;
	 
		return ($miles ? ($km * 0.621371192) : $km);
	}
	
	function busquedaDeUsuarioPorOng($idTracking,$clave){
		
		include_once("dummyServices/trackings.php");

		
		
		
		if($idUsuario = validaBusqueda($idTracking,$clave)){
			
			

			return rastreosPorUsuario($idUsuario);
			
		}else{
			print("ya valido");			
			
			
			return NULL;	
		}
			
	}
	
	function validaAlertaDePanico($idTracking,$clave){
		include_once("dummyServices/trackings.php");
		
		return validaBusqueda($idTracking,$clave);
			
	}
	
	function obtenerTraking($idTracking){
		
		include_once("dummyServices/trackings.php");
		
		return getTraking($idTracking);
		
		
		
	}
	
	function enviaCorreoAOng($idTracking, $datosContacto){
		include_once("dummyServices/correos.php");
		
		
		
		

		enviaCorreoONG($datosContacto,$idTracking);
		
		
	}
	
	function getListaUsuarios($page = 1){
		
		include_once("dummyServices/usuarios.php");
		
		return todosLosUsuarios($page);
		
	}
	
	function getONG($id){
	
		include_once("dummyServices/usuarios.php");
		
		return getONG($id);
		
	}
	
	
	function getUsuario($id){
	
		include_once("dummyServices/usuarios.php");
		
		return getUsuario($id);
		
	}
	
	function updatePerfilUsuario($id,$perfil){
		include_once("dummyServices/usuarios.php");
		
		return cambiaPerfilUsuario($id, $perfil);
	}
	
	function eliminarONG($id){
	
		include_once("dummyServices/usuarios.php");
		
		return eliminarONG($id);
		
	}
	
	function saveONG($id, $imagen, 
				$nombre,	
				$descripcion,	
				//$extra1,	
				$mail
				//$extra3,	
				//$extra4
				){
	
		include_once("dummyServices/usuarios.php");
		
		$data['imagen'] =$imagen;
		$data['nombre'] =$nombre;
		$data['descripcion']=$descripcion;
		$data['extra1']=NULL;
		$data['extra2']	=$mail;
		$data['extra3']	=NULL;
		$data['extra4']=NULL;
		
		saveONG($data,$id);
		
	}
	
	function saveNewONG($imagen, 
				$nombre,	
				$descripcion,	
				//$extra1,	
				$mail
				//$extra3,	
				//$extra4
				){
	
		include_once("dummyServices/usuarios.php");
		
		$data['imagen'] =$imagen;
		$data['nombre'] =$nombre;
		$data['descripcion']=$descripcion;
		$data['extra1']=NULL;
		$data['extra2']	=$mail;
		$data['extra3']	=NULL;
		$data['extra4']=NULL;
		
		saveONG($data,NULL);
		
	}
	
}
?>
