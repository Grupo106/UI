var $ = jQuery.noConflict();

jQuery(window).load( function(){
			
	var graficoTotalBajadaDatos = {
		labels : ["17:00","17:10","17:20","17:30","17:40","17:50","18:00"],
		datasets : [
			{
				fillColor : "rgba(200,147,165,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				data : [50,68,17,57,24,96,100]
			}
		]
	};

	var graficoTotalSubidaDatos = {
		labels : ["17:00","17:10","17:20","17:30","17:40","17:50","18:00"],
		datasets : [
			{
				fillColor : "rgba(200,147,165,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				data : [50,68,17,57,24,96,100]
			}
		]
	};
	
	var graficoClasificadoBajadaDatos = [
		{value: 50,color:"#F38630"},
		{value : 50,color : "#E0E4CC"}
	];

	var graficoClasificadoSubidaDatos = [
		{value: 50,color:"#F38630"},
		{value : 50,color : "#E0E4CC"}
	];

	var globalGraphSettings = {animation : Modernizr.canvas};

	function mostrarGraficoTotalBajada(){
		var ctx = document.getElementById("graficoTotalBajada").getContext("2d");
		new Chart(ctx).Line(graficoTotalBajadaDatos,globalGraphSettings);
	}

	function mostrarGraficoClasificadoBajada(){
		var ctx = document.getElementById("graficoClasificadoBajada").getContext("2d");
		new Chart(ctx).Pie(graficoClasificadoBajadaDatos,globalGraphSettings);
	}

	function mostrarGraficoTotalSubida(){
		var ctx = document.getElementById("graficoTotalSubida").getContext("2d");
		new Chart(ctx).Line(graficoTotalSubidaDatos,globalGraphSettings);
	}

	function mostrarGraficoClasificadoSubida(){
		var ctx = document.getElementById("graficoClasificadoSubida").getContext("2d");
		new Chart(ctx).Pie(graficoClasificadoSubidaDatos,globalGraphSettings);
	}
	
	$('#divGraficoTotalBajada').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(mostrarGraficoTotalBajada,300); },{accX: 0, accY: -155},'easeInCubic');

	$('#divGraficoClasificadoBajada').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(mostrarGraficoClasificadoBajada,300); },{accX: 0, accY: -155},'easeInCubic');
	
	$('#divGraficoTotalSubida').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(mostrarGraficoTotalSubida,300); },{accX: 0, accY: -155},'easeInCubic');

	$('#divGraficoClasificadoSubida').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(mostrarGraficoClasificadoSubida,300); },{accX: 0, accY: -155},'easeInCubic');
});