<?php include('estructura/header.php'); ?>
<div>
<div class="container clearfix" style="padding-left:6px;">
<h3 class="title" style="margin-left:0px;">Lista de Usuarios</h3>
<!-- UNA VEZ QUE TRAIGA LA INFO HACER LA TABLA DINAMICA -->	
					<table class="table table-bordered table-striped" style="clear: both">
						<thead class="headTable">
							<tr>
								<td><h4>Usuario</h4></td>
								<td><h4>Rol</h4></td>
								<td><h4>Acciones</h4></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td width="60%">Mauro Matos</td>
								<td width="30%">Monitor</td>
								<td width="10%" style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Juan Roman Riquelme</td>
								<td>Administrador</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Martin Palermo</td>
								<td>Monitor</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>El Muerto de Higuain</td>
								<td>Monitor</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Kun Aguero</td>
								<td>Monitor</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Caruso Lombardi</td>
								<td>Administrador</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Coco Basile</td>
								<td>Monitor</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Ortega</td>
								<td>Administrador</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Cristiano Ronald</td>
								<td>Administrador</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Pato Solchaga</td>
								<td>Monitor</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Marcelo Vieytes</td>
								<td>Administrador</td>
								<td style="text-align:center;">
									<img style="margin-right:17px;" src="<?=base_url('public/images/delete.png')?>">
									<img src="<?=base_url('public/images/edit.png')?>">
								</td>
							</tr>
							<tr>
								<td>Perez Garcia</td>
								<td>Administrador</td>
								<td style="text-align:center;">
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
</div>


<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Consultar Usuario');
	});
</script>

<?php include('estructura/footer.php'); ?>