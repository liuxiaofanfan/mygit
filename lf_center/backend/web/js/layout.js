$(function(){
	// $(document).pjax('ul.sidebar-menu.tree a', '#pjax-container', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#pjax-container"});

	// $(document).on("pjax:end",function(){
 //    });

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});

});