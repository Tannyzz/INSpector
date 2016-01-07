$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal-trigger').leanModal();
	$('.datepicker').pickadate({selectMonths: true,selectYears: 15});
	$('.collapsible').collapsible({accordion : false });
	$('ul.tabs').tabs();
});