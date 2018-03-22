$(function(){
	$(document).pjax('ul.sidebar-menu.tree a, .content a', '#out-content', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#out-content"});

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});

	$("#out-content").on("click", ".delete-menu-batch", function(){
        var keys = $("#menu-grid").yiiGridView("getSelectedRows");
        console.log(keys);
    });
});