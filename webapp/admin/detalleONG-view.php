<html>
<head>
	<title>Editar</title>
	<link rel="stylesheet" type="text/css" href="theme/modal.css"/>
</head>
<body>
<div class="modal">
	<h3>Detalle de la ong <strong><?php echo $ong['nombre'] ?></strong></h3>
	<div >
		<form action="detalleONG.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>"/>
			<input type="hidden" name="ajax" value="true"/>
			
			<input type="hidden" name="ong[id]" value="<?php echo $id; ?>"/>
			
			<table width="500" class="formularioONG" >
				<tr>
					<td width="150"> Nombre </td>
					<td><input type="text" name="ong[nombre]" value="<?php echo $ong['nombre']; ?>" /></td>
				</tr>
				<tr>
					<td> Descripción </td>
					<td><textarea rows="10" name="ong[descripcion]"><?php echo $ong['descripcion'] ; ?></textarea></td>
				</tr>
				<tr>
					<td> Imagen </td>
					<td><input type="text" name="ong[imagen]"  value="<?php echo $ong['imagen'] ?>"/></td>
				</tr>
				<tr>
					<td> Correo </td>
					<td><input type="text"  name="ong[mail]" value="<?php echo $ong['extra2'] ?>"/></td>
				</tr>
				<tr>
					
					<td align="center" colspan="2"><input type="submit" class="button" value="enviar" width="150"/></td>
				</tr>
			</table>
			
		</form>
		
	</div>
</div>
</body>