<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="table-responsive">
	<table id="tablaClases" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead class="headTable">
			<tr>
				<th width="20%">Nombre</th>
				<th width="30%">Descripción</th>
				<th width="20%">Objetivo</th>
				<th width="15%">Tipo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($datos as $item): ?>
	            <tr>
	            	<input id="id" type="hidden" value="<?= $item['id_clase']?>">
	                <td id="nombre"> <?= $item['nombre']?></td>
	                <td> <?= $item['descripcion']?> </td>
	                <td> <?= $item['objetivo']?> </td>
	                <td> <?php if ($item['tipo']=="0"){echo 'SISTEMA';} else {echo 'USUARIO';} ?> </td>
	                <td>
						<img class="eliminar" src="<?=base_url('public/images/delete.png')?>">
						<img class="editar" src="<?=base_url('public/images/edit.png')?>">
					</td>
	            </tr>
	        <?php endforeach;?>
		</tbody>
	</table>
</div>

<div class="col_full">
	<button id="btnNuevaClase" class="button button-rounded">NUEVA CLASE DE TRÁFICO</button>
</div>	

<?php include('estructura/modal-eliminar.php'); ?>
<?php include('estructura/modal-informacion.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript">	

	$(document).ready(function() {

		$('#tituloPantalla').text('Clases de Tráfico');

		var table = $('#tablaClases').DataTable();

		var siteurl = '<?=site_url()?>';

		//NUEVA CLASE
		$('#btnNuevaClase').click(function(){
			window.location.href = "<?php echo site_url('clasetrafico/nueva');?>";
		});
		
		//EDITAR
		$('.editar').click(function(){
			var id = $(this).closest('tr').find('input:hidden').val();
			window.location.href = "<?php echo site_url('clasetrafico/editar');?>?id="+id;
		});

		//ELIMINAR
		$('.eliminar').click(function(){
			$(this).closest('tr').addClass('selected');
			var nombre = $(this).closest('tr').find('td[id="nombre"]').text();

			$('#nombreEliminar').text(nombre);
			$('#modalEliminar').modal('show');
		});

		//ACEPTAR ELIMINAR
		$('#btnAceptarEliminar').click(function(){
			var id = $("tr.selected").find('input:hidden').val();
	        $.ajax({
	            url : siteurl+'/clasetrafico/eliminar',
	            data : { id : id},
	            type: "POST",
	            success: function(respuesta){
	            	$('#modalEliminar').modal('hide');
	            	if(respuesta!=1){
	            		$("tr.selected").removeClass('selected');
			            $('#mensaje').text("Error al eliminar la clase de tráfico.");
			            $('#modalInformacion').modal('show');
			        } else {
			        	table.row('.selected').remove().draw(false);
			        }
	            }
	        })

		});

		//CANCELAR ELIMINAR
		$('#btnCancelarEliminar').click(function(){
			$("tr.selected").removeClass('selected');
		});

		//ACEPTAR INFORMACION
		$('#btnAceptarInformacion').click(function(){
	        $('#modalInformacion').modal('hide');
		});

	});
</script>

<?php include('estructura/footer.php'); ?>