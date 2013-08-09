<html>
<head>
	<title>Editar</title>
	<link rel="stylesheet" type="text/css" href="theme/modal.css"/>
</head>
<body>
<div class="modal">
	<h3>Cambiar el perfil del usuario<strong> <?php echo $usuario['usuario'] ?></strong> a</h3>
	<div >
		<form action="cambiarPerfilUsuario.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<input type="hidden" name="ajax" value="true"/>
			
			<input type="hidden" name="usuario[id]" value="<?php echo $id; ?>"/>
			
			<table width="500" class="formularioONG" >
				
				<tr>
					<td>Perfil</td>
					<td>
						<select name="usuario[perfil]">
							<?php
								for($i=0;$i<3;$i++){
									
									$selected = $usuario['extra1'] == $i? " selected ":"";
									
									
									
									
									$val = "";
									switch($i){
										case 0:
										$val =  "usuario";
										break;
										case 1:
										$val =  "ong";
										break;
										case 2:
										$val =  "administrador";
										break;	
									}
									
									
									echo "<option ".$selected." value='".$i."'>".$val."</option>";
									
										
								}
							?>
						</select>
					</td>
					<td align="center" colspan="2"><input type="submit" value="enviar" width="150" class="button"/></td>
				</tr>
			</table>
			
		</form>
		
	</div>
</div>
</body>