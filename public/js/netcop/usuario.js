var $ = jQuery.noConflict();

$(document).ready(function() {

    $.validator.addMethod('MailInvalido', function(value) {
    if (value=="") return true;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(value);
    });


    $.validator.addClassRules('mailInvalido', {
        MailInvalido: true,
    });

       $('#form').validate({
    	   errorElement: 'span',
            rules: {
          	nombre: "required",
            usuario: "required",
          	apellido: "required",
            mail: "required",
            password: "required"   
        }
    });
});