<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>
							
				
<div class="col_full">
	<div class="fancy-title title-block">
		<h2 id="titulo-periodo"></h2>
	</div>	
</div>			
				
				
<?php include('graficos.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/graficos.js')?>"></script>

<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo Histórico');

		siteurl = '<?=site_url()?>';

		maxPuntos = 1000;

		var fechaMinima = <?php echo json_encode($fechaMinima); ?>;
		fechaMinima = moment(fechaMinima['hora_captura'], formatoFechaBD);
		var fechaActual = moment();

		$('#titulo-periodo').text( "Período:  " + fechaMinima.format("DD/MM/YYYY") + "  -  " + fechaActual.format("DD/MM/YYYY"));

		var fechaDesdeString = fechaMinima.format(formatoFechaBD);
		var fechaHastaString = fechaActual.format(formatoFechaBD);

		obtenerConsumoPorPeriodo(fechaDesdeString, fechaHastaString);
	});
</script>
	
<?php include('estructura/footer.php'); ?>