<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Tráfico de Bajada</h3>
	</div>
</div>

<div id="chartContainer" style="height: 300px; width:50%;">
</div>

<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/graficos.js')?>"></script>

<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo en Tiempo Real');

		var siteurl = '<?=site_url()?>';

		var puntos = []; 
		var chart = new CanvasJS.Chart("chartContainer",{	
			title:{
			  text:"Consumo Total",
			  margin: 20,
			},
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
		});


		var updateInterval = 1000; //intervalo de actualizacion = 1 segundo
		var dataLength = 50; //numero de puntos visibles al mismo tiempo
		var bajada = 0;
		var subida = 1;

		inicializarGraficos();
		setInterval(function(){obtenerConsumoTotal(bajada)}, updateInterval); 


		function inicializarGraficos() {

			var totalesPorSegundo = <?php echo json_encode($totalesPorSegundoBajada); ?>;

			for (i = 0; i < totalesPorSegundo.length; i++) { 

				var fecha = Date.parse(totalesPorSegundo[i]['hora']);
			    puntos.push({
					x: fecha, 
					y: Number(totalesPorSegundo[i]['bytes']),
					label: fecha.toString("HH:mm:ss"),
				});

				if (puntos.length > dataLength){
					puntos.shift();				
				}
			}
			chart.render();	
		}


		function obtenerConsumoTotal(tipo) {

			$.ajax({
		        url : siteurl+'/monitoreo/obtenerConsumoTotal',
		        data: { tipo: tipo },
		        type: "POST",
		        success: actualizarGrafico,
	    	})
		};


		function actualizarGrafico(data) {
			debugger;
			var totalPorSegundo = JSON.parse(data);
			var fecha = Date.parse(totalPorSegundo['hora']);

			puntos.push({
				x: fecha, 
				y: Number(totalPorSegundo['bytes']),
				label: fecha.toString("HH:mm:ss"),
			});	
			
			if (puntos.length > dataLength){
				puntos.shift();				
			}
			chart.render();	
		}


	});
</script>
	
<?php include('estructura/footer.php'); ?>