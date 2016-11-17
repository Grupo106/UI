<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php');   ?>

<link rel="stylesheet" href="<?=base_url('public/font-awesome-4.6.3/css/font-awesome.min.css')?>">

<div class="tab-content">
    <div id="seccion_limitacion" class="tab-pane fade in active"> 
        <div class="table-responsive">
            <table id="tablaPoliticas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="headTable">
                    <tr>
                        <th>Activa</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Prioridad</th>
                        <th>Bajada</th>
                        <th>Subida</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($politicas as $item): ?>
                        <tr>
                            <input id="id" type="hidden" value="<?= $item['id_politica']?>">
                            <td><input id="activa" class="bt-switch estado" type="checkbox" <?php if($item['activa']=='t') echo ' checked ';?> data-size="mini"></td>
                            <td id="nombre">           <?php echo $item['nombre'];?>            </td>
                            <td id="descripcion">      <?php echo $item['descripcion'];?>       </td>
                            <td id="prioridad">        <?php echo $item['prioridad'];?>         </td>
                            <td id="velocidad_bajada"> <?php echo $item['velocidad_bajada'];?>  </td>
                            <td id="velocidad_subida"> <?php echo $item['velocidad_subida'];?>  </td>
                            <td id="fc_creacion">      <?php echo date('d/m/Y H:i', strtotime(str_replace('-','/', $item['fc_creacion'])));?>   </td>
                            <td>
                                <?php if(strcmp($this->session->rolUsuario, "Administrador") == 0) { ?>
                                <a class="eliminar"><img src="<?=base_url('public/images/delete.png')?>" title="Eliminar"></a>
                                <a href="#" class="editar margen-izq"><img src="<?=base_url('public/images/edit.png')?>" title="Editar"></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if(strcmp($this->session->rolUsuario, "Administrador") == 0) { ?>
    <div class="col_full">
        <button id="btnNuevaClase" class="button button-rounded">NUEVA POLíTICA</button>
    </div>
<?php } ?>

<?php include('estructura/modal-eliminar.php');        ?>
<?php include('estructura/modal-informacion.php');     ?>
<?php include('estructura/modal-editar-politica.php'); ?>

<script type="text/javascript"> 
    $(document).ready(function() {
        $('#tituloPantalla').text('Políticas de Tráfico');

        var rolUsuario = "<?php echo $this->session->rolUsuario ?>";
        if(rolUsuario != "Administrador"){
            $('.bt-switch').prop('disabled',true);
        }

        var table = $('#tablaPoliticas').DataTable();
        var siteurl = '<?=site_url()?>';

        jQuery(".bt-switch").bootstrapSwitch();
        $('#tablaPoliticas').on( 'draw.dt', function () {
            jQuery('.bt-switch').bootstrapSwitch();
        });

        // Nueva politica
        $('#btnNuevaClase').click(function(){
            window.location.href = "<?php echo site_url('politica/nueva');?>";
        });

       $('#tablaPoliticas').on('click', '.eliminar', function (){
            $("tr.selected").removeClass('selected');
            $(this).closest('tr').addClass('selected');
            $('#nombreEliminar').text($(this).closest('tr').find('td[id="nombre"]').text());
            
            $('#modalEliminar').modal('show');
        });

        $('#btnAceptarEliminar').click(function(){
            $('#modalEliminar').modal('hide');
            var id = $("tr.selected").find('input:hidden').val();

            $.ajax({
                url : '<?php echo site_url('politica/eliminar');?>',
                data : { id : id},
                type: "POST",
                success: function(respuesta){
                    if(respuesta){
                        $('#mensaje').text("Error al intentar eliminar");
                        $('#modalInformacion').modal('show');
                    } else {
                        table.row('.selected').remove().draw(false);
                    }
                }
            })
        });

        $('#btnCancelarEliminar').click(function(){
            $("tr.selected").removeClass('selected');
        });

        $('#tablaPoliticas').on('click', '.editar', function (){
            var id_politica = $(this).closest('tr').find('input:hidden').val();
            window.location.href = "<?php echo site_url('politica/editar');?>?id_politica="+id_politica;
        });

        $('.estado').on('switchChange.bootstrapSwitch', function (e, estado){
            var id_politica = $(this).closest('tr').find('input:hidden').val();
            var input = $(this);

            $.ajax({
                url : '<?php echo site_url('politica/cambiar_estado');?>',
                data : { id_politica : id_politica},
                type: "POST",
                success: function(response){
                    if(!response) {
                        $('#mensaje').text("No se pudo cambiar estado de política");
                    
                        jQuery(input).bootstrapSwitch('state', !estado, true);

                        $('#modalInformacion').modal('show');
                    }
                }
            })
        });
    });
</script>

<?php include('estructura/footer.php'); ?>