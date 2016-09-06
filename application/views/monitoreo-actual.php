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
				//intervalType: "second",
				//valueFormatString: "hh:mm:ss",
				interval: 50,
				gridColor: "#F2F2F2",
				lineColor: "#D8D8D8",
				labelAutoFit: false,
				labelAngle: -45,
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
		var primeraConsulta = true;

		function obtenerConsumoTotal(tipo) {

			$.ajax({
		        url : siteurl+'/monitoreo/obtenerConsumoTotal',
		        data: { tipo: tipo },
		        type: "POST",
		        success: actualizarGrafico,
	    	})
		};

		var count = 100;

		function actualizarGrafico(data) {

			count = count + 10;

			puntos.push({
				x: count, //new Date(), //new Date().toString("hh:mm:ss"),
				y: Number(data),
			});	
			
			if (puntos.length > dataLength){
				puntos.shift();				
			}
			chart.render();	
		}

		function inicializarGraficos() {

			var totalPorSegundo = <?php echo json_encode($totalesPorSegundo); ?>;
			console.log(totalPorSegundo);

			for (i = 0; i < totalPorSegundo.length; i++) { 
			    puntos.push({
					x: i, //new Date(totalPorSegundo[i]['hora']), //.slice(11, 19),
					y: Number(totalPorSegundo[i]['bytes']),
				});

				if (puntos.length > dataLength){
					puntos.shift();				
				}
			}
			chart.render();	
		}

		inicializarGraficos();
		setInterval(function(){obtenerConsumoTotal('bajada')}, updateInterval); 


	});
</script>
	
<?php include('estructura/footer.php'); ?>