<div class="fulpanel">
	<h3>Usuarios  <a href="detalleONG.php?ajax=true"  class="lightbox button">Nuevo</a></h3>
	<div class="content">
	<table border="1" class="userList">
		<?php
			while($ong = each($ongs)){
				
				//print_r($usuario);
				
		?>
		
		
		<tr id="ong_<?php echo $ong['value']['id']; ?>">
			<td width="20%"><h4><?php  echo $ong['value']['nombre'];  ?></h4></td>
			<td width="10%"><strong>imagen</strong> <?php  echo $ong['value']['imagen'];  ?></td>
			<td width="10%"><strong>opciones</strong> 
				<a href="#" onClick="confirmarBorrado(<?php echo $ong['value']['id']; ?>)" >eliminar</a>				
				<a href="detalleONG.php?ajax=true&id=<?php echo $ong['value']['id']; ?>" class="lightbox">editar</a>
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
		$('.lightbox').colorbox({iframe:true, width:"550px", height:"450px", onClosed:function(){ 
			var lins = $("#linkListaONG").get();
			changeToSection('lista_ongs.php?ajax=true',lins); 
		}});
	});
	
	function confirmarBorrado(id){
		if(confirm("¿Está seguro de querer borrar el registro?")){
			
			var lins = $("#linkListaONG").get();
			
			changeToSection('eliminarONG.php?ajax=true&id='+id,lins);
		}
	}
	
	
	
</script>