<div class="fulpanel">
	<h3>Usuarios </h3>
	<div class="content">
	<table border="1" class="userList">
		<?php
			while($usuario = each($usuarios)){
				
				//print_r($usuario);
				
		?>
		<tr id="usuario_<?php echo $usuario['value']['id']; ?>">
			<td width="20%"><h4><?php  echo $usuario['value']['usuario'];  ?></h4></td>
			
			<td width="10%"><strong>idDevice</strong> <?php  echo $usuario['value']['idDevice'];  ?></td>
			<td width="10%"><strong>correo</strong> <?php  echo $usuario['value']['email'];  ?></td>
			<td width="10%"><strong>celular</strong> <?php  echo $usuario['value']['celular'];  ?></td>		
			<td width="10%"><strong>Pefil</strong> <?php  
			
			switch($usuario['value']['extra1']){
				case 0: echo "usuario"; break;	
				case 1: echo "ong"; break;	
				case 2: echo "administrador"; break;	
			}  
			
			
			?></td>
			<td width="10%"><strong>opciones</strong> 
								
				<a href="cambiarPerfilUsuario.php?id=<?php echo $usuario['value']['id']; ?>&ajax=true" class="lightbox">cambiar perfil</a>
			</td>
			
		</tr>
		<?php
			}
		?>
	</table>
	</div>
</div>

<style>
.map{
	visibility:hidden;
	}
	</style>
	
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.lightbox').colorbox({iframe:true, width:"350px", height:"200px", onClosed:function(){ 
			var lins = $("#linkListaUsuario").get();
			changeToSection('lista_usuarios.php?ajax=true',lins); 
		}});
	});
</script>