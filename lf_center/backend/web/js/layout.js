$(function(){
	$(document).pjax('ul.sidebar-menu.tree a, .content a', '#main-content', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#main-content"});
	$(document).pjax('.content a', '#main-content', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#main-content"});

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});
});