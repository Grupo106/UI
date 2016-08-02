<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="table-responsive">
	<table id="tablaClases" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead class="headTable">
			<tr>
				<th width="20%">Nombre</th>
				<th width="30%">Descripción</th>
				<th width="20%">Objetivo</th>
				<th width="15%">Precedencia</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<input id="id" type="hidden" value="1">
				<td id="nombre">Facebook</td>
				<td>Red Social</td>
				<td>192.168.1.10</td>
				<td>USUARIO</td>
				<td>
					<img class="eliminar" src="<?=base_url('public/images/delete.png')?>">
					<img class="editar" src="<?=base_url('public/images/edit.png')?>">
				</td>
			</tr>
			<tr>
				<input id="id" type="hidden" value="2">
				<td id="nombre">Instagram</td>
				<td>Red Social</td>
				<td>192.168.1.12</td>
				<td>USUARIO</td>
				<td>
					<img class="eliminar" src="<?=base_url('public/images/delete.png')?>">
					<img class="editar" src="<?=base_url('public/images/edit.png')?>">
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col_full">
	<button id="btnNuevaClase" class="button button-rounded">NUEVA CLASE DE TRÁFICO</button>
</div>	

<?php include('estructura/modal-eliminar.php'); ?>

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
			window.location.href = "<?php echo site_url('clasetrafico/modificar');?>?id="+id;
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
	            type: "GET"
	        })

			table.row('.selected').remove().draw(false);
			$('#modalEliminar').modal('hide');
		});

		//CANCELAR ELIMINAR
		$('#btnCancelarEliminar').click(function(){
			$("tr.selected").removeClass('selected');
		});

	});
</script>

<?php include('estructura/footer.php'); ?>