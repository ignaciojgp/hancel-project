
			
			<div class="values">
			
				<div class="tracking">
					<div class="block">
						<div class="claves">
							<h4>Claves</h4>
							<span class="track_posicion">Registro de ubicación</span>
							<span class="track_alerta">Alerta de panico</span>
							<span class="track_panico">Alerta confirmada</span>
						</div>
						<h3><?php print(getLocaleString("Rastreo")); ?></h3>
						<ul class="trackingList">
							
							<?php
								$last = null;
								$i = 0;
								$sum = 0;
								$class="";
								while($traking = each($listaTracking)){
									
									
									if($traking['value']['panic'] == 1){
										$class="warning";
									}else if($traking['value']['panic'] == 2){
										$class="panic";
									}
									
									$distance=0;
									if($last){
										$distance = $dp->distance($last['value']['latitude'], $last['value']['longitude'], $traking['value']['latitude'], $traking['value']['longitude'], false);
										$sum += $distance;
										
										
										
										
										//$class = $traking['value']['panic'] == 1 ? "panic":"" ;
										
									}
								
								?>
									<li class="<?php print_r($class); ?>">
										<h4>
											<span><?php print_r($traking['value']['fecha']); ?></span>
											<?php 	 print_r($traking['value']['hora']); ?>
										</h4>
										
										<div style="text-align:left; padding-left:150px; padding-right:100px;">
											
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
				
				<div class="Timging">
				
					<div class="block">
						<h3><?php print(getLocaleString("Tiempos")); ?></h3>
						<div class="timingList">
							
							<div class="content">
								<?php
									if(isset($tiempoTracking) && isset($tiempoTranscurrido)){
								
								?>
								<div>
									<?php
									if(isset($tiempoTracking)){
								
									?>
									<h4><?php print(getLocaleString("Tiempo del rastreo")); ?></h4>
									<div >
										<?php print_r($tiempoTracking['horas']); ?> <span><?php print(getLocaleString("horas ")); ?></span>
										<?php print_r($tiempoTracking['minutos']); ?>  <span><?php print(getLocaleString("minutos ")); ?></span>
									</div>
									<?php
									}
									?>
								</div>
							
								<div>
									<?php
									if(isset($tiempoTranscurrido)){
								
									?>
									<h4><?php print(getLocaleString("Tiempo desde el último registro")); ?></h4>
									
									
									<div >
										<?php print_r($tiempoTranscurrido['horas']); ?> <span><?php print(getLocaleString("horas ")); ?></span>
										<?php print_r($tiempoTranscurrido['minutos']); ?>  <span><?php print(getLocaleString("minutos ")); ?></span>
									</div>
									<?php
									}
									?>
								</div>
								<?php
									}else{
								?>
								<div class="message">No hay datos que calcular por el momento</div>
								<?php
									}
								?>
								
							</div>
						</div>
					</div>
				</div>
			
				<div class="Distance">
					<div class="block">
						<h3><?php print(getLocaleString("Distancia")); ?></h3>
						<div class="timingList">
							<div class="content">
								<?php
									if(isset($tiempoTracking) && isset($tiempoTranscurrido)){
								
								?>
								<h4>A-B</h4>
								<div><?php print($sum); ?><small>km</small></div>
								<?php
									}else{
								?>
									<div class="message">No hay datos que calcular por el momento</div>
								<?php
									}
								?>
								
								
							</div>
							
							
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
				
				