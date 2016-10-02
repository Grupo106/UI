<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="col_full">
	<div class="fancy-title title-block">
		<h3>Complete los siguientes datos:</h3>
	</div>		
</div>	

<form id="form" action="<?=site_url('clasetrafico/guardar/')?>" method="POST">
	<input type="hidden" name="id" value="<?=$registro->id_clase ?>">
	<input type="hidden" name="activa" value="<?=$registro->activa ?>">

	<div class="col_one_third">
		<label>Nombre</label>
		<input name="nombre" type="text" class="sm-form-control" maxlength="32" value="<?=$registro->nombre?>"/>
	</div>

	<div class="col_two_third col_last">
		<label>Descripción</label>
		<input name="descripcion" type="text" class="sm-form-control" maxlength="160" value="<?=$registro->descripcion?>"/>
	</div>
	<div class="clear"></div>
	<br/>

	<div class="col_full">
		<div class="fancy-title title-bottom-border">
			<h4>Internet</h4>
		</div>
	</div>

	<!-- Bloque de Cidr Outside-->
	<div class="col_half">
		<input type="hidden" name="indexCidrO" value="<?php if(sizeof($cidrO)==0) echo 0; else echo sizeof($cidrO)-1; ?>">

		<div id="CidrO_0">
			<div class="col_icon agregar">
				<img src="<?=base_url('public/images/plus-icon.png')?>">
			</div>
			<div class="col_icon hidden borrar">
				<img src="<?=base_url('public/images/delete.png')?>">
			</div>
            <div class="col_two_fifth">
				<label>Dirección IP</label>
				<input name="direccionO_0" type="text" class="form-control ipAddress ipValida" value="<?= array_values($cidrO)[0]['direccion']?>">
			</div>
			<div class="col_one_fourth col_last">
				<label>Prefijo</label>
				<input name="prefijoO_0" type="number" class="form-control prefijo" value="<?= array_values($cidrO)[0]['prefijo']?>"
					min="0" max="32">
			</div>
			<input type="hidden" name="idCidrO_0" value="<?= array_values($cidrO)[0]['id_cidr']?>">
			<div class="clear"></div>
		</div>

		<?php foreach($cidrO as $i => $item): if($i > 0) { ?>
			<div id="CidrO_<?=$i?>">
				<div class="col_icon borrar">
					<img src="<?=base_url('public/images/delete.png')?>">
				</div>
	            <div class="col_two_fifth">
					<input name="direccionO_<?=$i?>" type="text" class="form-control ipAddress ipValida" value="<?= $item['direccion']?>">
				</div>
				<div class="col_one_fourth col_last">
					<input name="prefijoO_<?=$i?>" type="number" class="form-control prefijo" value="<?= $item['prefijo']?>"
						min="0" max="32">
				</div>
				<input type="hidden" name="idCidrO_<?=$i?>" value="<?= $item['id_cidr']?>">
				<div class="clear"></div>
			</div>
		<?php } endforeach;?>
	</div>

	<!-- Bloque de Puerto Outside-->
	<div class="col_half col_last">
		<input type="hidden" name="indexPuertoO" value="<?php if(sizeof($puertoO)==0) echo 0; else echo sizeof($puertoO)-1; ?>">

		<div id="PuertoO_0">
			<div class="col_icon agregar">
				<img src="<?=base_url('public/images/plus-icon.png')?>">
			</div>
			<div class="col_icon hidden borrar">
				<img src="<?=base_url('public/images/delete.png')?>">
			</div>
			<div class="col_one_third">
				<label>Puerto</label>
				<input name="puertoO_0" type="number" class="form-control puerto" 
					min="1" max="65535" value="<?= array_values($puertoO)[0]['numero']?>">
			</div>
			<div class="col_one_fourth col_last">
				<label>Protocolo</label>
				<select name="protocoloO_0" class="select-1 form-control">
					<?php foreach($protocolos as $key => $value){ ?>			  
				    	<option value="<?= $key ?>" <?= array_values($puertoO)[0]['protocolo'] == $key ? ' selected="selected"' : '';?> >
				    		<?php echo $value ?></option>
					<?php } ?>
				</select>
			</div>
			<input type="hidden" name="idPuertoO_0" value="<?= array_values($puertoO)[0]['id_puerto']?>">
			<div class="clear"></div>
		</div>

		<?php foreach($puertoO as $i => $item): if($i > 0) { ?>
			<div id="PuertoO_<?=$i?>">
				<div class="col_icon borrar">
					<img src="<?=base_url('public/images/delete.png')?>">
				</div>
	            <div class="col_one_third">
					<input name="puertoO_<?=$i?>" type="number" class="form-control puerto" 
						min="1" max="65535" value="<?= $item['numero']?>">
				</div>
				<div class="col_one_fourth col_last">
					<select name="protocoloO_<?=$i?>" class="select-1 form-control">
						<?php foreach($protocolos as $key => $value){ ?>			  
					    	<option value="<?= $key ?>" <?= $item['protocolo'] == $key ? ' selected="selected"' : '';?> >
					    		<?php echo $value ?></option>
						<?php } ?>
					</select>
				</div>
				<input type="hidden" name="idPuertoO_<?=$i?>" value="<?= $item['id_puerto']?>">
				<div class="clear"></div>
			</div>
		<?php } endforeach;?>
	</div>

	<div class="clear"></div>

	<div class="col_full">
		<div class="fancy-title title-bottom-border">
			<h4>LAN</h4>
		</div>
	</div>

	<!-- Bloque de Cidr Inside-->
	<div class="col_half">
		<input type="hidden" name="indexCidrI" value="<?php if(sizeof($cidrI)==0) echo 0; else echo sizeof($cidrI)-1; ?>">

		<div id="CidrI_0">
			<div class="col_icon agregar">
				<img src="<?=base_url('public/images/plus-icon.png')?>">
			</div>
			<div class="col_icon hidden borrar">
				<img src="<?=base_url('public/images/delete.png')?>">
			</div>
            <div class="col_two_fifth">
				<label>Dirección IP</label>
				<input name="direccionI_0" type="text" class="form-control ipAddress ipValida" value="<?= array_values($cidrI)[0]['direccion']?>">
			</div>
			<div class="col_one_fourth col_last">
				<label>Prefijo</label>
				<input name="prefijoI_0" type="number" class="form-control prefijo" value="<?= array_values($cidrI)[0]['prefijo']?>"
					min="0" max="32">
			</div>
			<input type="hidden" name="idCidrI_0" value="<?= array_values($cidrI)[0]['id_cidr']?>">
			<div class="clear"></div>
		</div>

		<?php foreach($cidrI as $i => $item): if($i > 0) { ?>
			<div id="CidrI_<?=$i?>">
				<div class="col_icon borrar">
					<img src="<?=base_url('public/images/delete.png')?>">
				</div>
	            <div class="col_two_fifth">
					<input name="direccionI_<?=$i?>" type="text" class="form-control ipAddress ipValida" value="<?= $item['direccion']?>">
				</div>
				<div class="col_one_fourth col_last">
					<input name="prefijoI_<?=$i?>" type="number" class="form-control prefijo" value="<?= $item['prefijo']?>"
						min="0" max="32">
				</div>
				<input type="hidden" name="idCidrI_<?=$i?>" value="<?= $item['id_cidr']?>">
				<div class="clear"></div>
			</div>
		<?php } endforeach;?>
	</div>

	<!-- Bloque de Puerto Inside-->
	<div class="col_half col_last">
		<input type="hidden" name="indexPuertoI" value="<?php if(sizeof($puertoI)==0) echo 0; else echo sizeof($puertoI)-1; ?>">

		<div id="PuertoI_0">
			<div class="col_icon agregar">
				<img src="<?=base_url('public/images/plus-icon.png')?>">
			</div>
			<div class="col_icon hidden borrar">
				<img src="<?=base_url('public/images/delete.png')?>">
			</div>
			<div class="col_one_third">
				<label>Puerto</label>
				<input name="puertoI_0" type="number" class="form-control puerto" 
					min="1" max="65535" value="<?= array_values($puertoI)[0]['numero']?>">
			</div>
			<div class="col_one_fourth col_last">
				<label>Protocolo</label>
				<select name="protocoloI_0" class="select-1 form-control">
					<?php foreach($protocolos as $key => $value){ ?>			  
				    	<option value="<?= $key ?>" <?= array_values($puertoI)[0]['protocolo'] == $key ? ' selected="selected"' : '';?> >
				    		<?php echo $value ?></option>
					<?php } ?>
				</select>
			</div>
			<input type="hidden" name="idPuertoI_0" value="<?= array_values($puertoI)[0]['id_puerto']?>">
			<div class="clear"></div>
		</div>

		<?php foreach($puertoI as $i => $item): if($i > 0) { ?>
			<div id="PuertoI_<?=$i?>">
				<div class="col_icon borrar">
					<img src="<?=base_url('public/images/delete.png')?>">
				</div>
	            <div class="col_one_third">
					<input name="puertoI_<?=$i?>" type="number" class="form-control puerto" 
						min="1" max="65535" value="<?= $item['numero']?>">
				</div>
				<div class="col_one_fourth col_last">
					<select name="protocoloI_<?=$i?>" class="select-1 form-control">
						<?php foreach($protocolos as $key => $value){ ?>			  
					    	<option value="<?= $key ?>" <?= $item['protocolo'] == $key ? ' selected="selected"' : '';?> >
					    		<?php echo $value ?></option>
						<?php } ?>
					</select>
				</div>
				<input type="hidden" name="idPuertoI_<?=$i?>" value="<?= $item['id_puerto']?>">
				<div class="clear"></div>
			</div>
		<?php } endforeach;?>
	</div>

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
<script type="text/javascript" src="<?=base_url('public/js/netcop/clase.nueva.js')?>"></script>

<script type="text/javascript">	
	$(document).ready(function() {
		$('#tituloPantalla').text('Nueva Clase de Tráfico');

		var siteurl = '<?=site_url()?>';

		//ACEPTAR Y CERRAR MODAL INFORMACION, CANCELAR GUARDADO
		$('#btnCerrar, #btnAceptarInformacion, #btnCancelar').click(function(){
			//En caso de error en la pantalla de nueva clase, queda en esa misma pantalla
			if($('#banderaError').val()!="true"){
				window.location.href = "<?php echo site_url('clasetrafico/consulta');?>";
			} else {
				$('#modalInformacion').modal('hide');
			}
		});

		//GUARDAR
		$('#form').submit(function (event){
			event.preventDefault();
			if ($('#form').valid()) {

				$.ajax({
		            url : $('#form').attr("action"),
		            type : $('#form').attr("method"),
		            data : $('#form').serialize(),
		            success: function(){  mostrarMensaje("La clase fue guardada exitosamente."); },
		            error: function(){  
		            		$('#banderaError').val("true");
		            		mostrarMensaje("Error al guardar la clase de tráfico."); 
		        		},
	        	});
	        } 

	    });

	    function mostrarMensaje(mensaje){
			$('#mensaje').text(mensaje);
			$('#modalInformacion').modal('show');
		}

	});
</script>

<?php include('estructura/footer.php'); ?>
	
