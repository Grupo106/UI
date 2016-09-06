var $ = jQuery.noConflict();

$(document).ready(function() {
	
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'radio-personalizada') {
            $('#div-personalizada').removeClass('hidden');           
       } else {
            $('#div-personalizada').addClass('hidden');   
       }
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