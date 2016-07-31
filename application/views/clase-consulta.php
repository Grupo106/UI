<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="table-responsive">
	<table id="tabla-clases" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
				<td>Facebook</td>
				<td>Red Social</td>
				<td>192.168.1.10</td>
				<td>USUARIO</td>
				<td>
					<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
					<img src="<?=base_url('public/images/edit.png')?>">
				</td>
			</tr>
			<tr>
				<td>Facebook</td>
				<td>Instagram</td>
				<td>192.168.1.12</td>
				<td>USUARIO</td>
				<td>
					<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
					<img src="<?=base_url('public/images/edit.png')?>">
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col_full">
	<button class="button button-rounded">NUEVA CLASE DE TRÁFICO</button>
</div>	


<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Clases de Tráfico');
	});

	$(document).ready(function() {
		$('#tabla-clases').DataTable();
	});
</script>

<?php include('estructura/footer.php'); ?>