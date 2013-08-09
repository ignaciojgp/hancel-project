<?php
	class User
	{
	
		public $id;
		public $usuarioApp;
		public $usuario;
		public $perfil;
		public $email;
		public $celular;
		public $imei;
		public $fecha;
		public $hora;
		public $contactos;
		
		function __construct($array) {
			
			//print_r($array);
			
		   	$this->id = $array['usr-id'];
			$this->usuario = $array['usr-usuario'];
			$this->perfil = $array['usr-perfil'];
			$this->contactos = $array['usr-contactos'];
			
			
			/*			
			$this->usuarioApp = $array['usuarioApp'];
			$this->nombre = $array['usuario'];
			$this->email = $array['email'];
			$this->celular = $array['celular'];
			$this->imei = $array['imei'];
			$this->fecha = $array['fecha'];
			$this->hora = $array['hora'];*/
		}
	
		
	}
	
?>