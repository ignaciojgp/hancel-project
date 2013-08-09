<div class="values">
	<div class="fullBlock">
		
		<div class="block">
			<div class="claves">
							<h4>Claves</h4>
							<span class="track_posicion">Registro de ubicación</span>
							<span class="track_alerta">Alerta de panico</span>
							<span class="track_panico">Alerta confirmada</span>
						</div>
			<h3><?php print(getLocaleString("Rastreo del: "));
				print($fecha);
			 ?></h3>

			<form  id="dateform" class="searchForm">
				
				<label class="date"><input type="fecha" name="date" id="date" /></label>
				<input  type="button" id="sendbtn" value="<?php print(getLocaleString("buscar")); ?>" />
			</form>

			<ul class="trackingList">
				<?php
								$last = null;
								$i = 0;
								$sum = 0;
								
								
								
								while($traking = each($listaTracking)){
									
									$class="";
								
									if($traking['value']['panic'] == 1){
										$class="warning";
									}else if($traking['value']['panic'] == 2){
										$class="panic";
									}
									
									
									$distance=0;
									if($last){
										$distance = $dp->distance($last['value']['latitude'], $last['value']['longitude'], $traking['value']['latitude'], $traking['value']['longitude'], false);
										$sum += $distance;
										
										
										
									}
								
								?>
									<li class="<?php print_r($class); ?>">
										<h4>
											<span><?php print_r($traking['value']['fecha']); ?></span>
											<?php 	 print_r($traking['value']['hora']); ?>
										</h4>
										
										<div style="text-align:left; padding-left:200px;">
											
											<?php print(getLocaleString("Latitud")); ?>: <strong><?php print_r($traking['value']['latitude']); ?></strong>
											
											<?php print(getLocaleString("Longitud")); ?>: <strong><?php print_r($traking['value']['longitude']); ?></strong>

											<?php print(getLocaleString("Distancia")); ?>: <strong><?php print_r( round($distance, 3)); ?>km</strong>

										</div>
										
										<div class="bateria"><?php print(getLocaleString("Bateria")); ?>: <strong>%<?php print_r($traking['value']['bateria']); ?></strong></div>
									</li>
								<?php
									$i++;
									
									$last = $traking;
									
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
			
			changeToSection("por_fecha.php?fecha="+fecha+"&ajax=true",null);
			
			 
		});
		 	
	});
	
	function setpointers(){
		<?php
		reset($listaTracking);
		
		while($traking = each($listaTracking)){
		?>
			setPoint(<?php print_r($traking['value']['latitude']); ?>, <?php print_r($traking['value']['longitude']); ?>);
		<?php
		}
		?>
	}

</script>
