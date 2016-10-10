<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php');   ?>

<link rel="stylesheet" href="<?=base_url('public/font-awesome-4.6.3/css/font-awesome.min.css')?>">
<?php foreach($politica as $item):  echo ''; ?>
<?php endforeach;?>

<?php foreach($relacionClases as $item2):  echo ''; ?>
<?php endforeach;?>

<div class="container-fluid">
    <form class="form-horizontal" id="form" method="post" action="<?=site_url('politica/guardar/')?>">
    	<input name="id_politica" type="hidden" class="form-control" value="<?= $item['id_politica']?>">
        <input name="activa" type="hidden" class="form-control" value="<?php if($item['activa']=='') echo 't'; else echo $item['activa'];?>">

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Nombre</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="inputNombre" value="<?= $item['nombre']?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Descripcion</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="inputDescripcion" value="<?= $item['descripcion']?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de creación</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="inputFcCreacion" value="<?= date('d/m/Y H:i', strtotime(str_replace('-','/', $item['fc_creacion'])))?>" disabled>
                    </div>
                </div>
            </div>
        </div>


        <div class="col_full">
            <div class="fancy-title title-bottom-border">
                <h4>Objetivo</h4>
            </div>
        </div>
        <div id="objetivoO">
            <input type="hidden" name="objetivoO_cant" value="<?php if(!isset($relacionClasesO)) echo 0; else echo sizeof($relacionClasesO)-1; ?>">
            <input type="hidden" name="objetivoO_activos" value="<?php if(!isset($relacionClasesO)) echo 0; else echo sizeof($relacionClasesO); ?>">
            <?php if(!isset($relacionClasesO)) { ?>
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
                            <input type="text" class="form-control macAddress" name="macO_0" value="">
                        </div>

                        <div class="col_three_fifth col_last">
                            <label>Clase de tráfico</label>
                            <select name="id_claseTraficoO_0" class="select-1 form-control">
                                <option data-hidden="true"></option>
                                <?php foreach($listadoClases as $clases){ ?>              
                                    <option value="<?=$clases['id_clase']?>"><?= $clases['nombre']?></option>
                                <?php } ?>
                            </select>
                        <div>
                    </div>
                </div>
                <div class="clear"></div>
            <?php } ?>

            <?php foreach($relacionClasesO as $i => $relacion) { ?>
                <div id="objetivoO_<?=$i?>">
                    <input type="hidden" name="id_objetivoO_<?=$i?>" value="<?=$relacion['id_objetivo']?>">
                    <div class="col_one">
                        <?php if($i == 0) { ?>
                            <div class="col_icon agregar">
                                <i class="fa fa-plus-circle fa-2x" aria-hidden="true" style="color: green;"></i>
                            </div>
                            <div class="col_icon hidden borrar">
                            <?php } else { ?>
                            <div class="col_icon borrar">
                        <?php } ?>
                            <i class="fa fa-minus-circle fa-2x" aria-hidden="true" style="color: red;"></i>
                        </div>
                        
                        <div class="col_one_fourth">
                            <?php if($i == 0) { ?>
                                <label>MAC</label>
                            <?php } ?>
                            <input type="text" class="form-control macAddress" name="macO_<?=$i?>" value="<?= $relacion['direccion_fisica']?>">
                        </div>

                        <div class="col_three_fifth col_last">
                            <?php if($i == 0) { ?>
                                <label>Clase de tráfico</label>
                            <?php } ?>
                            <select name="id_claseTraficoO_<?=$i?>" class="select-1 form-control">
                                <option></option>
                                <?php foreach($listadoClases as $clases){ ?>              
                                    <option value="<?=$clases['id_clase']?>"<?php if($clases['id_clase'] == $relacion['clase']['id_clase']) echo " selected"?>><?=$clases['nombre']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php }?>
        </div>

        <div class="col_full">
            <div class="fancy-title title-bottom-border">
                <h4>Aplicado a</h4>
            </div>
        </div>
        <div id="objetivoD">
            <input type="hidden" name="objetivoD_cant" value="<?php if(!isset($relacionClasesD)) echo 0; else echo sizeof($relacionClasesD)-1; ?>">
            <input type="hidden" name="objetivoD_activos" value="<?php if(!isset($relacionClasesD)) echo 0; else echo sizeof($relacionClasesD); ?>">
            <?php if(!isset($relacionClasesD)) { ?>
                <div id="objetivoD_0">
                    <input type="hidden" name="id_objetivoD_0" value="">
                    <div class="col_one">
                        <div class="col_icon agregar">
                            <i class="fa fa-plus-circle fa-2x" aria-hidden="true" style="color: green;"></i>
                        </div>
                        <div class="col_icon hidden borrar">
                            <i class="fa fa-minus-circle fa-2x" aria-hidden="true" style="color: red;"></i>
                        </div>
                        
                        <div class="col_one_fourth">
                            <label>MAC</label>
                            <input type="text" class="form-control macAddress" name="macD_0" value="">
                        </div>

                        <div class="col_three_fifth col_last">
                            <label>Clase de tráfico</label>
                            <select name="id_claseTraficoD_0" class="select-1 form-control">
                                <option data-hidden="true"></option>
                                <?php foreach($listadoClases as $clases){ ?>              
                                    <option value="<?=$clases['id_clase']?>"><?= $clases['nombre']?></option>
                                <?php } ?>
                            </select>
                        <div>
                    </div>
                </div>
                <div class="clear"></div>
            <?php } ?>

            <?php foreach($relacionClasesD as $i => $relacion) { ?>
                <div id="objetivoD_<?=$i?>">
                    <input type="hidden" name="id_objetivoD_<?=$i?>" value="<?=$relacion['id_objetivo']?>">
                    <div class="col_one">
                        <?php if($i == 0) { ?>
                            <div class="col_icon agregar">
                                <i class="fa fa-plus-circle fa-2x" aria-hidden="true" style="color: green;"></i>
                            </div>
                            <div class="col_icon hidden borrar">
                            <?php } else { ?>
                            <div class="col_icon borrar">
                        <?php } ?>
                            <i class="fa fa-minus-circle fa-2x" aria-hidden="true" style="color: red;"></i>
                        </div>
                        
                        <div class="col_one_fourth">
                            <?php if($i == 0) { ?>
                                <label>MAC</label>
                            <?php } ?>
                            <input type="text" class="form-control macAddress" name="macD_<?=$i?>" value="<?= $relacion['direccion_fisica']?>">
                        </div>

                        <div class="col_three_fifth col_last">
                            <?php if($i == 0) { ?>
                                <label>Clase de tráfico</label>
                            <?php } ?>
                            <select name="id_claseTraficoD_<?=$i?>" class="select-1 form-control">
                                <option data-hidden="true"></option>
                                <?php foreach($listadoClases as $clases){ ?>              
                                    <option value="<?=$clases['id_clase']?>"<?php if($clases['id_clase'] == $relacion['clase']['id_clase']) echo " selected"?>><?=$clases['nombre']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php }?>
        </div>

        <div class="col_full">
            <div class="fancy-title title-bottom-border">
                <h4>Tipo</h4>
            </div>
        </div>

        <div class="col_one_third">
            <input type="hidden" class="form-control" id="tipo" name="tipo" value="<?php if($item['velocidad_bajada']=='' && $item['prioridad']=='') echo 'bloqueo'; if($item['velocidad_bajada']!='') echo 'limitacion'; if($item['prioridad']!='') echo 'priorizacion';?>">
            <ul class="nav nav-pills">
                <li class="<?php if($item['velocidad_bajada']=='' && $item['prioridad']=='') echo 'active';?>"><a data-toggle="tab" href="#menuBloqueo">Bloqueo</a></li>
                <li class="<?php if($item['velocidad_bajada']!='') echo 'active';?>"><a data-toggle="tab" href="#menuLimitacion">Limitación</a></li>
                <li class="<?php if($item['prioridad']!='') echo 'active';?>"><a data-toggle="tab" href="#menuPriorizacion">Priorización</a></li>
            </ul>
        </div>

        <div class="col_two_half col_last">
            <div class="container-fluid">
                <div class="tab-content">
                    <div id="menuBloqueo" class="tab-pane fade <?php if($item['velocidad_bajada']=='' && $item['prioridad']=='') echo 'in active';?>">
                    </div>

                    <div id="menuLimitacion" class="tab-pane fade <?php if($item['velocidad_bajada']!='') echo 'in active';?>">
                        <div class="col_one_fifth">
                            <label>Bajada</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="inputBajada" value="<?= $item['velocidad_bajada']?>">
                                <span class="input-group-addon">kbps</span>
                            </div>
                        </div>
                        <div class="col_one_fifth col_last">
                            <label>Subida</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="inputSubida" value="<?= $item['velocidad_subida']?>">
                                <span class="input-group-addon">kbps</span>
                            </div>
                        </div>
                    </div>

                    <div id="menuPriorizacion" class="tab-pane fade <?php if($item['prioridad']!='') echo 'in active';?>">
                        <div class="col_two_fifth col_last">
                            <label>Prioridad</label>
                            <input type="text" class="form-control" name="inputPrioridad" value="<?= $item['prioridad']?>">
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
        <input type="hidden" name="dias_cant" value="<?php if(!isset($rango_horario)) echo 0; else echo $index_dias; ?>">
        <?php $i=0; $j=0; foreach($rango_horario as $hr_ini => $horario_inicio) { ?>
            <?php foreach($horario_inicio as $hr_fin => $horario_fin) { ?>
                <div id="dias_<?=($i+$j)?>">
                    <div class="col_half">
                       
                        <?php if($i+$j == 0) { ?>
                            <div class="col_icon agregarh">
                                <i class="fa fa-plus-circle fa-2x" aria-hidden="true" style="color: green;"></i>
                            </div>
                            <div class="col_icon hidden borrar">
                            <?php } else { ?>
                            <div class="col_icon borrar">
                        <?php } ?>
                            <i class="fa fa-minus-circle fa-2x" aria-hidden="true" style="color: red;"></i>
                        </div>
                        <div class="col_two_half col_last">
                            <?php $l=1; $k=0; foreach($horario_fin as $dia) { ?>
                                <?php do { ?>
                                    <label class="checkbox-inline">
                                    <?php if($l == $dia['dia']) { ?>
                                        <input type="checkbox" name="activo_<?=$l?>_<?=($i+$j)?>" checked>
                                        <input type="hidden" name="id_rango_horario_<?=$l?>_<?=($i+$j)?>" value="<?=$dia['id_rango_horario']?>">
                                    <?php } else { ?>
                                        <input type="checkbox" name="activo_<?=$l?>_<?=($i+$j)?>">
                                    <?php } ?>
                                    <?php 
                                        switch ($l) {  
                                            case 1: echo "Do"; break;
                                            case 2: echo "Lu"; break;
                                            case 3: echo "Ma"; break;
                                            case 4: echo "Mi"; break;
                                            case 5: echo "Ju"; break;
                                            case 6: echo "Vi"; break;
                                            case 7: echo "Sá"; break;
                                    }?>
                                    </label>
                                <?php } while ($l++<$dia['dia']);?>
                            <?php $k++; }?>

                            <?php for($l; $l<=7; $l++) { ?>
                                <label class="checkbox-inline">
                                <input type="checkbox" name="activo_<?=$l?>_<?=($i+$j)?>">
                                <?php 
                                    switch ($l) {  
                                        case 1: echo "Do"; break;
                                        case 2: echo "Lu"; break;
                                        case 3: echo "Ma"; break;
                                        case 4: echo "Mi"; break;
                                        case 5: echo "Ju"; break;
                                        case 6: echo "Vi"; break;
                                        case 7: echo "Sá"; break;
                                }?>
                                </label>
                            <?php };?>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="col_half col_last">
                        <input type="hidden" name="horario<?=($i+$j)?>" value="">
                        <div class="col_one_third">
                            <div class="input-group clockpicker" style="max-width:40px;min-width:30px;display:table-cell;text-align: center">
                                <input name="hr_desde_<?=($i+$j)?>" class="time form-control input-sm" value="<?=$hr_ini?>">
                            </div>
                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="col_one_third col_last">
                            <div class="input-group clockpicker" style="max-width:40px;min-width:30px;display:table-cell;text-align: center">
                                <input name="hr_hasta_<?=($i+$j)?>" class="time form-control input-sm" value="<?=$hr_fin?>">
                            </div>
                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            <?php $j++; }?>
        <?php $k++; }?>
    </div>

    <div id="divError" class="alert alert-danger nobottommargin hidden">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="icon-remove-sign"></i><strong id="msjError">Debe completarse al menos uno de los campos en rojo.</strong>
    </div>
    <br/>

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
    // Guardar cambios
    $('#form').submit(function (event){
        event.preventDefault();
		if ($('#form').valid()) {
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
        }
    });

    $('#btnCerrar, #btnAceptarInformacion, #btnCancelar').click(function(){
        window.location.href = "<?php echo site_url('politica/consulta');?>";
    });
</script>

<?php include('estructura/footer.php'); ?>