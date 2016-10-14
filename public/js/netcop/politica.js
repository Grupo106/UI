var $ = jQuery.noConflict();

$(document).ready(function() {
    
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

    function formatoMAC(mac) {
        var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
            str = mac.target.value.replace(/[^a-f0-9]/ig, "");
        
        while (r.test(str)) {
            str = str.replace(r, '$1' + ':' + '$2');
        }

        mac.target.value = str.slice(0, 17);
    }
    
    // Formateo MAC
    $('.macAddress').on("keyup", formatoMAC);

    // Agregar horario
    $('.agregarh').click(function(){            
        var divParentID = $(this).parent('div').parent('div').attr('id').split("_",1);

        // Cantidad de registros
        var cantidad_reg = $("input[name='"+ divParentID +"_cant']").val(), cantidad_reg_n = cantidad_reg*1+1;

        // Modificar cantidad de registros
        $(this).parent('div').parent('div').parent('div').find("input:first").val(cantidad_reg_n);
        
        // Ultimo elemento
        var ultimo = $('#'+ divParentID + '_' + cantidad_reg);   
        cantidad_reg+1;
        
        // Creo elemento y renombro sus IDs
        var nuevo = $(this).parent('div').parent('div').clone(true);
        renombrarID(nuevo, cantidad_reg_n);
       
        // Rename y reseteo de inputs y selects
        nuevo.find('input').each(function() {
            var id = $(this).attr("id");
            var name = $(this).attr("name");

            if (typeof id != 'undefined')
                $(this).attr("id", id.substring(0, id.lastIndexOf("_")) + "_" + cantidad_reg_n);
            if (typeof name != 'undefined')
                $(this).attr("name", name.substring(0, name.lastIndexOf("_")) + "_" + cantidad_reg_n);

            // Si es horario limpiar valor
            if(name.indexOf("hr_") >= 0)
                $(this).val("");

            // Si es dia resetear checked
            if(name.indexOf("activo_") >= 0)
                $(this).prop("checked", false);

            // Eliminar id_rango_horario
            if(name.indexOf("id_rango_horario_") >= 0)
                $(this).remove();
        });

        // Rebind del clockpicker
        nuevo.find('[class*=time]').each(function() {
            //$(this).removeClass("time");
            $(this).unbind();

            $(this).clockpicker({
              align: 'left',
              donetext: 'Listo'
            });

            // Activacion de mascara
            $(this).keypress(function(e) {
                var a = [];
                var k = e.which;
                
                for (i = 48; i < 58; i++)
                    a.push(i);
                
                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
            $(this).mask('99:99');
        });

        // Clear options
        limpiarOptions(nuevo);

        // Eliminar icono agregar e insert
        removerIcono(nuevo);
        nuevo.insertAfter(ultimo);
    });

     // Eliminar elemento
    $("div").on("click", ".borrar", function(e){
        $(this).parent('div').parent('div').addClass('hidden');

        // Seteo id_objetivo en negativo si ya existia, X para descarte
        var objetivo = $(this).parent('div').parent('div').find("input:first").val();
        if(objetivo==null || objetivo=="")
            $(this).parent('div').parent('div').find("input:first").val("X");
        else
            $(this).parent('div').parent('div').find("input:first").val(objetivo*(-1));

        // Decremento contador activos
        var activos = $(this).parent('div').parent('div').parent('div').find("input[name$='_activos']").val();
        $(this).parent('div').parent('div').parent('div').find("input[name$='_activos']").val(activos*1-1);

        // En caso de que sean horarios, seteo -1
        $(this).parent('div').parent('div').find("input[name^='hr_']").each(function() {
            $(this).val('-1');
        });

        e.stopPropagation();
    });


    // Agregar elemento
    $('.agregar').click(function(){
        // Tipo de elemento
        var divParentID = $(this).parent('div').parent('div').attr('id').split("_",1);
       
        // Cantidad de registros
        var cantidad_reg = $("input[name='"+ divParentID +"_cant']").val(), cantidad_reg_n = cantidad_reg*1+1;
        
        // Modificar cantidad de registros
        $(this).parent('div').parent('div').parent('div').find("input:first").val(cantidad_reg_n);
        
        // Ultimo elemento
        var ultimo = $('#'+ divParentID + '_' + cantidad_reg);
        cantidad_reg+1;

        // Creo elemento y renombro sus IDs
        var nuevo = $(this).parent('div').parent('div').clone(true);
        renombrarID(nuevo, cantidad_reg_n);

        // Rename y reseteo de inputs y selects
        nuevo.find("input, select").each(function() {
            var id = $(this).attr("id");
            var name = $(this).attr("name");

            if (typeof id != 'undefined')
                $(this).attr("id", id.substring(0, id.lastIndexOf("_")) + "_" + cantidad_reg_n);
            if (typeof name != 'undefined')
                $(this).attr("name", name.substring(0, name.lastIndexOf("_")) + "_" + cantidad_reg_n);
            
            // Remover etiquetas y setear valores
            $(this).parent('div').find('label').remove();
            $(this).val("");
        });

        // Rename de arp mac
        nuevo.find('a[data-mac]').each(function() {
            var for_data = $(this).data('for');
 
            $(this).data("for", for_data.substring(0, for_data.lastIndexOf("_")) + "_" + cantidad_reg_n);
        });

        // Clear options
        limpiarOptions(nuevo);

        // Eliminar icono agregar e insert
        removerIcono(nuevo);
        nuevo.insertAfter(ultimo);

        // Incremento contador activos
        var activos = $(this).parent('div').parent('div').parent('div').find("input[name$='_activos']").val();
        $(this).parent('div').parent('div').parent('div').find("input[name$='_activos']").val(activos*1+1);
    });

    function removerIcono(clone) {
        clone.find('.agregar').remove();
        clone.find('.agregarh').remove();
        clone.find('.borrar').removeClass('hidden');
    }   

    function renombrarID(element, cant) {
        var nameCompleto = element.attr('name');
        if(nameCompleto==undefined){
            nameCompleto = element.attr('id');
        }
        var name = nameCompleto.split("_",1) + "_" + cant;
        element.attr('name', name);
        element.attr('id', name);
    }

    function limpiarOptions(elemento) {
        elemento.find('option').each(function() {
            $(this).prop("selected", false);
        });
    }

    $('a[data-mac]').on('click', function(e) {
        e.preventDefault();
        var mac = $(this).data('mac');
        var dest = $(this).data('for');
        $("#" + dest).val(mac);
    })
});

// Tab de tipo de politica
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
