<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

<form id="form" action="<?=site_url('usuario/guardar/')?>" method="post">
	<input type="hidden" name="idUsuario">
	<div class="col_one_third">
		<label>Nombre</label>
		<input name="nombre" type="text" class="sm-form-control nombreInvalido" maxlength="16">
	</div>

	<div class="col_one_third">
		<label>Apellido</label>
		<input name="apellido" type="text" class="sm-form-control" maxlength="16">
	</div>
	
	<div class="col_one_third col_last">
		<label>Mail</label>
		<input name="mail" type="text" class="sm-form-control mailInvalido" maxlength="32">
	</div>
	<div class="clear"></div>

	<div class="col_one_third">
		<label>Usuario</label>
		<input name="usuario" type="text" class="sm-form-control usuarioInvalido" maxlength="16">
	</div>

	<div class="col_one_third col_last">
		<label>Rol</label>
		<select name="rol" class="select-1 sm-form-control">
			<option value="Administrador">ADMINISTRADOR</option>
		    <option value="Monitor">MONITOR</option>			    
		</select>
	</div>	
	<div class="clear"></div>
	
	<div class="col_one_third">
		<label>Contraseña</label>
		<input id="password" name="password" type="password" class="sm-form-control" maxlength="32">
	</div>		
	<div class="col_one_third col_last">
		<label>Repita Contraseña</label>
		<input name="newpassword" type="password" class="sm-form-control passwordInvalido" maxlength="32">
	</div>	
	<div class="clear"></div>
	<br/>

	<div class="col_full" style="text-align:center;">
		<button type="submit" class="button button-rounded">GUARDAR</button>
		<button type="button" id="btnCancelar" class="button button-rounded button-red">CANCELAR</button>	
	</div>	
</form>

<?php include('estructura/modal-informacion.php'); ?>
<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/usuario.js')?>"></script>
<script type="text/javascript">	
	$(document).ready(function() {

		$('#tituloPantalla').text('Nuevo Usuario');
		var siteurl = '<?=site_url()?>';

		$('#btnCancelar').click(function(){
			window.location.href = "<?php echo site_url('usuario/consulta');?>";
		});

		//GUARDAR
		$('#form').submit(function (event){
			event.preventDefault();
			if ($('#form').valid()) {
			$.ajax({
	            url : $('#form').attr("action"),
	            type : $('#form').attr("method"),
	            data : $('#form').serialize(),
	            success: function(respuesta){
	            	if(respuesta==1){
			            $('#mensaje').text("El usuario fue guardado exitosamente.");
			        } else if(respuesta == 2){
			        	$('#mensaje').text("El nombre de usuario ya está registrado. Por favor, ingrese uno diferente.");
			        	$('#modalInformacion').addClass('stayPage');
			        } else {
			            $('#mensaje').text("Error al guardar el usuario.");
			        }
	            	$('#modalInformacion').modal('show');
	            }
	        });
		   }
	    });


	    //ACEPTAR
		$('#btnAceptarInformacion').click(function(){
		    if($('#modalInformacion').hasClass('stayPage')) {
				$('#modalInformacion').modal('hide');
				$('#modalInformacion').removeClass('stayPage');
			} else {
	          window.location.href = "<?php echo site_url('usuario/consulta');?>";				
			}
		});
	});
</script>

<?php include('estructura/footer.php'); ?>
	
