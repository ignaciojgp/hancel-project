<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<title>Untitled Document</title>
</head>

<body >
<div class=="wrapper">
	<div class="barra">
		<div class="c" style="width:500px;">
			<ul id="mainMenu">
				<li><a href="javascript: goTop();" ><?php print(getLocaleString("Inicio")); ?></a></li>
				<li><a href="javascript: goFAQ();"><?php print(getLocaleString("FAQ")); ?></a></li>
				<li><a href="login.php?lang=<?php echo getSecondaryLanguaje() ?>"><?php print(getLocaleString("Lang")); ?></a></li>
			</ul>
			<a href="https://twitter.com/Hancel_App" target="_blank"><span class="twitterIco"></span></a> <a href="https://www.facebook.com/sharer/sharer.php?u=http://hancell_app.com"><span class="facebookIco"></span></a> <a href="https://plus.google.com/share?url=http%3A%2F%2Fwww.hanselapp.com/&hl=en-US" target="_blank"><span class="googleIco"></span></a> </div>
	</div>
	
	<!--logotipo -->
	<div class="bRojo" id="inicio">
		<div class="c login" style="padding-top:10px;">
			<h1 >
				<div><img src="../images/hancel_logo_login.png" style="margin:center;"/></div>
				<div> <span><?php print(getLocaleString("Creando redes para<br/> proteger periodistas")); ?></span>
			</h1>
			<div >
				<h2><?php print(getLocaleString("Formulario de confirmación<br/> de alertas de pánico")); ?></h2>
			
				<form action="confirmaAlerta.php" class="loginBox" >
					<input type="hidden" name="id" value="<?php print($_REQUEST['id']) ?>" />
					<input type="hidden" name="c" value="<?php print($_REQUEST['c']) ?>" />
				
					<label style="padding-top:10px;">
						<span><?php print(getLocaleString("Escriba su nombre")); ?>*</span>
						<input type="text" name="confirm[nombre]" />
					</label>
	
					<label>
						<span><?php print(getLocaleString("Proporcione un teléfono")); ?>*</span>
						<input type="text" name="confirm[telefono]" />
					</label>
					
					<label>
						<span><?php print(getLocaleString("Confirme su correo electrónico")); ?>*</span>
						<input type="text" name="confirm[correo]" />
					</label>
					
					<input type="submit" value="<?php print(getLocaleString("confirmar")); ?>"/>
				</form><br />
<br />
<br /><br />

<div style="text-align:center;">* todos los campos son obligatorios</div>
<br />
<br />

			</div>
		</div>
	</div>
	
	<div style="text-align:center;"> <a href="http://cpj.org/es/americas/mexico/" target="_blank"><img alt="cpj" src="../images/aliados_01.png"/></a> 
			<a href="http://www.periodistasdeapie.org.mx/" target="_blank"><img alt="../periodistas de pie" src="../images/aliados_02.png"/></a> 
			<a href="http://www.flip.org.co/" target="_blank"><img alt="flip" src="../images/aliados_03.png"/></a> </div>
	
</div>
</body>
</html>