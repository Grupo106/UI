<?php include('estructura/header.php'); ?>


<section id="content">

	<div class="content-wrap nopadding">

		<div class="section nopadding nomargin" style="width: 100%; height: 100%; left: 0; top: 0; background: #fff;"></div>

		<div class="section nobg full-screen nopadding nomargin" style="overflow:auto;">
			<div class="container vertical-middle divcenter clearfix">

				<div id="divPadding" class="row center" style="padding: 20px; padding-top:145px;">
					<a href="index.html"><img src="<?=base_url('public/images/logo-chico.png')?>" alt="NetCop Logo"></a>
				</div>

<div id="asistenteUsuario"  class="panel panel-default divcenter noradius noborder" style=" max-width: 800px; background: #f6f6f6;">
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
		
		
		<form id="form1" action="<?=site_url('asistente/existeUsuario')?>" method="post">
			<h4>Completá tus datos para crear un Usuario Administrador</h4>
			
			<div class="col_half">
				<input type="text" id="usuario-nombre" name="nombre" class="sm-form-control nombreInvalido" placeholder="NOMBRE">
			</div>

			<div class="col_half col_last">
				<input type="text" id="usuario-apellido" name="apellido" class="sm-form-control" placeholder="APELLIDO" />
			</div>

			<div class="col_half">
				<input type="text" id="usuario-usuario" name="usuario" class="sm-form-control usuarioInvalido" placeholder="NOMBRE DE USUARIO"/>
			</div>

			<div class="col_half col_last">
				<input type="text" id="usuario-mail" name="mail" class="sm-form-control mailInvalido" placeholder="MAIL"/>
			</div>

			<div class="col_half">
				<input type="password" id="usuario-password" name="password" class="sm-form-control" placeholder="CONTRASEÑA"/>
			</div>

			<div class="col_half col_last">
				<input type="password" id="usuario-password2" name="newpassword" class="sm-form-control passwordInvalido" placeholder="REPITA CONTRASEÑA"/>
			</div>
			
			<div class="col_full">
				<button class="button button-rounded fright">SIGUIENTE</button>
				<button type="button" id="btnAtrasUsuario" class="button button-rounded fright">ATRAS</button>
			</div>
		</form>
	</div>
</div>


<div  id="asistenteConfiguracion" class="panel panel-default divcenter noradius noborder" style="display:none; max-width: 800px; background: #f6f6f6;">
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
		
		
		<form id="form2" name="login-form" action="<?=site_url('asistente/guardar')?>" method="post">
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
                  <label> Ancho de banda de bajada
                    <div class="input-group">
                      <input type="number" class="form-control" name="anchoBajada" value="1024" aria-describedby="basic-addon2">
                      <span class="input-group-addon" id="basic-addon2"
                            title="Megabits por segundo">Mbit/s</span>
                    </div>
                  </label>
				</div>
				
				<div class="col_half col_last">
                  <label> Ancho de banda de subida
                    <div class="input-group">
                      <input type="number" class="form-control" name="anchoSubida" value="1024" aria-describedby="basic-addon3">
                      <span class="input-group-addon" id="basic-addon3" 
                            title="Megabits por segundo">Mbit/s</span>
                    </div>
                  </label>
				</div>
			</div>

			<div class="col_full">
				<button class="button button-rounded fright">SIGUIENTE</button>
				<button type="button" id="btnAtrasConfig" class="button button-rounded fright">ATRAS</button>
			</div>
		</form>
	</div>
</div>

<?php include('estructura/footer-panel.php'); ?>
<?php include('estructura/modal-informacion.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/asistente.js')?>"></script>
<script type="text/javascript">	
	$(document).ready(function() {

		$('#form1').submit(function (event){
			event.preventDefault();
			if ($('#form1').valid()) {
			$.ajax({
	            url : $('#form1').attr("action"),
	            type : $('#form1').attr("method"),
	            data : $('#form1').serialize(),
	            success: function(respuesta){
	            	if(respuesta==1){
			           ocultarDivUsuario();
			        } else if(respuesta == 0){
			        	$('#mensaje').text("Ya existe ese nombre de usuario.");
			        	$('#modalInformacion').modal('show');
			        } else {
			            $('#mensaje').text("Error al guardar información.");
			            $('#modalInformacion').modal('show');
			        }
	            	
	            }
	        });
		   }
	    });

		//GUARDA TODO
		$('#form2').submit(function (event){
			event.preventDefault();
			if ($('#form2').valid()) {
			var parametros = {
                "usuario" : $('#form1').serialize(),
                "configuracion" : $('#form2').serialize()
        	};
			$.ajax({
	            url : $('#form2').attr("action"),
	            type : $('#form2').attr("method"),
	            data : parametros,
	            success: function(respuesta){
	            	if(respuesta==1){
			          window.location.href = "<?php echo site_url('asistente/finalizar');?>";
			        } else {
			            $('#mensaje').text("Error al guardar información.");
			            $('#modalInformacion').modal('show');
			        }
	            	
	            }
	        });
		   }
	    });

		$('#btnAtrasUsuario').click(function(){
			window.location.href = "<?php echo site_url('asistente/inicio');?>";
		});

		$('#btnAtrasConfig').click(function(){			
	    	$('#asistenteConfiguracion').hide();
	    	$('#asistenteUsuario').show();
		});

		$('#btnAceptarInformacion').click(function(){
			$('#modalInformacion').modal('hide');		
		});

		function ocultarDivUsuario() {
	    	$('#asistenteUsuario').hide();
	    	$('#asistenteConfiguracion').show();
    	}

	});
</script>
