<?php
    // Array de horarios
    function get_activada($fl_activa) {
        $ret = '';

        if($fl_activa=='t')
            $ret = "<i class=\"fa fa-circle fa-sm\" style=\"color:green\"></i>";
        else
            $ret = "<i class=\"fa fa-circle fa-sm\" style=\"color:red\"></i>";

        return $ret;
    }
?>        

<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" id="form-edit" onsubmit="guardar()">
                <div class="form-group">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title edit-title">
                            <p>Editar política de tráfico</p>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-content">
                            <div class="container-fluid">
                                <form class="form-horizontal" role="form">
                                    <div class="row">
                                        <div class="col-sm-15 col-lg-10">
                                            <div class="form-group">
                                                <label for="inputActiva" class="col-md-4 control-label">Activa</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="inputActiva" value="<?= $item['nombre']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-15 col-lg-10">
                                            <div class="form-group">
                                                <label for="inputNombre" class="col-md-4 control-label">Nombre</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="inputNombre" value="<?= $item['nombre']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-15 col-lg-10">
                                            <div class="form-group">
                                                <label for="inputDescripcion" class="col-md-4 control-label">Descripcion</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="inputDescripcion" value="<?= $item['descripcion']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-15 col-lg-10">
                                            <div class="form-group">
                                                <label for="inputPrioridad" class="col-md-4 control-label">Prioridad</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="inputPrioridad" value="<?= $item['prioridad']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-15 col-lg-10">
                                            <div class="form-group">
                                                <label for="inputBajada" class="col-md-4 control-label">Bajada</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="inputBajada" value="<?= $item['velocidad_bajada']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-15 col-lg-10">
                                            <div class="form-group">
                                                <label for="inputSubida" class="col-md-4 control-label">Subida</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="inputSubida" value="<?= $item['velocidad_subida']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-15 col-lg-10">
                                            <div class="form-group">
                                                <label for="inputFcCreacion" class="col-md-4 control-label">Fecha de creación</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="inputFcCreacion" value="<?= date('d/m/Y H:i', strtotime(str_replace('-','/', $item['fc_creacion'])))?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer center">
                        <button id="btnCancelar" class="button button-rounded button-mini button-red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button id="btnGuardar" class="button button-rounded button-mini">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


