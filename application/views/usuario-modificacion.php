<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	
<form id="form" action="guardar" method="post">
<div class="col_one_third">
	<label>Nombre</label>
	<input name="nombre" type="text" class="sm-form-control" value="<?= $nombre?>">
</div>

<div class="col_one_third">
	<label>Apellido</label>
	<input name="apellido" type="text" class="sm-form-control" value="<?= $apellido?>">
</div>

<div class="col_one_third col_last">
	<label>Mail</label>
	<input name="mail" type="text" class="sm-form-control" value="<?= $mail?>">
</div>

<div class="col_one_third">
	<label>Usuario</label>
	<input name="usuario" type="text" class="sm-form-control" value="<?= $usuario?>" disabled>
</div>

<div class="col_one_third">
	<label>Contraseña</label>
	<input name="password" type="password" class="sm-form-control" value="<?= $password?>">
</div>	
<div class="col_one_third col_last">
	<label>Rol</label>
	<select name="rol" class="select-1 form-control">
		<?php if($rol == "Administrador") 
		{
			echo "<option selected value='Administrador'>ADMINISTRADOR</option>";
		    echo "<option value='Monitor'>MONITOR</option>";
		}
		else 
		{
			echo "<option value='Administrador'>ADMINISTRADOR</option>";
		    echo "<option selected value='Monitor'>MONITOR</option>";
		}?>	    
	</select> 
</div>		
<input type="hidden" name="id" value="<?php echo $id_usu; ?>">

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

		$('#tituloPantalla').text('Modificar Usuario');
		var siteurl = '<?=site_url()?>';

		$('#btnCancelar').click(function(){
			window.location.href = "<?php echo site_url('index.php/usuario/consulta');?>";
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
	        window.location.href = "<?php echo site_url('index.php/usuario/consulta');?>";
		});
	});
</script>

<?php include('estructura/footer.php'); ?>
	
