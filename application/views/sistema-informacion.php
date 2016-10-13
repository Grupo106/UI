<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>



<div class="col_half">
	<h3 class="center">Uso de CPU</h3>
	<div id="grafUsoCPU" style="height: 300px;"></div>
</div>
<div class="col_half col_last">
	<h3 class="center">Memoria RAM</h3>
	<div id="grafMemRAM" style="height: 300px;"></div>
</div>
<div class="col_full">
	
</div>
<div class="col_half">
	<h3 class="center">Disco Rigido</h3>
	<div id="grafDiscoRig" style="height: 300px;"></div>
</div>

<div id="divTemp" class="col_half col_last">
	<h3  class="center">Temperatura CPU</h3>
	<div id="grafTemp" style="height: 300px;"></div>
</div>
<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/graficos.js')?>"></script>

<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Información del Sistema');

		var siteurl = '<?=site_url()?>';


		
		var puntosCPU = []; 
		var grafUsoCPU = new CanvasJS.Chart("grafUsoCPU", propiedadesGrafLinea(puntosCPU, "#4D90FE"));

		var puntosRAM = []; 
		var grafMemRAM = new CanvasJS.Chart("grafMemRAM", propiedadesGrafLinea(puntosRAM, "#FFA803"));

		var puntosDisc = []; 
		var grafDiscoRig = new CanvasJS.Chart("grafDiscoRig", propiedadesGrafLinea(puntosDisc, "#04806F"));

		var puntosTemp = []; 
		var grafTemp = new CanvasJS.Chart("grafTemp", propiedadesGrafLinea(puntosTemp, "#DD4B39"));
		
		var maxPuntos = 50; //numero de puntos visibles al mismo tiempo para los graficos de linea

		inicializarGraficos();
		setInterval(function(){obtenerConsumos()}, 3000); //intervalo de actualizacion = 1 segundo


		function propiedadesGrafLinea(puntos, grafColor){
			var options = {	
				axisX: {						
					gridColor: "#F2F2F2",
					lineColor: "#D8D8D8",
					labelAutoFit: true,
					valueFormatString: "HH:mm:ss", 
				},
				axisY: {						
					title: "%",
					interval: 10,
					maximum: 100,
					gridColor: "#F2F2F2",
					lineColor: "#D8D8D8"
				},	
				data: [{
					type: "splineArea",
					dataPoints: puntos,
					color: grafColor
				}]
			};
			return options;
		}


		function inicializarGraficos() {

			var consumoTotal = <?php echo json_encode($consumoTotal); ?>;

			if(isNaN(consumoTotal[0]['temp'])){
			  $('#divTemp').hide();
			}

			for (i = 0; i < consumoTotal.length; i++) { 
				var fecha = moment(consumoTotal[i]['hora'], "YYYY-MM-DD HH:mm:ss");
				
				agregarDato(puntosCPU, consumoTotal[i]['cpu'],fecha);			
				agregarDato(puntosRAM, consumoTotal[i]['ram'], fecha);			
				agregarDato(puntosDisc, consumoTotal[i]['disco'], fecha);			
				agregarDato(puntosTemp, consumoTotal[i]['temp'], fecha);			
			}	
			grafUsoCPU.render();
			grafMemRAM.render();
			grafDiscoRig.render();
			grafTemp.render();

		}


		function agregarDato(datos, porcentaje, fecha){
			datos.push({
				x: fecha.toDate(), 
				y: Number(porcentaje),
				label: fecha.format("HH:mm:ss"),
			});
			if (datos.length > maxPuntos){
				datos.shift();				
			}
		}


		function obtenerConsumos() {
			$.ajax({
		        url : siteurl+'/sistema/obtenerConsumos',
		        type: "POST",
		        success: actualizarGrafico,
	    	})
		};

		function actualizarGrafico(data) {
			
			var consumoTotal = JSON.parse(data);
			var fecha = moment(consumoTotal['hora'], "YYYY-MM-DD HH:mm:ss");

			agregarDato(puntosCPU, consumoTotal['cpu'], fecha);			
			agregarDato(puntosRAM, consumoTotal['ram'], fecha);			
			agregarDato(puntosDisc, consumoTotal['disco'], fecha);			
			agregarDato(puntosTemp, consumoTotal['temp'], fecha);			
			grafUsoCPU.render();
			grafMemRAM.render();
			grafDiscoRig.render();
			grafTemp.render();		
		}


	});
</script>
	
<?php include('estructura/footer.php'); ?>