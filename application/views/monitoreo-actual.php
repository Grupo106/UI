<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Tráfico de Bajada</h3>
	</div>
</div>

<div class="col_half">
	<h3 class="center">Consumo Total</h3>
	<div id="grafTotalBajada" style="height: 300px;"></div>
</div>

<div class="col_half col_last">
	<h3 id="titleClasificadoBajada" class="center">Consumo Clasificado</h3>
	<div id="msjSinDatosBajada" class="center hidden">No se encontraron datos de consumo en los últimos segundos</div>
	<div id="grafClasificadoBajada" style="height: 300px;"></div>
</div>


<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Tráfico de Subida</h3>
	</div>
</div>

<div class="col_half">
	<h3 class="center">Consumo Total</h3>
	<div id="grafTotalSubida" style="height: 300px;"></div>
</div>

<div class="col_half col_last">
	<h3 id="titleClasificadoSubida" class="center">Consumo Clasificado</h3>
	<div id="msjSinDatosSubida" class="center hidden">No se encontraron datos de consumo en los últimos segundos</div>
	<div id="grafClasificadoSubida" style="height: 300px;"></div>
</div>




<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/graficos.js')?>"></script>

<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo en Tiempo Real');

		var siteurl = '<?=site_url()?>';

		
		var puntosTotalBajada = []; 
		var grafTotalBajada = new CanvasJS.Chart("grafTotalBajada", propiedadesGrafLinea(puntosTotalBajada));

		var puntosTotalSubida = []; 
		var grafTotalSubida = new CanvasJS.Chart("grafTotalSubida", propiedadesGrafLinea(puntosTotalSubida));

		var datosClasificadoBajada = []; 
		var grafClasificadoBajada = new CanvasJS.Chart("grafClasificadoBajada", propiedadesGrafTorta(datosClasificadoBajada));
		
		var datosClasificadoSubida = []; 
		var grafClasificadoSubida = new CanvasJS.Chart("grafClasificadoSubida", propiedadesGrafTorta(datosClasificadoSubida));
		
		var maxPuntos = 50; //numero de puntos visibles al mismo tiempo para los graficos de linea

		inicializarGraficos();
		setInterval(function(){obtenerConsumoTotal()}, 1000); //intervalo de actualizacion = 1 segundo
		setInterval(function(){obtenerConsumoClasificado()}, 3000); 


		function propiedadesGrafLinea(puntos){
			var options = {	
				axisX: {						
					gridColor: "#F2F2F2",
					lineColor: "#D8D8D8",
					labelAutoFit: false,
				},
				axisY: {						
					title: "bytes",
					interval: 500,
					maximum: 5000,
					gridColor: "#F2F2F2",
					lineColor: "#D8D8D8"
				},	
				data: [{
					type: "splineArea",
					dataPoints: puntos 
				}]
			};
			return options;
		}

		function propiedadesGrafTorta(puntos){
			var options = {
		        animationEnabled: true,
		        explodeOnClick: true,
				data: [{       
					type: "pie",
					percentFormatString: "#0",
					toolTipContent: "<strong>{name}</strong>",
					indexLabel: "{name}: #percent%",
					dataPoints: puntos 
				}]
			};
			return options;
		}


		function inicializarGraficos() {

			//Dibuja los datos de los ultimos 50 segundos, en el grafico total de bajada y subida
			var consumoTotal = <?php echo json_encode($consumoTotal); ?>;
			for (i = 0; i < consumoTotal.length; i++) { 
				agregarDato(puntosTotalBajada, consumoTotal[i]['bajada'], Date.parse(consumoTotal[i]['hora']));
				agregarDato(puntosTotalSubida, consumoTotal[i]['subida'], Date.parse(consumoTotal[i]['hora']));
			}	
			grafTotalBajada.render();
			grafTotalSubida.render();

			//Dibuja el grafico clasificado de bajada y subida
			var consumoClasificado = <?php echo json_encode($consumoClasificado); ?>;
			actualizarGraficoClasificado(consumoClasificado);	
		}


		function agregarDato(datos, bytes, fecha){
			datos.push({
				x: fecha, 
				y: Number(bytes),
				label: fecha.toString("HH:mm:ss"),
			});
			if (datos.length > maxPuntos){
				datos.shift();				
			}
		}


		function obtenerConsumoTotal() {
			$.ajax({
		        url : siteurl+'/monitoreo/obtenerConsumoTotalActual',
		        type: "POST",
		        success: actualizarGraficoTotal,
	    	})
		};

		function actualizarGraficoTotal(data) {
			var consumoTotal = JSON.parse(data);
			agregarDato(puntosTotalBajada, consumoTotal['bajada'], Date.parse(consumoTotal['hora']))
			agregarDato(puntosTotalSubida, consumoTotal['subida'], Date.parse(consumoTotal['hora']))
			grafTotalBajada.render();	
			grafTotalSubida.render();	
		}

		function obtenerConsumoClasificado() {
			$.ajax({
		        url : siteurl+'/monitoreo/obtenerConsumoClasificadoActual',
		        type: "POST",
		        success: actualizarGraficoClasificado,
	    	})
		};

		function actualizarGraficoClasificado(data) {
			datosClasificadoBajada.length=0;
			datosClasificadoSubida.length=0;

			if(data!=null && data!=""){
				var consumoClasificado = JSON.parse(data);
				for (i = 0; i < consumoClasificado.length; i++) { 
					agregarDatoClasificado(datosClasificadoBajada, consumoClasificado[i]['bajada'], consumoClasificado[i]['nombre']);
					agregarDatoClasificado(datosClasificadoSubida, consumoClasificado[i]['subida'], consumoClasificado[i]['nombre']);
				}
			}
			agregarMensaje();
			grafClasificadoBajada.render();
			grafClasificadoSubida.render();
		}

		function agregarDatoClasificado(datos, bytes, nombre){
			if(bytes>0){
				datos.push({
					y: Number(bytes),
					name: nombre,
				});
			}
		}

		function agregarMensaje(){
			if(datosClasificadoBajada.length==0){
				$('#msjSinDatosBajada').removeClass('hidden');
			} else {
				$('#msjSinDatosBajada').addClass('hidden');
			}
			if(datosClasificadoSubida.length==0){
				$('#msjSinDatosSubida').removeClass('hidden');
			} else {
				$('#msjSinDatosSubida').addClass('hidden');
			}
		}


	});
</script>
	
<?php include('estructura/footer.php'); ?>