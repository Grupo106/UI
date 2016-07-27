<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div>
	<div class="clear"></div>
	<div class="col_full" style="margin-bottom:15px">		
			<h3 class="title">Ancho de banda </h3>			
	</div>	
	<div class="col_full">
		<div class="col_half">
			<h3 class="marginSystem">Subida:</h3>
			<input id="inpSubida" class="sm-form-control" style="width:40%;">
		</div>
		<div class="col_half col_last">
			<h3 class="marginSystem">Bajada:</h3>
			<input id="inpBajada" class="sm-form-control" style="width:40%;">
		</div>
	</div>
	<div class="col_full">
		<div class="col_half">
			<h3 class="marginSystem">IP de Administración: </h3>
			<input id="inpIP" class="sm-form-control" style="width:40%;">
		</div>
		<div class="col_half col_last">
			<h3 class="marginSystem">Máscara de subred: </h3>
			<input id="inpTempCPU" class="sm-form-control" style="width:40%;">
		</div>
	</div>
	<div class="col_full">
		<div class="col_half">
			<h3 class="marginSystem">Puerto: </h3>
			<input id="inpPuerto" class="sm-form-control" style="width:40%;">
		</div>
	</div>	
	<div class="col_full" style="text-align:center;">
		<button class="button button-rounded">GUARDAR</button>
		<button class="button button-rounded" style="background-color:#F44336;">CANCELAR</button>	
	</div>	
</div>



<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Modificar configuracion del sistema');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
