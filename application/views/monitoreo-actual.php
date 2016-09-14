<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Tráfico de Bajada</h3>
	</div>
</div>

<div class="col_half center">
	<h3>Consumo Total</h3>
	<div id="grafTotalBajada" style="height: 300px;"></div>
</div>

<div class="col_half col_last center">
	<h3 id="titleClasificadoBajada">Consumo Clasificado</h3>
	<a id="btnDetalleBajada" class="hidden detallePopover" href="#">Ver Detalle</a>
	<div id="msjSinDatosBajada" class="hidden">No se encontraron datos de consumo en los últimos segundos</div>
	<div id="grafClasificadoBajada" style="height: 300px;"></div>
</div>


<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Tráfico de Subida</h3>
	</div>
</div>

<div class="col_half center">
	<h3>Consumo Total</h3>
	<div id="grafTotalSubida" style="height: 300px;"></div>
</div>

<div class="col_half col_last center">
	<h3 id="titleClasificadoSubida">Consumo Clasificado</h3>
	<a id="btnDetalleSubida" class="hidden detallePopover" href="#">Ver Detalle</a>
	<div id="msjSinDatosSubida" class="hidden">No se encontraron datos de consumo en los últimos segundos</div>
	<div id="grafClasificadoSubida" style="height: 300px;"></div>
</div>


<div id="popoverContenido">
  	<table id="tablaDetalle" class="table table-bordered table-striped">
  		<thead><tr>
			<th width="95%">Nombre</th>
			<th width="5%">Porcentaje</th>
		</tr></thead>
  		<tbody></tbody>
  	</table>
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

		var totalBajada = 0;
		var datosClasificadoBajada = []; 
		var grafClasificadoBajada = new CanvasJS.Chart("grafClasificadoBajada", propiedadesGrafTorta(datosClasificadoBajada));
		
		var totalSubida = 0;
		var datosClasificadoSubida = []; 
		var grafClasificadoSubida = new CanvasJS.Chart("grafClasificadoSubida", propiedadesGrafTorta(datosClasificadoSubida));
		
		var maxPuntos = 50; //numero de puntos visibles al mismo tiempo para los graficos de linea

		inicializarGraficos();
		//setInterval(function(){obtenerConsumoTotal()}, 1000); //intervalo de actualizacion = 1 segundo
		//setInterval(function(){obtenerConsumoClasificado()}, 3000); 


		function propiedadesGrafLinea(puntos){
			var options = {	
				axisX: {						
					gridColor: "#F2F2F2",
					lineColor: "#D8D8D8",
					labelAutoFit: false,
				},
				axisY: {						
					title: "bytes",
					interval: 2000,
					maximum: 20000,
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
					toolTipContent: "<strong>{text}</strong>",
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
				agregarDato('bajada', puntosTotalBajada, consumoTotal[i]);
				agregarDato('subida', puntosTotalSubida, consumoTotal[i]);
			}	
			grafTotalBajada.render();
			grafTotalSubida.render();

			//Dibuja el grafico clasificado de bajada y subida
			var consumoClasificado = <?php echo json_encode($consumoClasificado); ?>;
			actualizarGraficoClasificado(consumoClasificado);	
		}


		function agregarDato(tipo, datosGrafico, consumoItem){

			var bytes = Number(consumoItem[tipo]);
			var fecha = Date.parse(consumoItem['hora']);
			datosGrafico.push({
				x: fecha, 
				y: bytes,
				label: fecha.toString("HH:mm:ss"),
			});
			if (datosGrafico.length > maxPuntos){
				datosGrafico.shift();				
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

			//** borrar
			//agregarDatoClasificadoPrueba(datosClasificadoBajada);
			//agregarDatoClasificadoPrueba(datosClasificadoSubida);
			//********
			if(data!=null && data!=""){
				var consumoClasificado = JSON.parse(data);
				for (i = 0; i < consumoClasificado.length; i++) { 
					agregarDatoClasificado('bajada', datosClasificadoBajada, consumoClasificado[i], totalBajada);
					agregarDatoClasificado('subida', datosClasificadoSubida, consumoClasificado[i], totalSubida);
				}
			}
			mostrarMensaje();
			grafClasificadoBajada.render();
			grafClasificadoSubida.render();
		}

		function agregarDatoClasificado(tipo, datosGrafico, consumoItem, total){
			var bytes = Number(consumoItem[tipo]);
			if(bytes>0){
				datosGrafico.push({
					y: bytes,
					name: consumoItem['nombre'],
					text: consumoItem['descripcion'],
				});
				total = total + bytes;
			}
		}

		

		function mostrarMensaje(){
			quitarPonerMensaje('Bajada', (datosClasificadoBajada.length==0) );
			quitarPonerMensaje('Subida', (datosClasificadoSubida.length==0) );
		}

		function quitarPonerMensaje(tipo, valor){
			if (valor){
				$('#msjSinDatos'+tipo).removeClass('hidden');
				$('#btnDetalle'+tipo).addClass('hidden');
			} else {
				$('#msjSinDatos'+tipo).addClass('hidden');
				$('#btnDetalle'+tipo).removeClass('hidden');
			}
		}

			
		$(".detallePopover").popover({
			content: function() { return $('#popoverContenido').html(); },
			html: true, 
			placement: "bottom",
		});

		$("#btnDetalleBajada").click(function() {
			generarTablaDatos(datosClasificadoBajada, totalBajada);
		    $(this).popover('show');
		});

		$("#btnDetalleSubida").click(function() {
			generarTablaDatos(datosClasificadoSubida, totalSubida);
		    $(this).popover('show');
		});

		//Genera el contenido del popover "Detalle"
		function generarTablaDatos(arrayDatos, totalBytes){
			
			var arrayOrdenado = arrayDatos.slice(0).sort(compararDatos);

			$("#tablaDetalle tbody tr").remove();
			for (i = 0; i < arrayOrdenado.length; i++) { 
				var o = calcularPorcentaje(arrayOrdenado[i], totalBytes );
				$("#tablaDetalle tbody")
				    .append($('<tr>')
				        .append($('<td class="t1">').text( arrayOrdenado[i]['name'] ))
				        .append($('<td class="t2">').text( calcularPorcentaje(arrayOrdenado[i], totalBytes )))
					);
			}
		}


		function compararDatos(a, b){
			return parseInt(b['y']) - parseInt(a['y']);
		}

		function calcularPorcentaje(item, total){
			var value = 100 * item['y'] / total;
			return Math.round(value) + "%";
		}

		//Funcion para salir del popover cuando se hace click fuera del mismo
		$(document).on('click', function (e) {
		    $('[data-original-title]').each(function () {
		        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {                
		            (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  
		        }
		    });
		});


		// BORRAR, DATOS DE PRUEBA
		function agregarDatoClasificadoPrueba(datos){
			datos.push({
					y: 5345,
					name: "Facebook",
					text: "Red Social",
				});
			datos.push({
					y: 3455,
					name: "Twitter",
					text: "Red Social",
				});
			datos.push({
					y: 9000,
					name: "Clarin",
					text: "Red Social",
				});
		}

	});		

</script>
	
<?php include('estructura/footer.php'); ?>