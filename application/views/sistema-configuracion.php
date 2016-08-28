<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

<form id="form" action="<?=site_url('sistema/guardar/')?>" method="post">
	<div class="col_one_third">
		<label>IP de Administración</label>
		<input name="ip" class="sm-form-control" value="<?= $ip ?>">
	</div>

	<div class="col_one_third">
		<label>Máscara de subred</label>
		<input name="mascara" class="sm-form-control" value="<?= $mascara ?>">
	</div>

	<div class="col_one_third col_last">
		<label>Puerta de enlace</label>
		<input name="enlace" class="sm-form-control" value="<?= $enlace ?>">
	</div>

	<div class="col_half">
		<label>Ancho de banda de Bajada</label>
		<input name="anchoBajada" class="sm-form-control" value="<?= $anchoBajada ?>">
	</div>

	<div class="col_half col_last">
		<label>Ancho de banda de Subida</label>
		<input name="anchoSubida" class="sm-form-control" value="<?= $anchoSubida ?>">
	</div>	

	<div class="col_full" style="text-align:center;">
		<button type="submit" class="button button-rounded">GUARDAR</button>
		<button type="button" id="btnCancelar" class="button button-rounded button-red">CANCELAR</button>	
	</div>	
</form>

<?php include('estructura/modal-informacion.php'); ?>
<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	$(document).ready(function() {

		$('#tituloPantalla').text('Modificar Configuración del Sistema');
		var siteurl = '<?=site_url()?>';

		$('#btnCancelar').click(function(){
			window.location.href = "<?php echo site_url();?>";
		});

		//GUARDAR
		$('#form').submit(function (event){
			event.preventDefault();
			$.ajax({
	            url : $('#form').attr("action"),
	            type : $('#form').attr("method"),
	            data : $('#form').serialize(),
	            success: function(respuesta){
	            	if(respuesta==1){
			            $('#mensaje').text("La clase fue guardada exitosamente.");
			        } else {
			            $('#mensaje').text("Error al guardar la clase de tráfico.");
			        }
	            	$('#modalInformacion').modal('show');
	            }
	        });
	    });

	    //ACEPTAR
		$('#btnAceptarInformacion').click(function(){
	        window.location.href = "<?php echo site_url();?>";
		});
	});
</script>

<?php include('estructura/footer.php'); ?>
	
