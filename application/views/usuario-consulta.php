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
				$user=html_escape($usuario['usuario']);
				$nombre=html_escape($usuario['nombre']);
				$apellido=html_escape($usuario['apellido']);
				$rol=html_escape($usuario['rol']);
				$nombreApellido = $nombre . " " . $apellido;
				
                echo "<tr> <td> $user</td><td id='nombre'> $nombreApellido </td> <td> $rol </td>"?>
                
                <input type="hidden" value="<?php echo $id; ?>">
               
				<td>
					 <?php if(strcmp($this->session->rolUsuario, "Administrador") == 0) { ?>
					<img class="eliminar" src="<?=base_url('public/images/delete.png')?>">
					<img class="editar margen-izq" src="<?=base_url('public/images/edit.png')?>">
					<?php }
					 ?>
				</td>
						
				</tr>
              <?php } //fin foreach ?>
			
		</tbody>
	</table>
</div>

<div class="col_full">
	<?php if(strcmp($this->session->rolUsuario, "Administrador") == 0) { ?>
	<button id="btnNuevoUsuario" class="button button-rounded">NUEVO USUARIO</button>
	<?php } ?>
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
		$('#tablaClases').on('click', '.editar', function (){
			var id = $(this).closest('tr').find('input:hidden').val();
			window.location.href = "<?php echo site_url('usuario/modificar');?>?id="+id;
		});

		//ELIMINAR
		$('#tablaClases').on('click', '.eliminar', function (){
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
	            url : siteurl+'/usuario/eliminar',
	            data : { id : id},
	            type: "POST",
	            success: function(respuesta){
	            	if(respuesta!=1){
			            mostrarMensajeError("Error al eliminar el usuario.");
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

		function mostrarMensajeError(mensaje){
			$('#mensaje').text(mensaje);
			$('#modalInformacion').modal('show');
		}

	});
</script>

<?php include('estructura/footer.php'); ?>
