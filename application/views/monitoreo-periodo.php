<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div id="div-busqueda">
	<div class="col_full">
		<div class="fancy-title title-block">
			<h3>Seleccione el período de búsqueda</h3>
		</div>		
	</div>	

	<div class="clear"></div>

	<form id="form" action="<?=site_url('monitoreo/obtenerConsumoPorPeriodo/')?>" method="POST">
		<div class="col_one_third">
			<label>Fecha y hora - desde</label>
			<input id="fechaDesdeInput" name="fechaDesde" type="text" class="sm-form-control daterange2" placeholder="DD/MM/YYYY 00:00 AM/PM"/>
		</div>
		<div class="col_one_third">
			<label>Fecha y hora - hasta</label>
			<input id="fechaHastaInput" name="fechaHasta" type="text" class="sm-form-control daterange2" placeholder="DD/MM/YYYY 00:00 AM/PM"/>
		</div>

		<div class="col_one_third col_last" style="padding-top:25px">
			<button type="submit" class="button button-rounded">BUSCAR</button>
		</div>	 
	</form>
</div>	
				
<div id="div-graficos" class="hidden">
	<div class="col_four_fifth">
		<div class="fancy-title title-block">
			<h2 id="titulo-periodo"/>
		</div>	
	</div>	

	<div class="col_one_fifth col_last">
		<button id="btnNuevaBusqueda" class="button button-rounded">NUEVA BÚSQUEDA</button>		
	</div>

	<?php include('graficos.php'); ?>

</div>


<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/fechas.js')?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/netcop/graficos.js')?>"></script>

<script type="text/javascript">	

	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo por Período');

		siteurl = '<?=site_url()?>';

		maxPuntos = 1000;

		var fechaMinima = <?php echo json_encode($fechaMinima); ?>;
		fechaMinima = moment(fechaMinima['hora_captura'], formatoFechaBD).toDate();
		
		inicializarDateRangePicker();


		$('#form').submit(function (event){
			event.preventDefault();
			if ($('#form').valid()) {

				var fechaDesdeString = fechaDesdeMoment.format(formatoFechaBD);
				var fechaHastaString = fechaHastaMoment.format(formatoFechaBD);

				$('#titulo-periodo').text( "Período: " + $("#fechaDesdeInput").val() + " - " + $("#fechaHastaInput").val());
			    $('#div-graficos').removeClass('hidden');
			    $('#div-busqueda').addClass('hidden');

				obtenerConsumoPorPeriodo(fechaDesdeString, fechaHastaString);
	        } 

	    });


		$("#btnNuevaBusqueda").click(function() {

		    $('#fechaDesdeInput').daterangepicker('destroy');
		    $('#fechaHastaInput').daterangepicker('destroy');
		    inicializarDateRangePicker();

		    $('#titulo-periodo').text('');
		    $('#div-graficos').addClass('hidden');
		    $('#div-busqueda').removeClass('hidden');

		    borrarGraficos();
		    resetearDatosGraficoTotal();
		});


		//Inicializacion de DatePickers
		function inicializarDateRangePicker(){
			var fechaActual = new Date();
			var fechaInicio = new Date().setHours(0,0,0,0);

			$("#fechaDesdeInput").daterangepicker({
		    	startDate: fechaInicio,
		    	minDate: fechaMinima,
		    	maxDate: fechaActual, 
		    	"opens": "center",
				singleDatePicker: true,
				autoUpdateInput: true,
				timePicker: true,
				timePicker24Hour: true,
				locale: {
					format: formatoFechaPicker
				}
		    });


		    $("#fechaHastaInput").daterangepicker({
		    	startDate: fechaActual,
		    	minDate: fechaMinima,
		    	maxDate: fechaActual,
		    	"opens": "center",
				singleDatePicker: true,
				autoUpdateInput: true,
				timePicker: true,
				timePicker24Hour: true,
				locale: {
					format: formatoFechaPicker
				}
		    });
		}
	    
	    //Fin Inicializacion de DatePickers

	    //Validaciones de Fechas
	    $('#form').validate({
			onfocusout: false,
   			onkeyup: false,
   			onblur: false,
   			onclick: false,
	    	errorElement: 'span',
	        rules: {fechaDesde: "validarFecha",}
	    });

		var fechaDesdeMoment;
		var fechaHastaMoment;
		
	    $.validator.addMethod('validarFecha', function(value) {
			fechaDesdeMoment = moment($("#fechaDesdeInput").val(), formatoFechaPicker);
			fechaHastaMoment = moment($("#fechaHastaInput").val(), formatoFechaPicker);
			return fechaDesdeMoment < fechaHastaMoment;
     	});
	    //Fin Validaciones de Fechas



	});
</script>

<?php include('estructura/footer.php'); ?>
	
