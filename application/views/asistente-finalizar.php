<?php include('estructura/header.php'); ?>

<section id="content">

	<div class="content-wrap nopadding">

		<div class="section nopadding nomargin" style="width: 100%; height: 100%; left: 0; top: 0; background: #fff;"></div>

		<div class="section nobg full-screen nopadding nomargin">
			<div class="container vertical-middle divcenter clearfix">

				<div class="row center" style="padding: 20px;">
					<a href="index.html"><img src="<?=base_url('public/images/logo-chico.png')?>" alt="NetCop Logo"></a>
				</div>

<div class="panel panel-default divcenter noradius noborder" style="max-width: 800px; background: #f6f6f6;">
	<div class="panel-body well well-lg" style="padding:40px; padding-bottom:20px">

		<!-- Pasos del Asistente
		============================================= -->
		<ul class="process-steps process-3 clearfix">
			<li>
				<a href="#" class="i-circled i-alt divcenter">1</a>
				<h5>Crear Usuario</h5> 
			</li>
			<li>
				<a href="#" class="i-circled i-alt divcenter">2</a>
				<h5>Configurar el Sistema</h5>
			</li>
			<li class="active">
				<a href="#" class="i-circled i-alt divcenter">3</a>
				<h5>Finalizar</h5>
			</li>
		</ul>
		<!-- #fin de los Pasos -->
		
		<div class="title-center" style="padding-bottom:20px;">
			<h2>¡Completaste el Asistente de Instalación!</h2>
			<h4>Ya podés ingresar a NetCop con tu usuario.</h4>
		</div>

		<div class="col_full">
			<a href="/" class="button button-rounded fright">FINALIZAR</a>
		</div>
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>
