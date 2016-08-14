<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<!-- UNA VEZ QUE TRAIGA LA INFO HACER LA TABLA DINAMICA -->	
<div class="table-responsive">



	<table id="tablaClases" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead class="headTable">
			<tr>
				<td width="20%">Usuario</td>
				<td width="40%">Nombre y Apellido</td>
				<td width="20%">Rol</td>
				<td>Acciones</td>
			</tr>
		</thead>
		<tbody>

		<?php		
				foreach ($usuarios as $usuario) {

				$id=$usuario['id_usu'];
				$user=$usuario['usuario'];
				$nombre=$usuario['nombre'];
				$apellido=$usuario['apellido'];
				$rol=$usuario['rol'];
				
                echo "<tr> <td> $user</td><td id='nombre'> $nombre </td> <td> $rol </td>"?>
                
                <input type="hidden" value="<?php echo $id; ?>">
                
				<td>
					<img class="eliminar" src="<?=base_url('public/images/delete.png')?>">
					<img class="editar" src="<?=base_url('public/images/edit.png')?>">
				</td>
				</tr>
              <?php } //fin foreach ?>
			
		</tbody>
	</table>
</div>

<div class="col_full">
	<button id="btnNuevoUsuario" class="button button-rounded">NUEVO USUARIO</button>
</div>		

<?php include('estructura/modal-eliminar.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	$(document).ready(function() {

		$('#tituloPantalla').text('Usuarios');

		var table = $('#tablaClases').DataTable();

		var siteurl = '<?=site_url()?>';
        

		//NUEVO USUARIO
		$('#btnNuevoUsuario').click(function(){
			window.location.href = "<?php echo site_url('usuario/nuevo');?>";
		});
		
		//EDITAR
		$('.editar').click(function(){
			var id = $(this).closest('tr').find('input:hidden').val();
			window.location.href = "<?php echo site_url('usuario/modificar');?>?id="+id;
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
	            url : siteurl+'/usuario/eliminar',
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