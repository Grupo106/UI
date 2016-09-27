<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<?php include('graficos.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/graficos.js')?>"></script>

<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo en Tiempo Real');

		var siteurl = '<?=site_url()?>';

		var formatoFechaLabelX = "HH:mm:ss";
		
		//Variable definida en graficos.js
		//Representa el numero de puntos visibles al mismo tiempo para los graficos de linea
		maxPuntos = 50;

		inicializarGraficos();
		setInterval(function(){obtenerConsumoTotal()}, 1000); //intervalo de actualizacion = 1 segundo
		setInterval(function(){obtenerConsumoClasificado()}, 3000); 

		
		function inicializarGraficos() {

			//Dibuja los datos de los ultimos 50 segundos, en el grafico total de bajada y subida
			var consumoTotal = <?php echo json_encode($consumoTotal); ?>;
			var maximoBajada = <?php echo json_encode($maximoBajada); ?>;
			var maximoSubida = <?php echo json_encode($maximoSubida); ?>;
			inicializarPropiedadesGraficos(maximoBajada, maximoSubida);
			actualizarGraficoTotal(consumoTotal, formatoFechaLabelX);

			//Dibuja el grafico clasificado de bajada y subida
			var consumoClasificado = <?php echo json_encode($consumoClasificado); ?>;
			actualizarGraficoClasificado(consumoClasificado);	
		}


		function obtenerConsumoTotal() {
			$.ajax({
		        url : siteurl+'/monitoreo/obtenerConsumoTotalActual',
		        success: function(data){
	            	var consumoTotal = [];
	            	consumoTotal.push( data );
	            	actualizarGraficoTotal(consumoTotal, formatoFechaLabelX);
	            }
	    	})
		};


		function obtenerConsumoClasificado() {
			$.ajax({
		        url : siteurl+'/monitoreo/obtenerConsumoClasificadoActual',
		        success: function(data){
		        	var consumoClasificado = data;
	            	actualizarGraficoClasificado(consumoClasificado);
	            }
	    	})
		};

	});		

</script>
	
<?php include('estructura/footer.php'); ?>