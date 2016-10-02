<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<div class="table-responsive">
	<table id="tablaClases" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead class="headTable">
			<tr>
				<th width="5%">Activa</th>
				<th width="20%">Nombre</th>
				<th width="40%">Descripcion</th>
				<th width="15%">Tipo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($listado as $item): ?>
	            <tr>
	            	<input id="id" type="hidden" value="<?= $item['id_clase']?>">
	                <td style="text-align:center;"> 
	                	<?php if($item['activa']=='t') { ?>
	                		<input class="bt-switch estado" type="checkbox" checked data-size="mini">
	                	<?php } else { ?>
							<input class="bt-switch estado" type="checkbox" data-size="mini">
	                	<?php } ?>
	                </td>
	                <td id="nombre"> <?= $item['nombre'] ?></td>
	                <td> <?= $item['descripcion']?> </td>
	                <td> <?php if($item['tipo']==1) echo USUARIO; else echo SISTEMA; ?> </td>
	                <td>
						<img class="eliminar" src="<?=base_url('public/images/delete.png')?>">
						<img class="editar margen-izq" src="<?=base_url('public/images/edit.png')?>">
						<img class="detalle margen-izq" src="<?=base_url('public/images/detalle.png')?>">
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
<?php include('estructura/modal-detalle-clase.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript">	

	$(document).ready(function() {

		$('#tituloPantalla').text('Clases de Tráfico');
		
		var siteurl = '<?=site_url()?>';

		var table = $('#tablaClases').DataTable( { "aaSorting":[] } );
		
		jQuery('.bt-switch').bootstrapSwitch();
		$('#tablaClases').on( 'draw.dt', function () {
			jQuery('.bt-switch').bootstrapSwitch();
		});

		//NUEVA CLASE
		$('#btnNuevaClase').click(function(){
			window.location.href = "<?php echo site_url('clasetrafico/nueva');?>";
		});
		
		//ACTIVAR / DESACTIVAR
		$('#tablaClases').on('switchChange.bootstrapSwitch','.estado', function (e, estado){
			
			var id = $(this).closest('tr').find('input:hidden').val();
			var input = $(this);
			$.ajax({
	            url : siteurl+'/clasetrafico/activar',
	            data : { id : id, estado : estado},
	            type: "POST",
	            success: function(respuesta){
	            	if(respuesta!=1){
			            mostrarMensajeError("Error al cambiar el estado de la clase de tráfico.");
			    		jQuery(input).bootstrapSwitch('state', !estado, true);
			        } 
	            }
	        })
		});

		//EDITAR
		$('#tablaClases').on('click', '.editar', function (){
		    var id = $(this).closest('tr').find('input:hidden').val();
			window.location.href = "<?php echo site_url('clasetrafico/editar');?>?id="+id;
		})

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


		//VER DETALLE
		$('#tablaClases').on('click', '.detalle', function (){

			var id = $(this).closest('tr').find('input:hidden').val();
			var nombre = $(this).closest('tr').find('td[id="nombre"]').text();
			
			$.ajax({
	            url : siteurl+'/clasetrafico/obtenerDetalle',
	            data : { id : id},
	            type: "POST",
	            success: function(data){  generarTablaDetalle(nombre, data); },
	            error: function(){ mostrarMensajeError("Error al obtener el detalle de la clase."); },
	        })
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
			            mostrarMensajeError("Error al eliminar la clase de tráfico.");
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


		function generarTablaDetalle(nombre, data){

			$(".tablaDetalle tbody tr").remove();
			var detalle = JSON.parse(data);

			generarTabla('tablaInternet', detalle['internet']);
			generarTabla('tablaLan', detalle['lan']);

			$('#tituloModal').text(nombre);
			$('#modalDetalle').modal('show');
		}

		function generarTabla(nombreTabla, data){

			for (i = 0; i < data.length; i++) { 
				$("#"+nombreTabla+" tbody")
				    .append($('<tr>')
				        .append($('<td class="t1">').text( data[i]['direccion'] ))
				        .append($('<td class="t2">').text( data[i]['puerto'] ))
					);
			}
		}

	});
</script>

<?php include('estructura/footer.php'); ?>