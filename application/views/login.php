<?php include('estructura/header.php'); ?>
<?php include('estructura/content-panel.php'); ?>

<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
	<div class="panel-body" style="padding: 40px;">
	
		<form id="login-form" name="login-form" class="nobottommargin" action="index.php/login/autenticar" method="post">
			<h3>Iniciar sesión</h3>

			<div class="col_full">
				<label for="login-usuario">Usuario:</label>
				<input type="text" id="login-usuario" name="login-usuario" value="" class="form-control not-dark" />
			</div>

			<div class="col_full">
				<label for="login-password">Contraseña:</label>
				<input type="password" id="login-password" name="login-password" value="" class="form-control not-dark" />
			</div>

			<div class="col_full nobottommargin">
				<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Ingresar</button>
			</div>
		</form>
		
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>