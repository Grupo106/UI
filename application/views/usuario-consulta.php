<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<!-- UNA VEZ QUE TRAIGA LA INFO HACER LA TABLA DINAMICA -->	
<div class="table-responsive">
	<table id="tabla-clases" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead class="headTable">
			<tr>
				<td width="20%">Usuario</td>
				<td width="40%">Nombre y Apellido</td>
				<td width="20%">Rol</td>
				<td>Acciones</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>MMATOS</td>
				<td>Mauro Matos</td>
				<td>MONITOR</td>
				<td>
					<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
					<img src="<?=base_url('public/images/edit.png')?>">
				</td>
			</tr>
			<tr>
				<td>JRIQUELME</td>
				<td>Juan Roman Riquelme</td>
				<td>ADMINISTRADOR</td>
				<td>
					<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
					<img src="<?=base_url('public/images/edit.png')?>">
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col_full">
	<button class="button button-rounded">NUEVO USUARIO</button>
</div>		



<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Usuarios');
	});

	$(document).ready(function() {
		$('#tabla-clases').DataTable();
	});
</script>

<?php include('estructura/footer.php'); ?>