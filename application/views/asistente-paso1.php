<?php include('estructura/header.php'); ?>
<?php include('estructura/content-panel.php'); ?>

<div class="panel panel-default divcenter noradius noborder" style="max-width: 1000px;">
	<div class="panel-body" style="padding: 40px;">
	
		<!-- Pasos del Asistente
		============================================= -->
		<ul class="process-steps process-3 bottommargin clearfix">
			<li class="active">
				<a href="#" class="i-rounded i-alt divcenter bgcolor">1</a>
				<h5>Crear Usuario</h5>
			</li>
			<li>
				<a href="#" class="i-bordered i-rounded divcenter">2</a>
				<h5>Configurar el Sistema</h5>
			</li>
			<li>
				<a href="#" class="i-bordered i-rounded divcenter">3</a>
				<h5>Finalizar</h5>
			</li>
		</ul>
		<!-- #fin de los Pasos -->
		
		
		<form id="login-form" name="login-form" class="nobottommargin" action="index.php/login/autenticar" method="post">
			<h3>Complete sus datos</h3>
			
			<div class="col_one_third">
				<label for="usuario-nombre">Nombre:</label>
				<input type="text" id="usuario-nombre" name="usuario-nombre" value="" class="form-control not-dark" />
			</div>

			<div class="col_one_third">
				<label for="usuario-apellido">Apellido:</label>
				<input type="text" id="usuario-apellido" name="usuario-apellido" value="" class="form-control not-dark" />
			</div>

			<div class="col_one_third">
				<label for="usuario-mail">Mail:</label>
				<input type="text" id="usuario-mail" name="usuario-mail" value="" class="form-control not-dark" />
			</div>
			
			<div class="col_one_third">
				<label for="usuario-rol">Rol:</label>
				<input type="text" id="usuario-rol" name="usuario-rol" value="Administrador" disabled="disabled" class="form-control not-dark" />
			</div>
			
			<div class="col_one_third">
				<label for="usuario-usuario">Usuario:</label>
				<input type="text" id="usuario-usuario" name="usuario-usuario" value="" class="form-control not-dark" />
			</div>

			<div class="col_one_third">
				<label for="usuario-password">Contraseña:</label>
				<input type="password" id="usuario-password" name="usuario-password" value="" class="form-control not-dark" />
			</div>
			
			<div class="col_full nobottommargin">
				<button class="button button-3d nomargin fright" id="login-form-submit" name="login-form-submit" value="login">Siguiente</button>
			</div>
		</form>
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>