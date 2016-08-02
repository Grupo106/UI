<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

<form id="formNuevo" action="<?=site_url('usuario/guardar')?>" mothod="post">
	<input type="hidden" name="idUsuario" value="32">
	<div class="col_one_third">
		<label>Nombre</label>
		<input id="inpNombre" type="text" class="sm-form-control">
	</div>

	<div class="col_one_third">
		<label>Apellido</label>
		<input id="inpApellido" type="text" class="sm-form-control">
	</div>

	<div class="col_one_third col_last">
		<label>Mail</label>
		<input id="inpMail" type="text" class="sm-form-control">
	</div>

	<div class="col_one_third">
		<label>Usuario</label>
		<input id="inpUsuario" type="text" class="sm-form-control">
	</div>

	<div class="col_one_third">
		<label>Contraseña</label>
		<input id="inpContraseña" type="password" class="sm-form-control" >
	</div>	

	<div class="col_one_third col_last">
		<label>Rol</label>
		<select id="cboRol" class="select-1 form-control">
			<option value="Administrador">ADMINISTRADOR</option>
		    <option value="Monitor">MONITOR</option>			    
		</select>
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

		$('#tituloPantalla').text('Nuevo Usuario');
		var siteurl = '<?=site_url()?>';

		$('#btnCancelar').click(function(){
			window.location.href = "<?php echo site_url('usuario/consulta');?>";
		});

	});
</script>

<?php include('estructura/footer.php'); ?>
	
