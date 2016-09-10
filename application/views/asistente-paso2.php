<?php include('estructura/header.php'); ?>

<section id="content">

	<div class="content-wrap nopadding">

		<div class="section nopadding nomargin" style="width: 100%; height: 100%; left: 0; top: 0; background: #fff;"></div>

		<div class="section nobg full-screen nopadding nomargin" style="overflow:auto;">
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
		
		
		<form id="form2" name="login-form" action="<?=site_url('asistente/guardarConfiguracion')?>" method="post">
			<h4>Elegí el tipo de Configuración del Sistema</h4>
			
			<div style="padding-bottom: 20px;">
				<div>
					<input id="radio-automatica" class="radio-style" type="radio" name="automatica" checked>
					<label for="radio-automatica" class="radio-style-2-label">Automática</label>
				</div>
				<div>
					<input id="radio-personalizada" class="radio-style" type="radio" name="personalizada">
					<label for="radio-personalizada" class="radio-style-2-label">Personalizada</label>
				</div>
			</div>

			<div id="div-personalizada" class="hidden">
				<div class="col_one_third">
					<input type="text" name="ip" class="sm-form-control ipAddress ipValida" placeholder="IP DE ADMINISTRACION">
				</div>

				<div class="col_one_third" style="margin-bottom:47px;">
					<input type="text" name="mascara" class="sm-form-control ipAddress ipValida" placeholder="MASCARA DE SUBRED" />
				</div>

				<div class="col_one_third col_last" >
					<input type="text" name="enlace" class="sm-form-control ipAddress ipValida" placeholder="PUERTA DE ENLACE">
				</div>
				<div class="col_half" style="margin-bottom:47px;">
					<input type="text" name="dns1" class="sm-form-control ipAddress ipValida" placeholder="DNS 1" />
				</div>
				
				<div class="col_half col_last" >
					<input type="text" name="dns2" class="sm-form-control ipAddress ipValida" placeholder="DNS 2" />
				</div>
				<div class="col_half">
					<input type="text" name="anchoBajada" class="sm-form-control" placeholder="ANCHO DE BANDA DE BAJADA" />
				</div>
				
				<div class="col_half col_last">
					<input type="text" name="anchoSubida" class="sm-form-control" placeholder="ANCHO DE BANDA DE SUBIDA" />
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
<script type="text/javascript">	
	$(document).ready(function() {

		//GUARDAR
		$('#form2').submit(function (event){
			event.preventDefault();
			if ($('#radio-automatica').checked || $('#form2').valid()) {
			$.ajax({
	            url : $('#form2').attr("action"),
	            type : $('#form2').attr("method"),
	            data : $('#form2').serialize(),
	            success: function(respuesta){
	            	if(respuesta==1){
			           window.location.href = "<?php echo site_url('asistente/asistente3');?>";
			       } 	        
	            }
	        });
		  }
	    });
	});

	//ACEPTAR
		$('#btnAceptarInformacion').click(function(){
	        window.location.href = "<?php echo site_url('usuario/consulta');?>";
		});
</script>
<?php include('estructura/footer-panel.php'); ?>