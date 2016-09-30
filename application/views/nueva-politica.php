<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php');   ?>

<link rel="stylesheet" href="<?=base_url('public/font-awesome-4.6.3/css/font-awesome.min.css')?>">

<div class="container-fluid">
    <form class="form-horizontal" id="form" method="post" action="<?=site_url('politica/guardar/')?>">
    	<input name="id_politica" type="hidden" class="form-control" value="">
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

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Objetivo</label>
                    <div class="col-md-8">
                        <div class="col-sm-15 col-lg-10">
                            <div class="form-group">
                                <label class="col-md-4 control-label">MAC</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="objetivo_mac" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-15 col-lg-10">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IP</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="objetivo_ip" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Aplicado a</label>
                    <div class="col-md-8">
                        <div class="col-sm-15 col-lg-10">
                            <div class="form-group">
                                <label class="col-md-4 control-label">URL</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="destino_mac" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-15 col-lg-10">
                            <div class="form-group">
                                <label class="col-md-4 control-label">IP</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="destino_ip" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabbable col-sm-15 col-lg-10">
                <label class="col-md-4 control-label">Tipo</label>
                <input type="hidden" class="form-control" id="tipo" name="tipo" value="">
                <ul class="nav nav-pills col-sm-8 col-md-8 col-lg-8">
                    <li class="active"><a data-toggle="tab" href="#menuBloqueo">Bloqueo</a></li>
                    <li class="">      <a data-toggle="tab" href="#menuLimitacion">Limitación</a></li>
                    <li class="">      <a data-toggle="tab" href="#menuPriorizacion">Priorización</a></li>
                </ul>

                <div class="container-fluid col-sm-15 col-lg-10"">
                    <div class="tab-content" style="padding:30px 150px">
                        <div id="menuBloqueo" class="tab-pane fade">
                            <div class="col-sm-15 col-lg-10">
                                <label class="col-md-4 control-label"></label>
                            </div>
                        </div>

                        <div id="menuLimitacion" class="tab-pane fade">
                            <div class="col-sm-15 col-lg-10">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Bajada</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="inputBajada" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-15 col-lg-10">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Subida</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="inputSubida" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="menuPriorizacion" class="tab-pane fade">
                            <div class="col-sm-15 col-lg-10">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Prioridad</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="inputPrioridad" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Días de aplicación</label>
                    <div class="col-md-8">
                        <label><input type="checkbox" name="activo_do" value="">Domingo</label>
                        <label><input type="checkbox" name="activo_lu" value="">Lunes</label>
                        <label><input type="checkbox" name="activo_ma" value="">Martes</label>
                        <label><input type="checkbox" name="activo_mi" value="">Miércoles</label>
                        <label><input type="checkbox" name="activo_ju" value="">Jueves</label>
                        <label><input type="checkbox" name="activo_vi" value="">Viernes</label>
                        <label><input type="checkbox" name="activo_sa" value="">Sábado</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-15 col-lg-10">
                <div class="form-group">
                    <label class="col-md-4 control-label">Horario de aplicación</label>
                    <div class="col-md-8">
                        <div class="input-group clockpicker" style="max-width:40px;min-width:30px;display:table-cell;text-align: center">
                            <input name="hr_desde" class="time form-control input-sm" value="">
                        </div>

                        <div class="input-group clockpicker" style="max-width:40px;min-width:30px;display:table-cell;text-align: center">
                            <input name="hr_hasta" class="time form-control input-sm" value="">
                        </div>
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    </div>
                </div>
            </div>
        </div>

	<div class="col-sm-15 col-lg-10 center">
		<button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form>
</div>

<?php include('estructura/modal-eliminar.php');        ?>
<?php include('estructura/modal-informacion.php');     ?>

<script src="<?=base_url('public/js/components/bootstrap-clockpicker.min.js')?>"></script>
<link href="<?=base_url('public/css/components/bootstrap-clockpicker.min.css')?>" rel="stylesheet">
<script type="text/javascript" src="<?=base_url('public/js/plugins/jquery.mask.min.js')?>"></script>  

<script type="text/javascript">
    $(document).ready(function() {
        $('#tituloPantalla').text('Políticas de Tráfico');
        jQuery(".bt-switch").bootstrapSwitch();

        // Selector hora
        $('.clockpicker').clockpicker({
              align: 'left',
              donetext: 'Listo'
            });

        // Máscara ingreso de hora manual
        $(function() {
            $('.time').mask('99:99');
        });

        // Bloquear ingreso de texto
        $('.time').keypress(function(e) {
            var a = [];
            var k = e.which;
            
            for (i = 48; i < 58; i++)
                a.push(i);
            
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
        });
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href")

        if(target == '#menuBloqueo')
            document.getElementById("tipo").value = "bloqueo";
        else
            if(target == '#menuLimitacion')
                document.getElementById("tipo").value = "limitacion";
            else
                document.getElementById("tipo").value = "priorizacion";
    });
    
	$('#btnCerrar, #btnAceptarInformacion, #btnCancelar').click(function(){
		window.location.href = "<?php echo site_url('politica/consulta');?>";
	});

//    $('.estado').on('switchChange.bootstrapSwitch', function (e, estado){
//        var inputActiva = document.getElementById("inputActiva");
//
//        // Cambiar estado variable inputActiva
//        if (inputActiva.value=='t')
//            document.getElementById("inputActiva").value = 'f';
//        else
//            document.getElementById("inputActiva").value = 't';
//
//        alert(document.getElementById("inputActiva").value);
//    });

    // Guardar cambios
    $('#form').submit(function (event){
        event.preventDefault();

        alert($('#form').serialize());
		
		$.ajax({
            url : $('#form').attr("action"),
            type : $('#form').attr("method"),
            data : $('#form').serialize(),
            success: function(response){
            	if(response)
		            $('#mensaje').text("La politica fue creada exitosamente");
		         else
		            $('#mensaje').text(response);
                
                $('#modalInformacion').modal('show');
            }
    	});
    });
</script>
<?php include('estructura/footer.php');   ?>
