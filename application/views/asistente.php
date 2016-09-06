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
	<div class="panel-body well well-lg" style="padding-bottom:20px">
		
		<div class="title-center" style="padding-top:70px;padding-bottom:50px">
			<h2>¡Bienvenido al Asistente de Instalación!</h2>
			<h4>Seguí los pasos para configurar NetCop.</h4>
		</div>

		<div class="col_full">
			<button id="btnSiguiente" class="button button-rounded fright">SIGUIENTE</button>
		</div>
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>

<script type="text/javascript">
	$('#btnSiguiente').click(function(){
	        window.location.href = "<?php echo site_url('asistente/asistente');?>";
		});
</script>