<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php');   ?>

<link rel="stylesheet" href="<?=base_url('public/font-awesome-4.6.3/css/font-awesome.min.css')?>">

<div class="col_full">
    <div class="fancy-title title-block">
        <h3>Complete los siguientes datos:</h3>
    </div>      
</div>  

<div class="container-fluid">
    <form class="form-horizontal" id="form" method="post" action="<?=site_url('politica/guardar/')?>">
        <input name="id_politica" type="hidden" class="form-control" value="x">
        <input name="activa" type="hidden" class="form-control" value="<?php if($item['activa']=='') echo 't'; else echo $item['activa'];?>">

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Nombre</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="inputNombre" value="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Descripcion</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="inputDescripcion" value="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col_full">
            <div class="fancy-title title-bottom-border">
                <h4>Origen</h4>
            </div>
        </div>
        <div id="objetivoO">
            <input type="hidden" name="objetivoO_cant" value="0">
            <input type="hidden" name="objetivoO_activos" value="1">
            
            <div id="objetivoO_0">
                <input type="hidden" name="id_objetivoO_0" value="">
                <div class="col_one">
                    <div class="col_icon agregar">
                        <i class="fa fa-plus-circle fa-2x" aria-hidden="true" style="color: green;"></i>
                    </div>
                    <div class="col_icon hidden borrar">
                        <i class="fa fa-minus-circle fa-2x" aria-hidden="true" style="color: red;"></i>
                    </div>
                    
                    <div class="col_one_fourth">
                        <label>MAC</label>
                        <input id="macO_0" type="text" 
                               class="form-control macAddress" 
                               name="macO_0" value="">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Dirección física</th>
                              <th>Dirección IP</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($arp as $item) {
                            if ($item['mac']) { ?>
                              <tr>
                                <td><a href="#" data-mac="<?=$item['mac']?>"
                                       data-for='macO_0' title="Seleccionar">
                                  <?=$item['mac']?>
                                </a></td>
                                <td><?=$item['ip']?></td>
                              </tr>
                            <?php }?>
                          <?php }?>
                          </tbody>
                        </table>
                    </div>

                    <div class="col_three_fifth col_last">
                        <label>Clase de tráfico</label>
                        <select name="id_claseTraficoO_0" class="select-1 form-control">
                            <option data-hidden="true"></option>
                            <?php foreach($listadoClases as $clases){ ?>              
                                <option value="<?=$clases['id_clase']?>"><?= $clases['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <div class="clear"></div>
            </div>
        </div>

        <div class="col_full">
            <div class="fancy-title title-bottom-border">
                <h4>Destino</h4>
            </div>
        </div>
        <div id="objetivoD">
            <input type="hidden" name="objetivoD_cant" value="0">
            <input type="hidden" name="objetivoD_activos" value="1">
            <div id="objetivoD_0">
                <input type="hidden" name="id_objetivoD_0" value="">
                <div class="col_one">
                    <div class="col_icon agregar">
                        <i class="fa fa-plus-circle fa-2x" aria-hidden="true" style="color: green;"></i>
                    </div>
                    <div class="col_icon hidden borrar">
                        <i class="fa fa-minus-circle fa-2x" aria-hidden="true" style="color: red;"></i>
                    </div>

                    <div class="col_three_fifth col_last">
                        <label>Clase de tráfico</label>
                        <select name="id_claseTraficoD_0" class="select-1 form-control">
                            <option data-hidden="true"></option>
                            <?php foreach($listadoClases as $clases){ ?>              
                                <option value="<?=$clases['id_clase']?>"><?= $clases['nombre']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <div class="clear"></div>
            </div>
        </div>

        <div class="col_full">
            <div class="fancy-title title-bottom-border">
                <h4>Tipo</h4>
            </div>
        </div>

        <div class="col_one_third">
            <input type="hidden" class="form-control" id="tipo" name="tipo" value="">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="tab" href="#menuBloqueo">Bloqueo</a></li>
                <li class=""><a data-toggle="tab" href="#menuLimitacion">Limitación</a></li>
                <li class=""><a data-toggle="tab" href="#menuPriorizacion">Priorización</a></li>
            </ul>
        </div>

        <div class="col_two_half col_last">
            <div class="container-fluid">
                <div class="tab-content">
                    <div id="menuBloqueo" class="tab-pane fade in active">
                    </div>

                    <div id="menuLimitacion" class="tab-pane fade">
                        <div class="col_one_fifth">
                            <label>Bajada</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="inputBajada" value="">
                                <span class="input-group-addon">kbps</span>
                            </div>
                        </div>
                        <div class="col_one_fifth col_last">
                            <label>Subida</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="inputSubida" value="">
                                <span class="input-group-addon">kbps</span>
                            </div>
                        </div>
                    </div>

                    <div id="menuPriorizacion" class="tab-pane fade">
                        <div class="col_two_fifth col_last">
                            <label>Prioridad</label>
                            <input type="text" class="form-control" name="inputPrioridad" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>


        <div class="col_full">
            <div class="fancy-title title-bottom-border">
                <h4>Días de aplicación</h4>
            </div>
        </div>

        <div id="dias">
        <input type="hidden" name="dias_cant" value="0">
            <div id="dias_0">
                <div class="col_half">
                    <div class="col_icon agregarh">
                        <i class="fa fa-plus-circle fa-2x" aria-hidden="true" style="color: green;"></i>
                    </div>
                    <div class="col_icon hidden borrar">
                        <i class="fa fa-minus-circle fa-2x" aria-hidden="true" style="color: red;"></i>
                    </div>
                    <div class="col_two_half col_last">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="activo_1_0">Do
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="activo_2_0">Lu
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="activo_3_0">Ma
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="activo_4_0">Mi
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="activo_5_0">Ju
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="activo_6_0">Vi
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="activo_7_0">Sá
                        </label>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="col_half col_last">
                    <input type="hidden" name="horario0" value="">
                    <div class="col_one_third">
                        <div class="input-group clockpicker" style="max-width:40px;min-width:30px;display:table-cell;text-align: center">
                            <input name="hr_desde_0" class="time form-control input-sm" value="">
                        </div>
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>
                    <div class="col_one_third col_last">
                        <div class="input-group clockpicker" style="max-width:40px;min-width:30px;display:table-cell;text-align: center">
                            <input name="hr_hasta_0" class="time form-control input-sm" value="">
                        </div>
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    <div class="col_full" style="text-align:center;">
        <button type="submit" class="button button-rounded">GUARDAR</button>
        <button type="button" id="btnCancelar" class="button button-rounded button-red" data-dismiss="modal">CANCELAR</button>
    </div>
    </form>
</div>

<?php include('estructura/modal-eliminar.php');        ?>
<?php include('estructura/modal-informacion.php');     ?>

<script src="<?=base_url('public/js/components/bootstrap-clockpicker.min.js')?>"></script>
<link href="<?=base_url('public/css/components/bootstrap-clockpicker.min.css')?>" rel="stylesheet">
<script type="text/javascript" src="<?=base_url('public/js/plugins/jquery.mask.min.js')?>"></script>  

<script type="text/javascript" src="<?=base_url('public/js/netcop/politica.js')?>"></script>

<script type="text/javascript">

    $('#tituloPantalla').text('Nueva Política de Tráfico');

    // Guardar cambios
    $('#form').submit(function (event){
        event.preventDefault();
        
        $.ajax({
            url : $('#form').attr("action"),
            type : $('#form').attr("method"),
            data : $('#form').serialize(),
            success: function(response){
                if(response)
                    $('#mensaje').text("Los cambios fueron guardados exitosamente");
                 else
                    $('#mensaje').text(response);
                
                $('#modalInformacion').modal('show');
            }
        });
    });

    $('#btnCerrar, #btnAceptarInformacion, #btnCancelar').click(function(){
        window.location.href = "<?php echo site_url('politica/consulta');?>";
    });
</script>

<?php include('estructura/footer.php'); ?>
