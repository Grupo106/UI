<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

<div class="col_one_third">
	<label>IP de Administración</label>
	<input id="inpIP" class="sm-form-control">
</div>

<div class="col_one_third">
	<label>Máscara de subred</label>
	<input id="inpMasc" class="sm-form-control">
</div>

<div class="col_one_third col_last">
	<label>Puerta de enlace</label>
	<input id="inpPuerto" class="sm-form-control">
</div>

<div class="col_half">
	<label>Ancho de banda de Bajada</label>
	<input id="inpBajada" class="sm-form-control" >
</div>

<div class="col_half col_last">
	<label>Ancho de banda de Subida</label>
	<input id="inpSubida" class="sm-form-control" >
</div>	

<div class="col_full" style="text-align:center;">
	<button class="button button-rounded">GUARDAR</button>
	<button class="button button-rounded button-red">CANCELAR</button>	
</div>	


<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Modificar Configuración del Sistema');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
