<?php include('estructura/header.php'); ?>
<?php include('estructura/content-panel.php'); ?>

<div class="panel panel-default divcenter noradius noborder" style="max-width: 800px; background: #f6f6f6;">
	<div class="panel-body well well-lg" style="padding: 40px;">
	
		<!-- Pasos del Asistente
		============================================= -->
		<ul class="process-steps process-3 clearfix">
			<li>
				<a href="#" class="i-circled i-alt divcenter">1</a>
				<!-- <h5>Crear Usuario</h5> -->
			</li>
			<li class="active">
				<a href="#" class="i-circled i-alt divcenter">2</a>
				<!-- <h5>Configurar el Sistema</h5> -->
			</li>
			<li>
				<a href="#" class="i-circled i-alt divcenter">3</a>
				<!-- <h5>Finalizar</h5> -->
			</li>
		</ul>
		<!-- #fin de los Pasos -->
		
		
		<form id="login-form" name="login-form" action="index.php" method="post">
			<h4>Eliga el tipo de Configuración del Sistema</h4>
			
			<div>
				<div>
					<input id="radio-automatica" class="radio-style" name="radio-group-2" type="radio" checked>
					<label for="radio-automatica" class="radio-style-2-label">Automática</label>
				</div>
				<div>
					<input id="radio-personalizada" class="radio-style"name="radio-group-2" type="radio">
					<label for="radio-personalizada" class="radio-style-2-label">Personalizada</label>
				</div>
			</div>
			
			<div class="col_full">
				<button class="btn btn-primary btn-lg fright" id="login-form-submit" name="login-form-submit" value="login">SIGUIENTE</button>
			</div>
		</form>
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>