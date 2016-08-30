<?php include('estructura/header.php'); ?>
<?php include('estructura/content-panel.php'); ?>

<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background: #f6f6f6;">
	<div class="panel-body well well-lg" style="padding: 40px;">
	
		<form id="login-form" name="login-form" class="nobottommargin" action="<?=site_url('inicio/autenticar')?>" method="post">
			<h3>Iniciar sesión</h3>

			<div class="col_full">
				<input id="login-usuario" name="login-usuario" class="sm-form-control" type="text" placeholder="USUARIO">
			</div>

			<div class="col_full">
				<input id="login-password" name="login-password" class="sm-form-control" type="password" placeholder="CONTRASEÑA">
			</div>

			<div class="col_full nobottommargin">
				<button class="button button-rounded btn-block" id="login-form-submit" name="login-form-submit" value="login">INGRESAR</button>
			</div>
		</form>
		
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>