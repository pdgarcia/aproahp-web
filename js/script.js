(function ($) {
	
jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}

function showmsg(){
	if($("#mensaje p").text() != ""){
		$("#mensaje" ).center().show( 'bounce','' , 1000).fadeOut(200);
	}
}

jQuery.extend(jQuery.validator.messages, {
	  required: "Este campo es obligatorio.",
	  remote: "Por favor, rellena esta campo.",
	  email: "Por favor, escribe una dirección de correo válida",
	  url: "Por favor, escribe una URL válida.",
	  date: "Por favor, escribe una fecha válida.",
	  dateISO: "Por favor, escribe una fecha (ISO) válida.",
	  dateDE: "Bitte geben Sie ein g�ltiges Datum ein.",
	  number: "Por favor, escribe un número entero válido.",
	  numberDE: "Bitte geben Sie eine Nummer ein.",
	  digits: "Por favor, escribe sólo dígitos.",
	  creditcard: "Por favor, escribe un número de tarjeta válido.",
	  equalTo: "Por favor, escribe el mismo valor de nuevo.",
	  accept: "Por favor, escribe una valor con una extensión aceptada.",
	  maxlength: jQuery.format("Por favor, no escribas más de {0} caracteres."),
	  maxLength: jQuery.format("Por favor, no escribas más de {0} caracteres."),
	  minlength: jQuery.format("Por favor, no escribas menos de {0} caracteres."),
	  minLength: jQuery.format("Por favor, no escribas menos de {0} caracteres."),
	  rangelength: jQuery.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
	  rangeLength: jQuery.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
	  rangeValue: jQuery.format("Por favor, escribe un valor entre {0} y {1}."),
	  range: jQuery.format("Por favor, escribe un valor entre {0} y {1}."),
	  maxValue: jQuery.format("Por favor, escribe un valor igual o menor que {0}."),
	  max: jQuery.format("Por favor, escribe un valor igual o menor que {0}."),
	  minValue: jQuery.format("Por favor, escribe un valor igual o mayor que {0}."),
	  min: jQuery.format("Por favor, escribe un valor igual o mayor que {0}.") 
	});    

	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
    
})(jQuery);
