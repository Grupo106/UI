var $ = jQuery.noConflict();

$(document).ready(function() {

	$.validator.addMethod('IPvalida', function(value) {
		if (value=="") return true;
        var regex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
        return regex.test(value);
    });

    $.validator.addMethod('validarCamposCompletos', function(value) {
		if ($("input[name='direccionO_0']").val()=="" && $($("input[name='puertoO_0']")).val()=="" 
			&& $($("input[name='direccionI_0']")).val()=="" && $($("input[name='puertoI_0']")).val()==""){
			mostrarDivError(true);
			return false;
		}
		mostrarDivError(false);
		return true;
     });

    $.validator.addClassRules('ipValida', {
        IPvalida: true,
    });

    $('#form').validate({
    	errorElement: 'span',
        rules: {
        	nombre: "required",
        	descripcion: "required",
            direccionO_0: "validarCamposCompletos",
            direccionI_0: "validarCamposCompletos",
            puertoO_0: "validarCamposCompletos",
            puertoI_0: "validarCamposCompletos",
        }
    });

    function mostrarDivError(valor){
    	if(valor && $('#divError').hasClass("hidden")){
			$('#divError').removeClass("hidden");
		} else if (!valor && !$('#divError').hasClass("hidden")){
			$('#divError').addClass("hidden");
		}
    }

    $('.ipAddress').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});

	$("div").on("keyup", ".prefijo", function(){
	   if(this.value.length > 2) {
	        this.value = this.value.slice(0,2);
	   }
	   if(this.value < 0 || this.value > 32) {
	        this.value = this.value.slice(0,-1);
	   }
	});

	$("div").on("keyup", ".puerto", function(){
	   if(this.value.length > 5) {
	        this.value = this.value.slice(0,5);
	   }
	   if(this.value < 1 || this.value > 65535) {
	        this.value = this.value.slice(0,-1);
	   }
	});

	//ELIMINAR
	$("div").on("click", ".borrar", function(event){
		$(this).parent('div').addClass('hidden');
		var input = $(this).parent('div').find("input:first");
		input.val('');
		input.addClass("eliminada");
	});

	//AGREGAR
	$('.agregar').click(function(){
		var divParentID = $(this).parent('div').attr('id').split("_",1);
		var index = $("input[name='index"+ divParentID +"']").val();

		if (duplicar(divParentID, index)){
			$("input[name='index"+ divParentID +"']").val(++index);
		}
	});

	function duplicar(idDiv, cant) {
	    var original = $('#'+ idDiv + '_0');
	    var ultimo = $('#'+ idDiv + '_'+cant)
	    if (validarCampoCompleto(ultimo)){
	    	var clone = original.clone();
		    clone.insertAfter(ultimo);
		    removerIcono(clone);
		    renombrarIDs(clone, ++cant);
		    removerErrores(clone);
		    return true;
	    }
	    return false;
	}

	function validarCampoCompleto(original) {
		var input = original.find('input:first');
		if (!input.hasClass('eliminada') && (input.val()=="" || input.hasClass('error'))){
			input.addClass('error');
			return false;
		}
		return true;
	}

	function removerIcono(clone) {
		clone.find('.agregar').remove();
	    clone.find('.borrar').removeClass('hidden');
	}	

	function removerErrores(clone) {
		clone.find('span.error').remove();
		clone.find('input:first').removeAttr('aria-describedby');
	}	

	function renombrarIDs(clone, cant) {
		renombrarID(clone, cant);

		clone.find('input').each(function() {
			renombrarID($(this), cant);
			$(this).parent('div').find('label').remove();
			$(this).val("");
			if($(this).hasClass('ipAddress')){
				$(this).mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});
			}
	    });

	    clone.find('select').each(function() {
			renombrarID($(this), cant);
			$(this).val("0");
	    });
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
});