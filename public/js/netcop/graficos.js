var $ = jQuery.noConflict();

var formatoFechaBD = "YYYY-MM-DD HH:mm:ss";
var formatoFechaPicker = "DD/MM/YYYY HH:mm";
			
var colores = [ "#51B1FF","#A9F5A9","#FACC2E","#58FA82","#819FF7","#D0FA58","#AC58FA","#BCA9F5","#2E64FE",
"#A9E2F3","#D358F7","#00FFFF","#BCF5A9","#F4FA58","#FAAC58","#A4A4A4","#FA5858","#A4A4A4","#FE9A2E","#F781F3"];

var puntosTotalBajada = []; 
var grafTotalBajada;

var puntosTotalSubida = []; 
var grafTotalSubida;

var totalBajada = 0;
var datosClasificadoBajada = []; 
var grafClasificadoBajada;

var totalSubida = 0;
var datosClasificadoSubida = []; 
var grafClasificadoSubida;

var maxPuntos = 0;

var intervaloYSubida;
var maximoYSubida;
var intervaloYBajada;
var maximoYBajada;
var formatoLabelX;

function inicializarPropiedadesGraficos(valorMaximoYBajada, valorMaximoYSubida, intervaloTiempo){
	calcularPropiedadesEjeY(valorMaximoYBajada, valorMaximoYSubida);
	obtenerFormatoFecha(intervaloTiempo);
	grafTotalBajada = new CanvasJS.Chart("grafTotalBajada", propiedadesGrafLinea(puntosTotalBajada, intervaloYBajada, maximoYBajada));
	grafTotalSubida = new CanvasJS.Chart("grafTotalSubida", propiedadesGrafLinea(puntosTotalSubida, intervaloYSubida, maximoYSubida));
	grafClasificadoBajada = new CanvasJS.Chart("grafClasificadoBajada", propiedadesGrafTorta(datosClasificadoBajada));
	grafClasificadoSubida = new CanvasJS.Chart("grafClasificadoSubida", propiedadesGrafTorta(datosClasificadoSubida));
}


function propiedadesGrafLinea(puntos, intervaloY, maximoY){
	var options = {	
		animationEnabled: true,
		axisX: {						
			gridColor: "#F2F2F2",
			lineColor: "#D8D8D8",
			labelAutoFit: false,
			labelFontSize: 12,
			valueFormatString: formatoLabelX, 
		},
		axisY: {						
			title: "bytes",
			interval: intervaloY,
			maximum: maximoY,
			gridColor: "#F2F2F2",
			lineColor: "#D8D8D8",
			labelFontSize: 12,
			intervalType: "number",
			//valueFormatString:  "#.###"
		},	
		data: [{
			type: "splineArea",
			dataPoints: puntos 
		}],
	};
	return options;
}


function propiedadesGrafTorta(puntos){
	var options = {
        animationEnabled: true,
        explodeOnClick: true,
		data: [{       
			indexLabelFontStyle: "bold",
			type: "pie",
			startAngle: 1,
			percentFormatString: "#0",
			toolTipContent: "<strong>{text}</strong>",
			indexLabel: "{name}: #percent%",
			//percentFormatString: "#0.##",
			dataPoints: puntos 
		}],
	};
	return options;
}


function actualizarGraficoTotal(consumoTotal) {
	for (i = 0; i < consumoTotal.length; i++) { 
		agregarDatoGraficoTotal('bajada', puntosTotalBajada, consumoTotal[i]);
		agregarDatoGraficoTotal('subida', puntosTotalSubida, consumoTotal[i]);
	}
	grafTotalBajada.render();	
	grafTotalSubida.render();	
}


function agregarDatoGraficoTotal(tipo, datosGrafico, consumoItem){
	var bytes = Number(consumoItem[tipo]);
	var fecha = moment(consumoItem['hora'], formatoFechaBD);
	datosGrafico.push({
		x: fecha.toDate(), 
		y: bytes,
		label: fecha.format(formatoLabelX),
	});
	if (datosGrafico.length > maxPuntos){
		datosGrafico.shift();				
	}
}


var colorIndex = 0;
function actualizarGraficoClasificado(consumoClasificado) {
	resetearDatos();

	//** borrar
	//agregarDatoClasificadoPrueba(datosClasificadoBajada);
	//agregarDatoClasificadoPrueba(datosClasificadoSubida);
	//********
	if(consumoClasificado!=null && consumoClasificado!=""){
		for (i = 0; i < consumoClasificado.length; i++) { 
			agregarDatoClasificado('bajada', datosClasificadoBajada, consumoClasificado[i]);
			agregarDatoClasificado('subida', datosClasificadoSubida, consumoClasificado[i]);
			colorIndex++;
			if(colorIndex >= colores.length){ colorIndex = 0;}
		}
	}
	mostrarMensaje();
	grafClasificadoBajada.render();
	grafClasificadoSubida.render();
}


function agregarDatoClasificado(tipo, datosGrafico, consumoItem){
	var bytes = Number(consumoItem[tipo]);
	if(bytes>0){
		datosGrafico.push({
			y: bytes,
			name: consumoItem['nombre'],
			text: consumoItem['descripcion'],
			color: colores[colorIndex],
		});
		if(tipo="bajada"){
			totalBajada = totalBajada + bytes;
		} else {
			totalSubida = totalSubida + bytes;
		}
		
	}
}

function resetearDatos(){
	datosClasificadoBajada.length=0;
	datosClasificadoSubida.length=0;
	totalBajada=0;
	totalSubida=0;
	colorIndex = 0;
}

function resetearDatosGraficoTotal(){
	puntosTotalBajada.length=0;
	puntosTotalSubida.length=0;
}


//Mensaje "Sin datos"
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

//Pop up de Detalle de Porcentajes	
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


function obtenerFormatoFecha(intervalo){
	switch (intervalo) {
		case "month":
	        formatoLabelX = "MM/YYYY";
	        break;
	    case "day":
	        formatoLabelX = "DD/MM";
	        break;
	    case "hour":
	        formatoLabelX = "DD/MM HH:00";
	        break;
	    case "minute":
	        formatoLabelX = "DD/MM HH:mm";
	        break;
	    case "second":
	    	formatoLabelX = "HH:mm:ss";
	}
}

function calcularPropiedadesEjeY(valorMaximoYBajada, valorMaximoYSubida){
	maximoYBajada = calcularMaximo(valorMaximoYBajada);
	intervaloYBajada = calcularIntervalo(maximoYBajada);

	maximoYSubida = calcularMaximo(valorMaximoYSubida);
	intervaloYSubida = calcularIntervalo(maximoYSubida);
}

function calcularMaximo(valorMaximo){
	if (Number(valorMaximo)<=20000) return 20000;

	var primerDigito = valorMaximo.substr(0,1);
	var cantDigitos = valorMaximo.length;
	var potencia = Math.pow(10, cantDigitos-1);
	return potencia * (Number(primerDigito)+1);
}

function calcularIntervalo(valorMaximo){
	return valorMaximo / 10;
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
			color: colores[0]
			
		});
	datos.push({
			y: 3455,
			name: "Twitter",
			text: "Red Social",
			color: colores[1]
		});
}