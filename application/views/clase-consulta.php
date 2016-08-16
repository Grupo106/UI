<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="table-responsive">
	<table id="tablaClases" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead class="headTable">
			<tr>
				<th colspan='1'></th>
				<th colspan='2' style="text-align: center">DESTINO</th>
				<th colspan='2' style="text-align: center">ORIGEN</th>
				<th colspan='1'></th>
				<th colspan='1'></th>
			</tr>	
			<tr>
				<th width="18%">Nombre</th>
				<th width="18%">Dirección de Red</th>
				<th width="12%">Puerto</th>
				<th width="18%">Dirección de Red</th>
				<th width="12%">Puerto</th>
				<th width="12%">Tipo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($listado as $item): ?>
	            <tr>
	            	<input id="id" type="hidden" value="<?= $item['id_clase']?>">
	                <td id="nombre"> <?= $item['nombre'] ?></td>
	                <td> <?= $item['direccionO']?> </td>
	                <td> <?= $item['puertoO']?> </td>
	                <td> <?= $item['direccionI']?> </td>
	                <td> <?= $item['puertoI']?> </td>
	                <td> <?= $item['tipo']?> </td>
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
			//Quito la clase "selected" de la fila anterior seleccionada
			$("tr.selected").removeClass('selected');
			//Coloco el selected a la nueva fila
			$(this).closest('tr').addClass('selected');
			var nombre = $(this).closest('tr').find('td[id="nombre"]').text();

			$('#nombreEliminar').text(nombre);
			$('#modalEliminar').modal('show');
		});

		//ACEPTAR ELIMINAR
		$('#btnAceptarEliminar').click(function(){
			$('#modalEliminar').modal('hide');
			var id = $("tr.selected").find('input:hidden').val();

	        $.ajax({
	            url : siteurl+'/clasetrafico/eliminar',
	            data : { id : id},
	            type: "POST",
	            success: function(respuesta){
	            	if(respuesta!=1){
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