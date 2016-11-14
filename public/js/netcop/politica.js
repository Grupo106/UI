var $ = jQuery.noConflict();

$(document).ready(function() {
    
    /*****MAC DEFAULT****/
    selectDivMacDefualt();
        
    /*****VALIDACIONES*****/
    $('#form').validate({
        errorElement: 'span',
        rules: {
            inputNombre: "required",
            inputDescripcion: "required",
            //inputBajada: "required", chequear, se agranda el span de kbps
            //inputSubida: "required", chequear, se agranda el span de kbps
            inputPrioridad:"required",
            id_claseTraficoA:"validarCamposCompletos",            
            macO_0: "validarCamposCompletos",
            id_claseTraficoO_0: "validarCamposCompletos",
            id_claseTraficoD_0: "validarCamposCompletos"
        }
    });

    $.validator.addMethod('validarCamposCompletos', function(value) {
        if ($("select[name='id_claseTraficoA']").val()=="" && $($("input[name='macO_0']")).val()=="" 
            && $($("select[name='id_claseTraficoO_0']")).val()=="" && $($("select[name='id_claseTraficoD_0']")).val()==""){
            mostrarDivError(true);
            return false;
        }
        mostrarDivError(false);
        return true;
     });

    function mostrarDivError(valor){
        if(valor && $('#divError').hasClass("hidden")){
            $('#divError').removeClass("hidden");
        } else if (!valor && !$('#divError').hasClass("hidden")){
            $('#divError').addClass("hidden");
        }
    }

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

    // Formateo IP
    $('.ipAddress').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});

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
            var modoOrigen = $("[name='modoOrigen']").val();

            // Si clase no corresponde a nodo, borro el elemento. De lo contrario lo reformo
            if (modoOrigen == "modoMac" && $(this).hasClass("selClase") || modoOrigen == "modoClase" && $(this).hasClass("macAddress")) {
                $(this).remove();
            }
            else {
                if (typeof id != 'undefined')
                    $(this).attr("id", id.substring(0, id.lastIndexOf("_")) + "_" + cantidad_reg_n);
                if (typeof name != 'undefined')
                    $(this).attr("name", name.substring(0, name.lastIndexOf("_")) + "_" + cantidad_reg_n);
                
                // Remover etiquetas y setear valores
                $(this).parent('div').find('label').remove();
                $(this).val("");
            }
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

        nuevo.find('.tooltipp').remove();
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

// Tabs de tipo y modo de politica
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("href");

    if(target == '#menuBloqueo')
        document.getElementById("tipo").value = "bloqueo";

    if(target == '#menuLimitacion')
        document.getElementById("tipo").value = "limitacion";

    if(target == '#menuPriorizacion')
        document.getElementById("tipo").value = "priorizacion";

    if(target == '#modoMac'){
        selectDivMacDefualt();
    }
    
    if(target == '#modoClase'){
        $('.divOrigen').show();
        $('.modoMac').hide();
        $('.modoClase').show();
        $('.divMac_MacO').hide();
        $('.divClaseO').show();
        
        // Oculto divs que no tengan clases de interes al modo
        $('div[id^="objetivoO_"]').each(function() {
            //console.log($(this).find(".selClase"));
            if ($(this).find(".selClase").length == 0) {
                $(this).hide();
            }
        });

        $("[name='modoOrigen']").val("modoClase");
    }
});

// Ocultar o mostrar horarios
$('#title-dias').parent().on('click', function (){
    var switcher = $(this).find("i[class^='switch-dias']");

    if($('#dias').attr('class') == 'collapse') {
        switcher.removeClass('fa-angle-down');
        switcher.addClass('fa-angle-up');
    }

    else if($('#dias').attr('class') == 'collapse in') {
        switcher.removeClass('fa-angle-up');
        switcher.addClass('fa-angle-down');
    }
});


//Boton restear
$('#btResetear').on('click', function (){
    resetearBloqueClase("","");
    $("[name='id_claseTraficoA']").val("");
});


function resetearBloqueClase(seleccion, arrayClases){
    if (seleccion == "") {
        $("div[id='bloqueOrigen']").show();
        $("div[id='bloqueDestino']").show();
        $("#btResetear").addClass("disabled");
        $("#claseTraficoADesc").val("");
    }
    else {
        $("div[id='bloqueOrigen']").hide();
        $("div[id='bloqueDestino']").hide();
        $("#btResetear").removeClass("disabled");
        var item = encontrarItemPorId(arrayClases, seleccion);
        $("#claseTraficoADesc").val(item.descripcion);
    }

    // Si es en editar, busco objetivos anteriores y los hago negativos para eliminar
    var objetivoO_ant = $("input[name='id_objetivoA_O']");
    var objetivoD_ant = $("input[name='id_objetivoA_D']");

    if (objetivoO_ant.val() != '' || objetivoD_ant.val() != '') {
        objetivoO_ant.val(objetivoO_ant.val()*(-1));
        objetivoD_ant.val(objetivoD_ant.val()*(-1));
    }
}

function encontrarItemPorId(array, id){
    for (var i in array) {
        if (array[i].id_clase == id) {
             return array[i];
        }
    }
}

function selectDivMacDefualt() {        
    $('.divOrigen').show();
    $('.modoMac').show();
    $('.modoClase').hide();
    $('.divMac_MacO').show();
    $('.divClaseO').hide();

    // Oculto divs que no tengan clases de interes al modo
    $('div[id^="objetivoO_"]').each(function() {
        if ($(this).find(".macAddress").length == 0) {
            $(this).hide();
        }
    });

    $("[name='modoOrigen']").val("modoMac");
}
