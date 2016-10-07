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


    $.validator.addMethod('ExcedeTamañoCaracteresNombre', function(value) {
        return value.length <= 16;
    });


    $.validator.addClassRules('nombreInvalido', {
        ExcedeTamañoCaracteresNombre: true,
    });

    $.validator.addMethod('ExcedeTamañoCaracteresUsuario', function(value) {
    return value.length <= 16;
    });


    $.validator.addClassRules('usuarioInvalido', {
        ExcedeTamañoCaracteresUsuario: true,
    });

    $.validator.addMethod('ContraseñasDistintas', function(value) {
    return value == $('#password').val();
    });


    $.validator.addClassRules('passwordInvalido', {
        ContraseñasDistintas: true,
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