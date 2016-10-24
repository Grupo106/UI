<?php //include('estructura/header.php'); ?>
<?php //include('estructura/menu.php'); ?>

<table class="table table-bordered table-striped" style="clear: both">
	<tbody>
	<?php foreach($log as $item){ ?>
		<tr>
			<td width="15%"><?=substr($item['hora_log'], 10, 6) . "  " . substr($item['hora_log'], 8, 2) . "/" . substr($item['hora_log'], 5, 2) . "/" . substr($item['hora_log'], 0, 4)?></td>
			<td><?=$item['descripcion'] ?></td>
		</tr>
	<?php if ($count++ > 6) break;} ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Actividades en el Sistema');
	});
</script>

<?php include('estructura/footer.php'); ?>