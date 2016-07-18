<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>
							
				
<div class="col_full">
	<div class="title-block">
		<h2>Período 01/08/2016 - 30/08/2016</h2>
	</div>
</div>				
				
				
<div class="col_full">
	<div class="fancy-title title-center">
		<h2>Tráfico de Bajada</h2>
	</div>
</div>

<!-- Graficos de Bajada
============================================= -->
<div class="col_half" id="divGraficoTotalBajada" style="opacity: 0;">
	<h3 class="center">Total</h3>
	<canvas id="graficoTotalBajada" width="547" height="300"></canvas>
</div>

<div class="col_half col_last" id="divGraficoClasificadoBajada" style="opacity: 0;">
	<h3 class="center">Clasificado</h3>
	<canvas id="graficoClasificadoBajada" width="547" height="300"></canvas>
</div>
<!-- #Fin Graficos de Bajada -->

<div class="divider"><i class="icon-circle"></i></div>


<div class="col_full">
	<div class="fancy-title title-center">
		<h2>Tráfico de Subida</h2>
	</div>
</div>

<!-- Graficos de Subida
============================================= -->
<div class="col_half" id="divGraficoTotalSubida" style="opacity: 0;">
	<h3 class="center">Total</h3>
	<canvas id="graficoTotalSubida" width="547" height="300"></canvas>
</div>

<div class="col_half col_last" id="divGraficoClasificadoSubida" style="opacity: 0;">
	<h3 class="center">Clasificado</h3>
	<canvas id="graficoClasificadoSubida" width="547" height="300"></canvas>
</div>
<!-- #Fin Graficos de Subida -->


<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo Histórico');
	});
</script>
	
<?php include('estructura/footer.php'); ?>