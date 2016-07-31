<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div> 
	<div class="clear"></div>
	<div class="col_full">
		<div class="col_half">
			<h3 class="marginSystem">Uso de CPU: </h3>
			<input id="inpUsoCPU" class="sm-form-control" style="width:40%;" disabled>
		</div>
		<div class="col_half col_last">
			<h3 class="marginSystem">Temperatura de CPU: </h3>
			<input id="inpTempCPU" class="sm-form-control" style="width:40%;" disabled>
		</div>
	</div>
	<div class="col_full">
		<div class="col_half">
			<h3 class="marginSystem">Memoria RAM: </h3>
			<input id="inpRam"  class="sm-form-control" style="width:40%;" disabled>
		</div>
		<div class="col_half col_last">
			<h3 class="marginSystem">Disco Rígido: </h3>
			<input id="inpDiscRig" class="sm-form-control" style="width:40%;" disabled>
		</div>
	</div>
	
	<div class="col_half">
		<h3 class="marginSystem">Uso de interfaz de red principal: </h3>
		<input id="inpIntRed" class="sm-form-control" style="margin-top:5%; width:40%;" disabled>
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
	
