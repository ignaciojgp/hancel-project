<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<title>Hancel</title>
</head>

<body >
<div class=="wrapper">
	<div class="barra">
		<div class="c">
			<ul id="mainMenu">
				<li><a href="../index.html" ><?php print(getLocaleString("Inicio")); ?></a></li>
				<li><a href="javascript: goFAQ();"><?php print(getLocaleString("FAQ")); ?></a></li>
				<li><a href="#"><?php print(getLocaleString("Blog")); ?></a></li>
				<li><a href="login.php?lang=<?php echo getSecondaryLanguaje() ?>"><?php print(getLocaleString("Lang")); ?></a></li>
				
			</ul>
			<a href="https://twitter.com/Hancel_App" target="_blank"><span class="twitterIco"></span></a> <a href="https://www.facebook.com/sharer/sharer.php?u=http://hancell_app.com"><span class="facebookIco"></span></a> <a href="https://plus.google.com/share?url=http%3A%2F%2Fwww.hanselapp.com/&hl=en-US" target="_blank"><span class="googleIco"></span></a> </div>
	</div>
	
	<!--logotipo -->
	<div class="bRojo" id="inicio">
		<div class="c login">
			<h1 class="izq"><img src="../images/hancel_logo_login.png"/> <span><?php print(getLocaleString("Creando redes para proteger periodistas")); ?></span></h1>
			<div class="der">
				<form action="login.php" class="loginBox">
					<label>
						<span><?php print(getLocaleString("Usuario")); ?></span>
						<input type="text" name="login[user]" />
					</label>
	
					<label>
						<span><?php print(getLocaleString("Contraseña")); ?></span>
						<input type="password" name="login[pass]" />
					</label>
					
					<input type="submit" value="<?php print(getLocaleString("ingresar")); ?>"/>
				</form>
			</div>
		</div>
	</div>
	
	<div style="text-align:center;"> <a href="http://cpj.org/es/americas/mexico/" target="_blank"><img alt="cpj" src="../images/aliados_01.png"/></a> 
			<a href="http://www.periodistasdeapie.org.mx/" target="_blank"><img alt="../periodistas de pie" src="../images/aliados_02.png"/></a> 
			<a href="http://www.flip.org.co/" target="_blank"><img alt="flip" src="../images/aliados_03.png"/></a> </div>
	
</div>
</body>
</html>