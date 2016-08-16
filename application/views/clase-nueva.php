<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

<?php foreach($registro as $clase){
} ?>

<form id="form" action="<?=site_url('clasetrafico/guardar/')?>" method="POST">
	<input type="hidden" name="id" value="<?=$clase->id_clase ?>">
	<input type="hidden" name="activa" value="<?=$clase->activa ?>">
	<div class="col_one_third">
		<label>Nombre</label>
		<input name="nombre" type="text" class="sm-form-control" value="<?=$clase->nombre?>"/>
	</div>

	<div class="col_two_third col_last">
		<label>Descripción</label>
		<input name="descripcion" type="text" class="sm-form-control" value="<?=$clase->descripcion?>"/>
	</div>
	<div class="clear"></div>
	<br/>

	<div class="col_full">
		<div class="fancy-title title-bottom-border">
			<h4>Internet</h4>
		</div>
	</div>	

	<div class="col_three_fifth">
		<label>URL</label>
		<input name="url" type="url" class="sm-form-control" value="<?=$clase->url?>">
	</div>
	<div class="clear"></div>

	<div class="col_one_third">
		<label>Dirección IP</label>
		<input name="direccionO" id="direccionO" type="text" class="sm-form-control ipAddress"
			placeholder="XXX.XXX.XXX.XXX" value="<?=$clase->direccion_o?>">
	</div>

	<div class="col_one_sixth">
		<label>Prefijo</label>
		<input name="prefijoO" type="number" class="sm-form-control prefijo" 
			min="0" max="32" value="<?=$clase->prefijo_o?>">
	</div>
	<div style="width:1%; float:left; margin: 2%;"></div>

	<div class="col_one_sixth">
		<label>Número de Puerto</label>
		<input name="puertoO" id="puertoO" type="number" class="sm-form-control puerto" 
			min="1" max="65535" value="<?=$clase->puerto_o?>">
	</div>

	<div class="col_one_sixth">
		<label>Protocolo</label>
		<select name="protocoloO" class="select-1 sm-form-control" value="<?=$clase->protocolo_o?>">
			<option value="0"></option>
		    <option value="6">TCP</option>			
		    <option value="17">UDP</option>    
		</select>
	</div>


	<input type="hidden" name="id_cidrO" value="<?=$clase->id_cidr_o ?>">
	<input type="hidden" name="id_puertoO" value="<?=$clase->id_puerto_o ?>">
	<div class="clear"></div>

	<div class="col_full">
		<div class="fancy-title title-bottom-border">
			<h4>LAN</h4>
		</div>
	</div>

	<div class="col_one_third">
		<label>Dirección IP</label>
		<input name="direccionI" id="direccionI" type="text" class="sm-form-control ipAddress" 
			placeholder="XXX.XXX.XXX.XXX" value="<?=$clase->direccion_i?>">
	</div>

	<div class="col_one_sixth">
		<label>Prefijo</label>
		<input name="prefijoI" type="number" class="sm-form-control prefijo" 
			min="0" max="32" value="<?=$clase->prefijo_i?>">
	</div>
	<div style="width:1%; float:left; margin: 2%;"></div>

	<div class="col_one_sixth">
		<label>Número de Puerto</label>
		<input name="puertoI" id="puertoI" type="number" class="sm-form-control puerto" 
			min="1" max="65535" value="<?=$clase->puerto_i?>">
	</div>

	<div class="col_one_sixth">
		<label>Protocolo</label>
		<select name="protocoloI" class="select-1 sm-form-control" value="<?=$clase->protocolo_i?>">
			<option value="0"></option>
		    <option value="6">TCP</option>			
		    <option value="17">UDP</option>  
		</select>
	</div>
	<input type="hidden" name="id_cidrI" value="<?=$clase->id_cidr_i ?>">
	<input type="hidden" name="id_puertoI" value="<?=$clase->id_puerto_i ?>">
	<div class="clear"></div>

	<div id="divError" class="alert alert-danger nobottommargin hidden">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <i class="icon-remove-sign"></i><strong id="msjError">Debe completarse al menos uno de los campos en rojo.</strong>
	</div>
	<br/>

	<div class="col_full" style="text-align:center;">
		<button type="submit" class="button button-rounded">GUARDAR</button>
		<button type="button" id="btnCancelar" class="button button-rounded button-red">CANCELAR</button>	
	</div>	
</form>	

<?php include('estructura/modal-informacion.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript">	

	$(document).ready(function() {

		$('#tituloPantalla').text('Nueva Clase de Tráfico');
		var siteurl = '<?=site_url()?>';

		//ACEPTAR Y CERRAR MODAL INFORMACION, CANCELAR GUARDADO
		$('#btnCerrar, #btnAceptarInformacion, #btnCancelar').click(function(){
			window.location.href = "<?php echo site_url('clasetrafico/consulta');?>";
		});

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
				            $('#mensaje').text("La clase fue guardada exitosamente.");
				        } else {
				            $('#mensaje').text("Error al guardar la clase de tráfico.");
				        }
		            	$('#modalInformacion').modal('show');
		            }
	        	});
	        } 

	    });


		$.validator.addMethod('IPvalida', function(value) {
			if (value=="") return true;
            var regex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
            return regex.test(value);
        });

        $.validator.addMethod('validarCamposCompletos', function(value) {
			if ($('#direccionI').val()=="" && $('#puertoI').val()=="" && $('#direccionO').val()=="" && $('#puertoO').val()==""){
				mostrarDivError(true);
				return false;
			}
			mostrarDivError(false);
			return true;
         });

        $('#form').validate({
        	errorElement: 'span',
            rules: {
            	nombre: "required",
            	descripcion: "required",
                direccionO: { 	IPvalida: true,
                				validarCamposCompletos: true },
                direccionI: {	IPvalida: true,
                				validarCamposCompletos: true },
                puertoO: "validarCamposCompletos",
                puertoI: "validarCamposCompletos",
            }
        });

        function mostrarDivError(valor){
        	if(valor && $('#divError').hasClass("hidden")){
				$('#divError').removeClass("hidden");
			} else if (!valor && !$('#divError').hasClass("hidden")){
				$('#divError').addClass("hidden");
			}
        }


        $('.ipAddress').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
		    translation: {'Z': {pattern: /[0-9]/, optional: true}}
		});

		$(".prefijo").keyup(function() {
		   if(this.value.length > 2) {
		        this.value = this.value.slice(0,2);
		   }
		   if(this.value > 32) {
		        this.value = this.value.slice(0,-1);
		   }
		});

		$(".puerto").keyup(function() {
		   if(this.value.length > 5) {
		        this.value = this.value.slice(0,5);
		   }
		   if(this.value < 1 || this.value > 65535) {
		        this.value = this.value.slice(0,-1);
		   }
		});
	});

</script>

<?php include('estructura/footer.php'); ?>
	
