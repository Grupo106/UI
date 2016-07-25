$(function() {
	$('.travel-date-group .default').datepicker({
		autoclose: true,
		startDate: "today",
	});

	$('.travel-date-group .today').datepicker({
		autoclose: true,
		startDate: "today",
		todayHighlight: true
	});

	$('.travel-date-group .past-enabled').datepicker({
		autoclose: true,
	});
	$('.travel-date-group .format').datepicker({
		autoclose: true,
		format: "dd-mm-yyyy",
	});

	$('.travel-date-group .autoclose').datepicker();

	$('.travel-date-group .disabled-week').datepicker({
		autoclose: true,
		daysOfWeekDisabled: "0"
	});

	$('.travel-date-group .highlighted-week').datepicker({
		autoclose: true,
		daysOfWeekHighlighted: "0"
	});

	$('.travel-date-group .mnth').datepicker({
		autoclose: true,
		minViewMode: 1,
		format: "mm/yy"
	});

	$('.travel-date-group .input-daterange').datepicker({
		autoclose: true
	});

	$('.datetimepicker1').datetimepicker({
		format: 'LT',
		showClose: true
	});

});

$(function() {

	// .daterange2
	$(".daterange2").daterangepicker({
		"opens": "center",
		singleDatePicker: true,
		autoUpdateInput: true,
		timePicker: true,
		locale: {
			format: 'DD/MM/YYYY h:mm A'
		}
	});

});