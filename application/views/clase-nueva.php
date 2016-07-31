<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div id="div-busqueda">
	<div class="col_full">
		<div class="fancy-title title-block">
			<h3>Nueva Clase de Tráfico</h3>
		</div>		
	</div>	

	<div class="clear"></div>

	<div class="col_one_third">
		<label>Nombre:</label>
		<input id="nombre-clase" type="text" class="sm-form-control">
	</div>

	<div class="col_two_third col_last">
		<label>Descripción:</label>
		<input id="descripcion-clase" type="text" class="sm-form-control"/>
	</div>

	<div class="clear"></div>
	
	<div class="col_one_third">
		<label>Objetivo:</label>
		<input id="objetivo-clase" type="text" class="sm-form-control" placeholder="XXX.XXX.XXX.XXX"/>
	</div>
	

	<div class="col_full" style="text-align:center;">
		<button class="button button-rounded">GUARDAR</button>
		<button class="button button-rounded button-red">CANCELAR</button>	
	</div>	
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
	
