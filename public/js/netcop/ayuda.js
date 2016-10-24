function agregarTooltip(label, textoAyuda){
	var clone = $(".spAyuda").clone();
	clone.insertAfter( label );
	label.parent().find(".spAyuda").removeClass("spAyuda");
	label.parent().find(".tooltipp-text").text(textoAyuda);
}

function agregarTooltipTitulo(label, textoAyuda){
	var clone = $(".spAyuda").clone();
	label.append( clone );
	label.parent().find(".spAyuda").removeClass("spAyuda");
	label.parent().find(".tooltipp-text").text(textoAyuda);
	label.parent().find(".fa-info-circle").addClass("color-negro");
}