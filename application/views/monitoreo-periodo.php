<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div id="div-busqueda">
	<div class="col_full">
		<div class="fancy-title title-block">
			<h3>Seleccione el período de búsqueda</h3>
		</div>		
	</div>	

	<div class="clear"></div>

	<div class="col_one_third">
		<label>Fecha y hora - desde:</label>
		<input id="fecha-hora-desde" type="text" class="sm-form-control daterange2" placeholder="DD/MM/YYYY 00:00 AM/PM"/>
	</div>
	<div class="col_one_third">
		<label>Fecha y hora - hasta:</label>
		<input id="fecha-hora-hasta" type="text" class="sm-form-control daterange2" placeholder="DD/MM/YYYY 00:00 AM/PM"/>
	</div>

	<div class="col_one_third col_last" style="padding-top:25px">
		<button class="button button-rounded" onclick="buscarDatosPeriodo()">BUSCAR</button>
	</div>	 
</div>	
				
<div id="div-graficos" class="hidden">
	<div class="col_four_fifth">
		<div class="fancy-title title-block">
			<h2 id="titulo-periodo"/>
		</div>	
	</div>	

	<div class="col_one_fifth col_last">
		<button class="button button-rounded" onclick="nuevaBusqueda()">NUEVA BÚSQUEDA</button>		
	</div>

	<?php include('graficos.php'); ?>
</div>


<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/fechas.js')?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/monitoreo.js')?>"></script>

<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo por Período');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
