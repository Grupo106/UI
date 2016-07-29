<?php include('estructura/header.php'); ?>
<?php //include('estructura/menu.php'); ?>

<div> 
	<div class="clear"></div>
		<div class="col_one_third">
			<label>Uso de CPU: </label>
			<input id="inpUsoCPU" class="sm-form-control" disabled>
		</div>

		<div class="col_one_third">
			<label>Temperatura de CPU: </label>
			<input id="inpTempCPU" class="sm-form-control" disabled>
		</div>

		<div class="col_one_third col_last">
			<label>Memoria RAM: </label>
			<input id="inpRam" class="sm-form-control" disabled>
		</div>

		<div class="col_half">
			<label>Disco Rígido:</label>
			<input id="inpDiscRig" class="sm-form-control" disabled >
		</div>
		
		<div class="col_half col_last">
			<label>Uso de interfaz de red principal:</label>
			<input id="inpIntRed" class="sm-form-control" disabled >
		</div>	
</div>



<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Información del sistema');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
