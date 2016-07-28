<?php include('estructura/header.php'); ?>
<?php //include('estructura/menu.php'); ?>

<div> 
	<div class="clear"></div>
	<div class="col_full">
		<div class="col_half">
			<h3 class="marginUser">Nombre:</h3>
			<input id="inpUser" class="sm-form-control" style="width:40%;" placeholder="PEPE" disabled>
		</div>
		<div class="col_half col_last">
			<h3 class="marginUser">Mail:</h3>
			<input id="inpMail" class="sm-form-control" style="width:40%;">
		</div>
	</div>
	<div class="col_full">
		<div class="col_half">
			<h3 class="marginUser">Rol:</h3>			
			<select id="cboRol" class="select-1 form-control" style="width:40%; height:40px;">
				<option value="Administrador">ADMINISTRADOR</option>
			    <option value="Monitor">MONITOR</option>			    
			</select>
		</div>
		<div class="col_half col_last">
			<h3 class="marginUser">Contraseña:</h3>
			<input id="inpPass" class="sm-form-control" style="width:40%;">
		</div>
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
		$('#tituloPantalla').text('Modificar Usuario');
	});
</script>

<?php include('estructura/footer.php'); ?>
	
