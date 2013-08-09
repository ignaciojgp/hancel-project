<html>
<head>
	<title>
		Hancell 
	</title>
	
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	
	<link href="theme/webapp.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" type="text/css" href="theme/redmond/jquery-ui-1.9.2.custom.min.css">
	<link rel="stylesheet" type="text/css" href="theme/colorbox.css">
	
	<script type="text/javascript" src="jslib/jquery-1.10.1.min.js" ></script>
	<script type="text/javascript" src="jslib/jquery-ui-1.9.2.custom.min.js" ></script>
	<script type="text/javascript" src="jslib/jquery.colorbox-min.js" ></script>
	
	
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBssCGPhNOH4V6Fn4bd0Ppd-VJbk_3BkdY&sensor=true"></script>
    <script type="text/javascript" src="jslib/hancelmainmap.js" ></script>
    <script type="text/javascript" src="jslib/sections.js" ></script>
	<style>
		.navigation li {
		     width: 25%;
		}
	</style>
	
</head>
<body onLoad="loadMap();">
	<div class="wrapper">
		<!-- cabecera -->
		<h1>
			<span class="logo">
				<img src="images/hancel_logo.png" alt="hancel" />
			</span>
			<a href="#" class="homeIco" title="<?php print(getLocaleString("Inicio")); ?>"><span><?php print(getLocaleString("Inicio")); ?></span></a>
			<a href="close.php" class="logoutIco" title="<?php print(getLocaleString("Cerrar sesi&oacute;n")); ?>" ><span><?php print(getLocaleString("Cerrar sesi&oacute;n")); ?></span></a>
			<form >
				<label class="search">
					<input type="text" name="inpSearch" value=""/>
				</label>
			</form>
		</h1>
		
		<!-- columna izquierda -->
		<div class="colIzq">
			<!-- usuario -->
			<div class="user">
				<div class="avatar">
					<img alt="avatar" src="images/avatar.jpg" />
				</div>
				<p><?php 
					print_r($user->usuario);
				?></p>
				<p><a href="#"><?php print(getLocaleString("Editar Perfil")); ?></a></p>
			</div>
			<div class="scrollPanel">
				<div class="contactlist">
					
				</div>
			</div>
			<img src="images/shadowLeft.png" class="shadow" />
		</div>
		
		
		<!-- columna derecha -->
		<div class="colDer">
			<ul class="navigation">
			
				<li class="selected">
					<a onClick="changeToSection('lista_usuarios.php?ajax=true',this)" id="linkListaUsuario"><span><?php print(getLocaleString("Lista de usuarios registrados")); ?></span></a>
				</li>
				<li >
					<a onClick="changeToSection('lista_ongs.php?ajax=true',this)" id="linkListaONG"><span><?php print(getLocaleString("Lista de ongs")); ?></span></a>
				</li>
				
				<li>
					<a onClick="changeToSection('zona_de_riesgo.php?ajax=true',this)"><span><?php print(getLocaleString("Zonas de riesgo")); ?></span></a>
				</li>
				<li>
					<a onClick="changeToSection('ultima_ubicacion.php?ajax=true',this)"><span><?php print(getLocaleString("Mi &uacute;ltima ubicaci&oacute;n")); ?></span></a>
				</li>
				<!--li>
					<a onClick="changeToSection('todas_las_alertas.php?ajax=true',this)"><span><?php print(getLocaleString("Alertas de p&aacute;nico")); ?></span></a>
				</li-->
				<!--li>
					<a onClick="changeToSection('herramientas.php?ajax=true',this)"><span><?php print(getLocaleString("Herramientas")); ?></span></a>
				</li-->
			</ul>
			
			
			<!-- mapa de google  -->		
			<div class="map" >
				<div class="googlemap" id="map-canvas">
				</div>
			</div>
			
				
			<div class="fullPanel" id="mainPanel">	
				
				<?php 
					if(isset($subview)) include($subview);
					else echo "no subview"; 
				 ?>
					
			</div>	
				
			</div>
		</div>
	</div>
	<div class="loadScreen" id="wait"> 
		<div><?php print(getLocaleString("espere...")); ?></div>
	</div>
	
</body>
</html>
