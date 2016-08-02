<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	
<form id="formNuevo" action="<?=site_url('clasetrafico/guardar')?>" mothod="post">
	<input type="hidden" name="idClase" value="32">
	<div class="col_one_third">
		<label>Nombre</label>
		<input name="nombreClase" type="text" class="sm-form-control">
	</div>

	<div class="col_two_third col_last">
		<label>Descripción</label>
		<input name="descripcionClase" type="text" class="sm-form-control"/>
	</div>

	<div class="col_one_third">
		<label>Objetivo</label>
		<input name="objetivoClase" type="text" class="sm-form-control" placeholder="XXX.XXX.XXX.XXX"/>
	</div>

	<div class="col_full" style="text-align:center;">
		<button type="submit" class="button button-rounded">GUARDAR</button>
		<button type="button" id="btnCancelar" class="button button-rounded button-red">CANCELAR</button>	
	</div>	
</form>	

<!-- JavaScripts
============================================= -->
<script type="text/javascript">	

	$(document).ready(function() {

		$('#tituloPantalla').text('Nueva Clase de Tráfico');
		var siteurl = '<?=site_url()?>';

		$('#btnCancelar').click(function(){
			window.location.href = "<?php echo site_url('clasetrafico/consulta');?>";
		});

	});
</script>

<?php include('estructura/footer.php'); ?>
	
