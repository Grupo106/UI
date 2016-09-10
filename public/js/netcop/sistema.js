var $ = jQuery.noConflict();

$(document).ready(function() {

	$.validator.addMethod('IPvalida', function(value) {
		if (value=="") return true;
        var regex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
        return regex.test(value);
    });


    $.validator.addClassRules('ipValida', {
        IPvalida: true,
    });

    $('#form').validate({
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