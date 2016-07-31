<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div> 
	<div class="clear"></div>
		<div class="col_one_third" style="margin-right:136px; margin-left:153px;">
			<label>Nombre: </label>
			<input id="inpUser" class="sm-form-control">
		</div>

		<div class="col_one_third">
			<label>Mail: </label>
			<input id="inpMail" class="sm-form-control">
		</div>
		<div class="col_one_third" style="margin-right:136px; margin-left:153px;">
			<label>Rol:</label>
			<select id="cboRol" class="select-1 form-control" style="height:40px;">
				<option value="Administrador">ADMINISTRADOR</option>
			    <option value="Monitor">MONITOR</option>			    
			</select>
		</div>		
		<div class="col_one_third">
			<label>Contraseña:</label>
			<input id="inpContraseña" class="sm-form-control" >
		</div>	
	<div class="col_full" style="text-align:center;">
		<button class="button button-rounded">GUARDAR</button>
		<button class="button button-rounded" style="background-color:#F44336;">CANCELAR</button>	
	</div>	
	
</div>



<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Nuevo Usuario');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
