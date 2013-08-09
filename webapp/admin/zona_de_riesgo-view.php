<div class="values">
	<div class="fullBlock">
		<div class="block">
			<div class="claves">
							<h4>Claves</h4>
							<span class="track_posicion">Registro de ubicación</span>
							<span class="track_alerta">Alerta de panico</span>
							<span class="track_panico">Alerta confirmada</span>
						</div>
		
			<h3><?php print(getLocaleString("Rastreo todos los usuarios")); ?></h3>
			<ul class="trackingList">
				
				
							<?php
								$last = null;
								$i = 0;
								$sum = 0;
								
								while($traking = each($listaTracking)){
									
									$distance=0;
									$class="";
	
	
									if($traking['value']['panic'] == 1){
										$class="warning";
									}else if($traking['value']['panic'] == 2){
										$class="panic";
									}
									
									if($last){
										$distance = $dp->distance($last['value']['latitude'], $last['value']['longitude'], $traking['value']['latitude'], $traking['value']['longitude'], false);
										$sum += $distance;
										
										
									
										
										
									}
								
								?>
									<li class="<?php print_r($class); ?>">
										<h4>
										
										<span><?php
											 print_r($traking['value']['fecha']); ?></span>
										<?php
											 print_r($traking['value']['hora']); 
										?></h4>
										
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
