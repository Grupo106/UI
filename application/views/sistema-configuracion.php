<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<div class="col_full">
    <div class="fancy-title title-block">
        <h3>Complete los siguientes datos:</h3>
    </div>      
</div>  

<form id="form" action="<?=site_url('sistema/guardar/')?>" method="post">
    <div class="col_full">
      <input id="dhcp" class="checkbox-style" type="checkbox" <?php if($dhcp == 'si') echo "checked" ?> name="dhcp"/>
      <label class="checkbox-style-3-label" for="dhcp">Configurar parámetros de red automáticamente</label>
    </div>  

    <div class="col_one_third no-dhcp">
        <label>IP de Administración</label>
        <input id="ip" name="ip" type="text" class="sm-form-control ipAddress ipValida" value="<?= $ip ?>">
    </div>

    <div class="col_one_third no-dhcp" style="margin-bottom:47px;">
        <label>Máscara de subred</label>
        <input name="mascara" class="sm-form-control ipAddress ipValida" value="<?= $mascara ?>">
    </div>

    <div class="col_one_third col_last no-dhcp">
        <label>Puerta de enlace</label>
        <input name="gateway" class="sm-form-control ipAddress ipValida" value="<?= $gateway ?>">
    </div>

    <div class="col_half no-dhcp"  style="margin-bottom:47px;">
        <label>DNS 1</label>
        <input name="dns1" class="sm-form-control ipAddress ipValida" value="<?= $dns1 ?>">
    </div>

    <div class="col_half col_last no-dhcp">
        <label>DNS 2</label>
        <input name="dns2" class="sm-form-control ipAddress ipValida" value="<?= $dns2 ?>">
    </div>  

    <div class="col_half">
        <label>Ancho de banda de Bajada</label>
        <input name="bajada" class="sm-form-control" value="<?= $bajada ?>">
    </div>

    <div class="col_half col_last">
        <label>Ancho de banda de Subida</label>
        <input name="subida" class="sm-form-control" value="<?= $subida ?>">
    </div>  

    <div class="col_full" style="text-align:center;">
        <button type="submit" class="button button-rounded">GUARDAR</button>
        <button type="button" id="btnCancelar" class="button button-rounded button-red">CANCELAR</button>   
    </div>  
</form>

<?php include('estructura/modal-informacion.php'); ?>
<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?=base_url('public/js/netcop/sistema.js')?>"></script>
<script type="text/javascript"> 
    $(document).ready(function() {

        $('#tituloPantalla').text('Modificar Configuración del Sistema');
        var siteurl = '<?=site_url()?>';

        $('#btnCancelar').click(function(){
            window.location.href = "<?php echo site_url();?>";
        });

        //GUARDAR
        $('#form').submit(function (event){
            event.preventDefault();
            if ($('#form').valid()) {
            $.ajax({
                url : $('#form').attr("action"),
                type : $('#form').attr("method"),
                data : $('#form').serialize(),
                success: function(respuesta){
                    if(respuesta==1){
                        $('#mensaje').text("La configuración fue guardada con éxito.");
                    } else {
                        $('#mensaje').text("Error al guardar la configuración.");
                    }
                    $('#modalInformacion').modal('show');
                }
            });
          }
        });

        //ACEPTAR
        $('#btnAceptarInformacion').click(function(){
            window.location.href = "<?php echo site_url();?>";
        });

        var disable_on_dhcp = function() {
            var dhcp_enabled = $('#dhcp').prop('checked');
            $('.no-dhcp input').prop('disabled', dhcp_enabled);
        }
        $('#dhcp').on('change', disable_on_dhcp);
        disable_on_dhcp();
    });
</script>

<?php include('estructura/footer.php'); ?>
    
