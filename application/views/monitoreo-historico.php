<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>
							
				
<div class="col_full">
	<div class="fancy-title title-block">
		<h2 id="titulo-periodo">Período: 01/01/2016 - 01/04/2016</h2>
	</div>	
</div>			
				
				
<?php include('graficos.php'); ?>


<script type="text/javascript">	
	jQuery(window).load( function(){
		$('#tituloPantalla').text('Monitoreo Histórico');
	});
</script>
	
<?php include('estructura/footer.php'); ?>