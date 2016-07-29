<?php include('estructura/header.php'); ?>
<?php //include('estructura/menu.php'); ?>

<div>
	<div class="clear"></div>
	<div class="col_full" style="margin-bottom:15px">
	<div class="fancy-title title-block">
			<h3>Modificar configuración</h3>
	</div>
		<div class="col_one_third">
			<label>IP de Administración: </label>
			<input id="inpIP" class="sm-form-control">
		</div>

		<div class="col_one_third">
			<label>Máscara de subred: </label>
			<input id="inpMasc" class="sm-form-control">
		</div>

		<div class="col_one_third col_last">
			<label>Puerta de enlace: </label>
			<input id="inpPuerto" class="sm-form-control">
		</div>

		<div class="col_half">
			<label>Ancho de banda de Bajada:</label>
			<input id="inpBajada" class="sm-form-control" >
		</div>
		
		<div class="col_half col_last">
			<label>Ancho de banda de Subida:</label>
			<input id="inpSubida" class="sm-form-control" >
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
		$('#tituloPantalla').text('Configuracion del sistema');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
