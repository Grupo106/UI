<?php include('estructura/header.php'); ?>
<?php include('estructura/content-panel.php'); ?>


<div class="panel panel-default divcenter noradius noborder" style="max-width: 800px; background: #f6f6f6;">
	<div class="panel-body well well-lg" style="padding:40px; padding-bottom:20px">
	
		<!-- Pasos del Asistente
		============================================= -->
		<ul class="process-steps process-3 clearfix">
			<li>
				<a href="#" class="i-circled i-alt divcenter">1</a>
				<h5>Crear Usuario</h5>
			</li>
			<li class="active">
				<a href="#" class="i-circled i-alt divcenter">2</a>
				<h5>Configurar el Sistema</h5>
			</li>
			<li>
				<a href="#" class="i-circled i-alt divcenter">3</a>
				<h5>Finalizar</h5>
			</li>
		</ul>
		<!-- #fin de los Pasos -->
		
		
		<form id="login-form" name="login-form" action="index.php" method="post">
			<h4>Elegí el tipo de Configuración del Sistema</h4>
			
			<div style="padding-bottom: 20px;">
				<div>
					<input id="radio-automatica" class="radio-style" type="radio" name="radio-group-2" checked>
					<label for="radio-automatica" class="radio-style-2-label">Automática</label>
				</div>
				<div>
					<input id="radio-personalizada" class="radio-style" type="radio" name="radio-group-2">
					<label for="radio-personalizada" class="radio-style-2-label">Personalizada</label>
				</div>
			</div>

			<div id="div-personalizada" class="hidden">
				<div class="col_one_third">
					<input type="text" id="ip-administacion" class="sm-form-control" placeholder="IP DE ADMINISTRACION">
				</div>

				<div class="col_one_third">
					<input type="text" id="mascara-subred" class="sm-form-control" placeholder="MASCARA DE SUBRED" />
				</div>

				<div class="col_one_third col_last">
					<input type="text" id="puerta-enlace" class="sm-form-control" placeholder="PUERTA DE ENLACE">
				</div>

				<div class="col_half">
					<input type="text" id="ancho-banda-bajada" class="sm-form-control" placeholder="ANCHO DE BANDA DE BAJADA" />
				</div>
				
				<div class="col_half col_last">
					<input type="text" id="ancho-banda-subida" class="sm-form-control" placeholder="ANCHO DE BANDA DE SUBIDA" />
				</div>
			</div>

			<div class="col_full">
				<button class="button button-rounded fright">SIGUIENTE</button>
			</div>
		</form>
	</div>
</div>

<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/asistente.js')?>"></script>

<?php include('estructura/footer-panel.php'); ?>