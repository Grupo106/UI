var $ = jQuery.noConflict();

function buscarDatosPeriodo() {
	var fechaDesde = $('#fecha-hora-desde').val();
	var fechaHasta = $('#fecha-hora-hasta').val();
    
    $('#titulo-periodo').text( "Período: " + fechaDesde + " - " + fechaHasta);
    $('#div-graficos').removeClass('hidden');
    $('#div-busqueda').addClass('hidden');
}

function nuevaBusqueda() {
    $('#titulo-periodo').text('');
    $('#div-graficos').addClass('hidden');
    $('#div-busqueda').removeClass('hidden');
}	