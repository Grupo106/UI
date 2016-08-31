<?php include('estructura/header.php'); ?>
<?php include('estructura/content-panel.php'); ?>

<div class="panel panel-default divcenter noradius noborder" style="max-width: 800px; background: #f6f6f6;">
	<div class="panel-body well well-lg" style="padding:40px; padding-bottom:20px">
	
		<!-- Pasos del Asistente
		============================================= -->
		<ul class="process-steps process-3 clearfix">
			<li class="active">
				<a href="#" class="i-circled i-alt divcenter">1</a>
				<h5>Crear Usuario</h5> 
			</li>
			<li>
				<a href="#" class="i-circled i-alt divcenter">2</a>
				<h5>Configurar el Sistema</h5> 
			</li>
			<li>
				<a href="#" class="i-circled i-alt divcenter">3</a>
				<h5>Finalizar</h5> 
			</li>
		</ul>
		<!-- #fin de los Pasos -->
		
		
		<form id="form" action="<?=site_url('asistente/crearUsuario')?>" method="post">
			<h4>Completá tus datos para crear un Usuario Administrador</h4>
			
			<div class="col_half">
				<input type="text" id="usuario-nombre" name="usuario-nombre" class="sm-form-control" placeholder="NOMBRE">
			</div>

			<div class="col_half col_last">
				<input type="text" id="usuario-apellido" name="usuario-apellido" class="sm-form-control" placeholder="APELLIDO" />
			</div>

			<div class="col_half">
				<input type="text" id="usuario-usuario" name="usuario-usuario" class="sm-form-control" placeholder="NOMBRE DE USUARIO"/>
			</div>

			<div class="col_half col_last">
				<input type="text" id="usuario-mail" name="usuario-mail" class="sm-form-control" placeholder="MAIL"/>
			</div>

			<div class="col_half">
				<input type="password" id="usuario-password" name="usuario-password" class="sm-form-control" placeholder="CONTRASEÑA"/>
			</div>
			
			<div class="col_full">
				<button class="button button-rounded fright">SIGUIENTE</button>
			</div>
		</form>
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>