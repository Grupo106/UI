<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<?php include('graficos.php'); ?>

<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/graficos.js')?>"></script>

<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo en Tiempo Real');
	});
</script>
	
<?php include('estructura/footer.php'); ?>