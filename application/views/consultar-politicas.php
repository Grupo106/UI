<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>

<link rel="stylesheet" href="<?=base_url('public/font-awesome-4.6.3/css/font-awesome.min.css')?>">

<div class="table-responsive">
    <table id="tablaClases" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead class="headTable">
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Prioridad</th>
                <th>Bajada</th>
                <th>Subida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($politicas as $item): ?>
                <tr>
                    <input id="id" type="hidden" value="<?= $item['id_politica']?>">
                    <td id="activa" value="<?= $item['activa']?>"><?php echo "<i class=\"fa fa-circle fa-sm\" style=\"color:", ($item['activa']=='t' ? "green" : "red"), "\"></i>";?></td>
                    <td id="nombre">           <?php echo $item['nombre'];?>           </td>
                    <td id="descripcion">      <?php echo $item['descripcion'];?>      </td>
                    <td id="prioridad">        <?php echo $item['prioridad'];?>        </td>
                    <td id="velocidad_bajada"> <?php echo $item['velocidad_bajada'];?> </td>
                    <td id="velocidad_subida"> <?php echo $item['velocidad_subida'];?> </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<script type="text/javascript"> 
    $(document).ready(function() {
        $('#tituloPantalla').text('Políticas de Tráfico');
        var table = $('#tablaClases').DataTable();
        var siteurl = '<?=site_url()?>';
    });
</script>

<?php include('estructura/footer.php'); ?>