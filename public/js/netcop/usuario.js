var $ = jQuery.noConflict();

$(document).ready(function() {
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