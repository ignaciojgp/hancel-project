<div class="values">
	<div class="fullBlock">
		
		<div class="block">
			<h3><?php print(getLocaleString("Geolocalización de twitts con el tema: "));
				print($tag);
			 ?></h3>

			<form  id="dateform" class="searchForm">
				
				<label class="date"><input type="fecha" name="tag" id="tag" /></label>
				<input  type="button" id="sendbtn" value="<?php print(getLocaleString("buscar")); ?>" />
			</form>

			<ul class="trackingList">
				
				<?php
				
					$i = 0;
					while($traking = each($listaTracking)){
					
					?>
						<li class="">
							<h4><?php print_r($traking['value']->hora); ?></h4>
							
							<div>
								
								<?php print(getLocaleString("Latitud")); ?>: <strong><?php print_r($traking['value']->latitude); ?></strong>
								
								<?php print(getLocaleString("Longitud")); ?>: <strong><?php print_r($traking['value']->longitude); ?></strong>
	
								<?php print(getLocaleString("Distancia")); ?>: <strong>1.00km</strong>
	
							</div>
							
							<div class="bateria"><?php print(getLocaleString("Bateria")); ?>: <strong>%<?php print_r($traking['value']->bateria); ?></strong></div>
						</li>
					<?php
						$i++;
					}
				?>
	
				
	
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
	//generar los puntos en el mapa
	
	$(document).ready(function(){
		$( "#date" ).datepicker();
		 
		$("#sendbtn").click(function(){
			var fecha = $("#date").val();
			
			changeToSection("herramientas.php?tag="+fecha+"&ajax=true",null);
			
			 
		});
		 	
	});
	
	function setpointers(){
		<?php
		reset($listaTracking);
		
		while($traking = each($listaTracking)){
		?>
			setPoint(<?php print_r($traking['value']->latitude); ?>, <?php print_r($traking['value']->longitude); ?>);
		<?php
		}
		?>
	}

</script>
