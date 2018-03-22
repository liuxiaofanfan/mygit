$(function(){
	$(document).pjax('ul.sidebar-menu.tree a', '#out-content', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#out-content"});

	$(document).on("pjax:end",function(){
       alert("123123");
    });

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});

});