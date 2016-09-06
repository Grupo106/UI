<?php include('estructura/header.php'); ?>

<section id="content">

	<div class="content-wrap nopadding">

		<div class="section nopadding nomargin" style="width: 100%; height: 100%; left: 0; top: 0; background: #fff;"></div>

		<div class="section nobg full-screen nopadding nomargin" style="overflow:auto;">
			<div class="container vertical-middle divcenter clearfix">

				<div class="row center" style="padding: 20px; padding-top:145px;">
					<a href="index.html"><img src="<?=base_url('public/images/logo-chico.png')?>" alt="NetCop Logo"></a>
				</div>

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
				<input type="text" id="usuario-nombre" name="nombre" class="sm-form-control" placeholder="NOMBRE">
			</div>

			<div class="col_half col_last">
				<input type="text" id="usuario-apellido" name="apellido" class="sm-form-control" placeholder="APELLIDO" />
			</div>

			<div class="col_half">
				<input type="text" id="usuario-usuario" name="usuario" class="sm-form-control" placeholder="NOMBRE DE USUARIO"/>
			</div>

			<div class="col_half col_last">
				<input type="text" id="usuario-mail" name="mail" class="sm-form-control" placeholder="MAIL"/>
			</div>

			<div class="col_half">
				<input type="password" id="usuario-password" name="password" class="sm-form-control" placeholder="CONTRASEÑA"/>
			</div>
			
			<div class="col_full">
				<button class="button button-rounded fright">SIGUIENTE</button>
			</div>
		</form>
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>
<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/asistente.js')?>"></script>
<script type="text/javascript">	
	$(document).ready(function() {

		//GUARDAR
		$('#form').submit(function (event){
			event.preventDefault();
			if ($('#form').valid()) {
			$.ajax({
	            url : $('#form').attr("action"),
	            type : $('#form').attr("method"),
	            data : $('#form').serialize(),
	            success: function(respuesta){
	            	if(respuesta==1){
			           window.location.href = "<?php echo site_url('asistente/asistente2');?>";
			        } else {
			            $('#mensaje').text("Error al guardar el usuario.");
			        }
	            	
	            }
	        });
		   }
	    });
	});
</script>
