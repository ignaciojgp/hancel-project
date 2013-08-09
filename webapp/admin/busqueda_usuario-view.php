<div class="values">
	<div class="fullBlock">
		
		<div class="block">
		<div class="claves">
							<h4>Claves</h4>
							<span class="track_posicion">Registro de ubicación</span>
							<span class="track_alerta">Alerta de panico</span>
							<span class="track_panico">Alerta confirmada</span>
						</div>
			<h3><?php print(getLocaleString("Buscar "));
			 ?></h3>

			<form action="default.php" id="dateform" class="searchForm">
				
				<label class="date">ID del usuario<input type="text" name="id" id="id" /></label>
				
				<label class="date">Clave de busqueda<input type="text" name="c" id="c" /></label>
				
				<input  type="submit"  value="<?php print(getLocaleString("buscar")); ?>" />
			
			</form>
			<?php
			if(isset($listaTracking)){
			?>
			<ul class="trackingList">
				<?php
								$last = null;
								$i = 0;
								$sum = 0;
								
								while($traking = each($listaTracking)){
									
									$distance=0;
									if($last){
										$distance = $dp->distance($last['value']['latitude'], $last['value']['longitude'], $traking['value']['latitude'], $traking['value']['longitude'], false);
										$sum += $distance;
										
										
										$class="";
										
										if($traking['value']['panic'] == 1){
											$class="warning";
										}else if($traking['value']['panic'] == 2){
											$class="panic";
										}
										
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
			
			<?php
			}else{
			?>
				<div class="ongmensaje">
					No hay resultados de la consulta por favor introduzca el <strong>id de tracking</strong> y la 
					<strong>clave de busqueda</strong> que le fue proporcionado en el correo de alerta para hacer la búsqueda 
				</div>
			
			<?php
			}
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	//generar los puntos en el mapa
	
	
	function setpointers(){
		<?php
		if(isset($listaTracking )){
		reset($listaTracking);
		
			while($traking = each($listaTracking)){
			?>
				setPoint(<?php print_r($traking['value']['latitude']); ?>, <?php print_r($traking['value']['longitude']); ?>);
			<?php
			}
		}
		?>
	}

</script>
