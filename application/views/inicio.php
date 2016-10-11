<?php //include('estructura/header.php'); ?>
<?php //include('estructura/menu.php'); ?>

<table class="table table-bordered table-striped" style="clear: both">
	<tbody>
		<tr>
			<td width="15%"><?=substr($log[0]['hora_log'], 0,19) ?></td>
			<td><?=$log[0]['descripcion'] ?></td>
		</tr>
		<tr>
			<td width="15%"><?=substr($log[1]['hora_log'], 0,19)  ?></td>
			<td><?=$log[1]['descripcion'] ?></td>
		</tr>
		<tr>
			<td width="15%"><?=substr($log[2]['hora_log'], 0,19)  ?></td>
			<td><?=$log[2]['descripcion'] ?></td>
		</tr>
		<tr>
			<td width="15%"><?=substr($log[3]['hora_log'], 0,19)  ?></td>
			<td><?=$log[3]['descripcion'] ?></td>
		</tr>
		<tr>
			<td width="15%"><?=substr($log[4]['hora_log'], 0,19)  ?></td>
			<td><?=$log[4]['descripcion'] ?></td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Actividades en el Sistema');
	});
</script>

<?php include('estructura/footer.php'); ?>