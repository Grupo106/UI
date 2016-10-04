<?php include('estructura/header.php'); ?>
<?php include('estructura/content-panel.php'); ?>

<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background: #f6f6f6;">
    <div class="panel-body well well-lg" style="padding: 40px;">
        <form id="login-form" name="login-form" class="nobottommargin" action="<?=site_url('inicio/autenticar')?>" method="post">
            <input type="hidden" name="next" value="<?=html_escape($next)?>"/>
            <h3>Iniciar sesión</h3>

            <?php if($error) { ?>
                <div class="style-msg errormsg">
                  <div class="sb-msg">
                    <i class="icon-remove"></i><strong>Error</strong> 
                    No se pudo iniciar sesión
                  </div>
                </div>
            <?php } ?>

            <div class="col_full">
                <input id="login-usuario" name="login-usuario" class="sm-form-control" type="text" placeholder="USUARIO" autocomplete="off"/>
            </div>

            <div class="col_full">
                <input id="login-password" name="login-password" class="sm-form-control" type="password" placeholder="CONTRASEÑA" 
                       autocomplete="off"/>
            </div>

            <div class="col_full nobottommargin">
                <button class="button button-rounded btn-block" id="login-form-submit" name="login-form-submit" value="login">INGRESAR</button>
            </div>
        </form>
    </div>
</div>

<?php include('estructura/footer-panel.php'); ?>
