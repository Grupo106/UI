<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

<?php foreach($registro as $clase){
} ?>

<form id="form" action="<?=site_url('clasetrafico/guardar/')?>" method="POST">
	<input type="hidden" name="id" value="<?=$clase->id_clase ?>">
	<div class="col_one_third">
		<label>Nombre</label>
		<input name="nombre" type="text" class="sm-form-control" value="<?=$clase->nombre?>"/>
	</div>

	<div class="col_two_third col_last">
		<label>Descripción</label>
		<input name="descripcion" type="text" class="sm-form-control" value="<?=$clase->descripcion?>"/>
	</div>

	<div class="col_one_third">
		<label>Objetivo</label>
		<input name="objetivo" type="text" class="sm-form-control" placeholder="XXX.XXX.XXX.XXX" value="<?=$clase->objetivo?>">
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

		$('#tituloPantalla').text('Nueva Clase de Tráfico');
		var siteurl = '<?=site_url()?>';

		//CANCELAR
		$('#btnCancelar').click(function(){
			window.location.href = "<?php echo site_url('clasetrafico/consulta');?>";
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
	        window.location.href = "<?php echo site_url('clasetrafico/consulta');?>";
		});
	});
</script>

<?php include('estructura/footer.php'); ?>
	
