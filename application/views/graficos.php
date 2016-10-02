<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Tráfico de Bajada  <i class="fa fa-cloud-download"></i></h3>
	</div>
</div>

<!-- Graficos de Bajada
============================================= -->
<div class="col_half center">
	<h3>Consumo Total</h3>
	
	<div class="loading" style="display:none">
		<img src="<?=base_url('public/images/loading.gif')?>"/>
	</div>
	<div id="grafTotalBajada" class="graficoLinea"></div>
</div>

<div class="col_half col_last center">
	<h3 id="titleClasificadoBajada" class="titleSinMargen">Consumo Clasificado</h3>
	<a id="btnDetalleBajada" class="hidden detallePopover" href="#">Ver Detalle</a>
	<div id="msjSinDatosBajada" class="hidden msjSinDatos" style="margin-top:30px">No se encontraron datos de consumo</div>
	
	<div class="loading" style="display:none; margin-top:30px">
		<img src="<?=base_url('public/images/loading.gif')?>"/>
	</div>
	<div id="grafClasificadoBajada" class="graficoTorta"></div>
</div>
<!-- #Fin Graficos de Bajada -->

<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Tráfico de Subida  <i class="fa fa-cloud-upload"></i></h3>
	</div>
</div>

<!-- Graficos de Subida
============================================= -->
<div class="col_half center">
	<h3>Consumo Total</h3>

	<div class="loading" style="display:none">
		<img src="<?=base_url('public/images/loading.gif')?>"/>
	</div>
	<div id="grafTotalSubida" class="graficoLinea"></div>
</div>

<div class="col_half col_last center">
	<h3 id="titleClasificadoSubida" class="titleSinMargen">Consumo Clasificado</h3>
	<a id="btnDetalleSubida" class="hidden detallePopover" href="#">Ver Detalle</a>
	<div id="msjSinDatosSubida" class="hidden msjSinDatos" style="margin-top:30px">No se encontraron datos de consumo</div>

	<div class="loading" style="display:none; margin-top:30px">
		<img src="<?=base_url('public/images/loading.gif')?>"/>
	</div>
	<div id="grafClasificadoSubida" class="graficoTorta"></div>
</div>
<!-- #Fin Graficos de Subida -->


<!-- Pop up de Detalle Porcentajes
============================================= -->
<div id="popoverContenido">
  	<table id="tablaDetalle" class="tablaDetalle table table-bordered table-striped">
  		<thead><tr>
			<th width="90%">Clase de tráfico</th>
			<th width="10%">Consumo</th>
		</tr></thead>
  		<tbody></tbody>
  	</table>
</div>
