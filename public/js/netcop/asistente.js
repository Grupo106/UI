var $ = jQuery.noConflict();

$(document).ready(function() {
	
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'radio-personalizada') {
            $('#div-personalizada').removeClass('hidden'); 
            $('#radio-automatica').attr('checked',false);
       } else {
            $('#div-personalizada').addClass('hidden');   
            $('#radio-personalizada').attr('checked',false);
       }
   });

     $('#form1').validate({
    	errorElement: 'span',
        rules: {
          	nombre: "required",
            usuario: "required",
          	apellido: "required",
            mail: "required",
            password: "required"   
        }
    });

    $.validator.addMethod('MailInvalido', function(value) {
    if (value=="") return true;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(value);
    });


    $.validator.addClassRules('mailInvalido', {
        MailInvalido: true,
    });

     $.validator.addMethod('IPvalida', function(value) {
		if (value=="") return true;
        var regex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
        return regex.test(value);
    });


    $.validator.addClassRules('ipValida', {
        IPvalida: true,
    });

    $('#form2').validate({
    	errorElement: 'span',
        rules: {
        	ip: "required",
        	mascara: "required",
            enlace: "required",
            dns1: "required",
            anchoBajada: "required",
            anchoSubida: "required"
        }
    });


    $('.ipAddress').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});

    

});