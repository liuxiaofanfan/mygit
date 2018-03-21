$(function(){
	$(document).pjax('a, .content a', '#out-content', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#out-content"});

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});
});