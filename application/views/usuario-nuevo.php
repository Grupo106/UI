<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

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
	<button class="button button-rounded">GUARDAR</button>
	<button class="button button-rounded button-red">CANCELAR</button>	
</div>	
	


<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Nuevo Usuario');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
