	$(document).ready(function() {
		$(".register").hide();
	$("#navv").css("background-color","rgba(255,255,255,0.9)");
  	$(".navbar-inverse .navbar-brand ").css("color","#365382");
  	
	});
	$("#lgin").click(function() {
		$(".register").hide();
		$(".login").show();
		$(this).css("background-color", "#eee");
		$("#regis").css("background-color", "#365382");		
	});
	$("#regis").click(function() {
		$(".register").show();
		$(".login").hide();
		$("#lgin").css(	"background-color", "#365382");
		$(this).css(	"background-color", "#eee");		
	});

	$("#reg_S").hover(
		function() {
		$(this).css({"background-color":"rgba(54, 83, 130,0.8)","color":"black"});
		},
		function() {
		$(this).css({"background-color":"#365382","color":"white"})}

		);		

	$("#log_S").hover(
		function() {
		$(this).css({"background-color":"rgba(54, 83, 130,0.8)","color":"black"});
		},
		function() {
		$(this).css({"background-color":"#365382","color":"white"})}


		);		